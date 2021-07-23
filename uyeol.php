<?php
$title2="Kaydol - I Rock The 80s";
 include "header.php";
?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Kayıt ol</h1>
				
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4></h4>
							<p>Sitemize giriş yaparak alışverişlerinizi kolayca yapabilirsiniz.</p>
							<a class="primary-btn" href="giris">Giriş Yap</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Kayıt Ol</h3>

						

						<form class="row login_form" action="" method="post"  >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control"  name="adsoyad" placeholder="Ad Soyad" >
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control"  name="kullaniciadi" placeholder="Kullanıcı adı" >
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control"  name="eposta" placeholder="E posta Adresi" >
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control"  name="sifre" placeholder="Şifre">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control"  name="sifre2" placeholder="Şifre Tekrar">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit"  name="kayit" class="primary-btn">Kayıt Ol</button>
								
							</div>
						</form>
<?php



                        if(isset($_POST['kayit'])){
                        		@$adsoyad=$_POST['adsoyad'];
                        		 @$kullaniciadi=$_POST['kullaniciadi'];
                        		 @$eposta=$_POST['eposta'];
                        		 @$sifre2=md5($_POST['sifre2']);
	                        	 @$sifre=md5($_POST['sifre']);

if ($sifre==$sifre2) {

if (empty($kullaniciadi) || empty($eposta) || empty($sifre) || empty($adsoyad)) {
		header("Location:uyeol.php?durum=bosgecemezsiniz");
}else{

                           		  $vt = new Veritabanim();
          $sonuc = $vt->ekle("kullanici",array("adsoyad"=>$adsoyad,"kullaniciadi"=>$kullaniciadi,"eposta"=>$eposta,"sifre"=>$sifre2));

if($sonuc){
    header("Location:uyeol.php?durum=basarili");
}else{
	 header("Location:uyeol.php?durum=basarisiz");
}
             }              		
                      }
                      else{
                      	header("Location:uyeol.php?durum=aynidegil");
                      }
	                     
	                        
		                

												}

// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("basarili","Başarıyla üye oldunuz.","success");
islemuyarisi("basarisiz","üye olurken hata oluştu.","danger");
islemuyarisi("aynidegil","Şifreler aynı değil.","danger");
islemuyarisi("bosgecemezsiniz","Boş bırakarak geçemezsiniz.","danger");
						?>

						

                        

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<?php include "footer.php";
?>