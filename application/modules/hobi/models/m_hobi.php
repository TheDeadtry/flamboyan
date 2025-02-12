<?php
class M_hobi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_hobi($nama_hobi, $nama_hobi_taiwan){

		$data = array (
			'isi'=>$nama_hobi, 
			'mandarin'=>$nama_hobi_taiwan,
			);

		$this->db->insert('datahobi',$data);
	}

	function tampil_data_hobi(){
		$sql = "SELECT * FROM datahobi";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
 	function update_data_hobi() {
 		$id = $this->input->post('id_hobi');
		$nama = $this->input->post('nama_hobi');
		$taiw = $this->input->post('nama_hobi_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_hobi', $id);
		$this->db->update('datahobi', $data);
	}

	function hapus_data_hobi() {
		$id = $this->input->post('id_hobi');
		$this->db->where('id_hobi', $id);
		$this->db->delete('datahobi');
	}

	function ambil_id($id) {
		return $this->db->get_where('datahobi', array('id_hobi' => $id))->row();
	}
}
?>