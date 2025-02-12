<?php
class M_detaildisnaker extends CI_Model{
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
	 function tampil_data_jabatan(){
		$sql = "SELECT * FROM datajabatan";
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
		$sql = "SELECT isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_provinsi(){
		$sql = "SELECT isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function hitung_data_disnaker($idnya){
		$sql = "SELECT count(*) as total FROM disnaker WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

					function tampil_data_family($idnya){
		$sql = "SELECT * FROM family WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_disnaker($idnya){
		$sql = "SELECT * FROM disnaker WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahdisnaker() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'nodisnaker' => $this->input->post('nodisnaker'),
					'nama' => $this->input->post('nama'),
					'tempatlahir' => $this->input->post('tempatlahir'),
					'tanggallahir' => $this->input->post('tanggallahir'),
					'noktp' => $this->input->post('noktp'),
					'jeniskelamin' => $this->input->post('jenis_kelamin'),
					'agama' => $this->input->post('agama'),
					'status' => $this->input->post('status'),
					'pendidikan' => $this->input->post('pendidikan'),
					'alamat' => $this->input->post('alamat'),
					'namaayah' => $this->input->post('namaayah'),
					'namaibu' => $this->input->post('namaibu'),
					'namaahli' => $this->input->post('namaahli'),
					'namakontak' => $this->input->post('namakontak'),
					'alamatkontak' => $this->input->post('alamatkontak'),
					'telpkontak' => $this->input->post('teleponkontak'),
					'hubkontak' => $this->input->post('hubugankontak'),
					'tglonline' => $this->input->post('perkiraan'),
                     'perkiraan' => $this->input->post('perkiraana'),
					'negara' => $this->input->post('negara'),
					'jabatan' => $this->input->post('jabatan'),
				);
			$this->db->insert('disnaker', $data);
	} 
	function ubahdisnaker() {
 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'nodisnaker' => $this->input->post('nodisnaker'),
					'nama' => $this->input->post('nama'),
					'tempatlahir' => $this->input->post('tempatlahir'),
					'tanggallahir' => $this->input->post('tanggallahir'),
					'noktp' => $this->input->post('noktp'),
					'jeniskelamin' => $this->input->post('jenis_kelamin'),
					'agama' => $this->input->post('agama'),
					'status' => $this->input->post('status'),
					'pendidikan' => $this->input->post('pendidikan'),
					'alamat' => $this->input->post('alamat'),
					'namaayah' => $this->input->post('namaayah'),
					'namaibu' => $this->input->post('namaibu'),
					'namaahli' => $this->input->post('namaahli'),
					'namakontak' => $this->input->post('namakontak'),
					'alamatkontak' => $this->input->post('alamatkontak'),
					'telpkontak' => $this->input->post('teleponkontak'),
					'hubkontak' => $this->input->post('hubugankontak'),
					'tglonline' => $this->input->post('perkiraan'),
                    'perkiraan' => $this->input->post('perkiraana'),
					'negara' => $this->input->post('negara'),
					'jabatan' => $this->input->post('jabatan'),
				);
			//$this->db->insert('disnakerpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('disnaker', $data);
	} 


	    function update_ktp() {
	    	        $this->load->library('upload');

	    	
        $idid = $this->input->post('biodata');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = $idid."_".time()."_".$_FILES['ktp']['name']; //nama file saya beri nama langsung dan diikuti fu
        $nmfile= str_replace(" ","_",$nmfile);
        $config['upload_path'] = './assets/scanktp/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
       $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $this->upload->do_upload('ktp');
        $data = array(
            'ktp' => $gbr['file_name'],
            'terakhir_ktp' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('disnaker', $data);
    }


	    function update_kuasa() {
	    	        $this->load->library('upload');

	    	
        $idid = $this->input->post('biodata');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = $idid."_".time()."_".$_FILES['kuasa']['name']; //nama file saya beri nama langsung dan diikuti fu
        $nmfile= str_replace(" ","_",$nmfile);
        $config['upload_path'] = './assets/scankuasa/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $this->upload->do_upload('kuasa');
        $data = array(
            'kuasa' => $gbr['file_name'],
            'terakhir_kuasa' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('disnaker', $data);
    }

    	    function update_nyata() {
	    	        $this->load->library('upload');

	    	
        $idid = $this->input->post('biodata');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = $idid."_".time()."_".$_FILES['nyata']['name']; //nama file saya beri nama langsung dan diikuti fu
        $nmfile= str_replace(" ","_",$nmfile);
        $config['upload_path'] = './assets/scannyata/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $this->upload->do_upload('nyata');
        $data = array(
            'nyata' => $gbr['file_name'],
            'terakhir_nyata' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('disnaker', $data);
    }

    	    function update_legal() {
	    	        $this->load->library('upload');

	    	
        $idid = $this->input->post('biodata');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = $idid."_".time()."_".$_FILES['legal']['name']; //nama file saya beri nama langsung dan diikuti fu
        $nmfile= str_replace(" ","_",$nmfile);
        $config['upload_path'] = './assets/scanlegal/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $this->upload->do_upload('legal');
        $data = array(
            'legal' => $gbr['file_name'],
            'terakhir_legal' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('disnaker', $data);
    }


}
?>