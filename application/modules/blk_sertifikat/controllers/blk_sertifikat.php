<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_sertifikat extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			

		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
		if(count($_POST) == 0){
			if (!$session['session_userid'] && !$session['session_status']){
				redirect('login/login_blk');
			}		
			if ($id_user && $status!=2){
				redirect('dashboard');
			}
		};
	}
	
	function index() {	

		$data['namamodule'] = "blk_sertifikat";
		$data['namafileview'] = "blk_sertifikat";
		$data['sektor'] = $this->db->query("SELECT * FROM sektormajikan")->result();
		echo Modules::run('template/blk_template', $data); 
	}

    function ubah_api($id=""){
        $data = $this->db->query("SELECT * FROM blk_sertifikat WHERE id='$id'")->row();
        
        if($data){
            $sektor = $data->sektor;
            $where = ""; 
            if($sektor == 'F'){
                $where = "(a.id_biodata LIKE 'F%')";
            }
            elseif($sektor == 'I'){
                $where = "(a.id_biodata LIKE 'I%')";
            }
            elseif($sektor == 'J'){
                $where = "(a.id_biodata LIKE 'J%')";
            }else{
                
                if(strpos($sektor, "-")){
                    $where = "(".join(" || ", array_map(function($data){
            		       return "a.id_biodata LIKE '$data%'";
            		}, explode(",", explode("-", $sektor)[1]) ) )." ) ";
                }else{
                    $where = "(".join(" || ", array_map(function($data){
            		       return "a.id_biodata LIKE '$data%'";
            		}, explode(",", $sektor) ) )." ) ";
                }
            }
            
            $quertos  	= "SELECT 
        				a.id_personal,
        				a.id_biodata,
        				a.nama
        				FROM personal a 
        				JOIN paspor b 
        				ON a.id_biodata = b.id_biodata 
        				JOIN disnaker c 
        				ON a.id_biodata = c.id_biodata 
        				WHERE b.keterangan='sudah' 
        				and (a.statterbang is null or a.statterbang = '') 
        				and a.statusaktif != 'Mengundurkan diri' 
        				and a.statusaktif != 'UNFIT' 
        				and $where 
        				GROUP BY a.id_biodata
        				ORDER BY a.id_biodata
        				";
            
            echo json_encode([
                "sektor" =>   $data->sektor,
                "data" => $data,
                "datatki" => $this->db->query($quertos)->result()
            ]);
        }
    }

	function ambil_pmi() {
		$sektor = $this->input->post("sektor");
		$where = "(".join(" || ", array_map(function($data){
		       return "a.id_biodata LIKE '$data%'";
		}, explode(",", explode("-", $sektor)[1]) ) )." ) ";

        $quertos  	= "SELECT 
        				a.*
        				FROM personal a 
        				JOIN paspor b 
        				ON a.id_biodata = b.id_biodata 
        				JOIN disnaker c 
        				ON a.id_biodata = c.id_biodata 
        				WHERE b.keterangan='sudah' 
        				and (a.statterbang is null or a.statterbang = '') 
        				and a.statusaktif != 'Mengundurkan diri' 
        				and a.statusaktif != 'UNFIT' 
        				and $where 
        				GROUP BY a.id_biodata
        				ORDER BY a.id_biodata
        				";

        $data_pmi = $this->M_session->select($quertos);

        $html = '<option disabled selected id="pilih_pmi_default">PILIH PMI</option>';
        foreach ($data_pmi as $key => $value) {
        	$html .= '<option value="'.$value->id_biodata.'">'.$value->id_biodata.' '.$value->nama.'</option>';
        }

		$this->output->set_content_type('application/json')->set_output(json_encode($html));
	}

	function check_tipe_pmi() {
		$pmi = $this->input->post("pmi");
/*
		$cek = $this->M_session->select_row("SELECT 
        				count(*) as total 
        				FROM tblattendance a 
        				WHERE a.idblk = '$pmi'
        				");*/

        $html = '';/*
		if ( $cek->total == 0 ) {
            $html = '<option value="X">MANUAL</option>';
		} else {*/
			$html .= '<option value="I">DARI ID DISNAKER</option>';/*
			$html .= '<option value="N">TANGGAL AKHIR SEKARANG</option>';
            $html .= '<option value="D">TANGGAL AKHIR ABSEN FINGER</option>';
            $html .= '<option value="M">TANGGAL AKHIR +20 HARI</option>';*/
            $html .= '<option value="X">MANUAL</option>';
		//}

		$this->output->set_content_type('application/json')->set_output(json_encode($html));
	}

	function sertifikat_show() {
		$columns22 = array(
            'a.sektor','a.id_biodata','a.no_urut_sertifikat','b.nama','c.nama'
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
		$limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd = "where ".$where;
		}

		$cekquery = "
		SELECT a.*,b.nama as nama1,c.nama as nama2 FROM blk_sertifikat a 
		LEFT JOIN idblk b ON a.id_biodata=b.nodaftar 
		LEFT JOIN personal_nama c ON a.id_biodata=c.id_biodata  
		$where_dd order by a.id desc $limit";

		// echo $cekquery;
		// die();

		$tampil_data = $this->M_session->select($cekquery);

        
        $data2 	= array();
        $no 	= intval($_POST['start']);

	    foreach ($tampil_data as $row) {
	    	$id = substr($row->id_biodata, 0, 2);
	    	if ( $id == 'MF' || $id == 'FF' || $id == 'MI' || $id == 'FI' || $id == 'JP' ) {
	    		$nama = $row->nama2;
	    	} else {
	    		$nama = $row->nama1 !="" ? $row->nama1 : $row->nama2;
	    	}

	    	$ttdtgl = '';
	    	if ($row->tglakhir != NULL) {
	    		$stop_date = new DateTime($row->tglakhir);
				$stop_date->format('Y-m-d'); 
				$stop_date->modify('+1 day');
				$ttdtgl = $stop_date->format('Y-m-d');
	    	}

            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a class="btn btn-xs bg-orange" href="'.site_url('blk_sertifikat/cetaks/'.$row->id).'">PRINT</a> '.
                    '<a class="btn btn-xs bg-teal" href="'.site_url('blk_sertifikat/cetaksnew/'.$row->id).'">PRINT BARU</a> '.
                    '<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id.')"  >UBAH</button>',
                    $row->sektor,
                    $row->no_urut_sertifikat,
                    $row->id_biodata.'<br/>'.$nama,
                    $row->tglawal.'<br/>'.$row->tglakhir.'<br/>'.$ttdtgl
                )
            );

        }

        $resFilterLength 	= $this->M_session->select_row("SELECT count(*) as total FROM blk_sertifikat a LEFT JOIN idblk b ON a.id_biodata=b.nodaftar LEFT JOIN personal_nama c ON a.id_biodata=c.id_biodata $where_dd");
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->M_session->select_row("SELECT count(*) as total FROM blk_sertifikat a LEFT JOIN idblk b ON a.id_biodata=b.nodaftar LEFT JOIN personal_nama c ON a.id_biodata=c.id_biodata ");
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

    function add_process() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$tipe 		= $this->input->post('tipe');
		$sektor 	= $this->input->post('sektor');
		$pmi 		= $this->input->post('pmi');
		$tglawal 	= "";
		$tglakhir 	= "";
		if ( $tipe == 'N' ) {
			$tb_personal = $this->M_session->select_row("SELECT 
							a.id_biodata,
							( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) AS tgl_awal,
							CURDATE() AS tgl_akhir,
							DATE_ADD( CURDATE() , INTERVAL 1 DAY) AS tgl_ttd
	        				FROM personal a 
	        				WHERE a.id_biodata='$pmi' 
	        				");
			if ( $tb_personal != NULL ) {
				$tglawal 	= $tb_personal->tgl_awal;
				$tglakhir  	= $tb_personal->tgl_akhir;
			}
		} elseif ( $tipe == 'D' ) {
			$tb_personal = $this->M_session->select_row("SELECT 
							a.id_biodata,
							( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) AS tgl_awal,
							( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate DESC limit 1,1 ) AS tgl_akhir,
							( SELECT DATE_ADD(dteDate, INTERVAL 1 DAY) as dteDate  FROM tblattendance where idblk='$pmi' ORDER BY dteDate DESC limit 1,1 ) AS tgl_ttd
	        				FROM personal a 
	        				WHERE a.id_biodata='$pmi' 
	        				");
			if ( $tb_personal != NULL ) {
				$tglawal 	= $tb_personal->tgl_awal;
				$tglakhir  	= $tb_personal->tgl_akhir;
			}
		} elseif ( $tipe == 'M' ) {
			$tb_personal = $this->M_session->select_row("SELECT 
							a.id_biodata,
							( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) AS tgl_awal,
							DATE_ADD( ( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) , INTERVAL 20 DAY) AS tgl_akhir,
							DATE_ADD( ( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) , INTERVAL 21 DAY) AS tgl_ttd
	        				FROM personal a 
	        				WHERE a.id_biodata='$pmi' 
	        				");
			if ( $tb_personal != NULL ) {
				$tglawal 	= $tb_personal->tgl_awal;
				$tglakhir  	= $tb_personal->tgl_akhir;
			}
		} elseif ( $tipe == 'X' ) {
			$tglawal 	= $this->input->post('tglawal');
			$tglakhir 	= $this->input->post('tglakhir');
		} elseif ( $tipe == 'I' ) {
			$tb_personal = $this->M_session->select_row("SELECT 
							a.id_biodata,
							DATE_ADD( ( SELECT tglonline FROM disnaker where id_biodata='$pmi' ORDER BY id_disnaker DESC ) , INTERVAL 1 DAY) AS tgl_awal,
							DATE_ADD( ( SELECT tglonline FROM disnaker where id_biodata='$pmi' ORDER BY id_disnaker DESC ) , INTERVAL 20 DAY) AS tgl_akhir,
							DATE_ADD( ( SELECT tglonline FROM disnaker where id_biodata='$pmi' ORDER BY id_disnaker DESC ) , INTERVAL 21 DAY) AS tgl_ttd
	        				FROM personal a 
	        				WHERE a.id_biodata='$pmi' 
	        				");
			if ( $tb_personal != NULL ) {
				$tglawal 	= $tb_personal->tgl_awal;
				$tglakhir  	= $tb_personal->tgl_akhir;
			}
		}
		
		$zz34 = $this->M_session->select_row("SELECT * FROM blk_sertifikat WHERE id_biodata='$pmi' ");

		if ( $zz34 != NULL ) {
			$nomor_urut = $zz34->no_urut_sertifikat;
			$info['no_urut'] = $nomor_urut;
			$info['data'] = $zz34;
			$info['message'] = 'Data Sudah ada di List';
		} else {
			$dd = $this->M_session->select_row("SELECT no_urut_sertifikat FROM blk_sertifikat WHERE sektor='$sektor' ORDER BY no_urut_sertifikat DESC");

			if ($dd != NULL) {
				$nomor_urut = $dd->no_urut_sertifikat;
				$nomor_urut = sprintf('%04d', ($nomor_urut+1) );
			} else {
				$nomor_urut = "0001";
			}

			$data = array(
				'sektor' 				=> $sektor,
				'id_biodata' 			=> $pmi,
				'no_urut_sertifikat' 	=> $nomor_urut,
				'tipe_download' 		=> $tipe,
				'tglawal' 				=> $tglawal,
				'tglakhir' 				=> $tglakhir,
				'date_created' 			=> date('Y-m-d H:i:s'),
			);
			$chck = $this->M_session->insert_return_id($data, 'blk_sertifikat');

			if ( $chck == TRUE ) {
				$info['success'] = TRUE;
				$info['message'] = $chck;
			}
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }

    // --------------------------------------------------------------------------------------------------------

	function cetaks($id) {

		$get_batch = $this->M_session->select_row("SELECT * FROM blk_sertifikat WHERE id='$id'");
		if ($get_batch != NULL) {
			$sektorreal 	= $get_batch->sektor;
			$sektor 	= isset(explode("-", $get_batch->sektor)[1])?explode("-", $get_batch->sektor)[1]:"";
			$id_bio 	= $get_batch->id_biodata;
			$nomor_urut = $get_batch->no_urut_sertifikat;

			$tipe 	 	= $get_batch->tipe_download;
			$tglawal 	= $get_batch->tglawal;
			$tglakhir 	= $get_batch->tglakhir;
		} else {
			exit('error 1');
		}

		require_once 'assets/phpword/PHPWord.php';

		$PHPWord 	= new PHPWord();
		$document 	= $PHPWord->loadTemplate('files/sertifikat/blk_sertifikat_formal.docx');

		if ($sektor == 'F') {
			$sektor_nama = "Manufacturing";
            $firts = "Berhitung";
            $second = "Latihan Fisik";


		} elseif ($sektor == 'J') {
            $firts = "Perawatan lansia dan Pasien";
            $second = "Gizi Lansia dan Pasien";
		}
		$id_sektor = explode("-", $get_batch->sektor)[0]; 
		$dataSektor = $this->db->query("SELECT * FROM sektormajikan WHERE id='$id_sektor' ")->row();
		$daftarTugas = $this->db->query("SELECT * FROM sektortugas WHERE sektor = '$sektorreal'")->result();
		$sektor_nama = $dataSektor->nama;

		$tb_personal = $this->M_session->select_row("SELECT 
						a.id_biodata,
						a.nama,
						b.nopaspor
        				FROM personal a 
        				JOIN paspor b 
        				ON a.id_biodata = b.id_biodata 
        				WHERE b.keterangan='sudah' 
        				and a.id_biodata='$id_bio' 
        				");

		if ($tb_personal != NULL) {

			$id_exp = explode("-", $id_bio );

			$bulan_array = array(
				'01' => 'Januari',
				'02' => 'Februari',
				'03' => 'Maret',
				'04' => 'April',
				'05' => 'Mei',
				'06' => 'Juni',
				'07' => 'Juli',
				'08' => 'Agustus',
				'09' => 'September',
				'10' => 'Oktober',
				'11' => 'November',
				'12' => 'Desember'
			);

			$stop_date = new DateTime($tglakhir);
			$stop_date->format('Y-m-d'); 
			$stop_date->modify('+1 day');
			$tgl_ttd = $stop_date->format('Y-m-d');

			$tgl_awal_exp 	= explode("-", $tglawal );
			$tgl_akhir_exp 	= explode("-", $tglakhir );
			$tgl_ttd_exp 	= explode("-", $tgl_ttd );

			$tgl_awal 	= date("d", strtotime( $tglawal )).' '.$bulan_array[$tgl_awal_exp[1]].' '.date("Y", strtotime( $tglawal ));
			$tgl_akhir 	= date("d", strtotime( $tglakhir )).' '.$bulan_array[$tgl_akhir_exp[1]].' '.date("Y", strtotime( $tglakhir ));
			$tgl_ttd 	= date("d", strtotime( $tgl_ttd )).' '.$bulan_array[$tgl_ttd_exp[1]].' '.date("Y", strtotime( $tgl_ttd ));

			$document->setValue( 'z_xxxx', $nomor_urut );
			$document->setValue( 'z_m', strtoupper( $id_exp[0] ) );
			$document->setValue( 'z_nnnn', strtoupper( $id_exp[1] ) );
			$document->setValue( 'z_bb', strtoupper( date('m').date('Y') ) );
			$document->setValue( 'z_nama', strtoupper( $tb_personal->nama ) );
			$document->setValue( 'z_paspor', strtoupper( $tb_personal->nopaspor ) );
			$document->setValue( 'z_ttbb',  $tgl_ttd  );
			$document->setValue( 'z_sektor', strtoupper( $sektor_nama ) );

            foreach ($daftarTugas as $tugas){
			    $document->setValue( $tugas->kode, $tugas->text."\n" );
            }
            $nno = ['','d','e','f','g'];
            foreach ($daftarTugas as $keyno => $tugass){
                if($nno[$keyno] != ''){
                    $abc = $nno[$keyno].") ";
                    $enter= "\n";
                    if($tugass->text == ""){
                        $abc = "";
                        $enter= "";
                    }
			        $document->setValue( $tugass->kode.'s', $abc.$tugass->text.$enter );
                }else{
			        $document->setValue( $tugass->kode.'s', $tugass->text."\n" );
                }
            }
            
            

			$document->setValue( 'xxxx', $nomor_urut );
			$document->setValue( 'm', strtoupper( $id_exp[0] ) );
			$document->setValue( 'nnnn', strtoupper( $id_exp[1] ) );
			$document->setValue( 'bb', strtoupper( date('m').date('Y') ) );
			$document->setValue( 'nama', strtoupper( $tb_personal->nama ) );
			$document->setValue( 'paspor', strtoupper( $tb_personal->nopaspor ) );
			$document->setValue( 'ddmm_awal',  $tgl_awal  );
			$document->setValue( 'ddmm_akhir',  $tgl_akhir  );
			$document->setValue( 'ttbb',  $tgl_ttd  );
			$document->setValue( 'sektor',  $sektor_nama  );
		} else {
			exit('error');
		}
		
		$filename = 'Sertifikat '.$tb_personal->nama.'.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		    
		flush();
		readfile(FCPATH.$isinya);
		unlink(FCPATH.$isinya);
		exit;
	}
	function cetaksnew($id) {

		$get_batch = $this->M_session->select_row("SELECT * FROM blk_sertifikat WHERE id='$id'");
		if ($get_batch != NULL) {
			$sektorreal 	= $get_batch->sektor;
			$sektor 	= isset(explode("-", $get_batch->sektor)[1])?explode("-", $get_batch->sektor)[1]:"";
			$id_bio 	= $get_batch->id_biodata;
			$nomor_urut = $get_batch->no_urut_sertifikat;

			$tipe 	 	= $get_batch->tipe_download;
			$tglawal 	= $get_batch->tglawal;
			$tglakhir 	= $get_batch->tglakhir;
		} else {
			exit('error 1');
		}

		require_once 'assets/phpword/PHPWord.php';

		$PHPWord 	= new PHPWord();
		$document 	= $PHPWord->loadTemplate('files/sertifikat/blk_sertifikat_formal_new.docx');

		if ($sektor == 'F') {
            $firts = "Berhitung";
            $second = "Latihan Fisik";


		} elseif ($sektor == 'J') {
            $firts = "Perawatan lansia dan Pasien";
            $second = "Gizi Lansia dan Pasien";
		}
		
		$dataSektor = $this->db->query("SELECT * FROM sektormajikan WHERE sektor='$sektor' ")->row();
		$daftarTugas = $this->db->query("SELECT * FROM sektortugas WHERE sektor = '$sektorreal'")->result();
		$sektor_nama = $dataSektor->nama;

		$tb_personal = $this->M_session->select_row("SELECT 
						a.id_biodata,
						a.nama,
						b.noktp
        				FROM personal a 
        				JOIN disnaker b 
        				ON a.id_biodata = b.id_biodata 
        				WHERE a.id_biodata='$id_bio' 
        				");

		if ($tb_personal != NULL) {

			$id_exp = explode("-", $id_bio );

			$bulan_array = array(
				'01' => 'Januari',
				'02' => 'Februari',
				'03' => 'Maret',
				'04' => 'April',
				'05' => 'Mei',
				'06' => 'Juni',
				'07' => 'Juli',
				'08' => 'Agustus',
				'09' => 'September',
				'10' => 'Oktober',
				'11' => 'November',
				'12' => 'Desember'
			);

			$stop_date = new DateTime($tglakhir);
			$stop_date->format('Y-m-d'); 
			$stop_date->modify('+1 day');
			$tgl_ttd = $stop_date->format('Y-m-d');

			$tgl_awal_exp 	= explode("-", $tglawal );
			$tgl_akhir_exp 	= explode("-", $tglakhir );
			$tgl_ttd_exp 	= explode("-", $tgl_ttd );

			$tgl_awal 	= date("d", strtotime( $tglawal )).' '.$bulan_array[$tgl_awal_exp[1]].' '.date("Y", strtotime( $tglawal ));
			$tgl_akhir 	= date("d", strtotime( $tglakhir )).' '.$bulan_array[$tgl_akhir_exp[1]].' '.date("Y", strtotime( $tglakhir ));
			$tgl_ttd 	= date("d", strtotime( $tgl_ttd )).' '.$bulan_array[$tgl_ttd_exp[1]].' '.date("Y", strtotime( $tgl_ttd ));
			

			$document->setValue( 'z_xxxx', $nomor_urut );
			$document->setValue( 'z_m', strtoupper( $id_exp[0] ) );
			$document->setValue( 'z_nnnn', strtoupper( $id_exp[1] ) );
			$document->setValue( 'z_bb', strtoupper( date('m').date('Y') ) );
			$document->setValue( 'z_nama', strtoupper( $tb_personal->nama ) );
			//$document->setValue( 'z_paspor', strtoupper( $tb_personal->nopaspor ) );
			$document->setValue( 'z_paspor', strtoupper( $tb_personal->noktp ) );
			$document->setValue( 'z_ttbb',  $tgl_ttd  );
			$document->setValue( 'z_sektor', strtoupper( $sektor_nama ) );

            foreach ($daftarTugas as $tugas){
			    $document->setValue( $tugas->kode, $tugas->text."\n" );
            }
            $nno = ['','d','e','f','g'];
            foreach ($daftarTugas as $keyno => $tugass){
                if($nno[$keyno] != ''){
                    $abc = $nno[$keyno].") ";
                    $enter= "\n";
                    if($tugass->text == ""){
                        $abc = "";
                        $enter= "";
                    }
			        $document->setValue( $tugass->kode.'s', $abc.$tugass->text.$enter );
                }else{
			        $document->setValue( $tugass->kode.'s', $tugass->text."\n" );
                }
            }
/*
			$document->setValue( 'xxxx', $nomor_urut );
			$document->setValue( 'm', strtoupper( $id_exp[0] ) );
			$document->setValue( 'nnnn', strtoupper( $id_exp[1] ) );
			$document->setValue( 'bb', strtoupper( date('m').date('Y') ) );
			$document->setValue( 'nama', strtoupper( $tb_personal->nama ) );
			$document->setValue( 'paspor', strtoupper( $tb_personal->nopaspor ) );
			$document->setValue( 'ddmm_awal',  $tgl_awal  );
			$document->setValue( 'ddmm_akhir',  $tgl_akhir  );
			$document->setValue( 'ttbb',  $tgl_ttd  );
			$document->setValue( 'sektor',  $sektor_nama  );*/
		} else {
			exit('error');
		}
		
		$filename = 'Sertifikat '.$tb_personal->nama.'.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		    
		flush();
		readfile(FCPATH.$isinya);
		unlink(FCPATH.$isinya);
		exit;
	}
}