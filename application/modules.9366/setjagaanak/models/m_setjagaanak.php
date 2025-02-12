<?php
class M_setjagaanak extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_setjagaanak($nama_setjagaanak, $nama_setjagaanak_taiwan){

		$data = array (
			'isi'=>$nama_setjagaanak, 
			'mandarin'=>$nama_setjagaanak_taiwan,
			);

		$this->db->insert('datajagaanak',$data);
	}

	function tampil_data_setjagaanak(){
		$sql = "SELECT * FROM datajagaanak";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_setjagaanak() {
		$id = $this->input->post('id_jagaanak');
		$nama = $this->input->post('nama_setjagaanak');
		$taiw = $this->input->post('nama_setjagaanak_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_jagaanak', $id);
		$this->db->update('datajagaanak', $data);
	}

	function hapus_data_setjagaanak() {
		$id = $this->input->post('id_jagaanak');
		$this->db->where('id_jagaanak', $id);
		$this->db->delete('datajagaanak');
	}

	function ambil_id($id) {
		return $this->db->get_where('datasetjagaanak', array('id_jagaanak' => $id))->row();
	}
 
}
?>