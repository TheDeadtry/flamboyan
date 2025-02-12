<?php
class M_namagaji extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namagaji($nama_desa){

		$data = array (
			'namagaji'=>$nama_desa, 
			);

		$this->db->insert('datanamagaji',$data);
	}

	function tampil_data_namagaji(){
		$sql = "SELECT * FROM datanamagaji";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namagaji() {
		$id = $this->input->post('id_namagaji');
		$nama_gaji = $this->input->post('nama_gaji');
		$data = array(
			'namagaji'=>$nama_gaji, 
			);
		$this->db->where('id_namagaji', $id);
		$this->db->update('datanamagaji', $data);
	}

	function hapus_data_namagaji() {
		$id = $this->input->post('id_namagaji');
		$this->db->where('id_namagaji', $id);
		$this->db->delete('datanamagaji');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamagaji', array('id_namagaji' => $id))->row();
	}
 
}
?>