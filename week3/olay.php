<?php

try{
    $VeriTabaniBaglantisi   =   new PDO("mysql:host=localhost;dbname=kayitlar;charset=UTF8", "yavuz", "1234");
}catch(PDOException $Hata){
    echo "Bağlantı Hatası<br />" . $Hata->getMessage();
    die();
}

$olay = $_GET["islem"]; // İşlemleri Ayırmak İçin ekle-sil

if(isset($_POST["isim"])){// Ekleme İşleminde Tanımsız Hatası Almammak İçin Kontrol
    $isim      =   $_POST["isim"];
}else{
    $isim      =   "";
}

if(isset($_POST["telefon"])){// Ekleme İşleminde Tanımsız Hatası Almammak İçin Kontrol
    $telefon      =   $_POST["telefon"];
}else{
    $telefon      =   "";
}

if(isset($_GET["id"])){// Silme İşleminde Tanımsız Hatası Almammak İçin Kontrol
    $SilinecekKisi      =   $_GET["id"];
}else{
    $SilinecekKisi      =   "";
}

if ($olay == "ekle") {

    if($isim!="" and $telefon!=""){
        $EklemeSorgusu  =   $VeriTabaniBaglantisi->prepare("INSERT INTO kullanicilar (AdSoyad, Telefon) VALUES (?, ?)");
        $EklemeSorgusu->execute([$isim, $telefon]);
        $KayitKontrol   =   $EklemeSorgusu->rowCount();
    
        if($KayitKontrol>0){
            header("Location:liste.php");
            exit();
        }else{
            header("Location:index.php");
            exit();
        }
    }else{// Ekleme İşlemi Sırasında Veri Gelmezse
        echo "İsim veya Telefon girilmemiş!";
        die();
    }

}

else if ($olay == "sil") {

    if($SilinecekKisi!=""){
        $SilmeSorgusu     =   $VeriTabaniBaglantisi->prepare("DELETE FROM kullanicilar WHERE id = ? LIMIT 1");
        $SilmeSorgusu->execute([$SilinecekKisi]);
        $SilmeKontrol      =   $SilmeSorgusu->rowCount();
    
        if($SilmeKontrol>0){
            header("Location:liste.php");
            exit();
        }else{
            header("Location:index.php");
            exit();
        }
    }else{// Silme İşlemi Sırasında id Gelmezse
        echo "Silmek İstediğininz Kişi Bulunamadı!";
        die();
    }

}
  
else {
    echo "Hata! Böyle bir işlem yapılamaz.";
    die();
}

?>
