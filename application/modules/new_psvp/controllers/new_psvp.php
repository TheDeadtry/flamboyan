<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_psvp extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_new_psvp');			
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
				$data['tampil_data_dok_inf'] = $this->M_new_psvp->select($que);

				//$ques 	= "SELECT id_majikan,nama FROM datamajikan where kode_agen='".$this->session->userdata('xxidagen')."' order by nama";
				$gritos = "SELECT id_agen,nama FROM dataagen order by nama";
				$data['tampil_pilihan_agen'] = $this->M_new_psvp->select($gritos);
				//$data['tampil_pilihan_maj'] = $this->M_new_psvp->select($ques);

				$data['namamodule'] = "new_psvp";
				$data['namafileview'] = "v_new_psvp";
				echo Modules::run('template/new_admin2_template', $data); 
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "new_psvp";
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
		redirect('new_psvp/');
	}

	function updateketsuhan() {
		$ketsuhan = $this->input->post('ketsuhan');
		$id = $this->input->post('idbio');
		$data = array (
			'ketsuhan' => $ketsuhan
		);
		$this->M_new_psvp->update($data, $id);
		redirect('new_psvp/');
	}

	function updateketpermit() {
		$ketpermit = $this->input->post('ketpermit');
		$id = $this->input->post('idbio');
		$data = array (
			'ketpermit' => $ketpermit
		);
		$this->M_new_psvp->update($data, $id);
		redirect('new_psvp/');
	}

   	function show_data() {
		
		$request = '$_POST';
		// $table = 'majikan';

		// $primaryKey = 'id_biodata';

		$columns22 = array(
			0 => 'd.suhanno',
			1 => 'e.vpno',
			2 => 'b.namaindon',
            3 => 'e.vptglterbit',
            4 => 'e.vptglexp'

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

		$tampil_data_dok_inf = $this->M_new_psvp->tampil_data_psv($where_dd, $limit);

		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_dok_inf);$kjl++) {
        	$fff = $fff.','.$kjl;
		}
		// $tampil_data_dok_inf = $this->M_new_psvp->select($query);
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
                    '',
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
                                                    <label>KETERANGAN </label>
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
                                <form class="form-horizontal" method="post" action="'.site_url('new_psvp/updateketpermit').'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN LAPORAN</h5>
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
		
		$resFilterLength = $this->M_new_psvp->psv_count_where($where_dd);
        $recordsFiltered = $resFilterLength->total;

        $resTotalLength =  $this->M_new_psvp->psv_count();
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
		
		// if ( $print != "") {
		// 	$suhan_no = array();
		// 	$tglterbitsuhan = array();
		// 	$tglterimasuhan = array();
		// 	$simpanasli = array();
		// 	$ketsuh = array();
		// 	$vp_no = array();
		// 	$tglterbitvp = array();
		// 	$tglexpired = array();
		// 	$idtki = array();
		// 	$namatki = array();
		// 	$tglkirim = array();
		// 	$tglsimpan = array();
		// 	$ketvp = array();

		// 	foreach ($tampil_data_dok_inf as $tampil_data_dok_inf) {

		// 		$suhan_no[] = $row->suhanno;
		// 		$tglterbitsuhan [] = $row->suhantglterbit;
		// 		$tglterimasuhan [] = $row->suhantglterima;
		// 		$simpanasli [] = $row->statsuhan;
		// 		$ketsuh[] = $row->ketsuhan;
		// 		$vp_no[] = $row->vpno;
		// 		$tglterbitvp[] = $row->vptglterbit;
		// 		$tglexpired[] = $row->vptglexp;
		// 		$idtki[] = $row->perbio;
		// 		$namatki[] = $row->namaindon;
		// 		$tglkirim[] = $row->tglterbang;
		// 		$tglsimpan[] = $row->vptglsimpan;
		// 		$ketvp[] = $row->ketpermit;
		// 	}

		// 	require_once 'assets/phpword/PHPWord.php';
		// 	$document = $PHPWord->loadTemplate('files/pgmshvp.docx');
			
		// 		$isidata = array(
					
		// 			'valuenosu' =>	$suhan_no,
		// 			'valuetglterbit' =>	$tglterbitsuhan,
		// 			'valuetglterima' => $tglterimasuhan,
		// 			'value_as' => $simpanasli,
		// 			'valueketsuh' => $ketsuh,
		// 			'valuenovp' => $vp_no,
		// 			'valuetglterbitvp' => $tglterbitvp,
		// 			'valueexp' => $tglexpired,
		// 			'valueidtki' => $idtki,
		// 			'valuenama' => $namatki,
		// 			'valuetglkirim' => $tglkirim,
		// 			'valuetglsmpn' => $tglsimpan,
		// 			'valueketvp' => $ketvp
		// 		);

		// 		$document->cloneRow('data', $isidata);

		// 	$namafile = 'pgmSuhanVPf.docx';
		// 	$tmp_file = $namafile;
		// 	$document->save($tmp_file);
		
		// }
		// else {
 
		// $html = '';
		// foreach ($tampil_data_dok_inf as $tampil_data_dok_inf) {
		// 	$html .= '
		// 			<div class="col-sm-4">
	    //         			<div class="info-model">
	    //         				<div class="pgm-suhanvp">
	    //         					'.$suhan_no.'
	    //         				</div>
	    //         				<div class="pgm-suhan">
	    //         					'.$namatki.'
	    //         				</div>
	    //         			</div>
	    //         		</div>

		// 	';
		// }
		// 	print($html);
		// }
   	}
    function select_maj(){
        $kodeagen 	= $this->input->post('kode_agen');
        $gritos  	= "SELECT * FROM datamajikan where kode_agen='".$kodeagen."' ORDER BY nama ASC";
        $data['tampil_pilihan_agen'] = $this->M_new_psvp->select($gritos);
        $this->load->view('new_psvp/detailmajikan',$data);
	}
	
}