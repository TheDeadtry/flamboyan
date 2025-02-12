<script>
	const getNewId = function(aw){
		let [ID, num] = aw.split('-');
		return new Promise((resolve, reject)=>{
			let n = `
				SELECT generate_id_biodata('${ID}') AS id_biodata
			`;
			let m = cssLoader();
			AuditDevQuery(datalogin, n, function(res){
				m.remove();
				resolve(res)
			})
		})
	}
</script>
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
				<?php if ($hasil == 1) { ?>
					<div class="alert alert-info">
						<button data-dismiss="alert" class="close"> x </button>Data Berhasil di Duplikasi
					</div>
				<?php } ?>
                <div class="col-lg-3">
                    <div class="panel">
                        <div class="panel-heading bg-blue-800">
                            <h5 class="panel-title"><b><i> Set ID Biodata </i></b></h5>
                        </div>
                        <div class="panel-body">
							<div class="form-group">
								<div class="row">
									<label class="control-label col-lg-12">ID Biodata</label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="set1">
									</div>
								</div>
							</div><!--
							<div class="form-group">
								<div class="row">
									<label class="control-label col-lg-12">Negara</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" name="set2">
									</div>
									<div class="col-lg-6">
										<input type="text" class="form-control" name="set3">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="control-label col-lg-12">Calling Visa</label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="set4">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="control-label col-lg-12">Skill</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" name="set5">
									</div>
									<div class="col-lg-4">
										<input type="text" class="form-control" name="set6">
									</div>
									<div class="col-lg-4">
										<input type="text" class="form-control" name="set7">
									</div>
								</div>
							</div>-->
							<hr/>
							<div class="form-group">
								<div class="row">
									<label class="control-label col-lg-12">Jenis Job</label>
									<div class="col-lg-12">
										<select class="form-control" name="opt1" data-placeholder="Pilih Jenis Job" required="required">
											<option value="">Pilih Jenis Job</option>
											<option value="TEST-0001" data-jk="男 Laki-Laki">test</option>
											<?php 
												foreach( $tampil_data1 as $row ) {
											?>
													<option value="<?php echo $row->kode_jenis.'-'.$row->no_urut ?>" data-jk="<?php echo $row->jeniskelamin ?>"><?php echo $row->isi ?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
							</div><!--
							<div class="form-group">
								<div class="row">
									<label class="control-label col-lg-12">Negara Pernah Kerja</label>
									<div class="col-lg-12">
										<select class="form-control" name="opt2" data-placeholder="Pilih Negara 1">
											<option value="">Pilih Negara 1</option>
											<?php 
												foreach( $tampil_data2 as $row ) {
											?>
												<option value="<?php echo $row->kode_negara ?>"><?php echo $row->isi ?></option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-lg-12">
										<select class="form-control" name="opt3" data-placeholder="Pilih Negara 2">
											<option value="">Pilih Negara 2</option>
											<?php 
												foreach( $tampil_data2 as $row ) {
											?>
													<option value="<?php echo $row->kode_negara ?>"><?php echo $row->isi ?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="control-label col-lg-12">Calling Visa</label>
									<div class="col-lg-12">
										<select class="form-control" name="opt4" data-placeholder="Pilih Calling Visa">
											<option value="">Pilih Calling Visa</option>
											<?php 
												foreach( $tampil_data3 as $row ) {
											?>
													<option value="<?php echo $row->kode_calling ?>"><?php echo $row->isi ?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="control-label col-lg-12">Skill</label>
									<div class="col-lg-12">
										<select class="form-control" name="opt5" data-placeholder="Pilih Skill 1">
											<option value="">Pilih Skill 1</option>
											<?php 
												foreach( $tampil_data4 as $row ) {
											?>
													<option value="<?php echo $row->kode_skillnya ?>"><?php echo $row->isi ?></option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-lg-12">
										<select class="form-control" name="opt6" data-placeholder="Pilih Skill 2">
											<option value="">Pilih Skill 2</option>
											<?php 
												foreach( $tampil_data4 as $row ) {
											?>
												<option value="<?php echo $row->kode_skillnya ?>"><?php echo $row->isi ?></option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-lg-12">
										<select class="form-control" name="opt7" data-placeholder="Pilih Skill 3">
											<option value="">Pilih Skill 3</option>
											<?php 
												foreach( $tampil_data4 as $row ) {
											?>
												<option value="<?php echo $row->kode_skillnya ?>"><?php echo $row->isi ?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
							</div>-->


                        </div>
                    </div>
				</div>
                <div class="col-lg-9">
                    <div class="panel">
                        <div class="panel-heading bg-green-800">
                            <h5 class="panel-title"><b><i> Tambah Biodata </i></b></h5>
                        </div>
                        <div class="panel-body">
							
							<form action="<?php echo site_url('tambahbio/duplikasiSimpan');?>" method="post" />
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<label class="control-label">ID BIODATA</label>
									</div>
									<div class="col-lg-12">
										<input type="text" name="id_biodata" required readonly class="form-control" style="padding: 0px" />
									</div>
								</div>
							</div><!--
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<label class="control-label">KET BIODATA</label>
									</div>
									<div class="col-lg-2">
										<input type="text" name="ket1" required readonly class="form-control" style="padding: 0px" />
									</div>
									<div class="col-lg-2">
										<input type="text" name="ket2" required readonly class="form-control" style="padding: 0px" />
									</div>
									<div class="col-lg-2">
										<input type="text" name="ket3" required readonly class="form-control" style="padding: 0px" />
									</div>
									<div class="col-lg-2">
										<input type="text" name="ket4" required readonly class="form-control" style="padding: 0px" />
									</div>
									<div class="col-lg-2">
										<input type="text" name="ket5" required readonly class="form-control" style="padding: 0px" />
									</div>
									<div class="col-lg-2">
										<input type="text" name="ket6" required readonly class="form-control" style="padding: 0px" />
									</div>
								</div>
							</div>-->
							<div class="form-group">
								<div class="row">
									<label class="control-label col-lg-12">Pilih ID yang akan di duplikat ke ID Baru</label>
									<div class="col-lg-12">
										<select class="dewselect2" name="optIdLama" data-placeholder="Pilih ID Lama" required="required">
											<?php 
												foreach( $tampil_data_tki as $row ) {
											?>
													<option value="<?php echo $row->id_biodata ?>"><?php echo $row->id_biodata.' - '.$row->nama ?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
							</div>
							<button type="button" class="btn btn-warning btnReset">Reset</button>
							<button type="submit" class="btn btn-success">Simpan</button>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).on('change','[name="opt1"]', function() {
		let id = $(this).val();
		getNewId(id).then(function(o){
			console.log(o);
			let [data] = o
			let [{id_biodata}] = data;
			console.log(id);
			console.log(id_biodata);
			$('[name="set1"]').val(id_biodata);
			$('[name="id_biodata"]').val(id_biodata);
		});
	});
	$(document).on('change','[name="opt2"]', function() {
		let id = $(this).val();
		$('[name="set2"]').val(id);
		$('[name="ket1"]').val(id);
	});
	$(document).on('change','[name="opt3"]', function() {
		let id = $(this).val();
		$('[name="set3"]').val(id);
		$('[name="ket2"]').val(id);
	});
	$(document).on('change','[name="opt4"]', function() {
		let id = $(this).val();
		$('[name="set4"]').val(id);
		$('[name="ket3"]').val(id);
	});
	$(document).on('change','[name="opt5"]', function() {
		let id = $(this).val();
		$('[name="set5"]').val(id);
		$('[name="ket4"]').val(id);
	});
	$(document).on('change','[name="opt6"]', function() {
		let id = $(this).val();
		$('[name="set6"]').val(id);
		$('[name="ket5"]').val(id);
	});
	$(document).on('change','[name="opt7"]', function() {
		let id = $(this).val();
		$('[name="set7"]').val(id);
		$('[name="ket6"]').val(id);
	});
	$(document).on('click','.btnReset', function() {
		console.log("tes");
		$('[name="set1"]').val("");
		$('[name="id_biodata"]').val("");
		$('[name="set2"]').val("");
		$('[name="ket1"]').val("");
		$('[name="set3"]').val("");
		$('[name="ket2"]').val("");
		$('[name="set4"]').val("");
		$('[name="ket3"]').val("");
		$('[name="set5"]').val("");
		$('[name="ket4"]').val("");
		$('[name="set6"]').val("");
		$('[name="ket5"]').val("");
		$('[name="set7"]').val("");
		$('[name="ket6"]').val("");
		$('[name="optIdLama"]').val("").change();
	});


</script>