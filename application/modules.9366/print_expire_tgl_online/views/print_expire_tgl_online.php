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
                            <h5 class="panel-title"><b><i>DATA EXPIRED TGL ONLINE DISNAKER BELUM TERBANG SUDAH ID </i></b></h5>
                        </div>
                        <div class="panel-body">
                            <a class="btn btn-primary" href="<?= site_url(); ?>/print_expire_tgl_online/printdata/">Print Data</a>
                            <a class="btn btn-primary print-opsi">Print Opsi</a>
                            <?php 
                                $table1 = [
                                    'No',
                                    'ID',
                                    'Nama',
                                    'Tanggal Expired',
                                ];
                             ?>
                            <?= $table->table("tableku", $table1 , "print_expire_tgl_online/ambildata/"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".print-opsi").click(function(){
        $("#myModal").modal("show");
    })
</script>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
      <form action="<?= site_url(); ?>/print_expire_tgl_online/printdata/" method="post">
        <div class="form-group">
            <label for="">start from</label>
            <input type="date" class="form-control" name="date01">
        </div>
        <div class="form-group">
            <label for="">end</label>
            <input type="date" class="form-control" name="date02">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>