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
        <link rel="stylesheet" href="css/about.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	<div class="container">
	        <div class="top">
		        <h1 class="text-muted"><a href="index.php"><img src="img/diskamtam.png" alt="" class="logo">Park Ranger</a></h1>
				<?php
			    	session_start();
					if (isset($_SESSION["id_user"])){
					 	$user = $_SESSION["username"];
						echo '<p class="text-right"><span class="glyphicon glyphicon-user"></span> Masuk sebagai <a href="edit_profil.php">'.$user.'</a></p>';
						
					}
					else {
						echo '<p class="text-right"><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a> | <a href="register.php"><span class="glyphicon glyphicon-edit"></span> Daftar</a></p>';	
			    
					}
			    ?>
			    <div class="clearfix"></div>
		        <ul class="nav nav-justified" role="navigation">
		        	<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Halaman Utama</a></li>
		        	 <?php if (isset($_SESSION["id_user"])&&($_SESSION["role"]==3)) {
		        					echo '<li><a href="lapor.php"><span class="glyphicon glyphicon-link"></span> Kirim Laporan</a></li>';
		        				}	?>
		        				
		        	<li class="active"><a href="about.php"><span class="glyphicon glyphicon-tree-deciduous"></span> Tentang Kami</a></li>
		        	<?php if (isset($_SESSION["id_user"]))
                                 echo '<li><a href="logout.php"><span class="glyphicon glyphicon-ban-circle"></span> Keluar</a></li>';
                          else   
                          		echo '<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>';     
                            ?>
		        </ul>
	       	</div>
	       	

	       	<div class="clearfix"></div>
	       	<div class="col-xs-12">
	       	<h2 class="text-primary subtitle">Tentang Kami</h2>
	       	<p>
	       		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mollis turpis. Quisque ut finibus mauris. Quisque sagittis lobortis enim, vel tristique nibh. Nunc malesuada tempor leo sed dapibus. Quisque euismod metus ut hendrerit finibus. Donec vitae dignissim quam. Mauris hendrerit erat felis, eget pharetra tellus aliquet et. Curabitur id elit vestibulum lorem aliquet dapibus. Pellentesque congue sem purus, sed eleifend lorem fermentum sit amet. Nullam euismod sollicitudin felis vel luctus. Aliquam erat volutpat. Morbi sit amet dolor eget ex aliquet tincidunt. Nulla quis tincidunt dolor, eget dapibus mi. Suspendisse interdum orci sed ante viverra, et consectetur orci efficitur.

Morbi vestibulum suscipit ligula, vitae rutrum purus pretium at. Nam libero elit, rutrum vitae tellus interdum, porttitor auctor tellus. Suspendisse quis tempus ante. Etiam ac ligula at velit viverra mollis. Nulla iaculis enim at mollis eleifend. Duis in orci vel diam placerat maximus. Proin pulvinar sed nisl consectetur tincidunt.

Integer quis risus viverra, sagittis felis bibendum, vehicula diam. Etiam convallis, elit a auctor vulputate, eros felis tincidunt nunc, sit amet dictum elit nulla et diam. Phasellus suscipit, dolor vulputate viverra dictum, est augue fringilla leo, ut ornare nunc mauris eu diam. Fusce tincidunt sit amet nisi a luctus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed bibendum eu erat sed ultrices. Quisque pharetra libero id dui posuere molestie. Sed sed tempus mauris. Aenean maximus, velit sit amet gravida rutrum, nunc diam vulputate dui, in mollis tortor lectus non ante. Maecenas et ex velit. Vivamus vehicula auctor venenatis. Proin aliquam enim sit amet tempus dapibus.

Aliquam tristique tristique gravida. Nam tincidunt sem ac dolor maximus, id iaculis turpis ullamcorper. Nam vel tempus arcu. Nullam volutpat, nibh eu commodo ornare, purus nisi aliquam tortor, quis fringilla tortor lacus sed nisi. Mauris semper quis augue id blandit. Cras consequat ipsum bibendum nunc aliquet viverra. Praesent placerat dui nec nibh ornare auctor. Nam facilisis, neque posuere dapibus tincidunt, lectus nibh aliquet nisi, vel convallis turpis nunc eu purus. Quisque nec venenatis massa. Integer pulvinar felis vitae odio tempus sollicitudin. Aliquam consectetur faucibus turpis, id maximus quam efficitur sit amet. Integer consequat dui sed felis varius, sit amet porttitor ipsum condimentum. Donec sit amet purus ante.

Donec sem orci, interdum ac nisi tincidunt, aliquam sollicitudin mi. Maecenas ac finibus lectus. Quisque orci tortor, lobortis sit amet imperdiet et, pharetra eget ipsum. Phasellus sed efficitur turpis, molestie sollicitudin risus. Sed id tristique lacus, id blandit nunc. Morbi sit amet eros gravida ex rhoncus condimentum at ac sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam non posuere lectus. Nullam vitae odio sit amet neque laoreet semper vel et urna. Vivamus eleifend cursus efficitur. Donec metus justo, dictum id elit nec, maximus interdum odio. Aenean vel eros in orci luctus ornare condimentum non tellus.
	       	</p>
	       	</div>
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
        <script type="text/javascript" src="vote.js"></script>
    </body>
</html>
