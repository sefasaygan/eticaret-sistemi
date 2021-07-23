<?php @session_start();
ob_start();

 require_once "php/veritabani.php"; 
 require_once "php/ayar.php"; ?>
 
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title><?php if(isset($title2)){ echo $title2; }else{ echo $title;} ?></title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="css/hover.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h hvr-bounce-in" href="index"><img src="img/logo.png" width="190" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php
					if($_SERVER['REQUEST_URI']=="/staj/hakkimizda"){
						$actives1="active";
					}elseif ($_SERVER['REQUEST_URI']=="/staj/urunler") {
						$actives2="active";
					}elseif ($_SERVER['REQUEST_URI']=="/staj/iletisim") {
						$actives3="active";
					}else{
						$actives="active";
					} ?>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item  <?=$actives?> hvr-wobble-horizontal" ><a class="nav-link" href="index">Anasayfa</a></li>
							<!--
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
								</ul>
							</li>-->
							<li class="nav-item <?=$actives1?> submenu dropdown">
								<a href="hakkimizda" class="nav-link  dropdown-toggle hvr-wobble-horizontal" aria-haspopup="true"
								 aria-expanded="false">Hakkımızda</a>
								
							</li>
							<li class="nav-item <?=$actives2?> submenu dropdown">
								<a href="urunler" class="nav-link  dropdown-toggle hvr-wobble-horizontal" aria-haspopup="true"
								 aria-expanded="false">Ürünler</a>
								
							</li>
	<!--

							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
									<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
								</ul>
							</li>  -->
							<li class="nav-item <?=$actives3?> hvr-wobble-horizontal"><a class="nav-link" href="iletisim">İletişim</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right ">
							<li class="nav-item hvr-pop"><a href="sepet" class="cart"><span class="ti-bag"></span> <?php if(@$_COOKIE['urun']){ echo "(".count($_COOKIE['urun']).")"; } ?> </a></li>
							
							<?php 
								if(isset($_SESSION["kullaniciadi"])){
									echo '<li class="nav-item hvr-pop"><a href="panel" class="cart"><span class="fa fa-user"></span></a></li>';
									echo '<li class="nav-item hvr-pop"><a href="cikis" class="cart"><span class="fa fa-sign-out"></span></a></li>';
								}else{
									echo '<li class="nav-item hvr-pop"><a href="giris" class="cart"><span class="fa fa-user"></span></a></li>';
								}
						
							?>
							
						</ul>
					</div>
				</div>
			</nav>
		</div>
		
	</header>
	<!-- End Header Area -->
