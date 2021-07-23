<?php
$title2="Sepet - I Rock The 80s";
 include "header.php";
?>


    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Sepet</h1>
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
  <?php  }?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="    background: #3e3c3d;">
                                <th scope="col">Ürün </th>
                                <th scope="col"></th>
                                <th scope="col">Ürün Fiyatı</th>
                                <th scope="col">Sepet</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php




$say=0;
$yaz="";
$vt = new Veritabanim();
if ( isset($_COOKIE['urun']) ){
            foreach ( $_COOKIE['urun'] as $urun => $val ){

               @$yaz.=" id='".$urun."' OR ";
            }
        
        @$yaz= substr($yaz, 0, -3);  
 $sorgu = $vt->select("urunler","where  $yaz");
 $sayi=1;
if($sorgu != null) foreach( $sorgu as $satir ) { 
    @$yazdir.=$satir["id"].",";
$sayi++;
    $say+=$satir["fiyat"];
 ?>
                            <tr style="  <?php if($sayi%2==0){ echo "background: #e3e3e3;"; }else{echo "background: #d2d2d2;";} ?>  "> 
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="<?php echo $satir['resim'];  ?>"  width="100px" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo $satir["baslik"];  ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    
                                </td>
                                <td>
                                   <?php echo $satir["fiyat"];  ?> TL
                                </td>
                                <td>
                                    
                                  <a class="sepetts" href="?cikart=<?php echo $urun; ?>"><span class="ti-close" style="color:red;" ></span></a>
                                </td>
                            </tr>
<?php   }  }else{
    echo "Sepetinizde Ürün bulunmamaktadir.";
}  ?>
                          
                            <tr style="    background:#5b5a5a;">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Toplam</h5>
                                </td>
                                <td>
                                    <h5><?php echo $say;  ?> TL</h5>
                                </td>
                            </tr>
                           
                            <tr class="out_button_area" style="    background: #3e3c3d;">
                                <td>

<?php 
                                if(isset($_SESSION["kullaniciadi"])){
                                    if($say!=0){
                                    echo '<a class="primary-btn" href="satinal">Ürünleri Satın Al</a>';}
                                }else{
                                   echo '<a class="primary-btn" href="giris">Satın Almak için giriş yapınız</a>';
                                }
                        
                            ?>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                        
                                    
                                </td>
                            </tr>
                             <tr class="out_button_area" >
                                <td colspan="4" >

<div class='sufee-alert alert with-close alert-info alert-dismissible fade show' style="font-size:15px;">
                                                Satın aldığınız ürünler anlaşmalı Yurtiçi kargo ile ÜCRETSİZ olarak teslim edilecektir. Ürünleriniz en geç "5 iş günü" içerisinde kargoya verilecektir.
                                                  
                                                </div>
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <?php include "footer.php";
?>