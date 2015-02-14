<?php
extract($_GET);
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

$sql = "DELETE FROM pengaduan
		WHERE id_laporan=$id_laporan";

if ($conn->query($sql) === TRUE) {
	header("Location: manage_laporan.php");
} else {
    echo "Laporan gagal dihapus: ".$sql."<br/>".$conn->error;
}

$conn->close();

?>