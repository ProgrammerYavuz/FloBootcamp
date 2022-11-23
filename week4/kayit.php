<?php
  require_once 'baglan.php';
  $baglan = baglan();

  $adsoyad = $_POST["adsoyad"];
  $tckimlik = $_POST["tckimlik"];

  $tektoplam = 0;
  $cifttoplam = 0;

  if (is_numeric($tckimlik) and $adsoyad) { // tckimlik değeri bir sayı mı ve adsoyad değeri true mu

    $sayi = strlen($tckimlik); // tc kimlik sayısı hesaplanır

    if ($sayi == 11) {

      for ($i=0; $i <=8; $i+=2) { // 1-3-5-7-9 haneli sayıların toplamı
        $tek = substr($tckimlik,$i,1);
        $tektoplam += (int)$tek;
      }
      
      for ($j=1; $j <=8; $j+=2) { // 2-4-6-8 haneli sayıların toplamı
        $cift = substr($tckimlik,$j,1);
        $cifttoplam += (int)$cift;
      }

      $sayi10 = (($tektoplam * 7) - $cifttoplam) % 10;
      $sayi11 = ($cifttoplam + $tektoplam + $sayi10) % 10;

      $sonsayi = substr($tckimlik,-1);// 11.sayı

      if ($sayi11 == $sonsayi) {
        $durum = "TC Kimlik Geçerli";
      } else {
        $durum = "TC Kimlik Geçersiz";
      }

      $sorgu = $baglan->prepare("insert into kayitlar values (?,?,?,?)");
      $ekle = $sorgu->execute(array(NULL, $adsoyad, $tckimlik, $durum));
      $kayitno = $baglan->lastInsertId();
      $sorgu->closeCursor(); unset($sorgu);
      if ($ekle) {
        echo "<script>
        alert('Başarılı: Bilgiler Kaydedildi!');
        window.top.location = 'index.php';
        </script>";
      } else {
        echo "<script>
        alert('Hata: Bilgiler Kaydedilemedi!');
        window.top.location = 'form.php';
        </script>";
      }

    } else {
      echo "<script>
      alert('Hata: 11 Haneli TC Numarası Giriniz!');
      window.top.location = 'form.php';
      </script>";
    }

  } else {
    echo "<script>
    alert('Hata: Bilgiler Kaydedilemedi!');
    window.top.location = 'form.php';
    </script>";
  }

?>