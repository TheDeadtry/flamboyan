<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Print_medical_blm_terbang extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');
		$this->load->model('Modals');			

		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];

		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_admin');
		}		
		if ($id_user && $status!=1){
			redirect('dashboard');
		}
	}
	
	function index() {	
		$data['namamodule'] = "print_medical_blm_terbang";
		$data['namafileview'] = "print_medical_blm_terbang";
		echo Modules::run('template/new_admin_template', $data);
	}


	function ambildata(){

		$sql = "
			SELECT DISTINCT
				personal.id_biodata,
				personal.nama,
				personal.statusaktif,
				disnaker.tglonline,
				IF(medical3.tanggal IS NOT NULL, DATE_SUB( DATE_ADD(medical3.tanggal,INTERVAL 3 MONTH), INTERVAL 14 DAY) ,IF(medical2.tanggal IS NOT NULL ,DATE_SUB( DATE_ADD(medical2.tanggal,INTERVAL 3 MONTH), INTERVAL 14 DAY),IF(medical.tanggal IS NOT NULL ,DATE_SUB( DATE_ADD(medical.tanggal,INTERVAL 3 MONTH), INTERVAL 14 DAY), 'kosong'))) expired
			FROM
				personal
			LEFT JOIN marka_biotoagen ON personal.id_biodata = marka_biotoagen.id_biodata
			LEFT JOIN visa ON personal.id_biodata = visa.id_biodata
			LEFT JOIN disnaker ON personal.id_biodata = disnaker.id_biodata
			LEFT JOIN medical ON personal.id_biodata = medical.id_biodata
			LEFT JOIN medical2 ON personal.id_biodata = medical2.id_biodata
			LEFT JOIN medical3 ON personal.id_biodata = medical3.id_biodata
			WHERE
				marka_biotoagen.tgl_to_agen != ''
			AND marka_biotoagen.tgldilepas = ''
			AND (
				(
					visa.statusterbang = 'A'
					AND visa.tanggalterbang > CURDATE()
				)
				OR (
					visa.statusterbang = 'C'
					OR visa.tanggalterbang > CURDATE()
					OR visa.tanggalterbang > CURDATE()
				)
				OR (
					visa.statusterbang IS NULL
					OR visa.tanggalterbang IS NULL
				)
			)
ORDER BY expired ASC
		";


		// plugin dimuali di kode ini
		$search = "";
		
		// untuk melakukan pencarian data
		if (isset($_POST["search"])) {
		    $search = "
		    AND (
		        personal.nama LIKE '%".strtoupper($_POST["search"])."%'
		        OR personal.id_biodata LIKE '%".strtoupper($_POST["search"])."%'
		    	)
		    ";
		}

		// limit data
		$limit="";
		$startnumber = 0;
		if (isset($_POST["limit"])) {
		    $startnumber += $_POST["limit"]*10;
		    $limit = " LIMIT ".($_POST["limit"]*10).", 10";
		}else{
		    $limit = " LIMIT 0, 10";
		}
		// hitung banyak data;
		$totalData = $this->db->query($sql.$search)->num_rows();
		// ambil datanya
		$db = $this->db->query($sql.$search.$limit)->result();
		// ini adalah kotak kosong untuk data
		$data = "";
		// data diisi disini
		foreach ( $db as $key => $value) {
		    $data .= "
		        <tr>
		            <td>".($key + 1 + $startnumber)."</td>
		            <td>".$value->id_biodata."</td>
		            <td>".$value->nama."</td>
		            <td>".$value->expired."</td>
		        </tr>
		    ";
		}
		// setting data
		$http_request = [
		    "totaldata" => $totalData,
		    "data" => $data
		];

		// tampilkan data ke dalam json
		echo json_encode($http_request);
	}



	function printdata(){

		$sql = "
			SELECT DISTINCT
				personal.id_biodata,
				personal.nama,
				personal.statusaktif,
				disnaker.tglonline,
				IF(medical3.tanggal IS NOT NULL, DATE_SUB( DATE_ADD(medical3.tanggal,INTERVAL 3 MONTH), INTERVAL 14 DAY) ,IF(medical2.tanggal IS NOT NULL ,DATE_SUB( DATE_ADD(medical2.tanggal,INTERVAL 3 MONTH), INTERVAL 14 DAY),IF(medical.tanggal IS NOT NULL ,DATE_SUB( DATE_ADD(medical.tanggal,INTERVAL 3 MONTH), INTERVAL 14 DAY), 'kosong'))) expired
			FROM
				personal
			LEFT JOIN marka_biotoagen ON personal.id_biodata = marka_biotoagen.id_biodata
			LEFT JOIN visa ON personal.id_biodata = visa.id_biodata
			LEFT JOIN disnaker ON personal.id_biodata = disnaker.id_biodata
			LEFT JOIN medical ON personal.id_biodata = medical.id_biodata
			LEFT JOIN medical2 ON personal.id_biodata = medical2.id_biodata
			LEFT JOIN medical3 ON personal.id_biodata = medical3.id_biodata
			WHERE
				marka_biotoagen.tgl_to_agen != ''
			AND marka_biotoagen.tgldilepas = ''
			AND (
				(
					visa.statusterbang = 'A'
					AND visa.tanggalterbang > CURDATE()
				)
				OR (
					visa.statusterbang = 'C'
					OR visa.tanggalterbang > CURDATE()
					OR visa.tanggalterbang > CURDATE()
				)
				OR (
					visa.statusterbang IS NULL
					OR visa.tanggalterbang IS NULL
				)
			)
			ORDER BY expired ASC
		";

		$dataprint = $this->db->query($sql)->result();

		$isidata = "";
		foreach ($dataprint as $key => $value) {
			$isidata .='
				<tr>
					<th colspan="2">'.($key+1).'</th>
					<th colspan="8">'.$value->id_biodata.'</th>
					<th colspan="8">'.$value->nama.'</th>
					<th colspan="4">'.$value->expired.'</th>
				</tr>
			';
		}



		$posisi = 'P';

		$this->load->library('Pdf');
	    // create new PDF document
	    $resolution= array(215.9, 330.2);
	    $pdf = new TCPDF($posisi, PDF_UNIT, $resolution, true, 'UTF-8', false);
	    // set document information
	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('SURAT PENGAJUAN LEGALISASI COST STRUCTURE');
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
	    $pdf->SetFont('times', '', '8', '', false);   
		$pdf->AddPage(); 
		// Set some content to print
    	$html = '<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
					<tr>
						<th><b> DAFTAR MEDIKAL EXPIRED BELUM TERBANG </b></th>   
					</tr>
					<tr>
						<th><b>PT. FLAMBOYAN GEMAJASA LAWANG</b></th>  
					</tr>				
				</table>
				<br>
				<br>
				<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
						<tr>
							<th colspan="2" > NO</th>  
							<th colspan="8" > ID TKI </th> 
							<th colspan="8" > Nama TKI </th> 
							<th colspan="4" > Tanggal EXPIRED</th>
						</tr>
						'.$isidata.'
				</table>

				<br><br>
				<table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
					<tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" align="center">Malang</th> 
					</tr><tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" > </th> 
						<th colspan="10" >  </th>  
					</tr><tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" > </th> 
						<th colspan="10" >  </th>   
					</tr>
					<tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" > </th> 
						<th colspan="10" >  </th>   
					</tr>
					<tr>
						<th colspan="2" >  </th> 
						<th colspan="8" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" >  </th> 
						<th colspan="10" >  </th> 
						<th colspan="4" >  </th> 
						<th colspan="6" > </th> 
						<th colspan="10" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>Direktur Utama </th> 
					</tr>
												
				</table>
				<br>
			';

    	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		$pdf->Output('SURAT REKOM IJIN TANGGAL.pdf', 'I'); 


	}

}