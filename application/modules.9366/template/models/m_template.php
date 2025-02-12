<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_template extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	
	function tampil_pengguna_admin($username){
		$nama="";
        $result = Dbs::load("SELECT username FROM user where username='$username' AND status='1'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['username'];
			}
		return $nama;
	}
	
		function tampil_pengguna_agen($username){
		$nama="";
        $result = Dbs::load("SELECT username FROM user where username='$username' AND status='2'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['username'];
			}
		return $nama;
	}
			function tampil_pengguna_group($username){
		$nama="";
        $result = Dbs::load("SELECT username FROM user where username='$username' AND status='3'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['username'];
			}
		return $nama;
	}
	
}