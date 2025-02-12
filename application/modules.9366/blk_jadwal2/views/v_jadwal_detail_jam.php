    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_select2.js"></script>

    <div class="form-group" id="select_harijam2">
        <div class="row">
            <div class="col-sm-12">
                <label>Pilih Jam</label>
                <select name="pil_jam" class="select-search">
                    <?php 
                        foreach($option_jam as $baris) {
                    ?>
                            <option value="<?php echo $baris->kode_jam; ?>" ><?php echo $baris->kode_jam.' - '.$baris->jam; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>