
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <div class="heading-elements">
            </div>
        </div>
    </div>
    <!-- /page header -->

    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-lg-2">
                        <?php 
                            $this->load->view('blk_jadwal/sidebar');
                        ?>
                    </div>

                    <div class="col-lg-10">
                            <div class="panel">
                                <div class="panel-heading bg-teal">
                                    <h5 class="panel-title">
                                        DATA JADWAL PEMBELAJARAN
                                    </h5>
                                </div>

                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                                <thead>
                                                    <tr>
                                                        <th colspan="9" class="active">
                                                            <a class="btn btn-xxs bg-warning" id="tambah_data">Tambah</a>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td max-width="100%" style="text-align:center">NO</td>
                                                        <td max-width="100%" style="text-align:center">TGL JADWAL</td>
                                                        <td max-width="100%" style="text-align:center">NAMA PAKET</td>
                                                        <td max-width="100%" style="text-align:center">INSTRUKTUR</td>
                                                        <td style="text-align:center">ACTION</td>
                                                    </tr>
                                                </thead>
                                                <tbody> 

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                            </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

                                        <div id="tambah69" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">TAMBAH JADWAL PEMBELAJARAN</h5>
                                                    </div>
                                                    <form id="form_add">
                                                        <div class="modal-body" style="color:black;">
                                                            <input type="hidden" name="id">

                                                            <div class="form-group">
                                                                <div class="row">   
                                                                    <label class="control-label col-sm-3">Pilih Tanggal</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="pil_tgl" class="form-control dewdate2" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">   
                                                                    <label class="control-label col-sm-3">Pilih Paket</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="pil_paket" class="dewselect2" required="required">

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">   
                                                                    <label class="control-label col-sm-3">Pilih Instruktur</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="pil_ins" class="select-search" required="required">

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                            <button type="button" class="btn btn-primary" id="form_add_btn">OK</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
    <script type="text/javascript">
        $('#jadwaltables').dataTable({
            processing: true,
            serverSide: true,
            ajax:{
                "url"       : "<?php echo site_url('blk_jadwal/datapembelajaran_read') ?>",
                "type"      : "POST"
            },
            ordering: false
        });

        $(document).on("click", "#tambah_data", function() {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/datapembelajaran_add') ?>",
                type            : "POST",
                dataType        : 'json',
                encode          : true,
                success: function(data) 
                {
                    $('input[name=id]').val("");
                    $('input[name=pil_tgl]').val("");

                    $('select[name=pil_paket]').find('option').remove().end().append(data.option1);
                    $('select[name=pil_paket]').val("").change();

                    $('select[name=pil_ins]').find('option').remove().end().append(data.option2);
                    $('select[name=pil_ins]').val("").change();

                    $('#form_add_btn').removeClass('add_btn');
                    $('#form_add_btn').removeClass('edit_btn');
                    $('#form_add_btn').addClass('add_btn');

                    $('#tambah69').modal('show');
                }
            });
        });

        $(document).on("click", ".add_btn", function() {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/datapembelajaran_insert') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : $('#form_add').serialize(),
                encode          : true,
                success: function(data) 
                {
                    $('#jadwaltables').DataTable().ajax.reload();
                    if (!data.success) 
                    {
                        swal({
                            title: "Oops...",
                            text: (data.message)+" !",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } 
                    else 
                    {
                        $('#tambah69').modal('toggle');
                        swal({
                            title: "OK!",
                            text: (data.message),
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                    }
                }
            });
        });

        $(document).on("click", ".btn_action_ubah", function() {
            var id = $(this).data('id');
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/datapembelajaran_edit') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id: id
                },
                encode          : true,
                success: function(data) 
                {
                    $('input[name=id]').val(data.v.id);
                    $('input[name=pil_tgl]').val(data.v.tanggal);

                    $('select[name=pil_paket]').find('option').remove().end().append(data.option1);
                    $('select[name=pil_paket]').val(data.v.paket_id).change();

                    $('select[name=pil_ins]').find('option').remove().end().append(data.option2);
                    $('select[name=pil_ins]').val(data.v.instruktur_id).change();

                    $('#form_add_btn').removeClass('add_btn');
                    $('#form_add_btn').removeClass('edit_btn');
                    $('#form_add_btn').addClass('edit_btn');

                    $('#tambah69').modal('show');
                }
            });
        });
    
        $(document).on("click", ".edit_btn", function() {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/datapembelajaran_update') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : $('#form_add').serialize(),
                encode          : true,
                success: function(data) 
                {
                    $('#jadwaltables').DataTable().ajax.reload();
                    if (!data.success) 
                    {
                        swal({
                            title: "Oops...",
                            text: (data.message)+" !",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } 
                    else 
                    {
                        $('#tambah69').modal('toggle');
                        swal({
                            title: "OK!",
                            text: (data.message),
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                    }
                }
            });
        });

        $(document).on("click", ".btn_action_hapus", function() {
            var id = $(this).data('id');
            swal({
                title: "Yakin?",
                text: "Anda akan menghapus data ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "tidak, batal",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url     : "<?php echo site_url('blk_jadwal/datapembelajaran_delete') ?>",
                        type    : "POST",
                        data    : {
                            'id'          : id   
                        },
                        success: function(data) {
                            $('#jadwaltables').DataTable().ajax.reload();
                            if (!data.success) {
                                swal({
                                    title: "Oops...!",
                                    text: (data.error)+" !",
                                    confirmButtonColor: "#66BB6A",
                                    type: "success"
                                });
                            } else {
                                swal({
                                    title: "Telah dihapus!",
                                    text: (data.success),
                                    confirmButtonColor: "#66BB6A",
                                    type: "success"
                                });
                            }
                        }
                    });
                    
                } else {
                    swal({
                        title: "Dibatalkan",
                        text: "Data ini aman :)",
                        confirmButtonColor: "#2196F3",
                        type: "error"
                    });
                }
            });
        });
    </script>