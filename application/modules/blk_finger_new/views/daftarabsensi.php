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
                                                <a href="<?= site_url("blk_finger_new") ?>" class="btn btn-xs bg-teal">Kembali</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12" id="app">
                                                
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

<script>
    // getDataTable
    (async function(){
        const app = _id('app');
        let [tki] = await getDataTable(`
            SELECT a.idblk nodaftar, ifnull(c.nama,n.nama) nama FROM tblattendance a 
            LEFT JOIN personal_nama n ON a.idblk = n.id_biodata
            LEFT JOIN idblk c ON a.idblk = c.nodaftar
            GROUP BY a.idblk HAVING nama IS NOT NULL
        `);
        let optionTki = `<option value="">Pilih Tki</option>`+tki.map(function(s){
            return `<option value="${s.nodaftar}">${s.nodaftar} - ${s.nama}</option>`
        }).join("")

        app.appendChild(el('div').height('10px').get());
        let selectTki = el('select').id('select-'+Date.now()).html(optionTki).get()
        
        app.appendChild(selectTki)
        const appdata = el('div').id('appdata').css({
            marginTop: '10px',
            minHeight: '100px',
        }).get();
        app.appendChild(appdata);
        $("#" +selectTki.id).select2();
        $("#"+selectTki.id).change(function(){
            let loader = cssLoader();
            let value = $(this).val();
            (async function(){
                let [absensi] = await getDataTable(`SELECT * FROM tblattendance WHERE idblk = '${value}' ORDER BY dteDate ASC, tmeTime ASC, rec ASC`);
                appdata.innerHTML = '';
                loader.remove();
                console.log("he")
                let htm = `
                        <tr>
                            <th>Tanggal Absensi</th>
                            <th>Waktu</th>
                            <th>Log Dibuat</th>
                            <th>Action</th>
                        </tr>
                `; 
                htm += absensi.map(function(r){
                    return `
                            <tr>
                                <td>${r.dteDate}</td>
                                <td>${r.waktu}</td>
                                <td>${r.rec}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" data-id="${r.idAttendance}" >hapus</button>    
                                </td>
                            </tr>
                        `
                }).join(``)     
                console.log(absensi) 
                if(absensi.length == 0){
                    htm = `
                        <tr>
                            <td colspan="4">Tidak ada data absensi</td>
                        </tr>
                    `
                }  
                let y = el('table').class('table').load(function(e){
                    console.log(e.el)
                    for (let y of Array.from(e.el.querySelectorAll('button'))){
                        y.addEventListener('click', async function(){
                            let id = this.dataset.id;
                            if(id && id != ""){
                                let query = `DELETE FROM tblattendance WHERE idAttendance = '${id}'`;
                                await getDataTable(query);
                                this.parentNode.parentNode.remove()
                            }
                        },false)
                    }
                }).html(htm).get();
                console.log(y)
                appdata.appendChild(y)
            })();
        })

    })()
</script>