<?php
class Letterofstatement extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->model('disnaker');
        $this->load->model('personal');
        $this->load->model('paspor');
    }

    function document($document, $datas=[]){
        $filename = 'biodata-'.date('d-m-Y').'.docx';
        $isinya = $document->save($filename, 'Word2007');
        if ($isinya) {
            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Expires: 0');
            flush();
            // var_dump($isinya);
            readfile($isinya);
            unlink($isinya); // deletes the temporary file
            exit;
        } else {
            echo "none";
        }
        die();
    }

}
?>