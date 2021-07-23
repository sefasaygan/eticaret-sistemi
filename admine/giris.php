<?php require_once "../php/veritabani.php"; 
 require_once "../php/ayar.php"; 
@session_start();
 ?><!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>E-Ticaret sistemi</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1>Yönetim Paneli</h1>
                            </a>
                        </div>
                        <?php




                        if(isset($_POST['giris'])){
                        
                                 @$eposta=$_POST['eposta'];
                                 @$sifre=md5($_POST['sifre']);
                                $vt = new Veritabanim();
                                 $sorgu = $vt->select("kullanici","where eposta='".$eposta."' AND sifre='".$sifre."' AND yetki='yönetici'");


                                
                        foreach( $sorgu as $satir ) { if($satir['id']){$al=1;  $_SESSION["ixdim"]=$satir['id']; 
                        $_SESSION["adsoyad"]=$satir['adsoyad']; $_SESSION["kullaniciadi"]=$satir['kullaniciadi']; }else{$al=0;}  }
                              
                              if($al>0){
                              $_SESSION["eposta"]=$eposta;
                              @header("Location: index.php");
                                    echo "başarılı";
                              }
                              else{
                                 header("Location:giris.php?durum=girisyapilamadi");
                             }
                         
                            
                        

}

// İŞLEM YAPILDIĞINDA UYARILARIN GÖSTERİLDİĞİ ALAN
islemuyarisi("girisyapilamadi","Kullanıcı adı veya şifre yanlış","danger");
islemuyarisi("cikis","Çıkış Yaptınız","success");
                        ?>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Eposta adresiniz</label>
                                    <input class="au-input au-input--full" type="email" name="eposta" placeholder="Eposta">
                                </div>
                                <div class="form-group">
                                    <label>Şifreniz</label>
                                    <input class="au-input au-input--full" type="password" name="sifre" placeholder="Şifre">
                                </div>
                               
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="giris" type="submit">Giriş Yap</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->