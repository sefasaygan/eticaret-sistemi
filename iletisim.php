<?php 
$title2="İletişim - I Rock The 80s";
include "header.php";
?>


	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>İletişim</h1>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
<?php 


if(isset($_POST['iletisim'])){
   @$name=$_POST['name'];
     @$email=$_POST['email'];
     @$subject=$_POST['subject'];
     @$message=$_POST['message'];

echo $name;
 $vt = new Veritabanim();

  $sonuc = $vt->ekle("iletisim",array("adsoyad"=>$name,"eposta"=>$email,"baslik"=>$subject,"mesaj"=>$message));

          


if($sonuc){
  header("Location:iletisim.php?durum=basarili");
}else{
   header("Location:iletisim.php?durum=hata");
}

}





?>



<?php 


// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("basarili","Mesajınız Gönderildi","success");
islemuyarisi("hata","Mesajınız Gönderilirken bir hata oluştu.","danger");

 ?>
	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom" style="margin-top: 50px;">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-3">
					<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h6><?=$adr?></h6>
							<p>Ofisimizde çayımızı içmeye bekleriz</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h6><a href="tel:<?=$telefon?>"><?=$telefon?></a></h6>
							<p>Hafta içi 09:00 & 17:00 arası müşteri hizmetleri</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h6><a href="mailto:<?=$epost?>"><?=$epost?></a></h6>
							<p>Her gün destek verilebilir eposta</p>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<form class="row contact_form" action="" method="post" >
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Ad soyadınız" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ad Soyad boş geçilemez'">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="E posta adresiniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Eposta boş geçilemez'">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Mesaj Başlığı" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mesaj Başlığı boş geçilemez'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Mesajınız" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mesaj boş geçilemez'"></textarea>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button type="submit" value="submit" name="iletisim" class="primary-btn">Mesajı Gönder</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--================Contact Area =================-->

	<?php include "footer.php";
?>