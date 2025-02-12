<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class laporandokinformal extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_laporandokinformal');			
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

				$gritos = "SELECT id_agen,nama FROM dataagen order by nama";
				$data['tampil_pilihan_agen'] = $this->M_laporandokinformal->select($gritos);

				$data['namamodule'] = "laporandokinformal";
				$data['namafileview'] = "laporandokinformal";
				echo Modules::run('template/new_admin2_template', $data); 
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "laporandokinformal";
				$data['namafileview'] = "laporandokinformalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function setpilih() {
		$idagen = $this->input->post('idagen');
		if ($idagen == 'xpilihx') {
			$this->session->set_userdata("idagen_inf", '');
		} else {
			$this->session->set_userdata("idagen_inf", $idagen);
		}
		
		redirect('laporandokinformal/');
	}

	function updateketsuhan() {
		$ketsuhan = $this->input->post('ketsuhan');
		$id = $this->input->post('idbio');
		$data = array (
			'ketsuhan' => $ketsuhan
		);
		$this->M_laporandokinformal->update($data, $id);
		redirect('laporandokinformal/');
	}

	function updateketpermit() {
		$ketpermit = $this->input->post('ketpermit');
		$id = $this->input->post('idbio');
		$data = array (
			'ketpermit' => $ketpermit
		);
		$this->M_laporandokinformal->update($data, $id);
		redirect('laporandokinformal/');
	}

   	function show_data() {
		$pilsek = $this->session->userdata('pilsektor');
		$pilagen = $this->session->userdata('idagen_inf');

		$request = '$_POST';
		$table = 'majikan';

		$primaryKey = 'id_biodata';

		$bindings = array();

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($pilagen != NULL) {
			$fieldagen = 'f.id_agen='.$pilagen.' and ';
		} else {
			$fieldagen 	= "f.id_agen='' and ";

		}

		$query = "SELECT 
		a.*,
		b.nama as namaindon,
		b.nama_mandarin as namamandarinn 
		FROM majikan a 
		LEFT JOIN personal b 
		ON a.id_biodata=b.id_biodata 
		LEFT JOIN dataagen f 
		ON a.kode_agen=f.id_agen
		where ".$fieldagen." 
		(a.kode_majikan=0 || NULL) and 
		(a.kode_suhan=0 || NULL) and 
		(a.kode_visapermit=0 || NULL)
		".$limit;
		$tampil_data_dok_inf = $this->M_laporandokinformal->select($query);		

        $data2=array();
		$no=intval($_POST['start']);
        foreach ($tampil_data_dok_inf as $dokinf) {
			$no++;
			array_push($data2,
				array(
                    $no,
                    $dokinf->namamajikan,
                    $dokinf->namataiwan,
                    $dokinf->id_biodata,
                    $dokinf->namaindon,
                    $dokinf->namamandarinn, 
                    $dokinf->id_suhan, 
                    $dokinf->tglterbitsuhan, 
                    '',
                    $dokinf->tglterimasuhan, 
                    $dokinf->statsuhan, 
                    '',
                    $dokinf->tglsimpansuhan, 
                    $dokinf->ketsuhan.' &nbsp
                    <a data-toggle="modal" data-target="#ketsuhan'.$no.'">
                        <i class="icon-pencil3">
                        </i>
                        <span>
                        </span>
                    </a>'.
                    '<div class="modal fade" id="ketsuhan'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('laporandokinformal/updateketsuhan') .'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN SUHAN</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$dokinf->id_biodata.'">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN </label>
                                                    <textarea class="form-control" name="ketsuhan">'.$dokinf->ketsuhan.'</textarea>
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
                    $dokinf->id_visapermit, 
                    $dokinf->tglterbitpermit, 
                    '',
                    $dokinf->tglterimapermit, 
                    $dokinf->statvp, 
                    '',
                    $dokinf->tglsimpanvp, 
                    $dokinf->ketpermit.'&nbsp
                    <a data-toggle="modal" data-target="#ketpermit'.$no.'">
                        <i class="icon-pencil3">
                        </i>
                        <span>
                        </span>
                    </a>'.
                    '<div class="modal fade" id="ketpermit'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('laporandokinformal/updateketpermit').'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN VISA PERMIT</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$dokinf->id_biodata.'">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>KETERANGAN </label>
                                                    <textarea class="form-control" name="ketpermit">'.$dokinf->ketpermit.'</textarea>
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
		
		$filterdok = "SELECT count(*) as filter 
		FROM majikan a 
		LEFT JOIN personal b 
		ON a.id_biodata=b.id_biodata 
		LEFT JOIN dataagen f 
		ON a.kode_agen=f.id_agen
		where ".$fieldagen." 
		(a.kode_majikan=0 || NULL) and 
		(a.kode_suhan=0 || NULL) and 
		(a.kode_visapermit=0 || NULL)";
		$resFilterLength = $this->M_laporandokinformal->select_row($filterdok);
		$recordsFiltered = $resFilterLength->filter;

		$countdok = "SELECT count(*) as countk 
		FROM majikan a 
		LEFT JOIN personal b 
		ON a.id_biodata=b.id_biodata 
		LEFT JOIN dataagen f 
		ON a.kode_agen=f.id_agen
		where
		(a.kode_majikan=0 || NULL) and 
		(a.kode_suhan=0 || NULL) and 
		(a.kode_visapermit=0 || NULL)";
		$resTotalLength =  $this->M_laporandokinformal->select_row($countdok);
		$recordsTotal = $resTotalLength->countk;

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