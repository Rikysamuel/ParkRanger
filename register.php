<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pendaftaran</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/register.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script>
            $(function(){
            	function doRegister() {
            		var nama = $("#nama").val();
            		var email = $("#email").val();
            		var username = $("#username").val();
            		var password = $("#password").val();
            		$.post("do_register.php", {nama:nama,email:email,username:username,password:password}, 
            			function(result) {
            				if(result==1) {
            					$(".subtitle,.form").css("display","none");
            					$(".box-warning").addClass("box-success");
            					$(".box-success").removeClass("box-warning");
            					$(".box-success").html("<p><span class='glyphicon glyphicon-ok-circle'></span> Pendaftaran berhasil.</p><p>Anda sekarang bisa <a href='login.php'><strong>login</strong></a> sebagai member.</p>");
            				}
            				else {
                                $(".box-warning").empty();
            					$(".box-warning").append("<p><span class='glyphicon glyphicon-remove-circle'> </span> Pendaftaran gagal.<br/>Terjadi kesalahan pada sistem.</p>")
            				}
        			});
        		}

            	jQuery(function(){
            		$("input[type='submit']").click(function(){
    					var password = document.getElementById("password").value;
    	        		var confirmPassword = document.getElementById("confirmPassword").value;
            			console.log(password);
            			console.log(confirmPassword);
            			if(password==confirmPassword) {
            				doRegister();
            			}
            			else {
            				$(".box-warning").css("display","block");
                            $(".box-warning").empty();
            				$(".box-warning").append("<p><span class='glyphicon glyphicon-remove-circle'> </span> Password tidak cocok</p>")
            				return false;
            			}
            		});
            	});
            });
        </script>
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
                    <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Halaman Utama</a></li>
                     <?php if (isset($_SESSION["id_user"])&&($_SESSION["role"]==3)) {
                                    echo '<li><a href="lapor.php"><span class="glyphicon glyphicon-link"></span> Kirim Laporan</a></li>';
                                }   ?>
                                
                    <li><a href="about.php"><span class="glyphicon glyphicon-tree-deciduous"></span> Tentang Kami</a></li>
                    <?php if (isset($_SESSION["id_user"]))
                                 echo '<li><a href="logout.php"><span class="glyphicon glyphicon-ban-circle"></span> Keluar</a></li>';
                          else   
                                echo '<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>';     
                            ?>
                </ul>
	       	</div>
	       	<h2 class="text-primary subtitle col-xs-6">Pendaftaran</h2>
	       	<div class="clearfix"></div>
	       	<div class="col-xs-4 col-xs-offsets-3 form">
	       		<div class="form-group">	
		       		<label for="nama" class="control-label">Nama</label>
	          		<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
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
		       		<label for="confirmPassword" class="control-label">Confirm password</label>
	       			<input type="password" name="passwordConfirm" id="confirmPassword" class="form-control" placeholder="Re-type password">	       			
		       	</div>
	       		<input type="submit" value="Daftar" class="btn btn-primary btn-block">
	       	</div>
	       	<div class="col-xs-4 box-warning">
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
