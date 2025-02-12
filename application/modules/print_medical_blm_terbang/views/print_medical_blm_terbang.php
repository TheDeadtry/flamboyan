<?php 
    $this->load->helper('gg_datatable');
    $table = new ggTablehtml();
?>
<link rel="stylesheet" href="<?= base_url(); ?>gugus/GGdatatable/datatables/gg-table.css">
<script src="<?= base_url(); ?>gugus/GGdatatable/datatables/gg-table.js"></script>
<style type="text/css">
    .pilih_tki{
        display: block;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 0;
        margin: 0;
    }
    .pilih_tki a{
        display: inline-block;
        padding: 5px;
        margin: 3px;
        border-radius: 3px;
        background-color: blue;
        color: white;
    }

    .pilih_tki_menu{
        display: block;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 0;
        margin: 0;
        overflow-y: scroll;
        height: 150px;
    }
    .pilih_tki_menu a{
        display: block;
        padding: 5px;
        margin: 3px;
        border-radius: 3px;
        border: 1px solid #ddd;
    }

    .pilih_tki_menu a:hover{
        background-color: blue;
        color: white;
    }
</style>

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i>DATA EXPIRED TANGGAL MEDIKAL BELUM TERBANG </i></b></h5>
                        </div>
                        <div class="panel-body">
                            <a class="btn btn-primary" href="<?= site_url(); ?>/print_medical_blm_terbang/printdata/">Print Data</a>
                            <?php 
                                $table1 = [
                                    'No',
                                    'ID',
                                    'Nama',
                                    'Tanggal Expired',
                                ];
                             ?>
                            <?= $table->table("tableku", $table1 , "print_medical_blm_terbang/ambildata/"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>