<?php

require 'header.php';
include 'config.php';

function encode_password($plain, $challenge, $secret) {
  if ((strlen($challenge) % 2) != 0 ||
    strlen($challenge) == 0)
    return FALSE;

  $hexchall = hex2bin($challenge);
  if ($hexchall === FALSE)
    return FALSE;

  if (strlen($secret) > 0) {
    $crypt_secret = md5($hexchall . $secret, TRUE);
    $len_secret = 16;
  } else {
    $crypt_secret = $hexchall;
    $len_secret = strlen($hexchall);
  }

  /* simulate C style \0 terminated string */
  $plain .= "\x00";
  $crypted = '';
  for ($i = 0; $i < strlen($plain); $i++)
    $crypted .= $plain[$i] ^ $crypt_secret[$i % $len_secret];

  $extra_bytes = 0;//rand(0, 16);
  for ($i = 0; $i < $extra_bytes; $i++)
    $crypted .= chr(rand(0, 255));

  return bin2hex($crypted);
}

$uam_secret = $_SERVER['UAM_SECRET'];
$redirect_url = $_SERVER['REDIRECT_URL'];
$mac = $_SESSION["mac"];
$user_type = $_SESSION["user_type"];
$last_updated = date("Y-m-d H:i:s");

if ($user_type == "new") {
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $signup = $_POST['signup'];
  if ($signup != 'Y') {
      $signup = 'N';
  }

  mysqli_query($con, "
    CREATE TABLE IF NOT EXISTS `$table_name` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `mobile` varchar(45) NOT NULL,
    `email` varchar(45) NOT NULL,
    `signup` char(1) NOT NULL,
    `mac` varchar(45) NOT NULL,
    `last_updated` varchar(45) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (mac)
    )");

  mysqli_query($con,"INSERT INTO `$table_name` (mobile, email, signup, mac, last_updated) VALUES ('$mobile', '$email', '$signup', '$mac', '$last_updated')");
}

$username = $mac;
$password = $mac;
$uamip = $_SESSION["uamip"];
$uamport = $_SESSION["uamport"];
$challenge = $_SESSION["challenge"];

$encoded_password = encode_password($password, $challenge, $uam_secret);

$uam_redirect_url = "http://$uamip:$uamport/logon?" .
  "username=" . urlencode($username) .
  "&password=" . urlencode($encoded_password);

header('Location: ' . $uam_redirect_url);

?>
<!--<!DOCTYPE HTML>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <title>--><?php //echo htmlspecialchars($business_name); ?><!--</title>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />-->
<!--    <link rel="stylesheet" href="assets/styles/bulma.min.css" />-->
<!--    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.css" />-->
<!--    <meta http-equiv="refresh" content="5;url=--><?php //echo htmlspecialchars($redirect_url); ?><!--" />-->
<!--    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-32x32.png" sizes="32x32" />-->
<!--    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-16x16.png" sizes="16x16" />-->
<!--    <link rel="stylesheet" href="assets/styles/style.css" />-->
<!--</head>-->
<!--<body>-->
<!--<div class="page">-->
<!--    <img src="assets/images/new-bg.jpg" alt="" class="img-responsive hidden-xs">-->
<!--    <div class=" main-form">-->
<!--        <div id="login" class="content is-size-5 has-text-centered has-text-weight-bold">-->
<!--            <span class="quick">Thanks, you are now </span>-->
<!--            <span class="quick">authorized on WiFi</span>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->