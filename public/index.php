<?php

require 'header.php';
include 'config.php';

$_SESSION["mac"] = $_GET["mac"];
$_SESSION["challenge"] = $_GET["challenge"];
$_SESSION["uamip"] = $_GET["uamip"];
$_SESSION["uamport"] = $_GET["uamport"];
$_SESSION["userurl"] = $_GET["userurl"];
$_SESSION["user_type"] = "new";

# Checking DB to see if user exists or not.
//$result = mysqli_query($con, "SELECT * FROM `$table_name` WHERE mac='$_SESSION[mac]'");
//
//if ($result->num_rows >= 1) {
//  $row = mysqli_fetch_array($result);
//
//  mysqli_close($con);
//
//  $_SESSION["user_type"] = "repeat";
//  header("Location: welcome.php");
//} else {
//  mysqli_close($con);
//}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>
      <?php echo htmlspecialchars($business_name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="assets/styles/bulma.min.css"/>
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.css"/>
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-16x16.png" sizes="16x16"/>
    <link rel="stylesheet" href="assets/styles/style.css"/>
    <style>

    </style>
</head>
<body>
<?php

$res = $_GET["res"];
$res = "notyet";
if ($res === "notyet") {
  ?>
    <div class="page">
        <div class="main">
            <section class="section">
                <div class="container">
                    <div class=" main-form">
                        <div id="login" class="content is-size-5 has-text-centered has-text-weight-bold">Join today.
                            <br>Its Quick and Easy
                        </div>
                        <form method="post" action="connect.php">

                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input" type="email" id="form_font" name="email" placeholder="Email"
                                           required>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input" type="number" id="form_font" name="mobile" placeholder="Mobile"
                                           required>
                                </div>
                            </div>
                            <br>
                            <div class="columns is-centered is-mobile">
                                <div class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" required>
                                        Signup for email and text alerts
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" required>
                                        By Signining in, I agree to <a href="policy.php">Terms of Use</a>
                                    </label>
                                </div>
                            </div>
                            <br>
                            <div class="buttons is-centered">
                                <button class="button is-link">Sign In</button>
                                <br>
                            </div>
                            <div class="buttons is-centered">
                                <figure id="logoz">
                                    <h2 style="color:#60c0bc"><strong>sponsered by</strong></h2>
                                    <br>
                                    <img width="100px" src="assets/images/logo.png">
                                </figure>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </section>
        </div>
    </div>
    </div>
    </div>

  <?php

} else if ($res === "success") {
  $redir = $_SESSION["userurl"];
  if (isset($redir)) {
    echo "<head>";
    echo '<meta http-equiv="refresh" content="3;URL=\'' . $redir . '\'">';
    echo "</head>";
  } else {
    echo "<h2>Log-in successful!</h2>";
  }
} else if ($res === "failed") {
  echo "<h2>Whoops, failed to authenticate</h2>";
} else if ($res === "logoff") {
  echo "<h2>Logging off ...</h2>";
} else {
  echo "<h2>Error: Permission Denied</h2>";
}
?>
</body>
</html>
