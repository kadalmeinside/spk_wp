<?php session_start();
	session_destroy();
	header("Location:formlogin.php?aks=mess2");
?>