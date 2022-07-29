<?php

require 'header.php';

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($business_name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="assets/styles/bulma.min.css" />
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.css" />
<!--    <meta http-equiv="refresh" content="5;url=--><?php //echo htmlspecialchars($redirect_url); ?><!--" />-->
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="assets/styles/style.css" />
</head>
<body>

<div class="page">
    <img src="assets/images/new-bg.jpg" alt="" class="img-responsive hidden-xs">
    <div class=" main-form">
        <div id="login" class="content is-size-5 has-text-centered has-text-weight-bold">
            <span class="content has-text-centered is-size-6">Welcome!</span>
            <span class="content has-text-centered is-size-6">You'll be automatically authorized</span>
            <span class="content has-text-centered is-size-6">on the network in a few moments</span>
        </div>
    </div>
</div>

</body>
</html>