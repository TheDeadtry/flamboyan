<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Buka_rek_baru extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('m_detailskckpolres');	
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

				$data['tampil_data_sektor'] = $this->m_detailskckpolres->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->m_detailskckpolres->tampil_data_negara();
				$data['tampil_data_calling'] = $this->m_detailskckpolres->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->m_detailskckpolres->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->m_detailskckpolres->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->m_detailskckpolres->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->m_detailskckpolres->tampil_data_provinsi();

				$data['buka_rek_baru'] = $this->db->query("SELECT * FROM buka_rekening_baru WHERE id_biodata = '".$this->session->userdata("detailuser")."'")->row();


				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_skck'] = $this->m_detailskckpolres->tampil_data_skck($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->m_detailskckpolres->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungskck'] = $this->m_detailskckpolres->hitung_data_skck($this->session->userdata("detailuser"));

				
			//user sudah login
				if (count($data['buka_rek_baru']) == 0) {
					$data['namamodule'] = "buka_rek_baru";
					$data['namafileview'] = "baru";
					echo Modules::run('template/bootstrap3', $data);
				}else{
					$data['namamodule'] = "buka_rek_baru";
					$data['namafileview'] = "update";
					echo Modules::run('template/bootstrap3', $data);
				}
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailskckpolres";
				$data['namafileview'] = "detailskckagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}


	function keberkas(){
		$data['tampil_data_sektor'] = $this->m_detailskckpolres->tampil_data_sektor();
		$data['tampil_data_negara'] = $this->m_detailskckpolres->tampil_data_negara();
		$data['tampil_data_calling'] = $this->m_detailskckpolres->tampil_data_calling();
		$data['tampil_data_skillnya'] = $this->m_detailskckpolres->tampil_data_skillnya();
		$data['tampil_data_agama'] = $this->m_detailskckpolres->tampil_data_agama();
		$data['tampil_data_pendidikan'] = $this->m_detailskckpolres->tampil_data_pendidikan();
		$data['tampil_data_provinsi'] = $this->m_detailskckpolres->tampil_data_provinsi();

		$data['buka_rek_baru'] = $this->db->query("SELECT * FROM buka_rekening_baru WHERE id_biodata = '".$this->session->userdata("detailuser")."'")->row();


		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['tampil_data_skck'] = $this->m_detailskckpolres->tampil_data_skck($this->session->userdata("detailuser"));
		$data['tampil_data_personal'] = $this->m_detailskckpolres->tampil_data_personal($this->session->userdata("detailuser"));

		$data['hitungskck'] = $this->m_detailskckpolres->hitung_data_skck($this->session->userdata("detailuser"));

		$data['namamodule'] = "buka_rek_baru";
		$data['namafileview'] = "berkas";
		echo Modules::run('template/bootstrap3', $data);
	}

	function tambah_data(){
		$id_biodata = $_POST['id_biodata'];
		$tanggal_buka_rek = $_POST['tanggal-berkas'];
		$simpan =  $this->db->query("INSERT INTO buka_rekening_baru (tanggal_buka_rek, data_berkas, hapus, id_biodata) VALUES ('$tanggal_buka_rek', '[]', '', '$id_biodata')");
		if ($simpan) {
			redirect("buka_rek_baru");
		}

	}
	function update(){
		$id_biodata = $_POST['id_biodata'];
		$tanggal_buka_rek = $_POST['tanggal-berkas'];
		$simpan =  $this->db->query("UPDATE buka_rekening_baru SET tanggal_buka_rek = '$tanggal_buka_rek' WHERE id_biodata = '$id_biodata'");
		if ($simpan) {
			redirect("buka_rek_baru");
		}
	}

	function tambah_berkas(){


		$id = $_POST['andalas']; // datapatka  id data
		$namaFile = $_FILES['filedok']['name']; // dapatkan nama file
		$namaFile = $id.'-'.$namaFile; // dapatkan nama file
		$filesemtara = $_FILES['filedok']['tmp_name']; //dapatkan lokasi file semntara

		// simpan namafile ke database 
		$data = $this->db->query("SELECT * FROM buka_rekening_baru WHERE id_biodata = '$id' ")->row();

		$lokasi_penyimpanan = "file_dokument_buka_rekening_baru/";
		
		if ($data->data_berkas == '') {
			$data_array = array();
		}else{
			$data_array = json_decode($data->data_berkas);
		}

		if ($data->data_berkas == '') {
			$array_child = array(
				"nama_data" => $namaFile
			);
			array_push($data_array, $array_child);
		}else{
			$array_child = array(
				"nama_data" => $namaFile
			);
			array_push($data_array, $array_child);
		}

		$data_berkas = json_encode($data_array);

		$simpan_database = $this->db->query("UPDATE buka_rekening_baru SET data_berkas = '$data_berkas' WHERE id_biodata = '$id'");

		if ($simpan_database) {

			$terupload = move_uploaded_file($filesemtara, $lokasi_penyimpanan.$namaFile);
			if ($terupload) {
				redirect("buka_rek_baru/keberkas");
			}
		}
		


		
	}

	function hapus(){
		$id_biodata = $_POST['id_biodata'];
		$arrayke = $_POST['arrayke'];
		$namafile = $_POST['namafile'];

		$dapatkan_data = $this->db->query("SELECT * FROM buka_rekening_baru WHERE id_biodata = '$id_biodata'")->row();

		$data_berkas = json_decode($dapatkan_data->data_berkas);

		unset($data_berkas[$arrayke]);

		$data1 = array();

		foreach ($data_berkas as $key => $value) {
			$array_child = array(
				"nama_data" => $value->nama_data
			);
			array_push($data1, $array_child);
		}

		$masukan_data = json_encode($data1);

		$update = $this->db->query("UPDATE buka_rekening_baru SET data_berkas = '$masukan_data' WHERE id_biodata = '$id_biodata' ");

		if ($update) {
			$file = "file_dokument_buka_rekening_baru/".$namafile;
			unlink($file);
			redirect("buka_rek_baru/keberkas");
		}

	}
}

