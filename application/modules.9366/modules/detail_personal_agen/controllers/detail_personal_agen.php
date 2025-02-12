<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detail_personal_agen extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			
		$this->load->model('m_detail_personal_agen');			
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
			if ($id_user && $status == 2) {
				//user sudah login
			$data['detailpersonalid'] = $id;
				  	  	$this->session->set_userdata("detailuser",$id);

			
			$data['tampil_data_personal'] = $this->m_detail_personal_agen->tampil_data_personal($id);
			$data['ambildatatki'] = $this->m_detail_personal_agen->ambildatatki($id);
			$data['ambildatadisnaker'] = $this->m_detail_personal_agen->ambildatadisnaker($id);
			$data['ambildatamajikan'] = $this->m_detail_personal_agen->ambildatamajikan($id);
			$data['ambildatapk'] = $this->m_detail_personal_agen->ambildatapk($id);

			$data['ambilsuhan'] = $this->m_detail_personal_agen->ambilsuhan($id);
			$data['ambilvisapermit'] = $this->m_detail_personal_agen->ambilvisapermit($id);
			$data['ambilpaspor'] = $this->m_detail_personal_agen->ambilpaspor($id);
			$data['ambilskck'] = $this->m_detail_personal_agen->ambilskck($id);
			$data['ambilmedical'] = $this->m_detail_personal_agen->ambilmedical($id);
			$data['ambilvisa'] = $this->m_detail_personal_agen->ambilvisa($id);
			$data['ambildatapap'] = $this->m_detail_personal_agen->ambildatapap($id);
			$data['ambilbank'] = $this->m_detail_personal_agen->ambilbank($id);
			$data['ambilterbang2'] = $this->m_detail_personal_agen->ambilterbang2($id);
			$data['ambildataremark'] = $this->m_detail_personal_agen->ambildataremark($id);

				// $data['majikan'] = $this->m_detail_personal_agen->tampil_majikan($id);
				// $data['tki'] = $this->m_detail_personal_agen->tampil_tki($id);
				// $data['disnaker'] = $this->m_detail_personal_agen->tampil_disnaker($id);
				// //$data['pk'] = $this->m_detail_personal_agen->tampil_pk($id);
				// $data['suhan'] = $this->m_detail_personal_agen->tampil_suhan($id);
				// $data['visa'] = $this->m_detail_personal_agen->tampil_visa($id);
				// $data['paspor'] = $this->m_detail_personal_agen->tampil_paspor($id);
				// //$data['skck'] = $this->m_detail_personal_agen->tampil_skck($id);
				// $data['medical'] = $this->m_detail_personal_agen->tampil_medikal($id);
				// $data['pap'] = $this->m_detail_personal_agen->tampil_pap($id);
				// $data['ksploan'] = $this->m_detail_personal_agen->tampil_ksp_loan($id);
				// $data['departure'] = $this->m_detail_personal_agen->tampil_departure($id);
				// $data['personal'] = $this->m_detail_personal_agen->ambil_id($id);
				$data['namamodule'] = "detail_personal_agen";
				$data['namafileview'] = "detail_personal_agen";
				echo Modules::run('template/agen_template', $data);
			}
		}
	}
}