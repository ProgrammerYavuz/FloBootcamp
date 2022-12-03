<br><img src="logo.png" alt="" width="100px"><br>
<h2>Kan Grubu Arama Portalı</h2><br>
<h4>Aramak istediğiniz kan grubunu seçin.</h4><br>
<form action="index.php?sayfa=4" method="post">
    <select name="kangrubu" id="kangrubu">
    <?php
        $sorgu = $baglan->prepare("select * from kangruplari");
        $sorgu->execute();

        foreach ($sorgu as $satir) {
            echo "<option class='option' value='$satir[id]$satir[kangrubuadi]'>$satir[kangrubuadi]</option>";
        }
        $sorgu->closeCursor(); unset($sorgu);
    ?>
    </select>
    <button>Arama Yap</button>
</form>