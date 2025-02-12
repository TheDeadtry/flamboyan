<?php
class M_dokdibawa extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_dokdibawa($status, $mandarin){

		$data = array (
			'isi'=>$status, 
			'mandarin'=>$mandarin, 
			);

		$this->db->insert('statuspendidikan',$data);
	}

	function tampil_data_dokdibawa(){
		$sql = "SELECT * FROM statuspendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_dokdibawa() {
		$id = $this->input->post('id_kategori');
		$status = $this->input->post('status');
		$mandarin = $this->input->post('mandarin');
		$data = array(
			'isi'=>$status, 
			'mandarin'=>$mandarin, 
			);
		$this->db->where('id_statuspendidikan', $id);
		$this->db->update('statuspendidikan', $data);
	}

	function hapus_data_dokdibawa($id) {
		$this->db->where('id_statuspendidikan', $id);
		$this->db->delete('statuspendidikan');
	}

	function ambil_id($id) {
		return $this->db->get_where('statuspendidikan', array('id_statuspendidikan' => $id))->row();
	}
 
}
?>