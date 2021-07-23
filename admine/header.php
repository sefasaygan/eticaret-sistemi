<?php require_once "../php/veritabani.php"; 
 require_once "../php/ayar.php"; 
@session_start();
if(!isset($_SESSION["eposta"])){ header("Location:giris.php");}
 ?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>E-ticaret Yönetim Paneli</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h3>Yönetim Paneli</h3>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                       <li class="active has-sub">
                            <a href="index.php">
                                <i class="fas fa-home"></i>Anasayfa</a>
                        </li>
                        <li>
                            <a lass="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Ürün Yönetimi</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="urunler.php">Ürünler</a>
                                </li>
                                <li>
                                    <a href="urun-ekle.php">Ürün Ekle</a>
                                </li>
                                <li>
                                    <a href="sliderler.php">Sliderler</a>
                                </li>
                               
                            </ul>
                        </li>
                        <li>
                            <a lass="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Slider Yönetimi</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="sliderler.php">Sliderler</a>
                                </li>
                                <li>
                                    <a href="sliderekle.php">Ürün Ekle</a>
                                </li>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="kullanicilar.php">
                                <i class="fas fa-chart-bar"></i>Kullanıcı Yönetimi</a>
                        </li>
                        <li>
                            <a href="satinalinan.php">
                                <i class="fas fa-chart-bar"></i>Satınalma ve Kargo Yönetimi</a>
                        </li>
                        <li>
                            <a href="iletisim.php">
                                <i class="fas fa-chart-bar"></i>İletişim Kutusu</a>
                        </li>
                        
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h3>Yönetim Paneli</h3>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        
                        <li class="active has-sub">
                            <a href="index.php">
                                <i class="fas fa-home"></i>Anasayfa</a>
                        </li>
                          <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Ürün Yönetimi</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="urunler.php">Ürünler</a>
                                </li>
                                <li>
                                    <a href="urun-ekle.php">Ürün Ekle</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-image"></i>Slider Yönetimi</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="sliderler.php">Sliderler</a>
                                </li>
                                <li>
                                    <a href="sliderekle.php">Slider Ekle</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="kullanicilar.php">
                                <i class="fas fa-user"></i>Kullanıcı Yönetimi</a>
                        </li>
                        <li>
                            <a href="satinalinan.php">
                                <i class="fas fa-desktop"></i>Satınalma ve Kargo Yönetimi</a>
                        </li>
                        <li>
                            <a href="iletisim.php">
                                <i class="fas fa-inbox"></i>İletişim Kutusu</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                               
                            </form>
                            <div class="header-button">
                               
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                       
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?=$_SESSION["adsoyad"]?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                               
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?=$_SESSION["kullaniciadi"]?></a>
                                                    </h5>
                                                    <span class="email"><?=$_SESSION["eposta"]?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="profil.php">
                                                        <i class="zmdi zmdi-account"></i>Hesabım</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="cikis.php">
                                                    <i class="zmdi zmdi-power"></i>Çıkış</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->