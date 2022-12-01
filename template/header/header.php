<?php
require_once __DIR__ . '/../../functions/penting.php';

$allgeo = $file_penting->curl_get_contents('http://ip-api.com/json/?fields=8216');
$decodegeo = json_decode($allgeo, true);
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title><?php echo $_ENV['NAMA_WEB']  ?> | Perpustakaan Online</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/256x256/Logo.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/32x32/Logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/16x16/Logo.png">
  <link rel="shortcut icon" type="image/x-icon" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/32x32/Logo.png">
  <meta name="theme-color" content="#ffffff">
  <script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/overlayscrollbars/OverlayScrollbars.min.js"></script>

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="<?php echo $_ENV['LINK_WEB']  ?>vendor/swiper/swiper-bundle.min.css?v=1.0.0" rel="stylesheet">
  <link href="<?php echo $_ENV['LINK_WEB']  ?>vendor/hamburgers/hamburgers.min.css?v=1.0.0" rel="stylesheet">
  <link href="<?php echo $_ENV['LINK_WEB']  ?>vendor/loaders.css/loaders.min.css?v=1.0.0" rel="stylesheet">
  <link href="<?php echo $_ENV['LINK_WEB']  ?>assets/css/theme.min.css?v=1.0.0" rel="stylesheet" />
  <link href="<?php echo $_ENV['LINK_WEB']  ?>assets/css/user.min.css?v=1.0.0" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
</head>

<body>
  <div class="bg-primary py-3 d-none d-sm-block text-white fw-bold">
    <div class="container">
      <div class="row align-items-center gx-4">
        <div class="col-auto d-none d-lg-block fs--1"><span class="fas fa-map-marker-alt text-warning me-2" data-fa-transform="grow-3"></span><?php echo $decodegeo['regionName'] ?> </div>
        <div class="col-auto ms-md-auto order-md-2 d-none d-sm-flex fs--1 align-items-center"><span class="fas fa-clock text-warning me-2" data-fa-transform="grow-3"></span><?php echo $decodegeo['query'] ?></div>
      </div>
    </div>
  </div>
  <div class="sticky-top navbar-elixir">
    <div class="container">
      <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="index.php"><img src="assets/img/Logo.png?v=1.0.0" alt="logo" /></a><button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
        <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
          <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
            <li class="nav-item "><a class="nav-link" href="index.php" role="button">Home</a></li>
            <li class="nav-item "><a class="nav-link" href="<?php echo $_ENV['LINK_WEB']  ?>category/book.php" role="button">Category</a></li>
            <li class="nav-item "><a class="nav-link" href="<?php echo $_ENV['LINK_WEB']  ?>category/mybook.php" role="button">My Book</a></li>
            <li class="nav-item "><a class="nav-link" href="<?php echo $_ENV['LINK_WEB']  ?>about/about.php" role="button">About Us</a></li>
          </ul>
          <li class="nav-item dropdown d-lg-inline-block ms-auto my-0 my-lg-0">
            <p class="text-primary">Hallo, User</p>
            <a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="far fa-user"></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="">User</a></li>
              <li><a class="dropdown-item" href="auth/login.php">Login</a></li>
              <li><a class="dropdown-item" href="auth/logout.php">Logout</a></li>
            </ul>
          </li>
        </div>
      </nav>
    </div>
  </div>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <div class="preloader" id="preloader">
      <div class="img loader">
        <img src="<?php echo $_ENV['LINK_WEB']  ?>assets/img/Logo.png?v=1.0.0" alt="logo" />
      </div>
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
    </div>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="preloader" id="preloader">
        <div class="img loader">
          <img src="<?php echo $_ENV['LINK_WEB']  ?>assets/img/Logo.png" alt="logo" />
        </div>
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
      </div>
      </div>
      <?php

      ?>