<?php
	$komentar = $_POST['keterangan'];
	$id_laporan = $_POST['id_laporan'];
	$id_penanggap = $_POST['id_penanggap'];
	$link=mysqli_connect("localhost","root","","parkranger");
    // Cek koneksi ke database
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $now = $waktu = date('Y-m-d H:i:s');
	$sql = "INSERT INTO tanggapan (id_tanggapan, keterangan, id_penanggap, tanggal_tanggapan) VALUES ('', '$komentar', '$id_penanggap', '$now')";
	if (!mysqli_query($link,$sql)) {
		die('Error: ' . mysqli_error($link));
	}

	$sql = "SELECT id_tanggapan FROM tanggapan ORDER BY tanggal_tanggapan DESC LIMIT 0,1";
	$result = mysqli_query($link,$sql);
    while($row[] = mysqli_fetch_array($result));
    $id_tanggapan = $row[0][0];

	$sql = "INSERT INTO ditanggapi (id_laporan, id_tanggapan) VALUES ('$id_laporan','$id_tanggapan')";
	if (!mysqli_query($link,$sql)) {
		die('Error: ' . mysqli_error($link));
	}

	$sql = "UPDATE pengaduan SET status='1' WHERE id_laporan='$id_laporan'";
	if (!mysqli_query($link, $sql)) {
	    die("Error updating record: " . mysqli_error($link));
	}

	mysqli_close($link);
	echo "ok";
?>