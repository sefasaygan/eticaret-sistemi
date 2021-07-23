	<?php
	$uruns=$_GET['urunad'];
$title2="$uruns Ürün Detayı - I Rock The 80s";
	 include "header.php";

?>
<?php
if(isset($_GET['urunad'])){
 
	$sorgu = $vt->select("urunler","where seo='$uruns'");
if($sorgu != null) foreach( $sorgu as $satir ) { 
	$urun=$satir['id'];
 	 ?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1><?=$satir['baslik']?></h1>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?=$satir['resim']?>" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="<?=$satir['resim']?>" alt="">
						</div>
						

					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?=$satir['baslik']?></h3>
						<h2><?=$satir['fiyat']?> ₺ </h2>
						<h2 ></h2>
						
						<p><?=$satir['icerik']?></p>
						
						<div class="card_area d-flex align-items-center">
							<?php echo (isset($_COOKIE['urun'][$urun]) ? '<a href="#" class="primary-btn" >Sepete Eklendi</a>' : '<a href="?ekle='.$urun.'" class="primary-btn">sepete ekle</a>'); ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Açıklama</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p><?=$satir['icerik']?></p>
					
				</div>
				
			
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

	<?php
 }

}


			 ?>
	<?php include "footer.php";
?>
