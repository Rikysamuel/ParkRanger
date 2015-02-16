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
        <link rel="stylesheet" href="css/login.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
		<script>
			$(function() {
				jQuery(function() {
					$("input[type='submit']").click(function() {
						var username = $("#username").val();
						var password = $("#password").val();
						if(username=="" || password==""){
							$(".box-warning").empty();
							$(".box-warning").css("display","block");
							$(".box-warning").append("<p><span class='glyphicon glyphicon-remove-circle'> </span> Username/password masih kosong</p>")
							
						}
						else{
							$.post("do_login.php", {username:username,password:password}, 
		            			function(result) {
		            				if(result==0) { // Login gagal
									   $(".box-warning").empty();
		            					$(".box-warning").append("<p><span class='glyphicon glyphicon-remove-circle'> </span> Username/password salah</p>")
		                                $(".box-warning").css("display","block");
		            				}
		            				else{
										window.location = result;
		            				}
		        			});
						}
					});	
				});
			});
		</script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
        	    <h1 class="text-muted"><a href="index.php"><img src="img/diskamtam.png" alt="" class="logo"> Park Ranger</a></h1>
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
		        				
		        	<li><a href="about.php"><span class="glyphicon glyphicon-tree-deciduous"></span> Tentang Kami</a></li>
		        	<?php if (isset($_SESSION["id_user"]))
                                 echo '<li><a href="logout.php"><span class="glyphicon glyphicon-ban-circle"></span> Keluar</a></li>';
                          else   
                          		echo '<li class="active"><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>';     
                            ?>
		        </ul>
	       	</div>
	       	<h2 class="text-primary subtitle col-xs-6">Login</h2>
	       	<div class="clearfix"></div>
	       	<div class="col-xs-4 col-xs-offsets-3 form">
	       		<div class="form-group">	
		       		<label for="username" class="control-label">Username</label>
	       			<input type="username" name="username" id="username" class="form-control" placeholder="Username">
		       	</div>
		       	<div class="form-group">	
		       		<label for="password" class="control-label">Password</label>
		       		<input type="password" name="password" id="password" class="form-control" placeholder="Password">
		       	</div>
		       	<p>Belum menjadi anggota? Daftar <a href="register.php">disini</a>.</p>
		       	<div class="form-group box-warning">
		       	</div>
		       	<input type="submit" value="LOGIN" name ="login" class="btn btn-primary btn-block">
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
