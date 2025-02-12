<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <h1 class="pull-left">
                <i class="icon-star"></i>
                <span id="title-page">Pendaftaran Absensi TKI </span>
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
                    <li id="title-page2" class="active">Absensi manual </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="/flamboyan/xlsx.js"></script>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.css" />
    <!-- SweetAlert JS (version 1.x) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.js"></script>
    <script>

        function convertRangeToMerge(range) {
            const startCell = XLSX.utils.decode_cell(range[0]); // Mengonversi 'A1' ke { r: 0, c: 0 }
            const endCell = XLSX.utils.decode_cell(range[1]);   // Mengonversi 'C1' ke { r: 0, c: 2 }
            return {
                s: { r: startCell.r, c: startCell.c }, // Start: { r: 0, c: 0 }
                e: { r: endCell.r, c: endCell.c }      // End: { r: 0, c: 2 }
            };
        }

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


            // set merget cell
            worksheet['!merges'] = [];

            for(let mrg of (data.merge && Array.isArray(data.merge)?data.merge:[])){
                worksheet['!merges'].push(convertRangeToMerge(mrg))
            }

            // Set row heights (melebarkan row)
            worksheet['!rows'] = [];

            // Misal kita ingin mengatur tinggi semua baris menjadi 30px
            for (let i = 0; i < worksheetData.length; i++) {
                worksheet['!rows'].push({ hpx: i < data.border.start ? 15 : 30}); // Atau gunakan hpt: untuk poin
            }

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

        (async function () {

            const nameForm = 'Pendaftaran Kelas';

            
            // data async
            
            
            let datalogin = 'eyJpZCI6IjE4IiwiZm90byI6IiIsIm5hbWEiOiJ2ZHMiLCJsZXZlbCI6IjEiLCJ1c2VybmFtZSI6ImFkbWluIiwicGFzc3dvcmQiOiJlNjY5OTc1ZGFkYzc2OTEyNGZiMjI1ZTJiNmQ1NGVlMDUzMGYyMWYyIiwicGFzc3dvcmR2aWV3IjoiZmVlZCQxMjMkIiwiY3JlYXRlZF9hdCI6IjIwMjItMDgtMjMgMDc6NDc6MDkiLCJ1cGRhdGVkX2F0IjpudWxsLCJkZWxldGVfc2V0IjoiMCIsIm93bmVyIjoiMCJ9';
            
            const dataGet = function (query) {
                return new Promise((resolve, reject) => {
                    try {
                        AuditDevQuery(datalogin, query, function (data) {
                            resolve(data);
                        })
                    } catch (e) {
                        reject(e);
                    }
                })
            }

            let [kelasTki] = await dataGet(`SELECT kode value, CONCAT(kelas, ' ', nomor) text, gender FROM kelastki`);
            let [daftarTki] = await dataGet(`SELECT id_biodata value, concat(id_biodata, ' - ', nama) text, nama FROM personal WHERE lower(statusaktif) = 'sudah ada id' OR lower(statusaktif) LIKE '%proses%'`);

            const CetakExcel = async function(){
                let kelas = $("select[name=kelas]").val();
                let [{text:namakelas}] = kelasTki.cond(kelas,'value');
                console.log(namakelas)
                if(kelas && kelas != ''){
                    let [daftar] = await dataGet(`SELECT * FROM pendaftaran_kelas WHERE kelas = '${kelas}'`);
                    console.log(daftar)
                    let dataMaping = daftar.map(function(s, i){
                        return [
                                {
                                    name: (i+1)
                                }
                                , {
                                    name: s.tki
                                }
                                , {
                                    name: s.nama
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                            ]
                    });
                    let mrg = [
                        ['B4', 'F4']
                        ,['A2', 'B2']
                        ,['C5', 'E5']
                        ,['A4', 'A5']
                        ,['G4', 'G5']
                        ,['H4', 'H5']
                    ];

                    for (let q = 0; q < dataMaping.length; q++) {
                        mrg.push(['C'+(6+q), 'E'+(6+q)]);
                    }

                    window.exportExcel({
                        merge: mrg,
                        border: {
                            start: 3,
                            end: 7
                        },
                        style:{
                            no : {
                                width: 5
                            },
                            c1 :{
                                width: 10
                            },
                            c2 : {
                                width: 15
                            },
                            c3 : {
                                width: 15
                            },
                            c4 : {
                                width: 15
                            },
                            c5 : {
                                width: 15
                            }
                            ,c6 : {
                                width: 10
                            }
                            ,c7 : {
                                width: 30
                            }
                        },
                        data : [
                            [
                                {
                                    name: "KELAS :"
                                }
                                , {
                                    name: namakelas
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                            ]
                            ,[
                                {
                                    name: "Tanggal :"
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: tanggal(tanggal().normal).sekarang
                                }
                                , {
                                    name: "INSTRUKTUR:"
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: "BLK"
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: "MARKETING :"
                                }
                            ]
                            ,[
                                {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                            ]
                            ,[
                                {
                                    name: "NO"
                                }
                                , {
                                    name: "ABSEN TKI"
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: "NILAI"
                                }
                                , {
                                    name: "MATERI"
                                }
                            ]
                            ,[
                                {
                                    name: ""
                                }
                                , {
                                    name: "Pinhao"
                                }
                                , {
                                    name: "Nama"
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: "TTD"
                                }
                                , {
                                    name: ""
                                }
                                , {
                                    name: ""
                                }
                            ]
                            
                        ].concat(dataMaping)
                    })
                }else{
                    alert('pilih kelas dulu')
                }
            }


            let formdDataCreate;
            let tableResult = null;
            let paginationBatas = [1, 1];
            let totalElement = null;
            let formKelas = _id('kelastkiform');
            let formBiodata = _id('biodata');
            let simpanTki = _id('SimpanTKI');
            let selectBiodata = $('#biodata').select2();
            let formTKIDData = {}
            let paginationActive;

            // list loaded
            const loaded = function(e){
                let dx = e.el;
                let action = Array.from(dx.querySelectorAll('.hapus'))
                for(let ac of action){
                    ac.addEventListener('click', function(){
                        let prima = this.dataset.id;
                        Delete(async function(pr){
                                let cl = cssLoader()
                                await dataGet(`DELETE FROM pendaftaran_kelas WHERE prima = '${pr}'`)
                                cl.remove();
                                dataLoad(paginationActive)
                        }, prima)
                    },false)
                }
            }

            const filterValue = {
                kelas:''
            } 

            // filterCustome
            const filterCustome = function(e){
                let r = e.el;
                let btn = el('select');
                btn.css({
                    border: '1px solid #ddd'
                });
                btn.child(
                    el('option').val('').text('Semua Kelas')
                )
                for(let y of kelasTki){
                    btn.child(
                        el('option').val(y.value).text(y.text)
                    )
                }
                btn.change(function(){
                    console.log(this.value)
                    filterValue['kelas'] = this.value;
                    dataLoad();
                })
                r.appendChild(el('span').text('Data di tampilkan : ').get())
                r.appendChild(btn.get())
            }

            // data load
            const dataLoad = async function (num = 0, len = 50) {
                paginationActive = num;
                if (tableResult) {
                    let cl = cssLoader();

                    filterQr = filterValue.kelas != '' ?` WHERE kelas = '${filterValue.kelas}' `:''

                    let [kelasTki] = await dataGet(`SELECT * FROM kelastki`);
                    let [total] = await dataGet(`SELECT count(*) total FROM pendaftaran_kelas ${filterQr}`);
                    let [dataRead] = await dataGet(`SELECT * FROM pendaftaran_kelas ${filterQr} ORDER BY prima DESC limit ${num},${len}`);
                    cl.remove();
                    let data = [];
                    // header
                    data.push({
                        kelas: "Kelas"
                        , biodata: "Pin Hou"
                        , nama: "Nama"
                        , act: "Action"
                    })

                    for (let dx of dataRead) {
                        data.push({
                            kelas : dx.kelas
                            , biodata: dx.tki
                            , nama: dx.nama
                            , act: `
                            <button data-id="${dx.prima}" class="btn btn-sm btn-danger hapus">Hapus</button>
                            `
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

                    if (totalElement) {
                        let a = Math.ceil((num / len) + 1);
                        let b = Math.ceil(total[0].total / len);
                        totalElement.html(`Page : ${a} / ${b}`);
                        paginationBatas = [a, b];
                    }
                    return total;
                } else {
                    return null
                }
            }

            // clearForm
            const clearForm = function(){
                $("select[name=kelas").val('').trigger('change');
                $("select[name=tki").val([]).trigger('change');
            }

            // --- simpan form
            const SimpanData = async function (e) {
                let data = {};
                for (let k in formdDataCreate.formData) {
                    let y = formdDataCreate.formData[k];
                    let comp = y.get()
                    let id = y.get().id
                    data[comp.name] = $('#' + id).val();
                }
                for (let fy in data) {
                    if (data[fy] == '') {
                        alert(fy + ' tidak boleh kosong')
                        throw fy + ' tidak boleh kosong'
                    }
                }
                let { kelas, tki } = data;

                if (tki && tki.length > 0) {
                    let mapInsert = tki.map(function (s) {
                        let [data] = daftarTki.cond(s, 'value');
                        return {
                            kelas: kelas,
                            tki: s,
                            nama: data.nama
                        }
                    }).ToInsert('pendaftaran_kelas', ['tki', 'nama']);
                    let cl = cssLoader()
                    await dataGet(mapInsert);
                    cl.remove();
                    clearForm();
                    dataLoad(0)
                } else {
                    alert("Dafatrkan TKI terlebih dahulu")
                }

            }

           
            const createForm = function (ar) {
                // css
                let formCss = {
                    padding: '10px'
                }
                // view
                let _container = el('div').css(formCss)

                let dataForm = ar && Array.isArray(ar) ? ar : [];

                let FormDataArray = {};

                let count = 0;
                for (let formItem of dataForm) {
                    if (typeof formItem === 'object') {

                        if (
                            formItem.type
                            && formItem.label
                            && formItem.name
                        ) {

                            if (
                                formItem.type == 'text'
                                || formItem.type == 'number'
                                || formItem.type == 'checkbox'
                                || formItem.type == 'username'
                                || formItem.type == 'password'
                                || formItem.type == 'date'
                            ) {

                                // * css
                                let containerElementCss = {
                                    padding: '5px 10px',
                                }
                                let labelElementCss = {
                                    fontWeight: 'bold'
                                    , fontSize: '14px'
                                }
                                let gridElementCss = {
                                    display: 'grid'
                                    , gridTemplateColumns: '100%'
                                }
                                let inputElementCss = {
                                    padding: '5px 8px',
                                    outline: 'none',
                                    borderRadius: '5px',
                                    color: 'gray',
                                    border: '1px solid gray'
                                }

                                // -- element html
                                let idForm = formItem.name + '-' + count;
                                let formComponent = el('input')
                                    .css(inputElementCss)
                                    .type(formItem.type == 'date' ? 'text' : formItem.type)
                                    .name(formItem.name)
                                    .width('100%')
                                    .id(idForm);

                                let formLabel = el('label')
                                    .html(formItem.label)
                                    .css(labelElementCss);
                                let formContainer = el('div').css(containerElementCss);
                                let formGrid = el('div').css(gridElementCss);
                                let deskripsi = el('p').html(formItem.deskripsi ? formItem.deskripsi : '').css({ color: 'gray' })

                                // add to FormDataArray

                                FormDataArray[idForm] = formComponent;

                                // * more config

                                //--> date type
                                if (formItem.type === 'date') {
                                    formComponent
                                        .attr('placeholder', 'mm/dd/yyyy')
                                        .load(function (e) {
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

                                            $("#" + fid).datepicker({
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

                            if (
                                formItem.type == 'select'
                            ) {

                                // * css
                                let containerElementCss = {
                                    padding: '5px 10px',
                                }
                                let labelElementCss = {
                                    fontWeight: 'bold'
                                    , fontSize: '14px'
                                }
                                let gridElementCss = {
                                    display: 'grid'
                                    , gridTemplateColumns: '100%'
                                }
                                let inputElementCss = {
                                    padding: '5px 8px',
                                    outline: 'none',
                                    borderRadius: '5px',
                                    color: 'gray',
                                    border: '1px solid gray'
                                }

                                // -- element html
                                let idForm = formItem.name + '-' + count;
                                let formComponent = el('select')
                                    .css(inputElementCss)
                                    .class('form-control')
                                    .name(formItem.name)
                                    .width('100%')
                                    .id(idForm);

                                if(formItem.multiple){
                                    formComponent.attr('multiple', 'multiple')
                                }

                                let formLabel = el('label')
                                    .html(formItem.label)
                                    .css(labelElementCss);
                                let formContainer = el('div').css(containerElementCss);
                                let formGrid = el('div').css(gridElementCss);
                                let deskripsi = el('p').html(formItem.deskripsi ? formItem.deskripsi : '').css({ color: 'gray' })

                                // add to FormDataArray
                                let dataOption = formItem.data ? [{ value: "", text: "Pilih Data" }].concat(formItem.data) : [{ value: "", text: "Pilih Data" }];

                                for (let dO of dataOption) {
                                    formComponent.child(
                                        el('option').val(dO.value).html(dO.text)
                                    )
                                }


                                FormDataArray[idForm] = formComponent;

                                // * more config
                                formComponent.load(function (e) {
                                    let id = e.el.id;
                                    console.log("#" + id)
                                    $("#" + id).select2()
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
                    component: _container,
                    formData: FormDataArray
                }
            }

            const openForm = [
                {
                    label: "Kelas"
                    , type: "select"
                    , name: "kelas"
                    , data: kelasTki
                }
                , {
                    label: "Daftar Tki"
                    , type: "select"
                    , name: "tki"
                    , data: daftarTki
                    , multiple: true
                }
            ];

            // -------------------------------------------------------------------------//
            //--> create form area
            const formData = function () {

                // * css

                let cssContainer = {
                    margin: '10px'
                    , overflow: 'hidden'
                    , borderRadius: '5px'
                    , background: 'white'
                    , boxShadow: '0 0 10px #ddd'
                }

                let cssHeader = {
                    background: 'white'
                    , background: 'gray'
                    , padding: '10px'
                    , margin: '0px'
                    , color: 'white'
                    , fontSize: '18px'
                    , fontWeight: 'bold'
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
                            .html(nameForm)
                    );


                //--> config

                //--> buat tampilan form
                formdDataCreate = createForm(openForm);

                // -> add form to contaner
                container.child(labelForm);
                container.child(formdDataCreate.component);

                // add button submit
                let submitButton = el('button')
                    .html('Tambah TKI')
                    .class('btn btn-success btn-sm')
                    .margin('0px 20px')
                    .click(SimpanData)
                
                let excelButton = el('button')
                    .html('Cetak Excel')
                    .class('btn btn-success btn-sm')
                    .margin('0px 0px')
                    .click(CetakExcel)

                container.child(
                    el('div')
                        .css("padding-bottom", "30px")
                        .child(
                            submitButton
                        )
                        .child(
                            excelButton
                        )
                )

                // * show
                if (!_id(idContainer)) {
                    app.appendChild(container.get())
                }

            }

            // datatable Loader
            const TableLoad = async function () {
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
                    textAlign: 'right'
                }).html(`Page : 1/1`);
                totalElement = page;
                const maxPage = 1;

                let action = el('div')
                    .css({
                        display: 'flex',
                        justifyContent: 'flex-end',
                        alignItems: 'center'
                    })
                    .child(
                        el('div')
                            .css({
                                flex: 1
                            })
                            .child(
                                el('p').css({ fontSize: '18px', fontWeight: 'bold', color: 'gray' }).text(nameForm)
                            )
                            .child(
                                el('div').load(filterCustome)
                            )
                    )
                    .child(
                        el('div')
                            .child(page)
                            .child(
                                el('button').css(cssButton).text('<')
                                    .click(function () {
                                        let min = len - 50;
                                        len = min > 0 || min === 0 ? min : 0;
                                        dataLoad(len, 50);
                                    })
                            )
                            .child(
                                el('button').css(cssButton).text('>')
                                    .click(function () {

                                        let [a, b] = paginationBatas
                                        if ((a + 1) < b || a + 1 === b) {
                                            let plus = len + 50;
                                            len = plus;
                                            dataLoad(plus, 50);
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
