<?php 

class ggTablehtml
{
	// cara panggil = table()
	function table($id, $table, $tujuan)
	{
		$html = '

				<div  id="'.$id.'" class="gg-table">
					<div class="table-scroll">
				        <table class="table table-hover">
				            <thead>
				                <tr>';
		foreach ($table as $key => $tablehead) { 

			$html .='<th class="mdl-data-table__cell--non-numeric">'.$tablehead.'</th>'; 
		
		}		                    

		$html .='		        	</tr>
				            	</thead>
				            	<tbody>
				            </tbody>
				        </table>
			        </div>
			    </div>

		';

		$html .='

			<script>
		        $(document).ready(function () {
		           $(document).GGtable({
		                target: "#'.$id.'",
		                initial: "'.$id.'",
		                url:"'.site_url().'/'.$tujuan.'",
		                method: "POST",
		            });
		        });
		    </script>

		';

		return $html;
	}

	function table_aksi_ubah($idtable = "", $judul = "", $data = ''){
		$html = '
			
			 <div id="modal_default" class="modal fade" tabindex="-1">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        ';

			        if ($data != "") {
						foreach ($data as $key => $value) {
							$html .= $value;
						}
					}
			          
		$html .= '

			    </div>
			  </div>
			</div>

			  <script>
			    
			    $(document).click(function(e) {
			      var target = $(e.target);
			      if (target.is("#'.$idtable.' .ubah")) {
			        $("#modal_default").modal("show");
			      }
			    });


			</script>
		';

		return $html;
	}


	function table_aksi_ubah_2($idtable = "" ,$link_ubah = "", $link_hapus = ''){
			          
		$html = '

			  <script>
			    
			    $(document).click(function(e) {
			      var target = $(e.target);
			      if (target.is("#'.$idtable.' .ubah")) {
			      	var dataid = target.attr("dataid");
			        location.href = "'.site_url().'/'.$link_ubah.'/"+dataid;
			      }
			    });

			    $(document).click(function(e) {
			      var target = $(e.target);
			      if (target.is("#'.$idtable.' .hapus")) {
			      	var dataid = target.attr("dataid");
			        location.href = "'.site_url().'/'.$link_hapus.'/"+dataid;
			      }
			    });

			</script>
		';

		return $html;
	}


}





 ?>