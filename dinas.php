<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<?php
	$sort = 0;
?>
<html class="no-js"> <!--<![endif]-->
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
        <link rel="stylesheet" href="css/dinas.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
			    <p class="text-right">Masuk sebagai <a href="#">Satpol PP</a></p>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php">Halaman Utama</a></li>
		        	<li><a href="lapor.php">Kirim Laporan</a></li>
		        	<li><a href="about.php">Tentang</a></li>
		        	<li><a href="logout.php">Keluar</a></li>
		        </ul>
	       	</div>
	       	<br/>
	       	<div class="dropdown text-right">

	       	<!-- tambahin hidden form dummy buat sorting-->
	       	<form name="tempform" id="tempform" method="post">
				<input id="temp1" NAME="temp1" type="hidden"></input>
			</form>

	       	Urut sesuai : &nbsp;
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
					Terbaru
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation" name="sort" id="recent" onclick="$('#temp1').val('0'); $('#tempform').submit()" selected><a role="menuitem" tabindex="-1" href="#">Terbaru</a></li>
					<li role="presentation" name="sort" id="votes" onclick="$('#temp1').val('1'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Terfavorit</a></li>
					<li role="presentation" name="sort" id="handled" onclick="$('#temp1').val('2'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Baru ditangani</a></li>
					<li class="divider"></li> 
					<li role="presentation" name="sort" id="handled" onclick="$('#temp1').val('3'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Taman</a></li>
					<li role="presentation" name="sort" id="handled" onclick="$('#temp1').val('4'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Kategori</a></li>
				</ul>
			</div>
			<br />
			<?php include("InformasiDinas.php");
				$link = init();

				// writeMsg();
				if(isset($_POST['temp1'])){
					$sort = $_POST['temp1'];
				}
                $row = fetchPost($link);

                //data dalam array diprint ke halaman html
                for($it=0;$it<sizeof($row)-1;$it++){
                  echo reports($link, $row,$it);
                }
                //tutup koneksi
                closeConnection($link);
            ?>

      		<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-3">
							<a href="#" class="thumbnail">
								<img src="img/taman1.jpg" alt="taman">
							</a>
						</div>
						<div class="col-xs-9 deskripsi">
							<h2><a href="#"><strong>Taman Kedamaian</strong></a></h2>
							<p class="text-warning">Jenis laporan : kerusakan</p>
							<p>
							Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula porta felis euismod semper. </p>
						</div>
						<div class="col-xs-9 col-xs-offset-3 status-box">
								<div class="col-xs-8 status">
									<span class="text-success"><span class="glyphicon glyphicon-ok"></span> Sudah ditindaklanjuti</span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary">joko.wi </a> <a href="#"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</div>
						</div>
						<div class="vote col-xs-3 text-right">
							<h1><span class="label label-success">19</span></h>
						</div>
					</div>
				</div>
  			</div><!-- End of Panel -->


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

        <!-- // <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
