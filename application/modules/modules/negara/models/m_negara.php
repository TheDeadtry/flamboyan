<?php
class M_negara extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_negara($kode_negara, $nama_negara, $nama_negara_taiwan){

		$data = array (
			'kode_negara'=>$kode_negara,
			'isi'=>$nama_negara, 
			'mandarin'=>$nama_negara_taiwan,
			);

		$this->db->insert('datanegara',$data);
	}

	function tampil_data_negara(){
		$sql = "SELECT * FROM datanegara";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function update_data_negara() {
			$id = $this->input->post('id_negara');
		$kode_negara = $this->input->post('kode_negara');
		$nama_negara = $this->input->post('nama_negara');
		$nama_negara_taiwan = $this->input->post('nama_negara_taiwan');
		$data = array(
			'kode_negara'=>$kode_negara,
			'isi'=>$nama_negara, 
			'mandarin'=>$nama_negara_taiwan,
			);
		$this->db->where('id_negara', $id);
		$this->db->update('datanegara', $data);
	}

	function hapus_data_negara() {
		$id = $this->input->post('id_negara');
		$this->db->where('id_negara', $id);
		$this->db->delete('datanegara');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanegara', array('id_negara' => $id))->row();
	}
 
}
?>