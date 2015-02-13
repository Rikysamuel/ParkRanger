<?php
	include ('koneksi.php');
	$id_laporan = $_GET['id_laporan'];
	$query0 = "UPDATE `pengaduan` SET `rank_vote` = `rank_vote` + 1 WHERE `id_laporan` = '$id_laporan'";
	$eksekusi0 = mysql_query($query0);
	if($eksekusi0){
		header('location:index.php');
	} 
?>