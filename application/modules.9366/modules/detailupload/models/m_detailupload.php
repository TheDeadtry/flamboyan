<?php
class M_detailupload extends CI_Model{
    function __construct(){
        parent::__construct();
    }

			function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

	


}
?>