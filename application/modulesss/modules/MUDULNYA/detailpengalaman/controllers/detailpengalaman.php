<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailpengalaman extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailpengalaman');	
			$this->load->library('form_validation');
		
	}
	
	function index(){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){

				$data['tampil_data_sektor'] = $this->M_detailpengalaman->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailpengalaman->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailpengalaman->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailpengalaman->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailpengalaman->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailpengalaman->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailpengalaman->tampil_data_provinsi();

				$data['detailpengalamanid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pengalaman'] = $this->M_detailpengalaman->tampil_data_pengalaman($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailpengalaman->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungpengalaman'] = $this->M_detailpengalaman->hitung_data_pengalaman($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailpengalaman";
				$data['namafileview'] = "detailpengalaman";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailpengalaman";
				$data['namafileview'] = "detailpengalamanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}



function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahbio');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahbio');
} 
		}

}