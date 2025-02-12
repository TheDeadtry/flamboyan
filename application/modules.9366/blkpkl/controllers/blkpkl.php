<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Blkpkl extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_blk_pkl');	
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
				$data['detailpersonalid'] = $this->session->userdata("detailuser");	
				$data['tampil_data_personal'] = $this->M_blk_pkl->tampil_data_personal($this->session->userdata("detailuser"));
				$data['hitung_data_blkpkl'] = $this->M_blk_pkl->hitung_data_blkpkl($this->session->userdata("detailuser"));
				
				$data['data_blkpkl'] = $this->M_blk_pkl->tampil_blkpkl($this->session->userdata("detailuser"));
			//user sudah login
				$data['namamodule'] = "blkpkl";
				$data['namafileview'] = "v_blk_pkl";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "detailadministrasi";
				$data['namafileview'] = "detailadministrasiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	
	function tambahpkl() {	 
			$id_biodata = $this->session->userdata("detailuser");
			$id = $id_biodata;
			
			$tempat = $this->input->post('tempat');
			$mulai_tgl = $this->input->post('mulai_tgl');
			$selesai_tgl = $this->input->post('selesai_tgl');
			$jml_hari = $this->input->post('jml_hari');
			$penilaian = $this->input->post('penilaian');
			$total_hari = $this->input->post('total_hari');
			$ket = $this->input->post('ket'); 
			
			$this->M_blk_pkl->tambahpkl($id,$tempat,$mulai_tgl,$selesai_tgl,$jml_hari,$penilaian,$total_hari,$ket);
			redirect('blkpkl');	
		}
		
	function hapus_data(){
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->M_blk_pkl->get_data_pkl($kode);
			if($result == null) redirect('blkpkl');
			else $this->M_blk_pkl->delete_data($kode);
			redirect('blkpkl');
	}
	
	function ubahblkpkl($id){	
			if($this->input->post('submit')) {
				$this->M_blk_pkl->updateblkpkl($id);
				redirect('blkpkl');
			}
		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['tampil_data_personal'] = $this->M_blk_pkl->tampil_data_personal($this->session->userdata("detailuser"));
		$data['data_blkpkl'] = $this->M_blk_pkl->tampil_blkpkl($this->session->userdata("detailuser"));
		$data['id_blkpkl'] = $this->M_blk_pkl->getById($id);
		
		$data['namamodule'] = "blkpkl";
		$data['namafileview'] = "ubahblk_pkl";
		echo Modules::run('template/admin_template', $data);
		
	}
	
	
	
}