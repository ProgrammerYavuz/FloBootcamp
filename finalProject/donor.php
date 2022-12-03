<?php

  class donor {

    private $adsoyad;
    private $eposta;
    private $telefon;
    private $kangrubuid;
    private $kanbagisi;

    public function __construct($adsoyad, $eposta, $telefon, $kangrubuid, $kanbagisi) {

      $this->adsoyad = strtoupper($adsoyad);
      $this->eposta = strtolower(str_replace(" ","",$eposta)); // E-postanın içerisindeki boşluklar silindi.
      $this->telefon = $telefon;
      $this->kangrubuid = $kangrubuid;
      $this->kanbagisi = $kanbagisi;

    }

    public function kaydet() {

      // Veritabanı Bağlantısı
      $baglan = baglan();

      // Kan grubu idsine göre kan grubu adını getir.
      $kansorgusu  =   $baglan->prepare("select * from kangruplari where (id = ?) LIMIT 1");
      $kansorgusu->execute(array($this->kangrubuid));
      $kayitsayisi = $kansorgusu->rowCount();

      if ($kayitsayisi) {
        foreach ($kansorgusu as $kangrup) {
            $kangrubuadi = $kangrup["kangrubuadi"];
        }
      } else {
        $kangrubuadi = "";
      }
      
      $kangruplari = array("A+", "A−", "B+", "B−", "AB+", "AB−", "0+", "0-");

      if (in_array($kangrubuadi, $kangruplari)) {// Gelen kan grubu adı, kan gruplari dizisinde kontrol ediliyor.
        // Kayıt İşlemi
        $sorgu = $baglan->prepare("insert into donorler values (?,?,?,?,?,?)");
        $sonuc = $sorgu->execute(array(NULL, $this->kangrubuid, $this->kanbagisi, $this->adsoyad, $this->telefon, $this->eposta));
        $sorgu->closeCursor(); unset($sorgu);

        if ($sonuc) {
          return true;
        } else {
          return false;
        }

      }

    }

  }

?>