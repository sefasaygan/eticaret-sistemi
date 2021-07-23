<?php include "header.php";





$vt = new Veritabanim();
$sorgu = $vt->select("slider","");
if($sorgu != null) foreach( $sorgu as $satir ) { 
    $urun=$satir['id'];
$katta=$satir["baslik"];

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
                                                <input id="cc-name" name="eklemetarihi" type="text" disabled class="form-control" value="<?php echo $satir["eklemetarihi"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Slider Başlığı</label>
                                                <input name="baslik" type="text" class="form-control" value="<?php echo $satir["baslik"];  ?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Slider İçerik</label>
                                                <input id="cc-name"name="icerik" type="text" class="form-control" value="<?php echo $satir["icerik"];  ?>">
                                            </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Slider yükle</label>
                                               
                                                   <input id="cc-number" name="dosya" type="file" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                               
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
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
                                       <a href="sliderekle.php"> <button  type="submit" class="btn btn-xs btn-primary "><i class="fa fa-plus "></i> Slider Ekle</button></a></div><br><?php 


if(isset($_POST['duzenle'])){
    @$baslik=$_POST['baslik'];
     @$icerik=$_POST['icerik'];
     @$eklemetarihi=$_POST['eklemetarihi'];
     @$resimurl=$_POST['resimurl'];
     @$idim=$_POST['idim'];



if(isset($_FILES['dosya'])){
    if(@strlen($_FILES['dosya'])>0 || $_FILES['dosya']['size']>0){
   $hata = $_FILES['dosya']['error'];
   if($hata != 0) {
     header("Location:sliderler.php?durum=yuklemehatasi");
      
   } else {
      $boyut = $_FILES['dosya']['size'];
      if($boyut > (1024*1024*5)){
          header("Location:sliderler.php?durum=boyut");
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
          $sonuc = $vt->idGuncelle("slider",array("baslik"=>$baslik,"icerik"=>$icerik,"resimurl"=>$do),$idim);
         } else {
               header("Location:sliderler.php?durum=resimgonderin");
           
         }
      }
   }
}else{
    $vt = new Veritabanim();
          $sonuc = $vt->idGuncelle("slider",array("baslik"=>$baslik,"icerik"=>$icerik),$idim);

}
}


if($sonuc){
   header("Location:sliderler.php?durum=basarili");
}else{
  header("Location:sliderler.php?durum=hataolustu");

}

}



   
$gsil=@$_GET['silbeni'];
    if(isset($gsil)){
$sonuc = sili("slider","id=$gsil");
if($sonuc){
     header("Location:sliderler.php?durum=silmebasarili");
}else{
 header("Location:sliderler.php?durum=silmehatali");


}}

// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("hataolustu","Slider güncellenirken hata oluştu.","danger");
islemuyarisi("basarili","Slider güncellendi.","success");

islemuyarisi("resimgonderin","Yalnızca JPG ve PNG dosyaları gönderebilirsiniz.","danger");
islemuyarisi("boyut","Dosya 5MB den büyük olamaz.","danger");
islemuyarisi("yuklemehatasi","Yüklenirken bir hata gerçekleşti.","danger");


islemuyarisi("silmebasarili","Slideri Sildiniz.","success");
islemuyarisi("silmehatali","Slider Silinirken hata oluştu.","danger");



?>
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                
                                                <th width="150px">Slider Resmi</th>
                                                
                                                <th>Slider Başlığı</th>
                                                <th width="150px">İçerik</th>
                                                <th width="20px">Eklenme Tarihi</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
$vt = new Veritabanim();
$sorgu = $vt->select("slider","");
if($sorgu != null) foreach( $sorgu as $satir ) { 
    $urun=$satir['id'];
$katta=$satir["baslik"];

  
             ?>
                                            <tr>
                                                
                                                <td><img src="../<?php echo $satir["resimurl"];  ?>" class="img-thumbnail" width="100px" height="100px"></td>
                                                <td><?php echo $satir["baslik"];  ?></td>
                                                <td><?php echo $satir["icerik"];  ?></td>
                                                <td class="process"><?php echo $satir["eklemetarihi"];  ?></td>
                                                 <td>
                                                    <div class="table-data-feature">
                                                          
                                                        </button></a>
                                                        <span   data-toggle="modal" data-target="#mediumModal<?php echo $satir["id"];  ?>">
                                                        <button class="item" data-toggle="tooltip" type="button"  data-target="#mediumModal"  data-placement="top" title="Düzenle ">
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
