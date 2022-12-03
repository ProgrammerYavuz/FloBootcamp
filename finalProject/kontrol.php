<?php

  include_once "donor.php"; // donor classını kullanmak için donor.php sayfası çağırılmıştır.

  if (
      isset($_POST["adsoyad"]) and 
      isset($_POST["eposta"]) and 
      isset($_POST["telefon"]) and 
      isset($_POST["kangrubuid"]) and 
      isset($_POST["kanbagisi"])
     ) { // Post ile gelen name değerlerinin değiştirlmesine karşı önlem alınmıştır.

      $adsoyad = $_POST["adsoyad"];
      $eposta = $_POST["eposta"];
      $telefon = str_replace(" ","",$_POST["telefon"]);
      $kangrubuid = $_POST["kangrubuid"];
      $kanbagisi = $_POST["kanbagisi"];


    if ($adsoyad != "" and $eposta != "" and $telefon != "" and $kangrubuid != ""  and $kanbagisi != "") {

      $kanbagisi = filter_var($kanbagisi, FILTER_SANITIZE_NUMBER_INT); // Sadece sayı kısmı alınacak.
        
      if (($kanbagisi > 0) and (is_numeric($telefon))) {

        $donorkontrol = new donor($adsoyad, $eposta, $telefon, $kangrubuid, $kanbagisi);
        $kaydet = $donorkontrol->kaydet();
        
        if ($kaydet == true) {

          echo "<img src='./load.gif' width='100px'><br>
              <h2>Harika!</h2><br><h4>Bir kişinin daha kan ihtiyacı karşılanacak.</h4>
          ";
          header("Refresh:7; Url=index.php?sayfa=0");
          die();

        } else {

          echo "<script>
          alert('Hata: Donör kaydı yapılamadı!');
          window.top.location = 'index.php?sayfa=6';
          </script>";
          die();

        }

      } else {

        echo "<script>
        alert('Hata: Geçersiz veri girişi!');
        window.top.location = 'index.php?sayfa=6';
        </script>";
        die();

      }

    } else {

      echo "<script>
      alert('Hata: Lütfen gerekli tüm alanları doldurun!');
      window.top.location = 'index.php?sayfa=6';
      </script>";
      die();
    
    }

  } else {

    header("Location:index.php?sayfa=6");
    die();

  }
  
?>