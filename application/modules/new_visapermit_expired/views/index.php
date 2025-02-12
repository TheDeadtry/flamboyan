
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h2>
                    <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> CEK VISAPERMIT EXPIRED</span>
                </h2>
            </div>
        </div>  
    </div>


    <div class="row">

        <div class="col-md-12">

            <div class="row">
<!--
                <div class="col-md-6">

                    <div class="panel">
                        <div class="panel-heading bg-primary">
                            <h4 class="panel-title text-center">Expired Dari Tanggal Input </h4>
                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-md-2">TAHUN</label>
                                        <div class="col-md-10">
                                            <select class="dewselect2_teal" name="tahun">
                                                <?php 
                                                    for ( $i=2010; $i<date('Y')+10; $i++)
                                                    {
                                                ?> 
                                                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                                <?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-md-2">BULAN</label>
                                        <div class="col-md-10">
                                            <select class="dewselect2_teal" name="bulan">

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
                                                    
                                                    foreach ( $bulan_arr as $keyy => $roww )
                                                    {
                                                ?>
                                                        <option value="<?php echo $keyy ?>" ><?php echo $roww ?></option>
                                                <?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="panel-footer">
                            <div class="form-group">
                                <div class="row">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary tombol_show">TAMPILKAN <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>-->
                <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-heading bg-primary">
                            <h4 class="panel-title">
                                <a class="btn btn-lg bg-orange" href="<?php echo site_url('new_visapermit'); ?>">Kembali</a>
                            </h4>
                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-2">TANGGAL ACUAN</label>
                                    <div class="col-md-10">
                                        <input type="text" name="tanggal_sekarang" value="<?php echo date('Y.m.d') ?>" class="form-control dewdate">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <div class="form-group">
                                <div class="row">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary tombol_show">TAMPILKAN <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>

            </div>

            
                        

            <div class="panel" id="hidden_panel">
                <div class="panel-heading bg-primary">
                    <h4 class="panel-title text-center"></h4>
                    <div class="heading-elements">
                    </div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-xxs table-bordered" id="example">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>PMI</td>
                                    <td>Tanggal Expired</td>
                                    <td>No Visapermit</td>
                                    <td>No Suhan</td>
                                    <td>Nama Majikan</td>
                                    <td>Nama Agen</td>
                                    <td>Nama Grup</td>
                                    <td>Expired</td>
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


    <script type="text/javascript">
        $(function() {
            $('select[name=tahun]').val('<?php echo date("Y") ?>').change();
            $('select[name=bulan]').val('<?php echo date("n") ?>').change();
            $('#hidden_panel').hide();


            $('input[name=tanggal_sekarang]').val('<?php echo date('Y.m.d') ?>');
        });

        $('.tombol_show').click(function() {
            $('.tombol_show').attr('disabled','disabled');

            var months = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
               "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];
/*
            var bulan = $('select[name=bulan]').val();
            var bulan2 = months[ (bulan - 1)].toUpperCase();
            var tahun = $('select[name=tahun]').val();
*/
            var tanggal = $('input[name=tanggal_sekarang]').val();

            if ( tanggal != '' )
            {
                //$('#hidden_panel').find('.panel-title').text('TAHUN '+tahun+' BULAN '+bulan2 );

                var table = $('#example').dataTable({
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    ordering: false,
                    sorting: false,
                    scrollX: true,
                    fixedColumns: {
                        leftColumns: 3,
                        rightColumns: 1
                    },
                    "autoWidth": true,
                    ajax: {
                        "url"       : "<?php echo site_url('new_visapermit_expired/show_data') ?>",
                        "type"      : "POST",
                        "data"      : {/*
                            bulan : bulan,
                            tahun : tahun*/
                            tanggal_sekarang : tanggal
                        }
                    },
                    "initComplete": function() {
                        $('.tombol_show').removeAttr('disabled');
                        $('#hidden_panel').show();
                    }
                });
            }
            else
            {
                alert('Tanggal Harus Diisi...');
            }

            
        });
        
    </script>