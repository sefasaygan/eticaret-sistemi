<?php include "header.php";

?><?php
$vt = new Veritabanim();
$idis=$_SESSION["ixdim"];
$sorgu = $vt->select("kullanici","where id=".$idis);
if($sorgu != null) foreach( $sorgu as $satir ) { 
    $urun=$satir['id'];


 
             ?>



            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">

<div class="col-lg-12">
    <?php 


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
  header("Location:profil.php?durum=kullaniciduzenlendi");
}else{
   header("Location:profil.php?durum=kullaniciduzenlenemedi");
}

}







?>

<?php 


// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN

islemuyarisi("kullaniciduzenlendi","Başarıyla Profiliniz Düzenlendi.","success");
islemuyarisi("kullaniciduzenlenemedi","Profiliniz düzenlenirken hata oluştu.","danger");

 ?>

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profilim</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="default-tab">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                                     aria-selected="true">Bilgiler</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                     aria-selected="false">Düzenle</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <p> <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Kayıt Tarihi</label>
                                                <input id="cc-name" type="text" disabled class="form-control" value="<?php echo $satir["kayit_tarihi"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kullanıcı Adı</label>
                                                <input  type="text" disabled class="form-control" value="<?php echo $satir["kullaniciadi"];  ?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label  class="control-label mb-1">Adı Soyadı</label>
                                                <input  type="text" disabled class="form-control" value="<?php echo $satir["adsoyad"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Eposta</label>
                                                <input name="eposta" type="text" disabled class="form-control " value="<?php echo $satir["eposta"];  ?>">
                                            </div>
                                             <div class="form-group">
                                                <label  class="control-label mb-1">Telefon</label>
                                                <input   type="text" disabled class="form-control " value="<?php echo $satir["tel"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Adres</label>
                                               
                                                <textarea disabled class="form-control "><?php echo $satir["adres"];  ?></textarea>
                                            </div></p>
                                                </div>
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    <form action="" method="post"  novalidate="novalidate">
                                 <input type="hidden" name="idim" value="<?php echo $satir["id"];  ?>">
                                             <div class="form-group has-success">
                                                <label  class="control-label mb-1">Kayıt Tarihi</label>
                                                <input  type="text" disabled class="form-control" value="<?php echo $satir["kayit_tarihi"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Kullanıcı Adı</label>
                                                <input name="kullaniciadi" type="text" class="form-control" value="<?php echo $satir["kullaniciadi"];  ?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label  class="control-label mb-1">Adı Soyadı</label>
                                                <input name="adsoyad" type="text" class="form-control" value="<?php echo $satir["adsoyad"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Eposta</label>
                                                <input name="eposta" type="text"  class="form-control " value="<?php echo $satir["eposta"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Şifre</label>
                                                <input name="sifre" type="text" class="form-control " value="">
                                            </div>
                                             <div class="form-group">
                                                <label  class="control-label mb-1">Telefon</label>
                                                <input  name="tel" type="text"  class="form-control " value="<?php echo $satir["tel"];  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Adres</label>
                                                
                                                <textarea name="adres" class="form-control "><?php echo $satir["adres"];  ?></textarea>
                                            </div>
                                           <div class="modal-footer">
                            <button type="submit" name="duzenle" class="btn btn-primary">Düzenle</button>
                        </div>
                                </form>              
                                        
                            </p>
                        </div>
                        </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            






<?php } ?>


                        </div>
                       <?php include "footer.php";
?>
<!-- end document-->
