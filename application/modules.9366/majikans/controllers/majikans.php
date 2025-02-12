<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Majikans extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('m_majikans');			
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
				$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan2();
				$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
				$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
								$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();

				$data['namamodule'] = "majikans";
				$data['namafileview'] = "majikanadmin";
				echo Modules::run('template/admin_template', $data);
			}
		}
		 
	}

		function detaildokumen($idmajikan){
		$data['tampil_data_detail'] = $this->m_majikans->tampil_data_detail($idmajikan);
		$data['tampil_nama_agree'] = $this->m_majikans->tampil_nama_agree1($idmajikan);
		$data['tampil_data_dok'] = $this->m_majikans->tampil_data_dok();
		$data['id_majikan'] = $idmajikan;
				$data['namamodule'] = "majikans";
				$data['namafileview'] = "detaildokumen";
				echo Modules::run('template/admin_template', $data);
		
	}

		function simpandokumen($idmajikan){
		$this->m_majikans->simpandokumen();
		redirect('majikans/detaildokumen/'.$idmajikan);
	}
	function updatedokumen($idmajikan) {
		$this->m_majikans->updatedokumen();
		redirect('majikans/detaildokumen/'.$idmajikan);
	}

	function hapusdokumen($idmajikan) {
		$this->m_majikans->hapusdokumen();
		redirect('majikans/detaildokumen/'.$idmajikan);
	}



	function suhan(){
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
				$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
				$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
				$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
								$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();

				$data['namamodule'] = "majikans";
				$data['namafileview'] = "detailsuhan";
				echo Modules::run('template/admin_template', $data);
			}
		}
		 
	}

	function tampilsuhan($id){	
			$data['idnya'] = $id;
			$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikandetail($id);
			$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhandetail($id);
			$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
			$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();

			$data['tampil_datahistory'] = $this->m_majikans->tampil_datahistory($id);
			$data['tampil_datatki'] = $this->m_majikans->tampil_datatki($id);
			$data['ambidatasuhan'] = $this->m_majikans->ambidatasuhan($id);
			$data['ambidatasuhanmajikan'] = $this->m_majikans->ambidatasuhanmajikan($id);


			$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
			$data['option_group'] = $this->m_majikans->getposisiList_group();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "tampilsuhan";
		echo Modules::run('template/kosongan_template', $data);
			}

				function tampildatasuhan($kodemajikan,$kodegroup,$kodeagen){	

								$data['kodemajikan'] = $kodemajikan;
								$data['kodegroup'] = $kodegroup;
								$data['kodeagen'] = $kodeagen;

				$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
				$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhandata($kodemajikan);
				$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
								$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();



		$data['namamodule'] = "majikans";
		$data['namafileview'] = "detaildatasuhan";
		echo Modules::run('template/kosongan_template', $data);
			}


		function tampilvisapermit($id){	
			$data['idnya'] = $id;
			$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikandetail($id);
			$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhandetail($id);
			$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
			$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();

			$data['tampil_datahistoryvisapermit'] = $this->m_majikans->tampil_datahistoryvisapermit($id);
			// $data['tampil_datatki'] = $this->m_majikans->tampil_datatkivisapermit($id);
			$data['ambidatavisapermit'] = $this->m_majikans->ambidatavisapermit($id);
			// $data['ambidatavisapermitmajikan'] = $this->m_majikans->ambidatasuhanmajikan($id);


			$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
			$data['option_group'] = $this->m_majikans->getposisiList_group();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "tampilvisapermit";
		echo Modules::run('template/kosongan_template', $data);
		
	}

		function tampiltki($id){	
			$data['idnya'] = $id;
			$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikandetail($id);
			$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhandetail($id);
			$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
			$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();

			$data['tampil_datahistory'] = $this->m_majikans->tampil_datahistory($id);
			$data['tampil_datatki'] = $this->m_majikans->tampil_datatki($id);
			$data['ambidatasuhan'] = $this->m_majikans->ambidatasuhan($id);
			$data['ambidatasuhanmajikan'] = $this->m_majikans->ambidatasuhanmajikan($id);


			$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
			$data['option_group'] = $this->m_majikans->getposisiList_group();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "tampiltki";
		echo Modules::run('template/kosongan_template', $data);
		
	}

			function tampiltkivisapermit($id){	
			$data['idnya'] = $id;
			$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikandetail($id);
			$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhandetail($id);
			$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
			$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();

			$data['tampil_datahistory'] = $this->m_majikans->tampil_datahistory($id);
			$data['tampil_datatkivisapermit'] = $this->m_majikans->tampil_datatkivisapermit($id);
			$data['ambidatavisapermit'] = $this->m_majikans->ambidatavisapermit($id);
			// $data['ambidatasuhanmajikan'] = $this->m_majikans->ambidatasuhanmajikan($id);


			$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
			$data['option_group'] = $this->m_majikans->getposisiList_group();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "tampiltkivisapermit";
		echo Modules::run('template/kosongan_template', $data);
		
	}


		function visapermit(){
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
				$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
				$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
				$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
								$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();

				$data['namamodule'] = "majikans";
				$data['namafileview'] = "detailvisapermit";
				echo Modules::run('template/admin_template', $data);
			}
		}
		 
	}

		function tampildatavisapermit($kodesuhan,$kodemajikan,$kodeagen,$kodegroup){	

								$data['kodesuhan'] = $kodesuhan;
								$data['kodemajikan'] = $kodemajikan;
								$data['kodeagen'] = $kodeagen;
								$data['kodegroup'] = $kodegroup;
								

			$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
				$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
				$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermitdata($kodesuhan);
								$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "detaildatavisapermit";
		echo Modules::run('template/kosongan_template', $data);
			}

		function ubahagens($id){	
			if($this->input->post('submit')) {
				$this->m_majikans->updatemajikans_agen();
				redirect('majikans');
			}
			$data['idnya'] = $id;
				$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikandetail($id);
				$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
				$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
								$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "ubahagens";
		echo Modules::run('template/admin_template', $data);
		
	}
			function ubahagensuhan($id){	
			if($this->input->post('submit')) {
				$this->m_majikans->updatesuhan_majikan();
				redirect('majikans/suhan');
			}
			$data['idnya'] = $id;
				$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikandetail($id);
				$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhandetail($id);
				$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
								$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "ubahagensuhan";
		echo Modules::run('template/admin_template', $data);
		
	}
	function ubahagenvisapermit($id){	
			if($this->input->post('submit')) {
				$this->m_majikans->updatevisapermit_majikan();
				redirect('majikans/visapermit');
			}
			$data['idnya'] = $id;
				$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikandetail($id);
				$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhandetail($id);
				$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermitdetail($id);
								$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "ubahvisapermit";
		echo Modules::run('template/admin_template', $data);
		
	}



	// function select_suhanlist(){
 //        $data['option_suhan'] = $this->m_majikans->getsuhanList();
 //        $this->load->view('majikans/detailmajikans',$data);
 //    }
    function select_agenlist(){
    	    	 $idgrup= $this->input->post('kode_group');
        $data['option_agen'] = $this->m_majikans->getagenList($idgrup);
        $this->load->view('majikans/detailgroup',$data);
    }
        function select_agenlist3(){
    	    	 $idgrup= $this->input->post('kode_group');
        $data['option_agen'] = $this->m_majikans->getagenlist_group($idgrup);
        $this->load->view('majikans/detailgroup3',$data);
    }

            function select_agenlist4(){
    	    	 $idgrup= $this->input->post('kode_group');
        $data['option_agen'] = $this->m_majikans->getagenlist_group($idgrup);
        $this->load->view('majikans/detailgroup4',$data);
    }

        function select_majikanlist(){
        $kodeagen= $this->input->post('kode_agen');
        $data['option_majikan'] = $this->m_majikans->ambilmajikan($kodeagen);
        $this->load->view('majikans/detailmajikannya',$data);
    }

            function select_majikanlist2(){
        $kodeagen= $this->input->post('kode_agen');
        $data['option_majikan'] = $this->m_majikans->getmajikanlist_agen($kodeagen);
        $this->load->view('majikans/detailmajikannya2',$data);
    }

      function select_suhanlist(){
        $kodemajikan= $this->input->post('kode_majikan');
        $data['option_suhan'] = $this->m_majikans->ambilsuhannya($kodemajikan);
        $this->load->view('majikans/detailsuhannya',$data);
    }

	function simpan_data_majikan(){
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$a = $this->input->post('pimpinan_man');
		$b = $this->input->post('pimpinan_indo');
		$c = $this->input->post('jabatan_man');
		$d = $this->input->post('jabatan_indo');
		$hp	= $this->input->post('hp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$status = $this->input->post('status');
		$this->m_majikans->simpan_data_majikan($kode, $nama, $hp, $email,$alamat,$status,$a,$b,$c,$d);
		redirect('new_majikans');
	}

	function simpan_data_suhan(){
		$this->m_majikans->simpan_data_suhan();
		redirect('majikans/suhan');
	}

	function simpan_data_suhandata(){
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');

		$this->m_majikans->simpan_data_suhan();
		redirect('majikans/tampildatasuhan/'.$kodemajikan.'/'.$kode_agen.'/'.$group);
	}


	function simpan_data_visapermit(){
		$this->m_majikans->simpan_data_visapermit();
		redirect('majikans/visapermit');
	}

		function simpan_data_visapermitdata(){

		$kodesuhan = $this->input->post('nosuhan');
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');

		$this->m_majikans->simpan_data_visapermit();
		redirect('majikans/tampildatavisapermit/'.$kodesuhan.'/'.$kodemajikan.'/'.$kode_agen.'/'.$group);
	}

	function update_data_suhan($id) {
		if($this->input->post('submit')) {
			$this->m_majikans->update_data_suhan($id);
			redirect('majikans/suhan');
		}
		//$stts = '2'; 
		//$this->session->set_userdata("status",$stts);
		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_majikans->ambil_id_suhan($id);
		$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
		$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
										$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();
		$data['namamodule'] = "majikans";
		$data['namafileview'] = "updatesuhan";
		echo Modules::run('template/admin_template', $data);
	}

		function update_data_suhandata($id,$kodemajikan,$kodegroup,$kodeagen) {
		if($this->input->post('submit')) {

		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');

			$this->m_majikans->update_suhan();
			redirect('majikans/tampildatasuhan/'.$kodemajikan.'/'.$kode_agen.'/'.$group);
		}
		//$stts = '2'; 
		//$this->session->set_userdata("status",$stts);
		$data['kodemajikan'] = $kodemajikan;
		$data['kodegroup'] = $kodegroup;
		$data['kodeagen'] = $kodeagen;

		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_majikans->ambil_id_suhan($id);
		$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
		$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
										$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();
		$data['namamodule'] = "majikans";
		$data['namafileview'] = "updatesuhandata";
		echo Modules::run('template/kosongan_template', $data);
	}



		function update_data_majikan($id) {
		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_majikans->ambil_id_majikan($id);
		$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
		$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
										$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
								$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
								$data['option_group'] = $this->m_majikans->getposisiList_group();
		$data['namamodule'] = "majikans";
		$data['namafileview'] = "updatemajikan";
		echo Modules::run('template/admin_template', $data);
	}


	function update_data_visapermit($id) {
		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_majikans->ambil_id_visapermit($id);
		$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
		$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
		$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "updatevisapermit";
		echo Modules::run('template/admin_template', $data);
	}


	function update_data_visapermitdata($id,$idsuhan,$kodemajikan,$kodegroup,$kodeagen) {

		if($this->input->post('submit')) {

		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
		$idsuhan = $this->input->post('idsuhan');

			$this->m_majikans->update_visapermit();
			redirect('majikans/tampildatavisapermit/'.$idsuhan.'/'.$kodemajikan.'/'.$kode_agen.'/'.$group);
		}

		$data['idsuhan'] = $idsuhan;
		$data['kodemajikan'] = $kodemajikan;
		$data['kodegroup'] = $kodegroup;
		$data['kodeagen'] = $kodeagen;


		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_majikans->ambil_id_visapermit($id);
		$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
		$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
		$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();

		$data['namamodule'] = "majikans";
		$data['namafileview'] = "updatevisapermitdata";
		echo Modules::run('template/kosongan_template', $data);
	}


	function hapus_data_suhan($id) {
		$this->m_majikans->hapus_data_suhan($id);
		redirect('majikans/suhan');
	}

	function hapus_data_visapermit($id) {
		$this->m_majikans->hapus_data_visapermit($id);
		redirect('majikans/visapermit');
	}


	function update_majikan() {
		$this->m_majikans->update_majikan();
		redirect('majikans');
	}

	function hapus_majikan() {
		$this->m_majikans->hapus_majikan();
		redirect('majikans');
	}

	function update_suhan() {
		$this->m_majikans->update_suhan();
		redirect('majikans/suhan');
	}



		function hapus_suhan() {
		$this->m_majikans->hapus_suhan();
		redirect('majikans/suhan');
	}

	function hapus_suhandata() {

		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');

		$this->m_majikans->hapus_suhan();
		redirect('majikans/tampildatasuhan/'.$kodemajikan.'/'.$kode_agen.'/'.$group);
	}

		function update_visapermit() {
		$this->m_majikans->update_visapermit();
		redirect('majikans/visapermit');
	}

		function hapus_visapermit() {
		$this->m_majikans->hapus_visapermit();
		redirect('majikans/visapermit');
	}

		function hapus_visapermitdata() {
			
			$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
		$idsuhan = $this->input->post('nosuhan');

		$this->m_majikans->hapus_visapermit();
		redirect('majikans/tampildatavisapermit/'.$idsuhan.'/'.$kodemajikan.'/'.$kode_agen.'/'.$group);
	}


	function simpan_history_suhan($id){
		$this->m_majikans->simpan_history_suhan($id);
		redirect('majikans/tampilsuhan/'.$id);
	}

			function update_history_suhan($id) {
		$this->m_majikans->update_history_suhan($id);
		redirect('majikans/tampilsuhan/'.$id);
	}

		function hapus_history_suhan($id) {
		$this->m_majikans->hapus_history_suhan($id);
		redirect('majikans/tampilsuhan/'.$id);
	}


	function simpan_history_visapermit($id){
		$this->m_majikans->simpan_history_visapermit($id);
		redirect('majikans/tampilvisapermit/'.$id);
	}

			function update_history_visapermit($id) {
		$this->m_majikans->update_history_visapermit($id);
		redirect('majikans/tampilvisapermit/'.$id);
	}

		function hapus_history_visapermit($id) {
		$this->m_majikans->hapus_history_visapermit($id);
		redirect('majikans/tampilvisapermit/'.$id);
	}




}