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

		if (isset($_POST['agenq']))
		{

		if ($_POST['agenq']=="" || $_POST['agenq']=="All" ) {
			$where_dd .= "";
		}else{
			$where_dd .= " AND dataagen.id_agen = '".$_POST['agenq']."'";			
		}
	}



		$tampil_data_majikan = $this->m_new_majikans->tampil_data_majikan3($where_dd, $limit);

		


		


		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_majikan);$kjl++) {
        	$fff = $fff.','.$kjl;
		}


        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_majikan as $row) {

			$datafile = $this->M_session->select_row('SELECT * FROM datamajikan_dokumen WHERE majikan_id='.$row->id_majikan.' ORDER BY id DESC');
			if ($datafile != NULL) {
				$filemajikans_data = '<a target="_blank" href="'.base_url().'assets/dokmajikan/file-file/'.$datafile->file.'">'.$datafile->filetglinput.'</a>';
			} else {
	        	$filemajikans_data = 'KOSONG';
	        }/*
	        if ($row->file != NULL) {
	        	$imgs = '<a target="_blank" href="'.base_url().'assets/dokmajikan/'.$row->file.'">';
	        	if (strpos($row->file, '.docx') !== false ) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/docx.png" /></a>';
		        } elseif (strpos($row->file, '.doc') !== false) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/doc.png" /></a>';
		        } elseif (strpos($row->file, '.xlsx') !== false ) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/xlsx.png" /></a>';
		        } elseif (strpos($row->file, '.xls') !== false) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/xls.png" /></a>';
		        } elseif (strpos($row->file, '.pdf') !== false) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/pdf.png" /></a>';
		        } else { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/dokmajikan/'.$row->file.'"/></a>'; 
		        }
		        $filemajikans_data = $imgs.$imgss;
	        } else {
	        	$filemajikans_data = 'KOSONG';
	        }*/
            $no++;
            array_push($data2,
                array(
                    $no,
                    $filemajikans_data,
                    '<a class="btn btn-primary" href="'.site_url('new_majikans/uploaddocument/'.$row->id_majikan).'">Upload Documents</a>',
                    '<div style="position: relative ;" class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="margin-bottom:5px">
                            Menu
                            <span class="caret"></span>
                        </button>
                        <ul  style="position: relative;" class="dropdown-menu">
							<li>
								<a onclick="dew_window_pop1_'.$no.'()">DATA SUHAN</a>                                                        
							</li>
                            <li class="divider"></li>
                            <li>
                               <a href="'.site_url('new_majikans/update_data_majikan/'.$row->id_majikan).'" type="button">Ubah</a>
                            </li>
                            <li>
                               <a href="'.site_url('new_majikans/ubahagens/'.$row->id_majikan).'"></i>Edit Agen </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#hapusmajikan'.$no.'">Hapus</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a onclick="dew_window_pop4_'.$no.'()">Permintaan Dokumen</a></a> 
                            </li>
                        </ul>
                    </div>',
                    '<button onclick="tambahtki('."'".$row->id_majikan."'".')" class="btn btn-primary">Tambah Tki</button>'
                    ,
                    $row->kode_majikan,
                    $row->nama,
                    $row->namamajikan,
                    $row->pimpinan_man,
                    $row->pimpinan_indo,
                    $row->jabatan_man,
                    $row->jabatan_indo,
                    $row->hp,
                    $row->email,
                    $row->alamat,
                    $row->alamat_mandarin,
                    $row->namaagen.
		            '<div class="modal fade" id="hapusmajikan'.$no.'" tabindex="-2" role="dialog">
		                <div class="modal-dialog">
		                    <div class="modal-content">
		                        <form class="form-horizontal" method="post" action="'.site_url('new_majikans/hapus_majikan').'">
		                            <div class="modal-header">
		                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
		                                <h4 class="modal-title">Hapus Data SUHAN</h4>
		                            </div>
		                            <div class="modal-body">
		                                <input type="hidden" class="form-control" name="id_majikan" value="'.$row->id_majikan.'">
		                                <p>Apakah anda yakin akan menghapus data SUHAN ini? : '.$row->id_majikan.'</p>
		                            </div>
		                            <div class="modal-footer">
		                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>'.
		            '
		            <script>
		            	function dew_window_pop1_'.$no.'() {
				            window.open("'.site_url('new_majikans/tampildatasuhan/'.$row->id_majikan.'/'.$row->kode_agen.'/'.$row->kode_group).'", "windowName", "width=1000, height=580, left=139, top=64, scrollbars, resizable"); 
				            return false;
				        }
		            </script>
		            '.
		            '
		            <script>
		            	function dew_window_pop2() {
				            window.open("'.site_url('new_majikans/update_data_majikan/'.$row->id_majikan).'", "windowName", "width=1000, height=580, left=139, top=64, scrollbars, resizable"); 
				            return false;
				        }
		            </script>
		            '.
		            '
		            <script>
		            	function dew_window_pop3() {
				            window.open("'.site_url('new_majikans/ubahagens/'.$row->id_majikan).'", "windowName", "width=1000, height=580, left=139, top=64, scrollbars, resizable"); 
				            return false;
				        }
		            </script>
		            '.
		            '
		            <script>
		            	function dew_window_pop4_'.$no.'() {
				            window.open("'.site_url('new_majikans/detaildokumen/'.$row->id_majikan).'", "windowName", "width=1000, height=580, left=139, top=64, scrollbars, resizable"); 
				            return false;
				        }
		            </script>
		            '
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

	function hapus_majikan() {
		$this->m_new_majikans->hapus_majikan();
		redirect('new_majikans/');
	}

    function select_agenlist(){
    	$idgrup= $this->input->post('kode_group');
        $data['option_agen'] = $this->m_new_majikans->getagenList($idgrup);
        $this->load->view('new_majikans/detailgroup',$data);
    }

    function tampildatasuhan($kodemajikan,$kodeagen,$kodegroup){	
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
		echo Modules::run('template/new_admin2_template', $data);
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
        	if ($row->filesuhan != NULL) {
		        $imgs = '<a target="_blank" href="'.base_url().'assets/doksuhan/'.$row->filesuhan.'">';

		        if (strpos($row->filesuhan, '.docx') !== false ) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/docx.png" /></a>';
		        } elseif (strpos($row->filesuhan, '.doc') !== false) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/doc.png" /></a>';
		        } elseif (strpos($row->filesuhan, '.xlsx') !== false ) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/xlsx.png" /></a>';
		        } elseif (strpos($row->filesuhan, '.xls') !== false) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/xls.png" /></a>';
		        } elseif (strpos($row->filesuhan, '.pdf') !== false) { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/pdf.png" /></a>';
		        } else { 
		        	$imgss = '<img width="50px" height="50px" src="'.base_url().'assets/doksuhan/'.$row->filesuhan.'"/></a>'; 
		        }
		        $filesuhan_data = $imgs.$imgss;
	        } else {
	        	$filesuhan_data = 'KOSONG';
	        }

            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapussuhan'.$no.'">
                    	<span>
                    		Hapus
                    	</span>
                    </a>
                    <a href="'.site_url('new_majikans/update_data_suhandata/'.$row->id_suhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup).'" class="btn btn-mini btn-primary" type="button" >
                    	Ubah  Data
                    </a>',
                    '<a class="btn btn-mini btn-primary" href="'.site_url('new_majikans/tampilsuhan/'.$row->id_suhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup).'" >
                    	Tanggal Terima
                    </a>
                    <a class="btn btn-mini btn-primary" href="'.site_url('new_majikans/tampiltki/'.$row->id_suhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup).'" >
                    	Data TKI
                    </a>
                    <a class="btn btn-mini btn-primary" href="'.site_url('new_majikans/tampildatavisapermit/'.$row->id_suhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup).'" >
                    	VISA PERMIT
                    </a>',
                    $filesuhan_data.
                    '<div class="modal fade" id="hapussuhan'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('new_majikans/hapus_suhandata').'">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                        <h4 class="modal-title">Hapus Data SUHAN</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="kodemajikan" value="'.$row->id_majikan.'">
                                        <input type="hidden" class="form-control" name="group" value="'.$kodegroup.'">
                                        <input type="hidden" class="form-control" name="kode_agen" value="'.$kodeagen.'">

                                        <input type="hidden" class="form-control" name="id_suhan" value="'.$row->id_suhan.'">
                                        <input type="hidden" class="form-control" name="file" value="'.$row->filesuhan.'">
                                        <p>Apakah anda yakin akan menghapus data SUHAN ini? : '.$row->id_suhan.'</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
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

	function hapus_suhandata() {

		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');

		$this->m_new_majikans->hapus_suhan();
		redirect('new_majikans/tampildatasuhan/'.$kodemajikan.'/'.$group.'/'.$kode_agen);
	}

	function update_data_majikan($id) {
		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_new_majikans->ambil_id_majikan($id);

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "updatemajikan";
		echo Modules::run('template/new_admin2_template', $data);
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
		//$data['option_majikan'] = $this->m_new_majikans->getposisiList_majikan();
		$data['option_group'] = $this->m_new_majikans->getposisiList_group();

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "ubahagens";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function detaildokumen($idmajikan){
		$data['tampil_data_detail'] = $this->m_new_majikans->tampil_data_detail($idmajikan);
		$data['tampil_nama_agree'] = $this->m_new_majikans->tampil_nama_agree1($idmajikan);
		$data['tampil_data_dok'] = $this->m_new_majikans->tampil_data_dok();
		$data['id_majikan'] = $idmajikan;
		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "detaildokumen";
		echo Modules::run('template/new_admin2_template', $data);
		
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

	function tampilsuhan($id,$kodemajikan,$kodeagen,$kodegroup){	
		$data['idnya'] = $id;
		$data['kodemajikan'] = $kodemajikan;
		$data['kodegroup'] = $kodegroup;
		$data['kodeagen'] = $kodeagen;

		$data['tampil_datahistory'] = $this->m_new_majikans->tampil_datahistory($id);
		$data['ambidatasuhan'] = $this->m_new_majikans->ambidatasuhan($id);
		$data['ambidatasuhanmajikan'] = $this->m_new_majikans->ambidatasuhanmajikan($id);

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "tampilsuhan";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function update_data_suhandata($id,$kodemajikan,$kodeagen,$kodegroup) {
		if ($this->input->post('submit')) {
			$group = $this->input->post('group');
 			$kode_agen = $this->input->post('kode_agen');
			$kodemajikan = $this->input->post('kodemajikan');

			$t = $this->m_new_majikans->update_suhan();
			redirect('new_majikans/tampildatasuhan/'.$kodemajikan.'/'.$kode_agen.'/'.$group);
		} else {
		//$stts = '2'; 
		//$this->session->set_userdata("status",$stts);
		$data['idnya'] = $id;
		$data['kodemajikan'] = $kodemajikan;
		$data['kodegroup'] = $kodegroup;
		$data['kodeagen'] = $kodeagen;

		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_new_majikans->ambil_id_suhan($id);
		
		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "updatesuhandata";
		echo Modules::run('template/new_admin2_template', $data);
	}
	}

	function simpan_data_suhandata() {
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');

		$this->m_new_majikans->simpan_data_suhan();
		redirect('new_majikans/tampildatasuhan/'.$kodemajikan.'/'.$group.'/'.$kode_agen);
	}

	function simpan_history_suhan($id, $kodemajikan, $kodegroup, $kodeagen){
		$this->m_new_majikans->simpan_history_suhan($id);
		redirect('new_majikans/tampilsuhan/'.$id.'/'.$kodemajikan.'/'.$kodegroup.'/'.$kodeagen);
	}

	function update_history_suhan($id, $kodemajikan, $kodegroup, $kodeagen) {
		$this->m_new_majikans->update_history_suhan($id);
		redirect('new_majikans/tampilsuhan/'.$id.'/'.$kodemajikan.'/'.$kodegroup.'/'.$kodeagen);
	}

	function hapus_history_suhan($id, $kodemajikan, $kodegroup, $kodeagen) {

		$this->m_new_majikans->hapus_history_suhan($id);
		redirect('new_majikans/tampilsuhan/'.$id.'/'.$kodemajikan.'/'.$kodegroup.'/'.$kodeagen);
	}

	function tampiltki($id,$kodemajikan,$kodeagen,$kodegroup){	
		$data['idnya'] = $id;
		$data['kodemajikan'] = $kodemajikan;
		$data['kodegroup'] = $kodegroup;
		$data['kodeagen'] = $kodeagen;

		$data['tampil_datatki'] = $this->m_new_majikans->tampil_datatki($id);
		$data['ambidatasuhan'] = $this->m_new_majikans->ambidatasuhan($id);
		$data['ambidatasuhanmajikan'] = $this->m_new_majikans->ambidatasuhanmajikan($id);

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "tampiltki";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function tampildatavisapermit($kodesuhan,$kodemajikan,$kodeagen,$kodegroup){	
		$data['kodesuhan'] = $kodesuhan;
		$data['kodemajikan'] = $kodemajikan;
		$data['kodeagen'] = $kodeagen;
		$data['kodegroup'] = $kodegroup;

		$data['tampil_data_visapermit'] = $this->m_new_majikans->tampil_data_visapermitdata($kodesuhan);

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "detaildatavisapermit";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function update_data_visapermitdata($id,$idsuhan,$kodemajikan,$kodeagen,$kodegroup) {

		if ($this->input->post('submit')) {

			$group = $this->input->post('group');
	 		$kode_agen = $this->input->post('kode_agen');
			$kodemajikan = $this->input->post('kodemajikan');
			$idsuhan = $this->input->post('idsuhan');

			$this->m_new_majikans->update_visapermit();
			redirect('new_majikans/tampildatavisapermit/'.$idsuhan.'/'.$kodemajikan.'/'.$kode_agen.'/'.$group);
		}

		$data['idsuhan'] = $idsuhan;
		$data['kodemajikan'] = $kodemajikan;
		$data['kodegroup'] = $kodegroup;
		$data['kodeagen'] = $kodeagen;

		$data['status'] = $this->session->userdata("status");
		$data['row'] = $this->m_new_majikans->ambil_id_visapermit($id);

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "updatevisapermitdata";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function hapus_visapermitdata() {
			
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
		$idsuhan = $this->input->post('nosuhan');

		$this->m_new_majikans->hapus_visapermit();
		redirect('new_majikans/tampildatavisapermit/'.$idsuhan.'/'.$kodemajikan.'/'.$kode_agen.'/'.$group);
	}

	function tampilvisapermit($id, $idsuhan, $kodemajikan, $kodeagen, $kodegroup){	
		$data['idnya'] = $id;
		$data['idsuhan'] = $idsuhan;
		$data['kodemajikan'] = $kodemajikan;
		$data['kodegroup'] = $kodegroup;
		$data['kodeagen'] = $kodeagen;

		$data['tampil_data_visapermit'] = $this->m_new_majikans->tampil_data_visapermit();

		$data['tampil_datahistoryvisapermit'] = $this->m_new_majikans->tampil_datahistoryvisapermit($id);

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "tampilvisapermit";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function simpan_history_visapermit($id, $idsuhan, $kodemajikan, $kodeagen, $kodegroup){
		$this->m_new_majikans->simpan_history_visapermit($id);
		redirect('new_majikans/tampilvisapermit/'.$id.'/'.$idsuhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup);
	}

	function update_history_visapermit($id, $idsuhan, $kodemajikan, $kodeagen, $kodegroup) {
		$this->m_new_majikans->update_history_visapermit($id);
		redirect('new_majikans/tampilvisapermit/'.$id.'/'.$idsuhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup);
	}

	function hapus_history_visapermit($id, $idsuhan, $kodemajikan, $kodeagen, $kodegroup) {
		$this->m_new_majikans->hapus_history_visapermit($id);
		redirect('new_majikans/tampilvisapermit/'.$id.'/'.$idsuhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup);
	}

	function tampiltkivisapermit($id, $idsuhan, $kodemajikan, $kodeagen, $kodegroup) {	
		$data['idnya'] = $id;
		$data['idsuhan'] = $idsuhan;
		$data['kodemajikan'] = $kodemajikan;
		$data['kodegroup'] = $kodegroup;
		$data['kodeagen'] = $kodeagen;

		$data['tampil_datatkivisapermit'] 	= $this->m_new_majikans->tampil_datatkivisapermit($id);
		$data['ambidatavisapermit'] 		= $this->m_new_majikans->ambidatavisapermit($id);

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "tampiltkivisapermit";
		echo Modules::run('template/new_admin2_template', $data);
	}


    function lihatuploadandata(){


        $data= $_POST['idupload'];
        $karakter = strlen($data);

        $resource = opendir("assets/dokmajikan/file-file/");
        $datasaya = '';
         while($entry = readdir($resource)) {

            if($entry != "." && $entry != ".."){
                
                if(substr($entry, 0, $karakter) == $data){
                    
                    $datasaya .= "<li class='datachanger'><button onclick='unlink(".'"'.$entry.'"'.")' class='btn btn-danger'>del</button><a class='btn btn-default' onclick='downloaddata(".'"'.$entry.'"'.")'><img src='".base_url("assets/icon-docu.png")."'><p>".$entry."</p></a></li>";

                }
           }
        }
        exit($datasaya);
    }

    function unlinkdata($filesaya){
        $fileName = basename($filesaya);
        $filePath = 'assets/dokmajikan/file-file/'.$fileName;
        if (!unlink($filePath)) {
            echo "gagal hapus";
        }else{
            echo "berhasil hapus";
        }
    }

    function ambiluploaddata($key){

        $fileName = basename($key);
        $filePath = 'assets/dokmajikan/file-file/'.$fileName;

        if (!empty($fileName) && file_exists($filePath)) {
            // define header
            header('Cache-Control: public');    
            header('Content-Describtion: File Transfer');    
            header('Content-Disposition: attachment; filename='.basename($fileName));    
            header('Content-TYpe: application/zip');
            header('Content-Transfer-Encoding: binary');    
            
            // read file
            readfile($filePath);
            exit;
        }else{
            echo 'file not axist.';
        }
    }

    function uploaddatasaya(){
    	// var_dump($_FILES['file']);
    // $file_name = $_FILES['file']['name'];
    // $file_type = $_FILES['file']['type'];
    // $file_size = $_FILES['file']['size'];
    // $file_tem_loc = $_FILES['file']['tmp_name'];
    // $file_store = "assets/dokmajikan/".$_POST['id']."_".$file_name;

    // $explode = explode(".", $file_name);
    // $countdata = count($explode)-1;
    // $namabaruextensi = $explode[$countdata];
    // $namabaru = date("Ymdhi");

    // $file_store_rename = "assets/dokmajikan/".$_POST['id']."_".$namabaru.'.'.$namabaruextensi;

    // move_uploaded_file($file_tem_loc, $file_store_rename);




    //$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

// Count # of uploaded files in array
	$total = count($_FILES['file']['name']);

	// Loop through each file
	for( $i=0 ; $i < $total ; $i++ ) {

	  //Get the temp file path
	  $tmpFilePath = $_FILES['file']['tmp_name'][$i];

	  //Make sure we have a file path
	  if ($tmpFilePath != ""){


	  	$namefile = $_FILES['file']['name'][$i];
	  	$explode = explode(".", $namefile);
	    $countdata = count($explode)-1;
	    $namabaruextensi = $explode[$countdata];
	    $namabaru = date("Ymdhi");

	    //Setup our new file path
	    $newFilePath = "assets/dokmajikan/file-file/".$_POST['id'].'_'.$namabaru.$i.'.'.$namabaruextensi;

	    //Upload the file into the temp dir
	    move_uploaded_file($tmpFilePath, $newFilePath);
	    // if(move_uploaded_file($tmpFilePath, $newFilePath)) {

	    //   //Handle other code here

	    // }
	  }
	}

    redirect("new_majikans");
    }

	public function uploaddocument($id) {
		$data['did'] = $id;
		$data['data1'] = $this->M_session->select('SELECT * FROM datamajikan_dokumen WHERE majikan_id='.$id.' ORDER BY id DESC');

		$data['namamodule'] = "new_majikans";
		$data['namafileview'] = "dkrh_uploaddocument";
		echo Modules::run('template/new_admin_template', $data);
	}
	
	public function dkrh_uploadbaru() {
		$tgl = $_POST['filetglinput'];
		$total = count($_FILES['file']['name']);

		for( $i=0 ; $i < $total ; $i++ ) {

			$tmpFilePath = $_FILES['file']['tmp_name'][$i];

			if ($tmpFilePath != ""){


				$namefile = $_FILES['file']['name'][$i];
				$explode = explode(".", $namefile);
				$countdata = count($explode)-1;
				$namabaruextensi = $explode[$countdata];
				$namabaru = date("Ymdhi");

				$newFilePath = "assets/dokmajikan/file-file/".$_POST['id'].'_'.$namabaru.$i.'.'.$namabaruextensi;

				move_uploaded_file($tmpFilePath, $newFilePath);

				$dataa = [
					'majikan_id' => $_POST['id'],
					'filetglinput' => $tgl,
					'file' => $_POST['id'].'_'.$namabaru.$i.'.'.$namabaruextensi,
				];
				$this->M_session->insert($dataa, 'datamajikan_dokumen');
			}
		}

    	redirect("new_majikans/uploaddocument/".$_POST['id']);
	}

/*
	public function tes1() {
		$newFilePath = FCPATH . "assets/dokmajikan/file-file";
		if (is_dir($newFilePath)) {
			$files = array_diff(scandir($newFilePath), array('.', '..'));
			// do something
		} else {
			$files = "No such directory";
		}
		//$files = array_diff(scandir($path), array('.', '..'));
		foreach ($files as $val) {
			$e = explode('_',$val);
			$tgl1 = substr($e[1],0,4);
			$tgl2 = substr($e[1],4,2);
			$tgl3 = substr($e[1],6,2);

			$data = [
				'majikan_id' => $e[0],
				'filetglinput' => $tgl1.'.'.$tgl2.'.'.$tgl3,
				'file' => $val,
			];
			$this->M_session->insert($data, 'datamajikan_dokumen');
		}
	}*/

}