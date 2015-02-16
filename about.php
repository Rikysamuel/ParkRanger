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
        <link rel="stylesheet" href="css/about.css">
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
						echo '<p class="text-right"><span class="glyphicon glyphicon-user"></span> Masuk sebagai <a href="edit_profil.php">'.$user.'</a></p>';
						
					}
					else {
						echo '<p class="text-right"><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a> | <a href="register.php"><span class="glyphicon glyphicon-edit"></span> Daftar</a></p>';	
			    
					}
			    ?>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Halaman Utama</a></li>
		        	 <?php if (isset($_SESSION["id_user"])&&($_SESSION["role"]==3)) {
		        					echo '<li><a href="lapor.php"><span class="glyphicon glyphicon-link"></span> Kirim Laporan</a></li>';
		        				}	?>
		        				
		        	<li class="active"><a href="about.php"><span class="glyphicon glyphicon-tree-deciduous"></span> Tentang Kami</a></li>
		        	<?php if (isset($_SESSION["id_user"]))
                                 echo '<li><a href="logout.php"><span class="glyphicon glyphicon-ban-circle"></span> Keluar</a></li>';
                          else   
                          		echo '<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>';     
                            ?>
		        </ul>
	       	</div>
	       	

	       	<div class="clearfix"></div>
	       	<div class="col-xs-12">
	       	<h2 class="text-primary subtitle">Tentang Kami</h2>
	       	<p>
	       		Park Ranger merupakan website yang dibuat bekerja sama dengan Pemkot Bandung terkait dengan keamanan dan kenyamanan taman-taman di Bandung.
	       	Warga dapat melaporkan situasi terkini taman-taman di kota Bandung 24 jam. Park Ranger akan menerima laporan pengaduan dari warga, dan setiap pengaduan 
	       	yang diterima akan ditangani oleh pihak berwenang terkait. Warga yang terdaftar sebagai member juga dapat memberikan vote terhadap suatu laporan
	       	dan melaporkan member lain terkait laporan yang diberikan.  
	       	</p>
	       	</div>
	       	<div class="clearfix"></div>
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
        <script type="text/javascript" src="vote.js"></script>
    </body>
</html>
