<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class invoice extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_invoice');			
	}
	
	function index($stat='d') {
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']) {
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
			$id_user = $session['session_userid'];
			$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1) {
                $qrt = "SELECT count(*) as total FROM invoice where bulan='".date('n')."' and tahun='".date('Y')."'";
				$hh = $this->M_invoice->select_row($qrt)->total;
				if ($hh == 0) {
					$data = array(
							'bulan' => date('n'),
							'tahun' => date('Y'),
							'tgl_diisi' => date('Y.m.d')
						);
					$this->M_invoice->insert($data, 'invoice');
				}
				redirect('invoice/tambah_invoice_bln/'.$stat);
			}
		}	 
	}

	function detail_data($id) {
        $qrt = "SELECT count(*) as total FROM invoice where bulan='".date('n')."' and tahun='".date('Y')."'";
		$hh = $this->M_invoice->select_row($qrt)->total;
		if ($hh == 0) {
			$data = array(
					'bulan' => date('n'),
					'tahun' => date('Y'),
					'tgl_diisi' => date('Y.m.d')
				);
			$this->M_invoice->insert($data, 'invoice');
		}

        $qrtv = "SELECT * FROM invoice where id_invoice='".$id."'";
        $data['row'] = $this->M_invoice->select_row($qrtv);
        $data['zidz'] = $id;

		$data['namamodule'] = "invoice";
		$data['namafileview'] = "datainvoice";
		echo Modules::run('template/new_admin_template', $data);
	}

	function tambah_invoice_bln() {
        $qrt = "SELECT count(*) as total FROM invoice where bulan='".date('n')."' and tahun='".date('Y')."'";
		$hh = $this->M_invoice->select_row($qrt)->total;
		if ($hh == 0) {
			$data = array(
					'bulan' => date('n'),
					'tahun' => date('Y'),
					'tgl_diisi' => date('Y.m.d')
				);
			$this->M_invoice->insert($data, 'invoice');
		}
	/*
		$tipe = "SELECT * FROM invoice_tipe";
		$data['tampil_data_tipe'] = $this->M_invoice->select($tipe);*/

		$tott = "SELECT count(*) as total FROM invoice";
		$data['total_invoice'] = $this->M_invoice->select_row($tott)->total;

		$data['namamodule'] = "invoice";
		$data['namafileview'] = "tambahinvoice";
		echo Modules::run('template/new_admin_template', $data);
	}
/*
	function simpan_data_tipe() {
		$tipe = $this->input->post('tipe');
		$data = array(
				'nama' => $tipe
			);
		$this->M_invoice->insert($data, 'invoice_tipe');
		redirect('invoice/tambah_invoice_bln/t');
	}

	function update_data_tipe() {
		$id = $this->input->post('id');
		$tipe = $this->input->post('tipe');
		$data = array(
				'nama' => $tipe
			);
		$this->M_invoice->update($data, 'invoice_tipe', $id, 'id_tipe_invoice');
		redirect('invoice/tambah_invoice_bln/t');
	}

	function hapus_data_tipe() {
		$id = $this->input->post('id');
		$tipe = $this->input->post('tipe');
		$data = array(
				'nama' => $tipe
			);
		$this->M_invoice->delete($data, 'invoice_tipe', $id, 'id_tipe_invoice');
		redirect('invoice/tambah_invoice_bln/t');
	}*/

	function simpan_invoice($tipe, $id) {
		$main = $this->input->post('tfield');
		$id   = $this->input->post('id_invoice');

		if ($tipe == 1) {
			$data = array(
				'transport' => $main
			);
		} elseif ($tipe == 2) {
			$data = array(
				'pnbp' => $main
			);
		} elseif ($tipe == 3) {
			$data = array(
				'tiket' => $main
			);
		} elseif ($tipe == 4) {
			$data = array(
				'sidik_jari' => $main
			);
		} elseif ($tipe == 5) {
			$data = array(
				'airport' => $main
			);
		} elseif ($tipe == 6) {
			$data = array(
				'foto' => $main
			);
		} elseif ($tipe == 7) {
			$data = array(
				'ujk' => $main
			);
		} elseif ($tipe == 8) {
			$data = array(
				'online' => $main
			);
		} elseif ($tipe == 9) {
			$data = array(
				'kesehatan' => $main
			);
		} elseif ($tipe == 10) {
			$data = array(
				'akomodasi' => $main
			);
		} elseif ($tipe == 11) {
			$data = array(
				'visa' => $main
			);
		} elseif ($tipe == 12) {
			$data = array(
				'konsumsi' => $main
			);
		} elseif ($tipe == 13) {
			$data = array(
				'asuransi' => $main
			);
		} elseif ($tipe == 14) {
			$data = array(
				'ins_honor' => $main
			);
		} elseif ($tipe == 15) {
			$data = array(
				'skck' => $main
			);
		} elseif ($tipe == 16) {
			$data = array(
				'ins_transport' => $main
			);
		} elseif ($tipe == 17) {
			$data = array(
				'id' => $main
			);
		} elseif ($tipe == 18) {
			$data = array(
				'buku_baju' => $main
			);
		} elseif ($tipe == 19) {
			$data = array(
				'alat_praktek' => $main
			);
		} elseif ($tipe == 20) {
			$data = array(
				'atk' => $main
			);
		} elseif ($tipe == 21) {
			$data = array(
				'fee_pl' => $main
			);
		}
		$this->M_invoice->update($data, 'invoice', $id, 'id_invoice');
		redirect('invoice/detail_data/'.$id);
	}

	function show_data() {
		$columns22 = array(
            0 => 'bulan',
            1 => 'tahun'
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
			$where_dd = "where ".$where;
		} else {
			$where_dd = "";
		}

		$vi = "SELECT * FROM invoice $where_dd order by tahun DESC, bulan DESC $limit";
		$tampil_data_invoice = $this->M_invoice->select($vi);

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_invoice as $row) {
		    $bulan = array(
                '1' => 'JANUARI',
                '2' => 'FEBRUARI',
                '3' => 'MARET',
                '4' => 'APRIL',
                '5' => 'MEI',
                '6' => 'JUNI',
                '7' => 'JULI',
                '8' => 'AGUSTUS',
                '9' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
		    );
            $no++;
            array_push($data2,
                array(
                    $no,
                    $row->tahun,
                    $bulan[$row->bulan],
                    '<a href="'.site_url('invoice/detail_data/'.$row->id_invoice).'" class="btn btn-sm bg-info-800">Detail</a>'
                )
            );
        }

        $ve = "SELECT count(*) as total FROM invoice $where_dd";
        $vo = "SELECT count(*) as total FROM invoice";;
        $recordsFiltered  	= $this->M_invoice->select_row($ve)->total;
        $recordsTotal 		= $this->M_invoice->select_row($vo)->total;

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

	function cetak_invoice($idd) {
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/invoiceperbln.docx');

		$quww 			= 'SELECT * from invoice where id_invoice="'.$idd.'"';
		$zselectionz 	= $this->M_invoice->select_row($quww);
		$row = $zselectionz;

		$tot1 = str_replace(".", "", $row->pnbp)
					+str_replace(".", "", $row->sidik_jari)
					+str_replace(".", "", $row->foto)
					+str_replace(".", "", $row->online)
					+str_replace(".", "", $row->kesehatan)
					+str_replace(".", "", $row->visa)
					+str_replace(".", "", $row->asuransi)
					+str_replace(".", "", $row->skck)
					+str_replace(".", "", $row->id);

		$tot2 = str_replace(".", "", $row->transport)
					+str_replace(".", "", $row->tiket)
					+str_replace(".", "", $row->airport)
					+str_replace(".", "", $row->ujk)
					+str_replace(".", "", $row->akomodasi)
					+str_replace(".", "", $row->konsumsi)
					+str_replace(".", "", $row->ins_honor)
					+str_replace(".", "", $row->ins_transport)
					+str_replace(".", "", $row->buku_baju)
					+str_replace(".", "", $row->alat_praktek)
					+str_replace(".", "", $row->atk);

		$tot3 = str_replace(".", "", $row->fee_pl)+$tot1+$tot2;
								
	    $document->setValue('yu1',$row->pnbp);
	    $document->setValue('yu2',$row->sidik_jari);
	    $document->setValue('yu3',$row->foto);
	    $document->setValue('yu4',$row->online);
	    $document->setValue('yu5',$row->kesehatan);
		$document->setValue('yu6',$row->visa);
		$document->setValue('yu7',$row->asuransi);
	    $document->setValue('yu8',$row->skck);
		$document->setValue('yu9',$row->id);
		$document->setValue('yu10',$row->transport);
	    $document->setValue('yu11',$row->tiket);
	    $document->setValue('yu12',$row->airport);
	    $document->setValue('yu13',$row->ujk);
	    $document->setValue('yu14',$row->akomodasi);
	    $document->setValue('yu15',$row->konsumsi);
		$document->setValue('yu16',$row->ins_honor);
		$document->setValue('yu17',$row->ins_transport);
	    $document->setValue('yu18',$row->buku_baju);
		$document->setValue('yu19',$row->alat_praktek);
		$document->setValue('yu20',$row->atk);
		$document->setValue('yu21',$row->fee_pl);

		$document->setValue('tot1',number_format($tot1, 0, "", "."));
		$document->setValue('tot2',number_format($tot2, 0, "", "."));
		$document->setValue('tot3',number_format($tot3, 0, "", "."));
		
		$filename = 'filenya.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $isinya . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink($isinya); // deletes the temporary file
		exit;
	}


}