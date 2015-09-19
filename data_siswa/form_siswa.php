

<?php

if (isset($_GET['nis'])) {
    $query = mysql_query("SELECT * FROM siswa WHERE nis =$_GET[nis]") or die(mysql_error());
    $row = mysql_fetch_object($query);
}

function auto_nis($length = 4) {
	$tanggal=date('Y');
    $num = mysql_num_rows(mysql_query('SELECT * FROM siswa')) + 1;
    $number = strval($num);
    $tmp = '';
    for ($i = 1; $i <= ($length - 0 - strlen($number)); $i++) {
        $tmp = $tmp . "0";
    }
    return $tanggal. $tmp . $number;
}
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Form Data Siswa</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="#">Data Siswa</a> 
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form method="post" action="" name="postform">
							<div class="form-group">
								<p>
									<label>Nis</label>
									<input class="form-control" type="text" name="nis" readonly="true" value="<?php echo isset($row->nis) ? $row->nis : auto_nis() ?>">
								</p>
							</div>
							<div class="form-group">
								<p>
									<label>Nama</label>
									<input class="form-control" placeholder="Enter text" type="text" name="nama_siswa" value="<?php echo isset($row->nama_siswa) ? $row->nama_siswa : '' ?>">
								</p>
							</div>
							<div class="form-group">
								<p>
									<label>Alamat</label>
									<textarea class="form-control" name="alamat"><?php echo isset($row->alamat) ? $row->alamat : '' ?></textarea>
								</p>
							</div>
							<div class="form-group">
								<p>
									<label>&nbsp;</label>
									<input class="btn btn-primary" type="submit" value="<?php echo isset($_GET['m']) ? $_GET['m'] : 'Simpan'; ?>" name="<?php echo isset($_GET['m']) ? $_GET['m'] : 'Simpan'; ?>">
									<input class="btn btn-default" type="reset"name="Reset">
								</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--date pick-->

<?php
if (isset($_POST['Simpan'])) {
    mysql_query("
        INSERT INTO siswa(`nis`,`nama_siswa`,`alamat`) 
        VALUES('$_POST[nis]','$_POST[nama_siswa]','$_POST[alamat]')
		") or die(mysql_error());
	echo "<script language='javascript'>window.location = 'index.php?mod=data_siswa&func=create2&nis=$_POST[nis]'</script>";
}
else{}

if (isset($_POST['Update'])) {
    mysql_query("
        UPDATE siswa 
		SET nis='$_POST[nis]',nama_siswa='$_POST[nama_siswa]',alamat='$_POST[alamat]'
        WHERE nis='$_GET[nis]'
     ") or die(mysql_error());
    echo "<script language='javascript'>window.location = 'index.php?mod=data_siswa&func=view&nis=$_POST[nis]'</script>";
}
else {}
?>