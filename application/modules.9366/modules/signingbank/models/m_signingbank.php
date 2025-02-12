<?php
class M_signingbank extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

 function tampil_data_sektor(){
		$sql = "SELECT kode_jenis,isi,isi_taiwan,no_urut,jeniskelamin FROM datasektor";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 function tampil_data_negara(){
		$sql = "SELECT kode_negara,isi,mandarin FROM datanegara";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tampil_data_calling(){
		$sql = "SELECT kode_calling,isi FROM datacalling";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	
function tampil_datasigning(){
		$sql = "SELECT * FROM markf";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	function tampil_data_skillnya(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
	function tampil_data_agama(){
		$sql = "SELECT id_agama,isi,mandarin FROM dataagama";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_bank(){
		$sql = "SELECT id_bank,isi,mandarin FROM databank";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_kredit(){
		$sql = "SELECT id_kreditbank,namakredit,isikredit,nilaikredit FROM datakreditbank";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_pendidikan(){
		$sql = "SELECT isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_provinsi(){
		$sql = "SELECT isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function hitung_data_signing($idnya){
		$sql = "SELECT count(*) as total FROM markf WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_signing($idnya){
		$sql = "SELECT * FROM markf WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahsigning() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	 	'tanggalsigning' => $this->input->post('tanggalsigning'),
            	 	'id_signing' => $this->input->post('id_signing'),
				);
			$this->db->insert('markf', $data);
	} 
	function ubahsigning() {
 $data = array(  
            	 	'nama_bank' => $this->input->post('nama_bank'),
            	 	'tgl_bank' => $this->input->post('tgl_bank'),
            	 	'tgl_tki_ttd' => $this->input->post('tgl_tki_ttd'),
            	 	'periode_kredit' => $this->input->post('periode_kredit'),
            	 	'jumlah_kredit' => $this->input->post('jumlah_kredit'),
				

				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('markf', $data);
	} 
		function ubahemail() {
 $data = array(  
            	 	'tgl_email' => $this->input->post('tgl_email'),
            	 	'ket_email' => $this->input->post('ket_email'),
            	
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('markf', $data);
	} 
			function ubahsetelahterbang() {
 $data = array(  
            	 	'tgl_setelah_terbang' => $this->input->post('tgl_setelah_terbang'),
            	 	'ket_setelah_terbang' => $this->input->post('ket_setelah_terbang'),
            	
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('markf', $data);
	}
			function ubahberkas() {
 $data = array(  
            	 	'info_berkas' => $this->input->post('info_berkas'),
            	 	'hptki_berkas' => $this->input->post('hptki_berkas'),
            	 	'nama_ambil_berkas' => $this->input->post('nama_ambil_berkas'),
            	 	'nama_hub_berkas' => $this->input->post('nama_hub_berkas'),
            	 	'nama_hp_berkas' => $this->input->post('nama_hp_berkas'),
            	 	'nama_terima_berkas' => $this->input->post('nama_terima_berkas'),
            	
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('markf', $data);
	}
			function ubahambil() {
 $data = array(  
            	 	'tgl_ambil_dok' => $this->input->post('tgl_ambil_dok'),
            	 	'nama_ambil_dok' => $this->input->post('nama_ambil_dok'),
            	 	'hub_ambil_dok' => $this->input->post('hub_ambil_dok'),
            	 	'tel_ambil_dok' => $this->input->post('tel_ambil_dok'),
            	 	'nama_serah_dok' => $this->input->post('nama_serah_dok'),
            	
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('markf', $data);
	} 
				function ubahujk() {
 $data = array(  
            	 	'tglujk_status' => $this->input->post('statusp'),
            	'tglujk' => $this->input->post('tglujk'),
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('markf', $data);
	} 

}
?>