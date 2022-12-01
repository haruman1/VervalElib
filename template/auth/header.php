<?php

require_once __DIR__ . '/../../functions/penting.php';
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title><?php echo $_ENV['NAMA_WEB']  ?> &amp; - Authorize</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_ENV['LINK_WEB'] ?>assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_ENV['LINK_WEB'] ?>assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_ENV['LINK_WEB'] ?>assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_ENV['LINK_WEB'] ?>assets/img/favicons/favicon.ico">
    <!-- <link rel="manifest" href="<?php echo $_ENV['LINK_WEB'] ?>assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?php echo $_ENV['LINK_WEB'] ?>assets/img/favicons/mstile-150x150.png"> -->
    <meta name="theme-color" content="#ffffff">
    <script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/overlayscrollbars/OverlayScrollbars.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.min.css"> -->
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?php echo $_ENV['LINK_WEB'] ?>vendor/hamburgers/hamburgers.min.css" rel="stylesheet">
    <link href="<?php echo $_ENV['LINK_WEB'] ?>vendor/loaders.css/loaders.min.css" rel="stylesheet">
    <link href="<?php echo $_ENV['LINK_WEB'] ?>assets/css/theme.min.css" rel="stylesheet" />
    <link href="<?php echo $_ENV['LINK_WEB'] ?>assets/css/user.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="preloader" id="preloader">
            <div class="loader">
                <div class="line-scale">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        <!-- ============================================-->
        <!-- <section> begin ============================-->