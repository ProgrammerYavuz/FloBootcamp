<?php
  require_once 'baglan.php';
  $baglan = baglan();

  $kayitno = (int)$_GET["id"]; 
  
  if ($kayitno > 0) {
    $sorgu = $baglan->prepare("delete from kayitlar where (id = ?)");
    $sil = $sorgu->execute(array($kayitno));
    $sorgu->closeCursor(); unset($sorgu);
    if ($sil) {
      echo "<script>
      alert('Başarılı: Kullanıcı Silindi!');
      window.top.location = 'index.php';
      </script>";
    } else {
      echo "<script>
      alert('Hata: Kullanıcı Silinemedi!');
      window.top.location = 'index.php';
      </script>";
    }
  } else {
    header("Location:index.php");
  }
?>