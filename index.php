<?php session_start();
include "koneksi.php";
if(isset($_SESSION['id_user'])){

	include "koneksi.php";
	
	if(isset($_GET['id_user'])){
		$id_user=$_GET['id_user'];
	}
	
	if(empty($_GET['id_user'])){
		$id_user=$_SESSION['id_user'];
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pemilihan Jurusan SMA</title>
	
	<style type="text/css">@import url(css/reset.css);</style>
    <style type="text/css">@import url(css/style.css);</style> 
	<LINK rel="stylesheet" type="text/css" href="css/print.css" media="print">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> <!--jQuery-->
	
	<!-- sweetAlert -->
	<script src="lib/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>            
			jQuery(document).ready(function() {
				var offset = 200;
				var duration = 500;
				jQuery(window).scroll(function() {
					if (jQuery(this).scrollTop() > offset) {
						jQuery('.scroll-to-top').fadeIn(duration);
					} else {
						jQuery('.scroll-to-top').fadeOut(duration);
					}
				});
				
				jQuery('.scroll-to-top').click(function(event) {
					event.preventDefault();
					jQuery('html, body').animate({scrollTop: 0}, duration);
					return false;
				})
			});
	</script>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=njurusan>
  $("#njurusan").change(function(){
    var njurusan = $("#njurusan").val();
    $.ajax({
        url: "ambilkelas.php",
        data: "njurusan="+njurusan,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#nkelas").html(msg);
        }
    });
  });
});

</script>
</head>

<body>

    <div id="wrapper">
		<div class="position:fixed;">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sistem Pemilihan Jurusan ( Metode WP )</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li class="divider"></li>
                        <li><a href="logout.php" onclick="return confirm('Apakah Anda yakin akan keluar?')"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <?php include "navbar.php"; ?>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

		
        <div id="page-wrapper">
				<?php
					if (isset($_GET['mod'])) {
							switch ($_GET['mod']) {

								case 'data_siswa':
									if (isset($_GET['func'])) {
										switch ($_GET['func']) {
											case 'create':
											case 'update':
												include 'data_siswa/form_siswa.php';
												break;
											case 'update2':
											case 'create2':
												include 'data_siswa/form_nilai.php';
												break;
											case 'kelas':
												include 'data_siswa/data_kelas.php';
												break;
											case 'view':
												include 'data_siswa/detail_siswa.php';
												break;
											case 'hasil':
												include 'data_siswa/seleksi.php';
												break;
											case 'delete':
												include 'data_siswa/delete_siswa.php';
											default:
												include 'data_siswa/home_siswa.php';
												break;
										}
									} else {
										include 'data_siswa/home_siswa.php';
									}
									break;
								default:
									break;
							}
						}
						else { include 'dashboard.php';
						}
					?>
					
					<!-- alert -->
					<?php
						switch((isset($_GET['aks'])? $_GET['aks']:''))
						{

						default: 
						echo "";
						break;
						
						case "error1":
							echo "<script language=\"javascript\">
									alert(\"Proses gagal.\");
								  </script>";
						break;

						case "sukses1":
						?>
						<script language="javascript">
							$(document).ready(function(){
							  swal({
								title: "Sukses",
								text: "Data berhasil di simpan",
								type: "success"
							  });
							});
						</script>
						<?php
						break;
						
						case "sukses2":
							echo "<script language=\"javascript\">
									sweetAlert(\"data berhasil diupdate\");
								  </script>";
						break;
						
						case "sukses3":
							echo "<script language=\"javascript\">
									alert(\"data berhasil dihapus\");
								  </script>";
						break;


						case "error4":
							echo "<script language=\"javascript\">
									alert(\"Gilang Parase!\");
								  </script>";
						break;
						}
					?>

                <!-- /.col-lg-12 -->
            </div>
			
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
	<div class="scroll-to-top">
		<!-- <p>Scroll to top</p> *Use this as a text option, instead of the image icon.*-->
	</div>

		
		
	<!--Retina js for retina display devices *Optional*-->
		<script type="text/javascript" src="js/retina.js"></script>
	<!--Retina Js-->
</body>

</html>

<?php
}

else{
	header("Location:formlogin.php?status=denied");
}
?>
