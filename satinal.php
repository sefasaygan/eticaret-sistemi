<?php 
$title2="Satın Al - I Rock The 80s";
include "header.php";
if(!isset($_SESSION["kullaniciadi"])){ header("Location:index");}

if(!isset($_COOKIE['urun'])){ header("Location:panel");}
?>


    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Ürünleri Satınal</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            
            <div class="cart_inner">
<?php 
                                if(isset($_SESSION["kullaniciadi"])){
                                
                        
                            ?>
                <div class="row">
                
                <div class="col-lg-12">
                    <div class="login_form_inner" style=" padding-top: 0px; ">
                        <div class="text-center" style="background: #424242; padding-top: 10px;">
                      <a class="primary-btn" href="panel">Kullanıcı Panelim</a>  
                    <a class="primary-btn" href="sepet">Sepetteki Ürünlerim</a>
                    <a class="primary-btn" href="satinalinan">Satın alınan ürünler</a>
                    <a class="primary-btn" href="cikis">Çıkış yap</a>
                    </div>
                     </div>
            </div> </div>
  <?php  }?><br>


  <?php




$say=0;
$kid=$_SESSION["ixdim"];
$vt = new Veritabanim();
if ( isset($_COOKIE['urun']) ){
            foreach ( $_COOKIE['urun'] as $urun => $val ){

               @$yaz.=" id='".$urun."' OR ";
            }
        } 
        @$yaz= substr($yaz, 0, -3);  
 $sorgu = $vt->select("urunler","where  $yaz");
 $sayi=1;
if($sorgu != null) foreach( $sorgu as $satir ) { 
    @$yazdir=$satir["id"];
$sayi++;
    $say+=$satir["fiyat"]; 
    $sayimass=$satir["fiyat"]; 



if(isset($_POST['satinal'])){
   
    @$satinal=$_POST['satinal'];
    if(empty($_POST['ads']) or empty($_POST['kart'])  or empty($_POST['sta']) or empty($_POST['sty']) or empty($_POST['cvv'])){
 echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" >Kredi kartı bilgileri boş geçilemez ve kart bilgilerini doğru girmeniz gerekiyor.</div>';
 $basarili=0;}else{

$vt = new Veritabanim();

$sonuc = $vt->ekle("satinal",array("kim_id"=>$kid,"urun_id"=>$yazdir,"urun_fiyat"=>$sayimass,"durum"=>"Onay Bekliyor"));
setcookie('urun['.$yazdir.']', $yazdir, time() - 86400);
if($sonuc){
     $basarili=1;
}else{
    $basarili=0;
echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" >güncellenirken hata oluştu.</div>';

}
  
    
   }
}else{
    $basarili=0;
}
}

if($basarili==0){
?>





   <div class="row">
  <div class="col-lg-6">
    <h3>Kart bilgilerinizi giriniz</h3>
  <form class="row login_form" action="" method="post"  >
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control"  name="ads" placeholder="Kredi kartındaki ad soyad" >
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" class="form-control"  name="kart" placeholder="Kredi kartı numarası">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control"  name="sta" maxlength="2" placeholder="son kullanma tarihi ay">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control"  name="sty" maxlength="4" placeholder="son kullanma tarihi yıl">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control"  name="cvv" maxlength="4" placeholder=" kart arkasında bulunan cvv">
                            </div>
                            <div class="col-md-12 form-group">
                                <h6>Hesabınızdan Toplam <?php echo $say;  ?> TL çekilecektir.</h6>
                                
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit"  name="satinal" class="primary-btn">Satın Al</button>
                                
                            </div>
                        </form></div>
                        <div class="col-lg-6">
<img src="img/kredi-karti-harcamalari.png"></div>


                    </div> <?php }else{ ?>


   <div class="row">
  <div class="col-lg-6">
    <h3 class="text-center">Ödemeniz gerçekleştirilmiştir.</h3>
</div>
                        <div class="col-lg-6">
<img src="img/kredi-karti-harcamalari.png"></div>


                    </div> 

                         <?php } ?>
                
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <?php include "footer.php";
?>