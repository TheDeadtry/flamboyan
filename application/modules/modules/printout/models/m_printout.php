<?php
class M_printout extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function ambil_data_penempatan($id) {
      $sql = "SELECT TIMESTAMPDIFF ( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                personal.*,
                family.*,
                disnaker.*
              FROM personal
              JOIN family ON personal.id_biodata = family.id_biodata
              JOIN disnaker ON personal.id_biodata = disnaker.id_biodata
              WHERE personal.id_biodata='$id'";
      $tampil = $this->db->query($sql);
      return $tampil;
    }

    function ambil_data_biodata($id) {
    	$sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
    				   majikan.namamajikan,
    				   personal.*,
    				   family.*,
    				   working.*,
    				   skillcondition.*,
    				   request.*,	
    				   paspor.keterangan AS ketpas,
    				   paspor.berlaku,
    				   medical.keterangan AS ketmed
    			FROM personal 
    			JOIN majikan ON personal.id_biodata = majikan.id_biodata 
    			JOIN family ON personal.id_biodata = family.id_biodata
    			JOIN working ON personal.id_biodata = working.id_biodata
    			JOIN skillcondition ON personal.id_biodata = skillcondition.id_biodata
    			JOIN request ON personal.id_biodata = request.id_biodata
    			JOIN paspor ON personal.id_biodata = paspor.id_biodata
    			JOIN medical ON personal.id_biodata = medical.id_biodata
    			WHERE personal.id_biodata='$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil;
    }

    function ambil_data_biodatafi($id) {
     	$sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
     				   personal.*,
     				   family.*,
     				   pengalaman.*,
                       tugas.*,
                       kettugas.*,
     				   paspor.keterangan AS ketpas,
     				   paspor.berlaku,
     				   paspor.rencana
     			FROM personal
     			JOIN family ON personal.id_biodata = family.id_biodata
     			JOIN pengalaman ON personal.id_biodata = pengalaman.id_biodata
                JOIN tugas ON personal.id_biodata = tugas.id_biodata
                JOIN kettugas ON personal.id_biodata = kettugas.id_biodata
     			JOIN paspor ON personal.id_biodata = paspor.id_biodata
     			WHERE personal.id_biodata='$id'";
     	$tampil = $this->db->query($sql);
     	return $tampil;
    }
        function ambil_data_biodataff($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                       personal.*,
                       family.*,
                       pengalaman.*,
                       tugas.*,
                       kettugas.*,
                       paspor.keterangan AS ketpas,
                       paspor.berlaku,
                       paspor.rencana
                FROM personal
                JOIN family ON personal.id_biodata = family.id_biodata
                JOIN pengalaman ON personal.id_biodata = pengalaman.id_biodata
                JOIN tugas ON personal.id_biodata = tugas.id_biodata
                JOIN kettugas ON personal.id_biodata = kettugas.id_biodata
                JOIN paspor ON personal.id_biodata = paspor.id_biodata
                WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil;
    }

    function ambil_data_biodatajp($id) {
        $sql = "SELECT TIMESTAMPDIFF( YEAR, personal.tgllahir, CURDATE( ) ) AS umur,
                 personal.*,
                 family.*,
                 working.*,
                 skillcondition.*,
                 interview.*,
                 paspor.keterangan AS ketpas,
                 paspor.berlaku,
                 medical.keterangan AS ketmed
            FROM personal
            JOIN family ON personal.id_biodata = family.id_biodata
            JOIN working ON personal.id_biodata = working.id_biodata
            JOIN skillcondition ON personal.id_biodata = skillcondition.id_biodata
            JOIN interview ON personal.id_biodata = interview.id_biodata
            JOIN paspor ON personal.id_biodata = paspor.id_biodata
            JOIN medical ON personal.id_biodata = medical.id_biodata
            WHERE personal.id_biodata='$id'";
        $tampil = $this->db->query($sql);
        return $tampil;
    }

    function ambil_data_disnaker($id) {
    	$sql = "SELECT * FROM disnaker WHERE id_biodata='$id'";
    	$tampil = $this->db->query($sql);
    	return $tampil;
    }

	function nama($id){
	$output;
        $result = Dbs::load("SELECT nama FROM personal where id_biodata='$id'");
			while($row = mysqli_fetch_array($result)){
                $output=$row['nama'];
			}
		return $output;
	}
	
	function tempatlahir($id){
	$output;
        $result = Dbs::load("SELECT tempatlahir FROM personal where id_biodata='$id'");
			while($row = mysqli_fetch_array($result)){
                $output=$row['tempatlahir'];
			}
		return $output;
	}
	
	function tgllahir($id){
	$output;
        $result = Dbs::load("SELECT tanggallahir FROM disnaker where id_biodata='$id'");
			while($row = mysqli_fetch_array($result)){
				$output=$row['tanggallahir'];
			}
		return $output;
	}
	
	function jenis_kelamin($id){
	$output;
        $result = Dbs::load("SELECT jeniskelamin FROM personal where id_biodata='$id'");
			while($row = mysqli_fetch_array($result)){
				$output=$row['jeniskelamin'];
			}
		return $output;
	}
	
	function alamat($id){
	$output;
        $result = Dbs::load("SELECT alamat FROM disnaker where id_biodata='$id'");
			while($row = mysqli_fetch_array($result)){
				$output=$row['alamat'];
			}
		return $output;
	}
	
	function nama_waris($id){
	$output;
        $result = Dbs::load("SELECT * FROM family where id_biodata='$id'");
			while($row = mysqli_fetch_array($result)){
				$output=$row['nama_bapak'];
			}
		return $output;
	}

                function tampil_data_personal($idnya){
        $sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
                    function tampil_data_family($idnya){
        $sql = "SELECT * FROM family WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }

                    function tampil_data_working($idnya){
        $sql = "SELECT * FROM working INNER JOIN kategoripekerjaan ON kategoripekerjaan.id_kategori=working.jenis_usaha WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function tampil_data_skill($idnya){
        $sql = "SELECT * FROM skillcondition WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }

        function tampil_data_request($idnya){
        $sql = "SELECT * FROM request WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
        function tampil_data_paspor($idnya){
        $sql = "SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM paspor WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
                    function tampil_data_medical($idnya){
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical WHERE id_biodata='".$idnya."'  ORDER BY id_medical ASC LIMIT 1";
                $query = $this->db->query($sql);

            return $query->result();
    }
	    function hitung_data_medical($idnya) {
    	$sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 WHERE id_biodata='".$idnya."'  ORDER BY id_medical ASC LIMIT 1";
    	$tampil = $this->db->query($sql);
    	return $tampil->num_rows();
    }
	                    function tampil_data_medical2($idnya){
        $sql = "SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical2 WHERE id_biodata='".$idnya."'  ORDER BY id_medical ASC LIMIT 1";
                $query = $this->db->query($sql);

            return $query->result();
    }
	
    function tampil_data_interview($idnya){
        $sql = "SELECT * FROM interview WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
        function tampil_data_pengalaman($idnya){
        $sql = "SELECT * FROM pengalaman WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
            function tampil_data_tugas($idnya){
        $sql = "SELECT * FROM tugas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
                function tampil_data_kettugas($idnya){
        $sql = "SELECT * FROM kettugas WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
    }

}
?>