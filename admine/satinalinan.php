<?php include "header.php";





$vt = new Veritabanim();


$sorgu = $vt->selectjoin("
SELECT * FROM satinal AS al
JOIN kullanici  AS kul ON al.kim_id=kul.id
JOIN urunler  AS urun ON al.urun_id=urun.id
");
if($sorgu != null) foreach( $sorgu as $satir ) { 


?>
<!-- modal medium -->
            <div class="modal fade" id="mediumModal<?php echo $satir["sid"];  ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><?php echo $satir["baslik"];  ?> <small>Ürün durumu</small></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                               <form action="" method="post"  novalidate="novalidate">
                                 <input type="hidden" name="idim" value="<?php echo $satir["sid"];  ?>">
                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Kayıt Tarihi</label>
                                                <input id="cc-name" type="text" disabled class="form-control" value="<?php echo $satir["tarih"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Ürün Durumu</label>
                                               
                                                    <select name="urundurumu" id="select" class="form-control">
                                                        <option value="Kargoda" <?php if($satir["durum"]=="Kargoda"){ echo "selected";} ?>>Kargoda</option>
                                                         <option value="Satın alındı" <?php if($satir["durum"]=="Satın alındı"){ echo "selected";} ?>>Satın alındı</option>
                                                         <option value="Beklemede" <?php if($satir["durum"]=="Beklemede"){ echo "selected";} ?>>Beklemede</option>
                                                         <option value="Ödeme Yapılmadı" <?php if($satir["durum"]=="Ödeme Yapılmadı"){ echo "selected";} ?>>Ödeme Yapılmadı</option>
                                                         <option value="Onay Bekliyor" <?php if($satir["durum"]=="Onay Bekliyor"){ echo "selected";} ?>>Onay Bekliyor</option>
                                                         <option value="Ürün alıcıya ulaştı" <?php if($satir["durum"]=="Ürün alıcıya ulaştı"){ echo "selected";} ?>>Ürün alıcıya ulaştı</option>
                                                        
                                                    </select>
                                               
                                            </div>
                                           
                                            
                                        
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                            <button type="submit" name="urunduzenle" class="btn btn-primary">Düzenle</button>
                        </div></form>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->
        <?php } ?>











<?php
$sorgu = $vt->selectjoin("
SELECT * FROM satinal AS al
JOIN kullanici  AS kul ON al.kim_id=kul.id
JOIN urunler  AS urun ON al.urun_id=urun.id
");
if($sorgu != null) foreach( $sorgu as $satir ) { 


?>

<!-- modal medium -->
            <div class="modal fade" id="kargo<?php echo $satir["sid"];  ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><?php echo $satir["baslik"];  ?> <small>Kargo Bilgileri</small></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                             <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                
                                                <th>Kargo işlem adı</th>,
                                                <th >Kargo Açıklaması</th>
                                                 <th >Tarih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
$lolo=$satir["sid"];
$sorgu = $vt->select("kargo","where k_urunid=".$lolo." order by tarih desc");
if($sorgu != null) foreach( $sorgu as $satirms ) {  ?>
                                            <tr>
                                            <td>
<?php echo $satirms["k_islem"];  ?>
                                            </td>
                                            <td>
<?php echo $satirms["k_aciklama"];  ?>
                                            </td>
                                            <td>
<?php echo $satirms["tarih"];  ?>
                                            </td>
                                            </tr>
                                        <?php } ?>
                                            </tbody>
                                    </table>
                                </div>
                            <p>
                               <form action="" method="post"  novalidate="novalidate">
                                 <input type="hidden" name="idim" value="<?php echo $satir["sid"];  ?>">
                                             
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Kargo işlemi</label>
                                                <input type="text" name="islemkargo" class="form-control" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Kargo Açıklama</label>
                                                <input type="text" name="aciklamakargo" class="form-control" >
                                            </div>
                                           
                                            
                                        
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                            <button type="submit" name="kargoekle" class="btn btn-primary">Kargo işlemi Ekle</button>
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
                            <div class="col-md-12"><h2>Satın alma işlemleri</h2><br><?php 
if(isset($_POST['urunduzenle'])){
   @$idim=$_POST['idim'];
     @$urundurumu=$_POST['urundurumu'];


 $vt = new Veritabanim();
$sonuc = $vt->sidGuncelle("satinal",array("durum"=>$urundurumu),$idim);    


if($sonuc){
  header("Location:satinalinan.php?durum=urunduzenlendi");
}else{
   header("Location:satinalinan.php?durum=urunduzenlenemedi");
}

}


   
$gsil=@$_GET['silbeni'];
    if(isset($gsil)){
$sonuc = sili("satinal","sid=$gsil");
if($sonuc){
  header("Location:satinalinan.php?durum=urunsilindi");
}else{
  header("Location:satinalinan.php?durum=urunsilinemedi");

}}



?>
<?php 


if(isset($_POST['kargoekle'])){
    @$idim=$_POST['idim'];
     @$islemkargo=$_POST['islemkargo'];
     @$aciklamakargo=$_POST['aciklamakargo'];


if(empty($islemkargo) or empty($aciklamakargo)){ header("Location:satinalinan.php?durum=bosgecilemez");}
else{

 $vt = new Veritabanim();
          $sonuc = $vt->ekle("kargo",array("k_islem"=>$islemkargo,"k_aciklama"=>$aciklamakargo,"k_urunid"=>$idim));


if($sonuc){
  header("Location:satinalinan.php?durum=kargoeklendi");
}else{
  header("Location:satinalinan.php?durum=kargoeklenemedi");

}
}
}


?>


<?php 


// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("kargoeklendi","Başarıyla Kargo durumu eklediniz","success");
islemuyarisi("kargoeklenemedi","Kargo durumu eklenirken bir hata oluştu.","danger");



islemuyarisi("urunsilindi","Başarıyla Satın alınan ürünü sildiniz","success");
islemuyarisi("urunsilinemedi","Satın alınan ürün silinirken bir hata oluştu.","danger");


islemuyarisi("bosgecilemez","Bilgiler Boş geçilemez.","danger");

islemuyarisi("urunduzenlendi","Başarıyla Ürün Durumu Düzenlendi.","success");
islemuyarisi("urunduzenlenemedi","Ürün Durumu düzenlenirken hata oluştu.","danger");

 ?>







                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                
                                                <th>Kim Aldı</th>
                                                <th width="150px">Ürün adı</th>
                                                <th >Ürün Fiyatı</th>
                                                 <th >Tarih</th>
                                                  <th >Durum</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
$vt = new Veritabanim();
$toplafiyat=0;
//$sorgu = $vt->select("satinal","");
$sorgu = $vt->selectjoin("
SELECT * FROM satinal AS al
JOIN kullanici  AS kul ON al.kim_id=kul.id
JOIN urunler  AS urun ON al.urun_id=urun.id  order by  tarih  desc
");
if($sorgu != null) foreach( $sorgu as $satir ) { 
    $urun=$satir['sid'];


 $toplafiyat+=$satir["urun_fiyat"];
             ?>
                                            <tr>
                                                
                                                <td><?php echo $satir["adsoyad"];  ?></td>
                                                <td><?php echo $satir["baslik"];  ?></td>
                                                 <td><?php echo $satir["urun_fiyat"];  ?> TL</td>
                                                <td ><?php echo $satir["tarih"];  ?></td>
                                                <td class="process"><?php echo $satir["durum"];  ?></td>
                                                 <td>
                                                    <div class="table-data-feature">
                                                       
                                                        <span   data-toggle="modal" data-target="#kargo<?php echo $satir["sid"];  ?>">
                                                        <button class="item" data-toggle="tooltip" type="button"  data-target="#kargo"  data-placement="top" title="Kargo Durumu ve ekle">
                                                            <i class="zmdi zmdi-bus"></i>
                                                        </button></span>
                                                        <span   data-toggle="modal" data-target="#mediumModal<?php echo $satir["sid"];  ?>">
                                                        <button class="item" data-toggle="tooltip" type="button"  data-target="#mediumModal"  data-placement="top" title="Ürün Durumu Değişikliği">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button></span>
                                                         <a href="?silbeni=<?php echo $satir["sid"];  ?>" >
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Sil">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button></a>
                                                        
                                                    </div>
                                                </td>
                                            </tr>



                                        <?php } ?>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                
                                                <th></th>
                                                <th width="150px"></th>
                                                <th >Toplam: <?php echo  $toplafiyat; ?> TL</th>
                                                 <th ></th>
                                                  <th ></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>








































                        </div>
                       <?php include "footer.php";
?>
<!-- end document-->
