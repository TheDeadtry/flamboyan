
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h2>
                    <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> AGEN - LAPORAN BIAYA PROMOSI</span>
                </h2>
            </div>
        </div>  
    </div>


    <div class="row">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-heading bg-primary">
                            <h4 class="panel-title">
                                <a class="btn btn-xs bg-warning" href="<?php echo site_url('print_data'); ?>">KEMBALI</a>
                                <button class="btn btn-xs bg-purple tambah_data">TAMBAH DATA</button>
                                <button class="btn btn-xs bg-indigo cetak_laporan">CETAK LAPORAN</button>
                            </h4>
                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-xxs table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Agen</td>
                                            <td>Nama Penerima</td>
                                            <td>Tgl Transfer</td>
                                            <td>Total Transfer (NT)</td>
                                            <td>Action</td>
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

                <div class="modal fade modal-lvl2" id="add" role="dialog" data-backdrop="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form id="form_add">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title">
                                        TAMBAH DATA
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-md-2">TANGGAL TRANSFER</label>
                                            <div class="col-md-10">
                                                <input type="text" name="tanggal_transfer_doku" value="<?php echo date('Y.m.d') ?>" required="required" class="form-control dewdate">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-md-2">Agen</label>
                                            <div class="col-md-10">
                                                <select name="penerima" class="dewselect2" required="required" data-placeholder="Pilih Agen" >
                                                    <?php 
                                                        foreach($tampil_data_agen as $row) 
                                                        {
                                                    ?>
                                                           <option value="<?php echo $row->id_agen ?>"><?php echo $row->kode_agen.' - '.$row->nama ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" id="pilih_bank_stat">
                                        <div class="row">
                                            <label class="control-label col-md-2">Pilih Penerima</label>
                                            <div class="col-md-10">
                                                <select name="pilih_bank" class="dewselect2" required="required" data-placeholder="Pilih Bank Penerima" >
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr/>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <button type="button" class="btn btn-xs bg-purple tambah_pmi">TAMBAH DATA</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-xxs table-bordered" id="example2">
                                            <thead>
                                                <tr>
                                                    <td>No</td>
                                                    <td>Nama PMI</td>
                                                    <td>Jumlah (NT)</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <hr/>
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-lg bg-danger pull-left" data-dismiss="modal">CLOSE</button>
                                            </div>
                                            <div class="col-md-8"></div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-lg bg-primary save_data" id="save_btn" disabled="disabled">SIMPAN</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="add_pmi" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <form id="form_add_pmi">
                                <div class="modal-header bg-teal">
                                    <h5 class="modal-title">
                                        INSERT ROW
                                    </h5>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" name="id" class="form-control">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-md-2">Pilih PMI</label>
                                            <div class="col-md-10">
                                                <select name="pilih_pmi" class="dewselect2" required="required" data-placeholder="Pilih PMI" >

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <hr/>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-lg bg-primary add_pmi_btn">OK</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    <script type="text/javascript">
        $(function() {
        });

        $('.tambah_data').click(function() 
        {
            $('input[name=id]').val('');
            $('input[name=tanggal_transfer_doku]').val('<?php echo date('Y.m.d') ?>');
            $('select[name=penerima]').val("").change();
            $('select[name=pilih_bank]').val("").change();
            $('#example2 > tbody').find('tr').remove();

            $('#save_btn').removeClass('save_data');
            $('#save_btn').removeClass('update_data');
            $('#save_btn').addClass('save_data');

            $('#add').modal('show');
        });

        $('.tambah_pmi').click(function() {
            var agen_id = $('select[name=penerima]').val();
            $.ajax({
                url: '<?php echo site_url('new_agen_promosi/ambil_data_pmi') ?>'+"/"+agen_id,
                encode:true,
                success:function (data) {
                    $('select[name=pilih_pmi]')
                    .find('option')
                    .remove()
                    .end()
                    .append(data);
                    $('select[name=pilih_pmi]').val("").change();
                    $('#add_pmi').modal('show');
                }
            });
        });

        $('.add_pmi_btn').click(function() {
            var pmi = $('select[name=pilih_pmi]').val();
            $.ajax({
                url: '<?php echo site_url('new_agen_promosi/insert_row') ?>',
                type            : "POST",
                dataType        : 'json',
                data            : {
                    pmi : pmi
                },
                encode:true,
                success:function (data) {
                    $('#example2 > tbody')
                    .find('tr')
                    .end()
                    .append(data);
                    $('#add_pmi').modal('toggle');
                }
            });
        });

        $(document).on('click', '.hapus_row', function() {
            var tr = $(this).parent().parent();

            tr.remove();
        });

        $(document).on('click', '.save_data', function() {
            $.ajax({
                url             : '<?php echo site_url('new_agen_promosi/save_data') ?>',
                type            : "POST",
                dataType        : 'json',
                data            : $('#form_add').serialize(),
                encode          : true,
                success:function (data) {
                    if (!data.success) 
                    {
                        $('#example').DataTable().ajax.reload();
                        swal({
                            title: "Oops...",
                            text: (data.message)+" !",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } 
                    else 
                    {
                        $('#example').DataTable().ajax.reload();
                        swal({
                            title: "OK (200)",
                            text: (data.message),
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        $('#add').modal('toggle');
                    }
                }
            });
        });

        $(document).on('keyup', "#currency", function(event) {
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            });
        });

        $('#example').dataTable({
            processing: true,
            serverSide: true,
            ajax:{
                "url"       : "<?php echo site_url('new_agen_promosi/show_data') ?>",
                "type"      : "POST"
            }
        });

        $(document).on("click", ".btn_action_ubah", function() {
            var id = $(this).data('id');
            $.ajax({
                url             : "<?php echo site_url('new_agen_promosi/edit') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id: id
                },
                encode          : true,
                success: function(data) 
                {
                    $('input[name=id]').val(data.id);
                    $('input[name=tanggal_transfer_doku]').val(data.tanggal_transfer_doku);
                    $('select[name=penerima]').val(data.agen_id).change();
                    $("select[name=penerima]").on("updatecomplete", function() {
                        $('select[name=pilih_bank]').val(data.bank_id).change();
                    });
                    $('#example2 > tbody').find('tr').remove().end().append(data.table);

                    $('#save_btn').removeClass('save_data');
                    $('#save_btn').removeClass('update_data');
                    $('#save_btn').addClass('update_data');

                    $('#add').modal('show');
                }
            });
        });
    
        $(document).on("click", ".update_data", function() {
            $.ajax({
                url             : "<?php echo site_url('new_agen_promosi/update') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : $('#form_add').serialize(),
                encode          : true,
                success: function(data) 
                {
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
                        $('#example').DataTable().ajax.reload();
                        $('#add').modal('toggle');
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
                        url     : "<?php echo site_url('new_agen_promosi/hapus_data') ?>",
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

        $('select[name=penerima]').change(function() {
            $('#example2 > tbody')
            .find('tr')
            .remove();

            var pilih_bank = $(this).val();
            $.ajax({
                url             : "<?php echo site_url('new_agen_promosi/ambil_bank') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    bank: pilih_bank
                },
                encode          : true,
                success: function(data) 
                {
                    if (!data.success)
                    {
                        $('#pilih_bank_stat').hide();
                        $('#save_btn').attr('disabled', 'disabled');
                        if ( pilih_bank != '' )
                        {
                            alert('DATA BANK AGEN INI BELUM DIISI');
                        }
                    }
                    else
                    {
                        $('#pilih_bank_stat').show();

                        $('select[name=pilih_bank]')
                        .find('option')
                        .remove()
                        .end()
                        .append(data.message);
                        $('select[name=pilih_bank]').val("").change();
                        $("select[name=penerima]").trigger("updatecomplete");
                    }
                }
            });
        });

        $('select[name=pilih_bank]').change(function() {
            var pilih_bank = $(this).val();
            if ( pilih_bank != '' )
            {
                $('#save_btn').removeAttr('disabled');
            }
            else
            {
                $('#save_btn').attr('disabled', 'disabled');
            }
        });

        $(document).on("click", ".cetak_laporan", function() {
            window.location = "<?php echo site_url('new_agen_promosi/cetak_laporan') ?>";
        });
        
    </script>