<?php
function baglan() {
  $baglan = NULL;
  $baglan=new PDO("mysql:host=localhost;dbname=flo;charset=utf8","yavuz","1234");
	$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$baglan->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$baglan->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
	$baglan->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  return $baglan;
}
?>