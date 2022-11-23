<?php
try{
    $VeriTabaniBaglantisi   =   new PDO("mysql:host=localhost;dbname=kayitlar;charset=UTF8", "yavuz", "1234");
}catch(PDOException $Hata){
    echo "Bağlantı Hatası<br />" . $Hata->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Sayfası</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $ListelemeSorgusu   =   $VeriTabaniBaglantisi->prepare("SELECT * FROM kullanicilar ORDER BY id DESC");
    $ListelemeSorgusu->execute();
    $KayitSayisi        =   $ListelemeSorgusu->rowCount();
    $Kayitlar           =   $ListelemeSorgusu->fetchAll(PDO::FETCH_ASSOC);

    if($KayitSayisi>0){
        echo "
        <table style=\"width:90%\">
        <tr>
            <th>Adı Soyadı</th>
            <th>Telefon Numarası</th> 
            <th>İşlem</th>
        </tr>";

        foreach ($Kayitlar as $Kayit) {
            $KullaniciID = $Kayit["id"];
            $KullaniciAdSoyad = $Kayit["AdSoyad"];
            $KullaniciTelefon = $Kayit["Telefon"];
            echo "
            <tr>
                <td>$KullaniciAdSoyad</td>
                <td>$KullaniciTelefon</td> 
                <td><a href='olay.php?islem=sil&id=$KullaniciID'>Sil</a></td>
            </tr>";
        }
        echo "
        <tr>
            <td colspan='2'>Sistemde Toplam -<b>$KayitSayisi</b>- Kayıt Var.</td>
            <td><b><a href='index.php'>Yeni Kullanıcı Ekle</a></b></td>
        </tr>
        </table>";
    }else{
        echo "
        <table style=\"width:90%;border:none;\">
        <tr>
            <td style=\"border:none;font-weight:normal;\">
                Sistemde Kayıtlı Kullanıcı Bulunmuyor.
            </td>
        </tr>
        <tr>
            <td style=\"border:none;font-weight:normal;\">
                Kayıt İşlemi İçin <b><a href='index.php'> Buraya Tıklayınız.</a></b>
            </td>
        </tr>
        </table>";
    }
?>
</body>
</html>
