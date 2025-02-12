<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_visapermit extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('m_new_visapermit');			
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
				//$data['tampil_data_majikan'] = $this->m_majikans->tampil_data_majikan();
				//$data['tampil_data_suhan'] = $this->m_majikans->tampil_data_suhan();
				//$data['tampil_data_visapermit'] = $this->m_majikans->tampil_data_visapermit();
				//$data['tampil_data_agen'] = $this->m_majikans->tampil_data_agen();
				//$data['option_majikan'] = $this->m_majikans->getposisiList_majikan();
				$data['option_group'] = $this->m_new_visapermit->getposisiList_group();

				$data['namamodule'] = "new_visapermit";
				$data['namafileview'] = "detailvisapermit";
				echo Modules::run('template/new_admin_template', $data);
			}
		}
	}

	function show_visapermit() {

		$request = '$_POST';
		//$table = 'majikans';

		//$primaryKey = 'nodaftar';

		$columns22 = array(
			0 => 'datasuhan.no_suhan',
			1 => 'datavisapermit.no_visapermit',
			2 => 'datagroup.nama',
			3 => 'dataagen.nama',
			4 => 'datamajikan.nama',
            5 => 'datavisapermit.tglterbitvs',
            6 => 'datavisapermit.tglexpvs',
            7 => 'datavisapermit.tglexpext'

		);

		$strr = array();
		$string1 = $_POST['search']['value'];
		for ($i=0;$i<count($columns22);$i++) {
			$strr[] = " lower(".$columns22[$i].") LIKE '%".strtolower($string1)."%'";
		}
		$where = '';
		if ( count( $strr ) ) {
			$where = '('.implode(' OR ', $strr).')';
		}
		if ( $where !== '' ) {
			$where = $where;
		}

		$bindings = array();
		$limit 		= "";
		$where_dd 	= "";
		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd = "where ".$where;
		} else {
			$where_dd = "";
		}

		$tampil_data_vp = $this->m_new_visapermit->tampil_data_visapermit($where_dd, $limit);

		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_vp);$kjl++) {
        	$fff = $fff.','.$kjl;
		}


        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_vp as $row) {
	    	if ($row->filevisapermit != NULL) {
	    		$filevisa_data = '<a target="_blank" href="'.base_url().'/assets/dokvisapermit/'.$row->filevisapermit.'"'.$row->filevisapermit.'>
	    								<img width="50px" height="50px" src="'.base_url().'assets/dokvisapermit/'.$row->filevisapermit.'"/>
	    							</a>';
	    	} else {
	    		$filevisa_data = 'KOSONG';
	    	}
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="'.site_url('new_visapermit/update_data_visapermit/'.$row->id_visapermit).'" class="btn btn-mini btn-primary" type="button">Ubah</a>
                    <a href="'.site_url('new_visapermit/ubahagenvisapermit/'.$row->id_visapermit).'"class="btn btn-mini btn-primary"></i>Ubah SUHAN/VP </a>
                    <a class="btn btn-mini btn-primary" href="'.site_url('new_visapermit/tampilvisapermit/'.$row->id_visapermit).'" >Tanggal Terima</a>
                    <a class="btn btn-mini btn-primary" href="'.site_url('new_visapermit/tampiltkivisapermit/'.$row->id_visapermit).'" >Data TKI</a>',
                    '<a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapusvisapermit'.$no.'"><span>Hapus</span>',
                    $filevisa_data,
                    $row->no_suhan,
                    $row->no_visapermit,
                    $row->namagroupnya,
                    $row->namaagen,
                    $row->namamajikannya,
                    $row->tglterbitvs,
                    $row->tglexpvs,
                    $row->tglexpext.
		            '<div class="modal fade" id="hapusvisapermit'.$no.'" tabindex="-2" role="dialog">
		                <div class="modal-dialog">
		                    <div class="modal-content">
		                        <form class="form-horizontal" method="post" action="'.site_url('new_visapermit/hapus_visapermit').'">
		                            <div class="modal-header">
		                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
		                                <h4 class="modal-title">Hapus Data SUHAN</h4>
		                            </div>
		                            <div class="modal-body">
		                                <input type="hidden" class="form-control" name="id_visapermit" value="'.$row->id_visapermit.'">
		                                <p>Apakah anda yakin akan menghapus data VISA PERMIT ini? : '.$row->id_visapermit.'</p>
		                            </div>
		                            <div class="modal-footer">
		                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>'
                )
            );
        }
        
        $resFilterLength = $this->m_new_visapermit->vp_count_where($where_dd);
        $recordsFiltered = $resFilterLength->total;

        $resTotalLength =  $this->m_new_visapermit->vp_count();
        $recordsTotal = $resTotalLength->total;

        $r = array(
            "draw"            => isset ( $request['draw'] ) ?
                                    intval( $request['draw'] ) :
                                    0,
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $data2
        );

		$this->output->set_content_type('application/json')->set_output(json_encode($r));
	}

	function update_data_visapermit($id) {
		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_new_visapermit->ambil_id_visapermit($id);
		//$data['tampil_data_majikan'] = $this->m_new_visapermit->tampil_data_majikan();
		//$data['tampil_data_visapermit'] = $this->m_new_visapermit->tampil_data_visapermit();
		//$data['tampil_data_agen'] = $this->m_new_visapermit->tampil_data_agen();

		$data['namamodule'] = "new_visapermit";
		$data['namafileview'] = "updatevisapermit";
		echo Modules::run('template/new_admin_template', $data);
	}

	function ubahagenvisapermit($id){	
		if($this->input->post('submit')) {
			$this->m_new_visapermit->updatevisapermit_majikan();
			redirect('new_visapermit');
		}

		$data['idnya'] = $id;

		$data['row'] = $this->m_new_visapermit->tampil_data_suhandetail($id);
		$data['option_group'] = $this->m_new_visapermit->getposisiList_group();

		$data['namamodule'] = "new_visapermit";
		$data['namafileview'] = "ubahvisapermit";
		echo Modules::run('template/new_admin_template', $data);
	}

    function select_agenlist4(){
    	$idgrup= $this->input->post('kode_group');
        $data['option_agen'] = $this->m_new_visapermit->getagenlist_group($idgrup);
        $this->load->view('new_visapermit/detailgroup4',$data);
    }

    function select_majikanlist2(){
        $kodeagen= $this->input->post('kode_agen');
        $data['option_majikan'] = $this->m_new_visapermit->getmajikanlist_agen($kodeagen);
        $this->load->view('new_visapermit/detailmajikannya2',$data);
    }

    function select_suhanlist(){
        $kodemajikan= $this->input->post('kode_majikan');
        $data['option_suhan'] = $this->m_new_visapermit->ambilsuhannya($kodemajikan);
        $this->load->view('new_visapermit/detailsuhannya',$data);
    }

	function tampilvisapermit($id){	
		$data['idnya'] = $id;

		$data['tampil_datahistoryvisapermit'] 	= $this->m_new_visapermit->tampil_datahistoryvisapermit($id);

		$data['namamodule'] 	= "new_visapermit";
		$data['namafileview'] 	= "tampilvisapermit";
		echo Modules::run('template/new_admin_template', $data);
	}

	function tampiltkivisapermit($id){	
		$data['idnya'] = $id;

		$data['tampil_datatkivisapermit'] = $this->m_new_visapermit->tampil_datatkivisapermit($id);

		$data['namamodule'] = "new_visapermit";
		$data['namafileview'] = "tampiltkivisapermit";
		echo Modules::run('template/new_admin_template', $data);
	}

	function update_visapermit() {
		$this->m_new_visapermit->update_visapermit();
		redirect('new_visapermit');
	}

	function hapus_visapermit() {
		$this->m_new_visapermit->hapus_visapermit();
		redirect('new_visapermit');
	}

	function simpan_history_visapermit($id){
		$this->m_new_visapermit->simpan_history_visapermit($id);
		redirect('new_visapermit/tampilvisapermit/'.$id);
	}

	function update_history_visapermit($id) {
		$this->m_new_visapermit->update_history_visapermit($id);
		redirect('new_visapermit/tampilvisapermit/'.$id);
	}

	function hapus_history_visapermit($id) {
		$this->m_new_visapermit->hapus_history_visapermit($id);
		redirect('new_visapermit/tampilvisapermit/'.$id);
	}

	function simpan_data_visapermit(){
		$this->m_new_visapermit->simpan_data_visapermit();
		redirect('new_visapermit');
	}

		function simpan_data_visapermitdata(){

		$kodesuhan = $this->input->post('nosuhan');
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');

		$this->m_new_visapermit->simpan_data_visapermit();
		redirect('new_visapermit/');
	}
}