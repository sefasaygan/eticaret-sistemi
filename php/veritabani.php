<?php 

class Veritabanim {
  
    private $db;
    private $dsn;
    private $user;
    private $password;

    function __construct() {       
        $this->dsn = 'mysql:host=localhost;dbname=github-sil;charset=utf8';
        $this->user = 'root';
        $this->password = '';
    }

    private function baglantiAc() {
        try { $this->db = new PDO($this->dsn, $this->user, $this->password); }
        catch (PDOException $e) { echo 'Veritabanı bağlantısı başarısız oldu: ' . $e->getMessage(); }
    }

    private function baglantiKapat() {
        $this->db = null;
    }

    function ekle($tablo, $veriler) {
        $sonuc = 0;
        $alan1 = "";
        $alan2 = "";
        foreach ($veriler as $anahtar => $deger) {
            $alan1 .= $anahtar . ",";
            $alan2 .= ":".$anahtar.",";
        }
        $alan1 = substr($alan1,0,strlen($alan1)-1);
        $alan2 = substr($alan2,0,strlen($alan2)-1);
        $this->baglantiAc();
        $query = $this->db->prepare("INSERT INTO ".$tablo." (".$alan1.") VALUES (".$alan2.")");
        $query->execute($veriler);
        if ( $query ) $sonuc = $this->db->lastInsertId(); else $sonuc = 0;
        $this->baglantiKapat();
        return $sonuc;
    }

    function guncelle($tablo, $veriler, $where="") {
        $sonuc = "";
        $alan = "";
        foreach ($veriler as $anahtar => $deger) $alan .= $anahtar . "= :".$anahtar.",";
        $alan = substr($alan,0,strlen($alan)-1);
        if($where!="") $where = " WHERE ".$where;
        $this->baglantiAc();
        $query = $this->db->prepare("UPDATE ".$tablo." SET ".$alan.$where);
        $update = $query->execute($veriler);
        if ( $update ) $sonuc = $query->rowCount(); else $sonuc = 0;
        $this->baglantiKapat();
        return $sonuc;
    }

    function idGuncelle($tablo, $veriler, $id) {
        $sonuc = 0;
        $alan = "";
        foreach ($veriler as $anahtar => $deger) $alan .= $anahtar . "= :".$anahtar.",";
        $alan = substr($alan,0,strlen($alan)-1);
        $veriler['id'] = (int)$id;
        $this->baglantiAc();
        $query = $this->db->prepare("UPDATE ".$tablo." SET ".$alan." WHERE id=:id");
        $update = $query->execute($veriler);
        if ( $update ) $sonuc = 1; else $sonuc = 0;
        $this->baglantiKapat();
        return $sonuc;
    }

     function sidGuncelle($tablo, $veriler, $id) {
        $sonuc = 0;
        $alan = "";
        foreach ($veriler as $anahtar => $deger) $alan .= $anahtar . "= :".$anahtar.",";
        $alan = substr($alan,0,strlen($alan)-1);
        $veriler['id'] = (int)$id;
        $this->baglantiAc();
        $query = $this->db->prepare("UPDATE ".$tablo." SET ".$alan." WHERE sid=:id");
        $update = $query->execute($veriler);
        if ( $update ) $sonuc = 1; else $sonuc = 0;
        $this->baglantiKapat();
        return $sonuc;
    }



    

    function sil($tablo,$where) {
        $this->baglantiAc();                    
        $delete = $this->db->exec("DELETE FROM ".$tablo." WHERE ".$where); 
        $this->baglantiKapat();
        return $delete;
    }

    function idSil($tablo,$id) {
        $sonuc = 0;
        $this->baglantiAc(); 
        $query = $this->db->prepare("DELETE FROM ".$tablo." WHERE id = :id");
        $delete = $query->execute(array('id' => (int)$id));
        if ( $delete ) $sonuc = 1; else $sonuc = 0;
        $this->baglantiKapat();
        return $sonuc;
    }

    function select($tablo,$diger="") {
        $sonuc = null;
        $this->baglantiAc();
        $query = $this->db->query("SELECT * FROM ".$tablo." ".$diger, PDO::FETCH_ASSOC);
        if ( $query ) $sonuc = $query; else $sonuc = null;
        $this->baglantiKapat();
        return $sonuc;
    }
    function selectjoin($sorgu) {
        $sonuc = null;
        $this->baglantiAc();
        $query = $this->db->query($sorgu, PDO::FETCH_ASSOC);
        if ( $query ) $sonuc = $query; else $sonuc = null;
        $this->baglantiKapat();
        return $sonuc;
    }

    
}
$dbs = new PDO("mysql:host=localhost;dbname=github-sil", 'root','');
 function sili($tablo,$where) {
        $db = new PDO("mysql:host=localhost;dbname=github-sil", 'root','');
   $sonuc = $db->exec("DELETE FROM  $tablo where $where  ");
        return  $sonuc;
    }