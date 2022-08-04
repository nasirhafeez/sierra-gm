<?php
require 'header.php';

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

    <div class="page">
        <img src="assets/images/background-desktop.png" alt="" class="img-responsive hidden-xs">
        <img src="assets/images/background-tablet-portrait.png" alt="" class="img-responsive tablet-potrait-view">
        <div class=" main-form">
            <div id="login" class="content is-size-5 has-text-centered has-text-weight-bold">
                <span class="join-today">Hello there.</span>
                <span class="quick">It's time to enjoy some</span>
                <br>
                <span class="quick">Complimentary Wifi!</span>
            </div>
            <form class="browse-form" method="get" action="https://www.google.com">
                <div class="sign-in-btn">
                    <button class="">BROWSE INTERNET</button>
                </div>
                <div class="buttons is-centered">
                    <figure id="logoz">
                        <h2 class="sponser-by">sponsored by</h2>
                        <img class="logo" src="assets/images/logo.png">
                    </figure>
                </div>
                <span class="please-note">Please Note:</span>
                <br>
                <span class="note">Due to network load restrictions, we are</span>
                <br>
                <span class="note">unable to stream video on this service at</span>
                <br>
                <span class="note">this time. As well, certain websites may</span>
                <br>
                <span class="note">not be available as they violate our</span>
                <br>
                <span class="note">Terms of Use.</span>
                <br>
                <span class="note">We apologize for any inconvenience and</span>
                <br>
                <span class="note">hope you enjoy use of the WiFi service.</span>
                <br>
            </form>
        </div>
    </div>

</body>

</html>