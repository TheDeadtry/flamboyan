<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class New_majikans extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('m_new_majikans');			
	}
	
	function index(){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){
			//user sudah login
				//$data['tampil_data_majikan'] = $this->m_new_majikans->tampil_data_majikan2();
				//$data['tampil_data_suhan'] = $this->m_new_majikans->tampil_data_suhan();
				//$data['tampil_data_visapermit'] = $this->m_new_majikans->tampil_data_visapermit();
				//$data['tampil_data_agen'] = $this->m_new_majikans->tampil_data_agen();
				//$data['option_majikan'] = $this->m_new_majikans->getposisiList_majikan();
				$data['option_group'] = $this->m_new_majikans->getposisiList_group();

				$data['namamodule'] = "new_majikans";
				$data['namafileview'] = "majikanadmin";
				echo Modules::run('template/new_admin_template', $data);
			}
		}
	}

	function show_majikan() {

		$request = '$_POST';
		$table = 'majikans';

		$primaryKey = 'nodaftar';

		$columns22 = array(
			0 => 'datamajikan.kode_majikan',  		
			1 => 'datamajikan.nama', 
			2 => 'datamajikan.namamajikan'
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

		$tampil_data_majikan = $this->m_new_majikans->tampil_data_majikan3($where_dd, $limit);

		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_majikan);$kjl++) {
        	$fff = $fff.','.$kjl;
		}

        $data2=array();
        $no=intval($_POST['start']);

        foreach ($tampil_data_majikan as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
                    '',
                    '<div style="position: relative ;" class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="margin-bottom:5px">
                            Menu
                            <span class="caret"></span>
                        </button>
                        <ul  style="position: relative;" class="dropdown-menu">
                             <li>
                               <a href="'.site_url('new_majikans/tampildatasuhan/'.$row->id_majikan.'/'.$row->kode_agen.'/'.$row->kode_group).'" onclick="window.open(this.href, "windowName", "width=1000, height=700, left=24, top=24, scrollbars, resizable"); return false;">DATA SUHAN</a>                                                        </li>
                            <li class="divider"></li>
                            <li>
                               <a href="'.site_url('new_majikans/update_data_majikan/'.$row->id_majikan).'" type="button">Ubah</a>
                            </li>
                            <li>
                               <a href="'.site_url('new_majikans/ubahagens/'.$row->id_majikan).'"></i>Edit Agen </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#hapus'.$no.'">Hapus</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="'.site_url('new_majikans/detaildokumen/'.$row->id_majikan).'" >Permintaan Dokumen</a></a> 
                            </li>
                        </ul>
                    </div>',
                    $row->kode_majikan,
                    $row->nama,
                    $row->namamajikan,
                    $row->hp,
                    $row->email,
                    $row->alamat,
                    $row->namaagen,
                )
            );
        }
        
        $resFilterLength = $this->m_new_majikans->majikan_count_where($where_dd);
        $recordsFiltered = $resFilterLength->total;

        $resTotalLength =  $this->m_new_majikans->majikan_count();
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

    function select_agenlist(){
    	$idgrup= $this->input->post('kode_group');
        $data['option_agen'] = $this->m_new_majikans->getagenList($idgrup);
        $this->load->view('new_majikans/detailgroup',$data);
    }

    function tampildatasuhan($kodemajikan,$kodegroup,$kodeagen){	
		$data['kodemajikan'] = $kodemajikan;
		$data['kodegroup'] = $kodegroup;
		$data['kodeagen'] = $kodeagen;


		//$data['tampil_data_majikan'] = $this->m_new_majikans->tampil_data_majikan();
		//$data['tampil_data_suhan'] = $this->m_new_majikans->tampil_data_suhandata($kodemajikan);
		//$data['tampil_data_visapermit'] = $this->m_new_majikans->tampil_data_visapermit();
		//$data['tampil_data_agen'] = $this->m_new_majikans->tampil_data_agen();
		//$data['option_majikan'] = $this->m_new_majikans->getposisiList_majikan();
		//$data['option_group'] = $this->m_new_majikans->getposisiList_group();

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "detaildatasuhan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function show_suhan($kodemajikan, $kodeagen, $kodegroup) {

		$request = '$_POST';
		$limit 		= "";
		$where_dd 	= "";

		$columns22 = array(
			0 => 'datasuhan.no_suhan',  		
			1 => 'datamajikan.nama', 
			2 => 'datasuhan.tglterbit',
            3 => 'datasuhan.tglexp',
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

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd = "WHERE datasuhan.id_majikan='".$kodemajikan."' and ".$where;
		} else {
			$where_dd = "WHERE datasuhan.id_majikan='".$kodemajikan."'";
		}

		$tampil_data_suhan = $this->m_new_majikans->tampil_data_suhandata($where_dd, $limit);	

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
                    '<a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapussuhan<?php echo $no; ?>">
                    	<span>
                    		Hapus
                    	</span>
                    </a>
                    <a href="'.site_url('new_majikans/update_data_suhandata/'.$row->id_suhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup).'" class="btn btn-mini btn-primary" type="button">
                    	Ubah  Data
                    </a>',
                    '<a class="btn btn-mini btn-primary" href="'.site_url('majikans/tampilsuhan/'.$row->id_suhan).'" onclick=window.open(this.href, "windowName", "width=1000, height=700, left=24, top=24, scrollbars, resizable"); return false;>
                    	Tanggal Terima
                    </a>
                    <a class="btn btn-mini btn-primary" href="'.site_url('majikans/tampiltki/'.$row->id_suhan).'" onclick=window.open(this.href, "windowName", "width=1000, height=700, left=24, top=24, scrollbars, resizable"); return false;>
                    	Data TKI
                    </a>
                    <a class="btn btn-mini btn-primary" href="'.site_url('majikans/tampildatavisapermit/'.$row->id_suhan.'/'.$kodemajikan.'/'.$kodegroup.'/'.$kodeagen).'" onclick=window.open(this.href, "windowName", "width=1000, height=700, left=24, top=24, scrollbars, resizable"); return false;>
                    	VISA PERMIT
                    </a>',
                    '<a href="'.base_url().'/assets/doksuhan/'.$row->filesuhan.'><img src="'.base_url().'assets/doksuhan/'.$row->filesuhan.'"/></a>'.
                    '<div class="modal fade" id="hapussuhan'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('majikans/hapus_suhandata').'">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                        <h4 class="modal-title">Hapus Data SUHAN</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="kodemajikan" value="'.$row->kode_majikan.'">
                                        <input type="hidden" class="form-control" name="group" value="'.$kodegroup.'">
                                        <input type="hidden" class="form-control" name="kode_agen" value="'.$kodeagen.'">

                                        <input type="hidden" class="form-control" name="id_suhan" value="'.$row->id_suhan.'">
                                        <input type="hiddens" class="form-control" name="file" value="'.$row->filesuhan.'">
                                        <p>Apakah anda yakin akan menghapus data SUHAN ini? : '.$row->id_suhan.'</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>',
                    $row->no_suhan,
                    $row->namamajikannya,
                    $row->tglterbit,
                    $row->tglexp,
                    $row->namaagen,
                )
            );
        }
        
        $recordsFiltered = count($tampil_data_suhan);

        $resTotalLength =  $this->m_new_majikans->suhandata_count();
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

	function update_data_majikan($id) {
		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_new_majikans->ambil_id_majikan($id);
		$data['tampil_data_majikan'] = $this->m_new_majikans->tampil_data_majikan();
		$data['tampil_data_suhan'] = $this->m_new_majikans->tampil_data_suhan();
		$data['tampil_data_agen'] = $this->m_new_majikans->tampil_data_agen();
		$data['option_majikan'] = $this->m_new_majikans->getposisiList_majikan();
		$data['option_group'] = $this->m_new_majikans->getposisiList_group();

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "updatemajikan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function update_majikan() {
		$this->m_new_majikans->update_majikan();
		redirect('new_majikans');
	}
	function ubahagens($id){	
		if($this->input->post('submit')) {
			$this->m_new_majikans->updatemajikans_agen();
			redirect('new_majikans');
		}
		$data['idnya'] = $id;
		$data['tampil_data_majikan'] = $this->m_new_majikans->tampil_data_majikandetail($id);
		$data['tampil_data_suhan'] = $this->m_new_majikans->tampil_data_suhan();
		$data['tampil_data_visapermit'] = $this->m_new_majikans->tampil_data_visapermit();
		$data['tampil_data_agen'] = $this->m_new_majikans->tampil_data_agen();
		$data['option_majikan'] = $this->m_new_majikans->getposisiList_majikan();
		$data['option_group'] = $this->m_new_majikans->getposisiList_group();

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "ubahagens";
		echo Modules::run('template/new_admin_template', $data);
	}

	function detaildokumen($idmajikan){
		$data['tampil_data_detail'] = $this->m_new_majikans->tampil_data_detail($idmajikan);
		$data['tampil_nama_agree'] = $this->m_new_majikans->tampil_nama_agree1($idmajikan);
		$data['tampil_data_dok'] = $this->m_new_majikans->tampil_data_dok();
		$data['id_majikan'] = $idmajikan;
		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "detaildokumen";
		echo Modules::run('template/new_admin_template', $data);
		
	}

	function simpandokumen($idmajikan){
		$this->m_new_majikans->simpandokumen();
		redirect('new_majikans/detaildokumen/'.$idmajikan);
	}

	function updatedokumen($idmajikan) {
		$this->m_new_majikans->updatedokumen();
		redirect('new_majikans/detaildokumen/'.$idmajikan);
	}

	function hapusdokumen($idmajikan) {
		$this->m_new_majikans->hapusdokumen();
		redirect('new_majikans/detaildokumen/'.$idmajikan);
	}
}