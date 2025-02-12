<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailagengroup extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailagengroup');			
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
			//user sudah login
				$data['tampil_data_personal_group'] = $this->M_detailagengroup->tampil_data_personal_group();
				$data['namamodule'] = "detailagengroup";
				$data['namafileview'] = "detailagengroupadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailagengroup";
				$data['namafileview'] = "detailagengroupagen";
				echo Modules::run('template/agen_template', $data); 
			}
			else if ($id_user && $status==3){
								$data['tampil_data_personal_group'] = $this->M_detailagengroup->tampil_data_personal_group();

				$data['namamodule'] = "detailagengroup";
				$data['namafileview'] = "detailagengroupadmin";
				echo Modules::run('template/group_template', $data); 
			}
		}	 
	}

	function simpan_data_detailagengroup(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_detailagengroup	= $this->input->post('nama_detailagengroup');
		$nama_detailagengroup_taiwan	= $this->input->post('nama_detailagengroup_taiwan');
		
		$this->M_detailagengroup->simpan_data_detailagengroup($nama_detailagengroup,$nama_detailagengroup_taiwan);

		redirect('detailagengroup');
	}

	function update_data_detailagengroup($id) {
		if($this->input->post('submit')) {
			$this->M_detailagengroup->update_data_detailagengroup($id);
			redirect('detailagengroup');
		}
		$data['tampil_data_detailagengroup'] = $this->M_detailagengroup->tampil_data_detailagengroup();
		$data['detailagengroup'] = $this->M_detailagengroup->ambil_id($id);
		$data['namamodule'] = "detailagengroup";
		$data['namafileview'] = "updatedetailagengroup";
		echo Modules::run('template/admin_template', $data);
	}

	function hapus_data_detailagengroup($id) {
		$this->M_detailagengroup->hapus_data_detailagengroup($id);
		redirect('detailagengroup');
	}
}