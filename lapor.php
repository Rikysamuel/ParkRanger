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
        <link rel="stylesheet" href="css/lapor.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <?php

			include 'pengaduan.php';

			$link = init();
			$daftar_taman = fetchTaman($link);
			$kategori_kerusakan = fetchKategori($link);

			$uploadOK = 1;

			if(isset($_POST["simpan"]) && isset($_FILES['gambar'])) {
				echo 'taman : '.$_POST["taman"]." jenis : ".$_POST["jenis"]." desk: ".$_POST["deskripsi"];

				$res = tambahLaporan($link, $_POST["taman"], $_POST["jenis"], $_POST["deskripsi"], 3, $_FILES["gambar"]);
				
				// if ($res=1) {
			    // 	header('Location: index.php');
			    // }
			    // else {
			    // 	echo 'insert error';
			    // }
			}
			closeConnection($link);

		?>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
        	    <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
		    	<p class="text-right">Logged in as <a href="#">Edmund</a></p>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php">Home</a></li>
		        	<li class="active"><a href="lapor.php">Kirim Laporan</a></li>
		        	<li><a href="about.php">About</a></li>
		        	<li><a href="logout.php">Log Out</a></li>
		        </ul>
	       	</div>
	       	<h2 class="text-primary subtitle col-xs-6">Kirim Laporan</h2>
	       	<div class="clearfix"></div>
	       	<form id="lapor" name ="post" action="lapor.php" method="POST" enctype="multipart/form-data" class="form-horizontal col-xs-6 col-xs-offsets-3">
	       		<div class="form-group">
		       		<label for="taman" class="col-xs-3 control-label">Taman</label>
		       		<div class="col-xs-9">
			       		<select class="form-control" id="taman" name="taman">
			       			<?php
			       				$value = 0;
			                    while ($value<count($daftar_taman)-1) {
			                ?>
			                	<option value = "<?php echo $daftar_taman[$value][0]?>"><?php echo $daftar_taman[$value][0] ?></option>
			       			<?php  $value++;
			       				} ?>
			       		</select>
		       		</div>
		       	</div>
		       	<div class="form-group">
		       		<label for="jenis" class="col-xs-3 control-label">Jenis laporan</label>
		       		<div class="col-xs-9">
		       			<select class="form-control" id="jenis" name="jenis">
			       			<option value = "Tidak tahu"> Tidak Tahu </option>
			       			<?php
			       				$it = 0;
			                    while ($it < count($kategori_kerusakan)-1) { ?>
			                    <option value = "<?php echo $kategori_kerusakan[$it][0]?>"><?php echo $kategori_kerusakan[$it][0] ?></option>
			       			 <?php $it++;
			       			 } ?>
			       		</select>
			       	</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="gambar" class="col-xs-3 control-label">Gambar</label>
		       		<div class="col-xs-9">
		       			<input type="file" name="gambar" id="gambar" class="form-control">
		       		</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="deskripsi" class="col-xs-3 control-label">Deskripsi</label>
		       		<div class="col-xs-9">
		       			<textarea class="form-control" rows="4" id="deskripsi" name="deskripsi"></textarea>
	       			</div>
	       		</div>
	       		<input type="submit" value="simpan" name ="simpan" class="btn btn-primary btn-block">
	       	</form>
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
