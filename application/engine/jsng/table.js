const tr_table = function() {
    let tr_dbs = tr_db();
    let tr_forms = tr_form();
    return {
        data: {
            id: 'id' + Date.now(),
            select: null,
            title: "",
            row: {},
            table: null,
            element: null,
            pagination: {},
            paginationPerPage: 10,
            countData: 0,
            search: null,
            idData: null,
            htmlForm: null,
            sysStyle: null,
            back: false,
            disableAdd: false,
            disableOrdering: false,
            disableSearch: false,
        },
        table: function(a) {
            this.data.table = a;
            return this;
        },
        row: function(a) {
            this.data.row = a;
            return this;
        },
        back: function(a) {
            this.data.back = a;
            return this;
        },
        title: function(a) {
            this.data.title = a;
            return this;
        },
        load: async function(a) {
            tagupdate = 'data-update' + this.data.id;
            this.data.element = a;
            document.getElementById(this.data.element).style.minHeight = '50vh';
            let ldr = document.getElementById(this.data.id + '-loader-r');
            if (ldr == undefined) {
                document.getElementById(this.data.element).innerHTML = `
                    <div class="row">
                        <div class="col-12 text-center">
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                            </div>
                            <p>please wait...</>
                        </div>
                    </div>
                `;
            } else {
                ldr.style.display = 'inline-block';
            }
            if (this.data.pagination[this.data.table] == undefined) {
                this.data.pagination[this.data.table] = 0;
            }
            if (this.data.countData == undefined) {
                this.data.countData = 0
            }
            if (this.data.paginationPerPage == undefined) {
                this.data.paginationPerPage = 10;
            }
            tr_dbs.table(this.data.table);
            if (this.data.search != undefined) {
                for (const mLIke of Object.keys(this.data.row)) {
                    tr_dbs.orWhere(mLIke, 'LIKE', `"%${this.data.search}%"`)
                }
            }
            if (this.data.row != undefined) {
                tr_dbs.select(Object.keys(this.data.row).join(','));
            }
            if (this.data.select != undefined) {
                tr_dbs.select(this.data.select.join(","));
            }
            tr_dbs.limit(this.data.pagination[this.data.table], this.data.paginationPerPage);
            let hasil = await tr_dbs.get();
            this.loadStyle();
            this.loadNext(hasil);
            //document.getElementById(this.data.element).innerHTML = hasil;
            //return this;
        },
        loadStyle: function() {
            let id = this.data.id;
            let grid = ' auto';
            let count = Object.keys(this.data.row).length; //ditambah 1 karena untuk kolom option
            gridHapus = grid.repeat(count);
            grid = gridHapus+' auto ';
            this.data.sysStyle =
                `<style>
                    .${id}{
                        display: grid;
                        grid-template-columns: ${grid};
                        overflow-y: auto;
                    }
                    .${id}-hapus{
                        display: grid;
                        grid-template-columns: ${gridHapus};
                        overflow-y: auto;
                    }
                    .${id}-h{
                        display: grid;
                        grid-template-columns: ${grid};
                        overflow-y: auto;
                    }
                    .${id} > div, .${id}-hapus > div{
                        font-size: 9pt;
                        padding: 5px 8px;
                        border: 1px solid #d5d5d5;
                        color: #333;
                        min-width: 120px;
                    }
                    .${id} > .head-${id}, .${id}-hapus > .head-${id}{
                        background: #4a2ba8;
                        color: white;
                        text-align: center;
                        padding: 5px 8px;
                        font-weight: bold;
                        font-size: 10pt;
                    }
                    .${id}-h{
                    position: relative;
                    z-index: 999;
                    box-shadow: 0 5px 10px rgba(125,125,125,0.4);
                    margin:0 !important;
                    }
                    .${id}-h{
                    padding-bottom: 2px;
                    border-top: 1px solid #ddd;
                    }
                    .${id}-h div{
                    padding: 4px 0;
                    }
                    .sortir {
                        padding: 4px 8px;
                        float: right;
                        border: 1px solid #aae;
                        border-radius: 4px;
                        margin-left: 5px;
                    }
                    .form-group-2{
                    margin: 0;
                    }
                    .search-table{
                    float: right;
                    padding: 4px 8px;
                    border: 1px solid #aae;
                    border-radius: 4px;
                    }
                    .head{
                        cursor: pointer;
                        font-size: 11pt !important;
                        font-weight: bold;
                    }
                    .page-item .page-link:nth-child(1){
                    margin-right: 8px;
                    }
                    .page-item .page-link{
                    padding: 8px 15px;
                    }
                    .select2-container{
                        display: block;
                    }
                    .note-group-select-from-files{
                    //   display: none;
                    }
                    .form-group-2{
                    width: 100%;
                    margin-bottom: 8px;
                    }
                    .form-group-2::after{
                    content: "";
                    display: block;
                    clear: both;
                    }
                    .form-group-2 label{
                    float: left;
                    font-size: 9pt;
                    }
                    .form-group-2 .form-control-2{
                    width: calc(100% - 100px);
                    }
                    .form-control-2{
                    font-size: 9pt;
                    }
                    select.form-control-2 {
                        height: 25px;
                    }
                    .form-group-2{
                    display: relative;
                    }
                    .form-group-2 .select-choice div{
                        white-space: nowrap;
                        border-bottom: 1px solid #ddd;
                    }
                    .eypass{
                    position: absolute;
                    bottom: 12px;
                    right: 15px;
                    z-index: 2;
                    cursor: pointer;
                    }
                    .form-group-2 .select-choice{
                        position: absolute;
                        top: calc(100% + 20px);
                        left: 110px;
                        display: none;
                        height:auto;
                        max-height: 250px;
                        width: wrap-content;
                        min-width: calc(100% - 100px);
                        background: white;
                        border-radius: 4px;
                        z-index: 99;
                        box-shadow: 0 0 10px rgba(1235,125,125,0.5);
                        overflow-y: auto;
                        padding: 10px 28px;
                    }
                    .label-select::after{
                    content: "";
                    position: absolute;
                    width: calc(100% - 100px);
                    background: transparent;
                    display: block;
                    height: 100%;
                    top:0;
                    right: 0;
                    }
                    .select-search{
                    width: calc(100% - 100px);
                    display: none;
                    position: absolute;
                    top: calc(100% - 10px);
                    z-index: 999;
                    padding: 3px 10px;
                    margin: 0;
                    height: 30px;
                    left: 110px;
                    border: 1px solid #ddd;
                    }
                    .modal-xl{
                        min-width: calc(100% - 40px);
                    }
                    .modal-xl .modal-body{
                    max-height: calc(100vh - 200px);
                    overflow: auto;
                    }
                    .form-d{
                    display: none;
                    }
                    @media screen and (max-width: 1024px){
                    .head-seach input{
                        width: 100%;
                    }
                    .head-seach{
                        margin-bottom: 10px;
                    }
                    }
                    .disabled-form{
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    background: transparent;
                    z-index: 999;
                    top: 0;
                    left: 0;
                    }
                    .head-seach{
                    display: grid;
                    grid-template-columns: auto auto;
                    }
                    @media screen and (max-width: 1024px){
                    .head-seach{
                        display: grid;
                        grid-template-columns: auto;
                    }
                    }
                    .form-group-2{
                    position: relative;
                    }
                    .form-control-2{
                    display: block;
                    padding: 8px 12px;
                    outline: none;
                    border: none;
                    background: #f5f8fa;
                    border-radius: 4px;
                    color: #5e6278;
                    font: inherit;
                    }
                    select.form-control-2{
                    -webkit-appearance: menulist-button;
                    display: block;
                    padding: 8px 12px;
                    outline: none;
                    height: 35px;
                    border: none;
                    background: #f5f8fa;
                    border-radius: 4px;
                    color: #5e6278;
                    }
                    .form-control-2 > option{
                    height: 18px;
                    }
                    .form-group-2{
                    display: grid;
                    grid-template-columns: 100px calc(100% - 100px);
                    }
                    .form-group-2 div input{
                    min-width: 100%;
                    max-width: 100%;
                    }
                    .form-group-2 div .select2{
                    min-width: 100%;
                    max-width: 100%;
                    }
                    .form-control-2{
                    border: 1px solid #aaa;
                    }
                    input.form-control-2[readonly=true]{
                    border: 1px solid #aaa;
                    background: #ddd;
                    }
                    .table-bordered td,.table-bordered th{
                    border: 1px solid #ddd;
                    }
                    .table-bordered{
                    border: 1px solid #ddd;
                    }
                    .note-btn{
                    padding: 5px !important;
                    }
                    .dropdown-toggle::after{
                    display: none;
                    }
                    .form-group-2 label{
                    display: flex;
                    align-items: center;
                    font-size: 16px !important;
                    font-weight: bold;
                    }
                    .form-group-2{
                        grid-template-columns: 100% !important;
                    }
                    @media screen and (max-width: 1024px){
                    .form-group-2{
                        grid-template-columns: 100% !important;
                    }
                    }
                    .form-group-2 div .select2  span{
                    height: 40px;
                    padding-top: 3px;
                    }
                    .form-group-2 div .select2  .select2-selection__arrow{
                    height: 40px;
                    padding-top: 3px;
                    }
                    #app-content-title{
                    margin-top: 10px;
                    }
                    #app-content{
                    position: relative;
                    }
                    #app-content .data-table{
                    position: relative;
                    max-height: calc(100vh - 455px) !important;
                    overflow: auto;
                    }
                    .bottom-nav{
                    display: grid;
                    grid-template-columns: auto auto;
                    }
                    .bottom-nav span{
                    margin-top: 13px;
                    }
                    @media screen and (max-width: 600px){
                    .bottom-nav{
                        display: grid ;
                        grid-template-columns: auto;
                        width: 100% !important;
                        text-align: center;
                    }
                    .bottom-nav span{
                        padding: 0 ;
                    }
                    .bottom-nav span > ul  {
                        display: inline-flex;
                        }
                    .bottom-nav span, .bottom-nav span ul{
                    margin: 0 !important;
                    padding: 0 !important;
                    }
                    }
                    .form-group-2 div textarea {
                        min-width: 100%;
                        max-width: 100%;
                    }
                    #btn-action-area{
                    position: fixed;
                    z-index: 9999;
                    bottom: 10px;
                    right: 10px;
                    }
                    .footer-app{
                    height: 60px;
                    position: fixed;
                    width: 100%;
                    bottom:0;
                    }
                    /* width */
                    ::-webkit-scrollbar {
                    width: 4px;
                    height: 4px;
                    }
                    /* Track */
                    ::-webkit-scrollbar-track {
                    background: #f1f1f1;
                    }
                    /* Handle */
                    ::-webkit-scrollbar-thumb {
                    background: #888;
                    }
                    /* Handle on hover */
                    ::-webkit-scrollbar-thumb:hover {
                    background: #555;
                    }
                    .tabletop-left, .tablefoot-left {
                        float: left;
                        width: 50%;
                    }
                    .tabletop-right, .tablefoot-right {
                        float: right;
                        width: 50%;
                    }
                    .tableinside {
                        float: left;
                        width: 100%;
                        margin: 5px 0px;
                    }
                    .tablefoot-pagin {
                        display: -ms-flexbox;
                        display: flex;
                        list-style: none;
                        border-radius: .25rem;
                        justify-content: flex-end;
                    }
                    .dkrh-back {
                        color: #fff;
                        background-color: #545b62;
                        border-color: #495057;
                        margin-right:5px;
                    }
                    .dkrh-back:hover {
                        color: #fff;
                        background-color: #383c40;
                    }
                    .dkrh-edit {
                        color: #fff;
                        background-color: #20B2AA;
                        margin-right:5px;
                    }
                    .dkrh-edit:hover {
                        color: #fff;
                        background-color: #1c9791;
                    }
                    .dkrh-delete {
                        color: #fff;
                        background-color: #B22222;
                        margin-right:5px;
                    }
                    .dkrh-delete:hover {
                        color: #fff;
                        background-color: #891b1b;
                    }
                </style>
            `;
        },
        loadNext: function(hasil) {
            let id = this.data.id;
            let row = this.data.row;
            let title = this.data.title;
            let table = this.data.table;
            let element = this.data.element;
            let rowKeys = Object.keys(this.data.row);
            let tableTop = '<div class="tabletop">'; //Tambah Btn, Search, Ordering
            let tableInside = ''; //Isinya
            let tableFoot = ''; //Pagination
            let modalPage = ''; // untuk Add atau Edit dan Hapus
            let tambahBtn = 'tambah-'+id;
            let ubahBtn = '.ubah-'+id;
            let hapusBtn = '.hapus-'+id;
            let tutupBtn = 'close-'+id;
            let simpanBtn = 'simpan-'+id;
            let formModal = 'form-d-body-'+id;
            let formModalTitle = 'form-d-title-'+id;
            tableTop += `<div class="d-flex align-items-center" style="height: 50px;"><div class="tabletop-left">`;
            if (this.data.back != false) {
                tableTop += `<button class="btn btn-sm dkrh-back" onclick="location.href='/${this.data.back}'">Kembali</button>`;
            }
            if (this.data.disableAdd == false) {
                tableTop += `<button class="btn btn-sm btn-primary" id="tambah-${id}"> <i class="fas fa-circle-plus"></i> Tambah</button>`;
            }
            tableTop += `</div><div class="tabletop-right">`;
            if (this.data.disableOrdering == false) {
                tableTop += `<select class="sortir" id="ordering-${id}">
                                <option value="0">ASC</option>
                                <option value="1">DESC</option>
                            </select>`;
            }
            if (this.data.disableSearch == false) {
                tableTop += `<input id="cari-${id}" class="search-table" style="width: 120px;" placeholder="cari...">`;
            }
            tableTop += `</div></div></div>`;
            tableInside += `<div class="tableinside"><div class="${id}">`;
            let header = '';
            rowKeys.forEach((rowKey) => {
                let name = row[rowKey][2];
                header += `<div data-filter-${id}="${rowKey}" style="position: relative;" data-head-0="" class="head-${id}">
                            ${name}
                            <i style="position: absolute; right: 10px;" class="fas fa-sort-amount-down"></i>
                        </div>`
            });
            tableInside += header;
            tableInside += `<div style="position: relative;" data-head-0="" class="head-${id}">
                        Option
                        <i style="position: absolute; right: 10px;" class="fas fa-sort-amount-down"></i>
                    </div>`
            hasil.forEach(v => {
                let indexForButton = 0;
                let jsonForUpdateBtn = {};
                let miniTableForDelete = "";
                rowKeys.forEach((rowKey,rowKeyIndex) => {
                    let align = "left";
                    let lopin = v[rowKey];
                    jsonForUpdateBtn[rowKey] = lopin;
                    miniTableForDelete += `
                            <div data-row-${rowKeyIndex} style="text-align: ${align};">${lopin}</div>
                        `;
                    indexForButton++;
                });
                tableInside += miniTableForDelete;
                jsonForUpdateBtn = encodeURIComponent(JSON.stringify(jsonForUpdateBtn));
                IdDeleteBtn = v.id;
                miniTableForDelete = encodeURIComponent(miniTableForDelete);
                tableInside += `<div data-row-${indexForButton} style="cursor: pointer;text-align: center;" data-update${id}="${text2Binary('')}">
                            <button class="btn btn-sm dkrh-edit ubah-${id}" data-id="${IdDeleteBtn}" data-update="${jsonForUpdateBtn}">Ubah</button>
                            <button class="btn btn-sm dkrh-delete hapus-${id}" data-id="${IdDeleteBtn}" data-table="${miniTableForDelete}">Hapus</button>
                        </div>`
            });
            tableInside += `</div></div>`;
            tableFoot += `<div class="pagin-menu-${id} tablefoot" style="height:50px">
                                <div class="tablefoot-left" style="display: inline-block;">Halaman 1 dari 10 (500 baris data)</div>
                                <div class="tablefoot-right" style=" display: inline-block; ">
                                    <ul class="tablefoot-pagin" style="padding:0; text-align:right;">
                                        <li class="page-item"><a style="cursor: pointer; padding: 5px 10px;" class="page-link first-${id}"><<</a></li>
                                        <li class="page-item"><a style="cursor: pointer; padding: 5px 10px;" class="page-link prev-${id}"><</a></li>
                                        <li class="page-item"><a style="cursor: pointer; padding: 5px 10px;" class="page-link next-${id}">></a></li>
                                        <li class="page-item"><a style="cursor: pointer; padding: 5px 10px;" class="page-link last-${id}">>></a></li>
                                    </ul>
                                </div>
                            </div>`;
            modalPage += `<div class="form-d" id="${id}-form-d">
                            <h5 class="modal-title" id="form-d-title-${id}"></h5>
                            <div class="d-flex align-items-center" style="height: 50px;">
                                <button id="close-${id}" type="button" class="btn btn-sm btn-secondary"> <i class="fas fa-close"></i> Tutup</button>
                                <button id="simpan-${id}" type="button" class="ml-2 btn btn-sm btn-primary" data-id=""> <i class="fas fa-save"></i> Simpan</button>
                                <span id="${id}-loader-h" style="margin-left: 10px; display:none;">
                                    <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                    </div>
                                </span>
                            </div>
                            <div class="container mt-3 mb-3">
                                <div class="row" id="form-d-body-${id}"></div>
                            </div>
                        </div>`;
            lop = `${this.data.sysStyle}
                    <div class="form-e" id="${id}-form-e">
                    <h5 class="modal-title" id="form-e-title-${id}">List ${title}</h5>
                        ${tableTop}
                        ${tableInside}
                        ${tableFoot}
                    </div>
                    ${modalPage}`;
            document.getElementById(this.data.element).innerHTML = lop;
            
            document.querySelector(".prev-" + id).addEventListener('click', function() {
                if ((Number(startPage) - bataspagin) < 0) {
                    Swal.fire('anda berada di halaman awal', '', 'info')
                } else {
                    pagination[loadForm.data.table] = startPage - bataspagin;
                    loadForm.load();
                }
            }, false)
            document.querySelector(".next-" + id).addEventListener('click', function() {
                if ((Number(startPage) + bataspagin) >= Number(totPage)) {
                    Swal.fire('anda berada di halaman akhir', '', 'info')
                } else {
                    pagination[loadForm.data.table] = startPage + bataspagin;
                    loadForm.load();
                }
            }, false)
            document.getElementById(tambahBtn).addEventListener('click', function() {
                document.querySelector('.form-e').style.display = 'none';
                document.querySelector('.form-d').style.display = 'block';
                document.getElementById(formModalTitle).innerHTML = 'Tambah '+title;
                document.getElementById(formModal).innerHTML = tr_forms.create(row).get();
                document.getElementById(simpanBtn).setAttribute('data-id' , "null"); 
            });
            document.getElementById(tutupBtn).addEventListener('click', function() {
                document.querySelector('.form-e').style.display = 'block';
                document.querySelector('.form-d').style.display = 'none';
            });
            document.getElementById(simpanBtn).addEventListener('click', function(event) {
                let dataId = event.target.getAttribute('data-id');
                let newObjectSimpan = {};
                rowKeys.forEach(rowKey => {
                    newObjectSimpan[rowKey] = document.getElementById(`${rowKey}`).value;
                });
                if (dataId != 'null') {
                    tr_dbs.update(table,newObjectSimpan,dataId);
                    return;
                }
                tr_dbs.insert(table,newObjectSimpan);
                //this.load(element);
            });
            const ubahBtnSelector = document.querySelectorAll(ubahBtn);
            ubahBtnSelector.forEach(UbahElement => {
                UbahElement.addEventListener('click', function(event) {
                    document.querySelector('.form-e').style.display = 'none';
                    document.querySelector('.form-d').style.display = 'block';
                    document.getElementById(formModalTitle).innerHTML = 'Ubah '+title;
                    let dataId = event.target.getAttribute('data-id');
                    let dataUpdate = event.target.getAttribute('data-update');
                    dataUpdate = JSON.parse(decodeURIComponent(dataUpdate));
                    document.getElementById(simpanBtn).setAttribute('data-id' , dataId); 
                    let rowBaru = row;
                    rowKeys.forEach((val,key) => {
                        let newObyek = {};
                        newObyek['value'] = dataUpdate[val];
                        rowBaru[val][3] = newObyek;
                    });
                    document.getElementById(formModal).innerHTML = tr_forms.create(rowBaru).get();
                });
            });
            const hapusBtnSelector = document.querySelectorAll(hapusBtn);
            hapusBtnSelector.forEach(hapusElement => {
                hapusElement.addEventListener('click', function(event) {
                    let dataId = event.target.getAttribute('data-id');
                    let dataTable = event.target.getAttribute('data-table');
                    dataTable = `<div class="${id}-hapus">`+header+decodeURIComponent(dataTable)+'</div>';
                    Swal.fire({
                        title: 'Apa anda yakin untuk menghapus data ini?',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: `Hapus`,
                        denyButtonText: `Batal`,
                        html: dataTable,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (res == 'disimpan') {
                                document.getElementById(loadForm.data.id + '-loader-h').style.display = 'inline-block';
                                Swal.fire(
                                    'Success!',
                                    'Data berhasil di hapus!',
                                    'success'
                                )
                            }
                        }
                    })
                });
            });
        }
    }
}