<?php
class M_medical extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_medical($nama_medical, $nama_medical_taiwan){

		$data = array (
			'isi'=>$nama_medical, 
			'mandarin'=>$nama_medical_taiwan,
			);

		$this->db->insert('datamedical',$data);
	}

	function tampil_data_medical(){
		$sql = "SELECT * FROM datamedical";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_medical() {
		$id = $this->input->post('id_medical');
		$nama = $this->input->post('nama_medical');
		$taiw = $this->input->post('nama_medical_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_medical', $id);
		$this->db->update('datamedical', $data);
	}

	function hapus_data_medical() {
		$id = $this->input->post('id_medical');
		$this->db->where('id_medical', $id);
		$this->db->delete('datamedical');
	}

	function ambil_id($id) {
		return $this->db->get_where('datamedical', array('id_medical' => $id))->row();
	}
 
}
?>