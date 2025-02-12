<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class staff extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');		
		$session = $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		} 	/*
		if ($id_user && $status!=2){
			redirect('dashboard');
		}*/
	}
	
	function index() {
		$this->form_upload_absen_finger();
	}

	function form_upload_absen_finger() {

		$data['namamodule'] = "staff";
		$data['namafileview'] = "upload_excel";
		echo Modules::run('template/blk_template', $data); 
	}

	function form_print($tgl) {
		$tgl_exp = explode("-", $tgl);
		$data['tahun'] = $tgl_exp[0];
		$data['bulan'] = $tgl_exp[1];
		$data['tgl_full'] = $tgl;

		$data['namamodule'] = "staff";
		$data['namafileview'] = "print_excel";
		echo Modules::run('template/blk_template', $data); 
	}

	function read_absen_finger() {

		$this->load->library('upload');

		$nmfile ='e_'.time().$this->input->post('upload_excel');
		$configUpload['upload_path'] = './assets/staff_finger_file';
        $configUpload['allowed_types'] = 'xls|xlsx|csv';
        $configUpload['max_size'] = '5000';
		$configUpload['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->upload->initialize($configUpload);

        $this->upload->do_upload('upload_excel');	

        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name']; //uploded file name
		$extension=$upload_data['file_ext'];    // uploded file extension

/*
		echo '<pre>';
		print_r($upload_data);*/


		$this->load->library("PHPExcel");
		//  Include PHPExcel_IOFactory
		//include 'PHPExcel/IOFactory.php';
  
        //Load excel file
		$inputFileName 	= FCPATH."assets/staff_finger_file/".$file_name;		
		//$inputFileName 	= 'c:/xampp/htdocs/flamboyan/assets/staff_finger_file/1.xls';
		//echo $inputFileName;


		$objReader 		= PHPExcel_IOFactory::createReader('Excel5');	// For excel 2007 	  
        //Set to read only
        $objReader->setReadDataOnly(true); 		  
        //Load excel file
		$objPHPExcel	= $objReader->load($inputFileName);		 
        $totalrows		= $objPHPExcel->setActiveSheetIndex(3)->getHighestDataRow();   //Count Numbe of rows avalable in excel      	 
        $objWorksheet	= $objPHPExcel->setActiveSheetIndex(3);                
          //loop from first data untill last data
        $data_user = array();
        echo $file_name;

        for($i=5;$i<=$totalrows;$i++) {

    		$id_staff 	= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
    		$nama 	  	= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
    		$dept 	  	= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
    		$tgl 	  	= $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
    		$tm1_masuk	= $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
    		$tm1_keluar	= $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
    		$tm2_masuk	= $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
    		$tm2_keluar	= $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();

    		$terlambat	= $objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
    		$pulang_awal= $objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
    		$absen		= $objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
    		$total 		= $objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
    		$catatan	= $objWorksheet->getCellByColumnAndRow(12,$i)->getValue();

    		$data[] = array(
    			'id' 			=> $id_staff,
    			'nama' 			=> $nama,
    			'dept' 			=> $dept,
    			'tgl' 			=> $tgl,
    			'tm1_masuk' 	=> $tm1_masuk,
    			'tm1_keluar'	=> $tm1_keluar,
    			'tm2_masuk' 	=> $tm2_masuk,
    			'tm2_keluar'	=> $tm2_keluar,
    			'terlambat' 	=> $terlambat,
    			'pulang_awal' 	=> $pulang_awal,
    			'absen' 		=> $absen,
    			'total' 		=> $total,
    			'catatan' 		=> $catatan
    		);
	  		//$this->excel_data_insert_model->Add_User($data_user);
        }
		//echo '<pre>';
		//print_r($data);
        $tgl_absen 		= $objWorksheet->getCellByColumnAndRow(3,5)->getValue();
        $tgl_absen_exp 	= explode("-", $tgl_absen);
        $tgl_full = $tgl_absen_exp[0].'-'.$tgl_absen_exp[1];

        $cek_data = $this->M_session->select_row("SELECT count(*) as total FROM staff_finger WHERE tgl like '$tgl_full%'");

        $link_full = base_url().'assets/staff_finger_file/'.$file_name;
        unlink($link_full); //File Deleted After uploading in database 

        if ($cek_data->total == 0) {
        	$this->M_session->insert_batch($data, 'staff_finger');
        	redirect('staff/form_print/'.$tgl_full);
        } else {
			/*echo "<script>
				alert('FILE ABSEN DENGAN TANGGAL TSB SUDAH TERINPUT. <br/>ANDA TINGGAL MENGUNDUHNYA!');
				window.location.href='".site_url('staff/form_print/'.$tgl_full)."';
				</script>";*/
			redirect('staff/form_print/'.$tgl_full);
        }
	}

	function print_absen_finger($tgl) {
		$bulan_array = array (
			'01' => "Januari",
			'02' => "Februari",
			'03' => "Maret",
			'04' => "April",
			'05' => "Mei",
			'06' => "Juni",
			'07' => "Juli",
			'08' => "Agustus",
			'09' => "September",
			'10' => "Oktober",
			'11' => "November",
			'12' => "Desember"
		);

		$tgl_exp = explode("-", $tgl);

		$ambil_data_absen 	= $this->M_session->select("SELECT distinct(id) as id, nama FROM staff_finger where tgl like '$tgl%'");

		$this->load->library("PHPExcel");

        $objPHPExcel 	= new PHPExcel();
		$objReader 		= PHPExcel_IOFactory::createReader('Excel5');

		$objPHPExcel = $objReader->load("files/staff_absen.xls");

		$first_day_this_month = date('01-'.$tgl_exp[1].'-'.$tgl_exp[0]); // hard-coded '01' for first day
		//$last_day_this_month  = date('t-'.$tgl_exp[1].'-'.$tgl_exp[0]);
		$last_day_this_month  = date("Y-m-t", strtotime($tgl));
		$tgl_fix 	 = $first_day_this_month.' ~ '.$last_day_this_month;

		$ztitle = 1;
		$ztgl 	= 3;
		$r 		= 0;
		foreach ($ambil_data_absen as $datarow) {
			$row_ztitle = $ztitle + $r;
			$row_ztgl 	= $ztgl + $r;
			$objPHPExcel->getActiveSheet()
			->setCellValue('B'.$row_ztitle, $datarow->nama)
			->setCellValue('A'.$row_ztgl, "Stat. Tgl : ".$tgl_fix)
			;

			$ambil_data_absen_per_staff = $this->M_session->select("SELECT * FROM staff_finger WHERE id='$datarow->id' and tgl like '$tgl%'");
			$e = 6+$r;
			foreach ($ambil_data_absen_per_staff as $datarow2) {
				$non 	 = $e-5-$r;

				$objPHPExcel->getActiveSheet()
				->setCellValue('A'.$e, $non)
				->setCellValue('B'.$e, $datarow2->nama)
				->setCellValue('C'.$e, $datarow2->dept)
				->setCellValue('D'.$e, $datarow2->tgl)
				->setCellValue('E'.$e, $datarow2->tm1_masuk)
				->setCellValue('F'.$e, $datarow2->tm1_keluar)
				->setCellValue('G'.$e, $datarow2->tm2_masuk)
				->setCellValue('H'.$e, $datarow2->tm2_keluar)
				->setCellValue('I'.$e, $datarow2->terlambat)
				->setCellValue('J'.$e, $datarow2->pulang_awal)
				->setCellValue('K'.$e, $datarow2->absen)
				->setCellValue('L'.$e, $datarow2->total)
				->setCellValue('M'.$e, $datarow2->catatan)
				;
			$e++;
			}

		$r=$r+37;
		}

			

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Absensi Staff '.$first_day_this_month.' ~ '.$last_day_this_month.'.xls"');

        $objWriter->save("php://output");
	}

}