<style type="text/css">
    .tambahdatanama{
        display: inline-block;
        float: right;
    }

    #modaltampil{
        z-index: 999999999;
    }

</style>
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h2>
                    <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> AGEN - LAPORAN BIAYA PROMOSI</span>
                </h2>
            </div>
        </div>  
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-heading bg-primary">
                            <h4 class="panel-title">
                                <a class="btn btn-xs bg-warning" href="<?php echo site_url('agen'); ?>">KEMBALI</a>
                                <button class="btn btn-xs bg-purple tambah_data">TAMBAH DATA</button>
                            </h4>
                            <div class="heading-elements">
                                <?php echo $agen_nama; ?>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-xxs table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Beneficiary Name</td>
                                            <td>Branch</td>
                                            <td>Bank Code</td>
                                            <td>Beneficiary No</td>
                                            <td>Beneficiary Tel</td>
                                            <td>ACT</td>
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



<!-- Modal -->
<div id="modaltampil" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TAMBAH DATA NAMA</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
            <label for="namamandarin">Nama Mandarin</label>
            <input type="text" class="form-control" id="namamandarin" name="namamandarin">
        </div>
        <div class="form-group">
            <label for="branch">branch</label>
            <input type="text" class="form-control" id="branch" name="branch">
        </div>
        <div class="form-group">
            <label for="bankcode">bankcode</label>
            <input type="text" class="form-control" id="bankcode" name="bankcode">
        </div>
        <div class="form-group">
            <label for="banknumber">banknumber</label>
            <input type="text" class="form-control" id="banknumber" name="banknumber">
        </div>
        <div class="form-group">
            <label for="banktel">banktel</label>
            <input type="text" class="form-control" id="banktel" name="banktel">
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success simpandatanama" data-dismiss="modal">Simpan Data</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




                <div class="modal fade" id="add" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form id="form_add">
                                <div class="modal-header bg-teal">
                                    <h5 class="modal-title">
                                        TAMBAH
                                    </h5>
                                    <button type="button" onclick="tambahdatanama()" class="tambahdatanama btn btn-default">Tambah data nama</button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" name="agen_id" class="form-control" value="<?php echo $agen_id ?>">
                                    <input type="hidden" name="id" class="form-control">

                                    <div class="form-group">
                                        <div class="row">


                                            <label class="control-label col-md-2">Beneficiary Name</label>
                                            <div class="col-md-10">
                                                <select class="dewselect2" name="bank_name">
                                                    <?php 
                                                        foreach ( $tampil_data_penerima_nama as $row )
                                                        {
                                                    ?>
                                                            <option value="<?php echo $row->id ?>"><?php echo $row->nama.' | '.$row->namamandarin ?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <hr/>

                                <div class="modal-footer">
                                    <button type="button" id="submit_btn" class="btn btn-lg bg-primary add_btn">OK</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    <script type="text/javascript">

        $(".simpandatanama").click(function(){
            var nama = $("input[name='nama']").val();
            var namamandarin = $("input[name='namamandarin']").val();
            var branch = $("input[name='branch']").val();
            var bankcode = $("input[name='bankcode']").val();
            var banknumber = $("input[name='banknumber']").val();
            var banktel = $("input[name='banktel']").val();
            $.ajax({
                url : "<?= site_url(); ?>/new_agen_penerima_dana/simpandatanama",
                method: "POST",
                dataType: "text",
                data: {
                    nama: nama,
                    namamandarin: namamandarin,
                    branch: branch,
                    bankcode: bankcode,
                    banknumber: banknumber,
                    banktel: banktel

                }, success:function(response){
                    alert(response);
                    location.reload();
                }
            })
        });











        $(function() {/*
            $.ajax({
                url             : "<?php echo site_url('new_agen_penerima_dana/cek_tombol_add/'.$agen_id) ?>",
                success: function(data) 
                {
                    if ( data == 0 ) 
                    {
                        $('.tambah_data').show();
                    } 
                    else 
                    {
                        $('.tambah_data').hide();
                    }
                }
            });*/
        });

        $('#example').dataTable({
            processing: true,
            serverSide: true,
            ajax:{
                "url"       : "<?php echo site_url('new_agen_penerima_dana/show_data/'.$agen_id) ?>",
                "type"      : "POST"
            }
        });

        $('.tambah_data').click(function() {
            $('input[name=id]').val("");
            $('select[name=bank_name]').val("").change();

            $('#submit_btn').removeClass('add_btn');
            $('#submit_btn').removeClass('edit_btn');
            $('#submit_btn').removeClass('edit_btn2');
            $('#submit_btn').addClass('add_btn');

            $('#add').modal('show');
        });
    
        $(document).on("click", ".add_btn", function() {
            $.ajax({
                url             : "<?php echo site_url('new_agen_penerima_dana/insert') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : $('#form_add').serialize(),
                encode          : true,
                success: function(data) 
                {
                    $('#example').DataTable().ajax.reload();
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
                        $('#add').modal('toggle');
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


        function tambahdatanama(){
            $("#modaltampil").modal("show");
        }

        $(document).on("click", ".btn_action_ubah", function() {
            var id = $(this).data('id');
            $.ajax({
                url             : "<?php echo site_url('new_agen_penerima_dana/edit') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id: id
                },
                encode          : true,
                success: function(data) 
                {
                    $('input[name=id]').val(data.id);
                    $('select[name=bank_name]').val(data.penerima_nama_id).change();

                    $('#submit_btn').removeClass('add_btn');
                    $('#submit_btn').removeClass('edit_btn');
                    $('#submit_btn').removeClass('edit_btn2');
                    $('#submit_btn').addClass('edit_btn');

                    $('#add').modal('show');
                }
            });
        });

        $(document).on("click", ".btn_action_ubah2", function() {
            var id = $(this).data('id');
            $.ajax({
                url             : "<?php echo site_url('new_agen_penerima_dana/edit') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    id: id
                },
                encode          : true,
                success: function(data) 
                {
                    $('input[name=id]').val(data.id);
                    $('select[name=bank_name]').val(data.penerima_nama_id).change();

                    $('#submit_btn').removeClass('add_btn');
                    $('#submit_btn').removeClass('edit_btn');
                    $('#submit_btn').removeClass('edit_btn2');
                    $('#submit_btn').addClass('edit_btn2');

                    $('#add').modal('show');
                }
            });
        });
    
        $(document).on("click", ".edit_btn", function() {
            $.ajax({
                url             : "<?php echo site_url('new_agen_penerima_dana/update') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : $('#form_add').serialize(),
                encode          : true,
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
                        $('#example').DataTable().ajax.reload();
                        $('#add').modal('toggle');
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
    
        $(document).on("click", ".edit_btn2", function() {
            $.ajax({
                url             : "<?php echo site_url('new_agen_penerima_dana/update2') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : $('#form_add').serialize(),
                encode          : true,
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
                        $('#example').DataTable().ajax.reload();
                        $('#add').modal('toggle');
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
                        url     : "<?php echo site_url('new_agen_penerima_dana/delete') ?>",
                        type    : "POST",
                        data    : {
                            'id'          : id   
                        },
                        success: function(data) {
                            if (!data.success) {
                                swal({
                                    title: "Oops...!",
                                    text: (data.error)+" !",
                                    confirmButtonColor: "#66BB6A",
                                    type: "success"
                                });
                            } else {/*
                                if ( data.cekk == 0 ) 
                                {
                                    $('.tambah_data').show();
                                } 
                                else 
                                {
                                    $('.tambah_data').hide();
                                }*/
                                $('#example').DataTable().ajax.reload();
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