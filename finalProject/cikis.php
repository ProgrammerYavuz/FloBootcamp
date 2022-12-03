<?php
    if (!(isset($_SESSION["yonetici"]))) { // Yönetici girişi yoksa ana sayfaya yönlendir.

        header("Location:index.php?sayfa=0");

    } else { // Yönetici girişi varsa oturumunu sonlandır.

        unset($_SESSION["yonetici"]);
        session_destroy();
        echo "<img src='./load.gif' width='100px'><br>
            <h2>Gittiğine üzüldüm!</h2><br><h4>Ama geri döneceğini biliyorum.</h4>
        ";
        header("Refresh:7; Url=index.php?sayfa=0");

    }
?>