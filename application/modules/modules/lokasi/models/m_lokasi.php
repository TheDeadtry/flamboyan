<?php
class M_lokasi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_lokasi($nama_lokasi, $nama_lokasi_taiwan){

		$data = array (
			'isi'=>$nama_lokasi, 
			'mandarin'=>$nama_lokasi_taiwan,
			);

		$this->db->insert('datalokasikerja',$data);
	}

	function tampil_data_lokasi(){
		$sql = "SELECT * FROM datalokasikerja";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 	function update_data_lokasi() {
 		$id = $this->input->post('id_lokasikerja');
		$nama = $this->input->post('nama_lokasi');
		$taiw = $this->input->post('nama_lokasi_taiwan');
		$data = array(
			'isi' => $nama,
			'mandarin' => $taiw,
			);
		$this->db->where('id_lokasikerja', $id);
		$this->db->update('datalokasikerja', $data);
	}

	function hapus_data_lokasi() {
		$id = $this->input->post('id_lokasikerja');
		$this->db->where('id_lokasikerja', $id);
		$this->db->delete('datalokasikerja');
	}

	function ambil_id($id) {
		return $this->db->get_where('datalokasikerja', array('id_lokasikerja' => $id))->row();
	}
}
?>