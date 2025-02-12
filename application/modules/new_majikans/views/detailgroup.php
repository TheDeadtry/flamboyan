



                                <div class="form-group">
                                    <label class="control-label col-sm-3">Pilih Agen </label>
                                    <div class="col-sm-9">
                                        <select class="chosen form-control" data-placeholder="Choose a Category" tabindex="1" name="kodeagen" class="">
                                            <?php foreach ($option_agen as $daftar_list): ?>
                                                <option value="<?php echo $daftar_list->id_agen;?>"><?php echo $daftar_list->kode_agen.' :'.$daftar_list->nama;?></option>
                                            <?php endforeach; ?>    
                                        </select>
                                    </div>
                                </div>  