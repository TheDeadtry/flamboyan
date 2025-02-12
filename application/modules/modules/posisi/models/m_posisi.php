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
		$sql = "SELECT * FROM dataposisi";
                $query = $this->db->query($sql);

            return $query->result();
	} 

			function update_posisi() {
		$id = $this->input->post('id_posisi');
		$nama_posisi = $this->input->post('nama_posisi');
		$nama_posisi_taiwan = $this->input->post('nama_posisi_taiwan');

		$data = array(
			'isi'=>$nama_posisi, 
			'mandarin'=>$nama_posisi_taiwan
			);
		$this->db->where('id_posisi', $id);
		$this->db->update('dataposisi', $data);
	}

		function hapus_posisi() {
		$id = $this->input->post('id_posisi');
		$this->db->where('id_posisi', $id);
		$this->db->delete('dataposisi');
	}

 
}
?>