
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> Data IP </i></b></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <hr/>
                            <table class="table table-xxs table-bordered table-striped table-hover" id="dkrh">
                                <thead>
                                    <tr>
                                        <td max-width="100%" style="text-align:center">NO</td>
                                        <td max-width="100%" style="text-align:center">ID - NAMA</td>
                                        <td max-width="100%" style="text-align:center">TGL MULAI - SELESAI</td>
                                        <td max-width="100%" style="text-align:center">KET</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> Data IP Kembali Kosong </i></b></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <hr/>
                            <table class="table table-xxs table-bordered table-striped table-hover" id="dkrh2">
                                <thead>
                                    <tr>
                                        <td max-width="100%" style="text-align:center">NO</td>
                                        <td max-width="100%" style="text-align:center">ID - NAMA</td>
                                        <td max-width="100%" style="text-align:center">TGL MULAI</td>
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
    function dd1()
    {
        $.ajax({
            url             : "<?php echo site_url('blk_rekapitulasi/noticetki_show') ?>",
            success: function(data) 
            {
                $('#dkrh > tbody').html( aa.t1 );
                $('#dkrh2 > tbody').html( aa.t2 );
            }
        });
    }
    dd1();
    function modal_ubah(id) 
    {
        $.ajax({
            url             : "<?php echo site_url('blk_rekapitulasi/noticetki_edit') ?>"+"/"+id,
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : {
                id: id
            },
            success: function(data) 
            {
                $("#modaldkrhbody").find("#id").val(data.id);
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
            ket : $("#modaldkrhbody").find('#ket').val(),
        }
        $.ajax({
            url             : "<?php echo site_url('blk_rekapitulasi/noticetki_update') ?>",
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
                    $('#dkrh2').DataTable().ajax.reload();
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
</script>
