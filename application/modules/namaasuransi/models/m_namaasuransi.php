<?php
class M_namaasuransi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namaasuransi($nama_namaasuransi, $nama_namaasuransi_taiwan){

		$data = array (
			'isi'=>$nama_namaasuransi, 
			);

		$this->db->insert('datanamaasuransi',$data);
	}

	function tampil_data_namaasuransi(){
		$sql = "SELECT * FROM datanamaasuransi";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namaasuransi() {
		$id = $this->input->post('id_namaasuransi');
		$nama = $this->input->post('nama_namaasuransi');
		$data = array(
			'isi' => $nama,
			);
		$this->db->where('id_namaasuransi', $id);
		$this->db->update('datanamaasuransi', $data);
	}

	function hapus_data_namaasuransi() {
		$id = $this->input->post('id_namaasuransi');
		$this->db->where('id_namaasuransi', $id);
		$this->db->delete('datanamaasuransi');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamaasuransi', array('id_namaasuransi' => $id))->row();
	}
 
}
?>