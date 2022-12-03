<?php

    if (!(isset($_SESSION["yonetici"]))) { // Yönetici oturumu yoksa anasayfaya yönlendirildi

        echo "<img src='./load.gif' width='100px'><br>
            <h2>Yetkisiz giriş tespit edildi!</h2><br><h4>Bu bir siber saldırı mı? Hıh, sanmam.</h4>
        ";
        header("Refresh:7; Url=index.php?sayfa=0");

    } else {

?>

    <form action="index.php?sayfa=7" method="post">
        <h2>Yeni Donör Kaydı</h2><br>
        <h4>Adı Soyadı</h4>
        <input type="text" name="adsoyad" value=""><br>
        <h4>E-posta Adresi</h4>
        <input type="text" name="eposta" value=""><br>
        <h4>Telefonu</h4>
        <input type="text" name="telefon" value=""><br>
        <h4>Kan Grubu</h4>
        
        <select name="kangrubuid" id="kangrubuid">
        <?php
            $sorgu = $baglan->prepare("select * from kangruplari");
            $sorgu->execute();

            foreach ($sorgu as $satir) {
                echo "<option class='option' value='$satir[id]'>$satir[kangrubuadi]</option>";
            }
            $sorgu->closeCursor(); unset($sorgu);
        ?>
        </select><br>

        <h4>Kan Bağışı(ünite)</h4>
        <input type="text" name="kanbagisi" value=""><br>
        <button type="submit">Kaydet</button>
    </form>

<?php
    }
?>