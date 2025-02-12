<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class detaildisnaker_detail extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			

		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];

		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		}		
		if ($id_user && $status!=1){
			redirect('dashboard');
		}
	}

	function index($pilihan) {	
		$data['idbio'] 			= $pilihan;
		$data['tampil_data'] 	= $this->M_session->select("SELECT a.*, b.nama as pc FROM disnaker_backup a LEFT JOIN list_komputer b ON a.ip=b.ip where id_biodata='$pilihan' order by date_created DESC");

		$data['namamodule'] 	= "detaildisnaker_detail";
		$data['namafileview'] 	= "detail";
		echo Modules::run('template/new_admin2_template', $data); 
	}


}