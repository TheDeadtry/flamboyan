<?php
class M_hobi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_hobi($nama_hobi, $nama_hobi_taiwan){

		$data = array (
			'isi'=>$nama_hobi, 
			'mandarin'=>$nama_hobi_taiwan,
			);

		$this->db->insert('datahobi',$data);
	}

	function tampil_data_hobi(){
		$sql = "SELECT isi,mandarin FROM datahobi";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>