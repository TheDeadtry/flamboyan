<?php
class M_setting_data_pelajaran extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	//============================================= Graha Laundry=======================================================//
	
	function tampil_data_graha_laundry(){
		$sql = "SELECT * FROM blk_pelajaran_graha_laundry";
        $query = $this->db->query($sql);
		return $query->result_array();
	}

	function simpan_data_graha_laundry(){
		
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,			
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_graha_laundry',$data);
	}
	function update_data_graha_laundry() {
		$id 				= $this->input->post('id_graha_laundry');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array(
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,					
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_graha_laundry', $id);
		$this->db->update('blk_pelajaran_graha_laundry', $data);
	}
	function hapus_data_graha_laundry() {
		$id = $this->input->post('id_graha_laundry');
		$this->db->where('id_graha_laundry', $id);
		$this->db->delete('blk_pelajaran_graha_laundry');
	}

	//============================================= Graha Ruang =======================================================//
	
	function tampil_data_graha_ruang(){
		$sql = "SELECT * FROM blk_pelajaran_graha_ruang";
        $query = $this->db->query($sql);
		return $query->result_array();
	}

	function simpan_data_graha_ruang(){
		
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_graha_ruang',$data);
	}
	function update_data_graha_ruang() {
		$id 				= $this->input->post('id_graha_ruang');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array(
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,					
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_graha_ruang', $id);
		$this->db->update('blk_pelajaran_graha_ruang', $data);
	}
	function hapus_data_graha_ruang() {
		$id = $this->input->post('id_graha_ruang');
		$this->db->where('id_graha_ruang', $id);
		$this->db->delete('blk_pelajaran_graha_ruang');
	}

	//============================================= Graha Boga =======================================================//
	
	function tampil_data_graha_boga(){
		$sql = "SELECT * FROM blk_pelajaran_graha_boga";
        $query = $this->db->query($sql);
		return $query->result_array();
	}

	function simpan_data_graha_boga(){
		
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_graha_boga',$data);
	}
	function update_data_graha_boga() {
		$id 				= $this->input->post('id_graha_boga');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array(
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,					
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_graha_boga', $id);
		$this->db->update('blk_pelajaran_graha_boga', $data);
	}
	function hapus_data_graha_boga() {
		$id = $this->input->post('id_graha_boga');
		$this->db->where('id_graha_boga', $id);
		$this->db->delete('blk_pelajaran_graha_boga');
	}

	//============================================= Fisik Mental =======================================================//
	
	function tampil_data_fisik_mental(){
		$sql = "SELECT * FROM blk_pelajaran_fisik_mental";
        $query = $this->db->query($sql);
		return $query->result_array();
	}
	function simpan_data_fisik_mental(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_fisik_mental',$data);
	}
	function update_data_fisik_mental() {
		$id 				= $this->input->post('id_fisik_mental');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_fisik_mental', $id);
		$this->db->update('blk_pelajaran_fisik_mental', $data);
	}
	function hapus_data_fisik_mental() {
		$id = $this->input->post('id_fisik_mental');
		$this->db->where('id_fisik_mental', $id);
		$this->db->delete('blk_pelajaran_fisik_mental');
	}

	//============================================= Jompo =======================================================//
	
	function tampil_data_jompo(){
		$sql = "SELECT * FROM blk_pelajaran_jompo";
        $query = $this->db->query($sql);
		return $query->result_array();
	}
	function simpan_data_jompo(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_jompo',$data);
	}
	function update_data_jompo() {
		$id 				= $this->input->post('id_jompo');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_jompo', $id);
		$this->db->update('blk_pelajaran_jompo', $data);
	}
	function hapus_data_jompo() {
		$id = $this->input->post('id_jompo');
		$this->db->where('id_jompo', $id);
		$this->db->delete('blk_pelajaran_jompo');
	}

	//============================================= Bahasa Taiyu =======================================================//
	
	function tampil_data_bhs_taiyu(){
		$sql = "SELECT * FROM blk_pelajaran_bhs_taiyu";
                $query = $this->db->query($sql);

            return $query->result_array();
	}
	function simpan_data_bhs_taiyu(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_bhs_taiyu',$data);
	}
	function update_data_bhs_taiyu() {
		$id 				= $this->input->post('id_bhs_taiyu');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_bhs_taiyu', $id);
		$this->db->update('blk_pelajaran_bhs_taiyu', $data);
	}
	function hapus_data_bhs_taiyu() {
		$id = $this->input->post('id_bhs_taiyu');
		$this->db->where('id_bhs_taiyu', $id);
		$this->db->delete('blk_pelajaran_bhs_taiyu');
	}

	//============================================= Mandarin Informal-Jompo =======================================================//
	
	function tampil_data_mandarin_inf_jompo(){
		$sql = "SELECT * FROM blk_pelajaran_mandarin_inf_jompo";
                $query = $this->db->query($sql);

            return $query->result_array();
	}
	function simpan_data_mandarin_inf_jompo(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_mandarin_inf_jompo',$data);
	}
	function update_data_mandarin_inf_jompo() {
		$id 				= $this->input->post('id_mandarin_inf_jompo');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_mandarin_inf_jompo', $id);
		$this->db->update('blk_pelajaran_mandarin_inf_jompo', $data);
	}
	function hapus_data_mandarin_inf_jompo() {
		$id = $this->input->post('id_mandarin_inf_jompo');
		$this->db->where('id_mandarin_inf_jompo', $id);
		$this->db->delete('blk_pelajaran_mandarin_inf_jompo');
	}

	//============================================= Tata Boga =======================================================//
	
	function tampil_data_tata_boga(){
		$sql = "SELECT * FROM blk_pelajaran_tata_boga";
                $query = $this->db->query($sql);

            return $query->result_array();
	}
	function simpan_data_tata_boga(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_tata_boga',$data);
	}
	function update_data_tata_boga() {
		$id 				= $this->input->post('id_tata_boga');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_tata_boga', $id);
		$this->db->update('blk_pelajaran_tata_boga', $data);
	}
	function hapus_data_tata_boga() {
		$id = $this->input->post('id_tata_boga');
		$this->db->where('id_tata_boga', $id);
		$this->db->delete('blk_pelajaran_tata_boga');
	}

	//============================================= Psikotest =======================================================//
	
	function tampil_data_psikotest(){
		$sql = "SELECT * FROM blk_pelajaran_psikotest";
                $query = $this->db->query($sql);

            return $query->result_array();
	}
	function simpan_data_psikotest(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_psikotest',$data);
	}
	function update_data_psikotest() {
		$id 				= $this->input->post('id_psikotest');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_psikotest', $id);
		$this->db->update('blk_pelajaran_psikotest', $data);
	}
	function hapus_data_psikotest() {
		$id = $this->input->post('id_psikotest');
		$this->db->where('id_psikotest', $id);
		$this->db->delete('blk_pelajaran_psikotest');
	}

	//============================================= Mandarin Pabrik =======================================================//
	
	function tampil_data_mandarin_pabrik(){
		$sql = "SELECT * FROM blk_pelajaran_mandarin_pabrik";
                $query = $this->db->query($sql);

            return $query->result_array();
	}
	function simpan_data_mandarin_pabrik(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_mandarin_pabrik',$data);
	}
	function update_data_mandarin_pabrik() {
		$id 				= $this->input->post('id_mandarin_pabrik');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_mandarin_pabrik', $id);
		$this->db->update('blk_pelajaran_mandarin_pabrik', $data);
	}
	function hapus_data_mandarin_pabrik() {
		$id = $this->input->post('id_mandarin_pabrik');
		$this->db->where('id_mandarin_pabrik', $id);
		$this->db->delete('blk_pelajaran_mandarin_pabrik');
	}

	//============================================= Olah Raga =======================================================//
	
	function tampil_data_olah_raga(){
		$sql = "SELECT * FROM blk_pelajaran_olah_raga";
                $query = $this->db->query($sql);

            return $query->result_array();
	}
	function simpan_data_olah_raga(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_olah_raga',$data);
	}
	function update_data_olah_raga() {
		$id 				= $this->input->post('id_olah_raga');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_olah_raga', $id);
		$this->db->update('blk_pelajaran_olah_raga', $data);
	}
	function hapus_data_olah_raga() {
		$id = $this->input->post('id_olah_raga');
		$this->db->where('id_olah_raga', $id);
		$this->db->delete('blk_pelajaran_olah_raga');
	}

	//============================================= Berhitung =======================================================//
	
	function tampil_data_berhitung(){
		$sql = "SELECT * FROM blk_pelajaran_berhitung";
                $query = $this->db->query($sql);

            return $query->result_array();
	}
	function simpan_data_berhitung(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_berhitung',$data);
	}
	function update_data_berhitung() {
		$id 				= $this->input->post('id_berhitung');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_berhitung', $id);
		$this->db->update('blk_pelajaran_berhitung', $data);
	}
	function hapus_data_berhitung() {
		$id = $this->input->post('id_berhitung');
		$this->db->where('id_berhitung', $id);
		$this->db->delete('blk_pelajaran_berhitung');
	}

	//============================================= Umum =======================================================//
	
	function tampil_data_umum(){
		$sql = "SELECT * FROM blk_pelajaran_umum";
                $query = $this->db->query($sql);

            return $query->result_array();
	}
	function simpan_data_umum(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_umum',$data);
	}
	function update_data_umum() {
		$id 				= $this->input->post('id_umum');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_umum', $id);
		$this->db->update('blk_pelajaran_umum', $data);
	}
	function hapus_data_umum() {
		$id = $this->input->post('id_umum');
		$this->db->where('id_umum', $id);
		$this->db->delete('blk_pelajaran_umum');
	}

	//============================================= Graha Pagi/Sore =======================================================//
	
	function tampil_data_graha_ps(){
		$sql = "SELECT * FROM blk_pelajaran_graha_ps";
        $query = $this->db->query($sql);
		return $query->result_array();
	}

	function simpan_data_graha_ps(){
		
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_graha_ps',$data);
	}
	function update_data_graha_ps() {
		$id 				= $this->input->post('id_graha_ps');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array(
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,					
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_graha_ps', $id);
		$this->db->update('blk_pelajaran_graha_ps', $data);
	}
	function hapus_data_graha_ps() {
		$id = $this->input->post('id_graha_ps');
		$this->db->where('id_graha_ps', $id);
		$this->db->delete('blk_pelajaran_graha_ps');
	}
	//============================================= teori Boga =======================================================//
	
	function tampil_data_teori_boga(){
		$sql = "SELECT * FROM blk_pelajaran_teori_boga";
                $query = $this->db->query($sql);

            return $query->result_array();
	}
	function simpan_data_teori_boga(){
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->insert('blk_pelajaran_teori_boga',$data);
	}
	function update_data_teori_boga() {
		$id 				= $this->input->post('id_teori_boga');
		$kode_materi		= $this->input->post('kode_materi');
		$nama_materi 		= $this->input->post('nama_materi');
		$buku_hal 			= $this->input->post('buku_hal');
		$penjelasan 		= $this->input->post('penjelasan');
		$ket				= $this->input->post('ket');
		$data = array (
			'kode_materi'		=>	$kode_materi,			
			'nama_materi'		=>	$nama_materi,			
			'buku_hal'			=>	$buku_hal,		
			'penjelasan' 		=>	$penjelasan,			
			'keterangan'		=>	$ket			
			);
		$this->db->where('id_teori_boga', $id);
		$this->db->update('blk_pelajaran_teori_boga', $data);
	}
	function hapus_data_teori_boga() {
		$id = $this->input->post('id_teori_boga');
		$this->db->where('id_teori_boga', $id);
		$this->db->delete('blk_pelajaran_teori_boga');
	}
}
?>