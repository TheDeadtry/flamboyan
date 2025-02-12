<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class surat_pengajuan_keuangan extends MX_Controller {
	
	public function __construct(){
            parent::__construct();
			$this->load->model('Tmp');			
			$this->load->model('M_session');			
			$this->load->model('m_surat_pengajuan_keuangan');			
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
				$data['namamodule'] = "surat_pengajuan_keuangan";
				$data['namafileview'] = "surat";
				echo Modules::run('template/new_admin_template', $data);
			}
		}	 
	}
	
	function detail($kod){
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
				/* $love = "
				SELECT a.* 
				FROM personal a 
				JOIN majikan b 
				ON a.id_biodata=b.id_biodata 
				JOIN disnaker c 
				ON a.id_biodata=c.id_biodata 
				JOIN paspor d 
				ON a.id_biodata=d.id_biodata 
				where b.kode_agen!=0
				order by id_biodata";
				*/

				$love = "
				SELECT a.id_biodata, a.nama
                FROM personal a 
                LEFT JOIN (
                SELECT id_biodata, kode_agen FROM majikan GROUP BY id_biodata
                ) b 
                ON a.id_biodata=b.id_biodata 
                where b.kode_agen!=0
                order by id_biodata
				";
				
				$data['tampil_data_ctki'] = $this->m_surat_pengajuan_keuangan->select($love);
				$data['kode'] = $kod;

				$data['namamodule'] = "surat_pengajuan_keuangan";
				$data['namafileview'] = "lembaga";
				echo Modules::run('template/new_admin_template', $data);
			}
		}	 
	}

	function simpan_pengajuan() {
		$this->m_surat_pengajuan_keuangan->simpan_pengajuan();
		redirect('surat_pengajuan_keuangan/');
	}

	function ubah_pengajuan() {
		$this->m_surat_pengajuan_keuangan->ubah_pengajuan();
		redirect('surat_pengajuan_keuangan/');
	}

	function hapus_pengajuan() {
		$this->m_surat_pengajuan_keuangan->hapus_pengajuan();
		redirect('surat_pengajuan_keuangan/');
	}

	function simpan_data_ctki($kode) {
    	$ctki 		= $this->input->post('dctki');
    	$pinjam 	= $this->input->post('pinjam');
    	$loan 		= $this->input->post('loan');
    	$div 		= array();
    	
		for ($x=0; $x<count($ctki); $x++) {
			$div[] = array (
    		'id_biodata' => $ctki[$x],
    		'jumlah_pinjaman' => $pinjam[$x],
    		'loan' => $loan[$x],
    		'aju_id' => $kode
    		);
		}

		$this->m_surat_pengajuan_keuangan->simpan_dctki($div);
		redirect('surat_pengajuan_keuangan/detail/'.$kode);
	}

	function update_pengajuan_data($kode) {
		$this->m_surat_pengajuan_keuangan->ubah_dctki();
		redirect('surat_pengajuan_keuangan/detail/'.$kode);
	}

	function hapus_pengajuan_data($kode) {
		$this->m_surat_pengajuan_keuangan->hapus_dctki();
		redirect('surat_pengajuan_keuangan/detail/'.$kode);
	}

	function show_datax() {
		$request = '$_POST';

		$columns22 = array(
            0 => 'no_surat',
            1 => 'tanggal'
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

		$querrr = "SELECT * FROM surat_pengajuan $where_dd order by id_surat_aju DESC $limit";
		$tampil_data_pengajuan= $this->m_surat_pengajuan_keuangan->select($querrr);

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_pengajuan as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit" onclick=edit666('.$row->id_surat_aju.') >
                        <span>Edit</span>
                    </a>  
                    <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus'.$no.'">
                        <span>Hapus</span>
                    </a> 
                    <a href="'.site_url('surat_pengajuan_keuangan/detail/'.$row->id_surat_aju).'" class="btn btn-mini btn-success">
                        <span>Tampil CTKI</span>
                    </a>
                    <a href="'.site_url('surat_pengajuan_keuangan/printxls_test/'.$row->id_surat_aju).'" class="btn btn-mini btn-success">
                        <span>Print .Xls</span>
                    </a>',
                    $row->pptkis,
                    $row->lembaga,
                    $row->no_surat,
                    $row->tanggal.'
                    
                    <div class="modal fade" id="hapus'.$no.'" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('surat_pengajuan_keuangan/hapus_pengajuan/').'">
                                    <div class="modal-header bg-purple-400">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                        <h4 class="modal-title">Hapus Data Sponsor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_pengajuan" value="'.$row->id_surat_aju.'">
                                        <p>Apakah anda yakin akan menghapus data Sponsor ini? : '.$row->no_surat.'</p>
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

              
		$bolvia = "SELECT count(*) as total FROM surat_pengajuan $where_dd";
        $resFilterLength 	= $this->m_surat_pengajuan_keuangan->select_row($bolvia);
        $recordsFiltered 	= $resFilterLength->total;

		$rt = "SELECT count(*) as total FROM surat_pengajuan";
        $resTotalLength 	=  $this->m_surat_pengajuan_keuangan->select_row($rt);
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

   	function edit_show() {
		$id = $this->input->post('id');

		$querys = "SELECT * FROM surat_pengajuan where id_surat_aju='".$id."'";
		$data = $this->m_surat_pengajuan_keuangan->select_row($querys);

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
   	}

	function show_dctkix($kodd) {
		$request = '$_POST';

		$columns22 = array(
            0 => 'surat_pengajuan_data.id_biodata',
            1 => 'surat_pengajuan_data.jumlah_pinjaman',
            2 => 'surat_pengajuan_data.loan'
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
			$where_dd = "where aju_id='".$kodd."' and ".$where;
		} else {
			$where_dd = "where aju_id='".$kodd."'";
		}

		$querrr = "SELECT surat_pengajuan_data.*,personal.nama FROM surat_pengajuan_data LEFT JOIN personal ON surat_pengajuan_data.id_biodata=personal.id_biodata $where_dd order by id_surat_pengajuan_data DESC $limit";
		$tampil_data_pengajuan= $this->m_surat_pengajuan_keuangan->select($querrr);

		$love = "SELECT * FROM personal where statterbang is null order by id_biodata";
		$tampil_data_ctki = $this->m_surat_pengajuan_keuangan->select($love);

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_pengajuan as $row) {
	        $rawz = "";
	        foreach ($tampil_data_ctki as $key) {
	            $rawz = $rawz.' <option value="'.$key->id_biodata.'">'.$key->id_biodata.' - '.$key->nama.'</option>';
	        }
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit'.$no.'">
                        <span>Edit</span>
                    </a>  
                    <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus'.$no.'">
                        <span>Hapus</span>
                    </a>',
                    $row->id_biodata,
                    $row->nama,
                    $row->jumlah_pinjaman,
                    $row->loan.
                    '<div class="modal fade" id="edit'.$no.'" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-slate-400">
                                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                                    <h3>Ubah Surat Pengajuan</h3>
                                </div>  
                                <form class="form-horizontal" method="post" action="'.site_url('surat_pengajuan_keuangan/update_pengajuan_data/'.$row->aju_id).'">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_dctki" value="'.$row->id_surat_pengajuan_data.'">

                                        <div class="form-group">
	                                        <div class="row">
	                                            <label class="col-lg-12 control-label">Id Biodata </label>
	                                            <div class="col-lg-12">
                                                    <select class="form-control" name="dctki">
                                                        <option value="'.$row->id_biodata.'">'.$row->id_biodata.' - '.$row->nama.'</option>
                                                        '.$rawz.'
                                                    </select>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <div class="row">
	                                            <label class="col-lg-12 control-label">Jumlah Pinjaman </label>
                                                <div class="col-lg-12">
                                                    <input type="text" name="pinjam" class="form-control" value="'.$row->jumlah_pinjaman.'" placeholder=" EX : 13.675.000 + 8JT">
                                                </div>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                        <div class="row">
	                                            <label class="col-lg-12 control-label">Angsuran </label>
                                                <div class="col-lg-12">
                                                    <input type="text" name="loan" class="form-control" placeholder=" EX : 9" value="'.$row->loan.'">
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
                    </div>
                    '.'
                    <div class="modal fade" id="hapus'.$no.'" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" method="post" action="'.site_url('surat_pengajuan_keuangan/hapus_pengajuan_data/'.$row->aju_id).'">
                                    <div class="modal-header bg-purple-400">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                        <h4 class="modal-title">Hapus Data Sponsor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_dctki" value="'.$row->id_surat_pengajuan_data.'">
                                        <p>Apakah anda yakin akan menghapus data Sponsor ini? : '.$row->id_biodata.'</p>
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

              
		$bolvia = "SELECT count(*) as total FROM surat_pengajuan_data LEFT JOIN personal ON surat_pengajuan_data.id_biodata=personal.id_biodata $where_dd";
        $resFilterLength 	= $this->m_surat_pengajuan_keuangan->select_row($bolvia);
        $recordsFiltered 	= $resFilterLength->total;

		$rt = "SELECT count(*) as total FROM surat_pengajuan_data LEFT JOIN personal ON surat_pengajuan_data.id_biodata=personal.id_biodata where aju_id='".$kodd."'";
        $resTotalLength 	=  $this->m_surat_pengajuan_keuangan->select_row($rt);
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
	
	function get_nilaikreditbank($id=""){
	   echo json_encode(
	    $this->db->query("
	        SELECT * FROM nilaikreditbank where id_biodata = '$id'
	    ")->row()
	   );
	}
	
	function printxls_test($id){
	    ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
	    $yet = "SELECT 
    			'={no} - 8' no,
    			dis.nodisnaker as vid,
    			b.notelp hp,
    			ds.bank status,
    			b.warganegara negara,
    			e.nodisnaker as id,
    			e.nama as nama,
    	        IF(d.nama IS NULL, d.namamajikan, d.nama ) majikan,
    			c.nopaspor as paspor,
    			e.negara as negara,
    			f.nama as agen,
    			a.jumlah_pinjaman as pinjaman,
    			a.loan as `load`,
    	        fa.nama_ibu as ibu
			FROM surat_pengajuan_data a
			LEFT JOIN personal b
			ON a.id_biodata=b.id_biodata
			LEFT JOIN paspor c
			ON a.id_biodata=c.id_biodata
			LEFT JOIN (
			    SELECT m.kode_majikan, m.kode_agen, m.id_biodata, d.nama, m.namamajikan FROM majikan m
                LEFT JOIN datamajikan d ON d.id_majikan = m.kode_majikan
			) d
			ON a.id_biodata = d.id_biodata
			LEFT JOIN disnaker e
			ON a.id_biodata=e.id_biodata
			LEFT JOIN dataagen f
			ON d.kode_agen=f.id_agen
	        LEFT JOIN family fa ON fa.id_biodata = b.id_biodata
	        LEFT JOIN disnaker dis ON dis.id_biodata = b.id_biodata
	        LEFT JOIN datasektor ds ON ds.kode_jenis = substring_index( b.id_biodata,'-',1)
			where a.aju_id='".$id."'
			";
			
			$hy = "SELECT * FROM surat_pengajuan where id_surat_aju='".$id."'";
			$dw = $this->m_surat_pengajuan_keuangan->select_row($hy);
// 			echo($yet);

			$dew = $this->m_surat_pengajuan_keuangan->select($yet);
			$excel = new Tmp(9, APPPATH."excel/pengajuan-pinjaman.xlsx", "pengajuan-pinjaman.xlsx");
			setlocale(LC_TIME, 'id_ID');
            $excel->excel([$dew], [
                [
                    ['name'=>'tgl', 'type'=>'single', 'value' => date('d-m-Y', strtotime( str_replace(".","-", $dw->tanggal) ))],
                    ['name'=>'tgl2', 'type'=>'single', 'value' => strftime('%d %B %Y', strtotime( str_replace(".","-", $dw->tanggal) ))],
                    ['name'=>'bank', 'type'=>'single', 'value' => $dw->lembaga],
                    ['name'=>'no'],
                    ['name'=>'vid'],
                    ['name'=>'nama'],
                    ['name'=>'paspor'],
                    ['name'=>'agen'],
                    ['name'=>'pinjaman'],
                    ['name'=>'majikan'],
                    ['name'=>'load'],
                    ['name'=>'ibu'],
                    ['name'=>'hp'],
                    ['name'=>'negara'],
                    ['name'=>'status'],
                ]
            ]);
	}

	function printxls($id) {
			$yet = "SELECT 
			b.id_biodata as vid,
			e.nodisnaker as id,
			e.nama as nama,
			c.nopaspor as paspor,
			e.negara as negara,
			f.nama as agen,
			a.jumlah_pinjaman as pinjam,
			a.loan as loan
			FROM surat_pengajuan_data a
			LEFT JOIN personal b
			ON a.id_biodata=b.id_biodata
			LEFT JOIN paspor c
			ON a.id_biodata=c.id_biodata
			LEFT JOIN majikan d
			ON a.id_biodata=d.id_biodata
			LEFT JOIN disnaker e
			ON a.id_biodata=e.id_biodata
			LEFT JOIN dataagen f
			ON d.kode_agen=f.id_agen
			where a.aju_id='".$id."'
			";

			$dew = $this->m_surat_pengajuan_keuangan->select($yet);

			$hy = "SELECT * FROM surat_pengajuan where id_surat_aju='".$id."'";
			$dw = $this->m_surat_pengajuan_keuangan->select_row($hy);

            $this->load->library("PHPExcel");
 
            //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

            // ------------------------------------------------------------
			$objReader = PHPExcel_IOFactory::createReader('Excel5');
			$objPHPExcel = $objReader->load("files/pengajuan_bank.xls");

	    	$data 		= array();
	    	
	    	foreach ($dew as $tt) {
	    		$brt = substr($tt->vid, 1,1);
				$statt = '';
	    		if ($brt == 'F') {
	    			$statt = 'FORMAL';
	    		} elseif ($brt == 'I' || $brt == 'P') {
	    			$statt = 'INFORMAL';
	    		}
				$data[] = array (
	    		'idbio' => $tt->id,
	    		'nama' => $tt->nama,
	    		'paspor' => $tt->paspor,
	    		'negara' => $tt->negara,
	    		'majikan' => '',
	    		'agen' => $tt->agen,
	    		'status' => $statt,
	    		'pinjam' => $tt->pinjam,
	    		'loan' => $tt->loan);
	    	}

			$baseRow = 12;
			foreach($data as $r => $dataRow) {
				$row = $baseRow + $r;
				$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

				$objPHPExcel->getActiveSheet()
					->setCellValue('A'.$row, $r+1)
				    ->setCellValue('B'.$row, $dataRow['idbio'])
				    ->setCellValue('C'.$row, $dataRow['nama'])
				    ->setCellValue('D'.$row, $dataRow['paspor'])
				    ->setCellValue('E'.$row, $dataRow['negara'])
				    ->setCellValue('F'.$row, $dataRow['majikan'])
				    ->setCellValue('G'.$row, $dataRow['agen'])
				    ->setCellValue('H'.$row, $dataRow['status'])
				    ->setCellValue('I'.$row, $dataRow['pinjam'])
				    ->setCellValue('J'.$row, $dataRow['loan']);
			}

            $objPHPExcel->getActiveSheet()->setCellValue('A4', 'PPTKIS      : '.$dw->pptkis);
            $objPHPExcel->getActiveSheet()->setCellValue('A5', 'Lembaga  : '.$dw->lembaga);
            $objPHPExcel->getActiveSheet()->setCellValue('A6', 'No. Surat   : '.$dw->no_surat);
            $objPHPExcel->getActiveSheet()->setCellValue('A7', 'Tanggal     : '.$dw->tanggal);

			$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

			//$objWriter->save(str_replace('.php', '.xls', __FILE__));
            //sesuaikan headernya 

            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="hasilExcel.xls"');
            //unduh file
            $objWriter->save("php://output");

	}
	
}