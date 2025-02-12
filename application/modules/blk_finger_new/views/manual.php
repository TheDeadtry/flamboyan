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
										<h5 class="panel-title">MANUAL DATA ATTENDANCE TKI</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Tanggal Absen</label>
                                                    <input type="text" class="form-control" id="datepicker" />
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12" id="manual">

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

<script>




$(document).ready(function () {
    // Initialize the datepicker
    $('#datepicker').datepicker({
        format: 'dd/mm/yyyy',  // Set the date format
        autoclose: true,      // Close the datepicker after date selection
        todayHighlight: true  // Highlight the current date
    }).on('changeDate', function(e) {
        // Get the selected date
        const selectedDate = e.format('yyyy-mm-dd');
        let [d,m,y] = _id('datepicker').value.split('/')
        let tgl = `${y}-${m}-${d}`
        let g = cssLoader()
        getDataTable(`SELECT id_biodata, nama, statusaktif, tanggaldaftar FROM personal WHERE statusaktif IS NOT NULL 
        AND statusaktif <> 'sudah terbang' AND lower(statusaktif) <> 'mengundurkan diri' ORDER BY tanggaldaftar DESC
        [;] SELECT * FROM tblattendance WHERE dteDate = '${tgl}'
        `)
        .then(function(o){
            g.remove();
            let [data, saved] = o;
            _id('manual').innerHTML = '';
            _id('manual').appendChild(
                el('div').css({
                    display: 'grid',
                    gridTemplateColumns: 'auto auto auto',
                    padding: '10px',
                    marginTop: '10px',
                    border: '1px solid #ddd',
                }).html(`
                    ${data.map(function(q, i){
                        let cv = saved.cond(q.id_biodata, 'idblk');
                        vals = ''
                        if(cv.length > 0){
                            let [{tmeTime}] = cv;
                            vals = tmeTime;
                        }
                        return `
                            <div style="border-bottom: 1px solid #ddd;">${q.id_biodata}</div>
                            <div style="border-bottom: 1px solid #ddd;">${q.nama}</div>
                            <div style="border-bottom: 1px solid #ddd; display:grid; grid-template-columns: auto 80px;">
                                <input id="ps${i}" data-id="${q.id_biodata}" data-nama="${q.nama}" class="absen" type="time" class="form-control" value="${vals}" />
                                <button data-ps="${i}" class="bt btn btn-primary">auto</button>
                            </div>
                        `;
                    })
                    .join('')}
                `)
                .load(function(e){
                        let es = e.el;
                        for(let ab of es.querySelectorAll('.absen')){
                            ab.addEventListener('change', function(){
                                savedata(this);
                            },false)
                        }
                        for(let ab of es.querySelectorAll('.bt')){
                            ab.addEventListener('click', function(){
                                let y = _id('ps'+this.dataset.ps);
                                let [z, jam] = timestamp().split(' ')
                                y.value = jam;
                                savedata(y);
                            },false)
                        }
                    })
                .get()
            )

        })



    });
    let [y,m,d] = tanggal().normal.split('-');
    $('#datepicker').datepicker('setDate',  `${d}/${m}/${y}`);
});

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

function getPartOfDay(time) {
    // Pisahkan waktu menjadi jam, menit, dan detik
    const [hours, minutes, seconds] = time.split(':').map(Number);

    // Validasi format jam
    if (hours < 0 || hours > 23 || minutes < 0 || minutes > 59 || seconds < 0 || seconds > 59) {
        throw new Error('Format waktu tidak valid');
    }

    // Tentukan periode waktu
    if (hours >= 0 && hours < 12) {
        return 'Pagi';
    } else if (hours >= 12 && hours < 15) {
        return 'Siang';
    } else if (hours >= 15 && hours < 18) {
        return 'Sore';
    } else {
        return 'Malam';
    }
}

function savedata(a){
    let {id, nama} = a.dataset;
    let jam = a.value
    let [d,m,y] = _id('datepicker').value.split('/')
    let tgl = `${y}-${m}-${d}`

    let datasend = [
        {
            idblk : id,
            dteDate : tgl,
            tmeTime: jam,
            waktu:  getPartOfDay(jam).toLowerCase(),
            rec: timestamp(),
        }
    ];

    let q1 = datasend.ToInsert('tblattendance', ['idblk', 'dteDate']);
    let q2 = datasend.ToUpdate('tblattendance', ['idblk', 'dteDate']);

    getDataTable(q1+'[;]'+q2).then(function(a){
        toastr.info(`data uploaded`);
    });


}
</script>

