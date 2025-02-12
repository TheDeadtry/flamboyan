<?php
class M_kondisijompo extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_kondisijompo($nama_kondisijompo, $nama_kondisijompo_taiwan){

		$data = array (
			'isi'=>$nama_kondisijompo, 
			'mandarin'=>$nama_kondisijompo_taiwan,
			);

		$this->db->insert('datakondisijompo',$data);
	}

	function tampil_data_kondisijompo(){
		$sql = "SELECT isi,mandarin FROM datakondisijompo";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>