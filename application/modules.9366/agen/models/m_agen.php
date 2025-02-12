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
			'notel'=> $this->input->post('notelp'),
			'nofax'=> $this->input->post('nofax'), 
			'direktur'=> $this->input->post('direktur'),
			'direktur2'=> $this->input->post('direktur2'),
			'jabatan_man'=> $this->input->post('jabatan_man'),
			'jabatan_indo'=> $this->input->post('jabatan_indo'),
			'nosiup'=> $this->input->post('nosiup'),
			'hp'=> $this->input->post('hp'),
			'email'=> $this->input->post('email'),
			'alamat'=> $this->input->post('alamat'),
			'alamatmandarin'=> $this->input->post('alamatmandarin'),
			'kode_group'=> $this->input->post('group'),
			
			'noagree'=> $this->input->post('noagree'),
			'jenisagre'=> $this->input->post('jenisagre'),
			'berlaku'=> $this->input->post('berlaku'),
			'selesai'=> $this->input->post('selesai'),
			'tgl_terimaagree'=> $this->input->post('tgl_terimaagree'),

			'noagree2'=> $this->input->post('noagree2'),
			'jenisagre2'=> $this->input->post('jenisagre2'),
			'berlaku2'=> $this->input->post('berlaku2'),
			'selesai2'=> $this->input->post('selesai2'),
			'tgl_terimaagree2'=> $this->input->post('tgl_terimaagree2'),
			
			'noagree3'=> $this->input->post('noagree3'),
			'jenisagre3'=> $this->input->post('jenisagre3'),
			'berlaku3'=> $this->input->post('berlaku3'),
			'selesai3'=> $this->input->post('selesai3'),
			'tgl_terimaagree3'=> $this->input->post('tgl_terimaagree3'),

			'komnama'=> $this->input->post('komnama'),
			'komline'=> $this->input->post('komline'),
			'komskype'=> $this->input->post('komskype'),
			'komhp'=> $this->input->post('komhp'),

			'keterangan'=> $this->input->post('keterangan'),
			'username'=> $this->input->post('username'),
			'password'=>"5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8",
			'status'=>"2",  
			);



		$this->db->insert('dataagen',$data);
	}

	        function tampil_data_detail($id_agen){
        $sql = "SELECT * FROM detail_dokumen where id_agen='$id_agen'";
                $query = $this->db->query($sql);

            return $query->result();
    } 

         function tampil_data_dok(){
        $sql = "SELECT * FROM datadokdibawa order by isi ASC";
                $query = $this->db->query($sql);
            return $query->result();
    }


  function simpandokumen(){

		$data = array (
			'id_agen'=> $this->input->post('id_agen'),
			'dokumen'=> $this->input->post('dokumen'),
			'status'=> $this->input->post('status'),
			'stats'=> $this->input->post('stats'),
			'type_permintaan'=> $this->input->post('type_permintaan'),
			);
		$this->db->insert('detail_dokumen',$data);
	}
 	function updatedokumen() {
		$id = $this->input->post('id_pembuatan');
		$data = array(
			'dokumen'=> $this->input->post('dokumen'),
			'status'=> $this->input->post('status'),
			'stats'=> $this->input->post('stats'),
			'type_permintaan'=> $this->input->post('type_permintaan'),
			);
		$this->db->where('id_pembuatan', $id);
		$this->db->update('detail_dokumen', $data);
	}
		function hapusdokumen() {
		$id = $this->input->post('id_pembuatan');
		$this->db->where('id_pembuatan', $id);
		$this->db->delete('detail_dokumen');
	}




	 	function update_agen() {
		$id = $this->input->post('id_agen');
		$data = array (
			'kode_agen'=> $this->input->post('kode'),
			'nama'=> $this->input->post('nama'),
			'namamandarin'=> $this->input->post('namamandarin'),
			'notel'=> $this->input->post('notel'),
			'nofax'=> $this->input->post('nofax'), 
			'direktur'=> $this->input->post('direktur'),
			'direktur2'=> $this->input->post('direktur2'),
			'jabatan_man'=> $this->input->post('jabatan_man'),
			'jabatan_indo'=> $this->input->post('jabatan_indo'),
			'nosiup'=> $this->input->post('nosiup'),
			'hp'=> $this->input->post('hp'),
			'email'=> $this->input->post('email'),
			'alamat'=> $this->input->post('alamat'),
			'alamatmandarin'=> $this->input->post('alamatmandarin'),
			'kode_group'=> $this->input->post('group'),

			'noagree'=> $this->input->post('noagree'),
			'jenisagre'=> $this->input->post('jenisagre'),
			'berlaku'=> $this->input->post('berlaku'),
			'selesai'=> $this->input->post('selesai'),
			'tgl_terimaagree'=> $this->input->post('tgl_terimaagree'),

			'noagree2'=> $this->input->post('noagree2'),
			'jenisagre2'=> $this->input->post('jenisagre2'),
			'berlaku2'=> $this->input->post('berlaku2'),
			'selesai2'=> $this->input->post('selesai2'),
			'tgl_terimaagree2'=> $this->input->post('tgl_terimaagree2'),
			
			'noagree3'=> $this->input->post('noagree3'),
			'jenisagre3'=> $this->input->post('jenisagre3'),
			'berlaku3'=> $this->input->post('berlaku3'),
			'selesai3'=> $this->input->post('selesai3'),
			'tgl_terimaagree3'=> $this->input->post('tgl_terimaagree3'),

			'komnama'=> $this->input->post('komnama'),
			'komline'=> $this->input->post('komline'),
			'komskype'=> $this->input->post('komskype'),
			'komhp'=> $this->input->post('komhp'),

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
	
		function tampil_data_agen_group(){
			$kodegr = $this->input->post('kodegroup');
		$sql = "SELECT * FROM dataagen WHERE kode_group='$kodegr'";
                $query = $this->db->query($sql);

            return $query->result();
	}

			function tampil_data_agree1($id_agen){
		$sql = "SELECT * FROM agenagree1 WHERE id_agen='$id_agen' ORDER BY id_agree1 DESC";
                $query = $this->db->query($sql);

            return $query->result();
	}


		function tampil_data_group(){
		$sql = "SELECT * FROM datagroup where kode_group!=''";
                $query = $this->db->query($sql);

            return $query->result();
	} 
			function tampil_pilihan_group2(){
		$sql = "SELECT *,datagroup.nama as namagroup 
FROM dataagen 
LEFT JOIN datagroup 
ON dataagen.kode_group=datagroup.id_group";
                $query = $this->db->query($sql);

            return $query->result();
	}

function tampil_pilihan_group(){
		$sql = "SELECT * FROM datagroup";
                $query = $this->db->query($sql);

            return $query->result();
	}

			function tampil_nama_agree1($id_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen WHERE id_agen='$id_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
			function tampil_jenis_agree1($id_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen WHERE id_agen='$id_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jenisagre'];
			}
		return $kode_desa;
	} 



  function simpan_data_agree1(){

		$data = array (
			'id_agen'=> $this->input->post('id_agen'),
			'noagree1'=> $this->input->post('noagree'),
			'tglberlaku1'=> $this->input->post('berlaku'),
			'tglberakhir1'=> $this->input->post('selesai'),
			'tglterima1'=> $this->input->post('tgl_terimaagree'),
			);
		$this->db->insert('agenagree1',$data);
	}
 	function update_agree1() {
		$id = $this->input->post('id_agree1');
		$data = array(
			'noagree1'=> $this->input->post('noagree'),
			'tglberlaku1'=> $this->input->post('berlaku'),
			'tglberakhir1'=> $this->input->post('selesai'),
			'tglterima1'=> $this->input->post('tgl_terimaagree'),
			);
		$this->db->where('id_agree1', $id);
		$this->db->update('agenagree1', $data);
	}
		function hapus_agree1() {
		$id = $this->input->post('id_agree1');
		$this->db->where('id_agree1', $id);
		$this->db->delete('agenagree1');
	}


			function tampil_data_agree2($id_agen){
		$sql = "SELECT * FROM agenagree2 WHERE id_agen='$id_agen' ORDER BY id_agree2 DESC";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_nama_agree2($id_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen WHERE id_agen='$id_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
			function tampil_jenis_agree2($id_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen WHERE id_agen='$id_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jenisagre2'];
			}
		return $kode_desa;
	} 

  function simpan_data_agree2(){

		$data = array (
			'id_agen'=> $this->input->post('id_agen'),
			'noagree2'=> $this->input->post('noagree'),
			'tglberlaku2'=> $this->input->post('berlaku'),
			'tglberakhir2'=> $this->input->post('selesai'),
			'tglterima2'=> $this->input->post('tgl_terimaagree'),
			);
		$this->db->insert('agenagree2',$data);
	}
 	function update_agree2() {
		$id = $this->input->post('id_agree2');
		$data = array(
			'noagree2'=> $this->input->post('noagree'),
			'tglberlaku2'=> $this->input->post('berlaku'),
			'tglberakhir2'=> $this->input->post('selesai'),
			'tglterima2'=> $this->input->post('tgl_terimaagree'),
			);
		$this->db->where('id_agree2', $id);
		$this->db->update('agenagree2', $data);
	}
		function hapus_agree2() {
		$id = $this->input->post('id_agree2');
		$this->db->where('id_agree2', $id);
		$this->db->delete('agenagree2');
	}



	function tampil_data_agree3($id_agen){
		$sql = "SELECT * FROM agenagree3 WHERE id_agen='$id_agen' ORDER BY id_agree3 DESC";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_nama_agree3($id_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen WHERE id_agen='$id_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
			function tampil_jenis_agree3($id_agen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen WHERE id_agen='$id_agen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jenisagre3'];
			}
		return $kode_desa;
	} 

  function simpan_data_agree3(){

		$data = array (
			'id_agen'=> $this->input->post('id_agen'),
			'noagree3'=> $this->input->post('noagree'),
			'tglberlaku3'=> $this->input->post('berlaku'),
			'tglberakhir3'=> $this->input->post('selesai'),
			'tglterima3'=> $this->input->post('tgl_terimaagree'),
			);
		$this->db->insert('agenagree3',$data);
	}
 	function update_agree3() {
		$id = $this->input->post('id_agree3');
		$data = array(
			'noagree3'=> $this->input->post('noagree'),
			'tglberlaku3'=> $this->input->post('berlaku'),
			'tglberakhir3'=> $this->input->post('selesai'),
			'tglterima3'=> $this->input->post('tgl_terimaagree'),
			);
		$this->db->where('id_agree3', $id);
		$this->db->update('agenagree3', $data);
	}
		function hapus_agree3() {
		$id = $this->input->post('id_agree3');
		$this->db->where('id_agree3', $id);
		$this->db->delete('agenagree3');
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