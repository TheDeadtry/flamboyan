<?php
class M_tambahrequest extends CI_Model{
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
		$sql = "SELECT * FROM request WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahrequest() {


		$player = array();
		$datanya="";

		$player=$this->input->post('lokasikerja');
		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}

            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'usahamajikan' => $this->input->post('usahamajikan'),
					'waktukerja' => $this->input->post('waktukerja'),
					'kondisikerja' => $this->input->post('kondisikerja'),
					'jenispekerjaan' => $this->input->post('jenispekerjaan'),
					'lokasikerja' => $datanya,
					'lembur' => $this->input->post('lembur'),

				);
			$this->db->insert('request', $data);
	} 

		function ubahrequest() {

			$player = array();
		$datanya="";

		$player=$this->input->post('lokasikerja');
		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'usahamajikan' => $this->input->post('usahamajikan'),
					'waktukerja' => $this->input->post('waktukerja'),
					'kondisikerja' => $this->input->post('kondisikerja'),
					'jenispekerjaan' => $this->input->post('jenispekerjaan'),
					'lokasikerja' => $datanya,
					'lembur' => $this->input->post('lembur'),

				);
           $this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('request', $data);
			//$this->db->insert('request', $data);
	} 

}
?>