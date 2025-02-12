<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_master_userid extends CI_Model {
	public function __construct(){
            parent::__construct();
    }

	function get_userid($userid){
		$data_userid = $this->db->query("select a.status,a.username,a.password from user a where username='$userid' 
										union select b.status,b.username,b.password from datagroup b where username='$userid'
										union select c.status,c.username,c.password from dataagen c where username='$userid'
										");
			//$data_userid = $this->db->query("select * from user where userid='$userid'");
		return $data_userid;
	}
}
?>