

    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">

                <div class="row">


                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading bg-primary">
                                <h5 class="panel-title">
                                    PILIH HARI
                                </h5>
                                <div class="heading-elements">

                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <form id="form_add">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Pilih Minggu-Hari-Jam</label>
                                                        <select name="pil_hari" class="dewselect2_n">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a class="btn btn-sm bg-primary" id="print_this_btn"> </a>
                                                        <a class="btn btn-sm bg-teal" id="print_jam_btn"> </a>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="pull-right">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="panel" id="panel_kanan">
                            <div class="panel-heading bg-warning">
                                <h5 class="panel-title">
                                    SETTINGS
                                </h5>
                                <div class="heading-elements">

                                </div>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-8">TAMBAH TKI MANUAL</label>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn bg-warning btn-sm" id="btn_tambah_manual">TAMBAH TKI</button>
                                        </div>
                                    </div>
                                </div>
<!--
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-6">UPDATE TKI/ANGKATAN YG BELUM TERINPUT</label>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn bg-purple btn-sm" id="btn_update_data">UPDATE TKI ANGKATAN</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-6">CHECKLIST KEHADIRAN</label>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn bg-danger btn-sm" id="btn_kehadiran">CHECKLIST KEHADIRAN</button>
                                        </div>
                                    </div>
                                </div>-->

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-8">PRINT SATU PAKET</label>
                                        <div class="col-sm-4">
                                            <a class="btn btn-sm bg-teal" id="print_satu_paket">PRINT SATU PAKET </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-8">PENILAIAN SATU JADWAL PEMBELAJARAN</label>
                                        <div class="col-sm-4">
                                            <a class="btn btn-sm bg-info" id="penilain_full_jadwal_btn">NILAI </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-8">DATA TKI YANG TIDAK HADIR</label>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" onclick="yangTidakHadir()">LIHAT DATA</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12">
                            <div class="panel" id="panel_bawah">
                                <div class="panel-heading bg-teal">
                                    <h5 class="panel-title">
                                        <div class="text-center">DATA JADWAL PEMBELAJARAN</div>
                                        <div class="heading-elements">
                                        </div>
                                    </h5>
                                </div>

                                <div class="panel-body">
                                        <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                            <thead>
                                                <tr>
                                                    <th colspan="10" class="active">
                                                        <div class="pull-left">
                                                            <a type="button" class="btn btn-sm bg-warning" href="<?php echo site_url('blk_jadwal/datapembelajaran') ?>">KEMBALI</a>
                                                        </div>
                                                        <div class="pull-right">

                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NO</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">MINGGU</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">HARI</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">TGL</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">GURU</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">JAM</td>
                                                    <td max-width="100%" colspan="2" style="text-align:center;font-weight: bold;" bgcolor="yellow">MATERI</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">T/P/S</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">BUKU HLM</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                        <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables2">
                                            <thead>
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

            <div id="hapus_modal" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form id="form_hapus">
                            <div class="modal-body" style="color:black;">
                                <input type="hidden" name="id_hapus">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="form_hapus_btn">Hapus di sesi ini</button>
                                <button type="button" class="btn btn-primary" id="form_remove_btn">Hapus di jadwal ini</button>
                            </div>
                        </form>
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
                                            <label class="col-sm-2 control-label">PILIH</label>
                                            <div class="col-sm-10">
                                                <select name="manual_pilih" class="dewselect2_n">
                                                    <option value="1">Sesi ini</option>
                                                    <option value="2">Satu Jadwal</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>

                                <div id="tambah_manual_form1">

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">MINGGU</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="manual_minggu">
                                                </div>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">HARI</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="manual_hari">
                                                </div>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">JAM</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="manual_jam">
                                                </div>
                                            </div>
                                    </div>

                                </div>

                                <div id="tambah_manual_form2">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">JADWAL</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="manual_jadwal">
                                            </div>
                                        </div>
                                    </div>

                                </div>

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

            <div id="penilaian_modal" class="modal fade">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">PENILAIAN</h5>
                        </div>
                        <form id="form_penilaian">
                            <input type="hidden" name="idx">

                            <div class="modal-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-10 pull-right" id="data-tombol-all">

                                        </div>
                                    </div>
                                </div>

                                <table class="table table-xxs table-bordered table-striped table-hover" id="table_penilaian">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="text-align:center" width="10%">No</th>
                                            <th rowspan="2" style="text-align:center" width="65%">Materi</th>
                                            <th colspan="2" style="text-align:center" width="25%">Nilai</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center">T</th>
                                            <th style="text-align:center">P</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="simpan_penilaian">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

             <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">DATA KARYAWAN YANG TIDAK HADIR</h4>
                    </div>
                    <div class="modal-body">
                      <div class="panel panel-primary">
                        <div class="panel-heading" id="menu_print"></div>
                        <div class="panel-body">
                            
                        
                             <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAMA</th>
                                        <th>HARI</th>
                                    </tr>
                                </thead>
                                <tbody id="isiDariTable">        

                                </tbody>
                            </table>

                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
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
                                            <td rowspan="2" style="text-align:center">NO</td>
                                            <td rowspan="2" style="text-align:center">HARI</td>
                                            <td rowspan="2" style="text-align:center">JAM</td>
                                            <td rowspan="2" style="text-align:center">MINGGU</td>
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
            $('#panel_kanan').hide();
            $('#panel_bawah').hide();

            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_get_option1/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                encode      : true,
                success:function (data) {
                    $("select[name=pil_hari]").find('option').remove().end().append(data.option);
                    $("select[name=pil_hari]").val(data.sel1).change();
                }
            });
        });

        $("select[name=pil_hari]").change(function() {
            var pil_hari = $(this).val();
            var pil_hari_text = $(this).find('option:selected').text();
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_read1/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    id : pil_hari
                },
                encode      : true,
                success:function (data) {
                    $("#jadwaltables > tbody").find('tr').remove().end().append(data.a);
                    $("#jadwaltables2 > tbody").find('tr').remove().end().append(data.b);

                    $('#print_this_btn').text("PRINT SESI INI ( "+pil_hari_text+" )");

                    var pil_hari_exp = pil_hari_text.split(' - ');
                    $('#print_jam_btn').text("PRINT PER HARI, SEMUA JAM ( "+pil_hari_exp[0]+" - "+pil_hari_exp[1]+" )");

                    $('#panel_kanan').show();
                    $('#panel_bawah').show();
                }
            });
        });

        $(document).on('click','#print_this_btn',function() {
            var id = $('select[name=pil_hari]').val();
            window.location = "<?php echo site_url('blk_jadwal/printdata1/'.$id) ?>" + "/" + id;
        });

        $(document).on('click','#print_satu_paket',function() {
            var id = $('select[name=pil_hari]').val();
            window.location = "<?php echo site_url('blk_jadwal/print_satu_paket/'.$id) ?>" + "/" + id;
        });

        $(document).on('click','#print_jam_btn',function() {
            var id = $('select[name=pil_hari]').val();
            window.location = "<?php echo site_url('blk_jadwal/printdata4/') ?>";
        });

        $(document).on('click','.delete_btn',function() {
            var id = $(this).data('id');

            $('input[name=id_hapus]').val(id);
            $('#hapus_modal').modal('show');
        });

        $(document).on('click','#form_hapus_btn',function() {
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_delete1/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    id : $('input[name=id_hapus]').val(),
                    val : $("select[name=pil_hari]").val()
                },
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
                        $('#hapus_modal').modal('toggle');
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

        $(document).on('click','#form_remove_btn',function() {
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_delete2/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    id : $('input[name=id_hapus]').val(),
                    val : $("select[name=pil_hari]").val()
                },
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
                        $('#hapus_modal').modal('toggle');
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

        $("select[name=manual_pilih]").change(function() {
            var id          = $(this).val();
            var pil_hari    = $("select[name=pil_hari]").val();
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_manual_add2/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    id : pil_hari,
                    type : id
                },
                encode      : true,
                success:function (data) {
                    if ( id == 1 )
                    {
                        $('#tambah_manual_form1').show();
                        $('#tambah_manual_form2').hide();

                        $('input[name=manual_minggu]').val(data.minggu).attr('disabled', 'disabled');
                        $('input[name=manual_hari]').val(data.hari).attr('disabled', 'disabled');
                        $('input[name=manual_jam]').val(data.jam).attr('disabled', 'disabled');
                        $('input[name=manual_jadwal]').val('').attr('disabled', 'disabled');
                    }
                    else if ( id == 2 )
                    {
                        $('#tambah_manual_form1').hide();
                        $('#tambah_manual_form2').show();

                        $('input[name=manual_minggu]').val('').attr('disabled', 'disabled');
                        $('input[name=manual_hari]').val('').attr('disabled', 'disabled');
                        $('input[name=manual_jam]').val('').attr('disabled', 'disabled');
                        $('input[name=manual_jadwal]').val(data.jadwal).attr('disabled', 'disabled');
                    }
                }
            });
        });

        $(document).on('click', '#tambah_manual', function() {
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_manual_insert/'.$id) ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    typ : $("select[name=manual_pilih").val(),
                    val : $("select[name=pil_hari]").val(),
                    tki : $("select[name=manual_piltki]").val()
                },
                encode      : true,
                success:function (data) {
                    $("#jadwaltables > tbody").find('tr').remove().end().append(data.d.a);
                    $("#jadwaltables2 > tbody").find('tr').remove().end().append(data.d.b);

                    $('#panel_kanan').show();
                    $('#panel_bawah').show();
                    // alert($("select[name=pil_hari]").val());

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

        $(document).on('click', '.penilaian_btn', function() {
            var id = $(this).data('id');
            var pil_hari    = $("select[name=pil_hari]").val();
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_penilaian_add') ?>',
                type        : 'POST',
                dataType    : 'json',
                data        : {
                    id : id,
                    pil_hari : pil_hari
                },
                encode      : true,
                success:function (data) {
                    $('select[name=manual_pilih]').val(1).change();

                    $('input[name=idx]').val(id);

                    $('#data-tombol-all').html(data.tombol);

                    $('#table_penilaian > tbody').find('tr').remove().end().append(data.table);

                    $('#penilaian_modal').modal('show');
                }
            });
        });

        $(document).on('click', '.tombol_allchanger', function() {
            var values = $(this).val();

            $('.penilaian_isian').val(values).change();

        });

        $(document).on('click', '#simpan_penilaian', function() {
            var pil_hari = $('select[name=pil_hari]').val();
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_penilaian_update/'.$id) ?>'+'/'+pil_hari,
                type        : 'POST',
                dataType    : 'json',
                data        : $('#form_penilaian').serialize(),
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
                        $('#penilaian_modal').modal('toggle');
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

        $(document).on('click', '#penilain_full_jadwal_btn', function() {
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_penilaian_full/add/'.$id) ?>',
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
                        $('select[name=idbio_pilihan]').find('option').remove().end().append(data.option);
                        $('select[name=idbio_pilihan]').val(data.idbio).change().stop();;

                        $('#idbio_place').text("ID BIODATA : "+data.idbio);

                        $('#data-tombol-all-for-full').html(data.tombol);

                        $('input[name=idx]').val(data.idx);

                        $('#penilaian_full_jadwal_table > tbody').find('tr').remove().end().append(data.table);

                        $('#penilaian_full_jadwal_modal').modal('show');
                    }
                    //$('input[name=penilain_full_jadwal_id]').val(id);

                    //$('#data-tombol-all').html(data.tombol);

                }
            })
        });



        $(document).on('change', 'select[name=idbio_pilihan]', function() {
            $.ajax({
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_penilaian_full/change/'.$id) ?>',
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
                url         : '<?php echo site_url('blk_jadwal/datapembelajaran_detail_penilaian_full_update/'.$id) ?>',
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


        function yangTidakHadir(){
            var id = $('select[name=pil_hari]').val();
            $.ajax({
                url: '<?php echo site_url('blk_jadwal/tampil_yang_tidak_hadir') ?>',
                method: 'POST',
                dataType: 'text',
                data : {
                    key: 'ok',
                    guava: '<?= $id; ?>',
                    idguava: id
                }, success: function(response){
                    if (response!=null) {
                        $("#menu_print").html('<button class="btn btn-default" onclick="printDataTidakHadir()">Print Data</button>');
                    }else{
                        $("#menu_print").html('<h4>data tidak tersedi</h4>');
                    }
                    $("#isiDariTable").html(response);
                    $("#myModal").modal('show');
                }
            });
        }

        function printDataTidakHadir(){

            var id = $('select[name=pil_hari]').val();
            // alert(id);
            window.location = "<?php echo site_url('blk_jadwal/print_tidak_masuk/'.$id) ?>" + "/" + id;
        }

            $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    </script>
