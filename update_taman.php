
<?php
extract($_POST);
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

// 1:admin, 2:dinas, 3:member
$sql = "UPDATE taman 
		SET nama='$nama',
			alamat='$alamat'
		WHERE id_taman='$id_taman'";

if ($conn->query($sql) === TRUE) {
    	echo 1;
} else {
    echo 0;
}

$conn->close();

?>