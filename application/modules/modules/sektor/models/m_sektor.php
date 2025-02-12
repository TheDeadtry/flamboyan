<?php
class M_sektor extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_sektor($kode_sektor, $nama_sektor, $nama_sektor_taiwan, $urut_sektor,$jenis_kelamin){

		$data = array (
			'kode_jenis'=>$kode_sektor, 
			'isi'=>$nama_sektor, 
			'isi_taiwan'=>$nama_sektor_taiwan,
			'no_urut'=>$urut_sektor,
			'jeniskelamin'=>$jenis_kelamin,

			);

		$this->db->insert('datasektor',$data);
	}

	function tampil_data_sektor(){
		$sql = "SELECT * FROM datasektor";
                $query = $this->db->query($sql);

            return $query->result();
	}

		function update_data_sektor($id) {
		$kode_sektor = $this->input->post('kode_sektor');
		$nama_sektor = $this->input->post('nama_sektor');
		$nama_sektor_taiwan = $this->input->post('nama_sektor_taiwan');
		$urut_sektor = $this->input->post('urut_sektor');
		$jenis_kelamin = $this->input->post('jenis_kelamin');

		$data = array(
			'kode_jenis'=>$kode_sektor, 
			'isi'=>$nama_sektor, 
			'isi_taiwan'=>$nama_sektor_taiwan,
			'no_urut'=>$urut_sektor,
			'jeniskelamin'=>$jenis_kelamin,
			);
		$this->db->where('id_jenis', $id);
		$this->db->update('datasektor', $data);
	}

	function hapus_data_sektor($id) {
		$this->db->where('id_jenis', $id);
		$this->db->delete('datasektor');
	}

	function ambil_id($id) {
		return $this->db->get_where('datasektor', array('id_jenis' => $id))->row();
	} 
 
}
?>