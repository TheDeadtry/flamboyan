<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gugus {
		var $CI;
	    public function __construct($params = array())
	    {
	        $this->CI =& get_instance();
	        $this->CI->load->helper('url');
	        $this->CI->config->item('base_url');
	        $this->CI->load->database();
	    }

        function panggildatabase($table)
        {
	        $data = $this->CI->db->query("SELECT * FROM $table")->result();
	        return $data;
        }

        function buatarray($kode, $diminta, $dari, $tambahan = ""){
		    $data = $this->CI->db->query("SELECT ".$kode." FROM ".$dari.$tambahan)->result();
		    $array = array();
		    if (isset($data)) {
		        foreach ($data as $key => $dataarr) {
		            $array[] = strtoupper($dataarr->$diminta);        
		        }
		    }else{
		        $array[] = "";
		    }
		}
}