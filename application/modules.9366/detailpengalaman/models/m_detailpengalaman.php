<?php
class M_detailpengalaman extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

	function tampil_data_jobs(){
		$sql = "SELECT * FROM datajobs";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_setmajikan(){
		$sql = "SELECT * FROM datasetmajikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 	function tampil_data_setketerangan(){
		$sql = "SELECT * FROM datasetketerangan order by isi";
                $query = $this->db->query($sql);

            return $query->result();
	} 
			function tampil_data_lokasi(){
		$sql = "SELECT isi,mandarin FROM datalokasikerja";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 	function tampil_data_setjagaanak(){
		$sql = "SELECT * FROM datajagaanak";
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

	function tampil_data_kategoripekerjaan(){
		$sql = "SELECT id_kategori,isi,mandarin FROM kategoripekerjaan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_penjelasan(){
		$sql = "SELECT datapekerjaan.id_kategori,datapekerjaan.isi,datapekerjaan.mandarin,kategoripekerjaan.isi As kategorinya
				FROM datapekerjaan
				INNER JOIN kategoripekerjaan
				ON datapekerjaan.id_kategori=kategoripekerjaan.id_kategori;";
                $query = $this->db->query($sql);

            return $query->result();
	} 
function tampil_data_posisi(){
		$sql = "SELECT * FROM dataposisi";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	function tampil_data_kondisijompo(){
		$sql = "SELECT isi,mandarin FROM datakondisijompo";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	function tampil_data_alasan(){
		$sql = "SELECT * FROM dataalasan order by isi asc";
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
	function tampil_data_pengalaman($idnya){
		$sql = "SELECT * FROM pengalaman WHERE id_biodata='".$idnya."' order by periodekerja ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tambahpengalaman() {
		$player = array();
		$player2 = array();
		$playeranak = array();
		$datanya="";
		$datanya2="";
		$datanyaanak="";

		$player=$this->input->post('kondisijompo');
		$player2=$this->input->post('kondisijompo2');
		$playeranak=$this->input->post('jumlahanak');

		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}

		$datanya2=$player2[0];
		for($i=1;$i<sizeof($player2);$i++){
			$datanya2=$datanya2.",".$player2[$i];
		}
		
		$datanyaanak=$playeranak[0];
		for($i=1;$i<sizeof($playeranak);$i++){
			$datanyaanak=$datanyaanak.",".$playeranak[$i];
		}

		//echo "".$datanya;
		$lamakerja=$this->input->post('lamakerja');
		$tahunlamakerja=$this->input->post('tahunlamakerja');
		$lamakerjanya=$lamakerja." ".$tahunlamakerja;

		$rawatbayi=$this->input->post('rawatbayi');
		$tahunrawatbayi=$this->input->post('tahunrawatbayi');
		$rawatbayinya=$rawatbayi." ".$tahunrawatbayi;

		if($this->input->post('kerjaprt')=="1") {
			$kerjaprt="1";
		}else{
			$kerjaprt="0";
		}
		if($this->input->post('memasak')=="1") {
			$memasak="1";
		}else{
			$memasak="0";
		}
		if($this->input->post('cucibaju')=="1") {
			$cucibaju="1";
		}else{
			$cucibaju="0";
		}
		if($this->input->post('setrika')=="1"){
			$setrika="1";
		}else{
			$setrika="0";
		}
		if($this->input->post('cucimobil')=="1") {
			$cucimobil="1";
		}else{
			$cucimobil="0";
		}
		if($this->input->post('rawatbinatang')=="1") {
			$rawatbinatang="1";
		}else{
			$rawatbinatang="0";
		}



            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'negara' => $this->input->post('negara'),
            	 	'lokasikerja' => $this->input->post('lokasikerja'),
					'lamakerja' => $lamakerjanya,
					'periodekerja' => $this->input->post('periodekerja'),
					'jamkerja' => $this->input->post('jamkerja'),
					'majikan' => $this->input->post('majikan'),
					'alasanberhenti' => $this->input->post('alasan'),

					'kerjaprt' => $kerjaprt,
					'memasak' => $memasak,
					'mencucibaju' => $cucibaju,
					'setrikabaju' => $setrika,
					'mencucimobil' => $cucimobil,
					'rawatbinatang' => $rawatbinatang,

					'rawatbayi' => $rawatbayinya,
					'rawatanak' => $this->input->post('rawatanak'),
					'kondisi' => $this->input->post('kondisianak'),
					'umur' => $datanyaanak,
					
					'jompokelamin' => $this->input->post('jenis_kelamin'),
					'jompoumur' => $this->input->post('umurjompo'),
					'jompokondisi' => $datanya,

					'jompokelamin2' => $this->input->post('jenis_kelamin2'),
					'jompoumur2' => $this->input->post('umurjompo2'),
					'jompokondisi2' => $datanya2,

					'anggotarumah' => $this->input->post('jumlahanggota'),
					'tiperumah' => $this->input->post('tiperumah'),
					'jumlahlantai' => $this->input->post('lantai'),
					'jumlahkamar' => $this->input->post('kamar'),
					'keterangan' => $this->input->post('keterangan'),


				);
			$this->db->insert('pengalaman', $data);
	} 

}
?>