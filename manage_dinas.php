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
        <link rel="stylesheet" href="css/manage_dinas.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script>
        	$(function() {

        	});
        	function ubahKategori(sel) {

					if(sel.value!=0) {
						var id_dinas = sel.value;
	        			var kategori=$(sel.options[sel.selectedIndex]).text();
	        			$.post("ubah_kategori_dinas.php", {id:id_dinas,kategori:kategori},
	        				function(result) {
	        					if(result==1) {
	        						sel.value = 0;
	        						$(sel.options[sel.selectedIndex]).val(0);
	        						$("#"+id_dinas+"_kategori").text(kategori);
	        					}
	        					else  {
	        						alert("Kategori gagal diubah.\n Terjadi kesalahan pada sistem.");
	        					}
        				});
	        		}
	        	}
        </script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
			    <p class="text-right">Logged in as <a href="#">Admin</a></p>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php">Home</a></li>
		        	<li><a href="lapor.php">Kirim Laporan</a></li>
		        	<li><a href="about.php">About</a></li>
		        	<li><a href="logout.php">Log Out</a></li>
		        </ul>
	       	</div>
	       	<br/>
	       	
	       	<a class="btn btn-primary btn-laporan" href="manage_laporan.php" role="button">Manage Laporan</a>
	       	<a class="btn btn-primary btn-user" href="manage_user.php" role="button">Manage User</a>
	       	<a class="btn btn-primary btn-user" href="manage_taman.php" role="button">Manage Taman</a>
	       	<a class="btn btn-primary active btn-user" href="manage_dinas.php" role="button">Manage Dinas</a>
	       	<a class="btn btn-primary btn-user" href="manage_kategori.php" role="button">Manage Kategori</a>
			<div class="clearfix"></div>
			<br />
	       	
	       	
	       	<div class="col-xs-4"><h2 class="text-primary subtitle">Tambah Dinas</h2></div>
	       	<div class="col-xs-4"><h2 class="text-primary subtitle2">Daftar Dinas</h2></div>
	       	<div class="clearfix"></div>
      		
	       	<form class="col-xs-4 col-xs-offsets-3 form" action="tambah_dinas.php" method="POST">
	       		<div class="form-group">	
		       		<label for="nama" class="control-label">Nama dinas</label>
	          		<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
		       	</div>
		       	<div class="form-group">	
		       		<label for="jenisLaporan" class="control-label">Jenis laporan</label>
		       		<select name="jenisLaporan" id="jenisLaporan" class="form-control">
		       			<option value="kenyamanan">Kenyamanan</option>
		       			<option value="kebersihan">Kebersihan</option>
		       			<option value="keamanan">Keamanan</option>
		       			<option value="sarpras">Sarana dan prasarana</option>
		       			<option value="ketertiban">Ketertiban</option>
		       		</select>
		       	</div>
		       	<div class="form-group">	
		       		<label for="email" class="control-label">Email</label>
	       			<input type="email" name="email" id="email" class="form-control" placeholder="Email">
		       	</div>
	       		<div class="form-group">	
		       		<label for="username" class="control-label">Username</label>
	          		<input type="text" name="username" id="username" class="form-control" placeholder="Pick a username">
		       	</div>
		       	<div class="form-group">	
		       		<label for="password" class="control-label">Password</label>
		       		<input type="password" name="password" id="password" class="form-control" placeholder="Password">
		       	</div>
		       	<div class="form-group">	
		       		<label for="confirmPassword" class="control-label">Konfirmasi password</label>
	       			<input type="password" name="passwordConfirm" id="confirmPassword" class="form-control" placeholder="Re-type password">	       			
		       	</div>
	       		<input type="submit" value="Daftarkan" class="btn btn-primary btn-block">
	       	</form>
	       	<div class="col-xs-7">
      			<table class="table table-stripped table-hover">
      				<?php
   					$sql = "SELECT * FROM pihak_berwenang NATURAL JOIN user";
   					$result = $conn->query($sql);
   					if($result->num_rows > 0) {
   						while($row=$result->fetch_assoc()) {
   					?>
      				<tr>
      					<td><h3 class="text-success"><?php echo $row['nama'] ?></h3></td>
      					<td><h3 class="text-success" id="<?php echo $row['id_user'] ?>_kategori"><?php echo $row['kategori'] ?></h3></td>
      					<td>
      						<select name="pilKategori" id="pilKategori" class="form-control" onchange="ubahKategori(this)">
      							<option value="0">Ubah jenis laporan...</option>
      							<option value="<?php echo $row['id_user'] ?>">Kebesihan</option>
      							<option value="<?php echo $row['id_user'] ?>">Kenyamanan</option>
      						</select>
  						</td>
      					<td><a class="btn btn-danger btn-block" href="hapus_dinas.php?id=<?php echo $row['id_user'] ?>">Hapus</a></td>
      				</tr>
      				<?php
      					}
      				}
      				else {
      					echo "Belum ada dinas yang terdaftar.";
      				}?>
      			</table>
      		</div>
	       	<div class="clearfix"></div>
			<p class="text-center footer">
				<br/>
				Copyright &copy; 2014. ParkRanger. All rights reserved.<br/>
				Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.<br/>
				Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
				<br/>
			</p>
	    </div>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
