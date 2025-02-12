<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pdf9 extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdf9');
			$this->load->library('Pdf');
	}
	
	function cetak() {


$tampil_data_majikan = $this->m_pdf9->tampil_data_majikan();

$tampildata='';
    $no=1;
foreach($tampil_data_majikan->result() as $row) {

$tampildata.='<tr nobr="true">
          <th align="center">'.$no.'</th>  
          <td>'.$row->kode_majikan.'</td>
          <td>'.$row->nama.'</td>
          <td>'.$row->namamajikan.'</td>
          <td>'.$row->hp.'</td>
          <td>'.$row->email.'</td>
          <td>'.$row->alamat.'</td>
          <td>'.$row->namaagen.'</td>
        </tr>';
 $no++;       
}

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(10, 20, 10);
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
    $pdf->SetFont('simsun', '', '10', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html = '<p align="center">PRINT DATA MAJIKAN </p>
			<br>
      	<table width="100%" cellspacing="0" cellpadding="2" border="1">
			  <tr>
          <th align="center" width="3%">#</th>
          <th align="center" width="10%" >Kode</th>
          <th align="center" width="15%">Nama</th>
          <th align="center" width="15%">Nama Taiwan</th>
          <th align="center" width="12%">Hadphone</th>
          <th align="center" width="13%">Email</th>
          <th align="center" width="17%">Alamat</th>
          <th align="center" width="15%">Nama Agen</th>
       </tr>
       '.$tampildata.'
			
			
			 </table>';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

  function cetakselected($kode='all') {
    if ($kode == 'all') {
      $tampil_data_majikan = $this->m_pdf9->tampil_data_majikan();
    } else {
      $tampil_data_majikan = $this->m_pdf9->tampil_data_majikan_selected($kode);
    }
    $tampildata='';
        $no=1;
        $namamajikan = '';
    foreach($tampil_data_majikan->result() as $row) {
    $tampildata.='<tr nobr="true">
              <th align="center">'.$no.'</th>  
              <td>'.$row->kode_majikan.'</td>
              <td>'.$row->nama.'</td>
              <td>'.$row->namamajikan.'</td>
              <td>'.$row->hp.'</td>
              <td>'.$row->email.'</td>
              <td>'.$row->alamat.'</td>
            </tr>';
      $namamajikan = $row->namaagen;
      $no++;       
    }
    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
      $pdf->SetMargins(10, 20, 10);
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
    $pdf->SetFont('simsun', '', '10', '', false);   
    $pdf->AddPage(); 
        
    $html = '<p align="center">PRINT DATA MAJIKAN '.$namamajikan.' </p>
      <br>
        <table width="100%" cellspacing="0" cellpadding="2" border="1">
        <tr>
          <th align="center" width="3%">#</th>
          <th align="center" width="10%" >Kode</th>
          <th align="center" width="15%">Nama</th>
          <th align="center" width="15%">Nama Taiwan</th>
          <th align="center" width="12%">Hadphone</th>
          <th align="center" width="13%">Email</th>
          <th align="center" width="32%">Alamat</th>
        </tr>
        '.$tampildata.'
      
      
        </table>';
      
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
    $pdf->Output('example_001.pdf', 'I');    
  }
  
  function cetakselectedword($kode='all') {
		  $document = new \PhpOffice\PhpWord\TemplateProcessor( "files/majikan_printlist.docx" );

      if ($kode == 'all') {
          $sql = "SELECT datamajikan.*,dataagen.nama as namaagen,datamajikan.id_majikan FROM datamajikan LEFT JOIN dataagen on datamajikan.kode_agen=dataagen.id_agen 
          ORDER BY datamajikan.namamajikan ASC, datamajikan.id_majikan ASC";
          $tampil_data_majikan = $this->db->query($sql)->result();
      } else {
          $sql = "SELECT datamajikan.*,dataagen.nama as namaagen,datamajikan.id_majikan FROM datamajikan 
          LEFT JOIN dataagen on datamajikan.kode_agen=dataagen.id_agen 
          WHERE dataagen.id_agen=$kode 
          ORDER BY datamajikan.namamajikan ASC, datamajikan.id_majikan ASC";
          $tampil_data_majikan = $this->db->query($sql)->result();
      }
      
			$document->cloneRow('x1', count($tampil_data_majikan) );
      $tampildata='';
      $no=1;
      $namamajikan = '';
      $nox = 1;
      $idsebelumnya = '';
      foreach($tampil_data_majikan as $row) {
          if ($idsebelumnya == $row->namamajikan) {
            $document->setValue('x1#'.$no, '');
            $nox--;
          } else {
            $document->setValue('x1#'.$no, $nox);
          }
          $document->setValue('x2#'.$no, $row->kode_majikan);
          $document->setValue('x3#'.$no, htmlspecialchars($row->nama));
          $document->setValue('x4#'.$no, $row->namamajikan);
          $document->setValue('x5#'.$no, $row->hp);
          $document->setValue('x6#'.$no, $row->email);
          $document->setValue('x7#'.$no, $row->alamat);
          $namamajikan = $row->namaagen;
          $idsebelumnya = $row->namamajikan;
          $no++;       
          $nox++;
      }
      
      $document->setValue('w1', $namamajikan );
    
      $filename = 'PRINT DATA MAJIKAN '.$namamajikan.'.docx';

      $isinya=$document->save($filename);

      header("Content-Description: File Transfer");
      header('Content-Disposition: attachment; filename="' . $filename . '"');
      header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
      header('Content-Transfer-Encoding: binary');
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Expires: 0');
        
      flush();
      readfile($isinya);
      unlink($isinya);
      exit;
  }


      function cetaksuhan() {


$tampil_data_suhan = $this->m_pdf9->tampil_data_suhan();

$tampildata='';
    $no=1;
foreach($tampil_data_suhan->result() as $row) {
  $tglterima='';
  $tampil_datahistory = $this->m_pdf9->tampil_datahistory($row->id_suhan);
foreach($tampil_datahistory->result() as $row2) {
$tglterima.='- '.$row2->tgl_terima.'<br>';
}

$tampildata.=' 
               <tr nobr="true">
                <th align="center">'.$no.'</th>  
                <td>'.$row->no_suhan.'</td>
               <td>'.$row->namamajikannya.'</td> 
               <td>'.$row->tglterbit.'</td>
               <td>'.$row->tglexp.'</td>
               <td>'.$row->tglbawa.'</td>
               <td>'.$row->tglminta.'</td>
               <td>'.$tglterima.'</td>
               <td>'.$row->quotasuhan.'</td>
               <td>'.$row->namaagen.'</td>
               </tr>';
 $no++;       
}

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(10, 20, 10);
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
    $pdf->SetFont('simsun', '', '10', '', false);   
  $pdf->AddPage(); 
  
  // Set some content to print
  
    $html = '<p align="center">PRINT DATA SUHAN </p>
      <br>
        <table width="100%" cellspacing="0" cellpadding="2" border="1">
        <tr>
         <th width="3%" align="center">No</th>
         <th width="8%">No Suhan</th>
         <th width="23%">Majikan</th>
         <th width="8%" align="center">tgl terbit</th>
         <th width="8%" align="center">tgl exp</th>
         <th width="8%" align="center">tgl bawa</th>
         <th width="8%" align="center">tgl minta</th>
         <th width="8%">tgl Terima</th>
         <th width="4%" align="center">Quota</th>
         <th width="22%">AGEN</th>
       </tr>
       '.$tampildata.'
      
      
       </table>';
      
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  $pdf->Output('example_001.pdf', 'I');    
    }


          function cetakvisapermit() {


$tampil_data_visapermit = $this->m_pdf9->tampil_data_visapermit();

$tampildata='';
    $no=1;
foreach($tampil_data_visapermit->result() as $row) {
  $tglterimavss='';
  $tampil_datahistoryvisapermit = $this->m_pdf9->tampil_datahistoryvisapermit($row->id_visapermit);
foreach($tampil_datahistoryvisapermit->result() as $row2) {
$tglterimavss.='- '.$row2->tgl_terima.'<br>';
}

$tampildata.=' 
               <tr nobr="true">
                <th align="center">'.$no.'</th>  
                <td>'.$row->no_suhan.'</td>
                <td>'.$row->no_visapermit.'</td>
                <td>'.$row->namagroupnya.'</td>
                <td>'.$row->namaagen.'</td>
                <td>'.$row->namamajikannya.'</td>
                <td>'.$row->tglterbitvs.'</td>
                <td>'.$row->tglexpvs.'</td>
                <td>'.$tglterimavss.'</td>
                <td>'.$row->tglsimpanvs.'</td>
                <td>'.$row->quotavs.'</td>
               </tr>';
 $no++;       
}

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(10, 20, 10);
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
    $pdf->SetFont('simsun', '', '10', '', false);   
  $pdf->AddPage(); 
  
  // Set some content to print
  
    $html = '<p align="center">PRINT DATA VISAPERMIT </p>
      <br>
        <table width="100%" cellspacing="0" cellpadding="2" border="1">
        <tr>
        <th align="center" width="3%"><b>No</b></th>
      <th align="center" width="8%"><b>No Suhan</b></th>
      <th align="center" width="8%"><b>No Visa Permit</b></th>
      <th align="center" width="15%"><b>Nama Group</b></th>
      <th align="center" width="15%"><b>Nama Agen</b></th>
      <th align="center" width="15%"><b>Nama Majikan</b></th>
      <th align="center" width="8%"><b>tgl terbit</b></th>
      <th align="center" width="8%"><b>tgl exp</b></th>
      <th align="center" width="8%"><b>tgl terima</b></th>
      <th align="center" width="8%"><b>tgl simpan</b></th>
       <th align="center" width="4%"><b>Quota</b></th>
       </tr>
       '.$tampildata.'
      
      
       </table>';
      
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  $pdf->Output('example_001.pdf', 'I');    
    }

              function cetaksemuadata() {


$tampil_data_visapermit = $this->m_pdf9->tampil_data_visapermit();

$tampildata='';
    $no=1;
foreach($tampil_data_visapermit->result() as $row) {
  $tglterimavss='';
  $tampil_datahistoryvisapermit = $this->m_pdf9->tampil_datahistoryvisapermit($row->id_visapermit);
foreach($tampil_datahistoryvisapermit->result() as $row2) {
$tglterimavss.='- '.$row2->tgl_terima.'<br>';
}

$tampildata.=' 
               <tr nobr="true">
                <th align="center">'.$no.'</th>  
                <td>'.$row->no_suhan.'</td>
                <td>'.$row->no_visapermit.'</td>
                <td>'.$row->namagroupnya.'</td>
                <td>'.$row->namaagen.'</td>
                <td>'.$row->namamajikannya.'</td>
                <td>'.$row->tglterbitvs.'</td>
                <td>'.$row->tglexpvs.'</td>
                <td>'.$tglterimavss.'</td>
                <td>'.$row->tglsimpanvs.'</td>
                <td>'.$row->quotavs.'</td>
               </tr>';
 $no++;       
}

    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
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
     $pdf->SetMargins(10, 20, 10);
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
    $pdf->SetFont('simsun', '', '10', '', false);   
  $pdf->AddPage(); 
  
  // Set some content to print
  
    $html = '<p align="center">PRINT DATA VISAPERMIT </p>
      <br>
        <table width="100%" cellspacing="0" cellpadding="2" border="1">
        <tr>
        <th align="center" width="3%"><b>No</b></th>
      <th align="center" width="8%"><b>No Suhan</b></th>
      <th align="center" width="8%"><b>No Visa Permit</b></th>
      <th align="center" width="15%"><b>Nama Group</b></th>
      <th align="center" width="15%"><b>Nama Agen</b></th>
      <th align="center" width="15%"><b>Nama Majikan</b></th>
      <th align="center" width="8%"><b>tgl terbit</b></th>
      <th align="center" width="8%"><b>tgl exp</b></th>
      <th align="center" width="8%"><b>tgl terima</b></th>
      <th align="center" width="8%"><b>tgl simpan</b></th>
       <th align="center" width="4%"><b>Quota</b></th>
       </tr>
       '.$tampildata.'
      
      
       </table>';
      
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  $pdf->Output('example_001.pdf', 'I');    
    }




}