<?php
class M_markonline extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	function tampil_data_personal($idnya) {
		$sql = "SELECT *, TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata = '$idnya'";
        $query = $this->db->query($sql);
        return $query->result();
	}

    function tampil_data_markonline($idnya) {
        $sql = "SELECT markb.*,
                       dokumen.* 
                FROM markb 
                JOIN dokumen ON markb.id_biodata = dokumen.id_biodata 
                WHERE markb.id_biodata='$idnya'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function hitung_data_markonline($idnya) {
        $sql = "SELECT * FROM markb WHERE id_biodata = '$idnya'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function update_dokrumah() {
        $idid = $this->input->post('biodata');
        $kbkl = $this->input->post('bkl');
        $pple = $this->input->post('pp_lm_exp');
        $ktkl = $this->input->post('ktkln_exp');
        $khus = $this->input->post('khusus');
        $data = array(
            'bkl' => $kbkl,
            'pp_lm_exp' => $pple,
            'ktkln_exp' => $ktkl,
            'khusus' => $khus,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markb', $data);
    }

    function update_suratsk() {
        $idid = $this->input->post('biodata');
        $kets = $this->input->post('ket_sk');
        $tajs = $this->input->post('tgl_aju');
        $ttrs = $this->input->post('tgl_terima');
        $data = array(
            'ket_sk' => $kets,
            'tgl_aju_sk' => $tajs,
            'tgl_trm_sk' => $ttrs,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markb', $data);
    }

    function update_rekom() {
        $idid = $this->input->post('biodata');
        $tbrk = $this->input->post('tgl_buat');
        $tgtr = $this->input->post('tgl_terima_rekom');
        $data = array(
            'tgl_buat_rekom' => $tbrk,
            'tgl_trm_rekom' => $tgtr,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('markb', $data);
    }

    function update_ktp() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "ktp_".time()."_".$_FILES['ktp']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/ktp/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('ktp');
        $data = array(
            'ktp' => $gbr['file_name'],
            'terakhir_ktp' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_kk() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "kk_".time()."_".$_FILES['kk']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/kk/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('kk');
        $data = array(
            'kk' => $gbr['file_name'],
            'terakhir_kk' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_ijazah() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "ijazah_".time()."_".$_FILES['ijazah']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/ijazah/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('ijazah');
        $data = array(
            'ijazah' => $gbr['file_name'],
            'terakhir_ijazah' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_si() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "ijazah_".time()."_".$_FILES['si']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/si/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('si');
        $data = array(
            'si' => $gbr['file_name'],
            'terakhir_si' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_sn() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "ijazah_".time()."_".$_FILES['sn']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/sn/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('sn');
        $data = array(
            'sn' => $gbr['file_name'],
            'terakhir_sn' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_arc() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "ijazah_".time()."_".$_FILES['arc']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/arc/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('arc');
        $data = array(
            'arc' => $gbr['file_name'],
            'terakhir_arc' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }

    function update_asuransi() {
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = "ijazah_".time()."_".$_FILES['asuransi']['name']; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/asuransi/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $idid = $this->input->post('biodata');
        $this->upload->do_upload('asuransi');
        $data = array(
            'asuransi' => $gbr['file_name'],
            'terakhir_asuransi' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('dokumen', $data);
    }
}
?>