
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/notifications/bootbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/media/fancybox.min.js"></script>

                                    
                                    

    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">

                <div class="row">

                    <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading bg-teal">
                                    <h5 class="panel-title">
                                        <div class="text-center">DATA TKW YANG IKUT JADWAL INI (SESUAI ANGKATAN)</div>
                                        <div class="heading-elements">
                                            
                                        </div>
                                    </h5>
                                </div>

                                <div class="panel-body">

                                        <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables2">
                                            <thead>
                                                <tr class="active">
                                                    <td colspan="5">
                                                        <a class="btn btn-xs bg-success" href="<?php echo site_url('blk_jadwal2/jadwal') ?>">KEMBALI</a>
                                                        <button class="btn btn-xs bg-primary" data-toggle="modal" data-target="#modal_form_horizontal34">TAMBAH</button>
                                                        <div id="modal_form_horizontal34" class="modal fade" style="color:#000;">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h5 class="modal-title">TAMBAH TKW MANUAL</h5>
                                                                    </div>
                                                                    <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_gps_add/'.$v_id); ?>" class="form-horizontal" method="post">

                                                                        <div class="modal-body">

                                                                            <div class="form-group">
                                                                                <div class="col-sm-12">
                                                                                    <div class="row">
                                                                                        <label class="control-label">PILIH TKW</label>
                                                                                        <div class="col-sm-12">
                                                                                            <select class="tyy" name="dt_tkw[]" required="required" multiple="multiple">
                                                                                                <?php 
                                                                                                    foreach ($tampil_data_tkw as $vtki) {
                                                                                                        if (substr($vtki->id, 2, 0) == 'FI') {
                                                                                                            $tki_nama = $vtki->nama_tw;
                                                                                                        } else {
                                                                                                            $tki_nama = $vtki->nama_hk;
                                                                                                        }
                                                                                                ?>
                                                                                                    <option value="<?php echo $vtki->id ?>"><?php echo $vtki->id.' - '.$tki_nama; ?></option>
                                                                                                <?php 
                                                                                                    }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                                            <button type="submit" class="btn btn-danger">OK</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NO</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ID TKW</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NAMA TKW</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ANGKATAN (MINGGU)</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">KEHADIRAN</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ACTION</td>
                                                    <!--<td style="text-align:center">Non-aktif</td>-->
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                    $no_u = 1;
                                                    foreach ($tampil_data_gps as $pkt) {

                                                        $sektor = substr($pkt->biodata_id, 2, 0);
                                                        if ($sektor == 'FI' || $sektor == 'FF' || $sektor == 'MF' || $sektor == 'MI' || $sektor == 'JP') {
                                                            $ambil_tw = $this->M_session->select_row("SELECT nama FROM personal where id_biodata='$pkt->biodata_id'");
                                                            $biodata_nama    = $ambil_tw->nama;
                                                        } else {
                                                            $ambil_hk = $this->M_session->select_row("SELECT nama FROM personalblk where nodaftar='$pkt->biodata_id'");
                                                            $biodata_nama    = $ambil_hk->nama;
                                                        }
                                                        if ($pkt->angkatan != NULL) {
                                                            $angkt = 'M'.$pkt->angkatan;
                                                        } else {
                                                            $angkt = 'Manual';
                                                        }

                                                        if ($pkt->tdk_hadir == NULL) {
                                                            $hdr    = '<label class="label label-info">HADIR</label>';
                                                            $disbld = '<a class="btn btn-xxs bg-teal btn_penilaian" data-bio_id="'.$pkt->biodata_id.'" data-jadwal_data_id="'.$pkt->id_jadwal_data_tki.'" data-nama="'.$biodata_nama.'">PENILAIAN</a>';
                                                        } else {
                                                            $hdr    = '<label class="label label-danger">TIDAK HADIR</label>';
                                                            $disbld = '<a class="btn btn-xxs bg-teal" disabled="disabled">PENILAIAN</a>';
                                                        }
                                                ?>

                                                        <tr>
                                                            <td style="text-align:center"><?php echo $no_u; ?></td>
                                                            <td style="text-align:center"><?php echo $pkt->biodata_id; ?></td>
                                                            <td style="text-align:center"><?php echo $biodata_nama; ?></td>
                                                            <td style="text-align:center"><?php echo $angkt; ?></td>
                                                            <td style="text-align:center">
                                                                <?php echo $hdr; ?>
                                                            </td>
                                                            <td style="text-align:center">
                                                                <a class="btn btn-xxs bg-danger" data-toggle="modal" data-target="#delete69_<?php echo $no_u ?>">DELETE</a>
                                                                <div id="delete69_<?php echo $no_u ?>" class="modal fade">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-primary">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h5 class="modal-title">HAPUS <?php echo ' ('.$pkt->biodata_id.') '.$biodata_nama ?></h5>
                                                                            </div>
                                                                            <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_delete_gps/'.$v_id) ?>" method="POST">
                                                                                <input type="hidden" name="id" value="<?php echo $pkt->id_jadwal_data_tki ?>"/>

                                                                                <div class="modal-body">
                                                                                    <p>
                                                                                        Apakah anda yakin akan menghapus data ini
                                                                                        <code class="danger"><?php echo $pkt->id_jadwal_data_tki ?></code>
                                                                                        ?
                                                                                    </p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" class="btn btn-primary">OK</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <?php echo $disbld; ?>

                                                            </td>
                                                        </tr> 

                                                <?php
                                                    $no_u++;
                                                    }
                                                ?> 

                                            </tbody>
                                        </table>

                                </div>

                            </div>
                            
                    </div>

                </div>

            </div>

        </div>


        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2017. <a href="">PT FLAMBOYAN GEMAJASA</a> by <a href="" target="_blank">DKRH</a>
        </div>
        <!-- /footer -->

    </div>


                <div id="penilaian69" class="modal fade" data-backdrop="false">
                    <div class="modal-dialog modal-full">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"> </h5>
                            </div>
                            <form id="form_setting" method="POST">

                                <input type="hidden" name="jadwal_data_tki_id" id="jadwal_data_tki_id"/>
                                <input type="hidden" name="bio_id69" id="bio_id69"/>
                                <input type="hidden" name="id_jadwal_data" id="id_jadwal_data" value="<?php echo $v_id; ?>" />

                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row" style="color:#000;">
                                            <label class="col-lg-3">Pilih Hari : </label>
                                            <div class="col-lg-9">
                                                <select class="form-control" id="select_penilaian_hari" name="select_penilaian_hari">
                                                    <?php 
                                                        foreach ( $tampil_data_hari as $roo ) {
                                                    ?>
                                                            <option value="<?php echo $roo->kode_hari ?>"><?php echo $roo->hari; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h5>Hari Sekarang : </h5>
                                            </div>
                                            <div class="col-lg-3">
                                                <h5 class="title_hari"></h5>
                                                <div id="setAreInputed"></div>
                                            </div>
                                            <div class="col-lg-3">
                                                <h5>Ganti Semua Nilai : </h5>
                                            </div>
                                            <div class="col-lg-3">
                                                <button class="btn_change" type="button" value="BS8" class="btn bg-info">BS8</button>
                                                <button class="btn_change" type="button" value="B7" class="btn bg-info">B7</button>
                                                <button class="btn_change" type="button" value="C6" class="btn bg-info">C6</button>
                                                <button class="btn_change" type="button" value="K5" class="btn bg-info">K5</button>
                                                <button class="btn_change" type="button" value="KS4" class="btn bg-info">KS4</button>
                                                <button class="btn_change" type="button" value="NULL" class="btn bg-info">NULL</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-xxs table-bordered table-striped table-hover" id="dkrh">
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
                                    <button type="button" class="btn btn-block btn-primary btn_ok">SIMPAN NILAI HARI </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    <!-- /page container -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".txx").select2({
                maximumSelectionLength: 2
            });
            $(".tyy").select2();
        });

        function select_harijam() {
            var hari = $('#select_harijam2').val();
            $.ajax({
                url: '<?php echo site_url('blk_jadwal2/jam_show/<?php echo $v_id ?>') ?>',
                type: 'POST',
                dataType: 'json',
                data: 'id='+hari,
                encode:true,
                success:function (data) {

                }
            })
        }
        $("#select_harijam1").change(function(){
            var kode = {kode:$("#select_harijam1").val()};
            document.getElementById("load").style.display = "block";  // show the loading message.
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('blk_jadwal2/select_jamlist/'.$v_id)?>",
                data: kode,
                success: function(msg) {
                    $('#select_harijam2').html(msg);
                    document.getElementById("load").style.display = "none";
                }
            });
        });

        $('#jadwaltables2').DataTable({
            "searchable": false,
            bFilter: false,
            "info": false,
            "paging":   false,
            "lengthChange": false
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

        $('.btn_penilaian').click(function() {
            var bio_id          = $(this).data('bio_id');
            var nama            = $(this).data('nama');
            //var jadwal_data_id  = $(this).data('jadwal_data_id');
            $('#penilaian69').find('.modal-title').text("PENILAIAN  ("+bio_id+") "+nama);
            $('#penilaian69').modal('toggle');
                
            $('#bio_id69').val(bio_id);
            //$('#jadwal_data_tki_id').val(jadwal_data_id);
            $('#select_penilaian_hari').val('H1').change();
        });

        $("#select_penilaian_hari").change(function() {
            var value   = $(this).val();
            var value2  = $('#bio_id69').val();
            var value3  = $('#id_jadwal_data').val();
            $.ajax({

                url: '<?php echo site_url('blk_jadwal2/grahaps_ganti_nilai') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    hari            : value,
                    bio_id          : value2,
                    id_jadwal_data  : value3
                },
                encode:true,
                success:function (data) {
                    $('#setAreInputed').text(data.message5);

                    $('#jadwal_data_tki_id').val(data.message4);

                    $('#dkrh > tbody')
                    .find('tr')
                    .remove()
                    .end()
                    .append(data.message);

                    if(!data.success) {
                        $('.btn_ok').hide();
                    } else {
                        $('.btn_ok').show();
                        $('.btn_ok').text(data.message2);
                        $('.title_hari').text(data.message3);
                    }

                }

            })
        });

        $('.btn_ok').click(function() {

            var hari = $('#select_penilaian_hari').val();

            $.ajax({

                url             : '<?php echo site_url('blk_jadwal2/grahaps_input_nilai') ?>',
                type            : 'POST',
                dataType        : 'json',
                encode          : true,
                data            : $('#form_setting').serialize(),
                encode:true,
                success:function (data) {

                    $('#select_penilaian_hari').val(hari).change();

                    if ( !data.success ) {
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
                        });
                    }

                }

            })
        });

        $('.btn_change').click(function() {
            var value   = $(this).val();

            $('#nilai1_selected').removeAttr('selected');
            $('#nilai2_selected').removeAttr('selected');
            $('#form_setting').find('.j_nilai').val(value);
            $('#form_setting').find('.j_nilai2').val(value);
        });

    </script>