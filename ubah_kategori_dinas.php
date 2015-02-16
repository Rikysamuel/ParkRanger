<?php
extract($_POST);
require_once("user.php");
echo ubahKategoriDinas($id, $kategori);
?>