<?php
class M_sektor extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_sektor($kode_sektor, $nama_sektor, $nama_sektor_taiwan, $urut_sektor,$jenis_kelamin){

		$data = array (
			'kode_jenis'=>$kode_sektor, 
			'isi'=>$nama_sektor, 
			'isi_taiwan'=>$nama_sektor_taiwan,
			'no_urut'=>$urut_sektor,
			'jeniskelamin'=>$jenis_kelamin,

			);

		$this->db->insert('datasektor',$data);
	}

	function tampil_data_sektor(){
		$sql = "SELECT kode_jenis,isi,isi_taiwan,no_urut,jeniskelamin FROM datasektor";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>