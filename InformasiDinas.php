<?php
	function init(){
		$link=mysqli_connect("localhost","root","","parkranger");
        // Cek koneksi ke database
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $link;
	}

	function closeConnection($link){
		mysqli_close($link);
	}

	function fetchPost($link, $opt) {
        //ambil data ke dalam array row dari database
        switch($opt){
        	case 0:
        		$query = "SELECT * FROM pengaduan ORDER BY waktu DESC";
        		break;
        	case 1:	
        		$query = "SELECT * FROM pengaduan ORDER BY rank_vote DESC";
        		break;
        	case 2:	
        		$query = "SELECT * FROM (SELECT * FROM pengaduan NATURAL JOIN ditanggapi) AS hasil JOIN tanggapan";
        		break;
        	case 3:
        		$query = "SELECT * FROM pengaduan ORDER BY id_taman";
        		break;
        	case 4:	
        		$query = "SELECT * FROM pengaduan ORDER BY jenis_laporan";
        		break;
        	default:
        		break;
        }
        $result = mysqli_query($link,$query);
        while($row[] = mysqli_fetch_array($result));
        if ($opt==2){
        	for ($i=0; $i < sizeof($row)-1; $i++) { 
        		$row[$i][2] = $row[$i][14];
        	}
        }
        return $row;
	}

	function fetchTaman($link,$id){
		$res = mysqli_query($link,"SELECT nama FROM taman WHERE id_taman='$id'");
		$name = $res->fetch_assoc();
		return $name;
	}

	function fetchPelapor($link,$id){
        $res = mysqli_query($link,"SELECT nama FROM user WHERE id_user='$id'");
		$name = $res->fetch_assoc();
		return $name;
	}

	function isTanggapanExist($link,$id){
		$res = mysqli_query($link,"SELECT * FROM ditanggapi WHERE id_laporan='$id'");
		$result = $res->fetch_assoc();
		return $result;
	}

	function reports($link, $row, $it){
		$posts = '<div class="panel panel-default">
                  <div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-3">
							<a href="#" class="thumbnail">
								<img src="'.$row[$it][4].'" alt="'.$row[$it][4].'">
							</a>
						</div>
						<div class="col-xs-9 deskripsi">
							<h2><a href="#"><strong>'.fetchTaman($link,$row[$it][5])['nama'].'</strong></a></h2>
							<p class="text-warning">Jenis laporan : '.$row[$it][9].'</p>
							<p style="min-height:60px">
							'.$row[$it][8].'</p>
							<div class="col-xs-9 status">
								<p>';
								$color = ($row[$it][3]==1)?"ok":"remove";
								$color2 = ($row[$it][3]==1)?"success":"danger";
									$posts = $posts . '<span class="text-'.$color2.'"><span class="glyphicon glyphicon-'.$color.'">';
								$stat = ($row[$it][3]==1)?"Sudah ditanggapi":"Belum ditanggapi";
		$posts = $posts . '				</span> '.$stat.'</span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary"> '.fetchPelapor($link,$row[$it][7])['nama'].' </a> <a href="#"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</p>
							</div>
							<div class="col-xs-3">'
							// $tanggapan = (isTanggapanExist($link,$row[$it][0]))?""
		$posts = $posts . '			<button id="bt'.$row[$it][0].'" type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#post'.$row[$it][0].'" onclick="this.style.visibility=\'hidden\'">Tanggapi</button>
						    </div>
						</div>
						</div>
						<div id="post'.$row[$it][0].'" class="collapse out">
						
							<div class="col-xs-9 komentar">
								<textarea name="komentar" id="'.$row[$it][0].'_komentar" rows="3" class="form-control" placeholder="Tanggapan"></textarea>
							</div>
							<div class="col-xs-3 konfirmasi-btn">
								<span>
									<button type="submit"  class="btn btn-block btn-primary" data-toggle="collapse" data-target="#post'.$row[$it][0].'" onclick="addKomentar('.$row[$it][0].')">Konfirmasi</button>
								</span>
							</div>
						</div>
	        		</div>
	        	</div>';
	    return $posts;
	}

	function countPagination($row){
		return (sizeof($row)-1)/5;
	}
?>