<?php
class M_detailbank extends CI_Model{
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

	function hitung_data_bank($idnya){
		$sql = "SELECT count(*) as total FROM bank WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_bank($idnya){
		$sql = "SELECT * FROM bank WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}


	function tampil_data_pilihanbank(){
		$sql = "SELECT isi,mandarin FROM databank";
                $query = $this->db->query($sql);

            return $query->result();
	} 


	function tambahbank() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'kode_bank' => $this->input->post('kodebank'),
					'norek' => $this->input->post('norek'),
					'tglrek' => $this->input->post('tglrek'),
					'ttdbank' => $this->input->post('ttdbank'),
					'ktkln' => $this->input->post('ktkln'),				

				);
			$this->db->insert('bank', $data);
	} 
	function ubahbank() {
 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'kode_bank' => $this->input->post('kodebank'),
					'norek' => $this->input->post('norek'),
					'tglrek' => $this->input->post('tglrek'),
					'ttdbank' => $this->input->post('ttdbank'),
					'ktkln' => $this->input->post('ktkln'),		

				);
			//$this->db->insert('bankpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('bank', $data);
	} 

}
?>