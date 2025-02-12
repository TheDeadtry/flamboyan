<?php
class M_proses extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_proses($nama_proses, $tgl_proses,$status_proses){

		$data = array (
			'nama_proses'=>$nama_proses, 
			'tanggalproses'=>$tgl_proses,
			'status'=>$status_proses,
			);

		$this->db->insert('proses',$data);
	}

	function tampil_data_proses(){
		$sql = "SELECT * FROM proses";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function detail_proses($id) {
		$nama = $this->input->post('nama_proses');
		$taiw = $this->input->post('nama_proses_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_proses', $id);
		$this->db->update('proses', $data);
	}

	function hapus_data_proses($id) {
		$this->db->where('kode_proses', $id);
		$this->db->delete('proses');
	}

	function ambil_id($id) {
		return $this->db->get_where('proses', array('id_proses' => $id))->row();
	}
 
}
?>