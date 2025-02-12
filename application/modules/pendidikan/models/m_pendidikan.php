<?php
class M_pendidikan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_pendidikan($nama_pendidikan, $nama_pendidikan_taiwan){

		$data = array (
			'isi'=>$nama_pendidikan, 
			'mandarin'=>$nama_pendidikan_taiwan,
			);

		$this->db->insert('datapendidikan',$data);
	}

	function tampil_data_pendidikan(){
		$sql = "SELECT * FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 

			function update_pendidikan() {
		$id = $this->input->post('id_pendidikan');
		$nama_pendidikan = $this->input->post('nama_pendidikan');
		$nama_pendidikan_taiwan = $this->input->post('nama_pendidikan_taiwan');

		$data = array(
			'isi'=>$nama_pendidikan, 
			'mandarin'=>$nama_pendidikan_taiwan
			);
		$this->db->where('id_pedidikan', $id);
		$this->db->update('datapendidikan', $data);
	}

		function hapus_pendidikan() {
		$id = $this->input->post('id_pendidikan');
		$this->db->where('id_pedidikan', $id);
		$this->db->delete('datapendidikan');
	}
 
}
?>