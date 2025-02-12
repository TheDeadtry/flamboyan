<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_template extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	
	function tampil_pengguna_admin($username){
		$nama;
        $result = mysql_query("SELECT username FROM user where username='$username' AND status='1'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['username'];
			}
		return $nama;
	}
	
		function tampil_pengguna_agen($username){
		$nama;
        $result = mysql_query("SELECT username FROM user where username='$username' AND status='2'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['username'];
			}
		return $nama;
	}
	
}