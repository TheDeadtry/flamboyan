<?php
class M_jobs extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_jobs($nama_jobs, $nama_jobs_taiwan){

		$data = array (
			'isi'=>$nama_jobs, 
			'mandarin'=>$nama_jobs_taiwan,
			);

		$this->db->insert('datajobs',$data);
	}

	function tampil_data_jobs(){
		$sql = "SELECT isi,mandarin FROM datajobs";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
}
?>