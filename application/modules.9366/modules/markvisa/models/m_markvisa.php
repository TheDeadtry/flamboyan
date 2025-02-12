<?php
class M_markvisa extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	function tampil_data_personal($idnya) {
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
	}

    function tampil_data_markvisa($idnya) {
        $sql = "SELECT marke.*, dokumen.* 
                FROM marke 
                JOIN dokumen ON marke.id_biodata = dokumen.id_biodata
                WHERE dokumen.id_biodata = '$idnya'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function update_kocokan() {
        $idid = $this->input->post('biodata');
        $tgkc = $this->input->post('tgl_kocokan');
        $ptkc = $this->input->post('pt');
        $data = array(
            'tgl_kocokan' => $tgkc,
            'pt_kocokan' => $ptkc,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('marke', $data);        
    }

    function update_fingerprint() {
        $idid = $this->input->post('biodata');
        $tgfp = $this->input->post('tgl_fp');
        $data = array(
            'tgl_finger' => $tgfp,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('marke', $data);
    }

    function update_visa() {
        $idid = $this->input->post('biodata');
        $kira_kocok = $this->input->post('kira_kocok');
        $kira_finger = $this->input->post('kira_finger');
        $kira_terima = $this->input->post('kira_terima');
        $kira_terbang = $this->input->post('kira_terbang');
        $actual_kocok = $this->input->post('actual_kocok');
        $actual_finger = $this->input->post('actual_finger');
        $actual_terima = $this->input->post('actual_terima');
        $no_visa = $this->input->post('no_visa');
        $tgl_berlaku = $this->input->post('tgl_berlaku');
        $tgl_sampai = $this->input->post('tgl_sampai');
        $tgl_terbang = $this->input->post('tgl_terbang');
        $tgl_pap = $this->input->post('tgl_pap');

        $data = array(
            'kira_kocokan' => $kira_kocok,
            'kira_finger' => $kira_finger,
            'kira_visa' => $kira_terima,
            'kira_terbang' => $kira_terbang,
            'tgl_kocokan' => $actual_kocok,
            'tgl_finger' => $actual_finger,
            'trm_visa' => $actual_terima,
            'no_visa' => $no_visa,
            'tgl_berlaku' => $tgl_berlaku,
            'tgl_sampai' => $tgl_sampai,
            'terbang_perkiraan' => $tgl_terbang,
            'pap_perkiraan' => $tgl_pap,

            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('marke', $data);
    }

    function update_pap() {
        $idid = $this->input->post('biodata');
        $papp = $this->input->post('pap');
        $data = array(
            'pap_perkiraan' => $papp,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('marke', $data);
    }

    function update_dokfp() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "fp_".time()."_".$_FILES['fingerprint']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/fingerprint/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('fingerprint');
        $data = array(
            'fingerprint' => $gbr['file_name'],
            'terakhir_fingerprint' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_dokvisa() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "visa_".time()."_".$_FILES['visa']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/visa/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('visa');
        $data = array(
            'visa' => $gbr['file_name'],
            'terakhir_visa' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_dokpap() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "pap_".time()."_".$_FILES['pap']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/pap/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('pap');
        $data = array(
            'pap' => $gbr['file_name'],
            'terakhir_pap' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }
}
?>