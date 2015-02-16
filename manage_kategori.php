<?php
extract($_POST);
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "parkranger";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/manage_kategori.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
			   <?php include ('koneksi.php'); 
				    session_start();
					if (isset($_SESSION["id_user"])){
					 	$user = $_SESSION["id_user"];
						$online = mysql_query("select * from user where id_user = '$user'");
						while($tabel_user = mysql_fetch_array($online)){
						    echo '<p class="text-right">Masuk sebagai <a href="edit_profil.php">'.$tabel_user["nama"].'</a></p>';
						}
					}
					else {
						echo '<p class="text-right">Belum masuk? <a href="login.php">login</a> or <a href="register.php">daftar</a></p>';	
			    
					}
			    ?> 
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="manage_laporan.php">Halaman Utama</a></li>
		        	
		        	<li><a href="about.php">Tentang Kami</a></li>
		        	<li><a href="logout.php">Keluar</a></li>
		        </ul>
	       	</div>
	       	<br/>
	       	
	       	<a class="btn btn-primary btn-laporan" href="manage_laporan.php" role="button">Manage Laporan</a>
	       	<a class="btn btn-primary btn-user" href="manage_user.php" role="button">Manage User</a>
	       	<a class="btn btn-primary btn-user" href="manage_taman.php" role="button">Manage Taman</a>
	       	<a class="btn btn-primary btn-user" href="manage_dinas.php" role="button">Manage Dinas</a>
	       	<a class="btn btn-primary active btn-user" href="manage_kategori.php" role="button">Manage Kategori</a>
			<div class="clearfix"></div>
			<br />
	       	
	       	
	       	<div class="col-xs-4"><h2 class="text-primary subtitle">Tambah Jenis Laporan</h2></div>
	       	<div class="col-xs-4"><h2 class="text-primary subtitle2">Daftar Jenis Laporan</h2></div>
	       	<div class="clearfix"></div>
      		
	       	<div class="col-xs-4 col-xs-offsets-3 form">
	       		<div class="form-group">	
		       		<label for="nama" class="control-label">Jenis laporan</label>
	          		<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan jenis laporan">
		       	</div>
	       		<input type="submit" value="Tambah" class="btn btn-primary btn-block">
	       	</div>
	       	<div class="col-xs-4">

      		
      			<table class="table table-stripped table-hover">
      				<tr>
      					<td><h3>Kenyamanan</h3></td>
      					<td><button class="btn btn-danger btn-sm btn-block">Hapus</button></td>
      				</tr>
      				<tr>
      					<td><h3>Kebersihan</h3></td>
      					<td><button class="btn btn-danger btn-sm btn-block">Hapus</button></td>
      				</tr>
      				<tr>
      					<td><h3>Kebersihan</h3></td>
      					<td><button class="btn btn-danger btn-sm btn-block">Hapus</button></td>
      				</tr>
      			</table>
      		</div>
	       	<div class="clearfix"></div>
			<p class="text-center footer">
				<br/>
				Copyright &copy; 2014. ParkRanger. All rights reserved.<br/>
				<br/>
			</p>
	    </div>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
