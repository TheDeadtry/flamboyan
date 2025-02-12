<?php
class M_detailvaksin extends CI_Model{
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
		$sql = "SELECT a.*,b.id_setting_vaksinlist as xid1,c.id_setting_vaksinlist as xid2,d.id_setting_vaksinlist as xid3,b.nama as xnama1,c.nama as xnama2,d.nama as xnama3 FROM vaksin a 
				LEFT JOIN setting_vaksinlist b ON a.nama1=b.id_setting_vaksinlist
				LEFT JOIN setting_vaksinlist c ON a.nama2=c.id_setting_vaksinlist 
				LEFT JOIN setting_vaksinlist d ON a.nama3=d.id_setting_vaksinlist  
				
				WHERE a.id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahrequest() {


            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'nama1' => $this->input->post('namavaksin1'),
            	 	'tgl1' => $this->input->post('tglvaksin1'),
            	 	'nama2' => $this->input->post('namavaksin2'),
            	 	'tgl2' => $this->input->post('tglvaksin2'),
            	 	'nama3' => $this->input->post('namavaksin3'),
            	 	'tgl3' => $this->input->post('tglvaksin3'),

				);
			$this->db->insert('vaksin', $data);
	} 

		function ubahrequest() {

            	 $data = array(  
					'nama1' => $this->input->post('namavaksin1'),
					'tgl1' => $this->input->post('tglvaksin1'),
					'nama2' => $this->input->post('namavaksin2'),
					'tgl2' => $this->input->post('tglvaksin2'),
					'nama3' => $this->input->post('namavaksin3'),
					'tgl3' => $this->input->post('tglvaksin3'),

				);
           $this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('vaksin', $data);
			//$this->db->insert('request', $data);
	} 

	function hapusrequest($id) {
		$this->db->where('id_biodata', $id);
		$this->db->delete('vaksin');
	}

function hitung_data_request($idnya){
		$sql = "SELECT count(*) as total FROM vaksin WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
}
?>