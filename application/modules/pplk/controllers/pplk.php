<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pplk extends MX_Controller{
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
		$data['ambil_nama'] = $this->M_session->select("SELECT * FROM disnaker ORDER BY nama ASC");
		$data['personal'] = $this->db->query("SELECT * FROM personal")->result();
		$data['namamodule'] = "pplk";
		$data['namafileview'] = "pplk";
		echo Modules::run('template/new_admin_template', $data);
	}

	function print_data(){

		$this->load->library("PHPExcel");
        $objPHPExcel 	= new PHPExcel();
		$objReader 		= PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("files/30template.xls");



		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="laporan keuangan tahun '.$dapatkanTahun.' .xls"');

        $objWriter->save("php://output");

	}


	function simpan_data(){
		

        $nopermonhonan = $_POST["nopermonhonan"];
        $tglpermohonan = $_POST["tglpermohonan"];
        $tujuanpermohonan = $_POST["tujuanpermohonan"];
        $datatki = $_POST["datatki"];

        $data_tki = explode(" ", $datatki);
        $tki_json = json_encode($data_tki);
        
        $this->db->query("INSERT INTO pplk (id, nopermonhonan, tglpermohonan, tujuanpermohonan, datatki, deleted) VALUES ('', '$nopermonhonan', '$tglpermohonan', '$tujuanpermohonan', '$tki_json', '')");



	}


	function tampilkan_data(){
		$fetch_data = $this->Modals->make_datatables();
		$data = array();
		$no = 1;
		foreach ($fetch_data as $key => $value) {
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $value->nopermonhonan;
			$sub_array[] = $value->tglpermohonan;
			$sub_array[] = $value->tujuanpermohonan;
			$sub_array[] = $value->datatki;
			$sub_array[] = "<button class='btn btn-info' onclick='tampilkanDatanya(".$value->id.")'>tampilkan</button><button class='btn btn-danger' onclick='hapusDatanya(".$value->id.")'>hapus</button>";
			$data[] = $sub_array;
			$no++;
		}

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Modals->get_all_data(),
			"recordsFiltered" => $this->Modals->get_filtered_data(),
			"data" => $data

		);
		echo json_encode($output);
	}

	function hapusdatanya($key){
		$this->db->query("DELETE FROM pplk WHERE id = '$key'");
		redirect(site_url().'/pplk');
	}


	function tampilka_hasil($key){

		$data['pplk'] = $this->db->query("SELECT * FROM pplk WHERE id= '$key'")->row();
		$data['id'] = $key;
		$data['namamodule'] = "pplk";
		$data['namafileview'] = "pplkprint";
		echo Modules::run('template/new_admin_template', $data);
	}


	function update_data(){
		$id = $_POST['id'];
		$pinjaman = $_POST['pinjaman'];
		$aprvktkln = $_POST['aprvktkln'];
		$tglaprv = $_POST['tglaprv'];

		$pinjaman = explode(" ", $pinjaman);
		$pinjaman = json_encode($pinjaman);

		$aprvktkln = explode(" ", $aprvktkln);
		$aprvktkln = json_encode($aprvktkln);

		$tglaprv = explode(" ", $tglaprv);
		$tglaprv = json_encode($tglaprv);

		$update = $this->db->query("UPDATE pplk SET pinjaman = '$pinjaman', aproval = '$aprvktkln', tgl_aproval = '$tglaprv' WHERE id = '$id' ");
		if ($update) {
			echo "success";
		}else{
			echo "not entry";
		}

	}




	function cetak_hasil($key){

        $this->load->library("PHPExcel");
        $objPHPExcel  = new PHPExcel();
        $objReader    = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load("files/master.xls");

		
		foreach(range('B','G') as $columnID) {
		    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}


		$ambil_row = $this->db->query("SELECT * FROM pplk WHERE id = '$key' ")->row();


		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'No Permohonan :'.$ambil_row->nopermonhonan);
		$objPHPExcel->getActiveSheet()->setCellValue('B3', 'Tgl Permohonan :'.$ambil_row->tglpermohonan);
		$objPHPExcel->getActiveSheet()->setCellValue('B4', 'Negara Tujuan :'.$ambil_row->tujuanpermohonan);

		$objPHPExcel->getActiveSheet()->setCellValue('I2', 'PPTKIS : FLAMBOYAN GEMA JASA');
		$objPHPExcel->getActiveSheet()->setCellValue('I3', 'Lembaga Keuangan : KOPERASI SIMPAN PINJAM KARSA MANDIRI');
		$objPHPExcel->getActiveSheet()->setCellValue('I4', 'Mitra Collection : SML');		


		$datatki = $ambil_row->datatki;
		$datatki = json_decode($datatki);

		$pinjaman = $ambil_row->pinjaman;
		$pinjaman = json_decode($pinjaman);

		$aproval = $ambil_row->aproval;
		$aproval = json_decode($aproval);

		$tgl_aproval = $ambil_row->tgl_aproval;
		$tgl_aproval = json_decode($tgl_aproval);


		$personal_nama = array();
		$personal_tanggal_lahir = array();
		$personal_tempat_lahir = array();
		$personal_alamat = array();
		$personal_noktp = array();
		$personal_paspor = array();
		$personal_iddisnaker = array();
		for($i=0; $i<(count($datatki)-1); $i++) {

			$personal = $this->db->query("SELECT
	*, DATE(tgllahir) AS tanggal_lahir, paspor.nopaspor AS nopaspor
FROM
	personal
LEFT JOIN disnaker ON personal.id_biodata = disnaker.id_biodata
LEFT JOIN paspor ON personal.id_biodata = paspor.id_biodata WHERE personal.id_biodata = '$datatki[$i]' ")->row();

			// $disnaker = $this->db->query("SELECT * FROM disnaker WHERE id_biodata = '$datatki[$i]'")->row();

			$personal_nama[] =	$personal->nama;
			$personal_tempat_lahir[] = $personal->tempatlahir;
			$personal_tanggal_lahir[] = $personal->tanggal_lahir;			
			$personal_alamat[] = $personal->alamat;
			$personal_noktp[] = $personal->noktp;
			$personal_paspor[] = $personal->nopaspor;
			$personal_iddisnaker[] = $personal->id_disnaker;
		}



		// echo date('H:i:s') , " Add new data to the template" , EOL;




		$baseRow = 11;
		for($i=0; $i<count($personal_nama); $i++) {
			$row = $baseRow + $i;
			$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

			$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $i+1)
			                              ->setCellValue('C'.$row, $personal_iddisnaker[$i])
			                              ->setCellValue('D'.$row, $personal_nama[$i])
			                              ->setCellValue('E'.$row, $personal_tempat_lahir[$i].', '.$personal_tanggal_lahir[$i])
			                              ->setCellValue('F'.$row, $personal_alamat[$i])
			                              ->setCellValue('G'.$row, $personal_noktp[$i])
			                              ->setCellValue('H'.$row, $personal_paspor[$i])
			                              ->setCellValue('I'.$row, $pinjaman[$i])
			                              ->setCellValue('J'.$row, $aproval[$i])
			                              ->setCellValue('K'.$row, $tgl_aproval[$i]);
		}
		$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);

		// $baseRow = 10;
		// foreach($data as $r => $dataRow) {
		// 	$row = $baseRow + $r;
		// 	$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

		// 	$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $r+1)
		// 	                              ->setCellValue('C'.$row, $dataRow['title'])
		// 	                              ->setCellValue('D'.$row, $dataRow['price'])
		// 	                              ->setCellValue('E'.$row, $dataRow['quantity'])
		// 	                              ->setCellValue('F'.$row, $dataRow['quantity'])
		// 	                              ->setCellValue('G'.$row, $dataRow['quantity'])
		// 	                              ->setCellValue('H'.$row, $dataRow['quantity'])
		// 	                              ->setCellValue('I'.$row, $dataRow['quantity'])
		// 	                              ->setCellValue('J'.$row, $dataRow['quantity'])
		// 	                              ->setCellValue('K'.$row, '');
		// }
		// $objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);




		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $date = gmdate("D, d M Y H:i:s");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="master.xls"');

        $objWriter->save("php://output");


	}


}