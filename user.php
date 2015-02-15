<?php
	function init(){
		$link= mysqli_connect("localhost","root","","parkranger");
        // Cek koneksi ke database
        if ($link->connect_error) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $link;
	}

	function closeConnection($link){
		mysqli_close($link);
	}

	function isValid($link, $username, $password) {
		$query = "SELECT username, password FROM user";
		$result = mysqli_query($link,$query);
        while($row[] = mysqli_fetch_array($result));
        $valid = 0; $it = 0;
        while ($it<sizeof($row) && $valid!=1) {
        	if ($username==$row[$it]["username"] && $password==$row[$it]["password"]) {
        		$valid = 1;
        	}
        	$it++;
        }
        return $valid;
	}

	//return -1 if not found, else return id_user
	function getId($link, $username) {
		$query = "SELECT id_user FROM user WHERE username='$username'";
		$result = mysqli_query($link,$query);
        if ($result) {
        	while($row[] = mysqli_fetch_array($result));
        	return $row[0]["id_user"];
        }
        else {
    		echo "Error: " . $query . "<br/>" . mysqli_error($link);
    		return $row[0]["id_user"];
    	}
        
	}

	//return -1 if not found, else return role
	function getRole($link, $username) {
		$query = "SELECT role FROM user WHERE username='$username'";
		$result = mysqli_query($link,$query);
        if ($result){
        	while($row[] = mysqli_fetch_array($result));
        	return $row[0]["role"];
        }
        else{
        	echo "Error: " . $query . "<br/>" . mysqli_error($link);
        	return -1;
        }
        	
	}

    function getAllAtributes($id) {
        $id_user = $id;    //$_GET['id_user'];
        $query = mysql_query("SELECT `nama`, `email`, `username`, `password`, `id_user` FROM `user` WHERE `id_user`=$id_user") or die(mysql_error());
        if($query) {
            $data = mysql_fetch_array($query);
            return $data;
        }
        else {
            return -1;
        }
    }

?>