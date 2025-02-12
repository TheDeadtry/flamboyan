<?php
class M_namapolda extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namapolda($nama_polda, $alamat){

		$data = array (
			'namapolda'=>$nama_polda, 
			'alamat'=>$alamat,
			);

		$this->db->insert('datanamapolda',$data);
	}

	function tampil_data_namapolda(){
		$sql = "SELECT * FROM datanamapolda";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namapolda() {
		$id = $this->input->post('id_namapolda');
		$nama_polda = $this->input->post('nama_polda');
		$alamat = $this->input->post('alamat');
		$data = array(
			'namapolda'=>$nama_polda, 
			'alamat'=>$alamat,
			);
		$this->db->where('id_namapolda', $id);
		$this->db->update('datanamapolda', $data);
	}

	function hapus_data_namapolda() {
		$id = $this->input->post('id_namapolda');
		$this->db->where('id_namapolda', $id);
		$this->db->delete('datanamapolda');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamapolda', array('id_namapolda' => $id))->row();
	}
 
}
?>