<?php
class m_spbg extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_dokdibawa(){

	$k1 = $this->input->post('k1');
	$k2 = $this->input->post('k2');
	$k3 = $this->input->post('k3');
		$data = array (
			'k1'=>$k1, 
			'k2'=>$k2, 
			'k3'=>$k3, 
			);

		$this->db->insert('setting_spbg',$data);
	}

	function tampil_data_dokdibawa(){
		$sql = "SELECT * FROM setting_spbg";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_dokdibawa() {
		$id = $this->input->post('id_kategori');
		$k1 = $this->input->post('k1');
		$k2 = $this->input->post('k2');
		$k3 = $this->input->post('k3');
		$data = array(
			'k1'=>$k1, 
			'k2'=>$k2, 
			'k3'=>$k3, 
			);
		$this->db->where('id_setting_spbg', $id);
		$this->db->update('setting_spbg', $data);
	}

	function hapus_data_dokdibawa($id) {
		$this->db->where('id_setting_spbg', $id);
		$this->db->delete('setting_spbg');
	}

	function ambil_id($id) {
		return $this->db->get_where('setting_spbg', array('id_setting_spbg' => $id))->row();
	}
 
}
?>