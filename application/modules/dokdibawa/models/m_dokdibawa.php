<?php
class M_dokdibawa extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_dokdibawa($nama_dokdibawa){

		$data = array (
			'isi'=>$nama_dokdibawa, 
			);

		$this->db->insert('datadokdibawa',$data);
	}

	function tampil_data_dokdibawa(){
		$sql = "SELECT * FROM datadokdibawa";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_dokdibawa() {
		$id = $this->input->post('id_dokdibawa');
		$nama = $this->input->post('nama_dokdibawa');
		$data = array(
			'isi' => $nama,
			);
		$this->db->where('id_dokdibawa', $id);
		$this->db->update('datadokdibawa', $data);
	}

	function hapus_data_dokdibawa() {
		$id = $this->input->post('id_dokdibawa');
		$this->db->where('id_dokdibawa', $id);
		$this->db->delete('datadokdibawa');
	}

	function ambil_id($id) {
		return $this->db->get_where('datadokdibawa', array('id_dokdibawa' => $id))->row();
	}
 
}
?>