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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="assets/styles/bulma.min.css" />
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Literata:ital,opsz,wght@0,7..72,200;0,7..72,300;0,7..72,400;0,7..72,500;0,7..72,600;0,7..72,700;0,7..72,800;0,7..72,900;1,7..72,200;1,7..72,300;1,7..72,400;1,7..72,500;1,7..72,600;1,7..72,800;1,7..72,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="assets/styles/style.css" />

</head>

<body>
<?php

$res = $_GET["res"];
$res = "notyet";
if ($res === "notyet") {
  ?>
    <div class="page">
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
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                        Signup for email and text alerts
                    </label>
                    <label class="containerCheck">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                        By Signining in, I agree to <a style="color:#363636 ;" href="policy.php">Terms of Use</a>
                    </label>
                </div>
                <div class=" sign-in-btn">
                    <button class="">Sign In</button>
                </div>
                <div class="buttons is-centered">
                    <figure id="logoz">
                        <h2 class="sponser-by">sponsered by</h2>
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
} else {
  echo "<h2>Error: Permission Denied</h2>";
}
?>
</body>

</html>