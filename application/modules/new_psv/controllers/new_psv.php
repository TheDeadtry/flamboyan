<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_psv extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_new_psv');			
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

				$que = "SELECT a.*,b.nama as namaindon,b.nama_mandarin as namamandarinn FROM majikan a LEFT JOIN personal b ON a.id_biodata=b.id_biodata where a.kode_majikan=0 and a.kode_suhan=0 and a.kode_visapermit=0";
				$data['tampil_data_dok_inf'] = $this->M_new_psv->select($que);

				//$ques 	= "SELECT id_majikan,nama FROM datamajikan where kode_agen='".$this->session->userdata('xxidagen')."' order by nama";
				$gritos = "SELECT id_agen,nama FROM dataagen order by nama";
				$data['tampil_pilihan_agen'] = $this->M_new_psv->select($gritos);
				//$data['tampil_pilihan_maj'] = $this->M_new_psv->select($ques);

				$data['namamodule'] = "new_psv/";
				$data['namafileview'] = "v_new_psv";
				echo Modules::run('template/new_admin2_template', $data); 
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "new_psv/";
				$data['namafileview'] = "laporandokformalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}
	}
	function semua(){
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

				$que = "SELECT a.*,b.nama as namaindon,b.nama_mandarin as namamandarinn FROM majikan a LEFT JOIN personal b ON a.id_biodata=b.id_biodata where a.kode_majikan=0 and a.kode_suhan=0 and a.kode_visapermit=0";
				$data['tampil_data_dok_inf'] = $this->M_new_psv->select($que);

				//$ques 	= "SELECT id_majikan,nama FROM datamajikan where kode_agen='".$this->session->userdata('xxidagen')."' order by nama";
				$gritos = "SELECT id_agen,nama FROM dataagen order by nama";
				$suhannos = "SELECT id_suhan,no_suhan FROM datasuhan order by no_suhan";
				$tempatsuhannos = "SELECT id_biodata as id_tempat,tempatsuhandok FROM visa order by tempatsuhandok";
				$data['tampil_pilihan_agen'] = $this->M_new_psv->select($gritos);
				$data['tampil_pilihan_tempatsuhan'] = $this->M_new_psv->select($tempatsuhannos);
				$data['tampil_pilihan_suhan'] = $this->M_new_psv->select($suhannos);
				//$data['tampil_pilihan_maj'] = $this->M_new_psv->select($ques);

				$data['namamodule'] = "new_psv/";
				$data['namafileview'] = "v_new_psv";
				echo Modules::run('template/new_admin2_template', $data); 
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "new_psv/";
				$data['namafileview'] = "laporandokformalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}
	}
	
	function ditaiwan(){
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

				$que = "SELECT a.*,b.nama as namaindon,b.nama_mandarin as namamandarinn FROM majikan a LEFT JOIN personal b ON a.id_biodata=b.id_biodata where a.kode_majikan=0 and a.kode_suhan=0 and a.kode_visapermit=0";
				$data['tampil_data_dok_inf'] = $this->M_new_psv->select($que);

				//$ques 	= "SELECT id_majikan,nama FROM datamajikan where kode_agen='".$this->session->userdata('xxidagen')."' order by nama";
				$gritos = "SELECT id_agen,nama FROM dataagen order by nama";
				$data['tampil_pilihan_agen'] = $this->M_new_psv->select($gritos);
				//$data['tampil_pilihan_maj'] = $this->M_new_psv->select($ques);

				$data['namamodule'] = "new_psv/";
				$data['namafileview'] = "v_new_psv_taiwan";
				echo Modules::run('template/new_admin2_template', $data); 
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "new_psv/ditaiwan";
				$data['namafileview'] = "laporandokformalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}
	}
	
	function diindo(){
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

				$que = "SELECT a.*,b.nama as namaindon,b.nama_mandarin as namamandarinn FROM majikan a LEFT JOIN personal b ON a.id_biodata=b.id_biodata where a.kode_majikan=0 and a.kode_suhan=0 and a.kode_visapermit=0";
				$data['tampil_data_dok_inf'] = $this->M_new_psv->select($que);

				//$ques 	= "SELECT id_majikan,nama FROM datamajikan where kode_agen='".$this->session->userdata('xxidagen')."' order by nama";
				$gritos = "SELECT id_agen,nama FROM dataagen order by nama";
				$data['tampil_pilihan_agen'] = $this->M_new_psv->select($gritos);
				//$data['tampil_pilihan_maj'] = $this->M_new_psv->select($ques);

				$data['namamodule'] = "new_psv/";
				$data['namafileview'] = "v_new_psv_indo";
				echo Modules::run('template/new_admin2_template', $data); 
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "new_psv/diindo";
				$data['namafileview'] = "laporandokformalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}
	}

	function setpilih() {
		$idagen = $this->input->post('idagen');
		//$idmaj = $this->input->post('idmaj');
		$this->session->set_userdata("xxidagen", $idagen);
		//$this->session->set_userdata("xxidmaj", $idmaj);
		redirect('new_psv/');
	}

	function updateketsuhan() {
		$ketsuhan = $this->input->post('ketsuhan');
		$id = $this->input->post('idbio');
		$data = array (
			'ketsuhan' => $ketsuhan
		);
		$this->M_new_psv->update($data, $id);
		redirect('new_psv/');
	}

	function updateketpermit() {
		$ketpermit = $this->input->post('ketpermit');
		$id = $this->input->post('idbio');
		$data = array (
			'ketpermit' => $ketpermit
		);
		$this->M_new_psv->update($data, $id);
		redirect('new_psv/');
	}

	
	function settempat($pilihan_tempat){
		$pilihanfixed = str_replace("%20", " ", $pilihan_tempat); 
		$this->session->set_userdata('piltempat', $pilihanfixed);
		redirect('new_psv/');
	}

  
   	function show_data_psv() {
		
		$request = '$_POST';
		// $table = 'majikan';

		// $primaryKey = 'id_biodata';

		$columns22 = array(
			0 => 'd.suhanno',
			1 => 'e.vpno',
			2 => 'h.namaindon'
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

		$pilstat = $this->session->userdata('pilstat');

		if ($pilstat == '') {
			$final_destination = "";			
		} elseif ($pilstat == 'DIINDONESIA') {
			$final_destination = "(g.tempatsuhandok='放印尼 DI INDONESIA' || NULL ) AND ";
		} elseif ($pilstat == 'DITAIWAN') {
			$final_destination = "(g.tempatsuhandok='寄臺灣KE TAIWAN' || NULL ) AND ";
		} 

		$tampil_data_dok_inf = $this->M_new_psv->tampil_data_psv($where_dd, $limit);

		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_dok_inf);$kjl++) {
        	$fff = $fff.','.$kjl;
		}
		// $tampil_data_dok_inf = $this->M_new_psv->select($query);
        $data2=array();
		$no=intval($_POST['start']);

        foreach ($tampil_data_dok_inf as $row) {
			$no++;
			array_push($data2,
				array(
                    $no,
                    $row->majikannama,
					$row->majikannamamandarin,
					$row->perbio,
                    $row->namaindon,
                    $row->namamandarinn, 
                    $row->tanggalterbang, 	
					$row->suhantglsimpan, 
					$row->ketpermit.
					'<a data-toggle="modal" data-target="#ketpermit'.$no.'">
					<i class="icon-pencil3">
					</i>
					<span>
					</span>
					</a>',
                    $row->suhanno,
                    $row->suhantglterbit,
                    //$row->suhantglexp,
                    $row->suhantglterima, 
                    $row->statsuhan,
                    $row->idbiodititip, 
                    $row->namadititip, 
                    $row->tglterbangdititip,
                    $row->ketsuhan.'&nbsp
                    <a data-toggle="modal" data-target="#ketsuhan'.$no.'">
                        <i class="icon-pencil3">
                        </i>
                        <span>
                        </span>
                    </a>'.
                    '<div class="modal fade" id="ketsuhan'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('new_psvp/updateketsuhan') .'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN LAPORAN</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$row->perbio.'">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN</label>
                                                    <textarea class="form-control" name="ketsuhan">'.$row->ketsuhan.'</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>',
                    $row->vpno,
                    $row->vptglterbit,
                    $row->vptglexp,
                    $row->vptglterima,
                    $row->statvp,
                    $row->idbiodititip2, 
                    $row->namadititip2, 
                    $row->tglterbangdititip2, 
					$row->ketpermit.
					'<a data-toggle="modal" data-target="#ketpermit'.$no.'">
					<i class="icon-pencil3">
					</i>
					<span>
					</span>
					</a>',
                    // $row->perbio,
                    // $row->namaindon,
                    // $row->namamandarinn,
                    // $row->tglterbang,
                    // $row->vptglsimpan,
					// $row->ketpermit.
					// '<a data-toggle="modal" data-target="#ketpermit'.$no.'">
					// <i class="icon-pencil3">
					// </i>
					// <span>
					// </span>
					// </a>',
					$row->tempatsuhan,
                    $row->tempatvp,
                    $row->idbiotitip,
					$row->namatitip,
                    $row->tglterbangtitip.'&nbsp
                    <div class="modal fade" id="ketpermit'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('new_psv/updateketpermit').'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN VISA PERMIT</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$row->perbio.'">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN </label>
                                                    <textarea class="form-control" name="ketpermit">'.$row->ketpermit.'</textarea>
                                                </div>
                                            </div>
                                        </div>
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
		
		$resFilterLength = $this->M_new_psv->psv_count_where($where_dd);
        $recordsFiltered = $resFilterLength->total;

        $resTotalLength =  $this->M_new_psv->psv_count();
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
	
	function show_data_psv_diindo() {
		
		$request = '$_POST';
		// $table = 'majikan';

		// $primaryKey = 'id_biodata';

		$columns22 = array(
			0 => 'd.suhanno',
			1 => 'e.vpno',
			2 => 'h.namaindon'
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

		$pilstat = $this->session->userdata('pilstat');

		if ($pilstat == '') {
			$final_destination = "";			
		} elseif ($pilstat == 'DIINDONESIA') {
			$final_destination = "(g.tempatsuhandok='放印尼 DI INDONESIA' || NULL ) AND ";
		} elseif ($pilstat == 'DITAIWAN') {
			$final_destination = "(g.tempatsuhandok='寄臺灣KE TAIWAN' || NULL ) AND ";
		} 

		$tampil_data_dok_inf = $this->M_new_psv->tampil_data_psv_diindo($where_dd, $limit);

		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_dok_inf);$kjl++) {
        	$fff = $fff.','.$kjl;
		}
		// $tampil_data_dok_inf = $this->M_new_psv->select($query);
        $data2=array();
		$no=intval($_POST['start']);

        foreach ($tampil_data_dok_inf as $row) {
			$no++;
			array_push($data2,
				array(
                    $no,
                    $row->majikannama,
					$row->majikannamamandarin,
					$row->perbio,
                    $row->namaindon,
                    $row->namamandarinn, 	
                    $row->tanggalterbang, 
					$row->suhantglsimpan, 
					$row->ketpermit.
					'<a data-toggle="modal" data-target="#ketpermit'.$no.'">
					<i class="icon-pencil3">
					</i>
					<span>
					</span>
					</a>',
                    $row->suhanno,
                    $row->suhantglterbit,
                    //$row->suhantglexp,
                    $row->suhantglterima, 
                    $row->statsuhan,
                    $row->idbiodititip, 
                    $row->namadititip, 
                    $row->tglterbangdititip,
                    $row->ketsuhan.'&nbsp
                    <a data-toggle="modal" data-target="#ketsuhan'.$no.'">
                        <i class="icon-pencil3">
                        </i>
                        <span>
                        </span>
                    </a>'.
                    '<div class="modal fade" id="ketsuhan'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('new_psvp/updateketsuhan') .'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN LAPORAN</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$row->perbio.'">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN</label>
                                                    <textarea class="form-control" name="ketsuhan">'.$row->ketsuhan.'</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>',
                    $row->vpno,
                    $row->vptglterbit,
                    $row->vptglexp,
                    $row->vptglterima,
                    $row->statvp,
                    $row->idbiodititip2,
                    $row->namadititip2,
                    $row->tglterbangdititip2,
					$row->ketpermit.
					'<a data-toggle="modal" data-target="#ketpermit'.$no.'">
					<i class="icon-pencil3">
					</i>
					<span>
					</span>
					</a>',
                    // $row->perbio,
                    // $row->namaindon,
                    // $row->namamandarinn,
                    // $row->tglterbang,
                    // $row->vptglsimpan,
					// $row->ketpermit.
					// '<a data-toggle="modal" data-target="#ketpermit'.$no.'">
					// <i class="icon-pencil3">
					// </i>
					// <span>
					// </span>
					// </a>',
					$row->tempatsuhan,
                    $row->tempatvp,
                    $row->idbiotitip,
					$row->namatitip,
                    $row->tglterbangtitip.'&nbsp
                    <div class="modal fade" id="ketpermit'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('new_psv/updateketpermit').'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN VISA PERMIT</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$row->perbio.'">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN </label>
                                                    <textarea class="form-control" name="ketpermit">'.$row->ketpermit.'</textarea>
                                                </div>
                                            </div>
                                        </div>
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
		
		$resFilterLength = $this->M_new_psv->psv_count_where($where_dd);
        $recordsFiltered = $resFilterLength->total;

        $resTotalLength =  $this->M_new_psv->psv_count();
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

	function show_data_psv_ditaiwan() {
		
		$request = '$_POST';
		// $table = 'majikan';

		// $primaryKey = 'id_biodata';

		$columns22 = array(
			0 => 'd.suhanno',
			1 => 'e.vpno',
			2 => 'h.namaindon'
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

		$pilstat = $this->session->userdata('pilstat');

		if ($pilstat == '') {
			$final_destination = "";			
		} elseif ($pilstat == 'DIINDONESIA') {
			$final_destination = "(g.tempatsuhandok='放印尼 DI INDONESIA' || NULL ) AND ";
		} elseif ($pilstat == 'DITAIWAN') {
			$final_destination = "(g.tempatsuhandok='寄臺灣KE TAIWAN' || NULL ) AND ";
		} 

		$tampil_data_dok_inf = $this->M_new_psv->tampil_data_psv_ditaiwan($where_dd, $limit);

		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_dok_inf);$kjl++) {
        	$fff = $fff.','.$kjl;
		}
		// $tampil_data_dok_inf = $this->M_new_psv->select($query);
        $data2=array();
		$no=intval($_POST['start']);

        foreach ($tampil_data_dok_inf as $row) {
			$no++;
			array_push($data2,
				array(
                    $no,
                    $row->majikannama,
					$row->majikannamamandarin,
					$row->perbio,
                    $row->namaindon,
                    $row->namamandarinn, 
                    $row->tanggalterbang,
					$row->suhantglsimpan, 
					$row->ketpermit.
					'<a data-toggle="modal" data-target="#ketpermit'.$no.'">
					<i class="icon-pencil3">
					</i>
					<span>
					</span>
					</a>',
                    $row->suhanno,
                    $row->suhantglterbit,
                    //$row->suhantglexp,
                    $row->suhantglterima, 
                    $row->statsuhan,
                    $row->idbiodititip, 
                    $row->namadititip, 
                    $row->tglterbangdititip,
                    $row->ketsuhan.'&nbsp
                    <a data-toggle="modal" data-target="#ketsuhan'.$no.'">
                        <i class="icon-pencil3">
                        </i>
                        <span>
                        </span>
                    </a>'.
                    '<div class="modal fade" id="ketsuhan'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('new_psvp/updateketsuhan') .'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN LAPORAN</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$row->perbio.'">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN</label>
                                                    <textarea class="form-control" name="ketsuhan">'.$row->ketsuhan.'</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>',
                    $row->vpno,
                    $row->vptglterbit,
                    $row->vptglexp,
                    $row->vptglterima,
                    $row->statvp,
                    $row->idbiodititip2, 
                    $row->namadititip2, 
                    $row->tglterbangdititip2, 
					$row->ketpermit.
					'<a data-toggle="modal" data-target="#ketpermit'.$no.'">
					<i class="icon-pencil3">
					</i>
					<span>
					</span>
					</a>',
                    // $row->perbio,
                    // $row->namaindon,
                    // $row->namamandarinn,
                    // $row->tglterbang,
                    // $row->vptglsimpan,
					// $row->ketpermit.
					// '<a data-toggle="modal" data-target="#ketpermit'.$no.'">
					// <i class="icon-pencil3">
					// </i>
					// <span>
					// </span>
					// </a>',
					$row->tempatsuhan,
                    $row->tempatvp,
                    $row->idbiotitip,
					$row->namatitip,
                    $row->tglterbangtitip.'&nbsp
                    <div class="modal fade" id="ketpermit'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('new_psv/updateketpermit').'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN VISA PERMIT</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$row->perbio.'">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN </label>
                                                    <textarea class="form-control" name="ketpermit">'.$row->ketpermit.'</textarea>
                                                </div>
                                            </div>
                                        </div>
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
		
		$resFilterLength = $this->M_new_psv->psv_count_where($where_dd);
        $recordsFiltered = $resFilterLength->total;

        $resTotalLength =  $this->M_new_psv->psv_count();
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
	   
}