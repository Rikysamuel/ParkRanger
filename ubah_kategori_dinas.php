<?php
extract($_POST);
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "parkranger";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

$sql = "UPDATE pihak_berwenang
		SET kategori='$kategori'
		WHERE id_user=$id";

if($conn->query($sql)) {
	echo 1;
}	
else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}	


?>