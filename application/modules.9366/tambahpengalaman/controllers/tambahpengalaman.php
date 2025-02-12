<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahpengalaman extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahpengalaman');	
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

				$data['tampil_data_sektor'] = $this->M_tambahpengalaman->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahpengalaman->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahpengalaman->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahpengalaman->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahpengalaman->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahpengalaman->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahpengalaman->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahpengalaman->tampil_data_jobs();
				$data['pilihan_jenis_usaha'] = $this->M_tambahpengalaman->tampil_data_kategoripekerjaan();
				$data['pilihan_penjelasan'] = $this->M_tambahpengalaman->tampil_data_penjelasan();
				$data['pilihan_posisi'] = $this->M_tambahpengalaman->tampil_data_posisi();
				$data['pilihan_alasan'] = $this->M_tambahpengalaman->tampil_data_alasan();
				$data['tampil_data_kondisijompo'] = $this->M_tambahpengalaman->tampil_data_kondisijompo();



				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahpengalaman->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_pengalaman'] = $this->M_tambahpengalaman->tampil_data_pengalaman($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahpengalaman";
				$data['namafileview'] = "tambahpengalamanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahpengalaman";
				$data['namafileview'] = "tambahpengalamanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}


	function v_ubahpengalaman($id_nim){

		$data['tampil_data_sektor'] = $this->M_tambahpengalaman->tampil_data_sektor();
		$data['tampil_data_negara'] = $this->M_tambahpengalaman->tampil_data_negara();
		$data['tampil_data_calling'] = $this->M_tambahpengalaman->tampil_data_calling();
		$data['tampil_data_skillnya'] = $this->M_tambahpengalaman->tampil_data_skillnya();
		$data['tampil_data_agama'] = $this->M_tambahpengalaman->tampil_data_agama();
		$data['tampil_data_pendidikan'] = $this->M_tambahpengalaman->tampil_data_pendidikan();
		$data['tampil_data_provinsi'] = $this->M_tambahpengalaman->tampil_data_provinsi();
		$data['tampil_data_jobs'] = $this->M_tambahpengalaman->tampil_data_jobs();
		$data['pilihan_jenis_usaha'] = $this->M_tambahpengalaman->tampil_data_kategoripekerjaan();
		$data['pilihan_penjelasan'] = $this->M_tambahpengalaman->tampil_data_penjelasan();
		$data['pilihan_posisi'] = $this->M_tambahpengalaman->tampil_data_posisi();
		$data['pilihan_alasan'] = $this->M_tambahpengalaman->tampil_data_alasan();
		$data['tampil_data_kondisijompo'] = $this->M_tambahpengalaman->tampil_data_kondisijompo();

		$data['idpengalamannya']=$id_nim;
		$data['idbiodatanya'] = $this->session->userdata("detailuser");
		$data['jenisnya'] = $this->session->userdata("jeniskelamin");
		$data['tampil_data_personal'] = $this->M_tambahpengalaman->tampil_data_personal($this->session->userdata("detailuser"));
		$data['tampil_data_pengalaman'] = $this->M_tambahpengalaman->tampil_data_pengalaman($this->session->userdata("detailuser"));

		$data['tampil_data_pengalamandetail'] = $this->M_tambahpengalaman->tampil_data_pengalamandetail($this->session->userdata("detailuser"),$id_nim);

				$data['namamodule'] = "tambahpengalaman";
				$data['namafileview'] = "ubahpengalamanadmin";
				echo Modules::run('template/admin_template', $data);
	}

	function tambahpengalamandata() {
			$this->M_tambahpengalaman->tambahpengalaman();
			redirect('detailpengalaman');
		}


		function ubahpengalamandata() {
			$this->M_tambahpengalaman->ubahpengalaman();
			redirect('detailpengalaman');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahpengalaman');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahpengalaman');
} 
		}


		function hapuspengalaman($id){
		$this->M_tambahpengalaman->hapus_pengalaman($id);
		redirect("detailpengalaman");
	}

}