
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading bg-teal">
		                        <h5 class="panel-title">
		                        	Cetak Fingerspot
		                        </h5>
                                <div class="heading-elements">
                                </div>     
                            </div>
                            <div class="panel-body">	
                            	<!-- <form action="<?php echo site_url('blk_finger_new/cetakhasil') ?>" enctype="multipart/form-data" method="post"/> -->

			                        <div class="form-group">
			                        	<div class="row">
				                            <label class="control-label col-md-2">Pilih Tahun & Bulan</label>
				                            <div class="col-md-5">
				                            	<select name="tahun" class="dewselect2_n">
				                            		<?php 
				                            			for ( $x=2010; $x<date('Y')+3; $x++ )
				                            			{
				                            		?>
				                            				<option value="<?php echo $x ?>"><?php echo $x ?></option>
				                            		<?php
				                            			}
				                            		?>
				                            	</select>
				                            </div>
				                            <div class="col-md-5">
				                            	<select name="bulan" class="dewselect2_n">
				                            		<?php 
														$bulan_array = array(
															'01' => 'Januari',
															'02' => 'Februari',
															'03' => 'Maret',
															'04' => 'April',
															'05' => 'Mei',
															'06' => 'Juni',
															'07' => 'Juli',
															'08' => 'Agustus',
															'09' => 'September',
															'10' => 'Oktober',
															'11' => 'November',
															'12' => 'Desember'
														);
				                            			foreach ( $bulan_array as $key => $val )
				                            			{
				                            		?>
				                            				<option value="<?php echo $key ?>"><?php echo $val ?></option>
				                            		<?php
				                            			}
				                            		?>
				                            	</select>
				                            </div>
				                        </div>
			                        </div>

			                        <div class="text-right">
			                            <button type="button" id="export" class="btn btn-primary">Print <i class="icon-arrow-right14 position-right"></i></button>
			                        </div>

			                    <!-- </form> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(function() {
			$('select[name=sektor]').val('tkw').change();
			$('select[name=bulan]').val('<?php echo date('m') ?>').change();
			$('select[name=tahun]').val('<?php echo date('Y') ?>').change();
		});

		$(function(){

			_id('export').addEventListener('click', function(){
				
				let bulan = $('select[name=bulan]').val();
				let tahun = $('select[name=tahun]').val();
				let thbln = tahun+'-'+bulan;
				let tglawal = tanggal(`${tahun}-${bulan}`).normal2;
				let tglakhir = tanggal(`${tahun}-${bulan}`).normal3;
				let l = cssLoader()
				getDataTable(`
					SELECT DISTINCT (
					idblk
					) AS usernya
					FROM tblattendance
					WHERE DATE( dteDate ) BETWEEN '${tglawal}' AND '${tglakhir}' ORDER BY \`usernya\` ASC
					[;]
					SELECT id_biodata, nama, statusaktif, IF(lower(statusaktif) = 'mengundurkan diri', 'md', '-') md FROM personal 
					WHERE statusaktif IS NOT NULL 
					[;]
					SELECT 
						*
					FROM 
					tblattendance
					WHERE DATE( dteDate ) BETWEEN '${tglawal}' AND '${tglakhir}'
					[;]
					SELECT id_biodata, tglberangkat FROM visa WHERE tglberangkat <> 0 
					[;]
					SELECT nodaftar, tglkeluar, tglkembali FROM blk_izin_pulang WHERE tglkeluar >= '${tglawal}' OR tglkembali >= '${tglawal}'
				`).then(function(a){
					l.remove();
					let [idblk, personal, absensi, visa, IP] = a;

					const wb = XLSX.utils.book_new();
					const ws_data = [
						['ID', 'Nama', 'Total', 'Tanggal']
					];

					let [t,m,d] = tglakhir.split('-')

					let ta = ['', '', ''];
					for (var w = 1; w <= Number(d); w++) {
						ta.push(w);
					}
					ws_data.push(ta);
					idblk.forEach(function(o){
						let [h] = o.usernya.split('-')
						if(h != ''){
							let c = [];
							c.push(o.usernya)
							let [j] = personal.cond(o.usernya, 'id_biodata');
							if(j){
								let {nama} = j
								c.push(nama)
							
								c.push(absensi.cond(o.usernya, 'idblk').length)
								for (var w = 1; w <= Number(d); w++) {
									let s = absensi.cond(o.usernya, 'idblk')
									if(s){
										let [sn] = s.cond(thbln+'-'+(w.pad(2)), 'dteDate');
										if(sn){
											let {tmeTime} = sn
											let d = tmeTime.split(':')
											d.pop()
											c.push(d.join(':'))
										}else{
											let [vis] = visa.cond(o.usernya, 'id_biodata')
											let [person] = personal.cond(o.usernya, 'id_biodata')
											let [ip] = IP.cond(o.usernya, 'nodaftar')
											
											if(vis){
												let {tglberangkat} = vis
												let tgl = tanggal(tglberangkat.replace(/\./gi,'-')).milisecond;
												let tgln = tanggal(thbln+'-'+(w.pad(2))).milisecond;
												if(tgln >= tgl){
													c.push('TR')
												}else{
													c.push('-')
												}
											}else if(person.md === 'md'){
												c.push('MD')
											}else if(ip){
												let keluar = ip.tglkeluar;
												let kembali = ip.tglkembali !='' ? ip.tglkembali : tanggal().normal;
												let tgln = tanggal(thbln+'-'+(w.pad(2))).milisecond;
												keluar = tanggal(keluar).milisecond;
												kembali = tanggal(kembali).milisecond;
												if(tgln >= keluar && tgln <= kembali){
													c.push('IP')
												}else{
													c.push('-')
												}
											}
											else{
												c.push('-')
											}
										}
									}else{
										c.push('-')
									}
								}
								ws_data.push(c);
							}
						}
					})

					const ws = XLSX.utils.aoa_to_sheet(ws_data);

					ws['!merges'] = [
						{ s: { r: 0, c: 0 }, e: { r: 1, c: 0 } } // Merge cells A1 and A2
						,{ s: { r: 0, c: 1 }, e: { r: 1, c: 1 } } // Merge cells A1 and A2
						,{ s: { r: 0, c: 2 }, e: { r: 1, c: 2 } } // Merge cells A1 and A2
						,{ s: { r: 0, c: 3 }, e: { r: 0, c: (2+Number(d)) } } // Merge cells A1 and A2
					];

					ws['!cols'] = [
						{ wch: 10 }, // Width for the 'Name' column
						{ wch: 20  }, // Width for the 'Age' column
						{ wch: 10 }  // Width for the 'Email' column
					];

					for (var w = 1; w <= Number(d); w++) {
						ws['!cols'].push({
							wch: 5
						})
					}
					
					const setAdvancedFontStyleForRange = (startRow, startCol, endRow, endCol, fontSize, fontStyle, textColor, backgroundColor, textAlign, borderStyle) => {
						for (let R = startRow; R <= endRow; ++R) {
							for (let C = startCol; C <= endCol; ++C) {
								const address = XLSX.utils.encode_cell({ c: C, r: R });
								if (!ws[address]) ws[address] = {};
								if (!ws[address].s) ws[address].s = {};
								ws[address].s.font = { sz: fontSize, ...fontStyle, color: { rgb: textColor } };
								if (backgroundColor) ws[address].s.fill = { fgColor: { rgb: backgroundColor } };
								if (borderStyle) ws[address].s.border = borderStyle;
								if (textAlign) ws[address].s.alignment = textAlign;
							}
						}
					};

					setAdvancedFontStyleForRange(
						1, 3, 1, 33, 10, 
						{ bold: true, italic: false }, // Bold, Italic
						'000000', // Red font color
						null, // Yellow background color
						{ horizontal: 'center', vertical: 'center' }, // Centered text alignment
						{} // Black borders
					);

					// setFontStyleForRange(1,3,1, (2+Number(d)), 8,{ bold: true, italic: true, color: 'FF0000' });

					XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

					// Write to a file
					XLSX.writeFile(wb, thbln+'.xlsx');

				})

			},false)

		})

	</script>