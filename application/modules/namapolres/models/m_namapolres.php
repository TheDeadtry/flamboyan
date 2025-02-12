<?php
class M_namapolres extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namapolres($nama_polda, $alamat){

		$data = array (
			'namapolres'=>$nama_polda, 
			'alamat'=>$alamat,
			);

		$this->db->insert('datanamapolres',$data);
	}

	function tampil_data_namapolres(){
		$sql = "SELECT * FROM datanamapolres";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namapolres() {
		$id = $this->input->post('id_namapolres');
		$nama_polda = $this->input->post('nama_polda');
		$alamat = $this->input->post('alamat');
		$data = array(
			'namapolres'=>$nama_polda, 
			'alamat'=>$alamat,
			);
		$this->db->where('id_namapolres', $id);
		$this->db->update('datanamapolres', $data);
	}

	function hapus_data_namapolres() {
		$id = $this->input->post('id_namapolres');
		$this->db->where('id_namapolres', $id);
		$this->db->delete('datanamapolres');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamapolres', array('id_namapolres' => $id))->row();
	}
 
}
?>