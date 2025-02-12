<?php
class M_agen extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_agen($kode, $nama, $hp, $email,$alamat,$status){

		$data = array (
			'kode_agen'=>$kode, 
			'nama'=>$nama,
			'hp'=>$hp, 
			'email'=>$email, 
			'alamat'=>$alamat, 
			'status'=>$status, 

			);

		$this->db->insert('dataagen',$data);
	}

	function tampil_data_agen(){
		$sql = "SELECT * FROM dataagen";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>