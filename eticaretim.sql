-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Tem 2021, 13:13:53
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `github-sil`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(20) NOT NULL,
  `telefon` varchar(200) COLLATE utf8_bin NOT NULL,
  `eposta` varchar(200) COLLATE utf8_bin NOT NULL,
  `adres` varchar(200) COLLATE utf8_bin NOT NULL,
  `face` varchar(200) COLLATE utf8_bin NOT NULL,
  `instagram` varchar(200) COLLATE utf8_bin NOT NULL,
  `twitter` varchar(200) COLLATE utf8_bin NOT NULL,
  `hakkimizda` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `telefon`, `eposta`, `adres`, `face`, `instagram`, `twitter`, `hakkimizda`) VALUES
(1, '0850 985 65 98', 'deneme@gmail.com', 'Yenişehir mahallesi 220. sokak Haliliye/ŞANLIURFA', '#facebook', '#instagram', '#twitter', '<p>Rock ve Metal grupları baskılı ürünlerin satışı ve ürünlerin tanıtımı için firmamız E-ticaret sistemi üzerine yönelik satışlarını 2019 yılında faaliyete geçirmiştir.  </p>\r\n						<p>Sistem üzerinde müşterilere yönelik en kolay yönetimi ve güvenli alışverişi sağlıyoruz.</p>\r\n						<h3>Vizyon</h3>\r\n						<p>Müşterilerimize her zaman kaliteli ürünleri sağlamaktır.</p>\r\n						<h3>Misyon</h3>\r\n						<p>Dünya çapında tanınan Rock ve Metal grupların baskılı ürünlerini ve daha gelişmiş ürün tasarımlarıyla hizmet verebilmektir.</p>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(20) NOT NULL,
  `adsoyad` varchar(100) COLLATE utf8_bin NOT NULL,
  `eposta` varchar(50) COLLATE utf8_bin NOT NULL,
  `baslik` varchar(100) COLLATE utf8_bin NOT NULL,
  `mesaj` varchar(250) COLLATE utf8_bin NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `adsoyad`, `eposta`, `baslik`, `mesaj`, `tarih`) VALUES
(4, 'sefa sayğan', 'ddeneme@deneme.com', 'önemli', 'fsasafsafsafsafsaf', '2019-09-28 12:03:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kargo`
--

CREATE TABLE `kargo` (
  `k_id` int(30) NOT NULL,
  `k_islem` varchar(200) COLLATE utf8_bin NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `k_urunid` int(20) NOT NULL,
  `k_aciklama` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `kargo`
--

INSERT INTO `kargo` (`k_id`, `k_islem`, `tarih`, `k_urunid`, `k_aciklama`) VALUES
(1, 'Kargo verildi', '2019-09-23 10:34:49', 0, 'Kargoya verildi'),
(2, 'Siparişiniz Alındı', '2019-09-23 10:34:49', 0, 'Siparişiniz Alındı'),
(3, 'kargolu', '2019-09-23 11:00:55', 1, 'kargo açıklama'),
(4, 'satın alındı', '2019-09-23 11:02:42', 1, 'satın alma işlemi başarılı'),
(5, 'kargolu', '2019-09-27 12:40:36', 21, 'kargo açıklama'),
(6, 'satın alındı', '2019-09-27 13:06:35', 21, 'satın alma işlemi başarılı'),
(7, 'Kargoya verilmiştir', '2019-09-28 11:49:45', 22, 'Kargoda'),
(8, 'kargoda', '2019-09-29 15:01:36', 1, 'kargoda'),
(9, 'eklend', '2021-07-22 20:30:07', 1, 'ss'),
(10, 'Teslim edildi', '2021-07-23 10:49:18', 1, 'Kargoya teslim edilmiştir.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategoriad` varchar(200) COLLATE utf8_bin NOT NULL,
  `seo` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `kategoriad`, `seo`) VALUES
(1, 'Bring Me The Horizon', 'bring-me-the-horizon'),
(2, 'Linkin Park', 'linkin-park'),
(3, 'Bullet For My Vallentine', 'bullet-for-my-vallentine'),
(4, 'Breaking Benjamin', 'breaking-benjamin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kullaniciadi` varchar(100) COLLATE utf8_bin NOT NULL,
  `sifre` varchar(100) COLLATE utf8_bin NOT NULL,
  `adsoyad` varchar(100) COLLATE utf8_bin NOT NULL,
  `eposta` varchar(20) COLLATE utf8_bin NOT NULL,
  `tel` varchar(20) COLLATE utf8_bin NOT NULL,
  `adres` text COLLATE utf8_bin NOT NULL,
  `yetki` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'kullanıcı',
  `kayit_tarihi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kullaniciadi`, `sifre`, `adsoyad`, `eposta`, `tel`, `adres`, `yetki`, `kayit_tarihi`) VALUES
(5, 'sefa', 'c4ca4238a0b923820dcc509a6f75849b', 'Sefa Sayğan', 'sefa@sayganweb.com', '5323060915', 'afsfsagsasag', 'yönetici', '2019-09-27 10:11:44'),
(6, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Yönetim', 'sefa@sayganweb.com', '5329861565', 'xxxx', 'yönetici', '2019-09-28 11:39:44'),
(7, 'kullanıcı', 'd41d8cd98f00b204e9800998ecf8427e', 'Müşteri', 'kullanici@gmail.com', '5326286945', 'xxxxx', 'kullanıcı', '2019-09-28 11:41:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinal`
--

CREATE TABLE `satinal` (
  `sid` int(20) NOT NULL,
  `kim_id` varchar(200) COLLATE utf8_bin NOT NULL,
  `urun_id` varchar(200) COLLATE utf8_bin NOT NULL,
  `urun_fiyat` varchar(200) COLLATE utf8_bin NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `durum` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `satinal`
--

INSERT INTO `satinal` (`sid`, `kim_id`, `urun_id`, `urun_fiyat`, `tarih`, `durum`) VALUES
(1, '5', '96', '25', '2021-07-22 20:29:41', 'Ürün alıcıya ulaştı'),
(2, '5', '64', '90', '2021-07-23 10:44:58', 'Onay Bekliyor');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `baslik` varchar(200) COLLATE utf8_bin NOT NULL,
  `resimurl` varchar(200) COLLATE utf8_bin NOT NULL,
  `eklemetarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `icerik` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `baslik`, `resimurl`, `eklemetarihi`, `icerik`) VALUES
(1, 'LinkinPark', 'img/banner/banner-img.png', '0000-00-00 00:00:00', 'Aradığınız metal ürünlerini satın almak için sitemizden alışveriş yapabilirsiniz'),
(2, 'Bring Me The Hozion', 'img/banner/bmth3.png', '2019-09-11 21:00:00', 'Aradığınız metal ürünlerini satın almak için sitemizden alışveriş yapabilirsiniz'),
(6, 'a', 'img/urun/156975204015697514221569749879bm.jpg', '0000-00-00 00:00:00', 'a'),
(8, 'değişik', 'img/banner/15697541501567600972Bring_Me_The_Horizon_Hysteria_slider-980x600.jpg', '2019-09-29 10:46:22', 'komiks');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(20) NOT NULL,
  `baslik` varchar(200) COLLATE utf8_bin NOT NULL,
  `seo` varchar(250) COLLATE utf8_bin NOT NULL,
  `icerik` varchar(500) COLLATE utf8_bin NOT NULL,
  `kategori` varchar(100) COLLATE utf8_bin NOT NULL,
  `fiyat` varchar(100) COLLATE utf8_bin NOT NULL,
  `resim` varchar(200) COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `baslik`, `seo`, `icerik`, `kategori`, `fiyat`, `resim`, `timestamp`) VALUES
(63, 'Bring Me The Horizon Siyah Tişört', 'bring-me-the-horizon-siyah-tisort', 'Basic Yaka, kısa kollu  Renk siyah  Ön baskılı', '1', '30', 'img/urun/15697656721568025664bring.jpg', '2019-09-29 14:01:12'),
(64, 'Bring Me The Horizon kapşolu kazak', 'bring-me-the-horizon-kapsolu-kazak', 'Ürünlerimizde dünyanın en yeni baskı teknolojisi olan \"Nefes Alabilen Baskı\" teknolojisini kullanmaktadır. Kullandığımız boyalar tamamen sağlıklı olup, şu an en geçerli olan \"Textile Confidence” sağlık setifikasına sahiptir.', '1', '90', 'img/urun/1569765857bring2.jpg', '2019-09-29 14:04:17'),
(65, 'Bring Me The Horizon Beyaz Tişört', 'bring-me-the-horizon-beyaz-tisort', 'Bu ürün Lord Tshirt tarafından gönderilecektir. 24 saatte kargoda fırsatı iş günlerinde geçerlidir. %100 Pamuklu Kumaş', '1', '45', 'img/urun/1569766010bring3.jpg', '2019-09-29 14:06:50'),
(66, 'Bring Me The Horizon Tişört', 'bring-me-the-horizon-tisort', ' Tshirt 1.sınıf Kalitede en uygun Fiyatlarla     Modellerimiz farklı renk ve çeşitleri ile stoklarımızda  Kalıplarımız Normal kesim Olup Bisiklet yakadır   Baskı Empirme (Kumaşın içine işler, hava alır, terletmez, solmaz, silinmez)   En ucuz  Tişörtleri       Siparişleriniz Sizlere Gönderilmeden Önce Tarafımızca Kontrol Edilerek Kargoya Verilmektedir.  %100 KALİTE GÜVENCESİYLE ve MÜŞTERİ MEMNUNİYETİ', '1', '35', 'img/urun/1569766103bring4.jpg', '2019-09-29 14:08:23'),
(67, 'Bring Me The Horizon Gri Tişört', 'bring-me-the-horizon-gri-tisort', 'Ürünlerimiz birinci sınıf penye ve %100 pamuklu kumaştan üretilmektedir. Kullandığımız kumaşlar özenle seçilmekte olup,  yıkamalar sonrasında da  ilk satın aldığınız formu koruyarak, uzun süreli  kullanım imkanı sunmaktadır. Dikişler atma yapmayacak, özenli ve temiz bir görünüme sahip olacak şekilde hazırlanmıştır.', '1', '30', 'img/urun/1569766256bring5.jpg', '2019-09-29 14:10:56'),
(68, 'Bring Me The Horizon Çanta', 'bring-me-the-horizon-canta', 'Su tutmayan bir yapıya sahiptir, oldukça dayanıklı ve kalın bir malzemeye sahiptir. Bu özelliklerine rağmen hava geçirgen özellikli kumaş türüdür. Tok duruşu ve sık dokuması sebebiyle imaj odaklı çalışmalarda ve dayanıklılığın fazla olması gereken çantalarda özellikle tercih edilir. Kanvas bez çantalar ham bez çantalara göre daha dolgun ve sağlamdır. Ağırlık konusunda dayanıklıdır. ', '1', '100', 'img/urun/1569766333bringcanta.jpg', '2019-09-29 14:12:13'),
(69, 'Bring Me The Horizon Renkli Çanta', 'bring-me-the-horizon-renkli-canta', '17 inç Bana Horizon USB şarj sırt çantası Çocuk çocuk okul çantası genç Erkek ve Kız Seyahat Sırt Çantası Koleji mochlia', '1', '120', 'img/urun/1569766473bringcanta2.jpg', '2019-09-29 14:14:33'),
(70, 'Bring Me The Horizon Beyaz Desenli Tek Kol Çanta', 'bring-me-the-horizon-beyaz-desenli-tek-kol-canta', 'Özel bring_me_the_horizon _ büzmeli kol çantası Sevimli Sırt Çantası Çocuklar Çantası (Siyah Arka) 31x40 cm', '1', '150', 'img/urun/1569766582bringcanta3.jpg', '2019-09-29 14:16:22'),
(72, 'Lİnkin park siyah beyaz şapka', 'linkin-park-siyah-beyaz-sapka', 'LİNKİN PARK YAZISI VE LOGOSUNA SAHİP OLAN ŞAPKA ESKİTME TARZDA KUMAŞA SAHİPTİR. Pamuklu Kanvas Yıkamalı Özel Kumaştan Üretilmiştir. Üzerinde Eskitme  Efektleri ve Yeni Sezon Güncel Renkleri ile  Giyimi Tamamlayıcı Şık Bir Aksesuardır. Arkada Ayarlanabilen Tokası ile Her Bedene Uyum Sağlar. YAZ AYLARINDA TARZINIZI YANSITACAK HARİKA BİR TASARIM.', '2', '25', 'img/urun/1569766754linkinsapka.jpg', '2019-09-29 14:19:14'),
(73, 'linkin park omuz çanta', 'linkin-park-omuz-canta', 'Resimdeki ürünün ölçüleri: Beden: Standart, En: 25 cm, Boy: 30 cm', '2', '60', 'img/urun/1569766840linkincanta3.jpg', '2019-09-29 14:20:40'),
(74, 'linkin park siyah sırt çantası', 'linkin-park-siyah-sirt-cantasi', '14 16 inç Linkin Park Bandı Yıldız okul çantası Bookbag Kadın Sırt Çantası Erkekler Erkek Kız Öğrenciler laptop çantası kemer toka kapak', '2', '95', 'img/urun/1569766896linkincanta2.jpg', '2019-09-29 14:21:36'),
(75, 'linkin park çanta', 'linkin-park-canta', 'Linkin park sırt çantası rock yıldız linkin park hayranları okul çantası Müzik grubu sırt çantası', '2', '70', 'img/urun/1569766973linkincanta.jpg', '2019-09-29 14:22:53'),
(76, 'linkin park siyah tişört', 'linkin-park-siyah-tisort', '  LINKIN PARK TİŞÖRT ÖZELLİKLERİ :  -​ Unisex Üründür. Bay bayan kullanımına uygundur.  - Tişört kumaşı %100 pamuk, birinci sınıf kaliteli penyedir. - Üzerinde kullanılan boyalar insan sağlığına zarar vermez.', '2', '45', 'img/urun/1569767028linkin5.jpg', '2019-09-29 14:23:48'),
(77, 'linkin park kolsuz siyah tişört', 'linkin-park-kolsuz-siyah-tisort', 'Baskılarımız\'da %100 Bitkisel Boya Kullanılmaktadır. 24 saatte kargoda fırsatı iş günlerinde geçerlidir. %100 Pamuklu Kumaş', '2', '25', 'img/urun/1569767124linkin4.jpg', '2019-09-29 14:25:24'),
(78, 'linkin park yarım kol siyah tişört', 'linkin-park-yarim-kol-siyah-tisort', 'Tişörtlerimiz yüksel kalite anlayışıyla birinci sınıf 100% organik pamuklu penyeden üretilmektedir. Dijital baskı tekniği ve emprime baskıyla su bazlı kullanarak kumaşla bütünleşen ve kumaşın nefes almasını sağlayan baskılar yapmaktayız.  Ürün kalıbı slimfittir. Yıkama ve bakım talimatları sizi rahatsız etmemesi için direk etiket yerine yaka kısmına baskı tekniğiyle uygulanmıştır.', '2', '50', 'img/urun/1569767212linkin3.jpg', '2019-09-29 14:26:52'),
(79, 'linkin park siyah üzeri baskılı tişört', 'linkin-park-siyah-uzeri-baskili-tisort', '   Linkin Park No:1 baskılı tişört ile günlük kıyafetlerinize tarz katın. Hepimiz bir sinema filminin, şarkıcının, müzik grubunun, markanın veya tasarımın hayranıyız. Kulağımıza hoş gelen bir ses, gözümüze güzel gözüken bir film sahnesi kısacası kendi zevkimize uyan ya da ruhumuzu hoş tutan her şeye hayran olabiliriz. Sevdiğiniz karakterler her an haytınızın içinde olsun.    *Tüm siparişlerinizi itina ile 1-3 iş günü içinde size yetiştirmeye çalışıyoruz. Siparişlerinizle ilgili her türlü ek tale', '2', '55', 'img/urun/1569767269linkin2.jpg', '2019-09-29 14:27:49'),
(80, 'linkin park grup baskılı tişört', 'linkin-park-grup-baskili-tisort', 'LINKIN PARK TİŞÖRT ÖZELLİKLERİ :  Unisex Üründür. Bay bayan kullanımına uygundur. Tişört kumaşı %100 pamuk, birinci sınıf kaliteli penyedir. Üzerinde kullanılan boyalar insan sağlığına zarar vermez.   YIKAMA TALİMATI :  Baskılı tişörlerimizi maksimum 30 derecede yıkamalısınız.  Çamaşır makinesimde ve ya elde yıkanabilir.  Tersten ütüleyiniz.  Kuru Temizleme Yapılmaz.', '2', '47', 'img/urun/1569767404linkin.jpg', '2019-09-29 14:30:04'),
(81, 'bullet for my vallentine baskılı koyu yeşil kupa bardak', 'bullet-for-my-vallentine-baskili-koyu-yesil-kupa-bardak', 'ÜNLÜ YAPIMLARIN GÜVENLE TERCİH ETTİKLERİ  ÖZEL BASKILI KUPA / BARDAKLARI  SİZDE GÜVENLE TERCİH  EDEBİLİRSİNİZ..!', '3', '30', 'img/urun/1569767518bulletbardak2.jpg', '2019-09-29 14:31:58'),
(82, 'bullet for my valletine siyah kupa bardak', 'bullet-for-my-valletine-siyah-kupa-bardak', 'Seramik üzerine sıcak transfer baskı uygulanarak üretilmiştir.  Birinci sınıf baskı mürekkebi kullanılmış olup sağlığa hiç bir zararı yoktur. Özel Kutusunda Ambalajında Gönderilir.', '3', '30', 'img/urun/1569767574bulletbardak.jpg', '2019-09-29 14:32:54'),
(83, 'bullet for my vallentine omuz çantası ', 'bullet-for-my-vallentine-omuz-cantasi', 'Kanvas kumaş, bir ana bölme, ana bölme içinde cep, ayarlanabilir askı kayışı Ölçüler: yükseklik 28 cm, genişliği 18 cm', '3', '100', 'img/urun/1569767753buletcanta.jpg', '2019-09-29 14:35:53'),
(84, 'bullet for my vallentine beyaz üzeri mavi baskılı tişört', 'bullet-for-my-vallentine-beyaz-uzeri-mavi-baskili-tisort', 'Bullet For My Valentine No:1 baskılı tişört ile günlük kıyafetlerinize tarz katın. Hepimiz bir sinema filminin, şarkıcının, müzik grubunun, markanın veya tasarımın hayranıyız. Kulağımıza hoş gelen bir ses, gözümüze güzel gözüken bir film sahnesi kısacası kendi zevkimize uyan ya da ruhumuzu hoş tutan her şeye hayran olabiliriz. Sevdiğiniz karakterler her an haytınızın içinde olsun.', '3', '40', 'img/urun/1569767850bfmv.jpg', '2019-09-29 14:37:30'),
(85, 'bullet for my vallentine siyah baskılı tişört', 'bullet-for-my-vallentine-siyah-baskili-tisort', 'Bu ürün Lord Tshirt tarafından gönderilecektir. 24 saatte kargoda fırsatı iş günlerinde geçerlidir. %100 Pamuklu Kumaş', '3', '40', 'img/urun/1569767899bfmv2.jpg', '2019-09-29 14:38:19'),
(86, 'bullet for my vallentine mavi tişört', 'bullet-for-my-vallentine-mavi-tisort', 'CANLI RENKLERİ VE KALİTELİ BASKISI İLE  YILLARCA YIPRANMADAN KULLANABİLİRSİNİZ  !! BULUNDUĞUNUZ ORTAMDA FARKINIZI YANSITIN !! ÜRÜNLERİMİZ %100 PAMUK KUMAŞTAN ÜRETİLMİŞTİR TERLETME YIPRANMA VE ÇEKME YAPMAZ  YAPIŞTIRMA DEĞİLDİR DİJİTAL BASKI TEKNOJİSİ İLE ÜRETİLİP NEFES ALABİLEN BASKI ÖZELLİĞİNE SAHİPTİR...', '3', '45', 'img/urun/1569767956bfmv3.jpg', '2019-09-29 14:39:16'),
(87, 'bullet for my vallentine sarı tişört', 'bullet-for-my-vallentine-sari-tisort', 'Baskılarımız\'da %100 Bitkisel Boya Kullanılmaktadır.  İsteğe göre dilediğiniz  özel baskı yapılır', '3', '30', 'img/urun/1569768034bfmv4.jpg', '2019-09-29 14:40:34'),
(88, 'bullet for my vallentine siyah baskılı tişört', 'bullet-for-my-vallentine-siyah-baskili-tisort', 'Yaka: Bisiklet Yaka Kısa Kollu Tüylenme Önleyici  Çekme Önleyici  Kırışıklık Önleyici  Nefes Alabilir   Malzeme: %100 Pamuk  ', '3', '50', 'img/urun/1569768123bfmv5.jpg', '2019-09-29 14:42:03'),
(89, 'breaking benjamin siyah tişört ', 'breaking-benjamin-siyah-tisort', 'Unisex Üründür. Bay bayan kullanımına uygundur.  Tişört kumaşı %100 pamuk, birinci sınıf kaliteli penyedir.  Üzerinde kullanılan boyalar insan sağlığına zarar vermez.', '4', '30', 'img/urun/1569768256breaking4.jpg', '2019-09-29 14:44:16'),
(90, 'breaking benjamin siyah baskılı tişört', 'breaking-benjamin-siyah-baskili-tisort', ' Unisex Üründür. Bay bayan kullanımına uygundur. Tişört kumaşı %100 pamuk, birinci sınıf kaliteli penyedir. Üzerinde kullanılan boyalar insan sağlığına zarar vermez.', '4', '45', 'img/urun/1569768312breaking6.jpg', '2019-09-29 14:45:12'),
(91, 'breaking benjamin baskılı tişört', 'breaking-benjamin-baskili-tisort', 'Unisex Üründür. Bay bayan kullanımına uygundur.', '4', '50', 'img/urun/1569768394breaking7.jpg', '2019-09-29 14:46:34'),
(92, 'breaking benjamin siyah üstü kırmızı baskılı tişört', 'breaking-benjamin-siyah-ustu-kirmizi-baskili-tisort', 'Unisex üründür. Bay bayan kullanımına uygundur. Makinede yıkanabilir. Türkiye\'de üretilmiştir. %100 pamuk kumaştan üretilmiştir. Su bazlı boya kullanılarak dijital baskı tekniği ile basılmıştır.', '4', '50', 'img/urun/1569768533breaking2.jpg', '2019-09-29 14:48:53'),
(93, 'breaking benjamin siyah logo baskılı tişört', 'breaking-benjamin-siyah-logo-baskili-tisort', 'Sevilen rock grubu breaking benjamin tişört. Kullanılan su bazlı tekstil boyaları kumaşın nefes almasına engel olmaz. Böylece kumaş doğallığını korur ve giyen kişiye rahatsızlık verme', '4', '65', 'img/urun/1569768644breaking3.jpg', '2019-09-29 14:50:44'),
(94, 'breaking benjamin siyah logo baskılı tişört', 'breaking-benjamin-siyah-logo-baskili-tisort', 'Kumaş Bilgisi  Siyah  süprem %100 Cotton  Baskı Bilgisi  Dijital Baskı  Yıkama Bilgisi  Silikon Yıkama', '4', '50', 'img/urun/1569768744breaking.jpg', '2019-09-29 14:52:24'),
(95, 'breaking benjamin siyah kupa bardak', 'breaking-benjamin-siyah-kupa-bardak', 'breaking bad kupa bardak hakkında bilmeniz gerekenler kupa bardak porselen malzemeden üretilmiştir. sublimasyon baskı tekniği kullanılmıştır. bardak üzerindeki baskı uzun ömürlü ve kalıcıdır. uzun ömürlü kullanım için ılık suda ve elde yıkamanızı tavsiye ediyoruz. bardağın her iki yüzeyine baskı uygulanmakta.', '4', '45', 'img/urun/1569768796breakingbardak.jpg', '2019-09-29 14:53:16'),
(96, 'breaking benjamin mavi baskılı beyaz kupa bardak', 'breaking-benjamin-mavi-baskili-beyaz-kupa-bardak', 'Çift taraflı baskı yapılır. -Kişiye Özel Kupa yüksekliği: 9,5 cm çapı:8,5 cm -Kişiye Özel Kupa Dayanıklı Seramik malzemeden üretilmiştir. -Kişiye Özel Kupa üzerindeki baskı 40 – 80 derecede yıkamaya dayanıklıdır. -Baskının aynı kalitede uzun süre kalabilmesi için ELDE YIKANMASI önerilir.', '4', '25', 'img/urun/1569768852breakingbardak2.jpg', '2019-09-29 14:54:12'),
(97, 'breaking benjamin gümüş zincirli siyah logolu unisex kolye', 'breaking-benjamin-gumus-zincirli-siyah-logolu-unisex-kolye', 'ÜRÜNLERİMİZ UNİSEX OLUP GÜMÜŞ ZİNCİRLİ VE BOYUNDAN AYARLAMALI  istediğİniz gibi ayarlayabilirsiniz', '4', '35', 'img/urun/1569768993breakingkolye.jpg', '2019-09-29 14:56:33');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kargo`
--
ALTER TABLE `kargo`
  ADD PRIMARY KEY (`k_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satinal`
--
ALTER TABLE `satinal`
  ADD PRIMARY KEY (`sid`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kargo`
--
ALTER TABLE `kargo`
  MODIFY `k_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `satinal`
--
ALTER TABLE `satinal`
  MODIFY `sid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
