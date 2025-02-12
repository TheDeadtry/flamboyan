<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Blkijin extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_blk_ijin');	
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
				$data['tampil_data_personal'] = $this->M_blk_ijin->tampil_data_personal($this->session->userdata("detailuser"));
				$data['hitung_data_blkijin'] = $this->M_blk_ijin->hitung_data_blkijin($this->session->userdata("detailuser"));
				$data['hitung_data_blkijin_b'] = $this->M_blk_ijin->hitung_data_blkijin_b($this->session->userdata("detailuser"));
				$data['hitung_data_blkijin_c'] = $this->M_blk_ijin->hitung_data_blkijin_c($this->session->userdata("detailuser"));
				
				$data['data_blk_ijin'] = $this->M_blk_ijin->tampil_blkijin($this->session->userdata("detailuser"));
				$data['data_blk_ijin_b'] = $this->M_blk_ijin->tampil_blkijin_b($this->session->userdata("detailuser"));
				$data['data_blk_ijin_c'] = $this->M_blk_ijin->tampil_blkijin_c($this->session->userdata("detailuser"));
			//user sudah login
				$data['namamodule'] = "blkijin";
				$data['namafileview'] = "v_blk_ijin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "detailadministrasi";
				$data['namafileview'] = "detailadministrasiagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	
	function tambahdata(){
			$id_biodata = $this->session->userdata("detailuser");
			$id = $id_biodata;
			
			$tgl_suntik_kb = $this->input->post('tgl_suntik_kb');
			$masa_kb = $this->input->post('masa_kb');
			$berakhir_kb = $this->input->post('berakhir_kb');
			$ket_kb = $this->input->post('ket_kb');		
			
			$this->M_blk_ijin->tambahdata($id,$tgl_suntik_kb,$masa_kb,$berakhir_kb,$ket_kb);
			redirect('blkijin');	
		}
		
		function tambahdata_b(){
			$id_biodata = $this->session->userdata("detailuser");
			$id = $id_biodata;
			
			
			$mulai_plg = $this->input->post('mulai_plg');
			$kembali_plg = $this->input->post('kembali_plg');
			$terlambat_plg = $this->input->post('terlambat_plg');
			$hari_plg = $this->input->post('hari_plg');
			
			$ket_plg = $this->input->post('ket_plg');
			
			$this->M_blk_ijin->tambahdata_b($id,$mulai_plg,$kembali_plg,$terlambat_plg,$hari_plg,$ket_plg);
			redirect('blkijin');
			
			
		}
		
		function tambahdata_c(){
			$id_biodata = $this->session->userdata("detailuser");
			$id = $id_biodata;
		
			$mulai_inap = $this->input->post('mulai_inap');
			$kembali_inap = $this->input->post('kembali_inap');
			$terlambat_inap = $this->input->post('terlambat_inap');
			$hari_inap = $this->input->post('hari_inap');
		
			$ket_inap = $this->input->post('ket_inap');
		
			
			$this->M_blk_ijin->tambahdata_c($id,$mulai_inap,$kembali_inap,$terlambat_inap,$hari_inap,$ket_inap);
			redirect('blkijin');
			
			
		}
		
		function ubahdata($id){	
			if($this->input->post('submit')) {
				$this->M_blk_ijin->updateblkijin($id);
				redirect('blkijin');
			}
		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['tampil_data_personal'] = $this->M_blk_ijin->tampil_data_personal($this->session->userdata("detailuser"));
		$data['data_blk_ijin'] = $this->M_blk_ijin->tampil_blkijin($this->session->userdata("detailuser"));
		$data['id_blk_ijin'] = $this->M_blk_ijin->getById($id);
		
		$data['namamodule'] = "blkijin";
		$data['namafileview'] = "ubahblk_ijin";
		echo Modules::run('template/admin_template', $data);
		
	}
		
		function ubahdata_b($id){	
			if($this->input->post('submit')) {
				$this->M_blk_ijin->updateblkijin_b($id);
				redirect('blkijin');
			}
		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['tampil_data_personal'] = $this->M_blk_ijin->tampil_data_personal($this->session->userdata("detailuser"));
		$data['data_blk_ijin_b'] = $this->M_blk_ijin->tampil_blkijin_b($this->session->userdata("detailuser"));
		$data['id_blk_plg'] = $this->M_blk_ijin->getById_b($id);
		
		$data['namamodule'] = "blkijin";
		$data['namafileview'] = "ubahblk_ijin_b";
		echo Modules::run('template/admin_template', $data);
		
	}
	
	function ubahdata_c($id){	
			if($this->input->post('submit')) {
				$this->M_blk_ijin->updateblkijin_c($id);
				redirect('blkijin');
			}
		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['tampil_data_personal'] = $this->M_blk_ijin->tampil_data_personal($this->session->userdata("detailuser"));
		$data['data_blk_ijin_c'] = $this->M_blk_ijin->tampil_blkijin_c($this->session->userdata("detailuser"));
		$data['id_blk_inap'] = $this->M_blk_ijin->getById_c($id);
		
		$data['namamodule'] = "blkijin";
		$data['namafileview'] = "ubahblk_ijin_c";
		echo Modules::run('template/admin_template', $data);
		
	}
	
	function hapus_data(){
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->M_blk_ijin->get_data_blkijin($kode);
			if($result == null) redirect('blkijin');
			else $this->M_blk_ijin->delete_data($kode);
			redirect('blkijin');
	}
	
	function hapus_data_b(){
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->M_blk_ijin->get_data_blkijin_b($kode);
			if($result == null) redirect('blkijin');
			else $this->M_blk_ijin->delete_data_b($kode);
			redirect('blkijin');
	}
	function hapus_data_c(){
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->M_blk_ijin->get_data_blkijin_c($kode);
			if($result == null) redirect('blkijin');
			else $this->M_blk_ijin->delete_data_c($kode);
			redirect('blkijin');
	}
	
}