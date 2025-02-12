<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_pdf_pp extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_baru1');
			$this->load->library('Pdf');
	}

	function _penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->_penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->_penyebut($nilai/10)." puluh". $this->_penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->_penyebut($nilai/100) . " ratus" . $this->_penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->_penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->_penyebut($nilai/1000) . " ribu" . $this->_penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->_penyebut($nilai/1000000) . " juta" . $this->_penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->_penyebut($nilai/1000000000) . " milyar" . $this->_penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->_penyebut($nilai/1000000000000) . " trilyun" . $this->_penyebut(fmod($nilai,1000000000000));
		}
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->_penyebut($nilai));
		} else {
			$hasil = trim($this->_penyebut($nilai));
		}
		return $hasil;
	}

	function formal($id_penempatan, $cabang="", $khusus = "") {

		$lamakontraknya = '2 (dua)';
		$dan = '';
		if($khusus == ""){
			$lamakontraknya = '3 (tiga)';
			$dan = ' dan';
		}
		$alamatptdigunakan = "JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI      KEC.LAWANG KABUPATEN MALANG";
		if($cabang == 2){
			$alamatptdigunakan = "Taman Sari RT-37 A Kel. Kroyo Kec. Karangmalang Kab. Sragen Provinsi Jawa Tengah";
		}

		$bapak = $this->db->query('SELECT * FROM pembuatan_perjanjian WHERE id_tki = "'.$id_penempatan.'"')->result();

		$tampil = $bapak[0]->hubsaksi;



		$a5 				= $this->m_baru1->ambildata($id_penempatan,'a5');
		$a6 				= $this->m_baru1->ambildata($id_penempatan,'a6');
		$a7 				= $this->m_baru1->ambildata($id_penempatan,'a7');
		$statusnya='';
		$nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
		$nomor 				= $this->m_baru1->tampilnomor($id_penempatan);
		$kode_agen 			= $this->m_baru1->tampil_kode_agen($id_penempatan);
		$nama_agen 			= $this->m_baru1->tampil_nama_agen($kode_agen);
$tampilalamatortu = $this->m_baru1->tampilalamatortu($id_penempatan);

		$id_pengguna 		= $this->m_baru1->tampil_id_pengguna($kode_agen);
		$nomer_pengguna 	= $this->m_baru1->tampil_nomer_pengguna($kode_agen);
		$alamat_pengguna 	= $this->m_baru1->tampil_alamat_pengguna($kode_agen);

		$jabatan 			= $this->m_baru1->tampil_jabatan($id_penempatan);

		$tempatlahir 		= $this->m_baru1->tampiltempatlahir($id_penempatan);
		$tgllahir2 			= $this->m_baru1->tampiltgllahir($id_penempatan);

		$lahiran=str_replace(".","-",$tgllahir2);
$tgllahir = date("d-m-Y", strtotime($lahiran));



		$jeniskelamin 		= $this->m_baru1->tampiljeniskelamin($id_penempatan);

if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}


		$alamat 			= $this->m_baru1->tampilalamat($id_penempatan);
		$notelp 			= $this->m_baru1->tampilnotelp($id_penempatan);



		if($tampil == 'wali'){
			$nama_bapak 		= $this->m_baru1->tampilnama_kontak($id_penempatan);
		}elseif($tampil == 'Ibu'){
			$nama_bapak 		= $this->m_baru1->tampilnama_ibu($id_penempatan);
		}else{
			$nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);
		}

		// $nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);




		$notelpkel 			= $this->m_baru1->tampilnotelpkel($id_penempatan);
		$pendidikan 		= $this->m_baru1->tampilpendidikan($id_penempatan);
		$status 			= $this->m_baru1->tampilstatus($id_penempatan);
		$nama_istri_suami 	= $this->m_baru1->tampilnama_istri_suami($id_penempatan);
				$alamatkontak 			= $this->m_baru1->tampilalamatkontak($id_penempatan);

			$gaji 						= $this->m_baru1->tampil_gaji($id_penempatan);
			if($a7!= '' && $a7 != null)
			{
				$gaji = $a7;
			}
			$lembur 					= $this->m_baru1->tampil_lembur($id_penempatan);
		$hubungan 						= $this->m_baru1->tampil_hubungan($id_penempatan);
		$wali 							= $this->m_baru1->tampil_wali($id_penempatan);
		$nama_dinas 					= $this->m_baru1->tampil_nama_dinas($id_penempatan);

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

				$datapen = $this->m_baru1->ambilpendmandarin();
	for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

		$tanggal=$this->m_baru1->tampiltanggal($id_penempatan);
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		if ($tanggal != NULL) {
			$ex_tgl = explode("-",$tanggal);
	 		$timestamp = strtotime($tanggal);

	 		$hari = $array_hari[date("N", $timestamp)];//$array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) $ex_tgl[1]];

	 		$tglnya = $ex_tgl[0];
	 		$thnnya = $ex_tgl[2];


	 	} else {
	 		$tanggal=date('d-m-Y');
			$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

	 		$hari = $array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) date('m')];

	 		$tglnya = date('d');
	 		$thnnya = date('Y');
		 }
		 $dinnas = strtolower($tempatlahir);
		 $dinnasf = strtoupper( substr($dinnas,0,1) );
		 $dinnasl = substr($dinnas,1);
/* == backup
		$tanggal=date('d-m-Y');
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

 		$hari = $array_hari[date('N')];
 		 $bulannya = $array_bulan[ (int) date('m')];

 		$tglnya = date('d');
 		$thnnya = date('Y');
*/
 		$status=trim($status," ");
 		if($status=='Belum Nikah' || $status=='Belum Kawin' || $status=='Cerai' || $status=='Cerai mati'){
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>';
 		}

 		else{
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_istri_suami.'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamatkontak.'</th>
				 </tr>';
 		}
		$isi_kepaladisnaker = '
				<tr>
					<th align="center" colspan="30" >Kepala Dinas Kabupaten '.$dinnasf.$dinnasl.'</th>
				</tr>';
		if ($a6 != '' && $a6 != null)
		{
			$isi_kepaladisnaker = '
					<tr>
						<th align="center" colspan="30" >'.$a6.'</th>
					</tr>';
		}


    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-16', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('PP FORMAL MADIUN '.$id_penempatan);
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
     $pdf->SetMargins(10, 10, 5);
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
    $pdf->SetFont('times', '', '11.5', '', false);
	$pdf->AddPage();

	// Set some content to print

    $html = '<br><br><br><br><br><br><br><br> <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>PERJANJIAN PENEMPATAN</b></th>
				</tr>
				<tr>
					<th>Nomor : '.$nomor.'</th>
				</tr>

			 </table><br><br>

			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
				<th colspan="2" ></th>
					<th colspan="73" >Pada hari ini '.$hari.' tanggal '.$tglnya.' bulan '.$bulannya.' tahun '.$thnnya.' telah diadakan Perjanjian Penempatan antara :</th>
				</tr>
				<br>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Nama </th>
					<th colspan="3">:</th>
					<th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
				 </tr>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Jabatan </th>
					<th colspan="3">:</th>
					<th colspan="35">DIREKTUR UTAMA</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Alamat </th>
					<th colspan="3">:</th>
					<th colspan="35">'.strtoupper($alamatptdigunakan).'</th>
				 </tr>
				 <br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Dalam hal ini bertindak untuk dan atas nama PT FLAMBOYAN GEMAJASA selanjutnya disebut sebagai <b>PIHAK KESATU</b>. </th>
				 </tr>
				 <br>
				  <tr>
					<th colspan="2" ></th>
					<th colspan="30" >Nama Calon Pekerja Migran Indonesia</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama.'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Tempat dan Tanggal Lahir </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$tempatlahir.', '.$tgllahir.'</th>
				 </tr>
				 <tr>
					 <th colspan="2" ></th>
					 <th colspan="30" >Status </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$status.'</th>
				  </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Alamat</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamat.'</th>
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >Selanjutnya disebut <b>PIHAK KEDUA</b> </th>
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU dan PIHAK KEDUA telah sepakat untuk mengadakan Perjanjian Penempatan dengan ketentuan sebagai berikut: </th>
				 </tr>
				 <br/>
				<tr>
					<th align="center" colspan="71" >Pasal 1</th>
				</tr>
				<br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU sanggup menempatkan PIHAK KEDUA di Negara Taiwan sebagai '.strtoupper($a5).' pada pemberi kerja '.$nama_agen.' yang beralamat '.$alamat_pengguna.' dalam waktu paling lama 3 (tiga) bulan sejak diterbitkan daftar nominasi PIHAK KEDUA</th>
				</tr>
				<br/>
				<tr>
					<th align="center" colspan="71" >Pasal 2 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >PIHAK KESATU berkewajiban untuk melindungi PIHAK KEDUA sejak ditandatanganinya Perjanjian Penempatan ini sampai dengan Penempatan oleh PIHAK KEDUA sesuai dengan ketentuan yang berlaku.</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >PIHAK KESATU berkewajiban menyediakan sarana dan prasarana dalam rangka penempatan dan perlindungan Pekerja Migran Indonesia yang layak.</th>
				</tr>
			</table>
			<br pagebreak="true"/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

				<tr>
				<th colspan="73"><br><br><br><br><br><br><br><br></th>
				</tr>
				<tr>
				<th align="center" colspan="71" >Pasal 3 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU membantu dan memfasilitasi pengurusan dokumen PIHAK KEDUA berupa Perjanjian Kerja, paspor, visa kerja, tiket pesawat, dan kartu kepersertaan jaminan sosial bagi Pekerja Migran Indonesia, kecuali dokumen awal yang diurus di daerah asal masing-masing oleh PIHAK KEDUA.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 4 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KEDUA sanggup melaksanakan pekerjaan selama masa perjanjian kerja berlangsung (36 bulan) sesuai dengan kesepakatan para pihak.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 5 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KEDUA wajib membayar biaya penempatan sesuai dengan komponen biaya yang ditetapkan oleh Menteri Ketenagakerjaan.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 6 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU bersedia mengembalikan biaya proses penempatan kepada PIHAK KEDUA yang dinyatakan unfit to work (tidak layak bekerja) berdasarkan hasil pemeriksaan psikologi dan kesehatan, setelah dipotong biaya medikal check-up dan biaya lainnya dengan dibuktikan melalui rincian pembiayaan dan bukti pembayaran yang sah.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 7 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KEDUA diwajibkan mengganti biaya yang telah dikeluarkan PIHAK KESATU apabila PIHAK KEDUA mengundurkan diri (wanprestasi) tanpa alasan apapun.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 8 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >Apabila dalam waktu 3 (tiga) bulan PIHAK KEDUA belum ditempatkan oleh PIHAK KESATU, PIHAK KESATU berkewajiban memberikan penjelasan mengenai alasan keterlambatan penempatan kepada PIHAK KEDUA.</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >PIHAK KEDUA berhak melaporkan permasalahan kepada Dinas yang menyelenggarakan urusan pemerintahan bidang ketenagakerjaan di Kabupaten/Kota untuk mendapatkan penyelesaian dalam hal PIHAK KESATU dengan sengaja tidak memenuhi kewajiban PIHAK KESATU sebagaimana dimaksud pada ayat (1).</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(3)</th>
					<th colspan="66" >Dalam hal ini PIHAK KESATU terbukti tidak dapat memberikan penjelasan kepastian penempatan PIHAK KEDUA, PIHAK KESATU berkewajiban mengembalikan seluruh biaya PIHAK KEDUA tanpa ada potongan apapun.</th>
				</tr>
			</table>
			<br pagebreak="true"/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

				<tr>
				<th colspan="73"><br><br><br><br><br><br><br><br></th>
				</tr>
				<tr>
				<th align="center" colspan="71" >Pasal 9 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >PIHAK KESATU menjamin PIHAK KEDUA menerima pembayaran atas gaji sebesar '.$gaji.' sebagaimana diatur dalam perjanjian kerja.</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >Apabila pemberi kerja PIHAK KEDUA tidak mempekerjakan sesuai dengan perjanjian kerja, PIHAK KESATU akan menyelesaikan hubungan kerja antara pemberi kerja dengan PIHAK KEDUA.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 10 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Perjanjian penempatan ini disepakati dan ditandatangani oleh PARA PIHAK, dibuat rangkap 2 (dua) dalam bahasa indonesia di atas kertas bermaterai cukup dan dapat dipertanggungjawabkan kebenarannya oleh masing-masing pihak.</th>
				</tr>
				<br><br>

				<tr>
					<th align="right" colspan="73"><br><br>Malang, '.$tglnya.' '.$bulannya.' '.$thnnya.'</th>
				</tr>
				<br>
			 </table><br><br><br><br>

			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			 <br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="14" >PIHAK KEDUA,</th>
					<th colspan="2" ></th>
					<th colspan="12" >PIHAK KESATU,</th>
				</tr>
				<br><br><br><br><br><br><br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="14" >('.$nama.')</th>
					<th colspan="2" ></th>
					<th colspan="12" >(IMMANUEL DARMAWAN SANTOSO)</th>
				</tr>
				<br><br><br>
				<tr>
					<th align="center" colspan="30" >Mengetahui</th>
				</tr>
				'.$isi_kepaladisnaker.'
				<tr>
					<th colspan="10" ></th>
					<th colspan="15" ><br><br><br><br><br><br><br><br></th>
				</tr>

				<tr>
					<th colspan="11" ></th>
					<th align="left" colspan="24" >(.................................................)</th>
				</tr>
				<tr>
				<th colspan="11" ></th>
					<th align="left"  colspan="24" >NIP</th>
				</tr>


			 </table>
			';

  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	$pdf->Output('PP PASAL 10'.$id_penempatan.'.pdf', 'I');
    }

	public function zerocost($id_penempatan, $cabang="", $khusus = "")
	{


		$lamakontraknya = '2 (dua)';
		$dan = '';
		if($khusus == ""){
			$lamakontraknya = '3 (tiga)';
			$dan = ' dan';
		}
		$alamatptdigunakan = "JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI      KEC.LAWANG KABUPATEN MALANG";
		if($cabang == 2){
			$alamatptdigunakan = "Taman Sari RT-37 A Kel. Kroyo Kec. Karangmalang Kab. Sragen Provinsi Jawa Tengah";
		}

		$bapak = $this->db->query('SELECT * FROM pembuatan_perjanjian WHERE id_tki = "'.$id_penempatan.'"')->result();

		$tampil = $bapak[0]->hubsaksi;



		$statusnya='';
		$nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
		$noktp				= $this->m_baru1->tampilnoktp($id_penempatan);
		$tglnoktp				= $this->m_baru1->tampiltglnoktp($id_penempatan);
		$tempatnoktp				= $this->m_baru1->tampiltempatnoktp($id_penempatan);
		$nomor 				= $this->m_baru1->tampilnomor($id_penempatan);
		$kode_agen 			= $this->m_baru1->tampil_kode_agen($id_penempatan);
		$nama_agen 			= $this->m_baru1->tampil_nama_agen($kode_agen);
		$tampilalamatortu = $this->m_baru1->tampilalamatortu($id_penempatan);

		$id_pengguna 		= $this->m_baru1->tampil_id_pengguna($kode_agen);
		$nomer_pengguna 	= $this->m_baru1->tampil_nomer_pengguna($kode_agen);
		$alamat_pengguna 	= $this->m_baru1->tampil_alamat_pengguna($kode_agen);

		$jabatan 			= $this->m_baru1->tampil_jabatan($id_penempatan);

		$tempatlahir 		= $this->m_baru1->tampiltempatlahir($id_penempatan);
		$tgllahir2 			= $this->m_baru1->tampiltgllahir($id_penempatan);

		$lahiran=str_replace(".","-",$tgllahir2);
		$tgllahir = date("d-m-Y", strtotime($lahiran));
		$tglnoktp22=str_replace(".","-",$tglnoktp);
		$tglnoktp = date("d-m-Y", strtotime($tglnoktp22));


		$jeniskelamin 		= $this->m_baru1->tampiljeniskelamin($id_penempatan);

		if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}


		$alamat 			= $this->m_baru1->tampilalamat($id_penempatan);
		$notelp 			= $this->m_baru1->tampilnotelp($id_penempatan);



		if($tampil == 'wali'){
			$nama_bapak 		= $this->m_baru1->tampilnama_kontak($id_penempatan);
		}elseif($tampil == 'Ibu'){
			$nama_bapak 		= $this->m_baru1->tampilnama_ibu($id_penempatan);
		}else{
			$nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);
		}

		// $nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);




		$notelpkel 			= $this->m_baru1->tampilnotelpkel($id_penempatan);
		$pendidikan 		= $this->m_baru1->tampilpendidikan($id_penempatan);
		$status 			= $this->m_baru1->tampilstatus($id_penempatan);
		$nama_istri_suami 	= $this->m_baru1->tampilnama_istri_suami($id_penempatan);
				$alamatkontak 			= $this->m_baru1->tampilalamatkontak($id_penempatan);

			$gaji 						= $this->m_baru1->tampil_gaji($id_penempatan);
			$lembur 					= $this->m_baru1->tampil_lembur($id_penempatan);
		$hubungan 						= $this->m_baru1->tampil_hubungan($id_penempatan);
		$wali 							= $this->m_baru1->tampil_wali($id_penempatan);
		$nama_dinas 					= $this->m_baru1->tampil_nama_dinas($id_penempatan);

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

				$datapen = $this->m_baru1->ambilpendmandarin();
		for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

		$tanggal=$this->m_baru1->tampiltanggal($id_penempatan);
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		if ($tanggal != NULL) {
			$ex_tgl = explode("-",$tanggal);
	 		$timestamp = strtotime($tanggal);

	 		$hari = $array_hari[date("N", $timestamp)];//$array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) $ex_tgl[1]];

	 		$tglnya = $ex_tgl[0];
	 		$thnnya = $ex_tgl[2];
	 	} else {
	 		$tanggal=date('d-m-Y');
			$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

	 		$hari = $array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) date('m')];

	 		$tglnya = date('d');
	 		$thnnya = date('Y');
		 }
		 $dinnas = strtolower($tempatlahir);
		 $dinnasf = strtoupper( substr($dinnas,0,1) );
		 $dinnasl = substr($dinnas,1);
		/* == backup
				$tanggal=date('d-m-Y');
				$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
				$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

				$hari = $array_hari[date('N')];
				$bulannya = $array_bulan[ (int) date('m')];

				$tglnya = date('d');
				$thnnya = date('Y');
		*/
 		$status=trim($status," ");
 		if($status=='Belum Nikah' || $status=='Belum Kawin' || $status=='Cerai' || $status=='Cerai mati'){
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>';
 		}

 		else{
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_istri_suami.'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamatkontak.'</th>
				 </tr>';
 		}

		$a5 				= $this->m_baru1->ambildata($id_penempatan,'a5');




    	// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-16', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
		$pdf->SetTitle('PP ZERO COST '.$id_penempatan);
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
		$pdf->SetMargins(10, 10, 5);
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
		$pdf->SetFont('times', '', '11.5', '', false);
		$pdf->AddPage();

		// Set some content to print

		$html = '<br><br><br><br><br><br><br><br> <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>PERJANJIAN PENEMPATAN ANTARA</b></th>
				</tr>
				<tr>
					<th><b>PERUSAHAAN PENEMPATAN PEKERJA MIGRAN INDONESIA</b></th>
				</tr>
				<tr>
					<th><b>DAN CALON PEKERJA MIGRAN INDONESIA</b></th>
				</tr>
				<tr>
					<th>Nomor : '.$nomor.'</th>
				</tr>

			 </table><br><br>

			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
				<th colspan="2" ></th>
					<th colspan="73" >Pada hari ini '.$hari.' tanggal '.$tglnya.' bulan '.$bulannya.' tahun '.$thnnya.' telah diadakan Perjanjian Penempatan <br/>oleh dan antara :</th>
				</tr>
				<br>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Nama Penanggung Jawab PPTKIS</th>
					<th colspan="3">:</th>
					<th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
				 </tr>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Jabatan </th>
					<th colspan="3">:</th>
					<th colspan="35">DIREKTUR UTAMA</th>
				 </tr>
				 <tr>
				 <th colspan="2" ></th>
					 <th colspan="30" >Nomor SIPPTKI </th>
					 <th colspan="3">:</th>
					 <th colspan="35">442/MEN/2016</th>
				  </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Alamat </th>
					<th colspan="3">:</th>
					<th colspan="35">'.strtoupper($alamatptdigunakan).'</th>
				 </tr>
				 <tr>
					 <th colspan="2" ></th>
					 <th colspan="30" >No Telp/HP/FAX/E-mail </th>
					 <th colspan="3">:</th>
					 <th colspan="35">(0341) 425642</th>
				  </tr>
				 <br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Dalam hal ini bertindak untuk dan atas nama PT FLAMBOYAN GEMAJASA selanjutnya disebut sebagai <b>PIHAK KESATU</b>. </th>
				 </tr>
				 <br>
				  <tr>
					<th colspan="2" ></th>
					<th colspan="30" >Nama Calon TKI</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama.'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Tempat dan Tanggal Lahir </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$tempatlahir.', '.$tgllahir.'</th>
				 </tr>
				 <tr>
					 <th colspan="2" ></th>
					 <th colspan="30" >Jenis Kelamin </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$jeniskelamin.'</th>
				  </tr>
				 <tr>
					 <th colspan="2" ></th>
					 <th colspan="30" >Status </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$status.'</th>
				  </tr>
				  <tr>
					  <th colspan="2" ></th>
					  <th colspan="5">KTP : </th>
					  <th colspan="25">a.Nomor</th>
					  <th colspan="3">:</th>
					  <th colspan="35">'.$noktp.'</th>
				   </tr>
				   <tr>
					   <th colspan="2" ></th>
					   <th colspan="5"></th>
					   <th colspan="25">b.tanggal</th>
					   <th colspan="3">:</th>
					   <th colspan="35">'.$tglnoktp.'</th>
					</tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="5"></th>
						<th colspan="25">c.dikeluarkan di</th>
						<th colspan="3">:</th>
						<th colspan="35">'.$tempatnoktp.'</th>
					 </tr>
					 <tr>
						 <th colspan="2" ></th>
						 <th colspan="30" >Pendidikan </th>
						 <th colspan="3">:</th>
						 <th colspan="35">'.$pendidikan.'</th>
					  </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Alamat</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamat.'</th>
				 </tr>
				 <tr>
					 <th colspan="2" ></th>
					 <th colspan="30" >No. Telepon / HP </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$notelp.'</th>
				  </tr>
				 <tr>
					 <th colspan="2" ></th>
					 <th colspan="30" >Nama Orang Tua / Wali </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$nama_bapak.'</th>
				  </tr>
				  <tr>
					 <th colspan="2" ></th>
					 <th colspan="30" >Alamat Orang Tua / Wali </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$tampilalamatortu.'</th>
				  </tr>
				 <br><br><br><br><br>

				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >Selanjutnya dalam perjanjian penempatan ini disebut <b>PIHAK KEDUA</b> </th>
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU dan PIHAK KEDUA telah sepakat untuk mengadakan Perjanjian Penempatan dengan ketentuan sebagai berikut: </th>
				 </tr>
				 <br/>
				 </table>
				 <br pagebreak="true"/>
				 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

					 <tr>
					 <th colspan="73"><br><br><br><br><br><br><br></th>
					 </tr>
				<tr>
					<th align="center" colspan="71" ><b>Pasal 1</b></th>
				</tr>
				<br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" ><b>PIHAK KESATU</b> sanggup menempatkan <b>PIHAK KEDUA</b> di Negara Taiwan sebagai '.strtoupper($a5).' pada pemberi kerja '.$nama_agen.' yang beralamat '.$alamat_pengguna.' dalam jangka waktu 3(tiga) bulan sejak di tandatangani  Perjanjian Penempatan ini,tanpa dibebani Biaya Penempatan pada <b>PIHAK KEDUA</b></th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >Apabila dalam jangka waktu 3 (tiga) bulan sebagaimana di maksud pada ayat (1) <b>PIHAK KEDUA</b> belum di tempatkan oleh <b>PIHAK KESATU</b>  , <b>PIHAK KESATU</b>  berkewajiban memberikan penjelasan mengenai alasan keterlambatan penempatan kepada <b>PIHAK KEDUA</b></th>
				</tr>
				<br/>
				<tr>
					<th align="center" colspan="71" ><b>Pasal 2 </b></th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" ><b>PIHAK KEDUA</b> sanggup melaksanakan kewajiban sebagaimana yang tertuang dalam perjanjian kerja,sesuai ketentuan perundang-undangan.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" ><b>Pasal 3 </b></th>
				</tr>
				<br>
				<tr>
				   <th colspan="2" ></th>
				   <th colspan="5" align="left">(1)</th>
				   <th colspan="66" ><b>PIHAK KESATU</b> berkewajiban :</th>
			   	</tr>
				   <br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">a.</th>
					<th colspan="63" >Melindungi <b>PIHAK KEDUA</b> sejak  ditandatanganinya Perjanjian Penempatan ini sampai dengan selesai masa penempatan sesuai ketentuan perundang-undangan;</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">b.</th>
					<th colspan="63" >Memastikan  <b>PIHAK KEDUA</b> mendapatkan hak-hak nya sebagaimana yang tertuang dalam Perjanjian Kerja antara PIHAK KEDUA dengan Pemberi Kerja sesuai ketentuan perundang-undangan;</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">c.</th>
					<th colspan="63" >Menyediakan sarana dan prasarana dalam rangka penempatan dan perlindungan Pekerja Migran Indonesia;</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">d.</th>
					<th colspan="63" >Membantu dan memfasilitasi pengurusan dokumen <b>PIHAK KEDUA</b> tanpa membebankan biaya kepada <b>PIHAK KEDUA</b> ,meliputi:</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">1.</th>
					<th colspan="60" >tiket pesawat;</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">2.</th>
					<th colspan="60" >visa kerja;</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">3.</th>
					<th colspan="60" >legalisasi Perjanjian Kerja;</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">4.</th>
					<th colspan="60" >Paspor;</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">5.</th>
					<th colspan="60" >Surat keterangan catatan kepolisian;</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">6.</th>
					<th colspan="60" >Kartu kepesertaan jaminan sosial bagi Pekerja Migran Indonesia; dan</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">7.</th>
					<th colspan="60" >Sertifikat Pemeriksaan kesehatan dan psikologi;</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">e.</th>
					<th colspan="63" >Memberikan informasi proses penempatan dan pembebasan biaya penempatan;dan</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">f.</th>
					<th colspan="63" >Melakukan proses penempatan yang dipersyaratkan sebelum bekerja sesuai ketentuan peraturan perundang-undangan.</th>
				</tr>
				</table>
				<br pagebreak="true"/>
				<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

					<tr>
					<th colspan="73"><br><br><br><br><br><br><br></th>
					</tr>
				<br/>
			   <tr>
				   <th colspan="2" ></th>
				   <th colspan="5" align="left">(2)</th>
				   <th colspan="66" ><b>PIHAK KESATU</b> berhak :</th>
			   </tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">a.</th>
					<th colspan="63" >menerima dokumen yang dipersyaratkan sesuai dengan ketentuan negara tujuan penempatan;</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">b.</th>
					<th colspan="63" >menerima informasi pengunduran diri paling lambat 1(satu) minggu sebelum keberangkatan melalui surat resmi,kecuali di karenakan keadaan kahar (force majeure)</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">c.</th>
					<th colspan="63" >memberhentikan Calon Pekerja Migran Indonesia dari program atau proses penempatan administrasi;dan</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">d.</th>
					<th colspan="63" >menerima pengembalian biaya penempatan  dari <b>PIHAK  KEDUA</b></th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" ><b>Pasal 4 </b></th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" ><b>PIHAK KEDUA</b> berkewajiban :</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">a.</th>
					<th colspan="63" >Melengkapi dokumen persyaratan,meliputi:</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">1.</th>
					<th colspan="60" >KTP Elektronik;</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">2.</th>
					<th colspan="60" >Kartu Keluarga;</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">3.</th>
					<th colspan="60" >Surat keterangan status perkawinan atau buku nikah ;dan</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="8" align="left"></th>
					<th colspan="3" align="left">4.</th>
					<th colspan="60" >Surat izin suami/atau istri,izin orang tua,atau izin wali yg diketahui oleh Kepala Desa atau Lurah.</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">b.</th>
					<th colspan="63" >mengikuti seluruh proses penempatan yang dipersyaratkan sebelum bekerja;dan</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">c.</th>
					<th colspan="63" >Mengembalikan biaya penempatan yg telah di keluarkan PIHAKKESATU apabila PIHAK KEDUA mengundurkan diri sebelum penempatan ke negara tujuan atau tidak dapat melaksanakan perjanjian kerja karena mengundurkan diri untuk kepentingan /alasan pribadi.</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" ><b>PIHAK KEDUA</b> berhak :</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">a.</th>
					<th colspan="63" >Menerima informasi proses penempatan;</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">b.</th>
					<th colspan="63" >Mendapatkan kesetaraan dalam pelayanan penempatan sampai dengan pemberangkatan ke negara tujuan pemberangkatan; dan </th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left"></th>
					<th colspan="3" align="left">c.</th>
					<th colspan="63" >Mendapatkan kepastian terpenuhinya hak-hak yang tertuang dalam Perjanjian Kerja.</th>
				</tr>
				</table>
				<br pagebreak="true"/>
				<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

					<tr>
					<th colspan="73"><br><br><br><br><br><br><br></th>
					</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" ><b>Pasal 5 </b></th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >Apabila terjadi perselisihan antara PIHAK KESATU dan PIHAK KEDUA yang timbul sebagai akibat pelaksanaan perjanjian penempatan ini,akan di selesaikan secara musyawarah untuk mencapai mufakat.</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >Apabila tidak tercapai kesepakatan sebagaimana di maksud pada ayat (1),PARA  PIHAK dapat menyelesaikannya sesuai dengan ketentuan peraturan  perundang-undangan.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" ><b>Pasal 6 </b></th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Perjanjian penempatan ini dinyatakan batal (gugur) bilamana kedua belah pihak sepakat untuk membatalkan perjanjian penempatan ini di hadapan pengantar kerja atau pejabat yang di tunjuk pada LTSA/Dinas Kab/Kota yang membidangi Ketenagakerjaan/UPT BP2MI.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" ><b>Pasal 7 </b></th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >Perjanjian Penempatan ini berlaku dan mengikat sejak tanggal ditandatangani oleh PARA PIHAK sampai dengan berakhirnya perjanjian kerja.</th>
				</tr>
				<br/>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >Perjanjian Penempatan ini di buat dalam rangkap 2(dua) asli dan bermaterai cukup, masing-masing mempunyai  kekuatan kekuatan hukum yang sama dan di tandatangani dengan penuh kesadaran tanpa paksaan dari pihak manapun.</th>
				</tr>
				<br>

				<tr>
					<th align="right" colspan="73"><br><br>Malang, '.$tglnya.' '.$bulannya.' '.$thnnya.'</th>
				</tr>
				<br>
			 </table>

			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			 <br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="14" >PIHAK KESATU,</th>
					<th colspan="2" ></th>
					<th colspan="12" >PIHAK KEDUA,</th>
				</tr>
				<br><br><br><br><br><br><br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="14" >(IMMANUEL DARMAWAN SANTOSO)</th>
					<th colspan="2" ></th>
					<th colspan="12" >('.$nama.')</th>
				</tr>
				<br><br><br>
				<tr>
					<th align="center" colspan="30" >Mengetahui</th>
				</tr>
				<tr>
					<th align="center" colspan="30" >Pengantar kerja/Pejabat</th>
				</tr>

				<tr>
				<th colspan="11" ></th>
					<th align="left"  colspan="24" >LTSA/Dinas Kab/Kota/UPT BP2MI</th>
				</tr>


			 </table>
			';


		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
		$pdf->Output('PP Zero Cost'.$id_penempatan.'.pdf', 'I');
	}

	function formal_kab_pati($id_penempatan, $cabang="", $khusus = "")
	{
		$lamakontraknya = '2 (dua)';
		$dan = '';
		if($khusus == ""){
			$lamakontraknya = '3 (tiga)';
			$dan = ' dan';
		}
		$alamatptdigunakan = "JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI      KEC.LAWANG KABUPATEN MALANG";
		if($cabang == 2){
			$alamatptdigunakan = "Taman Sari RT-37 A Kel. Kroyo Kec. Karangmalang Kab. Sragen Provinsi Jawa Tengah";
		}

		$bapak = $this->db->query('SELECT * FROM pembuatan_perjanjian WHERE id_tki = "'.$id_penempatan.'"')->result();

		$tampil = $bapak[0]->hubsaksi;

		$statusnya='';
		$a1 				= $this->m_baru1->ambildata($id_penempatan,'a1');
		$a2 				= $this->m_baru1->ambildata($id_penempatan,'a2');
		$a3 				= $this->m_baru1->ambildata($id_penempatan,'a3');
		$a4 				= $this->m_baru1->ambildata($id_penempatan,'a4');
		$a5 				= $this->m_baru1->ambildata($id_penempatan,'a5');
		$nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
		$nomor 				= $this->m_baru1->tampilnomor($id_penempatan);
		$kode_agen 			= $this->m_baru1->tampil_kode_agen($id_penempatan);
		$nama_agen 			= $this->m_baru1->tampil_nama_agen($kode_agen);
		$tampilalamatortu = $this->m_baru1->tampilalamatortu($id_penempatan);

		$id_pengguna 		= $this->m_baru1->tampil_id_pengguna($kode_agen);
		$nomer_pengguna 	= $this->m_baru1->tampil_nomer_pengguna($kode_agen);
		$alamat_pengguna 	= $this->m_baru1->tampil_alamat_pengguna($kode_agen);

		$jabatan 			= $this->m_baru1->tampil_jabatan($id_penempatan);

		$tempatlahir 		= $this->m_baru1->tampiltempatlahir($id_penempatan);
		$tgllahir2 			= $this->m_baru1->tampiltgllahir($id_penempatan);

		$lahiran=str_replace(".","-",$tgllahir2);
		$tgllahir = date("d-m-Y", strtotime($lahiran));



		$jeniskelamin 		= $this->m_baru1->tampiljeniskelamin($id_penempatan);

		if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}


		$alamat 			= $this->m_baru1->tampilalamat($id_penempatan);
		$notelp 			= $this->m_baru1->tampilnotelp($id_penempatan);



		if($tampil == 'wali'){
			$nama_bapak 		= $this->m_baru1->tampilnama_kontak($id_penempatan);
		}elseif($tampil == 'Ibu'){
			$nama_bapak 		= $this->m_baru1->tampilnama_ibu($id_penempatan);
		}else{
			$nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);
		}

		// $nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);




		$notelpkel 			= $this->m_baru1->tampilnotelpkel($id_penempatan);
		$pendidikan 		= $this->m_baru1->tampilpendidikan($id_penempatan);
		$status 			= $this->m_baru1->tampilstatus($id_penempatan);
		$nama_istri_suami 	= $this->m_baru1->tampilnama_istri_suami($id_penempatan);
				$alamatkontak 			= $this->m_baru1->tampilalamatkontak($id_penempatan);

			$gaji 						= $this->m_baru1->tampil_gaji($id_penempatan);
			$lembur 					= $this->m_baru1->tampil_lembur($id_penempatan);
		$hubungan 						= $this->m_baru1->tampil_hubungan($id_penempatan);
		$wali 							= $this->m_baru1->tampil_wali($id_penempatan);
		$nama_dinas 					= $this->m_baru1->tampil_nama_dinas($id_penempatan);
		if($a2 == '')
		{
			$a2 = $gaji;
		}

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

				$datapen = $this->m_baru1->ambilpendmandarin();
		for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

		$tanggal=$this->m_baru1->tampiltanggal($id_penempatan);
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		if ($tanggal != NULL) {
			$ex_tgl = explode("-",$tanggal);
	 		$timestamp = strtotime($tanggal);

	 		$hari = $array_hari[date("N", $timestamp)];//$array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) $ex_tgl[1]];

	 		$tglnya = $ex_tgl[0];
	 		$thnnya = $ex_tgl[2];
	 	} else {
	 		$tanggal=date('d-m-Y');
			$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

	 		$hari = $array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) date('m')];

	 		$tglnya = date('d');
	 		$thnnya = date('Y');
		 }
		 $dinnas = strtolower($tempatlahir);
		 $dinnasf = strtoupper( substr($dinnas,0,1) );
		 $dinnasl = substr($dinnas,1);
		/* == backup
		$tanggal=date('d-m-Y');
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

 		$hari = $array_hari[date('N')];
 		 $bulannya = $array_bulan[ (int) date('m')];

 		$tglnya = date('d');
 		$thnnya = date('Y');
		*/
 		$status=trim($status," ");
 		if($status=='Belum Nikah' || $status=='Belum Kawin' || $status=='Cerai' || $status=='Cerai mati'){
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>';
 		}

 		else{
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_istri_suami.'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamatkontak.'</th>
				 </tr>';
 		}

		if($a4 != '')
		{
			$abjad = [];
			for( $i ='a'; $i <= 'z'; $i++ ) {

				$abjad[] = $i;
			}

			$a4x = '';
			foreach(preg_split('/\r\n|[\r\n]/', $a4) as $k => $v)
			{
				$v = str_replace("Rp.","Rp",$v);
				$exx = explode('Rp',$v);
				$a4x .=
					'<tr>
						<th colspan="6" ></th>
						<th colspan="36">'.$abjad[$k].'. '.$exx[0].'</th>
						<th colspan="3">Rp. </th>
						<th colspan="10" style="text-align: right">'.$exx[1].'</th>
						<th colspan="22"></th>
					</tr>';
			}
			$a4 = $a4x;
		}



		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-16', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
		$pdf->SetTitle('PP FORMAL PATI  '.$id_penempatan);
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
		$pdf->SetMargins(10, 10, 5);
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
		$pdf->SetFont('times', '', '11.5', '', false);
		$pdf->AddPage();

		// Set some content to print

		$html = '<br><br><br><br><br><br><br><br> <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>PERJANJIAN PENEMPATAN</b></th>
				</tr>
				<tr>
					<th>Nomor : '.$nomor.'</th>
				</tr>

			 </table><br><br>

			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
				<th colspan="2" ></th>
					<th colspan="73" >Pada hari ini '.$hari.' tanggal '.$tglnya.' bulan '.$bulannya.' tahun '.$thnnya.' telah diadakan Perjanjian Penempatan Calon Pekerja Migran Indonesia oleh dan antara :</th>
				</tr>
				<br>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Nama </th>
					<th colspan="3">:</th>
					<th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
				 </tr>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Jabatan </th>
					<th colspan="3">:</th>
					<th colspan="35">DIREKTUR UTAMA</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Alamat </th>
					<th colspan="3">:</th>
					<th colspan="35">'.strtoupper($alamatptdigunakan).'</th>
				 </tr>
				 <br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Dalam hal ini bertindak untuk dan atas nama PT FLAMBOYAN GEMAJASA selanjutnya disebut sebagai <b>PIHAK KESATU</b>. </th>
				 </tr>
				 <br>
				  <tr>
					<th colspan="2" ></th>
					<th colspan="30" >Nama Calon Pekerja Migran Indonesia</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama.'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Tempat dan Tanggal Lahir </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$tempatlahir.', '.$tgllahir.'</th>
				 </tr>
				 <tr>
					 <th colspan="2" ></th>
					 <th colspan="30" >Status </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$status.'</th>
				  </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Alamat</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamat.'</th>
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >Selanjutnya disebut <b>PIHAK KEDUA</b> </th>
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU dan PIHAK KEDUA telah sepakat untuk mengadakan Perjanjian Penempatan dengan ketentuan sebagai berikut: </th>
				 </tr>
				 <br/>
				<tr>
					<th align="center" colspan="71" >Pasal 1</th>
				</tr>
				<br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU sanggup menempatkan PIHAK KEDUA di Negara Taiwan sebagai '.strtoupper($a5).' pada pemberi kerja '.$nama_agen.' yang beralamat '.$alamat_pengguna.' dalam waktu paling lama 3 (tiga) bulan sejak diterbitkan daftar nominasi PIHAK KEDUA</th>
				</tr>
			</table>
			<br pagebreak="true"/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th colspan="73"><br><br><br><br><br><br><br><br></th>
				</tr>
				<tr>
					<th align="center" colspan="71" >Pasal 2 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >PIHAK KESATU berkewajiban untuk melindungi PIHAK KEDUA sejak ditandatanganinya Perjanjian Penempatan ini sampai dengan Penempatan oleh PIHAK KEDUA sesuai dengan ketentuan yang berlaku.</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >PIHAK KESATU berkewajiban menyediakan sarana dan prasarana dalam rangka penempatan dan perlindungan Pekerja Migran Indonesia yang layak.</th>
				</tr>
				<br/>
				<tr>
				</tr>
				<tr>
				<th align="center" colspan="71" >Pasal 3 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU membantu dan memfasilitasi pengurusan dokumen PIHAK KEDUA berupa Perjanjian Kerja, paspor, visa kerja, tiket pesawat, dan kartu kepersertaan jaminan sosial bagi Pekerja Migran Indonesia, kecuali dokumen awal yang diurus di daerah asal masing-masing oleh PIHAK KEDUA.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 4 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KEDUA sanggup melaksanakan pekerjaan selama masa perjanjian kerja berlangsung (36 bulan) sesuai dengan kesepakatan para pihak.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 5 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KEDUA wajib membayar biaya penempatan sesuai dengan komponen biaya yang ditetapkan oleh Menteri Ketenagakerjaan,dengan menanggung biaya penempatan sebesar '.$a1.' terdiri dari :</th>
				</tr>
				'.$a4.'
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Dalam hal PIHAK KEDUA membayar secara angsuran, maka besarnya angsuran adalah '.$a1.' '.$a3.' </th>
				</tr>

			</table>
			<br pagebreak="true"/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th colspan="73"><br><br><br><br><br><br><br><br></th>
				</tr>
				<tr>
				<th align="center" colspan="71" >Pasal 6 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU bersedia mengembalikan biaya proses penempatan kepada PIHAK KEDUA yang dinyatakan unfit to work (tidak layak bekerja) berdasarkan hasil pemeriksaan psikologi dan kesehatan, setelah dipotong biaya medikal <i>check-up</i> dan biaya lainnya dengan dibuktikan melalui rincian pembiayaan dan bukti pembayaran yang sah.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 7 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KEDUA diwajibkan mengganti biaya yang telah dikeluarkan PIHAK KESATU apabila PIHAK KEDUA mengundurkan diri (wanprestasi) tanpa alasan apapun.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 8 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >Apabila dalam waktu 3 (tiga) bulan PIHAK KEDUA belum ditempatkan oleh PIHAK KESATU, PIHAK KESATU berkewajiban memberikan penjelasan mengenai alasan keterlambatan penempatan kepada PIHAK KEDUA.</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >PIHAK KEDUA berhak melaporkan permasalahan kepada Dinas yang menyelenggarakan urusan pemerintahan bidang ketenagakerjaan di Kabupaten/Kota untuk mendapatkan penyelesaian dalam hal PIHAK KESATU dengan sengaja tidak memenuhi kewajiban PIHAK KESATU sebagaimana dimaksud pada ayat (1).</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(3)</th>
					<th colspan="66" >Dalam hal ini PIHAK KESATU terbukti tidak dapat memberikan penjelasan kepastian penempatan PIHAK KEDUA, PIHAK KESATU berkewajiban mengembalikan seluruh biaya PIHAK KEDUA tanpa ada potongan apapun.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 9 </th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >PIHAK KESATU menjamin PIHAK KEDUA menerima pembayaran atas gaji sebesar '.$a2.' sebagaimana diatur dalam perjanjian kerja.</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >Apabila pemberi kerja PIHAK KEDUA tidak mempekerjakan sesuai dengan perjanjian kerja, PIHAK KESATU akan menyelesaikan hubungan kerja antara pemberi kerja dengan PIHAK KEDUA.</th>
				</tr>
				</table>
			<br pagebreak="true"/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th colspan="73"><br><br><br><br><br><br><br><br></th>
				</tr>
				<tr>
				<th align="center" colspan="71" >Pasal 10 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Perjanjian penempatan ini disepakati dan ditandatangani oleh PARA PIHAK, dibuat rangkap 2 (dua) dalam bahasa indonesia di atas kertas bermaterai cukup dan dapat dipertanggungjawabkan kebenarannya oleh masing-masing pihak.</th>
				</tr>
				<br><br>
				<tr>
					<th align="right" colspan="67"><br><br>Malang, '.$tglnya.' '.$bulannya.' '.$thnnya.'</th>
					<th colspan="6" ></th>
				</tr>
				<br>
			 </table><br><br><br><br>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">

				<tr>
					<th colspan="2" ></th>
					<th colspan="14" >PIHAK KEDUA,</th>
					<th colspan="2" ></th>
					<th colspan="12" >PIHAK KESATU,</th>
				</tr>
				<br><br><br><br><br><br><br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="14" >('.$nama.')</th>
					<th colspan="2" ></th>
					<th colspan="12" >(IMMANUEL DARMAWAN SANTOSO)</th>
				</tr>
				<br><br><br>
				<tr>
					<th align="center" colspan="30" >Mengetahui</th>
				</tr>
				<tr>
					<th align="center" colspan="30" >Kepala Dinas Kabupaten '.$dinnasf.$dinnasl.'</th>
				</tr>
				<tr>
					<th colspan="10" ></th>
					<th colspan="15" ><br><br><br><br><br><br><br><br></th>
				</tr>

				<tr>
					<th colspan="11" ></th>
					<th align="left" colspan="24" >(.................................................)</th>
				</tr>
				<tr>
				<th colspan="11" ></th>
					<th align="left"  colspan="24" >NIP</th>
				</tr>


			 </table>
			';

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
		$pdf->Output('PP FORMAL PATI'.$id_penempatan.'.pdf', 'I');
    }

	function formal_kab_banyuwangi($id_penempatan, $cabang="", $khusus = "")
	{

		$lamakontraknya = '2 (dua)';
		$dan = '';
		if($khusus == ""){
			$lamakontraknya = '3 (tiga)';
			$dan = ' dan';
		}
		$alamatptdigunakan = "JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI      KEC.LAWANG KABUPATEN MALANG";
		if($cabang == 2){
			$alamatptdigunakan = "Taman Sari RT-37 A Kel. Kroyo Kec. Karangmalang Kab. Sragen Provinsi Jawa Tengah";
		}

		$bapak = $this->db->query('SELECT * FROM pembuatan_perjanjian WHERE id_tki = "'.$id_penempatan.'"')->result();

		$tampil = $bapak[0]->hubsaksi;



		$noktp				= $this->m_baru1->tampilnoktp($id_penempatan);
		$a5 				= $this->m_baru1->ambildata($id_penempatan,'a5');
		$statusnya='';
		$nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
		$nomor 				= $this->m_baru1->tampilnomor($id_penempatan);
		$kode_agen 			= $this->m_baru1->tampil_kode_agen($id_penempatan);
		$nama_agen 			= $this->m_baru1->tampil_nama_agen($kode_agen);
$tampilalamatortu = $this->m_baru1->tampilalamatortu($id_penempatan);

		$id_pengguna 		= $this->m_baru1->tampil_id_pengguna($kode_agen);
		$nomer_pengguna 	= $this->m_baru1->tampil_nomer_pengguna($kode_agen);
		$alamat_pengguna 	= $this->m_baru1->tampil_alamat_pengguna($kode_agen);

		$jabatan 			= $this->m_baru1->tampil_jabatan($id_penempatan);

		$tempatlahir 		= $this->m_baru1->tampiltempatlahir($id_penempatan);
		$tgllahir2 			= $this->m_baru1->tampiltgllahir($id_penempatan);

		$lahiran=str_replace(".","-",$tgllahir2);
$tgllahir = date("d-m-Y", strtotime($lahiran));



		$jeniskelamin 		= $this->m_baru1->tampiljeniskelamin($id_penempatan);

if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}


		$alamat 			= $this->m_baru1->tampilalamat($id_penempatan);
		$notelp 			= $this->m_baru1->tampilnotelp($id_penempatan);



		if($tampil == 'wali'){
			$nama_bapak 		= $this->m_baru1->tampilnama_kontak($id_penempatan);
		}elseif($tampil == 'Ibu'){
			$nama_bapak 		= $this->m_baru1->tampilnama_ibu($id_penempatan);
		}else{
			$nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);
		}

		// $nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);




		$notelpkel 			= $this->m_baru1->tampilnotelpkel($id_penempatan);
		$pendidikan 		= $this->m_baru1->tampilpendidikan($id_penempatan);
		$status 			= $this->m_baru1->tampilstatus($id_penempatan);
		$nama_istri_suami 	= $this->m_baru1->tampilnama_istri_suami($id_penempatan);
				$alamatkontak 			= $this->m_baru1->tampilalamatkontak($id_penempatan);

			$gaji 						= $this->m_baru1->tampil_gaji($id_penempatan);
			$lembur 					= $this->m_baru1->tampil_lembur($id_penempatan);
		$hubungan 						= $this->m_baru1->tampil_hubungan($id_penempatan);
		$wali 							= $this->m_baru1->tampil_wali($id_penempatan);
		$nama_dinas 					= $this->m_baru1->tampil_nama_dinas($id_penempatan);

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

				$datapen = $this->m_baru1->ambilpendmandarin();
	for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

		$tanggal=$this->m_baru1->tampiltanggal($id_penempatan);
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		if ($tanggal != NULL) {
			$ex_tgl = explode("-",$tanggal);
	 		$timestamp = strtotime($tanggal);

	 		$hari = $array_hari[date("N", $timestamp)];//$array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) $ex_tgl[1]];

	 		$tglnya = $ex_tgl[0];
	 		$thnnya = $ex_tgl[2];


	 	} else {
	 		$tanggal=date('d-m-Y');
			$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

	 		$hari = $array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) date('m')];

	 		$tglnya = date('d');
	 		$thnnya = date('Y');
		 }
		 $dinnas = strtolower($tempatlahir);
		 $dinnasf = strtoupper( substr($dinnas,0,1) );
		 $dinnasl = substr($dinnas,1);
/* == backup
		$tanggal=date('d-m-Y');
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

 		$hari = $array_hari[date('N')];
 		 $bulannya = $array_bulan[ (int) date('m')];

 		$tglnya = date('d');
 		$thnnya = date('Y');
*/
 		$status=trim($status," ");
 		if($status=='Belum Nikah' || $status=='Belum Kawin' || $status=='Cerai' || $status=='Cerai mati'){
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>';
 		}

 		else{
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_istri_suami.'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamatkontak.'</th>
				 </tr>';
 		}



    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-16', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('PP FORMAL MADIUN '.$id_penempatan);
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
     $pdf->SetMargins(10, 10, 5);
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
    $pdf->SetFont('times', '', '11.5', '', false);
	$pdf->AddPage();

	// Set some content to print

    $html = '<br><br><br><br><br><br><br><br> <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>PERJANJIAN PENEMPATAN</b></th>
				</tr>
				<tr>
					<th>Nomor : '.$nomor.'</th>
				</tr>

			 </table><br><br>

			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
				<th colspan="2" ></th>
					<th colspan="73" >Pada hari ini '.$hari.' tanggal '.$tglnya.' bulan '.$bulannya.' tahun '.$thnnya.' telah diadakan Perjanjian Penempatan antara :</th>
				</tr>
				<br>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Nama </th>
					<th colspan="3">:</th>
					<th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
				 </tr>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Jabatan </th>
					<th colspan="3">:</th>
					<th colspan="35">DIREKTUR UTAMA</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Alamat </th>
					<th colspan="3">:</th>
					<th colspan="35">'.strtoupper($alamatptdigunakan).'</th>
				 </tr>
				 <br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Dalam hal ini bertindak untuk dan atas nama PT FLAMBOYAN GEMAJASA selanjutnya disebut sebagai <b>PIHAK KESATU</b>. </th>
				 </tr>
				 <br>
				  <tr>
					<th colspan="2" ></th>
					<th colspan="30" >Nama Calon Pekerja Migran Indonesia</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama.'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Tempat dan Tanggal Lahir </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$tempatlahir.', '.$tgllahir.'</th>
				 </tr>
				 <tr>
					 <th colspan="2" ></th>
					 <th colspan="30" >Status </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$status.'</th>
				  </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Alamat</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamat.'</th>
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >Selanjutnya disebut <b>PIHAK KEDUA</b> </th>
				 </tr>
				 <br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU dan PIHAK KEDUA telah sepakat untuk mengadakan Perjanjian Penempatan dengan ketentuan sebagai berikut: </th>
				 </tr>
				 <br/>
				<tr>
					<th align="center" colspan="71" >Pasal 1</th>
				</tr>
				<br>
				 <tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU sanggup menempatkan PIHAK KEDUA di Negara Taiwan sebagai '.strtoupper($a5).' pada pemberi kerja '.$nama_agen.' yang beralamat '.$alamat_pengguna.' dalam waktu paling lama 3 (tiga) bulan sejak diterbitkan daftar nominasi PIHAK KEDUA</th>
				</tr>
				<br/>
				<tr>
					<th align="center" colspan="71" >Pasal 2 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >PIHAK KESATU berkewajiban untuk melindungi PIHAK KEDUA sejak ditandatanganinya Perjanjian Penempatan ini sampai dengan Penempatan oleh PIHAK KEDUA sesuai dengan ketentuan yang berlaku.</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >PIHAK KESATU berkewajiban menyediakan sarana dan prasarana dalam rangka penempatan dan perlindungan Pekerja Migran Indonesia yang layak.</th>
				</tr>
			</table>
			<br pagebreak="true"/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

				<tr>
				<th colspan="73"><br><br><br><br><br><br><br><br></th>
				</tr>
				<tr>
				<th align="center" colspan="71" >Pasal 3 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU membantu dan memfasilitasi pengurusan dokumen PIHAK KEDUA berupa Perjanjian Kerja, paspor, visa kerja, tiket pesawat, dan kartu kepersertaan jaminan sosial bagi Pekerja Migran Indonesia, kecuali dokumen awal yang diurus di daerah asal masing-masing oleh PIHAK KEDUA.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 4 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KEDUA sanggup melaksanakan pekerjaan selama masa perjanjian kerja berlangsung (36 bulan) sesuai dengan kesepakatan para pihak.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 5 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KEDUA wajib membayar biaya penempatan sesuai dengan komponen biaya yang ditetapkan oleh Menteri Ketenagakerjaan.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 6 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU bersedia mengembalikan biaya proses penempatan kepada PIHAK KEDUA yang dinyatakan unfit to work (tidak layak bekerja) berdasarkan hasil pemeriksaan psikologi dan kesehatan, setelah dipotong biaya medikal check-up dan biaya lainnya dengan dibuktikan melalui rincian pembiayaan dan bukti pembayaran yang sah.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 7 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KEDUA diwajibkan mengganti biaya yang telah dikeluarkan PIHAK KESATU apabila PIHAK KEDUA mengundurkan diri (wanprestasi) tanpa alasan apapun.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 8 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >Apabila dalam waktu 3 (tiga) bulan PIHAK KEDUA belum ditempatkan oleh PIHAK KESATU, PIHAK KESATU berkewajiban memberikan penjelasan mengenai alasan keterlambatan penempatan kepada PIHAK KEDUA.</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >PIHAK KEDUA berhak melaporkan permasalahan kepada Dinas yang menyelenggarakan urusan pemerintahan bidang ketenagakerjaan di Kabupaten/Kota untuk mendapatkan penyelesaian dalam hal PIHAK KESATU dengan sengaja tidak memenuhi kewajiban PIHAK KESATU sebagaimana dimaksud pada ayat (1).</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(3)</th>
					<th colspan="66" >Dalam hal ini PIHAK KESATU terbukti tidak dapat memberikan penjelasan kepastian penempatan PIHAK KEDUA, PIHAK KESATU berkewajiban mengembalikan seluruh biaya PIHAK KEDUA tanpa ada potongan apapun.</th>
				</tr>
			</table>
			<br pagebreak="true"/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

				<tr>
				<th colspan="73"><br><br><br><br><br><br><br><br></th>
				</tr>
				<tr>
				<th align="center" colspan="71" >Pasal 9 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(1)</th>
					<th colspan="66" >PIHAK KESATU menjamin PIHAK KEDUA menerima pembayaran atas gaji sebesar '.$gaji.' sebagaimana diatur dalam perjanjian kerja.</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5" align="left">(2)</th>
					<th colspan="66" >Apabila pemberi kerja PIHAK KEDUA tidak mempekerjakan sesuai dengan perjanjian kerja, PIHAK KESATU akan menyelesaikan hubungan kerja antara pemberi kerja dengan PIHAK KEDUA.</th>
				</tr>
				<br/>
				<tr>
				<th align="center" colspan="71" >Pasal 10 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="71" >Perjanjian penempatan ini disepakati dan ditandatangani oleh PARA PIHAK, dibuat rangkap 2 (dua) dalam bahasa indonesia di atas kertas bermaterai cukup dan dapat dipertanggungjawabkan kebenarannya oleh masing-masing pihak.</th>
				</tr>
				<br><br>

				<tr>
				<th align="right" colspan="70"><br><br>Malang, '.$tglnya.' '.$bulannya.' '.$thnnya.'</th>
				<th colspan="3" ></th>
				</tr>
				<br>
			 </table><br><br><br><br>

			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			 <br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="14" >PIHAK KEDUA,</th>
					<th colspan="2" ></th>
					<th colspan="14" >SAKSI</th>
					<th colspan="2" ></th>
					<th colspan="14" >PIHAK KESATU,</th>
				</tr>
				<br><br><br><br><br><br><br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="14" >('.$nama.')</th>
					<th colspan="2" ></th>
					<th colspan="14" >('.$wali.')</th>
					<th colspan="2" ></th>
					<th colspan="14" >(IMMANUEL DARMAWAN SANTOSO)</th>
				</tr>
				<br><br><br>
				<tr>
					<th align="center" colspan="48" >Mengetahui</th>
				</tr>
				<tr>
					<th align="center" colspan="48" >Kepala Dinas Kabupaten '.$dinnasf.$dinnasl.'</th>
				</tr>
				<tr>
					<th colspan="10" ></th>
					<th colspan="15" ><br><br><br><br><br><br><br><br></th>
				</tr>

				<tr>
					<th align="center" colspan="48" >(NIP...........................................)</th>
				</tr>


			 </table>
			 <br pagebreak="true"/>
			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			 <tr>
			 <th><br><br><br><br><br><br><br><br></th>
			 </tr>
				<tr>
					<th><b><u>SURAT PERNYATAAN KEBENARAN DOKUMEN</u></b></th>
				</tr>
				<tr>
					<th>Nomor : '.$nomor.'</th>
				</tr>

			 </table><br><br>

			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
				<th colspan="2" ></th>
					<th colspan="73" >Yang bertandatangan di bawah ini :</th>
				</tr>
				<br>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Nama </th>
					<th colspan="3">:</th>
					<th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
				 </tr>
				<tr>
				<th colspan="2" ></th>
					<th colspan="30" >Jabatan </th>
					<th colspan="3">:</th>
					<th colspan="35">DIREKTUR UTAMA</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="30" >Nama PT </th>
					<th colspan="3">:</th>
					<th colspan="35">PT.FLAMBOYAN GEMAJASA</th>
				 </tr>
				 <br>
				 <tr>
				 	<th colspan="2" ></th>
					 <th colspan="73" >Menyatakan dengan sebenarnya bahwa :</th>
				 </tr>
				 <br>
				  <tr>
					 <th colspan="2" ></th>
					 <th colspan="71" >Semua dokumen yang kami lampirkan sebagai kelengkapan untuk Pengajuan ID di Dinas Tenaga Kerja, Transmigrasi dan Perindustrian Kabupaten Banyuwangi sesuai dengan data yang dimiliki oleh CPMI ( tidak ada pemalsuan / rekayasa data ).</th>
				 </tr>
				 <br>
				 <tr>
				 	<th colspan="2" ></th>
					 <th colspan="30" >Nama </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$nama.'</th>
				  </tr>
				 <tr>
				 	<th colspan="2" ></th>
					 <th colspan="30" >NIK </th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$noktp.'</th>
				  </tr>
				  <br>
				   <tr>
					  <th colspan="2" ></th>
					  <th colspan="71" >Apabila kemudian hari ada yang bermasalah mengenai data CPMI, maka saya bertanggung jawab sesuai dengan ketentuan hukum yang berlaku.</th>
				  </tr>
				  <br>
				   <tr>
					  <th colspan="2" ></th>
					  <th colspan="71" >Demikian surat pernyataan ini dibuat dengan penuh rasa tanggung jawab untuk dipergunakan sebagaimana mestinya.</th>
				  </tr>
				</table><br><br><br><br>

				<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				  <br><br>

						<tr>
						<th colspan="2" ></th>
						<th colspan="14" ></th>
						<th colspan="2" ></th>
						<th colspan="14" ></th>
						<th colspan="6" ></th>
						<th align="left" colspan="20"><br><br>Malang, '.$tglnya.' '.$bulannya.' '.$thnnya.'</th>
						</tr>
					 <tr>
						<th colspan="2" ></th>
						<th colspan="14" ></th>
						<th colspan="2" ></th>
						<th colspan="14" ></th>
						<th colspan="2" ></th>
						 <th colspan="24" align="center" >PT.FLAMBOYAN GEMAJASA</th>
					 </tr>
					 <br><br><br><br><br><br><br><br>

					 <tr>
						 <th colspan="2" ></th>
						 <th colspan="14" ></th>
						 <th colspan="2" ></th>
						 <th colspan="14" ></th>
						 <th colspan="2" ></th>
						 <th colspan="24" align="center" ><u>IMMANUEL DARMAWAN SANTOSO</u></th>
					 </tr>
					 <tr>
						 <th colspan="2" ></th>
						 <th colspan="14" ></th>
						 <th colspan="2" ></th>
						 <th colspan="14" ></th>
						 <th colspan="2" ></th>
						 <th colspan="24" align="center" >DIREKTUR</th>
					 </tr>
					 </table>
			';

  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	$pdf->Output('PP FORMAL BANYUWANGI -'.$id_penempatan.'.pdf', 'I');
	}

	function formal_kab_ponorogo($id_penempatan, $cabang="", $khusus = "")
	{

		$alamatptdigunakan = "JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI      KEC.LAWANG KABUPATEN MALANG";
		if($cabang == 2)
		{
			$alamatptdigunakan = "Taman Sari RT-37 A Kel. Kroyo Kec. Karangmalang Kab. Sragen Provinsi Jawa Tengah";
		}


		$bapak = $this->db->query('SELECT * FROM pembuatan_perjanjian WHERE id_tki = "'.$id_penempatan.'"')->result();

		$tampil = $bapak[0]->hubsaksi;

		$statusnya='';
		$nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
		$nomor 				= $this->m_baru1->tampilnomor($id_penempatan);
		$kode_agen 			= $this->m_baru1->tampil_kode_agen($id_penempatan);
		$nama_agen 			= $this->m_baru1->tampil_nama_agen($kode_agen);

			if($tampil == 'wali'){
				$tampilalamatortu = $this->m_baru1->tampilalamatkontak($id_penempatan);
			}else{
				$tampilalamatortu = $this->m_baru1->tampilalamatortu($id_penempatan);
			}

			$id_pengguna 		= $this->m_baru1->tampil_id_pengguna($kode_agen);
			$nomer_pengguna 	= $this->m_baru1->tampil_nomer_pengguna($kode_agen);
			$alamat_pengguna 	= $this->m_baru1->tampil_alamat_pengguna($kode_agen);

			$jabatan 			= $this->m_baru1->tampil_jabatan($id_penempatan);

			$tempatlahir 		= $this->m_baru1->tampiltempatlahir($id_penempatan);
			$tgllahir2 			= $this->m_baru1->tampiltgllahir($id_penempatan);

			$lahiran=str_replace(".","-",$tgllahir2);
			$tgllahir = date("d-m-Y", strtotime($lahiran));



			$jeniskelamin 		= $this->m_baru1->tampiljeniskelamin($id_penempatan);

			if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
				$jeniskelamin="Perempuan";
			}
			if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
				$jeniskelamin="Laki-Laki";
			}


			$alamat 			= $this->m_baru1->tampilalamat($id_penempatan);
			$notelp 			= $this->m_baru1->tampilnotelp($id_penempatan);



			if($tampil == 'wali'){
				$nama_bapak 		= $this->m_baru1->tampilnama_kontak($id_penempatan);
			}elseif($tampil == 'Ibu'){
				$nama_bapak 		= $this->m_baru1->tampilnama_ibu($id_penempatan);
			}else{
				$nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);
			}

			$notelpkel 			= $this->m_baru1->tampilnotelpkel($id_penempatan);
			$pendidikan 		= $this->m_baru1->tampilpendidikan($id_penempatan);
			$status 			= $this->m_baru1->tampilstatus($id_penempatan);
			$nama_istri_suami 	= $this->m_baru1->tampilnama_istri_suami($id_penempatan);
			$alamatkontak 		= $this->m_baru1->tampilalamatkontak($id_penempatan);

			$gaji				= $this->m_baru1->tampil_gaji($id_penempatan);
			$lembur				= $this->m_baru1->tampil_lembur($id_penempatan);
			$hubungan			= $this->m_baru1->tampil_hubungan($id_penempatan);
			$wali 				= $this->m_baru1->tampil_wali($id_penempatan);
			$nama_dinas 		= $this->m_baru1->tampil_nama_dinas($id_penempatan);

			$status=str_replace("未婚","",$status);
			$status=str_replace("已婚","",$status);
			$status=str_replace("離婚","",$status);
			$status=str_replace("丈夫去世","",$status);

					$datapen = $this->m_baru1->ambilpendmandarin();
			for($i=0;$i<count($datapen);$i++){
				$pendidikan=str_replace($datapen[$i],"",$pendidikan);
			}

			$tanggal=$this->m_baru1->tampiltanggal($id_penempatan);
			$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

			if ($tanggal != NULL) {
				$ex_tgl = explode("-",$tanggal);
				 $timestamp = strtotime($tanggal);

				 $hari = $array_hari[date("N", $timestamp)];//$array_hari[date('N')];
				 $bulannya = $array_bulan[ (int) $ex_tgl[1]];

				 $tglnya = $ex_tgl[0];
				 $thnnya = $ex_tgl[2];

			 } else {
				 $tanggal=date('d-m-Y');
				$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
				$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

				 $hari = $array_hari[date('N')];
				 $bulannya = $array_bulan[ (int) date('m')];

				 $tglnya = date('d');
				 $thnnya = date('Y');
			 }
			 $tglnya = ucwords($this->terbilang($tglnya));
			 $thnnya = ucwords($this->terbilang("2002"));
			 $status=trim($status," ");
			 if($status=='Belum Nikah' || $status=='Belum Kawin' || $status=='Cerai' || $status=='Cerai mati'){
			 $statusnya='<tr>
						<th colspan="2" ></th>
						<th colspan="25" >Nama Suami/Istri	 </th>
						<th colspan="3">:</th>
						<th colspan="35"></th>
					 </tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="25" >Alamat Suami/Istri	 </th>
						<th colspan="3">:</th>
						<th colspan="35"></th>
					 </tr>';
			 }

			 else{
			 $statusnya='<tr>
						<th colspan="2" ></th>
						<th colspan="25" >Nama Suami/Istri	 </th>
						<th colspan="3">:</th>
						<th colspan="35">'.$nama_istri_suami.'</th>
					 </tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="25" >Alamat Suami/Istri	 </th>
						<th colspan="3">:</th>
						<th colspan="35">'.$alamatkontak.'</th>
					 </tr>';
			 }

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
		 $pdf->SetMargins(10, 10, 5);
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
		$pdf->SetFont('times', '', '11.5', '', false);
		$pdf->AddPage();

		$lamakontraknya = '2 (dua)';
		$dan = '';
		if($khusus == ""){
			$lamakontraknya = '3 (tiga)';
			$dan = ' dan';
		}
		// Set some content to print

		$html = '<br><br><br><br><br><br><br><br> <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
					<tr>
						<th><b>PERJANJIAN PENEMPATAN</b></th>
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
						<th><b>Nomor : '.$nomor.'</b></th>
					</tr>
					<tr>
						<th><b>NEGARA PENEMPATAN : .TAIWAN</b></th>
					</tr>

				 </table><br><br>

				<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
					<tr>
						<th align="center" colspan="73" >Pada hari ini '.$hari.' tanggal '.$tglnya.' bulan '.$bulannya.' tahun '.$thnnya.' telah diadakan Perjanjian Penempatan antara :</th>
					</tr>
					<br>
					<tr>
						<th colspan="2" >1</th>
						<th colspan="25" >Nama Penanggung Jawab</th>
						<th colspan="3">:</th>
						<th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
					 </tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="25" >No. KTP </th>
						<th colspan="3">:</th>
						<th colspan="35">3507251110800003</th>
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
						<th colspan="35">'.strtoupper($alamatptdigunakan).'</th>
					 </tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="25" >No. Telepon/Fax/E-mail  </th>
						<th colspan="3">:</th>
						<th colspan="35">(0341) 425642 </th>
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
						<th colspan="35">'.$tempatlahir.', '.$tgllahir.'</th>
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
						<th colspan="25" >Alamat Orang Tua / Wali </th>
						<th colspan="3">:</th>
						<th colspan="35">'.$tampilalamatortu.'</th>
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
					'.$statusnya.'
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
						<th><br><br><br><br><br><br><br><br><b>BAB I</b></th>
					</tr>
					<tr>
						<th><b>HAK DAN KEWAJIBAN PIHAK PERTAMA</b></th>
					</tr>
				 </table>
				 <br><br>
				 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
					<tr>
						<th align="center" colspan="64" ><b>Pasal 1</b></th>
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
						<th colspan="35"> '.$lamakontraknya.' Tahun</th>
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

					<tr align="left">
						<th>PIHAK PERTAMA wajib memberikan jaminan keselamatan, kesehatan, keamanan'.$dan.' PIHAK KEDUA sejak penandatanganan perjanjian penempatan, keberangkatan dari daerah asal, selama di tempat penampungan, berangkat ke TAIWAN dan sampai kembali ke Indonesia.</th>
					</tr>
					<br>
					<tr>
						<th><b>Pasal 3 </b></th>
					</tr>
					<br>

					<tr align="left">
						<th>PIHAK PERTAMA wajib menyediakan tempat penampungan dan konsumsi yang layak sebelum keberangkatan bagi PIHAK KEDUA sesuai ketentuan yang berlaku.</th>
					</tr>
					<br>
					<tr>
						<th><b>Pasal 4 </b></th>
					</tr>
					<br>

					<tr align="left">
						<th>PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam asuransi Pra Penempatan, Masa Penempatan dan Purna Penempatan</th>
					</tr>
					<br>
					<tr>
						<th><b>Pasal 5 </b></th>
					</tr>
					<br>
					<tr>
						<th width="5%" align="left">(1)</th>
						<th align="left" colspan="6" >PIHAK PERTAMA wajib mengurus dokumen</th>
					</tr>

					<tr>
						<th width="5%" align="left">(2)</th>
						<th align="left" colspan="6" >Keberangkatan PIHAK KEDUA berupa paspor, visa kerja, dan kepesertaan asuransi.</th>
					</tr>

					<tr>
						<th width="5%" align="left">(3)</th>
						<th align="left" colspan="7" >PIHAK KEDUA wajib membiayai pengurusan dokumen jati diri berupa pemeriksaan psikologi dan kesehatan, paspor, visa serta uji keterampilan / kompetensi.</th>
					</tr>
					<br pagebreak="true"/>

					<tr>
						<th width="2%"></th>
						<th><br><br><br><br><br><br><br><br><b>Pasal 19 </b></th>
					</tr>

					<tr>
						<th width="2%" align="left"></th>
						<th align="left"  colspan="7">Perjanjian penempatan ini berlaku sejak ditandatangani oleh PIHAK PERTAMA dan PIHAK KEDUA sampai dengan 3 (tiga) bulan atau sampai PIHAK KEDUA bekerja ke Luar Negeri.</th>
					</tr>
					<tr>
						<th width="2%" align="left"></th>
						<th align="left" colspan="7"><br><br>Malang , '.$tanggal.'</th>
					</tr>
					<br>
				 </table><br>

				 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				 <br><br>

					<tr>
						<th colspan="2" ></th>
						<th colspan="12" >PIHAK PERTAMA</th>
						<th colspan="2" ></th>
						<th colspan="14" >PIHAK KEDUA</th>
					</tr>
					<br><br><br><br><br><br><br><br>

					<tr>
						<th colspan="2" ></th>
						<th colspan="12" >(IMMANUEL DARMAWAN SANTOSO)</th>
						<th colspan="2" ></th>
						<th colspan="14" >('.$nama.')</th>
					</tr>
					<br><br><br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="12" align="left"></th>
						<th colspan="2" ></th>
						<th colspan="14" >Saksi</th>
					</tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="12" align="left"></th>
						<th colspan="2" ></th>
						<th colspan="14" >'.$hubungan.'</th>
					</tr>
					<br><br><br><br><br><br><br><br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="12" align="left"></th>
						<th colspan="2" ></th>
						<th colspan="14" >('.$wali.')</th>
					</tr>
					<tr>
						<th width="2%"></th>
						<th colspan="10" align="left"></th>
						<th colspan="10" ></th>
						<th colspan="10" ></th>
					</tr>


				 </table>
				';

	  // ;

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
		$pdf->Output('PP FORMAL PONOROGO'.$id_penempatan.'.pdf', 'I');
	}

    function formal_kab_lampung($id_penempatan, $cabang="", $khusus = "") {

		$alamatptdigunakan = "JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI      KEC.LAWANG KABUPATEN MALANG";
		if($cabang == 2){
			$alamatptdigunakan = "Taman Sari RT-37 A Kel. Kroyo Kec. Karangmalang Kab. Sragen Provinsi Jawa Tengah";
		}


    	$bapak = $this->db->query('SELECT * FROM pembuatan_perjanjian WHERE id_tki = "'.$id_penempatan.'"')->result();

		$tampil = $bapak[0]->hubsaksi;

		$statusnya='';
		$nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
		$nomor 				= $this->m_baru1->tampilnomor($id_penempatan);
		$kode_agen 			= $this->m_baru1->tampil_kode_agen($id_penempatan);
		$nama_agen 			= $this->m_baru1->tampil_nama_agen($kode_agen);




		if($tampil == 'wali'){
			$tampilalamatortu = $this->m_baru1->tampilalamatkontak($id_penempatan);
		}else{
			$tampilalamatortu = $this->m_baru1->tampilalamatortu($id_penempatan);
		}

		$id_pengguna 		= $this->m_baru1->tampil_id_pengguna($kode_agen);
		$nomer_pengguna 	= $this->m_baru1->tampil_nomer_pengguna($kode_agen);
		$alamat_pengguna 	= $this->m_baru1->tampil_alamat_pengguna($kode_agen);

		$jabatan 			= $this->m_baru1->tampil_jabatan($id_penempatan);

		$tempatlahir 		= $this->m_baru1->tampiltempatlahir($id_penempatan);
		$tgllahir2 			= $this->m_baru1->tampiltgllahir($id_penempatan);

		$lahiran=str_replace(".","-",$tgllahir2);
$tgllahir = date("d-m-Y", strtotime($lahiran));



		$jeniskelamin 		= $this->m_baru1->tampiljeniskelamin($id_penempatan);

if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}


		$alamat 			= $this->m_baru1->tampilalamat($id_penempatan);
		$notelp 			= $this->m_baru1->tampilnotelp($id_penempatan);



		if($tampil == 'wali'){
			$nama_bapak 		= $this->m_baru1->tampilnama_kontak($id_penempatan);
		}elseif($tampil == 'Ibu'){
			$nama_bapak 		= $this->m_baru1->tampilnama_ibu($id_penempatan);
		}else{
			$nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);
		}

		$notelpkel 			= $this->m_baru1->tampilnotelpkel($id_penempatan);
		$pendidikan 		= $this->m_baru1->tampilpendidikan($id_penempatan);
		$status 			= $this->m_baru1->tampilstatus($id_penempatan);
		$nama_istri_suami 	= $this->m_baru1->tampilnama_istri_suami($id_penempatan);
		$alamatkontak 		= $this->m_baru1->tampilalamatkontak($id_penempatan);

		$gaji				= $this->m_baru1->tampil_gaji($id_penempatan);
		$lembur				= $this->m_baru1->tampil_lembur($id_penempatan);
		$hubungan			= $this->m_baru1->tampil_hubungan($id_penempatan);
		$wali 				= $this->m_baru1->tampil_wali($id_penempatan);
		$nama_dinas 		= $this->m_baru1->tampil_nama_dinas($id_penempatan);

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

				$datapen = $this->m_baru1->ambilpendmandarin();
	for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

		$tanggal=$this->m_baru1->tampiltanggal($id_penempatan);
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		if ($tanggal != NULL) {
			$ex_tgl = explode("-",$tanggal);
	 		$timestamp = strtotime($tanggal);

	 		$hari = $array_hari[date("N", $timestamp)];//$array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) $ex_tgl[1]];

	 		$tglnya = $ex_tgl[0];
	 		$thnnya = $ex_tgl[2];
	 	} else {
	 		$tanggal=date('d-m-Y');
			$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

	 		$hari = $array_hari[date('N')];
	 		$bulannya = $array_bulan[ (int) date('m')];

	 		$tglnya = date('d');
	 		$thnnya = date('Y');
	 	}
/* == backup
		$tanggal=date('d-m-Y');
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

 		$hari = $array_hari[date('N')];
 		 $bulannya = $array_bulan[ (int) date('m')];

 		$tglnya = date('d');
 		$thnnya = date('Y');
*/
 		$status=trim($status," ");
 		if($status=='Belum Nikah' || $status=='Belum Kawin' || $status=='Cerai' || $status=='Cerai mati'){
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				 </tr>';
 		}

 		else{
 		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_istri_suami.'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamatkontak.'</th>
				 </tr>';
 		}

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
     $pdf->SetMargins(10, 10, 5);
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
    $pdf->SetFont('times', '', '11.5', '', false);
	$pdf->AddPage();

	$lamakontraknya = '2 (dua)';
	$dan = '';
	if($khusus == ""){
		$lamakontraknya = '3 (tiga)';
		$dan = ' dan';
	}
	// Set some content to print

    $html = '<br><br><br><br><br><br><br><br> <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>PERJANJIAN PENEMPATAN</b></th>
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
					<th><b>Nomor : '.$nomor.'</b></th>
				</tr>
				<tr>
					<th><b>NEGARA PENEMPATAN : .TAIWAN</b></th>
				</tr>

			 </table><br><br>

			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center" colspan="73" >Pada hari ini .......... tanggal .......... bulan ........... tahun .......... telah diadakan Perjanjian Penempatan antara :</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" >1</th>
					<th colspan="25" >Nama Penanggung Jawab</th>
					<th colspan="3">:</th>
					<th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. KTP </th>
					<th colspan="3">:</th>
					<th colspan="35">3507251110800003</th>
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
					<th colspan="35">'.strtoupper($alamatptdigunakan).'</th>
				 </tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >No. Telepon/Fax/E-mail  </th>
					<th colspan="3">:</th>
					<th colspan="35">(0341) 425642 </th>
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
					<th colspan="35">'.$tempatlahir.', '.$tgllahir.'</th>
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
					<th colspan="25" >Alamat Orang Tua / Wali </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$tampilalamatortu.'</th>
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
				'.$statusnya.'
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
					<th><br><br><br><br><br><br><br><br><b>BAB I</b></th>
				</tr>
				<tr>
					<th><b>HAK DAN KEWAJIBAN PIHAK PERTAMA</b></th>
				</tr>
			 </table>
			 <br><br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center" colspan="64" ><b>Pasal 1</b></th>
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
					<th colspan="35"> '.$lamakontraknya.' Tahun</th>
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

				<tr align="left">
					<th>PIHAK PERTAMA wajib memberikan jaminan keselamatan, kesehatan, keamanan'.$dan.' PIHAK KEDUA sejak penandatanganan perjanjian penempatan, keberangkatan dari daerah asal, selama di tempat penampungan, berangkat ke TAIWAN dan sampai kembali ke Indonesia.</th>
				</tr>
				<br>
				<tr>
					<th><b>Pasal 3 </b></th>
				</tr>
				<br>

				<tr align="left">
					<th>PIHAK PERTAMA wajib menyediakan tempat penampungan dan konsumsi yang layak sebelum keberangkatan bagi PIHAK KEDUA sesuai ketentuan yang berlaku.</th>
				</tr>
				<br>
				<tr>
					<th><b>Pasal 4 </b></th>
				</tr>
				<br>

				<tr align="left">
					<th>PIHAK PERTAMA wajib mengikutsertakan PIHAK KEDUA dalam asuransi Pra Penempatan, Masa Penempatan dan Purna Penempatan</th>
				</tr>
				<br>
				<tr>
					<th><b>Pasal 5 </b></th>
				</tr>
				<br>
				<tr>
					<th width="5%" align="left">(1)</th>
					<th align="left" colspan="6" >PIHAK PERTAMA wajib mengurus dokumen</th>
				</tr>

				<tr>
					<th width="5%" align="left">(2)</th>
					<th align="left" colspan="6" >Keberangkatan PIHAK KEDUA berupa paspor, visa kerja, dan kepesertaan asuransi.</th>
				</tr>

				<tr>
					<th width="5%" align="left">(3)</th>
					<th align="left" colspan="7" >PIHAK KEDUA wajib membiayai pengurusan dokumen jati diri berupa pemeriksaan psikologi dan kesehatan, paspor, visa serta uji keterampilan / kompetensi.</th>
				</tr>
				<br pagebreak="true"/>

				<tr>
					<th width="2%"></th>
					<th><br><br><br><br><br><br><br><br><b>Pasal 19 </b></th>
				</tr>

				<tr>
					<th width="2%" align="left"></th>
					<th align="left"  colspan="7">Perjanjian penempatan ini berlaku sejak ditandatangani oleh PIHAK PERTAMA dan PIHAK KEDUA sampai dengan 3 (tiga) bulan atau sampai PIHAK KEDUA bekerja ke Luar Negeri.</th>
				</tr>
				<tr>
					<th width="2%" align="left"></th>
					<th align="left" colspan="7"><br><br>Malang , .............</th>
				</tr>
				<br>
			 </table><br>

			 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			 <br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="12" >PIHAK PERTAMA</th>
					<th colspan="2" ></th>
					<th colspan="14" >PIHAK KEDUA</th>
				</tr>
				<br><br><br><br><br><br><br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="12" >(IMMANUEL DARMAWAN SANTOSO)</th>
					<th colspan="2" ></th>
					<th colspan="14" >('.$nama.')</th>
				</tr>
				<br><br><br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="12" align="left"></th>
					<th colspan="2" ></th>
					<th colspan="14" >Saksi</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="12" align="left"></th>
					<th colspan="2" ></th>
					<th colspan="14" >'.$hubungan.'</th>
				</tr>
				<br><br><br><br><br><br><br><br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="12" align="left"></th>
					<th colspan="2" ></th>
					<th colspan="14" >('.$wali.')</th>
				</tr>
				<tr>
					<th width="2%"></th>
					<th colspan="10" align="left"></th>
					<th colspan="10" ></th>
					<th colspan="10" ></th>
				</tr>


			 </table>
			';

  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	$pdf->Output('PP FORMAL LAMPUNG -'.$id_penempatan.'.pdf', 'I');
    }


	function keabsahan_akte_kelahiran($id_penempatan,$id_pembuatan)
	{

		$daerah 			= $this->m_baru1->keabsahan_daerah($id_pembuatan);
		$tanggal 			= $this->m_baru1->keabsahan_tgl($id_pembuatan);
		$nomor 				= $this->m_baru1->keabsahan_nomor($id_pembuatan);
		$kepada 			= $this->m_baru1->keabsahan_kepada($id_pembuatan);
		$nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
		$nik 				= $this->m_baru1->tampilnoktp($id_penempatan);
		$ttl1 				= $this->m_baru1->tampiltempatlahir($id_penempatan);
		$ttl2 				= $this->m_baru1->tampiltgllahir($id_penempatan);
		$noakte 			= $this->m_baru1->tampilnamatki($id_penempatan);
		$tahunakte 			= $this->m_baru1->tampilnamatki($id_penempatan);
		$nikakte 			= $this->m_baru1->tampilnamatki($id_penempatan);

		$originalDate3 =str_replace('.','-',$tanggal);
		$newDate3 = date("Y-m-d", strtotime($originalDate3));

			$originalDate4 =str_replace('.','-',$tanggalpap);
		$newDate4 = date("Y-m-d", strtotime($originalDate4));

		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

			$tahuna = substr($newDate3, 0, 4);
			$bulana = substr($newDate3, 5, 2);
			$tgla   = substr($newDate3, 8, 2);
			$tgna = $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

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
		$pdf->SetFont('times', '', '11.5', '', false);
		$pdf->AddPage();


		$html = '
   			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

			   <tr>
			   		<th colspan="24" align="left"><br><br><br><br><br><br><br><br> </th>
			   </tr>
				<tr>
					<th colspan="100" align="right">'.$daerah.', '.$tgna.' </th>
				</tr>
				<tr>
					<th colspan="100"></th>
				</tr>
				<br>
				<tr>
					<th colspan="1"></th>
					<th colspan="8">Nomor</th>
					<th colspan="3">:</th>
					<th colspan="25">'.$nomor.'</th>
				</tr>
				<tr>
				<th colspan="1"></th>
					<th colspan="8">Lampiran</th>
					<th colspan="3">:</th>
					<th colspan="25">- </th>
				</tr>

				<tr>
				<th colspan="1"></th>
					<th colspan="8">Perihal</th>
					<th colspan="3">:</th>
					<th colspan="25">Surat Keterangan Keabsahan Akte Kelahiran</th>
				</tr>
					<br><br>
				<tr>
				<th colspan="1"></th>
					<th colspan="25">Kepada Yth </th>
					<th colspan="74"></th>
				</tr>
				<tr>
				<th colspan="1"></th>
					<th colspan="20">'.$kepada.'</th>
					<th colspan="74"></th>
				</tr><br>
				<tr>
				<th colspan="1"></th>
					<th colspan="99" style="text-align:justify" >Bersama ini kami dari PT. FLAMBOYAN GEMAJASA mengajukan permohonan kepada '.$kepada.' untuk memberikan Surat Keterangan Keabsahan Akte Kelahiran, dengan data sebagai berikut :.</th>

				</tr>

			 <br>
			 <br>
			 <br>
			 <tr>
			 <th colspan="1"></th>
				 <th colspan="25" >Nama</th>
				 <th colspan="3">:</th>
				 <th colspan="35">'.$nama.'</th>
				 <th colspan="71"></th>
			  </tr>
			 <tr>
			 <th colspan="1"></th>
				 <th colspan="25" >Nomor NIK KTP</th>
				 <th colspan="3">:</th>
				 <th colspan="35">'.$nik.'</th>
				 <th colspan="71"></th>
			  </tr>
			 <tr>
			 <th colspan="1"></th>
				 <th colspan="25" >Tempat, Tanggal Lahir</th>
				 <th colspan="3">:</th>
				 <th colspan="35">'.$ttl1.', '.$ttl2.'</th>
				 <th colspan="71"></th>
			  </tr>
			 <tr>
			 <th colspan="1"></th>
				 <th colspan="25" >No. Akte Kelahiran / Tahun Pengeluaran</th>
				 <th colspan="3">:</th>
				 <th colspan="35">'.$noakte.'/'.$tahunakte.'</th>
				 <th colspan="71"></th>
			  </tr>
			  <tr>
			  <th colspan="1"></th>
				  <th colspan="25" >No. NIK di Akte Kelahiran</th>
				  <th colspan="3">:</th>
				  <th colspan="35">'.$nikakte.'</th>
				  <th colspan="71"></th>
			   </tr>
			</table>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
				<th colspan="1"></th>
					<th colspan="48" style="text-align:justify" >Demikian surat permohonan ini kami buat, atas bantuan dan perhatiannya kami ucapkan terima kasih.</th>

					<th colspan="10"></th>
					</tr>
			 </table>

			 <br><br><br><br><br><br>
			   <table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>
					<th colspan="40" align="left">PT FLAMBOYAN GEMA JASA</th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" > </th>
					<th colspan="8" >  </th>
				</tr><tr>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
				</tr><tr>
				<th colspan="8" >  </th>
				<th colspan="8" >  </th>
				<th colspan="8" >  </th>
				<th colspan="8" >  </th>
				<th colspan="8" >  </th>
				<th colspan="8" >  </th>
				<th colspan="8" >  </th>
				<th colspan="8" >  </th>
			</tr><tr>
			<th colspan="8" >  </th>
			<th colspan="8" >  </th>
			<th colspan="8" >  </th>
			<th colspan="8" >  </th>
			<th colspan="8" >  </th>
			<th colspan="8" >  </th>
			<th colspan="8" >  </th>
			<th colspan="8" >  </th>
		</tr>
				<tr>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
				</tr>
				<tr>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
				</tr>
				<tr>

					<th colspan="40" align="left"><b><u>IMMANUEL DARMAWAN SANTOSO</u></b></th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
				</tr>
				<tr>

					<th colspan="8" >  </th>
					<th colspan="40" align="left">Direktur Utama</th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
					<th colspan="8" >  </th>
				</tr>

			 </table><br><br><br>
				';

	  // ;

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
		$pdf->Output('SURAT KEABSAHAN AKTE KELAHIRAN -'.$id_penempatan.'.pdf', 'I');
	}

		function formal_kab_ngawi($id_penempatan, $cabang="", $khusus = "")
		{
			$lamakontraknya = '2 (dua)';
			$dan = '';
			if($khusus == ""){
				$lamakontraknya = '3 (tiga)';
				$dan = ' dan';
			}
			$alamatptdigunakan = "JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI      KEC.LAWANG KABUPATEN MALANG";
			if($cabang == 2){
				$alamatptdigunakan = "Taman Sari RT-37 A Kel. Kroyo Kec. Karangmalang Kab. Sragen Provinsi Jawa Tengah";
			}

			$bapak = $this->db->query('SELECT * FROM pembuatan_perjanjian WHERE id_tki = "'.$id_penempatan.'"')->result();

			$tampil = $bapak[0]->hubsaksi;

			$statusnya='';
			$a1 				= $this->m_baru1->ambildata($id_penempatan,'a1');
			$a2 				= $this->m_baru1->ambildata($id_penempatan,'a2');
			$a3 				= $this->m_baru1->ambildata($id_penempatan,'a3');
			$a4 				= $this->m_baru1->ambildata($id_penempatan,'a4');
			$a5 				= $this->m_baru1->ambildata($id_penempatan,'a5');
			$nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
			$nomor 				= $this->m_baru1->tampilnomor($id_penempatan);
			$kode_agen 			= $this->m_baru1->tampil_kode_agen($id_penempatan);
			$nama_agen 			= $this->m_baru1->tampil_nama_agen($kode_agen);
			$tampilalamatortu = $this->m_baru1->tampilalamatortu($id_penempatan);

			$id_pengguna 		= $this->m_baru1->tampil_id_pengguna($kode_agen);
			$nomer_pengguna 	= $this->m_baru1->tampil_nomer_pengguna($kode_agen);
			$alamat_pengguna 	= $this->m_baru1->tampil_alamat_pengguna($kode_agen);

			$jabatan 			= $this->m_baru1->tampil_jabatan($id_penempatan);

			$tempatlahir 		= $this->m_baru1->tampiltempatlahir($id_penempatan);
			$tgllahir2 			= $this->m_baru1->tampiltgllahir($id_penempatan);

			$lahiran=str_replace(".","-",$tgllahir2);
			$tgllahir = date("d-m-Y", strtotime($lahiran));



			$jeniskelamin 		= $this->m_baru1->tampiljeniskelamin($id_penempatan);

			if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
				$jeniskelamin="Perempuan";
			}
			if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
				$jeniskelamin="Laki-Laki";
			}


			$alamat 			= $this->m_baru1->tampilalamat($id_penempatan);
			$notelp 			= $this->m_baru1->tampilnotelp($id_penempatan);



			if($tampil == 'wali'){
				$nama_bapak 		= $this->m_baru1->tampilnama_kontak($id_penempatan);
			}elseif($tampil == 'Ibu'){
				$nama_bapak 		= $this->m_baru1->tampilnama_ibu($id_penempatan);
			}else{
				$nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);
			}

			// $nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);




			$notelpkel 			= $this->m_baru1->tampilnotelpkel($id_penempatan);
			$pendidikan 		= $this->m_baru1->tampilpendidikan($id_penempatan);
			$status 			= $this->m_baru1->tampilstatus($id_penempatan);
			$nama_istri_suami 	= $this->m_baru1->tampilnama_istri_suami($id_penempatan);
					$alamatkontak 			= $this->m_baru1->tampilalamatkontak($id_penempatan);

				$gaji 						= $this->m_baru1->tampil_gaji($id_penempatan);
				$lembur 					= $this->m_baru1->tampil_lembur($id_penempatan);
			$hubungan 						= $this->m_baru1->tampil_hubungan($id_penempatan);
			$wali 							= $this->m_baru1->tampil_wali($id_penempatan);
			$nama_dinas 					= $this->m_baru1->tampil_nama_dinas($id_penempatan);
			if($a2 == '')
			{
				$a2 = $gaji;
			}

			$status=str_replace("未婚","",$status);
			$status=str_replace("已婚","",$status);
			$status=str_replace("離婚","",$status);
			$status=str_replace("丈夫去世","",$status);

					$datapen = $this->m_baru1->ambilpendmandarin();
			for($i=0;$i<count($datapen);$i++){
				$pendidikan=str_replace($datapen[$i],"",$pendidikan);
			}

			$tanggal=$this->m_baru1->tampiltanggal($id_penempatan);
			$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

			if ($tanggal != NULL) {
				$ex_tgl = explode("-",$tanggal);
		 		$timestamp = strtotime($tanggal);

		 		$hari = $array_hari[date("N", $timestamp)];//$array_hari[date('N')];
		 		$bulannya = $array_bulan[ (int) $ex_tgl[1]];

		 		$tglnya = $ex_tgl[0];
		 		$thnnya = $ex_tgl[2];
		 	} else {
		 		$tanggal=date('d-m-Y');
				$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
				$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		 		$hari = $array_hari[date('N')];
		 		$bulannya = $array_bulan[ (int) date('m')];

		 		$tglnya = date('d');
		 		$thnnya = date('Y');
			 }
			 $dinnas = strtolower($tempatlahir);
			 $dinnasf = strtoupper( substr($dinnas,0,1) );
			 $dinnasl = substr($dinnas,1);
			/* == backup
			$tanggal=date('d-m-Y');
			$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

	 		$hari = $array_hari[date('N')];
	 		 $bulannya = $array_bulan[ (int) date('m')];

	 		$tglnya = date('d');
	 		$thnnya = date('Y');
			*/
	 		$status=trim($status," ");
	 		if($status=='Belum Nikah' || $status=='Belum Kawin' || $status=='Cerai' || $status=='Cerai mati'){
	 		$statusnya='<tr>
						<th colspan="2" ></th>
						<th colspan="25" >Nama Suami/Istri	 </th>
						<th colspan="3">:</th>
						<th colspan="35"></th>
					 </tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="25" >Alamat Suami/Istri	 </th>
						<th colspan="3">:</th>
						<th colspan="35"></th>
					 </tr>';
	 		}

	 		else{
	 		$statusnya='<tr>
						<th colspan="2" ></th>
						<th colspan="25" >Nama Suami/Istri	 </th>
						<th colspan="3">:</th>
						<th colspan="35">'.$nama_istri_suami.'</th>
					 </tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="25" >Alamat Suami/Istri	 </th>
						<th colspan="3">:</th>
						<th colspan="35">'.$alamatkontak.'</th>
					 </tr>';
	 		}

			if($a4 != '')
			{
				$abjad = [];
				for( $i ='a'; $i <= 'z'; $i++ ) {

					$abjad[] = $i;
				}

				$a4x = '';
				foreach(preg_split('/\r\n|[\r\n]/', $a4) as $k => $v)
				{
					$v = str_replace("Rp.","Rp",$v);
					$exx = explode('Rp',$v);
					$a4x .=
						'<tr>
							<th colspan="6" ></th>
							<th colspan="36">'.$abjad[$k].'. '.$exx[0].'</th>
							<th colspan="3">Rp. </th>
							<th colspan="10" style="text-align: right">'.$exx[1].'</th>
							<th colspan="22"></th>
						</tr>';
				}
				$a4 = $a4x;
			}



			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-16', false);
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
			$pdf->SetTitle('PP FORMAL PATI  '.$id_penempatan);
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
			$pdf->SetMargins(10, 10, 5);
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
			$pdf->SetFont('times', '', '11.5', '', false);
			$pdf->AddPage();

			// Set some content to print

			$html = '<br><br><br><br><br><br><br><br> <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
					<tr>
						<th><b>PERJANJIAN PENEMPATAN</b></th>
					</tr>
					<tr>
						<th>Nomor : '.$nomor.'</th>
					</tr>

				 </table><br><br>

				<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
					<tr>
					<th colspan="2" ></th>
						<th colspan="73" >Pada hari ini '.$hari.' tanggal '.$tglnya.' bulan '.$bulannya.' tahun '.$thnnya.' telah diadakan Perjanjian Penempatan Calon Pekerja Migran Indonesia oleh dan antara :</th>
					</tr>
					<br>
					<tr>
					<th colspan="2" ></th>
						<th colspan="30" >Nama </th>
						<th colspan="3">:</th>
						<th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
					 </tr>
					<tr>
					<th colspan="2" ></th>
						<th colspan="30" >Jabatan </th>
						<th colspan="3">:</th>
						<th colspan="35">DIREKTUR UTAMA</th>
					 </tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="30" >Alamat </th>
						<th colspan="3">:</th>
						<th colspan="35">'.strtoupper($alamatptdigunakan).'</th>
					 </tr>
					 <br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="71" >Dalam hal ini bertindak untuk dan atas nama PT FLAMBOYAN GEMAJASA selanjutnya disebut sebagai <b>PIHAK KESATU</b>. </th>
					 </tr>
					 <br>
					  <tr>
						<th colspan="2" ></th>
						<th colspan="30" >Nama Calon Pekerja Migran Indonesia</th>
						<th colspan="3">:</th>
						<th colspan="35">'.$nama.'</th>
					 </tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="30" >Tempat dan Tanggal Lahir </th>
						<th colspan="3">:</th>
						<th colspan="35">'.$tempatlahir.', '.$tgllahir.'</th>
					 </tr>
					 <tr>
						 <th colspan="2" ></th>
						 <th colspan="30" >Status </th>
						 <th colspan="3">:</th>
						 <th colspan="35">'.$status.'</th>
					  </tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="30" >Alamat</th>
						<th colspan="3">:</th>
						<th colspan="35">'.$alamat.'</th>
					 </tr>
					 <br>
					 <tr>
						<th colspan="2" ></th>
						<th colspan="71" >Selanjutnya disebut <b>PIHAK KEDUA</b> </th>
					 </tr>
					 <br>
					 <tr>
						<th colspan="2" ></th>
						<th colspan="71" >PIHAK KESATU dan PIHAK KEDUA telah sepakat untuk mengadakan Perjanjian Penempatan dengan ketentuan sebagai berikut: </th>
					 </tr>
					 <br/>
					<tr>
						<th align="center" colspan="71" >Pasal 1</th>
					</tr>
					<br>
					 <tr>
						<th colspan="2" ></th>
						<th colspan="71" >PIHAK KESATU sanggup menempatkan PIHAK KEDUA di Negara Taiwan sebagai '.strtoupper($a5).' pada pemberi kerja '.$nama_agen.' yang beralamat '.$alamat_pengguna.' dalam waktu paling lama 3 (tiga) bulan sejak diterbitkan daftar nominasi PIHAK KEDUA</th>
					</tr>
				</table>
				<br pagebreak="true"/>
				<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="73"><br><br><br><br><br><br><br><br></th>
					</tr>
					<tr>
						<th align="center" colspan="71" >Pasal 2 </th>
					</tr>
					<br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="5" align="left">(1)</th>
						<th colspan="66" >PIHAK KESATU berkewajiban untuk melindungi PIHAK KEDUA sejak ditandatanganinya Perjanjian Penempatan ini sampai dengan Penempatan oleh PIHAK KEDUA sesuai dengan ketentuan yang berlaku.</th>
					</tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="5" align="left">(2)</th>
						<th colspan="66" >PIHAK KESATU berkewajiban menyediakan sarana dan prasarana dalam rangka penempatan dan perlindungan Pekerja Migran Indonesia yang layak.</th>
					</tr>
					<br/>
					<tr>
					</tr>
					<tr>
					<th align="center" colspan="71" >Pasal 3 </th>
					</tr>
					<br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="71" >PIHAK KESATU membantu dan memfasilitasi pengurusan dokumen PIHAK KEDUA berupa Perjanjian Kerja, paspor, visa kerja, tiket pesawat, dan kartu kepersertaan jaminan sosial bagi Pekerja Migran Indonesia, kecuali dokumen awal yang diurus di daerah asal masing-masing oleh PIHAK KEDUA.</th>
					</tr>
					<br/>
					<tr>
					<th align="center" colspan="71" >Pasal 4 </th>
					</tr>
					<br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="71" >PIHAK KEDUA sanggup melaksanakan pekerjaan selama masa perjanjian kerja berlangsung (36 bulan) sesuai dengan kesepakatan para pihak.</th>
					</tr>
					<br/>
					<tr>
					<th align="center" colspan="71" >Pasal 5 </th>
					</tr>
					<br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="71" >PIHAK KEDUA wajib membayar biaya penempatan sesuai dengan komponen biaya yang ditetapkan oleh Menteri Ketenagakerjaan,dengan menanggung biaya penempatan sebesar '.$a1.' terdiri dari :</th>
					</tr>
					'.$a4.'
					<tr>
						<th colspan="2" ></th>
						<th colspan="71" >Dalam hal PIHAK KEDUA membayar secara angsuran, maka besarnya angsuran adalah '.$a1.' '.$a3.' </th>
					</tr>

				</table>
				<br pagebreak="true"/>
				<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="73"><br><br><br><br><br><br><br><br></th>
					</tr>
					<tr>
					<th align="center" colspan="71" >Pasal 6 </th>
					</tr>
					<br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="71" >PIHAK KESATU bersedia mengembalikan biaya proses penempatan kepada PIHAK KEDUA yang dinyatakan unfit to work (tidak layak bekerja) berdasarkan hasil pemeriksaan psikologi dan kesehatan, setelah dipotong biaya medikal <i>check-up</i> dan biaya lainnya dengan dibuktikan melalui rincian pembiayaan dan bukti pembayaran yang sah.</th>
					</tr>
					<br/>
					<tr>
					<th align="center" colspan="71" >Pasal 7 </th>
					</tr>
					<br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="71" >PIHAK KEDUA diwajibkan mengganti biaya yang telah dikeluarkan PIHAK KESATU apabila PIHAK KEDUA mengundurkan diri (wanprestasi) tanpa alasan apapun.</th>
					</tr>
					<br/>
					<tr>
					<th align="center" colspan="71" >Pasal 8 </th>
					</tr>
					<br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="5" align="left">(1)</th>
						<th colspan="66" >Apabila dalam waktu 3 (tiga) bulan PIHAK KEDUA belum ditempatkan oleh PIHAK KESATU, PIHAK KESATU berkewajiban memberikan penjelasan mengenai alasan keterlambatan penempatan kepada PIHAK KEDUA.</th>
					</tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="5" align="left">(2)</th>
						<th colspan="66" >PIHAK KEDUA berhak melaporkan permasalahan kepada Dinas yang menyelenggarakan urusan pemerintahan bidang ketenagakerjaan di Kabupaten/Kota untuk mendapatkan penyelesaian dalam hal PIHAK KESATU dengan sengaja tidak memenuhi kewajiban PIHAK KESATU sebagaimana dimaksud pada ayat (1).</th>
					</tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="5" align="left">(3)</th>
						<th colspan="66" >Dalam hal ini PIHAK KESATU terbukti tidak dapat memberikan penjelasan kepastian penempatan PIHAK KEDUA, PIHAK KESATU berkewajiban mengembalikan seluruh biaya PIHAK KEDUA tanpa ada potongan apapun.</th>
					</tr>
					<br/>
					<tr>
					<th align="center" colspan="71" >Pasal 9 </th>
					</tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="5" align="left">(1)</th>
						<th colspan="66" >PIHAK KESATU menjamin PIHAK KEDUA menerima pembayaran atas gaji sebesar '.$a2.' sebagaimana diatur dalam perjanjian kerja.</th>
					</tr>
					<tr>
						<th colspan="2" ></th>
						<th colspan="5" align="left">(2)</th>
						<th colspan="66" >Apabila pemberi kerja PIHAK KEDUA tidak mempekerjakan sesuai dengan perjanjian kerja, PIHAK KESATU akan menyelesaikan hubungan kerja antara pemberi kerja dengan PIHAK KEDUA.</th>
					</tr>
					</table>
				<br pagebreak="true"/>
				<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="73"><br><br><br><br><br><br><br><br></th>
					</tr>
					<tr>
					<th align="center" colspan="71" >Pasal 10 </th>
					</tr>
					<br>
					<tr>
						<th colspan="2" ></th>
						<th colspan="71" >Perjanjian penempatan ini disepakati dan ditandatangani oleh PARA PIHAK, dibuat rangkap 2 (dua) dalam bahasa indonesia di atas kertas bermaterai cukup dan dapat dipertanggungjawabkan kebenarannya oleh masing-masing pihak.</th>
					</tr>
					<br><br>
					<tr>
						<th align="right" colspan="67"><br><br>Malang, '.$tglnya.' '.$bulannya.' '.$thnnya.'</th>
						<th colspan="6" ></th>
					</tr>
					<br>
				 </table><br><br><br><br>
				 <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">

					<tr>
						<th colspan="2" ></th>
						<th colspan="14" >PIHAK KEDUA,</th>
						<th colspan="2" ></th>
						<th colspan="12" >PIHAK KESATU,</th>
					</tr>
					<br><br><br><br><br><br><br><br>

					<tr>
						<th colspan="2" ></th>
						<th colspan="14" >('.$nama.')</th>
						<th colspan="2" ></th>
						<th colspan="12" >(IMMANUEL DARMAWAN SANTOSO)</th>
					</tr>
					<br><br><br>
					<tr>
						<th align="center" colspan="30" >Mengetahui</th>
					</tr>
					<tr>
						<th align="center" colspan="30" >Kepala Dinas Kabupaten '.$dinnasf.$dinnasl.'</th>
					</tr>
					<tr>
						<th colspan="10" ></th>
						<th colspan="15" ><br><br><br><br><br><br><br><br></th>
					</tr>

					<tr>
						<th colspan="11" ></th>
						<th align="left" colspan="24" >(NIP..............................................)</th>
					</tr>


				 </table>
				';

			$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
			$pdf->Output('PP FORMAL PATI'.$id_penempatan.'.pdf', 'I');
  }


  public function zerocost_banyuwangi($id_penempatan, $cabang="", $khusus = "")
  {
	  $lamakontraknya = '2 (dua)';
	  $dan = '';
	  if($khusus == ""){
		  $lamakontraknya = '3 (tiga)';
		  $dan = ' dan';
	  }
	  $alamatptdigunakan = "JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI      KEC.LAWANG KABUPATEN MALANG";
	  if($cabang == 2){
		  $alamatptdigunakan = "Taman Sari RT-37 A Kel. Kroyo Kec. Karangmalang Kab. Sragen Provinsi Jawa Tengah";
	  }

	  $bapak = $this->db->query('SELECT * FROM pembuatan_perjanjian WHERE id_tki = "'.$id_penempatan.'"')->result();

	  $tampil = $bapak[0]->hubsaksi;



	  $statusnya='';
	  $nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
	  $noktp				= $this->m_baru1->tampilnoktp($id_penempatan);
	  $tglnoktp				= $this->m_baru1->tampiltglnoktp($id_penempatan);
	  $tempatnoktp				= $this->m_baru1->tampiltempatnoktp($id_penempatan);
	  $nomor 				= $this->m_baru1->tampilnomor($id_penempatan);
	  $kode_agen 			= $this->m_baru1->tampil_kode_agen($id_penempatan);
	  $nama_agen 			= $this->m_baru1->tampil_nama_agen($kode_agen);
	  $tampilalamatortu = $this->m_baru1->tampilalamatortu($id_penempatan);

	  $id_pengguna 		= $this->m_baru1->tampil_id_pengguna($kode_agen);
	  $nomer_pengguna 	= $this->m_baru1->tampil_nomer_pengguna($kode_agen);
	  $alamat_pengguna 	= $this->m_baru1->tampil_alamat_pengguna($kode_agen);

	  $jabatan 			= $this->m_baru1->tampil_jabatan($id_penempatan);

	  $tempatlahir 		= $this->m_baru1->tampiltempatlahir($id_penempatan);
	  $tgllahir2 			= $this->m_baru1->tampiltgllahir($id_penempatan);

	  $lahiran=str_replace(".","-",$tgllahir2);
	  $tgllahir = date("d-m-Y", strtotime($lahiran));
	  $tglnoktp22=str_replace(".","-",$tglnoktp);
	  $tglnoktp = date("d-m-Y", strtotime($tglnoktp22));


	  $jeniskelamin 		= $this->m_baru1->tampiljeniskelamin($id_penempatan);

	  if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
		  $jeniskelamin="Perempuan";
	  }
	  if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
		  $jeniskelamin="Laki-Laki";
	  }


	  $alamat 			= $this->m_baru1->tampilalamat($id_penempatan);
	  $notelp 			= $this->m_baru1->tampilnotelp($id_penempatan);



	  if($tampil == 'wali'){
		  $nama_bapak 		= $this->m_baru1->tampilnama_kontak($id_penempatan);
	  }elseif($tampil == 'Ibu'){
		  $nama_bapak 		= $this->m_baru1->tampilnama_ibu($id_penempatan);
	  }else{
		  $nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);
	  }

	  // $nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);




	  $notelpkel 			= $this->m_baru1->tampilnotelpkel($id_penempatan);
	  $pendidikan 		= $this->m_baru1->tampilpendidikan($id_penempatan);
	  $status 			= $this->m_baru1->tampilstatus($id_penempatan);
	  $nama_istri_suami 	= $this->m_baru1->tampilnama_istri_suami($id_penempatan);
			  $alamatkontak 			= $this->m_baru1->tampilalamatkontak($id_penempatan);

		  $gaji 						= $this->m_baru1->tampil_gaji($id_penempatan);
		  $lembur 					= $this->m_baru1->tampil_lembur($id_penempatan);
	  $hubungan 						= $this->m_baru1->tampil_hubungan($id_penempatan);
	  $wali 							= $this->m_baru1->tampil_wali($id_penempatan);
	  $nama_dinas 					= $this->m_baru1->tampil_nama_dinas($id_penempatan);

	  $status=str_replace("未婚","",$status);
	  $status=str_replace("已婚","",$status);
	  $status=str_replace("離婚","",$status);
	  $status=str_replace("丈夫去世","",$status);

			  $datapen = $this->m_baru1->ambilpendmandarin();
	  for($i=0;$i<count($datapen);$i++){
		  $pendidikan=str_replace($datapen[$i],"",$pendidikan);
	  }

	  $tanggal=$this->m_baru1->tampiltanggal($id_penempatan);
	  $array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
	  $array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

	  if ($tanggal != NULL) {
		  $ex_tgl = explode("-",$tanggal);
		   $timestamp = strtotime($tanggal);

		   $hari = $array_hari[date("N", $timestamp)];//$array_hari[date('N')];
		   $bulannya = $array_bulan[ (int) $ex_tgl[1]];

		   $tglnya = $ex_tgl[0];
		   $thnnya = $ex_tgl[2];
	   } else {
		   $tanggal=date('d-m-Y');
		  $array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		  $array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		   $hari = $array_hari[date('N')];
		   $bulannya = $array_bulan[ (int) date('m')];

		   $tglnya = date('d');
		   $thnnya = date('Y');
	   }
	   $dinnas = strtolower($tempatlahir);
	   $dinnasf = strtoupper( substr($dinnas,0,1) );
	   $dinnasl = substr($dinnas,1);
	  /* == backup
			  $tanggal=date('d-m-Y');
			  $array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			  $array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

			  $hari = $array_hari[date('N')];
			  $bulannya = $array_bulan[ (int) date('m')];

			  $tglnya = date('d');
			  $thnnya = date('Y');
	  */
	   $status=trim($status," ");
	   if($status=='Belum Nikah' || $status=='Belum Kawin' || $status=='Cerai' || $status=='Cerai mati'){
	   $statusnya='<tr>
				  <th colspan="2" ></th>
				  <th colspan="25" >Nama Suami/Istri	 </th>
				  <th colspan="3">:</th>
				  <th colspan="35"></th>
			   </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="25" >Alamat Suami/Istri	 </th>
				  <th colspan="3">:</th>
				  <th colspan="35"></th>
			   </tr>';
	   }

	   else{
	   $statusnya='<tr>
				  <th colspan="2" ></th>
				  <th colspan="25" >Nama Suami/Istri	 </th>
				  <th colspan="3">:</th>
				  <th colspan="35">'.$nama_istri_suami.'</th>
			   </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="25" >Alamat Suami/Istri	 </th>
				  <th colspan="3">:</th>
				  <th colspan="35">'.$alamatkontak.'</th>
			   </tr>';
	   }

	  $a5 				= $this->m_baru1->ambildata($id_penempatan,'a5');




	  // create new PDF document
	  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-16', false);
	  // set document information
	  $pdf->SetCreator(PDF_CREATOR);
	  $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	  $pdf->SetTitle('PP ZERO COST '.$id_penempatan);
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
	  $pdf->SetMargins(10, 10, 5);
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
	  $pdf->SetFont('times', '', '11.5', '', false);
	  $pdf->AddPage();

	  // Set some content to print

	  $html = '<br><br><br><br><br><br><br><br> <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			  <tr>
				  <th><b>PERJANJIAN PENEMPATAN ANTARA</b></th>
			  </tr>
			  <tr>
				  <th><b>PERUSAHAAN PENEMPATAN PEKERJA MIGRAN INDONESIA</b></th>
			  </tr>
			  <tr>
				  <th><b>DAN CALON PEKERJA MIGRAN INDONESIA</b></th>
			  </tr>
			  <tr>
				  <th><b>Nomor : '.$nomor.'</b></th>
			  </tr>
			  <tr>
				  <th><b>NEGARA PENEMPATAN : TAIWAN</b></th>
			  </tr>

		   </table><br><br>

		  <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
			  <tr>
			  <th colspan="2" ></th>
				  <th colspan="73" >Pada hari ini '.$hari.' tanggal '.$tglnya.' bulan '.$bulannya.' tahun '.$thnnya.' telah diadakan Perjanjian Penempatan <br/>oleh dan antara :</th>
			  </tr>
			  <br>
			  <tr>
			  <th colspan="2" ></th>
				  <th colspan="30" >Nama Penanggung Jawab PPTKIS</th>
				  <th colspan="3">:</th>
				  <th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
			   </tr>
			  <tr>
			  <th colspan="2" ></th>
				  <th colspan="30" >Jabatan </th>
				  <th colspan="3">:</th>
				  <th colspan="35">DIREKTUR UTAMA</th>
			   </tr>
			   <tr>
			   <th colspan="2" ></th>
				   <th colspan="30" >Nomor SIPPTKI </th>
				   <th colspan="3">:</th>
				   <th colspan="35">442/MEN/2016</th>
				</tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="30" >Alamat </th>
				  <th colspan="3">:</th>
				  <th colspan="35">'.strtoupper($alamatptdigunakan).'</th>
			   </tr>
			   <tr>
				   <th colspan="2" ></th>
				   <th colspan="30" >No Telp/HP/FAX/E-mail </th>
				   <th colspan="3">:</th>
				   <th colspan="35">(0341) 425642</th>
				</tr>
			   <br>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="71" >Dalam hal ini bertindak untuk dan atas nama PT FLAMBOYAN GEMAJASA selanjutnya disebut sebagai <b>PIHAK KESATU</b>. </th>
			   </tr>
			   <br>
				<tr>
				  <th colspan="2" ></th>
				  <th colspan="30" >Nama Calon TKI</th>
				  <th colspan="3">:</th>
				  <th colspan="35">'.$nama.'</th>
			   </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="30" >Tempat dan Tanggal Lahir </th>
				  <th colspan="3">:</th>
				  <th colspan="35">'.$tempatlahir.', '.$tgllahir.'</th>
			   </tr>
			   <tr>
				   <th colspan="2" ></th>
				   <th colspan="30" >Jenis Kelamin </th>
				   <th colspan="3">:</th>
				   <th colspan="35">'.$jeniskelamin.'</th>
				</tr>
			   <tr>
				   <th colspan="2" ></th>
				   <th colspan="30" >Status </th>
				   <th colspan="3">:</th>
				   <th colspan="35">'.$status.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="5">KTP : </th>
					<th colspan="25">a.Nomor</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$noktp.'</th>
				 </tr>
				 <tr>
					 <th colspan="2" ></th>
					 <th colspan="5"></th>
					 <th colspan="25">b.tanggal</th>
					 <th colspan="3">:</th>
					 <th colspan="35">'.$tglnoktp.'</th>
				  </tr>
				  <tr>
					  <th colspan="2" ></th>
					  <th colspan="5"></th>
					  <th colspan="25">c.dikeluarkan di</th>
					  <th colspan="3">:</th>
					  <th colspan="35">'.$tempatnoktp.'</th>
				   </tr>
				   <tr>
					   <th colspan="2" ></th>
					   <th colspan="30" >Pendidikan </th>
					   <th colspan="3">:</th>
					   <th colspan="35">'.$pendidikan.'</th>
					</tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="30" >Alamat</th>
				  <th colspan="3">:</th>
				  <th colspan="35">'.$alamat.'</th>
			   </tr>
			   <tr>
				   <th colspan="2" ></th>
				   <th colspan="30" >Nama Orang Tua/Wali/Suami/istri </th>
				   <th colspan="3">:</th>
				   <th colspan="35">'.$nama_bapak.'</th>
				</tr>
				<tr>
				   <th colspan="2" ></th>
				   <th colspan="30" >Alamat Orang Tua/Wali/Suami/istri </th>
				   <th colspan="3">:</th>
				   <th colspan="35">'.$tampilalamatortu.'</th>
				</tr>
			   <br><br><br><br><br>

			   <tr>
				  <th colspan="2" ></th>
				  <th colspan="71" >Selanjutnya dalam perjanjian penempatan ini disebut <b>PIHAK KEDUA</b> </th>
			   </tr>
			   <br>
			   <tr>
				  <th colspan="2" ></th>
				  <th colspan="71" >PIHAK KESATU dan PIHAK KEDUA telah sepakat untuk mengadakan Perjanjian Penempatan dengan ketentuan sebagai berikut: </th>
			   </tr>
			   <br/>
			   </table>
			   <br pagebreak="true"/>
			   <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

				   <tr>
				   <th colspan="73"><br><br><br><br><br><br><br></th>
				   </tr>
			  <tr>
				  <th align="center" colspan="71" ><b>Pasal 1</b></th>
			  </tr>
			  <br>
			   <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left">(1)</th>
				  <th colspan="66" ><b>PIHAK KESATU</b> sanggup menempatkan <b>PIHAK KEDUA</b> di Negara Taiwan sebagai '.strtoupper($a5).' pada pemberi kerja '.$nama_agen.' yang beralamat '.$alamat_pengguna.' dalam jangka waktu 3(tiga) bulan sejak di tandatangani  Perjanjian Penempatan ini,tanpa dibebani Biaya Penempatan pada <b>PIHAK KEDUA</b></th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left">(2)</th>
				  <th colspan="66" >Apabila dalam jangka waktu 3 (tiga) bulan sebagaimana di maksud pada ayat (1) <b>PIHAK KEDUA</b> belum di tempatkan oleh <b>PIHAK KESATU</b>  , <b>PIHAK KESATU</b>  berkewajiban memberikan penjelasan mengenai alasan keterlambatan penempatan kepada <b>PIHAK KEDUA</b></th>
			  </tr>
			  <br/>
			  <tr>
				  <th align="center" colspan="71" ><b>Pasal 2 </b></th>
			  </tr>
			  <br>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="71" ><b>PIHAK KEDUA</b> sanggup melaksanakan kewajiban sebagaimana yang tertuang dalam perjanjian kerja,sesuai ketentuan perundang-undangan.</th>
			  </tr>
			  <br/>
			  <tr>
			  <th align="center" colspan="71" ><b>Pasal 3 </b></th>
			  </tr>
			  <br>
			  <tr>
				 <th colspan="2" ></th>
				 <th colspan="5" align="left">(1)</th>
				 <th colspan="66" ><b>PIHAK KESATU</b> berkewajiban :</th>
				 </tr>
				 <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">a.</th>
				  <th colspan="63" >Melindungi <b>PIHAK KEDUA</b> sejak  ditandatanganinya Perjanjian Penempatan ini sampai dengan selesai masa penempatan sesuai ketentuan perundang-undangan;</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">b.</th>
				  <th colspan="63" >Memastikan  <b>PIHAK KEDUA</b> mendapatkan hak-hak nya sebagaimana yang tertuang dalam Perjanjian Kerja antara PIHAK KEDUA dengan Pemberi Kerja sesuai ketentuan perundang-undangan;</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">c.</th>
				  <th colspan="63" >Menyediakan sarana dan prasarana dalam rangka penempatan dan perlindungan Pekerja Migran Indonesia;</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">d.</th>
				  <th colspan="63" >Membantu dan memfasilitasi pengurusan dokumen <b>PIHAK KEDUA</b> tanpa membebankan biaya kepada <b>PIHAK KEDUA</b> ,meliputi:</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">1.</th>
				  <th colspan="60" >tiket pesawat;</th>
			  </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">2.</th>
				  <th colspan="60" >visa kerja;</th>
			  </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">3.</th>
				  <th colspan="60" >legalisasi Perjanjian Kerja;</th>
			  </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">4.</th>
				  <th colspan="60" >Paspor;</th>
			  </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">5.</th>
				  <th colspan="60" >Surat keterangan catatan kepolisian;</th>
			  </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">6.</th>
				  <th colspan="60" >Kartu kepesertaan jaminan sosial bagi Pekerja Migran Indonesia; dan</th>
			  </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">7.</th>
				  <th colspan="60" >Sertifikat Pemeriksaan kesehatan dan psikologi;</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">e.</th>
				  <th colspan="63" >Memberikan informasi proses penempatan dan pembebasan biaya penempatan;dan</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">f.</th>
				  <th colspan="63" >Melakukan proses penempatan yang dipersyaratkan sebelum bekerja sesuai ketentuan peraturan perundang-undangan.</th>
			  </tr>
			  </table>
			  <br pagebreak="true"/>
			  <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

				  <tr>
				  <th colspan="73"><br><br><br><br><br><br><br></th>
				  </tr>
			  <br/>
			 <tr>
				 <th colspan="2" ></th>
				 <th colspan="5" align="left">(2)</th>
				 <th colspan="66" ><b>PIHAK KESATU</b> berhak :</th>
			 </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">a.</th>
				  <th colspan="63" >menerima dokumen yang dipersyaratkan sesuai dengan ketentuan negara tujuan penempatan;</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">b.</th>
				  <th colspan="63" >menerima informasi pengunduran diri paling lambat 1(satu) minggu sebelum keberangkatan melalui surat resmi,kecuali di karenakan keadaan kahar (force majeure)</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">c.</th>
				  <th colspan="63" >memberhentikan Calon Pekerja Migran Indonesia dari program atau proses penempatan administrasi;dan</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">d.</th>
				  <th colspan="63" >menerima pengembalian biaya penempatan  dari <b>PIHAK  KEDUA</b></th>
			  </tr>
			  <br/>
			  <tr>
			  <th align="center" colspan="71" ><b>Pasal 4 </b></th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left">(1)</th>
				  <th colspan="66" ><b>PIHAK KEDUA</b> berkewajiban :</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">a.</th>
				  <th colspan="63" >Melengkapi dokumen persyaratan,meliputi:</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">1.</th>
				  <th colspan="60" >KTP Elektronik;</th>
			  </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">2.</th>
				  <th colspan="60" >Kartu Keluarga;</th>
			  </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">3.</th>
				  <th colspan="60" >Surat keterangan status perkawinan atau buku nikah ;dan</th>
			  </tr>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="8" align="left"></th>
				  <th colspan="3" align="left">4.</th>
				  <th colspan="60" >Surat izin suami/atau istri,izin orang tua,atau izin wali yg diketahui oleh Kepala Desa atau Lurah.</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">b.</th>
				  <th colspan="63" >mengikuti seluruh proses penempatan yang dipersyaratkan sebelum bekerja;dan</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">c.</th>
				  <th colspan="63" >Mengembalikan biaya penempatan yg telah di keluarkan PIHAKKESATU apabila PIHAK KEDUA mengundurkan diri sebelum penempatan ke negara tujuan atau tidak dapat melaksanakan perjanjian kerja karena mengundurkan diri untuk kepentingan /alasan pribadi.</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left">(2)</th>
				  <th colspan="66" ><b>PIHAK KEDUA</b> berhak :</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">a.</th>
				  <th colspan="63" >Menerima informasi proses penempatan;</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">b.</th>
				  <th colspan="63" >Mendapatkan kesetaraan dalam pelayanan penempatan sampai dengan pemberangkatan ke negara tujuan pemberangkatan; dan </th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left"></th>
				  <th colspan="3" align="left">c.</th>
				  <th colspan="63" >Mendapatkan kepastian terpenuhinya hak-hak yang tertuang dalam Perjanjian Kerja.</th>
			  </tr>
			  </table>
			  <br pagebreak="true"/>
			  <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">

				  <tr>
				  <th colspan="73"><br><br><br><br><br><br><br></th>
				  </tr>
			  <br/>
			  <tr>
			  <th align="center" colspan="71" ><b>Pasal 5 </b></th>
			  </tr>
			  <br>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left">(1)</th>
				  <th colspan="66" >Apabila terjadi perselisihan antara PIHAK KESATU dan PIHAK KEDUA yang timbul sebagai akibat pelaksanaan perjanjian penempatan ini,akan di selesaikan secara musyawarah untuk mencapai mufakat.</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left">(2)</th>
				  <th colspan="66" >Apabila tidak tercapai kesepakatan sebagaimana di maksud pada ayat (1),PARA  PIHAK dapat menyelesaikannya sesuai dengan ketentuan peraturan  perundang-undangan.</th>
			  </tr>
			  <br/>
			  <tr>
			  <th align="center" colspan="71" ><b>Pasal 6 </b></th>
			  </tr>
			  <br>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="71" >Perjanjian penempatan ini dinyatakan batal (gugur) bilamana kedua belah pihak sepakat untuk membatalkan perjanjian penempatan ini di hadapan pengantar kerja atau pejabat yang di tunjuk pada LTSA/Dinas Kab/Kota yang membidangi Ketenagakerjaan/UPT BP2MI.</th>
			  </tr>
			  <br/>
			  <tr>
			  <th align="center" colspan="71" ><b>Pasal 7 </b></th>
			  </tr>
			  <br>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left">(1)</th>
				  <th colspan="66" >Perjanjian Penempatan ini berlaku dan mengikat sejak tanggal ditandatangani oleh PARA PIHAK sampai dengan berakhirnya perjanjian kerja.</th>
			  </tr>
			  <br/>
			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="5" align="left">(2)</th>
				  <th colspan="66" >Perjanjian Penempatan ini di buat dalam rangkap 2(dua) asli dan bermaterai cukup, masing-masing mempunyai  kekuatan kekuatan hukum yang sama dan di tandatangani dengan penuh kesadaran tanpa paksaan dari pihak manapun.</th>
			  </tr>
			  <br>

			  <tr>
				  <th align="right" colspan="73"><br><br>Malang, '.$tglnya.' '.$bulannya.' '.$thnnya.'</th>
			  </tr>
			  <br>
		   </table>

		   <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
		   <br><br>

			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="14" >PIHAK KESATU,</th>
				  <th colspan="2" ></th>
				  <th colspan="12" >PIHAK KEDUA,</th>
			  </tr>
			  <br><br><br><br><br><br><br><br>

			  <tr>
				  <th colspan="2" ></th>
				  <th colspan="14" >(IMMANUEL DARMAWAN SANTOSO)</th>
				  <th colspan="2" ></th>
				  <th colspan="12" >('.$nama.')</th>
			  </tr>
			  <br><br><br>
			  <tr>
				  <th align="center" colspan="30" >Mengetahui</th>
			  </tr>
			  <tr>
				  <th align="center" colspan="30" >Pengantar kerja/Pejabat</th>
			  </tr>

			  <tr>
			  <th colspan="11" ></th>
				  <th align="left"  colspan="24" >LTSA/Dinas Kab/Kota/UPT BP2MI</th>
			  </tr>


		   </table>
		  ';


	  $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	  $pdf->Output('PP Zero Cost'.$id_penempatan.'.pdf', 'I');
  }

	function zerocost_tulungagung_fi($id_penempatan, $cabang="", $khusus = "") {

		$alamatptdigunakan = "JL. INSPEKTUR SUWOTO NO.95B RT.02 RW.01 DS.SIDODADI      KEC.LAWANG KABUPATEN MALANG";
		if($cabang == 2){
			$alamatptdigunakan = "Taman Sari RT-37 A Kel. Kroyo Kec. Karangmalang Kab. Sragen Provinsi Jawa Tengah";
		}


		$bapak = $this->db->query('SELECT * FROM pembuatan_perjanjian WHERE id_tki = "'.$id_penempatan.'"')->result();

		$tampil = $bapak[0]->hubsaksi;

		$statusnya='';
		$nama 				= $this->m_baru1->tampilnamatki($id_penempatan);
		$nomor 				= $this->m_baru1->tampilnomor($id_penempatan);
		$kode_agen 			= $this->m_baru1->tampil_kode_agen($id_penempatan);
		$nama_agen 			= $this->m_baru1->tampil_nama_agen($kode_agen);




		if($tampil == 'wali'){
			$tampilalamatortu = $this->m_baru1->tampilalamatkontak($id_penempatan);
		}else{
			$tampilalamatortu = $this->m_baru1->tampilalamatortu($id_penempatan);
		}

		$id_pengguna 		= $this->m_baru1->tampil_id_pengguna($kode_agen);
		$nomer_pengguna 	= $this->m_baru1->tampil_nomer_pengguna($kode_agen);
		$alamat_pengguna 	= $this->m_baru1->tampil_alamat_pengguna($kode_agen);

		$jabatan 			= $this->m_baru1->tampil_jabatan($id_penempatan);

		$tempatlahir 		= $this->m_baru1->tampiltempatlahir($id_penempatan);
		$tgllahir2 			= $this->m_baru1->tampiltgllahir($id_penempatan);

		$lahiran=str_replace(".","-",$tgllahir2);
	$tgllahir = date("d-m-Y", strtotime($lahiran));



		$jeniskelamin 		= $this->m_baru1->tampiljeniskelamin($id_penempatan);

	if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}


		$alamat 			= $this->m_baru1->tampilalamat($id_penempatan);
		$notelp 			= $this->m_baru1->tampilnotelp($id_penempatan);



		if($tampil == 'wali'){
			$nama_bapak 		= $this->m_baru1->tampilnama_kontak($id_penempatan);
		}elseif($tampil == 'Ibu'){
			$nama_bapak 		= $this->m_baru1->tampilnama_ibu($id_penempatan);
		}else{
			$nama_bapak 		= $this->m_baru1->tampilnama_bapak($id_penempatan);
		}

		$notelpkel 			= $this->m_baru1->tampilnotelpkel($id_penempatan);
		$pendidikan 		= $this->m_baru1->tampilpendidikan($id_penempatan);
		$status 			= $this->m_baru1->tampilstatus($id_penempatan);
		$nama_istri_suami 	= $this->m_baru1->tampilnama_istri_suami($id_penempatan);
		$alamatkontak 		= $this->m_baru1->tampilalamatkontak($id_penempatan);

		$gaji				= $this->m_baru1->tampil_gaji($id_penempatan);
		$lembur				= $this->m_baru1->tampil_lembur($id_penempatan);
		$hubungan			= $this->m_baru1->tampil_hubungan($id_penempatan);
		$wali 				= $this->m_baru1->tampil_wali($id_penempatan);
		$nama_dinas 		= $this->m_baru1->tampil_nama_dinas($id_penempatan);

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

				$datapen = $this->m_baru1->ambilpendmandarin();
	for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

		$tanggal=$this->m_baru1->tampiltanggal($id_penempatan);
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		if ($tanggal != NULL) {
			$ex_tgl = explode("-",$tanggal);
			$timestamp = strtotime($tanggal);

			$hari = $array_hari[date("N", $timestamp)];//$array_hari[date('N')];
			$bulannya = $array_bulan[ (int) $ex_tgl[1]];

			$tglnya = $ex_tgl[0];
			$thnnya = $ex_tgl[2];
		} else {
			$tanggal=date('d-m-Y');
			$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

			$hari = $array_hari[date('N')];
			$bulannya = $array_bulan[ (int) date('m')];

			$tglnya = date('d');
			$thnnya = date('Y');
		}
	/* == backup
		$tanggal=date('d-m-Y');
		$array_hari= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		$array_bulan= array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		$hari = $array_hari[date('N')];
		$bulannya = $array_bulan[ (int) date('m')];

		$tglnya = date('d');
		$thnnya = date('Y');
	*/
		$status=trim($status," ");
		if($status=='Belum Nikah' || $status=='Belum Kawin' || $status=='Cerai' || $status=='Cerai mati'){
		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35"></th>
				</tr>';
		}

		else{
		$statusnya='<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_istri_suami.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Suami/Istri	 </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamatkontak.'</th>
				</tr>';
		}

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
	$pdf->SetMargins(10, 10, 5);
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
	$pdf->SetFont('times', '', '11.5', '', false);
	$pdf->AddPage();

	$lamakontraknya = '2 (dua)';
	$dan = '';
	if($khusus == ""){
		$lamakontraknya = '3 (tiga)';
		$dan = ' dan';
	}
	// Set some content to print

	$html = '<br><br><br><br><br><br><br><br> <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b>PERJANJIAN PENEMPATAN ANTARA</b></th>
				</tr>
				<tr>
					<th><b>PERUSAHAAN PENEMPATAN PEKERJA MIGRAN INDONESIA</b></th>
				</tr>
				<tr>
					<th><b>DENGAN CALON PEKERJA MIGRAN INDONESIA</b></th>
				</tr>
				<tr>
					<th><b>Nomor : '.$nomor.'</b></th>
				</tr>
				<tr>
					<th><b>NEGARA PENEMPATAN : TAIWAN</b></th>
				</tr>

			</table><br><br>

			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="2" ></th>
					<th colspan="73" >Pada hari ini '.$hari.' tanggal '.$tglnya.' bulan '.$bulannya.' tahun '.$thnnya.' telah diadakan Perjanjian Penempatan <br/>oleh dan antara :</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" >1</th>
					<th colspan="25" >Nama Penanggung Jawab</th>
					<th colspan="3">:</th>
					<th colspan="35">IMMANUEL DARMAWAN SANTOSO</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >No. KTP </th>
					<th colspan="3">:</th>
					<th colspan="35">3507251110800003</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >Jabatan </th>
					<th colspan="3">:</th>
					<th colspan="35">DIREKTUR UTAMA</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >Nama PPTKIS </th>
					<th colspan="3">:</th>
					<th colspan="35">PT.FLAMBOYAN GEMAJASA</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >Nomor SIPPTKI </th>
					<th colspan="3">:</th>
					<th colspan="35">519/MEN/2012</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat </th>
					<th colspan="3">:</th>
					<th colspan="35">'.strtoupper($alamatptdigunakan).'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >No. Telepon/Fax/E-mail  </th>
					<th colspan="3">:</th>
					<th colspan="35">(0341) 425642 </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="71" >Dalam hal ini bertindak untuk dan atas nama PT FLAMBOYAN GEMAJASA selanjutnya disebut sebagai <b>PIHAK KESATU</b>. </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" >2</th>
					<th colspan="25" >Nama Calon TKI</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >Tempat & Tanggal Lahir </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$tempatlahir.', '.$tgllahir.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >Jenis Kelamin </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$jeniskelamin.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamat.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >Nama Orang Tua/Wali/Suami/istri </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_bapak.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="25" >Alamat Orang Tua/Wali/Suami/istri </th>
					<th colspan="3">:</th>
					<th colspan="35">'.$tampilalamatortu.'</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="71" >Selanjutnya dalam perjanjian penempatan ini disebut <b>PIHAK KEDUA</b> </th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="2" ></th>
					<th colspan="71" >PIHAK KESATU dan PIHAK KEDUA telah sepakat untuk mengadakan Perjanjian Penempatan dengan ketentuan sebagai berikut: </th>
				</tr>
			</table>
			<br pagebreak="true">
			<br><br>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th align="center" colspan="64" ><b>Pasal 1</b></th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" >(1)</th>
					<th colspan="61" >PIHAK KESATU sanggup menempatkan PIHAK KEDUA untuk bekerja pada :</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="25" >a. Negara Tempat Bekerja	</th>
					<th colspan="3">:</th>
					<th colspan="35">TAIWAN</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="25" >b. Nama Pengguna	</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nama_agen.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="25" >c. No. Telp Pengguna	</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$nomer_pengguna.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="25" >d. Alamat Pengguna	</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$alamat_pengguna.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="25" >e. Jabatan Pekerjaan	</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$jabatan.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="25" >f. Gaji Pokok		</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$gaji.'</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="25" >g. Lembur				</th>
					<th colspan="3">:</th>
					<th colspan="35">'.$lembur.' /bulan (1 minggu = 1 kali libur)</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="25" >h. Lama Kontrak Kerja		</th>
					<th colspan="3">:</th>
					<th colspan="35"> '.$lamakontraknya.' Tahun</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="25" >i. Hari Libur		</th>
					<th colspan="3">:</th>
					<th colspan="35">1 (satu) hari/minggu</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" >(2)</th>
					<th colspan="61" ><b>PIHAK KESATU</b> sanggup menempatkan PIHAK KEDUA sebagaimana tersebut pada ayat (1) selambat-lambatnya 3 (tiga) bulan setelah Perjanjian Penempatan di tandatangani (sesuai MoU).</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" >(3)</th>
					<th colspan="61" ><b>PIHAK KESATU</b> melalui mitra usahanya berkewajiban untuk memastikan bahwa PIHAK KEDUA bekerja sesuai dengan Perjanjian Kerja yang telah ditandatangani para pihak.</th>
				</tr>
				<br>
				<tr>
					<th align="center" colspan="64"><b>Pasal 2 </b></th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="64" ><b>PIHAK KEDUA</b> sanggup melaksanakan kewajiban sebagaimana yang tertuang dalam perjanjian kerja,sesuai ketentuan perundang-undangan.</th>
				</tr>
				<br>
				<tr>
					<th align="center" colspan="64"><b>Pasal 3 </b></th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" >(1)</th>
					<th colspan="61" > PIHAK KESATU berkewajiban :</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >a. </th>
					<th colspan="58" >Melindungi PIHAK KEDUA sejak ditandatanganinya Perjanjian Penempatan ini sampai dengan selesai masa penempatan sesuai ketentuan perundang-undangan;</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >b. </th>
					<th colspan="58" >Memastikan  PIHAK KEDUA mendapatkan hak-hak nya sebagaimana yang tertuang dalam Perjanjian Kerja antara PIHAK KEDUA dengan Pemberi Kerja sesuai ketentuan perundang-undangan;</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >c. </th>
					<th colspan="58" >Menyediakan sarana dan prasarana dalam rangka penempatan dan perlindungan Pekerja Migran Indonesia</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >d. </th>
					<th colspan="58" >Membantu dan memfasilitasi pengurusan dokumen PIHAK KEDUA tanpa membebankan biaya keada PIHAK KEDUA meliputi :</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >1. </th>
					<th colspan="55" >Tiket keberangkatan</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >2. </th>
					<th colspan="55" >Tiket kepulangan</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >3. </th>
					<th colspan="55" >Visa Kerja</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >4. </th>
					<th colspan="55" >Legilisasi Perjanjian Kerja</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >5. </th>
					<th colspan="55" >Pelatihan Kerja</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >6. </th>
					<th colspan="55" >Sertifikat Kompetensi Kerja</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >7. </th>
					<th colspan="55" >Akomodasi</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >8. </th>
					<th colspan="55" >Pasport</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >9. </th>
					<th colspan="55" >Jaminan sosial Pekerja Migran Indonesia</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >10. </th>
					<th colspan="55" >Jasa perusahaan</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >11. </th>
					<th colspan="55" >Pemeriksaan kesehatan dan psikologi di dalam negeri</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >12. </th>
					<th colspan="55" >Pemeriksaan tambahan jika Negara tertentu mensyaratkan</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >13. </th>
					<th colspan="55" >Transportasi lokal dari daerah asal ke tempat pemberangkatan di Indonesia</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >e. </th>
					<th colspan="58" >Memberikan informasi proses penempatan dan pembebasan biaya penempatan; dan serta tidak ada potongan gaji pada PIHAK KEDUA.</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >f. </th>
					<th colspan="58" >Melakukan proses penempatan yang dipersyaratkan sebelum bekerja sesuai ketentuan peraturan perundang-undangan.</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" >(1)</th>
					<th colspan="61" > PIHAK KESATU berhak :</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >a. </th>
					<th colspan="58" >menerima dokumen yang dipersyaratkan sesuai dengan ketentuan negara tujuan penempatan</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >b. </th>
					<th colspan="58" >menerima informasi pengunduran diri paling lambat 1(satu) minggu sebelum pemberangkatan melalui surat resmi,kecuali di karenakan keadaan kahar (force majeure)</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >c. </th>
					<th colspan="58" >memberhentikan Calon Pekerja Migran Indonesia dari program atau proses penempatan administrasi</th>
				</tr>
				<br>
				<tr>
					<th><b>Pasal 4 </b></th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" >(1)</th>
					<th colspan="61" > PIHAK KEDUA berkewajiban :</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >a. </th>
					<th colspan="58" >Menunjukkan dokumen persyaratan,meliputi:</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >1. </th>
					<th colspan="55" >KTP Elektronik</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >2. </th>
					<th colspan="55" >Kartu Keluarga</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >3. </th>
					<th colspan="55" >Surat keterangan status perkawinan atau buku nikah</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="6" ></th>
					<th colspan="3" >4. </th>
					<th colspan="55" >Surat izin suami/atau istri,izin orang tua,atau izin wali yg diketahui oleh Kepala Desa atau Lurah</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >b. </th>
					<th colspan="58" >mengikuti seluruh proses penempatan yang dipersyaratkan sebelum bekerja</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >c. </th>
					<th colspan="58" >Mengembalikan biaya penempatan yg telah di keluarkan PIHAKKESATU apabila PIHAK KEDUA mengundurkan diri sebelum penempatan ke negara tujuan atau tidak dapat melaksanakan perjanjian kerja karena mengundurkan diri untuk kepentingan /alasan pribadi.</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" >(1)</th>
					<th colspan="61" > PIHAK KEDUA berhak :</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >a. </th>
					<th colspan="58" >Menerima informasi proses penempatan</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >b. </th>
					<th colspan="58" >Mendapatkan kesetaraan dalam pelayanan penempatan sampai dengan pemberangkatan ke negara tujuan pemberangkatan</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >c. </th>
					<th colspan="58" >Mendapatkan kepastian terpenuhinya hak-hak yang tertuang dalam Perjanjian Kerja.</th>
				</tr>
				<br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="3" ></th>
					<th colspan="3" >d. </th>
					<th colspan="58" >Menerima kembali dokumen asli (KTP,KK,Surat Nikah,Akte dan Ijasah) setelah dinyatakan lulus penempatan.</th>
				</tr>
				<br>

				<tr>
					<th><b>Pasal 5 </b></th>
				</tr>
				<br>
				<tr>
					<th width="5%" align="left">(1)</th>
					<th align="left" colspan="6" ><b>PIHAK KESATU</b> wajib mengurus dokumen</th>
				</tr>

				<tr>
					<th width="5%" align="left">(2)</th>
					<th align="left" colspan="6" >Keberangkatan PIHAK KEDUA berupa paspor, visa kerja, dan kepesertaan asuransi.</th>
				</tr>

				<tr>
					<th width="5%" align="left">(3)</th>
					<th align="left" colspan="7" >PIHAK KEDUA wajib membiayai pengurusan dokumen jati diri berupa pemeriksaan psikologi dan kesehatan, paspor, visa serta uji keterampilan / kompetensi.</th>
				</tr>
				<br pagebreak="true"/>

				<tr>
					<th width="2%"></th>
					<th><br><br><br><br><br><br><br><br><b>Pasal 19 </b></th>
				</tr>

				<tr>
					<th width="2%" align="left"></th>
					<th align="left"  colspan="7">Perjanjian penempatan ini berlaku sejak ditandatangani oleh <b>PIHAK KESATU</b> dan PIHAK KEDUA sampai dengan 3 (tiga) bulan atau sampai PIHAK KEDUA bekerja ke Luar Negeri.</th>
				</tr>
				<tr>
					<th width="2%" align="left"></th>
					<th align="left" colspan="7"><br><br>Malang , .............</th>
				</tr>
				<br>
			</table><br>

			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			<br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="12" >PIHAK PERTAMA</th>
					<th colspan="2" ></th>
					<th colspan="14" >PIHAK KEDUA</th>
				</tr>
				<br><br><br><br><br><br><br><br>

				<tr>
					<th colspan="2" ></th>
					<th colspan="12" >(IMMANUEL DARMAWAN SANTOSO)</th>
					<th colspan="2" ></th>
					<th colspan="14" >('.$nama.')</th>
				</tr>
				<br><br><br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="12" align="left"></th>
					<th colspan="2" ></th>
					<th colspan="14" >Saksi</th>
				</tr>
				<tr>
					<th colspan="2" ></th>
					<th colspan="12" align="left"></th>
					<th colspan="2" ></th>
					<th colspan="14" >'.$hubungan.'</th>
				</tr>
				<br><br><br><br><br><br><br><br>
				<tr>
					<th colspan="2" ></th>
					<th colspan="12" align="left"></th>
					<th colspan="2" ></th>
					<th colspan="14" >('.$wali.')</th>
				</tr>
				<tr>
					<th width="2%"></th>
					<th colspan="10" align="left"></th>
					<th colspan="10" ></th>
					<th colspan="10" ></th>
				</tr>


			</table>
			';

	// ;

	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	$pdf->Output('PP FORMAL LAMPUNG -'.$id_penempatan.'.pdf', 'I');
	}


}