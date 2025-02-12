
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> Data Notarisan </i></b></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <a href="<?php echo site_url('notarisan_bulk/add') ?>" class="btn bg-blue">Tambah (Bulk)</a>
                            <a href="<?php echo site_url('notarisan_bulk/belum') ?>" class="btn bg-blue">List TKI yg Belum</a>
                            <a href="<?php echo site_url('notarisan_bulk/printform') ?>" class="btn bg-green">PRINT</a>
                            <hr/>
                            <div class="table-responsive">
                                <table class="table table-xxs table-bordered table-striped table-hover" id="dkrh">
                                    <thead>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">OPSI</td>
                                            <td max-width="100%" style="text-align:center">Tanggal</td>
                                            <td max-width="100%" style="text-align:center">PMI</td>
                                            <td max-width="100%" style="text-align:center">Nama</td>
                                            <td max-width="100%" style="text-align:center">Nomor</td>
                                            <td max-width="100%" style="text-align:center">Hubungan</td>
                                            <td max-width="100%" style="text-align:center">Khusus</td>
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

<div id="modaldkrh" class="modal fade">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title"></h5>
            </div>
                <div class="modal-body">
                    <form id="modaldkrhbody">
                        <input type="hidden" class="form-control" id="id" name="id">
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-2">Pilih PMI</label>
                                <div class="col-lg-10">
                                    <select class="dewselect2" id="pmi" name="pmi" data-placeholder="Pilih PMI" required="required">
                                        <?php 
                                            foreach( $tampil_data_pmi as $row ) {
                                        ?>
                                                <option value="<?php echo $row->id_biodata ?>"><?php echo $row->id_biodata.' - '.$row->nama ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-2">Nama</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-2">Nomor</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="nomor" id="nomor">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-2">Hub</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="hub" id="hub">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-2">Khusus</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="khusus" id="khusus">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block dkrhsimpanubah" id="dkrhbtnSimpan">SIMPAN</button>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $('#dkrh').dataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('notarisan_bulk/show') ?>",
            "type"      : "POST"
        }
    });
    function modal_ubah(id) 
    {
        $.ajax({
            url             : "<?php echo site_url('notarisan_bulk/edit') ?>"+"/"+id,
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : {
                id: id
            },
            success: function(data) 
            {
                $("#id").val(data.id_notarisan);
                $("#pmi").select2().val(data.id_biodata).change();
                $("#nama").val(data.nama_nota);
                $("#nomor").val(data.notelp);
                $("#hub").val(data.hub_nota);
                $("#khusus").val(data.khusus_nota);

                $("#modaldkrhbody").find(".modal-title").text("Ubah Data");

                $("#modaldkrh").modal('show');
            }
        });
    }
    $(document).on("click", ".dkrhsimpanubah", function() {
        var form_data = {
            id : $("#modaldkrhbody").find('#id').val(),
            pmi : $("#modaldkrhbody").find('#pmi').val(),
            nama : $("#modaldkrhbody").find('#nama').val(),
            nomor : $("#modaldkrhbody").find('#nomor').val(),
            hub : $("#modaldkrhbody").find('#hub').val(),
            khusus : $("#modaldkrhbody").find('#khusus').val(),
        }
        $.ajax({
            url             : "<?php echo site_url('notarisan_bulk/update') ?>",
            type            : "POST",
            dataType        : 'json',
            encode          : true,
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
                    $("#modaldkrh").modal('hide');
                    $('#dkrh').DataTable().ajax.reload();
                    swal({
                        title: "Sukses ditambah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    }, function() {
                    });
                }
            }
        });
    });
    function modal_hapus(id) {
        var form_data = {
            id : $("#modaldkrhbody").find('#id').val(),
        }
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
                    url             : "<?php echo site_url('notarisan_bulk/delete') ?>",
                    type            : "POST",
                    dataType        : 'json',
                    encode          : true,
                    data            : form_data,
                    success: function(data) {
                        $('#dkrh').DataTable().ajax.reload();
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
    }
</script>
