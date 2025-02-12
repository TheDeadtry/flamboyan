<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal </span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Detail Personal </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-info">

    <button data-dismiss="alert" class="close"> x </button> PASTIKAN Sebelum mengisi data yang lain... ID sudah Benar...
    Sehingga Bisa lanjut ke data senajutnya...
</div>



<div class="row-fluid">

    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
        <div class='box-header blue-background'>
            <div class='title'>Ubah Personal</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content box-no-padding'>

            <form action="<?php echo site_url('detailpersonal/ubahidnya');?>" enctype="multipart/form-data"
                method="post" class="form-horizontal" />
            </br>
            <?php foreach ($tampil_data_personal as $row) { ?>

            <div class="alert alert-info">
                <input type="hidden" readonly name="id_personal" value="<?php echo $row->id_personal; ?>" required
                    class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP"
                    data-original-title="Nama Lengkap" />
                <a>Data Yang Akan di ubah</a>
            </div>
            <div class="control-group">
                <label class="control-label"> NAMA TKI </label>
                <div class="controls">
                    <input type="text" class="span5 popovers" name="namatk" data-trigger="hover" data-content=""
                        data-original-title="Grup" value="<?php echo $row->nama; ?>" disabled />
                </div>
            </div>
            <?php if($row->skill1==""){?>
            <div class="control-group">
                <label class="control-label"> ID PERSONAL </label>
                <div class="controls">
                    <input type="text" class="span5 popovers" name="idper" data-trigger="hover" data-content=""
                        data-original-title="Grup"
                        value="<?php echo ''.$personalid.''.$row->negara1.''.$row->negara2.''.$row->calling.''.$row->skill1.''.$row->skill2.''.$row->skill3; ?>"
                        disabled />
                </div>
            </div>
            <?php }else{?>
            <div class="control-group">
                <label class="control-label"> ID PERSONAL </label>
                <div class="controls">
                    <input type="text" class="span5 popovers" name="idper" data-trigger="hover" data-content=""
                        data-original-title="Grup"
                        value="<?php echo ''.$personalid.''.$row->negara1.''.$row->negara2.''.$row->calling.'-'.$row->skill1.''.$row->skill2.''.$row->skill3; ?>"
                        disabled />
                </div>
            </div>
            <?php }?>


            <div class="alert alert-info">

                <a>UBAH ID PERSONAL </a>
            </div>
            <div class="control-group">
                <label class="control-label">ID BIODATA</label>
                <div class="controls">
                    <input type="text" name="idp" value="<?php echo $personalid; ?>" required class="span7 popovers"
                        data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP"
                        data-original-title="Nama Lengkap" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Negara 1</label>
                <div class="controls">
                    <select class="span7 " name="negara1" data-placeholder="Choose a Category" tabindex="1">
                        <option value="<?php echo $row->negara1?>" />
                        <?php echo $row->negara1?>
                        <option value="" />Select...
                        <?php  foreach ($tampil_data_negara as $pilihan) { ?>
                        <option value="<?php echo $pilihan->kode_negara;?>" />
                        <?php echo $pilihan->kode_negara." - ".$pilihan->isi;?>
                        <?php
                                                                     } ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Negara 2</label>
                <div class="controls">
                    <select class="span7 " name="negara2" data-placeholder="Choose a Category" tabindex="1">
                        <option value="<?php echo $row->negara2?>" />
                        <?php echo $row->negara2?>
                        <option value="" />Select...
                        <?php  foreach ($tampil_data_negara as $pilihan) { ?>
                        <option value="<?php echo $pilihan->kode_negara;?>" />
                        <?php echo $pilihan->kode_negara." - ".$pilihan->isi;?>
                        <?php
                                                                     } ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Calling Visa</label>
                <div class="controls">
                    <select class="span7 " name="namacalling" data-placeholder="Choose a Category" tabindex="1">
                        <option value="<?php echo $row->calling?>" />
                        <?php echo $row->calling?>
                        <option value="" />Select...
                        <?php  foreach ($tampil_data_calling as $pilihan) { ?>
                        <option value="<?php echo $pilihan->kode_calling;?>" />
                        <?php echo $pilihan->kode_calling." - ".$pilihan->isi;?>
                        <?php
                                                                     } ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Skill 1</label>
                <div class="controls">
                    <select class="span7 " name="namaskill" data-placeholder="Choose a Category" tabindex="1">
                        <option value="<?php echo $row->skill1?>" />
                        <?php echo $row->skill1?>
                        <option value="" />Select...
                        <?php  foreach ($tampil_data_skillnya as $pilihan) { ?>
                        <option value="<?php echo $pilihan->kode_skillnya;?>" />
                        <?php echo $pilihan->kode_skillnya." - ".$pilihan->isi;?>
                        <?php
                                                                     } ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Skill 2</label>
                <div class="controls">
                    <select class="span7 " name="namaskill2" data-placeholder="Choose a Category" tabindex="1">
                        <option value="<?php echo $row->skill2?>" />
                        <?php echo $row->skill2?>
                        <option value="" />Select...
                        <?php  foreach ($tampil_data_skillnya as $pilihan) { ?>
                        <option value="<?php echo $pilihan->kode_skillnya;?>" />
                        <?php echo $pilihan->kode_skillnya." - ".$pilihan->isi;?>
                        <?php
                                                                     } ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Skill 3</label>
                <div class="controls">
                    <select class="span7 " name="namaskill3" data-placeholder="Choose a Category" tabindex="1">
                        <option value="<?php echo $row->skill3?>" />
                        <?php echo $row->skill3?>
                        <option value="" />Select...
                        <?php  foreach ($tampil_data_skillnya as $pilihan) { ?>
                        <option value="<?php echo $pilihan->kode_skillnya;?>" />
                        <?php echo $pilihan->kode_skillnya." - ".$pilihan->isi;?>
                        <?php
                                                                     } ?>
                    </select>
                </div>
            </div>

        </div>

        <?php 
                                        } ?>


        <div class="form-actions">
            <button type="submit" class="btn blue" onclick="return savechecked();"><i class="icon-ok"></i> Save</button>
            <a type="button" class="btn" href="<?php echo base_url()." index.php/detailpersonal"?>"><i
                    class=" icon-remove"></i> Kembali </a>

        </div>

        </form>

    </div>
</div>