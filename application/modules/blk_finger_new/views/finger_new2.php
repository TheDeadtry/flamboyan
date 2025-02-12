<script src="
https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js
"></script>
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-lg-12">

                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                
								<div class="panel">
									<div class="panel-heading bg-teal">
										<h5 class="panel-title">UPLOAD DATA ATTENDANCE TKI</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">

													<div class="row">
														<div class="col-lg-12">
															<button class="btn btn-xs bg-teal uploadform_btn">Upload</button>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-12">
															<div class="table-responsive">
					                                            <table class="table table-bordered table-striped" id="dkrh">
					                                            	<thead>
					                                            		<tr>
					                                            			<td>No</td>
						                                            		<td>Timestamp</td>
						                                            		<td>Excel Original</td>
						                                            		<td># </td>
						                                            		<td> </td>
						                                            		<td> </td>
					                                            		</tr>
					                                            	</thead>
					                                            	<tbody>
					                                            		
					                                            	</tbody>
					                                            </table>
															</div>
														</div>
													</div>

									</div>

								</div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

	<div class="modal fade" id="upload_modal" tabindex="-2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="upload_form" method="post" action="<?php echo site_url('blk_finger_new/show_after_upload') ?>" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">UPLOAD</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="file" id="uploadfile" class="form-control" name="userfile" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary upload_btn2">Upload</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
            <div class="modal-content" id="data-show" style="height: 350px;overflow-y:scroll;">
                <table classs="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Personal</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Waktu</th>
                            <th>Rec</th>
                        </tr>
                    </thead>
                    <tbody id="dataabsen">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title"></h4>
        </div>
        <div id="modalBody" class="modal-body"> </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

<noscript id="sektorkode"><?= json_encode($this->db->query("SELECT * from blk_sektor_kode")->result()); ?></noscript>

<script>

    (async function(){

        const sektor =  {
            '1' : 'FF-',
            '2' : 'FI-',
            '3' : 'JP-',
            '4' : 'MF-',
            '5' : 'MI-',
            '6' : 'HK-',
            '7' : 'S-',
            '8' : 'TS-',
            '9' : 'MH-',
            '10' : 'FH-',
            '11' : 'MC-'
        }

        let sektorKode = JSON.parse(_id("sektorkode").innerHTML);

        sektorKode.forEach(function(s, i){
            if(!sektor[s.kode]){
                sektor[s.kode] = s.sektor+'-';
            }
        });

        const dataPegawai = await fetch('/flamboyan/blk_finger_new/pegawai');
        const pegawai = await dataPegawai.json();
        console.log(pegawai);  


        function getTimeOfDay(time) {
            // Memecah input waktu menjadi bagian-bagian jam, menit, dan detik
            const [hours, minutes, seconds] = time.split(':').map(Number);
    
            if (hours >= 1 && hours < 12) {
                return "pagi";
            } else if (hours >= 12 && hours < 18) {
                return "siang";
            } else {
                return "sore";
            }
        }
    
    
        let uploadfile = document.getElementById("uploadfile");
        
        uploadfile.addEventListener('change', function(){
            const file = event.target.files[0]; // Get the first file from the input
    
            if (file) {
                const reader = new FileReader();
    
                reader.onload = function(e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, { type: 'array' });
                    
                    // Assuming you want to read the first sheet
                    const firstSheetName = workbook.SheetNames[3];
                    const worksheet = workbook.Sheets[firstSheetName];
                    
                    // Convert the sheet to JSON
                    const json = XLSX.utils.sheet_to_json(worksheet);
                    
                    const {__EMPTY} = json.shift();
                    const title = json.shift();
                    const [m1,k1,m2,k2] = Object.keys( json.shift() );
                    
                    let timeStamp = timestamp();
                    let jsonSend = json.map(function(d){
                        let n = {}
                        n['kode'] = Number(d["Salah Scan"]).pad(4);
                        n['dteDate'] = d["__EMPTY_2"].replace(/\//gi,"-");
                        n['tmeTime'] = (d[m1]?d[m1]:d[m2])+':00';
                        n['waktu'] = getTimeOfDay((d[m1]?d[m1]:d[m2])+':00');
                        n['rec'] = timeStamp;
                        return n;
                    }).filter(function(o){
                        if(o.kode.length > 4){
                            return o;
                        }
                    });

                    _id('dataabsen').innerHTML = jsonSend.map(function(m){
                        return '<tr style="border-bottom:1px solid #ddd;">'+Object.keys(m).map(function(s){
                            return `<td>${m[s]}</td>`
                        }).join('')+'</tr>';
                    }).join("")
                    
    
                    console.log(jsonSend);
                    // Display the JSON data
                };
    
                reader.onerror = function(e) {
                    console.error("File could not be read! Code " + e.target.error.code);
                };
    
                reader.readAsArrayBuffer(file); // Read the file as an array buffer
            }
        },false);
    })();

    

	$(function() {
		$('#dkrh').dataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax:{
                "url"       : "<?php echo site_url('blk_finger_new/show_index') ?>",
                "type"      : "POST"
            }
        });

        $('.uploadform_btn').click(function() {
            $('#upload_modal').modal('show');
        });

		$('#upload_form').find('.upload_btn').click(function(e) {

            e.preventDefault();
            //alert($("input[name=upload_input]").val());
            var file_data = $("input[name=upload_input]").prop("files")[0];

            var form_data = new FormData();                  
            form_data.append('file', file_data );    

            $.ajax({
                url             : "<?php echo site_url('blk_finger_new/show_after_upload/') ?>",
                type            : "POST",
                
                cache           : false,
                contentType     : false,
                processData     : false,
                data            : form_data,
                success: function(data) 
                {
                    if (!data.success) 
                    {
                        swal({
                            title: "Oops...",
                            text: (data.message)+" !",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } 
                    else 
                    {
                        $('#upload_modal').modal('hide');
                        $('#dkrh').DataTable().ajax.reload();
                        swal({
                            title: "Sukses ditambah!",
                            text: (data.message),
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                    }
                }
            });
        });

	});
	
</script>

