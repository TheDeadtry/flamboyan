<?php
class M_jobs extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 	function simpan_data_jobs($nama_jobs, $nama_jobs_taiwan){

		$data = array (
			'isi'=>$nama_jobs, 
			'mandarin'=>$nama_jobs_taiwan,
			);

		$this->db->insert('datajobs',$data);
	}

	function tampil_data_jobs(){
		$sql = "SELECT * FROM datajobs";
        $query = $this->db->query($sql);
        return $query->result();
	} 

	function update_data_jobs() {
		$id = $this->input->post('id_jobs');
		$nama = $this->input->post('nama_jobs');
		$taiw = $this->input->post('nama_jobs_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_jobs', $id);
		$this->db->update('datajobs', $data);
	}

	function hapus_data_jobs() {
		$id = $this->input->post('id_jobs');
		$this->db->where('id_jobs', $id);
		$this->db->delete('datajobs');
	}

	function ambil_id($id) {
		return $this->db->get_where('datajobs', array('id_jobs' => $id))->row();
	}
}
?>