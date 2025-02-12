<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Baru2 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_baru2');
			$this->load->library('Pdf');
	}
	
	function cetak($id_penempatan) {
		
		$nama 				= $this->m_baru2->tampilnamatki($id_penempatan);
		$nama_agen 			= $this->m_baru2->tampil_nama_agen($id_penempatan);
		$id_pengguna 		= $this->m_baru2->tampil_id_pengguna($id_penempatan);
		$nomer_pengguna 	= $this->m_baru2->tampil_nomer_pengguna($id_penempatan);
		$alamat_pengguna 	= $this->m_baru2->tampil_alamat_pengguna($id_penempatan);
		$jabatan 			= $this->m_baru2->tampil_jabatan($id_penempatan);
		
		$tempatlahir 		= $this->m_baru2->tampiltempatlahir($id_penempatan);
		$tgllahir 			= $this->m_baru2->tampiltgllahir($id_penempatan);
		$jeniskelamin 		= $this->m_baru2->tampiljeniskelamin($id_penempatan);
		$alamat 			= $this->m_baru2->tampilalamat($id_penempatan);
		$notelp 			= $this->m_baru2->tampilnotelp($id_penempatan);
		$nama_bapak 		= $this->m_baru2->tampilnama_bapak($id_penempatan);
		$notelpkel 			= $this->m_baru2->tampilnotelpkel($id_penempatan);
		$pendidikan 		= $this->m_baru2->tampilpendidikan($id_penempatan);
		$status 			= $this->m_baru2->tampilstatus($id_penempatan);
		$nama_istri_suami 	= $this->m_baru2->tampilnama_istri_suami($id_penempatan);
			
			$gaji 						= $this->m_baru2->tampil_gaji($id_penempatan);
			$lembur 					= $this->m_baru2->tampil_lembur($id_penempatan);
		$hubungan 						= $this->m_baru2->tampil_hubungan($id_penempatan);
		$wali 							= $this->m_baru2->tampil_wali($id_penempatan);
		$nama_dinas 					= $this->m_baru2->tampil_nama_dinas($id_penempatan);

		$tanggal 						=date('d-m-Y');
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
 		$hari = $array_hari[date('N')];

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-16', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('PP INFORMAL');
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
     $pdf->SetMargins(10, 10, 10);
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
    $pdf->SetFont('sim', '', '12', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html = '<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th>PERJANJIAN PENEMPATAN </th>   
				</tr>
				<tr>
					<th><b>ANTARA</b></th>   
				</tr>
				<tr>
					<th><b>PELAKSANA PENEMPATAN TENAGA KERJA INDONESIA SWASTA (PPTKIS)</b></th>  
				</tr>
				<tr>
					<th><b>DENGAN CALON TENAGA KERJA INDONESIA</b></th>   
				</tr>
				<tr>
					<th><b>Nomor : </b></th>   
				</tr>
				<tr>
					<th><b>NEGARA PENEMPATAN : .TAIWAN</b></th>      
				</tr>
				
			 </table><br><br>
			
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center" colspan="73" >Pada hari ini '.$hari.' tanggal 30 bulan Mei tahun 2015 telah diadakan Perjanjian Penempatan antara :</th>      
				</tr>
				<br>
				<tr>
					<th colspan="2" >1</th>
					<th colspan="25" >Nama Penanggung Jawab</th>
					<th colspan="3">:</th>
					<th colspan="35">AGNATIUS ATMADJAJA</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. KTP </th>
					<th colspan="3">:</th>
					<th colspan="35">3579012907750002</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Jabatan </th>
					<th colspan="3">:</th>
					<th colspan="35">DIREKTUR UTAMA</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama PPTKIS </th>
					<th colspan="3">:</th>
					<th colspan="35">PT.FLAMBOYAN GEMAJASA</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nomor SIPPTKI </th>
					<th colspan="3">:</th>
					<th colspan="35">519/MEN/2012</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat </th>
					<th colspan="3">:</th>
					<th colspan="35">JL.TVRI GG.I ORO-ORO OMBO BATU-MALANG</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. Telepon/Fax/E-mail  </th>
					<th colspan="3">:</th>
					<th colspan="35">(0341) 597231 </th>            
				 </tr>
				 <br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Selanjutnya disebut PIHAK PERTAMA </th>           
				 </tr>
				 <br>
				  <tr>
					<th colspan="2" >2</th>
					<th colspan="25" >Nama Calon TKI</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Tempat & Tanggal Lahir </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$tempatlahir.' & '.$tgllahir.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Jenis Kelamin </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$jeniskelamin.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat (sesuai E-KTP) </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamat.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. Telepon / HP </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$notelp.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Orang Tua / Wali </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_bapak.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. Telepon / HP </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$notelpkel.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Pendidikan Terakhir </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$pendidikan.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Status Perkawinan </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$status.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_istri_suami.'</th>            
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamat.'</th>            
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >Selanjutnya disebut PIHAK KEDUA </th>           
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk melakukan dan melaksanakan perjanjian penempatan dengan ketentuan dan syarat-syarat sebagai berikut. </th>           
				 </tr>
			 </table>
			 <br pagebreak="true">
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>BAB I</b></th>   
				</tr>
				<tr>
					<th><b>HAK DAN KEWAJIBAN PIHAK PERTAMA</b></th>  
				</tr>				
			 </table>
			 <br><br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center" colspan="64" >pasal 1</th>   
				</tr>	
				<br>	
				<tr>
					<th colspan="3" >(1)</th>   
					<th colspan="61" > PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA untuk bekerja pada :</th>   
				</tr>	
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >a. Negara Tempat Bekerja	</th>
					<th colspan="3">:</th>
					<th colspan="35">TAIWAN</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >b. Nama Pengguna	</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_agen.'</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >c. ID Pengguna		</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$id_pengguna.'</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >d. No. Telp Pengguna	</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nomer_pengguna.'</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >e. Alamat Pengguna	</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamat_pengguna.'</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >f. Jabatan Pekerjaan	</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$jabatan.'</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >g. Gaji Pokok		</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$gaji.'</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >h. Lembur				</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$lembur.' /bulan (1 minggu = 1 kali libur)</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >i. Lama Kontrak Kerja		</th>
					<th colspan="3">:</th>
					<th colspan="35">2 (dua) Tahun</th>            
				 </tr>
				<tr>
					<th colspan="3" ></th>
					<th colspan="25" >j. Hari Libur		</th>
					<th colspan="3">:</th>
					<th colspan="35">1 (satu) hari/minggu</th>            
				 </tr>	
				 <tr>
					<th colspan="3" >(2)</th>   
					<th colspan="61" > PIHAK PERTAMA sanggup menempatkan PIHAK KEDUA sebagaimana tersebut pada ayat (1) selambat-lambatnya 3 (tiga) bulan setelah Perjanjian Penempatan di tandatangani (sesuai MoU).</th>   
				</tr>	
				<br>
				<tr>
					<th colspan="3" >(3)</th>   
					<th colspan="61" > PIHAK PERTAMA melalui mitra usahanya berkewajiban untuk memastikan bahwa PIHAK KEDUA bekerja sesuai dengan Perjanjian Kerja yang telah ditandatangani para pihak.</th>   
				</tr>	
				</table><br><br>
				<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>Pasal 2 </b></th>   
				</tr>
				<br>
				
				<tr>
					<th>PIHAK PERTAMA wajib memberikan jaminan keselamatan, kesehatan, keamanan dan PIHAK KEDUA sejak penandatanganan perjanjian penempatan, keberangkatan dari daerah asal, selama di tempat penampungan, berangkat ke TAIWAN dan sampai kembali ke Indonesia.</th>      
				</tr>
				<br>
				<tr>
					<th><b>Pasal 3 </b></th>   
				</tr>
				<br>
				
				<tr>
					<th>PIHAK PERTAMA wajib menyediakan tempat penampungan dan konsumsi yang layak sebelum keberangkatan bagi PIHAK KEDUA sesuai ketentuan yang berlaku.</th>      
				</tr>
				<br>
				<tr>
					<th><b>Pasal 4 </b></th>   
				</tr>
				<br>
				
				<tr>
					<th>PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam asuransi Pra Penempatan, Masa Penempatan dan Purna Penempatan</th>      
				</tr>
				<br>
				<tr>
					<th><b>Pasal 5 </b></th>   
				</tr>
				<br>
				<tr>  
					<th width="2%"></th>
					<th align="left" colspan="7" >(1)PIHAK PERTAMA wajib mengurus dokumen</th>   
				</tr>
				<br>
				<tr>
					<th width="2%"></th>  
					<th align="left" colspan="7" >(2) Keberangkatan PIHAK KEDUA berupa paspor, visa kerja, dan kepesertaan asuransi.</th>   
				</tr>
				<tr>  
					<th width="2%"></th>
					<th align="left" colspan="7" >(3) PIHAK KEDUA wajib membiayai pengurusan dokumen jati diri berupa pemeriksaan psikologi dan kesehatan, paspor, visa serta uji keterampilan / kompetensi.</th>   
				</tr>
				<br><br><br><br>
				<tr>
					<th width="2%"></th>
					<th><b>Pasal 19 </b></th>   
				</tr>
				
				<tr>
					<th width="2%"></th>
					<th>Perjanjian penempatan ini berlaku sejak ditandatangani oleh PIHAK PERTAMA dan PIHAK KEDUA sampai dengan 3 (tiga) bulan atau sampai PIHAK KEDUA bekerja ke Luar Negeri.</th>      
				</tr>
				
			 </table><br><br>
			 
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="30" align="left">Malang , '.$tanggal.'</th>   
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>  
					<th colspan="12" >PIHAK PERTAMA</th>   
					<th colspan="4" ></th>   
					<th colspan="12" >PIHAK KEDUA</th>    
				</tr>
				<br><br><br><br>
				<tr>
					<th colspan="2" ></th>  
					<th colspan="12" >('.$nama.')</th>   
					<th colspan="4" ></th>   
					<th colspan="12" >(AGNATIUS ATMADJAJA)</th>    
				</tr>
				<br><br><br><br><br>
				<tr>
					<th width="2%"></th>
					<th colspan="10" align="left">Mengetahui,</th>   
					<th colspan="10" ></th>  
					<th colspan="10" >Saksi</th>   
				</tr>
				<tr>
					<th width="2%"></th>
					<th colspan="10" align="left">Dinas Kab/Kota …………………………..</th>   
					<th colspan="10" ></th>  
					<th colspan="10" >'.$hubungan.'</th>   
				</tr>
				<br><br><br><br>
				<tr>
					<th width="2%"></th>
					<th colspan="10" align="left">'.$nama_dinas.'</th>   
					<th colspan="10" ></th>  
					<th colspan="10" >'.$wali.'</th>   
				</tr>
				<tr>
					<th width="2%"></th>
					<th colspan="10" align="left">NIP:</th>   
					<th colspan="10" ></th>  
					<th colspan="10" ></th>     
				</tr>
				
						
			 </table>
			';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }
}