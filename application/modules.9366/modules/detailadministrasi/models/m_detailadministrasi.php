<?php
class M_detailadministrasi extends CI_Model{
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
	
	function tampil_data_sponsor(){
		$sql = "SELECT * FROM datasponsor";
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
			function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
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
					'kode_sponsor' => $this->input->post('sponsor'),
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
					'foto' => $this->input->post('gambarnya'),
					
				);
			$this->db->insert('personal', $data);

		}else{
			if ($this->upload->do_upload('gambarnya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'id_biodata' => $this->input->post('idp'),
					'nama' => $this->input->post('namap'),
					'kode_sponsor' => $this->input->post('sponsor'),
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

				function ubahpersonal() {

		
		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
        $config['max_width']  = '1366'; //lebar maksimum 1366 px
        $config['max_height']  = '900'; //tinggi maksimu 768 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		
		$this->upload->initialize($config);
		
		if(empty($_FILES['gambarnya']['name']))
        {
            	 $data = array(
            	 	'id_biodata' => $this->input->post('idp'),
					'nama' => $this->input->post('namap'),
					'kode_sponsor' => $this->input->post('sponsor'),
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
					//'foto' => $this->input->post('gambarnya')."profilessss.jpg",
					
				);
			//$this->db->insert('personal', $data);
			$this->db->where('id_biodata', $this->input->post('idp'));
			$this->db->update('personal', $data);

		}else{
			if ($this->upload->do_upload('gambarnya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'id_biodata' => $this->input->post('idp'),
					'nama' => $this->input->post('namap'),
					'kode_sponsor' => $this->input->post('sponsor'),
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
			//$this->db->insert('personal', $data);
			$this->db->where('id_biodata', $this->input->post('idp'));
			$this->db->update('personal', $data);
			}



		}
	} 

		function ubahstatus() {
 			$data = array(  
            	 	'id_biodata' => $this->input->post('idp'),
            	 	'statusaktif' => $this->input->post('statustki'),	
				);
			//$this->db->insert('bankpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idp'));
			$this->db->update('personal', $data);
	} 

	function hitung_biodatamf($id) {
    	$sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
    				   majikan.namamajikan,
    				   personal.*,
    				   family.*,
    				   working.*,
    				   skillcondition.*,
    				   request.*,	
    				   paspor.keterangan AS ketpas,
    				   paspor.berlaku,
    				   medical.keterangan AS ketmed
    			FROM personal 
    			JOIN majikan ON personal.id_biodata = majikan.id_biodata 
    			JOIN family ON personal.id_biodata = family.id_biodata
    			JOIN working ON personal.id_biodata = working.id_biodata
    			JOIN skillcondition ON personal.id_biodata = skillcondition.id_biodata
    			JOIN request ON personal.id_biodata = request.id_biodata
    			JOIN paspor ON personal.id_biodata = paspor.id_biodata
    			JOIN medical ON personal.id_biodata = medical.id_biodata
    			WHERE personal.id_biodata='$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil->num_rows();
    }

	function hitung_biodatafi($id) {
		$sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
     				   personal.*,
     				   family.*,
     				   pengalaman.*,
                       tugas.*,
                       kettugas.*,
     				   paspor.keterangan AS ketpas,
     				   paspor.berlaku,
     				   paspor.tglterbit
     			FROM personal
     			JOIN family ON personal.id_biodata = family.id_biodata
     			JOIN pengalaman ON personal.id_biodata = pengalaman.id_biodata
                JOIN tugas ON personal.id_biodata = tugas.id_biodata
                JOIN kettugas ON personal.id_biodata = kettugas.id_biodata
     			JOIN paspor ON personal.id_biodata = paspor.id_biodata
     			WHERE personal.id_biodata='$id'";
     	$tampil = $this->db->query($sql);
     	return $tampil->num_rows();
	}

	function hitung_biodatajp($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                 personal.*,
                 family.*,
                 working.*,
                 skillcondition.*,
                 interview.*,
                 paspor.keterangan AS ketpas,
                 paspor.berlaku,
                 medical.keterangan AS ketmed
            FROM personal
            JOIN family ON personal.id_biodata = family.id_biodata
            JOIN working ON personal.id_biodata = working.id_biodata
            JOIN skillcondition ON personal.id_biodata = skillcondition.id_biodata
            JOIN interview ON personal.id_biodata = interview.id_biodata
            JOIN paspor ON personal.id_biodata = paspor.id_biodata
            JOIN medical ON personal.id_biodata = medical.id_biodata
            WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

	function hitung_family($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       family.*
                FROM personal
                JOIN family ON personal.id_biodata = family.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_working($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       working.*
                FROM personal
                JOIN working ON personal.id_biodata = working.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_request($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       request.*
                FROM personal
                JOIN request ON personal.id_biodata = request.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_skillcondition($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       skillcondition.*
                FROM personal
                JOIN skillcondition ON personal.id_biodata = skillcondition.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_medical($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       medical.*
                FROM personal
                JOIN medical ON personal.id_biodata = medical.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_pengalaman($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       pengalaman.*
                FROM personal
                JOIN pengalaman ON personal.id_biodata = pengalaman.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_tugas($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       tugas.*
                FROM personal
                JOIN tugas ON personal.id_biodata = tugas.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_kettugas($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       kettugas.*
                FROM personal
                JOIN kettugas ON personal.id_biodata = kettugas.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_interview($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       interview.*
                FROM personal
                JOIN interview ON personal.id_biodata = interview.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

    function hitung_paspor($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       paspor.*
                FROM personal
                JOIN paspor ON personal.id_biodata = paspor.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil->num_rows();
    }

}
?>