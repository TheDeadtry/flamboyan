<?php
class M_setmajikan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_setmajikan($nama_setmajikan, $nama_setmajikan_taiwan){

		$data = array (
			'isi'=>$nama_setmajikan, 
			'mandarin'=>$nama_setmajikan_taiwan,
			);

		$this->db->insert('datasetmajikan',$data);
	}

	function tampil_data_setmajikan(){
		$sql = "SELECT * FROM datasetmajikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_setmajikan() {
		$id = $this->input->post('id_setmajikan');
		$nama = $this->input->post('nama_setmajikan');
		$taiw = $this->input->post('nama_setmajikan_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_setmajikan', $id);
		$this->db->update('datasetmajikan', $data);
	}

	function hapus_data_setmajikan() {
		$id = $this->input->post('id_setmajikan');
		$this->db->where('id_setmajikan', $id);
		$this->db->delete('datasetmajikan');
	}

	function ambil_id($id) {
		return $this->db->get_where('datasetmajikan', array('id_setmajikan' => $id))->row();
	}
 
}
?>