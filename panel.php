<?php 
$title2="Kullanıcı Paneli - I Rock The 80s";
include "header.php";
if(!isset($_SESSION["kullaniciadi"])){ header("Location:index");}
$vt = new Veritabanim();
$kid=$_SESSION["ixdim"];
$sorgu = $vt->select("kullanici","where id=$kid");
if($sorgu != null) foreach( $sorgu as $satir ) { 

?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1><?php echo "Hoşgeldiniz, ".$_SESSION["kullaniciadi"];
?></h1>
				
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<?php 


if(isset($_POST['bilgiduzenle'])){
     @$adsoyad=$_POST['adsoyad'];
     @$eposta=$_POST['eposta'];
     @$tel=$_POST['tel'];
      @$adres=$_POST['adres'];
        $vt = new Veritabanim();
  $sonuc = $vt->idGuncelle("kullanici",array("adsoyad"=>$adsoyad,"eposta"=>$eposta,"tel"=>$tel,"adres"=>$adres),$kid);


if($sonuc){
  header("Location:panel.php?durum=kullaniciduzenlendi");
}else{
   header("Location:panel.php?durum=kullaniciduzenlenemedi");
}
}



if(isset($_POST['sifreduzenle'])){
     @$sifre=md5($_POST['sifre']);
     @$sifre2=md5($_POST['sifre2']);
        $vt = new Veritabanim();
if($sifre==$sifre2){
	
$sonuc = $vt->idGuncelle("kullanici",array("sifre"=>$sifre),$kid);
 

if($sonuc){
  header("Location:panel.php?durum=kullaniciduzenlendi");
}else{
   header("Location:panel.php?durum=kullaniciduzenlenemedi");
}

}else{
	 header("Location:panel.php?durum=sifreuyusmuyor");
}
     




          



}



?>

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
					<div class="login_form_inner" style=" padding-top: 0px; min-height: 600px; height: auto;">
						<div class="text-center" style="background: #424242; padding-top: 10px;">
					<a class="primary-btn" href="panel">Kullanıcı Panelim</a>  	
					<a class="primary-btn" href="sepet">Sepetteki Ürünlerim</a>
					<a class="primary-btn" href="satinalinan">Satın alınan ürünler</a>
					<a class="primary-btn" href="cikis">Çıkış yap</a>
					</div>

				<?php 


// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN

islemuyarisi("kullaniciduzenlendi","Başarıyla Profiliniz Düzenlendi.","success");
islemuyarisi("kullaniciduzenlenemedi","Profiliniz düzenlenirken hata oluştu.","danger");
islemuyarisi("sifreuyusmuyor","Şifreler aynı değil lütfen aynı şifre giriniz.","danger");

 ?>
				<div class="row">
						
					<div class="col-md-5 offset-1" style="background: #d1d1d145; padding: 20px;">
						<form action="" method="post">
						<h2>Kullanıcı Bilgilerim</h2>
						<div class="form-group">
                                                <label  class="control-label mb-1">Ad Soyad</label>
                                                <input  name="adsoyad" type="text" class="form-control " value="<?php echo $satir["adsoyad"];  ?>">
                                              
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Telefon</label>
                                                <input  name="tel" type="text" class="form-control " value="<?php echo $satir["tel"];  ?>">
                                              
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Eposta</label>
                                                <input  name="eposta" type="text" class="form-control " value="<?php echo $satir["eposta"];  ?>">
                                              
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Adres</label>
                                                <textarea class="form-control " name="adres" ><?php echo $satir["adres"];  ?></textarea>
                                                
                                            </div>
                                             <button  type="submit" name="bilgiduzenle" class="btn btn-sm btn-danger ">
                                                    <i class="fa fa-save "></i>&nbsp;GÜNCELLE
                                                </button>
					</form></div>
					<div class="col-md-5 " style=" padding: 20px;" >
												<form action="" method="post">
						<h2>Şifre Güncelleme</h2>
						 <div class="form-group">
                                                <label  class="control-label mb-1">Şifre</label>
                                                <input  name="sifre" type="text" class="form-control " >
                                              
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Şifre Tekrar</label>
                                                <input  name="sifre2" type="text" class="form-control " >
                                              
                                            </div>
                                            <button  type="submit" name="sifreduzenle" class="btn btn-sm btn-danger ">
                                                    <i class="fa fa-save "></i>&nbsp;GÜNCELLE
                                                </button></form>
					</div>
						
					</div>
				</div>

						

						

                        

					</div>
				</div>
			</div>
		</div>
	</section><?php } ?>
	<!--================End Login Box Area =================-->

	<?php include "footer.php";
?>