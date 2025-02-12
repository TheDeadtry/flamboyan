<?php
class M_namadisnaker extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_namadisnaker($nama_disnaker, $alamat_disnaker, $wilayah_disnaker){

		$data = array (
			'namadisnaker'=>$nama_disnaker, 
			'alamatdisnaker'=>$alamat_disnaker,
			'wilayah'=>$wilayah_disnaker,
			);

		$this->db->insert('datanamadisnaker',$data);
	}

	function tampil_data_namadisnaker(){
		$sql = "SELECT * FROM datanamadisnaker";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_namadisnaker() {
		$id = $this->input->post('id_namadisnaker');
		$nama_disnaker = $this->input->post('nama_disnaker');
		$alamat_disnaker = $this->input->post('alamat_disnaker');
		$wilayah_disnaker	= $this->input->post('wilayah_disnaker');
		$data = array(
			'namadisnaker'=>$nama_disnaker, 
			'alamatdisnaker'=>$alamat_disnaker,
			'wilayah'=>$wilayah_disnaker,
			);
		$this->db->where('id_namadisnaker', $id);
		$this->db->update('datanamadisnaker', $data);
	}

	function hapus_data_namadisnaker() {
		$id = $this->input->post('id_namadisnaker');
		$this->db->where('id_namadisnaker', $id);
		$this->db->delete('datanamadisnaker');
	}

	function ambil_id($id) {
		return $this->db->get_where('datanamadisnaker', array('id_namadisnaker' => $id))->row();
	}
 
}
?>