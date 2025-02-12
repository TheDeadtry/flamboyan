
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    
                    <span class="text-semibold">PERSONAL BLK</span>
                </h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-display4 text-primary"></i> <span>PERSONAL BLK</span></a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">

        <div class="col-md-1">
        </div>

        <div class="col-md-10">
    <!-- /page header -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">PRINT LAPORAN BULANAN PESERTA UJK</h3>
                    <h5 class="panel-title">Filter Data</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                	<table class="table table-bordered ">
                		
                	<?php 
                		foreach ($finger as $result) {
                	?>
                			<tr>
                				<td><?php echo $result->id_finger ?></td>
                				<td><?php echo $result->jari ?></td>
                				<td><?php echo $result->timenya ?></td>
                				<td><?php echo $result->idblk ?></td>
                				<td><?php echo base64_encode( $result->data ); ?></td>
                			</tr>
                			
                	<?php
                		}
                    	
                    ?>
                	</table>
                </div>
            </div>
        </div>
    </div>
