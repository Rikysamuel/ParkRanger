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

$sql = "INSERT INTO user (id_user, nama, email, username, password, role,picture) 
		VALUES ('', '$nama', '$email', '$username', '$password', 'member', 'default-avatar.jpg')";

if ($conn->query($sql) === TRUE) {
    echo 1;
    //echo "Pendaftaran berhasil";
    //header('Location: http://www.example.com/');
} else {
    echo 0;
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>