<?php
class M_nikpptkis extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_dokdibawa($status,$nama){

		$data = array (
			'nik'=>$status, 
			'nama'=>$nama, 
			);

		$this->db->insert('setting_nikpptkis',$data);
	}

	function tampil_data_dokdibawa(){
		$sql = "SELECT * FROM setting_nikpptkis";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_dokdibawa() {
		$id = $this->input->post('id_kategori');
		$nama = $this->input->post('nama');
		$status = $this->input->post('status');
		$data = array(
			'nama'=>$nama, 
			'nik'=>$status, 
			);
		$this->db->where('id_setting_nikpptkis', $id);
		$this->db->update('setting_nikpptkis', $data);
	}

	function hapus_data_dokdibawa($id) {
		$this->db->where('id_setting_nikpptkis', $id);
		$this->db->delete('setting_nikpptkis');
	}

	function ambil_id($id) {
		return $this->db->get_where('setting_nikpptkis', array('id_setting_nikpptkis' => $id))->row();
	}
 
}
?>