<?php
class M_namapap extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namapap($nama_namapap, $nama_namapap_taiwan){

		$data = array (
			'isi'=>$nama_namapap, 
			'mandarin'=>$nama_namapap_taiwan,
			);

		$this->db->insert('datanamapap',$data);
	}

	function tampil_data_namapap(){
		$sql = "SELECT * FROM datanamapap";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namapap() {
		$id = $this->input->post('id_namapap');
		$nama = $this->input->post('nama_namapap');
		$taiw = $this->input->post('nama_namapap_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_namapap', $id);
		$this->db->update('datanamapap', $data);
	}

	function hapus_data_namapap() {
		$id = $this->input->post('id_namapap');
		$this->db->where('id_namapap', $id);
		$this->db->delete('datanamapap');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamapap', array('id_namapap' => $id))->row();
	}
 
}
?>