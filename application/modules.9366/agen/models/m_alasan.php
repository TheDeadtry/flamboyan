<?php
class M_alasan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_alasan($nama_alasan, $nama_alasan_taiwan){

		$data = array (
			'isi'=>$nama_alasan, 
			'mandarin'=>$nama_alasan_taiwan,
			);

		$this->db->insert('dataalasan',$data);
	}

	function tampil_data_alasan(){
		$sql = "SELECT * FROM dataalasan";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_alasan() {
		$id = $this->input->post('id_alasan');
		$nama = $this->input->post('nama_alasan');
		$taiw = $this->input->post('nama_alasan_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_alasan', $id);
		$this->db->update('dataalasan', $data);
	}

	function hapus_data_alasan() {
		$id = $this->input->post('id_alasan');
		$this->db->where('id_alasan', $id);
		$this->db->delete('dataalasan');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataalasan', array('id_alasan' => $id))->row();
	}
 
}
?>