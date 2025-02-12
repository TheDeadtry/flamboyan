
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/selects/select2.min.js"></script>
    <div class="form-group">
        <label class="control-label col-sm-3">Pilih Majikan </label>
        <div class="col-sm-9">
            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="kodemajikan" id="kodemajikan">
                <?php foreach ($option_majikan as $daftar_list): ?>
                    <option value="<?php echo $daftar_list->id_majikan;?>"><?php echo $daftar_list->nama;?></option>
                <?php endforeach; ?>    
            </select>
        </div>
    </div>  
