Options +FollowSymLinks
RewriteEngine On
RewriteBase /github/eticaret
#staj klasörü içinde çalış.

# Yeni bir yönlendirme kuralı ekliyoruz

RewriteRule ^urunler$  urunler.php [L,QSA] #urunler.php dosyasının link olarak urunler olarak yazmaya izin ver.
RewriteRule ^index$  index.php [L,QSA]
RewriteRule ^iletisim$  iletisim.php [L,QSA]

RewriteRule ^hakkimizda$  hakkimizda.php [L,QSA]

RewriteRule ^giris$  giris.php [L,QSA]
RewriteRule ^cikis$  cikis.php [L,QSA]
RewriteRule ^panel$  panel.php [L,QSA]
RewriteRule ^sepet$  sepet.php [L,QSA]
RewriteRule ^uyeol$  uyeol.php [L,QSA]
RewriteRule ^satinalinan$  satinalinan.php [L,QSA]
RewriteRule ^satinal$  satinal.php [L,QSA]

RewriteRule ^gizlilik-politikasi$  gizlilikpolitikasi.php [L,QSA]

RewriteRule ^urunler-([0-9a-zA-Z-_]+)$  urunler.php?ad=$1 [L,QSA] 
#urunler.php içerisinde ad olarak get ile gönderilen bilgiyi urunler-(bilgi) olarak link yapısı oluşturmasına izin ver. 
RewriteRule ^([0-9a-zA-Z-_]+)$  urun-detay.php?urunad=$1 [L,QSA]
#urun-detay.php dosyasında get methoduyla gönderilen urunad isimli bilginin linkte görünmesi. örneğin urunad geti içerisinde fatmanur bilgisi varsa localhost/fatmanur olarak urun-detay.php sayfasında bilgileri görebilir.


