<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detail_personal_group extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			
		$this->load->model('M_detail_personal_group');			
	}

	function detail($id) {
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']) {
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
			$id_user = $session['session_userid'];
			$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status == 3) {
				//user sudah login
				
				$data['majikan'] = $this->M_detail_personal_group->tampil_majikan($id);
				$data['tki'] = $this->M_detail_personal_group->tampil_tki($id);
				$data['disnaker'] = $this->M_detail_personal_group->tampil_disnaker($id);
				//$data['pk'] = $this->M_detail_personal_group->tampil_pk($id);
				$data['suhan'] = $this->M_detail_personal_group->tampil_suhan($id);
				$data['visa'] = $this->M_detail_personal_group->tampil_visa($id);
				$data['paspor'] = $this->M_detail_personal_group->tampil_paspor($id);
				//$data['skck'] = $this->M_detail_personal_group->tampil_skck($id);
				$data['medical'] = $this->M_detail_personal_group->tampil_medikal($id);
				$data['pap'] = $this->M_detail_personal_group->tampil_pap($id);
				$data['ksploan'] = $this->M_detail_personal_group->tampil_ksp_loan($id);
				$data['departure'] = $this->M_detail_personal_group->tampil_departure($id);
				$data['personal'] = $this->M_detail_personal_group->ambil_id($id);
				$data['namamodule'] = "detail_personal_group";
				$data['namafileview'] = "detail_personal_group";
				echo Modules::run('template/group_template', $data);
			}
		}
	}
}