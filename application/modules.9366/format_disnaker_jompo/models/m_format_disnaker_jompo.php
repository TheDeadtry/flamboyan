<?php
class M_format_disnaker_jompo extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
  function tampil_data_personal(){
		$sql = "SELECT personal.alamat as alamatnya,personal.nama as namanya, personal.*,family.*,majikan.*,dataagen.*,paspor.*,format_disnaker_jompo.* FROM format_disnaker_jompo
				LEFT JOIN personal 
				ON format_disnaker_jompo.id_biodata = personal.id_biodata
				LEFT JOIN family 
				ON format_disnaker_jompo.id_biodata = family.id_biodata
				LEFT JOIN majikan 
				ON format_disnaker_jompo.id_biodata = majikan.id_biodata
				INNER JOIN paspor 
				ON format_disnaker_jompo.id_biodata = paspor.id_biodata
				LEFT JOIN dataagen 
				ON majikan.kode_agen = dataagen.id_agen
				WHERE format_disnaker_jompo.id_biodata LIKE 'jp%'
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
	
	function tampil_data_paspor(){
		$sql = "SELECT * FROM paspor 
				;";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function tampil_data_keluarga(){
		$sql = "SELECT * FROM family	
				;";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 function tampil_data_data(){
		$sql = "SELECT * FROM personal	
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
		
		
		$id_biodata           		= $this->input->post('id_biodata');
		$jabatan           			= $this->input->post('jabatan');
		$tgl_berangkatnya           = $this->input->post('tgl_berangkatnya');
		$no_ktpnya                  = $this->input->post('no_ktpnya');
		$tgl_tibanya                = $this->input->post('tgl_tibanya');
		$gajinya                   	= $this->input->post('gajinya');
		$mata_uang                   	= $this->input->post('mata_uang');
		
		$data = array (
			'id_biodata'				=>$id_biodata, 
			'jabatan'					=>$jabatan, 
			'no_ktpnya'					=>$no_ktpnya, 
			'tgl_berangkatnya'			=>$tgl_berangkatnya, 
			'tgl_tibanya'				=>$tgl_tibanya, 
			'gajinya'					=>$gajinya, 
			'mata_uang'					=>$mata_uang, 
			
			);

		$this->db->insert('format_disnaker_jompo',$data);
	}
	
	function edit_data_surat(){
		
		$id_karep                 = $this->input->post('id_karep');
		$id_biodata           		= $this->input->post('id_biodata');
		$jabatan           			= $this->input->post('jabatan');
		$tgl_berangkatnya           = $this->input->post('tgl_berangkatnya');
		$no_ktpnya                  = $this->input->post('no_ktpnya');
		$tgl_tibanya                = $this->input->post('tgl_tibanya');
		$gajinya                   	= $this->input->post('gajinya');
		$mata_uang                   	= $this->input->post('mata_uang');

		$data = array (
			'id_biodata'				=>$id_biodata, 
			'jabatan'					=>$jabatan, 
			'no_ktpnya'					=>$no_ktpnya, 
			'tgl_berangkatnya'			=>$tgl_berangkatnya, 
			'tgl_tibanya'				=>$tgl_tibanya, 
			'gajinya'					=>$gajinya, 
			'mata_uang'					=>$mata_uang, 
			
			);
		
		$this->db->where('id_karep', $id_karep);
		$this->db->update('format_disnaker_jompo',$data);
	}
	
	function hapus_data_surat() {
		$id_karep = $this->input->post('id_karep');
		$this->db->where('id_karep', $id_karep);
		$this->db->delete('format_disnaker_jompo');
	}

}
?>