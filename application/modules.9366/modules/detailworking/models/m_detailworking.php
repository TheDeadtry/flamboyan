<?php
class M_detailworking extends CI_Model{
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

	function hitung_data_working($idnya){
		$sql = "SELECT count(*) as total FROM working WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_working($idnya){
		$sql = "SELECT * FROM working INNER JOIN kategoripekerjaan ON kategoripekerjaan.id_kategori=working.jenis_usaha WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_posisi(){
		$sql = "SELECT * FROM dataposisi";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tampil_data_alasan(){
		$sql = "SELECT * FROM dataalasan";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	 function getposisiList(){

	
        $result = array();
        $this->db->select('*');
        $this->db->from('kategoripekerjaan');
        $this->db->order_by('isi','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih jenis Usaha-';
            $result[$row->id_kategori]= $row->isi." ".$row->mandarin;
        }

        return $result;
    }


}
?>