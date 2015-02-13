<?php
	include('DBConfig.php');
?>

<?php
		$id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        $queryPassword = mysql_query("SELECT `password` FROM `user` WHERE `id_user`=$id_user") or die(mysql_error());
        $password = mysql_fetch_array($queryPassword);

        if($oldPassword) {
        	if($oldPassword == $password['password']) { // validasi password
	        	if($confirmPassword != null) {
	        		$query = mysql_query("UPDATE `user` SET `nama`='$nama',`email`='$email',`username`='$username',`password`='$confirmPassword' WHERE `id_user`='$id_user'") or die(mysql_error());
			 	} else {
			 		$query = mysql_query("UPDATE `user` SET `nama`='$nama',`email`='$email',`username`='$username' WHERE `id_user`='$id_user'") or die(mysql_error());
			 	}

			 	if ($query)
				    header('location:index.php');

        	} else {	// password tidak sama
        		header('location:edit_profil.php');
        	}
        } else { // tidak ada password yang dimasukkan
        	if($newPassword != null) { // password lama tidak dimasukkan, tetapi password baru ada
        		header('location:edit_profil.php');
        	} else { // tidak ada password yang dimasukkan, tidak ad edit password
        		$query = mysql_query("UPDATE `user` SET `nama`='$nama',`email`='$email',`username`='$username' WHERE `id_user`='$id_user'") or die(mysql_error());
        		if($query) 
        			header('location:index.php');
        	}
        }
?>