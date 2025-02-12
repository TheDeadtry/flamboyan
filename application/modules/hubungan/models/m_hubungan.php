<?php
class M_hubungan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_hubungan($nama_hubungan, $nama_hubungan_taiwan){

		$data = array (
			'isi'=>$nama_hubungan, 
			'mandarin'=>$nama_hubungan_taiwan,
			);

		$this->db->insert('datahubungan',$data);
	}

	function tampil_data_hubungan(){
		$sql = "SELECT * FROM datahubungan";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_hubungan() {
		$id = $this->input->post('id_hubungan');
		$nama = $this->input->post('nama_hubungan');
		$taiw = $this->input->post('nama_hubungan_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_hubungan', $id);
		$this->db->update('datahubungan', $data);
	}

	function hapus_data_hubungan() {
		$id = $this->input->post('id_hubungan');
		$this->db->where('id_hubungan', $id);
		$this->db->delete('datahubungan');
	}

	function ambil_id($id) {
		return $this->db->get_where('datahubungan', array('id_hubungan' => $id))->row();
	}
 
}
?>