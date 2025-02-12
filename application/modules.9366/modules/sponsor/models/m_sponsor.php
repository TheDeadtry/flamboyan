<?php
class M_sponsor extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_sponsor($kode, $nama, $hp, $email,$alamat,$status){

		$data = array (
			'kode_sponsor'=>$kode, 
			'nama'=>$nama,
			'hp'=>$hp, 
			'email'=>$email, 
			'alamat'=>$alamat, 
			'status'=>$status, 

			);

		$this->db->insert('datasponsor',$data);
	}

	function tampil_data_sponsor(){
		$sql = "SELECT * FROM datasponsor";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function update_sponsor() {
		$id = $this->input->post('kode_sponsor');
		$data = array(
				'kode_sponsor' => $this->input->post('kode_sponsor'),
				'nama' => $this->input->post('nama'),
				'hp' => $this->input->post('hp'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'status' => $this->input->post('status'),
			);
		$this->db->where('kode_sponsor', $id);
		$this->db->update('datasponsor', $data);
	}

		function hapus_sponsor() {
		$id = $this->input->post('kode_sponsor');
		$this->db->where('kode_sponsor', $id);
		$this->db->delete('datasponsor');
	}
 
}
?>