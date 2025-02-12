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
                                <h5 class="panel-title">DATA PAKET</h5>
                            </div>

                            <div id="modal_form_horizontal" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">TAMBAH PAKET</h5>
                                        </div>
                                        <form id="form_add">
                                            <input type="hidden" name="id">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Nama Paket</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="paket" class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Pilih Pelajaran</label>
                                                    <div class="col-sm-9">
                                                        <select name="pelajaran" class="dewselect2" id="pil_pelajaran">
                                                        	
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Pilih REV</label>
                                                    <div class="col-sm-9">
                                                        <select name="rev" class="dewselect2" id="pil_rev">
                                                        	
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                <button type="button" class="btn btn-primary" id="form_add_btn">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                        <thead>
                                            <tr>
                                                <th colspan="9" class="active">
                                                    <button type="button" class="btn btn-primary btn-sm" id="tambah_pelajaran">TAMBAH PAKET</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td width="10px" style="text-align:center">NO</td>
                                                <td max-width="100%" style="text-align:center">NAMA PAKET</td>
                                                <td max-width="100%" style="text-align:center">PELAJARAN/REV</td>
                                                <td width="300px" style="text-align:center">ACTION</td>
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
    <!-- /page container -->
    <script type="text/javascript">
        $('#jadwaltables').dataTable({
            processing: true,
            serverSide: true,
            ajax:{
                "url"       : "<?php echo site_url('blk_jadwal/paket_read') ?>",
                "type"      : "POST"
            },
            ordering: false
        });

        $(document).on("click", "#tambah_pelajaran", function() {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/paket_add') ?>",
                type            : "POST",
                dataType        : 'json',
                encode          : true,
                success: function(data) 
                {
		            $('input[name=id]').val("");
		            $('input[name=paket]').val("");

		            $('#pil_pelajaran').find('option').remove().end().append(data);
            		$('select[name=pelajaran]').val("").change();

		            $('#pil_rev').find('option').remove();

		            $('#form_add_btn').removeClass('add_btn');
		            $('#form_add_btn').removeClass('edit_btn');
		            $('#form_add_btn').addClass('add_btn');

		            $('#modal_form_horizontal').modal('show');
                }
            });
        });

        $('#pil_pelajaran').change(function() {
        	var id = $(this).val();
        	$.ajax({
                url             : "<?php echo site_url('blk_jadwal/paket_get_rev') ?>",
                type            : "POST",
                dataType        : 'json',
                data 			: {
                	id : id
                },
                encode          : true,
                success: function(data) 
                {
		            $('#pil_rev').find('option').remove().end().append(data);
            		$('select[name=rev]').val("").change();
                    $("#pil_pelajaran").trigger("updatecomplete");
                }
            });
        });

        $(document).on("click", ".add_btn", function() {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/paket_insert') ?>",
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
                url             : "<?php echo site_url('blk_jadwal/paket_edit') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id: id
                },
                encode          : true,
                success: function(data) 
                {
                    $('input[name=id]').val(data.v.id);
                    $('input[name=paket]').val(data.v.nama_paket);

                    $('#pil_pelajaran').find('option').remove().end().append(data.option);
                    
                    $('select[name=pelajaran]').val(data.v.pelajaran_id).change();

                    $("#pil_pelajaran").on("updatecomplete", function() {
                        $('select[name=rev]').val(data.v.pelajaran_revisi_id).change();
                    });

                    $('#form_add_btn').removeClass('add_btn');
                    $('#form_add_btn').removeClass('edit_btn');
                    $('#form_add_btn').addClass('edit_btn');

                    $('#modal_form_horizontal').modal('show');
                }
            });
        });
    
        $(document).on("click", ".edit_btn", function() {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/paket_update') ?>",
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
                        url     : "<?php echo site_url('blk_jadwal/paket_delete') ?>",
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