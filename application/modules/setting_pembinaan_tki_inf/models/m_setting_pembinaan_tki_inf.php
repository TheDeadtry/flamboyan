<?php
class M_setting_pembinaan_tki_inf extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//==============================================INSTRUKTUR / STAF BLK======================================================//

 function simpan_data_instruktur(){
		
		$kode_instruktur	= $this->input->post('kode_instruktur');
		$nama				= $this->input->post('nama');
		$jabatan_tugas		= $this->input->post('jabatan_tugas');
		$data = array (
			'kode_instruktur'	=>	$kode_instruktur, 
			'nama'				=>	$nama,
			'jabatan_tugas'		=>	$jabatan_tugas
			);
		$this->db->insert('blk_instruktur',$data);
	}

	function tampil_data_instruktur(){
		$sql = "SELECT * FROM blk_instruktur";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_instruktur() {
		$id				 = $this->input->post('id_instruktur');
		$kode_instruktur = $this->input->post('kode_instruktur');
		$nama			 = $this->input->post('nama');
		$jabatan_tugas 	 = $this->input->post('jabatan_tugas');
		$data = array(
			'kode_instruktur' 	=> $kode_instruktur,
			'nama' 				=> $nama,
			'jabatan_tugas' 	=> $jabatan_tugas
			);
		$this->db->where('id_instruktur', $id);
		$this->db->update('blk_instruktur', $data);
	}

	function hapus_data_instruktur() {
		$id = $this->input->post('id_instruktur');
		$this->db->where('id_instruktur', $id);
		$this->db->delete('blk_instruktur');
	}

	/* function ambil_id($id) {
		return $this->db->get_where('blk_pemilik', array('id_pemilik' => $id))->row();
	} */
 
 //============================================== Marketing ======================================================//
 
	function tampil_data_marketing(){
		$sql = "SELECT * FROM blk_marketing";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_marketing(){
		
		$kode_marketing		= $this->input->post('kode_marketing');
		$nama				= $this->input->post('nama');
		$jabatan_tugas		= $this->input->post('jabatan_tugas');
		$data = array (
			'kode_marketing'	=>	$kode_marketing, 
			'nama'				=>	$nama,
			'jabatan_tugas'		=>	$jabatan_tugas		
			);
		$this->db->insert('blk_marketing',$data);
	}
	function update_data_marketing() {
		$id 				= $this->input->post('id_marketing');
		$kode_marketing		= $this->input->post('kode_marketing');
		$nama				= $this->input->post('nama');
		$jabatan_tugas		= $this->input->post('jabatan_tugas');
		$data = array(
			'kode_marketing'	=>	$kode_marketing, 
			'nama'				=>	$nama,
			'jabatan_tugas'		=>	$jabatan_tugas	
			);
		$this->db->where('id_marketing', $id);
		$this->db->update('blk_marketing', $data);
	}
	function hapus_data_marketing() {
		$id = $this->input->post('id_marketing');
		$this->db->where('id_marketing', $id);
		$this->db->delete('blk_marketing');
	}
	/* function ambil_id($id) {
	return $this->db->get_where('blk_jk', array('id_jk' => $id))->row();
	} */
	
	//============================================== ADM Kantor ======================================================//
	
	function tampil_data_adm_kantor(){
		$sql = "SELECT * FROM blk_adm_kantor";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_adm_kantor(){
		
		$kode_adm_kantor	= $this->input->post('kode_adm_kantor');
		$nama				= $this->input->post('nama');
		$jabatan_tugas		= $this->input->post('jabatan_tugas');
		$data = array (
			'kode_adm_kantor'	=>	$kode_adm_kantor, 
			'nama'				=>	$nama,
			'jabatan_tugas'		=>	$jabatan_tugas			
			);
		$this->db->insert('blk_adm_kantor',$data);
	}
	function update_data_adm_kantor() {
		$id 				= $this->input->post('id_adm_kantor');
		$kode_adm_kantor	= $this->input->post('kode_adm_kantor');
		$nama				= $this->input->post('nama');
		$jabatan_tugas		= $this->input->post('jabatan_tugas');
		$data = array(
			'kode_adm_kantor'	=>	$kode_adm_kantor, 
			'nama'				=>	$nama,
			'jabatan_tugas'		=>	$jabatan_tugas	
			);
		$this->db->where('id_adm_kantor', $id);
		$this->db->update('blk_adm_kantor', $data);
	}
	function hapus_data_adm_kantor() {
		$id = $this->input->post('id_adm_kantor');
		$this->db->where('id_adm_kantor', $id);
		$this->db->delete('blk_adm_kantor');
	}
	
	//============================================= Ranjang =======================================================//
	
	function tampil_data_ranjang(){
		$sql = "SELECT * FROM blk_no_ranjang";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_ranjang(){
		
		$kode_no_ranjang	= $this->input->post('kode_no_ranjang');
		$lokasi				= $this->input->post('lokasi');
		$ranjang			= $this->input->post('ranjang');
		$kasur				= $this->input->post('kasur');
		$sprei				= $this->input->post('sprei');
		$bantal				= $this->input->post('bantal');
		$sarung_bantal		= $this->input->post('sarung_bantal');
		$data = array (
			'kode_no_ranjang'	=>	$kode_no_ranjang,			
			'lokasi'			=>	$lokasi,			
			'ranjang'			=>	$ranjang,			
			'kasur'				=>	$kasur,			
			'sprei'				=>	$sprei,			
			'bantal'			=>	$bantal,			
			'sarung_bantal'		=>	$sarung_bantal		
			);
		$this->db->insert('blk_no_ranjang',$data);
	}
	function update_data_ranjang() {
		$id					 = $this->input->post('id_no_ranjang');
		$kode_no_ranjang	= $this->input->post('kode_no_ranjang');
		$lokasi				= $this->input->post('lokasi');
		$ranjang			= $this->input->post('ranjang');
		$kasur				= $this->input->post('kasur');
		$sprei				= $this->input->post('sprei');
		$bantal				= $this->input->post('bantal');
		$sarung_bantal		= $this->input->post('sarung_bantal');
		$data = array(
			'kode_no_ranjang'	=>	$kode_no_ranjang,			
			'lokasi'			=>	$lokasi,			
			'ranjang'			=>	$ranjang,			
			'kasur'				=>	$kasur,			
			'sprei'				=>	$sprei,			
			'bantal'			=>	$bantal,			
			'sarung_bantal'		=>	$sarung_bantal
			);
		$this->db->where('id_no_ranjang', $id);
		$this->db->update('blk_no_ranjang', $data);
	}
	function hapus_data_ranjang() {
		$id = $this->input->post('id_no_ranjang');
		$this->db->where('id_no_ranjang', $id);
		$this->db->delete('blk_no_ranjang');
	}
	
	//============================================= JENIS KB =======================================================//
	
	function tampil_data_jenis_kb(){
		$sql = "SELECT * FROM blk_jenis_kb";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_jenis_kb(){
		
		$kode_jenis_kb	= $this->input->post('kode_jenis_kb');
		$ket			= $this->input->post('ket');
		$data = array (
			'kode_jenis_kb'		=>	$kode_jenis_kb,			
			'ket'		=>	$ket		
			);
		$this->db->insert('blk_jenis_kb',$data);
	}
	function update_data_jenis_kb() {
		$id 			= $this->input->post('id_jenis_kb');
		$kode_jenis_kb	= $this->input->post('kode_jenis_kb');
		$ket			 = $this->input->post('ket');
		$data = array(
			'kode_jenis_kb'	=> $kode_jenis_kb,
			'ket' 			=> $ket
			);
		$this->db->where('id_jenis_kb', $id);
		$this->db->update('blk_jenis_kb', $data);
	}
	function hapus_data_jenis_kb() {
		$id = $this->input->post('id_jenis_kb');
		$this->db->where('id_jenis_kb', $id);
		$this->db->delete('blk_jenis_kb');
	}
	
	//============================================= EKS / NON =======================================================//
	
	function tampil_data_izin_keperluan(){
		$sql = "SELECT * FROM blk_izin_keperluan";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function simpan_data_izin_keperluan(){
		
		$kode_izin_keperluan	= $this->input->post('kode_izin_keperluan');
		$ket					= $this->input->post('ket');
		$data = array (
			'kode_izin_keperluan'	=> $kode_izin_keperluan,
			'ket' 					=> $ket	
			);
		$this->db->insert('blk_izin_keperluan',$data);
	}
	function update_data_izin_keperluan() {
		$id 					= $this->input->post('id_izin_keperluan');
		$kode_izin_keperluan	= $this->input->post('kode_izin_keperluan');
		$ket					= $this->input->post('ket');
		$data = array(
			'kode_izin_keperluan'	=> $kode_izin_keperluan,
			'ket' 					=> $ket	
			);
		$this->db->where('id_izin_keperluan', $id);
		$this->db->update('blk_izin_keperluan', $data);
	}
	function hapus_data_izin_keperluan() {
		$id = $this->input->post('id_izin_keperluan');
		$this->db->where('id_izin_keperluan', $id);
		$this->db->delete('blk_izin_keperluan');
	}
	
}
?>