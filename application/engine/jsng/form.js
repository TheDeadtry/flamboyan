const tr_form = function() {
    return {
        data: {
            id: 'id' + Date.now(),
            objform: null,
            idData: null,
            group: null,
            htmlForm: null,
        },
        create: function(obj) {
            let group = null;
            if (this.data.group != undefined) {
                group = this.data.group;
            }
            let newForm = '';
            let eform = this.data.objform = obj;
            let keys = this.data.idData = Object.keys(obj);
            /*let listType = {
                number,
                date,
                daterange,
                time,
                datetime,
                dateyear,
                datemonth,
                dateweek,
                password,
                hidden,
                readonly,
                checkbox,
                radio,
                image,
                disable,
                select,
                textarea,
                multiselect,
                slider,
                color,
                email,
                file,
                phone,
            }*/
            let formP = keys.map(function(index) {
                let groupStart = "";
                let groupEnd = "";
                let getArr = obj[index];
                let getObj = {
                    type: getArr[0],
                    placeholder: getArr[1],
                    title: getArr[2],
                }
                if (typeof getArr[3] !== 'undefined') {
                    getObj = Object.assign(getObj, getArr[3]);
                }
                if (group != null) {
                    let gK = Object.keys(group);
                    for (const gk of gK) {
                        for (const gmap of group[gk]) {
                            if (gmap.start == index) {
                                groupStart = `
                                    <div class="${gk}">
                                        <div class="row">
                                `;
                            }
                            if (gmap.end == index) {
                                groupEnd = `
                                        </div>
                                    </div>
                                `;
                            }
                        }
                    }
                }
                // cek colom
                if (getObj.typeColumns == undefined) {
                    getObj.typeColumns = "";
                } else {
                    getObj.typeColumns = "-" + getObj.typeColumns;
                }
                if (getObj.columns == undefined) {
                    getObj.columns = "-12";
                } else {
                    getObj.columns = "-" + getObj.columns;
                }
                // if input method;
                let label = '<label></label>';
                if (getObj.title != undefined) {
                    label = `
                        <label for="${index}">${getObj.title}</label>
                    `;
                }
                let descripsi = '';
                if (getObj.description != undefined) {
                    descripsi = getObj.description
                }
                let vDefault = '';
                if (getObj.default != undefined) {
                    vDefault = ` value="${getObj.default}" `;
                }
                let values = '';
                if (getObj.value != undefined) {
                    values = getObj.value;
                }
                let head = '';
                if (getObj.head != undefined) {
                    head = `
                        <div class="col-12 mt-3">
                            <h5 style="font-weight: bold;">${getObj.head}</h5>
                        </div>
                    `;
                }
                if (getObj.type == 'date') {
                    let valueTanggal = tanggal().normal;
                    valueTanggal = (values != '') ? values : tanggal().normal;
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                    <input type="${getObj.type}" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${valueTanggal}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'slug') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <input ${vDefault} type="text" readonly="true" style="background: #ddd;" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${values}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'password') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}" style='position:relative;'>
                            <div class="form-group-2 passwd">
                                ${label}
                                <div>
                                    <input ${vDefault} type="${getObj.type}" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${values}" >
                                </div>
                                <i id='show-${index}' class="fas fa-eye-slash eypass" onclick='document.getElementById("${index}").type = "text";this.style.display="none"; document.getElementById("hide-${index}").style.display = "inline-block"; ';></i>
                                <i id='hide-${index}' class="fas fa-eye eypass" style="display:none;" onclick='document.getElementById("${index}").type = "password";this.style.display="none"; document.getElementById("show-${index}").style.display = "inline-block"; '></i>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'number') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <input ${vDefault} type="text" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${values}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'hidden') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2" style="display:none;">
                                ${label}
                                <div>
                                <input ${vDefault} type="hidden" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${values}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'readonly') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <input ${vDefault} type="text" style="background: #ddd;" readonly="true" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${values}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'textarea') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <textarea id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${values}" >${values}</textarea>
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'disable') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div id="f-${index}" class="form-group-2">
                                ${label}
                                <div>
                                <input  ${vDefault} type="text" id="${index}" disabled class="form-control-2" placeholder="${getObj.placeholder}" value="${values}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'select') {
                    if (getObj.title != undefined) {
                        label = `
                            <label class="label-select" for="${index}">${getObj.title}</label>
                        `;
                    }
                    let grid = '';
                    for (const inserView of getObj.view) {
                        grid += ' auto ';
                    }
                    if (globalThis.listdata == undefined) {
                        globalThis.listdata = {}
                    }
                    globalThis.listdata[index] = function() {
                        let dataSelect = tr_db().table(getObj.table).get();
                        dataSelect = dataSelect.map(function(rData) {
                            let valh = rData[getObj.value];
                            let x = 0;
                            let view = '';
                            for (const inserView of getObj.view) {
                                if (x == 0) {
                                    view += rData[inserView];
                                } else {
                                    view += ' ' + rData[inserView];
                                }
                                x++;
                            }
                            return `<option value="${valh}">${view}</option>`;
                        }).join("")
                        return dataSelect;
                    }
                    return `
                        <style>
                            .select-choice{
                                display: grid;
                                grid-template-columns: ${grid};
                            }
                        </style>
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                <input type="search" class="select-search" id="search-choice-${index}">
                                <div class="select-choice" id="choice-${index}">
                                    ${globalThis.listdata[index]()}
                                </div>
                                ${label}
                                <div>
                                    <select id="${index}" class="form-control-2" >
                                    <option value="">Pilih Data</option>
                                    ${globalThis.listdata[index]()}
                                    </select>
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <input ${vDefault} type="${getObj.type}" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${values}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                }
            }).join(" ")
            this.data.htmlForm = formP;
            return this;
        },
        get: function() {
            let loadTable = `
                <style>
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
            return loadTable+this.data.htmlForm;
        },
    }
}
