<?php
class M_markdokubank extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	function tampil_data_personal($idnya) {
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
	}

    function tampil_data_markdokubank($idnya) {
        $sql = "SELECT * FROM marke WHERE id_biodata = '$idnya'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function hitung_data_markdokubank($idnya) {
        $sql = "SELECT * FROM marke WHERE id_biodata = '$idnya'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function tambah_markdokubank($idnya) {
        $tgkc = date("Y.m.d", strtotime($this->input->post('tgl_kocokan')));
        $ptkc = $this->input->post('pt');
        $tgfp = date("Y.m.d", strtotime($this->input->post('tgl_fp')));
        $trmv = date("Y.m.d", strtotime($this->input->post('tgl_terima')));
        $papp = $this->input->post('pap');
        $trbp = date("Y.m.d", strtotime($this->input->post('tgl_terbang')));
        $data = array(
            'id_marke' => '',
            'id_biodata' => $idnya,
            'tgl_kocokan' => $tgkc,
            'pt_kocokan' => $ptkc,
            'tgl_finger' => $tgfp,
            'trm_visa' => $trmv,
            'pap_perkiraan' => $papp,
            'terbang_perkiraan' => $trbp,
            );
        return $this->db->insert('marke', $data);
    }

    function update_markdokubank() {
        $idid = $this->input->post('biodata');
        $tgkc = date("Y.m.d", strtotime($this->input->post('tgl_kocokan')));
        $ptkc = $this->input->post('pt');
        $tgfp = date("Y.m.d", strtotime($this->input->post('tgl_fp')));
        $trmv = date("Y.m.d", strtotime($this->input->post('tgl_terima')));
        $papp = $this->input->post('pap');
        $trbp = date("Y.m.d", strtotime($this->input->post('tgl_terbang')));
        $data = array(
            'tgl_kocokan' => $tgkc,
            'pt_kocokan' => $ptkc,
            'tgl_finger' => $tgfp,
            'trm_visa' => $trmv,
            'pap_perkiraan' => $papp,
            'terbang_perkiraan' => $trbp,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('marke', $data);
    }
}
?>