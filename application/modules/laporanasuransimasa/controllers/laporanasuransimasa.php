<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class laporanasuransimasa extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');						
		$session = $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_admin');
		} 	
		if ($id_user && $status!=1){
			redirect('dashboard');
		}				
	}
	
	function index(){
		redirect('laporanasuransimasa/filtertanggalawal/');	 
	}

	function filtertanggalawal(){
		$this->session->set_userdata('bulan', $this->input->post('bulan'));
		$this->session->set_userdata('tahun', $this->input->post('tahun'));

		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');

		$data['bulan'] =  $this->input->post('bulan');
		$data['tahun'] =  $this->input->post('tahun');

		$BulanIndo = array(
							"Januari", 
							"Februari", 
							"Maret", 
							"April", 
							"Mei", 
							"Juni", 
							"Juli", 
							"Agustus", 
							"September", 
							"Oktober", 
							"November", 
							"Desember"
						);

		$data['bulannya'] = $BulanIndo;

		$sql = "SELECT *,
				personal.nama as namapersonal,
				personal.tempatlahir as personaltempat, 
				personal.tgllahir as tgllahirpersonal 
				FROM pembuatan_tabeldis3
				LEFT JOIN detail_tabeldis3
				ON pembuatan_tabeldis3.id_pembuatan = detail_tabeldis3.id_tabeldis3
				LEFT JOIN disnaker
				ON disnaker.id_biodata=detail_tabeldis3.id_biodata
				LEFT JOIN asuransifull
				ON asuransifull.id_biodata=detail_tabeldis3.id_biodata
				LEFT JOIN personal
				ON personal.id_biodata=detail_tabeldis3.id_biodata
				WHERE Month(pembuatan_tabeldis3.tanggal)='$bulan' 
				&& YEAR(pembuatan_tabeldis3.tanggal)='$tahun'
				";

		$data['asuransimasafilter'] = $this->M_session->select($sql);

		$data['namamodule'] = "laporanasuransimasa";
		$data['namafileview'] = "laporanasuransimasa";
		echo Modules::run('template/new_admin_template', $data);
		
	}
	
}