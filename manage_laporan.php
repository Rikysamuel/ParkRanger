<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
        <link rel="stylesheet" href="css/manage_laporan.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
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
		        	<li><a href="manage_laporan.php">Halaman utama</a></li>
		        	  
		        	<li><a href="about.php">Tentang Kami</a></li>
		        	<li><a href="logout.php">Keluar</a></li>
		        </ul>
	       	</div>
	       	<br/>
	       	
	       	<a class="btn btn-primary active btn-laporan" href="manage_laporan.php" role="button">Manage Laporan</a>
	       	<a class="btn btn-primary btn-user" href="manage_user.php" role="button">Manage User</a>
	       	<a class="btn btn-primary btn-user" href="manage_taman.php" role="button">Manage Taman</a>
	       	<a class="btn btn-primary btn-user" href="manage_dinas.php" role="button">Manage Dinas</a>
	       	<div class="dropdown text-right sort-menu">
	       	Sort by : &nbsp;
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
					Most recent
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Most recent</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Top votes</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Least votes</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Recently handled</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Recently unhandled</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<br />
			<?php
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

			// 1:admin, 2:dinas, 3:member
			$sql = "SELECT *,taman.nama as nama_taman, user.nama as nama_pelapor FROM pengaduan 
					JOIN pihak_berwenang ON pengaduan.ditangani_by=pihak_berwenang.id_user
					NATURAL JOIN taman 
					JOIN user ON pengaduan.pelapor=user.id_user";
			$result = $conn->query($sql);
			
			if($result->num_rows > 0) {
				while($row= $result->fetch_assoc()) {
					$taman = $row['nama_taman'];
					$pelapor = $row['nama_pelapor'];
					$status = ($row['status']==0)?"Belum ditindaklanjuti":"Sudah ditindaklanjuti";
					$icon = ($row['status']==0)?"remove":"ok";
					$color = ($row['status']==0)?"danger":"success";
					$tgl = date_create($row['waktu']);
					$date = date_format($tgl, "d/m/Y");
			?>
      		<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-3">
							<a href="#" class="thumbnail">
								<img src="img/taman/<?php echo $row['file_foto'] ?>" alt="taman">
							</a>
						</div>
						<div class="col-xs-9 deskripsi">
							<h2 class="text-primary"><strong>Taman <?php echo $taman ?></strong></h2>
							<p class="text-warning">Jenis laporan : <?php echo $row['kategori'] ?></p>
							<p>
								<?php echo $row['keterangan'] ?>
							</p>
							<span class="text-warning waktu"><?php echo $date ?></span>
						</div>
						<div class="col-xs-9 col-xs-offset-3 status-box">
							<div class="col-xs-8 status">
								<span class="text-<?php echo $color ?>"><span class="glyphicon glyphicon-<?php echo $icon ?>"></span> <?php echo $status ?></span><br />
								<small>Pelapor : <span class="text-primary"><?php echo $pelapor ?></span></small>
							</div>
							<div class=" col-xs-1 text-right">
								<h1><span class="label label-success"><?php echo $row['rank_vote'] ?></span></h1>
							</div>
							<form class="col-xs-3" action="hapus_laporan.php" method="GET">
								<input type="hidden" name="id_laporan" value="<?php echo $row['id_laporan'] ?>">
								<button type="submit" class="btn btn-danger btn-block">Hapus Laporan</button>
							</form>
						</div>
					</div>
	        	</div>
      		</div><!-- End of Panel -->
			<?php
				}
			}
			else {
				echo "Belum ada aduan yang dilaporkan.";
			}
			$conn->close();
			?>
			<nav class="text-center">
				<ul class="pagination">
					<li class="disabled">
						<a href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
						<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
			<p class="text-center footer">
				<br/>
				Copyright &copy; 2014. ParkRanger. All rights reserved.<br/>
				<br/>
			</p>
	    </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
