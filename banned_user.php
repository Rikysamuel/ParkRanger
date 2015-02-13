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
$status=($aksi=="Unbanned user")?"unbanned":"banned";
$sql = "UPDATE member
		SET status='$status'
		WHERE id_user=$id_user";

if ($conn->query($sql) === TRUE) {
	header("Location: manage_user.php");
} else {
    echo "Aksi gagal dilakukan: ".$sql."<br/>".$conn->error;
}

$conn->close();

?>