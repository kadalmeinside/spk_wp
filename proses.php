
<?php
include "koneksi.php";
//inisialisasi 
$id=$_POST['id'];
$fisika=$_POST['fisika'];
$mtk=$_POST['matematika'];
$bing=$_POST['b_inggris'];
$geo=$_POST['geografi'];
$eko=$_POST['ekonomi'];
$bindo=$_POST['b_indonesia'];

$bobot1=5;
$bobot2=5;
$bobot3=4;
$bobot4=4;
$bobot5=3;
$bobot6=3;

$t1=$fisika*$bobot1;
$t2=$mtk*$bobot2;
$t3=$bing*$bobot3;
$t4=$geo*$bobot4;
$t5=$eko*$bobot5;
$t6=$bindo*$bobot6;

$ntotal=$t1+$t2+$t3+$t4+$t5+$t6;

//masukan ke databse nilai
if (isset($_POST['Simpan'])) {
mysql_query("
        INSERT INTO nilai(`nis`,`fisika`,`matematika`,`b_inggris`,`geografi`,`ekonomi`,`b_indonesia`,`total`) 
        VALUES('$id','$fisika','$mtk','$bing','$geo','$eko','$bindo','$ntotal')
		") or die(mysql_error());

echo "<script language='javascript'>window.location='index.php?mod=data_siswa&func=view&nis=$id'</script>";
}
else{}

if (isset($_POST['Update'])) {
    mysql_query("
        UPDATE nilai
		SET `nis`='$id',`fisika`='$fisika',`matematika`='$mtk',`b_inggris`='$bing',`geografi`='$geo',`ekonomi`='$eko',`b_indonesia`='$bindo',`total`='$ntotal'
        WHERE nis='$id'
     ") or die(mysql_error());
    echo "<script language='javascript'>window.location = 'index.php?mod=data_siswa&func=view&nis=$id'</script>";
}
else {}
?>

