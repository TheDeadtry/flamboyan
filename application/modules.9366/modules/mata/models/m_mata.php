<?php
class M_mata extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_mata($nama_mata, $nama_mata_taiwan){

		$data = array (
			'isi'=>$nama_mata, 
			'mandarin'=>$nama_mata_taiwan,
			);

		$this->db->insert('datamata',$data);
	}

	function tampil_data_mata(){
		$sql = "SELECT * FROM datamata";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
 	function update_data_mata() {
 		$id = $this->input->post('id_mata');
		$nama = $this->input->post('nama_mata');
		$taiw = $this->input->post('nama_mata_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_mata', $id);
		$this->db->update('datamata', $data);
	}

	function hapus_data_mata() {
		$id = $this->input->post('id_mata');
		$this->db->where('id_mata', $id);
		$this->db->delete('datamata');
	}

	function ambil_id($id) {
		return $this->db->get_where('datamata', array('id_mata' => $id))->row();
	}
}
?>