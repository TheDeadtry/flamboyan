<?php

if (!defined('BASEPATH')) {
    exit('Maaf, akses secara langsung tidak diperkenankan.');
}

class Kriteria_pekerjaan extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['namamodule'] = "kriteria_pekerjaan";
        $data['namafileview'] = "view";
        echo Modules::run('template/admin_template', $data);
    }
}
