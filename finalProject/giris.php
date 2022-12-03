<?php
if (!(isset($_SESSION["yonetici"]))) { // Sistemde yönetici girişi yoksa giriş yap.

    if (isset($_POST["adminkod"]) and isset($_POST["adminkullanici"]) and isset($_POST["adminsifre"])) {

        $adminkod = $_POST["adminkod"];
        $adminkullanici = mb_strtolower($_POST["adminkullanici"]);
        $adminsifre = $_POST["adminsifre"];

        if ($adminkod != "" and $adminkullanici != "" and $adminsifre != "") {

            $md5sifre = md5($adminsifre); // Güvenli md5 sorgulaması.

            $sorgu = $baglan->prepare("select * from yoneticiler where (yoneticikodu=? and kullaniciadi=? and sifre=?) limit 1");
            $sorgu->execute(array($adminkod, $adminkullanici, $md5sifre));
            $kayitsayisi = $sorgu->rowCount();
    
            if ($kayitsayisi>0) {

                $_SESSION["yonetici"]  =   $adminkullanici;
                echo "<img src='./load.gif' width='100px'><br>
                    <h2>Hoş geldin " .mb_strtoupper($adminkullanici). "</h2><br><h4>Neredeydin? Gözümüz yollarda kaldı.</h4>
                ";
                header("Refresh:7; Url=index.php?sayfa=2");
                die();

            } else {

                echo "<script>
                alert('Tanımsız: Girdiğiniz bilgiler hatalı! Lütfen doğruluğundan emin olup tekrar deneyin.');
                window.top.location = 'index.php?sayfa=1';
                </script>";
                die();

            }

        } else {

            echo "<script>
            alert('Hata: Lütfen gerekli tüm alanları doldurun!');
            window.top.location = 'index.php?sayfa=1';
            </script>";
            die();

        }

    }
?>

    <form action="index.php?sayfa=1" method="post"><br>
        <img src="logo.png" alt="" width="100px">
        <h2>Admin Giriş Ekranına Hoşgeldiniz</h2><br>
        <h4>Yönetici Kodu</h4>
        <input type="text" name="adminkod" value="12345"><br><br>
        <h4>Kullanıcı Adı</h4>
        <input type="text" name="adminkullanici" value="yavuz"><br><br>
        <h4>Şifre</h4>
        <input type="password" name="adminsifre" value="1234"><br><br>
        <button type="submit">Giriş Yap</button><br>
    </form>

<?php

    } else { // Sistemde yönetici girişi varsa admin panele yönlendir.

        echo "<img src='./load.gif' width='100px'><br>
            <h2>Çıkış burada değil ki!</h2><br><h4>Tren kalkıyor, çuf, çuf, çuf.</h4>
        ";
        header("Refresh:7; Url=index.php?sayfa=2");
        die();

    }

?>