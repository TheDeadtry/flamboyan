
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    <span class="text-semibold">DATA SCAN PK</span>
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
                    <form target="_blank" action="<?php echo site_url('databio/printdataprocesspk');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                        <div class="form-group">
                            <label class="control-label col-md-2">Pilih TKI</label>
                            <div class="col-md-10">
                                <select class="select-results-color" name="xpilsektor">
                                    <option value="SEMUA">SEMUA</option>
                                    <?php
                                    $group = $this->db->query("SELECT s.`data` kode, s.`group` isi FROM group_sektor s")->result();
                                    $sektor = $this->db->query("SELECT kode_jenis kode, isi FROM datasektor")->result();
                                    ?>
                                    <?php
                                        foreach($group as $group) :
                                    ?>
                                        <option value="<?= $group->kode ?>"><?= $group->isi ?> (<?= $group->kode ?>)</option>
                                    <?php
                                        endforeach;
                                    ?>
                                    <?php
                                        foreach($sektor as $sektor) :
                                    ?>
                                        <option value="<?= $sektor->kode ?>"><?= $sektor->isi ?> (<?= $sektor->kode ?>)</option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2" for="">Data Pilihan</label>
                            <div class="col-md-10">
                                <select class="select-results-color" required name="datapilih">
                                    <option value="">Pilih Data</option>
                                    <option value="FR">Hari Pertama Finger</option>
                                    <option value="SM">Sudah Majikan</option>
                                    <option value="SC">Sudah Scan PK</option>
                                    <option value="TPA">Terima PK Asli</option>
                                    <option value="TT">TGL Terbang</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-md-2">Pilih Majikan</label>
                            <div class="col-md-10">
                                <select class="select-results-color" name="majikan">
                                    <option value="SEMUA">SEMUA</option>
                                    <?php 
                                        foreach ($majikan as $rez) {
                                    ?>
                                    <option value="<?php echo $rez->id ?>"><?php echo $rez->nama.' - '.$rez->taiwan ?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label col-md-2">Periode : </label>
                            <div class="col-md-10">
                                <div style="display:grid;grid-template-columns: auto 50px auto">
                                    <div>
                                        <div class="input-group">
                                            <input required type="text" name="date1" autocomplete="off" class="form-control dewdate2 pointer" placeholder="Select Datepicker">
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                        <span class="help-block">Using <code>input type="date"</code></span>
                                    </div>
                                    <div style="text-align:center; padding-top:8px;">
                                        s/d
                                    </div>
                                    <div>
                                        <div class="input-group">
                                            <input required type="text" name="date2" autocomplete="off" class="form-control dewdate2 pointer" placeholder="Select Datepicker">
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                        <span class="help-block">Using <code>input type="date"</code></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">PRINT <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_select2.js"></script>


    <script type="text/javascript">
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