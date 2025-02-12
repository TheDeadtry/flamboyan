<?php
class M_setketerangan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_setketerangan($nama_setketerangan, $nama_setketerangan_taiwan){

		$data = array (
			'isi'=>$nama_setketerangan, 
			'mandarin'=>$nama_setketerangan_taiwan,
			);

		$this->db->insert('datasetketerangan',$data);
	}

	function tampil_data_setketerangan(){
		$sql = "SELECT * FROM datasetketerangan ORDER BY isi ASC";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_setketerangan() {
		$id = $this->input->post('id_setketerangan');
		$nama = $this->input->post('nama_setketerangan');
		$taiw = $this->input->post('nama_setketerangan_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_setketerangan', $id);
		$this->db->update('datasetketerangan', $data);
	}

	function hapus_data_setketerangan() {
		$id = $this->input->post('id_setketerangan');
		$this->db->where('id_setketerangan', $id);
		$this->db->delete('datasetketerangan');
	}

	function ambil_id($id) {
		return $this->db->get_where('datasetketerangan', array('id_setketerangan' => $id))->row();
	}
 
}
?>