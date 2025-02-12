<?php
class M_provinsi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_provinsi($nama_provinsi, $nama_provinsi_taiwan){

		$data = array (
			'isi'=>$nama_provinsi, 
			'mandarin'=>$nama_provinsi_taiwan,
			);

		$this->db->insert('dataprovinsi',$data);
	}

	function tampil_data_provinsi(){
		$sql = "SELECT * FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_provinsi() {
		$id = $this->input->post('id_provinsi');
		$nama_provinsi = $this->input->post('nama_provinsi');
		$nama_provinsi_taiwan = $this->input->post('nama_provinsi_taiwan');

		$data = array(
			'isi'=>$nama_provinsi, 
			'mandarin'=>$nama_provinsi_taiwan
			);
		$this->db->where('id_provinsi', $id);
		$this->db->update('dataprovinsi', $data);
	}

		function hapus_provinsi() {
		$id = $this->input->post('id_provinsi');
		$this->db->where('id_provinsi', $id);
		$this->db->delete('dataprovinsi');
	}
 
}
?>