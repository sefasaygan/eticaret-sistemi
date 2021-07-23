<?php
$title2="Ürünler - I Rock The 80s";
 include "header.php";

?>


	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Ürün Listesi</h1>
					
				</div>
			</div>
		</div>
	</section><br>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">

			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Kategoriler</div>
					<ul class="main-categories">
						
<li class="main-nav-list hvr-forward"><a href="urunler">Tüm Ürünler</a></li>
						<?php
$vt = new Veritabanim();

$sorgu = $vt->select("kategori","");

if($sorgu != null) foreach( $sorgu as $satir ) { 
 	
 	if(@$satir["seo"]==@$_GET['ad']){$urunkat=$satir['id']; $urunad=$satir["kategoriad"];}
 
			 ?>
						
						<li class="main-nav-list hvr-forward"><a href="urunler-<?php echo $satir["seo"];  ?>"><?php echo $satir["kategoriad"];  ?></a></li>
						
						<?php } ?>
					</ul>
				</div>
				
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7" >
				<!-- Start Filter Bar -->
				<div class="filter-bar " >
					
						<h5 style="    padding-top: 15px; color:white;"><?php if(isset($urunad)){echo $urunad." ";}else{ echo "Tüm Ürünler";}  ?></h5>
					
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list sidebar-categories" >
					<div class="row ">
						<?php
if(isset($_GET['ad'])){

	$sorgu = $vt->select("urunler","where kategori='$urunkat' order by timestamp desc");
}else{
$sorgu = $vt->select("urunler","order by timestamp desc");

}

if($sorgu != null) foreach( $sorgu as $satir ) { 
 	$urun=$satir['id'];
 
			 ?>
						<!-- single product -->
						<div class="col-lg-4 col-md-6 hvr-bounce-in "  >
							<a href="<?php echo seo($satir["baslik"]);  ?>" >
							<div class="single-product main-categories">
								<img class="img-fluid" style="    margin-top: 10px; width: 250px; height: 200px;" src="<?php echo $satir['resim'];  ?>" alt="">
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
						</div>
						<?php } ?>
					
					</div>
				</section>
				<!-- End Best Seller -->
				
			</div>
		</div>
	</div>

	

	<?php include "footer.php";
?>
