<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailfamily extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			
		$this->load->model('M_detailfamily');	
		$this->load->library('form_validation');

		$session = $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		} 	
		if ($id_user && $status!=1){
			redirect('dashboard');
		}		
	}
	
	function index(){

		$data['tampil_data_sektor'] = $this->M_detailfamily->tampil_data_sektor();
		$data['tampil_data_negara'] = $this->M_detailfamily->tampil_data_negara();
		$data['tampil_data_calling'] = $this->M_detailfamily->tampil_data_calling();
		$data['tampil_data_skillnya'] = $this->M_detailfamily->tampil_data_skillnya();
		$data['tampil_data_agama'] = $this->M_detailfamily->tampil_data_agama();
		$data['tampil_data_pendidikan'] = $this->M_detailfamily->tampil_data_pendidikan();
		$data['tampil_data_provinsi'] = $this->M_detailfamily->tampil_data_provinsi();
		$data['tampil_data_jobs'] = $this->M_detailfamily->tampil_data_jobs();

		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['tampil_data_family'] = $this->M_detailfamily->tampil_data_family($this->session->userdata("detailuser"));
		$data['tampil_data_personal'] = $this->M_detailfamily->tampil_data_personal($this->session->userdata("detailuser"));

		$data['hitungfamily'] = $this->M_detailfamily->hitung_data_family($this->session->userdata("detailuser"));

		
		//user sudah login
		$data['namamodule'] = "detailfamily";
		$data['namafileview'] = "detailfamily";
		echo Modules::run('template/admin_template', $data);
		 
	}

	function tambahfamily() {
		$player  	= array();
		$datanya 	= "";

		$player 	= $this->input->post('jumlahanak');
		$datanya 	= $player[0];
		for($i=1;$i<sizeof($player);$i++) {
			$datanya = $datanya.",".$player[$i];
		}

    	$data = array(  
    	 	'id_biodata' => $this->input->post('idbiodata'),
    	 	'nama_bapak' => $this->input->post('namabapak'),
			'umur_bapak' => $this->input->post('umurbapak')." tahun 嵗",
			'kerja_bapak' => $this->input->post('kerjabapak'),
			'nama_ibu' => $this->input->post('namaibu'),
			'umur_ibu' => $this->input->post('umuribu')." tahun 嵗",
			'kerja_ibu' => $this->input->post('kerjaibu'),
			'nama_istri_suami' => $this->input->post('namaistri'),
			'umur_istri_suami' => $this->input->post('umuristri')." tahun 嵗",
			'kerja_istri_suami' => $this->input->post('kerjaistri'),
			'data_anak' => $datanya,
			'saudara_laki' => $this->input->post('saudaralaki'),
			'saudar_pr' => $this->input->post('saudarapr'),
			'anak_ke' => $this->input->post('anakke'),
			
		);
        $idid = $this->input->post('idbiodata');
        $cek_family = $this->db->query("SELECT count(*) as total FROM family WHERE id_biodata='$idid'")->row();
        if ($cek_family->total == 0) {
			$this->db->insert('family', $data);
        }
	}

	function ubahfamily() {
		$player = array();
		$datanya="";

		$player=$this->input->post('jumlahanak');
		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}

    	$data = array(  
    	 	'id_biodata' => $this->input->post('idbiodata'),
    	 	'nama_bapak' => $this->input->post('namabapak'),
			'umur_bapak' => $this->input->post('umurbapak')." tahun 嵗",
			'kerja_bapak' => $this->input->post('kerjabapak'),
			'nama_ibu' => $this->input->post('namaibu'),
			'umur_ibu' => $this->input->post('umuribu')." tahun 嵗",
			'kerja_ibu' => $this->input->post('kerjaibu'),
			'nama_istri_suami' => $this->input->post('namaistri'),
			'umur_istri_suami' => $this->input->post('umuristri')." tahun 嵗",
			'kerja_istri_suami' => $this->input->post('kerjaistri'),
			'data_anak' => $datanya,
			'saudara_laki' => $this->input->post('saudaralaki'),
			'saudar_pr' => $this->input->post('saudarapr'),
			'anak_ke' => $this->input->post('anakke'),
			
		);

        $this->db->where('id_biodata', $this->input->post('idbiodata'));
		$this->db->update('family', $data);
	} 

	function tambahbiodata() {

		// $idnya = $this->input->post("idp");

		// echo "aasas".$idnya;
		$this->form_validation->set_rules('idp', 'Idp', 'trim|required|is_unique[family.id_biodata]');

		$this->M_tambahbio->tambahfamily();

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