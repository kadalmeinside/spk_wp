<?php
$host="localhost";
$user="root";
$password="";
$database="jurwp";

//ini_set('display_errors',FALSE);

$koneksi=mysql_connect($host,$user,$password);
mysql_select_db($database,$koneksi);
//cek koneksi
if($koneksi){
	//echo "berhasil koneksi";
}else{
	echo "gagal koneksi";
}
?>