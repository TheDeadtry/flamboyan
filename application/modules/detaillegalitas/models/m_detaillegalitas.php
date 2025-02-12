<?php
class M_detaillegalitas extends CI_Model{
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
		$sql = "SELECT isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_provinsi(){
		$sql = "SELECT isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	}

		function tampil_data_hubungan(){
		$sql = "SELECT isi,mandarin FROM datahubungan";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function hitung_data_legalitas($idnya){
		$sql = "SELECT count(*) as total FROM legalitas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
		function hitung_data_notarisan($idnya){
		$sql = "SELECT count(*) as total FROM notarisan WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_legalitas($idnya){
		$sql = "SELECT * FROM legalitas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

		function tampil_data_notarisan($idnya){
		$sql = "SELECT * FROM notarisan WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tambahlegalitas() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	 	'tgl_legal' => $this->input->post('tgllegalitas'),
            	 	'nama_legal' => $this->input->post('namalegal'),
            	 	'hub_legal' => $this->input->post('hublegal'),
            	 	'notelp' => $this->input->post('notelp'),
            	 	'khusus_legal' => $this->input->post('khususlegal'),
				);
           	$idid = $this->input->post('idbiodata');
           	$cek_legalitas = $this->db->query("SELECT count(*) as total FROM legalitas WHERE id_biodata='$idid'")->row();

           	if ($cek_legalitas->total == 0) {
           		$this->db->insert('legalitas', $data);
           	}
				
	} 

		function tambahnotarisan() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	 	'tgl_nota' => $this->input->post('tglnota'),
            	 	'nama_nota' => $this->input->post('namanota'),
            	 	'hub_nota' => $this->input->post('hubnota'),
            	 	'notelp' => $this->input->post('notelp'),
            	 	'khusus_nota' => $this->input->post('khususnota'),
				);
           	$idid = $this->input->post('idbiodata');
           	$cek_notarisan = $this->db->query("SELECT count(*) as total FROM notarisan WHERE id_biodata='$idid'")->row();

           	if ($cek_notarisan->total == 0) {
				$this->db->insert('notarisan', $data);
           	}
	} 

	function ubahlegalitas() {
 $data = array(  
            	 	'tgl_legal' => $this->input->post('tgllegalitas'),
            	 	'nama_legal' => $this->input->post('namalegal'),
            	 	'hub_legal' => $this->input->post('hublegal'),
            	 	'notelp' => $this->input->post('notelp'),
            	 	'khusus_legal' => $this->input->post('khususlegal'),

				);
			//$this->db->insert('legalitaspermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('legalitas', $data);
	} 

		function ubahnotarisan() {
 $data = array(  
            	 'tgl_nota' => $this->input->post('tglnota'),
            	 	'nama_nota' => $this->input->post('namanota'),
            	 	'hub_nota' => $this->input->post('hubnota'),
            	 	'notelp' => $this->input->post('notelp'),
            	 	'khusus_nota' => $this->input->post('khususnota'),

				);
			//$this->db->insert('legalitaspermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('notarisan', $data);
	} 

}
?>