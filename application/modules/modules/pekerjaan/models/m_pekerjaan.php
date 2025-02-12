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
		$sql = "SELECT datapekerjaan.id_kategori,datapekerjaan.id_pekerjaan,datapekerjaan.isi,datapekerjaan.mandarin,kategoripekerjaan.isi As kategorinya
				FROM datapekerjaan
				INNER JOIN kategoripekerjaan
				ON datapekerjaan.id_kategori=kategoripekerjaan.id_kategori;";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function update_kategoripekerjaan() {
		$id = $this->input->post('id_kategori');
		$nama_kategoripekerjaan = $this->input->post('nama_kategoripekerjaan');
		$nama_kategoripekerjaan_taiwan = $this->input->post('nama_kategoripekerjaan_taiwan');

		$data = array(
			'isi'=>$nama_kategoripekerjaan, 
			'mandarin'=>$nama_kategoripekerjaan_taiwan
			);
		$this->db->where('id_kategori', $id);
		$this->db->update('kategoripekerjaan', $data);
	}

		function hapus_kategoripekerjaan() {
		$id = $this->input->post('id_kategori');
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategoripekerjaan');
	}



			function update_pekerjaan() {
		$id = $this->input->post('id_pekerjaan');
		$kategori = $this->input->post('kategori');
		$nama_pekerjaan = $this->input->post('nama_pekerjaan');
		$nama_pekerjaan_taiwan = $this->input->post('nama_pekerjaan_taiwan');
		$data = array(
			'id_kategori'=>$kategori, 
			'isi'=>$nama_pekerjaan, 
			'mandarin'=>$nama_pekerjaan_taiwan
			);
		$this->db->where('id_pekerjaan', $id);
		$this->db->update('datapekerjaan', $data);
	}

		function hapus_pekerjaan() {
		$id = $this->input->post('id_pekerjaan');
		$this->db->where('id_pekerjaan', $id);
		$this->db->delete('datapekerjaan');
	}
 
}
?>