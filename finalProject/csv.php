<?php

  if (isset($_SESSION["yonetici"])) {

    $sorgu = $baglan->prepare("select * from donorler order by adsoyad asc");
    $sorgu->execute();
    $kayitsayisi = $sorgu->rowCount();

    if ($kayitsayisi > 0) {
      
      $dosya = fopen("donorler.csv","wbt");
      $sirano = 1;

      foreach ($sorgu as $satir) {
        $kansorgusu  =   $baglan->prepare("select * from kangruplari where (id = ?) LIMIT 1");
        $kansorgusu->execute(array($satir["kangrubuid"]));
        $kansayisi = $kansorgusu->rowCount();

        if ($kansayisi > 0) {
          foreach ($kansorgusu as $kangrup) {
            $adsoyad = $satir["adsoyad"];
            $posta = $satir["posta"];
            $telefon = $satir["telefon"];
            $kangrubuadi = $kangrup["kangrubuadi"];
            $bagis = $satir["bagis"];

            fwrite($dosya, "$sirano.\t$adsoyad | $posta | $telefon | $kangrubuadi | $bagis\n");
            $sirano++;
          }
        }
      }
      $sorgu->closeCursor(); unset($sorgu);

      fclose($dosya);
    }
    
    if(file_exists("donorler.csv")){

      echo "<img src='./yazdir.gif' width='300px'><br>
          <h2>Excel dosyanız hazırlanıyor!</h2><br><h4>Üç.. İki.. Bir.. Dosya oluşturuldu.</h4>
      ";
      header("Refresh:10; Url=index.php?sayfa=0");
      die();

    }else{

      echo "<script>
      alert('Hata: Excel dosyanız oluşturulamadı!');
      window.top.location = 'index.php?sayfa=6';
      </script>";
      die();

    }

  } else {

    header("Location:index.php?sayfa=0");
    die();

  }

?>