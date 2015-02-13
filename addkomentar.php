<?php
	$link=mysqli_connect("localhost","root","","park_ranger");
    // Cek koneksi ke database
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

	$id_tanggapan = $_POST[''];
	$komen = $_POST[''];
	$id_penanggap = $_POST[''];
	$id_laporan = $_POST[''];

	$sql = "INSERT INTO tanggapan (id_tanggapan, keterangan, id_penanggap) VALUES ($id_tanggapan, $komen, $id_penanggap)";
	if (!mysqli_query($link,$sql)) {
		die('Error: ' . mysqli_error($link));
	}

	$sqlisi = "INSERT INTO ditanggapi(id_laporan,id_tanggapan) VALUES ($id_laporan,$id_tanggapan)";
	if (!mysqli_query($link,$sqlisi)) {
		die('Error: ' . mysqli_error($link));
	}

	$sqlupdate = "UPDATE pengaduan SET status = 'Sudah ditangani' WHERE id_laporan = $id_laporan";
	if (!mysqli_query($link, $sqlupdate)) {
    	echo "Error updating record: " . mysqli_error($link);
	}

	mysqli_close($link);
?>