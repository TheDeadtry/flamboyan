<?php
class M_bank extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_bank($nama_bank, $nama_bank_taiwan){

		$data = array (
			'isi'=>$nama_bank, 
			'mandarin'=>$nama_bank_taiwan,
			);

		$this->db->insert('databank',$data);
	}

	function tampil_data_bank(){
		$sql = "SELECT * FROM databank";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
 	function update_data_bank() {
 		$id = $this->input->post('id_bank');
		$nama = $this->input->post('nama_bank');
		$taiw = $this->input->post('nama_bank_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_bank', $id);
		$this->db->update('databank', $data);
	}

	function hapus_data_bank() {
		$id = $this->input->post('id_bank');
		$this->db->where('id_bank', $id);
		$this->db->delete('databank');
	}

	function ambil_id($id) {
		return $this->db->get_where('databank', array('id_bank' => $id))->row();
	}
}
?>