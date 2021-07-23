<?php 
$title2="Satın alınan - I Rock The 80s";
include "header.php";

if(!isset($_SESSION["kullaniciadi"])){ header("Location:index");}
?>


    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Satınalınan ürünler</h1>
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
                                <th scope="col">Ürün Durumu</th>
                                <th scope="col">Kargo Durumu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php




$say=0;
$kid=$_SESSION["ixdim"];
$vt = new Veritabanim();
 $sorgu = $vt->select("satinal","where  kim_id=$kid");




$sorgu = $vt->selectjoin("
SELECT * FROM satinal AS al
JOIN urunler  AS urun ON al.urun_id=urun.id where al.kim_id=$kid order by tarih desc
"); $sayi=1;
if($sorgu != null) foreach( $sorgu as $satirm ) { 





$sayi++;
    $say+=$satirm["fiyat"];
 ?>
                            <tr style="  <?php if($sayi%2==0){ echo "background: #e3e3e3;"; }else{echo "background: #d2d2d2;";} ?>  "> 
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="<?php echo $satirm['resim'];  ?>"  width="40px" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo $satirm["baslik"];  ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    
                                </td>
                                <td>
                                   <?php echo $satirm["fiyat"];  ?> TL
                                </td>
                                 <td>
                                   <?php echo $satirm["durum"];  ?> 
                                </td>
                                 <td>
                                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#kargo<?php echo $satirm["id"];  ?>">Kargo</button>
                                </td>
                               

<div class="modal fade" id="kargo<?php echo $satirm["id"];  ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"><?php echo $satirm["baslik"];  ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                             <div class="row" style="background: #1e1e1e;
    color: white;" >
                                 <div class="col-md-4 " >
                                 Kargo işlem adı
                             </div><div class="col-md-4" >
                                 Kargo Açıklaması
                             </div>
                             <div class="col-md-4">
                                 İşlem Tarihi
                             </div>
                             </div>
                             <?php 
$lolo=$satirm["sid"];
$sorgu = $vt->select("kargo","where k_urunid=".$lolo." order by tarih desc");
if($sorgu != null) foreach( $sorgu as $satirms ) {  ?>
                                        
                             <div class="row" style="border:2px solid black; border-top:none;">
                                 <div class="col-md-4 ">
                                 <?php echo $satirms["k_islem"];  ?>
                             </div><div class="col-md-4">
                                 <?php echo $satirms["k_aciklama"];  ?>
                             </div>
                             <div class="col-md-4">
                                <?php echo $satirms["tarih"];  ?>
                             </div>
                             </div><?php } ?>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                        </div>
                    </div>
                </div>
            </div>
                               
                            </tr>
<?php }    ?>
                          
                            <tr style="    background:#5b5a5a;">
                                <td>

                                </td>
                                <td>
<h5>Toplam</h5>
                                </td>
                                <td>
                                    <h5><?php echo $say;  ?> TL</h5>
                                </td>
                               <td>

                                </td>
                                <td>

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