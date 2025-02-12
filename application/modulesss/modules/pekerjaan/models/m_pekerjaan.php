<?php
class M_pekerjaan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_kategoripekerjaan($nama_pekerjaan, $nama_pekerjaan_taiwan){

		$data = array (
			'isi'=>$nama_pekerjaan, 
			'mandarin'=>$nama_pekerjaan_taiwan,
			);

		$this->db->insert('kategoripekerjaan',$data);
	}

	function tampil_data_kategoripekerjaan(){
		$sql = "SELECT id_kategori,isi,mandarin FROM kategoripekerjaan";
                $query = $this->db->query($sql);

            return $query->result();
	} 


	 function simpan_data_pekerjaan($id_kategori,$nama_pekerjaan, $nama_pekerjaan_taiwan){

		$data = array (
			'id_kategori'=>$id_kategori, 
			'isi'=>$nama_pekerjaan, 
			'mandarin'=>$nama_pekerjaan_taiwan
			);

		$this->db->insert('datapekerjaan',$data);
	}

	function tampil_data_pekerjaan(){
		$sql = "SELECT datapekerjaan.id_kategori,datapekerjaan.isi,datapekerjaan.mandarin,kategoripekerjaan.isi As kategorinya
				FROM datapekerjaan
				INNER JOIN kategoripekerjaan
				ON datapekerjaan.id_kategori=kategoripekerjaan.id_kategori;";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>