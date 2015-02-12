<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kirim Pengaduan</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/lapor.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>

        <?php

			include 'DBConfig.php';

			session_start();

			$nama_taman = mysql_query("SELECT nama FROM taman",$link);
			$kategori_kerusakan = mysql_query("SELECT kategori FROM pihak_berwenang",$link);
			while ($row = mysql_fetch_array($kategori_kerusakan)) {
				echo "<script> console.log(".$row["kategori"].");</script>";
			}

			$uploadOK = 1;

			if(isset($_POST['simpan'])) {
				$fileName = $_FILES['gambar']['name'];
				$targetFile = "gambar/" . basename($_FILES['gambar']['name']);
				
				$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
				$check = getimagesize($_FILES["gambar"]["tmp_name"]);
				    if($check !== false) {
				        $uploadOk = 1;
				    } else {
				        $uploadOk = 0;
				}
				if (file_exists($targetFile)) {
					$targetFile = $targetFile . $characters[mt_rand(0, 61)];
				}
				if ($_FILES["gambar"]["size"] > 2000) {
				    $uploadOk = 0;
				}

				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
				} else {
				    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
				        echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				}
				
				$Taman =$_POST['taman'];
				$id_taman = mysql_query("SELECT id_taman from taman where nama='$Taman'"); 
			    $kategori=$_POST['jenis'];
			    $ditangani_by = mysql_query("SELECT id_user from pihak_berwenang where kategori='$kategori'");
			    $keterangan=$_POST['keterangan'];
			    $waktu=time();
			    $pelapor=$_SESSION["user_id"];

			    $query = mysql_query("INSERT INTO pengaduan(rank_vote, waktu, file_foto, id_taman, ditangani_by, pelapor, keterangan) 
			    					  VALUES (0, ’$waktu’, ’$targetFile’, ’$id_taman’, ’$ditangani_by’, ’$pelapor’, ’$keterangan’;");
			    header('Location: index.php');
			}
			mysql_close($link);

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
	       	<form action="lapor.php" method="POST" class="form-horizontal col-xs-6 col-xs-offsets-3" onsubmit = "return validateForm()">
	       		<div class="form-group">
		       		<label for="taman" class="col-xs-3 control-label">Taman</label>
		       		<div class="col-xs-9">
			       		<select class="form-control" id="taman" required>
			       			<?php
			                    while ($row = mysql_fetch_array($nama_taman)) {
			                ?>
			                	<option><? php echo $row["nama"] ?></option>
			       			<?php } ?>
			       		</select>
		       		</div>
		       	</div>
		       	<div class="form-group">
		       		<label for="jenis" class="col-xs-3 control-label">Jenis laporan</label>
		       		<div class="col-xs-9">
			       		<select class="form-control" id="jenis" required>
			       			<?php
			                    while ($row = mysql_fetch_array($kategori_kerusakan)) {
			                	echo '<option value ="'.$row["kategori"].'">'.$row["kategori"].'</option>';
			       			 } ?>
			       		</select>
			       	</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="gambar" class="col-xs-3 control-label">Gambar <br/> (max 2MB)</label>
		       		<div class="col-xs-9">
		       			<input type="file" name="gambar" id="gambar" class="form-control" required>
		       		</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="deskripsi" class="col-xs-3 control-label">Deskripsi</label>
		       		<div class="col-xs-9">
		       			<textarea id="keterangan" class="form-control" rows="4" required></textarea>
	       			</div>
	       		</div>
	       		
	       		<input type="submit" value="Laporkan!" name="simpan" class="btn btn-primary btn-block">
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

        <script type="text/javascript">
        function validateForm() {
            var taman = document.getElementById("taman").value;
            var jenis = document.getElementById("jenis").value;
            var deskripsi = document.getElementById("deskripsi").value;
            if (taman == "") {
                alert("Pilih lokasi taman");
                return false;
            }
            else if (jenis == "") {
                alert("Pilih kategori pengaduan");
                return false;
            }
            else if (deskripsi == "") {
                alert("Deskripsi harus diisi");
                return false;
            }
            else {
            	return true;
            }

        }
    </script>

    </body>
</html>