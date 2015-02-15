<?php
	include "koneksi.php";
	 $idtaman = $_POST['taman'];
//	 $jenis = $_POST['jenis'];
	 $gambar = $_POST['gambar'];
   	 $keterangan = $_POST['keterangan'];

	 
	$insert = "INSERT INTO `pengaduan` (`rank_vote`, `file_foto`, `id_taman` , `ditangani_by`, `pelapor`, `keterangan`) VALUES ( 0, '$gambar', '$idtaman', 2, 3, '$keterangan')"; 

	$insert_query = mysql_query($insert); 
	if($insert_query){
		header('location:index.php');
	} 
?>
