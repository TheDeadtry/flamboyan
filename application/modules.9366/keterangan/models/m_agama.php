<?php
class M_agama extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_agama($nama_agama, $nama_agama_taiwan){

		$data = array (
			'isi'=>$nama_agama, 
			'mandarin'=>$nama_agama_taiwan,
			);

		$this->db->insert('dataagama',$data);
	}

	function tampil_data_agama(){
		$sql = "SELECT * FROM dataagama";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_agama() {
		$id = $this->input->post('id_agama');
		$nama = $this->input->post('nama_agama');
		$taiw = $this->input->post('nama_agama_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_agama', $id);
		$this->db->update('dataagama', $data);
	}

	function hapus_data_agama() {
		$id = $this->input->post('id_agama');
		$this->db->where('id_agama', $id);
		$this->db->delete('dataagama');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataagama', array('id_agama' => $id))->row();
	}
 
}
?>