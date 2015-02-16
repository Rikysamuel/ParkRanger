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
        <link rel="stylesheet" href="css/home.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
				 <?php include ('koneksi.php'); 
				    session_start();
					if (isset($_SESSION["id_user"])){
					 	$user = $_SESSION["id_user"];
						$online = mysql_query("select * from user where id_user = '$user'");
						while($tabel_user = mysql_fetch_array($online)){
						    echo '<p class="text-right">Masuk sebagai <a href="edit_profil.php">'.$tabel_user["nama"].'</a></p>';
						}
					}
					else {
						echo '<p class="text-right">Belum masuk? <a href="login.php">login</a> or <a href="register.php">register</a></p>';	
			    
					}
			    ?> 
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li class="active"><a href="index.php">Halaman Utama</a></li>
		        	<li> <?php if (isset($_SESSION["id_user"])&&($_SESSION["role"]==3))
		        					echo '<a href="lapor.php">';
		        				else echo '<a href="login.php">';
		        			?>Kirim Laporan</a></li>
		        	<li><a href="about.php">Tentang Kami</a></li>
		        	<?php if (isset($_SESSION["id_user"]))
                                 echo '<li><a href="logout.php">Keluar</a></li>';
                            ?>
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
					<li role="presentation"><a role="menuitem" tabindex="-1" href="index.php">Most recent</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="index_sortvote.php">Top votes</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Recently handled</a></li>
				</ul>
			</div>
			<br />
			  <?php include ('koneksi.php');

			  		$arr1 = array();
					$arr2 = array();
					$sum = 0;
					$query = mysql_query("select * from pengaduan natural join taman order by waktu desc");
					while ($data = mysql_fetch_array($query)){
						array_push($arr2, $data["id_laporan"], $data["rank_vote"], $data["waktu"], $data["status"], $data["file_foto"], $data["id_taman"], $data["ditangani_by"], $data["pelapor"], $data["keterangan"], $data["nama"], $data["alamat"]);
				        array_push($arr1, $arr2);
				        $sum = $sum + 1;
					}

			      	for($it=0;$it<$sum;$it++){
	            		if(isset($arr1[$it])){
	            			echo '<div class="panel panel-default">';
							echo	'<div class="panel-body">';
							echo		'<div class="col-xs-3">';
							echo			'<a href="#" class="thumbnail"><img src="'.$arr1[$it][4].'" alt="taman"></a>';
							echo 		'</div>';
							echo		'<div class="col-xs-9">';
							echo			'<h2><strong>'. $arr1[$it][9] . '</strong></h2>';
								$id = $arr1[$it][0];
								$query1 = mysql_query("SELECT `kategori` FROM `pihak_berwenang` natural join `pengaduan` WHERE `ditangani_by` = `id_user` and `id_laporan` = '$id'");
								while($arr3 = mysql_fetch_array($query1)){
									echo	'<p class="text-warning">Jenis laporan : '.$arr3[0].' </p>';
								}
							echo			'<p>'.$arr1[$it][8].'</p>';
							echo			'<p id="status">';
								if($arr1[$it][3]==NULL){
									echo	'<span class="text-danger"><span class="glyphicon glyphicon-remove"></span> Belum ditindaklanjuti</span><br />';
								}else{
									echo	'<span class="text-success"><span class="glyphicon glyphicon-ok"></span> Sudah ditindaklanjuti</span><br />';
								}
									echo	'<small>Pelapor : <a href="profile.html" class="text-primary">edmund.ophie </a> <a href="#" data-toggle="modal" data-target="#myModal"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>';					
							echo			'</p>';
							echo			'<div class="vote col-xs-9 text-right">';
							echo				'<a id="upvote'.$arr1[$it][0].'" href="upvote.php?id_laporan='.$arr1[$it][0].'"><span class="glyphicon glyphicon-triangle-top" ></span></a>';
							echo				$arr1[$it][1];
							echo				'<a id="downvote'.$arr1[$it][0].'" href="downvote.php?id_laporan='.$arr1[$it][0].'"><span class="glyphicon glyphicon-triangle-bottom"></span></a>';
							echo			'</div>';
							echo			'<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
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
	                }

      			?>
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
	    </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript" src="vote.js"></script>
    </body>
</html>
