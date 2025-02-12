<?php
class M_markmed extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	function tampil_data_personal($idnya) {
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
        $query = $this->db->query($sql);
        return $query->result();
	}

    function tampil_data_markmed($idnya) {
        $sql = "SELECT markc.*, dokumen.* 
                FROM markc 
                JOIN dokumen ON markc.id_biodata = dokumen.id_biodata
                WHERE markc.id_biodata = '$idnya'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function hitung_data_markmed($idnya) {
        $sql = "SELECT * FROM markc WHERE id_biodata = '$idnya'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function update_legal() {
        $idid = $this->input->post('biodata');
        $tglg = $this->input->post('tgl_legal');
        $nmlg = $this->input->post('nama_legal');
        $hblg = $this->input->post('hub_legal');
        $khlg = $this->input->post('khusus_legal');
        $data = array(
            'tgl_legal' => $tglg,
            'nama_legal' => $nmlg,
            'hub_legal' => $hblg,
            'khusus_legal' => $khlg,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markc', $data);
    }

    function update_nota() {
        $idid = $this->input->post('biodata');
        $tgnt = $this->input->post('tgl_nota');
        $nmnt = $this->input->post('nama_nota');
        $hbnt = $this->input->post('hub_nota');
        $khnt = $this->input->post('khusus_nota');
        $data = array(
            'tgl_nota' => $tgnt,
            'nama_nota' => $nmnt,
            'hub_nota' => $hbnt,
            'khusus_nota' => $khnt,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markc', $data);
    }

    function update_pram() {
        $idid = $this->input->post('biodata');
        $tgpr = $this->input->post('tgl_pram');
        $hapr = $this->input->post('hasil_pram');
        $data = array(
            'tgl_pram' => $tgpr,
            'hasil_pram' => $hapr,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markc', $data);
    }

    function update_samm() {
        $idid = $this->input->post('biodata');
        $tgsm = $this->input->post('tgl_samm');
        $hssm = $this->input->post('hasil_samm');
        $exsm = $this->input->post('exp_samm');
        $data = array(
            'tgl_samm' => $tgsm,
            'hasil_samm' => $hssm,
            'exp_samm' => $exsm,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markc', $data);
    }

    function update_murm() {
        $idid = $this->input->post('biodata');
        $tgmu = $this->input->post('tgl_murm');
        $hsmu = $this->input->post('hasil_murm');
        $exmu = $this->input->post('exp_murm');
        $data = array(
            'tgl_murm' => $tgmu,
            'hasil_murm' => $hsmu,
            'exp_murm' => $exmu,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markc', $data);
    }

    function update_paspor() {
        $idid = $this->input->post('biodata');
        $inpa = $this->input->post('in_paspor');
        $bkpa = $this->input->post('bk_paspor');
        $data = array(
            'in_paspor' => $inpa,
            'bk_paspor' => $bkpa,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markc', $data);
    }

    function update_skck() {
        $idid = $this->input->post('biodata');
        $ajus = $this->input->post('aju_skck');
        $trms = $this->input->post('trm_skck');
        $exps = $this->input->post('exp_skck');
        $data = array(
            'aju_skck' => $ajus,
            'trm_skck' => $trms,
            'exp_skck' => $exps,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markc', $data);
    }

    function update_dokpas() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "paspor_".time()."_".$_FILES['paspor']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/paspor/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('paspor');
        $data = array(
            'paspor' => $gbr['file_name'],
            'terakhir_paspor' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_dokskck() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "skck_".time()."_".$_FILES['skck']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/skck/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('skck');
        $data = array(
            'skck' => $gbr['file_name'],
            'terakhir_skck' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_medikal1() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "medikal1_".time()."_".$_FILES['medikal1']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/medikal1/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('medikal1');
        $data = array(
            'medikal1' => $gbr['file_name'],
            'terakhir_medikal1' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_medikal2() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "medikal2_".time()."_".$_FILES['medikal2']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/medikal2/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('medikal2');
        $data = array(
            'medikal2' => $gbr['file_name'],
            'terakhir_medikal2' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_medikal3() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "medikal3_".time()."_".$_FILES['medikal3']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/medikal3/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('medikal3');
        $data = array(
            'medikal3' => $gbr['file_name'],
            'terakhir_medikal3' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

}
?>