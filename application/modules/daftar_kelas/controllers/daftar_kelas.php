<?php

if (!defined('BASEPATH')) {
    exit('Maaf, akses secara langsung tidak diperkenankan.');
}

class Daftar_kelas extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['namamodule'] = "daftar_kelas";
        $data['namafileview'] = "view";
        echo Modules::run('template/admin_template', $data);
    }
}
