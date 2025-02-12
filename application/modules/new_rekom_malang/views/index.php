
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
                                        <label class="label col-lg-3" style="color:#000;">Pilih TKI</label>
                                        <div class="col-lg-9">
                                            <select class="dewselect2" name="tki" multiple="multiple" placeholder="Pilih TKI">

                                            </select>
                                            <!-- <code class="code-danger">Jika tidak ada data TKI, berarti data 'Ket MD/Kabur/Pulang' di databio masih kosong.</code> -->
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
                                            <td max-width="100%" style="text-align:center">TKI</td>
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
                            <label class="label col-lg-3" style="color:#000;">Tanggal</label>
                            <div class="col-lg-9">
                                <input type="text" name="tanggal" id="tanggal" class="form-control dewdate2" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="label col-lg-3" style="color:#000;">Nomor</label>
                            <div class="col-lg-9">
                                <input type="text" name="nomor" id="nomor" class="form-control" >
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="label col-lg-3" style="color:#000;">Pilih TKI</label>
                            <div class="col-lg-9">
                                <select class="dewselect2" name="tki" id="tki" multiple="multiple" placeholder="Pilih TKI">
                                <?php 
                                    foreach ($ambil_nama as $row) {
                                ?>
                                        <option value="<?php echo $row->idbio ?>" ><?php echo $row->idbio.' - '.$row->nama ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                <!-- <code class="code-danger">Jika tidak ada data TKI, berarti data 'Ket MD/Kabur/Pulang' di databio masih kosong.</code> -->
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

        $.ajax({
            url     : "<?php echo site_url('new_rekom_malang/getData') ?>",
            success: function(data) {
                $("select[name=tki]").find('option').remove().end().append(data.tki);

                $('select[name=tki]').val('').change();
            }
        });
    });

    $('#dkrh').dataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ordering: false,
        ajax: {
            "url"       : "<?php echo site_url('new_rekom_malang/table_show') ?>",
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

    function modal_ubah(id_pembuatan) {
        $.ajax({
            url     : "<?php echo site_url('new_rekom_malang/edit_show') ?>",
            type    : "POST",
            data    : {
                'id_pembuatan'          : id_pembuatan      
            },
            success: function(data) {
                $("#id_hidden").val(id_pembuatan);

                $("#tanggal").val(data.tanggal);
                $("#nomor").val(data.nomor);
                $("#tki").val(data.tki).trigger("change");

                $('#modal_form_horizontal').modal('toggle');

            }
        });
    }
    
    // $(document).on("click", ".btn_action_hapus", function() {
    //         var id_pembuatan = $(this).data('id_pembuatan');
           
    //         function(isConfirm){
    //             if (isConfirm) {
    //                 $.ajax({
    //                     url     : "<?php echo site_url('new_rekom_malang/hapus_data') ?>",
    //                     type    : "POST",
    //                     data    : {
    //                         'id_pembuatan'          : id_pembuatan  
    //                     },
    //                     success: function(data) {
    //                         if (!data.success) {
    //                             swal({
    //                                 title: "Oops...!",
    //                                 text: (data.error)+" !",
    //                                 confirmButtonColor: "#66BB6A",
    //                                 type: "success"
    //                             });
    //                         } else {
    //                             $('#dkrh').DataTable().ajax.reload();
    //                             swal({
    //                                 title: "Telah dihapus!",
    //                                 text: (data.success),
    //                                 confirmButtonColor: "#66BB6A",
    //                                 type: "success"
    //                             });
    //                         }
    //                     }
    //                 });
                    
    //             } else {
    //                 swal({
    //                     title: "Dibatalkan",
    //                     text: "Data ini aman :)",
    //                     confirmButtonColor: "#2196F3",
    //                     type: "error"
    //                 });
    //             }
    //         });
    //     }
    $('.modal-footer').on("click", ".edit_footer", function() {

        id_pembuatan = $("#id_hidden").val();
        var form_data = new FormData();   
       
        form_data.append('tanggal', $("#tanggal").val() );
        form_data.append('nomor', $("#nomor").val() );
        form_data.append('tki', $("#tki").val() );

        $.ajax({
            url             : "<?php echo site_url('new_rekom_malang/edit_process') ?>"+"/"+id_pembuatan,
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

    $(document).ready(function(){
        $(document).click(function(e){
            var target = $(e.target); 
            // swal({
            //     title: "Yakin?",
            //     text: "Anda akan menghapus data ini!",
            //     type: "warning",
            //     showCancelButton: true,
            //     confirmButtonColor: "#EF5350",
            //     confirmButtonText: "Ya, hapus",
            //     cancelButtonText: "tidak, batal",
            //     closeOnConfirm: false,
            //     closeOnCancel: false
            // },
            if(target.is(".deletedata")){
                var getId = target.attr("data-id");
                $.ajax({
                    url: "<?= site_url(); ?>/new_rekom_malang/hapus",
                    dataType: "text",
                    method: "POST",
                    data: {
                        myid: getId
                    }, success:function(response){
                        console.log(response);
                        $('#dkrh').DataTable().ajax.reload();
                    }
                })
            }
        })
    })


    $(document).on("click", ".print_header", function() {

        var form_data = new FormData();   

        form_data.append('tanggal', $('input[name=tanggal]').val() ); 
        form_data.append('nomor1', $('input[name=nomor1]').val() );
        form_data.append('nomor2', $('input[name=nomor2]').val() );
        form_data.append('nomor3', $('input[name=nomor3]').val() );
        form_data.append('nomor4', $('input[name=nomor4]').val() );
        form_data.append('tki', $('select[name=tki]').val() );

        $.ajax({
            url             : "<?php echo site_url('new_rekom_malang/add_process') ?>",
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
                        window.open("","_blank").location.href = "<?php echo site_url('new_rekom_malang/print_pdf') ?>"+"/"+data.id;
                        $('#dkrh').DataTable().ajax.reload();
                    });
                }
            }
        });
    });
</script>