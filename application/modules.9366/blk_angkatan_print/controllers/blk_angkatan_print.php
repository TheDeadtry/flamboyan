<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_angkatan_print extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');		
		$session = $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		} 	
		if ($id_user && $status!=2){
			redirect('dashboard');
		}
	}
	
	function index() {
		$pilsek = $this->session->userdata('pil_angkatan');

		$tki = "SELECT a.nama, b.date_angkatan, a.nodaftar FROM personalblk a LEFT JOIN personal_angkatan b ON a.nodaftar=b.nodaftar ORDER BY b.date_angkatan DESC";
		//$data['tampil_data_tki'] = $this->M_session->select($tki);
		$tampil_data_tki2 = $this->M_session->select($tki);

		$data33 = array();
		foreach($tampil_data_tki2 as $pkt) {
			if ($pkt->date_angkatan != NULL) {
	            $startpast = $pkt->date_angkatan;
	            $xnowday = date('Y-m-d');
	            $datetimeee = new DateTime($startpast);
	            $dayzz = $datetimeee->format('w');
	            if($dayzz == 1) {
	                $xfirstday  = $startpast;
	            } else {
	                $xfirstday  = date('Y-m-d', strtotime('next monday', strtotime($startpast)));
	            }
	            if ($xfirstday <= $xnowday) {
	                $dayss = round(abs(strtotime($xnowday)-strtotime($xfirstday))/86400);
	                $weekk = (int)($dayss / 7)+1;
	            } elseif ($xfirstday >= $xnowday) {
	                $weekk = 0;
	            } else {
	                $weekk = 0;
	            }
	            $weekk = 'M'.$weekk;
	        } else {
	            $weekk = "BELUM DIISI";
	        }

	        if ($pilsek != 'BLANK' && $pilsek != '') {
	        	if ($weekk == $pilsek) {
		        	$data33[] = array(
		        		'nama' 		=> $pkt->nama,
		        		'date' 		=> $pkt->date_angkatan,
		        		'nodaftar' 	=> $pkt->nodaftar,
		        		'angkatan' 	=> $weekk
		        	);
		        }
	        } elseif ($pilsek == 'BLANK' && $pkt->date_angkatan == NULL) {
	        	if ($weekk = "BELUM DIISI") {
		        	$data33[] = array(
		        		'nama' 		=> $pkt->nama,
		        		'date' 		=> $pkt->date_angkatan,
		        		'nodaftar' 	=> $pkt->nodaftar,
		        		'angkatan' 	=> $weekk
		        	);
	        	}
	        } elseif ($pilsek == '') {
	        	$data33[] = array(
	        		'nama' 		=> $pkt->nama,
	        		'date' 		=> $pkt->date_angkatan,
	        		'nodaftar' 	=> $pkt->nodaftar,
	        		'angkatan' 	=> $weekk
	        	);
	        }

		        
		}

		$data['tampil_data_tki'] = $data33;

		$data['pilsek'] = $pilsek;

		$data['namamodule'] 	= "blk_angkatan_print";
		$data['namafileview'] 	= "blk_angkatan_print";
		echo Modules::run('template/blk_template', $data); 
	}

	function setpilih($pil_angkatan) {
		$this->session->set_userdata('pil_angkatan', $pil_angkatan);

		redirect('blk_angkatan_print/');
	}


}