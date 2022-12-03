<?php

    if (!(isset($_SESSION["yonetici"]))) { //Yönetici oturumu varsa admin panele yönlendirildi.

?>

    <img src="logo.png" alt="" width="100px"><br>
    <h2>Kan Kontrol Merkezi Sistemimize Hoş Geldiniz.</h2><br>
    <a href="index.php?sayfa=1" class="dugme">Admin Panele Giriş</a>
    <a href="index.php?sayfa=3" class="dugme">Kan Grubu Sorgula</a>
    
<?php

    } else {
        header("Location:index.php?sayfa=2");
    }

?>