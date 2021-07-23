<?php

$title="Baskılı ürün satış sitesi - I Rock The 80s";

ob_start();
header('content-type: text/html; charset=utf8');

 /* güvenlik */
    function guvenlik($par){
        return htmlspecialchars(trim($par));
    }
    array_map('guvenlik', $_GET);
   
    /* ürünlerim */
    $urunler = array(1,2,3,4,5);


function islemuyarisi($durum,$icerik,$uyari="success"){
    if(@$_GET['durum']==$durum){
        echo "<div class='sufee-alert alert with-close alert-$uyari alert-dismissible fade show'>
                                                    $icerik
                                                  
                                                </div>";
    }
 }



     /* sepete ürün ekle */
    if ( isset($_GET['ekle']) ){
        $id = $_GET['ekle'];
        setcookie('urun['.$id.']', $id, time() + 86400);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
   
    /* sepeti boşalt */
    if ( isset($_GET['bosalt']) ){
        foreach ( $_COOKIE['urun'] as $key => $val ){
            setcookie('urun['.$key.']', $key, time() - 86400);
        }
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
   
    /* sepetten ürün çıkart */
    if ( isset($_GET['cikart']) ){
        setcookie('urun['.$_GET['cikart'].']', $_GET['cikart'], time() - 86400);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }



     /* Ürün silme */
    if ( isset($_GET['urunsil']) ){
        $id = $_GET['urunsil'];
       $vt = new Veritabanim();
        $sonuc = $vt-> idSil("urunler",$id);
        if($sonuc){echo "silindi";}else{echo "silinemedi";}
       @header("Location:ad-urunler.php?silindi=$id");


    }

function seo($text)
{
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$text = strtolower(str_replace($find, $replace, $text));
$text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
$text = trim(preg_replace('/\s+/', ' ', $text));
$text = str_replace(' ', '-', $text);
return $text;
}



$vt = new Veritabanim();
$sorgu = $vt->select("ayarlar","where id='1'");
if($sorgu != null)  foreach( $sorgu as $satir ) 
{  
$telefon=$satir['telefon'];
$tw=$satir['twitter'];
$face=$satir['face'];
$ins=$satir['instagram'];
$epost=$satir['eposta'];
$hak=$satir['hakkimizda'];
$adr=$satir['adres'];
 }
        