<?php
class M_agen extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_agen(){

		$data = array (
			'kode_agen'=> $this->input->post('kode'),
			'nama'=> $this->input->post('nama'),
			'namamandarin'=> $this->input->post('namamandarin'),
			'notel'=> $this->input->post('alamat'),
			'nofax'=> $this->input->post('alamatmandarin'), 
			'direktur'=> $this->input->post('direktur'),
			'nosiup'=> $this->input->post('nosiup'),
			'hp'=> $this->input->post('hp'),
			'email'=> $this->input->post('alamat'),
			'alamat'=> $this->input->post('alamat'),
			'alamatmandarin'=> $this->input->post('alamatmandarin'),
			'kode_group'=> $this->input->post('group'),

			'jenisagre'=> $this->input->post('jenisagre'),
			'berlaku'=> $this->input->post('berlaku'),
			'selesai'=> $this->input->post('selesai'),

			'jenisagre2'=> $this->input->post('jenisagre2'),
			'berlaku2'=> $this->input->post('berlaku2'),
			'selesai2'=> $this->input->post('selesai2'),

			'jenisagre3'=> $this->input->post('jenisagre3'),
			'berlaku3'=> $this->input->post('berlaku3'),
			'selesai3'=> $this->input->post('selesai3'),

			'keterangan'=> $this->input->post('keterangan'),
			'username'=> $this->input->post('username'),
			'password'=>"5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8",
			'status'=>"2",  
			);



		$this->db->insert('dataagen',$data);
	}

	 	function update_agen() {
		$id = $this->input->post('id_agen');
		$data = array (
			'kode_agen'=> $this->input->post('kode'),
			'nama'=> $this->input->post('nama'),
			'namamandarin'=> $this->input->post('namamandarin'),
			'notel'=> $this->input->post('alamat'),
			'nofax'=> $this->input->post('alamatmandarin'), 
			'direktur'=> $this->input->post('direktur'),
			'nosiup'=> $this->input->post('nosiup'),
			'hp'=> $this->input->post('hp'),
			'email'=> $this->input->post('alamat'),
			'alamat'=> $this->input->post('alamat'),
			'alamatmandarin'=> $this->input->post('alamatmandarin'),
			'kode_group'=> $this->input->post('group'),

			'jenisagre'=> $this->input->post('jenisagre'),
			'berlaku'=> $this->input->post('berlaku'),
			'selesai'=> $this->input->post('selesai'),

			'jenisagre2'=> $this->input->post('jenisagre2'),
			'berlaku2'=> $this->input->post('berlaku2'),
			'selesai2'=> $this->input->post('selesai2'),

			'jenisagre3'=> $this->input->post('jenisagre3'),
			'berlaku3'=> $this->input->post('berlaku3'),
			'selesai3'=> $this->input->post('selesai3'),

			'keterangan'=> $this->input->post('keterangan'),
			'username'=> $this->input->post('username'),
			'password'=>"5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8",
			'status'=>"2",  
			);
		$this->db->where('id_agen', $id);
		$this->db->update('dataagen', $data);
	}




	function tampil_data_agen(){
		$sql = "SELECT * FROM dataagen";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_group(){
		$sql = "SELECT * FROM datagroup where kode_group!=''";
                $query = $this->db->query($sql);

            return $query->result();
	} 
			function tampil_pilihan_group(){
		$sql = "SELECT * FROM datagroup";
                $query = $this->db->query($sql);

            return $query->result();
	}
 
 	function update_group() {
		$id = $this->input->post('id_group');
		$data = array(
				'kode_group'=> $this->input->post('kode'),
			'nama'=> $this->input->post('nama'),
			'namamandarin'=> $this->input->post('namamandarin'),
			'alamat'=> $this->input->post('alamat'),
			'alamatmandarin'=> $this->input->post('alamatmandarin'), 
			'direktur'=> $this->input->post('direktur'),
			'notelp'=> $this->input->post('notelp'),
			'nofax'=> $this->input->post('nofax'),
			'tanggungnama'=> $this->input->post('tanggungnama'),
			'tanggungline'=> $this->input->post('tanggungline'),
			'komnama'=> $this->input->post('komnama'),
			'komline'=> $this->input->post('komline'),
			'komskype'=> $this->input->post('komskype'),
			'komhp'=> $this->input->post('komhp'),
			'agenbergabung'=> $this->input->post('agenbergabung'),
			'keterangan'=> $this->input->post('keterangan'),
			'password'=>"5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8",  

			);
		$this->db->where('id_group', $id);
		$this->db->update('datagroup', $data);
	}


		 function simpan_data_group(){

		$data = array (
			'kode_group'=> $this->input->post('kode'),
			'nama'=> $this->input->post('nama'),
			'namamandarin'=> $this->input->post('namamandarin'),
			'alamat'=> $this->input->post('alamat'),
			'alamatmandarin'=> $this->input->post('alamatmandarin'), 
			'direktur'=> $this->input->post('direktur'),
			'notelp'=> $this->input->post('notelp'),
			'nofax'=> $this->input->post('nofax'),
			'tanggungnama'=> $this->input->post('tanggungnama'),
			'tanggungline'=> $this->input->post('tanggungline'),
			'komnama'=> $this->input->post('komnama'),
			'komline'=> $this->input->post('komline'),
			'komskype'=> $this->input->post('komskype'),
			'komhp'=> $this->input->post('komhp'),
			'agenbergabung'=> $this->input->post('agenbergabung'),
			'keterangan'=> $this->input->post('keterangan'),
			'password'=>"5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8",  
			);

		$this->db->insert('datagroup',$data);
	}

	function hapus_group() {
		$id = $this->input->post('id_group');
		$this->db->where('id_group', $id);
		$this->db->delete('datagroup');
	}

	function hapus_agen() {
		$id = $this->input->post('id_agen');
		$this->db->where('id_agen', $id);
		$this->db->delete('dataagen');
	}

}
?>