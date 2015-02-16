<?php
extract($_GET);
require_once("user.php");
$retval = hapusDinas($id);
echo $retval;
?>