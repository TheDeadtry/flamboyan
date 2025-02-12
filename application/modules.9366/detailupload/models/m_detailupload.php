<?php
class M_detailupload extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
	}

	function tampil_data_fotovisa($idnya){
		$sql = "SELECT * FROM upload_fotovisa WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
	}

	function hitung_fotovisa($idnya){
		$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='fotovisa'");
		while($row = mysqli_fetch_array($result)){
            $kode_desa =$row['jumlah'];
		}
		return $kode_desa;
	} 

	function tampil_data_ktp($idnya){
		$sql = "SELECT * FROM upload_ktp WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
	}		
	function hitung_ktp($idnya){
		$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='ktp'");
		while($row = mysqli_fetch_array($result)){
            $kode_desa =$row['jumlah'];
		}
		return $kode_desa;
	} 

			function tampil_data_kk($idnya){
		$sql = "SELECT * FROM upload_kk WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_kk($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='kk'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_aktelahir($idnya){
		$sql = "SELECT * FROM upload_aktelahir WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_aktelahir($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='aktelahir'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_ijasah($idnya){
		$sql = "SELECT * FROM upload_ijasah WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_ijasah($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='ijasah'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_suratnikah($idnya){
		$sql = "SELECT * FROM upload_suratnikah WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_suratnikah($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='suratnikah'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

		function tampil_data_suratijinkeluarga($idnya){
		$sql = "SELECT * FROM upload_suratijinkeluarga WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_suratijinkeluarga($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='suratijinkeluarga'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

		function tampil_data_pasporlama($idnya){
		$sql = "SELECT * FROM upload_pasporlama WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_pasporlama($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='pasporlama'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_perjanjianpenempatan($idnya){
		$sql = "SELECT * FROM upload_perjanjianpenempatan WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_perjanjianpenempatan($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='perjanjianpenempatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_pasportampil($idnya){
		$sql = "SELECT * FROM upload_pasportampil WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_pasportampil($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='pasportampil'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_kehilanganpaspor($idnya){
		$sql = "SELECT * FROM upload_kehilanganpaspor WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_kehilanganpaspor($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='kehilanganpaspor'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_skck($idnya){
		$sql = "SELECT * FROM upload_skck WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_skck($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='skck'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	}

	function tampil_data_skckpolres($idnya){
		$sql = "SELECT * FROM upload_skckpolres WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_skckpolres($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='skckpolres'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	}  

	function tampil_data_legalitas($idnya){
		$sql = "SELECT * FROM upload_legalitas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_legalitas($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='legalitas'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_medikal($idnya){
		$sql = "SELECT * FROM upload_medikal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_medikal($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='medikal'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

		function tampil_data_serkes($idnya){
		$sql = "SELECT * FROM upload_serkes WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_serkes($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='serkes'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 


	function tampil_data_medikalfull($idnya){
		$sql = "SELECT * FROM upload_medikalfull WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_medikalfull($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='medikalfull'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 


		function tampil_data_sertifikatujian($idnya){
		$sql = "SELECT * FROM upload_sertifikatujian WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_sertifikatujian($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='sertifikatujian'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 


		function tampil_data_kpa($idnya){
		$sql = "SELECT * FROM upload_kpa WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_kpa($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='kpa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_pk($idnya){
		$sql = "SELECT * FROM upload_pk WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_pk($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='pk'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

function tampil_data_suhan($idnya){
		$sql = "SELECT * FROM upload_suhan WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_suhan($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='suhan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

function tampil_data_visapermit($idnya){
		$sql = "SELECT * FROM upload_visapermit WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_visapermit($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='visapermit'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

function tampil_data_visa($idnya){
		$sql = "SELECT * FROM upload_visa WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_visa($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='visa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

function tampil_data_tiket($idnya){
		$sql = "SELECT * FROM upload_tiket WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_tiket($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='tiket'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 


function tampil_data_visaarrival($idnya){
		$sql = "SELECT * FROM upload_visaarrival WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_visaarrival($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='visaarrival'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 


	function tampil_data_suhankabur($idnya){
		$sql = "SELECT * FROM upload_suhankabur WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_suhankabur($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='suhankabur'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

function tampil_data_berkas($idnya){
		$sql = "SELECT * FROM upload_berkas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_berkas($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='berkas'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_job($idnya){
		$sql = "SELECT * FROM upload_job WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_job($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='job'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_slain($idnya){
		$sql = "SELECT * FROM upload_slain WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}		
	function hitung_slain($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='slain'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 

	function tampil_data_kpapra($idnya){
		$sql = "SELECT * FROM upload_kpapra WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	

	function hitung_kpapra($idnya){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='kpapra'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	} 
	
	function tampil_data_ttdt($idnya){
		$sql = "SELECT * FROM upload_ttdt WHERE pinho='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}


	function hitung_ttdt($idnya){
		$kode_desa="";
				$result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='ttdt'");
					while($row = mysqli_fetch_array($result)){
						$kode_desa =$row['jumlah'];
					}
				return $kode_desa;
			} 
	
			function tampil_data_servak($idnya){
				$sql = "SELECT * FROM upload_servak WHERE id_biodata='".$idnya."'";
						$query = $this->db->query($sql);
		
					return $query->result();
			}
		
		
			function hitung_servak($idnya){
				$kode_desa="";
						$result = Dbs::load("SELECT count(*) as jumlah FROM foto WHERE id_biodata='".$idnya."' AND jenis='servak'");
							while($row = mysqli_fetch_array($result)){
								$kode_desa =$row['jumlah'];
							}
						return $kode_desa;
					} 




	


}
?>