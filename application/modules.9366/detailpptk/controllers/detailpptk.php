<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailpptk extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailpptk');	
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

			$data['tampil_data_sektor'] = $this->M_detailpptk->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailpptk->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailpptk->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailpptk->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailpptk->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailpptk->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailpptk->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_detailpptk->tampil_data_jobs();
				$data['tampil_data_keterampilan'] = $this->M_detailpptk->tampil_data_keterampilan();
				$data['tampil_data_hobi'] = $this->M_detailpptk->tampil_data_hobi();
				$data['tampil_data_mata'] = $this->M_detailpptk->tampil_data_mata();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_skill'] = $this->M_detailpptk->tampil_data_skill($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailpptk->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungskill'] = $this->M_detailpptk->hitung_data_skill($this->session->userdata("detailuser"));

				$data['checker'] = $this->M_detailpptk->ambildatamod($this->session->userdata("detailuser"), 'data_pptk', 'pptk', 'id_biodata', 'data_pptk');



				
			//user sudah login
				$data['namamodule'] = "detailpptk";
				$data['namafileview'] = "detailpptk";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailpptk";
				$data['namafileview'] = "detailpptk";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}


	function simpan_data(){
		$id_data = $_POST['id_tki'];
		$isi_data = $_POST['isiData'];
        $simpan = $this->db->query("INSERT INTO pptk (id_pptk, id_biodata, data_pptk) VALUES ('','$id_data','$isi_data')");
        if ($simpan) {
        	echo "data telah disimpan";
        }else{
        	echo "data gagal disimpan";
        }
	}

	function update_Data(){
		$id_data = $_POST['id_tki'];
		$isi_data = $_POST['isiData'];
        $update = $this->db->query("UPDATE pptk SET data_pptk = '$isi_data' WHERE id_biodata = '$id_data' ");
        if ($update) {
            echo "telah disimpan";
        }else{
            echo "gagal disimpan";
        }

        // redirect('pernyataan_persetujuan_tenaga_kerja');
    }

	function datadiambil($key){
        $data = $this->M_detailpptk->ambildatamod($key, 'data_pptk', 'pptk', 'id_biodata', 'data_pptk');
        echo $data;
    }


}