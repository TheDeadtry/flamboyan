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
		$sql = "SELECT * FROM datakreditbank";
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
		$sql = "SELECT count(*) as total FROM signingbank WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


	function hitung_data_terbang($idnya){
		$sql = "SELECT count(*) as total FROM setelahterbang WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
		function hitung_data_berkas($idnya){
		$sql = "SELECT count(*) as total FROM infoberkas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
			function hitung_data_ambilberkas($idnya){
		$sql = "SELECT count(*) as total FROM ambilberkas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


		function hitung_data_email($idnya){
		$sql = "SELECT count(*) as total FROM email WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_signing($idnya){
		$sql = "SELECT * FROM signingbank LEFT JOIN datakreditbank
ON signingbank.idkredit=datakreditbank.id_kreditbank
WHERE signingbank.id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

				function tampil_data_terbang($idnya){
		$sql = "SELECT setelahterbang.*, setelahterbang_kejadian.id as kejadian_id, setelahterbang_kejadian.nama as kejadian_nama FROM setelahterbang LEFT JOIN setelahterbang_kejadian ON setelahterbang.kejadian=setelahterbang_kejadian.id WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

					function tampil_data_email($idnya){
		$sql = "SELECT * FROM email WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

						function tampil_data_berkas($idnya){
		$sql = "SELECT * FROM infoberkas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

							function tampil_data_ambilberkas($idnya){
		$sql = "SELECT * FROM ambilberkas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}



	function tambahsigning() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	 	'nama_bank' => $this->input->post('nama_bank'),
            	 	'tgl_bank' => $this->input->post('tgl_bank'),
            	 	'tgl_tki_ttd' => $this->input->post('tgl_tki_ttd'),
            	 	'idkredit' => $this->input->post('idkredit'),

            	 	'tglapplycs' => $this->input->post('tglapplycs'),
            	 	'tglterimacs' => $this->input->post('tglterimacs'),
            	 	'statustglterimacs' => $this->input->post('statustglterimacs'),
            	 	'tglapplyleg' => $this->input->post('tglapplyleg'),
            	 	'tgltrmleg' => $this->input->post('tgltrmleg'),
            	 	'statustgltrmleg' => $this->input->post('statustgltrmleg'),
            	 	'tgldokbank' => $this->input->post('tgldokbank'),
            	 	'norektki' => $this->input->post('norektki'),
            	 	'tanggal_input' => date('Y-m-d H:i:s'),
            	 	'pribadi' => $this->input->post('pribadi'),
            	 	'karantina' => $this->input->post('karantina'),

				);
        $idid = $this->input->post('idbiodata');
        $cek_signingbank = $this->db->query("SELECT count(*) as total FROM signingbank WHERE id_biodata='$idid'")->row();
        if ($cek_signingbank->total == 0) {
			$this->db->insert('signingbank', $data);
        }
	} 
	function ubahsigning() {
 $data = array(  
					'nama_bank' => $this->input->post('nama_bank'),
            	 	'tgl_bank' => $this->input->post('tgl_bank'),
            	 	'tgl_tki_ttd' => $this->input->post('tgl_tki_ttd'),
            	 	'idkredit' => $this->input->post('idkredit'),

				'tglapplycs' => $this->input->post('tglapplycs'),
            	 	'tglterimacs' => $this->input->post('tglterimacs'),
            	 	'statustglterimacs' => $this->input->post('statustglterimacs'),
            	 	'tglapplyleg' => $this->input->post('tglapplyleg'),
            	 	'tgltrmleg' => $this->input->post('tgltrmleg'),
            	 	'statustgltrmleg' => $this->input->post('statustgltrmleg'),
            	 	'tgldokbank' => $this->input->post('tgldokbank'),
            	 	'norektki' => $this->input->post('norektki'),
            	 	'tanggal_input' => date('Y-m-d H:i:s'),
            	 	'pribadi' => $this->input->post('pribadi'),
            	 	'karantina' => $this->input->post('karantina'),
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('signingbank', $data);
	} 

		function tambahemail() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
					'tgl_email' => $this->input->post('tgl_email'),
            	 	'ket_email' => $this->input->post('ket_email'),

				);
            $idid = $this->input->post('idbiodata');
            $cek_email = $this->db->query("SELECT count(*) as total FROM email WHERE id_biodata='$idid'")->row();
            if ($cek_email->total == 0) {
				$this->db->insert('email', $data);
            }
	} 
		function ubahemail() {
 $data = array(  
            	 	'tgl_email' => $this->input->post('tgl_email'),
            	 	'ket_email' => $this->input->post('ket_email'),
            	
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('email', $data);
	} 

	function tambahsetelahterbang() {
        $nilai1 = $this->input->post('kurang_cicil').' X NTD.'.$this->input->post('kurang_cicil_b');
        $nilai2 = $this->input->post('kurang_cicil2').' X NTD.'.$this->input->post('kurang_cicil2_b');
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	 	'tgl_setelah_terbang' => $this->input->post('tgl_setelah_terbang'),
                    'tgl_kejadian' => $this->input->post('tgl_kejadian'),
                    'kejadian' => $this->input->post('kejadian'),
                    'nilai_kekurangan_cicilan_bank' => $nilai1,
                    'nilai_kekurangan_cicilan_bank2' => $nilai2,
            	 	'ket_setelah_terbang' => $this->input->post('ket_setelah_terbang'),
				);
           	$idid = $this->input->post('idbiodata');
            
				$this->db->insert('setelahterbang', $data);
	} 
			function ubahsetelahterbang() {
        $nilai1 = $this->input->post('kurang_cicil').' X NTD.'.$this->input->post('kurang_cicil_b');
        $nilai2 = $this->input->post('kurang_cicil2').' X NTD.'.$this->input->post('kurang_cicil2_b');
 $data = array(  
            	 	'tgl_setelah_terbang' => $this->input->post('tgl_setelah_terbang'),
                    'tgl_kejadian' => $this->input->post('tgl_kejadian'),
                    'kejadian' => $this->input->post('kejadian'),
                    'nilai_kekurangan_cicilan_bank' => $nilai1,
                    'nilai_kekurangan_cicilan_bank2' => $nilai2,
            	 	'ket_setelah_terbang' => $this->input->post('ket_setelah_terbang'),
            	
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_setelahterbang', $this->input->post('id_setelahterbang'));
			$this->db->update('setelahterbang', $data);
	}
	function hapussetelahterbang() {
		$id = $this->input->post('id_setelahterbang');
		$this->db->where('id_setelahterbang', $id);
		$this->db->delete('setelahterbang');
	}






// area berbeda







	function tambahberkas() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	 	'tgl_dok_siap' => $this->input->post('tgl_dok_siap'),
            	 	'info_berkas' => $this->input->post('info_berkas'),
            	 	'hptki_berkas' => $this->input->post('hptki_berkas'),
            	 	'nama_ambil_berkas' => $this->input->post('nama_ambil_berkas'),
            	 	'nama_hub_berkas' => $this->input->post('nama_hub_berkas'),
            	 	'nama_hp_berkas' => $this->input->post('nama_hp_berkas'),
            	 	'nama_terima_berkas' => $this->input->post('nama_terima_berkas'),
            	 	'rak_berkas' => $this->input->post('rak_berkas'),
				);
           	$idid = $this->input->post('id_biodata');
           	$cek_berkas = $this->db->query("SELECT count(*) as total FROM infoberkas WHERE id_biodata='$idid'")->row();
           	if ($cek_berkas->total == 0) {
				$this->db->insert('infoberkas', $data);
           	}
	} 

			function ubahberkas() {
 $data = array(  
            	 	'info_berkas' => $this->input->post('info_berkas'),
            	 	'tgl_dok_siap' => $this->input->post('tgl_dok_siap'),
            	 	'hptki_berkas' => $this->input->post('hptki_berkas'),
            	 	'nama_ambil_berkas' => $this->input->post('nama_ambil_berkas'),
            	 	'nama_hub_berkas' => $this->input->post('nama_hub_berkas'),
            	 	'nama_hp_berkas' => $this->input->post('nama_hp_berkas'),
            	 	'nama_terima_berkas' => $this->input->post('nama_terima_berkas'),
            	 	'rak_berkas' => $this->input->post('rak_berkas'),
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('id_biodata'));
			$this->db->update('infoberkas', $data);
	}


	function tambahambil() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	 		'dokdiserahkan' => $this->input->post('dokdiserahkan'),
            	 		'tgl_ambil_dok' => $this->input->post('tgl_ambil_dok'),
            	 	'nama_ambil_dok' => $this->input->post('nama_ambil_dok'),
            	 	'hub_ambil_dok' => $this->input->post('hub_ambil_dok'),
            	 	'tel_ambil_dok' => $this->input->post('tel_ambil_dok'),
            	 	'nama_serah_dok' => $this->input->post('nama_serah_dok'),
            	 	'tanggal_input' => date('Y-m-d'),
				);
           	$idid = $this->input->post('id_biodata');
           	$cek_ambilberkas = $this->db->query("SELECT count(*) as total FROM ambilberkas WHERE id_biodata='$idid'")->row();
           	if ($cek_ambilberkas->total == 0) {
				$this->db->insert('ambilberkas', $data);
           	}
	} 

			function ubahambil() {
 $data = array(  
            	 	'tgl_ambil_dok' => $this->input->post('tgl_ambil_dok'),
            	 	'dokdiserahkan' => $this->input->post('dokdiserahkan'),
					'nama_ambil_dok' => $this->input->post('nama_ambil_dok'),
            	 	'hub_ambil_dok' => $this->input->post('hub_ambil_dok'),
            	 	'tel_ambil_dok' => $this->input->post('tel_ambil_dok'),
            	 	'nama_serah_dok' => $this->input->post('nama_serah_dok'),
            	 	'tanggal_input' => date('Y-m-d'),
				);
			//$this->db->insert('signingpermit', $data);
			$this->db->where('id_biodata', $this->input->post('id_biodata'));
			$this->db->update('ambilberkas', $data);
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