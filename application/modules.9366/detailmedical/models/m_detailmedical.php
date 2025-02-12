<?php
class M_detailmedical extends CI_Model{
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
	 function tampil_data_pilihanmedical(){
		$sql = "SELECT id_medical,isi,mandarin FROM datamedical";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tampil_data_calling(){
		$sql = "SELECT kode_calling,isi FROM datacalling";
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

	function hitung_data_medical($idnya){
		$sql = "SELECT count(*) as total FROM medical WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_medical($idnya){
		$sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
					function tampil_data_medical2($idnya){
		$sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical2 WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
					function tampil_data_medical3($idnya){
		$sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}


			function ubahstatus() {
 			$data = array(  
            	 	'status' => $this->input->post('statustki'),	
            	 	'catatan' => $this->input->post('catatan'),
				);
			//$this->db->insert('bankpermit', $data);
			$this->db->where('id_biodata', $this->input->post('idworking'));
			$this->db->update('medical', $data);
	} 

	function tambahmedical() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'keterangan' => $this->input->post('keterangan'),
            	 	'jenismedical'=> $this->input->post('jenis'),
					'tanggal' => $this->input->post('tanggal'),
					'nama' => $this->input->post('hasilmedical'),
					'd_nomor' => $this->input->post('d_nomor'),
					'd_klinik' => $this->input->post('d_klinik'),
					'd_dokter' => $this->input->post('d_dokter'),
				);
			$this->db->insert('medical', $data);
			redirect('detailmedical');
	} 
	function ubahmedical() {
            	 $data = array(  
            	 	'keterangan' => $this->input->post('keterangan'),
            	 	'jenismedical'=> $this->input->post('jenis'),
					'tanggal' => $this->input->post('tanggal'),
					'nama' => $this->input->post('hasilmedical'),
					'd_nomor' => $this->input->post('d_nomor'),
					'd_klinik' => $this->input->post('d_klinik'),
					'd_dokter' => $this->input->post('d_dokter'),
				);
            $this->db->where('id_medical', $this->input->post('id_medical'));
			$this->db->update('medical', $data);
			redirect('detailmedical');
	} 

	function hapusmedical() {
		$id = $this->input->post('id_medical');
		$this->db->where('id_medical', $id);
		$this->db->delete('medical');
	}




		function tambahmedical2() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'keterangan' => $this->input->post('keterangan'),
            	 	'jenismedical'=> $this->input->post('jenis'),
            	 	'nomedical'=> $this->input->post('nomed'),
            	 	'namamedical'=> $this->input->post('named'),
					'tanggal' => $this->input->post('tanggal'),
					'tglsidik' => $this->input->post('tglsidik'),
					'nama' => $this->input->post('hasilmedical'),
				);
			$this->db->insert('medical2', $data);
	} 
	function ubahmedical2() {
            	 $data = array(  
            	 	'keterangan' => $this->input->post('keterangan'),
            	 	'jenismedical'=> $this->input->post('jenis'),
            	 	'nomedical'=> $this->input->post('nomed'),
            	 	'namamedical'=> $this->input->post('named'),
					'tanggal' => $this->input->post('tanggal'),
					'tglsidik' => $this->input->post('tglsidik'),
					'nama' => $this->input->post('hasilmedical'),
				);
            $this->db->where('id_medical', $this->input->post('id_medical'));
			$this->db->update('medical2', $data);
	} 

	function hapusmedical2() {
		$id = $this->input->post('id_medical');
		$this->db->where('id_medical', $id);
		$this->db->delete('medical2');
	}




		function tambahmedical3() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'keterangan' => $this->input->post('keterangan'),
            	 	'jenismedical'=> $this->input->post('jenis'),
            	 	'nomedical'=> $this->input->post('nomed'),
            	 	'namamedical'=> $this->input->post('named'),
					'tanggal' => $this->input->post('tanggal'),
					'tglsidik' => $this->input->post('tglsidik'),
					'nama' => $this->input->post('hasilmedical'),
				);
			$this->db->insert('medical3', $data);
	} 
	function ubahmedical3() {
            	 $data = array(  
            	 	'keterangan' => $this->input->post('keterangan'),
            	 	'jenismedical'=> $this->input->post('jenis'),
            	 	'nomedical'=> $this->input->post('nomed'),
            	 	'namamedical'=> $this->input->post('named'),
					'tanggal' => $this->input->post('tanggal'),
					'tglsidik' => $this->input->post('tglsidik'),
					'nama' => $this->input->post('hasilmedical'),
				);
            $this->db->where('id_medical', $this->input->post('id_medical'));
			$this->db->update('medical3', $data);
	} 

	function hapusmedical3() {
		$id = $this->input->post('id_medical');
		$this->db->where('id_medical', $id);
		$this->db->delete('medical3');
	}


}
?>