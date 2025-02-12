<?php
class M_pemilik extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_pemilik($nama_pemilik, $negara){

		$data = array (
			'nama_pemilik'=>$nama_pemilik, 
			'negara'=>$negara,
			);

		$this->db->insert('datapemilik',$data);
	}

	function tampil_data_pemilik(){
		$sql = "SELECT * FROM datapemilik";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function tampil_biaya(){
		$sql = "SELECT * FROM biaya where id_biaya='1'";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_pemilik() {
		$id = $this->input->post('id_pemilik');
		$nama = $this->input->post('nama_pemilik');
		$taiw = $this->input->post('negara');
		$data = array(
			'nama_pemilik' => $nama,
			'negara' => $taiw,
			);
		$this->db->where('id_pemilik', $id);
		$this->db->update('datapemilik', $data);
	}

	function updatebiaya() {
		$biaya = $this->input->post('biaya');
		$data = array(
			'biaya' => $biaya,
			);
		$this->db->where('id_biaya','1');
		$this->db->update('biaya', $data);
	}

	function hapus_data_pemilik() {
		$id = $this->input->post('id_pemilik');
		$this->db->where('id_pemilik', $id);
		$this->db->delete('datapemilik');
	}

	function ambil_id($id) {
		return $this->db->get_where('datapemilik', array('id_pemilik' => $id))->row();
	}
 
}
?>