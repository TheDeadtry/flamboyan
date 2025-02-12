<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

require_once dirname(__FILE__).'/tcpdf/tcpdf.php';
//require_once dirname(__FILE__).'/tcpdf/examples/tcpdf_include.php';
class Pdf extends TCPDF{
	public function __construct(){
            parent::__construct();
					
	}
	}