<?php
    if(!(isset($_SESSION["yonetici"]))){ // Yönetici girişi olmamışsa anasayfaya yönlendirildi.

        echo "<img src='./load.gif' width='100px'><br>
            <h2>Yetkisiz giriş tespit edildi!</h2><br><h4>Bu bir siber saldırı mı? Hıh, sanmam.</h4>
        ";
        header("Refresh:7; Url=index.php?sayfa=0");

    } else {
            
        $sorgu = $baglan->prepare("select * from donorler order by adsoyad asc");
        $sorgu->execute();
        $kayitsayisi = $sorgu->rowCount();
?>
        <br><br><table width='90%'>
            <tr>
                <td colspan="5" class="yonetimtable"><img src="logo.png" alt="" width="70px"><h4>Kan Kontrol Merkezi Admin Paneli</h4></td>
            </tr>
            <tr>
                <td class="yonetimtable"><br><h4>Yetkili kişi adı: <?php echo mb_strtoupper($_SESSION["yonetici"]); ?></h4><br></td>
                <td class="yonetimtable"><br><h4>Sistemde kayıtlı donör sayısı: <?php echo $kayitsayisi; ?></h4><br></td>
                <td class="yonetimtable"><br><a href="index.php?sayfa=6" class="dugme">Donör Ekle</a><br><br></td>
                <td class="yonetimtable"><br><a href="index.php?sayfa=3" class="dugme">Arama Portalı</a><br><br></td>
                <td class="yonetimtable"><br><a href="index.php?sayfa=5" class="dugme">Çıkış Yap</a><br><br></td>
            </tr>

            <?php

                if ($kayitsayisi > 0) {

                    echo "<tr>
                            <td class='baslik'>Ad Soyad</td>
                            <td class='baslik'>E-posta</td>
                            <td class='baslik'>Telefon</td>
                            <td class='baslik'>Kan Grubu</td>
                            <td class='baslik'>Kan Bağışı</td>
                        </tr>";

                    foreach ($sorgu as $satir) {
                        $kansorgusu  =   $baglan->prepare("select * from kangruplari where (id = ?) LIMIT 1");
                        $kansorgusu->execute(array($satir["kangrubuid"]));
                        $kansayisi = $kansorgusu->rowCount();

                        if ($kansayisi > 0) {
                            foreach ($kansorgusu as $kangrup) {
                                echo "<tr>
                                        <td>$satir[adsoyad]</td>
                                        <td>$satir[posta]</td>
                                        <td>$satir[telefon]</td>
                                        <td>$kangrup[kangrubuadi]</td>
                                        <td>$satir[bagis] ünite</td>
                                     </tr>";
                            }
                        }
                    }
                    $sorgu->closeCursor(); unset($sorgu);

                }

            ?>
            <tr>
                <td class="yonetimtable" colspan="5"><br><a href="index.php?sayfa=8" class="dugme">Excel csv yazdır.</a><br><br></td>
            </tr>

        </table><br><br>
<?php
    }
?>