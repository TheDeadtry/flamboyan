
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h2>
                    <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> FORMULIR WINTRUST</span>
                </h2>
            </div>
        </div>  
    </div>

<div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_add">
                <div class="modal-header bg-teal">
                    <h5 class="modal-title">
                        TAMBAH DATA
                    </h5>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id_hidden">

                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-lg-3">No Transaksi</label>
                            <div class="col-lg-9">
                                <input type="text" name="no" class="form-control" placeholder="Isi No Transaksi">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-lg-3">Tanggal</label>
                            <div class="col-lg-9">
                                <input type="text" name="tgl" class="form-control dewdate" placeholder="Isi Tanggal">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-lg-3">Rate</label>
                            <div class="col-lg-9">
                                <input type="text" name="rate" class="form-control" placeholder="Isi Rate">
                            </div>
                        </div>
                    </div>

                </div>

                <hr/>

                <div class="modal-footer">
                    <button type="button" id="submit_btn" class="btn btn-lg bg-primary add_btn">OK</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div class="row">

        <div class="col-md-12">

            <div class="panel">

                <div class="panel-heading bg-primary">
                    
                    <h4 class="panel-title">
                        DATA FORMULIR WINTRUST
                    </h4>

                </div>

                <div class="panel-body">

                    <table class="table table-xxs table-bordered" id="example">
                        <thead>
                            <tr colspan="4">
                                <button type="button" id="start_add_btn" class="btn btn-xs bg-primary">TAMBAH DATA</button>
                            </tr>
                            <tr>
                                <td>No</td>
                                <td>---</td>
                                <td>No Transaksi</td>
                                <td>Tanggal</td>
                                <td>Rate</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>

                <div class="panel-footer">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>

    </div>

        <script type="text/javascript" charset="utf-16">
            /*$(document).on('click', '#print_btn', function() {
                var form_data = new FormData();         
                form_data.append('no', $("input[name=no]").val() );
                form_data.append('tgl', $("input[name=tgl]").val() );
                form_data.append('rate', $("input[name=rate]").val() );

                $.ajax({
                    url             : "<?php echo site_url('admin_laporan/formulir_wintrust_add_process') ?>",
                    type            : "POST",
                    cache           : false,
                    contentType     : false,
                    processData     : false,
                    data            : form_data,
                    success: function(data) {
                        if (!data.success) {
                            swal({
                                title: "Oops...",
                                text: (data.message)+" !",
                                confirmButtonColor: "#EF5350",
                                type: "error"
                            });
                        } else {/*
                            swal({
                                title: "Sukses diubah!",
                                text: (data.message),
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            }, function() {
                                window.location.href = "<?php echo site_url('admin_laporan/formulir_wintrust_print') ?>"+"/"+data.message;
                                //$('#example').DataTable().ajax.reload();
                                //reset_form();
                            //});
                       /* }
                    }
                });
            });*/

            $('#example').dataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    "url"       : "<?php echo site_url('admin_laporan/formulir_wintrust_read') ?>",
                    "type"      : "POST"
                },
            });

            $(document).on('click', '#start_add_btn', function() {
                $('input[name=no]').val('');
                $('input[name=tgl]').val('');
                $('input[name=rate]').val('');

                $('#submit_btn').removeClass('add_btn');
                $('#submit_btn').removeClass('edit_btn');
                $('#submit_btn').addClass('add_btn');

                $('#add').modal('show');
            });

            $(document).on('click', '.add_btn', function() {
                $.ajax({
                    url     : "<?php echo site_url('admin_laporan/formulir_wintrust_insert') ?>",
                    type    : "POST",
                    data    : $('#form_add').serialize(),
                    success: function(data) {
                        $('#example').DataTable().ajax.reload();
                        if (!data.success) {
                            swal({
                                title: "Oops...!",
                                text: (data.error)+" !",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                        } else {
                            $('#add').modal('toggle');
                            swal({
                                title: "Telah dihapus!",
                                text: (data.success),
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.start_edit_btn', function() {
                var id = $(this).data('id');

                $('#submit_btn').removeClass('add_btn');
                $('#submit_btn').removeClass('edit_btn');
                $('#submit_btn').addClass('edit_btn');

                $.ajax({
                    url     : "<?php echo site_url('admin_laporan/formulir_wintrust_edit') ?>",
                    type    : "POST",
                    data    : {
                        'id'          : id   
                    },
                    success: function(data) {
                        $('input[name=no]').val(data.no);
                        $('input[name=tgl]').val(data.tgl);
                        $('input[name=rate]').val(data.rate);
                        $('input[name=id_hidden]').val(data.id);

                        $('#add').modal('toggle');
                    }
                });
            });

            $(document).on('click', '.edit_btn', function() {
                $.ajax({
                    url     : "<?php echo site_url('admin_laporan/formulir_wintrust_update') ?>",
                    type    : "POST",
                    data    : $('#form_add').serialize(),
                    success: function(data) {
                        $('#example').DataTable().ajax.reload();
                        if (!data.success) {
                            swal({
                                title: "Oops...!",
                                text: (data.error)+" !",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                        } else {
                            $('#add').modal('toggle');
                            swal({
                                title: "Telah dihapus!",
                                text: (data.success),
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                        }
                    }
                });
            });

            $(document).on("click", ".start_delete_btn", function() {
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
                            url     : "<?php echo site_url('admin_laporan/formulir_wintrust_delete') ?>",
                            type    : "POST",
                            data    : {
                                'id'          : id   
                            },
                            success: function(data) {
                                $('#example').DataTable().ajax.reload();
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