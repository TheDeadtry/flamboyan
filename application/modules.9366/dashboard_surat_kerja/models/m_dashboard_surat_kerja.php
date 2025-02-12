<?php
class M_dashboard_surat_kerja extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family WHERE personal.id_biodata LIKE 'mf%';";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
 function tampil_data_personal2(){
		$sql = "SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family WHERE personal.id_biodata LIKE 'mi%';";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
  function tampil_data_personal3(){
		$sql = "SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family WHERE personal.id_biodata LIKE 'jp%';";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
  function hitung_data_mf(){
		$sql = "SELECT count(*) as total FROM surat_kerja 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal WHERE personal.id_biodata LIKE 'mf%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
  function hitung_data_mi(){
		$sql = "SELECT count(*) as total FROM surat_kerja 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal WHERE personal.id_biodata LIKE 'mi%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
  function hitung_data_jp(){
		$sql = "SELECT count(*) as total FROM surat_kerja 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal WHERE personal.id_biodata LIKE 'jp%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
}
?>