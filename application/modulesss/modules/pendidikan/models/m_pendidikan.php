<?php
class M_pendidikan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_pendidikan($nama_pendidikan, $nama_pendidikan_taiwan){

		$data = array (
			'isi'=>$nama_pendidikan, 
			'mandarin'=>$nama_pendidikan_taiwan,
			);

		$this->db->insert('datapendidikan',$data);
	}

	function tampil_data_pendidikan(){
		$sql = "SELECT isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>