<?php
class M_posisi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_posisi($nama_posisi, $nama_posisi_taiwan){

		$data = array (
			'isi'=>$nama_posisi, 
			'mandarin'=>$nama_posisi_taiwan,
			);

		$this->db->insert('dataposisi',$data);
	}

	function tampil_data_posisi(){
		$sql = "SELECT isi,mandarin FROM dataposisi";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>