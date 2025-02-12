    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    <span class="text-semibold">DATA CETAK SPBG TAHUNAN</span>
                </h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-display4 text-primary"></i> <span>PERSONAL BLK</span></a>
                </div>
            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <a type="button" href="<?php echo site_url('databio/') ?>" class="btn btn-primary"><i class="icon-arrow-left16"></i>  BACK</a>
                    <h5 class="panel-title">Filter Data</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <form target="_blank" action="<?php echo site_url('databio/printdataprocesspk');?>" enctype="multipart/form-data" method="post" class="form-horizontal">

                        <div class="form-group">
                            <div style="display:flex; align-items: end;">
                                <div style="flex:1;">
                                    <label for="">Started</label>
                                    <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" placeholder="Tanggal Awal" required>
                                </div>
                                <p style="text-align: center; padding: 0 10px;">S/d</p>
                                <div style="flex:1;">
                                    <label for="">Ended</label>
                                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Akhir" required>
                                </div>
                            </div>
                            <div style="margin-top: 10px;">
                                <label for="">status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="formal">Formal</option>
                                    <option value="informal">Informal</option>\
                                </select>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" id="cetak" class="btn btn-primary">PRINT <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_select2.js"></script>


    <script type="text/javascript">

        _id('cetak').addEventListener('click', function () {
                    var tgl = _val('tgl_awal');
                    var akhir = _val('tgl_akhir');
                    var status = _val('status');
            
                    if (!tgl || !akhir || !status) {
                        alert('Tanggal awal ,akhir, dan status harus diisi!');
                        return false;
                    }
            
                    location.href = "<?php echo site_url('excel/spbg_accurate');?>/"+tgl+"/"+akhir+"/"+status;        });

        $('#pil_status').change(function () {
            if ( $('#pil_status').val() == '21' || $('#pil_status').val() == '22' || $('#pil_status').val() == '23' ) {
                $('#pil_status_on').show();
                $('#masa_berlaku_input').val('').change();
            } else {
                $('#pil_status_on').hide();
                $('#masa_berlaku_input').val('').change();
            } 
        });
    </script>