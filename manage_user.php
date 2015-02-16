
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
        <link rel="stylesheet" href="css/manage_user.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php"><img src="img/diskamtam.png" alt="" class="logo">Park Ranger</a></h1>
			    <?php
			    	session_start();
			    	if (isset($_SESSION["id_user"])){
					 	$user = $_SESSION["username"];
						echo '<p class="text-right">Masuk sebagai <a href="edit_profil.php">'.$user.'</a></p>';
						
					}
					else {
						echo '<p class="text-right">Belum masuk? <a href="login.php">login</a> or <a href="register.php">register</a></p>';	
			    
					}
			    ?>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li class="active"><a href="manage_laporan.php">Halaman Utama</a></li>
		        	<li><a href="about.php">Tentang Kami</a></li>
		        	<?php if (isset($_SESSION["id_user"]))
                                 echo '<li><a href="logout.php">Keluar</a></li>';
                            ?>
		        </ul>
	       	</div>
	       	<br/>
	       	
	       	<a class="btn btn-primary btn-laporan" href="manage_laporan.php" role="button">Manage Laporan</a>
	       	<a class="btn btn-primary active btn-user" href="manage_user.php" role="button">Manage User</a>
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

			// 1:admin, 2:dinas, 3:member
			$sql = "SELECT * FROM user WHERE role=3";
			$result = $conn->query($sql);
			
			if($result->num_rows > 0) {
				while($row= $result->fetch_assoc()) {
					// Get user id and status
					$uid = $row['id_user'];
					$sql2 = "SELECT jumlah_report, status FROM member WHERE id_user=$uid";
					$result2 = $conn->query($sql2);
					if($result2->num_rows > 0) {
						$row2 = $result2->fetch_assoc();
						$status = $row2['status'];
						$jumlah_report = $row2['jumlah_report'];
					}

					// Set status and css-coloring
					$color = ($status=="unbanned")?"success":"danger";
					$color2 = ($color=="success")?"danger":"success";
					$btnText = ($color2=="success")?"Unbanned user":"Banned user";
					$btnIcon = ($color2=="success")?"ok":"ban";
			?>
      		<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-12 deskripsi">
							<h2 class="text-primary"><strong><?php echo $row['username']?></strong></h2>
							<p class="text-warning">Dilaporkan :  <?php echo $jumlah_report ?> kali</p>
						
							<div class="col-xs-9">
								<span class="text-<?php echo $color ?>">Status : <?php echo $status ?></span><br />
							</div>
							<form class="col-xs-3" action="banned_user.php" method="POST">
								<input type="hidden" name="id_user" value="<?php echo $uid ?>">
								<input type="hidden" name="aksi" value="<?php echo $btnText ?>">
								<button class="btn btn-<?php echo $color2 ?> btn-sm btn-block"><span class="glyphicon glyphicon-<?php echo $btnIcon ?>-circle"></span> <?php echo $btnText ?></button>
							</form>
						</div>
					</div>
	        	</div>
      		</div><!-- End of Panel -->
			<?php
				}
			}
			else {
				echo "Tidak ada user terdaftar";
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

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
