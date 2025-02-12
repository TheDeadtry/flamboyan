
    <div class="form-group">
        <label class="control-label col-sm-3">Pilih No Suhan </label>
        <div class="col-sm-9">
            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="nosuhan" id="nosuhan">
                <?php foreach ($option_suhan as $daftar_list): ?>
                    <option value="<?php echo $daftar_list->id_suhan;?>"><?php echo $daftar_list->no_suhan;?></option>
                <?php endforeach; ?>    
            </select>
        </div>
    </div>
  