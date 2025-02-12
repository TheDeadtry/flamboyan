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

    function tampil_data_hubungan(){
        $sql = "SELECT * FROM datahubungan";
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
            function tampil_data_agen(){
        $sql = "SELECT * FROM dataagen";
                $query = $this->db->query($sql);

            return $query->result();
    } 

                function tampil_data_gaji(){
        $sql = "SELECT * FROM datanamagaji";
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
		$sql = "SELECT disnaker.*, datanamadisnaker.namadisnaker as namadisnakernama FROM disnaker LEFT JOIN datanamadisnaker ON disnaker.namadisnaker_id=datanamadisnaker.id_namadisnaker WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
    function tambahdisnaker() {
        $ids = $this->input->post('idbiodata');
        $ambil_id_bio = $this->db->query("SELECT count(*) as total FROM disnaker WHERE id_biodata='$ids'")->row();

        if ($ambil_id_bio->total == 0) {
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
               $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';
            
             $data = array(  
                'tglbuat' => $this->input->post('tanggalbuatnyaya'),
                'tglterima' => $this->input->post('tglterima'),
                'id_biodata' => $this->input->post('idbiodata'),
                'nodisnaker' => $this->input->post('nodisnaker'),
                'nama' => $this->input->post('nama'),
                'tempatlahir' => $this->input->post('tempatlahir'),
                'tanggallahir' => $this->input->post('tanggallahir'),
                'noktp' => $this->input->post('noktp'),
                'tglnoktp' => $this->input->post('tglnoktp'),
                'tempatnoktp' => $this->input->post('tempatnoktp'),
                'jeniskelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'status' => $this->input->post('status'),
                //'email' => $this->input->post('d_email'),
                'pendidikan' => $this->input->post('pendidikan'),
                'alamat' => $this->input->post('alamat'),
                'propinsi' => $this->input->post('propinsi'),
                'propinsi_tipe' => $this->input->post('propinsi_tipe'),
                'namaayah' => $this->input->post('namaayah'),
                'namaibu' => $this->input->post('namaibu'),
                'alamatortu' => $this->input->post('alamatortu'),
                'namaahli' => $this->input->post('namaahli'),
                'namapasangan' => $this->input->post('namapasangan'),
                'alamatpasangan' => $this->input->post('alamatpasangan'),
                'namakontak' => $this->input->post('namakontak'),
                'alamatkontak' => $this->input->post('alamatkontak'),
                'telpkontak' => $this->input->post('teleponkontak'),
                'hubkontak' => $this->input->post('hubugankontak'),
                'tglonline' => $this->input->post('perkiraan'),
                 'perkiraan' => $this->input->post('perkiraana'),
                'negara' => $this->input->post('negara'),
                'jabatan' => $this->input->post('jabatan'),
                'ahliwaris' => $this->input->post('ahliwaris'),
                'jmlanak' => $this->input->post('jmlanak'),
                'agency' => $this->input->post('agency'),
                'matauang' => $this->input->post('matauang'),
                'sektorusaha' => $this->input->post('sektorusaha'),
                'gaji' => $this->input->post('gaji'),
                'nopaspor' => $this->input->post('nopaspor'),
                'masaberlaku' => $this->input->post('masaberlaku'),
                'masahabis' => $this->input->post('masahabis'),
                'tglberangkat' => $this->input->post('tglberangkat'),
                'tgltiba' => $this->input->post('tgltiba'),
                'data_registrasi' => $this->input->post('datareg'),
                'namadisnaker_id' => $this->input->post('namadisnaker_id'),
                'd_nosuratnikah' => $this->input->post('d_nosuratnikah'),
                'd_nippencatat' => $this->input->post('d_nippencatat'),
                'd_niksuamioristri' => $this->input->post('d_niksuamioristri'),
                'd_noregistrasi' => $this->input->post('d_noregistrasi'),
                'd_tglsurat' => $this->input->post('d_tglsurat'),
                'd_namakepaladesa' => $this->input->post('d_namakepaladesa'),
                'd_nonikwali' => $this->input->post('d_nonikwali'),
                'd_nokk' => $this->input->post('d_nokk'),
                'd_nikkepala' => $this->input->post('d_nikkepala'),
                'd_nipdidukcapil' => $this->input->post('d_nipdidukcapil'),
                'd_tglterbitkk' => $this->input->post('d_tglterbitkk'),
                'pekerjaan' => $this->input->post('pekerjaan'),

            );
             $databackup = array(  
                'tglbuat' => $this->input->post('tanggalbuatnyaya'),
                'tglterima' => $this->input->post('tglterima'),
                'id_biodata' => $this->input->post('idbiodata'),
                'nodisnaker' => $this->input->post('nodisnaker'),
                'nama' => $this->input->post('nama'),
                'tempatlahir' => $this->input->post('tempatlahir'),
                'tanggallahir' => $this->input->post('tanggallahir'),
                'noktp' => $this->input->post('noktp'),
                'tglnoktp' => $this->input->post('tglnoktp'),
                'tempatnoktp' => $this->input->post('tempatnoktp'),
                'jeniskelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'status' => $this->input->post('status'),
                'pendidikan' => $this->input->post('pendidikan'),
                'alamat' => $this->input->post('alamat'),
                'propinsi' => $this->input->post('propinsi'),
                'propinsi_tipe' => $this->input->post('propinsi_tipe'),
                'namaayah' => $this->input->post('namaayah'),
                'namaibu' => $this->input->post('namaibu'),
                'alamatortu' => $this->input->post('alamatortu'),
                'namaahli' => $this->input->post('namaahli'),
                'namapasangan' => $this->input->post('namapasangan'),
                'alamatpasangan' => $this->input->post('alamatpasangan'),
                'namakontak' => $this->input->post('namakontak'),
                'alamatkontak' => $this->input->post('alamatkontak'),
                'telpkontak' => $this->input->post('teleponkontak'),
                'hubkontak' => $this->input->post('hubugankontak'),
                'tglonline' => $this->input->post('perkiraan'),
                 'perkiraan' => $this->input->post('perkiraana'),
                'negara' => $this->input->post('negara'),
                'jabatan' => $this->input->post('jabatan'),
                'ahliwaris' => $this->input->post('ahliwaris'),
                'jmlanak' => $this->input->post('jmlanak'),
                'agency' => $this->input->post('agency'),
                'matauang' => $this->input->post('matauang'),
                'sektorusaha' => $this->input->post('sektorusaha'),
                'gaji' => $this->input->post('gaji'),
                'nopaspor' => $this->input->post('nopaspor'),
                'masaberlaku' => $this->input->post('masaberlaku'),
                'masahabis' => $this->input->post('masahabis'),
                'tglberangkat' => $this->input->post('tglberangkat'),
                'tgltiba' => $this->input->post('tgltiba'),
                'data_registrasi' => $this->input->post('datareg'),
                'date_created' => date("Y-m-d H:i:s"),
                'namadisnaker_id' => $this->input->post('namadisnaker_id'),
                'ztipe' => 'TAMBAH',
                'ip' => $ipaddress
            );
             
            if ($this->input->post('idbiodata') != NULL) {
                $this->db->insert('disnaker', $data);
                $this->db->insert('disnaker_backup', $databackup);
                redirect('detaildisnaker');
            }
        }


    } 
    function ubahdisnaker() {
        $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 $data = array(  
                    'tglbuat' => $this->input->post('tglbuat'),
                    'tglterima' => $this->input->post('tglterima'),
                    'id_biodata' => $this->input->post('idbiodata'),
                    'nodisnaker' => $this->input->post('nodisnaker'),
                    'nama' => $this->input->post('nama'),
                    'tempatlahir' => $this->input->post('tempatlahir'),
                    'tanggallahir' => $this->input->post('tanggallahir'),
                    'noktp' => $this->input->post('noktp'),
                    'tglnoktp' => $this->input->post('tglnoktp'),
                    'tempatnoktp' => $this->input->post('tempatnoktp'),
                    'jeniskelamin' => $this->input->post('jenis_kelamin'),
                    'agama' => $this->input->post('agama'),
                    'status' => $this->input->post('status'),
                    //'email' => $this->input->post('d_email'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'alamat' => $this->input->post('alamat'),
                    'propinsi' => $this->input->post('propinsi'),
                    'propinsi_tipe' => $this->input->post('propinsi_tipe'),
                    'namaayah' => $this->input->post('namaayah'),
                    'namaibu' => $this->input->post('namaibu'),
                    'alamatortu' => $this->input->post('alamatortu'),
                    'namaahli' => $this->input->post('namaahli'),
                    'namapasangan' => $this->input->post('namapasangan'),
                    'alamatpasangan' => $this->input->post('alamatpasangan'),
                    'namakontak' => $this->input->post('namakontak'),
                    'alamatkontak' => $this->input->post('alamatkontak'),
                    'telpkontak' => $this->input->post('teleponkontak'),
                    'hubkontak' => $this->input->post('hubugankontak'),
                    'tglonline' => $this->input->post('perkiraan'),
                    'perkiraan' => $this->input->post('perkiraana'),
                    'negara' => $this->input->post('negara'),
                    'jabatan' => $this->input->post('jabatan'),
                    'ahliwaris' => $this->input->post('ahliwaris'),
                    'jmlanak' => $this->input->post('jmlanak'),
                    'agency' => $this->input->post('agency'),
                    'matauang' => $this->input->post('matauang'),
                    'sektorusaha' => $this->input->post('sektorusaha'),
                    'gaji' => $this->input->post('gaji'),
                    'nopaspor' => $this->input->post('nopaspor'),
                    'masaberlaku' => $this->input->post('masaberlaku'),
                    'masahabis' => $this->input->post('masahabis'),
                    'tglberangkat' => $this->input->post('tglberangkat'),
                    'tgltiba' => $this->input->post('tgltiba'),
                    'data_registrasi' => $this->input->post('datareg'),
                    'namadisnaker_id' => $this->input->post('namadisnaker_id'),
                    'd_nosuratnikah' => $this->input->post('d_nosuratnikah'),
                    'd_nippencatat' => $this->input->post('d_nippencatat'),
                    'd_niksuamioristri' => $this->input->post('d_niksuamioristri'),
                    'd_noregistrasi' => $this->input->post('d_noregistrasi'),
                    'd_tglsurat' => $this->input->post('d_tglsurat'),
                    'd_namakepaladesa' => $this->input->post('d_namakepaladesa'),
                    'd_nonikwali' => $this->input->post('d_nonikwali'),
                    'd_nokk' => $this->input->post('d_nokk'),
                    'd_nikkepala' => $this->input->post('d_nikkepala'),
                    'd_nipdidukcapil' => $this->input->post('d_nipdidukcapil'),
                    'd_tglterbitkk' => $this->input->post('d_tglterbitkk'),
                    'pekerjaan' => $this->input->post('pekerjaan'),
                );
                $databackyy = array(  
                    'tglbuat' => $this->input->post('tglbuat'),
                    'tglterima' => $this->input->post('tglterima'),
                    'id_biodata' => $this->input->post('idbiodata'),
                    'nodisnaker' => $this->input->post('nodisnaker'),
                    'nama' => $this->input->post('nama'),
                    'tempatlahir' => $this->input->post('tempatlahir'),
                    'tanggallahir' => $this->input->post('tanggallahir'),
                    'noktp' => $this->input->post('noktp'),
                    'tglnoktp' => $this->input->post('tglnoktp'),
                    'tempatnoktp' => $this->input->post('tempatnoktp'),
                    'jeniskelamin' => $this->input->post('jenis_kelamin'),
                    'agama' => $this->input->post('agama'),
                    'status' => $this->input->post('status'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'alamat' => $this->input->post('alamat'),
                    'propinsi' => $this->input->post('propinsi'),
                    'propinsi_tipe' => $this->input->post('propinsi_tipe'),
                    'namaayah' => $this->input->post('namaayah'),
                    'namaibu' => $this->input->post('namaibu'),
                    'alamatortu' => $this->input->post('alamatortu'),
                    'namaahli' => $this->input->post('namaahli'),
                    'namapasangan' => $this->input->post('namapasangan'),
                    'alamatpasangan' => $this->input->post('alamatpasangan'),
                    'namakontak' => $this->input->post('namakontak'),
                    'alamatkontak' => $this->input->post('alamatkontak'),
                    'telpkontak' => $this->input->post('teleponkontak'),
                    'hubkontak' => $this->input->post('hubugankontak'),
                    'tglonline' => $this->input->post('perkiraan'),
                    'perkiraan' => $this->input->post('perkiraana'),
                    'negara' => $this->input->post('negara'),
                    'jabatan' => $this->input->post('jabatan'),
                    'ahliwaris' => $this->input->post('ahliwaris'),
                    'jmlanak' => $this->input->post('jmlanak'),
                    'agency' => $this->input->post('agency'),
                    'matauang' => $this->input->post('matauang'),
                    'sektorusaha' => $this->input->post('sektorusaha'),
                    'gaji' => $this->input->post('gaji'),
                    'nopaspor' => $this->input->post('nopaspor'),
                    'masaberlaku' => $this->input->post('masaberlaku'),
                    'masahabis' => $this->input->post('masahabis'),
                    'tglberangkat' => $this->input->post('tglberangkat'),
                    'tgltiba' => $this->input->post('tgltiba'),
                    'data_registrasi' => $this->input->post('datareg'),
                    'namadisnaker_id' => $this->input->post('namadisnaker_id'),
                    'date_created' => date("Y-m-d H:i:s"),
                    'ztipe' => 'UBAH',
                    'ip' => $ipaddress
                );
            //$this->db->insert('disnakerpermit', $data);
            if ($this->input->post('idbiodata') != NULL) {
                $this->db->where('id_biodata', $this->input->post('idbiodata'));
                $this->db->update('disnaker', $data);
                //$this->db->insert('disnaker_backup', $databackyy);
		        redirect('detaildisnaker');
            }
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


            function update_keluarga() {
                    $this->load->library('upload');

            
        $idid = $this->input->post('biodata');
        date_default_timezone_set('Asia/Jakarta');
        $nmfile = $idid."_".time()."_".$_FILES['legal']['name']; //nama file saya beri nama langsung dan diikuti fu
        $nmfile= str_replace(" ","_",$nmfile);
        $config['upload_path'] = './assets/scankeluarga/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '5000'; //lebar maksimum 1366 px
        $config['max_height']  = '5000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        $gbr = $this->upload->data();
        $this->upload->do_upload('legal');
        $data = array(
            'keluarga' => $gbr['file_name'],
            'terakhir_keluarga' => date('D d-m-Y G:i:s'),
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('disnaker', $data);
    }

}
?>