<?php
extract($_POST);
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
<!--[if gt IE 8]><!--> 
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
        <link rel="stylesheet" href="css/manage_taman.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script>
        $(function(){
        	var stillLoading = false;
        	$("input[type=submit]").click(function() {
				var pil = $("select[name=taman] option:selected").val();
    			var namaTaman = $("#nama").val();
    			var alamatTaman = $("#alamat").val();
        		if(pil!="tambahTaman") {
        			$.post("update_taman.php",{id_taman:pil,nama:namaTaman,alamat:alamatTaman},
        				function(result){
        					if(result==1) {
        						$("#taman").val("tambahTaman");
        						$("select option[value="+pil+"]").text($("#nama").val());

        						$(".box-warning").addClass("box-success");
        						$(".box-success").removeClass("box-warning");
        						$(".box-success").empty();
        						$(".box-success").css("display", "block");
        						$(".box-success").append("<p><span class='glyphicon glyphicon-ok-circle'> </span> Data taman berhasil diubah</p>");
        						$("#nama").val("");
        						$("#alamat").val("");
        					}
        					else {
        						alert("Data taman gagal diubah. \n Terjadi kesalahan pada sistem.");
        					}
        			});
        		}
        		else {
        			$.post("tambah_taman.php",{nama:namaTaman,alamat:alamatTaman},
        				function(result){
        					console.log(result);
        					if(result!="gagal") {
								stillLoading=true;
        						$("#taman").append("<option value='"+result+"'>"+namaTaman+"</option>");
        						$(".box-warning").addClass("box-success");
        						$(".box-success").empty();
        						$(".box-success").css("display", "block");
        						$(".box-success").removeClass("box-warning");
        						$(".box-success").append("<p><span class='glyphicon glyphicon-ok-circle'> </span> Data taman berhasil ditambahkan</p>");
        						$("#nama").val("");
        						$("#alamat").val("");
        						stillLoading=false;
        					}
        					else {
        						$(".box-warning").css("display","block");
        						$(".box-warning").append("<p><span class='glyphicon glyphicon-ok-circle'> </span> Data taman gagal ditambahkan <br/> Terjadi kesalahan pada sistem.</p>")
        					}
        			});

        		}
	        });

	        $("#taman").on("change", function(){
	        	if(stillLoading) return;
				var pil = $("select[name=taman] option:selected").val();
				$("#nama").val("");
				$("#alamat").val("");
	        	if(pil!="tambahTaman") {
		        	$.post("get_data_taman.php",{id_taman:pil},
	        				function(result){
	        					if(result!=0) {
	        						$("#nama").val(result.namaTaman);
	        						$("#alamat").val(result.alamatTaman);
	        					}
	        					else {
	        						$(".box-warning").append("<p><span class='glyphicon glyphicon-remove-circle'> </span> Terjadi kesalahan pada sistem.<br/> Gagal memperoleh data taman</p>");
	        						$(".box-warning").css("display","block");
	        					}
        			},"json");
		        }
	        });
        });
        </script>
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
	       	<a class="btn btn-primary btn-user" href="manage_user.php" role="button">Manage User</a>
	       	<a class="btn btn-primary active btn-user" href="manage_taman.php" role="button">Manage Taman</a>
	       	<a class="btn btn-primary btn-user" href="manage_dinas.php" role="button">Manage Dinas</a>
	       	<a class="btn btn-primary btn-user" href="manage_kategori.php" role="button">Manage Kategori</a>
			<div class="clearfix"></div>
			<br />
	       	<h2 class="text-primary subtitle col-xs-6">Ubah Data Taman</h2>
	       	<div class="clearfix"></div>
      		<div class="form-horizontal col-xs-6 col-xs-offsets-3">
	       		<div class="form-group">
	       			<label for="taman" class="col-xs-3 control-label">Pilih taman</label>
	       			<div class="col-xs-9">
	       				<select name="taman" id="taman" class="form-control">
	       					<option value="tambahTaman">Tambah baru...</option>
	       					<?php
	       					$sql = "SELECT * FROM taman";
	       					$result = $conn->query($sql);
	       					if($result->num_rows > 0) {
	       						while($row=$result->fetch_assoc()) {
	       					?>
	       					<option value="<?php echo $row['id_taman'] ?>"><?php echo $row['nama'] ?></option>
	       					<?php
	       						}
	       					}
	       					?>
	       				</select>
       				</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="nama" class="col-xs-3 control-label">Nama taman</label>
	       			<div class="col-xs-9">
	       				<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama taman" >
       				</div>
	       		</div>
	       		<div class="form-group">
	       			<label for="alamat" class="col-xs-3 control-label">Alamat</label>
	       			<div class="col-xs-9">
	       				<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat taman">
       				</div>
	       		</div>
	       		<input type="submit" value="Edit" class="btn btn-primary btn-block">
	       	</div>
	       	<div class="col-xs-4 box-warning">
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

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
