
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">

                <div class="row">
                    <div class="panel">
                        <div class="panel-heading bg-primary-400">
                            <h5 class="panel-title">
                                SURAT REKOM TABUNGAN
                            </h5>
                        </div>
                        <div class="panel-body" style="padding:0;">

                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <table class="table table-xxs">
                                    <thead>
                                        <th width="35%" ></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th colspan="2" class="active">
                                                <a type="button" class="btn btn-mini bg-teal" href="<?php echo site_url('print_data') ?>" >KEMBALI</a>
                                                <button type="button" class="btn btn-mini btn-primary btn_add" >TAMBAH DATA</button>
                                            </th>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                                <br/>

                                <div class="panel">
                                    <div class="panel-heading bg-orange-600">
                                        <h5 class="panel-title">
                                            REKOM TABUNGAN
                                        </h5>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-xxs table-bordered" id="dewtable66678">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Opsi</th>
                                                        <th>Print</th>
                                                        <th>ID Biodata</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Tempat & Tanggal Lahir</th>
                                                        <th>Jabatan</th>
                                                        <th>Alamat</th>
                                                        <th>Nomor Surat</th>
                                                        <th>Lampiran</th>
                                                        <th>Perihal</th>
                                                        <th>BANK</th>
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

                            <div id="modal_add" class="modal fade">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title"></h5>
                                        </div>
                                        <form id="modal_add_form" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" id="id_hidden"/>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3 text-right">ID Biodata</label>
                                                        <div class="col-sm-9">
                                                            <select class="dewselect2" id="idbio" data-placeholder="Pilih TKI">
                                                                <option></option>
                                                                <?php 
                                                                    foreach ( $tampil_data_tki as $pilihan )
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $pilihan->id_biodata; ?>"><?php echo $pilihan->id_biodata.' '.$pilihan->nama; ?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3 text-right">Nomor Surat</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="nomorsurat" class="form-control" placeholder="Nomor Surat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3 text-right">Lampiran</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="lampiran" class="form-control">
                                                            <code class="text-danger">Ubah Jika berbeda</code>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3 text-right">Perihal</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="perihal" class="form-control">
                                                            <code class="text-danger">Ubah Jika berbeda</code>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3 text-right">Jabatan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="jabatan" class="form-control">
                                                            <code class="text-danger">Ubah Jika berbeda</code>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3 text-right">Kepada (BANK)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="kepada" class="form-control" placeholder="Pilih Kepada (BANK)">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="control-label col-sm-12">
                                                            <button type="button" id="modal_btn_ex" class="btn btn-primary">OK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

<script type="text/javascript">
    $('#dewtable66678').dataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('surat_rekom_tabungan/index_show') ?>",
            "type"      : "POST"
        }
    });

    $(document).on("click", ".btn_add", function() {
        $('#modal_add').modal('show');
        $('.modal-title').text('TAMBAH REKOM TABUNGAN');

        $('#modal_btn_ex').removeClass('modal_edit_btn');
        $('#modal_btn_ex').addClass('modal_add_btn');

        $("#id_hidden").val("");
        $("#idbio").val("");
        $("#nomorsurat").val("");
        $("#lampiran").val("-");
        $('#perihal').val("Surat Rekomendasi Untuk Pembukaan Rekening Tabungan");
        $("#jabatan").val("Calon Tenaga Kerja Indonesia (CTKI)");
        $("#kepada").val("");
    });
    
    $('#modal_add').on("click", ".modal_add_btn", function() {

        var form_data = new FormData();                  
        form_data.append('idbio', $("#idbio").val() );
        form_data.append('nomorsurat', $("#nomorsurat").val() );
        form_data.append('lampiran', $("#lampiran").val() );
        form_data.append('perihal', $('#perihal').val() );
        form_data.append('jabatan', $("#jabatan").val() );
        form_data.append('kepada', $("#kepada").val() );
        
        $.ajax({
            url             : "<?php echo site_url('surat_rekom_tabungan/index_simpan') ?>",
            type            : "POST",
            cache           : false,
            contentType     : false,
            processData     : false,
            data            : form_data,
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
                    swal({
                        title: "Sukses ditambah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $('#modal_add').modal('toggle');
                    $('#dewtable66678').DataTable().ajax.reload();
                }
            }
        });
    });

    $(document).on("click", ".sets_ubah", function() {
        $('#modal_add').modal('show');
        $('.modal-title').text('UBAH REKOM TABUNGAN');

        $('#modal_btn_ex').removeClass('modal_add_btn');
        $('#modal_btn_ex').addClass('modal_edit_btn');

        var id = $(this).data('id');

        $.ajax({
            url             : "<?php echo site_url('surat_rekom_tabungan/index_edit') ?>"+"/"+id,
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            success: function(data) 
            {
                $("#id_hidden").val(id);
                $("#idbio").val(data.id_biodata).change();
                $("#nomorsurat").val(data.nomor);
                $("#lampiran").val(data.lampiran);
                $('#perihal').val(data.perihal);
                $("#jabatan").val(data.jabatan);
                $("#kepada").val(data.kepada);
            }
        });
    });
    
    $('#modal_add').on("click", ".modal_edit_btn", function() {
        var id = $("#id_hidden").val();

        var form_data = new FormData();  
        form_data.append('idbio', $("#idbio").val() );
        form_data.append('nomorsurat', $("#nomorsurat").val() );
        form_data.append('lampiran', $("#lampiran").val() );
        form_data.append('perihal', $('#perihal').val() );
        form_data.append('jabatan', $("#jabatan").val() );
        form_data.append('kepada', $("#kepada").val() );
        
        $.ajax({
            url             : "<?php echo site_url('surat_rekom_tabungan/index_ubah') ?>"+"/"+id,
            type            : "POST",
            cache           : false,
            contentType     : false,
            processData     : false,
            data            : form_data,
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
                    swal({
                        title: "Sukses diubah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $('#modal_add').modal('toggle');
                    $('#dewtable66678').DataTable().ajax.reload();
                }
            }
        });
    });

    $(document).on("click", ".sets_hapus", function() {
        id = $(this).data('id');
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
                    url     : "<?php echo site_url('surat_rekom_tabungan/index_hapus') ?>",
                    type    : "POST",
                    data    : {
                        'id'          : id   
                    },
                    success: function(data) {
                        if ((data.error)) {
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
                            $('#dewtable66678').DataTable().ajax.reload();
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