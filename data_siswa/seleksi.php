<?php
/// koneksi database 

$x = 0;
$q = mysql_query("
SELECT * FROM nilai;
 ") or die(mysql_error());
$query = mysql_query("
SELECT siswa.nis, siswa.nama_siswa,
		nilai.fisika,nilai.matematika,nilai.b_inggris,nilai.geografi,nilai.ekonomi,nilai.b_indonesia, nilai.total
FROM siswa, nilai
WHERE 
siswa.nis=nilai.nis 
ORDER BY `total` DESC ;
 ") or die(mysql_error());
$no = $x + 1;
$i=1;
$stotal=0;
$bobot1=5;
$bobot2=5;
$bobot3=4;
$bobot4=4;
$bobot5=3;
$bobot6=3;
$totalbobot=$bobot1+$bobot2+$bobot3+$bobot4+$bobot5+$bobot6;
$c1=$bobot1/$totalbobot;
$c2=$bobot2/$totalbobot;
$c3=$bobot3/$totalbobot;
$c4=$bobot4/$totalbobot;
$c5=$bobot5/$totalbobot;
$c6=$bobot6/$totalbobot;
//echo "$c1, $c2, $c3, $c4, $c5, $c6 <br><br>";

while ($r = mysql_fetch_object($q)) {	
	$s1 = exp($c1*log($r->fisika));
	$s2 = exp($c2*log($r->matematika));
	$s3 = exp($c3*log($r->b_inggris));
	$s4 = exp($c4*log($r->geografi));
	$s5 = exp($c5*log($r->ekonomi));
	$s6 = exp($c6*log($r->b_indonesia));
	// echo "$s1 | $s2 | $s3 | $s4 | $s5 | $s6";
	$s =$s1*$s2*$s3*$s4*$s5*$s6;
	$stotal=$stotal+$s;
	// echo " | total : $s <br>"; 
	}
	// echo "<br>$stotal";
$ipa=0;
$ips=0;
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data Siswa </h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div style="float:right">
					<a href="fpdf/cetak.php" target="_blank"><button class='btn btn-outline btn-primary'><i class='fa fa-download'> </i> Export to PDF</button></a>
					<a href="hasilcetak.php" target="_blank"><button class='btn btn-outline btn-primary'><i class='fa fa-print'> </i> Print</button></a>
				</div>
				<h4>Hasil Selesksi Jurusan</h4>
				
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr class='active'>
								<th>No </th>
								<th>NIS </th>
								<th>Nama Siswa </th>
								<th>fisika </th>
								<th>mtk</th>
								<th>B. Ingg </th>
								<th>Geo </th>
								<th>Eko </th>
								<th>B. Ind</th>
								<th>Skor</th>
								<th>Jurusan</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while ($row = mysql_fetch_object($query)) {
								$ss1 = exp($c1*log($row->fisika));
								$ss2 = exp($c2*log($row->matematika));
								$ss3 = exp($c3*log($row->b_inggris));
								$ss4 = exp($c4*log($row->geografi));
								$ss5 = exp($c5*log($row->ekonomi));
								$ss6 = exp($c6*log($row->b_indonesia));
								$ss =$ss1*$ss2*$ss3*$ss4*$ss5*$ss6;
								$v=$ss/$stotal;
								if ($no<40){
									$trhead='success';
								}
								else{
									$trhead='';
								}
								?>
								
								<tr class="<?php echo $trhead; ?>">
									<td><?php echo "$no."; ?></td>
									<td><?php echo $row->nis ?></td>
									<td><?php echo $row->nama_siswa ?></td>
									<td><?php echo $row->fisika ?></td>
									<td><?php echo $row->matematika ?></td>
									<td><?php echo $row->b_inggris ?></td>
									<td><?php echo $row->geografi ?></td>
									<td><?php echo $row->ekonomi ?></td>
									<td><?php echo $row->b_indonesia ?></td>
									<td><?php echo ''.round($v, 3); ?></td>
									<td><?php if ($no<41){echo "IPA"; $ipa++;}else{echo "IPS"; $ips++;}; ?></td>
								</tr>
								<?php
								$no++;
								$i++;
							}
							?>
						</tbody>
						<?php 
							echo "Jumlah Siswa IPA : $ipa <br>";
							echo "Jumlah Siswa IPS : $ips <br>";
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


	