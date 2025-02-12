
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h2>
                    <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> AGEN - KEUANGAN TKI TERBANG KE AGEN</span>
                </h2>
            </div>
        </div>  
    </div>


    <div class="row">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <form action="<?php echo site_url('new_perincian_keuangan_pt/input_fee') ?>" method="post">

                            <div class="panel-heading bg-primary">
                                <h4 class="panel-title">
                                    <a class="btn btn-xs bg-warning" href="<?php echo site_url('print_data'); ?>">KEMBALI</a>
                                    <button class="btn btn-xs bg-success" type="button" id="index_add_btn">Tambah Data</button>
                                </h4>
                            </div>

                            <div class="panel-body">

                                    <table class="table table-xxs table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>-</td>
                                                <td>Tanggal Masuk Taiwan</td>
                                                <td>Tanggal Transfer Uang</td>
                                                <td>Agen/Group</td>
                                                <td>Pilih Jenis TKI</td>
                                                <td>Catatan</td>
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

                        </form>

                    </div>
                    
                </div>

            </div>

            
        </div>
    </div>

                            <div id="modul2" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title"></h5>
                                        </div>
                                        <form class="form_addalls">
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" id="id_hidden" name="id_hidden"/>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Masuk Taiwan</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="tgl1" required="required" class="form-control dewdate" placeholder="Isi Tanggal Masuk Taiwan Dari.." />
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="tgl2" required="required" class="form-control dewdate" placeholder="Hingga.." />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Catatan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="catatan" class="form-control" placeholder="Isi Catatan" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Transfer Uang</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tgl_transfer" required="required" class="form-control dewdate" placeholder="Isi Tanggal Transfer Uang" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Agen</label>
                                                        <div class="col-sm-9">
                                                            <select class="dewselect2" id="pilihan_agen" name="pilihan" required="required" data-placeholder="Pilihan">
                                                                <option value="1">Semua Agen</option>
                                                                <option value="2">Per Agen</option>
                                                                <option value="3">Per Group</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" id="form_per_group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"></label>
                                                        <div class="col-sm-9">
                                                            <select class="dewselect2" id="pilih_group" name="group" data-placeholder="Pilih Group">

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" id="form_per_agen">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"></label>
                                                        <div class="col-sm-9">
                                                            <select class="dewselect2_multi" id="pilih_agen" name="agen[]" data-placeholder="Pilih Agen">

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Pilih Jenis TKI</label>
                                                        <div class="col-sm-9">
                                                            <select class="dewselect2 dewselect-reset" id="jenis_tki" name="jenis_tki" required="required" data-placeholder="Pilih Jenis TKI">
                                                                <option value="FI,MI">A1) INFORMAL 家庭幫傭及監護 (FI + MI)</option>
                                                                <option value="FI">A1-1) INFORMAL WANITA 女生家庭幫傭及監護 (FI)</option>
                                                                <option value="MI">A1-2) INFORMAL LAKI 男生家庭幫傭及監護 (MI)</option>
                                                                <option value="FF,MF">A2) FORMAL INDUSTRI 製造業 (FF + MF)</option>
                                                                <option value="FF">A2-1) FORMAL INDUSTRI WANITA 女生製造業 (FF)</option>
                                                                <option value="MF">A2-2) FORMAL INDUSTRI LAKI 男生製造業 (MF)</option>
                                                                <option value="JP">A3) PANTI JOMPO 養護機構 (JP)</option>
                                                                <option value="MH">A4) FORMAL PETERNAKAN LAKI (JP)</option>
                                                                <option value="FH">A5) FORMAL PETERNAKAN WANITA (JP)</option>
                                                                <option value="MC">A6) FORMAL KONSTRUKSI LAKI (MC)</option>
                                                                <option value="FI,MI,FF,MF,JP,MH,FH,MC">A7) SEMUA 遠東印尼外勞 (FI + MI + FF + MF + JP + MH + FH + MC )</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-xs bg-warning save_data" id="save_btn">SIMPAN</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

    <script type="text/javascript">
        $(function() {
        });

        $('#index_add_btn').click(function() {
            $('#form_per_group').hide();
            $('#form_per_agen').hide();
            $('input[name=tgl_transfer]').val('<?php echo date("Y.m.d") ?>');
            $('input[name=catatan]').val('');
            $('input[name=tgl1]').val('');
            $('input[name=tgl2]').val('');
            $('select[name=jenis_tki]').val('').change();
            $('select[name=pilihan]').val('').change();
            $('select[name=group]').val('').change();
            $('#pilih_agen').val('').change();

            $('#save_btn').removeClass('save_data');
            $('#save_btn').removeClass('update_data');
            $('#save_btn').addClass('save_data');

            $('#modul2').modal('show');
        });

        $('#pilihan_agen').change(function() {
            var id = $(this).val();
            $('#form_per_group').hide();
            $('#form_per_agen').hide();
            if ( id == 1 )
            {

            }
            else if ( id == 2 )
            {
                $.ajax({
                    url        : "<?php echo site_url('new_perincian_keuangan_pt/index_ambil_agen') ?>",
                    type       : "POST",
                    dataType   : 'json',
                    encode     : true,
                    success: function(data) {
                        $('#pilih_agen')
                        .find('option')
                        .remove()
                        .end()
                        .append(data);
                        $('#pilih_agen').val("").change();
                        $('#pilih_agen').attr('required','required');
                        $('#form_per_group').hide();
                        $('#form_per_agen').show();
                        $("select[name=pilihan]").trigger("updatecomplete");
                    }
                });
            }
            else if ( id == 3 )
            {
                $.ajax({
                    url        : "<?php echo site_url('new_perincian_keuangan_pt/index_ambil_group') ?>",
                    type       : "POST",
                    dataType   : 'json',
                    encode     : true,
                    success: function(data) {
                        $('#pilih_group')
                        .find('option')
                        .remove()
                        .end()
                        .append(data);
                        $('#pilih_group').val("").change();
                        $('#pilih_group').attr('required','required');
                        $('#form_per_group').show();
                        $('#form_per_agen').hide();
                        $("select[name=pilihan]").trigger("updatecomplete");
                    }
                });
            }
        });

        $('.save_data').click(function() {
            $.ajax({
                url        : "<?php echo site_url('new_perincian_keuangan_pt/index_insert') ?>",
                type       : "POST",
                dataType   : 'json',
                encode     : true,
                data       : $('.form_addalls').serialize(),
                success: function(data) 
                {
                    $('#example').DataTable().ajax.reload();
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
                        swal({
                            title: "OK (200)",
                            text: (data.message),
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        $('#modul2').modal('toggle');
                    }
                }
            });
        });

        $(document).on("click", ".btn_action_ubah", function() {
            var id = $(this).data('id');
            $.ajax({
                url             : "<?php echo site_url('new_perincian_keuangan_pt/index_edit') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id: id
                },
                encode          : true,
                success: function(data) 
                {
                    $('input[name=id_hidden]').val(id);
                    $('input[name=tgl_transfer]').val(data.v1.tgl_transfer);
                    $('input[name=catatan]').val(data.v1.catatan);
                    $('input[name=tgl1]').val(data.v1.tgl1);
                    $('input[name=tgl2]').val(data.v1.tgl2);
                    $('select[name=jenis_tki]').val(data.v1.jenis_tki).change();
                    $('select[name=pilihan]').val(data.v1.pilihan).change();
                    
                    $("select[name=pilihan]").on("updatecomplete", function() {
                        if ( data.v1.pilihan == 2 )
                        {
                            $('#pilih_agen').val(data.agen).change();
                        }
                        else if ( data.v1.pilihan == 3 )
                        {
                            $('select[name=group]').val(data.v1.group).change();
                        }
                    });

                    $('#save_btn').removeClass('save_data');
                    $('#save_btn').removeClass('update_data');
                    $('#save_btn').addClass('save_data');

                    $('#modul2').modal('show');
                }
            });
        });

        $('.update_data').click(function() {
            $.ajax({
                url        : "<?php echo site_url('new_perincian_keuangan_pt/index_update') ?>",
                type       : "POST",
                dataType   : 'json',
                encode     : true,
                data       : $('.form_addalls').serialize(),
                success: function(data) 
                {
                    $('#example').DataTable().ajax.reload();
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
                        swal({
                            title: "OK (200)",
                            text: (data.message),
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        $('#modul2').modal('toggle');
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
                        url     : "<?php echo site_url('new_perincian_keuangan_pt/index_delete') ?>",
                        type    : "POST",
                        data    : {
                            'id'          : id   
                        },
                        success: function(data) {
                            if (!data.success) {
                                swal({
                                    title: "Oops...!",
                                    text: (data.error)+" !",
                                    confirmButtonColor: "#66BB6A",
                                    type: "success"
                                });
                            } else {
                                $('#example').DataTable().ajax.reload();
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

        $.extend( $.fn.dataTable.defaults, {
            dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '_INPUT_',
                lengthMenu: '_MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            }
        });

        $('#example').dataTable({
            processing: true,
            serverSide: true,
            ajax:{
                "url"       : "<?php echo site_url('new_perincian_keuangan_pt/index_show_table') ?>",
                "type"      : "POST"
            },
            scrollX: true,
            scrollCollapse: true,
            ordering: false
        });
    </script>