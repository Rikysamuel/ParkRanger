<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<?php include("InformasiDinas.php");
	$sort = 0;
	$sort2 = $sort;
	$page = 0;
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
        <link rel="stylesheet" href="css/home.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
			    <p class="text-right">Logged in as <a href="#">Edmund</a></p>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php">Halaman Utama</a></li>
		        	<li><a href="lapor.php">Kirim Laporan</a></li>
		        	<li><a href="about.php">Tentang</a></li>
		        	<li><a href="logout.php">Keluar</a></li>
		        </ul>
	       	</div>
	       	<br/>
       		
       		<!-- tambahin hidden form dummy buat sorting-->
	       	<form name="tempform" id="tempform" method="post">
				<input id="temp1" NAME="temp1" type="hidden"></input>
			</form>
			<!-- tambahin hidden form dummy buat paginating-->
			<form name="tempform2" id="tempform2" method="post">
				<input id="temp2" NAME="temp2" type="hidden"></input>
				<input id="temp3" NAME="temp3" type="hidden"></input>				
			</form>

	       	<div class="dropdown text-right">
	       	Urut sesuai : &nbsp;
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
					Pilih
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
<<<<<<< HEAD
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Most recent</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Top votes</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Least votes</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Recently handled</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Recently unhandled</a></li>
				</ul>
			</div>
			<br />
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
								<div class="col-xs-9 status">
									<span class="text-danger"><span class="glyphicon glyphicon-remove"></span> Belum ditindaklanjuti</span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary">edmund.ophie </a> <a href="#"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</div>
								<div class="vote col-xs-3 text-right">
									<a href="#"><span class="glyphicon glyphicon-triangle-top"></span></a>
									19
									<a href="#"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
								</div>
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
							<h2><a href="#"><strong>Taman Kedamaian</strong></a></h2>
							<p class="text-warning">Jenis laporan : kerusakan</p>
							<p>
							Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula porta felis euismod semper. </p>
						</div>
						<div class="col-xs-9 col-xs-offset-3 status-box">
								<div class="col-xs-9 status">
									<span class="text-success"><span class="glyphicon glyphicon-ok"></span> Sudah ditindaklanjuti</span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary">joko.wi </a> <a href="#"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</div>
								<div class="vote col-xs-3 text-right">
									<a href="#"><span class="glyphicon glyphicon-triangle-top"></span></a>
									07
									<a href="#"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
								</div>
						</div>
					</div>
	        	</div>
      		</div><!-- End of Panel -->
=======
					<li role="presentation" onclick="$('#temp1').val('0'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Terbaru</a></li>
					<li role="presentation" onclick="$('#temp1').val('1'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Terfavorit</a></li>
					<li role="presentation" onclick="$('#temp1').val('2'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Baru ditangani</a></li>
					<li class="divider"></li> 
					<li role="presentation" onclick="$('#temp1').val('3'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Taman</a></li>
					<li role="presentation" onclick="$('#temp1').val('4'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Kategori</a></li>
				</ul>
			</div>
			<br />
			  <?php include ('koneksi.php'); 
				  	
				  	if(isset($_POST['temp1'])){
						$sort = $_POST['temp1'];
						$sort2 = $sort;
					}

					if(isset($_POST['temp3'])){
						$sort2 = $_POST['temp3'];
					}

					if(isset($_POST['temp2'])){
						$page = $_POST['temp2'];
					}



					$query = mysql_query("select * from pengaduan natural join taman order by waktu desc");
					while ($data = mysql_fetch_array($query)){
				       	echo '<div class="panel panel-default">';
						echo	'<div class="panel-body">';
						echo		'<div class="col-xs-3">';
						echo			'<a href="#" class="thumbnail"><img src="img/taman1.jpg" alt="taman"></a>';
						echo '</div>';
						echo		'<div class="col-xs-9">';
						echo			'<h2><strong>'. $data["nama"] . '</strong></h2>';
						echo			'<p class="text-warning">Jenis laporan : '.$data["jenis_laporan"].' </p>';
						echo			'<p>'.$data["keterangan"].'</p>';
						echo			'<p id="status">';
							if($data["status"]==0){
								echo	'<span class="text-danger"><span class="glyphicon glyphicon-remove"></span> Belum ditindaklanjuti</span><br />';
							}else{
								echo	'<span class="text-success"><span class="glyphicon glyphicon-ok"></span> Sudah ditindaklanjuti</span><br />';
							}
								echo	'<small>Pelapor : <a href="profile.html" class="text-primary">edmund.ophie </a> <a href="#" data-toggle="modal" data-target="#myModal"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>';					
						echo			'</p>';
						echo			'<div class="vote col-xs-3 text-right">';
						echo				'<a id="upvote'.$data["id_laporan"].'" href="upvote.php?id_laporan='.$data["id_laporan"].'"><span class="glyphicon glyphicon-triangle-top" ></span></a>';
							//$cek_vote = mysql_query("select rank_vote from pengaduan where id_laporan = (select id_laporan from vote_laporan natural join member where vote_by = id_user");
							//while($data1 = mysql_fetch_array($cek_vote)){
						echo				$data["rank_vote"];
							//}
						echo				'<a id="downvote'.$data["id_laporan"].'" href="downvote.php?id_laporan='.$data["id_laporan"].'"><span class="glyphicon glyphicon-triangle-bottom"></span></a>';
						echo			'</div>';
						echo	'<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
											<div class="modal-dialog"> 
												<div class="modal-content"> 
													<div class="modal-header"> 
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">× </button> 
														<h4 class="modal-title" id="myModalLabel"> Blokir User  </h4> 
													</div> 
													<div class="modal-body">
														Apakah Anda yakin ingin mengirimkan permintaan blokir user ini? 
													</div> 
													<div class="modal-footer"> 
														<button type="button" class="btn btn-default" data-dismiss="modal"> Tidak </button> 
														<button type="button" class="btn btn-primary"> Ya </button> 
													</div> 
												</div>
											</div>
										</div>';
						echo		'</div>';
				        echo	'</div>';
			      		echo '</div>';
			      	}
      			?>
>>>>>>> 582a7e08937a60d8eef6cb6d518ab2cc0e07525b
			<nav class="text-center">
				<ul class="pagination">
					<?php
						echo "<li onclick=\"$('#temp2').val('0');$('#temp3').val('$sort'); $('#tempform2').submit()\">
								 <a href=\"#\" aria-label=\"Previous\">
							 		<span aria-hidden=\"true\">&laquo;</span>
								 </a>
							 </li>";
						$max = countPagination($data);
						echo sizeof($data);
						for($i=0;$i<$max;$i++){
							$j = $i+1;
							echo "<li onclick=\"$('#temp2').val('$i');$('#temp3').val('$sort'); $('#tempform2').submit()\"><a href=\"#\">$j</a></li>";
						}
						// $j=$j-1;
						// echo "<li onclick=\"$('#temp2').val('$j');$('#temp3').val('$sort'); $('#tempform2').submit()\">
								// <a href=\"#\" aria-label=\"Next\">
									// <span aria-hidden=\"true\">&raquo;</span>
								// </a>
							 // </li>";
					?>
				</ul>
			</nav>
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
