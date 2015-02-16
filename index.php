<?php
	include ('koneksi.php'); 
	include("pengaduan.php");
	$sort = 0;
	$sort2 = $sort;
	$page = 0;
	$j=1;
?>

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
		        <h1 class="text-muted"><a href="index.php"><img src="img/diskamtam.png" alt="" class="logo"> Park Ranger</a></h1>
			    <?php
			    	session_start();
			    	if(!isset($_SESSION['loggedIn'])) 
			    		$_SESSION['loggedIn'] = FALSE;

			    	if($_SESSION['loggedIn']==FALSE) {
			    		$loginText = "<a href='login.php'>Masuk</a>";
			    		$status ="<p class='text-right'>Belum masuk? <a href='login.php'>login</a> or <a href='register.php'>daftar</a></p>";
			    	}
			    	else {
			    		$loginText = "<a href='logout.php'>Keluar</a>";
			    		$status = "Masuk sebagai as <a href='edit_profil?id=".$_SESSION['id_user']."'>".$_SESSION['username']."</a>";
			    	}
			    ?>
			    <p class="text-right"><?php echo $status ?></p>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li class="active"><a href="index.php">Halaman Utama</a></li>
		        	<li><a href="lapor.php">Kirim Laporan</a></li>
		        	<li><a href="about.php">Tentang</a></li>
		        	<li><?php echo $loginText ?></li>
		        </ul>
	       	</div>
	       	<br/>
	       	<div class="dropdown text-right">
	       	<!-- tambahin hidden form dummy buat sorting-->
	       	<form name="tempform" id="tempform" method="post">
				<input id="temp1" NAME="temp1" type="hidden"></input>
			</form>
			<!-- tambahin hidden form dummy buat paginating-->
			<form name="tempform2" id="tempform2" method="post">
				<input id="temp2" NAME="temp2" type="hidden"></input>
				<input id="temp3" NAME="temp3" type="hidden"></input>				
			</form>
	       	Urut sesuai : &nbsp;
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
					Pilih
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation" onclick="$('#temp1').val('0'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Terbaru</a></li>
					<li role="presentation" onclick="$('#temp1').val('1'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Terfavorit</a></li>
					<li role="presentation" onclick="$('#temp1').val('2'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Baru ditangani</a></li>
					<li class="divider"></li> 
					<li role="presentation" onclick="$('#temp1').val('3'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Taman</a></li>
					<li role="presentation" onclick="$('#temp1').val('4'); $('#tempform').submit()"><a role="menuitem" tabindex="-1" href="#">Kategori</a></li>
				</ul>
			</div>
			<br />
			<?php
				$link = init();

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
				$start = $page * 5;

				//fetch data dari sql database
                $row = fetchPost($link,$sort2);

                // data dalam array diprint ke halaman html
                for($it=$start;$it<$start+5;$it++){
            		if(isset($row[$it])){
            			echo reports($link, $row,$it);
                	}
                }
                //tutup koneksi
                closeConnection($link);
            ?>
			<nav class="text-center">
			<ul class="pagination">
				<?php
					echo "<li onclick=\"$('#temp2').val('0');$('#temp3').val('$sort'); $('#tempform2').submit()\">
							 <a href=\"#\" aria-label=\"Previous\">
						 		<span aria-hidden=\"true\">&laquo;</span>
							 </a>
						 </li>";
					$max = countPagination($row);
					for($i=0;$i<$max;$i++){
						$j = $i+1;
						echo "<li onclick=\"$('#temp2').val('$i');$('#temp3').val('$sort'); $('#tempform2').submit()\"><a href=\"#\">$j</a></li>";
					}
					$j--;
					echo "<li onclick=\"$('#temp2').val('$j');$('#temp3').val('$sort'); $('#tempform2').submit()\">
							<a href=\"#\" aria-label=\"Next\">
								<span aria-hidden=\"true\">&raquo;</span>
							</a>
						 </li>";
				?>
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

    </body>
</html>
