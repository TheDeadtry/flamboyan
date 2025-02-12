<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahbio extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahbio');	
			$this->load->library('form_validation');
		
			$session = $this->M_session->get_session();
			$id_user = $session['session_userid'];
			$status = $session['session_status'];
	
			if (!$session['session_userid'] && !$session['session_status']){
				redirect('login/login_admin');
			}		
			if ($id_user && $status!=1){
				redirect('dashboard');
			}
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

				$data['tampil_data_sektor'] = $this->M_tambahbio->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahbio->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahbio->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahbio->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahbio->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahbio->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahbio->tampil_data_provinsi();
				$data['tampil_data_lokasi'] = $this->M_tambahbio->tampil_data_lokasi();

				$data['idbiodatanya'] = $this->session->userdata("idbiodata");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");


				$data['negara1isi'] = $this->session->userdata("negara1isi");
				$data['negara2isi'] = $this->session->userdata("negara2isi");
				$data['callvisa1isi'] = $this->session->userdata("callvisa1isi");
				$data['skill1isi'] = $this->session->userdata("skill1isi");
				$data['skill2isi'] = $this->session->userdata("skill2isi");
				$data['skill3isi'] = $this->session->userdata("skill3isi");

				$data['tampil_data_sponsor'] = $this->M_tambahbio->tampil_data_sponsor();


				$this->load->library('Gugus');

				$datastatuspendidikan = $this->gugus->panggildatabase("statuspendidikan");

				$liststatuspendidikan = array();
				$valuestatuspendidikan = array();

				$liststatuspendidikan[] = "pilih data";
				$valuestatuspendidikan[] = "";

				foreach ($datastatuspendidikan as $key => $value) {
					$isi = $value->isi;
					$mandarin = $value->mandarin;
					$liststatuspendidikan[] = $isi.' '.$mandarin;
					$valuestatuspendidikan[] = $isi.' '.$mandarin;
				}

				$data['liststatuspendidikan'] = $liststatuspendidikan;
				$data['valuestatuspendidikan'] = $valuestatuspendidikan;

			//user sudah login
				$data['namamodule'] = "tambahbio";
				$data['namafileview'] = "tambahbioadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahbio";
				$data['namafileview'] = "tambahbioagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	

	function tambahbiodata() {

$idnya = $this->input->post("idp");
$idarr = explode("-", $idnya);

//echo "aasas".$idarr[0];

$dataid = $this->M_tambahbio->getnourut($idarr[0])+1;
//echo "aasas".$dataid;

$jmlchar = strlen($dataid);
if($jmlchar==1){
	$dataid="000".$dataid;
}
if($jmlchar==2){
	$dataid="00".$dataid;
}
if($jmlchar==3){
	$dataid="0".$dataid;
}
if($jmlchar==4){
	$dataid="".$dataid;
}

$this->M_tambahbio->updateidsektor($idarr[0],$dataid);
$this->M_tambahbio->tambahpersonal();

  	$this->session->set_userdata("idbiodata","");
  	$this->session->set_userdata("jeniskelamin","");
$this->session->set_userdata("detailuser",$idnya);

		redirect('detailpersonal');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");
    $ngr1 = $this->input->post("negara1isi");
     $ngr2 = $this->input->post("negara2isi");
      $callv = $this->input->post("callvisa1isi");
       $skl1 = $this->input->post("skill1isi");
        $skl2 = $this->input->post("skill2isi");
         $skl3 = $this->input->post("skill3isi");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		 $this->session->set_userdata("negara1isi",$ngr1);
		 $this->session->set_userdata("negara2isi",$ngr2);
		 $this->session->set_userdata("callvisa1isi",$callv);
		 $this->session->set_userdata("skill1isi",$skl1);
		 $this->session->set_userdata("skill2isi",$skl2);
		 $this->session->set_userdata("skill3isi",$skl3);


		redirect('tambahbio');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

         $this->session->set_userdata("negara1isi","");
		 $this->session->set_userdata("negara2isi","");
		 $this->session->set_userdata("callvisa1isi","");
		 $this->session->set_userdata("skill1isi","");
		 $this->session->set_userdata("skill2isi","");
		 $this->session->set_userdata("skill3isi","");

		redirect('tambahbio');
} 
		}



		
	function duplikasi($hasil = 0) {
		
		$data['tampil_data1'] = $this->M_tambahbio->tampil_data_sektor();
		$data['tampil_data2'] = $this->M_tambahbio->tampil_data_negara();
		$data['tampil_data3'] = $this->M_tambahbio->tampil_data_calling();
		$data['tampil_data4'] = $this->M_tambahbio->tampil_data_skillnya();
		$data['tampil_data_tki'] = $this->M_session->select("SELECT id_biodata,nama FROM personal ORDER BY id_biodata");
		$data['hasil'] = $hasil;

		$data['namamodule'] = "tambahbio";
		$data['namafileview'] = "tambahbioduplikasi";
		echo Modules::run('template/new_admin_template', $data);
	}
	function duplikasiSimpan() {
		$idBaru = $this->input->post('id_biodata');
		$idLama = $this->input->post('optIdLama');
		$data1 = $this->M_session->select_ra("SELECT * FROM personal WHERE id_biodata='$idLama'");
		$data2 = $this->M_session->select_ra("SELECT * FROM family WHERE id_biodata='$idLama'");
		$data3 = $this->M_session->select_array("SELECT * FROM pengalaman WHERE id_biodata='$idLama'");
		$data4 = $this->M_session->select_ra("SELECT * FROM tugas WHERE id_biodata='$idLama'");
		$data5 = $this->M_session->select_ra("SELECT * FROM kettugas WHERE id_biodata='$idLama'");
		$data6 = $this->M_session->select_ra("SELECT * FROM vaksin WHERE id_biodata='$idLama'");
		$data7 = $this->M_session->select_ra("SELECT * FROM pptk WHERE id_biodata='$idLama'");
		$data8 = $this->M_session->select_ra("SELECT * FROM request WHERE id_biodata='$idLama'");
		$data9 = $this->M_session->select_array("SELECT * FROM working WHERE id_biodata='$idLama'");
		$data10 = $this->M_session->select_ra("SELECT * FROM skillcondition WHERE id_biodata='$idLama'");

		
		$cekApakahSudahAda = $this->M_session->select_count("personal WHERE id_biodata='$idBaru'");
		if ($cekApakahSudahAda > 0) {
			echo "Data sudah ada";
			exit;
		}

		$data1['id_biodata'] = $idBaru;
		$data2['id_biodata'] = $idBaru;
		$data4['id_biodata'] = $idBaru;
		$data5['id_biodata'] = $idBaru;
		$data6['id_biodata'] = $idBaru;
		$data7['id_biodata'] = $idBaru;
		$data8['id_biodata'] = $idBaru;
		$data10['id_biodata'] = $idBaru;
		unset($data1['id_personal']);
		unset($data2['id_family']);
		unset($data4['id_tugas']);
		unset($data5['id_kettugas']);
		unset($data6['id']);
		unset($data7['id_pptk']);
		unset($data8['id_request']);
		unset($data10['id_skillcondition']);

		$datax1 = $this->M_session->insert($data1, "personal");
		$datax2 = $this->M_session->insert($data2, "family");
		$datax6 = $this->M_session->insert($data6, "vaksin");
		
		$datax4 = $this->M_session->insert($data4, "tugas");
		$datax5 = $this->M_session->insert($data5, "kettugas");

		$datax7 = $this->M_session->insert($data7, "pptk");
		$datax8 = $this->M_session->insert($data8, "request");
		$datax10 = $this->M_session->insert($data10, "skillcondition");
		
		foreach ($data3 as $v) {
			$v['id_biodata'] = $idBaru;
			unset($v['id_pengalaman']);
			$datax3 = $this->M_session->insert($v, "personal");
		}
		foreach ($data9 as $v) {
			$v['id_biodata'] = $idBaru;
			unset($v['id_working']);
			$datax9 = $this->M_session->insert($v, "working");
		}

		$data4 = array(
			'id_biodata' => $idBaru,
			'ktp' => "profile.jpg",
			'kk' => "profile.jpg",
			'akte' => "profile.jpg",
			'ijazah' => "profile.jpg",
			'si' => "profile.jpg",
			'sn' => "profile.jpg",
			'paspor' => "profile.jpg",
			'arc' => "profile.jpg",
			'asuransi' => "profile.jpg",
			'medikal1' => "profile.jpg",
			'medikal2' => "profile.jpg",
			'medikal3' => "profile.jpg",
			'skck' => "profile.jpg",
			'fingerprint' => "profile.jpg",
			'visa' => "profile.jpg",
			'pap' => "profile.jpg",
			);
		$this->db->insert('dokumen', $data4);

        $data8 = array(
            'id_markb' => '',
            'id_biodata' => $idBaru,
            );
        $this->db->insert('markb', $data8);

        $data9 = array(
            'id_markc' => '',
            'id_biodata' => $idBaru,
            );
        $this->db->insert('markc', $data9);

        $dat10 = array(
            'id_marke' => '',
            'id_biodata' => $idBaru,
            );
        $this->db->insert('marke', $dat10);

        $dat11 = array(
            'id_markf' => '',
            'id_biodata' => $idBaru,
            );
        $this->db->insert('markf', $dat11);

        $dat12 = array(
            'id_markg' => '',
            'id_biodata' => $idBaru,
            );
        $this->db->insert('markg', $dat12);

         $dat13 = array(
            'id_biodata' => $idBaru,
            );
        $this->db->insert('durasidetail', $dat13);
		
		// update datasektor
		$idnya = $idLama;
		$idarr = explode("-", $idnya);
		$dataid = $this->M_tambahbio->getnourut($idarr[0])+1;

		$jmlchar = strlen($dataid);
		if($jmlchar==1){
			$dataid="000".$dataid;
		}
		if($jmlchar==2){
			$dataid="00".$dataid;
		}
		if($jmlchar==3){
			$dataid="0".$dataid;
		}
		if($jmlchar==4){
			$dataid="".$dataid;
		}

		$this->M_tambahbio->updateidsektor($idarr[0],$dataid);
		// end of update datasektor

		redirect('tambahbio/duplikasi/1');

	}
	function tes321() {
		$data = $this->M_session->select("SELECT table_name FROM information_schema.tables");
		echo '<pre/>';
		print_r($data);
	}

}