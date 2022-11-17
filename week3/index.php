<?php
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veritabanı Uygulaması</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="olay.php?islem=ekle" method="post">
        <div>Adınız Soyadınız:</div>
        <input type='text' name='isim' autocomplete="off" required>
        <div>Telefon Numaranız:</div>
        <input type='text' name='telefon' autocomplete="off" required><br>
        <button>Bilgilerimi Kaydet</button>
    </form>
</body>
</html>
