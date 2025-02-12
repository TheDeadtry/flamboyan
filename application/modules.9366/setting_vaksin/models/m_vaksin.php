<?php
class m_vaksin extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_dokdibawa($nama){

		$data = array (
			'nama'=>$nama, 
			);

		$this->db->insert('setting_vaksinlist',$data);
	}

	function tampil_data_dokdibawa(){
		$sql = "SELECT * FROM setting_vaksinlist";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_dokdibawa() {
		$id = $this->input->post('id_kategori');
		$nama = $this->input->post('nama');
		$data = array(
			'nama'=>$nama, 
			);
		$this->db->where('id_setting_vaksinlist', $id);
		$this->db->update('setting_vaksinlist', $data);
	}

	function hapus_data_dokdibawa($id) {
		$this->db->where('id_setting_vaksinlist', $id);
		$this->db->delete('setting_vaksinlist');
	}

	function ambil_id($id) {
		return $this->db->get_where('setting_vaksinlist', array('id_setting_vaksinlist' => $id))->row();
	}
 
}
?>