<?php
class M_calling extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_calling($kode_calling, $nama_calling){

		$data = array (
			'kode_calling'=>$kode_calling,
			'isi'=>$nama_calling, 
			);

		$this->db->insert('datacalling',$data);
	}

	function tampil_data_calling(){
		$sql = "SELECT * FROM datacalling";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function update_data_calling($id) {
		$kode_calling = $this->input->post('kode_calling');
		$nama_calling = $this->input->post('nama_calling');
		$data = array(
			'kode_calling'=>$kode_calling,
			'isi'=>$nama_calling, 
			);
		$this->db->where('id_calling', $id);
		$this->db->update('datacalling', $data);
	}

	function hapus_data_calling($id) {
		$this->db->where('id_calling', $id);
		$this->db->delete('datacalling');
	}

	function ambil_id($id) {
		return $this->db->get_where('datacalling', array('id_calling' => $id))->row();
	}
 
}
?>