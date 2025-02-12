<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Baru8 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_baru8');
			$this->load->library('Pdf');
	}
	
	function cetak() {

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('SURAT NOTARISAN KELUARGA (PANTI JOMPO)');
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
     $pdf->SetMargins(3, 4, 3);
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
    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<table align="center" style="font-size:20px;">
				<tr>
					<td><b>SURAT PERJANJIAN / PERNYATAAN</b></td>
				</tr>	
			 </table>
			 <br>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="20">Yang bertanda tangan di bawah ini: </td>
				</tr>
			 </table>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
					<th width="4%"></th><th width="20%">Nama  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Tempat/Tanggal lahir  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">NO. Paspor  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Jenis Kelamin  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th> ......................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%">Alamat  </th>
					<th width="4%"></th>
					<th width="4%"> : </th>
					<th width="88%"> ........................................................................................</th>
				</tr>
			 	<tr>
					<th width="4%"></th><th width="20%"></th>
					<th width="4%"></th>
					<th width="4%">  </th>
					<th width="88%"> ........................................................................................</th>
				</tr>
			 </table>
			 <br><br>
			 <table>
			 	<tr>
					<td colspan="20">Menyatakan bahwa :</td>
				</tr>
			 </table>			 
			 <br>
			 <table>			 	
			 	<tr>
					<td></td>
				</tr>
			 </table>
			 <table>
			 	<tr>
				<th align="center" colspan="4" >1. </th>
					<th colspan="80" >Saya bersedia bekerja di Taiwan sebagai <i><b><u>NURSE</b></u></i> dengan gaji pokok <b>NT$ 20.008</b> /bulan.
						Untuk kontrak kerja selama 3 tahun dengan biaya serta pelaksanaan pengurusan proses
							Administrasi sampai pemberangkatan dilaksanakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >2. </th>
					<th colspan="80" >Untuk mendapatkan pekerjaan di Taiwan saya mempunyai tanggungan ke Bank sebesar 
							<b>NT$ 47.361</b> atau <b>Rp 17.760.400,-</b> (Tujuh Belas Juta Tujuh Ratus Enam Puluh Empat Ratus Rupiah) untuk biaya proses, yang pengembaliannya ditetapkan oleh disnaker Indonesia dan Badan Perburuan Taiwan (<b>NT$ 5.932</b> / bulannya untuk total <b>10</b> bulan periode) diproses melalui pemotongan gaji oleh Bank Taiwan sesuai perjanjian dengan pihak Bank Taiwan.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >3. </th>
					<th colspan="80" >Saya bersedia dan sanggup mengikuti pendidikan dan pelatihan yang diadakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >4. </th>
					<th colspan="80" >Saya bersedia dan sanggup mengganti biaya proses administrasi dan pelatihan di <b>PT. FLAMBOYAN GEMAJASA – LAWANG</b> apabila mengundurkan diri atau dikeluarkan dari <b>PT. FLAMBOYAN GEMAJASA – LAWANG</b> karena melanggar aturan dan ketentuan <b>PT. FLAMBOYAN GEMAJASA – LAWANG,</b> sebagai berikut :
					</th>
				</tr>
				<br>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >a.</th>
					<th colspan="25" >Setelah medical</th>
					<th colspan="60" >Rp 500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >b.</th>
					<th colspan="25" >Setelah proses passport		</th>
					<th colspan="60" >Rp 2.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >c.</th>
					<th colspan="25" >Setelah proses administrasi		</th>
					<th colspan="60" >Rp 4.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >d.</th>
					<th colspan="25" >Setelah mendapatkan majikan		</th>
					<th colspan="60" >Rp 7.500.000,-</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" ></th>
					<th colspan="2" >e.</th>
					<th colspan="25" >Setelah pemberangkatan		</th>
					<th colspan="60" >Rp 15.000.000,-</th>
				</tr>
				<br>
			 	<tr>
				<th align="center" colspan="4" >5. </th>
					<th colspan="80" >Saya tidak akan menuntut dalam bentuk apapun apabila tidak lulus seleksi yang diadakan oleh <b>PT. FLAMBOYAN GEMAJASA – LAWANG</b> dan <b>DISNAKER.</b>
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >6. </th>
					<th colspan="80"> Apabila tidak dapat menyelesaikan kontrak kerja selama 3 tahun dikarenakan kesalahan saya, maka saya harus membiayai kepulangan saya sendiri.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >7. </th>
					<th colspan="80">Saya tidak keberatan serta menyetujui dan menunjuk keluarga yang menandatangani surat ijin keluarga dan ikut bertanggung jawab apabila terjadi penyimpangan.
					</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >8. </th>
					<th colspan="80">Saya bersedia dan sanggup mentaati peraturan yang ada di <b>PT. FLAMBOYAN GEMAJASA – LAWANG.</b></th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >9. </th>
					<th colspan="80">Pernyataan / perjanjian ini dibuat oleh saya dalam keadaan sadar tanpa adanya paksaan dari pihak manapun juga.</th>
				</tr>
			 	<tr>
				<th align="center" colspan="4" >10. </th>
					<th colspan="80">Keluarga yang bertanda tangan sudah mengetahui pernyataan ini dan ikut bertanggung jawab penuh atas perihal di atas.</th>
				</tr>
			 </table>
			 <br>
			 <br>
			 <table>
			 	<tr>
					<td colspan="6"></td>
					<td colspan="40">LAWANG,</td>
				</tr>
			 	<tr>
					<td colspan="6"></td>
					<td colspan="15">Yang menyatakan / membuat perjanjian,</td>
					<td colspan="12"></td>
					<td colspan="15">Sponsor / Saksi,</td>
				</tr>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<tr>
					<td colspan="8"></td>
					<td colspan="15">(............................................)</td>
					<td colspan="8"></td>
					<td colspan="15">(............................................)</td>
				</tr>
				<br>
			 </table>
			 ';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('1. PKJ01-PK WANITA INFOMAL-BLANK.pdf', 'I');    
    }
}