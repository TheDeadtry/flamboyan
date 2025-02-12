



                                <div class="form-group">
                                    <label class="control-label col-sm-2">Pilih Majikan </label>
                                    <div class="col-sm-10">
                                        <select  name="idmaj" class="form-control">
                                            <?php 
                                                $sel3 = '';
                                                foreach ($tampil_pilihan_maj as $row1) { 
                                                $sel3 = ($row1->id_majikan == $this->session->userdata("xxidmaj"))?'selected="selected"':'';?>
                                            ?>
                                            <option value="<?php echo $row1->id_majikan;?>" <?php echo $sel3; ?> ><?php echo $row1->nama;?></option>
                                            <?php 
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                </div>  