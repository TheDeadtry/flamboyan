<?php
class M_detailasudanhot extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

function tampil_data_jobs(){
		$sql = "SELECT * FROM datajobs";
                $query = $this->db->query($sql);

            return $query->result();
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
	
	function tampil_data_skillnya(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function tampil_data_pekerjaan(){
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
		$sql = "SELECT id_pedidikan,isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 

			function tampil_data_lokasi(){
		$sql = "SELECT * FROM datalokasikerja";
                $query = $this->db->query($sql);

            return $query->result();
	} 


		function tampil_data_provinsi(){
		$sql = "SELECT id_provinsi,isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	}

		function getnourut($idnya){

		$sql = "SELECT no_urut FROM datasektor WHERE kode_jenis='".$idnya."'";
                $query = $this->db->query($sql);
            return $query->row('no_urut');
	}


		function updateidsektor($idnya,$nourut){

		$sql = "UPDATE datasektor SET no_urut='".$nourut."' WHERE kode_jenis='".$idnya."'";

		$this->db->query($sql);

	}
	function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_request($idnya){
		$sql = "SELECT *,f.keterangan as pket FROM visa z
				LEFT JOIN dataterbang x ON z.id_terbang=x.id_terbang
				LEFT JOIN asuransi_dan_hotel a ON z.id_biodata=a.id_biodata 
				LEFT JOIN setting_hotellist b ON a.idhotel=b.id_setting_hotellist
				LEFT JOIN personal f ON z.id_biodata=f.id_biodata 
				WHERE z.id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahrequest() {

		$datap = ['keterangan' => $this->input->post('keterangan'),];
		$data0 = array(  
				'id_biodata' => $this->input->post('idbiodata'),
				'tanggalterbang' => $this->input->post('tanggalterbang'),
				'statustgl' => $this->input->post('tanggalterbanga'),
				'id_terbang' => $this->input->post('id_terbang'),
				'tiket' => $this->input->post('tiket'),
				'tglberangkat' => $this->input->post('tglberangkat'),
				'statusterbang' => $this->input->post('berangkata'),
				'airport' => $this->input->post('airport'),
			);

            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'dakt' => $this->input->post('dakt'),
            	 	'daki' => $this->input->post('daki'),
            	 	'dattt' => $this->input->post('dattt'),
            	 	'aju_ht' => $this->input->post('aju_ht'),
            	 	'idhotel' => $this->input->post('idhotel'),
            	 	'adh_nohp' => $this->input->post('adh_nohp'),
            	 	'adh_line' => $this->input->post('adh_line'),
            	 	'adh_email' => $this->input->post('adh_email'),
				);
				$idid = $this->input->post('idbiodata');

				$this->db->where('id_biodata', $idid);
				$this->db->update('personal', $datap);

				$cek_visa = $this->db->query("SELECT count(*) as total FROM visa WHERE id_biodata='$idid'")->row();
				if ($cek_visa->total == 0) {
					$this->db->insert('visa', $data0);
				}else{
					$this->db->where('id_biodata', $idid);
					$this->db->update('visa', $data0);
				}
				$cek_visa = $this->db->query("SELECT count(*) as total FROM asuransi_dan_hotel WHERE id_biodata='$idid'")->row();
				if ($cek_visa->total == 0) {
					$this->db->insert('asuransi_dan_hotel', $data);
				}else{
					$this->db->where('id_biodata', $idid);
					$this->db->update('asuransi_dan_hotel', $data);
				}
	} 

		function ubahrequest() {

			$datap = ['keterangan' => $this->input->post('keterangan'),];
			$data0 = array(  
				'id_biodata' => $this->input->post('idbiodata'),
				'tanggalterbang' => $this->input->post('tanggalterbang'),
				'statustgl' => $this->input->post('tanggalterbanga'),
				'id_terbang' => $this->input->post('id_terbang'),
				'tiket' => $this->input->post('tiket'),
				'tglberangkat' => $this->input->post('tglberangkat'),
				'statusterbang' => $this->input->post('berangkata'),
				'airport' => $this->input->post('airport'),
			);
            	 $data = array(  
					'id_biodata' => $this->input->post('idbiodata'),
					'dakt' => $this->input->post('dakt'),
					'daki' => $this->input->post('daki'),
					'dattt' => $this->input->post('dattt'),
					'aju_ht' => $this->input->post('aju_ht'),
					'idhotel' => $this->input->post('idhotel'),
					'adh_nohp' => $this->input->post('adh_nohp'),
					'adh_line' => $this->input->post('adh_line'),
					'adh_email' => $this->input->post('adh_email'),

				);
				$idid = $this->input->post('idbiodata');
				$this->db->where('id_biodata', $idid);
				$this->db->update('personal', $datap);

				$cek_visa = $this->db->query("SELECT count(*) as total FROM visa WHERE id_biodata='$idid'")->row();
				if ($cek_visa->total == 0) {
					$this->db->insert('visa', $data0);
				}else{
					$this->db->where('id_biodata', $idid);
					$this->db->update('visa', $data0);
				}
				$cek_visa = $this->db->query("SELECT count(*) as total FROM asuransi_dan_hotel WHERE id_biodata='$idid'")->row();
				if ($cek_visa->total == 0) {
					$this->db->insert('asuransi_dan_hotel', $data);
				}else{
					$this->db->where('id_biodata', $idid);
					$this->db->update('asuransi_dan_hotel', $data);
				}
			//$this->db->insert('request', $data);
	} 

	function hapusrequest($id) {
		$this->db->where('id_biodata', $id);
		$this->db->delete('asuransi_dan_hotel');
	}

function hitung_data_request($idnya){
		$sql = "SELECT count(*) as total FROM visa z
		LEFT JOIN dataterbang x ON z.id_terbang=x.id_terbang
		LEFT JOIN asuransi_dan_hotel a ON z.id_biodata=a.id_biodata 
		LEFT JOIN setting_hotellist b ON a.idhotel=b.id_setting_hotellist
		WHERE z.id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	
	function tampil_data_dataairport(){
		$sql = "SELECT * FROM dataairport";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	

	function tampil_dataterbang(){
		$sql = "SELECT * FROM dataterbang order by detailberangkat1";
                $query = $this->db->query($sql);

            return $query->result();
	} 
}
?>