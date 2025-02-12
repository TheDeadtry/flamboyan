<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtable extends CI_Model{

	private $post; 
	private $draw = 1; 
	private $limit = []; 
	private $search = ''; 
	private $order = []; 
	private $query = "";
	private $data = [];
	private $show = [];
	private $slct = "";

	public function __call($method, $arguments) {
        return call_user_func_array(Closure::bind($this->$method, $this, get_called_class()), $arguments);
    }


	public function defaultOrder($column = "id", $dir ="ASC"){
		$this->order = [
			"column" => $column,
			"dir" => $dir
		];
	}

	public function column($arr = []){
		$this->column = $arr;
	}

	private function cek($data = ""){
		$ret = false;
		foreach($this->column as $clm){
			if($data === $clm){
				$ret = true;
			}
		}
		return $ret;
	}


	public function select($r = ""){
		$this->slct = $r;
	}


	public function query(...$arg){
		if( isset($arg[0]) ){
			$data = $arg[0];
			$this->query = $data;
		}
	}

	public function run(){

		// get order params
		if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

		$this->post = $_POST;

		$this->limit['start'] = $this->post['start'];
		$this->limit['length'] = $this->post['length'];
		$this->search = $this->post['search']['value'];
		
		if($setorder != ""){
			$this->order["column"] = $setorder[0]["column"];
			$this->order["dir"] = $setorder[0]["dir"];
		}

		$this->draw = $this->post['draw'];

		$qr = $this->query;

		// cek limit

		$limitCount = [];

		foreach($this->limit as $keyword => $value){
			$limitCount[] = $value;
			$qr = str_replace( "{" . $keyword . "}" , $value, $qr );
		}

		foreach($this->order as $keyword => $value){
			$qr = str_replace( "{" . $keyword . "}" , $value, $qr );
		}

		$sc = str_replace("'", "\'", $this->search);
		$qr = str_replace( "{search}" , $sc  , $qr );

		$qr1 = str_replace("{select}", $this->slct, $qr);
		$qr2 = str_replace("{select}", " count(*) tot ", $qr);


		// var_dump(str_replace("||", "", $qr1));

		$this->data = $this
						->db
						->query( str_replace("||", "", $qr1) )
						->result();

		// if(ip() === '103.105.55.47'){
		// 	var_dump(str_replace("||", "", $qr1));
		// }				

		$this->count = $this
						->db
						->query( explode("||",  $qr2 )[0] )
						->row()
						->tot;

		$customeable = [];
		foreach($this->data as $datakey => $datavalue){
			$dataval = [];
			$arrdata = (array) $datavalue;

			if(isset($this->addFront)){
				if(is_callable($this->addFront)){
					$front = $this->addFront((object) $arrdata, ( $limitCount[0] ) , $datakey );
					if( is_array( $front ) ){
						$dataval = array_merge($dataval, $front);
					}
				}
			}

			foreach($arrdata as $k => $d){
				if($this->cek($k) === true){
					$dataval[] = $d;
				}
			}

			if(isset($this->addBack)){
				if(is_callable($this->addBack)){
					$back = $this->addBack((object) $arrdata, ( $limitCount[0] ) , $datakey);
					if( is_array( $back ) ){
						$dataval = array_merge($dataval, $back);
					}
				}
			}

			$customeable[] = $dataval;

		}

		$r = array(
            "draw"            => $this->draw,
            "recordsTotal"    => intval( $this->count ),
            "recordsFiltered" => intval( $this->count ),
            "data"            => $customeable,
        );
        echo json_encode($r);
	}

}