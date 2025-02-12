<?php
class M_detailvisa extends CI_Model{
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

	function hitung_data_visa($idnya){
		$sql = "SELECT count(*) as total FROM visa WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_visa($idnya){
		$sql = "SELECT * FROM visa WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahvisa() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'novisa' => $this->input->post('novisa'),
					'tglberlaku' => $this->input->post('tglberlaku'),
					'tglsampai' => $this->input->post('tglsampai'),
					'kocokan' => $this->input->post('tglkocokan'),
					'statuskocokan' => $this->input->post('kocokana'),
					'finger' => $this->input->post('tglfinger'),
					'statusfinger' => $this->input->post('fingera'),
					'terima' => $this->input->post('tglterima'),
					'statusterima' => $this->input->post('terimaa'),
					'pap' => $this->input->post('tglpap'),
					'statuspap' => $this->input->post('papa'),
					'ktkln' => $this->input->post('tglktkln'),
					'statusktkln' => $this->input->post('ktklna'),

				);
			$this->db->insert('visa', $data);
	} 
	function ubahvisa() {
 $data = array(  
 					'id_biodata' => $this->input->post('idbiodata'),
            	 	'novisa' => $this->input->post('novisa'),
					'tglberlaku' => $this->input->post('tglberlaku'),
					'tglsampai' => $this->input->post('tglsampai'),
					'kocokan' => $this->input->post('tglkocokan'),
					'statuskocokan' => $this->input->post('kocokana'),
					'finger' => $this->input->post('tglfinger'),
					'statusfinger' => $this->input->post('fingera'),
					'terima' => $this->input->post('tglterima'),
					'statusterima' => $this->input->post('terimaa'),
					'pap' => $this->input->post('tglpap'),
					'statuspap' => $this->input->post('papa'),
					'ktkln' => $this->input->post('tglktkln'),
					'statusktkln' => $this->input->post('ktklna'),
				

				);
			//$this->db->insert('visapermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('visa', $data);
	} 

}
?>