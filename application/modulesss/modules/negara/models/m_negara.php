<?php
class M_negara extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_negara($kode_negara, $nama_negara, $nama_negara_taiwan){

		$data = array (
			'kode_negara'=>$kode_negara,
			'isi'=>$nama_negara, 
			'mandarin'=>$nama_negara_taiwan,
			);

		$this->db->insert('datanegara',$data);
	}

	function tampil_data_negara(){
		$sql = "SELECT kode_negara,isi,mandarin FROM datanegara";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>