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

$sql = "INSERT INTO taman (id_taman, nama, alamat)
		VALUES ('', '$nama', '$alamat')";


if($conn->query($sql) === TRUE) {
	$insertedId = $conn->insert_id;
	echo $insertedId;
}
else 
	echo "gagal";

$conn->close();
?>