<?php
class m_majikans extends CI_Model{
    function __construct(){
        parent::__construct();
    }


	function tampil_data_majikan() {
		$sql = "SELECT * FROM datamajikan";
        $query = $this->db->query($sql);
        return $query->result();
	} 

	function tampil_data_suhan() {
		$sql = "SELECT *
FROM datasuhan
INNER JOIN datamajikan
ON datasuhan.id_majikan=datamajikan.id_majikan;";
		$tampil = $this->db->query($sql);
		return $tampil->result();
	}

	function tampil_data_visapermit() {
		$sql = "SELECT *
FROM datavisapermit
INNER JOIN datamajikan
ON datavisapermit.id_majikan=datamajikan.id_majikan;";
		$tampil = $this->db->query($sql);
		return $tampil->result();
	}
	function tampil_data_agen(){
		$sql = "SELECT * FROM dataagen";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 // 	function simpan_data_majikan($kode, $nama, $hp, $email,$alamat,$status){
	// 	$data = array(
	// 		'kode_majikan'=>$kode, 
	// 		'nama'=>$nama,
	// 		'hp'=>$hp, 
	// 		'email'=>$email, 
	// 		'alamat'=>$alamat, 
	// 		'status'=>$status, 
	// 		'kode_agen' => $this->input->post('agen'),

	// 		);
	// 	$this->db->insert('datamajikan',$data);
	// }



	function simpan_data_majikan($kode, $nama, $hp, $email,$alamat,$status) {

		
		$this->load->library('upload');
		$nmfile = $kode; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/dokmajikan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if(empty($_FILES['filenya']['name']))
        {
            	 $data = array(
            	 	'kode_majikan'=>$kode, 
					'nama'=>$nama,
					'hp'=>$hp, 
					'email'=>$email, 
					'alamat'=>$alamat, 
					'status'=>$status, 
					'kode_agen' => $this->input->post('agen'),
				);
			$this->db->insert('datamajikan', $data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'kode_majikan'=>$kode, 
					'nama'=>$nama,
					'hp'=>$hp, 
					'email'=>$email, 
					'alamat'=>$alamat, 
					'status'=>$status, 
					'kode_agen' => $this->input->post('agen'),
					'file' => $gbr['file_name'],

					
				);
			$this->db->insert('datamajikan', $data);
			
			}



		}
	}

	function getposisiList_majikan(){

	
        $result = array();
        $this->db->select('*');
        $this->db->from('datamajikan');
        $this->db->order_by('nama','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Nama Majikan-';
            $result[$row->id_majikan]= $row->nama;
        }

        return $result;
    }
    function getsuhanList(){
        $id_majikan = $this->input->post('id_majikan');

	$sql = "SELECT * FROM datasuhan where id_majikan='".$id_majikan."'";
                $query = $this->db->query($sql);

            return $query->result();

    }
    function getagenList(){
        $kode_group = $this->input->post('kode_group');

	$sql = "SELECT * FROM dataagen where kode_group='".$kode_group."'";
                $query = $this->db->query($sql);

            return $query->result();

    }
    function getagenList2(){
        $kode_group = $this->input->post('kode_group2');

	$sql = "SELECT * FROM dataagen where kode_group='".$kode_group."'";
                $query = $this->db->query($sql);

            return $query->result();

    }

	function getposisiList_suhan(){

	
        $result = array();
        $this->db->select('*');
        $this->db->from('datasuhan');
        $this->db->order_by('no_suhan','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih No Suhan-';
            $result[$row->id_suhan]= $row->no_suhan;
        }

        return $result;
    }
    	function getposisiList_group(){

	
        $result = array();
        $this->db->select('*');
        $this->db->from('datagroup');
        $this->db->order_by('id_group','DESC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[1]= 'pilih Grup';
            $result[$row->kode_group]= $row->nama;
        }

        return $result;
    }

 	function simpan_data_suhan() {
 		$maji = $this->input->post('majikan');
 		$nosu = $this->input->post('no');
 		$tgte = date("Y.m.d", strtotime($this->input->post('tglterbit')));
 		$tgex = date("Y.m.d", strtotime($this->input->post('tglexp')));
 		$tgtr = date("Y.m.d", strtotime($this->input->post('tglterima')));
 		$tgsi = date("Y.m.d", strtotime($this->input->post('tglsimpan')));
 		$tgba = date("Y.m.d", strtotime($this->input->post('tglbawa')));
 		$tgmi = date("Y.m.d", strtotime($this->input->post('tglminta')));
 		$quota = $this->input->post('quota');
 		$data = array(
 			'id_suhan' => '',
 			'id_majikan' => $maji,
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quota' => $quota,
 			);
 		$this->db->insert('datasuhan',$data);
 	}

 	function simpan_data_visapermit() {
 		$maji = $this->input->post('majikan');
 		$nosuhan = $this->input->post('nosuhan');
 		$nosu = $this->input->post('no');
 		$tgte = date("Y.m.d", strtotime($this->input->post('tglterbit')));
 		$tgex = date("Y.m.d", strtotime($this->input->post('tglexp')));
 		$tgtr = date("Y.m.d", strtotime($this->input->post('tglterima')));
 		$tgsi = date("Y.m.d", strtotime($this->input->post('tglsimpan')));
 		$tgba = date("Y.m.d", strtotime($this->input->post('tglbawa')));
 		$tgmi = date("Y.m.d", strtotime($this->input->post('tglminta')));
 		$quota = $this->input->post('quota');
 		$data = array(
 			'id_visapermit' => '',
 			'id_majikan' => $maji,
 			'no_suhan' => $nosuhan,
 			'no_visapermit' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quota' => $quota,
 			);
 		$this->db->insert('datavisapermit',$data);
 	}

 	function update_data_suhan($id) {
		$maji = $this->input->post('majikan');
 		$nosu = $this->input->post('no');
 		$tgte = date("Y.m.d", strtotime($this->input->post('tglterbit')));
 		$tgex = date("Y.m.d", strtotime($this->input->post('tglexp')));
 		$tgtr = date("Y.m.d", strtotime($this->input->post('tglterima')));
 		$tgsi = date("Y.m.d", strtotime($this->input->post('tglsimpan')));
 		$tgba = date("Y.m.d", strtotime($this->input->post('tglbawa')));
 		$tgmi = date("Y.m.d", strtotime($this->input->post('tglminta')));
 		$quota = $this->input->post('quota');
		$data = array(
			'id_majikan' => $maji,
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quota' => $quota,
			);
		$this->db->where('id_suhan', $id);
		$this->db->update('datasuhan', $data);
	}

	function update_data_visapermit($id) {
		$maji = $this->input->post('majikan');
		$nosuhan = $this->input->post('nosuhan');
 		$nosu = $this->input->post('no');
 		$tgte = date("Y.m.d", strtotime($this->input->post('tglterbit')));
 		$tgex = date("Y.m.d", strtotime($this->input->post('tglexp')));
 		$tgtr = date("Y.m.d", strtotime($this->input->post('tglterima')));
 		$tgsi = date("Y.m.d", strtotime($this->input->post('tglsimpan')));
 		$tgba = date("Y.m.d", strtotime($this->input->post('tglbawa')));
 		$tgmi = date("Y.m.d", strtotime($this->input->post('tglminta')));
 		$quota = $this->input->post('quota');
		$data = array(
			'id_majikan' => $maji,
			'no_suhan' => $nosuhan,
 			'no_visapermit' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quota' => $quota,
			);
		$this->db->where('id_visapermit', $id);
		$this->db->update('datavisapermit', $data);
	}

	function hapus_data_suhan($id) {
		$this->db->where('id_suhan', $id);
		$this->db->delete('datasuhan');
	}

	function hapus_data_visapermit($id) {
		$this->db->where('id_visapermit', $id);
		$this->db->delete('datavisapermit');
	}

	function ambil_id_majikan($id) {
		return $this->db->get_where('datamajikan', array('id_majikan' => $id))->row();
	}

	function ambil_id_suhan($id) {
		return $this->db->get_where('datasuhan', array('id_suhan' => $id))->row();
	}

	function ambil_id_visapermit($id) {
		return $this->db->get_where('datavisapermit', array('id_visapermit' => $id))->row();
	}


		function update_majikan() {
		$id = $this->input->post('id_majikan');
		$data = array(
				'kode_majikan' => $this->input->post('kode'),
				'nama' => $this->input->post('nama'),
				'hp' => $this->input->post('hp'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'status' => $this->input->post('status'),
				'kode_group'=>$this->input->post('group'),
				'kode_agen'=>$this->input->post('kodeagen'),


			);
		$this->db->where('id_majikan', $id);
		$this->db->update('datamajikan', $data);
	}

		function hapus_majikan() {
		$id = $this->input->post('id_majikan');
		$this->db->where('id_majikan', $id);
		$this->db->delete('datamajikan');
	}

function update_suhan() {
		$id = $this->input->post('id_suhan');
		$data = array(
				'id_majikan' => $this->input->post('majikan'),
				'no_suhan' => $this->input->post('no'),
				'tglterbit' => $this->input->post('tglterbit'),
				'tglexp' => $this->input->post('tglexp'),
				'tglterima' => $this->input->post('tglterima'),
				'tglsimpan' => $this->input->post('tglsimpan'),
				'tglbawa'=>$this->input->post('tglbawa'),
				'tglminta'=>$this->input->post('tglminta'),
			);
		$this->db->where('id_suhan', $id);
		$this->db->update('datasuhan', $data);
	}

		function hapus_suhan() {
		$id = $this->input->post('id_suhan');
		$this->db->where('id_suhan', $id);
		$this->db->delete('datasuhan');
	}

	function update_visapermit() {
		$id = $this->input->post('id_visapermit');
		$data = array(
				'id_majikan' => $this->input->post('majikan'),
				'no_visapermit' => $this->input->post('no'),
				'tglterbit' => $this->input->post('tglterbit'),
				'tglexp' => $this->input->post('tglexp'),
				'tglterima' => $this->input->post('tglterima'),
				'tglsimpan' => $this->input->post('tglsimpan'),
				'tglbawa'=>$this->input->post('tglbawa'),
				'tglminta'=>$this->input->post('tglminta'),
			);
		$this->db->where('id_visapermit', $id);
		$this->db->update('datavisapermit', $data);
	}

		function hapus_visapermit() {
		$id = $this->input->post('id_visapermit');
		$this->db->where('id_visapermit', $id);
		$this->db->delete('datavisapermit');
	}


}
?>