
<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-9">
                
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i> CETAK PMI - TEST PSIKOLOGI </i></b></h5>

                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-lg-2">Tanggal</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="tgl_test" id="tgl_test" class="form-control dewdate2">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-lg-2">Pilih PMI</label>
                                    <div class="col-lg-10">
                                        <select class="select-results-color" multiple="multiple" id="pmi" data-placeholder="Pilih PMI" required="required">
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

                            <div class="text-right" id="pilih_btn">
                                <button class="btn btn-primary print_header">PRINT</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> LIST PRINT PMI - TEST PSIKOLOGI </i></b></h5>

                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            
                            <div class="table-responsive">
                                <table class="table table-xxs table-bordered table-striped table-hover" id="dkrh">
                                    <thead>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">OPTION</td>
                                            <td max-width="100%" style="text-align:center">PIN HAU/NO PIN<br/>NAMA</td>
                                            <td max-width="100%" style="text-align:center">TGL</td>
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

                            <div id="modal_penilaian" class="modal fade">
                                <div class="modal-dialog modal-full">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">PENILAIAN</h5>
                                        </div>
                                            <div class="modal-body">

                                                <form id="table_nilai">
                                                    <input type="hidden" name="id_psikolog">
                                                    <div class="table-responsive">
                                                        <table class="table table-xxs table-bordered table-striped table-hover" id="dkrh2">
                                                            <thead>
                                                                <tr>
                                                                    <td max-width="100%" style="text-align:center">NO</td>
                                                                    <td max-width="100%" style="text-align:center">PIN HAU/NO PIN - NAMA</td>
                                                                    <td max-width="100%" style="text-align:center">NILAI</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-block edit_footer">SIMPAN</button>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div id="modal_ubah" class="modal fade">
                                <div class="modal-dialog modal-full">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">UBAH DATA []</h5>
                                        </div>
                                            <div class="modal-body">

                                                <form id="table_nilai2">
                                                    <input type="hidden" class="form-control" id="id" name="id">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-lg-2">Tanggal</label>
                                                            <div class="col-lg-10">
                                                                <input type="text" class="form-control dewdate2" name="tgl" id="tgl">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-lg-2">Pilih PMI</label>
                                                            <div class="col-lg-10">
                                                                <select class="select-results-color" multiple="multiple" id="pmi" name="pmi" data-placeholder="Pilih PMI" required="required">
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

                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-block edit_data_psikolog">SIMPAN</button>
                                            </div>
                                    </div>
                                </div>
                            </div>


<script type="text/javascript">

    $(function() {
        $("#pmi").val("").change();
    });

    $('#dkrh').dataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('blk_psikolog2/psikolog_show') ?>",
            "type"      : "POST"
        }
    });

    $(document).on("click", ".print_header", function() {

        var form_data = {
            tgl : $('#tgl_test').val(),
            pmi : $('#pmi').val()
        }

        $.ajax({
            url             : "<?php echo site_url('blk_psikolog2/add_process') ?>",
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : form_data,
            success: function(data) {
                if (!data.success) {
                    swal({
                        title: "Oops...",
                        text: (data.message)+" !",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                } else {
                    swal({
                        title: "Sukses diubah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    }, function() {
                        $('#dkrh').DataTable().ajax.reload();
                    });
                /*
                    swal({
                        title: "Sukses diubah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    }, function() {
                        window.location.href = "<?php echo site_url('blk_psikolog2/cetaks') ?>"+"/"+data.ids;
                        $('#dkrh').DataTable().ajax.reload();
                    });*/
                }
            }
        });
    });

    function modal_penilaian(id) 
    {
        $("#modal_penilaian").modal('show');
        $("input[name=id_psikolog]").val(id);

        $.ajax({
            url             : "<?php echo site_url('blk_psikolog/psikolog_nilai_show') ?>",
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : {
                id: id
            },
            success: function(data) 
            {
                $('#dkrh2 > tbody')
                .find('tr')
                .remove()
                .end()
                .append(data);
            }
        });
    }

    $(document).on("click", ".edit_footer", function() {
        $.ajax({
            url             : "<?php echo site_url('blk_psikolog2/psikolog_nilai_ubah') ?>",
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : $("#table_nilai").serialize(),
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
                    }, function() {
                        $("#modal_penilaian").modal('hide');
                        $('#dkrh2 > tbody')
                        .find('tr')
                        .remove()
                        .end()
                        .append(data);
                    });
                }
            }
        });
    });

    function modal_ubah(id) 
    {
        $.ajax({
            url             : "<?php echo site_url('blk_psikolog2/psikolog_ubah_data') ?>"+"/"+id,
            type            : "POST",
            dataType        : 'json',
            encode          : true,
            data            : {
                id: id
            },
            success: function(data) 
            {
                $("#table_nilai2").find("#id").val(id);
                $("#table_nilai2").find("#tgl").val(data.tgl).change();
                $("#table_nilai2").find("#pmi").val(data.pmi).change();

                $("#modal_ubah").modal('show');
            }
        });
    }

    $(document).on("click", ".edit_data_psikolog", function() {
        var form_data = {
            id : $("#table_nilai2").find('#id').val(),
            tgl : $("#table_nilai2").find('#tgl').val(),
            pmi : $("#table_nilai2").find('#pmi').val()
        }

        $.ajax({
            url             : "<?php echo site_url('blk_psikolog2/psikolog_ubah_data_process') ?>",
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
                    swal({
                        title: "Sukses diubah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    }, function() {
                        $("#modal_ubah").modal('hide');
                        $('#dkrh').DataTable().ajax.reload();
                    });
                }
            }
        });
    });

</script>