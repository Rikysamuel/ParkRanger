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
        <link rel="stylesheet" href="css/dinas.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
			    <p class="text-right">Logged in as <a href="#">Satpol PP</a></p>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php">Home</a></li>
		        	<li><a href="lapor.php">Kirim Laporan</a></li>
		        	<li><a href="about.php">About</a></li>
		        	<li><a href="logout.php">Log Out</a></li>
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
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Recently handled</a></li>
				</ul>
			</div>
			<br />
	       	<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-3">
							<a href="#" class="thumbnail">
								<img src="img/taman1.jpg" alt="GAMBAR TAMAN">
							</a>
						</div>
						<div class="col-xs-9 deskripsi">
							<h2><a href="#"><strong>NAMA TAMAN</strong></a></h2>
							<p class="text-warning">Jenis laporan : JENIS KERUSAKAN</p>
							<p>
							ISI LAPORAN(substr aja)</p>
							<div class="col-xs-9 status" style="padding: 60px 0px 0px">
								<p>
									<span class="text-danger"><span class="glyphicon glyphicon-remove"></span> STATUS LAPORAN</span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary">YANG MELAPOR </a> <a href="#"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</p>
							</div>
							<div class="col-xs-3">
								<button id="bt1" type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#demo1" style="visibility:hidden" onclick="this.style.visibility='hidden'">Komentar</button>
						    </div>
						</div>
					</div>
					<div id="demo1" class="collapse in">
						<div class="col-xs-9 komentar">
							<textarea name="komentar" rows="3" class="form-control" placeholder="Komentar">ISI TANGGAPAN</textarea>
						</div>
						<div class="col-xs-3 konfirmasi-btn">
							<span>
								<input type="submit" value="Konfirmasi" class="btn btn-block btn-primary" data-toggle="collapse" data-target="#demo1" onclick="bt1.style.visibility='visible'">
							</span>
						</div>
					</div>
	        	</div>
      		</div><!-- End of Panel -->
      		<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-3">
							<a href="#" class="thumbnail">
								<img src="img/taman1.jpg" alt="taman">
							</a>
						</div>
						<div class="col-xs-9 deskripsi">
							<h2><a href="#" class="text-primary"><strong>Taman Kedamaian</strong></a></h2>
							<p class="text-warning">Jenis laporan : kerusakan</p>
							<p>
							Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras justo odio, dapibus ac facilisis in.</p>
							<div class="col-xs-9 status">
								<p>
									<span class="text-success"><span class="glyphicon glyphicon-ok"></span> Sudah ditindaklanjuti</span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary">joko.wi </a> <a href="#"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</p>
							</div>
							<div class="col-xs-3">
								<button id="bt2" type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#demo2" onclick="this.style.visibility='hidden'">Komentar</button>
						    </div>
						</div>
					</div>
					<div id="demo2" class="collapse out">
						<div class="col-xs-9 komentar">
							<textarea name="komentar" rows="3" class="form-control" placeholder="Komentar"></textarea>
						</div>
						<div class="col-xs-3 konfirmasi-btn">
							<span>
								<input type="submit" value="Konfirmasi" class="btn btn-block btn-primary" data-toggle="collapse" data-target="#demo2" onclick="bt2.style.visibility='visible'">
							</span>
						</div>
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

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
