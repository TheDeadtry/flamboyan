<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class detaillegalitas extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detaillegalitas');	
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

				$data['tampil_data_sektor'] = $this->M_detaillegalitas->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detaillegalitas->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detaillegalitas->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detaillegalitas->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detaillegalitas->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detaillegalitas->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detaillegalitas->tampil_data_provinsi();
				$data['tampil_data_hubungan'] = $this->M_detaillegalitas->tampil_data_hubungan();


				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_legalitas'] = $this->M_detaillegalitas->tampil_data_legalitas($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detaillegalitas->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitunglegalitas'] = $this->M_detaillegalitas->hitung_data_legalitas($this->session->userdata("detailuser"));

				$data['tampil_data_notarisan'] = $this->M_detaillegalitas->tampil_data_notarisan($this->session->userdata("detailuser"));
				$data['hitungnotarisan'] = $this->M_detaillegalitas->hitung_data_notarisan($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detaillegalitas";
				$data['namafileview'] = "detaillegalitas";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detaillegalitas";
				$data['namafileview'] = "detaillegalitasagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function printTanggalPengambilandocument($pinho)
	{
		header ("Content-type: text/html; charset=utf-8");
        require_once 'PHPWord/PHPWord.php';
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/template_pengambilan_doc/templatepengambilandoc.docx');

		$document->setValue('{pinho}', $pinho);

		$data = $this->db->query("SELECT personal.nama, visa.tanggalterbang FROM personal LEFT JOIN visa on personal.id_biodata = visa.id_biodata WHERE personal.id_biodata = '$pinho'")->row();

		$document->setValue('{pinho}', $pinho);
		$document->setValue('{nama}', $data->nama);
		$document->setValue('{tglterbang}', $data->tanggalterbang);


		$doklain = array(
            'no' => array('1','2','3','4','5'),
            'nama' => array('KTP','KK','IJASA','AKTE LAHIR','S. NIKAH / S. CERAI'),
        );

        $document->cloneRow('data', $doklain);
		
		$doklainnya = array(
            'no' => array(7,8,9,10,11,12,13,14,15),
        );
		
		$document->cloneRow('data2', $doklainnya);



		$tmp_file = 'files/template_pengambilan_doc/hasilprint.docx';
        $document->save($tmp_file);

// ------------------------------------------- download file --------------------------------------------------------------//

        redirect('detaillegalitas/hasilprintdok/');
	}

	function hasilprintdok()
	{
		require_once 'gugus/phpword/PHPWord.php';
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/template_pengambilan_doc/hasilprint.docx');

		

		$filename = 'files/template_pengambilan_doc/hasilprintok.docx';
		$isinya=$document->save($filename);
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename= document send to taiwan.docx');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
			
		flush();
		readfile($isinya);
		unlink($isinya); // deletes the temporary file
		exit;
	}



	function tambahlegalitas() {

$this->M_detaillegalitas->tambahlegalitas();

		redirect('detaillegalitas');
		}
			function ubahlegalitas() {

$this->M_detaillegalitas->ubahlegalitas();

		redirect('detaillegalitas');
		}

			function tambahnotarisan() {

$this->M_detaillegalitas->tambahnotarisan();

		redirect('detaillegalitas');
		}
			function ubahnotarisan() {

$this->M_detaillegalitas->ubahnotarisan();

		redirect('detaillegalitas');
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