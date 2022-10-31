<?php
function agilduzeni($agilSayisi = 0, $agilKapasite = 0, $koyunSayisi = 0){
    echo "<b>Toplam Ağıl: $agilSayisi <br> Toplam Kapasite: $agilKapasite <br> Toplam Koyun Sayısı: $koyunSayisi <br><br><br></b>";
    if($koyunSayisi>0){
        for($i = 1; $i <= $agilSayisi; $agilSayisi--){
            echo "<b>$agilSayisi. Ağıl: </b>";
            if($koyunSayisi>=$agilKapasite){
                $koyunSayisi -= $agilKapasite;
                echo "$agilKapasite Koyun";
            }else if($koyunSayisi>0){
                echo "$koyunSayisi Koyun";
                $koyunSayisi = 0;
            }else if($koyunSayisi==0){
                echo "0 Koyun";
            }else{
                echo "$koyunSayisi Koyun";
            }
            echo "<hr>";
        }

        echo "<b>Ağıla Sığmayan Koyun Sayısı: $koyunSayisi</b>";
    }else{
        echo "<b>Eksik Koyunlarınızı Tamamlayınız.<b/>";
    }
}

//---------------------------------------------
echo "<h2><b>Ağılın Yarısı Dolan Uygulama</b></h2>";
agilduzeni(7,20,83);
echo "<br><br><br>";
//---------------------------------------------
echo "<h2><b>Ağıla Tam Sığan Uygulama</b></h2>";
agilduzeni(3,15,45);
echo "<br><br><br>";
//---------------------------------------------
echo "<h2><b>Ağıla Sığmayan Uygulama</b></h2>";
agilduzeni(4,25,140);
echo "<br><br><br>";
//---------------------------------------------
echo "<h2><b>Eğer Koyun Yoksa</b></h2>";
agilduzeni(2,10,-10);
echo "<br><br><br>";






















?>