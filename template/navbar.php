<?php
require_once __DIR__ . '/../../functions/penting.php';

$allgeo = $file_penting->curl_get_contents('http://ip-api.com/json/?fields=8216');
$decodegeo = json_decode($allgeo, true);
?>

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
            <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="../index-2.html"><img src="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/64x64/Logo.png" alt="logo" /></a><button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
                <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
                    <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../index-2.html">Slider Header</a></li>
                                <li><a class="dropdown-item" href="../homes/header-slider-classic.html">Slider Classic</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="service.html">Services</a></li>
                                <li><a class="dropdown-item" href="about.html">About</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../news/newsroom.html">Newsroom</a></li>
                                <li><a class="dropdown-item" href="../news/news.html">Single News</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Elements</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../elements/buttons.html">Buttons</a></li>
                                <li><a class="dropdown-item" href="../elements/colors.html">Colors</a></li>
                            </ul>
                        </li>
                </div>
            </nav>
        </div>
    </div>