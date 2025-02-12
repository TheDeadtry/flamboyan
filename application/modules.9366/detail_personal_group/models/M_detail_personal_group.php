<?php
class M_detail_personal_group extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function tampil_majikan($id) {
    	$sql = "SELECT namamajikan, tglterpilih, JD, tglterbang FROM majikan WHERE id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_tki($id) {
    	$sql = "SELECT kode_agen, id_biodata, nama FROM personal WHERE id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_disnaker($id) {
    	$sql = "SELECT disnaker.tglonline, disnaker.nodisnaker, paspor.nopaspor FROM disnaker 
				JOIN paspor ON disnaker.id_biodata = paspor.id_biodata WHERE disnaker.id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_pk() {

    }

    function tampil_suhan($id) {
    	$sql = "SELECT no, tglterbit, tglexp, tglterima, tglsimpan, tglbawa, tglminta FROM suhan WHERE id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_visa($id) {
    	$sql = "SELECT kocokan, finger, terima FROM visa WHERE id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_paspor($id) {
    	$sql = "SELECT rencana, berlaku FROM paspor WHERE id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_skck() {

    }

    function tampil_medikal($id) {
    	$sql = "SELECT tanggal, expired FROM medical WHERE id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_pap($id) {
    	$sql = "SELECT tglpap FROM pap WHERE id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_ksp_loan($id) {
    	$sql = "SELECT ttdbank, ktkln FROM bank WHERE id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }

    function tampil_departure($id) {
    	$sql = "SELECT * FROM terbang JOIN dataterbang ON terbang.id_terbang=dataterbang.id_terbang WHERE id_biodata = '$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->result();
    }
    
    function ambil_id($id) {
		return $this->db->get_where('personal', array('id_biodata' => $id))->row();
	}
}