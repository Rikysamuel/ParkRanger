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
        		$query = "SELECT * FROM (SELECT * FROM pengaduan NATURAL JOIN ditanggapi) AS hasil JOIN tanggapan WHERE hasil.id_tanggapan=tanggapan.id_tanggapan";
        		break;
        	case 3:
        		$query = "SELECT * FROM pengaduan ORDER BY id_taman";
        		break;
        	case 4:	
        		$query = "SELECT * FROM pengaduan JOIN pihak_berwenang WHERE id_user=ditangani_by";
        		break;
        	default:
        		break;
        }
        $result = mysqli_query($link,$query);
        while($row[] = mysqli_fetch_array($result));
        if ($opt==2){
        	for ($i=0; $i < sizeof($row)-1; $i++) { 
        		$row[$i][2] = $row[$i][13];
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

	function getKategori($link,$id){
		$res = mysqli_query($link,"SELECT kategori FROM (SELECT * FROM pihak_berwenang JOIN pengaduan WHERE id_user=ditangani_by) AS hasil2 WHERE id_laporan='$id'");
		$result = $res->fetch_assoc();
		return $result;
	}

	function reports($link, $row, $it){
		$posts = '<div class="panel panel-default">
                  <div class="panel-body">
					<div class="col-xs-12 deskripsi-wrapper">
						<div class="col-xs-3">
							<a href="#" class="thumbnail">
								<img src="img/taman/'.$row[$it][4].'" alt="'.$row[$it][4].'">
							</a>
						</div>
						<div class="col-xs-9 deskripsi">
							<h2><a href="#"><strong>'.fetchTaman($link,$row[$it][5])['nama'].'</strong></a></h2>
							<p class="text-warning">Jenis laporan : '.getKategori($link,$row[$it][0])['kategori'].'</p>
							<p style="min-height:60px">
							'.$row[$it][8].'</p>
							<div id="statustanggapan'.$row[$it][0].'" class="col-xs-9 status">
								<p>';
								$color = ($row[$it][3]==1)?"ok":"remove";
								$color2 = ($row[$it][3]==1)?"success":"danger";
									$posts = $posts . '<span class="text-'.$color2.'"><span class="glyphicon glyphicon-'.$color.'">';
								$stat = ($row[$it][3]==1)?"Sudah ditanggapi":"Belum ditanggapi";
		$posts = $posts . '				</span> '.$stat.'</span><br />
									<small>Pelapor : <a href="profile.html" class="text-primary"> '.fetchPelapor($link,$row[$it][7])['nama'].' </a> <a href="#" data-toggle="modal" data-target="#myModal'.$row[$it][0].'"><span class="text-danger glyphicon glyphicon-exclamation-sign"></span></a></small>
								</p>
							</div>
							<div class="col-xs-3">';

							$tanggapan = ($row[$it][3]==1)?'':'<button id="bt'.$row[$it][0].'" type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#post'.$row[$it][0].'" onclick="this.style.visibility=\'hidden\'">Tanggapi</button>';
		$posts = $posts . '	'.$tanggapan.'
						    </div>
						</div>
						</div>
						<div id="post'.$row[$it][0].'" class="collapse out">
						
							<div class="col-xs-9 komentar">
								<textarea name="komentar" id="'.$row[$it][0].'_komentar" rows="3" class="form-control" placeholder="Tanggapan"></textarea>
							</div>
							<div class="col-xs-3 konfirmasi-btn">
								<span>
									<button type="submit"  class="btn btn-block btn-primary" data-toggle="collapse" data-target="#post'.$row[$it][0].'" onclick="addKomentar('.$row[$it][0].','.$_SESSION['id_user'].')">Konfirmasi</button>
								</span>
							</div>
						</div>
	        		</div>
	        		<div class="modal fade" id="myModal'.$row[$it][0].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
						<div class="modal-dialog"> 
							<div class="modal-content"> 
								<div class="modal-header"> 
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">× </button> 
									<h4 class="modal-title" id="myModalLabel"> Blokir User  </h4> 
								</div> 
								<div class="modal-body">
									Apakah Anda yakin ingin mengirimkan permintaan blokir user ini? 
								</div> 
								<div class="modal-footer"> 
									<button type="button" class="btn btn-default" data-dismiss="modal"> Tidak </button> 
									<button type="button" class="btn btn-primary"> Ya </button> 
								</div> 
							</div>
						</div>
					</div>
	        	</div>';
	    return $posts;
	}

	function countPagination($row){
		$temp = (sizeof($row)-1)/5;
		if($temp==0){
			return 1;
		} else{
			return $temp;
		}
	}
?>