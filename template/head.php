<?php
require_once __DIR__ . '/../../functions/penting.php'; 

?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">


<!-- Mirrored from prium.github.io/elixir/v3.0.0/pages/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jun 2022 14:28:55 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title><?php echo $_ENV['NAMA_WEB']  ?></title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/128x128/Logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/32x32/Logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/16x16/Logo.png">
    <link rel="manifest" href="<?php echo $_ENV['LINK_WEB']  ?>assets/img/favicons/manifest.json">
    <meta name="theme-color" content="#ffffff">
    <script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/overlayscrollbars/OverlayScrollbars.min.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?php echo $_ENV['LINK_WEB']  ?>vendor/swiper/swiper-bundle.min.css?e-lib=1.0.0" rel="stylesheet">
    <link href="<?php echo $_ENV['LINK_WEB']  ?>vendor/hamburgers/hamburgers.min.css?e-lib=1.0.0" rel="stylesheet">
    <link href="<?php echo $_ENV['LINK_WEB']  ?>vendor/loaders.css/loaders.min.css?e-lib=1.0.0" rel="stylesheet">
    <link href="<?php echo $_ENV['LINK_WEB']  ?>assets/css/theme.min.css?e-lib=1.0.0" rel="stylesheet" />
    <link href="<?php echo $_ENV['LINK_WEB']  ?>assets/css/user.min.css?e-lib=1.0.0" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
</head>


<?php require_once $_ENV['LINK_WEB'] . 'template/home/navbar.php'  ?>
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
    <section class="bg-100 py-0 text-center">
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="col-12 px-0">
                    <h1 class="text-300 fw-bolder fs-3 fs-sm-5 fs-md-7 text-uppercase">Blank Page</h1>
                </div>
            </div>
        </div><!-- end of .container-->
    </section><!-- <section> close ============================-->
    <!-- ============================================-->

</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
<?php include_once  $_ENV['LINK_WEB']  . 'template/home/foot.php' ?>