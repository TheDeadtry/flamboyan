<?php
class M_Dokumen extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_Dokumen($nama_Dokumen, $nama_Dokumen_taiwan){

		$data = array (
			'isi'=>$nama_Dokumen, 
			'mandarin'=>$nama_Dokumen_taiwan,
			);

		$this->db->insert('dataDokumen',$data);
	}



	function update_data_Dokumen($id) {
		$nama = $this->input->post('nama_Dokumen');
		$taiw = $this->input->post('nama_Dokumen_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_Dokumen', $id);
		$this->db->update('dataDokumen', $data);
	}

	function hapus_data_Dokumen($id) {
		$this->db->where('id_Dokumen', $id);
		$this->db->delete('dataDokumen');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataDokumen', array('id_Dokumen' => $id))->row();
	}

		function tampil_data_dokumen($idnya){
		$sql = "SELECT * FROM dokumen WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

function ubahktp() {

		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/ktp/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		
		$this->upload->initialize($config);
		
			if ($this->upload->do_upload('ktp'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'ktp' => $gbr['file_name'],
					
				);
			//$this->db->insert('personal', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('dokumen', $data);
			}
	}

	function ubahkk() {

		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/kk/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		
		$this->upload->initialize($config);
		
			if ($this->upload->do_upload('kk'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'kk' => $gbr['file_name'],
					
				);
			//$this->db->insert('personal', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('dokumen', $data);
			}
	}

	function ubahakte() {

		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/akte/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		
		$this->upload->initialize($config);
		
			if ($this->upload->do_upload('akte'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'akte' => $gbr['file_name'],
					
				);
			//$this->db->insert('personal', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('dokumen', $data);
			}
	}

	function ubahijazah() {

		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/ijazah/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		
		$this->upload->initialize($config);
		
			if ($this->upload->do_upload('ijazah'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'ijazah' => $gbr['file_name'],
					
				);
			//$this->db->insert('personal', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('dokumen', $data);
			}
	}

	function ubahpaspor() {

		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/paspor/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		
		$this->upload->initialize($config);
		
			if ($this->upload->do_upload('paspor'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'paspor' => $gbr['file_name'],
					
				);
			//$this->db->insert('personal', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('dokumen', $data);
			}
	}

	function ubaharc() {

		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/arc/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		
		$this->upload->initialize($config);
		
			if ($this->upload->do_upload('arc'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'arc' => $gbr['file_name'],
					
				);
			//$this->db->insert('personal', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('dokumen', $data);
			}
	}
}
?>