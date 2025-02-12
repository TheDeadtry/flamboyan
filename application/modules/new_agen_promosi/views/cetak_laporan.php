
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
                                    <label class="control-label col-md-2">Pilih Nama Penerima</label>
                                    <div class="col-md-10">
                                        <select class="dewselect2" data-placeholder="Pilih Nama Penerima" id="pil_penerima" >
                                            <?php 
                                                foreach($tampil_data_penerima as $row)
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
        
        $(document).on("click", "#cetak_btn", function() {
            var pil_penerima    = $('#pil_penerima').val();
            var tgl_m           = $('#tgl_m').val();
            var tgl_s           = $('#tgl_s').val();

            window.location = "<?php echo site_url('new_agen_promosi/printdata3') ?>"+"/"+pil_penerima+"/"+tgl_m+"/"+tgl_s;
        });
        
    </script>