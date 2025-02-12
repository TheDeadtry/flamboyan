<?php
class M_agama extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_agama($nama_agama, $nama_agama_taiwan){

		$data = array (
			'isi'=>$nama_agama, 
			'mandarin'=>$nama_agama_taiwan,
			);

		$this->db->insert('dataagama',$data);
	}

	function tampil_data_agama(){
		$sql = "SELECT isi,mandarin FROM dataagama";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>