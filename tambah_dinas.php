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

$sql = "INSERT INTO user (id_user,nama,email,username,password,role) 
		VALUES ('', '$nama', '$email', '$username', '$password', 2)";

if($conn->query($sql)) {
	$id = $conn->insert_id;
	$sql = "INSERT INTO pihak_berwenang (id_user,kategori)
			VALUES ($id, '$jenisLaporan')";
	if($conn->query($sql))
		header("Location: manage_dinas.php");
	else
		 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>