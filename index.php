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
        <link rel="stylesheet" href="css/home.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php"><img src="img/diskamtam.png" alt="" class="logo"> Park Ranger</a></h1>
			    <?php
			    	session_start();
			    	if(!isset($_SESSION['loggedIn'])) 
			    		$_SESSION['loggedIn'] = FALSE;

			    	if($_SESSION['loggedIn']==FALSE) {
			    		$loginText = "<a href='login.php'>Login</a>";
			    		$status ="Not logged in yet";
			    	}
			    	else {
			    		$loginText = "<a href='logout.php'>Logout</a>";
			    		$status = "Logged in as <a href='edit_profil?id=".$_SESSION['id_user']."'>".$_SESSION['username']."</a>";
			    	}
			    ?>
			    <p class="text-right"><?php echo $status ?></p>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li class="active"><a href="index.php">Home</a></li>
		        	<li><a href="lapor.php">Kirim Laporan</a></li>
		        	<li><a href="about.php">About</a></li>
		        	<li><?php echo $loginText ?></li>
		        </ul>
	       	</div>
	       	<br/>
	       	<div class="dropdown text-right">
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
			<br />
			<?php
			require_once("pengaduan.php");
			$conn = createDBConnection();

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
					$status = ($row['status']=="0")?"Belum ditindaklanjuti":"Sudah ditindaklanjuti";
					$color = ($row['status']==0)?"danger":"success";
					$icon = ($row['status']==0)?"remove":"ok";
					$tgl = date_create($row['waktu']);
					$date = date_format($tgl, "d/m/Y");
			?>
	       	<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-3">
							<a href="#" class="thumbnail">
								<img src="img/taman/<?php echo $row["file_foto"]?>"alt="taman">
							</a>
						</div>
						<div class="col-xs-9 deskripsi">
							<h2><a href="#"><strong>Taman <?php echo $taman ?></strong></a></h2>
							<p class="text-warning">Jenis laporan : <?php echo $row['kategori'] ?></p>
							<p><?php echo $row['keterangan'] ?></p>
							<span class="text-warning waktu"><?php echo $date ?></span>
						</div>
						<div class="col-xs-9 col-xs-offset-3 status-box">
								<div class="col-xs-9 status">
									<span class="text-<?php echo $color ?>"><span class="glyphicon glyphicon-<?php echo $icon ?>"></span> <?php echo $status ?></span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary"><?php echo $pelapor ?> </a> <a href="#"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</div>
								<div class="vote col-xs-3 text-right">
									<a href="#"><span class="glyphicon glyphicon-triangle-top"></span></a>
									<?php echo $row['rank_vote'] ?>
									<a href="#"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
								</div>
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
				Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.<br/>
				Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
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
