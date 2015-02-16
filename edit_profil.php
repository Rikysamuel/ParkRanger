<?php
  include('DBConfig.php');
  // include('user.php');
?>

<?php
	session_start();
    $id_user = $_SESSION["id_user"];    //$_GET['id_user'];
    $query = mysql_query("SELECT `nama`, `email`, `username`, `password` FROM `user` WHERE `id_user`=$id_user") or die(mysql_error());
    $data = mysql_fetch_array($query);
	// $data = getAllAtributes(1);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <script>
	function validatePassword() {
		var oldPassword,newPassword,confirmPassword,output = true;

		oldPassword = document.formChange.oldPassword;
		newPassword = document.formChange.newPassword;
		confirmPassword = document.formChange.confirmPassword;

		if(newPassword.value != confirmPassword.value) {
			newPassword.value="";
			confirmPassword.value="";
			newPassword.focus();
			document.getElementById("confirmPassword").innerHTML = "not same";
			$(".box-warning").css("display","block");
            $(".box-warning").empty();
			$(".box-warning").append("<p><span class='glyphicon glyphicon-remove-circle'> </span> Password tidak sama</p>")
			output = false;
		}
		return output;
	}
	</script>
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
        <link rel="stylesheet" href="css/edit_profil.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
        	    <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
		    	<p class="text-right">Masuk sebagai <a href="edit_profil.php"><?php echo $data['nama'];?></a></p>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php">Halaman Utama</a></li>
		        	<li><?php if (isset($_SESSION["id_user"])&&($_SESSION["role"]==3))
		        					echo '<a href="lapor.php">';
		        				else echo '<a href="login.php">';
		        			?>Kirim Laporan</a></li>
		        	<li><a href="about.php">Tentang Kami</a></li>
		        	<li><a href="logout.php">Keluar</a></li>
		        </ul>
	       	</div>
	       	<h2 class="text-primary subtitle col-xs-6">Edit Profil</h2>
	       	<div class="clearfix"></div>
	       	<form name="formChange" action="update_user.php" method="POST" onSubmit="return validatePassword()" class="form-horizontal col-xs-6 col-xs-offsets-3">
	       		<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
	       		<div class="form-group">
	       			<label for="username" class="col-xs-4 control-label">Username</label>
	       			<div class="col-xs-8">
	       				<input type="text" name="username" id="username" class="form-control" placeholder="edmund.ophie" value="<?php echo $data['username'] ?>">
       				</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="email" class="col-xs-4 control-label">Email</label>
	       			<div class="col-xs-8">
	       				<input type="email" name="email" id="email" class="form-control" placeholder="edmund.ophie@yahoo.com" value="<?php echo $data['email'] ?>">
       				</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="nama" class="col-xs-4 control-label">Nama</label>
	       			<div class="col-xs-8">
	       				<input type="text" name="nama" id="nama" class="form-control" placeholder="Edmund Ophie" value="<?php echo $data['nama'] ?>">
       				</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="oldPassword" class="col-xs-4 control-label">Password lama</label>
	       			<div class="col-xs-8">
	       				<input type="password" name="oldPassword" id="oldPassword" class="form-control" >
       				</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="newPassword" class="col-xs-4 control-label">Password baru</label>
	       			<div class="col-xs-8">
	       				<input type="password" name="newPassword" id="newPassword" class="form-control">
       				</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="confirmPassword" id="label-confirm" 	class="col-xs-4 control-label">Konfirmasi password</label>
	       			<div class="col-xs-8">
	       				<input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
       				</div>
	       		</div>
	       		<input type="submit" value="Edit" class="btn btn-primary btn-block">
	       	</form>
	       	<div class="col-xs-3 box-warning">
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
