<?php
extract($_POST);
require_once("user.php");
echo tambahDinas($nama, $email, $username, $password, $jenisLaporan);
?>