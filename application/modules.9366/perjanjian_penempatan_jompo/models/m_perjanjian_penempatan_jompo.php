<?php
class M_perjanjian_penempatan_jompo extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT personal.alamat as alamatnya,disnaker.alamat as alamatlengkap,personal.nama as namanya, personal.*,family.*,majikan.*,disnaker.*,dataagen.*,perjanjian_penempatan.* FROM perjanjian_penempatan
				LEFT JOIN personal 
				ON perjanjian_penempatan.id_biodata = personal.id_biodata
				LEFT JOIN family 
				ON perjanjian_penempatan.id_biodata = family.id_biodata
				LEFT JOIN disnaker 
				ON perjanjian_penempatan.id_biodata = disnaker.id_biodata
				LEFT JOIN majikan 
				ON perjanjian_penempatan.id_biodata = majikan.id_biodata
				LEFT JOIN dataagen 
				ON majikan.kode_agen = dataagen.id_agen
				WHERE perjanjian_penempatan.id_biodata LIKE 'jp%'
				;";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 function tampil_data_tki(){
		$sql = "SELECT * FROM personal	WHERE personal.id_biodata LIKE 'jp%'
				;";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_agen(){
		$sql = "SELECT * FROM dataagen	
				;";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_family(){
		$sql = "SELECT * FROM family	
				;";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_jabatan(){
		$sql = "SELECT * FROM datajabatan	
				;";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function simpan_data_surat(){
		
		
		$id_biodata             = $this->input->post('id_biodata');
		$jabatan             	= $this->input->post('jabatan');
		$negara             	= $this->input->post('negara');
		$gaji 					= $this->input->post('gaji');
		$lembur 				= $this->input->post('lembur');
		$hubungan 				= $this->input->post('hubungan');
		$wali 					= $this->input->post('wali');
		$nama_dinas 			= $this->input->post('nama_dinas');
		$data = array (
			'id_biodata'			=>$id_biodata, 
			'jabatan'				=>$jabatan, 
			'negara'				=>$negara,
			'gaji'					=>$gaji,
			'lembur'				=>$lembur,
			'hubungan'				=>$hubungan,
			'wali'					=>$wali,
			'nama_dinas'			=>$nama_dinas,
			
			);

		$this->db->insert('perjanjian_penempatan',$data);
	}
	
	function edit_data_surat(){
		
		$id_penempatan            = $this->input->post('id_penempatan');
		$id_biodata             		= $this->input->post('id_biodata');
		$jabatan             			= $this->input->post('jabatan');
		$negara             	= $this->input->post('negara');
		$gaji 					= $this->input->post('gaji');
		$lembur 				= $this->input->post('lembur');
		$hubungan 				= $this->input->post('hubungan');
		$wali 					= $this->input->post('wali');
		$nama_dinas 			= $this->input->post('nama_dinas');

		$data = array (
			'id_biodata'			=>$id_biodata, 
			'jabatan'				=>$jabatan, 
			'negara'				=>$negara,
			'gaji'					=>$gaji,
			'lembur'				=>$lembur,
			'hubungan'				=>$hubungan,
			'wali'					=>$wali,
			'nama_dinas'			=>$nama_dinas,
			);
		
		$this->db->where('id_penempatan', $id_penempatan);
		$this->db->update('perjanjian_penempatan',$data);
	}
	
	 function delete_personal($id)
    {
        //delete employee record
        $this->db->where('id_biodata', $id);
        $this->db->delete('personal');
        redirect('databio');
    } 
	
	function hapus_data_surat() {
		$id_penempatan = $this->input->post('id_penempatan');
		$this->db->where('id_penempatan', $id_penempatan);
		$this->db->delete('perjanjian_penempatan');
	}

}
?>