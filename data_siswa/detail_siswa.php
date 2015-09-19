
<?php
/// koneksi database 
$x = 0;
if (isset($_GET['nis'])) {
	$querybio = mysql_query("
		SELECT * FROM siswa WHERE nis=$_GET[nis];
	 ") or die(mysql_error());
	 $querynilai = mysql_query("
		SELECT * FROM nilai WHERE nis=$_GET[nis];
	 ") or die(mysql_error());
	 $jumlah=0;
 }
$no = $x + 1;
 
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Detail Data Siswa</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="#">Biodata</a>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<table class="table table-striped table-bordered table-hover">
					<?php
					while ($rowbio = mysql_fetch_object($querybio)) {
						?>
						<tr>
							<?php echo "<td>Nama</td><td>$rowbio->nama_siswa</td>"; ?>
						</tr>
						<tr>
							<?php $nis=$rowbio->nis; echo "<td>NIS</td><td>$rowbio->nis</td>"; ?>
						</tr>
						<tr>
							<?php echo "<td>Alamat</td><td>$rowbio->alamat</td>"; ?>
						</tr>
						<?php
						$no++;
						}

						?>
				</table>
			</div>
		</div>
	</div>

		
	<div class="col-lg-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="#">Nilai</a>
				<div style="float:right;">
				<a href="index.php?mod=data_siswa&func=update2&nis=<?php echo $nis ?>&m=Update"><i class='fa fa-edit' title="Edit"></i>Edit</a>
				</div>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<table class="table table-striped table-bordered table-hover">
					<?php
					while ($rownilai = mysql_fetch_object($querynilai)) {
						?>
						<tr>
							<?php echo "<td>Fisika</td><td>$rownilai->fisika</td>"; ?>
						</tr>
						<tr>
							<?php echo "<td>matematika</td><td>$rownilai->matematika</td>"; ?>
						</tr>
						<tr>
							<?php echo "<td>Bhs inggris</td><td>$rownilai->b_inggris</td>"; ?>
						</tr>
						<tr>
							<?php echo "<td>geografi</td><td>$rownilai->geografi</td>"; ?>
						</tr>
						<tr>
							<?php echo "<td>ekonomi</td><td>$rownilai->ekonomi</td>"; ?>
						</tr>
						<tr>
							<?php echo "<td>Bhs indonesia</td><td>$rownilai->b_indonesia</td>"; ?>
						</tr>
						<?php
						$jumlah++;
						$no++;
						}
						if ($jumlah<1){
							echo "<div class='alert alert-danger'>
									
									Nilai Belum ada! <a href='?mod=data_siswa&func=create2&nis=$nis'>Klik Untuk Menambahkan</a>
								</div>";
						}

						?>
				</table>
			</div>
		</div>
	</div>
</div>
<br>
<br>

