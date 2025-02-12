<?php
class M_setting_dataregistrasi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_setketerangan($nama){

		$data = array (
			'nama'=>$nama, 
			);

		$this->db->insert('dataregdisnaker',$data);
	}

	function tampil_data_setketerangan(){
		$sql = "SELECT * FROM dataregdisnaker ORDER BY id DESC";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_setketerangan() {
		$id = $this->input->post('id');

		$data = array(
			'nama'=>$this->input->post('nama'), 
			);
		$this->db->where('id', $id);
		$this->db->update('dataregdisnaker', $data);
	}

	function hapus_data_setketerangan() {
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('dataregdisnaker');
	}

 
}
?>