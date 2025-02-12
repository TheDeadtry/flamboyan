<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_session extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_session(){
		$data['session_userid'] = $this->session->userdata('session_userid');
		$data['session_status'] = $this->session->userdata('session_status');
		return $data;
	}

	function store_session($userid,$status){
		//$userid='1';
		$this->session->set_userdata('session_userid', $userid);
		$this->session->set_userdata('session_status', $status);
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        $this->session->set_userdata('session_ip', $ipaddress);
	}

	function destroy_session(){
		$this->session->unset_userdata('session_userid');
		$this->session->unset_userdata('session_status');
	}
	
	function select($qq) {
		return $this->db->query($qq)->result();
	}
	
	function select_row($qq) {
		return $this->db->query($qq)->row();
	}
	private function getqr($qq) {
		return $this->db->query($qq);
	}

	public static function get_sektor($sektor) {
		$db = "
		SELECT 
			kode,
			isi,
			CASE
				WHEN LOWER(isi) LIKE '%informal%' THEN 'informal'
				WHEN LOWER(isi) LIKE '%jompo%' THEN 'jp'
				ELSE 'formal'
			END AS kategori
		FROM (
			SELECT 
				LOWER(kode_jenis) AS kode, 
				LOWER(isi) AS isi 
			FROM datasektor
		) AS a WHERE kode = '$sektor' 
		";
		$data = (new self)->getqr($db)->row();
		if($data){
			return $data->kategori;
		}else{
			return 'formal';
		}
	}
	
	function select_array($qq) {
		return $this->db->query($qq)->result_array();
	}	
	
	function select_ra($qq) {
		return $this->db->query($qq)->row_array();
	}	
	
	function select_custom($qq, $ww="*", $tp="result") {
		if ($ww == "*" || $ww == NULL || $ww == TRUE) {
			$ww == "*";
		}

		$mdl = $this->db->query("SELECT ".$ww." FROM ".$qq);

		if ($tp == "row") {
			$res = $mdl->row();
		} elseif ($tp == "result" || $tp == "") {
			$res = $mdl->result();
		} else {
			exit('error_select_custom 98');
		}
		return $res;
	}
	
	function select_count($qq) {
		return $this->db->query("SELECT count(*) as total FROM ".$qq)->row()->total;
	}
	
	function select_one($qq, $ww) {
		$mdl = $this->db->query("SELECT ".$ww." as field FROM ".$qq)->row_array();
		return $mdl['field'];
	}	
	
 	function insert($data, $tbl) {
 		$this->db->insert($tbl, $data);
        return TRUE;
 	}

    function insert_return_id($data, $tbl) {
        $this->db->insert($tbl, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function insert_batch($data, $tbl) {
		$this->db->insert_batch($tbl, $data);
		return TRUE;
    }

 	function update($data, $tbl, $value_id, $field_id) {
 		$this->db->where($field_id, $value_id);
 		$this->db->update($tbl, $data);
        return TRUE;
 	}

    function update_batch($data, $tbl, $field_id) {
		$this->db->update_batch($tbl, $data, $field_id);
    }

 	function delete($tbl, $value_id, $field_id) {
 		$this->db->where($field_id, $value_id);
 		$this->db->delete($tbl);
        return TRUE;
 	}

 	function delete_batch($tbl, $value_batch_id, $field_id) {
		$this->db->where_in($field_id, $value_batch_id);
		$this->db->delete($tbl);
 	}


	
	
	function fingerspot_select($qq) {
		$otherdb = $this->load->database('forum', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
		return $otherdb->query($qq)->result();
	}

	function fingerspot_checkinsertbatch($qq) {
		$otherdb = $this->load->database('forum', TRUE);
		$otherdb->insert('pegawai', $qq);
	}

	function fingerspot_delete($value_id) {
		$otherdb = $this->load->database('forum', TRUE);
		$otherdb->where('pegawai_pin', $value_id);
		$otherdb->delete('pegawai');
	   	return TRUE;
	}
	
	
	function getDataWhere( $diminta, $dari, $where){
		$data = $this->db->query("SELECT ".$diminta." FROM ".$dari." WHERE ".$where)->row();
		$dikirim = isset($data->$diminta);
		if ($dikirim == 1) {
			$paket = $data->$diminta;
		}else{
			$paket = "";
		}
		return $paket;
	}
	function getDataWhereCount( $diminta, $dari, $where){
		$data = $this->db->query("SELECT count(".$diminta.") as count FROM ".$dari." WHERE ".$where)->row();
		return $data->count;
	}
	function getData( $diminta, $dari, $selector, $key){
		$data = $this->db->query("SELECT ".$diminta." FROM ".$dari." WHERE ".$selector." = '".$key."'")->row();
		$dikirim = isset($data->$diminta);
		if ($dikirim == 1) {
			$paket = $data->$diminta;
		}else{
			$paket = "";
		}
		return $paket;
	}
	function getDataAll( $diminta, $dari, $selector, $key, $options = ''){
		$data = $this->db->query("SELECT ".$diminta." FROM ".$dari." WHERE ".$selector." = '".$key."' ".$options)->result();
		return $data;
	}
	function getDataAllRow( $diminta, $dari, $where){
		$data = $this->db->query("SELECT ".$diminta." FROM ".$dari." WHERE ".$where)->row();
		return $data;
	}

}
?>