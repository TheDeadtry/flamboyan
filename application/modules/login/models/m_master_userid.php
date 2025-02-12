<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_master_userid extends CI_Model {
	public function __construct(){
            parent::__construct();
    }

	function get_userid($userid){
		$data_userid = $this->db->query("select a.status,a.username,a.password from user a where lower(username)='$userid' 
										union select b.status,b.username,b.password from datagroup b where lower(username)='$userid'
										union select CONCAT('3') AS status,c.kode_agen as username,c.password from dataagen c where lower(kode_agen)=lower('".$userid."')
										");
			//$data_userid = $this->db->query("select * from user where userid='$userid'");
		return $data_userid;
	}
}
?>