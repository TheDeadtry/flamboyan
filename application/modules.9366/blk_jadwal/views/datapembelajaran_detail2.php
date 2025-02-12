

    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">

                <div class="row">
                    
                    <div class="col-lg-12">
                            <div class="panel" id="panel_bawah">
                                <div class="panel-heading bg-teal">
                                    <h5 class="panel-title">
                                        <div class="text-center">DATA JADWAL PEMBELAJARAN</div>
                                        <div class="heading-elements">
                                            <button type="button" class="btn bg-warning btn-sm" id="btn_tambah_manual">TAMBAH TKI</button>
                                        </div>
                                    </h5>
                                </div>

                                <div class="panel-body">

                                        <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables2">
                                            <thead>
                                                <tr>
                                                    <td colspan="6">
                                                        <a class="btn btn-sm bg-warning" href="<?php echo site_url('blk_jadwal/datapembelajaran') ?>">KEMBALI </a>
                                                        <a class="btn btn-sm bg-info" id="penilain_full_jadwal_btn">NILAI </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NO</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ID TKW</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NAMA</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NILAI</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ANGKATAN (MINGGU)</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">KEHADIRAN</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ACTION</td>
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

            <div id="modal_tambah_manual" class="modal fade" style="color:#000;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">TAMBAH MANUAL</h5>
                        </div>
                        <form id="form_tambah_manual">

                            <div class="modal-body">

                                <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">PILIH TKI</label>
                                            <div class="col-sm-10">
                                                <select class="dewselect2_multi" name="manual_piltki">

                                                </select>
                                            </div>
                                        </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-danger" id="tambah_manual">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="modal_check_kehadiran" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">CHECKLIST KEHADIRAN</h5>
                        </div>
                        <form id="form_checklist">
                            <div class="modal-body">
                                <input type="hidden" name="id_checklist">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">STATUS KEHADIRAN</label>
                                        <div class="col-sm-10">
                                            <select class="dewselect2_n" name="stat_hadir">
                                                <option value="1">Hadir</option>
                                                <option value="2">Tidak Hadir</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="stat_alasan">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">PILIH ALASAN</label>
                                        <div class="col-sm-10">
                                            <select name="alasan_tdk_hadir" class="dewselect2">
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="simpan_checklist">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div id="penilaian_full_jadwal_modal" class="modal fade">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">PENILAIAN SATU JADWAL PEMBELAJARAN</h5>
                        </div>
                        <form id="form_penilaian_full">
                            <input type="hidden" name="idx">

                            <div class="modal-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 pull-right" id="data-tombol-all-for-full">

                                        </div>
                                        <div class="col-sm-6">
                                            <select name="idbio_pilihan" class="dewselect2_n">
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6" id="idbio_place">
                                            ID BIODATA : 
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="hidden" name="idx">
                                        </div>
                                    </div>
                                </div>

                                <table class="table table-xxs table-bordered table-striped table-hover" id="penilaian_full_jadwal_table">
                                    <thead>
                                        <tr>
                                            <td rowspan="2" style="text-align:center">MATERI</td>
                                            <td colspan="2" style="text-align:center">NILAI</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">T</td>
                                            <td class="text-center">P</td>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="simpan_penilaian_full">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    <script type="text/javascript">
        $(function() {

            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail2_read/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                encode      : true,
                success:function (data) {
                    $("#jadwaltables2 > tbody").find('tr').remove().end().append(data);
                }
            });
        });

        $(document).on("click", ".delete_btn", function() {
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
                        url     : '<?php echo site_url('blk_jadwal/datapembelajaran_detail2_delete/'.$id) ?>',
                        type    : "POST",
                        data    : {
                            'id'          : id   
                        },
                        success: function(data) {
                            $("#jadwaltables2 > tbody").find('tr').remove().end().append(data.d);
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

        $(document).on('click','#print_this_btn',function() {
            var id = $('select[name=pil_hari]').val();
            window.location = "<?php echo site_url('blk_jadwal/printdata1/'.$id) ?>" + "/" + id;
        });

        $(document).on('click', '#btn_tambah_manual', function() {
            var pil_hari    = $("select[name=pil_hari]").val();
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_manual_add1/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    id : pil_hari
                },
                encode      : true,
                success:function (data) {
                    $('select[name=manual_pilih]').val(1).change();

                    $('select[name=manual_piltki').find('option').remove().end().append(data.option);
                    $('select[name=manual_piltki]').val('').change();
                        
                    $('#modal_tambah_manual').modal('show');
                }
            });
        });

        $(document).on('click', '#tambah_manual', function() {
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail2_manual_insert/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    tki : $("select[name=manual_piltki]").val()
                },
                encode      : true,
                success:function (data) {
                    $("#jadwaltables2 > tbody").find('tr').remove().end().append(data.d);

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
                        $('#modal_tambah_manual').modal('toggle');
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
/*
        $(document).on('click', '.checkhadir_btn', function() {
            var id    = $(this).data('id');
            var pil_hari    = $("select[name=pil_hari]").val();
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_check_kehadiran_edit') ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    id : id,
                    pil_hari : pil_hari
                },
                encode      : true,
                success:function (data) {
                    $('input[name=id_checklist]').val(id);
                    $('select[name=stat_hadir]').val(data.stat_hadir).change();

                    $("select[name=stat_hadir]").on("updatecomplete", function() {
                        $('select[name=alasan_tdk_hadir]').val(data.alasan_tdk_hadir).change();
                    });
                        
                    $('#modal_check_kehadiran').modal('show');
                }
            });
        });

        $('select[name=stat_hadir]').change(function() {
            var val = $(this).val();
            if ( val == 1 )
            {
                $('#stat_alasan').hide();
            }
            else if ( val == 2 )
            {
                $.ajax({
                    url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_check_kehadiran_get_option') ?>',
                    type        : 'POST',
                    dataType    : 'json',
                    encode      : true,
                    success:function (data) {
                        $('select[name=alasan_tdk_hadir]').find('option').remove().end().append(data.option);

                        $('#stat_alasan').show();

                        $('select[name=stat_hadir]').trigger("updatecomplete");
                    }
                });
            }
        });

        $(document).on('click', '#simpan_checklist', function() {
            var pil_hari = $('select[name=pil_hari]').val();
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_check_kehadiran_update/'.$id) ?>'+'/'+pil_hari,
                type        : 'POST',
                dataType    : 'json',
                data        : $('#form_checklist').serialize(),
                encode      : true,
                success:function (data) {
                    $("#jadwaltables > tbody").find('tr').remove().end().append(data.d.a);
                    $("#jadwaltables2 > tbody").find('tr').remove().end().append(data.d.b);

                    $('#panel_kanan').show();
                    $('#panel_bawah').show();

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
                        $('#modal_check_kehadiran').modal('toggle');
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
*/

        $(document).on('click', '.tombol_allchanger', function() {
            var values = $(this).val();

            $('.penilaian_isian').val(values).change();

        });


        $(document).on('click', '#penilain_full_jadwal_btn', function() {
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail2_penilaian_full/add/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    'idbio' : $('select[name=idbio_pilihan]').val()
                },
                encode      : true,
                success:function (data) {
                    if (!data.stat) 
                    {
                        swal({
                            title: "Terjadi Kesalahan",
                            text: (data.message),
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } 
                    else
                    {
                        $('#penilaian_full_jadwal_table > tbody').find('tr').remove().end().append(data.table);
                        $('select[name=idbio_pilihan]').find('option').remove().end().append(data.option);
                        $('select[name=idbio_pilihan]').val(data.idbio).change().stop();

                        $('#idbio_place').text("ID BIODATA : "+data.idbio);

                        $('input[name=idx]').val(data.idx);

                        $('#data-tombol-all-for-full').html(data.tombol);

                            
                        $('#penilaian_full_jadwal_modal').modal('show');
                    }
                    //$('input[name=penilain_full_jadwal_id]').val(id);

                    //$('#data-tombol-all').html(data.tombol);

                }
            })
        });

        $(document).on('change', 'select[name=idbio_pilihan]', function() {
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail2_penilaian_full/change/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    'idbio' : $('select[name=idbio_pilihan]').val()
                },
                encode      : true,
                success:function (data) {
                    if (!data.stat) 
                    {
                        swal({
                            title: "Terjadi Kesalahan",
                            text: (data.message),
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } 
                    else 
                    {
                        $('#idbio_place').text("ID BIODATA : "+data.idbio);

                        $('input[name=idx]').val(data.idx);

                        $('#penilaian_full_jadwal_table > tbody').find('tr').remove().end().append(data.table);
                            
                        $('#penilaian_full_jadwal_modal').modal('show');
                    }
                    //$('input[name=penilain_full_jadwal_id]').val(id);

                    //$('#data-tombol-all').html(data.tombol);

                }
            })
        });

        $(document).on('click', '#simpan_penilaian_full', function() {
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail2_penilaian_full_update/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : $('#form_penilaian_full').serialize(),
                encode      : true,
                success:function (data) {
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
                        $('#penilaian_full_jadwal_modal').modal('toggle');
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

        $('input.number').keyup(function(event) {

            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                return value
            .replace(/\D/g, "");
            });
        });
        $(".khdrn").on('click', function(){
            if ($('.khdrn').checked) {
                alert('bwbw');
            } else {
                alert('bwbw2');
            }
            var value = $(this).val();
            $.ajax({
                url: '<?php echo site_url('blk_jadwal2/jadwal_detail_checklist') ?>',
                type: 'POST',
                dataType: 'json',
                data: {value:value},
                encode:true,
                success:function (data) {
                    if(!data.success) {
                        alert(data.message);
                    } else {
                        alert(data.message);
                        setTimeout(function () {
                            $(function () {
                                //$('#myModal').modal('toggle');
                                $('#jadwaltables2').DataTable().ajax.reload();
                            });
                            //window.location.reload();
                        }, 400);
                    }
                }
            });
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    </script>