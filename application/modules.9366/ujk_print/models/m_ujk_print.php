<?php
class M_ujk_print extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	function select($qq) {
		return $this->db->query($qq)->result();
	}
}
?>