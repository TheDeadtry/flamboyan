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
                            <div class="panel-heading bg-success">
                                <a href="<?php echo site_url('blk_jadwal/pelajaran_revisi/'.$id1) ?>" class="btn bg-warning">KEMBALI</a>
                                <div class="heading-elements">
                                    <h5 class="panel-title">DATA MATERI PELAJARAN - <?php echo strtoupper($pelajaran).' ['.strtoupper($pelajaran_revisi).']'; ?></h5>
                                </div>
                            </div>

                            <div id="modal_form_horizontal" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">TAMBAH MATERI PELAJARAN</h5>
                                        </div>
                                        <form id="form_add">
                                            <input type="hidden" name="id">
                                            <input type="hidden" name="pelajaran_revisi_id">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Kode Materi</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Kode Materi" class="form-control" name="kode_materi">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Nama Materi</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Nama Materi" class="form-control" name="nama_materi">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Buku Halaman</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Buku Halaman" class="form-control" name="buku_hal">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Penjelasan Materi</label>
                                                        <div class="col-sm-9">
                                                            <textarea placeholder="Penjelasan Materi" class="form-control" name="penjelasan"></textarea> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Keterangan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Keterangan" class="form-control" name="ket">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tipe Input Nilai</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Keterangan" class="form-control" name="tipe_input_nilai">
                                                        </div>
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
                                                    <button type="button" class="btn bg-success btn-sm" id="tambah_pelajaran">TAMBAH MATERI PELAJARAN</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td width="10px" style="text-align:center">NO</td>
                                                <td max-width="100%" style="text-align:center">KODE</td>
                                                <td max-width="100%" style="text-align:center">NAMA MATERI</td>
                                                <td max-width="100%" style="text-align:center">BUKU HAL</td>
                                                <td max-width="100%" style="text-align:center">PENJELASAN</td>
                                                <td max-width="100%" style="text-align:center">KETERANGAN</td>
                                                <td max-width="100%" style="text-align:center"></td>
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
            paging: false,
            processing: true,
            serverSide: true,
            ajax:{
                "url"       : "<?php echo site_url('blk_jadwal/pelajaran_materi_read/'.$id2) ?>",
                "type"      : "POST"
            },
            ordering: false
        });

        $(document).on("click", "#tambah_pelajaran", function() {
            $('input[name=id]').val("");
            $('input[name=pelajaran_revisi_id]').val("<?php echo $id2 ?>");

            $('input[name=kode_materi]').val("");
            $('input[name=nama_materi]').val("");
            $('input[name=buku_hal]').val("");
            $('input[name=penjelasan]').val("");
            $('input[name=ket]').val("");
            $('input[name=tipe_input_nilai]').val("");

            $('#form_add_btn').removeClass('add_btn');
            $('#form_add_btn').removeClass('edit_btn');
            $('#form_add_btn').addClass('add_btn');

            $('#modal_form_horizontal').modal('show');
        });

        $(document).on("click", ".add_btn", function() {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/pelajaran_materi_insert') ?>",
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
                url             : "<?php echo site_url('blk_jadwal/pelajaran_materi_edit') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id: id
                },
                encode          : true,
                success: function(data) 
                {
                    $('input[name=id]').val(data.id);
                    $('input[name=pelajaran_revisi_id]').val(data.pelajaran_revisi_id);

                    $('input[name=kode_materi]').val(data.kode);
                    $('input[name=nama_materi]').val(data.materi);
                    $('input[name=buku_hal]').val(data.buku_hal);
                    $('input[name=penjelasan]').val(data.penjelasan);
                    $('input[name=ket]').val(data.keterangan);
                    $('input[name=tipe_input_nilai]').val(data.tipe_input_nilai);

                    $('#form_add_btn').removeClass('add_btn');
                    $('#form_add_btn').removeClass('edit_btn');
                    $('#form_add_btn').addClass('edit_btn');

                    $('#modal_form_horizontal').modal('show');
                }
            });
        });
    
        $(document).on("click", ".edit_btn", function() {
            $.ajax({
                url             : "<?php echo site_url('blk_jadwal/pelajaran_materi_update') ?>",
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
                        url     : "<?php echo site_url('blk_jadwal/pelajaran_materi_delete') ?>",
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