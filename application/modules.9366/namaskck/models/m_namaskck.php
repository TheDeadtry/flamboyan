<?php
class M_namaskck extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namaskck($nama_polda, $alamat){

		$data = array (
			'namaskck'=>$nama_polda, 
			'alamat'=>$alamat,
			);

		$this->db->insert('datanamaskck',$data);
	}

	function tampil_data_namaskck(){
		$sql = "SELECT * FROM datanamaskck";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namaskck() {
		$id = $this->input->post('id_namaskck');
		$nama_polda = $this->input->post('nama_polda');
		$alamat = $this->input->post('alamat');
		$data = array(
			'namaskck'=>$nama_polda, 
			'alamat'=>$alamat,
			);
		$this->db->where('id_namaskck', $id);
		$this->db->update('datanamaskck', $data);
	}

	function hapus_data_namaskck() {
		$id = $this->input->post('id_namaskck');
		$this->db->where('id_namaskck', $id);
		$this->db->delete('datanamaskck');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamaskck', array('id_namaskck' => $id))->row();
	}
 
}
?>