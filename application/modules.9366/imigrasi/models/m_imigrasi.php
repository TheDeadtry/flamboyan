<?php
class M_imigrasi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_imigrasi($nama_imigrasi){

		$data = array (
			'isi'=>$nama_imigrasi, 
			);

		$this->db->insert('dataimigrasi',$data);
	}

	function tampil_data_imigrasi(){
		$sql = "SELECT * FROM dataimigrasi";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_imigrasi() {
		$id = $this->input->post('id_imigrasi');
		$nama = $this->input->post('nama_imigrasi');
		$data = array(
			'isi' => $nama,
			);
		$this->db->where('id_imigrasi', $id);
		$this->db->update('dataimigrasi', $data);
	}

	function hapus_data_imigrasi() {
		$id = $this->input->post('id_imigrasi');
		$this->db->where('id_imigrasi', $id);
		$this->db->delete('dataimigrasi');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataimigrasi', array('id_imigrasi' => $id))->row();
	}
 
}
?>