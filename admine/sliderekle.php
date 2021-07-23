<?php include "header.php";


?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8 offset-2">
                                <div class="card">
                                    <div class="card-header">Slider Ekle  <div 
                                        class="text-right" style="margin-top: -30px;">
                                       <a href="sliderler.php"> <button  type="submit" class="btn btn-xs btn-warning "><i class="fa fa-undo-alt "></i> Geri Dön</button></a></div></div>

                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Sliderinizi Hemen oluşturun</h3>
                                        </div>
                                        <hr>
                                            <?php 


if(isset($_POST['ekle'])){
    @$baslik=$_POST['baslik'];
     @$icerik=$_POST['icerik'];
     



if(isset($_FILES['dosya'])){
   $hata = $_FILES['dosya']['error'];
   if($hata != 0) {
       header("Location:sliderekle.php?durum=yuklemehatasi");
   } else {
      $boyut = $_FILES['dosya']['size'];
      if($boyut > (1024*1024*5)){
         header("Location:sliderekle.php?durum=boyut");
      } else {
         $tip = $_FILES['dosya']['type'];
         $isim = $_FILES['dosya']['name'];
         $uzanti = explode('.', $isim);
         $uzanti = $uzanti[count($uzanti)-1];
         if($tip == 'image/jpeg' || $tip == 'image/png' || $uzanti == 'jpg' ||  $uzanti == 'png') {
            $dosya = $_FILES['dosya']['tmp_name'];
            $do='img/banner/' .time().$_FILES['dosya']['name'];
            copy($dosya, "../".$do);
            $vt = new Veritabanim();
          $sonuc = $vt->ekle("slider",array("baslik"=>$baslik,"icerik"=>$icerik,"resimurl"=>$do));
         } else {
               header("Location:sliderekle.php?durum=resimgonderin");
           
         }
      }
   }
}


if($sonuc){
     header("Location:sliderekle.php?durum=basarili");
}else{
  header("Location:sliderekle.php?durum=hataolustu");

}

}

// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("hataolustu","Slider eklenirken hata oluştu.","danger");
islemuyarisi("basarili","Slider eklendi.","success");
islemuyarisi("resimgonderin","Yalnızca JPG ve PNG dosyaları gönderebilirsiniz.","danger");
islemuyarisi("boyut","Dosya 5MB den büyük olamaz.","danger");
islemuyarisi("yuklemehatasi","Yüklenirken bir hata gerçekleşti.","danger");



?>


                                        <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Slider Başlığı</label>
                                                <input name="baslik" type="baslik" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Slider İçerik</label>
                                                <input id="cc-number" name="icerik" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Slider Seç</label>
                                               
                                                   <input id="cc-number" name="dosya" type="file" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                               
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div>
                                                <button id="payment-button" type="submit" name="ekle" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-plus fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">EKLE</span>
                                                    <span id="payment-button-sending" style="display:none;">Ekleniyor…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                            
                        </div>
                       <?php include "footer.php";
?>
<!-- end document-->
