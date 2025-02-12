<?php
class M_airport extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_airport($nama_airport){

		$data = array (
			'isi'=>$nama_airport, 
			);

		$this->db->insert('dataairport',$data);
	}

	function tampil_data_airport(){
		$sql = "SELECT * FROM dataairport";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_airport() {
		$id = $this->input->post('id_airport');
		$nama = $this->input->post('nama_airport');
		$data = array(
			'isi' => $nama,
			);
		$this->db->where('id_airport', $id);
		$this->db->update('dataairport', $data);
	}

	function hapus_data_airport() {
		$id = $this->input->post('id_airport');
		$this->db->where('id_airport', $id);
		$this->db->delete('dataairport');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataairport', array('id_airport' => $id))->row();
	}
 
}
?>