<?php include "header.php";





$vt = new Veritabanim();
$sorgu = $vt->select("urunler","");
if($sorgu != null) foreach( $sorgu as $satir ) { 
    $urun=$satir['id'];
$katta=$satir["kategori"];

    $sorgus = $vt->select("kategori","where id=$katta");
if($sorgu != null) foreach( $sorgus as $satirm ) { $allla=$satirm['kategoriad']; }
?>
<!-- modal medium -->
            <div class="modal fade" id="mediumModal<?php echo $satir["id"];  ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><?php echo $satir["baslik"];  ?> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                               <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                 <input type="hidden" name="idim" value="<?php echo $satir["id"];  ?>">
                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Ekleme Tarihi</label>
                                                <input id="cc-name" name="fiyat" type="text" disabled class="form-control" value="<?php echo $satir["timestamp"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ürün Başlığı</label>
                                                <input name="baslik" type="text" class="form-control" value="<?php echo $satir["baslik"];  ?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Ürün Fiyatı</label>
                                                <input id="cc-name"name="fiyat" type="text" class="form-control" value="<?php echo $satir["fiyat"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Ürün Kısa Açıklaması</label>
                                                <input id="cc-number" name="aciklama" type="tel" class="form-control " value="<?php echo $satir["icerik"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Kategori</label>
                                               
                                                    <select name="kategori" id="select" class="form-control">
                                                        <option value="0">Seçiniz</option>
                                                        <?php 
                                                        $sorgu = $vt->select("kategori"," ");

                        if($sorgu != null) foreach( $sorgu as $satirm ) { ?> 
                        <option value="<?php echo $satirm["id"];  ?>" <?php if($satir["kategori"]==$satirm["id"]){echo "selected";}   ?> ><?php echo $satirm["kategoriad"];  ?></option>
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
                                            </div><div class="sufee-alert alert with-close alert-info alert-dismissible fade show">
                                           Resim değişimi yapmak istemiyorsanız resim eklemeyiniz.
                                          
                                        </div>
                                            
                                        
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                            <button type="submit" name="duzenle" class="btn btn-primary">Düzenle</button>
                        </div></form>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->
        <?php } ?>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12"><div 
                                        class="text-right" style="margin-top: -30px;">
                                       <a href="urun-ekle.php"> <button  type="submit" class="btn btn-xs btn-primary "><i class="fa fa-plus "></i> Ürün Ekle</button></a></div><br><?php 


if(isset($_POST['duzenle'])){
    @$baslik=$_POST['baslik'];
     @$fiyat=$_POST['fiyat'];
     @$aciklama=$_POST['aciklama'];
     @$kategori=$_POST['kategori'];
     @$idim=$_POST['idim'];



if(isset($_FILES['dosya'])){
    if(@strlen($_FILES['dosya'])>0 || $_FILES['dosya']['size']>0){
   $hata = $_FILES['dosya']['error'];
   if($hata != 0) {
        header("Location:urunler.php?durum=yuklemehatasi");
   } else {
      $boyut = $_FILES['dosya']['size'];
      if($boyut > (1024*1024*5)){
           header("Location:urunler.php?durum=boyut");
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
          $sonuc = $vt->idGuncelle("urunler",array("baslik"=>$baslik,"seo"=>seo($baslik),"fiyat"=>$fiyat,"icerik"=>$aciklama,"kategori"=>$kategori,"resim"=>$do),$idim);
         } else {
 header("Location:urunler.php?durum=resimgonderin");
           
         }
      }
   }
}else{
    $vt = new Veritabanim();
          $sonuc = $vt->idGuncelle("urunler",array("baslik"=>$baslik,"seo"=>seo($baslik),"fiyat"=>$fiyat,"icerik"=>$aciklama,"kategori"=>$kategori),$idim);

}
}


if($sonuc){
    header("Location:urunler.php?durum=basarili");
}else{
 header("Location:urunler.php?durum=hataolustu");
}

}



   
$gsil=@$_GET['silbeni'];
    if(isset($gsil)){
$sonuc = sili("urunler","id=$gsil");
if($sonuc){
     header("Location:urunler.php?durum=silmebasarili");
}else{
 header("Location:urunler.php?durum=silmehatali");

}}

// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("hataolustu","Ürün güncellenirken hata oluştu.","danger");
islemuyarisi("basarili","Başarıyla Ürün güncellendi.","success");

islemuyarisi("resimgonderin","Yalnızca JPG ve PNG dosyaları gönderebilirsiniz.","danger");
islemuyarisi("boyut","Dosya 5MB den büyük olamaz.","danger");
islemuyarisi("yuklemehatasi","Yüklenirken bir hata gerçekleşti.","danger");


islemuyarisi("silmebasarili","Başarıyla  Ürünü Sildiniz.","success");
islemuyarisi("silmehatali","Ürün Silinirken hata oluştu.","danger");
?>
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                
                                                <th width="150px">Ürün Resmi</th>
                                                
                                                <th>Ürün Başlığı</th>
                                                <th width="150px">Ürün kategorisi</th>
                                                <th width="20px">Ürün Fiyatı</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
$vt = new Veritabanim();
$sorgu = $vt->select("urunler"," order by timestamp desc");
if($sorgu != null) foreach( $sorgu as $satir ) { 
    $urun=$satir['id'];
$katta=$satir["kategori"];

    $sorgus = $vt->select("kategori","where id=$katta ");
if($sorgu != null) foreach( $sorgus as $satirm ) { $allla=$satirm['kategoriad']; }
             ?>
                                            <tr>
                                                
                                                <td><img src="../<?php echo $satir["resim"];  ?>" class="img-thumbnail" width="100px" height="100px"></td>
                                                <td><?php echo $satir["baslik"];  ?></td>
                                                <td><?php echo $allla;  ?></td>
                                                <td class="process"><?php echo $satir["fiyat"];  ?>TL</td>
                                                 <td>
                                                    <div class="table-data-feature">
                                                        <a href="../<?php echo $satir["seo"];  ?>" target="_blank">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Ürüne Git" data-original-title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button></a>
                                                        <span   data-toggle="modal" data-target="#mediumModal<?php echo $satir["id"];  ?>">
                                                        <button class="item" data-toggle="tooltip" type="button"  data-target="#mediumModal"  data-placement="top" title="Düzenle">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button></span>
                                                         <a href="?silbeni=<?php echo $satir["id"];  ?>" >
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sil">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button></a>
                                                        
                                                    </div>
                                                </td>
                                            </tr>



                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                       <?php include "footer.php";
?>
<!-- end document-->
