<?php
class M_dokdibawa extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_dokdibawa($status, $mandarin){

		$data = array (
			'nama'=>$status, 
			'alamat'=>$mandarin, 
			);

		$this->db->insert('setting_kantorpaspor',$data);
	}

	function tampil_data_dokdibawa(){
		$sql = "SELECT * FROM setting_kantorpaspor";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_dokdibawa() {
		$id = $this->input->post('id_kategori');
		$status = $this->input->post('status');
		$mandarin = $this->input->post('mandarin');
		$data = array(
			'nama'=>$status, 
			'alamat'=>$mandarin, 
			);
		$this->db->where('id_setting_kantorpaspor', $id);
		$this->db->update('setting_kantorpaspor', $data);
	}

	function hapus_data_dokdibawa($id) {
		$this->db->where('id_setting_kantorpaspor', $id);
		$this->db->delete('setting_kantorpaspor');
	}

	function ambil_id($id) {
		return $this->db->get_where('setting_kantorpaspor', array('id_setting_kantorpaspor' => $id))->row();
	}
 
}
?>