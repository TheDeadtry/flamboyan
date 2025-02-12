<?php
class M_dashboard_surat_perjanjian extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM surat_perjanjian 
				INNER JOIN personal 
				ON surat_perjanjian.nama_tki = personal.id_personal WHERE id_biodata LIKE 'mf%';";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
 function tampil_data_personal2(){
		$sql = "SELECT * FROM surat_perjanjian 
				INNER JOIN personal 
				ON surat_perjanjian.nama_tki = personal.id_personal WHERE id_biodata LIKE 'mi%';";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
  function tampil_data_personal3(){
		$sql = "SELECT * FROM surat_perjanjian 
				INNER JOIN personal 
				ON surat_perjanjian.nama_tki = personal.id_personal WHERE id_biodata LIKE 'jp%';";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
  function hitung_data_mf(){
		$sql = "SELECT count(*) as total FROM surat_perjanjian 
				INNER JOIN personal 
				ON surat_perjanjian.nama_tki = personal.id_personal WHERE personal.id_biodata LIKE 'mf%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
  function hitung_data_mi(){
		$sql = "SELECT count(*) as total FROM surat_perjanjian 
				INNER JOIN personal 
				ON surat_perjanjian.nama_tki = personal.id_personal WHERE personal.id_biodata LIKE 'mi%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
  function hitung_data_jp(){
		$sql = "SELECT count(*) as total FROM surat_perjanjian 
				INNER JOIN personal 
				ON surat_perjanjian.nama_tki = personal.id_personal WHERE personal.id_biodata LIKE 'jp%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
}
?>