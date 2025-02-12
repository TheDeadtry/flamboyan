<?php
class m_new_visapermit extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	function tampil_data_visapermit($where, $limit) {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
		FROM datavisapermit 
		LEFT JOIN datamajikan 
		ON datavisapermit.id_majikan=datamajikan.id_majikan 
		LEFT JOIN dataagen 
		ON datavisapermit.id_agen=dataagen.id_agen
		LEFT JOIN datagroup
		ON datavisapermit.id_group=datagroup.id_group
		LEFT JOIN datasuhan
		ON datavisapermit.id_suhan=datasuhan.id_suhan $where order by id_visapermit desc $limit";
		$tampil = $this->db->query($sql);
		return $tampil->result();
	}

	function vp_count_where($where) {
		$sql = "SELECT count(*) as total
		FROM datavisapermit 
		LEFT JOIN datamajikan 
		ON datavisapermit.id_majikan=datamajikan.id_majikan 
		LEFT JOIN dataagen 
		ON dataagen.id_agen=datavisapermit.id_agen
		LEFT JOIN datagroup
		ON datagroup.id_group=datavisapermit.id_group
		LEFT JOIN datasuhan
		ON datasuhan.id_suhan=datavisapermit.id_suhan $where";
		$tampil = $this->db->query($sql);
		return $tampil->row();
	}

	function vp_count() {
		$sql = "SELECT count(*) as total
		FROM datavisapermit 
		LEFT JOIN datamajikan 
		ON datavisapermit.id_majikan=datamajikan.id_majikan 
		LEFT JOIN dataagen 
		ON dataagen.id_agen=datavisapermit.id_agen
		LEFT JOIN datagroup
		ON datagroup.id_group=datavisapermit.id_group
		LEFT JOIN datasuhan
		ON datasuhan.id_suhan=datavisapermit.id_suhan";
		$tampil = $this->db->query($sql);
		return $tampil->row();
	}

	function ambil_id_visapermit($id) {
		return $this->db->get_where('datavisapermit', array('id_visapermit' => $id))->row();
	}

	function tampil_data_suhandetail($id) {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
		FROM datavisapermit 
		LEFT JOIN datamajikan 
		ON datavisapermit.id_majikan=datamajikan.id_majikan 
		LEFT JOIN dataagen 
		ON dataagen.id_agen=datavisapermit.id_agen
		LEFT JOIN datagroup
		ON datagroup.id_group=datavisapermit.id_group
		LEFT JOIN datasuhan
		ON datasuhan.id_suhan=datavisapermit.id_suhan
		WHERE datavisapermit.id_visapermit='$id'
		;";
        $query = $this->db->query($sql);
        return $query->row();
	}

    function getposisiList_group(){
        $result = array();
        $this->db->select('*');
        $this->db->from('datagroup');
        $this->db->order_by('id_group','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= 'pilih Grup';
            $result[$row->id_group]= $row->nama;
        }

        return $result;
    }

    function getagenlist_group($idgrup){
        $result = array();
        $this->db->select('*');
        $this->db->from('dataagen');
        $this->db->where('kode_group',$idgrup);
        $this->db->order_by('kode_group','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Nama Agen-';
            $result[$row->id_agen]= $row->kode_agen.' : '. $row->nama;
        }

        return $result;
    }

   	function getmajikanlist_agen($kodeagen){
        $result = array();
        $this->db->select('*');
        $this->db->from('datamajikan');
        $this->db->where('kode_agen',$kodeagen);
        $this->db->order_by('nama','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Nama Majikan-';
            $result[$row->id_majikan]= $row->nama;
        }
        return $result;
    }

   	function ambilsuhannya($kodeagen){
		$sql = "SELECT * FROM datasuhan where id_majikan='".$kodeagen."'";
        $query = $this->db->query($sql);

        return $query->result();
    }

	function updatevisapermit_majikan(){
		$idnya = $this->input->post('idnya');
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
		$nosuhan = $this->input->post('nosuhan');
		$data = array(
			'id_group' => $group,
			'id_agen' => $kode_agen,
			'id_majikan' => $kodemajikan,
			'id_suhan' => $nosuhan,
			);
		$this->db->where('id_visapermit', $idnya);
		$this->db->update('datavisapermit', $data);
	}

	function tampil_datahistoryvisapermit($id) {
		$sql = "SELECT * from visapermithistory where id_visapermit='$id'";
        $query = $this->db->query($sql);
        return $query->result();
	} 

 	function tampil_datatkivisapermit($id) {
		$sql = "SELECT *,personal.id_biodata as idnyabio from majikan 
		LEFT JOIN personal ON personal.id_biodata = majikan.id_biodata 
        LEFT JOIN visa ON personal.id_biodata = visa.id_biodata
		where majikan.kode_visapermit='$id'";
        $query = $this->db->query($sql);
        return $query->result();
	} 

	function update_visapermit() {
		$id = $this->input->post('id_visapermit');

		$this->load->library('upload');
		$namafilenys=$_FILES['gambarnya']['name'];
		$nmfile = $this->input->post('no').time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/dokvisapermit/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx|xls|xlsx|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->upload->initialize($config);

		if(empty($_FILES['gambarnya']['name']))
        {
            $data = array(
				'no_visapermit' 	=> $this->input->post('no'),
				'tglterbitvs' 		=> $this->input->post('tglterbit'),
				'tglexpvs' 			=> $this->input->post('tglexp'),
				'tglexpext' 		=> $this->input->post('tglexpext'),
				'tglterimavs' 		=> $this->input->post('tglterima'),
				'tglsimpanvs' 		=> $this->input->post('tglsimpan'),
				'tglbawavs'			=> $this->input->post('tglbawa'),
				'tglmintavs'		=> $this->input->post('tglminta'),
				'quotavs' 			=> $this->input->post('quota'),
 			);
			$this->db->where('id_visapermit', $id);
			$this->db->update('datavisapermit', $data);

		} else {
			if ($this->upload->do_upload('gambarnya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'no_visapermit' 	=> $this->input->post('no'),
					'tglterbitvs' 		=> $this->input->post('tglterbit'),
					'tglexpvs' 			=> $this->input->post('tglexp'),
					'tglexpext' 		=> $this->input->post('tglexpext'),
					'tglterimavs' 		=> $this->input->post('tglterima'),
					'tglsimpanvs' 		=> $this->input->post('tglsimpan'),
					'tglbawavs'			=> $this->input->post('tglbawa'),
					'tglmintavs'		=> $this->input->post('tglminta'),
					'quotavs' 			=> $this->input->post('quota'),
					'filevisapermit' 	=> $gbr['file_name'],
				);
				$this->db->where('id_visapermit', $id);
				$this->db->update('datavisapermit', $data);
			}
		}
	}
	function hapus_visapermit() {
		$id = $this->input->post('id_visapermit');
		$namafile = $this->input->post('file');
		unlink("assets/dokvisapermit/".$namafile);
		$this->db->where('id_visapermit', $id);
		$this->db->delete('datavisapermit');
	}

 	function simpan_history_visapermit($id){
		$data = array (
			'id_visapermit'=> $this->input->post('id_visapermithistory'),
			'tgl_terima'=> $this->input->post('tgl_terima'),
			'tgl_kirim'=> $this->input->post('tgl_kirim'),
			'ket'=> $this->input->post('ket'),
			);

		$this->db->insert('visapermithistory',$data);
	}

	function update_history_visapermit() {
		$id = $this->input->post('id_visapermithistory');
		$data = array(
			'tgl_terima'=> $this->input->post('tgl_terima'),
			'tgl_kirim'=> $this->input->post('tgl_kirim'),
			'ket'=> $this->input->post('ket'),
			);
		$this->db->where('id_visapermithistory', $id);
		$this->db->update('visapermithistory', $data);
	}

	function hapus_history_visapermit($id) {
		$id_visapermit=$this->input->post('id_visapermithistory');
		$this->db->where('id_visapermithistory',$id_visapermit);
		$this->db->delete('visapermithistory');
	}
	
 	function simpan_data_visapermit() {
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
		$nosuhan = $this->input->post('nosuhan');
		
 		$nosu = $this->input->post('no');
 		$tgte = $this->input->post('tglterbit');
 		$tgex = $this->input->post('tglexp');
 		$tgexe = $this->input->post('tglexpext');
 		$tgtr = $this->input->post('tglterima');
 		$tgsi = $this->input->post('tglsimpan');
 		$tgba = $this->input->post('tglbawa');
 		$tgmi = $this->input->post('tglminta');
 		$quota = $this->input->post('quota');

		$this->load->library('upload');

		$nmfile = $nosu; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/dokvisapermit/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx|xls|xlsx|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if(empty($_FILES['filenya']['name']))
        {
			$data = array(
 				'id_group' => $group,
	 			'id_agen' => $kode_agen,
	 			'id_majikan' => $kodemajikan,
	 			'id_suhan' => $nosuhan,
	 			'no_visapermit' => $nosu,
	 			'tglterbitvs' => $tgte,
	 			'tglexpvs' => $tgex,
				 'tglexpext' => $tgexe,
	 			'tglterimavs' => $tgtr,
	 			'tglsimpanvs' => $tgsi,
	 			'tglbawavs' => $tgba,
	 			'tglmintavs' => $tgmi,
	 			'quotavs' => $quota,
 			);
 		$this->db->insert('datavisapermit',$data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();

				$data = array(
		 			'id_group' => $group,
		 			'id_agen' => $kode_agen,
		 			'id_majikan' => $kodemajikan,
		 			'id_suhan' => $nosuhan,
		 			'no_visapermit' => $nosu,
		 			'tglterbitvs' => $tgte,
		 			'tglexpvs' => $tgex,
					 'tglexpext' => $tgexe,
		 			'tglterimavs' => $tgtr,
		 			'tglsimpanvs' => $tgsi,
		 			'tglbawavs' => $tgba,
		 			'tglmintavs' => $tgmi,
		 			'quotavs' => $quota,
		 			'filevisapermit' => $gbr['file_name'],
	 			);
 				$this->db->insert('datavisapermit',$data);
			}

		}
 	}
}
?>