<?php
class M_dl06 extends CI_Model{
    function __construct(){
        parent::__construct();
    }

function ambilidbio($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_ijin where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['id_tki'];
			}
		return $kode_desa;
	}

            function tampil_data_detail($idtabeldis){
        $sql = "SELECT * FROM disnaker where id_biodata='$idtabeldis'";
                $query = $this->db->query($sql);

            return $query;
    } 

			function ambilfoto($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['foto'];
			}
		return $kode_desa;
	}

				function daerah($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_ijin where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['daerah'];
			}
		return $kode_desa;
	}
	
				function tampilkan($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_ijin where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tampilkan'];
			}
		return $kode_desa;
	}


					function tanggal($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_ijin where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}


    			function ambilpendmandarin(){
$kode_desa=array();
        $result = Dbs::load("SELECT * FROM datapendidikan");
			while($row = mysqli_fetch_array($result)){
                $kode_desa[] =$row['mandarin'];
			}
		return $kode_desa;
	} 

}
?>