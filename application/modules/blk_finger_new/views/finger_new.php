<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="
https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
															<button class="btn btn-xs bg-teal" id="manual-up">Manual Upload</button>
															<a href="<?= site_url("blk_finger_new/daftarabsensi") ?>" class="btn btn-xs bg-teal">Data Absensi</a>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-12">
															<div class="table-responsive" id="mytable">
					                                            
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
            <form id="upload_form" method="post" enctype="multipart/form-data">
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

<div class="modal fade" id="manual" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="upload_form" method="post" enctype="multipart/form-data">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">UPLOAD</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="file" data-type="manual" id="uploadfile2" class="form-control" name="userfile" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </form>
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

let DataInsert = null;

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

_id('manual-up').addEventListener('click', function(){
    $("#manual").modal('show')
},false)

Array.prototype.ToInsert = function (table = 'test', wht = '') {
    var s = this;
    if(s.length > 0){
        var y = Object.keys(s[0]);
        var x = '';
        x += 'INSERT INTO '; 
        x += table; 
        x += '('; 
        x += y.map(function(u){
            return ` \`${u}\` `
        }).join(','); 
        x += ')'; 
        x += '\n'; 
        x += 'SELECT '; 
        x += y.map(function(g){
            return `a.${g}`;
        }); 
        x += ' FROM (';
        x += s.map(function(w){
            var f = ` SELECT `;
            f += y.map(function(q){
                if (w[q] != null){
                    return `"${w[q].toString().replace(/\"/g,"\\\"")}" \`${q}\``;
                }else{
                    return `"-" \`${q}\``;
                }
            }).join(",");
            return f;
        }).join("\n UNION ALL \n")
        x += ') a';
        if (Array.isArray(wht)){
            x += ` LEFT JOIN ${table} ON `
            x += wht.map(function(whtx){
                return ` ${table}.${whtx} = a.${whtx} `;
            }).join(" AND ");
            x += ` WHERE `;
            x += wht.map(function(whtx){
                return ` ${table}.${whtx} IS NULL `;
            }).join(" AND ");
        }
        return x;
    } else {
        return [];
    }
};

Array.prototype.ToUpdate = function (table = 'test', wht = 'kode') {
    var s = this;
    if (s.length > 0) {
        var y = Object.keys(s[0]);
        var x = '';
        x += 'UPDATE ';
        x += table;
        x += ' aa , ( ';
        x += 'SELECT ';
        x += y.map(function (g) {
            return `a.${g}`;
        });
        x += ' FROM (';
        x += s.map(function (w) {
            var f = ` SELECT `;
            f += y.map(function (q) {
                return `"${w[q].toString().replace(/\"/g, "\\\"")}" \`${q}\``;
            }).join(",");
            return f;
        }).join("\n UNION ALL \n")
        x += ') a ) bb SET ';
        x += y.map(function(c){
            return ` aa.${c} = bb.${c}`
        }).join(',');
        x += ' WHERE ';
        if (Array.isArray(wht)){
            x += wht.map(function(whtx){
                return ` aa.${whtx} = bb.${whtx} `;
            }).join(" AND ");
        }else{
            x += ` aa.${wht} = bb.${wht} `;
        }
        return x;
    } else {
        return [];
    }
};

Array.prototype.ToSelect = function (table = 'test', wht = '') {
    var s = this;
    if(s.length > 0){
        var y = Object.keys(s[0]);
        var x = ''; 
        x += 'SELECT '; 
        x += y.map(function(g){
            return `a.${g}`;
        }); 
        x += ' FROM (';
        x += s.map(function(w){
            var f = ` SELECT `;
            f += y.map(function(q){
                if (w[q] != null){
                    return `"${w[q].toString().replace(/\"/g,"\\\"")}" \`${q}\``;
                }else{
                    return `"-" \`${q}\``;
                }
            }).join(",");
            return f;
        }).join("\n UNION ALL \n")
        x += ') a';
        if (Array.isArray(wht)){
            x += ` LEFT JOIN ${table} ON `
            x += wht.map(function(whtx){
                return ` ${table}.${whtx} = a.${whtx} `;
            }).join(" AND ");
            x += ` WHERE `;
            x += wht.map(function(whtx){
                return ` ${table}.${whtx} IS NULL `;
            }).join(" AND ");
        }
        return x;
    } else {
        return [];
    }
};

Array.prototype.bagiArray = function(size) {
    // Pastikan ukuran adalah angka positif yang lebih besar dari 0
    if (typeof size !== 'number' || size <= 0) {
        throw new Error('Parameter harus berupa angka positif yang lebih besar dari 0.');
    }

    const result = [];
    for (let i = 0; i < this.length; i += size) {
        // Slice array dari i hingga i+size
        result.push(this.slice(i, i + size));
    }
    return result;
};

function excelTimeToDate(excelTime) {
    // Excel epoch is January 1st, 1900 (Excel incorrectly thinks 1900 is a leap year)
    var excelEpoch = new Date(1900, 0, 1);

    // Calculate the number of milliseconds since the Excel epoch
    var millisecondsSinceEpoch = excelEpoch.getTime() + (excelTime - 1) * 24 * 60 * 60 * 1000;

    // Create a new Date object using the calculated milliseconds
    var date = new Date(millisecondsSinceEpoch);

    // Extract the year, month, and day from the Date object
    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2); // Adding 1 because getMonth() returns zero-based index
    var day = ('0' + date.getDate()).slice(-2);

    // Return the date in YYYY-MM-DD format
    return year + '-' + month + '-' + day;
}

function excelTimeToTime(excelTime) {
    // Calculate hours, minutes, seconds from Excel time
    var totalSeconds = excelTime * 24 * 60 * 60; // Total seconds since midnight
    var hours = Math.floor(totalSeconds / 3600);
    var minutes = Math.floor((totalSeconds % 3600) / 60);
    var seconds = Math.floor(totalSeconds % 60);

    // Format hours, minutes, seconds with leading zeros if necessary
    var formattedTime = ('0' + hours).slice(-2) + ':' +
                        ('0' + minutes).slice(-2) + ':' +
                        ('0' + seconds).slice(-2);

    return formattedTime;
}

document.getElementById('upload_form').addEventListener('submit', function(event){
    event.preventDefault();
    if(DataInsert && Array.isArray(DataInsert)){
        let [{dteDate, rec}] = DataInsert;
        let load = cssLoader();
        let nmt = dteDate.split('-');
        nmt.pop();
        let bagian = DataInsert.bagiArray(100);
        let hitung = 0;
        (function startNow(a,b,c){
            if(c<b){
                $.ajax({
                    url: '<?php echo site_url('blk_finger_new/simpanabsen') ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: { 
                        data : a[c]
                        , tgl:nmt.join('-')
                        , rec:rec
                        , n:(b-1)
                        , m: c },
                    success: function(res){
                        hitung += a[c].length;
                        toastr.info(`${hitung} data uploaded`);
                        startNow(a,b,c+1)
                    }
                })
                .then(function(o){
                    console.log(o)
                })
            }else{
                DataInsert = null;
                load.remove()
                _id('dataabsen').innerHTML="";
                $("#upload_modal").modal('toggle');
                window.loadDataBaru()
            }
        })(bagian, bagian.length, 0);
        
    }
},false);

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
            '11' : 'MC-',
            '12' : 'IM-'
        }

        let sektorKode = JSON.parse(_id("sektorkode").innerHTML);

        sektorKode.forEach(function(s, i){
            if(!sektor[s.kode]){
                sektor[s.kode] = s.sektor+'-';
            }
        });

        console.log(sektor);

        const dataPegawai = await fetch('/flamboyan/blk_finger_new/pegawai');
        const pegawai = await dataPegawai.json();


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
        let uploadfile2 = document.getElementById("uploadfile2");
        
        uploadfile2.addEventListener('change', function(){
            const file = event.target.files[0]; // Get the first file from the input
            const dataset = this.dataset.type;
            const nd = this;
            if (file) {
                const reader = new FileReader();
    
                reader.onload = function(e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, { type: 'array' });
                    
                    // Assuming you want to read the first sheet
                    console.log(workbook.SheetNames)
                    const firstSheetName = workbook.SheetNames.length > 1? workbook.SheetNames[1] : workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[firstSheetName];
                    
                    // Convert the sheet to JSON
                    let rec = timestamp();
                    const json = XLSX.utils.sheet_to_json(worksheet).map(function(o){
                        o.dteDate = excelTimeToDate(o.dteDate);
                        o.tmeTime = typeof o.tmeTime === 'string' ? o.tmeTime : excelTimeToTime(o.tmeTime);
                        o.rec = rec;
                        return o;
                    })
                    $("#manual").modal('toggle');
                    nd.value = '';
                    let bagi = json.bagiArray(100);
                    let h = cssLoader();
                    console.log(bagi);
                    let hitung = 0;
                    (function runUp(a,b,c){
                        if(c<b){
                            let h = a[c].ToInsert('tblattendance', ['idblk', 'dteDate']);
                            getDataTable(h).then(function(res){
                                console.log(res)
                                hitung += a[c].length;
                                toastr.info(`${hitung} data uploaded`);
                                runUp(a,b,c+1);
                            })
                        }else{
                                h.remove()
                        }
                    })(bagi, bagi.length, 0);

                };
    
                reader.onerror = function(e) {
                    console.error("File could not be read! Code " + e.target.error.code);
                };
    
                reader.readAsArrayBuffer(file); // Read the file as an array buffer
            }
        },false);
        
        uploadfile.addEventListener('change', function(){
            const file = event.target.files[0]; // Get the first file from the input
            const dataset = this.dataset.type
            if (file) {
                const reader = new FileReader();
    
                reader.onload = function(e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, { type: 'array' });
                    
                    // Assuming you want to read the first sheet
                    const firstSheetName = workbook.SheetNames[2];
                    const worksheet = workbook.Sheets[firstSheetName];
                    
                    // Convert the sheet to JSON
                    const json = XLSX.utils.sheet_to_json(worksheet, {
                        header: 1,             // Use the first row as headers
                        raw: true,            // Parse cell values (e.g., dates)
                    });

                    const dataJson = [["data table"]].concat(json);
                    let [e1,e2,tgl] = dataJson[3];
                    tgl = tgl.split(' ~ ').shift().split('/'); 
                    tgl.pop();
                    tgl = tgl.join('-')
                    
                    const jsonBaru = [].concat(dataJson).filter((x,i)=>i>4);

                    const dataAbsensi = {
                        biodata : [],
                        absensi : [],
                    };

                    const rec = timestamp();

                    jsonBaru.forEach(function(x,i){
                        if(i%2 === 0){
                            let [n,e1,kode] = x;
                            if(kode){
                                let pin = kode.substring((kode.length-4),(kode.length));
                                let front = kode.slice(0, -4);
                                if(sektor[front]){
                                    dataAbsensi.biodata.push(sektor[front]+pin)
                                }else{
                                    dataAbsensi.biodata.push(null)
                                }
                            }else{
                                dataAbsensi.biodata.push(null)
                            }
                        }else{
                            let loc = dataAbsensi.biodata.length - 1;
                            let nm = dataAbsensi.biodata[loc];
                            let peta = Object.keys(x);
                            peta.forEach(function(s){
                                let day = tgl+'-'+(Number(s)+1).pad(2);
                                let time = x[s].split("\n").shift()+':00';
                                let waktu = getTimeOfDay(time);
                                if(nm){
                                    let dd = {
                                        idblk: nm,
                                        dteDate : day,
                                        tmeTime : time,
                                        waktu : waktu,
                                        rec : rec
                                    }
                                    dataAbsensi.absensi.push(dd)
                                }
                            })
                        }
                    });

                   

                    _id('dataabsen').innerHTML = dataAbsensi.absensi.map(function(m){
                        return '<tr style="border-bottom:1px solid #ddd;">'+Object.keys(m).map(function(s){
                            return `<td>${m[s]}</td>`
                        }).join('')+'</tr>';
                    }).join("")
    
                    DataInsert = dataAbsensi.absensi;
                    console.log(DataInsert)
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
        
        let myTable = _id('mytable');
        
        (function loadDataBaru(){
            window.loadDataBaru = loadDataBaru;
            fetch('<?php echo site_url('blk_finger_new/show_index') ?>')
            .then(function(o){
                return o.json();
            })
            .then(function(data){
                myTable.innerHTML = '';
                myTable.appendChild(el('div')
                .css('max-width','650px')
                .css('border','1px solid #ddd')
                .css('margin-top','10px')
                .css('padding','10px')
                .css('background','#ddd')
                .child(
                    div()
                    .css('border','1px solid #ddd')
                    .css('background','white')
                    .html(`
                            <div style="padding:5px;border-bottom: 1px solid #ddd; display: grid; grid-template-columns: 30px 100px auto 180px 20px;">
                                <div>No</div>
                                <div>Id</div>
                                <div>Tanggal</div>
                                <div>Waktu record</div>
                                <div></div>
                            </div>
                            <div style="max-height:200px; overflow-y:scroll;overflow-x:hidden;">
                                ${data.map(function(d, u){
                                return `<div style="padding:5px;border-bottom: 1px solid #ddd;display: grid; grid-template-columns: 30px 100px auto 180px 20px;">
                                    <div>${u+1}</div>
                                    <div>${d.id}</div>
                                    <div>${d.timestamp}</div>
                                    <div>${(d.resource_file.split('.')).shift()}</div>
                                    <div></div>
                                </div>`
                                }).join('')}
                            </div>
                    `).load(function(e){
                    })
                )
                .child(
                    el('div')
                    .css('padding','5px')
                    .css('background','white')
                    .html(`Total data : ${data.length}`)
                )
                .get());
            });
        })();
        
		// $('#upload_form').find('.upload_btn').click(function(e) {

        //     e.preventDefault();
        //     //alert($("input[name=upload_input]").val());
        //     var file_data = $("input[name=upload_input]").prop("files")[0];

        //     var form_data = new FormData();                  
        //     form_data.append('file', file_data );    
        //     alert('in maintenance')
        //     // $.ajax({
        //     //     url             : "<?php echo site_url('blk_finger_new/show_after_upload/') ?>",
        //     //     type            : "POST",
                
        //     //     cache           : false,
        //     //     contentType     : false,
        //     //     processData     : false,
        //     //     data            : form_data,
        //     //     success: function(data) 
        //     //     {
        //     //         if (!data.success) 
        //     //         {
        //     //             swal({
        //     //                 title: "Oops...",
        //     //                 text: (data.message)+" !",
        //     //                 confirmButtonColor: "#EF5350",
        //     //                 type: "error"
        //     //             });
        //     //         } 
        //     //         else 
        //     //         {
        //     //             $('#upload_modal').modal('hide');
        //     //             $('#dkrh').DataTable().ajax.reload();
        //     //             swal({
        //     //                 title: "Sukses ditambah!",
        //     //                 text: (data.message),
        //     //                 confirmButtonColor: "#66BB6A",
        //     //                 type: "success"
        //     //             });
        //     //         }
        //     //     }
        //     // });
        // });

	});
	
</script>

