<?php
class M_dashboard extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function hitung_warga($kode_desa){
	$jumlahwarga;
        $result = Dbs::load("SELECT sum(jumlah_ak) as hitungan FROM data_keluarga where no_registrasi LIKE '%$kode_desa%'");
			while($row = mysqli_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 function hitung_data_mf(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'mf%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_mi(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'mi%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_ff(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'ff%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_fi(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'fi%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_jp(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'jp%'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function hitung_data_mf_agen($kodeagen){
		$sql = "SELECT count(*) as total FROM personal 
INNER JOIN datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor
INNER JOIN majikan ON personal.id_biodata=majikan.id_biodata WHERE majikan.kode_agen='$kodeagen' AND personal.id_biodata LIKE 'mf%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_mi_agen($kodeagen){
		$sql = "SELECT count(*) as total FROM personal 
INNER JOIN datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor
INNER JOIN majikan ON personal.id_biodata=majikan.id_biodata WHERE majikan.kode_agen='$kodeagen' AND personal.id_biodata LIKE 'mi%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_ff_agen($kodeagen){
		$sql = "SELECT count(*) as total FROM personal 
INNER JOIN datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor
INNER JOIN majikan ON personal.id_biodata=majikan.id_biodata WHERE majikan.kode_agen='$kodeagen' AND personal.id_biodata LIKE 'ff%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_fi_agen($kodeagen){
		$sql = "SELECT count(*) as total FROM personal 
INNER JOIN datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor
INNER JOIN majikan ON personal.id_biodata=majikan.id_biodata WHERE majikan.kode_agen='$kodeagen' AND personal.id_biodata LIKE 'fi%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_jp_agen($kodeagen){
		$sql = "SELECT count(*) as total FROM personal 
INNER JOIN datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor
INNER JOIN majikan ON personal.id_biodata=majikan.id_biodata WHERE majikan.kode_agen='$kodeagen' AND personal.id_biodata LIKE 'jp%'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	
 function tampil_data_personal(){
		$sql = "SELECT *,datasponsor.nama as namasponsor FROM personal INNER JOIN datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor;";
                $query = $this->db->query($sql);

            return $query->result();
	
	}

	function tampil_pengguna_agen($id_user){
		$nama;
        $result = Dbs::load("SELECT kode_agen FROM dataagen where username='$id_user'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['kode_agen'];
			}
		return $nama;
	}

			 function tampil_data_personal_agen($kodeagen){
		$sql = "SELECT *,datasponsor.nama as namasponsor FROM personal 
INNER JOIN datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor
INNER JOIN majikan ON personal.id_biodata=majikan.id_biodata WHERE majikan.kode_agen='$kodeagen'";
                $query = $this->db->query($sql);

            return $query->result();
	}
		 function tampil_data_personal_group(){
		$sql = "SELECT *,datasponsor.nama as namasponsor,majikan.kode_agen as kodeagennya FROM personal INNER JOIN 

datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor INNER JOIN 

majikan ON personal.id_biodata=majikan.id_biodata";
                $query = $this->db->query($sql);

            return $query->result();
	}
}
?>