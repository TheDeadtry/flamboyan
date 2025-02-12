

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">PRINT LIST DATA SUHAN & VP PER MAJIKAN </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('new_suhan') ?>">KEMBALI</a>
                        </div>

                        <div class="panel-body">
                            <form action="<?php echo site_url('new_suhan/listdata_print'); ?>" method="POST">
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> Pilih Majikan </label>
                                    <div class="col-sm-9">
                                        <select name="majikan" class="form-control dewselect2" required>
                                            <?php foreach($listmajikan as $val) { ?>
                                                <option value="<?php echo $val->id_majikan ?>"><?php echo $val->nama ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right" style="margin-top:10px">
                                        <button type="submit" class="btn bg-teal-600">PRINT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                            

