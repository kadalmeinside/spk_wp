<?php

if (isset($_GET['nis'])) {
mysql_query("DELETE FROM nilai WHERE nis ='$_GET[nis]'") or die(mysql_error());
    mysql_query("DELETE FROM siswa WHERE nis ='$_GET[nis]'") or die(mysql_error());	
	
    echo "<script language='javascript'>window.location = 'index.php?mod=data_siswa&aks=sukses2'</script>";
}