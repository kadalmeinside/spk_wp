<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<?php
							//untuk mencari jumlah
							$jumlah_siswa=mysql_num_rows(mysql_query("select * from siswa",$koneksi));
						?>
						<i class="fa fa-group fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $jumlah_siswa ;?></div>
						<div>Total Siswa</div>
					</div>
				</div>
			</div>
			<a href="index.php?mod=data_siswa">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	
	
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<?php 
							$jumlah_siswa=mysql_num_rows(mysql_query("select * from siswa",$koneksi));
							$jumlah_nilai=mysql_num_rows(mysql_query("select * from nilai",$koneksi));
							$hasil=$jumlah_siswa-$jumlah_nilai;
						?>
						<i class="fa fa-warning fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $hasil ?></div>
						<div>Belum Memiliki Nilai</div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<!-- /.row -->