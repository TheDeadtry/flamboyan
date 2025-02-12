
<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">
                
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel">
                        <div class="panel-heading bg-indigo">
                            <h5 class="panel-title"><b><i>PRINT </i></b></h5>

                            <div class="heading-elements">
                            </div>
                        </div>

                            <div class="panel-body">
                                <input type="hidden" class="form-control" id="id_hidden"/>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="label col-lg-3" style="color:#000;">Tanggal</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="tanggal" class="form-control dewdate" value="<?php echo date('Y.m.d'); ?>">
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group row">
                                    <label class="label col-xs-3" style="color:#000;">Nomor</label>
                                    <div class="col-xs-2">
                                        <input name="nomor1" class="form-control" placeholder="...">
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="nomor2" class="form-control" value="FGJ-TKI">
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="nomor3" class="form-control" value="XI">
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="nomor4" class="form-control" value="2017">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="label col-lg-3" style="color:#000;">Lampiran</label>
                                        <div class="col-lg-9">
                                            <input name="lampiran" class="form-control" value="-">
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="label col-lg-3" style="color:#000;">Perihal</label>
                                        <div class="col-lg-9">
                                            <select name="perihal" class="dewselect2">
                                                <option value="Laporan TKI PT.FLAMBOYAN GEMAJASA Mengundurkan diri">Laporan TKI PT.FLAMBOYAN GEMAJASA Mengundurkan diri</option>
                                                <option value="Laporan TKI PT.FLAMBOYAN GEMAJASA Kabur/Pulang">Laporan TKI PT.FLAMBOYAN GEMAJASA Kabur/Pulang</option>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="label col-lg-3" style="color:#000;">Kepada</label>
                                        <div class="col-lg-9">
                                            <select class="dewselect2" name="kepada" placeholder="Pilih Kepada...">

                                            </select>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="label col-lg-3" style="color:#000;">PMI</label>
                                        <div class="col-lg-9">
                                            <select class="dewselect2" name="pmi" multiple="multiple" placeholder="Pilih PMI">

                                            </select>
                                            <code class="code-danger">Jika tidak ada data PMI, berarti data 'Ket MD/Kabur/Pulang' di databio masih kosong.</code>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-9">
                                            <button class="btn btn-xs bg-primary print_header">PRINT + SAVE</button>
                                        </div>
                                    </div>
                                </div>

                            </div> 


                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i>PRINT SURAT REKOM IJIN BATCH/NAMA </i></b></h5>

                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-lg table-bordered table-striped table-hover" id="dkrh">
                                    <thead>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">Option</td>
                                            <td max-width="100%" style="text-align:center">Tanggal</td>
                                            <td max-width="100%" style="text-align:center">Nomor</td>
                                            <td max-width="100%" style="text-align:center">Lampiran</td>
                                            <td max-width="100%" style="text-align:center">Perihal</td>
                                            <td max-width="100%" style="text-align:center">Kepada</td>
                                            <td max-width="100%" style="text-align:center">PMI</td>
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

                            <div id="modal_form_horizontal" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">UBAH DATA</h5>
                                        </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="label col-lg-3" style="color:#000;">Pilih Kota</label>
                                                        <div class="col-lg-9">
                                                            <select class="form-control" name="pilih_tipe2" id="pilih_tipe2">
                                                                <option value="PORTRAIT" >PORTRAIT</option>
                                                                <option value="LANDSCAPE" >LANDSCAPE</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="label col-lg-3" style="color:#000;">Tanggal</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" name="tgl2" id="tgl2" class="form-control dewdate2" value="<?php echo date('Y-m-d'); ?>">
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="label col-lg-3" style="color:#000;">Pilih Peserta</label>
                                                        <div class="col-lg-9">
                                                            <select class="tyy" name="select_nama2[]" multiple="multiple" id="select_nama2">

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary edit_footer">OK</button>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div id="modal25" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">TOTAL ENTER ( <?php htmlentities('<br/>') ?> )</h5>
                                        </div>
                                        <form id="modal25_form">
                                            <div class="modal-body">
                                                <input type="hidden" name="id">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="label col-lg-3" style="color:#000;">Enter</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" name="br" class="form-control">
                                                        </div>
                                                    </div> 
                                                </div>

                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary modal25_submit">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php 
                                function romawi($bln)
                                {
                                    $bln = $bln-1;

                                    $data = array(
                                        'I', 'II', 'III', 'IV', 'V', 'VI',
                                        'VII', 'VIII', 'IX', 'X', 'XI', 'XII'
                                    );

                                    return $data[ $bln ];
                                }
                            ?>

<script type="text/javascript">
    $(function() {
        $('input[name=tanggal]').val('<?php echo date("Y.m.d") ?>'); 
        $('input[name=nomor1]').val('');
        $('input[name=nomor2]').val('FGJ-TKI');
        $('input[name=nomor3]').val('<?php echo romawi( date('n') ) ?>');
        $('input[name=nomor4]').val('<?php echo date("Y") ?>');
        $('input[name=lampiran]').val('-');
        $('select[name=perihal]').val('Laporan TKI PT.FLAMBOYAN GEMAJASA Mengundurkan diri').change();

        $.ajax({
            url     : "<?php echo site_url('new_laporan_md/getData') ?>",
            success: function(data) {
                $("select[name=kepada]").find('option').remove().end().append(data.kepada);
                $("select[name=pmi]").find('option').remove().end().append(data.pmi);

                $('select[name=kepada]').val('').change();
                $('select[name=pmi]').val('').change();
            }
        });
    });

    $('#dkrh').dataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ordering: false,
        ajax: {
            "url"       : "<?php echo site_url('new_laporan_md/table_show') ?>",
            "type"      : "POST"
        }
    });

    $(document).on("click", ".enter_button", function() {
        var id = $(this).data('id');
        var br = $(this).data('br');

        $('#modal25').find('input[name=id]').val(id);
        $('#modal25').find('input[name=br]').val(br);

        $('#modal25').modal('show');
    });

    $(document).on("click", ".modal25_submit", function() {
        $.ajax({
            url     : "<?php echo site_url('new_laporan_md/edit_enter') ?>",
            type    : "POST",
            data    : $('#modal25_form').serialize(),
            success: function(data) {
                $('#dkrh').DataTable().ajax.reload();
                if (!data.success) {
                    swal({
                        title: "Oops...",
                        text: (data.message)+" !",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                } else {
                    $('#modal25').modal('toggle');
                    swal({
                        title: "Sukses diubah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                }

            }
        });
    });
/*
    function modal_ubah(id) {
        $.ajax({
            url     : "<?php echo site_url('surat_rekom_ijin_batch/edit_show') ?>",
            type    : "POST",
            data    : {
                'id'          : id       
            },
            success: function(data) {
                $("#id_hidden").val(id);

                $("#pilih_tipe2").val(data.tipe).trigger("change");
                $("#tgl2").val(data.tgl);
                $("#select_nama2").val(data.tki).trigger("change");

                $('#modal_form_horizontal').modal('toggle');

            }
        });
    }

    $('.modal-footer').on("click", ".edit_footer", function() {

        id = $("#id_hidden").val();
        var form_data = new FormData();   

        form_data.append('select_nama', $("#select_nama2").val() );
        form_data.append('tgl', $("#tgl2").val() );
        form_data.append('pilih_tipe', $("#pilih_tipe2").val() );
        $.ajax({
            url             : "<?php echo site_url('surat_rekom_ijin_batch/edit_process') ?>"+"/"+id,
            type            : "POST",
            cache           : false,
            contentType     : false,
            processData     : false,
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
                        $('#modal_form_horizontal').modal('toggle');
                    });
                }
            }
        });

    });
*/
    $(document).on("click", ".print_header", function() {

        var form_data = new FormData();   

        form_data.append('tanggal', $('input[name=tanggal]').val() ); 
        form_data.append('nomor1', $('input[name=nomor1]').val() );
        form_data.append('nomor2', $('input[name=nomor2]').val() );
        form_data.append('nomor3', $('input[name=nomor3]').val() );
        form_data.append('nomor4', $('input[name=nomor4]').val() );
        form_data.append('lampiran', $('input[name=lampiran]').val() );
        form_data.append('perihal', $('select[name=perihal]').val() );
        form_data.append('kepada', $('select[name=kepada]').val() );
        form_data.append('pmi', $('select[name=pmi]').val() );

        $.ajax({
            url             : "<?php echo site_url('new_laporan_md/add_process') ?>",
            type            : "POST",
            cache           : false,
            contentType     : false,
            processData     : false,
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
                        window.open("","_blank").location.href = "<?php echo site_url('new_laporan_md/print_pdf') ?>"+"/"+data.id;
                        $('#dkrh').DataTable().ajax.reload();
                    });
                }
            }
        });
    });

</script>