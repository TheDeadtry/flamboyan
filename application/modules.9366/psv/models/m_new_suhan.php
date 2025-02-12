<?php
class m_new_suhan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


	function tampil_data_suhan() {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
		FROM datasuhan 
		LEFT JOIN datamajikan 
		ON datasuhan.id_majikan=datamajikan.id_majikan 
		LEFT JOIN dataagen 
		ON dataagen.id_agen=datasuhan.id_agen
		LEFT JOIN datagroup
		ON datagroup.id_group=datasuhan.id_group";

		$tampil = $this->db->query($sql);
		return $tampil->result();
	}

	function tampil_data_suhan2($where, $limit) {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
		FROM datasuhan 
		LEFT JOIN datamajikan 
		ON datasuhan.id_majikan=datamajikan.id_majikan 
		LEFT JOIN dataagen 
		ON dataagen.id_agen=datasuhan.id_agen
		LEFT JOIN datagroup
		ON datagroup.id_group=datasuhan.id_group $where ORDER BY id_suhan desc $limit
		";

		$tampil = $this->db->query($sql);
		return $tampil->result();
	}

	function suhan_count() {
		$sql = "SELECT count(*) as total
		FROM datasuhan 
		LEFT JOIN datamajikan 
		ON datasuhan.id_majikan=datamajikan.id_majikan 
		LEFT JOIN dataagen 
		ON dataagen.id_agen=datasuhan.id_agen
		LEFT JOIN datagroup
		ON datagroup.id_group=datasuhan.id_group";
		
		$tampil = $this->db->query($sql);
		return $tampil->row();
	}

	function suhan_count_where($where) {
		$sql = "SELECT count(*) as total
		FROM datasuhan 
		LEFT JOIN datamajikan 
		ON datasuhan.id_majikan=datamajikan.id_majikan 
		LEFT JOIN dataagen 
		ON dataagen.id_agen=datasuhan.id_agen
		LEFT JOIN datagroup
		ON datagroup.id_group=datasuhan.id_group $where";
		
		$tampil = $this->db->query($sql);
		return $tampil->row();
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

    function ambilmajikan($kodeagen){
		$sql = "SELECT * FROM datamajikan where kode_agen='".$kodeagen."' ORDER BY nama ASC";
        $query = $this->db->query($sql);
		return $query->result();
    }

 	function simpan_data_suhan() {
 		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
 		$nosu = $this->input->post('no');
 		$tgte = $this->input->post('tglterbit');
 		$tgex = $this->input->post('tglexp');
 		$tgtr = $this->input->post('tglterima');
 		$tgsi = $this->input->post('tglsimpan');
 		$tgba = $this->input->post('tglbawa');
 		$tgmi = $this->input->post('tglminta');

 		$quota = $this->input->post('quota');
		$this->load->library('upload');
		$nmfile = $nosu; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/doksuhan/'; //path folder
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
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quotasuhan' => $quota,
 			);
 		$this->db->insert('datasuhan',$data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();
				$data = array(
 			'id_group' => $group,
 			'id_agen' => $kode_agen,
 			'id_majikan' => $kodemajikan,
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quotasuhan' => $quota,
			'filesuhan' => $gbr['file_name'],
				);
 		$this->db->insert('datasuhan',$data);
			}

		}
 	}
	function tampil_data_suhandetail($id) {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
		FROM datasuhan 
		LEFT JOIN datamajikan 
		ON datasuhan.id_majikan=datamajikan.id_majikan 
		LEFT JOIN dataagen 
		ON dataagen.id_agen=datasuhan.id_agen
		LEFT JOIN datagroup
		ON datagroup.id_group=datasuhan.id_group
		WHERE datasuhan.id_suhan='$id'
		;";
        $query = $this->db->query($sql);
        return $query->result();
	}
	function updatesuhan_majikan(){
		$idnya = $this->input->post('idnya');
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
		$data = array(
			'id_group' => $group,
			'id_agen' => $kode_agen,
			'id_majikan' => $kodemajikan,
			);
		$this->db->where('id_suhan', $idnya);
		$this->db->update('datasuhan', $data);
	}

	function ambil_id_suhan($id) {
		$sql = "SELECT *
		FROM datasuhan
		INNER JOIN datamajikan
		ON datasuhan.id_majikan=datamajikan.id_majikan where id_suhan='$id';";
		$tampil = $this->db->query($sql);
		return $tampil->row();
	}

	function update_suhan() {
	 	$id = $this->input->post('id_suhan');
 		$nosu = $this->input->post('no');
 		$tgte = $this->input->post('tglterbit');
 		$tgex = $this->input->post('tglexp');
 		$tgtr = $this->input->post('tglterima');
 		$tgsi = $this->input->post('tglsimpan');
 		$tgba = $this->input->post('tglbawa');
 		$tgmi = $this->input->post('tglminta');
 		$quota = $this->input->post('quota');
		$this->load->library('upload');
		$namafilenys=$_FILES['gambarnya']['name'];
		$nmfile = $this->input->post('no').time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/doksuhan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx|xls|xlsx|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->upload->initialize($config);
		
		if(empty($_FILES['gambarnya']['name']))
        {
            $data = array(
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quotasuhan' => $quota,
 			);
 			$this->db->where('id_suhan', $id);
			$this->db->update('datasuhan', $data);

		} else {
			if ($this->upload->do_upload('gambarnya'))
            {
				$gbr = $this->upload->data();
				$data = array(
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quotasuhan' => $quota,
			'filesuhan' => $gbr['file_name'],
				);
 			$this->db->where('id_suhan', $id);
			$this->db->update('datasuhan', $data);
			}
		}
 	}

	function tampil_datahistory($id) {
		$sql = "SELECT * from suhanhistory where id_suhan='$id'";
        $query = $this->db->query($sql);
        return $query->result();
	}

	function ambidatasuhan($id){
		$kode_desa="";
        $result = Dbs::load("SELECT * FROM datasuhan where id_suhan='$id'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['no_suhan'];
			}
		return $kode_desa;
	}

	function ambidatasuhanmajikan($id){
		$kode_desa="";
        $result = Dbs::load("SELECT * FROM datasuhan LEFT JOIN datamajikan ON datamajikan.id_majikan = datasuhan.id_majikan where datasuhan.id_suhan='$id'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	}

 	function simpan_history_suhan($id){
		$data = array (
			'id_suhan'=> $this->input->post('id_suhanhistory'),
			'tgl_terima'=> $this->input->post('tgl_terima'),
			);

		$this->db->insert('suhanhistory',$data);
	}

	function update_history_suhan() {
		$id = $this->input->post('id_suhanhistory');
		$data = array(
			'tgl_terima'=> $this->input->post('tgl_terima'),
			);
		$this->db->where('id_suhanhistory', $id);
		$this->db->update('suhanhistory', $data);
	}

	function hapus_history_suhan($id) {
		$id_suhan=$this->input->post('id_suhanhistory');
		$this->db->where('id_suhanhistory',$id_suhan);
		$this->db->delete('suhanhistory');
	}

	function tampil_datatki($id) {
		$sql = "SELECT *,personal.id_biodata as idnyabio from majikan 
		LEFT JOIN personal ON personal.id_biodata = majikan.id_biodata 
        LEFT JOIN visa ON personal.id_biodata = visa.id_biodata
		where majikan.kode_suhan='$id'";
        $query = $this->db->query($sql);
        return $query->result();
	} 
	
	function hapus_suhan() {
		$id = $this->input->post('id_suhan');
		$namafile = $this->input->post('file');
		unlink("assets/doksuhan/".$namafile);
		$this->db->where('id_suhan', $id);
		$this->db->delete('datasuhan');
	}

}
?>