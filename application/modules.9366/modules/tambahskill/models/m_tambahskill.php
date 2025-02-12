<?php
class M_tambahskill extends CI_Model{
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

	function tampil_data_keterampilan(){
		$sql = "SELECT * FROM dataskill";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_pendidikan(){
		$sql = "SELECT id_pedidikan,isi,mandarin FROM datapendidikan";
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
		function tampil_data_hobi(){
		$sql = "SELECT isi,mandarin FROM datahobi";
                $query = $this->db->query($sql);

            return $query->result();
	} 

			function tampil_data_mata(){
		$sql = "SELECT isi,mandarin FROM datamata";
                $query = $this->db->query($sql);

            return $query->result();
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
	function tampil_data_skill($idnya){
		$sql = "SELECT * FROM skillcondition WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahskill() {
		$player = array();
		$datanya="";

		$player=$this->input->post('keterampilan');
		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}

		$player2 = array();
		$datanya2="";

		$player2=$this->input->post('hobi');
		$datanya2=$player2[0];
		for($i=1;$i<sizeof($player2);$i++){
			$datanya2=$datanya2.",".$player2[$i];
		}

		$matanya="";
		$kanan="";
		$kiri="";
		$hasilmata="";

		$matanya=$this->input->post('mata');
		$kanan=$this->input->post('kanan');
		$kiri=$this->input->post('kiri');

		if($matanya=="lolos 合格"){
		$hasilmata=$matanya;
		}
		else{
		$hasilmata=$matanya."( ".$kanan." & ".$kiri." )";
		}
		//echo "".$datanya;


            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'keterampilan' => $datanya,
					'hobi' => $datanya2,
					'alkohol' => $this->input->post('alkohol'),
					'merokok' => $this->input->post('merokok'),
					'food' => $this->input->post('food'),
					'alergi' => $this->input->post('alergi'),
					'operasi' => $this->input->post('operasi'),
					'tato' => $this->input->post('tato'),
					'kidal' => $this->input->post('tangan'),
					'angkat' => $this->input->post('angkat'),
					'pushup' => $this->input->post('pushup'),
					'peglihatan' => $hasilmata,
					'butawarna' => $this->input->post('butawarna'),
					
				);
			$this->db->insert('skillcondition', $data);
	} 


	function ubahskill() {
		$player = array();
		$datanya="";

		$player=$this->input->post('keterampilan');
		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}

		$player2 = array();
		$datanya2="";

		$player2=$this->input->post('hobi');
		$datanya2=$player2[0];
		for($i=1;$i<sizeof($player2);$i++){
			$datanya2=$datanya2.",".$player2[$i];
		}



            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'keterampilan' => $datanya,
					'hobi' => $datanya2,
					'alkohol' => $this->input->post('alkohol'),
					'merokok' => $this->input->post('merokok'),
					'food' => $this->input->post('food'),
					'alergi' => $this->input->post('alergi'),
					'operasi' => $this->input->post('operasi'),
					'tato' => $this->input->post('tato'),
					'kidal' => $this->input->post('tangan'),
					'angkat' => $this->input->post('angkat'),
					'pushup' => $this->input->post('pushup'),
					'peglihatan' => $this->input->post('mata'),
					'butawarna' => $this->input->post('butawarna'),
					
				);
			//$this->db->insert('skillcondition', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('skillcondition', $data);
	} 


}
?>