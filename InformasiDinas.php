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

	function fetchPost($link) {
        //ambil data ke dalam array row dari database
        $result = mysqli_query($link,"SELECT * FROM pengaduan ORDER BY pengaduan.id_laporan DESC");
        while($row[] = mysqli_fetch_array($result));
        return $row;
	}

	function fetchTaman($link,$id){
		$res = mysqli_query($link,"SELECT nama FROM taman WHERE id_taman='$id'");
		$name = $res->fetch_assoc();
		return $name;
	}

	function fetchPelapor($link,$id){
        $res = mysqli_query($link,"SELECT nama FROM user WHERE id_user='$id'");
		$name = $res->fetch_assoc();
		return $name;
	}
?>