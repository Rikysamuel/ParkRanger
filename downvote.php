<?php
	include ('koneksi.php');
	$id_laporan = $_POST['id_laporan'];
	$query0 = "UPDATE `pengaduan` SET `rank_vote` = `rank_vote` - 1 WHERE `id_laporan` = '$id_laporan'";
	$eksekusi0 = mysql_query($query0);
	
	$result2 = 0;
	$result = mysql_query("SELECT `rank_vote` FROM `pengaduan` WHERE id_laporan='$id_laporan'");
	while ($row = mysql_fetch_object($result)) {
	    $result2 =  $row->rank_vote;
	}
	echo $result2;
?>