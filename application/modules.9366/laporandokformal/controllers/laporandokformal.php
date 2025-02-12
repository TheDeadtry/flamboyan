<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class laporandokformal extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_laporandokformal');			
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
				$data['tampil_data_dok_inf'] = $this->M_laporandokformal->select($que);

				$ques 	= "SELECT id_majikan,nama FROM datamajikan where kode_agen='".$this->session->userdata('xxidagen')."' order by nama";
				$gritos = "SELECT id_agen,nama FROM dataagen order by nama";
				$data['tampil_pilihan_maj'] = $this->M_laporandokformal->select($ques);
				$data['tampil_pilihan_agen'] = $this->M_laporandokformal->select($gritos);

				$data['namamodule'] = "laporandokformal";
				$data['namafileview'] = "laporandokformal";
				echo Modules::run('template/new_admin2_template', $data); 
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "laporandokformal";
				$data['namafileview'] = "laporandokformalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function setpilih() {
		$idagen = $this->input->post('idagen');
		$idmaj = $this->input->post('idmaj');
		$this->session->set_userdata("xxidagen", $idagen);
		$this->session->set_userdata("xxidmaj", $idmaj);
		redirect('laporandokformal/');
	}

	function updateketsuhan() {
		$ketsuhan = $this->input->post('ketsuhan');
		$id = $this->input->post('idbio');
		$data = array (
			'ketsuhan' => $ketsuhan
		);
		$this->M_laporandokformal->update($data, $id);
		redirect('laporandokformal/');
	}

	function updateketpermit() {
		$ketpermit = $this->input->post('ketpermit');
		$id = $this->input->post('idbio');
		$data = array (
			'ketpermit' => $ketpermit
		);
		$this->M_laporandokformal->update($data, $id);
		redirect('laporandokformal/');
	}

   	function show_data() {
		$pilsek 	= $this->session->userdata('pilsektor');
		$pilagen 	= $this->session->userdata('xxidagen');
		$pilmaj 	= $this->session->userdata('xxidmaj');

		$request = '$_POST';
		$table = 'majikan';

		$primaryKey = 'id_biodata';

		$bindings = array();

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($pilagen != NULL) {
			$fieldagen = 'f.id_agen='.$pilagen.' and ';
			if ($pilmaj != NULL) {
				$fieldmaj = $fieldagen.'c.id_majikan='.$pilmaj.' and ';
			} else {
				$fieldmaj = $fieldagen;
			}		
		} else {
			$fieldagen 	= "f.id_agen='' and ";
			$fieldmaj 	= $fieldagen;
		}

		$query = "SELECT 
		a.id_biodata as perbio,
		a.tglsimpansuhan,
		a.statsuhan,
		a.ketsuhan,
		a.tglsimpanvp,
		a.statvp,
		a.ketpermit,
		b.nama as namaindon,
		b.nama_mandarin as namamandarinn,
		c.nama as majikannama,
		c.namamajikan as majikannamamandarin,
		d.no_suhan as suhanno,
		d.tglterbit as suhantglterbit,
		d.tglexp as suhantglexp,
		d.tglterima as suhantglterima,
		d.tglsimpan as suhantglsimpan,
		e.no_visapermit as vpno,
		e.tglterbitvs as vptglterbit,
		e.tglexpvs as vptglexp,
		e.tglterimavs as vptglterima,
		e.tglsimpanvs as vptglsimpan
		FROM majikan a 
		LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
		LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
		LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
		LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit
		LEFT JOIN dataagen f ON a.kode_agen=f.id_agen
		where ".$fieldmaj." (a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL)".$limit;

		$tampil_data_dok_inf = $this->M_laporandokformal->select($query);	

        $data2=array();
		$no=intval($_POST['start']);
        foreach ($tampil_data_dok_inf as $dokinf) {
			$no++;
			array_push($data2,
				array(
                    $no,
                    $dokinf->majikannama,
                    $dokinf->majikannamamandarin,
                    $dokinf->suhanno, 
                    $dokinf->suhantglterbit, 
                    $dokinf->suhantglexp,
                    $dokinf->suhantglterima, 
                    $dokinf->statsuhan, 
                    $dokinf->perbio,
                    $dokinf->namaindon,
                    $dokinf->namamandarinn, 	
                    '',
                    $dokinf->suhantglsimpan, 
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
                                <form class="form-horizontal" method="post" action="'.site_url('laporandokformal/updateketsuhan') .'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN SUHAN</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$dokinf->perbio.'">
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
                    $dokinf->vpno, 
                    $dokinf->vptglterbit, 
                    $dokinf->vptglexp,
                    $dokinf->vptglterima, 
                    $dokinf->statvp, 
                    $dokinf->perbio,
                    $dokinf->namaindon,
                    $dokinf->namamandarinn, 	
                    '',
                    $dokinf->vptglsimpan, 
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
                                <form class="form-horizontal" method="post" action="'.site_url('laporandokformal/updateketpermit').'">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">UBAH KETERANGAN VISA PERMIT</h5>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idbio" value="'.$dokinf->perbio.'">
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
		}/*
		$fieldmajz = "where ".$fieldmaj."(a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL)";
		$filterdok = "
		SELECT count(*) as filter
		FROM majikan a 
		LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
		LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
		LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
		LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit 
		LEFT JOIN dataagen f ON a.kode_agen=f.id_agen
		".$fieldmajz;
		$resFilterLength = $this->M_laporandokformal->select_row($filterdok);
		$recordsFiltered = $resFilterLength->filter;

		$countdok = "
		SELECT count(*) as countk
		FROM majikan a 
		LEFT JOIN personal b ON a.id_biodata=b.id_biodata 
		LEFT JOIN datamajikan c ON a.kode_majikan=c.id_majikan
		LEFT JOIN datasuhan d ON a.kode_suhan=d.id_suhan
		LEFT JOIN datavisapermit e ON a.kode_visapermit=e.id_visapermit 
		LEFT JOIN dataagen f ON a.kode_agen=f.id_agen
		where (a.kode_majikan!=0 || NULL) and (a.kode_suhan!=0 || NULL) and (a.kode_visapermit!=0 || NULL)";
		$resTotalLength =  $this->M_laporandokformal->select_row($countdok);
		$recordsTotal = $resTotalLength->countk;*/
		$recordsTotal = count($tampil_data_dok_inf);
		$recordsFiltered = count($tampil_data_dok_inf);;

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

    function select_maj(){
        $kodeagen 	= $this->input->post('kode_agen');
        $quertos  	= "SELECT * FROM datamajikan where kode_agen='".$kodeagen."' ORDER BY nama ASC";
        $data['tampil_pilihan_maj'] = $this->M_laporandokformal->select($quertos);
        $this->load->view('laporandokformal/detailmajikan',$data);
    }
}