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
$sql = "INSERT INTO user (id_user, nama, email, username, password, role) 
		VALUES ('', '$nama', '$email', '$username', '$password', 3)";

if ($conn->query($sql) === TRUE) {
	// Get user id
	$sql = "SELECT id_user FROM user WHERE username='$username'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$uid = $row['id_user'];
		// Insert into 'member' table
		$sql = "INSERT INTO member (id_user, status, jumlah_report) 
				VALUES ($uid, 'unbanned', 0)";

		if($conn->query($sql) === TRUE)
			echo 1;
		else
			echo 0;
	}
	else
    	echo 0;
} else {
    echo 0;
}

$conn->close();

?>