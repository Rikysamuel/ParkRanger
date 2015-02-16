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

        <?php 
        	include 'user.php';

        	if (isset($_POST["login"])) {
        		$username = $_POST["username"];
        		$password = $_POST["password"];

        		session_start();
        		$link = init();

        		$valid = isValid($link, $username, $password);
        		if ($valid == 1) {
        			$id_user = getId($link, $username);
        			if ($id_user!=-1)
        				$_SESSION["id_user"] = $id_user;
        			else
        				echo 'id not found';
        			$role = getRole($link, $username);
        			if ($role!=-1)
        				$_SESSION["role"] = $role;
        			else 
        				echo 'role not found';
					//echo "user; ".$_SESSION["id_user"]." : ".$_SESSION["role"];
					if ($role==1)	
						header('Location: manage_laporan.php');
					else if ($role==2)
						header('Location: dinas.php');
					else if($role==3)
						header('Location: index.php');
        		}
        		else {
        			echo 'Username dan password salah';
        		}
        		closeConnection($link);
        	}

        ?>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
        	    <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
		    	
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php">Halaman Utama</a></li>
		        	<li><?php if (isset($_SESSION["id_user"])&&($_SESSION["role"]==3))
                                    echo '<a href="lapor.php">';
                                else echo '<a href="login.php">';
                            ?>Kirim Laporan</a></li>
		        	<li><a href="about.php">Tentang Kami</a></li>
                    <li><a href="register.php">Daftar</a></li>
		        </ul>
	       	</div>
	       	<h2 class="text-primary subtitle col-xs-6">Login</h2>
	       	<div class="clearfix"></div>
	       	<form action="#" method="POST" class="col-xs-4 col-xs-offsets-3">
	       		<div class="form-group">	
		       		<label for="username" class="control-label">Username</label>
	       			<input type="username" name="username" class="form-control" placeholder="Username">
		       	</div>
		       	<div class="form-group">	
		       		<label for="password" class="control-label">Password</label>
		       		<input type="password" name="password" class="form-control" placeholder="Password">
		       	</div>
		       	<p>Belum menjadi anggota? Daftar <a href="register.php">disini</a>.</p>
		       	<input type="submit" value="LOGIN" name ="login" action="login.php" class="btn btn-primary btn-block">
	       	</form>
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

    </body>
</html>
