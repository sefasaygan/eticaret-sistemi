<?php
$title2="Giriş Yapın - I Rock The 80s";
 include "header.php";
?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Giriş Yap / Kayıt ol</h1>
				
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
							<h4>Web sitemizde yeni misiniz?</h4>
							<p>Sitemize üye olarak alışverişlerinizi kolayca yapabilirsiniz.</p>
							<a class="primary-btn" href="uyeol">Hesap oluşturun</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Giriş Yap</h3>

						

						<form class="row login_form" action="" method="post"  >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control"  name="kullaniciadi" placeholder="Kullanıcı adı" >
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control"  name="sifre" placeholder="Şifre">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit"  name="giris" class="primary-btn">Giriş</button>
								
							</div>
						</form>
<?php




                        if(isset($_POST['giris'])){
                        
                        		 @$kullaniciadi=$_POST['kullaniciadi'];
	                        	 @$sifre=md5($_POST['sifre']);
                        		$vt = new Veritabanim();
                           		 $sorgu = $vt->select("kullanici","where kullaniciadi='".$kullaniciadi."' AND sifre='".$sifre."'");


                           		
                        foreach( $sorgu as $satir ) { if($satir['id']){$al=1;  $_SESSION["ixdim"]=$satir['id'];  }else{$al=0;}  }
	                          
	                          if($al>0){
 							  $_SESSION["kullaniciadi"]=$kullaniciadi;
			                  @header("Location: panel");
			                  		echo "başarılı";
	                          }
	                          else{
	                          	 header("Location:giris.php?durum=girisyapilamadi");
		                     }
	                     
	                        
		                

}

// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("girisyapilamadi","Kullanıcı adı veya şifre yanlış","danger");

						?>

						

                        

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<?php include "footer.php";
?>