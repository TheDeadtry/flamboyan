<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Sponsor extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_sponsor');			
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

				//$data['tampil_data_sponsor'] = $this->M_sponsor->tampil_data_sponsor();


				$data['namamodule'] = "sponsor";
				$data['namafileview'] = "sponsoradmin";
				echo Modules::run('template/new_admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "sponsor";
				$data['namafileview'] = "sponsoragen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function show_sponsor() {
		$request = '$_POST';

		$columns22 = array(
            0 => 'kode_sponsor',
            1 => 'nama',
            2 => 'alamat',
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
			$where_dd = "where kode_sponsor!='' and ".$where;
		} else {
			$where_dd = "where kode_sponsor!='' ";
		}

		$tampil_data_sponsor = $this->M_sponsor->tampil_data_sponsor($where_dd, $limit);

		$fff = '';
        for ($kjl=0;$kjl<count($tampil_data_sponsor);$kjl++) {
        	$fff = $fff.','.$kjl;
		}


        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_sponsor as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit'.$no.'">
                        <span>Edit</span>
                    </a>  
                    <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus'.$no.'">
                        <span>Hapus</span>
                    </a>'.
                    '<div class="modal fade" id="edit'.$no.'" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-slate-400">
                                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                                    <h3>UPDATE SPONSOR</h3>
                                </div>  
                                <form class="form-horizontal" method="post" action="'.site_url('sponsor/update_sponsor').'">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="kode_sponsor" value="'.$row->kode_sponsor.'">

                                        <div class="form-group">
                                            <label class="control-label col-sm-12">Kode </label>
                                            <div class="col-sm-12">
                                                <input type="text" name="kode" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="'.$row->kode_sponsor.'" readonly/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-12">Nama </label>
                                            <div class="col-sm-12">
                                                <input type="text" name="nama" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="'.$row->nama.'"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-12">Handphone </label>
                                            <div class="col-sm-12">
                                                <input type="text" name="hp" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="'.$row->hp.'"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-12">Email </label>
                                            <div class="col-sm-12">
                                                <input type="text" name="email" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="'.$row->email.'"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-12">Alamat </label>
                                            <div class="col-sm-12">
                                                <input type="text" name="alamat" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="'.$row->alamat.'"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-12">Status</label>
                                            <div class="col-sm-12">
                                                <select class="select-search" data-placeholder="Choose a Category" tabindex="1" name="status">
                                                    <option value="'.$row->status.'" />'.$row->status.'
                                                    <option value="teman" />Teman
                                                    <option value="sponsor" />Sponsor
                                                    <option value="agen" />Agen
                                                </select>
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
                    </div>
                    '.'
                    <div class="modal fade" id="hapus'.$no.'" tabindex="-2" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('sponsor/hapus_sponsor').'">
                                    <div class="modal-header bg-purple-400">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                        <h4 class="modal-title">Hapus Data Sponsor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="kode_sponsor" value="'.$row->kode_sponsor.'">
                                        <p>Apakah anda yakin akan menghapus data Sponsor ini? : '.$row->nama.'</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>',
                    $row->kode_sponsor,
                    $row->nama,
                    $row->hp,
                    $row->email,
                    $row->alamat,
                    strtoupper($row->status)
                )
            );
        }

                                    

        $resFilterLength 	= $this->M_sponsor->sponsor_count_where($where_dd);
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->M_sponsor->sponsor_count();
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

	function simpan_data_sponsor(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$kode	= $this->input->post('kode');
		$nama	= $this->input->post('nama');
		$hp	= $this->input->post('hp');
		$email	= $this->input->post('email');
		$alamat	= $this->input->post('alamat');
		$status	= $this->input->post('status');
		
		$this->M_sponsor->simpan_data_sponsor($kode, $nama, $hp, $email,$alamat,$status);

		redirect('sponsor');
	}
		function update_sponsor() {
		$this->M_sponsor->update_sponsor();
		redirect('sponsor');
	}

	function hapus_sponsor() {
		$this->M_sponsor->hapus_sponsor();
		redirect('sponsor');
	}

	
}