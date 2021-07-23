<?php

 include "header.php";

?>



	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel" style="     background: #f7f3f36e;
    padding: 20px;
    padding-top: 10px;
    padding-bottom: 40px;
    margin-top: 40px;">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Linkin Park </h1>
									<p>Aradığınız metal ürünlerini satın almak için sitemizden alışveriş yapabilirsiniz</p>
									<div class="add-bag d-flex align-items-center">
									
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/banner-img.png"  alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h1>Bring Me The Horizon  <br></h1>
									<p>Aradığınız metal ürünlerini satın almak için sitemizden alışveriş yapabilirsiniz</p>
									
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/bmth3.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Ücretsiz teslimat</h6>
						<p>Tüm sipariş ücretsiz kargo</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>
						İade politikasi</h6>
						<p>Tüm sipariş ücretsiz kargo</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>7/24 Destek</h6>
						<p>Tüm sipariş ücretsiz kargo</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Güvenli Ödeme</h6>
						<p>Tüm sipariş ücretsiz kargo</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-11 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div><a href="urunler-bring-me-the-horizon" target="_blank">
								<img class="img-fluid w-100" src="img/category/bm.jpg" style="height: 220px;" alt="">
								
									<div class="deal-details">
										<h6 class="deal-title">Bring Me The Horizon Ürünler</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div><a href="urunler-breaking-benjamin"  target="_blank">
								<img class="img-fluid w-100" src="img/category/brek.jpg" style="height: 220px;" alt="">
								
									<div class="deal-details">
										<h6 class="deal-title">Breaking Benjamin Ürünler</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>	<a href="urunler-linkin-park"  target="_blank">
								<img class="img-fluid w-100" src="img/category/linkin.jpg" style="height: 220px;" alt="">
							
									<div class="deal-details">
										<h6 class="deal-title">Linkin Park Ürünler</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div><a href="urunler-bullet-for-my-vallentine"  target="_blank">
								<img class="img-fluid w-100" src="img/category/bfm.jpg"  style="height: 220px;" alt="">
								
									<div class="deal-details">
										<h6 class="deal-title">Bullet For My Vallentine Ürünler</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->





	<!-- start product Area -->
	<section class="owl-carousel  section_gap sidebar-categories">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container"><hr>
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>En Son Ürünler</h1>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product --><?php

$sorgu = $vt->select("urunler"," LIMIT 4");
 $say=1;
if($sorgu != null) foreach( $sorgu as $satir ) {  $say++;
 	$urun=$satir['id'];
 
			 ?>
					<div class="col-lg-3 col-md-6 hvr-bounce-in" >
						<a href="<?php echo seo($satir["baslik"]);  ?>" >
							<div class="single-product main-categories" >
								<img class="img-fluid" style="    margin-top: 10px;" src="<?php echo $satir['resim'];  ?>" alt="">
								<div class="product-details">
									<h6><?php echo $satir["baslik"];  ?></h6>
									<div class="price">
										<h6><?php echo $satir["fiyat"];  ?>TL</h6>
										<h6 class="l-through"><?php echo ($satir["fiyat"]+50);  ?>TL</h6>
									</div>
									<div class="prd-bottom text-center">
										
										<a href="<?php echo seo($satir["baslik"]);  ?>" class="primary-btn" style="font-size: 10px;     padding: 0 20px;" >
											Ürün Detay
										</a>
									</div>
								</div>
							</div></a>
					</div><?php } ?>
					<!-- single product -->
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title"><br>
							<h6><a href="urunler" class="primary-btn"> Tüm ürün listesi</a></h6>
						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>
		<!-- single product slide -->
		
	</section>
	<!-- end product Area -->

<?php include "footer.php";
?>


	

	