<?php
class M_alasan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_alasan($nama_alasan, $nama_alasan_taiwan){

		$data = array (
			'isi'=>$nama_alasan, 
			'mandarin'=>$nama_alasan_taiwan,
			);

		$this->db->insert('dataalasan',$data);
	}

	function tampil_data_alasan(){
		$sql = "SELECT isi,mandarin FROM dataalasan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>