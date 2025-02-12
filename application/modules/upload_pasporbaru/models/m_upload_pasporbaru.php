<?php
class M_upload_pasporbaru extends CI_Model{
    function __construct(){
        parent::__construct();
    }


	function uploadWebPImage($fileInputName = "", $targetDir = "") {
        $targetFile = $targetDir . basename($_FILES[$fileInputName]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        // Periksa apakah file yang diunggah adalah file WebP
        if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFile)) {
            return basename($_FILES[$fileInputName]["name"]);
        } else {
            return "Maaf, terjadi kesalahan saat mengunggah file.";
        }
	}

	function simpan_data_pasporbaru() {
		$curr_timestamp = date("Y_m_d H:i:s");
		
		$this->load->library('upload');
		$nmfile =time().$this->input->post('idbiodata'); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/uploadpasporbaru/'; //path folder
		if(!file_exists($config['upload_path'])){
			mkdir($config['upload_path'],0777,true);
		}
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx|webp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->upload->initialize($config);
		
		if(empty($_FILES['filenya']['name']))
        {
			$data = array(
			'id_biodata'=>$this->input->post('idbiodata'),
			'namadok'=>$this->input->post('namadok'),
			'penting'=>$this->input->post('penting'),
			'cekdokumen'=>$this->input->post('cekdokumen'),
			'tglterima'=>$this->input->post('tglterima'),
			'keterangan'=>$this->input->post('keterangan'),
			'tampilkan'=>$this->input->post('tampilkan'),
		);
			$this->db->insert('upload_pasporbaru', $data);
		}else{
			$up = $this->uploadWebPImage('filenya', $config['upload_path']);
			$data = array(
				'id_biodata'=>$this->input->post('idbiodata'),
				'namadok'=>$this->input->post('namadok'),
				'penting'=>$this->input->post('penting'),
				'cekdokumen'=>$this->input->post('cekdokumen'),
				'tglterima'=>$this->input->post('tglterima'),
				'keterangan'=>$this->input->post('keterangan'),
				'file' => $up,
				'tampilkan'=>$this->input->post('tampilkan'),
			);
			$this->db->insert('upload_pasporbaru', $data);
		}
	}

function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_pasporbaru($idnya){
		$sql = "SELECT * FROM upload_pasporbaru WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_pasporbaru() {

		$curr_timestamp = date("Y_m_d H:i:s");
		
		$this->load->library('upload');
		$nmfile =time().$this->input->post('id_pasporbaru'); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/uploadpasporbaru/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx|webp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if(empty($_FILES['filenya']['name']))
        {
            	 $data = array(
					'namadok'=>$this->input->post('namadok'),
					'penting'=>$this->input->post('penting'),
					'cekdokumen'=>$this->input->post('cekdokumen'),
					'tglterima'=>$this->input->post('tglterima'),
					'keterangan'=>$this->input->post('keterangan'),
					'tampilkan'=>$this->input->post('tampilkan'),

				);
			$this->db->where('id_pasporbaru', $this->input->post('id_pasporbaru'));
			$this->db->update('upload_pasporbaru', $data);
		}else{
			$up = $this->uploadWebPImage('filenya', $config['upload_path']);
			$data = array(
				'namadok'=>$this->input->post('namadok'),
				'penting'=>$this->input->post('penting'),
				'cekdokumen'=>$this->input->post('cekdokumen'),
				'tglterima'=>$this->input->post('tglterima'),
				'keterangan'=>$this->input->post('keterangan'),
				'file' => $up,
				'tampilkan'=>$this->input->post('tampilkan'),
			);
			$this->db->where('id_pasporbaru', $this->input->post('id_pasporbaru'));
			$this->db->update('upload_pasporbaru', $data);
		}

	// $curr_timestamp = date("Y_m_d H:i:s");
		
	// 	$this->load->library('upload');
	// 	$nmfile =time().$this->input->post('idbiodata'); //nama file saya beri nama langsung dan diikuti fu
 //        $config['upload_path'] = './assets/uploadpasporbaru/'; //path folder
 //        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
 //        $config['max_size'] = '5120'; //maksimum besar file 2M
	// 	$config['file_name'] = $nmfile; //nama yang terupload nantinya



	// 	$this->upload->initialize($config);
		
	// 	if(empty($_FILES['filenya']['name']))
 //        {
 //            	 $data = array(
	// 				'namadok'=>$this->input->post('namadok'),
	// 				'penting'=>$this->input->post('penting'),
	// 				'cekdokumen'=>$this->input->post('cekdokumen'),
	// 				'tglterima'=>$this->input->post('tglterima'),
	// 				'keterangan'=>$this->input->post('keterangan'),
	// 			);
	// 		$this->db->where('id_pasporbaru', $this->input->post('idbiodata'));
	// 	$this->db->update('upload_pasporbaru', $data);

	// 	}else{
	// 		if ($this->upload->do_upload('filenya'))
 //            {
	// 			$upload_data = $this->upload->data();
	// 			$data = array(
	// 				'namadok'=>$this->input->post('namadok'),
	// 				'penting'=>$this->input->post('penting'),
	// 				'cekdokumen'=>$this->input->post('cekdokumen'),
	// 				'tglterima'=>$this->input->post('tglterima'),
	// 				'keterangan'=>$this->input->post('keterangan'),
	// 				'file' => $upload_data['file_name'],

					
	// 			);
	// 		$this->db->where('id_pasporbaru',$this->input->post('idbiodata'));
	// 	$this->db->update('upload_pasporbaru', $data);
			
	// 		}
	// 	}


		
	}

	function hapus_data_pasporbaru() {
		$id = $this->input->post('id_pasporbaru');
		$this->db->where('id_pasporbaru', $id);
		$this->db->delete('upload_pasporbaru');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataagama', array('id_agama' => $id))->row();
	}
 
}
?>