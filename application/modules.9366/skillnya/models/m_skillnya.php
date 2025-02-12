<?php
class M_skillnya extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_skillnya($kode_skillnya, $nama_skillnya){

		$data = array (
			'kode_skillnya'=>$kode_skillnya,
			'isi'=>$nama_skillnya, 
			);

		$this->db->insert('dataskillnya',$data);
	}

	function tampil_data_skillnya(){
		$sql = "SELECT * FROM dataskillnya";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function update_data_skillnya($id) {
		$kode_skillnya = $this->input->post('kode_skillnya');
		$nama_skillnya = $this->input->post('nama_skillnya');
		$data = array(
			'kode_skillnya'=>$kode_skillnya,
			'isi'=>$nama_skillnya, 
						);
		$this->db->where('id_skillnya', $id);
		$this->db->update('dataskillnya', $data);
	}

	function hapus_data_skillnya($id) {
		$this->db->where('id_skillnya', $id);
		$this->db->delete('dataskillnya');
	}

	function ambil_id($id) {
		return $this->db->get_where('dataskillnya', array('id_skillnya' => $id))->row();
	}
 
}
?>