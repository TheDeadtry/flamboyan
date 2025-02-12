
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h2>
                    <span class="text-semibold"><i class="icon-star-full2" style="color: #f34541;font-size:25px;"></i> CETAK CICILAN TKI KABUR KE AGEN</span>
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
                                <a class="btn btn-xs bg-warning" href="<?php echo site_url('print_data'); ?>">KEMBALI</a>
                            </h4>
                            <div class="heading-elements">
                            </div>
                        </div>

                        <form action="<?php echo site_url('new_cicilan_tki_kabur_agen/printdata') ?>" method="POST">
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-md-2">Tanggal Kabur / Interminate</label>
                                        <div class="col-md-5">
                                            <input type="text" id="tgl_m" name="tgl_m" class="form-control dewdate">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" id="tgl_s" name="tgl_s" class="form-control dewdate">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-2">Agen</label>
                                        <div class="col-sm-10">
                                            <select class="dewselect2" id="pilihan_agen" name="pilihan" required="required" data-placeholder="Pilihan">
                                                <option value="1">Semua Agen</option>
                                                <option value="2">Per Agen</option>
                                                <option value="3">Per Group</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="form_per_group">
                                    <div class="row">
                                        <label class="control-label col-sm-3 text-right"></label>
                                        <div class="col-sm-9">
                                            <select class="dewselect2" id="pilih_group" name="group" data-placeholder="Pilih Group">

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="form_per_agen">
                                    <div class="row">
                                        <label class="control-label col-sm-3 text-right"></label>
                                        <div class="col-sm-9">
                                            <select class="dewselect2_multi" id="pilih_agen" name="agen[]" data-placeholder="Pilih Agen">

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-2">Pilih Jenis TKI</label>
                                        <div class="col-sm-10">
                                            <select class="dewselect2 dewselect-reset" id="jenis_tki" name="jenis_tki" required="required" data-placeholder="Pilih Jenis TKI">
                                                <option value="FI,MI">A1) INFORMAL 家庭幫傭及監護 (FI + MI)</option>
                                                <option value="FI">A1-1) INFORMAL WANITA 女生家庭幫傭及監護 (FI)</option>
                                                <option value="MI">A1-2) INFORMAL LAKI 男生家庭幫傭及監護 (MI)</option>
                                                <option value="FF,MF">A2) FORMAL INDUSTRI 製造業 (FF + MF)</option>
                                                <option value="FF">A2-1) FORMAL INDUSTRI WANITA 女生製造業 (FF)</option>
                                                <option value="MF">A2-2) FORMAL INDUSTRI LAKI 男生製造業 (MF)</option>
                                                <option value="JP">A3) PANTI JOMPO 養護機構 (JP)</option>
                                                <option value="FI,MI,FF,MF,JP">A4) SEMUA 遠東印尼外勞 (FI + MI + FF + MF + JP)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="panel-footer">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-xs bg-success-700" id="cetak_btn">CETAK</button>
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

    <script type="text/javascript">
        $(function() {
            $('#form_per_group').hide();
            $('#form_per_agen').hide();
            $('#tgl_m').val('<?php echo date("Y.m") ?>.01');
            $('#tgl_s').val('<?php echo date("Y.m.t") ?>');
        });

        $('#pilihan_agen').change(function() {
            var id = $(this).val();
            $('#form_per_group').hide();
            $('#form_per_agen').hide();
            if ( id == 1 )
            {

            }
            else if ( id == 2 )
            {
                $.ajax({
                    url        : "<?php echo site_url('new_cicilan_tki_kabur_agen/index_ambil_agen') ?>",
                    type       : "POST",
                    dataType   : 'json',
                    encode     : true,
                    success: function(data) {
                        $('#pilih_agen')
                        .find('option')
                        .remove()
                        .end()
                        .append(data);
                        $('#pilih_agen').val("").change();
                        $('#pilih_agen').attr('required','required');
                        $('#form_per_group').hide();
                        $('#form_per_agen').show();
                        $("select[name=pilihan]").trigger("updatecomplete");
                    }
                });
            }
            else if ( id == 3 )
            {
                $.ajax({
                    url        : "<?php echo site_url('new_cicilan_tki_kabur_agen/index_ambil_group') ?>",
                    type       : "POST",
                    dataType   : 'json',
                    encode     : true,
                    success: function(data) {
                        $('#pilih_group')
                        .find('option')
                        .remove()
                        .end()
                        .append(data);
                        $('#pilih_group').val("").change();
                        $('#pilih_group').attr('required','required');
                        $('#form_per_group').show();
                        $('#form_per_agen').hide();
                        $("select[name=pilihan]").trigger("updatecomplete");
                    }
                });
            }
        });
    </script>