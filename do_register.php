<?php
extract($_POST);
require_once('user.php');
echo registerMember($nama, $email, $username, $password);
?>