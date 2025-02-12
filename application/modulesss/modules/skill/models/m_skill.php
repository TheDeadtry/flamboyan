<?php
class M_skill extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_kategoriskill($nama_skill, $nama_skill_taiwan){

		$data = array (
			'isi'=>$nama_skill, 
			'mandarin'=>$nama_skill_taiwan,
			);

		$this->db->insert('kategoriskill',$data);
	}

	function tampil_data_kategoriskill(){
		$sql = "SELECT id_kategori,isi,mandarin FROM kategoriskill";
                $query = $this->db->query($sql);

            return $query->result();
	} 


	 function simpan_data_skill($id_kategori,$nama_skill, $nama_skill_taiwan){

		$data = array (
			'id_kategori'=>$id_kategori, 
			'isi'=>$nama_skill, 
			'mandarin'=>$nama_skill_taiwan
			);

		$this->db->insert('dataskill',$data);
	}

	function tampil_data_skill(){
		$sql = "SELECT dataskill.id_kategori,dataskill.isi,dataskill.mandarin,kategoriskill.isi As kategorinya
				FROM dataskill
				INNER JOIN kategoriskill
				ON dataskill.id_kategori=kategoriskill.id_kategori;";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>