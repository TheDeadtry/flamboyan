<?php
class M_provinsi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_provinsi($nama_provinsi, $nama_provinsi_taiwan){

		$data = array (
			'isi'=>$nama_provinsi, 
			'mandarin'=>$nama_provinsi_taiwan,
			);

		$this->db->insert('dataprovinsi',$data);
	}

	function tampil_data_provinsi(){
		$sql = "SELECT isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>