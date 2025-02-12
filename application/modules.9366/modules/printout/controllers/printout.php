<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Printout extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');
			$this->load->model('m_printout');
			$this->load->library('Pdf');
	}
	
	function index(){
		$id 				= $this->session->userdata("detailuser");
		$nama 				= $this->m_printout->nama($id);
		$tempatlahir		= $this->m_printout->tempatlahir($id);
		$tgllahir			= $this->m_printout->tgllahir($id);
		$alamat 			= $this->m_printout->alamat($id);
		$nama_waris 		= $this->m_printout->nama_waris($id);
		$ttl_waris 			= "-";
		$alamat_waris 		= $this->m_printout->alamat($id);
		$nama_direktur 		= "AGNATIUS ATMADJAJA";
		$jabatan_direktur	= "Direktur Utama PT. FLMABOYAN GEMAJASA";
		$alamat_perusahaan 	= "Jl. TVRI Gang I Oro-Oro Ombo Batu Malang";
		$jabatan_tki		= "Calon Tenaga Kerja Indonesia (CTKI)";
	}
	
	function print_spaw(){
		
		$pdf = new Pdf('P','mm','A4',true,'UTF-8',false);
		$pdf->setTitle('PDF Example');
		$pdf->setHeaderMargin(30);
		$pdf->setTopMargin(20);
		$pdf->setFooterMargin(20);
		$pdf->setAutoPageBreak(true);
		$pdf->setDisplayMode('real','default');
		$pdf->write(5,'CodeIgniter TCPDF Integration');
		$pdf->Output('example.pdf','I');
	}
	
	function sr_ijin() {
		$id 				= $this->session->userdata("detailuser");
		$nama 				= $this->m_printout->nama($id);
		$tempatlahir		= $this->m_printout->tempatlahir($id);

	$originalDate = $this->m_printout->tgllahir($id);
	$originalDate= str_replace(".","-",$originalDate);
	$newDate = date("d-m-Y", strtotime($originalDate));

		$tgllahir			= $newDate;
		$alamat 			= $this->m_printout->alamat($id);
		$nama_waris 		= $this->m_printout->nama_waris($id);
		$ttl_waris 			= "-";
		$alamat_waris 		= $this->m_printout->alamat($id);
		$nama_direktur 		= "AGNATIUS ATMADJAJA";
		$jabatan_direktur	= "Direktur Utama PT. FLMABOYAN GEMEJASA";
		$alamat_perusahaan 	= "Jl. TVRI Gang I Oro-Oro Ombo Batu Malang";
		$jabatan_tki		= "Calon Tenaga Kerja Indonesia (CTKI)";
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle($id);
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
     $pdf->SetMargins(10, 50, 10);
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
    $pdf->SetFont('simsun', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
    $html = '<h2 align="center">SURAT REKOMENDASI PEMBUATAN IJIN</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
			<tbody>
			<tr>
			<td width="87"></td>
			<td width="20"></td>
			<td colspan="3" width="232">&nbsp;</td>
			<td colspan="2" width="323">Malang, '.date("d F Y").'</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td width="87">Nomor</td>
			<td width="20">:</td>
			<td colspan="3" width="232">&nbsp;</td>
			<td colspan="2" width="323">Kepada</td>
			</tr>
			<tr>
			<td width="87">Lampiran</td>
			<td width="20">:</td>
			<td colspan="3" width="232">&nbsp;</td>
			<td colspan="2" width="323">Yth. Kepala Dinas Tenaga Kerja Malang</td>
			</tr>
			<tr>
			<td width="87">Perihal</td>
			<td width="20">:</td>
			<td colspan="3" width="232"><strong>Surat Rekomendasi Untuk</strong>

			<strong>Pembuatan Ijin</strong></td>
			<td colspan="2" width="323">Di tempat.</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="7" width="662">Dengan hormat,</td>
			</tr>
			<tr>
			<td width="87">&nbsp;</td>
			<td colspan="6" width="575">Yang bertandatangan ini, saya :</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Nama</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$nama_direktur.';</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Jabatan</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$jabatan_direktur.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="3" rowspan="2" width="453">'.$alamat_perusahaan.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">&nbsp;</td>
			</tr>
			<tr>
			<td width="87">&nbsp;</td>
			<td colspan="6" width="575">Dengan ini memberikan rekomendasi kepada :</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Nama</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$nama.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$tempatlahir.', '.$tgllahir.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Jabatan</td>
			<td width="19">:</td>
			<td colspan="3" width="453">'.$jabatan_tki.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">Alamat</td>
			<td width="19">:</td>
			<td colspan="3" rowspan="2" width="453">'.$alamat.'</td>
			</tr>
			<tr>
			<td colspan="3" width="190">&nbsp;</td>
			<td width="19">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="7" width="662">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk pengurusan ijin sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan</td>
			</tr>
			<tr>
			<td colspan="7" width="662">Demikian atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</td>
			</tr>
			<tr>
			<td colspan="7" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" rowspan="3" width="366">&nbsp;</td>
			<td width="296">PT. FLAMBOYAN GEMAJASA</td>
			</tr>
			<tr>
			<td width="296">&nbsp;

			&nbsp;

			&nbsp;</td>
			</tr><br><br><br>
			<tr>
			<td width="296"><strong><u>'.$nama_direktur.'</u></strong>
			<br>
			Direktur Utama</td>
			</tr>
			</tbody>
			</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

    function p_penempatan() {
    	$id = $this->session->userdata("detailuser");
    	$nmdr = "AGNATIUS ATMADJAJA";
    	$nokt = "3579012907750002";
		$jbdr = "DIREKTUR UTAMA";
		$pptk = "PT. FLAMBOYAN GEMAJASA";
		$nosi = "519/MEN/2012";
		$aldr = "Jl. TVRI Gang I Oro-Oro Ombo Batu Malang";
		$notls = "(0341) 597231";
		$result = $this->m_printout->ambil_data_penempatan($id);
		foreach($result->result() as $row) {
			$nama = $row->nama;
			$telh = $row->tempatlahir;
			$tglh = $row->tgllahir;
			$jkel = $row->jeniskelamin;
			$almt = $row->alamat;
			$almtwali = $row->alamatkontak;
			$notl = $row->hp;
			$pddk = $row->pendidikan;
			$stts = $row->status;
			$nmbp = $row->nama_bapak;
			$nobp = $row->hpkel;
			$nmis = $row->nama_istri_suami;
			$jabt = $row->jabatan;
		}

		$originalDate= str_replace(".","-",$tglh);
	$tglh = date("d-m-Y", strtotime($originalDate));

    	// create new PDF document
	    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
	    // set document information
	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('$id');
	    $pdf->SetSubject('PERJANJIAN PENEMPATAN');
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
	    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
	    $pdf->SetFont('simsun', '', 12, '', true);   
		$pdf->AddPage(); 
	    // Set some content to print
	    // Set status disnaker
	    // 1. Formal Pabrik 
	    // 2. Formal Panti Jompo 
	    // 3. Informal Non
	    // 4. Informal Purna Taiwan Lebih 1 Tahun
	    // 5. Informal Purna Taiwan Kurang dari 1 Tahun
	 //    $now = getdate();
		// $mday = $now['mday']
		$array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
		$hari = $array_hari[date("N")];
		$tangalnya=date('d'); 
		$bulannya=date('m'); 

		$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$bulan = $array_bulan[date("n")];
		$tahunnya=date('Y'); 

	    if($jabt == 'Formal Pabrik') {
	    	$html = '
		    	<h3 align="center">
		    		PERJANJIAN PENEMPATAN ANTARA<br>
		    		PELAKSANA PENEMPATAN TENAGA KERJA INDONESIA SWASTA (PPTKIS) DENGAN CALON TENAGA KERJA INDONESIA<br>
		    		Nomor : ………………………………………………………<br>
		    		NEGARA PENEMPATAN : TAIWAN<br><br>
		    	</h3>
		    	<table>
		    		<tr>
		    			<td colspan="5">Pada hari '.$hari.' tanggal '.$tangalnya.' bulan '.$bulan.' tahun '.$tahunnya.' telah diadakan Perjanjian Penempatan antara :</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">1. </td>
						<td width="246">Nama Penanggung Jawab</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmdr.'</td>
					</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No KTP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nokt.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Jabatan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jbdr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nama PPTKIS</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pptk.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nomor SIPPTKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nosi.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$aldr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No. Telepon / Fax / E-mail</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notls.'</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td colspan="5">Selanjutnya disebut PIHAK PERTAMA</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">2. </td>
						<td width="246">Nama Calon TKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nama.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Tempat & Tanggal Lahir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$telh.', '.$tglh.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Jenis Kelamin</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jkel.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$almt.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notl.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Pendidikan Terakhir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pddk.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Status Perkawinan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$stts.'</td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmbp.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$almtwali.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nobp.'</td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmis.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$almt.'</td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">Selanjutnya disebut PIHAK KEDUA</td></tr>
					<tr>
						<td colspan="5">PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk melakukan dan melaksanakan perjanjian penempatan dengan ketentuan dan syarat-syarat sebagai berikut.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB I<br>HAK DAN KEWAJIBAN PIHAK PERTAMA<br></h3>
				<h4 align="center">Pasal 1</h4>
				<table>
					<tr>
						<td colspan="5">(1) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA untuk bekerja pada :</td>
					</tr>
					<tr colspan="5" align="center"><td></td></tr>
					<tr>
		    			<td width="20">a. </td>
						<td width="246">Negara Tempat Bekerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">TAIWAN</td>
					</tr>
					<tr>
		    			<td width="20">b. </td>
						<td width="246">Nama Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">c. </td>
						<td width="246">ID Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">d. </td>
						<td width="246">No. Telp Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">e. </td>
						<td width="246">Alamat Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">f. </td>
						<td width="246">Jabatan Pekerjaan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">g. </td>
						<td width="246">Gaji Pokok</td>
						<td width="19">:</td>
						<td colspan="2" width="397">20.008 NT</td>
					</tr>
					<tr>
		    			<td width="20">h. </td>
						<td width="246">Lembur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......... / bulan (1 minggu = 1 kali libur)</td>
					</tr>
					<tr>
		    			<td width="20">i. </td>
						<td width="246">Lama Kontrak Kerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">2 (dua) Tahun</td>
					</tr>
					<tr>
		    			<td width="20">j. </td>
						<td width="246">Hari Libur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">1 (satu) hari/minggu</td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(2) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA sebagaimana tersebut pada ayat (1) selambat-lambatnya 3 (tiga) bulan setelah Perjanjian Penempatan di tandatangani (sesuai MoU).</td></tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(3) PIHAK PERTAMA melalui mitra usahanya berkewajiban untuk memastikan bahwa PIHAK KEDUA bekerja sesuai dengan Perjanjian Kerja yang telah ditandatangani para pihak.</td></tr>
				</table>
				<h4 align="center">Pasal 2</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib memberikan jaminan keselamatan, kesehatan, keamanan dan PIHAK KEDUA sejak penandatanganan perjanjian penempatan, keberangkatan dari daerah asal, selama ditempat penampungan, berangkat ke <b><u>Negara TAIWAN</u></b> dan sampai kembali ke Indonesia.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 3</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib menyediakan tempat penampungan dan konsumsi yang layak sebelum keberangkatan bagi PIHAK KEDUA sesuai ketentuan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 4</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam asuransi Pra Penempatan, Masa Penempatan dan Purna Penempatan.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 5</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengurus dokumen</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Keberangkatan PIHAK KEDUA berupa paspor, visa kerja, dan kepesertaan asuransi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">PIHAK KEDUA wajib membiayai pengurusan dokumen jati diri berupa pemeriksaan psikologi dan kesehatan, paspor, visa serta uji keterampilan/kompetensi.</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Biaya-biaya yang timbul diluar sebagaimana dimaksud pada ayat (2), menjadi beban PIHAK PERTAMA.</td>
					</tr>
					<tr>
						<td>(5) </td>
						<td colspan="12">PIHAK PERTAMA wajib memberikan salinan perjanjian penempatan, paspor, visa dan perjanjian kerja kepada Keluarga PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 6</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melakukan pemeriksaan kesehatan bagi PIHAK KEDUA sesuai peraturan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 7</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam pendidikan dan pelatihan yang diselenggarakan sekurang-kurangnya 200 jam pelajaran atau sekurang-kurangnya 100 jam pelajaran bagi yang sudah pernah bekerja sebagai Pekerja Sektor <u>formal/worker</u> di Negara TAIWAN (sesuai peraturan yang berlaku).</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam mendapatkan materi Pembekalan Akhir Pemberangkatan (PAP)</td>
					</tr>
				</table>
				<h4 align="center">Pasal 8</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melaporkan kedatangan PIHAK KEDUA kepada Perwakilan RI di Negara penempatan
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 9</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib membantu menyelesaikan kasus dan masalah PIHAK KEDUA baik pada masa pra, masa maupun purna penempatan
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB II<br>HAK DAN KEWAJIBAN PIHAK KEDUA<br></h3>
				<h4 align="center">Pasal 10</h4>
				<table>
					<tr>
						<td colspan="13">PIHAK KEDUA berhak untuk :</td>
					</tr>
					<tr>
						<td>1. </td>
						<td colspan="12">Menolak keberangkatan dan atau penempatan yang tidak sesuai dengan ketentuan sebagaimana dimaksud dalam Pasal 1.</td>
					</tr>
					<tr>
						<td>2. </td>
						<td colspan="12">Mendapat akomodasi, konsumsi, kunjungan keluarga saat dipenampungan, pemeriksaan kesehatan serta pendidikan dan pelatihan yang sesuai dengan peraturan yang berlaku.</td>
					</tr>
					<tr>
						<td>3. </td>
						<td colspan="12">Menjalankan ibadah sesuai agama dan keyakinan yang dianutnya.</td>
					</tr>
					<tr>
						<td>4. </td>
						<td colspan="12">Mendapatkan Polis Asuransi TKI (Pra, Masa dan Purna Penempatan).</td>
					</tr>
					<tr>
						<td>5. </td>
						<td colspan="12">Mendapatkan Kartu Peserta Asuransi (KPA).</td>
					</tr>
					<tr>
						<td>6. </td>
						<td colspan="12">Mendapatkan Perjanjian Kerja yang telah ditandatangani oleh para pihak sebelum ditempatkan di Negara <b><u>TAIWAN</b></u></td>
					</tr>
					<tr>
						<td>7. </td>
						<td colspan="12">Mendapatkan pendidikan dan pelatihan sesuai dengan permintaan Negara penempatan.</td>
					</tr>
					<tr>
						<td>8. </td>
						<td colspan="12">Mendapatkan perlindungan dari PIHAK PERTAMA dari masa pra, masa dan purna penempatan.</td>
					</tr>
					<tr>
						<td>9. </td>
						<td colspan="12">Menyimpan dokumen jati diri (Paspor asli) selama di negara penempatan</td>
					</tr>
					<tr>
						<td>10. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika Pengguna melanggar ketentuan sebagaimana diatur dalam Perjanjian Kerja.</td>
					</tr>
					<tr>
						<td>11. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika terjadi kegagalan keberangkatan yang bukan disebabkan oleh PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 11</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memberikan dokumen jati diri (KTP, Surat Keterangan Status Perkawinan, Surat Ijin Orang Tua/Wali) yang sebenar-benarnya.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 12</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memiliki Sertifikat Kompetensi sebelum diberangkatkan ke Negara <b><u>TAIWAN</u></b>
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 13</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib tinggal di Penampungan dan Mematuhi tata tertib yang telah ditetapkan oleh PIHAK PERTAMA selama tinggal dipenampungan (tata tertib tidak boleh bertentangan dengan HAM).
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB III<br>PEMBIAYAAN<br></h3>
				<h4 align="center">Pasal 14</h4>
				<table>
					<tr>
						<td colspan="12">
							PIHAK KEDUA menanggung biaya penempatan sebesar Rp.9.895.400,- (Sembilan juta delapan ratus Sembilan puluh lima ribu empat ratus Rupiah) terdiri dari :
						</td>
					</tr>
					<tr><td colspan="12"></td></tr>
					<tr>
						<td>a. </td>
						<td colspan="8">Pemeriksaan Psikologi dan Kesehatan di Indonesia</td>
						<td colspan="4">Rp. 600.000.-</td>
					</tr>
					<tr>
						<td>b. </td>
						<td colspan="8">Dokumen Perjalanan (Paspor)</td>
						<td colspan="4">Rp. 110.000.-</td>
					</tr>
					<tr>
						<td>c. </td>
						<td colspan="8">Akomodasi Konsumsi Dan Pelatihan </td>
						<td colspan="4">Rp. 7.740.000.-</td>
					</tr>
					<tr>
						<td>d. </td>
						<td colspan="8">Visa</td>
						<td colspan="4">Rp. 727.000.-</td>
					</tr>
					<tr>
						<td>e. </td>
						<td colspan="8">Asuransi Perlindungan</td>
						<td colspan="4">Rp. 520.000.-</td>
					</tr>
					<tr>
						<td>f. </td>
						<td colspan="8">Tiket Keberangkatan</td>
						<td colspan="4">Rp. 2.850.000.-</td>
					</tr>
					<tr>
						<td>g. </td>
						<td colspan="8">Airport Tax</td>
						<td colspan="4">Rp. 150.000.-</td>
					</tr>
					<tr>
						<td>h. </td>
						<td colspan="8">Transport Lokal</td>
						<td colspan="4">Rp. 100.000.-</td>
					</tr>
					<tr>
						<td>i. </td>
						<td colspan="8">Biaya Jasa Perusahaan</td>
						<td colspan="4">Rp. 4.838.400.-</td>
					</tr>
					<tr>
						<td colspan="12">
							Dalam hal PIHAK KEDUA membayar secara angsuran, maka besarnya angsuran  Rp.9.895.400 (Sembilan juta delapan ratus Sembilan puluh lima ribu empat ratus Rupiah ) selama 10 bulan.
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB IV<br>GAGAL BERANGKAT<br></h3>
				<h4 align="center">Pasal 15</h4>
				<table>
					<tr>
						<td colspan="5">
						Dalam hal PIHAK KEDUA dinyatakan tidak sehat melalui pemeriksaan kesehatan di Negara Taiwan , maka PIHAK PERTAMA wajib membiayai kepulangan PIHAK KEDUA sampai daerah asal.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 16</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Dalam hal PIHAK KEDUA mengundurkan diri atau melarikan diri dari penampungan maka PIHAK KEDUA wajib mengembalikan biaya penempatan yang telah dikeluarkan oleh PIHAK PERTAMA sesuai bukti pembayaran yang sah.</td>
					</tr>
					<tr>
						<td>2. </td>
						<td colspan="12">Dalam hal PIHAK KEDUA meminta ijin pulang sebelum keberangkatan, maka PIHAK KEDUA wajib membayar dahulu biaya Proses Pra Penempatan yang terlah dikeluarkan PIHAK PERTAMA dan biaya tersebut akan dikembalikan PIHAK PERTAMA kepada PIHAK KEDUA apabila PIHAK KEDUA melanjutkan Proses Penempatannya.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB V<br>PENYELESAIAN PERBEDAAN PENDAPAT<br></h3>
				<h4 align="center">Pasal 17</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Apabila timbul perselisihan mengenai pelaksanaan perjanjian penempatanantara PIHAK PERTAMA dan PIHAK KEDUA, maka penyelesaian dilakukan secara musyawarah.</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Dalam hal musyawarah sebagaimana dimaksud dalam ayat (1) tidak tercapai, maka salah satu atau kedua belah pihak dapat meminta bantuan penyelesaian/perselisihan tersebut kepada Dinas Kab/Kota dan Provinsi serta Kemnakertrans yang terkoordinasi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">Dalam hal penyelesaian perselisihan sebagaimana dimaksud dalam ayat</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Tidak tercapai, maka salah satu atau kedua pihak dapat mengajukan tuntutan dan atau gugatan melalui pengadilan sesuai ketentuan yang berlaku.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB VI<br>PENUTUP<br></h3>
				<h4 align="center">Pasal 18</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 19</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
		    ';
	    } else if($jabt == 'Formal Panti Jompo') {
	    	$html = '
		    	<h3 align="center">
		    		PERJANJIAN PENEMPATAN ANTARA<br>
		    		PELAKSANA PENEMPATAN TENAGA KERJA INDONESIA SWASTA (PPTKIS) DENGAN CALON TENAGA KERJA INDONESIA<br>
		    		Nomor : ………………………………………………………<br>
		    		NEGARA PENEMPATAN : TAIWAN<br><br>
		    	</h3>
		    	<table>
		    		<tr>
		    			<td colspan="5">Pada hari JUMAT tanggal 04 bulan SEPTEMBER tahun 2015 telah diadakan Perjanjian Penempatan antara :</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">1. </td>
						<td width="246">Nama Penanggung Jawab</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmdr.'</td>
					</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No KTP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nokt.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Jabatan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jbdr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nama PPTKIS</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pptk.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nomor SIPPTKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nosi.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$aldr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No. Telepon / Fax / E-mail</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notl.'</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td colspan="5">Selanjutnya disebut PIHAK PERTAMA</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">2. </td>
						<td width="246">Nama Calon TKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nama.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Tempat & Tanggal Lahir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$telh.', '.$tglh.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Jenis Kelamin</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jkel.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$almt.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notl.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmbp.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397"></td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nobp.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Pendidikan Terakhir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pddk.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Status Perkawinan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$stts.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmis.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397"></td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">Selanjutnya disebut PIHAK KEDUA</td></tr>
					<tr>
						<td colspan="5">PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk melakukan dan melaksanakan perjanjian penempatan dengan ketentuan dan syarat-syarat sebagai berikut.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB I<br>HAK DAN KEWAJIBAN PIHAK PERTAMA<br></h3>
				<h4 align="center">Pasal 1</h4>
				<table>
					<tr>
						<td colspan="5">(1) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA untuk bekerja pada :</td>
					</tr>
					<tr colspan="5" align="center"><td></td></tr>
					<tr>
		    			<td width="20">a. </td>
						<td width="246">Negara Tempat Bekerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">TAIWAN</td>
					</tr>
					<tr>
		    			<td width="20">b. </td>
						<td width="246">Nama Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">c. </td>
						<td width="246">ID Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">d. </td>
						<td width="246">No. Telp Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">e. </td>
						<td width="246">Alamat Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">f. </td>
						<td width="246">Jabatan Pekerjaan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">g. </td>
						<td width="246">Gaji Pokok</td>
						<td width="19">:</td>
						<td colspan="2" width="397">17.000 N.T</td>
					</tr>
					<tr>
		    			<td width="20">h. </td>
						<td width="246">Lembur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......... / bulan (1 minggu = 1 kali libur)</td>
					</tr>
					<tr>
		    			<td width="20">i. </td>
						<td width="246">Lama Kontrak Kerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">2 (dua) Tahun</td>
					</tr>
					<tr>
		    			<td width="20">j. </td>
						<td width="246">Hari Libur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">1 (satu) hari/minggu</td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(2) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA sebagaimana tersebut pada ayat (1) selambat-lambatnya 3 (tiga) bulan setelah Perjanjian Penempatan di tandatangani (sesuai MoU).</td></tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(3) PIHAK PERTAMA melalui mitra usahanya berkewajiban untuk memastikan bahwa PIHAK KEDUA bekerja sesuai dengan Perjanjian Kerja yang telah ditandatangani para pihak.</td></tr>
				</table>
				<h4 align="center">Pasal 2</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib memberikan jaminan keselamatan, kesehatan, keamanan dan PIHAK KEDUA sejak penandatanganan perjanjian penempatan, keberangkatan dari daerah asal, selama ditempat penampungan, berangkat ke <b><u>Negara TAIWAN</u></b> dan sampai kembali ke Indonesia.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 3</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib menyediakan tempat penampungan dan konsumsi yang layak sebelum keberangkatan bagi PIHAK KEDUA sesuai ketentuan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 4</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam asuransi Pra Penempatan, Masa Penempatan dan Purna Penempatan.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 5</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengurus dokumen</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Keberangkatan PIHAK KEDUA berupa paspor, visa kerja, dan kepesertaan asuransi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">PIHAK KEDUA wajib membiayai pengurusan dokumen jati diri berupa pemeriksaan psikologi dan kesehatan, paspor, visa serta uji keterampilan/kompetensi.</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Biaya-biaya yang timbul diluar sebagaimana dimaksud pada ayat (2), menjadi beban PIHAK PERTAMA.</td>
					</tr>
					<tr>
						<td>(5) </td>
						<td colspan="12">PIHAK PERTAMA wajib memberikan salinan perjanjian penempatan, paspor, visa dan perjanjian kerja kepada Keluarga PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 6</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melakukan pemeriksaan kesehatan bagi PIHAK KEDUA sesuai peraturan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 7</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam pendidikan dan pelatihan yang diselenggarakan sekurang-kurangnya 200 jam pelajaran atau sekurang-kurangnya 100 jam pelajaran bagi yang sudah pernah bekerja sebagai Pekerja Sektor <u>Formal</u> di Negara TAIWAN (sesuai peraturan yang berlaku).</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam mendapatkan materi Pembekalan Akhir Pemberangkatan (PAP)</td>
					</tr>
				</table>
				<h4 align="center">Pasal 8</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melaporkan kedatangan PIHAK KEDUA kepada Perwakilan RI di Negara penempatan
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 9</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib membantu menyelesaikan kasus dan masalah PIHAK KEDUA baik pada masa pra, masa maupun purna penempatan
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB II<br>HAK DAN KEWAJIBAN PIHAK KEDUA<br></h3>
				<h4 align="center">Pasal 10</h4>
				<table>
					<tr>
						<td colspan="13">PIHAK KEDUA berhak untuk :</td>
					</tr>
					<tr>
						<td>1. </td>
						<td colspan="12">Menolak keberangkatan dan atau penempatan yang tidak sesuai dengan ketentuan sebagaimana dimaksud dalam Pasal 1.</td>
					</tr>
					<tr>
						<td>2. </td>
						<td colspan="12">Mendapat akomodasi, konsumsi, kunjungan keluarga saat dipenampungan, pemeriksaan kesehatan serta pendidikan dan pelatihan yang sesuai dengan peraturan yang berlaku.</td>
					</tr>
					<tr>
						<td>3. </td>
						<td colspan="12">Menjalankan ibadah sesuai agama dan keyakinan yang dianutnya.</td>
					</tr>
					<tr>
						<td>4. </td>
						<td colspan="12">Mendapatkan Polis Asuransi TKI (Pra, Masa dan Purna Penempatan).</td>
					</tr>
					<tr>
						<td>5. </td>
						<td colspan="12">Mendapatkan Kartu Peserta Asuransi (KPA).</td>
					</tr>
					<tr>
						<td>6. </td>
						<td colspan="12">Mendapatkan Perjanjian Kerja yang telah ditandatangani oleh para pihak sebelum ditempatkan di Negara <b><u>TAIWAN</b></u></td>
					</tr>
					<tr>
						<td>7. </td>
						<td colspan="12">Mendapatkan pendidikan dan pelatihan sesuai dengan permintaan Negara penempatan.</td>
					</tr>
					<tr>
						<td>8. </td>
						<td colspan="12">Mendapatkan perlindungan dari PIHAK PERTAMA dari masa pra, masa dan purna penempatan.</td>
					</tr>
					<tr>
						<td>9. </td>
						<td colspan="12">Menyimpan dokumen jati diri (Paspor asli) selama di negara penempatan</td>
					</tr>
					<tr>
						<td>10. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika Pengguna melanggar ketentuan sebagaimana diatur dalam Perjanjian Kerja.</td>
					</tr>
					<tr>
						<td>11. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika terjadi kegagalan keberangkatan yang bukan disebabkan oleh PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 11</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memberikan dokumen jati diri (KTP, Surat Keterangan Status Perkawinan, Surat Ijin Orang Tua/Wali) yang sebenar-benarnya.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 12</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memiliki Sertifikat Kompetensi sebelum diberangkatkan ke Negara <b><u>TAIWAN</u></b>
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 13</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib tinggal di Penampungan dan Mematuhi tata tertib yang telah ditetapkan oleh PIHAK PERTAMA selama tinggal dipenampungan (tata tertib tidak boleh bertentangan dengan HAM).
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB III<br>PEMBIAYAAN<br></h3>
				<h4 align="center">Pasal 14</h4>
				<table>
					<tr>
						<td colspan="12">
							PIHAK KEDUA menanggung biaya penempatan sebesar Rp.17.760.400,- (Tujuh Belas Juta Tujuh Ratus Enam Puluh Ribu Empat Ratus Rupiah) terdiri dari :
						</td>
					</tr>
					<tr><td colspan="12"></td></tr>
					<tr>
						<td>a. </td>
						<td colspan="8">Pemeriksaan Psikologi dan Kesehatan di Indonesia</td>
						<td colspan="4">Rp. 600.000.-</td>
					</tr>
					<tr>
						<td>b. </td>
						<td colspan="8">Dokumen Perjalanan (Paspor)</td>
						<td colspan="4">Rp. 110.000.-</td>
					</tr>
					<tr>
						<td>c. </td>
						<td colspan="8">Akomodasi Konsumsi Dan Pelatihan </td>
						<td colspan="4">Rp. 7.740.000.-</td>
					</tr>
					<tr>
						<td>d. </td>
						<td colspan="8">Uji Kompetensi</td>
						<td colspan="4">Rp. 125.000.-</td>
					</tr>
					<tr>
						<td>e. </td>
						<td colspan="8">Visa</td>
						<td colspan="4">Rp. 727.000.-</td>
					</tr>
					<tr>
						<td>f. </td>
						<td colspan="8">Asuransi Perlindungan</td>
						<td colspan="4">Rp. 520.000.-</td>
					</tr>
					<tr>
						<td>g. </td>
						<td colspan="8">Tiket Keberangkatan</td>
						<td colspan="4">Rp. 2.850.000.-</td>
					</tr>
					<tr>
						<td>h. </td>
						<td colspan="8">Airport Tax</td>
						<td colspan="4">Rp. 150.000.-</td>
					</tr>
					<tr>
						<td>i. </td>
						<td colspan="8">Transport Lokal</td>
						<td colspan="4">Rp. 100.000.-</td>
					</tr>
					<tr>
						<td>j. </td>
						<td colspan="8">Biaya Jasa Perusahaan</td>
						<td colspan="4">Rp. 4.838.400.-</td>
					</tr>
					<tr>
						<td colspan="12">
							Dalam hal PIHAK KEDUA membayar secara angsuran, maka besarnya angsuran adalah Rp. 2.224.607 (Dua juta dua ratus dua puluh empat ribu enam ratus tujuh rupiah) selama 10 bulan.
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB IV<br>GAGAL BERANGKAT<br></h3>
				<h4 align="center">Pasal 15</h4>
				<table>
					<tr>
						<td colspan="5">
						Dalam hal PIHAK KEDUA dinyatakan tidak sehat melalui pemeriksaan kesehatan di Negara Taiwan , maka PIHAK PERTAMA wajib membiayai kepulangan PIHAK KEDUA sampai daerah asal.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 16</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Dalam hal PIHAK KEDUA mengundurkan diri atau melarikan diri dari penampungan maka PIHAK KEDUA wajib mengembalikan biaya penempatan yang telah dikeluarkan oleh PIHAK PERTAMA sesuai bukti pembayaran yang sah.</td>
					</tr>
					<tr>
						<td>2. </td>
						<td colspan="12">Dalam hal PIHAK KEDUA meminta ijin pulang sebelum keberangkatan, maka PIHAK KEDUA wajib membayar dahulu biaya Proses Pra Penempatan yang terlah dikeluarkan PIHAK PERTAMA dan biaya tersebut akan dikembalikan PIHAK PERTAMA kepada PIHAK KEDUA apabila PIHAK KEDUA melanjutkan Proses Penempatannya.</td>
					</tr>
				</table>
				<br><br><br>
				<h3 align="center">BAB V<br>PENYELESAIAN PERBEDAAN PENDAPAT<br></h3>
				<h4 align="center">Pasal 17</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Apabila timbul perselisihan mengenai pelaksanaan perjanjian penempatanantara PIHAK PERTAMA dan PIHAK KEDUA, maka penyelesaian dilakukan secara musyawarah.</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Dalam hal musyawarah sebagaimana dimaksud dalam ayat (1) tidak tercapai, maka salah satu atau kedua belah pihak dapat meminta bantuan penyelesaian/perselisihan tersebut kepada Dinas Kab/Kota dan Provinsi serta Kemnakertrans yang terkoordinasi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">Dalam hal penyelesaian perselisihan sebagaimana dimaksud dalam ayat</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Tidak tercapai, maka salah satu atau kedua pihak dapat mengajukan tuntutan dan atau gugatan melalui pengadilan sesuai ketentuan yang berlaku.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB VI<br>PENUTUP<br></h3>
				<h4 align="center">Pasal 18</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 19</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
				<br><br><br><br>
				<table>
					<tr>
						<td colspan="6"><b>Batu,  04 SEPTEMBER 2015</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>PIHAK KEDUA</b></td>
						<td colspan="2"><b>PIHAK PERTAMA</b></td>
					</tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr>
						<td colspan="4"><b>'.$nama.'</b></td>
						<td colspan="2"><b>'.$nmdr.'</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>Mengetahui,</b></td>
						<td colspan="2"><b>Saksi,</b></td>
					</tr>
				</table>
		    ';
	    } else if($jabt == 'Informal Non') {
	    	$html = '
		    	<h3 align="center">
		    		PERJANJIAN PENEMPATAN ANTARA<br>
		    		PELAKSANA PENEMPATAN TENAGA KERJA INDONESIA SWASTA (PPTKIS) DENGAN CALON TENAGA KERJA INDONESIA<br>
		    		Nomor : ………………………………………………………<br>
		    		NEGARA PENEMPATAN : TAIWAN<br><br>
		    	</h3>
		    	<table>
		    		<tr>
		    			<td colspan="5">Pada hari SABTU tanggal 05 bulan SEPTEMBER tahun 2015 telah diadakan Perjanjian Penempatan antara :</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">1. </td>
						<td width="246">Nama Penanggung Jawab</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmdr.'</td>
					</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No KTP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nokt.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Jabatan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jbdr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nama PPTKIS</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pptk.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nomor SIPPTKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nosi.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$aldr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No. Telepon / Fax / E-mail</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notl.'</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td colspan="5">Selanjutnya disebut PIHAK PERTAMA</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">2. </td>
						<td width="246">Nama Calon TKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nama.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Tempat & Tanggal Lahir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$telh.', '.$tglh.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Jenis Kelamin</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jkel.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$almt.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notl.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmbp.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397"></td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nobp.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Pendidikan Terakhir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pddk.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Status Perkawinan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$stts.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmis.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397"></td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">Selanjutnya disebut PIHAK KEDUA</td></tr>
					<tr>
						<td colspan="5">PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk melakukan dan melaksanakan perjanjian penempatan dengan ketentuan dan syarat-syarat sebagai berikut.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB I<br>HAK DAN KEWAJIBAN PIHAK PERTAMA<br></h3>
				<h4 align="center">Pasal 1</h4>
				<table>
					<tr>
						<td colspan="5">(1) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA untuk bekerja pada :</td>
					</tr>
					<tr colspan="5" align="center"><td></td></tr>
					<tr>
		    			<td width="20">a. </td>
						<td width="246">Negara Tempat Bekerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">TAIWAN</td>
					</tr>
					<tr>
		    			<td width="20">b. </td>
						<td width="246">Nama Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">c. </td>
						<td width="246">ID Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">d. </td>
						<td width="246">No. Telp Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">e. </td>
						<td width="246">Alamat Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">f. </td>
						<td width="246">Jabatan Pekerjaan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">g. </td>
						<td width="246">Gaji Pokok</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">h. </td>
						<td width="246">Lembur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......... / bulan (1 minggu = 1 kali libur)</td>
					</tr>
					<tr>
		    			<td width="20">i. </td>
						<td width="246">Lama Kontrak Kerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">2 (dua) Tahun</td>
					</tr>
					<tr>
		    			<td width="20">j. </td>
						<td width="246">Hari Libur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">1 (satu) hari/minggu</td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(2) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA sebagaimana tersebut pada ayat (1) selambat-lambatnya 3 (tiga) bulan setelah Perjanjian Penempatan di tandatangani (sesuai MoU).</td></tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(3) PIHAK PERTAMA melalui mitra usahanya berkewajiban untuk memastikan bahwa PIHAK KEDUA bekerja sesuai dengan Perjanjian Kerja yang telah ditandatangani para pihak.</td></tr>
				</table>
				<h4 align="center">Pasal 2</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib memberikan jaminan keselamatan, kesehatan, keamanan dan PIHAK KEDUA sejak penandatanganan perjanjian penempatan, keberangkatan dari daerah asal, selama ditempat penampungan, berangkat ke <b><u>Negara TAIWAN</u></b> dan sampai kembali ke Indonesia.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 3</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib menyediakan tempat penampungan dan konsumsi yang layak sebelum keberangkatan bagi PIHAK KEDUA sesuai ketentuan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 4</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam asuransi Pra Penempatan, Masa Penempatan dan Purna Penempatan.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 5</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengurus dokumen</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Keberangkatan PIHAK KEDUA berupa paspor, visa kerja, dan kepesertaan asuransi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">PIHAK KEDUA wajib membiayai pengurusan dokumen jati diri berupa pemeriksaan psikologi dan kesehatan, paspor, visa serta uji keterampilan/kompetensi.</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Biaya-biaya yang timbul diluar sebagaimana dimaksud pada ayat (2), menjadi beban PIHAK PERTAMA.</td>
					</tr>
					<tr>
						<td>(5) </td>
						<td colspan="12">PIHAK PERTAMA wajib memberikan salinan perjanjian penempatan, paspor, visa dan perjanjian kerja kepada Keluarga PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 6</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melakukan pemeriksaan kesehatan bagi PIHAK KEDUA sesuai peraturan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 7</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam pendidikan dan pelatihan yang diselenggarakan sekurang-kurangnya 200 jam pelajaran atau sekurang-kurangnya 100 jam pelajaran bagi yang sudah pernah bekerja sebagai Pekerja Sektor <u>Formal</u> di Negara TAIWAN (sesuai peraturan yang berlaku).</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam mendapatkan materi Pembekalan Akhir Pemberangkatan (PAP)</td>
					</tr>
				</table>
				<h4 align="center">Pasal 8</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melaporkan kedatangan PIHAK KEDUA kepada Perwakilan RI di Negara penempatan
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 9</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib membantu menyelesaikan kasus dan masalah PIHAK KEDUA baik pada masa pra, masa maupun purna penempatan
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB II<br>HAK DAN KEWAJIBAN PIHAK KEDUA<br></h3>
				<h4 align="center">Pasal 10</h4>
				<table>
					<tr>
						<td colspan="13">PIHAK KEDUA berhak untuk :</td>
					</tr>
					<tr>
						<td>1. </td>
						<td colspan="12">Menolak keberangkatan dan atau penempatan yang tidak sesuai dengan ketentuan sebagaimana dimaksud dalam Pasal 1.</td>
					</tr>
					<tr>
						<td>2. </td>
						<td colspan="12">Mendapat akomodasi, konsumsi, kunjungan keluarga saat dipenampungan, pemeriksaan kesehatan serta pendidikan dan pelatihan yang sesuai dengan peraturan yang berlaku.</td>
					</tr>
					<tr>
						<td>3. </td>
						<td colspan="12">Menjalankan ibadah sesuai agama dan keyakinan yang dianutnya.</td>
					</tr>
					<tr>
						<td>4. </td>
						<td colspan="12">Mendapatkan Polis Asuransi TKI (Pra, Masa dan Purna Penempatan).</td>
					</tr>
					<tr>
						<td>5. </td>
						<td colspan="12">Mendapatkan Kartu Peserta Asuransi (KPA).</td>
					</tr>
					<tr>
						<td>6. </td>
						<td colspan="12">Mendapatkan Perjanjian Kerja yang telah ditandatangani oleh para pihak sebelum ditempatkan di Negara <b><u>TAIWAN</b></u></td>
					</tr>
					<tr>
						<td>7. </td>
						<td colspan="12">Mendapatkan pendidikan dan pelatihan sesuai dengan permintaan Negara penempatan.</td>
					</tr>
					<tr>
						<td>8. </td>
						<td colspan="12">Mendapatkan perlindungan dari PIHAK PERTAMA dari masa pra, masa dan purna penempatan.</td>
					</tr>
					<tr>
						<td>9. </td>
						<td colspan="12">Menyimpan dokumen jati diri (Paspor asli) selama di negara penempatan</td>
					</tr>
					<tr>
						<td>10. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika Pengguna melanggar ketentuan sebagaimana diatur dalam Perjanjian Kerja.</td>
					</tr>
					<tr>
						<td>11. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika terjadi kegagalan keberangkatan yang bukan disebabkan oleh PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 11</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memberikan dokumen jati diri (KTP, Surat Keterangan Status Perkawinan, Surat Ijin Orang Tua/Wali) yang sebenar-benarnya.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 12</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memiliki Sertifikat Kompetensi sebelum diberangkatkan ke Negara <b><u>TAIWAN</u></b>
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 13</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib tinggal di Penampungan dan Mematuhi tata tertib yang telah ditetapkan oleh PIHAK PERTAMA selama tinggal dipenampungan (tata tertib tidak boleh bertentangan dengan HAM).
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB III<br>PEMBIAYAAN<br></h3>
				<h4 align="center">Pasal 14</h4>
				<table>
					<tr>
						<td colspan="12">
							PIHAK KEDUA menanggung biaya penempatan sebesar Rp.17.760.400,- (Tujuh Belas Juta Tujuh Ratus Enam Puluh Ribu Empat Ratus Rupiah) terdiri dari :
						</td>
					</tr>
					<tr><td colspan="12"></td></tr>
					<tr>
						<td>a. </td>
						<td colspan="8">Biaya Paspor</td>
						<td colspan="4">Rp. 110.000.-</td>
					</tr>
					<tr>
						<td>b. </td>
						<td colspan="8">Biaya Test Kesehatan</td>
						<td colspan="4">Rp. 600.000.-</td>
					</tr>
					<tr>
						<td>c. </td>
						<td colspan="8">Akomodasi Konsumsi Dan Pelatihan </td>
						<td colspan="4">Rp. 7.740.000.-</td>
					</tr>
					<tr>
						<td>d. </td>
						<td colspan="8">LUK</td>
						<td colspan="4">Rp. 125.000.-</td>
					</tr>
					<tr>
						<td>e. </td>
						<td colspan="8">Visa</td>
						<td colspan="4">Rp. 727.000.-</td>
					</tr>
					<tr>
						<td>f. </td>
						<td colspan="8">Asuransi Perlindungan</td>
						<td colspan="4">Rp. 520.000.-</td>
					</tr>
					<tr>
						<td>g. </td>
						<td colspan="8">Tiket Keberangkatan</td>
						<td colspan="4">Rp. 2.850.000.-</td>
					</tr>
					<tr>
						<td>h. </td>
						<td colspan="8">Airport Tax</td>
						<td colspan="4">Rp. 150.000.-</td>
					</tr>
					<tr>
						<td>i. </td>
						<td colspan="8">Transport Lokal</td>
						<td colspan="4">Rp. 100.000.-</td>
					</tr>
					<tr>
						<td>j. </td>
						<td colspan="8">Biaya Jasa Perusahaan</td>
						<td colspan="4">Rp. 4.118.400.-</td>
					</tr>
					<tr>
						<td colspan="12">
							Dalam hal PIHAK KEDUA membayar secara angsuran, maka besarnya angsuran adalah Rp. 2.336.403 (Dua Juta Tiga Ratus Tiga Puluh Enam Ribu Empat Ratus Tiga Rupiah) selama 9 bulan.
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB IV<br>GAGAL BERANGKAT<br></h3>
				<h4 align="center">Pasal 15</h4>
				<table>
					<tr>
						<td colspan="5">
						Dalam hal PIHAK KEDUA dinyatakan tidak sehat melalui pemeriksaan kesehatan di Negara Taiwan , maka PIHAK PERTAMA wajib membiayai kepulangan PIHAK KEDUA sampai daerah asal.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 16</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Dalam hal PIHAK KEDUA mengundurkan diri atau melarikan diri dari penampungan maka PIHAK KEDUA wajib mengembalikan biaya penempatan yang telah dikeluarkan oleh PIHAK PERTAMA sesuai bukti pembayaran yang sah.</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Dalam hal PIHAK KEDUA meminta ijin pulang sebelum keberangkatan, maka PIHAK KEDUA wajib membayar dahulu biaya Proses Pra Penempatan yang terlah dikeluarkan PIHAK PERTAMA dan biaya tersebut akan dikembalikan PIHAK PERTAMA kepada PIHAK KEDUA apabila PIHAK KEDUA melanjutkan Proses Penempatannya.</td>
					</tr>
				</table>
				<br><br><br>
				<h3 align="center">BAB V<br>PENYELESAIAN PERBEDAAN PENDAPAT<br></h3>
				<h4 align="center">Pasal 17</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Apabila timbul perselisihan mengenai pelaksanaan perjanjian penempatanantara PIHAK PERTAMA dan PIHAK KEDUA, maka penyelesaian dilakukan secara musyawarah.</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Dalam hal musyawarah sebagaimana dimaksud dalam ayat (1) tidak tercapai, maka salah satu atau kedua belah pihak dapat meminta bantuan penyelesaian/perselisihan tersebut kepada Dinas Kab/Kota dan Provinsi serta Kemnakertrans yang terkoordinasi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">Dalam hal penyelesaian perselisihan sebagaimana dimaksud dalam ayat</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Tidak tercapai, maka salah satu atau kedua pihak dapat mengajukan tuntutan dan atau gugatan melalui pengadilan sesuai ketentuan yang berlaku.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB VI<br>PENUTUP<br></h3>
				<h4 align="center">Pasal 18</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 19</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
				<br><br><br><br>
				<table>
					<tr>
						<td colspan="6"><b>Batu,  05 SEPTEMBER 2015</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>PIHAK KEDUA</b></td>
						<td colspan="2"><b>PIHAK PERTAMA</b></td>
					</tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr>
						<td colspan="4"><b>(..................)</b></td>
						<td colspan="2"><b>'.$nmdr.'</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>Mengetahui,</b></td>
						<td colspan="2"><b>Saksi,</b></td>
					</tr>
				</table>
		    ';
	    } else if($jabt == 'Informal Purna Taiwan Lebih 1 Tahun') {
	    	$html = '
		    	<h3 align="center">
		    		PERJANJIAN PENEMPATAN ANTARA<br>
		    		PELAKSANA PENEMPATAN TENAGA KERJA INDONESIA SWASTA (PPTKIS) DENGAN CALON TENAGA KERJA INDONESIA<br>
		    		Nomor : ………………………………………………………<br>
		    		NEGARA PENEMPATAN : TAIWAN<br><br>
		    	</h3>
		    	<table>
		    		<tr>
		    			<td colspan="5">Pada hari SELASA tanggal 23 bulan DESEMBER tahun 2015 telah diadakan Perjanjian Penempatan antara :</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">1. </td>
						<td width="246">Nama Penanggung Jawab</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmdr.'</td>
					</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No KTP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nokt.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Jabatan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jbdr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nama PPTKIS</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pptk.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nomor SIPPTKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nosi.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$aldr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No. Telepon / Fax / E-mail</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notl.'</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td colspan="5">Selanjutnya disebut PIHAK PERTAMA</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">2. </td>
						<td width="246">Nama Calon TKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nama.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Tempat & Tanggal Lahir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$telh.', '.$tglh.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Jenis Kelamin</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jkel.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$almt.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notl.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmbp.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397"></td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nobp.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Pendidikan Terakhir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pddk.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Status Perkawinan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$stts.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmis.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397"></td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">Selanjutnya disebut PIHAK KEDUA</td></tr>
					<tr>
						<td colspan="5">PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk melakukan dan melaksanakan perjanjian penempatan dengan ketentuan dan syarat-syarat sebagai berikut.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB I<br>HAK DAN KEWAJIBAN PIHAK PERTAMA<br></h3>
				<h4 align="center">Pasal 1</h4>
				<table>
					<tr>
						<td colspan="5">(1) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA untuk bekerja pada :</td>
					</tr>
					<tr colspan="5" align="center"><td></td></tr>
					<tr>
		    			<td width="20">a. </td>
						<td width="246">Negara Tempat Bekerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">TAIWAN</td>
					</tr>
					<tr>
		    			<td width="20">b. </td>
						<td width="246">Nama Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">c. </td>
						<td width="246">ID Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">d. </td>
						<td width="246">No. Telp Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">e. </td>
						<td width="246">Alamat Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">f. </td>
						<td width="246">Jabatan Pekerjaan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">g. </td>
						<td width="246">Gaji Pokok</td>
						<td width="19">:</td>
						<td colspan="2" width="397">17.000 N.T</td>
					</tr>
					<tr>
		    			<td width="20">h. </td>
						<td width="246">Lembur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......... / bulan (1 minggu = 1 kali libur)</td>
					</tr>
					<tr>
		    			<td width="20">i. </td>
						<td width="246">Lama Kontrak Kerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">2 (dua) Tahun</td>
					</tr>
					<tr>
		    			<td width="20">j. </td>
						<td width="246">Hari Libur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">1 (satu) hari/minggu</td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(2) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA sebagaimana tersebut pada ayat (1) selambat-lambatnya 3 (tiga) bulan setelah Perjanjian Penempatan di tandatangani (sesuai MoU).</td></tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(3) PIHAK PERTAMA melalui mitra usahanya berkewajiban untuk memastikan bahwa PIHAK KEDUA bekerja sesuai dengan Perjanjian Kerja yang telah ditandatangani para pihak.</td></tr>
				</table>
				<h4 align="center">Pasal 2</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib memberikan jaminan keselamatan, kesehatan, keamanan dan PIHAK KEDUA sejak penandatanganan perjanjian penempatan, keberangkatan dari daerah asal, selama ditempat penampungan, berangkat ke <b><u>Negara TAIWAN</u></b> dan sampai kembali ke Indonesia.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 3</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib menyediakan tempat penampungan dan konsumsi yang layak sebelum keberangkatan bagi PIHAK KEDUA sesuai ketentuan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 4</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam asuransi Pra Penempatan, Masa Penempatan dan Purna Penempatan.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 5</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengurus dokumen</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Keberangkatan PIHAK KEDUA berupa paspor, visa kerja, dan kepesertaan asuransi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">PIHAK KEDUA wajib membiayai pengurusan dokumen jati diri berupa pemeriksaan psikologi dan kesehatan, paspor, visa serta uji keterampilan/kompetensi.</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Biaya-biaya yang timbul diluar sebagaimana dimaksud pada ayat (2), menjadi beban PIHAK PERTAMA.</td>
					</tr>
					<tr>
						<td>(5) </td>
						<td colspan="12">PIHAK PERTAMA wajib memberikan salinan perjanjian penempatan, paspor, visa dan perjanjian kerja kepada Keluarga PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 6</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melakukan pemeriksaan kesehatan bagi PIHAK KEDUA sesuai peraturan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 7</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam pendidikan dan pelatihan yang diselenggarakan sekurang-kurangnya 200 jam pelajaran atau sekurang-kurangnya 100 jam pelajaran bagi yang sudah pernah bekerja sebagai Pekerja Sektor <u>Formal</u> di Negara TAIWAN (sesuai peraturan yang berlaku).</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam mendapatkan materi Pembekalan Akhir Pemberangkatan (PAP)</td>
					</tr>
				</table>
				<h4 align="center">Pasal 8</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melaporkan kedatangan PIHAK KEDUA kepada Perwakilan RI di Negara penempatan
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 9</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib membantu menyelesaikan kasus dan masalah PIHAK KEDUA baik pada masa pra, masa maupun purna penempatan
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB II<br>HAK DAN KEWAJIBAN PIHAK KEDUA<br></h3>
				<h4 align="center">Pasal 10</h4>
				<table>
					<tr>
						<td colspan="13">PIHAK KEDUA berhak untuk :</td>
					</tr>
					<tr>
						<td>1. </td>
						<td colspan="12">Menolak keberangkatan dan atau penempatan yang tidak sesuai dengan ketentuan sebagaimana dimaksud dalam Pasal 1.</td>
					</tr>
					<tr>
						<td>2. </td>
						<td colspan="12">Mendapat akomodasi, konsumsi, kunjungan keluarga saat dipenampungan, pemeriksaan kesehatan serta pendidikan dan pelatihan yang sesuai dengan peraturan yang berlaku.</td>
					</tr>
					<tr>
						<td>3. </td>
						<td colspan="12">Menjalankan ibadah sesuai agama dan keyakinan yang dianutnya.</td>
					</tr>
					<tr>
						<td>4. </td>
						<td colspan="12">Mendapatkan Polis Asuransi TKI (Pra, Masa dan Purna Penempatan).</td>
					</tr>
					<tr>
						<td>5. </td>
						<td colspan="12">Mendapatkan Kartu Peserta Asuransi (KPA).</td>
					</tr>
					<tr>
						<td>6. </td>
						<td colspan="12">Mendapatkan Perjanjian Kerja yang telah ditandatangani oleh para pihak sebelum ditempatkan di Negara <b><u>TAIWAN</b></u></td>
					</tr>
					<tr>
						<td>7. </td>
						<td colspan="12">Mendapatkan pendidikan dan pelatihan sesuai dengan permintaan Negara penempatan.</td>
					</tr>
					<tr>
						<td>8. </td>
						<td colspan="12">Mendapatkan perlindungan dari PIHAK PERTAMA dari masa pra, masa dan purna penempatan.</td>
					</tr>
					<tr>
						<td>9. </td>
						<td colspan="12">Menyimpan dokumen jati diri (Paspor asli) selama di negara penempatan</td>
					</tr>
					<tr>
						<td>10. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika Pengguna melanggar ketentuan sebagaimana diatur dalam Perjanjian Kerja.</td>
					</tr>
					<tr>
						<td>11. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika terjadi kegagalan keberangkatan yang bukan disebabkan oleh PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 11</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memberikan dokumen jati diri (KTP, Surat Keterangan Status Perkawinan, Surat Ijin Orang Tua/Wali) yang sebenar-benarnya.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 12</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memiliki Sertifikat Kompetensi sebelum diberangkatkan ke Negara <b><u>TAIWAN</u></b>
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 13</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib tinggal di Penampungan dan Mematuhi tata tertib yang telah ditetapkan oleh PIHAK PERTAMA selama tinggal dipenampungan (tata tertib tidak boleh bertentangan dengan HAM).
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB III<br>PEMBIAYAAN<br></h3>
				<h4 align="center">Pasal 14</h4>
				<table>
					<tr>
						<td colspan="12">
							PIHAK KEDUA menanggung biaya penempatan sebesar Rp.9.175.400,- (Sembilan juta seratus tujuh puluh lima ribu empat ratus rupiah) terdiri dari :
						</td>
					</tr>
					<tr><td colspan="12"></td></tr>
					<tr>
						<td>a. </td>
						<td colspan="8">Biaya Paspor</td>
						<td colspan="4">Rp. 110.000.-</td>
					</tr>
					<tr>
						<td>b. </td>
						<td colspan="8">Biaya Test Kesehatan</td>
						<td colspan="4">Rp. 600.000.-</td>
					</tr>
					<tr>
						<td>c. </td>
						<td colspan="8">Visa</td>
						<td colspan="4">Rp. 727.000.-</td>
					</tr>
					<tr>
						<td>d. </td>
						<td colspan="8">Asuransi Perlindungan</td>
						<td colspan="4">Rp. 520.000.-</td>
					</tr>
					<tr>
						<td>e. </td>
						<td colspan="8">Tiket Keberangkatan</td>
						<td colspan="4">Rp. 2.850.000.-</td>
					</tr>
					<tr>
						<td>f. </td>
						<td colspan="8">Airport Tax</td>
						<td colspan="4">Rp. 150.000.-</td>
					</tr>
					<tr>
						<td>g. </td>
						<td colspan="8">Transport Lokal</td>
						<td colspan="4">Rp. 100.000.-</td>
					</tr>
					<tr>
						<td>h. </td>
						<td colspan="8">Biaya Jasa Perusahaan</td>
						<td colspan="4">Rp. 4.118.400.-</td>
					</tr>
					<tr>
						<td colspan="12">
							Dalam hal PIHAK KEDUA membayar secara angsuran , maka besarnya angsuran adalah Rp. 9.175.400 (Sembilan juta seratus tujuh puluh lima ribu empat ratus rupiah) selama 9 bulan.
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB IV<br>GAGAL BERANGKAT<br></h3>
				<h4 align="center">Pasal 15</h4>
				<table>
					<tr>
						<td colspan="5">
						Dalam hal PIHAK KEDUA dinyatakan tidak sehat melalui pemeriksaan kesehatan di Negara Taiwan , maka PIHAK PERTAMA wajib membiayai kepulangan PIHAK KEDUA sampai daerah asal.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 16</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Dalam hal PIHAK KEDUA mengundurkan diri atau melarikan diri dari penampungan maka PIHAK KEDUA wajib mengembalikan biaya penempatan yang telah dikeluarkan oleh PIHAK PERTAMA sesuai bukti pembayaran yang sah.</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Dalam hal PIHAK KEDUA meminta ijin pulang sebelum keberangkatan, maka PIHAK KEDUA wajib membayar dahulu biaya Proses Pra Penempatan yang terlah dikeluarkan PIHAK PERTAMA dan biaya tersebut akan dikembalikan PIHAK PERTAMA kepada PIHAK KEDUA apabila PIHAK KEDUA melanjutkan Proses Penempatannya.</td>
					</tr>
				</table>
				<br><br><br>
				<h3 align="center">BAB V<br>PENYELESAIAN PERBEDAAN PENDAPAT<br></h3>
				<h4 align="center">Pasal 17</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Apabila timbul perselisihan mengenai pelaksanaan perjanjian penempatanantara PIHAK PERTAMA dan PIHAK KEDUA, maka penyelesaian dilakukan secara musyawarah.</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Dalam hal musyawarah sebagaimana dimaksud dalam ayat (1) tidak tercapai, maka salah satu atau kedua belah pihak dapat meminta bantuan penyelesaian/perselisihan tersebut kepada Dinas Kab/Kota dan Provinsi serta Kemnakertrans yang terkoordinasi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">Dalam hal penyelesaian perselisihan sebagaimana dimaksud dalam ayat</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Tidak tercapai, maka salah satu atau kedua pihak dapat mengajukan tuntutan dan atau gugatan melalui pengadilan sesuai ketentuan yang berlaku.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB VI<br>PENUTUP<br></h3>
				<h4 align="center">Pasal 18</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 19</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
				<br><br><br><br>
				<table>
					<tr>
						<td colspan="6"><b>Batu, 23 Desember 2015</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>PIHAK KEDUA</b></td>
						<td colspan="2"><b>PIHAK PERTAMA</b></td>
					</tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr>
						<td colspan="4"><b>(..................)</b></td>
						<td colspan="2"><b>'.$nmdr.'</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>Mengetahui,</b></td>
						<td colspan="2"><b>Saksi,</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>Dinas Kab/Kota .........................</b></td>
						<td colspan="2"><b>Orang tua/wali</b></td>
					</tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr>
						<td colspan="4"><b>(..................)</b></td>
						<td colspan="2"><b>'.$nmbp.'</b></td>
					</tr>
					<tr>
						<td colspan="6"><b>NIP : </b></td>
					</tr>
				</table>
		    ';
	    } else if($jabt == 'Informal Purna Taiwan Kurang dari 1 Tahun') {
		    $html = '
		    	<h3 align="center">
		    		PERJANJIAN PENEMPATAN ANTARA<br>
		    		PELAKSANA PENEMPATAN TENAGA KERJA INDONESIA SWASTA (PPTKIS) DENGAN CALON TENAGA KERJA INDONESIA<br>
		    		Nomor : ………………………………………………………<br>
		    		NEGARA PENEMPATAN : TAIWAN<br><br>
		    	</h3>
		    	<table>
		    		<tr>
		    			<td colspan="5">Pada hari SELASA tanggal 23 bulan DESEMBER tahun 2015 telah diadakan Perjanjian Penempatan antara :</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">1. </td>
						<td width="246">Nama Penanggung Jawab</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmdr.'</td>
					</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No KTP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nokt.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Jabatan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jbdr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nama PPTKIS</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pptk.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Nomor SIPPTKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nosi.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$aldr.'</td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td width="246">No. Telepon / Fax / E-mail</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notl.'</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td colspan="5">Selanjutnya disebut PIHAK PERTAMA</td>
		    		</tr>
		    		<tr colspan="5"><td></td></tr>
		    		<tr>
		    			<td width="20">2. </td>
						<td width="246">Nama Calon TKI</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nama.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Tempat & Tanggal Lahir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$telh.', '.$tglh.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Jenis Kelamin</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$jkel.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$almt.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$notl.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmbp.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Orang Tua / Wali</td>
						<td width="19">:</td>
						<td colspan="2" width="397"></td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">No. Telepon / HP</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nobp.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Pendidikan Terakhir</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$pddk.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Status Perkawinan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$stts.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Nama Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397">'.$nmis.'</td>
					</tr>
					<tr>
		    			<td width="20"></td>
						<td width="246">Alamat Suami / Istri</td>
						<td width="19">:</td>
						<td colspan="2" width="397"></td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">Selanjutnya disebut PIHAK KEDUA</td></tr>
					<tr>
						<td colspan="5">PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk melakukan dan melaksanakan perjanjian penempatan dengan ketentuan dan syarat-syarat sebagai berikut.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB I<br>HAK DAN KEWAJIBAN PIHAK PERTAMA<br></h3>
				<h4 align="center">Pasal 1</h4>
				<table>
					<tr>
						<td colspan="5">(1) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA untuk bekerja pada :</td>
					</tr>
					<tr colspan="5" align="center"><td></td></tr>
					<tr>
		    			<td width="20">a. </td>
						<td width="246">Negara Tempat Bekerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">TAIWAN</td>
					</tr>
					<tr>
		    			<td width="20">b. </td>
						<td width="246">Nama Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">c. </td>
						<td width="246">ID Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">d. </td>
						<td width="246">No. Telp Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">e. </td>
						<td width="246">Alamat Pengguna</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">f. </td>
						<td width="246">Jabatan Pekerjaan</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......................</td>
					</tr>
					<tr>
		    			<td width="20">g. </td>
						<td width="246">Gaji Pokok</td>
						<td width="19">:</td>
						<td colspan="2" width="397">17.000 N.T</td>
					</tr>
					<tr>
		    			<td width="20">h. </td>
						<td width="246">Lembur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">......... / bulan (1 minggu = 1 kali libur)</td>
					</tr>
					<tr>
		    			<td width="20">i. </td>
						<td width="246">Lama Kontrak Kerja</td>
						<td width="19">:</td>
						<td colspan="2" width="397">2 (dua) Tahun</td>
					</tr>
					<tr>
		    			<td width="20">j. </td>
						<td width="246">Hari Libur</td>
						<td width="19">:</td>
						<td colspan="2" width="397">1 (satu) hari/minggu</td>
					</tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(2) PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA sebagaimana tersebut pada ayat (1) selambat-lambatnya 3 (tiga) bulan setelah Perjanjian Penempatan di tandatangani (sesuai MoU).</td></tr>
					<tr colspan="5"><td></td></tr>
					<tr><td colspan="5">(3) PIHAK PERTAMA melalui mitra usahanya berkewajiban untuk memastikan bahwa PIHAK KEDUA bekerja sesuai dengan Perjanjian Kerja yang telah ditandatangani para pihak.</td></tr>
				</table>
				<h4 align="center">Pasal 2</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib memberikan jaminan keselamatan, kesehatan, keamanan dan PIHAK KEDUA sejak penandatanganan perjanjian penempatan, keberangkatan dari daerah asal, selama ditempat penampungan, berangkat ke <b><u>Negara TAIWAN</u></b> dan sampai kembali ke Indonesia.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 3</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib menyediakan tempat penampungan dan konsumsi yang layak sebelum keberangkatan bagi PIHAK KEDUA sesuai ketentuan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 4</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam asuransi Pra Penempatan, Masa Penempatan dan Purna Penempatan.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 5</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengurus dokumen</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Keberangkatan PIHAK KEDUA berupa paspor, visa kerja, dan kepesertaan asuransi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">PIHAK KEDUA wajib membiayai pengurusan dokumen jati diri berupa pemeriksaan psikologi dan kesehatan, paspor, visa serta uji keterampilan/kompetensi.</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Biaya-biaya yang timbul diluar sebagaimana dimaksud pada ayat (2), menjadi beban PIHAK PERTAMA.</td>
					</tr>
					<tr>
						<td>(5) </td>
						<td colspan="12">PIHAK PERTAMA wajib memberikan salinan perjanjian penempatan, paspor, visa dan perjanjian kerja kepada Keluarga PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 6</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melakukan pemeriksaan kesehatan bagi PIHAK KEDUA sesuai peraturan yang berlaku.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 7</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam pendidikan dan pelatihan yang diselenggarakan sekurang-kurangnya 200 jam pelajaran atau sekurang-kurangnya 100 jam pelajaran bagi yang sudah pernah bekerja sebagai Pekerja Sektor <u>Formal</u> di Negara TAIWAN (sesuai peraturan yang berlaku).</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam mendapatkan materi Pembekalan Akhir Pemberangkatan (PAP)</td>
					</tr>
				</table>
				<h4 align="center">Pasal 8</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib melaporkan kedatangan PIHAK KEDUA kepada Perwakilan RI di Negara penempatan
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 9</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK PERTAMA wajib membantu menyelesaikan kasus dan masalah PIHAK KEDUA baik pada masa pra, masa maupun purna penempatan
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB II<br>HAK DAN KEWAJIBAN PIHAK KEDUA<br></h3>
				<h4 align="center">Pasal 10</h4>
				<table>
					<tr>
						<td colspan="13">PIHAK KEDUA berhak untuk :</td>
					</tr>
					<tr>
						<td>1. </td>
						<td colspan="12">Menolak keberangkatan dan atau penempatan yang tidak sesuai dengan ketentuan sebagaimana dimaksud dalam Pasal 1.</td>
					</tr>
					<tr>
						<td>2. </td>
						<td colspan="12">Mendapat akomodasi, konsumsi, kunjungan keluarga saat dipenampungan, pemeriksaan kesehatan serta pendidikan dan pelatihan yang sesuai dengan peraturan yang berlaku.</td>
					</tr>
					<tr>
						<td>3. </td>
						<td colspan="12">Menjalankan ibadah sesuai agama dan keyakinan yang dianutnya.</td>
					</tr>
					<tr>
						<td>4. </td>
						<td colspan="12">Mendapatkan Polis Asuransi TKI (Pra, Masa dan Purna Penempatan).</td>
					</tr>
					<tr>
						<td>5. </td>
						<td colspan="12">Mendapatkan Kartu Peserta Asuransi (KPA).</td>
					</tr>
					<tr>
						<td>6. </td>
						<td colspan="12">Mendapatkan Perjanjian Kerja yang telah ditandatangani oleh para pihak sebelum ditempatkan di Negara <b><u>TAIWAN</b></u></td>
					</tr>
					<tr>
						<td>7. </td>
						<td colspan="12">Mendapatkan pendidikan dan pelatihan sesuai dengan permintaan Negara penempatan.</td>
					</tr>
					<tr>
						<td>8. </td>
						<td colspan="12">Mendapatkan perlindungan dari PIHAK PERTAMA dari masa pra, masa dan purna penempatan.</td>
					</tr>
					<tr>
						<td>9. </td>
						<td colspan="12">Menyimpan dokumen jati diri (Paspor asli) selama di negara penempatan</td>
					</tr>
					<tr>
						<td>10. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika Pengguna melanggar ketentuan sebagaimana diatur dalam Perjanjian Kerja.</td>
					</tr>
					<tr>
						<td>11. </td>
						<td colspan="12">Memperoleh ganti rugi dari PIHAK PERTAMA jika terjadi kegagalan keberangkatan yang bukan disebabkan oleh PIHAK KEDUA.</td>
					</tr>
				</table>
				<h4 align="center">Pasal 11</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memberikan dokumen jati diri (KTP, Surat Keterangan Status Perkawinan, Surat Ijin Orang Tua/Wali) yang sebenar-benarnya.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 12</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib memiliki Sertifikat Kompetensi sebelum diberangkatkan ke Negara <b><u>TAIWAN</u></b>
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 13</h4>
				<table>
					<tr>
						<td colspan="5">
						PIHAK KEDUA wajib tinggal di Penampungan dan Mematuhi tata tertib yang telah ditetapkan oleh PIHAK PERTAMA selama tinggal dipenampungan (tata tertib tidak boleh bertentangan dengan HAM).
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB III<br>PEMBIAYAAN<br></h3>
				<h4 align="center">Pasal 14</h4>
				<table>
					<tr>
						<td colspan="12">
							PIHAK KEDUA menanggung biaya penempatan sebesar Rp.9.300.400,- (Sembilan juta tiga ratus ribu empat ratus rupiah) terdiri dari :
						</td>
					</tr>
					<tr><td colspan="12"></td></tr>
					<tr>
						<td>a. </td>
						<td colspan="8">Biaya Paspor</td>
						<td colspan="4">Rp. 110.000.-</td>
					</tr>
					<tr>
						<td>b. </td>
						<td colspan="8">Biaya Test Kesehatan</td>
						<td colspan="4">Rp. 600.000.-</td>
					</tr>
					<tr>
						<td>c. </td>
						<td colspan="8">LUK</td>
						<td colspan="4">Rp. 125.000.-</td>
					</tr>
					<tr>
						<td>d. </td>
						<td colspan="8">Visa</td>
						<td colspan="4">Rp. 727.000.-</td>
					</tr>
					<tr>
						<td>e. </td>
						<td colspan="8">Asuransi Perlindungan</td>
						<td colspan="4">Rp. 520.000.-</td>
					</tr>
					<tr>
						<td>f. </td>
						<td colspan="8">Tiket Keberangkatan</td>
						<td colspan="4">Rp. 2.850.000.-</td>
					</tr>
					<tr>
						<td>g. </td>
						<td colspan="8">Airport Tax</td>
						<td colspan="4">Rp. 150.000.-</td>
					</tr>
					<tr>
						<td>h. </td>
						<td colspan="8">Transport Lokal</td>
						<td colspan="4">Rp. 100.000.-</td>
					</tr>
					<tr>
						<td>i. </td>
						<td colspan="8">Biaya Jasa Perusahaan</td>
						<td colspan="4">Rp. 4.118.400.-</td>
					</tr>
					<tr>
						<td colspan="12">
							Dalam hal PIHAK KEDUA membayar secara angsuran , maka besarnya angsuran adalah Rp.9.300.400,- (Sembilan juta tiga ratus ribu empat ratus rupiah) selama 9 bulan.
						</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB IV<br>GAGAL BERANGKAT<br></h3>
				<h4 align="center">Pasal 15</h4>
				<table>
					<tr>
						<td colspan="5">
						Dalam hal PIHAK KEDUA dinyatakan tidak sehat melalui pemeriksaan kesehatan di Negara Taiwan , maka PIHAK PERTAMA wajib membiayai kepulangan PIHAK KEDUA sampai daerah asal.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 16</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Dalam hal PIHAK KEDUA mengundurkan diri atau melarikan diri dari penampungan maka PIHAK KEDUA wajib mengembalikan biaya penempatan yang telah dikeluarkan oleh PIHAK PERTAMA sesuai bukti pembayaran yang sah.</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Dalam hal PIHAK KEDUA meminta ijin pulang sebelum keberangkatan, maka PIHAK KEDUA wajib membayar dahulu biaya Proses Pra Penempatan yang terlah dikeluarkan PIHAK PERTAMA dan biaya tersebut akan dikembalikan PIHAK PERTAMA kepada PIHAK KEDUA apabila PIHAK KEDUA melanjutkan Proses Penempatannya.</td>
					</tr>
				</table>
				<br><br><br>
				<h3 align="center">BAB V<br>PENYELESAIAN PERBEDAAN PENDAPAT<br></h3>
				<h4 align="center">Pasal 17</h4>
				<table>
					<tr>
						<td>(1) </td>
						<td colspan="12">Apabila timbul perselisihan mengenai pelaksanaan perjanjian penempatanantara PIHAK PERTAMA dan PIHAK KEDUA, maka penyelesaian dilakukan secara musyawarah.</td>
					</tr>
					<tr>
						<td>(2) </td>
						<td colspan="12">Dalam hal musyawarah sebagaimana dimaksud dalam ayat (1) tidak tercapai, maka salah satu atau kedua belah pihak dapat meminta bantuan penyelesaian/perselisihan tersebut kepada Dinas Kab/Kota dan Provinsi serta Kemnakertrans yang terkoordinasi.</td>
					</tr>
					<tr>
						<td>(3) </td>
						<td colspan="12">Dalam hal penyelesaian perselisihan sebagaimana dimaksud dalam ayat</td>
					</tr>
					<tr>
						<td>(4) </td>
						<td colspan="12">Tidak tercapai, maka salah satu atau kedua pihak dapat mengajukan tuntutan dan atau gugatan melalui pengadilan sesuai ketentuan yang berlaku.</td>
					</tr>
				</table>
				<br><br>
				<h3 align="center">BAB VI<br>PENUTUP<br></h3>
				<h4 align="center">Pasal 18</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
				<h4 align="center">Pasal 19</h4>
				<table>
					<tr>
						<td colspan="5">
						Perjanjian penempatan ditandatangani oleh kedua belah pihak tanpa paksaan dari pihak manapun serta diketahui oleh Dinas Kab/Kota setempat dan dibuat rangkap 3 (tiga) dan bermaterei secukupnya. Lembar pertama untuk PIHAK KEDUA, Lembar kedua untuk PIHAK PERTAMA, Lembar ketiga untuk Dinas Kab/Kota.
						</td>
					</tr>
				</table>
				<br><br><br><br>
				<table>
					<tr>
						<td colspan="6"><b>Batu, 23 Desember 2015</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>PIHAK KEDUA</b></td>
						<td colspan="2"><b>PIHAK PERTAMA</b></td>
					</tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr>
						<td colspan="4"><b>(..................)</b></td>
						<td colspan="2"><b>'.$nmdr.'</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>Mengetahui,</b></td>
						<td colspan="2"><b>Saksi,</b></td>
					</tr>
					<tr>
						<td colspan="4"><b>Dinas Kab/Kota .........................</b></td>
						<td colspan="2"><b>Orang tua/wali</b></td>
					</tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr><td colspan="6"></td></tr>
					<tr>
						<td colspan="4"><b>(..................)</b></td>
						<td colspan="2"><b>('.$nmbp.')</b></td>
					</tr>
					<tr>
						<td colspan="6"><b>NIP : </b></td>
					</tr>
				</table>
		    ';
		}
	    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		$pdf->Output('example_001.pdf', 'I');   
    }
	
	function sp_ahli_waris() {
	
	$id 		= $this->session->userdata("detailuser");
	$nama 		= $this->m_printout->nama($id);
	$tempatlahir= $this->m_printout->tempatlahir($id);
	$tgllahir	= $this->m_printout->tgllahir($id);
	$alamat 	= $this->m_printout->alamat($id);
	$nama_waris = $this->m_printout->nama_waris($id);
	$ttl_waris 	= "-";
	$alamat_waris = $this->m_printout->alamat($id);
	$result = $this->m_printout->ambil_data_disnaker($id);
	foreach($result->result() as $row) {
		$nmds = $row->nama;
		$tplh = $row->tempatlahir;
		$tglh = $row->tanggallahir;
		$almt = $row->alamat;
	}
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
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
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN AHLI WARIS</h2>
			<br>
			<table cellspacing="2" cellpadding="2">
			<tbody>
			<tr>
			<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">'."$nama".'</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">'."$tempatlahir, $tgllahir".'</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">'."$alamat".'</td>
			</tr>
			<tr>
			<td colspan="2" width="246"></td>
			</tr>
			<tr>
			<td colspan="5" width="662"></td>
			</tr>
			<tr>
			<td colspan="5" width="662">Menyatakan bahwa selama menjadi tenaga kerja diluar negeri bilamana terjadi kecelakaan atau kematian maka saya melimpahkan/mewariskan kepada :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">'.$nmds.'</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">'.$tplh.', '.$tglh.'</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">'.$almt.'</td>
			</tr>
			<tr>
			<td colspan="2" width="246"></td>
			</tr>
			<tr>
			<td colspan="5" width="662"></td>
			</tr>
			<tr>
			<td colspan="5" width="662">Demikian surat pernyataan ahli waris ini saya buat dengan sebenarnya, tanpa ada paksaan dari pihak manapun dan untuk dipergunakan sebagaimana mestinya.<br><br><br><br><br></td>
			</tr>
			<tr>
			<td colspan="5" width="662"></td>
			</tr>
			<tr>
			<td colspan="4" width="406"></td>
			<td width="255">Malang, '.date("d F Y").'</td>
			</tr>
			<tr>
			<td rowspan="3" width="76"></td>
			<td colspan="3" width="331">Yang Memberi Kuasa</td>
			<td width="255">Yang Diberi Kuasa</td>
			</tr>
			<tr>
			<td colspan="3" width="331"></td>
			<td width="255"></td>
			</tr>
			<tr><br><br><br><br><br>
			<td colspan="3" width="331">'."$nama".'</td>
			<td width="255">'."$nmds".'</td>
			</tr>
			</tbody>
			</table>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

    function s_ijin_keluarga() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT IJIN KELUARGA</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
			<tbody>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="4" width="605">Saya yang bertanda tangan di bawah ini :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">No KTP/SIM</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="4" width="605">Memberikan ijin kepada  ...........................................................  saya :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">No Paspor</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="4" width="605">Saya sebagai _____________ memberikan ijin/tidak keberatan ___________ saya</td>
			</tr>
			<tr>
			<td colspan="5" width="662">bekerja ke ______________ sebagai TKI/TKW dan saya bersedia menanggung resiko dan akibatnya.</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="4" width="605">Demikian syarat pernyataan ini saya buat dengan sebenarnya dalam keadaan sadar</td>
			</tr>
			<tr>
			<td colspan="5" width="662">dan tanpa ada unsur paksaan dari pihak manapun dan dapat dipergunakan sebagaimana mestinya.</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="4" width="416">&nbsp;</td>
			<td width="246">Banyuwangi/Malang, tgl-bln-tahun</td>
			</tr>
			<tr>
			<td rowspan="3" width="57">&nbsp;</td>
			<td colspan="3" width="359">Yang diberi pernyataan</td>
			<td width="246">Yang membuat pernyataan,</td>
			</tr>
			<br><br><br><br>
			<tr>
			<td colspan="3" width="359">Nama terang</td>
			<td width="246">Nama terang</td>
			</tr>
			<tr>
			<td width="57">&nbsp;</td>
			<td colspan="3" width="359">&nbsp;</td>
			<td width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662" align="center">Mengetahui,</td>
			</tr>
			<tr>
			<td colspan="5" width="662" align="center">Kepala Desa Kelurahan</td>
			</tr>
			<br><br><br><br>
			<tr>
			<td colspan="5" width="662" align="center">Nama Terang</td>
			</tr>
			</tbody>
			</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
	

	 function sp_ket_ahli_waris() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN KETERANGAN AHLI WARIS</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
			<tbody>
			<br>
			<tr>
			<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">&nbsp;</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Status</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Sebagai pihak I(satu) memberikan kuasa kepada :</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Nama</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
			<td width="19">:</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Status</td>
			<td width="19">&nbsp;</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Hubungan Keluarga</td>
			<td width="19">&nbsp;</td>
			<td colspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="2" rowspan="2" width="397">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="246">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Sebagai pihak ke II (dua) yang selanjutnya diberi kuasa.</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Pihak ke satu akan bekerja ke luar negeri dengan negara tujuan ________________ selama kontrak ______________ tahun melalui PT __________________________</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Apabila selama masa kontrak kerja terjadi kecelakaan/sakit/meninggal dunia, maka untuk selanjutnya segala urusan tentang hak dan kewajiban saya berikan kepada pihak ke II (dua) untuk mengurus, menerima hak dan kewajiban saya sesuai dengan aturan yang berlaku.</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" width="662">Demikian surat pernyataan keterangan ahli waris ini saya buat dengan sadar tanpa adanya paksaan dari pihak manapun dan di pergunakan sebagaimana mestinya.</td>
			</tr>
			<tr>
			<td colspan="5" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="4" width="416">&nbsp;</td>
			<td width="246">Banyuwangi/Malang, tgl-bln-tahun</td>
			</tr>
			<tr>
			<td rowspan="3" width="57">&nbsp;</td>
			<td colspan="3" width="359">Yang diberi kuasa</td>
			<td width="246">Yang memberi kuasa</td>
			</tr>
			<tr>
			<td colspan="3" width="359">&nbsp;</td>
			<td width="246">&nbsp;

			&nbsp;

			&nbsp;</td>
			</tr>
			<tr>
			<td colspan="3" width="359">Nama terang</td>
			<td width="246">Nama terang</td>
			</tr>
			</tbody>
			</table>
			

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }


     function s_perjanjian() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
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
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 11, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERJANJIAN / PERNYATAAN</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="6" width="662"><strong>SURAT PERJANJIAN / PERNYATAAN</strong></td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Saya yang bertanda tangan di bawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="161">Nama</td>
				<td width="19">:</td>
				<td colspan="3" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">Tanggal Lahir</td>
				<td width="19">&nbsp;</td>
				<td colspan="3" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">No Paspor</td>
				<td width="19">:</td>
				<td colspan="3" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">Status</td>
				<td width="19">&nbsp;</td>
				<td colspan="3" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="3" rowspan="2" width="482">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="161">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Menyatakan bahwa :</td>
				</tr>
				<tr>
				<td colspan="6" width="662">1.      Saya bersedia bekerja di Taiwan sebagai <strong><em><u>Care Taker</u></em></strong> dengan gaji pokok <strong>NT$</strong> 15840 /bulan. Untuk kontrak kerja selama 3 tahun dengan biaya serta pelaksanaan pengurusan proses Administrasi sampai pemberangkatan dilaksanakan oleh <strong>PT.FLAMBOYAN GEMA JASA  - MALANG</strong>

				2.      Untuk mendapatkan pekerjaan di Taiwan saya mempunyai tanggungan ke bank sebesar <strong>NT$ 45.441</strong> atau <strong>Rp 17.591.050,-</strong> (Tujuh belas juta lima ratus sembilan satu lima puluh rupiah) untuk biaya proses, yang pengembaliannya ditetapkan oleh disnaker Indonesia dan badan Perburuan Taiwan (<strong>NT$ 5.890</strong>/bulannya untuk total 9 bulan periode) diproses melalui pemotongan gaji oleh Bank Taiwan sesuai perjanjian dengan pihak Bank Taiwan.

				3.      Saya bersedia dan sanggup mengikuti pendidikan dan pelatihan yang diadakan oleh <strong>PT.FLAMBOYAN GEMA JASA – MALANG</strong>

				4.      Saya bersedia dan sanggup mengganti biaya proses administrasi dan pelatihan di <strong>PT. FLAMBOYAN GEMA JASA – MALANG</strong> apabila mengundurkan diri atau dikeluarkan dari <strong>PT. FLAMBOYAN GEMA JASA – MALANG</strong> karena melanggar aturan dan ketentuan <strong>PT. FLAMBOYAN GEMA JASA – MALANG</strong> sebagai berikut:</td>
				</tr>
				<tr>
				<td colspan="4" width="331">a.       Setelah medical

				b.      Setelah proses passport

				c.       Setelah proses administrasi

				d.      Setelah mendapat majikan

				e.       Setelah pemberangkatan</td>
				<td colspan="2" width="331">Rp      500.000,-

				Rp   2.500.000,-

				Rp   4.500.000,-

				Rp   7.500.000,-

				Rp 15.000.000,-</td>
				</tr>
				<tr>
				<td colspan="6" width="662">5.      Saya tidak akan menuntut dalam bentuk apapun apabila tidak lulus seleksi yang diadakan oleh PT. FLAMBOYAN GEMA JASA – MALANG dan DISNAKER.

				6.      Apabila tidak dapaat menyelesaikan kontrak kerja selama 3 tahun dikarenakan kesalahan saya, maka saya harus membiayai kepulangan saya sendiri.

				7.      Saya tidak keberatan serta menyetujui dan menunjuk keluarga yang menandatangi surat ijin keluarga dan ikut bertanggungjawab apabila terjadi penyimpangan.

				8.      Saya bersedia dan sanggup mentaati peraturan yang ada di <strong>PT. FLAMBOYAN GEMA JASA – MALANG.</strong>

				9.      Penyataan /perjanjian ini dibuat oleh saya dalam keadaan sadar tanpa adanya paksaan dari pihak manapun juga.</td>
				</tr>
				<tr>
				<td colspan="5" width="340">Banyuwangi/Malang, tgl-bln-tahun</td>
				<td width="321">&nbsp;</td>
				</tr>
				<tr>
				<td rowspan="3" width="19">&nbsp;</td>
				<td colspan="4" width="321">Yang menyatakan/membuat perjanjian</td>
				<td width="321">Sponsor / Saksi</td>
				</tr>
				<tr>
				<td colspan="4" width="321">&nbsp;</td>
				<td width="321">&nbsp;

				&nbsp;

				&nbsp;</td>
				</tr>
				<tr>
				<td colspan="4" width="321">Nama terang</td>
				<td width="321">Nama terang</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }


     function s_kuasa() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT KUASA</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
			<tbody>
			<tr>
			<td colspan="6" width="662"><strong>SURAT KUASA</strong></td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">Saya yang bertanda tangan di bawah ini :</td>
			</tr>
			<tr>
			<td colspan="2" width="180">Nama / No ID</td>
			<td width="19">:</td>
			<td colspan="2" width="265">&nbsp;</td>
			<td width="198">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">Tempat / Tanggal Lahir</td>
			<td width="19">&nbsp;</td>
			<td colspan="2" width="265">&nbsp;</td>
			<td width="198">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">No Passport</td>
			<td width="19">:</td>
			<td colspan="3" width="463">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">Jenis Kelamin</td>
			<td width="19">&nbsp;</td>
			<td colspan="3" width="463">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">Alamat</td>
			<td rowspan="2" width="19">:</td>
			<td colspan="3" rowspan="2" width="463">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="180">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">Dengan ini memberikan kuasa kepada PT. FLAMBOYAN GEMA JASA untuk menerima claim asuransi.</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">Demikian surat kuasa ini dapat dipergunakan dengan semestinya, atas kerjasamanya kami ucapkan terima kasih.</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="6" width="662">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="4" width="359">Banyuwangi/Malang, tgl-bln-tahun</td>
			<td colspan="2" width="302">&nbsp;</td>
			</tr>
			<tr>
			<td rowspan="3" width="19">&nbsp;</td>
			<td colspan="3" width="340">Yang memberi kuasa</td>
			<td colspan="2" width="302">Yang diberi kuasa</td>
			</tr>
			<tr>
			<td colspan="3" width="340">&nbsp;</td>
			<td colspan="2" width="302">&nbsp;

			&nbsp;

			&nbsp;</td>
			</tr>
			<tr>
			<td colspan="3" width="340">Nama terang</td>
			<td colspan="2" width="302">Nama terang</td>
			</tr>
			<tr>
			<td width="19">&nbsp;</td>
			<td colspan="3" width="340">&nbsp;</td>
			<td colspan="2" width="302">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="4" rowspan="2" width="359">NAMA KELUARGA BISA DIHUBUNGI &amp; TELP</td>
			<td colspan="2" width="302">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="2" width="302">&nbsp;</td>
			</tr>
			</tbody>
			</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }



     function sp_legalitas_dok() {
		$id 				= $this->session->userdata("detailuser");
		$nama 				= $this->m_printout->nama($id);
		$tempatlahir		= $this->m_printout->tempatlahir($id);
		$tgllahir			= $this->m_printout->tgllahir($id);
		$alamat 			= $this->m_printout->alamat($id);
		$jenis_kelamin 		= $this->m_printout->jenis_kelamin($id);
		$nama_direktur 		= "AGNATIUS ATMADJAJA";
		$jabatan_direktur	= "Direktur Utama PT. FLMABOYAN GEMEJASA";
		$alamat_perusahaan 	= "Jl. TVRI Gang I Oro-Oro Ombo Batu Malang";
		$jabatan_tki		= "Calon Tenaga Kerja Indonesia (CTKI)";
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
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
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN LEGALITAS DOKUMEN</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="5" width="662"><strong>SURAT PERNYATAAN LEGALITAS DOKUMEN</strong></td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="180">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="463">'.$nama.'</td>
				</tr>
				<tr>
				<td colspan="2" width="180">Tempat / Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="463">'.$tempatlahir.', '.$tgllahir.'</td>
				</tr>
				<tr>
				<td colspan="2" width="180">Jenis Kelamin</td>
				<td width="19">:</td>
				<td colspan="2" width="463">'.$jenis_kelamin.'</td>
				</tr>
				<tr>
				<td colspan="2" width="180">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="463">'.$alamat.'</td>
				</tr>
				<tr>
				<td colspan="2" width="180">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Dengan ini menyatakan sesungguhnya bahwa dokumen-dokumen yang saya bawa sendiri dari rumah yang terdiri dari :</td>
				</tr>
				<tr>
				<td colspan="5" width="662">
				a.      KTP
				<br>
				b.      Kartu Keluarga (KK)
				<br>
				c.      Ijazah / Akte Lahir/Surat Nikah
				<br>
				d.      Ijin Keluarga</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Adalah <strong>BENAR</strong> dan <strong>DAPAT DI PERTANGGUNGJAWABKAN.</strong></td>
				</tr><br>
				<tr>
				<td colspan="5" width="662">Apabila dokumen-dokumen tersebut ternyata tidak benar/palsu, maka dalam hal ini saya bertanggungjawab atas denda maupun hukum yang berlaku serta tidak akan melibatkan PT. FLAMBYAN GEMAJASA – MALANG.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Dengan ini menyatakan pula bahwa saya BELUM/PERNAH berangkat ke LUAR NEGERI dalam rangka apapun.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Demikian surat pernyataan ini saya buat dengan sebenarnya tanpa ada paksaan dari pihak manapun.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="4" width="359">Malang, '.date("d F Y").'</td>
				<td width="302">&nbsp;</td>
				</tr>
				<tr>
				<td rowspan="3" width="19">&nbsp;</td>
				<td colspan="3" width="340">Yang membuat pernyataan</td>
				<td width="302">Mengetahui sponsor,</td>
				</tr>
				<tr>
				<td colspan="3" width="340">&nbsp;</td>
				<td width="302">&nbsp;

				&nbsp;

				&nbsp;</td>
				</tr><br><br><br>
				<tr>
				<td colspan="3" width="340">'.$nama.'</td>
				<td width="302">Nama terang</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

     function sr_skck() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT REKOMENDASI PEMBUATAN SKCK</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="7" width="662">Malang/Batu/banyuwangi, tanggal-bln-thn</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td width="87">Nomor</td>
				<td width="20">:</td>
				<td colspan="3" width="232">&nbsp;</td>
				<td colspan="2" width="323">Kepada</td>
				</tr>
				<tr>
				<td width="87">Lampiran</td>
				<td width="20">:</td>
				<td colspan="3" width="232">&nbsp;</td>
				<td colspan="2" width="323">Yth.</td>
				</tr>
				<tr>
				<td width="87">Perihal</td>
				<td width="20">:</td>
				<td colspan="3" width="232"><strong>Surat Rekomendasi Untuk</strong>

				<strong>Pembuatan SKCK</strong></td>
				<td colspan="2" width="323">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">Dengan hormat,</td>
				</tr>
				<tr>
				<td width="87">&nbsp;</td>
				<td colspan="6" width="575">Yang bertandatangan ini, saya :</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Nama</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Jabatan</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="3" rowspan="2" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">&nbsp;</td>
				</tr>
				<tr>
				<td width="87">&nbsp;</td>
				<td colspan="6" width="575">Dengan ini memberikan rekomendasi kepada :</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Nama</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Jabatan</td>
				<td width="19">:</td>
				<td colspan="3" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">Alamat</td>
				<td width="19">:</td>
				<td colspan="3" rowspan="2" width="453">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="3" width="190">&nbsp;</td>
				<td width="19">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="7" width="662">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk pengurusan SKCK sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan</td>
				</tr>
				<tr>
				<td colspan="7" width="662">Demikian atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</td>
				</tr>
				<tr>
				<td colspan="7" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" rowspan="3" width="366">&nbsp;</td>
				<td width="296">PT. FLAMBOYAN GEMAJASA</td>
				</tr>
				<tr>
				<td width="296">&nbsp;

				&nbsp;

				&nbsp;</td>
				</tr>
				<tr>
				<td width="296"><strong><u>Agnatius Atmadjaja</u></strong>

				Direktur Utama</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

     function sp_ahli_waris_1() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN KETERANGAN AHLI WARIS</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
				<td width="19">&nbsp;</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Status</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Sebagai pihak I(satu) memberikan kuasa kepada :</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Status</td>
				<td width="19">&nbsp;</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Hubungan Keluarga</td>
				<td width="19">&nbsp;</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Sebagai pihak ke II (dua) yang selanjutnya diberi kuasa.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Pihak ke satu akan bekerja ke luar negeri dengan negara tujuan ________________ selama kontrak ______________ tahun melalui PT __________________________</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Apabila selama masa kontrak kerja terjadi kecelakaan/sakit/meninggal dunia, maka untuk selanjutnya segala urusan tentang hak dan kewajiban saya berikan kepada pihak ke II (dua) untuk mengurus, menerima hak dan kewajiban saya sesuai dengan aturan yang berlaku.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Demikian surat pernyataan keterangan ahli waris ini saya buat dengan sadar tanpa adanya paksaan dari pihak manapun dan di pergunakan sebagaimana mestinya.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="4" width="416">&nbsp;</td>
				<td width="246">Banyuwangi/Malang, tgl-bln-tahun</td>
				</tr>
				<tr>
				<td rowspan="3" width="57">&nbsp;</td>
				<td colspan="3" width="359">Yang diberi kuasa</td>
				<td width="246">Yang memberi kuasa</td>
				</tr>
				<br><br><br>
				<tr>
				<td colspan="3" width="359">Nama terang</td>
				<td width="246">Nama terang</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }


     function sp_ijin_keluarga() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN IJIN KELUARGA</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="5" width="662">Saya yang bertanda tangan di bawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Pekerjaan</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Selaku  ............................................. dari calon tenaga kerja tersebut dibawah ini :</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Status</td>
				<td width="19">:</td>
				<td colspan="2" width="397">Belum kawin/kawin/cerai hidup/cerai mati</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Pekerjaan</td>
				<td width="19">:</td>
				<td colspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">Alamat</td>
				<td rowspan="2" width="19">:</td>
				<td colspan="2" rowspan="2" width="397">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="2" width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Dengan ini menyatakan bahwa saya memberi ijin ikhlas kepada .......................... saya untuk bekerja ke luar negeri dengan negara tujuan .................................., sebagai tenaga kerja Indonesia sesuai perjanjian kontrak kerja yang berlaku, maka saya selaku menyatakan akan bertanggungjawab penuh atas segala resiko serta tuntutan dari pihak manapun juga.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">Demikian pernyataan ini saya buat dengan sebanarnya dan dengan penuh rasa tanggungjawab dan disaksikan pejabat pemerintahan setempat untuk dijadikan data ikatan pedoman masing-masing pihak serta dapat digunakan sebagaimana mestinya.</td>
				</tr>
				<tr>
				<td colspan="5" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="4" width="416">&nbsp;</td>
				<td width="246">Banyuwangi/Malang, tgl-bln-tahun</td>
				</tr>
				<tr>
				<td rowspan="3" width="47">&nbsp;</td>
				<td colspan="3" width="369">Yang diberi ijin</td>
				<td width="246">Yang memberi ijin</td>
				</tr>
				<br><br><br>
				<tr>
				<td colspan="3" width="369">Nama terang</td>
				<td width="246">Nama terang</td>
				</tr>
				<tr>
				<td width="47">&nbsp;</td>
				<td colspan="3" width="369">&nbsp;</td>
				<td width="246">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="5" width="662" align="center">Mengetahui,</td>
				</tr>
				<tr>
				<td colspan="5" width="662" align="center">Kepala Desa Kelurahan</td>
				</tr>
				<br><br><br>
				<tr>
				<td colspan="5" width="662" align="center">Nama Terang</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

     function sp_ijin_wali() {
	
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->SetFont('dejavusans', '', 12, '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '<h2 align="center">SURAT PERNYATAAN IJIN ORANGTUA/SUAMI/ISTRI/WALI</h2>
			<br>

			<table cellspacing="2" cellpadding="2">
				<tbody>
				<tr>
				<td colspan="6" width="662">Saya yang bertanda tangan di bawah ini orangtua/suami/isteri/wali :</td>
				</tr>
				<tr>
				<td colspan="2" rowspan="7" width="57">&nbsp;</td>
				<td width="217">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">N.I.K</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Alamat</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Desa/Kelurahan</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Kecamatan</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Kabupaten/Kota</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">No Telp yang bisa dihubungi</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Memberikan izin untuk bekerja ke luar negeri kepada anak/suami/isteri dengan nama sbb:</td>
				</tr>
				<tr>
				<td colspan="2" rowspan="8" width="57">&nbsp;</td>
				<td width="217">Nama</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">N.I.K</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Tempat/Tanggal Lahir</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Jenis Kelamin</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Alamat</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Desa/Kelurahan</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Kecamatan</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td width="217">Kabupaten/Kota</td>
				<td width="19">:</td>
				<td colspan="2" width="369">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Yang akan ditempatkan melalui PTTKIS .............................................................. dan Agensi ........................................................ ke negara tujuan ......................................... jabatan ................................... dengan mana kontrak kerja selama ............................ tahun dengan gaji perbulan sebesar ............................................</td>
				</tr>
				<tr>
				<td colspan="6" width="662">Demikian surat ini saya buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</td>
				</tr>
				<tr>
				<td colspan="6" width="662">&nbsp;</td>
				</tr>
				<br><br>
				<tr>
				<td colspan="5" width="340">&nbsp;</td>
				<td width="321">Banyuwangi/Malang, tgl-bln-tahun</td>
				</tr>
				<tr>
				<td rowspan="3" width="47">&nbsp;</td>
				<td colspan="4" width="293">Yang diberi ijin</td>
				<td width="321">Yang memberi ijin</td>
				</tr>
				<tr>
				<td colspan="4" width="293">&nbsp;</td>
				<td width="321">&nbsp;</td>
				</tr>
				<br><br><br>
				<tr>
				<td colspan="4" width="293">Nama terang</td>
				<td width="321">Nama orangtua/wali/suami/isteri</td>
				</tr>
				</tbody>
				</table>

			';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

 function biodata() {
 	$id = $this->session->userdata("detailuser");

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-16', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT Flamboyan Gemajasa');
    $pdf->SetTitle($id);
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(5, 5, 5);
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
    //$pdf->SetFont('dejavusans', '', 12, '', true);   
//$fontname = TCPDF_FONTS::addTTFfont('C:/xampp/htdocs/flamboyan/application/libraries/tcpdf/fonts/simsun.ttf', 'TrueTypeUnicode', '', 32);

    // use the font
   // $pdf->SetFont($fontname, '', 14, '', false);
    $pdf->SetFont('simsun', '', 11);
	$pdf->AddPage(); 
    //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print


	$personalhtml='';
    $keluargahtml='';
    $workinghtml='';
    $kondisihtml='';
    $kethtml='';
    $permohonanhtml='';
    $pasporhtml='<tr>
			    <td class="tengah">PASPORT / 護照</td> 
			    <td class="tengah biru"> </td> 
			    <td class="tengah">到期-Berlaku sampai</td> 
			    <td class="tengah biru"> </td> ';
    $medicalhtml=' <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
			    <td class="tengah biru"> </td> 
			</tr>';
    $notelhtml='';
    $interviewhtml='';

$detailpengalamanfi='';

    $tampil_data_personal= $this->m_printout->tampil_data_personal($id);

 foreach ($tampil_data_personal as $rowpersonal) { 
	$personalhtml='<tr>
				<th> '.$id.'</th>
				<th class="biru"> PL : '.$rowpersonal->kode_sponsor.'</th>
				<th colspan="2"> 仲介公司-Agent : </th>
				<th colspan="2"> 僱主名稱-Nama Majikan : </th>
			</tr>
			<tr>
				<td colspan="2" rowspan="10" class="tengah"><img src="assets/uploads/'.$rowpersonal->foto.'" width="290" height="340"></td>
				<th colspan="4" class="biru tengah">個人資料 / Personal Data</th>
			</tr>
			<tr>
				<td class="tengah">姓名 Nama</td>
				<th colspan="2" class="kuning tengah">'.$rowpersonal->nama.'</th>
				<td colspan="2" class="kuning tengah">
					'.$rowpersonal->nama_mandarin.'
				</td>
			</tr>
			<tr>
				<td class="tengah">報到日期 Tanggal Daftar</td>
				<td class="kuning tengah">'.$rowpersonal->tanggaldaftar.'</td>
				<td class="tengah">性別 Jenis Kelamin</td>
				<td class="tengah">'.$rowpersonal->jeniskelamin.'</td>
			</tr>
			<tr>
				<td class="tengah">身 高 Tinggi Badan</td>
				<td class="kuning tengah">'.$rowpersonal->tinggi.' cm</td>
				<td class="tengah">國籍 Warganegara</td>
				<td class="tengah">'.$rowpersonal->warganegara.'</td>
			</tr>
			<tr>
				<td class="tengah">體 重 Berat Badan</td>
				<td class="kuning tengah">'.$rowpersonal->berat.' kg</td>
				<td class="tengah">生日 Tanggal Lahir</td>
				<td class="kuning tengah">'.$rowpersonal->tgllahir.'</td>
			</tr>
			<tr>
				<td class="tengah">宗 教 Agama</td>
				<td class=" tengah">'.$rowpersonal->agama.'</td>
				<td class="tengah">出生地點 Tempat Lahir</td>
				<td class="kuning tengah">'.$rowpersonal->tempatlahir.'</td>
			</tr>
			<tr>
				<td class="tengah">婚姻狀況 Status</td>
				<td class=" tengah">'.$rowpersonal->status.'</td>
				<td class="tengah">年 齡 Umur</td>
				<td class="kuning tengah">'.$rowpersonal->umur.' tahun 嵗</td>
			</tr>
			<tr>
				<td colspan="3"> Tanggal Menikah / cerai hidup 結婚/离婚日期</td>
				<td class="kuning"> '.$rowpersonal->tglmenikah.'</td>
			</tr>
			<tr>
				<td class="tengah"> 教育程度 Pendidikan</td>
				<td colspan="3" class=""> '.$rowpersonal->pendidikan.'</td>
			</tr>
			<tr>
				<td class="tengah"> 地址-Alamat</td>
				<td class="kuning"> '.$rowpersonal->alamat.'</td>
				<td class="tengah"> 省份-Propinsi</td>
				<td class=""> '.$rowpersonal->provinsi.'</td>
			</tr>
			<tr>
				<td colspan="2" class="tengah"> 語言能力 Bahasa</td>
				<td class="tengah"> 國語 Mandarin</td>
				<td class=""> '.$rowpersonal->mandarin.'</td>
				<td class="tengah"> 英語 Inggris</td>
				<td class=""> '.$rowpersonal->inggris.'</td>
			</tr>
			';
			$kethtml='
			<tr>
			    <td class="tengah">備 注 Keterangan</td> 
			    <td colspan="5"> '.$rowpersonal->keterangan.' </td> 
			</tr>
			';
   } 

       $tampil_data_family= $this->m_printout->tampil_data_family($id);

 foreach ($tampil_data_family as $rowfamily) { 

	$keluargahtml='
<tr>
				<td colspan="6" class="biru tengah">家庭資料 / Data Keluarga</td>
			</tr>
			<tr>
				<td colspan="2" class="coklat tengah">姓名 Nama dari</td>
				<td class="coklat tengah">年齡 Umur</td>
				<td class="coklat tengah">職業 Pekerjaan</td>
				<td>兄弟-saudara laki</td>
				<td class="kuning tengah">'.$rowfamily->saudara_laki.'</td>
			</tr>
			<tr>
			    <td class="tengah">父親 / Bapak</td> 
			    <td class="kuning tengah">'.$rowfamily->nama_bapak.'</td> 
			    <td class="kuning tengah">'.$rowfamily->umur_bapak.' tahun 嵗</td> 
			    <td class="kuning tengah">'.$rowfamily->kerja_bapak.'</td> 
			    <td>姐妹-saudara perempuan</td> 
			    <td class="kuning tengah">'.$rowfamily->saudar_pr.'</td> 
			</tr>
			<tr>
			    <td class="tengah">母親 / Ibu</td> 
			    <td class="kuning tengah">'.$rowfamily->nama_ibu.'</td> 
			    <td class="kuning tengah">'.$rowfamily->umur_ibu.' tahun 嵗</td> 
			    <td class="kuning tengah">'.$rowfamily->kerja_ibu.'</td> 
			    <td>排行-Anak ke</td> 
			    <td class="kuning tengah">'.$rowfamily->anak_ke.'</td> 
			</tr>
			<tr>
			    <td class="tengah">配偶 / Suami</td> 
			    <td class="kuning tengah">'.$rowfamily->nama_istri_suami.'</td> 
			    <td class="kuning tengah">'.$rowfamily->umur_istri_suami.' tahun 嵗</td> 
			    <td class="kuning tengah">'.$rowfamily->kerja_istri_suami.'</td> 
			    <td>子女人數anak </td> 
			    <td class="kuning tengah">'.$rowfamily->data_anak.'</td> 
			</tr>'
	;
 } 

        $tampil_data_working= $this->m_printout->tampil_data_working($id);

 foreach ($tampil_data_working as $rowworking) { 

	$workinghtml .='

			<tr>
				<td rowspan="2" class=" tengah">'.$rowworking->negara.'</td>
				<td rowspan="2" class=" tengah">'.$rowworking->isi.''.$rowworking->mandarin.';</td>
				<td colspan="2" class=" tengah">'.$rowworking->posisi.'</td>
				<td rowspan="2" class=" tengah">'.$rowworking->masa_kerja.'<br>'.$rowworking->tahun.'</td>
				<td rowspan="2" class=" tengah">'.$rowworking->alasan.'</td>
			</tr>
			<tr>
				<td colspan="2" class=" tengah">'.$rowworking->penjelasan.'</td>
			</tr>


	';

}

        $tampil_data_skill= $this->m_printout->tampil_data_skill($id);

 foreach ($tampil_data_skill as $rowskill) { 

$kondisihtml='
			<tr>
				<th colspan="6" class="biru tengah">KETRAMPILAN 專長 &amp; KONDISI FISIK 物理條件</th>
			</tr>
			<tr>
				<td class="coklat"> 專長 Keterampilan</td>
				<td colspan="5" class=""> '.$rowskill->keterampilan.'</td>
			</tr>
			<tr>
				<td class="coklat"> 嗜好 Hobby</td>
				<td colspan="5" class=""> '.$rowskill->hobi.'</td>
			</tr>
			<tr>
			    <td class="coklat"> 酒-Alkohol</td> 
			    <td class=""> '.$rowskill->alkohol.'</td> 
			    <td class="coklat"> 煙merokok</td> 
			    <td class=""> '.$rowskill->merokok.'</td> 
			    <td class="coklat"> 飲食-food</td> 
			    <td class=""> '.$rowskill->food.'</td> 
			</tr>
			<tr>
				<td rowspan="4"> 身體狀況 Kondisi Fisik</td>
				<td> 過敏-alergi</td> 
			    <td colspan="2" class=""> '.$rowskill->alergi.'</td> 
			    <td colspan="2"> Bisa mengangkat 能夠抱 '.$rowskill->angkat.' KG 公斤</td> 
			</tr>
			<tr>
				<td> 開刀 Operasi</td> 
			    <td colspan="2" class=""> '.$rowskill->operasi.'</td> 
			    <td colspan="2"> Push up-推升 '.$rowskill->pushup.'</td>
			</tr>
			<tr>
				<td> 剌青-Tato</td> 
			    <td colspan="2" class=""> '.$rowskill->tato.'</td> 
			    <td class="coklat"> 視力-penglihatan mata</td> 
			    <td class=""> '.$rowskill->peglihatan.'</td>
			</tr>
			<tr>
			    <td> 左撇子-tangan kidal</td> 
			    <td colspan="2" class=""> '.$rowskill->kidal.'</td> 
			    <td class="coklat"> 色盲-buta warna</td> 
			    <td class=""> '.$rowskill->butawarna.'</td> 
			</tr>

';

}

        $tampil_data_request= $this->m_printout->tampil_data_request($id);

 foreach ($tampil_data_request as $rowrequest) { 

		$permohonanhtml='
<tr>
				<td colspan="6" class="biru tengah">請求 PERMOHONAN</td>
			</tr>
			<tr>
			    <td class="tengah">Usaha majikan 雇主企業類型</td> 
			    <td colspan="2" class="tengah "> '.$rowrequest->usahamajikan.'</td> 
			    <td class="tengah">Jenis Pekerjaan 工作類型</td> 
			    <td colspan="2" class="tengah "> '.$rowrequest->jenispekerjaan.'</td> 
			</tr>
			<tr>
			    <td class="tengah">Waktu kerja 願意工作時間</td> 
			    <td colspan="2" class="tengah "> '.$rowrequest->waktukerja.'</td> 
			    <td class="tengah">Lokasi kerja 工作地點</td> 
			    <td colspan="2" class="tengah "> '.$rowrequest->lokasikerja.'</td> 
			</tr>
			<tr>
			    <td class="tengah">Kondisi kerja 工作意願</td> 
			    <td colspan="2" class="tengah "> '.$rowrequest->kondisikerja.'</td> 
			    <td class="tengah">Lembur 加班</td> 
			    <td colspan="2" class="tengah "> '.$rowrequest->lembur.'</td> 
			</tr>
			'.$kethtml.''
	;

}

        $tampil_data_interview= $this->m_printout->tampil_data_interview($id);

 foreach ($tampil_data_interview as $rowinterview) { 

		$interviewhtml='
<tr>
				<td colspan="6" class="biru tengah">面試評價 / Interview Appraisal</td>
			</tr>
			<tr>
				<td colspan="3" class="tengah">項 目 <br> ITEM</td>
				<td class="tengah"> 有經 EXPERIENCE</td>
				<td class="coklat tengah">訓練 <br> TRAINING</td>
				<td class="coklat tengah">願意做 WILINGNESS</td>
			</tr>
			<tr>
				<td colspan="3"> 抽痰 / SUCTION</td>
				<td class=" tengah"> '.$rowinterview->sunction.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3"> 鼻胃管 / FOOD SONDING</td>
				<td class=" tengah"> '.$rowinterview->food.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3"> 尿管 / CATETER</td>
				<td class=" tengah"> '.$rowinterview->cateter.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3"> 注射 / INJECTION</td>
				<td class=" tengah"> '.$rowinterview->injection.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3"> 拍背 / THERAPY BACK</td>
				<td class=" tengah"> '.$rowinterview->therapy.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3"> 扶持 HELPING / CARRYING WHEN PARIENT WALKING</td>
				<td class=" tengah"> '.$rowinterview->helping.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3"> 抱病人上下床 / 輪椅 CARRYINNG BATIENT UP / DOWN BED TO / FROM WHEELCHAIR</td>
				<td class=" tengah"> '.$rowinterview->bed.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3"> 抱病人上下樓梯 CARRYINNG PATIENT UP / DOWN STAIRS</td>
				<td class=" tengah"> '.$rowinterview->stairs.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			'.$kethtml.'
			'
	;

}



$tampil_data_paspor= $this->m_printout->tampil_data_paspor($id);

 foreach ($tampil_data_paspor as $rowpaspor) { 

if($rowpaspor->keterangan=="sudah"){

	$pasporhtml='
<tr>
			    <td class="tengah">PASPORT / 護照</td> 
			    <td class="tengah biru"> 有- ADA </td> 
			    <td class="tengah">到期-Berlaku sampai</td> 
			    <td class="tengah biru"> '.$rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired).'</td> 
	';
	}else{

$pasporhtml='
<tr>
			    <td class="tengah">PASPORT / 護照</td> 
			    <td class="tengah biru"> 沒有- BELUM ADA </td> 
			    <td class="tengah"> Rencana 安排 </td> 
			    <td class="tengah biru"> '.$rowpaspor->tglpengajuan.'</td> 
	';
	}
}

$tampil_data_medical= $this->m_printout->tampil_data_medical($id);

 foreach ($tampil_data_medical as $rowmedical) { 
	$medicalhtml='
			    <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
			    <td class="tengah biru"> '.$rowmedical->jenismedical.'</td> 
			</tr>'
	;
}
    $tampil_data_personal= $this->m_printout->tampil_data_personal($id);

 foreach ($tampil_data_personal as $rowpersonalx) { 

	$notelhtml='
<tr>
			    <td> Handphone</td> 
			    <td colspan="2" class="kuning"> '.$rowpersonalx->notelp.'</td> 
			    <td> No. Keluarga</td> 
			    <td colspan="2" class="kuning"> '.$rowpersonalx->notelpkel.'</td> 
			 </tr>'
	;
}










$stat = substr($id, 0, 2);

if($stat=='FF' || $stat=='MF' || $stat=='MI'){

   $header = '
 <style type="text/css">
	    	td, th {
				padding: 5px;
			}

			.biru {
				background-color: #a4d3ed;
			}

			.coklat {
				background-color: #e88e25;
			}

			.tengah {
				text-align: center;
			}
			
			.header1 {
				color: #13ad2c;
				font-size: 20px;
				text-align: center;
			}

			.header2 {
				color: #ff3838;
				text-align: center;
			}
		</style>
		<!-- AWAL HEADER -->
	    <table>
	    	<tr>
	    		<td colspan="6" class="header1">PT Flamboyan Gema Jasa</td>
	    	</tr>
	    	<tr>
	    		<td colspan="6" class="header2">Jl. Inspektur Suwoto No. 95B RT.02 RW.01 Ds.Sidodadi Kec.Lawang, Kab.Malang, East Java, Indonesia. Post code 65251 <br>Email : mahartatiang@yahoo.co.id</td>
	    	</tr>
	    </table>
	    <!-- AKHIR HEADER -->
		<!-- AWAL FORM 1 -->
		<table border="1">
			'.$personalhtml.''.$keluargahtml.'
			<tr>
				<th colspan="6" class="biru tengah">WORKING EXPERIENCE-工作經驗</th>
			</tr>
			<tr>
				<td rowspan="2" class="coklat tengah">受雇國家 Negara</td>
				<td rowspan="2" class="coklat tengah">Jenis Usaha 業務類別</td>
				<td colspan="2" class="coklat tengah">職務 Posisi</td>
				<td rowspan="2" class="coklat tengah">受雇期間 Masa Kerja</td>
				<td rowspan="2" class="coklat tengah">離職原因 Alasan berhenti bekerja</td>
			</tr>
			<tr>
				<td colspan="2" class="coklat tengah">工作性質 Penjelasan pekerjaan</td>
			</tr>
			'.$workinghtml.''.$kondisihtml.''.$permohonanhtml.''.$pasporhtml.''.$medicalhtml.''.$notelhtml.'
					 <tr>
			    <td colspan="6">
				    本人保證以上填寫內容屬實, 若往後發現與事實不符, 本人願接受雇主無條件解雇, 且不要求任何賠償.<br>
				    Saya menjamin semua yang saya tulis di atas benar adanya, jika pada akhirnya diketahui bahwa saya memberikan data palsu, saya bersedia dipecat tanpa ada komentar apa
			    </td> 
			 </tr>
			 <tr>
			    <td colspan="3">應徵者簽名 / Tanda tangan pelamar : </td> 
			    <td colspan="3">評審者簽名 / Tanda tangan penilai :</td> 
			</tr>
		</table>

    ';

}

if($stat=='JP'){
   $header = '
 <style type="text/css">
	    	td, th {
				padding: 5px;
			}

			.biru {
				background-color: #a4d3ed;
			}

			.coklat {
				background-color: #e88e25;
			}

			.tengah {
				text-align: center;
			}
			
			.header1 {
				color: #13ad2c;
				font-size: 20px;
				text-align: center;
			}

			.header2 {
				color: #ff3838;
				text-align: center;
			}
		</style>
		<!-- AWAL HEADER -->
	    <table>
	    	<tr>
	    		<td colspan="6" class="header1">PT Flamboyan Gema Jasa</td>
	    	</tr>
	    	<tr>
	    		<td colspan="6" class="header2">Jl. Inspektur Suwoto No. 95B RT.02 RW.01 Ds.Sidodadi Kec.Lawang, Kab.Malang, East Java, Indonesia. Post code 65251 <br>Email : mahartatiang@yahoo.co.id</td>
	    	</tr>
	    </table>
	    <!-- AKHIR HEADER -->
		<!-- AWAL FORM 1 -->
		<table border="1">
			'.$personalhtml.''.$keluargahtml.'
			<tr>
				<th colspan="6" class="biru tengah">WORKING EXPERIENCE-工作經驗</th>
			</tr>
			<tr>
				<td rowspan="2" class="coklat tengah">受雇國家 Negara</td>
				<td rowspan="2" class="coklat tengah">Jenis Usaha 業務類別</td>
				<td colspan="2" class="coklat tengah">職務 Posisi</td>
				<td rowspan="2" class="coklat tengah">受雇期間 Masa Kerja</td>
				<td rowspan="2" class="coklat tengah">離職原因 Alasan berhenti bekerja</td>
			</tr>
			<tr>
				<td colspan="2" class="coklat tengah">工作性質 Penjelasan pekerjaan</td>
			</tr>
			'.$workinghtml.''.$interviewhtml.''.$pasporhtml.''.$medicalhtml.''.$notelhtml.'
					 <tr>
			    <td colspan="6">
				    本人保證以上填寫內容屬實, 若往後發現與事實不符, 本人願接受雇主無條件解雇, 且不要求任何賠償.<br>
				    Saya menjamin semua yang saya tulis di atas benar adanya, jika pada akhirnya diketahui bahwa saya memberikan data palsu, saya bersedia dipecat tanpa ada komentar apa
			    </td> 
			 </tr>
			 <tr>
			    <td colspan="3">應徵者簽名 / Tanda tangan pelamar : </td> 
			    <td colspan="3">評審者簽名 / Tanda tangan penilai :</td> 
			</tr>
		</table>

    ';

}

if($stat=='FI'){
	$keluargafihtml='';
$keluargafi2html='';
$tugasfihtml='';

$tampil_data_familyfi= $this->m_printout->tampil_data_family($id);

 foreach ($tampil_data_familyfi as $rowfamilyfi) { 
	$keluargafihtml='
			<tr>
				<td colspan="2"> Nama Suami 配偶姓名</td>
				<td colspan="2" class="kuning"> '.$rowfamilyfi->nama_istri_suami.'</td>
			</tr>
			<tr>
				<td colspan="2"> Umur Suami 配偶年齡</td>
				<td colspan="2" class="kuning"> '.$rowfamilyfi->umur_istri_suami.'</td>
			</tr>
			<tr>
				<td colspan="2"> Pekerjaan Suami 配偶職業</td>
				<td colspan="2" class="biru"> '.$rowfamilyfi->kerja_istri_suami.'</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="2"> Jumlah Anak <br> 子女數及年齡 </td>
				<td colspan="2" class="kuning"> '.substr_count($rowfamilyfi->data_anak, 'tahun').' anak</td>
			</tr>
			<tr>
				<td colspan="2" class="kuning"> '.$rowfamilyfi->data_anak.'</td>
			</tr>
'
	;
  
$cwk=$rowfamilyfi->saudara_laki;
$cwek=$rowfamilyfi->saudar_pr;
$ttl=$cwk+$cwek;

 	$keluargafi2html='
			<tr>
				<td colspan="2"><b> Nama ayah 父親姓名</b></td>
				<td colspan="2" class="kuning tengah">'.$rowfamilyfi->nama_bapak.'</td>
				<td> Umur 年齡</td>
				<td class="kuning tengah">'.$rowfamilyfi->umur_bapak.' tahun 嵗</td>
			</tr>
			<tr>
				<td colspan="2"><b> Nama ibu 母親姓名</b></td>
				<td colspan="2" class="kuning tengah">'.$rowfamilyfi->nama_ibu.'</td>
				<td> Umur 年齡</td>
				<td class="kuning tengah">'.$rowfamilyfi->umur_ibu.' tahun 嵗</td>
			</tr>
			<tr>
				<td colspan="2"><b> Jumlah saudara 共有兄弟和姐妹</b></td>
				<td class="kuning tengah">'.$ttl.'</td>
				<td colspan="2"> Saya anak ke brp? 你是排第</td>
				<td class="kuning tengah">'.$rowfamilyfi->anak_ke.'</td>
			</tr>
'
	;
 } 


$negarahtml='';
$kerjahtml='';
$lamahtml='';
$periodehtml='';
$jamhtml='';
$majikanhtml='';
$alasanhtml='';
$lokasikerjahtml='';

$rumah='';
$masak='';
$cucibaju='';
$Menyetrika='';
$cucimobil='';
$merawatbinatang='';
$merawatbayi='';
$merawatanak='';
$umuranak='';
$kondisianak='';
$umur='';
$kondisinya='';
$umur2='';
$kondisinya2='';
$merawatjompo='';
$kondisijompo='';
$anggotarumah='';
$tiperumah='';
$lantairumah='';
$jumlahkamar='';
$keterangan='';

 $tampil_data_pengalamanfi= $this->m_printout->tampil_data_pengalaman($id);

 foreach ($tampil_data_pengalamanfi as $rowpengalamanfi) { 
$negarahtml.='<td class="biru tengah"> '.$rowpengalamanfi->negara.'</td>';
$kerjahtml.='<td class="biru tengah"> '.$rowpengalamanfi->lokasikerja.'</td>';
$lamahtml.='<td class="biru tengah"> '.$rowpengalamanfi->lamakerja.'</td>';
$periodehtml.='<td class="biru tengah"> '.$rowpengalamanfi->periodekerja.'</td>';
$jamhtml.='<td class="biru tengah"> '.$rowpengalamanfi->jamkerja.'</td>';
$majikanhtml.='<td class="biru tengah"> '.$rowpengalamanfi->majikan.'</td>';
$alasanhtml.='<td class="biru tengah"> '.$rowpengalamanfi->alasanberhenti.'</td>';

$krjprt=$rowpengalamanfi->kerjaprt;
$msk=$rowpengalamanfi->memasak;
$cucibj=$rowpengalamanfi->mencucibaju;
$strk=$rowpengalamanfi->setrikabaju;
$cucimb=$rowpengalamanfi->mencucimobil;
$rwtb=$rowpengalamanfi->rawatbinatang;

if($krjprt=='1'){$krjprt='V';}else{$krjprt=' ';}
if($msk=='1'){$msk='V';}else{$msk=' ';}
if($cucibj=='1'){$cucibj='V';}else{$cucibj=' ';}
if($strk=='1'){$strk='V';}else{$strk=' ';}
if($cucimb=='1'){$cucimb='V';}else{$cucimb=' ';}
if($rwtb=='1'){$rwtb='V';}else{$rwtb=' ';}

$rumah.='<td class="hijau tengah"> '.$krjprt.'</td>';
$masak.='<td class="hijau tengah"> '.$msk.'</td>';
$cucibaju.='<td class="hijau tengah"> '.$cucibj.'</td>';
$Menyetrika.='<td class="hijau tengah"> '.$strk.'</td>';
$cucimobil.='<td class="hijau tengah"> '.$cucimb.'</td>';
$merawatbinatang.='<td class="hijau tengah"> '.$rwtb.'</td>';



$merawatbayi.='<td class="kuning tengah"> '.$rowpengalamanfi->rawatbayi.'</td>';
$merawatanak.='<td class="kuning tengah"> '.$rowpengalamanfi->rawatanak.' Orang 位</td>';
$umuranak.='<td class="kuning tengah"> '.$rowpengalamanfi->umur.'</td>';
$kondisianak.='<td class="kuning tengah"> '.$rowpengalamanfi->kondisi.'</td>';

 $umur.='<td class="kuning tengah"> '.$rowpengalamanfi->jompoumur.' Tahun 嵗</td>';
 $kondisinya.='<td class="biru tengah"> '.$rowpengalamanfi->jompokondisi.'</td>';
 
  $umur2.='<td class="kuning tengah"> '.$rowpengalamanfi->jompoumur2.' Tahun 嵗</td>';
 $kondisinya2.='<td class="biru tengah"> '.$rowpengalamanfi->jompokondisi2.'</td>';
 
$merawatjompo.='<td class="kuning tengah"> '.$rowpengalamanfi->jompoumur.' sTahun 嵗</td>';
$kondisijompo.='<td class="biru tengah"> '.$rowpengalamanfi->jompokondisi.'</td>';
$anggotarumah.='<td class="kuning tengah"> '.$rowpengalamanfi->anggotarumah.' / Orang 名</td>';
$tiperumah.='<td class="biru tengah"> '.$rowpengalamanfi->tiperumah.'</td>';
$lantairumah.='<td class="kuning tengah"> '.$rowpengalamanfi->jumlahlantai.'</td>';
$jumlahkamar.='<td class="kuning tengah"> '.$rowpengalamanfi->jumlahkamar.'</td>';
$keterangan.='<td class="biru tengah"> '.$rowpengalamanfi->keterangan.'</td>';

 }
 
 // <tr>

	// 			<td colspan="2">Umur 年齡</td>
				
	// 			<td class="kuning tengah">Tahun 嵗</td>
	// 			<td class="kuning tengah">Tahun 嵗</td>
	// 			<td class="kuning tengah">Tahun 嵗</td>
	// 		</tr>
	// 		<tr>
	// 			<td colspan="2">Kondisi 情況</td>
				
	// 			<td class="biru tengah"></td>
	// 			<td class="biru tengah"></td>
	// 			<td class="biru tengah"></td>
	// 		</tr>

$detailpengalamanfi='
<tr>
				<td colspan="2" style="color: #0000FF;"><b> PENGALAMAN KERJA 工作經驗</b></td>
				<td class="tengah" style="color: #0000FF;"><b>I</b></td>
				<td class="tengah" style="color: #0000FF;"><b>II </b></td>
				<td class="tengah" style="color: #0000FF;"><b>III </b></td>
				<td class="tengah" style="color: #0000FF;"><b>IV </b></td>
			</tr>
			<tr>
				<td colspan="2"> Negara 國家</td>
				'.$negarahtml.'
			</tr>
			<tr>
				<td colspan="2"> Lokasi Kerja Taiwan 台灣工作地點</td>
				'.$kerjahtml.'
			</tr>
			<tr>
				<td colspan="2"> Lama Kerja (tahun/bulan) 工作期 (年 / 月）</td>
				'.$lamahtml.'
			</tr>
			<tr>
				<td colspan="2"> Periode Kerja 工作期間</td>
				'.$periodehtml.'
			</tr>
			<tr>
				<td colspan="2"> Jam Kerja 日常工作時間</td>
				'.$jamhtml.'
			</tr>
			<tr>
				<td colspan="2"> Majikan 雇主</td>
				'.$majikanhtml.'
			</tr>
			<tr>
				<td colspan="2"> Alasan berhenti kerja 離職原因</td>
				'.$alasanhtml.'
			</tr>
			<tr>
				<td colspan="6" style="color: #0000FF;"><b> TUGAS 工作範圍</b></td>
			</tr>
			<tr>
				<td colspan="2"> Kerja rumah tangga 家務事</td>
				'.$rumah.'
			</tr>
			<tr>
				<td colspan="2"> Memasak 煮食</td>
				'.$masak.'
			</tr>
			<tr>
				<td colspan="2"> Mencuci Baju 洗衫</td>
				'.$cucibaju.'
			</tr>
			<tr>
				<td colspan="2"> Menyetrika Baju 燙衫</td>
				'.$Menyetrika.'
			</tr>
			<tr>
				<td colspan="2"> Mencuci Mobil 洗機車</td>
				'.$cucimobil.'
			</tr>
			<tr>
				<td colspan="2"> Merawat Binatang 照顧寵物</td>
				'.$merawatbinatang.'
			</tr>
			<tr>
				<td colspan="2"> Merawat Bayi 照料初生嬰兒</td>
				'.$merawatbayi.'
			</tr>
			<tr>
				<td colspan="2"> Merawat Anak Kecil 照顧小孩</td>
				'.$merawatanak.'
			</tr>
			<tr>
				<td colspan="2"> Umur 年齡 </td>
				'.$umuranak.'
			</tr>
			<tr>
				<td colspan="2"> Kondisi 情況</td>
				'.$kondisianak.'
			</tr>
			
			<tr>
				<td rowspan="2"> merawat orang jompo 照顧老人laki 男- </td>
				<td> umur-年齡</td>
				'.$umur.'
			</tr>
			<tr>
				<td> kondisi-年齡</td>
				'.$kondisinya.'
			</tr>
			<tr>
				<td rowspan="2"> merawat orang jompo 照顧老人Wanita 女-</td>
				<td>umur-年齡</td>
				'.$umur2.'
			</tr>
			<tr>
				<td> kondisi-年齡</td>
				'.$kondisinya2.'
			</tr>
			<tr>
				<td colspan="2"> Jumlah anggota rumah 家庭成員數目</td>
				'.$anggotarumah.'
			</tr>
			<tr>
				<td colspan="2"> Tipe rumah majikan 居住類型</td>
				'.$tiperumah.'
			</tr>
			<tr>
				<td colspan="2"> Rumah berapa lantai 樓</td>
				'.$lantairumah.'
			</tr>
			<tr>
				<td colspan="2"> Jumlah kamar tidur 睡房</td>
				'.$jumlahkamar.'
			</tr>
			<tr>
				<td colspan="2"><b> Keterangan 備註</b></td>
				'.$keterangan.'
			</tr>

'
	;





    $tampil_data_personalfi= $this->m_printout->tampil_data_personal($id);

 foreach ($tampil_data_personalfi as $rowpersonalx) { 
$personalfihtml='<tr>
				<th colspan="4" class="coklat" style="font-size: 20px"><b> PT. FLAMBOYAN GEMAJASA</b></th>
				<th colspan="2" class="coklat tengah" style="font-size: 20px">'.$id.'</th>
			</tr>
			<tr>
				<th colspan="4" class="hijau" style="font-size: 20px"><b> General Trade & Labour Supplier</b></th>
				<th colspan="2" class="hijau tengah" style="font-size: 20px"><b></b>'.$rowpersonalx->kode_sponsor.'</th>
			</tr>
			<tr>
				<th colspan="4" style="color: #0000FF;"><b><br> PENCATATAN KUALIFIKASI TKW 女傭資料</b> </th>
				<td colspan="2" class="tengah"></td>
			</tr>
			<tr>
				<td colspan="2"> Tanggal Daftar 進日期</td>
				<td colspan="2" class="kuning"> '.$rowpersonalx->tanggaldaftar.'</td>
				<td colspan="2" rowspan="21"><img src="assets/uploads/'.$rowpersonalx->foto.'" width="230" height="330"></td>
			</tr>
			<tr>
				<td colspan="2"> Nama 姓名</td>
				<td class="tengah"> '.$rowpersonalx->nama.'</td>
				<td class="tengah"> '.$rowpersonalx->nama_mandarin.'</td>
			</tr>
			
			<tr>
				<td colspan="2"> Tanggal Lahir 日期地點</td>
				<td colspan="2" class="kuning"> '.$rowpersonalx->tgllahir.'</td>
			</tr>
			<tr>
				<td colspan="2"> Tempat Lahir 出生地點</td>
				<td colspan="2" class="kuning"> '.$rowpersonalx->tempatlahir.'</td>
			</tr>
			<tr>
				<td colspan="2"> Umur 年齡</td>
				<td colspan="2" class="kuning"> '.$rowpersonalx->umur.' Tahun 歲</td>
			</tr>
			<tr>
				<td colspan="2"> Tinggi Badan 身高</td>
				<td colspan="2" class="kuning"> '.$rowpersonalx->tinggi.' cm 公分</td>
			</tr>
			<tr>
				<td colspan="2"> Berat Badan 體重</td>
				<td colspan="2" class="kuning"> '.$rowpersonalx->berat.' kg 公斤</td>
			</tr>
			<tr>
				<td colspan="2"> Pendidikan 學歷</td>
				<td colspan="2" class="biru"> '.$rowpersonalx->pendidikan.'</td>
			</tr>
			<tr>
				<td colspan="2"> Agama 宗教</td>
				<td colspan="2" class="biru"> '.$rowpersonalx->agama.'</td>
			</tr>
			<tr>
				<td colspan="2"> Status 婚姻狀況</td>
				<td colspan="2" class="biru"> '.$rowpersonalx->status.'</td>
			</tr>
			<tr>
				<td colspan="2"> Tanggal menikah / cerai hidup 結婚 / 离婚日期</td>
				<td colspan="2" class="kuning"> '.$rowpersonalx->tglmenikah.'</td>
			</tr>
			'.$keluargafihtml.'



			<tr>
				<td rowspan="5"><b><br> Kemampuan Bahasa <br> 語言能力</b></td>
				<td> Mandarin 中文</td>
				<td class="biru" colspan="2"> '.$rowpersonalx->mandarin.'</td>
			</tr>
			<tr>
				<td> Taiyu 台語</td>
				<td class="biru" colspan="2"> '.$rowpersonalx->taiyu.'</td>
			</tr>
			<tr>
				<td> Inggris 英文</td>
				<td class="biru" colspan="2"> '.$rowpersonalx->inggris.'</td>
			</tr>
			<tr>
				<td> Cantonese 廣東</td>
				<td class="biru" colspan="2"> '.$rowpersonalx->cantonese.'</td>
			</tr>
			<tr>
				<td> Hakka 客家</td>
				<td class="biru" colspan="2"> '.$rowpersonalx->hakka.'</td>
			</tr>
			';

 }

 $tampil_data_tugas= $this->m_printout->tampil_data_tugas($id);
 foreach ($tampil_data_tugas as $tugas) { 
$tugasfihtml='
<tr>
				<td width="28%"> Pekerjaan rumah tangga 家務</td>
				<td width="5%" class="tengah">'.$tugas->pekerjaan_rt.'</td>
				<td width="28%"> Merawat bayi baru Lahir 照顧嬰兒</td>
				<td width="5%" class="tengah">'.$tugas->merawat_bayi.'</td>
				<td width="28%" > Merawat orang cacat 老弱病殘</td>
				<td width="6%" class="tengah">'.$tugas->cacat.'</td>
			</tr>
			<tr> 
				<td> Merawat anak kecil 看護小孩</td>
				<td class="kuning tengah">'.$tugas->anak_kecil.'</td>
				<td> Memasak 烹飪</td>
				<td class="kuning tengah">'.$tugas->memasak.'</td>
				<td> Merawat orang jompo 看護老人</td>
				<td class="kuning tengah">'.$tugas->jompo.'</td>
			</tr>
			';

 }

  $tampil_data_kettugas= $this->m_printout->tampil_data_kettugas($id);
$kettugasfihtml='';
 foreach ($tampil_data_kettugas as $kettugas) { 
$kettugasfihtml='

<tr>
				<td>1. </td>
				<td colspan="6">Merawat bayi baru lahir sampai 3 bulan 照顧零至三個月大之小孩</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t1_pengalaman).'</td>
                <td class="merah tengah"  style="color: #FBD4B4" > 雇主要求 </td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t1_bersedia).'</td>
			</tr>
			<tr>
				<td>2. </td>
				<td colspan="6">Merawat bayi 3-12 bulan 照顧三至十二個月大的小孩</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t2_pengalaman).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t2_latihan).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t2_bersedia).'</td>
			</tr>
			<tr>
				<td>3. </td>
				<td colspan="6">Merawat anak kecil 1-5 tahun 照顧一至五歲之小孩</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t3_pengalaman).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t3_latihan).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t3_bersedia).'</td>
			</tr>
			<tr>
				<td>4. </td>
				<td colspan="6">Merawat anak kecil 5-10 tahun</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t4_pengalaman).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t4_latihan).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t4_bersedia).'</td>
			</tr>
			<tr>
				<td>5. </td>
				<td colspan="6">Mengerjakan pekerjaan rumah umumnya 一般家務</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t5_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t5_bersedia).'</td>
			</tr>
			<tr>
				<td>6. </td>
				<td colspan="6">Mencuci baju dengan mesin cuci 使用洗衣機</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t6_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t6_bersedia).'</td>
			</tr>
			<tr>
				<td>7. </td>
				<td colspan="6">Memakai mesin penyedot debu 使用吸塵器</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t7_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t7_bersedia).'</td>
			</tr>
			<tr>
				<td>8. </td>
				<td colspan="6">Mencuci baju dengan tangan 手洗衣服</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t8_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t8_bersedia).'</td>
			</tr>
			<tr>
				<td>9. </td>
				<td colspan="6">Menjahit sederhana 縫糿</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t9_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t9_bersedia).'</td>
			</tr>
			<tr>
				<td>10. </td>
				<td colspan="6">Menyetrika baju 燙衫</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t10_pengalaman).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t10_latihan).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t10_bersedia).'</td>
			</tr>
			<tr>
				<td>11. </td>
				<td colspan="6">Memasak masakan cina 煮中國菜 / 豬肉</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t11_pengalaman).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t11_latihan).'</td>
                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t11_bersedia).'</td>
			</tr>
			<tr>
				<td>12. </td>
				<td colspan="6" class="kuning" style="background-color: #FBD4B4;">Makan daging babi 願意吃豬肉</td>
				<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t12_pengalaman).'</td>
				<td class="kuning tengah" style="background-color: #FFFF00;"></td>
				<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t12_bersedia).'</td>
			</tr>
			<tr> 
				<td>13. </td>
				<td colspan="6" class="kuning" style="background-color: #FBD4B4;" >Merawat binatang anjing 願意照顧寵物(狗)</td>
				<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t13_pengalaman).'</td>
				<td class="kuning tengah" style="background-color: #FFFF00;"></td>
				<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t13_bersedia).'</td>
			</tr>
			<tr>
				<td rowspan="2">14. </td> 
				<td rowspan="2" colspan="5">Tidur satu kamar dengan pasien 願意和被照顧的人一起睡</td>
				<td class="tengah" style="background-color: #FBD4B4;" >laki 男</td>
				<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t14apengalaman).'</td>
				<td class="kuning tengah" style="background-color: #FFFF00"></td>
				<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t14abersedia).'</td>
			</tr>
			<tr>
				<td class="tengah">wanita 女</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t14bpengalaman).'</td>
				<td class="tengah" style="background-color: #FFFF00"></td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t14bbersedia).'</td>
			</tr>
			<tr>
				<td>15. </td>
				<td colspan="6">Merawat orang cacat 照顧殘疾人仕</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t15_pengalaman).'</td>
				<td class="tengah" style="background-color: #FFFF00;"></td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t15_bersedia).'</td>
			</tr>
			<tr>
				<td>16. </td>
				<td colspan="6">Merawat pasien dibawah 60 tahun 照顧病人 (60嵗下）</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t16_pengalaman).'</td>
				<td class="tengah" style="background-color: #FFFF00;"></td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t16_bersedia).'</td>
			</tr>
			<tr>
				<td>17. </td>
				<td colspan="6">Merawat pasien diatas 60 tahun 照顧老人 / 病人 (60嵗上）</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t17_pengalaman).'</td>
				<td class="tengah" style="background-color: #FFFF00;"></td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t17_bersedia).'</td>
			</tr>
		</table>
		<table border="1">
			<tr>
				<td colspan="10" style="color: #0000FF;"><b>Kegiatan Menjaga Pasien 照顧病人的活動</b></td>
			</tr>
			<tr>
				<td>A. </td>
				<td colspan="6">Mengganti popok 換尿布</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t18_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t18_bersedia).'</td>
			</tr>
			<tr>
				<td>B. </td>
				<td colspan="6">Menyuapi makan 餵食</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t19_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t19_bersedia).'</td>
			</tr>
			<tr>
				<td>C. </td>
				<td colspan="6">Memandikan di kamar mandi 洗澡在廁所</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t20_pengalaman).'</td>
				<td class="hijau tengah" style="background-color: #FFFF00;"></td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t20_bersedia).'</td>
			</tr>
			<tr>
				<td>D. </td>
				<td colspan="6">Memandikan di ranjang 洗澡在床</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t21_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t21_bersedia).'</td>
			</tr>
			<tr>
				<td>E. </td>
				<td colspan="6">Membersihkan buang air besar 處理大小便</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t22_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t22_bersedia).'</td>
			</tr>
			<tr>
				<td>F. </td>
				<td colspan="6">Bangun di tengah malam 半夜要起床照顧病人</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t23_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t23_bersedia).'</td>
			</tr>
			<tr>
				<td>G. </td>
				<td colspan="6">Membantu pasien jalan 扶持</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t24_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t24_bersedia).'</td>
			</tr>
			<tr>
				<td>H. </td>
				<td colspan="6">Membantu pasien lemah 行動較弱需攙扶</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t25_pengalaman).'</td>
				<td class="tengah" style="background-color: #FFFF00;"></td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t25_bersedia).'</td>
			</tr>
			<tr>
				<td>I. </td>
				<td colspan="6">Menemani pasien ke rumah sakit 陪同去醫院</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t26_pengalaman).'</td>
				<td class="tengah" style="background-color: #FFFF00;"></td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t26_bersedia).'</td>
			</tr>
			<tr>
				<td>J. </td>
				<td colspan="6">Terapi 復健</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t27_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t27_bersedia).'</td>
			</tr>
			<tr>
				<td>K. </td>
				<td colspan="6">Menggunakan kursi roda 用轮椅</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t28_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t28_bersedia).'</td>
			</tr>
			<tr>
				<td>L. </td>
				<td colspan="6" class="coklat">Suntik insulin 注射胰島素</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t29_pengalaman).'</td>
				<td class="tengah" style="background-color: #FFFF00;"></td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t29_bersedia).'</td>
			</tr>
			<tr>
				<td>M. </td>
				<td colspan="6" class="coklat">Sedot dahak 抽痰</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t30_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t30_bersedia).'</td>
			</tr>
			<tr>
				<td>N. </td>
				<td colspan="6" class="coklat">Memberi makan lewat selang hidung 鼻胃管灌食</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t31_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t31_bersedia).'</td>
			</tr>
			<tr>
				<td>O. </td>
				<td colspan="6" class="coklat">Katheter 尿管</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t32_pengalaman).'</td>
				<td class="tengah" style="background-color: #FFFF00;"></td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t32_bersedia).'</td>
			</tr>
			<tr>
				<td>P. </td>
				<td colspan="6">Memisahkan pasien ranjang kursi roda dan sebaliknya 抱病人上下床/輪椅</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t33_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t33_bersedia).'</td>
			</tr>
			<tr>
				<td>Q. </td>
				<td colspan="6">Menggendong pasien naik turun tangga 抱病人上下樓梯</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t34_pengalaman).'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t34_bersedia).'</td>
			</tr>
			<tr>
				<td>R. </td>
				<td colspan="6">Bisa menggendong pasien berapa kg? 可以携带多少公斤的病人?</td>
				<td colspan="3" class="kuning tengah">'.$kettugas->t35_kg.' <b>KG</b></td>
			</tr>
			';

 }


    $tampil_data_personal= $this->m_printout->tampil_data_personal($id);

 foreach ($tampil_data_personal as $rowpersonalx) { 

	$notelfihtml='
	<td colspan="2" class="kuning">HANDPHONE : '.$rowpersonalx->notelp.'</td>'
	;
	$notelfi2html='
	<td colspan="2" class="kuning">HANDPHONE KELUARGA : '.$rowpersonalx->notelpkel.'</td>'
	;
}
$rencanafipaspor='';

$tampil_data_paspor= $this->m_printout->tampil_data_paspor($id);

 foreach ($tampil_data_paspor as $rowpaspor) { 

 	if($rowpaspor->keterangan=="sudah"){
	$pasporfihtml='
	<td rowspan="2"> PASPORT 護照</td>
				<td rowspan="2"> 有- ADA </td>
				<td colspan="2" class="kuning">Berlaku sampai / 到期 <br> '.$rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired).'</td>
 	
	';
	}else{
	$pasporfihtml='
	<td rowspan="2"> PASPORT 護照</td>
				<td rowspan="2"> 沒有- BELUM ADA </td>
				<td colspan="2" class="kuning">Berlaku sampai / 到期 <br>  </td>
 	
	';
	$rencanafipaspor='
			<td colspan="2" class="kuning"> Rencana 安排 : '.$rowpaspor->tglpengajuan.'</td>
	';

	}
}
$medicalfihtml ='<td rowspan="2"> PASPORT 護照</td>
';
$tampil_data_medical= $this->m_printout->tampil_data_medical($id);

 foreach ($tampil_data_medical as $rowmedical) { 
	$medicalfihtml='
	<td rowspan="2"> PASPORT 護照</td>
	'
			   
	;
}

$tampil_data_paspor= $this->m_printout->tampil_data_paspor($id);

 foreach ($tampil_data_paspor as $rowpaspor) { 

if($rowpaspor->keterangan=="sudah"){

	$pasporhtml='
<tr>
			    <td class="tengah">PASPORT / 護照</td> 
			    <td class="tengah biru"> 有- ADA </td> 
			    <td class="tengah">到期-Berlaku sampai</td> 
			    <td class="tengah biru"> '.$rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired).'</td> 
	';
	}else{

$pasporhtml='
<tr>
			    <td class="tengah">PASPORT / 護照</td> 
			    <td class="tengah biru"> 沒有- BELUM ADA </td> 
			    <td class="tengah"> Rencana 安排 </td> 
			    <td class="tengah biru"> '.$rowpaspor->tglpengajuan.'</td> 
	';
	}
}

$tampil_data_medical= $this->m_printout->tampil_data_medical($id);
$tampil_data_medical2= $this->m_printout->tampil_data_medical2($id);
$hitungmedicalsa= $this->m_printout->hitung_data_medical($id);

if($hitungmedicalsa==0){
	 foreach ($tampil_data_medical as $rowmedical) { 
	$medicalhtml='
			    <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
			    <td class="tengah biru"> '.$rowmedical->nama.'</td> 
			</tr>'
	;
}
	
}else{
		 foreach ($tampil_data_medical2 as $rowmedical2) { 
	$medicalhtml='
			    <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
			    <td class="tengah biru"> '.$rowmedical2->nama.'</td> 
			</tr>'
	;
}
	
}


    $tampil_data_personal= $this->m_printout->tampil_data_personal($id);

 foreach ($tampil_data_personal as $rowpersonalx) { 

	$notelhtml='
<tr>
			    <td>Handphone</td> 
			    <td colspan="2" class="kuning"> '.$rowpersonalx->notelp.'</td> 
			    <td>No. Keluarga</td> 
			    <td colspan="2" class="kuning"> '.$rowpersonalx->notelpkel.'</td> 
			 </tr>'
	;
	$lokasikerjahtml='
<tr>
			    <td class="tengah" colspan="2"> 工作地點要求 <br> Permintaan Lokasi Kerja </td> 
			    <td colspan="5" > '.$rowpersonalx->lokasikerja.'</td> 
			</tr>
	';
}



 $header = '
  <style type="text/css">
	    	td, th {
				padding: 5px;
			}

			

			

			.tengah {
				text-align: center;
			}
			
			.header1 {
				color: #13ad2c;
				font-size: 20px;
				text-align: center;
			}

			.header2 {
				color: #ff3838;
				text-align: center;
			}
		</style>
		<!-- AWAL FORM 1 -->
		<table border="1">
		'.$personalfihtml.''.$detailpengalamanfi.'
			<tr>
				<td colspan="6" style="color: #0000FF;"><b> LATAR BELAKANG KELUARGA 家庭狀況</b></td>
			</tr>
			'.$keluargafi2html.'

			<tr>
				<td colspan="6" style="color: #0000FF;"><b> Tugas dikerjakan dari terbaik (1) sampai dengan terburuk (6) 優先</b></td>
			</tr>'.$tugasfihtml.'
		</table>
		<table border="1">
			<tr>
				<td></td>
				<td colspan="6"></td>
				<td style="color: #0000FF;"><b> Pengalaman 經驗</b></td>
				<td style="color: #0000FF;"><b> Latihan 訓練</b></td>
				<td style="color: #0000FF;"><b> Bersedia 願意</b></td>
			</tr>
			'.$kettugasfihtml.'

			
		</table>
		<table border="1">
			
			'.$kethtml.'
			'.$lokasikerjahtml.'
			'.$pasporhtml.''.$medicalhtml.''.$notelhtml.'
		</table>

    ';

}


 

   


	
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);   
	$pdf->Output(''.$id.'.pdf', 'I');    
    }
}