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
    
    /* Fungsi edmund */
    function createDBConnection() {
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

        return $conn;
    }

    function registerMember($nama, $email, $username, $password) {
        $conn = createDBConnection();

        // 1:admin, 2:dinas, 3:member
        $sql = "INSERT INTO user (id_user, nama, email, username, password, role) 
                VALUES ('', '$nama', '$email', '$username', '$password', 3)";

        if ($conn->query($sql) === TRUE) {
            // Get user id
            $uid = $conn->insert_id;
        
            // Insert into 'member' table
            $sql = "INSERT INTO member (id_user, status, jumlah_report) 
                    VALUES ($uid, 'unbanned', 0)";

            if($conn->query($sql) === TRUE)
                $retval = 1;
            else
                $retval = 0;
        
        } else {
            $retval = 0;
        }
        $conn->close();

        return $retval;
    }

    function tambahDinas($nama, $email, $username, $password, $jenisLaporan) {
        $conn = createDBConnection();

        $sql = "INSERT INTO user (id_user,nama,email,username,password,role) 
                VALUES ('', '$nama', '$email', '$username', '$password', 2)";

        if($conn->query($sql)) {
            $id = $conn->insert_id;
            $sql = "INSERT INTO pihak_berwenang (id_user,kategori)
                    VALUES ($id, '$jenisLaporan')";
            if($conn->query($sql))
                header("Location: manage_dinas.php");
            else
                 return "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        else {
            return "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $conn->close();
    }

    function hapusDinas($idDinas) {
        $conn = createDBConnection();

        $sql = "DELETE FROM user
                WHERE id_user=$idDinas";

        if($conn->query($sql)) {
            header("Location: manage_dinas.php");
        }
        else {
            return "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $conn->close();
    }

    function ubahKategoriDinas($idDinas, $kategori) {
        $conn = createDBConnection();
        $sql = "UPDATE pihak_berwenang
                SET kategori='$kategori'
                WHERE id_user=$idDinas";

        if($conn->query($sql)) {
            $retval = 1;
        }   
        else {
            $retval = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }   
        $conn->close();
        return $retval;
    }

    function login($username, $password) {
        $conn = createDBConnection();
        $sql = "SELECT * FROM user 
                WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
        
        if($result->num_rows!=FALSE){
            $row=$result->fetch_assoc();
            // Simpan session
            session_start();
            $_SESSION["loggedIn"] = TRUE;
            $_SESSION["id_user"] = $row['id_user'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["role"] = $row['role'];

            $conn->close();

            if($row['role']==1) {
                return "manage_laporan.php";
            }
            else if($row['role']==2) {
                return "dinas.php";
            }
            else if($row['role']==3){
                return "index.php";
            }
            
        }
        else{
            session_start();
            $_SESSION["loggedIn"] = FALSE;
            return 0;
        }
    }
?>