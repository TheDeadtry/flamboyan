
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h2>
                    <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> AGEN - CETAK LAPORAN</span>
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
                                <a class="btn btn-xs bg-warning" href="<?php echo site_url('new_agen_promosi'); ?>">KEMBALI</a>
                            </h4>
                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="dewselect2" id="pil_tipe" >
                                            <option value="1">PRINT BERDASARKAN AGEN DAN PENERIMA</option>
                                            <option value="2">PRINT BERDASARKAN BULAN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr/>

                            <div id="opt_tipe1">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-md-2">Pilih Agen</label>
                                        <div class="col-md-10">
                                            <select class="dewselect2" data-placeholder="Pilih Nama Penerima" id="pil_agen" >
                                                <?php 
                                                    foreach($tampil_data_agen as $row)
                                                    {
                                                ?>
                                                       <option value="<?php echo $row->id_agen ?>"><?php echo $row->kode_agen.' - '.$row->nama ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="pilih_bank_stat">
                                    <div class="row">
                                        <label class="control-label col-md-2">Pilih Penerima</label>
                                        <div class="col-md-10">
                                            <select id="pil_bank" class="dewselect2" required="required" data-placeholder="Pilih Bank Penerima" >
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-md-2">Tanggal Mulai</label>
                                        <div class="col-md-10">
                                            <input type="text" id="tgl_m" class="form-control dewdate">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-md-2">Sampai</label>
                                        <div class="col-md-10">
                                            <input type="text" id="tgl_s" class="form-control dewdate">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="opt_tipe2">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-md-2">Pilih Group</label>
                                        <div class="col-md-10">
                                            <select class="dewselect2" data-placeholder="Pilih Nama Penerima" id="opt2_pilpen" >
                                                <?php 
                                                    foreach($tampil_data_group as $row)
                                                    {
                                                ?>
                                                       <option value="<?php echo $row->id_group ?>"><?php echo $row->nama ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="pilih_agen_showing">
                                    <div class="row">
                                        <label class="control-label col-md-2">Pilih Agen</label>
                                        <div class="col-md-10">
                                            <select class="dewselect2" data-placeholder="Pilih Nama Agen (tidak ada group)" id="opt2_pilgen" >

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-md-2">Pilih Tahun</label>
                                        <div class="col-md-10">
                                            <select class="dewselect2" data-placeholder="Pilih Nama Penerima" id="opt2_pilthn" >
                                                <?php 
                                                    $last = date('Y-m-d')+5;
                                                    for($x=2017; $x<=$last; $x++)
                                                    {
                                                ?>
                                                       <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-md-2">Pilih Bulan</label>
                                        <div class="col-md-10">
                                            <select class="dewselect2" data-placeholder="Pilih Nama Penerima" id="opt2_pilbln" >
                                                <?php 
                                                    $bulan_arr = array (
                                                        1 => 'JANUARI',
                                                        2 => 'FEBRUARI',
                                                        3 => 'MARET',
                                                        4 => 'APRIL',
                                                        5 => 'MEI',
                                                        6 => 'JUNI',
                                                        7 => 'JULI',
                                                        8 => 'AGUSTUS',
                                                        9 => 'SEPTEMBER',
                                                        10 => 'OKTOBER',
                                                        11 => 'NOVEMER',
                                                        12 => 'DESEMBER',
                                                    );

                                                    foreach($bulan_arr as $key => $val)
                                                    {
                                                ?>
                                                       <option value="<?php echo $key ?>"><?php echo $val ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="panel-footer">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-xs bg-success-700" id="cetak_btn">CETAK</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                </div>

            </div>

            
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#pil_tipe').val('1').change();
        });

        $('#pil_tipe').change(function() {
            var tipe = $(this).val();

            $('#cetak_btn').removeClass('cetak_btn1');
            $('#cetak_btn').removeClass('cetak_btn2');

            if ( tipe == 1 )
            {
                $('#tgl_m').val('<?php echo date("Y.m") ?>.01');
                $('#tgl_s').val('<?php echo date("Y.m.t") ?>');
                $('#cetak_btn').attr('disabled', 'disabled');
                $('#cetak_btn').addClass('cetak_btn1');

                $('#opt_tipe1').show();
                $('#opt_tipe2').hide();
            }
            else if ( tipe == 2 )
            {
                $('#opt2_pilthn').val(<?php echo date('Y') ?>).change();
                $('#opt2_pilbln').val(<?php echo date('n') ?>).change();
                $('#opt2_pilpen').val("").change();
                $('#cetak_btn').removeAttr('disabled');
                $('#cetak_btn').addClass('cetak_btn2');

                $('#opt_tipe1').hide();
                $('#opt_tipe2').show();
            }
        });

        $(document).on("click", ".cetak_btn1", function() {
            var pil_agen    = $('#pil_agen').val();
            var pil_bank    = $('#pil_bank').val();
            var tgl_m       = $('#tgl_m').val();
            var tgl_s       = $('#tgl_s').val();
            window.location = "<?php echo site_url('new_agen_promosi/printdata1') ?>"+"/"+pil_agen+"/"+pil_bank+"/"+tgl_m+"/"+tgl_s;
        });

        $(document).on("click", ".cetak_btn2", function() {
            var thn       = $('#opt2_pilthn').val();
            var bln       = $('#opt2_pilbln').val();
            var pen       = $('#opt2_pilpen').val();
            var gen       = $('#opt2_pilgen').val();
            window.location = "<?php echo site_url('new_agen_promosi/printdata2') ?>"+"/"+thn+"/"+bln+"/"+pen+"/"+gen;
        });

        $('#pil_agen').change(function() {
            var pilih_bank = $(this).val();
            $.ajax({
                url             : "<?php echo site_url('new_agen_promosi/ambil_bank') ?>",
                type            : "POST",
                dataType        : 'json',
                data            : {
                    bank: pilih_bank
                },
                encode          : true,
                success: function(data) 
                {
                    if (!data.success)
                    {
                        $('#pilih_bank_stat').hide();
                        $('#cetak_btn').attr('disabled', 'disabled');
                        if ( pilih_bank != '' )
                        {
                            alert('DATA BANK AGEN INI BELUM DIISI');
                        }
                    }
                    else
                    {
                        $('#pilih_bank_stat').show();

                        $('#pil_bank')
                        .find('option')
                        .remove()
                        .end()
                        .append(data.message);
                        $('#pil_bank').val("").change();
                        $("#pil_agen").trigger("updatecomplete");
                    }
                }
            });
        });

        $('#pil_bank').change(function() {
            var pilih_bank = $(this).val();
            if ( pilih_bank != null )
            {
                $('#cetak_btn').removeAttr('disabled');
            }
            else
            {
                $('#cetak_btn').attr('disabled', 'disabled');
            }
        });

        $('#opt2_pilpen').change(function() {
            var id = $(this).val();
            if ( id == 1 )
            {
                $.ajax({
                    url             : "<?php echo site_url('new_agen_promosi/ambil_agen') ?>",
                    encode          : true,
                    success: function(data) 
                    {
                        $('#opt2_pilgen')
                        .find('option')
                        .remove()
                        .end()
                        .append(data);
                        $('#opt2_pilgen').val("").change();

                        $('#pilih_agen_showing').show();
                    }
                });
            }
            else
            {
                $('#opt2_pilgen')
                .find('option')
                .remove();
                $('#pilih_agen_showing').hide();
            }
            
        });
    </script>