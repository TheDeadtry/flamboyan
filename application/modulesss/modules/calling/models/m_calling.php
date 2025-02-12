<?php
class M_calling extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_calling($kode_calling, $nama_calling){

		$data = array (
			'kode_calling'=>$kode_calling,
			'isi'=>$nama_calling, 
			);

		$this->db->insert('datacalling',$data);
	}

	function tampil_data_calling(){
		$sql = "SELECT kode_calling,isi FROM datacalling";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>