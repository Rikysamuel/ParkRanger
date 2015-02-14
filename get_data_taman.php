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

$sql = "SELECT * FROM taman WHERE id_taman=$id_taman";
$result = $conn->query($sql);
if($result->num_rows>0) {
	$row=$result->fetch_assoc();
	echo json_encode(array("namaTaman" => $row['nama'], "alamatTaman" => $row['alamat']));
}
else {
	echo 0;
}
?>