<?php
class M_detailterbang extends CI_Model{
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
	
function tampil_dataterbang(){
		$sql = "SELECT * FROM dataterbang";
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

	function hitung_data_terbang($idnya){
		$sql = "SELECT count(*) as total FROM terbang WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_terbang($idnya){
		$sql = "SELECT * FROM terbang JOIN dataterbang ON terbang.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahterbang() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	 	'tanggalterbang' => $this->input->post('tanggalterbang'),
            	 	'statustgl' => $this->input->post('tanggalterbanga'),
            	 	'id_terbang' => $this->input->post('id_terbang'),
            	 	'tiket' => $this->input->post('tiket'),
            	 	'tglberangkat' => $this->input->post('tglberangkat'),
            	 	'statusterbang' => $this->input->post('berangkata'),
				);
			$this->db->insert('terbang', $data);
	} 
	function ubahterbang() {
 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'tanggalterbang' => $this->input->post('tanggalterbang'),
            	 	'statustgl' => $this->input->post('tanggalterbanga'),
            	 	'id_terbang' => $this->input->post('id_terbang'),
					'tiket' => $this->input->post('tiket'),
            	 	'tglberangkat' => $this->input->post('tglberangkat'),
            	 	'statusterbang' => $this->input->post('berangkata'),

				);
			//$this->db->insert('terbangpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('terbang', $data);
	} 

}
?>