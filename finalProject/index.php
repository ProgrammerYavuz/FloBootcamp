<?php
  session_start();

  require_once("baglan.php");
  require_once("sayfalar.php");
  $baglan = baglan(); // Veri tabanı bağlantısı.

  if(isset($_REQUEST["sayfa"])){ // Sadece sayısal değer ve 8 sayfa olduğu için sayfa yüklemede tek rakam yeterlidir.
      $sayfakodu = substr(filter_var($_REQUEST["sayfa"], FILTER_SANITIZE_NUMBER_INT),0,1);
  }else{
      $sayfakodu = 0;
  }

?>
    <!doctype html>
    <html lang="tr-TR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Language" content="tr">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Competible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow">
        <meta name="author" content="ProgrammerYavuz">
        <meta name="generator" content="Visual Studio Code">
        <link type="text/css" rel="stylesheet" href="style.css">
        <link type="image/png" rel="icon" sizes="96x96" href="./logo.png">
        <title>Kan Kontrol Merkezi Sistemi</title>
    </head>
    <body>
        <?php // Sayfalar body içerisine çağırılarak yayınlandı.

            if((!$sayfakodu) or ($sayfakodu=="") or ($sayfakodu==0) or ($sayfakodu>=9) or ($sayfakodu<0)){
                include($sayfa[0]);
            }else{
                include($sayfa[$sayfakodu]);
            }
            
        ?>
    </body>
    </html>