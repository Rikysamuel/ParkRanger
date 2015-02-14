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

$sql = "DELETE FROM user
		WHERE id_user=$id";

if($conn->query($sql)) {
	header("Location: manage_dinas.php");
}
else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>