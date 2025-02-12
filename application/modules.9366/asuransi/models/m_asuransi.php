<?php
class M_asuransi extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_asuransi($nama_asuransi, $nama_asuransi_taiwan){

		$data = array (
			'isi'=>$nama_asuransi, 
			);

		$this->db->insert('dataasuransi',$data);
	}

	function tampil_data_asuransi(){
		$sql = "SELECT * FROM dataasuransi";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_asuransi() {
		$id = $this->input->post('id_asuransi');
		$nama = $this->input->post('nama_asuransi');
		$data = array(
			'isi' => $nama,
			);
		$this->db->where('id_asuransi', $id);
		$this->db->update('dataasuransi', $data);
	}

	function hapus_data_asuransi() {
		$id = $this->input->post('id_asuransi');
		$this->db->where('id_asuransi', $id);
		$this->db->delete('dataasuransi');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataasuransi', array('id_asuransi' => $id))->row();
	}
 
}
?>