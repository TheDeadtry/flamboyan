<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class surat_rekom_tabelpap extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_surat_rekom_tabelpap');			
	}
	
	function index() {
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
				$data['id'] =  $this->session->userdata('srtp_id');

				//$data['tampil_data_personal'] = $this->M_surat_rekom_tabelpap->tampil_data_personal();
				$data['tampil_data_tki'] = $this->M_surat_rekom_tabelpap->tampil_data_tki();
				$data['tampil_data_namapap'] = $this->M_surat_rekom_tabelpap->tampil_data_namapap();
				$data['namamodule'] = "surat_rekom_tabelpap";
				$data['namafileview'] = "surat_rekom_tabelpap";
				echo Modules::run('template/new_admin_template', $data);
			}
			else if ($id_user && $status==2){
				$data['namamodule'] = "surat_rekom_tabelpap";
				$data['namafileview'] = "surat_rekom_tabelpap";
				echo Modules::run('template/agen_template', $data); 
			}
		}
	}

	function detailtabelpap($idtabelpap){
		$data['tampil_data_detail'] = $this->M_surat_rekom_tabelpap->tampil_data_detail($idtabelpap);
		
		$data['tampil_data_ff'] = $this->M_surat_rekom_tabelpap->tampil_data_ff();
		$data['tampil_data_fi'] = $this->M_surat_rekom_tabelpap->tampil_data_fi();
		$data['tampil_data_mf'] = $this->M_surat_rekom_tabelpap->tampil_data_mf();
		$data['tampil_data_mi'] = $this->M_surat_rekom_tabelpap->tampil_data_mi();
		$data['tampil_data_jp'] = $this->M_surat_rekom_tabelpap->tampil_data_jp();
		$data['tampil_data_all_sektor'] = $this->M_surat_rekom_tabelpap->tampil_data_all_sektor();
		
		$data['id_pembuatan'] = $idtabelpap;
		$data['namamodule'] = "surat_rekom_tabelpap";
		$data['namafileview'] = "detailtabelpap";

		echo Modules::run('template/new_admin_template', $data);
	}

	function setid() {
		$id = $this->input->post('id');
		$this->session->set_userdata('srtp_id', $id);
		redirect('surat_rekom_tabelpap/');
	}

	function setsemua() {
		$this->session->set_userdata('srtp_id', '');
		redirect('surat_rekom_tabelpap/');
	}

	function show_data() {
		$piltki = $this->session->userdata('srtp_id');

		$columns22 = array(
            0 => 'tanggalpap',
            1 => 'nomorktkln',
            2 => 'daerah',
            3 => 'tanggal',
            4 => 'kepada',
            5 => 'nomor'
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

		$limit 		= "";
		$where_dd 	= "";
		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($piltki != NULL) {
			$where2 = $where.' and b.id_biodata="'.$piltki.'"';
		} else {
			$where2 = $where;
		}

		if ($where2 != NULL) {
			$where_dd = "where ".$where2;
		} else {
			$where_dd = "";
		}

		if ($piltki != NULL) {
			$querrr = "SELECT 
			a.*
			FROM pembuatan_tabelpap a
			JOIN detail_tabelpap b
			ON a.id_pembuatanpap = b.id_tabelpap
			$where_dd 
			order by id_pembuatanpap DESC 
			$limit";

			$bolvia = "SELECT count(*) as total 
			FROM pembuatan_tabelpap a
			JOIN detail_tabelpap b
			ON a.id_pembuatanpap = b.id_tabelpap 
			$where_dd";

			$rt = "SELECT count(*) as total 
			FROM pembuatan_tabelpap";

		} else {
			$querrr = "SELECT 
			*,id_pembuatanpap as idnyabuat 
			FROM pembuatan_tabelpap 
			$where_dd 
			order by id_pembuatanpap DESC 
			$limit";

			$bolvia = "SELECT count(*) as total 
			FROM pembuatan_tabelpap 
			$where_dd";

			$rt = "SELECT count(*) as total 
			FROM pembuatan_tabelpap";
		}
		$tampil_data_pengajuan= $this->M_surat_rekom_tabelpap->select($querrr);

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_pengajuan as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="#myModal2" role="button" data-toggle="modal" onClick=edit666("'.$row->id_pembuatanpap.'") class="btn btn-primary">Edit</a>
                    <a href="#hapus'.$no.'" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a>',
                    '<a href="'.base_url().'index.php/pdf13/cetakppad/'.$row->id_pembuatanpap.'"  target="_blank" class="btn btn-warning">Print</a>',
                    '<a href="'.site_url('surat_rekom_tabelpap/detailtabelpap/'.$row->id_pembuatanpap).'" class="btn btn-primary" type="button">Tampil CTKI</a>',
                    $row->nomor,
                    $row->nomorktkln,
                    $row->kepada,
                    $row->daerah,
                    $row->tanggalpap,
                    $row->tanggal.
                    '<div id="hapus'.$no.'" class="modal fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                    	<div class="modal-dialog">
            				<div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 id="myModalLabel1">Hapus Data</h3>
                                </div>
                                <form action="'.site_url('surat_rekom_tabelpap/hapus_data_surat/').'" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                	<div class="modal-body">     
                                        <input type="hidden" class="form-control" name="id_pembuatanpap" value="'.$row->id_pembuatanpap.'">
                                        <p>Apakah anda yakin akan menghapus Data dari: <code class="text-danger">'.$row->id_pembuatanpap.'</code> ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>'
                )
            );
        }

        $resFilterLength 	= $this->M_surat_rekom_tabelpap->select_row($bolvia);
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->M_surat_rekom_tabelpap->select_row($rt);
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

	function show_data_detail($id) {
		$columns22 = array(
            0 => 'personal.id_biodata',
            1 => 'personal.nama'
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

		$limit 		= "";
		$where_dd 	= "";
		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where2 = "where ".$where." and detail_tabelpap.id_tabelpap='".$id."'";
		} else {
			$where2 = "where ".$where;
		}

		$querrr = "SELECT 
					detail_tabelpap.id_biodata as id,
					personal.nama as nama,
					detail_tabelpap.id_pembuatan
					FROM detail_tabelpap 
					LEFT JOIN personal
					ON personal.id_biodata=detail_tabelpap.id_biodata
					$where2 order by id_pembuatan DESC $limit";
		$querrr2 = "SELECT 
					count(*) as total
					FROM detail_tabelpap 
					LEFT JOIN personal
					ON personal.id_biodata=detail_tabelpap.id_biodata
					$where2 order by id_pembuatan DESC";
		$querrr3 = "SELECT 
					count(*) as total
					FROM detail_tabelpap 
					LEFT JOIN personal
					ON personal.id_biodata=detail_tabelpap.id_biodata
					where detail_tabelpap.id_tabelpap=$id
					order by id_pembuatan DESC";

		$tampil_data_detail 	= $this->M_surat_rekom_tabelpap->select($querrr);
		$tampil_data_detail2 	= $this->M_surat_rekom_tabelpap->select_row($querrr2)->total;
		$tampil_data_detail3 	= $this->M_surat_rekom_tabelpap->select_row($querrr3)->total;

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_detail as $row) {
            $no++;
            array_push($data2,
                array(
		            $no,                               
		            '<a href="#" class="btn btn-mini btn-primary" data-toggle="modal" onClick=edit999("'.$row->id_pembuatan.'") data-target="#editvv"><span>Edit</span></a>  
		            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus'.$no.'"><span>Hapus</span></td>',
		            $row->id,
		            $row->nama.
		            '<div class="modal fade" id="hapus'.$no.'" tabindex="-2" role="dialog">
		                <div class="modal-dialog">
		                    <div class="modal-content">
		                        <form class="form-horizontal" method="post" action="'.site_url('surat_rekom_tabelpap/hapus_tabelpap/'.$id).'">
		                            <div class="modal-header">
		                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
		                                <h4 class="modal-title">Hapus Data CTKI</h4>
		                            </div>
		                            <div class="modal-body">
		                                <input type="hidden" class="form-control" name="id_pembuatan" value="'.$row->id_pembuatan.'">
		                                <p>Apakah anda yakin akan menghapus data CTKI ini? : '.$row->id_pembuatan.'</p>
		                            </div>
		                            <div class="modal-footer">
		                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>'
                )
            );
        }

        $recordsFiltered 	= $tampil_data_detail2;
        $recordsTotal 		= $tampil_data_detail3;

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

   	function edit_show() {
		$id = $this->input->post('id');

		$querys = "SELECT * FROM pembuatan_tabelpap where id_pembuatanpap='".$id."'";
		$data = $this->M_surat_rekom_tabelpap->select_row($querys);

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
   	}

   	function edit_detail_show() {
		$id = $this->input->post('id');

		$querys = "SELECT id_pembuatan, id_biodata FROM detail_tabelpap where id_pembuatan='".$id."'";
		$data = $this->M_surat_rekom_tabelpap->select_row($querys);

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
   	}

	function simpan_data_surat(){
		$this->M_surat_rekom_tabelpap->simpan_data_surat();
		redirect('surat_rekom_tabelpap/');
	}

	function edit_surat() {
		$this->M_surat_rekom_tabelpap->edit_surat();
		redirect('surat_rekom_tabelpap/');
	}

	function hapus_data_surat() {
		$this->M_surat_rekom_tabelpap->hapus_data_surat();
		redirect('surat_rekom_tabelpap/');
	}

	function simpan_data_tabelpap($idagen){
		$this->M_surat_rekom_tabelpap->simpan_data_ctki();
		redirect('surat_rekom_tabelpap/detailtabelpap/'.$idagen);
	}

	function update_tabelpap($idagen) {
		$this->M_surat_rekom_tabelpap->update_ctki();
		//print_r($rt);
		redirect('surat_rekom_tabelpap/detailtabelpap/'.$idagen);
	}

	function hapus_tabelpap($idagen) {
		$this->M_surat_rekom_tabelpap->hapus_ctki();
		redirect('surat_rekom_tabelpap/detailtabelpap/'.$idagen);
	}
	/* ------ TRASH --------
	function filtermasa(){
		$this->session->set_userdata('id', $this->input->post('id'));
		$idxxxx=$this->input->post('id');

		$data['id'] =  $this->input->post('id');

		$data['tampil_data_personal'] = $this->M_surat_rekom_tabelpap->tampil_data_personalcari($idxxxx);
		$data['tampil_data_tki'] = $this->M_surat_rekom_tabelpap->tampil_data_tki();
		$data['tampil_data_namapap'] = $this->M_surat_rekom_tabelpap->tampil_data_namapap();

		$data['namamodule'] = "surat_rekom_tabelpap";
		$data['namafileview'] = "surat_rekom_tabelpap";
		echo Modules::run('template/admin_template', $data);
	}*/
        
}