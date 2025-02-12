<?php
class M_namapilstat extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namapilstat($nama_polda, $alamat){

		$data = array (
			'namapilstat'=>$nama_polda, 
			);

		$this->db->insert('datanamapilstat',$data);
	}

	function tampil_data_namapilstat(){
		$sql = "SELECT * FROM datanamapilstat";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namapilstat() {
		$id = $this->input->post('id_namapilstat');
		$nama_polda = $this->input->post('nama_polda');
		$alamat = $this->input->post('alamat');
		$data = array(
			'namapilstat'=>$nama_polda, 
			);
		$this->db->where('id_namapilstat', $id);
		$this->db->update('datanamapilstat', $data);
	}

	function hapus_data_namapilstat() {
		$id = $this->input->post('id_namapilstat');
		$this->db->where('id_namapilstat', $id);
		$this->db->delete('datanamapilstat');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamapilstat', array('id_namapilstat' => $id))->row();
	}
 
}
?>