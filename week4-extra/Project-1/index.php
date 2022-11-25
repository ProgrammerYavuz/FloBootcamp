<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ProgrammerYavuz">
    <title>Aktar Uygulaması</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sinirlama">
        <table border="1" width="100%">
            <tr>
                <td class="baslik">Kodu</td>
                <td class="baslik">Ot</td>
                <td class="baslik">Tazelik Kaybının Fiyat Etkisi</td>
            </tr>
            <?php
                $sayac = 0;
                $urunler = array(
                    array("ot" => "Kekik", "tazeliketkisi" => -10),
                    array("ot" => "Nane", "tazeliketkisi" => -20),
                    array("ot" => "Fesleğen", "tazeliketkisi" => -10),
                    array("ot" => "Reyhan", "tazeliketkisi" => -25)
                );

                foreach($urunler as $urun){
                    $sayac++;
                    echo "
                        <tr>
                            <td>$sayac</td>
                            <td>" . $urun["ot"] . "</td>
                            <td>" . $urun["tazeliketkisi"] . "%</td>
                        </tr>
                    ";
                }
            ?>
        </table>
    </div>
    <div class="sinirlama">
        <form action="fatura.php" method="post">
            <label for="ot">Tür seçiniz:</label>
            <select name="ot" id="ot">
            <?php
                foreach($urunler as $urun){
                    $ot = $urun["ot"];
                    echo "<option value='$ot'>$ot</option>";
                }
            ?>
            </select>
            <?php

                foreach($urunler as $uruntazelik){
                    $tazeliketkisi = $uruntazelik["tazeliketkisi"];
                    $secilenot = $uruntazelik["ot"];
                    echo "<input type='hidden' name='$secilenot' value='$tazeliketkisi'>";
                }
            ?>
            <br><br>
            <label for="durum">Ürünler Taze mi?</label>
            <select name="durum" id="durum">
                <option value='1'>Taze</option>
                <option value='0'>Bayat</option>
            </select>
            <br><br>
            <input type="number" name="miktar" placeholder="Miktar Giriniz (kg)"><br>
            <input type="number" name="fiyat" placeholder="Fiyat Giriniz (TL)"><br>
            <button>Hesapla</button>
        </form>
        <br>
    </div>
</body>
</html>