<?php
class M_sponsor extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_sponsor($kode, $nama, $hp, $email,$alamat,$status){

		$data = array (
			'kode_sponsor'=>$kode, 
			'nama'=>$nama,
			'hp'=>$hp, 
			'email'=>$email, 
			'alamat'=>$alamat, 
			'status'=>$status, 

			);

		$this->db->insert('datasponsor',$data);
	}

	function tampil_data_sponsor(){
		$sql = "SELECT * FROM datasponsor";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>