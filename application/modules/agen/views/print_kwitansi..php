<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <h1 class="pull-left">
                <i class="icon-star"></i>
                <span id="title-page">Print KWITANSI</span>
            </h1>
            <div class="pull-right">
                <ul class="breadcrumb">
                    <li>
                        <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/dashboard"><i class="icon-bar-chart"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-angle-right"></i>
                    </li>
                    <li id="title-page2" class="active">Print Nota TKI </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="/flamboyan/xlsx.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.css" />
    <!-- SweetAlert JS (version 1.x) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.js"></script>
<script>
    window.updateTitle = function(text){
        document.getElementById("title-page").innerHTML = text;
        document.getElementById("title-page2").innerHTML = text;
    }
</script>

<div class="row-fluid">
    <div class="card">
        <div class="card-body" id="app">
            
        </div>
    </div>
</div>
<div id="addTKI" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding:5px 10px;">
                    <h5 class="modal-title">Tambah TKI</h5>
                    <button type="button" onclick="_id('addTKI').style.display='none'" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"  style="padding:5px 10px;">
                    <form id="formTKI">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <p><i>Kelas Tki</i></p>
                            <input type="text" readonly class="form-control" name="kelas" id="kelastkiform">
                        </div>
                        <div class="form-group">
                            <label for="">Pilih TKI</label>
                            <p><i>Tki di muat hanya setelah dilakukan upload finger, dan di muat sesuai dengan gender</i></p>
                            <select multiple name="id_biodata" style="width:100%" class="form-control" id="biodata">
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="SimpanTKI">Save changes</button>
                    <button type="button" onclick="_id('addTKI').style.display='none'" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.exportExcel = function(data) {
            // Create a new workbook and add a worksheet
            const workbook = XLSX.utils.book_new();
            const worksheetData = [];


            for(let cData of data.data){
                let arr = [];
                for(let p of cData){
                    arr.push(p.name);
                }
                worksheetData.push(arr);
            }

            // Add worksheet with data
            const worksheet = XLSX.utils.aoa_to_sheet(worksheetData);

            // Set column widths
            worksheet['!cols'] = [];

            for(let y in data.style){
                let yy = data.style[y];
                worksheet['!cols'].push({
                    wch: yy.width
                });
            }

            let metaData = {}


            // Define a border style
            const borderStyle = {
                top: { style: "thin" },
                bottom: { style: "thin" },
                left: { style: "thin" },
                right: { style: "thin" }
            };

            // Function to apply styles to a range of cells
            function applyStyle(range) {
                for (let R = range.s.r; R <= range.e.r; ++R) {
                    for (let C = range.s.c; C <= range.e.c; ++C) {
                        const cellAddress = XLSX.utils.encode_cell({ r: R, c: C });
                        if (!worksheet[cellAddress]) continue;
                        worksheet[cellAddress].s = {
                            border: borderStyle,
                            font: R === 0 ? { bold: true } : {}, // Bold for header
                        };
                    }
                }
            }

            // Apply styles for the entire range
            applyStyle({ s: { r: (data && data.border && data.border.start ? data.border.start : 0), c: 0 }, e: { r: (data && data.border && data.border.start ? data.border.start : 0) + data.data.length, c: (data && data.border && data.border.end ? data.border.end : 3) } });

            // Add the worksheet to the workbook
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Daftar Absensi');

            // Export the file
            XLSX.writeFile(workbook, 'Absensi_with_Borders.xlsx');
        }
        const Delete = function(func, ...arg){
            swal({
                title: "Apa kamu yakin?",
                text: "Kamu akan menghapus data tersebut?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Tidak, batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    // Perform the delete operation
                    let ff = typeof func === 'function'?func : null;
                    if(ff){
                        ff(...arg);
                        swal("Success", "Data di hapus!", "info");
                    }
                } else {
                    swal("Cancelled", "Dibatalkan", "info");
                }
            });
        };
        (async function(){

            let datalogin = 'eyJpZCI6IjE4IiwiZm90byI6IiIsIm5hbWEiOiJ2ZHMiLCJsZXZlbCI6IjEiLCJ1c2VybmFtZSI6ImFkbWluIiwicGFzc3dvcmQiOiJlNjY5OTc1ZGFkYzc2OTEyNGZiMjI1ZTJiNmQ1NGVlMDUzMGYyMWYyIiwicGFzc3dvcmR2aWV3IjoiZmVlZCQxMjMkIiwiY3JlYXRlZF9hdCI6IjIwMjItMDgtMjMgMDc6NDc6MDkiLCJ1cGRhdGVkX2F0IjpudWxsLCJkZWxldGVfc2V0IjoiMCIsIm93bmVyIjoiMCJ9';
            let tableResult = null;
            let paginationBatas = [1,1];
            let totalElement = null;
            let formKelas = _id('kelastkiform');
            let formBiodata = _id('biodata');
            let simpanTki = _id('SimpanTKI');
            let selectBiodata = $('#biodata').select2();
            let formTKIDData = {}
            let paginationActive;

            const addTki = $('#addTKI');
            addTki.css('display', 'none')

            
            const dataGet = function(query){
                return new Promise((resolve, reject) => {
                    try{
                        AuditDevQuery(datalogin, query, function(data){
                            resolve(data);
                        })
                    }catch(e){
                        reject(e);
                    }
                })
            }

            const filterValue = {
                kelas : '',
                tgl : tanggal().normal
            }
            let [kelasTki] = await dataGet(`SELECT kode value, CONCAT(kelas, ' ', nomor) text, gender FROM kelastki`);
            let [daftarTKI] = await dataGet(`SELECT
                id_biodata value,
                concat(id_biodata,' - ',nama) text 
            FROM
                personal_nama 
            WHERE
                statusaktif LIKE 'proses' 
                OR lower( statusaktif ) = 'sudah ada id'`);

            const DataFilter = function(e){
                let r = e.el;
                let btn = el('input');
                btn.css({
                    border: '1px solid #ddd'
                });
                btn.keyup(delay(function(){
                    filterValue['nama'] = this.value;
                    dataLoad();
                },1000))
                r.appendChild(el('span').text('Pencarian : ').get())
                r.appendChild(btn.get())
            }

            const loaded = function(e){
                let dx = e.el;
                let update = Array.from(dx.querySelectorAll('.edit'))
                let action = Array.from(dx.querySelectorAll('.hapus'))
                for(let ac of action){
                    ac.addEventListener('click', function(){
                        let ac = this.dataset.id;
                        console.log(this.dataset)
                        Delete(async function(ac){
                            let id = ac
                            let y = cssLoader();
                            await dataGet(`call delete_psikolog('${pr}')`);
                            y.remove();
                            dataLoad(paginationActive)
                        }, ac)
                    },false)
                }
                for(let ax of update){
                    ax.addEventListener('click', function(){
                        (async function(ac){
                            let pr = ac.dataset.id;
                            location.href = `<?= site_url('agen/cetaknota/') ?>/`+pr
                        })(this);
                    },false)
                }
            }

            const dataLoad = async function(num = 0, len = 50) {
                paginationActive = num;
                if (tableResult) {
                    let fill = (function(){
                        let d = '';
                        if(filterValue.nama && filterValue.nama != ''){
                            d += ` AND lower(id_biodata) LIKE lower('%${filterValue.nama}%') `
                        }
                        return d;
                    })();
                    let ld = cssLoader();
                    let [total] = await dataGet(`SELECT count(*) total FROM kwitansi WHERE 1=1 ${fill} `);
                    let [dataRead] = await dataGet(`SELECT * FROM kwitansi WHERE 1=1 ${fill}  ORDER BY id DESC limit ${num},${len}`);
                    ld.remove();
                    let data = [];
                    // header
                    data.push({
                        option: 'Option'
                        , id_biodata: 'Pin Hou'
                        , tgl: 'Tanggal'
                        , jumlah: 'Jumlah'
                    })

                    for(let dx of dataRead){
                        data.push({
                            option: `
                                <button class="btn btn-success edit" data-id="${dx.id}">Cetak Nota</button>
                                <button class="btn btn-danger hapus" data-id="${dx.id}">Hapus</button>
                            `
                            , id_biodata: dx.id_biodata
                            , tgl: dx.tgl
                            , jumlah: dx.jumlah
                        })
                    }

                    let table = tableResult;
                    table.innerHTML = '';
                    let co = 0;
                    for (let d of data) {
                        let tr = el('tr')
                        tr.css(co !== 0 ? {
                            padding: '10px',
                            whiteSpace: 'nowrap',
                            borderBottom: '1px solid #ddd'
                        } : {
                            padding: '10px',
                            borderBottom: '1px solid #ddd',
                            position: 'sticky',
                            whiteSpace: 'nowrap',
                            top: '0',
                            boxShadow: '0 0 10px #ddd',
                            background: '#fff',
                            zIndex: 1
                        })
                        for (let k in d) {
                            let td = el('td')
                            td.html(d[k])
                            tr.child(td)
                        }
                        tr.load(loaded)
                        table.appendChild(tr.get());
                        co++;
                    }

                    if(totalElement){
                        let a = Math.ceil((num / len) + 1);
                        let b = Math.ceil(total[0].total / len);
                        totalElement.html(`Page : ${a} / ${b}`);
                        paginationBatas = [a,b]; 
                    }
                    return total;
                }else{
                    return null
                }
            }

            //--> simpan tki
            simpanTki.addEventListener('click', async function(){
                let tki = selectBiodata.val()
                let simpanData = tki ? tki.map(function(s){
                    let [data] = formTKIDData.datatki.cond(s,'idblk');
                    return {
                        tanggal: formTKIDData.tgl,
                        kelas: formTKIDData.kelas,
                        id_biodata: s,
                        gender: data.jk == 'Wanita' ? 'P' : 'L',
                        nama: data.nama,
                        finger: data.absensi,
                        manual: 'v'
                    }
                }) : [];

                if(simpanData.length > 0){
                    let ldr = cssLoader();
                    await dataGet(simpanData.ToInsert('absensi_manual', ['tanggal', 'kelas', 'id_biodata', 'manual']));
                    dataLoad(0) 
                    ldr.remove();
                    addTki.css('display', 'none')               
                }else{
                    alert("Inputkan TKI terlebih dahulu")
                }
            })



            

            const createForm = function (ar) {
                // css
                let formCss = {
                    padding:'10px'
                }
                // view
                let _container = el('div').css(formCss)

                let dataForm = ar && Array.isArray(ar) ? ar :[];

                let FormDataArray = {};

                let count = 0;
                for(let formItem of dataForm ){
                    if(typeof formItem === 'object'){
                        
                        if(
                            formItem.type 
                            && formItem.label
                            && formItem.name
                        ){

                            if(
                                formItem.type == 'text'
                                || formItem.type == 'number'
                                || formItem.type == 'checkbox'
                                || formItem.type == 'username'
                                || formItem.type == 'password'
                                || formItem.type == 'date'
                            ){

                                // * css
                                let containerElementCss = {
                                    padding: '5px 10px',
                                }
                                let labelElementCss = {
                                    fontWeight:'bold'
                                    , fontSize:'14px'
                                }
                                let gridElementCss = {
                                    display:'grid'
                                    , gridTemplateColumns:'100%'
                                }
                                let inputElementCss = {
                                    padding:'5px 8px',
                                    outline: 'none',
                                    borderRadius: '5px',
                                    color:'gray',
                                    border: '1px solid gray'
                                }

                                // -- element html
                                let idForm = formItem.name+'-'+ count;
                                let formComponent = el('input')
                                .css(inputElementCss)
                                    .type(formItem.type == 'date'?'text':formItem.type)
                                    .name(formItem.name)
                                    .width('100%')
                                    .id(idForm);

                                let formLabel = el('label')
                                    .html(formItem.label)
                                    .css(labelElementCss);
                                let formContainer = el('div').css(containerElementCss);
                                let formGrid = el('div').css(gridElementCss);
                                let deskripsi = el('p').html(formItem.deskripsi? formItem.deskripsi:'').css({color:'gray'})

                                // add to FormDataArray

                                FormDataArray[idForm] = formComponent;

                                // * more config

                                //--> date type
                                if(formItem.type === 'date'){
                                    formComponent
                                    .attr('placeholder','mm/dd/yyyy')
                                    .load(function(e){
                                        let fid = e.el.id;
                                        // berikut merupakan element dari input
                                        let inputEl = e.el;
                                        
                                        inputEl.addEventListener('input', function (event) {
                                            // Hanya angka yang diizinkan
                                            let value = this.value.replace(/\D/g, '');

                                            // Format input menjadi dd/mm/yyyy
                                            if (value.length > 2) {
                                                value = value.slice(0, 2) + '/' + value.slice(2);
                                            }
                                            if (value.length > 5) {
                                                value = value.slice(0, 5) + '/' + value.slice(5, 9); // Hanya 4 angka terakhir untuk tahun
                                            }

                                            // Batasi agar sesuai dengan format maksimal dd/mm/yyyy (10 karakter)
                                            this.value = value.slice(0, 10);
                                        });

                                        inputEl.addEventListener('keydown', function (event) {
                                            // Membatasi agar user tidak bisa menggunakan karakter selain angka dan backspace
                                            const allowedKeys = ['Backspace', 'Tab', 'ArrowLeft', 'ArrowRight'];
                                            if (isNaN(event.key) && !allowedKeys.includes(event.key)) {
                                                event.preventDefault();
                                            }
                                        });

                                        $("#"+fid).datepicker({
                                            dateFormat: 'dd/mm/yyyy'
                                        }).datepicker('setDate', new Date());
                                        // let now = tanggal().normal;
                                        // inputEl.value = tanggal(now).sekarang.split('-').join('/');

                                    })
                                }

                                //--> append ellement pada container
                                let addItem = formContainer
                                    .child(formLabel)
                                    .child(deskripsi)
                                    .child(
                                        formGrid
                                            .child(formComponent)
                                    )
                                _container.child(addItem)
                            }

                            if(
                                formItem.type == 'select'
                            ){

                                // * css
                                let containerElementCss = {
                                    padding: '5px 10px',
                                }
                                let labelElementCss = {
                                    fontWeight:'bold'
                                    , fontSize:'14px'
                                }
                                let gridElementCss = {
                                    display:'grid'
                                    , gridTemplateColumns:'100%'
                                }
                                let inputElementCss = {
                                    padding:'5px 8px',
                                    outline: 'none',
                                    borderRadius: '5px',
                                    color:'gray',
                                    border: '1px solid gray'
                                }

                                // -- element html
                                let idForm = formItem.name+'-'+ count;
                                let formComponent = el('select')
                                .css(inputElementCss)
                                    .class('form-control')
                                    .name(formItem.name)
                                    .width('100%')
                                    .attr('multiple', true)
                                    .id(idForm);

                                let formLabel = el('label')
                                    .html(formItem.label)
                                    .css(labelElementCss);
                                let formContainer = el('div').css(containerElementCss);
                                let formGrid = el('div').css(gridElementCss);
                                let deskripsi = el('p').html(formItem.deskripsi? formItem.deskripsi:'').css({color:'gray'})

                                // add to FormDataArray
                                let dataOption = formItem.data ? [{ value: "", text: "Pilih Data" }].concat(formItem.data) : [{value:"", text:"Pilih Data"}];

                                for(let dO of dataOption){
                                    formComponent.child(
                                        el('option').val(dO.value).html(dO.text)
                                    )
                                }


                                FormDataArray[idForm] = formComponent;

                                // * more config
                                formComponent.load(function(e){
                                    let id = e.el.id;
                                    console.log("#"+id)
                                    $("#"+id).select2()
                                })
                                //--> append ellement pada container
                                let addItem = formContainer
                                    .child(formLabel)
                                    .child(deskripsi)
                                    .child(formComponent)
                                _container.child(addItem)
                            }

                        }
                        


                    }
                    count++;
                }

                return {
                    component:_container,
                    formData : FormDataArray
                }
            }
            
            //--> create form area
            const formData = function(){
                
                // * css
                
                let cssContainer = {
                    margin:'10px'
                    , overflow:'hidden'
                    , borderRadius:'5px'
                    , background:'white'
                    , boxShadow:'0 0 10px #ddd'
                }

                let cssHeader = {
                    background:'white'
                    , background:'gray'
                    , padding:'10px'
                    , margin:'0px'
                    , color:'white'
                    , fontSize:'18px'
                    , fontWeight:'bold'
                }

                //--> tagHtml
                let app = _id('app');
                let idContainer = "formdataws";
                let container = el('div')
                    .id("idContainer").css(cssContainer)
                let labelForm = el('div')
                    .child(
                        el('h1')
                            .css(cssHeader)
                                .html('Print Nota TKI')
                    );
                

                //--> config

                //--> buat tampilan form
                let formdDataCreate = createForm([
                    {
                        label:"Tanggal"
                        ,type:"date"
                        ,name:"tgl"
                    }
                    ,{
                        label:"Pilih PMI"
                        ,   type:"select"
                        ,   name:"id_biodata"
                        ,   data: daftarTKI
                    }
                    ,{
                        label:"Jumlah"
                        ,   type:"number"
                        ,   name:"jumlah"
                    }
                    ,{
                        label:"Keterangan"
                        ,   type:"text"
                        ,   name:"keterangan"
                    }
                ]);

                // -> add form to contaner
                container.child(labelForm);
                container.child(formdDataCreate.component);

                // add button submit
                let submitButton = el('button')
                    .html('Simpan Data')
                    .class('btn btn-success btn-sm')
                    .margin('0px 20px')
                    .click(async function(e) {
                        let data = {};
                        for (let k in formdDataCreate.formData) {
                            let y = formdDataCreate.formData[k];
                            let comp = y.get()
                            data[comp.name] = $('#'+comp.id).val();
                        }

                        var form_data = {
                            tgl : (function(tgl){
                                let [bln,tgll,thn] = tgl.split('/');
                                let arr = [thn,bln,tgll].join('-');
                                return arr
                            })(data.tgl),
                            id_biodata : data.id_biodata,
                            jumlah : data.jumlah,
                            keterangan : data.keterangan,

                        }

                        
                        $.ajax({
                            url             : "<?php echo site_url('agen/addkwintansi') ?>",
                            type            : "POST",
                            dataType        : 'json',
                            encode          : true,
                            data            : form_data,
                            success: function(data) {
                                if (!data.success) {
                                    swal({
                                        title: "Oops...",
                                        text: (data.message)+" !",
                                        confirmButtonColor: "#EF5350",
                                        type: "error"
                                    });
                                } else {
                                    swal({
                                        title: "Sukses diubah!",
                                        text: (data.message),
                                        confirmButtonColor: "#66BB6A",
                                        type: "success"
                                    }, function() {
                                        dataLoad(0)
                                    });
                                }
                            }
                        });
                    })
                
                let submitPrintTki = el('button')
                    .html('Cetak TKI Belum Psikotes')
                    .class('btn btn-primary btn-sm')
                    .margin('0px 5px')
                    .click(async function(e) {
                        location.href = '<?= site_url('notarisan_bulk/psikotes')?>'
                    })
                

                container.child(
                    el('div')
                    .css("padding-bottom","30px")
                    .child(
                        submitButton
                    )
                )

                // * show
                if(!_id(idContainer)){
                    app.appendChild(container.get())
                }

            }

            // datatable Loader
            const TableLoad = async function(){
                let container = el('div')
                .css({
                    margin: '10px',
                    padding: '10px',
                    background: '#fff',
                    boxShadow: '0 0 10px #ddd',
                    borderRadius: '10px',
                })

                let tables = el('table')

                tables.css({
                    width: '100%',
                    borderCollapse: 'collapse',
                })

                let cssButton = {
                    margin: '5px 2px',
                    padding: '2px 10px',
                    background: 'gray',
                    color: 'white',
                    border: 'none',
                    borderRadius: '5px',
                    cursor: 'pointer',
                }

                let len = 0;

                const page = el('div').css({
                    textAlign:'right'
                }).html(`Page : 1/1`);
                totalElement = page;
                const maxPage = 1;

                let action = el('div')
                .css({
                    display:'flex',
                    justifyContent:'flex-end',
                    alignItems:'center',
                    borderBottom:'1px solid #ddd'
                })
                .child(
                    el('div')
                    .css({
                        flex:1
                    })
                    .child(
                        el('p').css({fontSize:'18px', fontWeight:'bold', color:'gray'}).text('Cetak Nota')
                    )
                    .child(
                        el('div').css({
                            display : 'flex'
                            ,alignItems :'center'
                        }).load(DataFilter)
                    )
                )
                .child(
                    el('div')
                    .child(page)
                    .child(
                        el('button').css(cssButton).text('<')
                        .click(function () {
                            let min = len - 50;
                            len = min > 0 || min === 0 ? min :  0;
                            dataLoad(len, 50);
                        })
                    )
                    .child(
                        el('button').css(cssButton).text('>')
                        .click(function(){
                            
                            let [a, b] = paginationBatas
                            if ((a + 1) < b || a + 1 === b) {
                                let plus = len + 50;
                                len = plus;
                                dataLoad(plus,50);
                            }
                        })
                    )
                )
                

                container
                    .child(action)
                    .child(
                        el('div')
                        .css({
                            height: '280px',
                            overflowY: 'scroll',
                        })
                        .child(tables)
                    )



                _id('app').appendChild(
                    container.get()
                );

                tableResult = tables.get();

                dataLoad()


            }

            // start form
            formData()

            TableLoad()

        })()
    </script>
