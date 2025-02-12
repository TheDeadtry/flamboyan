loadData: function(dat) {
    let disableNew = false;
    if (this.data.disableCreateR == true) {
        disableNew = true;
    }
    let pagination = this.data.pagination;
    let bataspagin = this.data.bataspagin;
    let totData = this.data.totData;
    let objform = this.data.objform;
    let t = this.data.id;
    let m = this.data.row;
    let k = Object.keys(this.data.row);
    globalThis.act = this;
    if (act.data.addRow != undefined) {
        setTimeout(function() {
            globalThis.actAddRow = function() {
                let dataLoad = dat.map(function(resData) {
                    for (let l = 0; l < k.length; l++) {
                        if (l == (k.length - 1)) {
                            if (act.data.addRow != undefined) {
                                let objAddRow = Object.keys(act.data.addRow);
                                objAddRow.map(function(er) {
                                    let id = act.data.addRow[er].id;
                                    let key = act.data.addRow[er].key;
                                    for (const placeEf of key) {
                                        let ty = '{{' + placeEf + '}}';
                                        id = id.replaceAll(ty, resData[placeEf]);
                                    }
                                    if (act.data.addRow[er].click != undefined) {
                                        document.getElementById(id).addEventListener('click', act.data.addRow[er].click, false)
                                    }
                                    if (act.data.addRow[er].load != undefined) {
                                        act.data.addRow[er].load(resData, act, text2Binary(resData));
                                    }
                                })
                            }
                        }
                    }
                })
            }
        })
    }
    let dataLoad = dat.map(function(resData, r) {
        let lop = '';
        for (let l = 0; l < k.length; l++) {
            let lopin = resData[k[l]];
            let align = "left";
            if (objform[k[l]] != undefined) {
                if (objform[k[l]].type != undefined) {
                    if (objform[k[l]].type == 'date') {
                        lopin = tanggal(resData[k[l]]).sekarang;
                        align = "center";
                    } else if (objform[k[l]].type == 'number') {
                        lopin = formatRupiah(resData[k[l]]);
                        align = "right";
                    } else {
                        lopin = resData[k[l]];
                    }
                } else {
                    lopin = resData[k[l]];
                }
            } else {
                lopin = resData[k[l]];
            }
            if (act.data.none != undefined) {
                if (act.data.none.indexOf(l) != -1) {
                    lop += `
                        <div data-row-${l} style="cursor: pointer;text-align: ${align}; display: none;" data-update${t}="${text2Binary(resData)}">${lopin}</div>
                    `;
                } else {
                    lop += `
                        <div data-row-${l} style="cursor: pointer;text-align: ${align};" data-update${t}="${text2Binary(resData)}">${lopin}</div>
                    `;
                }
            } else {
                lop += `
                    <div data-row-${l} style="cursor: pointer;text-align: ${align};" data-update${t}="${text2Binary(resData)}">${lopin}</div>
                `;
            }
            if (l == (k.length - 1)) {
                if (act.data.addRow != undefined) {
                    let objAddRow = Object.keys(act.data.addRow);
                    lop += objAddRow.map(function(er) {
                        let key = act.data.addRow[er].key;
                        let ef = act.data.addRow[er].template;
                        for (const placeEf of key) {
                            let ty = '{{' + placeEf + '}}';
                            ef = ef.replaceAll(ty, act.decodeHtml(resData[placeEf]));
                            let uptd = "{{updateid}}";
                            ef = ef.replaceAll(uptd, `data-update${t}="${text2Binary(resData)}"`);
                            ef = ef.replaceAll("{{times}}", Date.now());
                        }
                        let style = '';
                        if (act.data.addRow[er].position != undefined) {
                            style += 'text-align: ' + act.data.addRow[er].position + ';';
                        }
                        return ` <div style="${style}" id="head-'${t}'">${ef}</div> `;
                    }).join("")
                }
            }
        }
        return lop;
    }).join("")
    let setGrid = k.map(function(lp, r) {
        if (act.data.none != undefined) {
            if (act.data.none.indexOf(r) != -1) {} else {
                return "auto";
            }
        } else {
            return "auto";
        }
    }).join(" ")
    let setGridName = k.map(function(lp, r) {
        let lopin = m[lp];
        if (act.data.none != undefined) {
            if (act.data.none.indexOf(r) != -1) {
                return '<div onclick="globalThis.runOrderPage(\'' + r + '\')" id="head-' + t + '" data-head-' + r + ' class="head" style="display: none;">' + lopin + ' <i icon-order-' + r + ' onclick="globalThis.runOrderPage(\'' + r + '\')" class="fas fa-sort mt-1"></i> </div>';
            } else {
                return '<div onclick="globalThis.runOrderPage(\'' + r + '\')" id="head-' + t + '" data-head-' + r + ' class="head">' + lopin + '  <i icon-order-' + r + ' onclick="globalThis.runOrderPage(\'' + r + '\')" class="fas fa-sort mt-1"></i></div>';
            }
        } else {
            return '<div onclick="globalThis.runOrderPage(\'' + r + '\')" id="head-' + t + '" data-head-' + r + ' class="head">' + lopin + '  <i icon-order-' + r + ' onclick="globalThis.runOrderPage(\'' + r + '\')" class="fas fa-sort mt-1"></i></div>';
        }
    }).join(" ")
    if (act.data.addRow != undefined) {
        let objAddRow = Object.keys(act.data.addRow);
        setGrid += ' ' + objAddRow.map(function(er) {
            return 'auto';
        }).join(" ")
        setGridName += objAddRow.map(function(er) {
            let ef = act.data.addRow[er].title;
            return ` <div id="head-'${t}'" class="head">${ef}</div> `;
        }).join("")
    }
    let wrap = 'white-space: nowrap;';
    if (act.data.wrap != undefined) {
        wrap = act.data.wrap;
    }
    let loadTable = `
    <div class="form-e">
        <style>
            #${t}{
                display: grid;
                grid-template-columns: ${setGrid};
                overflow-y: auto;
            }
            #${t}-h{
                display: grid;
                grid-template-columns: ${setGrid};
                overflow-y: auto;
            }
            #${t} > div{
                font-size: 8pt;
                padding: 8px 8px;
                border-top: 1px solid #ddd;
                color: #333;
                background: #f8f9fc;
                min-width: 120px;
            }
            #${t}-h .head{
                background: #f8f9fc;
                color: #333;
                padding: 5px 8px;
                text-align: left;
            }
            #${t}-h{
              position: relative;
              z-index: 999;
              box-shadow: 0 5px 10px rgba(125,125,125,0.4);
              margin:0 !important;
            }
            #${t}-h{
              padding-bottom: 2px;
              border-top: 1px solid #ddd;
            }
            #${t}-h div{
              padding: 4px 0;
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
        </style>
    `;
    let newCreateBtn = '';
    if (disableNew == false) {
        newCreateBtn = `
        <div id='button-area'>
            ${act.data.indexOfHead}
            <h3>${act.data.title}</h3>
            <button class="btn btn-sm btn-primary mb-3" id="tambah-${t}"> <i class="fas fa-circle-plus"></i> Tambah</button>
            <button onclick="globalThis.orderTmenus('${t}order')" class="btn btn-sm btn-primary mb-3"> <i class="fas fa-sort"></i> </button>
            <span id="${t}-loader-r" style="margin-left: 10px; display:none;">
                <div class="spinner-border" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
            </span>
            ${act.data.customeH}
        </div>
        `;
        if (act.data.search != undefined) {
            newCreateBtn += `
            <div id='search-area'>
                <input id="cari-${t}" style="width: 100%; max-width: 350px;" class="search-table" value="${act.data.search}" placeholder="enter for search">
                <div id="pagin-menu" class="float-right d-flex align-items-center bottom-nav mt-2">
                    <span style="display: inline-block;"></span>
                    <span>
                        <span style="display: inline-block;padding: 0 10px;margin:0;"><span style="display: inline-block;margin:0;"> ${(Number(pagination[act.data.table]) + bataspagin) / bataspagin } / ${Math.ceil(totData[act.data.table] / bataspagin)} </span> </span>
                         <div style=" display: inline-block; ">
                             <ul class="pagination" style="padding:0; ">
                              <li class="page-item"><a id="prev-${t}" style="cursor: pointer; padding: 5px 10px;" class="page-link"><</a></li>
                              <li class="page-item"><a id="next-${t}" style="cursor: pointer; padding: 5px 10px;" class="page-link">></a></li>
                            </ul>
                        </div>
                    </span>
                     <span id="new-action-pagin">
                     </span>
                </div>
            </div>
            `;
        } else {
            newCreateBtn += `
            <div  id='search-area'>
                <input id="cari-${t}"  style="width: 100%; max-width: 350px;" class="search-table" placeholder="enter for search">
                <div id="pagin-menu" class="float-right d-flex align-items-center bottom-nav mt-2">
                    <span style="display: inline-block;"></span>
                    <span>
                        <span style="display: inline-block;padding: 0 10px;margin:0;"><span style="display: inline-block;margin:0;"> ${(Number(pagination[act.data.table]) + bataspagin) / bataspagin } / ${Math.ceil(totData[act.data.table] / bataspagin)} </span> </span>
                         <div style=" display: inline-block; ">
                             <ul class="pagination" style="padding:0; ">
                              <li class="page-item"><a id="prev-${t}" style="cursor: pointer; padding: 5px 10px;" class="page-link"><</a></li>
                              <li class="page-item"><a id="next-${t}" style="cursor: pointer; padding: 5px 10px;" class="page-link">></a></li>
                            </ul>
                        </div>
                    </span>
                     <span id="new-action-pagin">
                     </span>
                </div>
            </div>
            `;
        }
    }
    let back = '';
    if (act.data.back != undefined) {
        back = `
            <button class="btn btn-light mt-3" onclick="location.href='#/${act.data.back}'">kembali</button>
        `;
    }
    act.data.tottb = Math.ceil(totData[act.data.table] / bataspagin);
    let setContentData = `
        <div onscroll="globalThis.scrollEveTable(this, 'h')" id="${t}-h">
            ${setGridName}
        </div>
        <div onscroll="globalThis.scrollEveTable(this, 'r')" id="${t}">
            ${dataLoad}
        </div>
    `;
    if (act.data.customeView != undefined) {
        if (act.data.customeView == true) {
            setContentData = `
                <div id="custome-${t}">
                </div>
            `;
        }
    }
    loadTable += `
    <div id='${t}-loader' style="display: none;">
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
    </div>
    <div class="head-data-content" style>
        <div class="head-seach">
            ${newCreateBtn}
            <div style="clear:both;"></div>
        </div>
    </div>
    ${setContentData}
    ${back}
    </div>
    `;
    // make modal
    loadTable += `
    <div class="form-d" id="${t}-form-d">
        <form id="${t}-form" autocomplete="off">
            <div id="${t}-form-head" class="container-fluid bg-light p-3" style="box-shadow: 0 10px 10px #ddd;position:relative; z-index:99;">
                <h5 class="modal-title" id="m${t}"></h5>
                <div class="d-flex align-items-center" style="height: 50px;">
                <button id="close${t}" type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> <i class="fas fa-close"></i> Tutup</button>
                <button id="hapus${t}" type="button" class="ml-2 btn btn-sm btn-danger"> <i class="fas fa-circle-minus"></i> Hapus</button>
                <button id="simpan${t}" type="button" class="ml-2 btn btn-sm btn-primary"> <i class="fas fa-save"></i> Simpan</button>
                <span id="${t}-loader-h" style="margin-left: 10px; display:none;">
                    <div class="spinner-border" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
                </span>
                </div>
            </div>
            <div id="${t}-form-content">
                <div class="container mt-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" id="form-get-app${t}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>`;
    let orderForm = Object.keys(act.data.row).map((er) => {
        let opt = [{
            value: '',
            data: 'Pilih Order'
        }, {
            value: 'ASC',
            data: 'ASC'
        }, {
            value: 'DESC',
            data: 'DESC'
        }];
        let setVal = '';
        let cekDOrder = act.data.multiOrder.filter((e, o) => {
            if (e.name == er) {
                return e;
            }
        })
        if (cekDOrder.length > 0) {
            setVal = cekDOrder[0].val;
        }
        let makeSelection = opt.map(function(cj, i) {
            if (setVal == cj.value) {
                return `
                    <option selected value="${cj.value}">${cj.data}</option>
                `;
            } else {
                return `
                    <option value="${cj.value}">${cj.data}</option>
                `;
            }
        })
        return `
            <div class="form-group row">
                <div class="col-6">
                    ${act.data.row[er]}
                </div>
                <div class="col-6">
                    <select class="form-control" data-order-f-${t}="${er}" id="order-${er}">
                        ${makeSelection}
                    </select>
                </div>
            </div>
        `;
    }).join(' ')
    loadTable += `
        <div id="${t}order" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ${orderForm}
                </div>
                <div class="modal-footer">
                    <button onclick="globalThis.loadFilterOrder('data-order-f-${t}', '${t}order')" type="button" class="btn btn-primary">Order</button>
                </div>
                </div>
            </div>
        </div>
    `;
    // action Table
    globalThis.runOrderPage = function(urutRow) {
        // console.log(urutRow);
    }
    globalThis.orderTmenus = function(id) {
        $('#' + id).modal('show');
    }
    globalThis.scrollEveTable = function(e, h) {
        if (h == 'h') {
            let gh = document.getElementById(act.data.id)
            gh.scrollLeft = e.scrollLeft;
        } else {
            let gh = document.getElementById(act.data.id + '-h')
            gh.scrollLeft = e.scrollLeft;
        }
    }
    globalThis.loadFilterOrder = function(s, id) {
        let getVal = Array.from(document.querySelectorAll('[' + s + ']')).map((m, n) => {
            let name = m.getAttribute(s);
            let val = m.value;
            return {
                name: name,
                val: val
            }
        })
        getVal = getVal.filter((s) => {
            if (s.val != '') {
                return s;
            }
        })
        $('#' + id).modal('toggle');
        act.data.multiOrder = getVal;
        act.load();
    }
    globalThis.tableScroll = function() {
        let scrollHid = document.getElementById(act.data.id + '-h');
        let scrollid = document.getElementById(act.data.id);
        if (scrollHid != undefined) {
            scroller(act.data.id + '-h');
        }
        if (scrollid != undefined) {
            scroller(act.data.id);
        }
        setTimeout(function() {
            let g = document.getElementById(act.data.id + '-form-content')
            console.log(g.offsetTop);
            g.style.height = 'calc(100vh - ' + g.offsetTop + 'px)';
            g.style.overflow = "auto";
        }, 100)
    }
    globalThis.reSizeCol = function() {
        Object.keys(act.data.row).forEach((a, i) => {
            Array.from(document.querySelectorAll('[data-head-' + i + ']')).forEach((e, v) => {
                e.style.width = 'auto';
            })
            Array.from(document.querySelectorAll('[data-row-' + i + ']')).forEach((e, v) => {
                e.style.width = 'auto';
            })
        })
        let b = document.getElementById(act.data.id + '-h')
        let nv = document.getElementById('navbar')
        let f = document.querySelector('.head-data-content')
        let hT;
        if (b != undefined) {
            hT = b.clientHeight + f.clientHeight + nv.clientHeight;
        }
        let tBodyH = document.getElementById(act.data.id)
        // console.log(tBodyH)
        if (tBodyH != undefined) {
            tBodyH.style.maxHeight = 'calc(100vh - ' + hT + 'px)';
            tBodyH.style.overflowY = 'auto';
            setTimeout(() => {
                let enumb = Object.keys(act.data.row).forEach((a, i) => {
                    let ef = document.querySelector('[data-head-' + i + ']')
                    let row = document.querySelector('[data-row-' + i + ']')
                    let rwt = document.getElementById(act.data.id);
                    let wd = row.clientWidth;
                    if (i == Object.keys(act.data.row).length - 1) {
                        wd += rwt.offsetWidth - rwt.clientWidth;
                    }
                    Array.from(document.querySelectorAll('[data-head-' + i + ']')).forEach((e, v) => {
                        e.style.width = Math.round(wd) + 'px';
                    })
                })
                $(window).resize(function() {
                    let b = document.getElementById(act.data.id + '-h')
                    let nv = document.getElementById('navbar')
                    let f = document.querySelector('.head-data-content')
                    let hT = b.clientHeight + f.clientHeight + nv.clientHeight;
                    let tBodyH = document.getElementById(act.data.id)
                    tBodyH.style.maxHeight = 'calc(100vh - ' + hT + 'px)';
                    tBodyH.style.overflowY = 'auto';
                    let enumb = Object.keys(act.data.row).forEach((a, i) => {
                        let ef = document.querySelector('[data-head-' + i + ']')
                        let row = document.querySelector('[data-row-' + i + ']')
                        let wd = row.clientWidth;
                        let rwt = document.getElementById(act.data.id);
                        if (i == Object.keys(act.data.row).length - 1) {
                            wd += rwt.offsetWidth - rwt.clientWidth;
                        }
                        Array.from(document.querySelectorAll('[data-head-' + i + ']')).forEach((e, v) => {
                            e.style.width = Math.round(wd) + 'px';
                        })
                    })
                })
            })
        }
    }
    if (dat.length == 0) {
        loadTable += `
            <div class="text-center pd-5 pt-3">
                Belum ada data inputan
            </div>
        `;
    }
    if (this.data.afterload != undefined) {
        function loadSfIle() {
            document.getElementById(this.data.element).innerHTML = loadTable;
            act.newData();
            act.data.headContent = document.querySelector('.head-data-content');
            act.data.bodyContent = document.querySelector('#custome-' + act.data.id);
            act.data.formContent = document.querySelector('#' + act.data.id + '-form');
            act.data.formH = document.querySelector('#' + act.data.id + '-form-head');
            act.data.formB = document.querySelector('#' + act.data.id + '-form-content');
            act.data.formd = document.querySelector('#' + act.data.id + '-form-d');
            globalThis.reSizeCol();
            globalThis.tableScroll();
            if (act.data.addRow != undefined) {
                setTimeout(function() {
                    actAddRow();
                    let enumb = Object.keys(act.data.row)
                    globalThis.reSizeCol();
                    // console.log(enumb)
                }, 1000)
            }
        }

        function newAct() {
            act.newData();
        }
        this.data.afterload(act, new db, loadSfIle, newAct);
    } else {
        document.getElementById(this.data.element).innerHTML = loadTable;
        act.data.formContent = document.querySelector('#' + act.data.id + '-form');
        act.data.formd = document.querySelector('#' + act.data.id + '-form-d');
        act.data.formH = document.querySelector('#' + act.data.id + '-form-head');
        act.data.formB = document.querySelector('#' + act.data.id + '-form-content');
        act.newData();
        globalThis.reSizeCol();
        globalThis.tableScroll();
        if (act.data.addRow != undefined) {
            setTimeout(function() {
                let enumb = Object.keys(act.data.row)
                //   console.log(enumb)
                actAddRow();
                globalThis.reSizeCol();
                globalThis.tableScroll();
            }, 1000)
        } else {
            globalThis.reSizeCol();
            globalThis.tableScroll();
        }
    }
},