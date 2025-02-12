<?php
class M_jabatan extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_jabatan($nama_jabatan, $nama_jabatan_taiwan){

		$data = array (
			'isi'=>$nama_jabatan, 
			'mandarin'=>$nama_jabatan_taiwan,
			);

		$this->db->insert('datajabatan',$data);
	}

	function tampil_data_jabatan(){
		$sql = "SELECT * FROM datajabatan";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_jabatan() {
		$id = $this->input->post('id_jabatan');
		$nama = $this->input->post('nama_jabatan');
		$taiw = $this->input->post('nama_jabatan_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_jabatan', $id);
		$this->db->update('datajabatan', $data);
	}

	function hapus_data_jabatan() {
				$id = $this->input->post('id_jabatan');

		$this->db->where('id_jabatan', $id);
		$this->db->delete('datajabatan');
	}

	function ambil_id($id) {
		return $this->db->get_where('datajabatan', array('id_jabatan' => $id))->row();
	}


 
}
?>