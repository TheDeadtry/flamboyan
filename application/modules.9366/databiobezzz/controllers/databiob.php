<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Databiob extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_databiob');			
	}
	
	function index(){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){
			//user sudah login
				$pilsek = $this->session->userdata('pilsektor');
				$data['pilsek'] = $pilsek;

				$data['hitung_data_mf'] = $this->M_databiob->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_databiob->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_databiob->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_databiob->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_databiob->hitung_data_jp();
				$data['tampil_data_personal'] = $this->M_databiob->tampil_data_personal();


				$data['namamodule'] = "databiob";
				$data['namafileview'] = "databioadmin";
				echo Modules::run('template/kosongan_template2', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "databiob";
				$data['namafileview'] = "databioagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function setpilih($pilihan){
		$this->session->set_userdata('pilsektor', $pilihan);
		redirect('databiob/');
	}


	public function deletedata($user_id) {
    	$this->M_databiob->delete_personal($user_id);
		redirect('databiob');
    }

  	public function detaildata($user_id) {
  	  	$this->session->set_userdata("detailuser",$user_id);
		redirect('detailpersonal');
    }

   	function show_data() {
   	/*
		$pilsek = $this->session->userdata('pilsektor');

		$idbio = array();
		$idbio = $this->M_databiob->ambiltki($pilsek);

		$namatki		= array();
		$namamandarin 	= array();
		$delete 		= array();

		$tgltoagen 			= array();
		$personal 			= array();
		$tgldisnaker 		= array();
		$namamajikan 		= array();
		$namamajikanman 	= array();
		$perkiraandisnaker 	= array();
		$dataketerangan 	= array();

		$nodisnaker 		= array();
		$terpilihmajikan 	= array();
		$jdmajikan 			= array();
		$terbangmajikan 	= array();
		$tglberangkat 		= array();

		$namadisnaker		= array();

		$nonya=0;
		for($i=0;$i<count($idbio);$i++){
			$personal[]= $this->M_databiob->ambilnama($idbio[$i]);
			$namadisnaker[]= $this->M_databiob->namadisnaker($idbio[$i]);
			$ttldisnaker[]= $this->M_databiob->ttldisnaker($idbio[$i]);
			$tanggaltldisnaker[]= $this->M_databiob->tanggaltldisnaker($idbio[$i]);
			$statusdisnaker[]= $this->M_databiob->statusdisnaker($idbio[$i]);
		}

		$idper=$idbio;

        $data=array();
		$no=0;
        for($i=0;$i<count($idper);$i++) { 
			$no++;
			array_push($data,
				array(
					$no,
					$personal[$i][0],
					'',
					$personal[$i][1],
					$personal[$i][3],
					$personal[$i][4],
					$personal[$i][5].'<br>'.$personal[$i][6],
					$personal[$i][12],
					$personal[$i][7],
					$personal[$i][8],
					$personal[$i][9],
					$personal[$i][10],
					$personal[$i][11],
					'<a class="label label-primary" type="button" href="'.site_url('databiobmaleformal/detaildata/'.$personal[$i][0]).'">BIO</a>
            		<a class="label label-warning" type="button" href="'.site_url('dataadministrasi/detaildata/'.$personal[$i][0]).'">ADM</a>
            		<a class="label label-success" type="button" href="'.site_url('databiobmaleformal/detaildataupload/'.$personal[$i][0]).'">DOK</a>
            		|||<a class="label label-warning" type="button" href="'.site_url('databiobmaleformal/deletedatas/'.$personal[$i][0]).'" onclick="return deletechecked();">Hapus</a>'
				)
			);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode(array('data'=>$data)));*/


		// DB table to use
		$request = '$_GET';
		$table = 'personal';

		// Table's primary key
		$primaryKey = 'id_biodata';

		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
          
		$columnscek = array(
			array( 'db' => 'id_biodata', 	'dt' => 0 ),
			array( 'db' => 'nama',  		'dt' => 1 ),
			array( 'db' => 'kode_sponsor',  'dt' => 2 ),
			array( 'db' => 'tanggaldaftar', 'dt' => 3 ),
			array( 'db' => 'tempatlahir',  	'dt' => 4 ),
			array( 'db' => 'tgllahir',  	'dt' => 5 ),
			array( 'db' => 'tinggi', 		'dt' => 6 ),
			array( 'db' => 'berat',  		'dt' => 7 ),
			array( 'db' => 'pendidikan',  	'dt' => 8 ),
			array( 'db' => 'status', 		'dt' => 9 ),
			array( 'db' => 'notelp',  		'dt' => 10 ),
			array( 'db' => 'notelpkel',  	'dt' => 11 )
		);

		$columns22 = array(
			0 => 'id_biodata',
			1 => 'nama',  		
			2 => 'kode_sponsor', 
			3 => 'tanggaldaftar', 
			4 => 'tempatlahir',  	
			5 => 'tgllahir',  
			6 => 'tinggi', 		
			7 => 'berat',  		
			8 => 'pendidikan',  	
			9 => 'status', 		
			10 => 'notelp',  	
			11 => 'notelpkel' 	
		);
		$strr = array();
		$string1 = $_GET['search']['value'];
		for ($i=0;$i<count($columns22);$i++) {
			$strr[] = " ".strtolower($columns22[$i])." LIKE '%".strtolower($string1)."%'";
		}
		$where = '';
		if ( count( $strr ) ) {
			$where = '('.implode(' OR ', $strr).')';
		}
		if ( $where !== '' ) {
			$where = $where;
		}

		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP
		 * server-side, there is no need to edit below this line.
		 */

		//require( 'ssp.class.php' );
		$bindings = array();
		//$db = self::db( $conn );

		//$select = implode(", ", self::pluck($columns, 'db'));
		$limit = "LIMIT ".intval($_GET['start']).", ".intval($_GET['length']);
		//$where = "where like '%%'"//self::filter( $request, $columns, $bindings );

		$pilsek = $this->session->userdata('pilsektor');
		if ($where != NULL) {
			$where_dd = "WHERE personal.statterbang IS NULL  AND statusaktif!='Mengundurkan diri'  AND statusaktif!='UNFIT' AND personal.id_biodata LIKE '".$pilsek."%' AND ".$where;
		} else {
			$where_dd = "WHERE personal.statterbang IS NULL  AND statusaktif!='Mengundurkan diri'  AND statusaktif!='UNFIT' AND personal.id_biodata LIKE '".$pilsek."%'";
		}

		$idbio = $this->M_databiob->ambiltki($where_dd, $limit);
		for($i=0;$i<count($idbio);$i++){
			$where_personal[$i] = "where id_biodata='$idbio[$i]'";
			$personal[]= $this->M_databiob->ambilnama($where_personal[$i]);
		}


		$idper=$idbio;

        $data2=array();
		$no=0;
        for($i=0;$i<count($idper);$i++) { 
			$no++;
			array_push($data2,
				array(
					$no,
					$personal[$i][0],
					'',
					$personal[$i][1],
					$personal[$i][3],
					$personal[$i][4],
					$personal[$i][5].'<br>'.$personal[$i][6],
					$personal[$i][12],
					$personal[$i][7],
					$personal[$i][8],
					$personal[$i][9],
					$personal[$i][10],
					$personal[$i][11],
					'<a class="label label-primary" type="button" href="'.site_url('databiobmaleformal/detaildata/'.$personal[$i][0]).'">BIO</a>
            		<a class="label label-warning" type="button" href="'.site_url('dataadministrasi/detaildata/'.$personal[$i][0]).'">ADM</a>
            		<a class="label label-success" type="button" href="'.site_url('databiobmaleformal/detaildataupload/'.$personal[$i][0]).'">DOK</a>
            		|||<a class="label label-warning" type="button" href="'.site_url('databiobmaleformal/deletedatas/'.$personal[$i][0]).'" onclick="return deletechecked();">Hapus</a>'
				)
			);
		}

		//$order = self::order( $request, $columns );
		//$where = self::filter( $request, $columns, $bindings );

		//$data = $this->M_databiob->datatables_sql_exec($table, $bindings, $limit, $select);

		if ($where != NULL) {
			$where_filter = 'where id_biodata is not null AND '.$where;
		} else {
			$where_filter = "where id_biodata is not null";
		}
		$resFilterLength = $this->M_databiob->datatables_count_where($table, $primaryKey, $where_filter);
			
		$recordsFiltered = $resFilterLength->filter;

		// Total data set length
		$resTotalLength =  $this->M_databiob->datatables_count($table, $primaryKey);

		$recordsTotal = $resTotalLength->key;

		/*
		 * Output
		 */
		$r = array(
			"draw"            => isset ( $request['draw'] ) ?
				intval( $request['draw'] ) :
				0,
			"recordsTotal"    => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data"            => $data2//self::data_output( $columns, $data )
		);

		//$uko = $this->filter('$_GET',$columns,$bindings);
		/*
		echo '<pre>';
		print_r($uko);
		echo '</pre>';
		echo '<pre>';
		print_r($r);
		echo '</pre>';
		*/
		$this->output->set_content_type('application/json')->set_output(json_encode($r));
		/*
		echo json_encode(
			$r
		);*/
   	}

	static function filter ($columnscek, $bindings)
	{
		$request = $_GET;
		$globalSearch = array();
		$columnSearch = array();
		for ( $i=0, $len=count($columnscek) ; $i<$len ; $i++ ) {
			$out[] = $columnscek[$i]['dt'];
		}

		$dtColumns = $out;
		if ( isset($request['search']) && $request['search']['value'] != '' ) {
			$str = $request['search']['value'];

		}

		if ( isset($request['search']) && $request['search']['value'] != '' ) {
			$str = $request['search']['value'];

			for ( $i=0; $i<count($request['columns']); $i++ ) {
				$requestColumn = $request['columns'][$i];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columnscek[ $columnIdx ];
				$binding = "'%".$str."%'";
				$globalSearch[] = "".$column['db']." LIKE ".$binding;
			}
		}
/*
		if ( isset( $request['columns'] ) ) {
			for ( $i=0; $i<count($request['columns']) ; $i++ ) {
				$requestColumn = $request['columns'][$i];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];

				$str = $requestColumn['search']['value'];

				if ( $requestColumn['searchable'] == 'true' &&
				 $str != '' ) {
					$binding = self::bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
					$columnSearch[] = "`".$column['db']."` LIKE ".$binding;
				}
			}
		}*/

		$where = '';

		if ( count( $globalSearch ) ) {
			$where = '('.implode(' OR ', $globalSearch).')';
		}
/*
		if ( count( $columnSearch ) ) {
			$where = $where === '' ?
				implode(' AND ', $columnSearch) :
				$where .' AND '. implode(' AND ', $columnSearch);
		}*/

		if ( $where !== '' ) {
			$where = 'WHERE '.$where;
		}

		return $where;
	}

	static function pluck ( $a, $prop )
	{
		$out = array();

		for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
			$out[] = $a[$i][$prop];
		}

		return $out;
	}

	static function data_output ( $columns, $data )
	{
		$out = array();

		for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
			$row = array();

			for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
				$column = $columns[$j];

				// Is there a formatter?
				
				//if ( isset( $column['formatter'] ) ) {
					$row[ $column['dt'] ] =  $data[$i][ $columns[$j]['db'] ];
					//$row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i] );
				/*}
				else {
					$row[ $column['dt'] ] = $data[$i][ $columns[$j]['db'] ];
				}*/
			}

			$out[] = $row;
		}

		return $out;
	}

	static function bind ( &$a, $val, $type )
	{
		$key = ':binding_'.count( $a );

		$a[] = array(
			'key' => $key,
			'val' => $val,
			'type' => $type
		);

		return $key;
	}

	function coba() {
		$pilsek = 'MF';
		$idbio = $this->M_databiob->ambiltki($pilsek);
		for($i=0;$i<count($idbio);$i++){
			$where_personal[$i] = "where id_biodata='$idbio[$i]'";
			$personal[] = $this->M_databiob->ambilnama($where_personal[$i]);
		}
		echo '<pre>';
		print_r($personal);
		echo '</pre>';

	}
}