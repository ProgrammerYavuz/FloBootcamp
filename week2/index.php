<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flo Bootcamp</title>
</head>
<body style="background:#000; color:green;">
    <br>
    <?php
    error_reporting(0);//Sayfa ilk açıldığında çıkan sayfayı yenileyince giden SESSION hatasını gizlemek için

    $sayac = 0;
    $urunler = array(
        array("urunad" => "Ülker Çikolatalı Gofret 40 gr.", "urunfiyat" => 10),
        array("urunad" => "Eti Damak Kare Çikolata 60 gr.", "urunfiyat" => 20),
        array("urunad" => "Nestle Bitter Çikolata 50 gr.", "urunfiyat" => 20)
    );

    echo '
        <form  method="post" action="index.php">
        <table border="1" width="100%" style="text-align:center;">
            <tr>
                <td><b>Ürün Adı</b></td>
                <td><b>Ürün Fiyatı</b></td>
                <td><b>Adet</b></td>
            </tr>
    ';

    foreach($urunler as $urun){
        $sayac++;
        echo "
            <tr>
                <td>" . $urun["urunad"] . "</td>
                <td>" . $urun["urunfiyat"] . " TL</td>
                <td><input type='number' value='0' name='urun$sayac' style='width:50px;text-align:center; background:#000; border:none; color:green;'></td>
            </tr>
        ";
    }

    echo "
        </table>
        <br>
        <input type='submit' value='Ürünü Sepete Ekle' style='float:right;background:green;border:none;padding:5px 20px;font-weight:bold;cursor:pointer;'>
        </form>
    ";
    session_start();
 
    if(isset($_POST["urun1"])){
        $gelenAdetUrun1      =   $_POST["urun1"];
    }else{
        $gelenAdetUrun1      =   0;
    }

    if(isset($_POST["urun2"])){
        $gelenAdetUrun2      =   $_POST["urun2"];
    }else{
        $gelenAdetUrun2      =   0;
    }

    if(isset($_POST["urun3"])){
        $gelenAdetUrun3      =   $_POST["urun3"];
    }else{
        $gelenAdetUrun3      =   0;
    }

    $_SESSION["urun1Adeti"] += $gelenAdetUrun1;
    $_SESSION["urun2Adeti"] += $gelenAdetUrun2;
    $_SESSION["urun3Adeti"] += $gelenAdetUrun3;

    $urun1Adeti = $_SESSION["urun1Adeti"];
    $urun2Adeti = $_SESSION["urun2Adeti"];
    $urun3Adeti = $_SESSION["urun3Adeti"];

    if($urun1Adeti<0){
        $_SESSION["urun1Adeti"] = 0;
        $urun1Adeti = 0;
    }
    if($urun2Adeti<0){
        $_SESSION["urun2Adeti"] = 0;
        $urun2Adeti = 0;
    }
    if($urun3Adeti<0){
        $_SESSION["urun3Adeti"] = 0;
        $urun3Adeti = 0;
    }

$urun1Adi = $urunler[0]["urunad"];
$urun2Adi = $urunler[1]["urunad"];
$urun3Adi = $urunler[2]["urunad"];

$urun1AdetFiyati = $urun1Adeti * $urunler[0]["urunfiyat"];
$urun2AdetFiyati = $urun2Adeti * $urunler[1]["urunfiyat"];
$urun3AdetFiyati = $urun3Adeti * $urunler[2]["urunfiyat"];

$toplamSepetTutari = $urun1AdetFiyati+$urun2AdetFiyati+$urun3AdetFiyati;

    if($urun1Adeti>0 || $urun2Adeti>0 || $urun3Adeti>0){
        echo "<h3>Sepetiniz: </h3>
            <table border='1' width='100%'>
                <tr>
                    <td><b>Ürün Adı</b></td>
                    <td><b>Adet</b></td>
                    <td><b>Toplam</b></td>
                </tr>
            ";
            if($urun1Adeti>0){
                echo "<tr>
                        <td>$urun1Adi</td>
                        <td>$urun1Adeti</td>
                        <td>$urun1AdetFiyati TL</td>
                    </tr>
                ";
            }
            if($urun2Adeti>0){
                echo "<tr>
                        <td>$urun2Adi</td>
                        <td>$urun2Adeti</td>
                        <td>$urun2AdetFiyati TL</td>
                    </tr>
                ";
            }
            if($urun3Adeti>0){
                echo "<tr>
                        <td>$urun3Adi</td>
                        <td>$urun3Adeti</td>
                        <td>$urun3AdetFiyati TL</td>
                    </tr>
                ";
            }
            echo "<tr>
                    <td colspan='2'>Toplam</td>
                    <td>$toplamSepetTutari TL</td>
                </tr>
            </table>
            ";
    }else{
        echo "<br><br><h3 style='text-align:center;'>Sepetinizde Ürün Bulunmuyor.<h3>";
    }
    ?>
</body>
</html>