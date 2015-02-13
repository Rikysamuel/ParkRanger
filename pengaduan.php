<?php
	function init(){
		$link= mysqli_connect("localhost","root","","parkranger");
        // Cek koneksi ke database
        if ($link->connect_error) {
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
		$result = mysqli_query($link,"SELECT kategori FROM pihak_berwenang");
        while($row[] = mysqli_fetch_array($result));
        return $row;
	}

	function uploadFoto($gambar){
		$result = array();
		$uploadOk = 1;
		$fileName = $gambar['name'];
		$targetFile = "gambar/" . basename($gambar['name']);
		
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$check = getimagesize($gambar["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		        echo "check image false <br/>";
		}
		if (file_exists($targetFile)) {
			$targetFile = "gambar/".$characters[mt_rand(0, 61)].$fileName;
		}

		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded. <br/>";
		} else {
		    if (move_uploaded_file($gambar["tmp_name"], $targetFile)) {
		        echo "The file ". basename($gambar["name"]). " has been uploaded. <br/>";
		    } else {
		        echo "Sorry, there was an error uploading your file. <br/>";
		    }
		}
		$result[0] = $uploadOk;
		$result[1] = $targetFile;
		return $result;
	}

	function tambahLaporan($link, $taman, $jenis, $keterangan, $user_id, $gambar){
		$result = mysqli_query($link, "SELECT id_taman from taman where nama='$taman'"); 
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
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

	    return $ret;

	}

	function sendEmail($link, $id_dinas, $nama_taman, $keterangan){
		// $result = mysqli_query($link, "SELECT email from user where id_user='$id_dinas'");
		// if (mysqli_num_rows($result) > 0) {
		//     // output data of each row
		//     while($row = mysqli_fetch_assoc($result)) {
		//         $email = $row["email"];
		//     }
		// } else {
		//     echo "Select email return no result <br/>";
		// }

		// $subject = "ParkRanger";
		// $message = "Anda menerima pengaduan : <br> Lokasi taman :  ". $nama_taman." <br> Deskripsi : ".$keterangan;
		// $headers = "";

		// mail("13512077@std.stei.itb.ac.id",$subject,$message,$headers);
		// echo 'mail sent';
		$to = "13512077@std.stei.itb.ac.id";
		$subject = "My subject";
		$txt = "Hello world!";
		$headers = "From: diezzzy@gmail.com" . "\r\n" .
		"CC: 13512077@std.stei.itb.ac.id";

		mail($to,$subject,$txt,$headers);
	}
?>