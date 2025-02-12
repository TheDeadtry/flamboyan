
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    <span class="text-semibold">TEST JOMPO</span>
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
                    <form target="_blank" action="<?php echo site_url('databio/cetaktest');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                        <div class="form-group">
                            <label class="control-label col-md-2">Pilih TKI</label>
                            <div class="col-md-10">
                                <select class="select-results-color" name="sektor">
                                    <option value="SEMUA">SEMUA</option>
                                    <?php
                                    $sektor = $this->db->query("SELECT id_biodata kode, concat(id_biodata,\" - \", nama) isi FROM tki_jompo")->result();
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
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">PRINT FORM TEST TKI <i class="icon-arrow-right14 position-right"></i></button>
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