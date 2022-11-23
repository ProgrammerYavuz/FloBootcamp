<?php
  require_once 'baglan.php';
  $baglan = baglan();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ProgrammerYavuz">
    <title>Liste Sayfası</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table border="1" width="90%">
        <tr>
            <td colspan='5'>
                <br><a href="form.php" style="display:block;">Yeni Kayıt Ekle</a><br>
            </td>
        </tr>
        <tr>
            <td class="baslik">Sıra No</td>
            <td class="baslik">Ad Soyad</td>
            <td class="baslik">TC Kimlik</td>
            <td class="baslik">Durum</td>
            <td class="baslik">İşlem</td>
        </tr>
        <?php
            $sirano = 0;
            $sorgu = $baglan->prepare("select * from kayitlar order by adsoyad asc");
            $sorgu->execute();

            foreach ($sorgu as $satir) {
                $sirano++;
                echo "
                <tr>
                    <td>$sirano</td>
                    <td>$satir[adsoyad]</td>
                    <td>$satir[tckimlik]</td>
                    <td>$satir[durum]</td>
                    <td><a href='sil.php?id=$satir[id]'>Sil</a></td>
                </tr>";
            }
            $sorgu->closeCursor(); unset($sorgu);
        ?>
    </table>
</body>
</html>