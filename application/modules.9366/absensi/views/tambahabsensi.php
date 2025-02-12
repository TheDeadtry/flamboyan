<div class="row-fluid">
    <div class="span12">
        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
            </span>
        </div>
        <h3 class="page-title">Atur <small>Absensi</small></h3>
        <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
            <li><a href="#">Absensi</a><span class="divider">&nbsp;</span></li>
            <li><a>Tanggal : <?php echo $tanggal; ?></a><span class="divider-last">&nbsp;</span></li>
        </ul>
    </div>
</div>  
<div class="row-fluid">
	<div class="span12">
		<div class="widget">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Form Absensi</h4>
                <span class="tools">
                	<a href="javascript:;" class="icon-chevron-down"></a>
                	<a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <?php echo form_open('absensi/tambahabsensi/'.$personal->id_biodata, array('class'=>'form-horizontal')); ?>
                <input type="hidden" name="id_biodata" value="<?php echo $personal->id_biodata; ?>">
                <div class="control-group">
                    <label class="control-label">Nama</label>
                    <div class="controls">
                        <input type="text" readonly class="input-medium" name="nama" value="<?php echo $personal->nama; ?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Jenis</label>
                    <div class="controls">
                        <select class="form-control" name="jenis">
                        	<option value="Masuk">Masuk</option>
                        	<option value="Sakit">Sakit</option>
                        	<option value="Ijin">Ijin</option>
                        	<option value="Tidak Masuk">Tidak Masuk</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Keterangan</label>
                    <div class="controls">
                        <textarea class="form-control" name="keterangan"></textarea>
                    </div>
                </div>
                <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>">
                <div class="form-actions">
                	<button type="submit" name="submit">OK</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
	</div>
</div>