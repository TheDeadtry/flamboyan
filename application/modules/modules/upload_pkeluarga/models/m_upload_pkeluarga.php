<?php
class M_upload_pkeluarga extends CI_Model{
    function __construct(){
        parent::__construct();
    }


	function simpan_data_pkeluarga() {
		$curr_timestamp = date("Y_m_d H:i:s");
		
		$this->load->library('upload');
		$nmfile =time().$this->input->post('idbiodata'); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/upload_pkeluarga/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
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
				);
			$this->db->insert('upload_pkeluarga', $data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'id_biodata'=>$this->input->post('idbiodata'),
					'namadok'=>$this->input->post('namadok'),
					'penting'=>$this->input->post('penting'),
					'cekdokumen'=>$this->input->post('cekdokumen'),
					'tglterima'=>$this->input->post('tglterima'),
					'keterangan'=>$this->input->post('keterangan'),
					'file' => $gbr['file_name'],

					
				);
			$this->db->insert('upload_pkeluarga', $data);
			
			}
		}
	}

function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_pkeluarga(){
		$sql = "SELECT * FROM upload_pkeluarga";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_pkeluarga() {
		$id_pkeluarga =$this->input->post('id_pkeluarga');
		
		$this->load->library('upload');
		$nmfile =$this->input->post('namafile'); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/upload_pkeluarga/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
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
				);
			$this->db->where('id_pkeluarga', $id_pkeluarga);
		$this->db->update('upload_pkeluarga', $data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'namadok'=>$this->input->post('namadok'),
					'penting'=>$this->input->post('penting'),
					'cekdokumen'=>$this->input->post('cekdokumen'),
					'tglterima'=>$this->input->post('tglterima'),
					'keterangan'=>$this->input->post('keterangan'),
					'file' => $gbr['file_name'],

					
				);
			$this->db->where('id_pkeluarga', $id_pkeluarga);
		$this->db->update('upload_pkeluarga', $data);
			
			}
		}


		
	}

	function hapus_data_pkeluarga() {
		$id = $this->input->post('id_pkeluarga');
		$this->db->where('id_pkeluarga', $id);
		$this->db->delete('upload_pkeluarga');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataagama', array('id_agama' => $id))->row();
	}
 
}
?>