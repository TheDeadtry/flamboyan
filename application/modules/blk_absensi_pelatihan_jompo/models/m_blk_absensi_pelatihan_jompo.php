<?php
class M_blk_absensi_pelatihan_jompo extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function tampil_data($tbl) {
    	$sql = "SELECT * FROM $tbl";
    	$q = $this->db->query($sql);
    	return $q->result();
    }

    function tampil_data_adv($tbl,$tipe) {
    	$sql = "SELECT * FROM $tbl where tipe=$tipe";
    	$q = $this->db->query($sql);
    	return $q->result();
    }

    function get_data_row($tbl,$field,$id) {
    	$sql = "SELECT * FROM $tbl where $field=$id";
    	$q = $this->db->query($sql);
    	return $q->row();
    }

	function tambah_nilai($data) {
		$this->db->insert('blk_penilaian_pel_jompo',$data);
	}

	function ubah_nilai($data,$id) {
		$this->db->where('id_penilaian_pel_jompo', $id);
		$this->db->update('blk_penilaian_pel_jompo', $data);
	}

	function hapus_nilai() {
		$id = $this->input->post('tatagraha_id');
		$this->db->where('id_penilaian_pel_jompo', $id);
		$this->db->delete('blk_penilaian_pel_jompo');
	}

    function tampil_data_blk_personal($pilihan){
        $sql = "SELECT *,personalblk.nama as namanya,blk_pemilik.isi as pemilikx, blk_pemilik.negara as negarapemilikx,datasponsor.kode_sponsor as kdsponsor
        FROM personalblk 
        LEFT JOIN blk_pemilik
        ON personalblk.pemilik=blk_pemilik.id_pemilik 
        LEFT JOIN datasponsor
        ON personalblk.sponsor=datasponsor.nama
        WHERE personalblk.nodaftar='$pilihan'";
        $query = $this->db->query($sql);
        return $query->row_array();
    } 
}
?>