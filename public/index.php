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
$result = mysqli_query($con, "SELECT * FROM `$table_name` WHERE mac='$_SESSION[mac]'");

if ($result->num_rows >= 1) {
  $row = mysqli_fetch_array($result);

  mysqli_close($con);

  $_SESSION["user_type"] = "repeat";
  header("Location: $redirect_url");
} else {
  mysqli_close($con);
}

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>
      <?php echo htmlspecialchars($business_name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="assets/styles/bulma.min.css" />
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.css" />
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="assets/styles/style.css" />
    <style>
        body {
            overflow-y: hidden;
        }
    </style>
</head>

<body>
<?php
$res = $_GET["res"];
if ($res === "notyet") {
  ?>
    <div class="page">
        <img src="assets/images/new-bg.jpg" alt="" class="img-responsive hidden-xs">
        <div class=" main-form">
            <div id="login" class="content is-size-5 has-text-centered has-text-weight-bold">
                <span class="join-today">Join today.</span>
                <span class="quick">It's quick and easy</span>
            </div>
            <form method="post" action="connect.php">
                <div class="field">
                    <div class="control has-icons-left">
                        <input class="input" type="email" id="form_font" name="email" placeholder="Email Address" required>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icons-left">
                        <input class="input" type="number" id="form_font" name="mobile" placeholder="Mobile Number" required>
                    </div>
                </div>
                <div class="is-centered is-mobile check-box-css">
                    <label class="containerCheck">
                        <input type="checkbox" name="signup" value="Y">
                        <span class="checkmark"></span>
                        Sign up for email and text alerts
                    </label>
                    <label class="containerCheck-without-cehck">
                        By signing in,<br> I agree to the <a style="color:#363636 ;" href="policy.php">Terms of Use</a>
                    </label>
                </div>
                <div class=" sign-in-btn">
                    <button class="">Sign In</button>
                </div>
                <div class="buttons is-centered">
                    <figure id="logoz">
                        <h2 class="sponser-by">sponsored by</h2>
                        <img class="logo" src="assets/images/logo.png">
                    </figure>
                </div>
            </form>
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
} else if ($res === "already") {
  header("Location: $redirect_url");
} else {
  echo "<h2>Error: Permission Denied</h2>";
}
?>
</body>

</html>