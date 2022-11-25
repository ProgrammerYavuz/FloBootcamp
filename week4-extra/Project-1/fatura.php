<?php
$ot = $_POST["ot"];
$durum = $_POST["durum"];
$miktar = $_POST["miktar"];
$fiyat = $_POST["fiyat"];
$tazeliketkisi = $_POST["$ot"];

function otBirimFiyat($deger1=0,$deger2=0) {
    $islem = $deger1 * $deger2;
    return $islem;
}

function tazelikEtkisi($sayi1=0,$sayi2=0) {
    $islem = ($sayi1) + ($sayi1 * ($sayi2) / 100);
    return $islem;
}

if ($ot and $miktar>0 and $fiyat>0 and $tazeliketkisi) {

    $birimfiyat = otBirimFiyat($miktar,$fiyat);

    if ($durum==1) {
        $etki = $birimfiyat;
        $bilgi = "Taze";
    } else {
        $etki = tazelikEtkisi($birimfiyat,$tazeliketkisi);
        $bilgi = "Bayat";
    }

    $kdv = $etki * 18 / 100;
} else {
    echo "<script>
    alert('Hata: Bilgiler Alınamadı!');
    window.top.location = 'index.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ProgrammerYavuz">
    <title>Fatura</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
    echo "<table border='1' width='100%'>
    <tr>
        <td class='baslik'>Tür</td>
        <td class='baslik'>Miktar (kg)</td>
        <td class='baslik'>Fiyat</td>
    </tr>
    <tr>
        <td>$ot</td>
        <td>$miktar kg</td>
        <td>$fiyat ₺</td>
    </tr>
    <tr>
        <td class='baslik'>Ürün taze mi?</td>
        <td class='baslik'>İşlem tutarı</td>
        <td class='baslik'>Tazelik etkisi($tazeliketkisi%)</td>
    </tr>
    <tr>
        <td>$bilgi</td>
        <td>$birimfiyat ₺</td>
        <td> -" . $birimfiyat - $etki . "</td>
    </tr>
    <tr>
        <td class='baslik'>Ödenecek tutar</td>
        <td class='baslik'>KDV(18%)</td>
        <td class='baslik'>İşlem</td>
    </tr>
    <tr>
        <td>$etki ₺</td>
        <td>$kdv</td>
        <td><a href='index.php'>Yeni hesaplama</a></td>
    </tr>
    </table>";
?>
</body>
</html>