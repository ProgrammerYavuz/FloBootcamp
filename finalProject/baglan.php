<?php
	function baglan() {
		try{
			$baglan = new PDO("mysql:host=localhost;dbname=kanbankasi;charset=UTF8", "yavuz", "1234");
		}catch(PDOException $hata){
			echo "Bağlantı Hatası<br />" . $hata->getMessage();
			die();
		}
	return $baglan;
	}
?>