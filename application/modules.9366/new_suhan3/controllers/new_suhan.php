<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class New_suhan extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('m_new_suhan');			
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
				$data['option_group'] = $this->m_new_suhan->getposisiList_group();

				$data['namamodule'] = "new_suhan";
				$data['namafileview'] = "detailsuhan";
				echo Modules::run('template/new_admin_template', $data);
			}
		}
	}

	function show_suhan() {

		$request = '$_POST';
		//$table = 'suhan';

		//$primaryKey = 'nodaftar';

		$columns22 = array(
            0 => 'no_suhan',
            1 => 'datamajikan.nama',
            2 => 'tglterbit',
            3 => 'tglexp',
            4 => 'dataagen.nama'
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

		$tampil_data_suhan = $this->m_new_suhan->tampil_data_suhan2($where_dd, $limit);

		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_suhan);$kjl++) {
        	$fff = $fff.','.$kjl;
		}


        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_suhan as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapussuhan'.$no.'"><span>Hapus</span></a>
                    <a href="'.site_url('new_suhan/ubahagensuhan/'.$row->id_suhan).'"class="btn btn-mini btn-primary"></i>Edit Agen </a>
                    <a href="'.site_url('new_suhan/update_data_suhan/'.$row->id_suhan).'" class="btn btn-mini btn-primary" type="button">Ubah  Data</a>',
                    '<a class="btn btn-mini btn-primary" href="'.site_url('new_suhan/tampilsuhan/'.$row->id_suhan).'" >Tanggal Terima</a>
                    <a class="btn btn-mini btn-primary" onclick="popupcc()" href="'.site_url('new_suhan/tampiltki/'.$row->id_suhan).'">Data TKI</a>',
                    '<a target="_blank" href="'.base_url().'/assets/doksuhan/'.$row->filesuhan.'">
                    <img width="50px" height="50px" src="'.base_url().'assets/doksuhan/'.$row->filesuhan.'"/>
                    </a>',
                    $row->no_suhan,
                    $row->namamajikannya,
                    $row->tglterbit,
                    $row->tglexp,
                    $row->namaagen.
		            '<div class="modal fade" id="hapussuhan'.$no.'" tabindex="-2" role="dialog">
		                <div class="modal-dialog">
		                    <div class="modal-content">
		                        <form class="form-horizontal" method="post" action="'.site_url('new_suhan/hapus_suhan').'">
		                            <div class="modal-header">
		                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
		                                <h4 class="modal-title">Hapus Data SUHAN</h4>
		                            </div>
		                            <div class="modal-body">
		                                <input type="hidden" class="form-control" name="id_suhan" value="'.$row->id_suhan.'">
		                                <p>Apakah anda yakin akan menghapus data SUHAN ini? : '.$row->id_suhan.'</p>
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

        $resFilterLength 	= $this->m_new_suhan->suhan_count_where($where_dd);
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->m_new_suhan->suhan_count();
        $recordsTotal 		= $resTotalLength->total;

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
    function select_agenlist3(){
    	$idgrup= $this->input->post('kode_group');
        $data['option_agen'] = $this->m_new_suhan->getagenlist_group($idgrup);
        $this->load->view('new_suhan/detailgroup3',$data);
    }

    function select_majikanlist(){
        $kodeagen= $this->input->post('kode_agen');
        $data['option_majikan'] = $this->m_new_suhan->ambilmajikan($kodeagen);
        $this->load->view('new_suhan/detailmajikannya',$data);
    }

	function simpan_data_suhan(){
		$this->m_new_suhan->simpan_data_suhan();
		redirect('new_suhan/');
	}
	function ubahagensuhan($id){	
		if($this->input->post('submit')) {
			$this->m_new_suhan->updatesuhan_majikan();
			redirect('new_suhan/');
		}
		$data['idnya'] = $id;
		$data['tampil_data_suhan'] = $this->m_new_suhan->tampil_data_suhandetail($id);
		$data['option_group'] = $this->m_new_suhan->getposisiList_group();

		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "ubahagensuhan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function update_data_suhan($id) {
		if($this->input->post('submit')) {
			$this->m_new_suhan->update_data_suhan($id);
			redirect('majikans/suhan');
		}
		//$stts = '2'; 
		//$this->session->set_userdata("status",$stts);
		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_new_suhan->ambil_id_suhan($id);

		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "updatesuhan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function update_suhan() {
		$this->m_new_suhan->update_suhan();
		redirect('new_suhan');
	}

	function tampilsuhan($id){	
		$data['idnya'] = $id;

		$data['tampil_datahistory'] = $this->m_new_suhan->tampil_datahistory($id);
		$data['ambidatasuhan'] = $this->m_new_suhan->ambidatasuhan($id);
		$data['ambidatasuhanmajikan'] = $this->m_new_suhan->ambidatasuhanmajikan($id);

		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "tampilsuhan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function simpan_history_suhan($id){
		$this->m_new_suhan->simpan_history_suhan($id);
		redirect('new_suhan/tampilsuhan/'.$id);
	}

	function update_history_suhan($id) {
		$this->m_new_suhan->update_history_suhan($id);
		redirect('new_suhan/tampilsuhan/'.$id);
	}

	function hapus_history_suhan($id) {
		$this->m_new_suhan->hapus_history_suhan($id);
		redirect('new_suhan/tampilsuhan/'.$id);
	}

	function tampiltki($id) {	
		$data['idnya'] = $id;

		$data['tampil_datatki'] = $this->m_new_suhan->tampil_datatki($id);
		$data['ambidatasuhan'] = $this->m_new_suhan->ambidatasuhan($id);
		$data['ambidatasuhanmajikan'] = $this->m_new_suhan->ambidatasuhanmajikan($id);

		$data['namamodule'] = "new_suhan";
		$data['namafileview'] = "tampiltki";
		echo Modules::run('template/new_admin_template', $data);
	}

	function hapus_suhan() {
		$this->m_new_suhan->hapus_suhan();
		//redirect('new_suhan/');
	}
}