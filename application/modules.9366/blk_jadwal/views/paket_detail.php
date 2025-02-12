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
                            <div class="panel-heading bg-primary">
                                <a href="<?php echo site_url('blk_jadwal/paket') ?>" class="btn bg-warning">KEMBALI</a>
                                <div class="heading-elements">
                                    <h5 class="panel-title">DATA PAKET DETAIL</h5>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <select id="pilih_minggu" class="dewselect2_n">
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="table-responsive">
                                            <table class="table table-xxs table-bordered table-striped table-hover" id="tablez">
                                                <thead>
                                                    <tr>
                                                        <th colspan="9" class="active">
                                                            <button type="button" class="btn btn-primary btn-sm" id="tambah_data">TAMBAH PAKET</button>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td max-width="100%" style="text-align:center">NO</td>
                                                        <td max-width="100%" style="text-align:center">HARI</td>
                                                        <td max-width="100%" style="text-align:center">JAM</td>
                                                        <td max-width="100%" style="text-align:center">MINGGU</td>
                                                        <td max-width="100%" style="text-align:center">MATERI</td>
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

        </div>

    </div>



                            <div id="modal_form_horizontal" class="modal fade">
                                <div class="modal-dialog modal-full">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">TAMBAH JADWAL/HARI</h5>
                                        </div>
                                        <form id="form_add">
                                            <div class="modal-body">
                                                <input type="hidden" name="id">
                                                <input type="hidden" name="minggu_id2">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-1">Jadwal untuk </label>
                                                        <div class="col-sm-11">
                                                            <input type="text" name="minggu_id" readonly="readonly" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-1">Hari</label>
                                                        <div class="col-sm-5">
                                                            <select class="dewselect2" name="hari_id" required="required">

                                                            </select>
                                                        </div>
                                                        <label class="control-label col-sm-1">Jam</label>
                                                        <div class="col-sm-5">
                                                            <select class="dewselect2" name="jam_id" required="required">

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-1">Angkatan</label>
                                                        <div class="col-sm-11">
                                                            <select class="dewselect2_multi" name="angkatan_id" required="required">

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-1">Materi</label>
                                                        <div class="col-sm-11">
                                                            <select class="dewselect2_multi" name="materi_id" required="required">

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
    	$(function() {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/paket_detail_get_minggu') ?>",
                type            : "POST",
                dataType        : 'json',
                encode          : true,
                success: function(data) 
                {
                    $('#pilih_minggu').find('option').remove().end().append(data); 
                    $('#pilih_minggu').val(1).change();
                }
            });
    	});

        function load_table(id)
        {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/paket_detail_read/'.$id) ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id : id
                },
                encode          : true,
                success: function(data) 
                {
                    $('#tablez > tbody').find('tr').remove().end().append(data); 
                }
            });
        }

        $('#pilih_minggu').change(function() {
            var id = $(this).val();
            load_table(id);
        });

        $(document).on("click", "#tambah_data", function() {
            var minggu_id = $('#pilih_minggu').val();
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/paket_detail_add/'.$id) ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id : minggu_id
                },
                encode          : true,
                success: function(data) 
                {
		            $('input[name=id]').val("");

		            $('select[name=hari_id]').find('option').remove().end().append(data.option1); 
            		$('select[name=hari_id]').val("").change();
		            $('select[name=jam_id]').find('option').remove().end().append(data.option2); 
            		$('select[name=jam_id]').val("").change();
		            $('select[name=angkatan_id]').find('option').remove().end().append(data.option3); 
            		$('select[name=angkatan_id]').val("").change();
		            $('select[name=materi_id]').find('option').remove().end().append(data.option4);
            		$('select[name=materi_id]').val("").change();

                    $('input[name=minggu_id]').val( data.minggu );
                    $('input[name=minggu_id2]').val( minggu_id );

		            $('#form_add_btn').removeClass('add_btn');
		            $('#form_add_btn').removeClass('edit_btn');
		            $('#form_add_btn').addClass('add_btn');

		            $('#modal_form_horizontal').modal('show');
                }
            });
        });

        $(document).on("click", ".add_btn", function() {
            var minggu_id = $('#pilih_minggu').val();
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/paket_detail_insert/'.$id) ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    'minggu'    : $('input[name=minggu_id2]').val(),
                	'hari' 		: $('select[name=hari_id]').val(),
                	'jam' 		: $('select[name=jam_id]').val(),
                	'angkatan' 	: $('select[name=angkatan_id]').val(),
                	'materi' 	: $('select[name=materi_id]').val(),
                },
                encode          : true,
                success: function(data) 
                {
                    load_table(minggu_id);
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
                        $('#modal_form_horizontal').modal('toggle');
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
                url             : "<?php echo site_url('blk_jadwal/paket_detail_edit/'.$id) ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id : id
                },
                encode          : true,
                success: function(data) 
                {
                    $('input[name=id]').val(data.id);

                    $('select[name=hari_id]').find('option').remove().end().append(data.option1); 
                    $('select[name=hari_id]').val(data.val1).change();
                    $('select[name=jam_id]').find('option').remove().end().append(data.option2); 
                    $('select[name=jam_id]').val(data.val2).change();
                    $('select[name=angkatan_id]').find('option').remove().end().append(data.option3); 
                    $('select[name=angkatan_id]').val(data.val3).change();
                    $('select[name=materi_id]').find('option').remove().end().append(data.option4);
                    $('select[name=materi_id]').val(data.val4).change();

                    $('input[name=minggu_id]').val( data.minggu );
                    $('input[name=minggu_id2]').val( data.minggu2 );

                    $('#form_add_btn').removeClass('add_btn');
                    $('#form_add_btn').removeClass('edit_btn');
                    $('#form_add_btn').addClass('edit_btn');

                    $('#modal_form_horizontal').modal('show');
                }
            });
        });
    
        $(document).on("click", ".edit_btn", function() {
            var minggu_id = $('#pilih_minggu').val();
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/paket_detail_update') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                	'id' 		: $('input[name=id]').val(),
                	'hari' 		: $('select[name=hari_id]').val(),
                	'jam' 		: $('select[name=jam_id]').val(),
                	'angkatan' 	: $('select[name=angkatan_id]').val(),
                	'materi' 	: $('select[name=materi_id]').val(),
                },
                encode          : true,
                success: function(data) 
                {
                    load_table(minggu_id);
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
                        $('#modal_form_horizontal').modal('toggle');
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
            var minggu_id = $('#pilih_minggu').val();
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
                        url     : "<?php echo site_url('blk_jadwal/paket_detail_delete') ?>",
                        type    : "POST",
                        data    : {
                            'id'          : id   
                        },
                        success: function(data) {
                            load_table(minggu_id);
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