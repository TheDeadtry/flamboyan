<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>BLK ~ Perijinan + PKL</span>
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
                    <li class='active'>BLK~Perijinan + PKL</li>
                </ul>
            </div>
        </div>
    </div>
</div>  
<ul class="nav nav-tabs">
	<?php
	if(empty($status)) {
		echo "
	<li class='active'><a href='#tambah' data-toggle='tab'>Tambah Perijinan</a></li>
		";
	} else if($status == 2) {
		echo "
	<li class=''><a href='#tambah' data-toggle='tab'>Tambah Perijinan</a></li>
    <li class='active'><a href='#daftar' data-toggle='tab'>Daftar Perijinan $bulan $tahun</a></li>
		";
	}
    ?> 
</ul>
<div class="tab-content">
	<?php 
	if(empty($status)) {
	?>
	<div class="tab-pane active" id="tambah">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> Daftar Personal</h4>
					</div>
					<div class="widget-body">
						<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
							<thead>
								<tr>
									<th>ID Biodata</th>
									<th>Nama Personal</th>
									<th>Jenis Kelamin</th>
									<th>Detail</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($tampil_data_personal as $has1) {
								?>
								<tr class="odd gradeX">
									<td><?php echo $has1->id_biodata; ?></td>
									<td><?php echo $has1->nama; ?></td>
									<td><?php echo $has1->jeniskelamin; ?></td>
									<td><a href="<?php echo site_url('blkijin/detaildata/'.$has1->id_biodata); ?>" class="btn btn-inverse"><i class="icon-info">nfo</a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php } else if($status == '2') { ?>
	
	
	<?php } ?>
</div>
