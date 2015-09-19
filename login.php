<?php
session_start();
include "koneksi.php";
$un=$_POST['un'];
$password=md5($_POST['password']);

$query=mysql_query("select * from tbl_user where username='$un' and password='$password'");
$cek=mysql_num_rows($query);
$row=mysql_fetch_array($query);
$id_user=$row['id_user'];

if($cek){
	$_SESSION['id_user']=$id_user;
	header('Location:index.php');
}else{
	header('location:formlogin.php?aks=error1');
}
?>