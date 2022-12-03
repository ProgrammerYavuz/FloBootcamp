<?php

    if (isset($_POST["kangrubu"])) {

        $kangrubu = $_POST["kangrubu"];

        $id = mb_substr($kangrubu,0,1); // Kan grubunun id si elde edildi.
        $grubu = mb_substr($kangrubu,1); // Kan grubu elde edildi.
        $kanmiktari = 0;

        $sorgu = $baglan->prepare("select * from donorler where (kangrubuid=?) order by adsoyad asc");
        $sorgu->execute(array($id));
        $kayitsayisi = $sorgu->rowCount();

        if($kayitsayisi > 0){

            foreach ($sorgu as $satir) {
                $kanmiktari += $satir["bagis"];
            }
            $sorgu->closeCursor(); unset($sorgu);

            echo "<br><img src='logo.png' alt='' width='100px'><br>
                <h3>Kan Grubu Arama Portalı</h3><br>
                <table border='1' width='90%'>
                    <tr>
                        <td class='baslik'>Kan Grubu</td>
                        <td class='baslik'>Donör Sayısı</td>
                        <td class='baslik'>Kan Miktarı</td>
                    </tr>
                    <tr>
                        <td>$grubu</td>
                        <td>$kayitsayisi</td>
                        <td>$kanmiktari ünite</td>
                    </tr>
                </table>";

        }else{
            echo "<br>Şuanda $grubu kan grubuna ait kan bulunmamaktadır.<br><br>";

            if (isset($_SESSION["yonetici"])) { // Yönetici oturumu varsa donör ekle butonu aktif olur
                echo "<a href='index.php?sayfa=6' class='dugme'>Donör Ekle</a>";
            } 
        }

        if (isset($_SESSION["yonetici"])) {
            echo "<a href='index.php?sayfa=2' class='dugme'>Admin Paneli</a>";
        } else {
            echo "<a href='index.php?sayfa=0' class='dugme'>Ana Sayfa</a>";
        }

        echo "<a href='index.php?sayfa=3' class='dugme'>Arama Portalı</a>";

    } else {
        echo "<script>
        alert('Uyarı: Lütfen önce kan grubunu seçiniz!');
        window.top.location = 'index.php?sayfa=3';
        </script>";
        die();
    }

?>
</body>
</html>