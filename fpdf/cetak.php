<?php
    session_start();
    include "koneksi.php";
    require('fpdf.php');
    $q = mysql_query("
	SELECT * FROM nilai;
	 ") or die(mysql_error());
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

	
    $query = mysql_query("
	SELECT siswa.nis, siswa.nama_siswa,
			nilai.fisika,nilai.matematika,nilai.b_inggris,nilai.geografi,nilai.ekonomi,nilai.b_indonesia, nilai.total
	FROM siswa, nilai
	WHERE 
	siswa.nis=nilai.nis 
	ORDER BY `total` DESC ;
	 ") or die(mysql_error());

    //Variabel untuk iterasi
    $i = 0;
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($query))
    {	
        $cell[$i][0] = $data[0];
        $cell[$i][1] = $data[1];
        $cell[$i][2] = $data[2];
		$ss1 = exp($c1*log($data[2]));
        $cell[$i][3] = $data[3];
		$ss2 = exp($c2*log($data[3]));
		$cell[$i][4] = $data[4];
		$ss3 = exp($c3*log($data[4]));
		$cell[$i][5] = $data[5];
		$ss4 = exp($c4*log($data[5]));
		$cell[$i][6] = $data[6];
		$ss5 = exp($c5*log($data[6]));
		$cell[$i][7] = $data[7];
		$ss6 = exp($c6*log($data[7]));
		$ss =$ss1*$ss2*$ss3*$ss4*$ss5*$ss6;
		$v=$ss/$stotal;
		$cell[$i][8] = ''.round($v, 3);
        $i++;
    }
    //memulai pengaturan output PDF
    class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()
        {
			
			$tgl=date('l, d-M-Y');
            //Pengaturan Font Header
            $this->SetFont('Times','I',10); //jenis font : Times New Romans, Bold, ukuran 14
            //untuk warna background Header
            $this->SetFillColor(255,255,255);
            //untuk warna text
            $this->SetTextColor(0,0,0);
            //Menampilkan tulisan di halaman
			$this->cell(24,0,'SPK | Gilang Pandu Parase');
			$this->Cell(24,0, $tgl);
			$this->SetFont('Times','B',12);
			$this->Line(1,1.5,29,1.5);
			// membuat space kosong antara header dengan teks konten
			$this->Ln();
        }
		
		//untuk pengaturan FOOTER halaman
		function Footer()
		{
			// Go to 1.5 cm from bottom
			$this->SetY(-6);
			// Select Arial italic 8
			$this->SetFont('Arial','I',8);
			// Rata Tengah nomer halaman
			$this->Cell(0,10,'Halaman '.$this->PageNo().'dari {nb}',0,0,'C');
		}
    }
    //pengaturan ukuran kertas P = Portrait
	
    $pdf = new PDF('L','cm','A4');
	$pdf->SetTitle('Laporan');
	$pdf->AliasNbPages();
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','B',16);
	$pdf->Write(3,'Hasil seleksi penjurusan SMA');
	$pdf->Ln();
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(1,1,'No','LRTB',0,'C');
    $pdf->Cell(3,1,'Nis','LRTB',0,'C');
    $pdf->Cell(4,1,'Nama','LRTB',0,'C');
    $pdf->Cell(2,1,'Fisika','LRTB',0,'C');
    $pdf->Cell(2,1,'Mtk','LRTB',0,'C');
	$pdf->Cell(2,1,'B.Ing','LRTB',0,'C');
	$pdf->Cell(2,1,'Geo','LRTB',0,'C');
	$pdf->Cell(2,1,'Eko','LRTB',0,'C');
	$pdf->Cell(2,1,'B.Indo','LRTB',0,'C');
	$pdf->Cell(2,1,'Skor','LRTB',0,'C');
    $pdf->Ln();
    $pdf->SetFont('Times',"",10);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
        $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
        $pdf->Cell(3,1,$cell[$j][0],'LBTR',0,'C');
        $pdf->Cell(4,1,$cell[$j][1],'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][2],'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][3],'LBTR',0,'C');
		$pdf->Cell(2,1,$cell[$j][4],'LBTR',0,'C');
		$pdf->Cell(2,1,$cell[$j][5],'LBTR',0,'C');
		$pdf->Cell(2,1,$cell[$j][6],'LBTR',0,'C');
		$pdf->Cell(2,1,$cell[$j][7],'LBTR',0,'C');
		$pdf->Cell(2,1,$cell[$j][8],'LBTR',0,'C');
        $pdf->Ln();
    }
    //menampilkan output berupa halaman PDF
	$tanggal=date('dmY');
	$out="laporan_penjurusan_$tanggal.pdf";
	$pdf->Output($out, 'I');
?>