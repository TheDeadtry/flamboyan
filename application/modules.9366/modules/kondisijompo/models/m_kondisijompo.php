<?php
class M_kondisijompo extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_kondisijompo($nama_kondisijompo, $nama_kondisijompo_taiwan){

		$data = array (
			'isi'=>$nama_kondisijompo, 
			'mandarin'=>$nama_kondisijompo_taiwan,
			);

		$this->db->insert('datakondisijompo',$data);
	}

	function tampil_data_kondisijompo(){
		$sql = "SELECT * FROM datakondisijompo";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
 	function update_data_kondisijompo() {
 		$id = $this->input->post('id_kondisijompo');
		$nama = $this->input->post('nama_kondisijompo');
		$taiw = $this->input->post('nama_kondisijompo_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_kondisijompo', $id);
		$this->db->update('datakondisijompo', $data);
	}

	function hapus_data_kondisijompo() {
		$id = $this->input->post('id_kondisijompo');
		$this->db->where('id_kondisijompo', $id);
		$this->db->delete('datakondisijompo');
	}

	function ambil_id($id) {
		return $this->db->get_where('datakondisijompo', array('id_kondisijompo' => $id))->row();
	}
}
?>