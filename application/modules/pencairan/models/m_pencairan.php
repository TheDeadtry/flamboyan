<?php
class M_pencairan extends CI_Model{
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
	
function tampil_datapencairan(){
		$sql = "SELECT * FROM markf";
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

	function hitung_data_pencairan($idnya){
		$sql = "SELECT count(*) as total FROM markg WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_pencairan($idnya){
		$sql = "SELECT * FROM markg WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahpencairan() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	 	'tanggalpencairan' => $this->input->post('tanggalpencairan'),
            	 	'id_pencairan' => $this->input->post('id_pencairan'),
				);
			$this->db->insert('markg', $data);
	} 
	function ubahpencairan() {
 $data = array(  
            	 	'tgl_cair' => $this->input->post('tgl_cair'),
            	 	'nilai_tma' => $this->input->post('nilai_tma'),
            	 	'nilai_tmi' => $this->input->post('nilai_tmi'),

				);
			//$this->db->insert('pencairanpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('markg', $data);
	} 
		
}
?>