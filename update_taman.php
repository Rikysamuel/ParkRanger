
<?php
extract($_POST);
require_once("taman.php");
echo updateTaman($id_taman, $nama, $alamat);
?>