<?php 
    require_once('engine/support/boot.php');

    require_once('engine/singleton/boot.php');

if(isset($_GET['ajaxreq']))
{
    $isi = $_GET['ajaxreq'];
    $asli = file_get_contents('php://input');
    $data = json_decode($asli);
    if($isi == 'db') {
        $d = DB::dbquery($data->query);
        echo json_encode($d);
    } else if($isi == 'db_insert') {
        print_r($data->table);
        DB::sql_save_query($data->table,$data->datas);
        echo json_encode(['status' => 'ok']);
    }
} else {
    
    require_once('engine/main/index.php');
}
/*
echo $rootpath.'<br/>';
echo $filepath.'<br/>';
echo $headpath.'<br/>';
echo $app_url.'<br/>';*/
?>