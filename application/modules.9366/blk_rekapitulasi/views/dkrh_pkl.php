
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> Data PKL </i></b></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <button id="dkrhAdd" class="btn bg-blue" onClick="modal_tambah()">Tambah</button>
                            <hr/>
                            <div class="table-responsive">
                                <table class="table table-xxs table-bordered table-striped table-hover" id="dkrh">
                                    <thead>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">OPSI</td>
                                            <td max-width="100%" style="text-align:center">ID - NAMA</td>
                                            <td max-width="100%" style="text-align:center">TGL MULAI</td>
                                            <td max-width="100%" style="text-align:center">TGL SELESAI</td>
                                            <td max-width="100%" style="text-align:center">KET</td>
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
                                                <option value="<?php echo $row->nodaftar ?>"><?php echo $row->nodaftar.' - '.$row->nama ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-2">Tanggal Mulai</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control dewdate2" name="tgl1" id="tgl1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-2">Tanggal Selesai</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control dewdate2" name="tgl2" id="tgl2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-lg-2">Ket</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="ket" id="ket">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block" id="dkrhbtnSimpan">SIMPAN</button>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#dkrh').dataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('blk_rekapitulasi/pkl_show') ?>",
            "type"      : "POST"
        }
    });
    function modal_tambah() {
        $("#modaldkrhbody").find("#id").val("");
        $("#modaldkrhbody").find("#pmi").val("").change();
        $("#modaldkrhbody").find("#tgl1").val("").change();
        $("#modaldkrhbody").find("#tgl2").val("").change();
        $("#modaldkrhbody").find("#ket").val("").change();

        $("#modaldkrhbody").find(".modal-title").text("Tambah Data");
        $("#dkrhbtnSimpan").removeClass("dkrhsimpanubah");
        $("#dkrhbtnSimpan").addClass("dkrhsimpantambah");

        $("#modaldkrh").modal('show');
    }
    $(document).on("click", ".dkrhsimpantambah", function() {
        var form_data = {
            id : $("#modaldkrhbody").find('#id').val(),
            pmi : $("#modaldkrhbody").find('#pmi').val(),
            tgl1 : $("#modaldkrhbody").find('#tgl1').val(),
            tgl2 : $("#modaldkrhbody").find('#tgl2').val(),
            ket : $("#modaldkrhbody").find('#ket').val(),
        }
        $.ajax({
            url             : "<?php echo site_url('blk_rekapitulasi/pkl_insert') ?>",
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
    function modal_ubah(id) 
    {
        $.ajax({
            url             : "<?php echo site_url('blk_rekapitulasi/pkl_edit') ?>"+"/"+id,
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : {
                id: id
            },
            success: function(data) 
            {
                $("#modaldkrhbody").find("#id").val(data.id);
                $("#modaldkrhbody").find("#pmi").val(data.id_biodata).change();
                $("#modaldkrhbody").find("#tgl1").val(data.tglmulai).change();
                $("#modaldkrhbody").find("#tgl2").val(data.tglselesai).change();
                $("#modaldkrhbody").find("#ket").val(data.ket).change();

                $("#modaldkrhbody").find(".modal-title").text("Ubah Data");
                $("#dkrhbtnSimpan").removeClass("dkrhsimpantambah");
                $("#dkrhbtnSimpan").addClass("dkrhsimpanubah");

                $("#modaldkrh").modal('show');
            }
        });
    }
    $(document).on("click", ".dkrhsimpanubah", function() {
        var form_data = {
            id : $("#modaldkrhbody").find('#id').val(),
            pmi : $("#modaldkrhbody").find('#pmi').val(),
            tgl1 : $("#modaldkrhbody").find('#tgl1').val(),
            tgl2 : $("#modaldkrhbody").find('#tgl2').val(),
            ket : $("#modaldkrhbody").find('#ket').val(),
        }
        $.ajax({
            url             : "<?php echo site_url('blk_rekapitulasi/pkl_update') ?>",
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
                    url             : "<?php echo site_url('blk_rekapitulasi/pkl_delete') ?>",
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
