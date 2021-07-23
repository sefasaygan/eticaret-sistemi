<?php include "header.php";





$vt = new Veritabanim();
$sorgu = $vt->select("kullanici","");
if($sorgu != null) foreach( $sorgu as $satir ) { 


?>
<!-- modal medium -->
            <div class="modal fade" id="mediumModal<?php echo $satir["id"];  ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><?php echo $satir["kullaniciadi"];  ?> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                               <form action="" method="post"  novalidate="novalidate">
                                 <input type="hidden" name="idim" value="<?php echo $satir["id"];  ?>">
                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Kayıt Tarihi</label>
                                                <input id="cc-name" type="text" disabled class="form-control" value="<?php echo $satir["kayit_tarihi"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kullanıcı Adı</label>
                                                <input name="kullaniciadi" type="text" class="form-control" value="<?php echo $satir["kullaniciadi"];  ?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label  class="control-label mb-1">Adı Soyadı</label>
                                                <input name="adsoyad" type="text" class="form-control" value="<?php echo $satir["adsoyad"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Eposta</label>
                                                <input name="eposta" type="text" class="form-control " value="<?php echo $satir["eposta"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Şifre</label>
                                                <input name="sifre" type="text" class="form-control " value="">
                                            </div>
                                             <div class="form-group">
                                                <label  class="control-label mb-1">Telefon</label>
                                                <input  name="tel" type="text" class="form-control " value="<?php echo $satir["tel"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Adres</label>
                                                <input  name="adres" type="text" class="form-control " value="<?php echo $satir["adres"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Yetki</label>
                                               
                                                    <select name="yetki" id="select" class="form-control">
                                                        <option value="kullanıcı" <?php if($satir["yetki"]=="kullanıcı"){ echo "selected";} ?>>kullanıcı</option>
                                                         <option value="yönetici" <?php if($satir["yetki"]=="yönetici"){ echo "selected";} ?>>yönetici</option>
                                                        
                                                    </select>
                                               
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
                            <div class="col-md-8"><h2>Kullanıcı işlemleri</h2><br><?php 


if(isset($_POST['duzenle'])){
   @$kadi=$_POST['kullaniciadi'];
     @$adsoyad=$_POST['adsoyad'];
     @$eposta=$_POST['eposta'];
     @$sifre=md5($_POST['sifre']);
     @$tel=$_POST['tel'];
      @$adres=$_POST['adres'];
       @$yetki=$_POST['yetki'];

     @$idim=$_POST['idim'];

 $vt = new Veritabanim();

 if(empty($sifre)){
  $sonuc = $vt->idGuncelle("kullanici",array("kullaniciadi"=>$kadi,"adsoyad"=>$adsoyad,"eposta"=>$eposta,"tel"=>$tel,"adres"=>$adres,"yetki"=>$yetki),$idim);
 }else{
$sonuc = $vt->idGuncelle("kullanici",array("kullaniciadi"=>$kadi,"adsoyad"=>$adsoyad,"eposta"=>$eposta,"tel"=>$tel,"adres"=>$adres,"yetki"=>$yetki,"sifre"=>$sifre),$idim);
 }
          


if($sonuc){
  header("Location:kullanicilar.php?durum=kullaniciduzenlendi");
}else{
   header("Location:kullanicilar.php?durum=kullaniciduzenlenemedi");
}

}



   
$gsil=@$_GET['silbeni'];
    if(isset($gsil)){
$sonuc = sili("kullanici","id=$gsil");
if($sonuc){
  header("Location:kullanicilar.php?durum=kullanicisilindi");
}else{
  header("Location:kullanicilar.php?durum=kullanicisilinemedi");

}}



?>



<?php 


// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("kullanicisilindi","Başarıyla Kullanıcıyı sildiniz","success");
islemuyarisi("kullanicisilinemedi","Kullanıcı silinirken bir hata oluştu.","danger");

islemuyarisi("kullanicieklendi","Başarıyla Kullanıcı eklendi.","success");
islemuyarisi("kullanicieklenemedi","Kullanıcı eklenirken hata oluştu.","danger");

islemuyarisi("bosgecilemez","Bilgiler Boş geçilemez.","danger");

islemuyarisi("kullaniciduzenlendi","Başarıyla Kullanıcı Düzenlendi.","success");
islemuyarisi("kullaniciduzenlenemedi","Kullanıcı düzenlenirken hata oluştu.","danger");

 ?>







                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>Kullanıcı adı</th>
                                                <th width="150px">Ad Soyad</th>
                                                <th >Eposta</th>
                                                
                                                <th >Yetki</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
$vt = new Veritabanim();

$sorgu = $vt->select("kullanici","");
if($sorgu != null) foreach( $sorgu as $satir ) { 
  

             ?>
                                            <tr>
                                                
                                                <td><?php echo $satir["kullaniciadi"];  ?></td>
                                                <td><?php echo $satir["adsoyad"];  ?></td>
                                                 <td><?php echo $satir["eposta"];  ?></td>
                                                <td class="process"><?php echo $satir["yetki"];  ?></td>
                                                 <td>
                                                    <div class="table-data-feature">
                                                       
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

















<div class="col-lg-4 ">
                                <div class="card">
                                    <div class="card-header">Kullanıcı Ekle </div>

                                    <div class="card-body">
                                        
                                            <?php 


if(isset($_POST['eklekullanici'])){
    @$kadi=$_POST['kadi'];
     @$adsoyad=$_POST['adsoyad'];
     @$eposta=$_POST['eposta'];
     @$sifre=md5($_POST['sifre']);
     @$tel=$_POST['tel'];
      @$adres=$_POST['adres'];
       @$yetki=$_POST['yetki'];


if(empty($kadi) or empty($adsoyad) or empty($eposta) or empty($sifre) or empty($yetki) or empty($yetki)){ header("Location:kullanicilar.php?durum=bosgecilemez");}
else{
  header("Location:kullanicilar.php?durum=bosgecilemez");

 $vt = new Veritabanim();
          $sonuc = $vt->ekle("kullanici",array("kullaniciadi"=>$kadi,"adsoyad"=>$adsoyad,"eposta"=>$eposta,"tel"=>$tel,"adres"=>$adres,"yetki"=>$yetki,"sifre"=>$sifre));


if($sonuc){
  header("Location:kullanicilar.php?durum=kullanicieklendi");
}else{
  header("Location:kullanicilar.php?durum=kullanicieklenemedi");

}
}
}


?>

                                        <form action="" method="post"  novalidate="novalidate">
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Kullanıcı Adı*</label>
                                                <input name="kadi" type="text" class="form-control" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label  class="control-label mb-1">Ad Soyad*</label>
                                                <input name="adsoyad" type="text" class="form-control" >
                                               
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Şifre*</label>
                                                <input  name="sifre" type="text" class="form-control" value="">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Eposta*</label>
                                                <input  name="eposta" type="text" class="form-control" value="">
                                                
                                            </div>
                                             <div class="form-group">
                                                <label  class="control-label mb-1">Telefon</label>
                                                <input  name="tel" type="text" class="form-control" value="">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Adres</label>
                                                <input  name="adres" type="text" class="form-control" value="">
                                                
                                            </div>

                                            <div class="form-group">
                                                <label  class="control-label mb-1">Yetki*</label>
                                               
                                                    <select name="yetki" id="select" class="form-control">
                                                        <option value="kullanıcı">kullanıcı</option>
                                                        <option value="yönetici">yönetici</option>
                                                        
                                                    </select>
                                               
                                            </div>
                                            
                                            <div>
                                                <button  type="submit" name="eklekullanici" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-plus fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">EKLE</span>
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
