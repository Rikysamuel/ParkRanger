<?php
	function init(){
		$link=mysqli_connect("localhost","root","","parkranger");
        // Cek koneksi ke database
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $link;
	}

	function closeConnection($link){
		mysqli_close($link);
	}

	function fetchPelapor($link,$id){
        $res = mysqli_query($link,"SELECT nama FROM user WHERE id_user='$id'");
		$name = $res->fetch_assoc();
		return $name;
	}

	function fetchPost($link, $opt) {
        //ambil data ke dalam array row dari database
        switch($opt){
        	case 0:
        		$query = "SELECT * FROM pengaduan ORDER BY waktu DESC";
        		break;
        	case 1:	
        		$query = "SELECT * FROM pengaduan ORDER BY rank_vote DESC";
        		break;
        	case 2:	
        		$query = "SELECT * FROM (SELECT * FROM pengaduan NATURAL JOIN ditanggapi) AS hasil JOIN tanggapan WHERE hasil.id_tanggapan=tanggapan.id_tanggapan";
        		break;
        	case 3:
        		$query = "SELECT * FROM pengaduan ORDER BY id_taman";
        		break;
        	case 4:	
        		$query = "SELECT * FROM pengaduan JOIN pihak_berwenang WHERE id_user=ditangani_by";
        		break;
        	default:
        		break;
        }
        $result = mysqli_query($link,$query);
        while($row[] = mysqli_fetch_array($result));
        if ($opt==2){
        	for ($i=0; $i < sizeof($row)-1; $i++) { 
        		$row[$i][2] = $row[$i][13];
        	}
        }
        return $row;
	}

	function getKategori($link,$id){
		$res = mysqli_query($link,"SELECT kategori FROM (SELECT * FROM pihak_berwenang JOIN pengaduan WHERE id_user=ditangani_by) AS hasil2 WHERE id_laporan='$id'");
		$result = $res->fetch_assoc();
		return $result;
	}

	function getTaman($link,$id){
		$res = mysqli_query($link,"SELECT nama FROM taman WHERE id_taman='$id'");
		$name = $res->fetch_assoc();
		return $name;
	}

	function reports($link, $row, $it){
		$posts = '<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-3">
							<a href="#" class="thumbnail">
								<img src="img/taman/'.$row[$it][4].'" alt="'.$row[$it][4].'">
							</a>
						</div>
						<div class="col-xs-9 deskripsi">
							<h2><a href="#"><strong>'.getTaman($link,$row[$it][5])['nama'].'</strong></a></h2>
							<p class="text-warning">Jenis laporan : '.getKategori($link,$row[$it][0])['kategori'].'</p>
							<p>'.$row[$it][8].'</p>
							<span class="text-warning waktu">'.date_format(date_create($row[$it][2]), "d/m/Y").'</span>
						</div>
						<div class="col-xs-9 col-xs-offset-3 status-box">
								<div id="statustanggapan'.$row[$it][0].'" class="col-xs-9 status">';
								$color = ($row[$it][3]==0)?"danger":"success";
								$icon = ($row[$it][3]==0)?"remove":"ok";
								$stat = ($row[$it][3]==1)?"Sudah ditanggapi":"Belum ditanggapi";

		$posts = $posts .'		<span class="text-'.$color.'"><span class="glyphicon glyphicon-'.$icon.'"></span> '.$stat.'</span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary"> '.fetchPelapor($link,$row[$it][7])['nama'].' </a> <a href="#" data-toggle="modal" data-target="#myModal'.$row[$it][0].'"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</div>
								<div class="vote col-xs-3 text-right">
									<a href="#"><span class="glyphicon glyphicon-triangle-top"></span></a>
									'.$row[$it][1].'
									<a href="#"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
								</div>
						</div>
					</div>
	        	</div>
	        	<div class="modal fade" id="<?php echo "myModal".$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
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
				</div>
      		</div><!-- End of Panel -->';
	    return $posts;
	}

	function fetchTaman($link) {
		$result = mysqli_query($link,"SELECT nama FROM taman");
        while($row[] = mysqli_fetch_array($result));
        return $row;
	}

	function fetchKategori($link){
		$result = mysqli_query($link,"SELECT kategori FROM pihak_berwenang");
        while($row[] = mysqli_fetch_array($result));
        return $row;
	}

	function uploadFoto($gambar){
		$uploadOk = 1;
		$fileName = $gambar['name'];
		$targetFile = "gambar/" . basename($gambar['name']);
		
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$check = getimagesize($gambar["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		}
		if (file_exists($targetFile)) {
			$targetFile = $targetFile . $characters[mt_rand(0, 61)];
		}
		if ($gambar["size"] > 2000) {
		    $uploadOk = 0;
		}

		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		} else {
		    if (move_uploaded_file($gambar["tmp_name"], $target_file)) {
		        echo "The file ". basename($gambar["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		return $uploadOk;
	}

	function countPagination($row){
		return (sizeof($row)-1)/5;
	}

	function tambahLaporan($link, $taman, $jenis, $keterangan, $user_id, $gambar){
		$result = mysqli_query($link, "SELECT id_taman from taman where nama='$taman'"); 
 		if (mysqli_num_rows($result) > 0) {
 		    while($row = mysqli_fetch_assoc($result)) {
 		        $id_taman = $row["id_taman"];
 		    }
 		} else {
		    echo "Select id_taman from nama_taman return no result <br/>";
 		}
 
 
 		if ($jenis=="Tidak tahu") {
 			$ditangani_by = 4;
 		}
 		else {
 			$result = mysqli_query($link, "SELECT id_user from pihak_berwenang where kategori='$jenis'");
 			if (mysqli_num_rows($result) > 0) {
 			    // output data of each row
 			    while($row = mysqli_fetch_assoc($result)) {
 			        $ditangani_by = $row["id_user"];
 			    }
 			} else {
			    echo "Select dinas from kategori return no result <br/>";
 			}
 		}
 
 	    $upgambar = uploadFoto($gambar);
 	    $targetFile = $upgambar[1];
 	    $waktu = date('Y-m-d H:i:s');
 
 	    if ($upgambar[0] == 1) {
 	    	$query = "INSERT INTO pengaduan(rank_vote, waktu, file_foto, id_taman, ditangani_by, pelapor, keterangan) 
 	    					  VALUES (0, '$waktu', '$targetFile', $id_taman, $ditangani_by, $user_id, '$keterangan')";
 	    	if (mysqli_query($link, $query)) {
			    echo "New record created successfully <br/>";
			    $ret = 1;
 			} else {
			    echo "Error: " . $query . "<br/>" . mysqli_error($link);
			    $ret = 0;
 			}
 	    }
 	    else {
	    	$ret = 0;
 	    }
 
	    sendEmail($link, $ditangani_by, $taman, $keterangan);
	}

	/* Fungsi edmund */
	function createDBConnection() {
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

        return $conn;
    }

	function hapusLaporan($idLaporan) {
		$conn = createDBConnection();
		$sql = "DELETE FROM pengaduan
				WHERE id_laporan=$idLaporan";

		if ($conn->query($sql) === TRUE)
			header("Location: manage_laporan.php");
		else
		    return "Laporan gagal dihapus: ".$sql."<br/>".$conn->error;
		
		$conn->close();
	}
?>
