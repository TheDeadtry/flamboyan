<?php
class M_pdf9 extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function tampil_data_majikan() {
		$sql = "SELECT datamajikan.*,dataagen.nama as namaagen FROM datamajikan LEFT JOIN dataagen on datamajikan.kode_agen=dataagen.id_agen ORDER BY datamajikan.nama ASC";
     return $query = $this->db->query($sql);
	} 

    function tampil_data_majikan_selected($kode) {
		$sql = "SELECT datamajikan.*,dataagen.nama as namaagen FROM datamajikan 
		LEFT JOIN dataagen on datamajikan.kode_agen=dataagen.id_agen 
		WHERE dataagen.id_agen=$kode 
		ORDER BY datamajikan.nama ASC";
     return $query = $this->db->query($sql);
	} 
		function tampil_data_suhan() {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
FROM datasuhan 
LEFT JOIN datamajikan 
ON datasuhan.id_majikan=datamajikan.id_majikan 
LEFT JOIN dataagen 
ON dataagen.id_agen=datasuhan.id_agen
LEFT JOIN datagroup
ON datagroup.id_group=datasuhan.id_group ORDER BY datamajikan.nama ASC;";
		 return $query = $this->db->query($sql);
	}

				function tampil_datahistory($id) {
		$sql = "SELECT * from suhanhistory where id_suhan='$id'";
        return $query = $this->db->query($sql);
	} 


	function tampil_data_visapermit() {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
FROM datavisapermit 
LEFT JOIN datamajikan 
ON datavisapermit.id_majikan=datamajikan.id_majikan 
LEFT JOIN dataagen 
ON dataagen.id_agen=datavisapermit.id_agen
LEFT JOIN datagroup
ON datagroup.id_group=datavisapermit.id_group
LEFT JOIN datasuhan
ON datasuhan.id_suhan=datavisapermit.id_suhan ORDER BY datamajikan.nama ASC;";
		
		return $this->db->query($sql);
	}

				function tampil_datahistoryvisapermit($id) {
		$sql = "SELECT * from visapermithistory where id_visapermit='$id'";
        return $query = $this->db->query($sql);
	} 

}
?>