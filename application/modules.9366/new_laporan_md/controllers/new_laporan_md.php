<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_laporan_md extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');			
	}
	
	function index() 
	{	
		$data['namamodule'] = "new_laporan_md";
		$data['namafileview'] = "index";
		echo Modules::run('template/new_admin_template', $data);
	}

	function getData()
	{
		$ambil_kepada = $this->M_session->select("SELECT * FROM datanamadisnaker");

		$option_kepada = "";
		foreach ( $ambil_kepada as $row )
		{
			$option_kepada .= '<option value="'.$row->id_namadisnaker.'">'.$row->namadisnaker.' '.$row->alamatdisnaker.'</option>';
		}

		$ambil_pmi = $this->M_session->select("SELECT admin_keadaan_tki.*,personal.nama FROM admin_keadaan_tki JOIN personal ON admin_keadaan_tki.id_biodata=personal.id_biodata order by personal.id_biodata");

		$option_pmi = "";
		foreach ( $ambil_pmi as $row )
		{
			$option_pmi .= '<option value="'.$row->id_biodata.'">'.$row->id_biodata.' '.$row->nama.'</option>';
		}

		$data = array(
			'kepada' => $option_kepada,
			'pmi' => $option_pmi,
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function table_show() 
	{
		$columns_d1 = array(
            'tanggal',
            'nomor',
            'perihal',
            'lampiran',
            'kepada',
		);

		$where_ori = ' admin_keadaan_tki_print.deleted_at = "" ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$tampil_data = $this->M_session->select("
			SELECT 
			admin_keadaan_tki_print.*,
			datanamadisnaker.namadisnaker,
			datanamadisnaker.alamatdisnaker
			FROM admin_keadaan_tki_print 
			JOIN datanamadisnaker ON admin_keadaan_tki_print.kepada=datanamadisnaker.id_namadisnaker
			$where_d1 
			order by id desc 
			$limit
		");

        $data2 	= array();
        $no 	= intval($_POST['start']);
	    foreach ($tampil_data as $row) 
	    {
	    	$pmi_exp = explode(",", $row->pmi);

	    	$datat = [];
	    	foreach ( $pmi_exp as $eed )
	    	{
	    		$ambil_nama = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$eed."'");
		    	$nama = "";
		    	if ( $ambil_nama != NULL )
		    	{
		    		$nama = $ambil_nama->nama;
		    	}
		    	$datat[] = ' -- '.$eed.' '.$nama;
	    	}

	    	$datatt = implode("<br/>", $datat);

            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a class="btn btn-xs bg-orange" target="_blank" href="'.site_url('new_laporan_md/print_pdf/'.$row->id).'">PRINT</a> '.
                    '<button type="button" class="btn btn-xs bg-info enter_button" data-id="'.$row->id.'" data-br="'.$row->br.'">ENTER</button> ',
                    $row->tanggal,
                    $row->nomor,
                    $row->lampiran,
                    $row->perihal,
                    $row->namadisnaker.' '.$row->alamatdisnaker,
                    $datatt,
                )
            );
        }

		$recordsFiltered = $this->M_session->select_count("
				admin_keadaan_tki_print 
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				admin_keadaan_tki_print 
				WHERE $where_ori
			");

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
		
		$data260998 = array (
			'tanggal' 			=> $this->input->post('tanggal'),
			'nomor' 			=> $this->input->post('nomor1').'/'.$this->input->post('nomor2').'/'.$this->input->post('nomor3').'/'.$this->input->post('nomor4'),
			'lampiran' 			=> $this->input->post('lampiran'),
			'perihal' 			=> $this->input->post('perihal'),
			'kepada' 			=> $this->input->post('kepada'),
			'pmi' 	 			=> $this->input->post('pmi'),
			'date_created' 		=> date('Y-m-d'),
			'br' 				=> 2,
		);

		$inserting = $this->M_session->insert_return_id($data260998, 'admin_keadaan_tki_print');

		if ($inserting != NULL) {
			$info['success'] = TRUE;
			$info['message'] = 'Sukses Di tambah';
			$info['id'] 	 = $inserting;
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }

    function edit_enter()
    {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

    	$id = $this->input->post('id');
    	$br = $this->input->post('br');

    	$data = array(
    		'br' => $br
    	);

    	$check = $this->M_session->update($data, "admin_keadaan_tki_print", $id, "id");

		if ($check != NULL) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses Di tambah';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

	function print_pdf($id) 
	{
		$this->load->library('Pdf');

		$get_batch = $this->M_session->select_row("
			SELECT 
			admin_keadaan_tki_print.*,
			datanamadisnaker.namadisnaker,
			datanamadisnaker.alamatdisnaker 
			FROM admin_keadaan_tki_print 
			JOIN datanamadisnaker ON admin_keadaan_tki_print.kepada=datanamadisnaker.id_namadisnaker
			WHERE id='".$id."'
		");

		$tanggal = $get_batch->tanggal;
		$nomor = $get_batch->nomor;
		$lampiran = $get_batch->lampiran;
		$perihal = $get_batch->perihal;
		$kepada = $get_batch->kepada;
		$namadisnaker = $get_batch->namadisnaker;
		$alamatdisnaker = $get_batch->alamatdisnaker;
		$pmi = $get_batch->pmi;
		$xbr = $get_batch->br;

		$totalbr = '';
		for ( $x=0; $x<$xbr; $x++ )
		{
			$totalbr .= '<br/>';
		}

		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	    $tahun 		= substr($tanggal, 0, 4);               
	    $bulan 		= substr($tanggal, 5, 2);
	    $tgl   		= substr($tanggal, 8, 2);

	    $tgna = $tgl . " " . $BulanIndo[ (int) $bulan-1 ]. " ". $tahun;

	    $pmi_exp = explode(",", $pmi);

	    $bilangan_arrays = [
	    	1 => 'satu',
	    	2 => 'dua',
	    	3 => 'tiga',
	    	4 => 'empat',
	    	5 => 'lima',
	    	6 => 'enam',
	    	7 => 'tujuh',
	    	8 => 'delapan',
	    	9 => 'sembilan',
	    	10 => 'sepuluh',
	    	11 => 'sebelas',
	    	12 => 'duabelas',
	    	13 => 'tigabelas',
	    	14 => 'empatbelas',
	    	15 => 'limabelas',
	    	16 => 'enambelas',
	    	17 => 'tujuhbelas',
	    	18 => 'delapanbelas',
	    	19 => 'sembilanbelas',
	    ];

	    $total_tki = count($pmi_exp);

	    $total_tki_bilangan = "";
	    if ( $bilangan_arrays[ $total_tki ] ) 
	    {
	    	$total_tki_bilangan = ' ('.$bilangan_arrays[ $total_tki ].')';
	    }
	    $no = 1;
	    $tampildata = "";
	    foreach ( $pmi_exp as $vall )
	    {
	    	$ambil_data_ext = $this->M_session->select_row("
	    		SELECT
	    		*,
	    		disnaker.nama as disnaker_nama,
	    		admin_keadaan_tki_pilihan.nama as keadaan_nama,
	    		admin_keadaan_tki.tanggal as keadaan_tgl
	    		FROM disnaker 
	    		LEFT JOIN paspor ON disnaker.id_biodata=paspor.id_biodata
	    		LEFT JOIN admin_keadaan_tki ON disnaker.id_biodata=admin_keadaan_tki.id_biodata 
	    		LEFT JOIN admin_keadaan_tki_pilihan ON admin_keadaan_tki.keadaan_id=admin_keadaan_tki_pilihan.id 
	    		WHERE disnaker.id_biodata = '".$vall."'
	    	");

	    	$tampildata .= "\n".'<tr>';
	    	$tampildata .= "\n\t".'<th colspan="2">'.$no.'</th>';
	    	$tampildata .= "\n\t".'<th colspan="5">'.$ambil_data_ext->nodisnaker.'</th>';
	    	$tampildata .= "\n\t".'<th colspan="7">'.$ambil_data_ext->disnaker_nama.'<br/>'.$ambil_data_ext->tempatlahir.'<br/>'.$ambil_data_ext->tanggallahir.'</th>';
	    	$tampildata .= "\n\t".'<th colspan="9">'.$ambil_data_ext->alamat.'</th>';
	    	$tampildata .= "\n\t".'<th colspan="5">'.$ambil_data_ext->nopaspor.'</th>';
	    	$tampildata .= "\n\t".'<th colspan="5">'.$ambil_data_ext->negara.'</th>';
	    	$tglkejadian = $ambil_data_ext->keadaan_tgl;
		    $tglkejadian = substr($tglkejadian, 6, 4).'-'.substr($tglkejadian, 0, 2).'-'.substr($tglkejadian, 3, 2);
	    	$tglkejadian = date("d-m-Y", strtotime($tglkejadian) );
	    	$tampildata .= "\n\t".'<th colspan="6">'.$ambil_data_ext->keadaan_nama.' tgl '.$tglkejadian.'</th>';
	    	$tampildata .= "\n".'</tr>';

	    $no++;
	    }

	    if ( $get_batch->perihal == 'Laporan TKI PT.FLAMBOYAN GEMAJASA Mengundurkan diri' )
	    {
	    	$strr1 = 'mengundurkan diri';
	    }
	    elseif ( $get_batch->perihal == 'Laporan TKI PT.FLAMBOYAN GEMAJASA Kabur/Pulang' )
	    {
	    	$strr1 = 'kabur/pulang';
	    }
		
	    // create new PDF document
	    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
	    // set document information
	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('SURAT REKOM IJIN BATCH');
	    $pdf->SetSubject('SURAT REKOMENDASI IJIN');
	    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
	    // set default header data
	    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	    $pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
	    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
	    // set header and footer fonts
	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	    // set default monospaced font
	    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
	    // set margins
	    $pdf->SetMargins(5, 10, 5);
	    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
	    // set auto page breaks
	    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
	    // set image scale factor
	    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
	    // set some language-dependent strings (optional)
	    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	        require_once(dirname(__FILE__).'/lang/eng.php');
	    	$pdf->setLanguageArray($l);
	    }   
	    $pdf->setFontSubsetting(true);   
	    $pdf->SetFont('times', '', '11', '', false);   
		$pdf->AddPage(); 
  
		// Set some content to print
	
    $html = '
    		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
    			<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>					
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18"></th> 
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor <br/>Lampiran <br>Perihal</th> 
					<th colspan="3">: <br/>: <br>:</th> 
					<th colspan="26">'.$nomor.'<br/>'.$lampiran.'<br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>		
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Kepada</th> 
					<th colspan="3"></th> 
					<th colspan="26"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>	
				<tr>
					<th colspan="4"></th> 
					<th colspan="16">Yth. '.$namadisnaker.'<br/>'.$alamatdisnaker.'<br/>di </th> 
					<th colspan="3"></th> 
					<th colspan="26"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="4"></th> 
					<th colspan="6">Tempat</th> 
					<th colspan="26"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="16">Dengan hormat,</th> 
					<th colspan="3"></th> 
					<th colspan="26"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="53">Dengan ini kami mengajukan Laporan CTKI PT. FLAMBOYAN GEMAJASA yang '.$strr1.' untuk '.$total_tki.$total_tki_bilangan.' orang dengan data-data sebagai berikut :</th>
				</tr>						
			</table>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
			 	<tr>
			 		<th colspan="2" align="center" valign="middle">No</th>
			 		<th colspan="5" align="center" valign="middle">No ID</th>
			 		<th colspan="7" align="center" valign="middle">Nama CTKI,<br/>Tempat dan<br/>Tgl Lahir</th>
			 		<th colspan="9" align="center" valign="middle">Alamat</th>
			 		<th colspan="5" align="center" valign="middle">No Paspor</th>
			 		<th colspan="5" align="center" valign="middle">Negara Tujuan</th>
			 		<th colspan="6" align="center" valign="middle">Keterangan</th>
			 	</tr>
			 	'.$tampildata.'
			</table>
    		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
    			<tr>
					<th colspan="4"></th> 
					<th colspan="53">Untuk itu kami mohom dilakukan :</th>
				</tr>
				<tr>
					<th colspan="4"></th>
					<th colspan="2"></th>
					<th colspan="48">1. Pencabutan ID untuk CTKI yang '.$strr1.'</th>
				</tr>
				<tr>
					<th colspan="4"></th>
					<th colspan="2"></th>
					<th colspan="48">2. Untuk TKI yang kabur di Taiwan adalah bila terjadi sesuatu dikemudian hari, adalah diluar </th>
				</tr>
				<tr>
					<th colspan="4"></th>
					<th colspan="3"></th>
					<th colspan="48"> tanggung jawab dari PT. FLAMBOYAN GEMAJASA</th>
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th>
					<th colspan="53">Demikian surat laporan ini kami buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</th>
				</tr>
				'.$totalbr.'
				<tr>
					<th colspan="4"></th>
					<th colspan="27"></th>
					<th colspan="30">Malang, '.$tgna.'</th>
				</tr>
				<tr>
					<th colspan="4"></th>
					<th colspan="27"></th>
					<th colspan="30">PT.FLAMBOYAN GEMAJASA</th>
				</tr>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<tr>
					<th colspan="4"></th>
					<th colspan="27"></th>
					<th colspan="30"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
				</tr>
			</table>

	';
			 /*
			 <br/>
			 <br/>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" > Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br>
								
			 </table>
			 <br><br>
			  <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">IMMANUEL DARMAWAN SANTOSO</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI LAWANG-MALANG</th> 
				</tr>
				<br>
				<tr>
					<th colspan="6"></th> 
					<th colspan="32">dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<br>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Tempat Tanggal Lahir</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Calon Tenaga Kerja Indonesia (CTKI)</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$alamat.'</th> 
				</tr>
				<br>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk Pengurusan Ijin sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan. </th> 
				</tr>
				<br>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</th> 
				</tr>
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>											
			 </table>
			 <br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><b>Direktur Utama</b></th> 
					</tr>						
			 </table>
			  <br pagebreak="true">

			   <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>

					
			 </table><br><br>
      <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">'.$daerah.', '.$tglnya.'</th> 
				</tr>
				<br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br>Perihal</th> 
					<th colspan="3">: <br>:</th> 
					<th colspan="16">'.$lampiran.' <br>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="25">YTH.'.$kepada.' <br>Di tempat.</th> 
				</tr>

				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
											
			 </table>
			<table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32"  style="text-align:justify" >Dengan ini kami mengajukan permohonan kepada Bapak untuk diterbitkan permohonan Perjanjian Penempatan Calon TKI sebanyak 1 ( Satu ) orang  orang untuk Negara tujuan:</th> 
				</tr>	
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>	
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Hongkong</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"></th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Malaysia</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> </th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Singapura</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> </th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Taiwan</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> 1 </th> 
					<th colspan="8" > orang</th> 
				</tr>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" ></th> 
					<th colspan="2" ></th>
					<th colspan="8" >__________________</th> 
					<th colspan="8" > </th> 
				</tr>			
				<br>
				<tr> 
					<th colspan="12" ></th> 
					<th align="right" colspan="10" >JUMLAH</th> 
					<th colspan="2" >:</th>
					<th colspan="8" align="center">1</th>  
					<th colspan="8" > orang</th> 
				</tr>				
				<br>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30"  style="text-align:justify">Daftar nominasi terlampir. <br>Rekom Paspor tersebut kami mohon ditujukan kepada '.$imigrasi.'.</th>
				</tr>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30" >Demikian atas bantuan Bapak, kami sampaikan terima kasih</th>
				</tr>							
			 </table>
			 <br><br><br><br><br><br>
			  <table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr><br><br><br><br>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u></th> 

				</tr>
				<tr>
				<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
				<th colspan="24" align="center"><b>Direktur Utama</b></th> 
					</tr>						
			 </table><br><br>

			';*/

    	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		$pdf->Output('SURAT REKOM IJIN TANGGAL .pdf', 'I'); 
 
			
    }        






    function edit_show() {
    	$id = $this->input->post('id');

    	$data = $this->M_session->select_row(" SELECT * FROM surat_rekom_ijin_batch WHERE id='$id' ");

    	$tki_exp = explode(",", $data->tki);
    	$tki_final = array();
    	foreach ( $tki_exp as $row ) {
    		$tki_final[] = $row;
    	}

    	$data2 = array (
    		'tipe' => $data->tipe,
    		'tgl' => $data->tgl,
    		'tki' => $tki_final
    	);
    
    	$this->output->set_content_type('application/json')->set_output(json_encode( $data2 ));
    }       

    function edit_process($id) {
		$validasi = array(
			array('field'=>'select_nama','label'=>'1','rules'=>'required'),
			array('field'=>'tgl','label'=>'2','rules'=>'required'),
			array('field'=>'pilih_tipe','label'=>'3','rules'=>'required'),
		);
		$this->form_validation->set_rules($validasi);
		if ($this->form_validation->run()===FALSE) {
			$info['success'] = FALSE;
			$info['message'] = validation_errors();
		} else {
			$info['success'] = FALSE;
			$info['message'] = 'Terjadi Kesalahan';

			$query = $this->M_session->select_row("SELECT * FROM surat_rekom_ijin_batch where id='$id'");

			$data = array (
			    'date_modified' => date("Y-m-d H:i:s"),
			    'table' 		=> 'surat_rekom_ijin_batch',
			    'datafield' 	=> implode(',.|', array_keys( (array) $query) ),
			    'datavalue' 	=> implode(',.|',(array) $query ),
	            'source_id' 	=> $id
			);

			$cek = $this->M_session->insert($data, "_editrecords");

			if ($cek == TRUE) {

				$namalee 	= $this->input->post('select_nama');
				$tglll 		= $this->input->post('tgl');
				$tipe 		= $this->input->post('pilih_tipe');
				
				$data260998 = array (
					'tki' 			=> $namalee,
					'tgl' 			=> $tglll,
					'tipe' 			=> $tipe,
					'date_modified' => date('Y-m-d')
				);

				$inserting = $this->M_session->update( $data260998, 'surat_rekom_ijin_batch', $id, 'id' );
				if ($inserting == TRUE) {
					$info['success'] = TRUE;
					$info['message'] = 'Berhasil...';
				}
			}
		}
    
    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }                                    

}