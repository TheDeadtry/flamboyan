
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
                            	<form target='_blank' action="<?php echo site_url('blk_finger_new/cetakhasil') ?>" enctype="multipart/form-data" method="post"/>

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
			                            <button type="submit" class="btn btn-primary">Print <i class="icon-arrow-right14 position-right"></i></button>
			                        </div>

			                    </form>
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
	</script>