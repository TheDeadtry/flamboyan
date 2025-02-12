
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
                    <input type="hidden" name="id_hidden" class="form-control">
                    <input type="hidden" name="agen_id" class="form-control">

                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-lg-3">Pilih TKI</label>
                            <div class="col-lg-9">
                                <select name="tki" class="dewselect2">

                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="x_secret">
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-3">Agen</label>
                                <div class="col-lg-9">
                                    <input type="text" disabled="disabled" id="x_nama_agen" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-3">Pilih Penerima Dana</label>
                                <div class="col-lg-9">
                                    <select name="penerima_id" class="dewselect2_n">

                                    </select>
                                </div>
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
                                <a class="btn btn-xs bg-orange" href="<?php echo site_url('admin_laporan/formulir_wintrust') ?>">KEMBALI</a>
                                <button type="button" id="start_add_btn" class="btn btn-xs bg-primary">TAMBAH DATA</button>
                            </tr>
                            <tr>
                                <td>NO</td>
                                <td>---</td>
                                <td>ID BIO</td>
                                <td>NAMA</td>
                                <td>AGEN</td>
                                <td>PENERIMA</td>
                                <td>NTD</td>
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
            $('#example').dataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    "url"       : "<?php echo site_url('admin_laporan/formulir_wintrust_detail_read/'.$id) ?>",
                    "type"      : "POST"
                },
            });

            $(document).on('click', '#start_add_btn', function() {
                $.ajax({
                    url     : "<?php echo site_url('admin_laporan/formulir_wintrust_detail_add/'.$id) ?>",
                    type    : "POST",
                    success: function(data) 
                    {
                        $('#submit_btn').removeClass('add_btn');
                        $('#submit_btn').removeClass('edit_btn');
                        $('#submit_btn').addClass('add_btn');

                        $('input[name=id_hidden]').val(<?php echo $id ?>);

                        $('#x_secret').hide();
                        $('#submit_btn').hide();
                        $('select[name=tki]').find('option').remove().end().append(data).stop();
                        $('select[name=tki]').val('').change().stop();

                        $('#add').modal('show');
                    }
                });
            });

            $(document).on('change', 'select[name=tki]', function() {
                var tki = $(this).val();
                if ( tki != null )
                {
                    $.ajax({
                        url     : "<?php echo site_url('admin_laporan/formulir_wintrust_detail_get_penerima/'.$id) ?>",
                        type    : "POST",
                        data    : {
                            'idbio' : tki
                        },
                        success: function(data) 
                        {
                            $('#x_nama_agen').val(data.agen);
                            $('input[name=agen_id]').val(data.agen_id);

                            $('select[name=penerima_id]').find('option').remove().end().append(data.option);
                            $('select[name=penerima_id]').val('').change();

                            $('#x_secret').show();

                            $('select[name=tki]').trigger("updatecomplete");
                        }
                    });
                }
            });

            $(document).on('click', '.add_btn', function() {
                $.ajax({
                    url     : "<?php echo site_url('admin_laporan/formulir_wintrust_detail_insert') ?>",
                    type    : "POST",
                    data    : $('#form_add').serialize(),
                    success: function(data) {
                        $('#example').DataTable().ajax.reload();
                        if (!data.success) {
                            swal({
                                title: "Oops...!",
                                text: (data.message)+" !",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                        } else {
                            $('#add').modal('toggle');
                            swal({
                                title: "Telah dihapus!",
                                text: (data.message),
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                        }
                    }
                });
            });

            $(document).on('change', 'select[name=penerima_id]', function() {
                var p = $(this).val();

                if (p != null )
                {
                    $('#submit_btn').show();
                }

            });

            $(document).on('click', '.start_edit_btn', function() {
                var id = $(this).data('id');

                $('#submit_btn').removeClass('add_btn');
                $('#submit_btn').removeClass('edit_btn');
                $('#submit_btn').addClass('edit_btn');

                $.ajax({
                    url     : "<?php echo site_url('admin_laporan/formulir_wintrust_detail_edit') ?>",
                    type    : "POST",
                    data    : {
                        'id'          : id   
                    },
                    success: function(data) 
                    {
                        $('#submit_btn').removeClass('add_btn');
                        $('#submit_btn').removeClass('edit_btn');
                        $('#submit_btn').addClass('edit_btn');

                        $('input[name=id_hidden]').val(id);

                        $('select[name=tki]').find('option').remove().end().append(data.b).stop();
                        $('select[name=tki]').val(data.a.idbio).change();

                        $("select[name=tki]").on("updatecomplete", function() {
                            $('select[name=penerima_id]').val(data.a.penerima_id).change();
                        });

                        $('#add').modal('show');
                    }
                });
            });

            $(document).on('click', '.edit_btn', function() {
                $.ajax({
                    url     : "<?php echo site_url('admin_laporan/formulir_wintrust_detail_update') ?>",
                    type    : "POST",
                    data    : $('#form_add').serialize(),
                    success: function(data) {
                        $('#example').DataTable().ajax.reload();
                        if (!data.success) {
                            swal({
                                title: "Oops...!",
                                text: (data.message)+" !",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                        } else {
                            $('#add').modal('toggle');
                            swal({
                                title: "Telah dihapus!",
                                text: (data.message),
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
                            url     : "<?php echo site_url('admin_laporan/formulir_wintrust_detail_delete') ?>",
                            type    : "POST",
                            data    : {
                                'id'          : id   
                            },
                            success: function(data) {
                                if (!data.success) {
                                    swal({
                                        title: "Oops...!",
                                        text: (data.message)+" !",
                                        confirmButtonColor: "#66BB6A",
                                        type: "success"
                                    });
                                } else {
                                    $('#example').DataTable().ajax.reload();
                                    swal({
                                        title: "Telah dihapus!",
                                        text: (data.message),
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