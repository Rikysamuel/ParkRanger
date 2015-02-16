<?php
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

	function tambahTaman($nama, $alamat) {
		$conn = createDBConnection();

		$sql = "INSERT INTO taman (id_taman, nama, alamat)
				VALUES ('', '$nama', '$alamat')";


		if($conn->query($sql) === TRUE) {
			$insertedId = $conn->insert_id;
			return $insertedId;
		}
		else 
			return "gagal";

		$conn->close();
	}

	function updateTaman($idTaman, $nama, $alamat) {
		$conn = createDBConnection();
		$sql = "UPDATE taman 
				SET nama='$nama',
					alamat='$alamat'
				WHERE id_taman='$idTaman'";

		if ($conn->query($sql) === TRUE) {
	    	$retval = 1;
		} else {
		    $retval = 0;
		}

		$conn->close();
		return $retval;
	}

	function hapusTaman($idTaman) {
		$conn = createDBConnection();
		$sql = "DELETE FROM taman
				WHERE id_taman=$idTaman";
				
		if ($conn->query($sql) === TRUE) {
	    	$retval = 1;
		} else {
		    $retval = 0;
		}

		$conn->close();
		return $retval;
	}
?>