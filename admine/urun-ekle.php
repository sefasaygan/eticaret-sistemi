<?php include "header.php";


?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8 offset-2">
                                <div class="card">
                                    <div class="card-header">Ürün Ekle  <div 
                                        class="text-right" style="margin-top: -30px;">
                                       <a href="urunler.php"> <button  type="submit" class="btn btn-xs btn-warning "><i class="fa fa-undo-alt "></i> Geri Dön</button></a></div></div>

                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Ürününüzü Hemen oluşturun</h3>
                                        </div>
                                        <hr>
                                            <?php 


if(isset($_POST['ekle'])){
    @$baslik=$_POST['baslik'];
     @$fiyat=$_POST['fiyat'];
     @$aciklama=$_POST['aciklama'];
     @$kategori=$_POST['kategori'];



if(isset($_FILES['dosya'])){
   $hata = $_FILES['dosya']['error'];
   if($hata != 0) {
        header("Location:urun-ekle.php?durum=yuklemehatasi");
   } else {
      $boyut = $_FILES['dosya']['size'];
      if($boyut > (1024*1024*5)){
           header("Location:urun-ekle.php?durum=boyut");
      } else {
         $tip = $_FILES['dosya']['type'];
         $isim = $_FILES['dosya']['name'];
         $uzanti = explode('.', $isim);
         $uzanti = $uzanti[count($uzanti)-1];
         if($tip == 'image/jpeg' || $tip == 'image/png' || $uzanti == 'jpg' ||  $uzanti == 'png') {
            $dosya = $_FILES['dosya']['tmp_name'];
            $do='img/urun/' .time().$_FILES['dosya']['name'];
            copy($dosya, "../".$do);
            $vt = new Veritabanim();
          $sonuc = $vt->ekle("urunler",array("baslik"=>$baslik,"seo"=>seo($baslik),"fiyat"=>$fiyat,"icerik"=>$aciklama,"kategori"=>$kategori,"resim"=>$do));
         } else {
           header("Location:urun-ekle.php?durum=resimgonderin");
         }
      }
   }
}


if($sonuc){
     header("Location:urun-ekle.php?durum=basarili");
}else{
 header("Location:urun-ekle.php?durum=hataolustu");
}

}


// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("hataolustu","Ürün eklenirken hata oluştu.","danger");
islemuyarisi("basarili","Başarıyla Ürün eklendi.","success");
islemuyarisi("resimgonderin","Yalnızca JPG ve PNG dosyaları gönderebilirsiniz.","danger");
islemuyarisi("boyut","Dosya 5MB den büyük olamaz.","danger");
islemuyarisi("yuklemehatasi","Yüklenirken bir hata gerçekleşti.","danger");
?>


                                        <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ürün Başlığı</label>
                                                <input name="baslik" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Ürün Fiyatı</label>
                                                <input id="cc-name"name="fiyat" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Ürün Kısa Açıklaması</label>
                                                <input id="cc-number" name="aciklama" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Kategori</label>
                                               
                                                    <select name="kategori" id="select" class="form-control">
                                                        <option value="0">Seçiniz</option>
                                                        <?php 
                                                        $sorgu = $vt->select("kategori","");

                        if($sorgu != null) foreach( $sorgu as $satir ) { ?> 
                        <option value="<?php echo $satir["id"];  ?>"><?php echo $satir["kategoriad"];  ?></option>
                                                    <?php } ?>
                                                    </select>
                                               
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Resim yükle</label>
                                               
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
