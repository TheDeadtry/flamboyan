<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailadministrasi extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');
			$this->load->model('M_detailadministrasi');
			$this->load->library('form_validation');

	}

	function index(){
		$session = $this->M_session->get_session();
		$sektor_group_formal = $this->db->query("SELECT kode_jenis FROM group_sektor_formal")->row()->kode_jenis; // mereturn data FF,HM,FH,MH,MC,HK,JP,MF,HF
		
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
				$data['detailpersonalid'] = $this->session->userdata("detailuser");

				$data['tampil_data_personal'] = $this->M_detailadministrasi->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tglbuat'] = $this->M_detailadministrasi->tglbuat($this->session->userdata("detailuser"));
				$data['nodisnaker'] = $this->M_detailadministrasi->nodisnaker($this->session->userdata("detailuser"));
				$data['tglonline'] = $this->M_detailadministrasi->tglonline($this->session->userdata("detailuser"));
				$data['tglpksisko'] = $this->M_detailadministrasi->tglpksisko($this->session->userdata("detailuser"));

				$data['tanggaldaftar'] = $this->M_detailadministrasi->tanggaldaftar($this->session->userdata("detailuser"));
				$data['nama'] = $this->M_detailadministrasi->nama($this->session->userdata("detailuser"));
				$data['tempatlahir'] = $this->M_detailadministrasi->tempatlahir($this->session->userdata("detailuser"));
				$data['tgllahir'] = $this->M_detailadministrasi->tgllahir($this->session->userdata("detailuser"));

				$data['noktp'] = $this->M_detailadministrasi->noktp($this->session->userdata("detailuser"));
				$data['jeniskelamin'] = $this->M_detailadministrasi->jeniskelamin($this->session->userdata("detailuser"));
				$data['agama'] = $this->M_detailadministrasi->agama($this->session->userdata("detailuser"));
				$data['status'] = $this->M_detailadministrasi->status($this->session->userdata("detailuser"));
				$data['pendidikan'] = $this->M_detailadministrasi->pendidikan($this->session->userdata("detailuser"));
				$data['alamat'] = $this->M_detailadministrasi->alamat($this->session->userdata("detailuser"));
				$data['namaayah'] = $this->M_detailadministrasi->namaayah($this->session->userdata("detailuser"));
				$data['namaibu'] = $this->M_detailadministrasi->namaibu($this->session->userdata("detailuser"));


				$med3 = $this->M_detailadministrasi->namamedical3($this->session->userdata("detailuser"));

				if($med3==null){
					$data['namamedical'] = $this->M_detailadministrasi->namamedical2($this->session->userdata("detailuser"));
					$data['tanggalmed'] = $this->M_detailadministrasi->tanggalmed2($this->session->userdata("detailuser"));
					$data['nomedical'] = $this->M_detailadministrasi->nomedical2($this->session->userdata("detailuser"));
				}else{
					$data['namamedical'] = $this->M_detailadministrasi->namamedical3($this->session->userdata("detailuser"));
					$data['tanggalmed'] = $this->M_detailadministrasi->tanggalmed3($this->session->userdata("detailuser"));
					$data['nomedical'] = $this->M_detailadministrasi->nomedical3($this->session->userdata("detailuser"));
				}

				$pass2 = $this->M_detailadministrasi->nopaspor($this->session->userdata("detailuser"));

				if($pass2==null){
					$data['nopaspor'] = $this->M_detailadministrasi->nopaspor2($this->session->userdata("detailuser"));
					$data['tglterbit'] = $this->M_detailadministrasi->tglterbit2($this->session->userdata("detailuser"));
					$data['expired'] = $this->M_detailadministrasi->expired2($this->session->userdata("detailuser"));
					$data['office'] = $this->M_detailadministrasi->office2($this->session->userdata("detailuser"));
				}else{
					$data['nopaspor'] = $this->M_detailadministrasi->nopaspor($this->session->userdata("detailuser"));
					$data['tglterbit'] = $this->M_detailadministrasi->tglterbit($this->session->userdata("detailuser"));
					$data['expired'] = $this->M_detailadministrasi->expired($this->session->userdata("detailuser"));
					$data['office'] = $this->M_detailadministrasi->office($this->session->userdata("detailuser"));
				}

				$data['namanegara'] = $this->M_detailadministrasi->namanegara($this->session->userdata("detailuser"));
				$data['namajabatan'] = $this->M_detailadministrasi->namajabatan($this->session->userdata("detailuser"));
				$data['tglmajikan'] = $this->M_detailadministrasi->tglmajikan($this->session->userdata("detailuser"));
				$data['namaagency'] = $this->M_detailadministrasi->namaagency($this->session->userdata("detailuser"));

				$data['namamajikan']="";
				$data['namamajikantaiwan']="";
				$data['alamatmajikan']="";
				$data['telpmajikan']="";
				$data['pekerjaan']="";

				$data['nosuhan']="";
				$data['terbitsuhan']="";
				$data['berakhirsuhan']="";
				$data['tglbawasuhan']="";
				$data['tglterimasuhan']="";

				$data['novisapermit']="";
				$data['terbitvisapermit']="";
				$data['berakhirvisapermit']="";
				$data['tglbawavisapermit']="";
				$data['tglterimavisapermit']="";

				$data['tglpk']=$this->M_detailadministrasi->tglpk($this->session->userdata("detailuser"));


				$stts = substr($this->session->userdata("detailuser"), 0, 2);
				$data['pekerjaan']=$this->M_detailadministrasi->pekerjaan($this->session->userdata("detailuser"));
				if(strpos($sektor_group_formal, $stts) == false) {	
					$data['namamajikan']=$this->M_detailadministrasi->namamajikanin($this->session->userdata("detailuser"));
					$data['namamajikantaiwan']=$this->M_detailadministrasi->namamajikantaiwanin($this->session->userdata("detailuser"));
					$data['alamatmajikan']=$this->M_detailadministrasi->alamatmajikanin($this->session->userdata("detailuser"));
					$data['telpmajikan']=$this->M_detailadministrasi->telpmajikanin($this->session->userdata("detailuser"));

					$data['nosuhan']=$this->M_detailadministrasi->nosuhanin($this->session->userdata("detailuser"));
					$data['terbitsuhan']=$this->M_detailadministrasi->terbitsuhanin($this->session->userdata("detailuser"));
					$data['tglterimasuhan']=$this->M_detailadministrasi->tglterimasuhanin($this->session->userdata("detailuser"));

					$data['novisapermit']=$this->M_detailadministrasi->novisapermitin($this->session->userdata("detailuser"));
					$data['terbitvisapermit']=$this->M_detailadministrasi->terbitvisapermitin($this->session->userdata("detailuser"));
					$data['tglterimavisapermit']=$this->M_detailadministrasi->tglterimavisapermitin($this->session->userdata("detailuser"));

				}
				if(strpos($sektor_group_formal, $stts) !== false) {	
					$data['namamajikan']=$this->M_detailadministrasi->namamajikanformal($this->session->userdata("detailuser"));
					$data['namamajikantaiwan']=$this->M_detailadministrasi->namamajikantaiwanformal($this->session->userdata("detailuser"));
					$data['alamatmajikan']=$this->M_detailadministrasi->alamatmajikanformal($this->session->userdata("detailuser"));
					$data['telpmajikan']=$this->M_detailadministrasi->telpmajikanformal($this->session->userdata("detailuser"));

					$data['nosuhan']=$this->M_detailadministrasi->nosuhan($this->session->userdata("detailuser"));
					$data['terbitsuhan']=$this->M_detailadministrasi->terbitsuhan($this->session->userdata("detailuser"));
					$data['berakhirsuhan']=$this->M_detailadministrasi->berakhirsuhan($this->session->userdata("detailuser"));
					$data['tglbawasuhan']=$this->M_detailadministrasi->tglbawasuhan($this->session->userdata("detailuser"));

					$data['novisapermit']=$this->M_detailadministrasi->novisapermit($this->session->userdata("detailuser"));
					$data['terbitvisapermit']=$this->M_detailadministrasi->terbitvisapermit($this->session->userdata("detailuser"));
					$data['berakhirvisapermit']=$this->M_detailadministrasi->berakhirvisapermit($this->session->userdata("detailuser"));
					$data['tglbawavisapermit']=$this->M_detailadministrasi->tglbawavisapermit($this->session->userdata("detailuser"));
				}

				$data['novisa']=$this->M_detailadministrasi->novisa($this->session->userdata("detailuser"));
				$data['terbitvisa']=$this->M_detailadministrasi->terbitvisa($this->session->userdata("detailuser"));
				$data['berakhirvisa']=$this->M_detailadministrasi->berakhirvisa($this->session->userdata("detailuser"));

				$data['nopap']=$this->M_detailadministrasi->nopap($this->session->userdata("detailuser"));
				$data['pap']=$this->M_detailadministrasi->pap($this->session->userdata("detailuser"));

				$data['namabank']=$this->M_detailadministrasi->namabank($this->session->userdata("detailuser"));
				$data['norek']=$this->M_detailadministrasi->norek($this->session->userdata("detailuser"));
				$data['tglbank']=$this->M_detailadministrasi->tglbank($this->session->userdata("detailuser"));
				$data['jenisbank']=$this->M_detailadministrasi->jenisbank($this->session->userdata("detailuser"));
				$data['nilaibank']=$this->M_detailadministrasi->nilaibank($this->session->userdata("detailuser"));

				$data['visaarrival']=$this->M_detailadministrasi->visaarrival($this->session->userdata("detailuser"));

				$data['tglterbang']=$this->M_detailadministrasi->tglterbang($this->session->userdata("detailuser"));
				$data['tgltiba']=$this->M_detailadministrasi->tgltiba($this->session->userdata("detailuser"));
				$data['detailberangkat1']=$this->M_detailadministrasi->detailberangkat1($this->session->userdata("detailuser"));
				$data['detailberangkat2']=$this->M_detailadministrasi->detailberangkat2($this->session->userdata("detailuser"));
				$data['jamtiba']=$this->M_detailadministrasi->jamtiba($this->session->userdata("detailuser"));

				$data['infoberkas']=$this->M_detailadministrasi->infoberkas($this->session->userdata("detailuser"));
				$data['ambilberkas']=$this->M_detailadministrasi->ambilberkas($this->session->userdata("detailuser"));





			//user sudah login
				$data['namamodule'] = "detailadministrasi";
				$data['namafileview'] = "detailadministrasi";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){

				$data['namamodule'] = "detailadministrasi";
				$data['namafileview'] = "detailadministrasiagen";
				echo Modules::run('template/agen_template', $data);
			}

		}

	}

		function ubahpersonal(){


				$data['tampil_data_sektor'] = $this->M_detailadministrasi->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailadministrasi->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailadministrasi->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailadministrasi->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailadministrasi->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailadministrasi->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailadministrasi->tampil_data_provinsi();

				$data['personalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_detailadministrasi->tampil_data_personal($this->session->userdata("detailuser"));

$data['tampil_data_sponsor'] = $this->M_detailadministrasi->tampil_data_sponsor();

				$data['namamodule'] = "detailadministrasi";
				$data['namafileview'] = "ubahpersonal";
				echo Modules::run('template/admin_template', $data);
	}

			function ubahdatapersonal(){

$idnya = $this->input->post("idp");

//echo "aasas".$idnya;

		$this->M_detailadministrasi->ubahpersonal();
		redirect('detailadministrasi');
		}

function ubahstatus(){

$idnya = $this->input->post("idp");

//echo "aasas".$idnya;

		$this->M_detailadministrasi->ubahstatus();
		redirect('detailadministrasi');
		}

	function tambahbiodata() {

// $idnya = $this->input->post("idp");

// echo "aasas".$idnya;
$this->form_validation->set_rules('idp', 'Idp', 'trim|required|is_unique[personal.id_biodata]');

$this->M_tambahbio->tambahpersonal();

		redirect('tambahbio');
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
