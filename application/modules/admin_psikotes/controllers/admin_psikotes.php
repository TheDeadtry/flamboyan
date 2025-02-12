<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Admin_psikotes extends MX_Controller{

    public function index(){
        $data['namamodule'] = "admin_psikotes";
        $data['namafileview'] = "admin";
        echo Modules::run('template/admin_template', $data);
    }

}