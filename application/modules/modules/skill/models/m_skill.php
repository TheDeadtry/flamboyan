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
		$sql = "SELECT dataskill.id_kategori,dataskill.id_skill,dataskill.isi,dataskill.mandarin,kategoriskill.isi As kategorinya
				FROM dataskill
				INNER JOIN kategoriskill
				ON dataskill.id_kategori=kategoriskill.id_kategori;";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function update_kategori() {
		$id = $this->input->post('id_kategori');
		$nama_kategoriskill = $this->input->post('nama_kategoriskill');
		$nama_kategoriskill_taiwan = $this->input->post('nama_kategoriskill_taiwan');

		$data = array(
			'isi'=>$nama_kategoriskill, 
			'mandarin'=>$nama_kategoriskill_taiwan
			);
		$this->db->where('id_kategori', $id);
		$this->db->update('kategoriskill', $data);
	}

		function hapus_kategori() {
		$id = $this->input->post('id_kategori');
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategoriskill');
	}



			function update_skill() {
		$id = $this->input->post('id_skill');
		$id_kategori = $this->input->post('id_kategori');
		$nama_skill = $this->input->post('nama_skill');
		$nama_skill_taiwan = $this->input->post('nama_skill_taiwan');
		$data = array(
			'id_skill'=>$id_kategori, 
			'isi'=>$nama_skill, 
			'mandarin'=>$nama_skill_taiwan
			);
		$this->db->where('id_skill', $id);
		$this->db->update('dataskill', $data);
	}

		function hapus_skill() {
		$id = $this->input->post('id_skill');
		$this->db->where('id_skill', $id);
		$this->db->delete('dataskill');
	}
 
}
?>