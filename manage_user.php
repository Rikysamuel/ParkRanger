<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "parkranger";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
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
        <link rel="stylesheet" href="css/manage_user.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php">Park Ranger</a></h1>
			    <p class="text-right">Logged in as <a href="#">Admin</a></p>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php">Home</a></li>
		        	<li><a href="lapor.php">Kirim Laporan</a></li>
		        	<li><a href="about.php">About</a></li>
		        	<li><a href="logout.php">Log Out</a></li>
		        </ul>
	       	</div>
	       	<br/>
	       	
	       	<a class="btn btn-primary btn-laporan" href="manage_laporan.php" role="button">Manage Laporan</a>
	       	<a class="btn btn-primary active btn-user" href="manage_user.php" role="button">Manage User</a>
	       	<a class="btn-taman" href="manage_user.php" role="button">+ Tambah taman</a>
	       	<div class="dropdown text-right sort-menu">
	       	Sort by : &nbsp;
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
					Most recent
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Most recent</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Top votes</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Least votes</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Recently handled</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Recently unhandled</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<br />
			<?php
				$sql = "SELECT * FROM user";

				if ($conn->query($sql) === TRUE) {
					$result = $conn->query($sql);
					if($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						while($row = $result->fetch_assoc()) {
			?>
      		<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-1">
							<a href="#" class="thumbnail">
								<img src="img/avatars/<?php echo $row['picture']?>" alt="taman">
							</a>
						</div>
						<div class="col-xs-11 deskripsi">
							<h2><a href="#"><strong><?php echo $row['username']?></strong></a></h2>
							<p class="text-warning">Reported :  12 kali</p>
						
							<div class="col-xs-9">
								<span class="text-success">Status : unbanned</span><br />
							</div>
							<div class="col-xs-3">
								<button class="btn btn-danger btn-sm btn-block"><span class="glyphicon glyphicon-ban-circle"></span> Ban user</button>
							</div>
						</div>
					</div>
	        	</div>
      		</div><!-- End of Panel -->
      		<?php
						}
					}
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();
      		?>
      		<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-1">
							<a href="#" class="thumbnail">
								<img src="img/avatar.jpg" alt="taman">
							</a>
						</div>
						<div class="col-xs-11 deskripsi">
							<h2><a href="#"><strong>joko.wi</strong></a></h2>
							<p class="text-warning">Reported :  0 kali</p>
						
							<div class="col-xs-9">
								<span class="text-success">Status : unbanned</span><br />
							</div>
							<div class="col-xs-3">
								<button class="btn btn-danger btn-sm btn-block"><span class="glyphicon glyphicon-ban-circle"></span> Ban user</button>
							</div>
						</div>
					</div>
	        	</div>
      		</div><!-- End of Panel -->
      		<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-1">
							<a href="#" class="thumbnail">
								<img src="img/avatar.jpg" alt="taman">
							</a>
						</div>
						<div class="col-xs-11 deskripsi">
							<h2><a href="#"><strong>ahok.basuki</strong></a></h2>
							<p class="text-warning">Reported :  50 kali</p>
						
							<div class="col-xs-9">
								<span class="text-danger">Status : banned</span><br />
							</div>
							<div class="col-xs-3">
								<button class="btn btn-success btn-sm btn-block"><span class="glyphicon glyphicon-ok-circle"></span> Unban user</button>
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
				Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.<br/>
				Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
				<br/>
			</p>
	    </div>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
