<?php include "header.php";




?>



            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12"><h2>İletişim kutusu</h2><br>




                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>Tarih</th>
                                                <th width="150px">Ad Soyad</th>
                                                <th >Eposta</th>
                                                
                                                <th >Başlık</th>
                                                <th>Mesaj</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
$vt = new Veritabanim();

$sorgu = $vt->select("iletisim"," order by tarih desc");
if($sorgu != null) foreach( $sorgu as $satir ) { 
  

             ?>
                                            <tr>
                                                 <td><?php echo $satir["tarih"];  ?></td>
                                                <td><?php echo $satir["adsoyad"];  ?></td>
                                                <td><?php echo $satir["eposta"];  ?></td>
                                                 <td><?php echo $satir["baslik"];  ?></td>
                                                <td ><?php echo $satir["mesaj"];  ?></td>
                                                 
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
