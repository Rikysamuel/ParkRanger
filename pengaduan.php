<?php
	function init(){
		$link=mysqli_connect("localhost","root","","park_ranger");
        // Cek koneksi ke database
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $link;
	}

	function closeConnection($link){
		mysqli_close($link);
	}

	function fetchTaman($link) {
		$result = mysqli_query($link,"SELECT nama FROM taman");
        while($row[] = mysqli_fetch_array($result));
        return $row;
	}

	function fetchKategori($link){
		$result = mysqli_query($link,"SELECT kategori FROM pihak_berwenang",$link);
        while($row[] = mysqli_fetch_array($result));
        return $row;
	}

	function uploadFoto($link){
		$uploadOk = 1;
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
		return $uploadOk;
	}

	function tambahLaporan($link, $taman, $jenis, $keterangan, $user_id){
		session_start();
		$id_taman = mysql_query("SELECT id_taman from taman where nama='$taman'"); 
	    $ditangani_by = mysql_query("SELECT id_user from pihak_berwenang where kategori='$jenis'");
	    $waktu=time();
	    $pelapor=$_SESSION["user_id"];
	    $uploadOk = uploadFoto($link);

	    if (uploadOk == 1)
	    	$query = mysql_query("INSERT INTO pengaduan(rank_vote, waktu, file_foto, id_taman, ditangani_by, pelapor, keterangan) 
	    					  VALUES (0, ’$waktu’, ’$targetFile’, ’$id_taman’, ’$ditangani_by’, ’$pelapor’, ’$keterangan’;");

	}

?>