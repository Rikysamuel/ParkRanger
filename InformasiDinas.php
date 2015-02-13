<?php
	function init(){
		$link=mysqli_connect("localhost","root","","park_ranger");
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
        		$query = "";
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

	function reports($link, $row, $it){
		$posts = '<div class="panel panel-default">
                  <div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-3">
							<a href="#" class="thumbnail">
								<img src="img/taman1.jpg" alt="'.$row[$it][4].'">
							</a>
						</div>
						<div class="col-xs-9 deskripsi">
							<h2><a href="#"><strong>'.fetchTaman($link,$row[$it][5])['nama'].'</strong></a></h2>
							<p class="text-warning">Jenis laporan : '.$row[$it][9].'</p>
							<p style="min-height:60px">
							'.$row[$it][8].'</p>
							<div class="col-xs-9 status">
								<p>
									<span class="text-danger"><span class="glyphicon glyphicon-remove"></span> '.$row[$it][3].'</span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary"> '.fetchPelapor($link,$row[$it][7])['nama'].' </a> <a href="#"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</p>
							</div>
							<div class="col-xs-3">
								<button id="bt'.$row[$it][0].'" type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#post'.$row[$it][0].'" onclick="this.style.visibility=\'hidden\'">Tanggapi</button>
						    </div>
						</div>
						</div>
						<div id="post'.$row[$it][0].'" class="collapse out">
							<div class="col-xs-9 komentar">
								<textarea name="komentar" rows="3" class="form-control" placeholder="Tanggapan"></textarea>
							</div>
							<div class="col-xs-3 konfirmasi-btn">
								<span>
									<input type="submit" value="Konfirmasi" class="btn btn-block btn-primary" data-toggle="collapse" data-target="#post'.$row[$it][0].'" onclick="bt'.$row[$it][0].'.style.visibility=\'visible\'">
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