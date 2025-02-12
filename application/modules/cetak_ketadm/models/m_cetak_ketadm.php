<?php
class M_cetak_ketadm extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	function select($qq) {
		return $this->db->query($qq)->result();
	}
}
?>