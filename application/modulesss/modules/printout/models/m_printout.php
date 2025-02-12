<?php
class M_printout extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

	function nama($id){
	$output;
        $result = mysql_query("SELECT nama FROM personal where id_biodata='$id'");
			while($row = mysql_fetch_array($result)){
                $output=$row['nama'];
			}
		return $output;
	}
	
	function tempatlahir($id){
	$output;
        $result = mysql_query("SELECT tempatlahir FROM personal where id_biodata='$id'");
			while($row = mysql_fetch_array($result)){
                $output=$row['tempatlahir'];
			}
		return $output;
	}
	
	function tgllahir($id){
	$output;
        $result = mysql_query("SELECT tgllahir FROM personal where id_biodata='$id'");
			while($row = mysql_fetch_array($result)){
				$output=$row['tgllahir'];
			}
		return $output;
	}
	
	function jenis_kelamin($id){
	$output;
        $result = mysql_query("SELECT jeniskelamin FROM personal where id_biodata='$id'");
			while($row = mysql_fetch_array($result)){
				$output=$row['jeniskelamin'];
			}
		return $output;
	}
	
	function alamat($id){
	$output;
        $result = mysql_query("SELECT alamat FROM personal where id_biodata='$id'");
			while($row = mysql_fetch_array($result)){
				$output=$row['alamat'];
			}
		return $output;
	}
	
	function nama_waris($id){
	$output;
        $result = mysql_query("SELECT * FROM family where id_biodata='$id'");
			while($row = mysql_fetch_array($result)){
				$output=$row['nama_bapak'];
			}
		return $output;
	}

}
?>