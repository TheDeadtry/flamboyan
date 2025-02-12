<?php
class M_namapolsek extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namapolsek($nama_polda, $alamat){

		$data = array (
			'namapolsek'=>$nama_polda, 
			'alamat'=>$alamat,
			);

		$this->db->insert('datanamapolsek',$data);
	}

	function tampil_data_namapolsek(){
		$sql = "SELECT * FROM datanamapolsek";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namapolsek() {
		$id = $this->input->post('id_namapolsek');
		$nama_polda = $this->input->post('nama_polda');
		$alamat = $this->input->post('alamat');
		$data = array(
			'namapolsek'=>$nama_polda, 
			'alamat'=>$alamat,
			);
		$this->db->where('id_namapolsek', $id);
		$this->db->update('datanamapolsek', $data);
	}

	function hapus_data_namapolsek() {
		$id = $this->input->post('id_namapolsek');
		$this->db->where('id_namapolsek', $id);
		$this->db->delete('datanamapolsek');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamapolsek', array('id_namapolsek' => $id))->row();
	}
 
}
?>