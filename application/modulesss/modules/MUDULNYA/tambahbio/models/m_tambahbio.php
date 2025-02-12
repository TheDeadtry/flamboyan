<?php
class M_tambahbio extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

 function tampil_data_sektor(){
		$sql = "SELECT kode_jenis,isi,isi_taiwan,no_urut,jeniskelamin FROM datasektor";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 function tampil_data_negara(){
		$sql = "SELECT kode_negara,isi,mandarin FROM datanegara";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tampil_data_calling(){
		$sql = "SELECT kode_calling,isi FROM datacalling";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	
	function tampil_data_skillnya(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
	function tampil_data_agama(){
		$sql = "SELECT id_agama,isi,mandarin FROM dataagama";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_pendidikan(){
		$sql = "SELECT id_pedidikan,isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_provinsi(){
		$sql = "SELECT id_provinsi,isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	}

		function getnourut($idnya){

		$sql = "SELECT no_urut FROM datasektor WHERE kode_jenis='".$idnya."'";
                $query = $this->db->query($sql);
            return $query->row('no_urut');
	}


		function updateidsektor($idnya,$nourut){

		$sql = "UPDATE datasektor SET no_urut='".$nourut."' WHERE kode_jenis='".$idnya."'";

		$this->db->query($sql);

	}

	function tambahpersonal() {

		
		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		
		$this->upload->initialize($config);
		
		if(empty($_FILES['gambarnya']['name']))
        {
            	 $data = array(
            	 	'id_biodata' => $this->input->post('idp'),
					'nama' => $this->input->post('namap'),
					'jeniskelamin' => $this->input->post('jkp'),
					'tanggaldaftar' => $this->input->post('daftarp'),
					'tinggi' => $this->input->post('tinggip')."Cm 公分" ,
					'berat' => $this->input->post('beratp')."Kg 公斤",
					'hp' => $this->input->post('hpp'),
					'hpkel' => $this->input->post('hpkelp'),
					'warganegara' => $this->input->post('wargap'),
					'tempatlahir' => $this->input->post('tempatp'),
					'tgllahir' => $this->input->post('tgllahirp'),
					'agama' => $this->input->post('agamap'),
					'status' => $this->input->post('statusp'),
					'tglmenikah' => $this->input->post('tglnikahp'),
					'pendidikan' => $this->input->post('pendidikanp'),
					'alamat' => $this->input->post('alamatp'),
					'provinsi' => $this->input->post('provinsip'),
					'mandarin' => $this->input->post('mandarinp'),
					'inggris' => $this->input->post('inggrisp'),
					'foto' => $this->input->post('gambarnya')."profile.jpg",
					
				);
			$this->db->insert('personal', $data);

		}else{
			if ($this->upload->do_upload('gambarnya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'id_biodata' => $this->input->post('idp'),
					'nama' => $this->input->post('namap'),
					'jeniskelamin' => $this->input->post('jkp'),
					'tanggaldaftar' => $this->input->post('daftarp'),
					'tinggi' => $this->input->post('tinggip'),
					'berat' => $this->input->post('beratp'),
					'hp' => $this->input->post('hpp'),
					'hpkel' => $this->input->post('hpkelp'),
					'warganegara' => $this->input->post('wargap'),
					'tempatlahir' => $this->input->post('tempatp'),
					'tgllahir' => $this->input->post('tgllahirp'),
					'agama' => $this->input->post('agamap'),
					'status' => $this->input->post('statusp'),
					'tglmenikah' => $this->input->post('tglnikahp'),
					'pendidikan' => $this->input->post('pendidikanp'),
					'alamat' => $this->input->post('alamatp'),
					'provinsi' => $this->input->post('provinsip'),
					'mandarin' => $this->input->post('mandarinp'),
					'inggris' => $this->input->post('inggrisp'),
					'foto' => $gbr['file_name'],
					
				);
			$this->db->insert('personal', $data);
			
			}



		}
	} 

}
?>