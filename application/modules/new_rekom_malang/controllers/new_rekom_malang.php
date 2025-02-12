<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_rekom_malang extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');			
	}
	
	function index() 
	{	
		$data['ambil_nama'] = $this->M_session->select("SELECT distinct(a.tki) as idbio, b.nama FROM pembuatan_paspor_malang_print a JOIN disnaker b ON a.tki=b.id_biodata ORDER BY idbio DESC");

		$data['namamodule'] = "new_rekom_malang";
		$data['namafileview'] = "index";
		echo Modules::run('template/new_admin_template', $data);
	}

	function getData()
	{

		$ambil_tki = $this->M_session->select("SELECT * FROM disnaker order by disnaker.id_biodata");

		$option_tki = "";
		foreach ( $ambil_tki as $row )
		{
			$option_tki .= '<option value="'.$row->id_biodata.'">'.$row->id_biodata.' '.$row->nama.'</option>';
		}

		$data = array(
			'tki' => $option_tki,
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function table_show() 
	{
		$columns_d1 = array(
            'tanggal',
            'nomor',
		);

		// $where_ori = ' pembuatan_paspor_malang_print.deleted_at = "" ';
		 $where_d1 = datatable_where( $columns_d1, $_POST['search']['value']
		//  , $where_ori
		 );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$tampil_data = $this->M_session->select("
			SELECT *
			FROM pembuatan_paspor_malang_print WHERE softDelete!='1'
			order by id_pembuatan desc 
			$limit
		");

        $data2 	= array();
        $no 	= intval($_POST['start']);
	    foreach ($tampil_data as $row) 
	    {
	    	$tki_exp = explode(",", $row->tki);

	    	$datat = [];
	    	foreach ( $tki_exp as $eed )
	    	{
	    		$ambil_nama = $this->M_session->select_row("SELECT * FROM disnaker WHERE id_biodata='".$eed."'");
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
					'<a class="btn btn-xs bg-orange" href="'.site_url('new_rekom_malang/print_pdf/'.$row->id_pembuatan).'">PRINT</a> 
					<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id_pembuatan.')"  >Edit</button>
					<button data-id="'.$row->id_pembuatan.'" class="btn btn-danger btn-xs deletedata">Delete</button>',
                    $row->tanggal,
                    $row->nomor,
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
			'tki' 	 			=> $this->input->post('tki'),
		);

		$inserting = $this->M_session->insert_return_id($data260998, 'pembuatan_paspor_malang_print');

		if ($inserting != NULL) {
			$info['success'] = TRUE;
			$info['message'] = 'Sukses Di tambah';
			$info['id'] 	 = $inserting;
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

    public function hapus()
    {
		
		
		$id = $_POST['myid'];
        $hapus = $this->db->query("UPDATE pembuatan_paspor_malang_print SET softDelete = '1' WHERE pembuatan_paspor_malang_print.id_pembuatan ='$id'");
        if ($hapus) {
            echo "dihapus";   
		}
		else {
			echo "tidak terhapus";
		}
    }

	function print_pdf($id) 
	{
		$this->load->library('Pdf');

		$get_batch = $this->M_session->select_row("
			SELECT 
			*
			FROM pembuatan_paspor_malang_print 
			WHERE id_pembuatan='".$id."'
		");

		$tanggal = $get_batch->tanggal;
		$nomor = $get_batch->nomor;
		$tki = $get_batch->tki;
		$tanggal =date('d-m-Y');


		// $totalbr = '';
		// for ( $x=0; $x<$xbr; $x++ )
		// {
		// 	$totalbr .= '<br/>';
		// }

		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	    $tahun 		= substr($tanggal, 0, 4);
	    $bulan 		= substr($tanggal, 5, 2);
	    $tgl   		= substr($tanggal, 8, 2);

	    $tgna = $tgl . " " . $BulanIndo[ (int) $bulan-1 ]. " ". $tahun;

	    $tki_exp = explode(",", $tki);

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

	    $total_tki = count($tki_exp);

	    $total_tki_bilangan = "";
	    if ( $bilangan_arrays[ $total_tki ] ) 
	    {
	    	$total_tki_bilangan = ' ('.$bilangan_arrays[ $total_tki ].')';
		}

	    $no = 1;
	    $tampildata = "";
	    foreach ( $tki_exp as $vall )
	    {
	    	$ambil_data_ext = $this->M_session->select_row("
	    		SELECT
	    		*,
	    		disnaker.nama as disnaker_nama,
	    		disnaker.jeniskelamin as disnaker_jk,
	    		disnaker.tanggallahir as disnaker_tl,
	    		disnaker.tempatlahir as disnaker_t,
	    		disnaker.alamat as disnaker_alamat,
	    		disnaker.negara as disnaker_tujuan
	    		FROM disnaker 
	    		LEFT JOIN pembuatan_paspor_malang_print ON disnaker.id_biodata=pembuatan_paspor_malang_print.tki
	    		WHERE disnaker.id_biodata = '".$vall."'
				" 
	    	);
			
			$originalDate4 	= str_replace('.','-',$ambil_data_ext->disnaker_tl);
			$disnaker_tl 	= date("d-m-Y", strtotime($originalDate4));
	    	$tampildata .= "\n".'<tr>';
	    	$tampildata .= "\n\t".'<th style="font-size: 12px;" colspan="2">'.$no.'</th>';
	    	$tampildata .= "\n\t".'<th style="font-size: 12px;" colspan="7">'.$ambil_data_ext->disnaker_nama.'</th>';
	    	$tampildata .= "\n\t".'<th style="font-size: 12px;" colspan="4">'.$ambil_data_ext->disnaker_jk.'</th>';
	    	$tampildata .= "\n\t".'<th style="font-size: 12px;" colspan="6">'.$ambil_data_ext->disnaker_t.'<br/>'.$disnaker_tl.'</th>';
	    	$tampildata .= "\n\t".'<th style="font-size: 12px;" colspan="12">'.$ambil_data_ext->disnaker_alamat.'</th>';
	    	$tampildata .= "\n\t".'<th style="font-size: 12px;" colspan="5">'.$ambil_data_ext->disnaker_tujuan.'</th>';
	    	$tampildata .= "\n".'</tr>';

	    $no++;
	    }

	    // if ( $get_batch->perihal == 'Laporan TKI PT.FLAMBOYAN GEMAJASA Mengundurkan diri' )
	    // {
	    // 	$strr1 = 'mengundurkan diri';
	    // }
	    // elseif ( $get_batch->perihal == 'Laporan TKI PT.FLAMBOYAN GEMAJASA Kabur/Pulang' )
	    // {
	    // 	$strr1 = 'kabur/pulang';
	    // }
		
		
	    // create new PDF document
	    $pdf = new TCPDF('P', PDF_UNIT, 'F4', true, 'UTF-8', false);
	    // set document information
	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('SURAT REKOM PASPOR MALANG');
	    $pdf->SetSubject('SURAT REKOMENDASI PASPOR');
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
		$html = '<br><br><br><br><br><br><br>
		<table align="left" width="100%" cellspacing="0" cellpadding="0">				
					<tr>
						<th colspan="4"></th> 
						<th colspan="8"></th> 
						<th colspan="3"></th> 
						<th colspan="16"></th> 
						<th colspan="8"></th> 
						<th colspan="8"></th> 
						<th colspan="18">Lawang, '.$tanggal.'</th> 
					</tr>
					<br>
					<tr>
						<th colspan="4"></th> 
						<th colspan="8">Nomor</th> 
						<th colspan="2">:</th> 
						<th colspan="18">'.$nomor.'</th> 
					</tr>
					<tr>
						<th colspan="4"></th> 
						<th colspan="8">Lampiran <br>Perihal</th> 
						<th colspan="2">: <br>:</th> 
						<th colspan="16"> - <br><b><u>Permohonan Paspor CTKI</u></b></th>
					</tr>
					<br>
					<tr>
					<th colspan="4"></th> 
					<th colspan="22">Kepada YTH.<br>Bapak Kepala Imigrasi Kelas I Malang<br>Di Malang</th>
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
				<table align="left" margin-right="500px;" width="95%" cellspacing="0" cellpadding="2" border="0">
				
				<tr> 
				<th colspan="2" > </th> 
				<th colspan="34" >-Sehubungan dengan akan- dipasporkannya Calon Tenaga Indonesia (TKI) dari PT.FLAMBOYAN GEMAJASA sejumlah '.$total_tki.' orang maka bersama ini kami mohon kepada Bapak untuk memberi kelancaran dalam proses pembuatan paspor.  Adapun nama-nama Calon TKI tersebut di bawah ini.</th> 
				</tr>		
				</table>
				<br>
				<br>
				<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
					<tr>
						<th colspan="2">No</th> 
						<th colspan="7">Nama</th> 
						<th colspan="4">Jenis Kelamin</th> 
						<th colspan="6">Tempat Tanggal Lahir</th> 
						<th colspan="12">Alamat</th> 
						<th colspan="5">Tujuan</th> 
					</tr>
					'.$tampildata.'
					<br/>
				</table>
				<br><br>
				<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
					<tr> 
						<th colspan="2"></th>
						<th colspan="28">Demikian permohonan kami, atas perhatian dan bantuannya kami sampaikan terima kasih. </th>
					</tr>
				</table>
				<br><br>
				<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
					<tr> 
						<th colspan="2"></th>
						<th colspan="28">Hormat kami,<br>
						PT. FLAMBOYAN GEMAJASA
						</th>
					</tr>
					
				<br><br><br><br>
					<tr>
						<th colspan="2"></th>
						<th colspan="28"><b><u>IMMANUEL DARMAWAN SANTOSO</u></b><br>
						Direktur Utama 
						</th>
					</tr>
				</table>
				<br><br><br>
				<br pagebreak="true">
				
				<table align="left" width="100%" cellspacing="0" cellpadding="1" border="0">
							<tr>
								<th colspan="4"></th> 
								<th colspan="8"></th> 
								<th colspan="3"></th> 
								<th colspan="16"></th> 
								<th colspan="8"></th> 
								<th colspan="8"></th> 
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
							<tr>
								<th colspan="4"></th> 
								<th colspan="8"></th> 
								<th colspan="3"></th> 
								<th colspan="16"></th> 
								<th colspan="8"></th> 
								<th colspan="8"></th> 
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
							<br><br>
							<tr>
								<th colspan="4"></th> 
								<th colspan="8"></th> 
								<th colspan="3"></th> 
								<th colspan="10"></th> 
								<th colspan="14" align="center"><u>SURAT KUASA</u></th>
								<th colspan="8"></th> 
								<th colspan="18"></th> 
							</tr>	
							<tr>
								<th colspan="4"></th> 
								<th colspan="8"></th> 
								<th colspan="3"></th> 
								<th colspan="10"></th> 
								<th colspan="14" align="center">'.$nomor.'</th>
								<th colspan="8"></th> 
								<th colspan="18"></th> 
							</tr>
							<br>
							<tr>
								<th colspan="4"></th> 
								<th colspan="20">Yang bertanda tangan di bawah ini</th> 
								<th colspan="2"></th> 
								<th colspan="8"></th> 
							</tr>
							<tr>
								<th colspan="4"></th> 
								<th colspan="4"></th> 
								<th colspan="15">Nama</th> 
								<th colspan="2">: </th> 
								<th colspan="28">IMMANUEL DARMAWAN SANTOSO</th> 
							</tr>
							<tr>
								<th colspan="4"></th> 
								<th colspan="4"></th> 
								<th colspan="15">Pekerjaan/Jabatan</th> 
								<th colspan="2">: </th> 
								<th colspan="28">Direktur Utama PT. Flamboyan Gemajasa</th> 
							</tr>
							<tr> 
								<th colspan="4"></th> 
								<th colspan="4"></th> 
								<th colspan="15">Alamat</th> 
								<th colspan="2">: </th> 
								<th colspan="28">Jl. Inspektur Suwoto No.95B RT. 02 RW.01 Ds.Sidodadi Kec.Lawang Kab.Malang</th> 
							</tr>
							<tr>
								<th colspan="4"></th> 
								<th colspan="20">Memberikan kuasa kepada</th> 
								<th colspan="2"></th> 
								<th colspan="8"></th> 
							</tr>
							<tr>
								<th colspan="4"></th> 
								<th colspan="4"></th> 
								<th colspan="15">Nama</th> 
								<th colspan="2">: </th> 
								<th colspan="28">SOEROTO</th> 
							</tr>
							<tr>
								<th colspan="4"></th> 
								<th colspan="4"></th> 
								<th colspan="15">No.Ktp</th> 
								<th colspan="2">: </th> 
								<th colspan="28">3573030705680006</th> 
							</tr>
							<tr>
								<th colspan="4"></th> 
								<th colspan="4"></th> 
								<th colspan="15">Pekerjaan/Jabatan</th> 
								<th colspan="2">: </th> 
								<th colspan="28">Staf Oprasional</th> 
							</tr>
							<tr> 
								<th colspan="4"></th> 
								<th colspan="4"></th> 
								<th colspan="15">Alamat</th> 
								<th colspan="2">: </th> 
								<th colspan="28">Jl.Danau Paniai Utara C7 J17 RT.07 RW.09 DS.Madyopuro KEC.Kedungkandang KOTA Malang</th> 
							</tr>
						</table>
						<table align="left" margin-right="500px;" width="95%" cellspacing="0" cellpadding="2" border="0">
						

						<tr> 
						<th colspan="2" > </th> 
						<th colspan="34" >Bahwa yang tersebut diatas adalah staf PT. FLAMBOYAN GEMA JASA yang di beri kuasa untuk pengambilan paspor di
						Kantor Imigrasi Malang. Dengan data sebagai berikut :</th> 
						</tr>		
						</table>
						<br><br>
						<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
							<tr>
								<th colspan="2">No</th> 
        						<th colspan="7">Nama</th> 
        						<th colspan="4">Jenis Kelamin</th> 
        						<th colspan="6">Tempat Tanggal Lahir</th> 
        						<th colspan="12">Alamat</th> 
        						<th colspan="5">Tujuan</th> 
							</tr>
							'.$tampildata.'
							<br/>
						</table>
						<br><br>
						<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
							<tr> 
								<th colspan="2"></th>
								<th colspan="28">Demikian surat kuasa ini kami buat untuk digunakan sebagamana mestinya, dan atas perhatian nya kami ucapkan terimakasih. </th>
							</tr>
						</table>
						<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
							
							<tr>
								<th colspan="2"></th> 
								<th colspan="6"></th> 
								<th colspan="6"></th> 
								<th colspan="8">Malang, '.$tanggal.'</th> 
							</tr>
							<tr> 
								<th colspan="2"></th>
								<th colspan="6">Penerima kuasa,</th>
								<th colspan="6">Yang memberi kuasa</th>
								<th colspan="11">Yang memberi kuasa</th>
							</tr>
							
						<br><br><br><br>
							<tr>
								<th colspan="2"></th>
								<th colspan="6">SOEROTO</th>
								<th colspan="6">__________________</th>
								<th colspan="25"><b><u>IMMANUEL DARMAWAN SANTOSO</u></b><br>
								Direktur Utama 
								</th>
							</tr>
						</table>
						<br pagebreak="true">
						<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
						    <br>
						    <br>
						    <br>
						    <br>
						    <br>
						    <br>
						    <br>
						    <tr>
						        <td align="center"><u>SURAT PERNYATAAN</u></td>
						    </tr>
						    <tr>
						        <td align="center">NO: '.$nomor.'</td>
						    </tr>
						</table>
						<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
						    <tr>
						        <td width="10mm"></td>
						        <td coslpan="3">Yang bertanda tangan di bawah ini saya:</td>
						        <td width="10mm"></td>
						    </tr>
						    <br>
						    <tr>
						        <td width="10mm"></td>
						        <td width="35mm">Nama</td>
						        <td width="5mm">:</td>
						        <td>IMMANUEL DARMAWAN SANTOSO</td>
						        <td width="10mm"></td>
						    </tr>
						    <tr>
						        <td width="10mm"></td>
						        <td width="35mm">Pekerjaan/Jabatan </td>
						        <td width="5mm">:</td>
						        <td>Direktur Utama PT. Flamboyan Gemajasa</td>
						        <td width="10mm"></td>
						    </tr>
						    <tr>
						        <td width="10mm"></td>
						        <td width="35mm">Alamat</td>
						        <td width="5mm">:</td>
						        <td>Jl. Inspektur Pol. Suwoto No.95 B Ds. Sidodadi<br>Kec. Lawang Kab. Malang</td>
						        <td width="10mm"></td>
						    </tr>
				        </table>
				    	<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				    	    <tr>
				    	        <td width="10mm"></td>
				    	        <td width="auto">Dengan ini menyatakan, bahwa saya bertanggung jawab atas kebenaran dan keabsahan dari surat kelengkapan persyaratan permohonan paspor RI, yaitu:</td>
				    	        <td width="10mm"></td>
				    	    </tr>
				    	</table>
				    	<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
						    <tr>
						        <td width="10mm"></td>
						        <td width="5mm"></td>
						        <td colspan="3" width="auto">1. Kartu Tanda Penduduk</td>
						        <td width="10mm"></td>
						    </tr>
						    <tr>
						        <td width="10mm"></td>
						        <td width="5mm"></td>
						        <td coslpan="3" width="auto">2. Kartu Keluarga</td>
						        <td width="10mm"></td>
						    </tr>
						    <tr>
						        <td width="10mm"></td>
						        <td width="5mm"></td>
						        <td coslpan="3" width="auto">3. Akte Lahir/ijasah</td>
						        <td width="10mm"></td>
						    </tr>
						    <tr>
						        <td width="10mm"></td>
						        <td width="5mm"></td>
						        <td coslpan="3" width="auto">4. Surat Cerai</td>
						        <td width="10mm"></td>
						    </tr>
						    <tr>
						        <td width="10mm"></td>
						        <td width="5mm"></td>
						        <td coslpan="3" width="auto">5. Surat Ijin Keluarga</td>
						        <td width="10mm"></td>
						    </tr>
						    <tr>
						        <td width="10mm"></td>
						        <td width="5mm"></td>
						        <td coslpan="3" width="auto">6. Rekomendasi dari Disnaker</td>
						        <td width="10mm"></td>
						    </tr>
						    <tr>
						        <td width="10mm"></td>
						        <td coslpan="4" width="auto">Untuk calon Tenaga Kerja Indonesia , dengan data sebagai berikut :</td>
						        <td width="10mm"></td>
						    </tr>
						</table>
						<br>
						<br>
						<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
        					<tr>
        						<th colspan="2">No</th> 
        						<th colspan="7">Nama</th> 
        						<th colspan="4">Jenis Kelamin</th> 
        						<th colspan="6">Tempat Tanggal Lahir</th> 
        						<th colspan="12">Alamat</th> 
        						<th colspan="5">Tujuan</th> 
        					</tr>
        					'.$tampildata.'
        					<br/>
        				</table>
        				<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				    	    <tr>
				    	        <td width="10mm"></td>
				    	        <td width="auto" colspan="6">Demikian permohonan kami, atas perhatian dan bantuannya kami sampaikan terima kasih.</td>
				    	        <td width="10mm"></td>
				    	    </tr>
				    	    <tr>
				    	        <td width="10mm"></td>
				    	        <td width="50%" colspan="6" align="left">Malang, '.$tanggal.'</td>
				    	        <td width="10mm"></td>
				    	    </tr>
				    	    <br><br><br><br>
				    	    <tr>
				    	        <td width="10mm"></td>
				    	        <td width="50%" colspan="6" align="left"><b><u>IMMANUEL DARMAWAN SANTOSO</u></b></td>
				    	        <td width="10mm"></td>
				    	    </tr>
				    	    <tr>
				    	        <td width="10mm"></td>
				    	        <td width="50%" colspan="6" align="left"><b><u>Direktur Utama</u></b></td>
				    	        <td width="10mm"></td>
				    	    </tr>
				    	</table>
				';
				
    // $html = '
    // 		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="1">
    // 			<tr>
	// 				<th colspan="4"></th> 
	// 				<th colspan="8"></th> 
	// 				<th colspan="3"></th> 
	// 				<th colspan="16"></th> 
	// 				<th colspan="8"></th> 
	// 				<th colspan="4"></th> 
	// 				<th colspan="18"></th> 
	// 			</tr>
	// 			<br/>
	// 			<tr>
	// 				<th colspan="4"></th> 
	// 				<th colspan="8"></th> 
	// 				<th colspan="3"></th> 
	// 				<th colspan="16"></th> 
	// 				<th colspan="8"></th> 
	// 				<th colspan="4"></th> 
	// 				<th colspan="18"></th> 
	// 			</tr>				
	// 			<tr>
	// 				<th colspan="4"></th> 
	// 				<th colspan="8"></th> 
	// 				<th colspan="3"></th> 
	// 				<th colspan="16"></th> 
	// 				<th colspan="8"></th> 
	// 				<th colspan="8"></th> 
	// 				<th colspan="18"></th> 
	// 			</tr>
	// 			<tr>
	// 				<th colspan="4"></th> 
	// 				<th colspan="8"></th> 
	// 				<th colspan="3"></th> 
	// 				<th colspan="16"></th> 
	// 				<th colspan="8"></th> 
	// 				<th colspan="2"></th> 
	// 				<th colspan="16">Malang '.$tanggal.'</th> 
	// 			</tr>	<br/>
	// 			<br/>
	// 			<tr>
	// 				<th colspan="4"></th> 
	// 				<th colspan="8">Nomor <br/>Lampiran <br>Perihal</th> 
	// 				<th colspan="3">: <br/>: <br/>: </th> 
	// 				<th colspan="26">'.$nomor.'<br/>-<br><b><u>Permohonan Paspor CTKI</u></b></th> 
	// 				<th colspan="24">Kepada<br/>Yth. Bapak Kepala Imigrasi Kelas I  Malang<br/>Di  Malang</th> 
					
	// 			</tr>		
	// 			<br/>
	// 			<tr>
	// 				<th colspan="4"></th> 
	// 				<th colspan="58">-Sehubungan dengan akan- dipasporkannya Calon Tenaga Indonesia (TKI) dari PT.FLAMBOYAN GEMAJASA sejumlah  11 orang  maka bersama ini kami mohon kepada Bapak untuk memberi kelancaran dalam proses pembuatan paspor.  Adapun nama-nama Calon TKI tersebut di bawah ini:</th>
	// 			</tr>						
	// 		</table>
	// 		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
	// 		 	<tr>
	// 		 		<th colspan="2" align="center" valign="middle">No</th>
	// 		 		<th colspan="9" align="center" valign="middle">Nama</th>
	// 		 		<th colspan="5" align="center" valign="middle">Jenis Kelamin</th>
	// 		 		<th colspan="5" align="center" valign="middle">Tempat Tanggal Lahir</th>
	// 		 		<th colspan="10" align="center" valign="middle">Alamat</th>
	// 		 		<th colspan="5" align="center" valign="middle">Tujuan</th>
	// 		 	</tr>
	// 		 	'.$tampildata.'
	// 		</table>

	// ';

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		ob_end_clean();
		$pdf->Output('REKOM PASPOR MALANG .pdf', 'I'); 
 
			
	}        
	
	function hapus_data()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'Gagal di hapus';

		$id = $this->input->post('id_pembuatan');

		$data_hapus = array(
			'softDelete' => '1'
		);

		$checkk = $this->M_session->update($data_hapus, 'pembuatan_paspor_malang_print', $id, 'id_pembuatan');

		if ( $checkk == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'Sukses di hapus';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

    function edit_show() {
    	$id = $this->input->post('id_pembuatan');

    	$data = $this->M_session->select_row(" SELECT * FROM pembuatan_paspor_malang_print WHERE id_pembuatan='$id'");

    	$tki_exp = explode(",", $data->tki);
    	$tki_final = array();
    	foreach ( $tki_exp as $row ) {
    		$tki_final[] = $row;
    	}

    	$data2 = array (
    		'tanggal' => $data->tanggal,
    		'nomor' => $data->nomor,
    		'tki' => $tki_final
    	);
    
    	$this->output->set_content_type('application/json')->set_output(json_encode( $data2 ));
    }       

    function edit_process($id_pembuatan) {

			$query = $this->M_session->select_row("SELECT * FROM pembuatan_paspor_malang_print where id_pembuatan='$id_pembuatan'");

			$data = array (
			    'table' 		=> 'pembuatan_paspor_malang_print',
			    'datafield' 	=> implode(',.|', array_keys( (array) $query) ),
			    'datavalue' 	=> implode(',.|',(array) $query ),
	            'source_id' 	=> $id_pembuatan
			);

			$cek = $this->M_session->insert($data, "_editrecords");

			if ($cek == TRUE) {

				$tanggalan = $this->input->post('tanggal');
				$nomoran 	 = $this->input->post('nomor');
				$tkian 	 = $this->input->post('tki');
				
				$data260998 = array (
					'tanggal' 			=> $tanggalan,
					'nomor' 			=> $nomoran,
					'tki' 			    => $tkian 
		
				);

				$inserting = $this->M_session->update( $data260998, 'pembuatan_paspor_malang_print', $id_pembuatan, 'id_pembuatan' );
				if ($inserting == TRUE) {
					$info['success'] = TRUE;
					$info['message'] = 'Berhasil...';
				}
			}
    
    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }                                    

}