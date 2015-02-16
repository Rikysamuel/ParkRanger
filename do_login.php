<?php
extract($_POST);
require_once('user.php');
echo login($username, $password);
?>