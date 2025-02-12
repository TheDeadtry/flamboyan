<?php
class M_skillnya extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_skillnya($kode_skillnya, $nama_skillnya){

		$data = array (
			'kode_skillnya'=>$kode_skillnya,
			'isi'=>$nama_skillnya, 
			);

		$this->db->insert('dataskillnya',$data);
	}

	function tampil_data_skillnya(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>