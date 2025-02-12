const tr_crud = function(elementName) {
    return {
        data: {
            id: 'id' + Date.now(),
            element: elementName,
            table: '',
            formId: 'form-get-app',
            objform: null,
            primarykey: null,
            multiOrder: [],
            indexOfHead: '',
            customeH: '',
            idUpdate: 0,
            key: "id",
            formatId: function(format, x) {
                let str = "" + x
                let pad = format;
                let ans = pad.substring(0, pad.length - str.length) + str
                return ans;
            },
            title: null,
            disableCreateR: false,
            delay: function(callback, ms) {
                let timer = 0;
                return function() {
                    let context = this,
                        args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(function() {
                        callback.apply(context, args);
                    }, ms || 0);
                };
            },
            condCus: []
        },
        table: function(a) {
            this.data.table = a;
            return this;
        },
        primarykey: function(a) {
            this.data.primarykey = a;
            return this;
        },
        key: function(a) {
            this.data.key = a;
            return this;
        },
        condCus: function(a = []) {
            this.data.condCus = a;
        },
        validate: function(a) {
            this.data.validate = a;
            return this;
        },
        custForm: function() {
            this.data.custForm = true;
            return this;
        },
        decodeHtml: function(text) {
            return text
                .replace(/&amp;/g, '&')
                .replace(/&lt;/g, '<')
                .replace(/&gt;/g, '>')
                .replace(/&quot;/g, '"')
                .replace(/&#039;/g, "'");
        },
        custView: function() {
            this.data.customeView = true;
            return this;
        },
        back: function(a) {
            this.data.back = a;
            return this;
        },
        select: function(a) {
            this.data.select = a;
            return this;
        },
        wrap: function(a) {
            this.data.wrap = a;
            return this;
        },
        order: function(a, b) {
            this.data.order = {
                start: a,
                end: b
            };
            return this;
        },
        disableback: function() {
            this.data.disableback = true;
            return this;
        },
        displayNone: function(a) {
            this.data.none = a;
            return this;
        },
        selectAction: function(a) {
            this.data.selectAction = a;
            return this;
        },
        filter: function(a) {
            this.data.filter = a;
            return this;
        },
        afterload: function(func) {
            this.data.afterload = func;
            return this;
        },
        onupdate: function(a) {
            this.data.onupdate = a;
            return this;
        },
        customeH: function(a) {
            this.data.customeH = a;
            return this;
        },
        onsave: function(a) {
            this.data.onsave = a;
            return this;
        },
        oncreate: function(a) {
            this.data.oncreate = a;
            return this;
        },
        grouping: function(a = {}) {
            this.data.group = a;
            return this;
        },
        onback: function(a) {
            this.data.backFunc = a;
            return this;
        },
        modal: function(e = "") {
            if (e != "") {
                e = "modal-" + e;
            }
            this.data.modal = e;
            return this;
        },
        title: function(a) {
            this.data.title = a;
            return this;
        },
        typeTable: function(a = 'master') {
            this.data.typeTable = a;
            return this;
        },
        row: function(dat) {
            this.data.row = dat;
            return this;
        },
        addRow: function(a) {
            this.data.addRow = a;
            return this;
        },
        edt: function(e) {
            this.data.edt = e;
            return this;
        },
        equals: function(obj) {
            this.data.equals = obj;
            return this;
        },
        disCreate: function() {
            this.data.disableCreateR = true;
            return this;
        },
        createForm: function(obj) {
            /*let group = null;
            if (this.data.group != undefined) {
                group = this.data.group;
            }*/
            let newForm = '';
            let eform = this.data.objform = obj;
            let keys = this.data.idData = Object.keys(obj);
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
                }console.log(getObj);
                /*if (group != null) {
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
                }*/
                // cek colom
                /*if (getObj.typeColumns == undefined) {
                    getObj.typeColumns = "";
                } else {
                    getObj.typeColumns = "-" + getObj.typeColumns;
                }
                if (getObj.columns == undefined) {
                    getObj.columns = "-12";
                } else {
                    getObj.columns = "-" + getObj.columns;
                }*/
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
                let head = '';
                if (getObj.head != undefined) {
                    head = `
                        <div class="col-12 mt-3">
                            <h5 style="font-weight: bold;">${getObj.head}</h5>
                        </div>
                    `;
                }
                if (getObj.type == 'date') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                    <input type="${getObj.type}" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${tanggal().normal}" >
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
                                <input ${vDefault} type="text" readonly="true" style="background: #ddd;" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
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
                                    <input ${vDefault} type="${getObj.type}" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
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
                                <input ${vDefault} type="text" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
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
                                <input ${vDefault} type="hidden" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
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
                                <input ${vDefault} type="text" style="background: #ddd;" readonly="true" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'note') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <textarea height="400px" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${tanggal().normal}" ></textarea>
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'area') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <textarea id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${tanggal().normal}" ></textarea>
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
                                <textarea id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${tanggal().normal}" ></textarea>
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
                                <input  ${vDefault} type="text" id="${index}" disabled class="form-control-2" placeholder="${getObj.placeholder}" >
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
                    globalThis.listdata[index] = function(fill = null, relation = null) {
                        let dataSelect = dataMaster[getObj.table];
                        let relationTable = null;
                        let relationValue = null;
                        if (relation != null) {
                            let relationTable = eform[relation].table;
                            let relationValue = eform[relation].value;
                        }
                        if (document.getElementById(relation) != null) {
                            let relatVal = document.getElementById(relation).value;
                            let datasel = dataMaster[relationTable].filter(function(et) {
                                if (et[relationValue] == relatVal) {
                                    return et;
                                }
                            })
                            if (datasel.length > 0) {
                                if (getObj.relationSet != undefined) {
                                    relatVal = datasel[0][getObj.relationSet];
                                }
                                let par = eform[relation];
                                dataSelect = dataSelect.filter(function(es) {
                                    if (es[getObj.relationId] == relatVal) {
                                        return es;
                                    }
                                })
                            } else {
                                dataSelect = [];
                            }
                        }
                        dataSelect = dataSelect.map(function(rData, v) {
                            let valh = rData[getObj.value];
                            let x = 0;
                            let contenthtml = '';
                            let content = {}
                            for (const inserView of getObj.view) {
                                if (fill == null) {
                                    if (x == 0) {
                                        let view = '';
                                        content.key = valh;
                                        content.data = rData;
                                        content.title = rData[inserView];
                                        view += rData[inserView];
                                        contenthtml += `<option value="${content.key}">${view}</option>`;
                                    } else {
                                        let view = '';
                                        view += ' ' + rData[inserView];
                                        contenthtml += `<option value="${content.key}">${view}</option>`;
                                    }
                                    x++;
                                } else {
                                    let cek = 0;
                                    let arrc = Object.keys(rData);
                                    for (const cekl of arrc) {
                                        if (rData[cekl] != null) {
                                            if (rData[cekl].toLowerCase().indexOf(fill.toLowerCase()) != -1) {
                                                cek = 1;
                                            }
                                        }
                                    }
                                    if (cek == 1) {
                                        if (x == 0) {
                                            let view = '';
                                            content.key = valh;
                                            content.data = rData;
                                            content.title = rData[inserView];
                                            view += rData[inserView];
                                            contenthtml += `<option value="${content.key}">${view}</option>`;
                                        } else {
                                            let view = '';
                                            view += ' ' + rData[inserView];
                                            contenthtml += `<option value="${content.key}">${view}</option>`;
                                        }
                                    }
                                    x++;
                                }
                            }
                            return contenthtml;
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
                                <input ${vDefault} type="${getObj.type}" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
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
        newData: function() {
            let t = this.data.id;
            let htmlForm = this.data.htmlForm;
            let title = this.data.title;
            let cari = "cari-" + t;
            let idN = "tambah-" + t;
            let simpan = "simpan" + t;
            let loaders = t + "-loader";
            let close = "close" + t;
            let hapus = "hapus" + t;
            let idM = "#modal" + t;
            let idm = "m" + t;
            let update = "[data-update" + t + "]";
            let dataUpdate = "data-update" + t;
            let loadForm = this;
            let pagination = this.data.pagination;
            let totb = this.data.tottb;
            let tbl = this.data.table;
            let startPage = this.data.pagination[this.data.table];
            let totPage = this.data.totData[tbl];
            let bataspagin = this.data.bataspagin;
            if (document.getElementById(cari) != undefined) {
                document.getElementById(cari).addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        loadForm.data.pagination[loadForm.data.table] = 0;
                        loadForm.data.search = this.value;
                        loadForm.load();
                    }
                }, false)
            }
            document.getElementById(close).addEventListener('click', function() {
                if (loadForm.data.backFunc != undefined) {
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
                    loadForm.data.backFunc(loadForm);
                } else {
                    document.getElementById(loadForm.data.id + '-loader-h').style.display = 'inline-block';
                    loadForm.load();
                }
            }, false)
            document.getElementById("prev-" + t).addEventListener('click', function() {
                if ((Number(startPage) - bataspagin) < 0) {
                    Swal.fire('anda berada di halaman awal', '', 'info')
                } else {
                    pagination[loadForm.data.table] = startPage - bataspagin;
                    loadForm.load();
                }
            }, false)
            document.getElementById("next-" + t).addEventListener('click', function() {
                if ((Number(startPage) + bataspagin) >= Number(totPage)) {
                    Swal.fire('anda berada di halaman akhir', '', 'info')
                } else {
                    pagination[loadForm.data.table] = startPage + bataspagin;
                    loadForm.load();
                }
            }, false)
            Array.from(document.querySelectorAll(update)).forEach(function(elupdate, i) {
                elupdate.addEventListener('click', function() {
                    document.getElementById(hapus).style.display = 'inline-block';
                    let tF = 'form-get-app' + t;
                    let getData = binary2text(this.getAttribute(dataUpdate));
                    for (const indexd of Object.keys(getData)) {
                        if (getData[indexd] == null) {
                            delete getData[indexd];
                        }
                    }
                    let gdhi = Object.keys(getData).map(function(j, i) {
                        if (i == 0) {
                            return {
                                opsi: '',
                                data: [j, '=', `'${getData[j].replace(/\'/g,'\\\'')}'`]
                            }
                        } else {
                            return {
                                opsi: 'AND',
                                data: [j, '=', `'${getData[j].replace(/\'/g,'\\\'')}'`]
                            }
                        }
                    })
                    document.querySelector('#' + loaders + '-r').style.display = 'inline-block';
                    tr_db().table(loadForm.data.table).condition(gdhi).get(function(res) {
                        document.querySelector('.form-e').style.display = 'none';
                        if (res.length > 0) {
                            globalThis.EditData = res[0];
                        }
                        if (loadForm.data.custForm == true) {
                            loadForm.data.onupdate()
                            throw Error();
                        }
                        loadForm.data.loadDataEdit = getData;
                        loadForm.data.idUpdate = true;
                        document.getElementById(idm).innerText = 'Ubah ' + title;
                        document.querySelector('.form-d').style.display = 'block';
                        document.querySelector('#' + loaders).style.display = 'none';
                        let htmlForm = loadForm.data.htmlForm
                        document.getElementById(tF).innerHTML = htmlForm;
                        let g = document.getElementById(loadForm.data.id + '-form-content')
                        if (g != undefined) {
                            console.log(g.offsetTop);
                            g.style.height = 'calc(100vh - ' + g.offsetTop + 'px)';
                            g.style.overflow = "auto";
                        }
                        setTimeout(function() {
                            Object.keys(loadForm.data.objform).forEach(function(e) {
                                if (loadForm.data.objform[e].type == 'number') {
                                    document.getElementById(e).addEventListener('keyup', function() {
                                        let eva = this.value;
                                        eva = eva.replace(/\./g, '');
                                        this.value = formatRupiah(eva);
                                    }, false)
                                }
                                if (loadForm.data.objform[e].change != undefined) {
                                    document.getElementById(e).addEventListener('change', loadForm.data.objform[e].change, false);
                                }
                            })

                            function decodeHtml(text) {
                                return text
                                    .replace(/&amp;/g, '&')
                                    .replace(/&lt;/g, '<')
                                    .replace(/&gt;/g, '>')
                                    .replace(/&quot;/g, '"')
                                    .replace(/&#039;/g, "'");
                            }
                            getData = res[0];
                            loadForm.data.idData.forEach(function(pol) {
                                if (getData[pol] != null) {
                                    if (loadForm.data.objform[pol].type == "number") {
                                        let numx = Number(getData[pol]).toFixed(0).toString();
                                        document.getElementById(pol).value = formatRupiah(numx);
                                    } else if (loadForm.data.objform[pol].type == "select") {
                                        let table = dataMaster[loadForm.data.objform[pol].table];
                                        let val = loadForm.data.objform[pol].value;
                                        let vw = loadForm.data.objform[pol].view;
                                        table = table.filter(function(es) {
                                            if (es[val] == getData[pol]) {
                                                return es;
                                            }
                                        })
                                        let tab = null;
                                        let ops = "";
                                        let names = " pilih data ";
                                        if (table.length > 0) {
                                            tab = table[0];
                                            ops = tab[val];
                                            names = vw.map(function(elop) {
                                                return tab[elop];
                                            }).join(' ');
                                        }
                                        $("#" + pol).select2();
                                        let formSet = loadForm.data.objform[pol];
                                        if (formSet.pin != undefined) {
                                            let stable = loadForm.data.objform[formSet.pin];
                                            let stableRid = stable.relationId;
                                            let stableRval = getData[formSet.pin];
                                            let geTble = dataMaster[stable.table].filter(function(o, i) {
                                                if (o[stable.value] == stableRval) {
                                                    return o;
                                                }
                                            });
                                            if (geTble.length > 0) {
                                                geTble = geTble[0];
                                            }
                                            if (stable.key != undefined) {
                                                stableRval = geTble[stable.key];
                                            }
                                            let ntable = dataMaster[formSet.table];
                                            let valn = formSet.value;
                                            let viewn = formSet.view;
                                            let optn = ntable
                                                .filter(function(x, i) {
                                                    if (x[stableRid] == stableRval) {
                                                        return x;
                                                    }
                                                }).map(function(x, i) {
                                                    let optname = '';
                                                    for (let l of viewn) {
                                                        optname += x[l] + ' ';
                                                    }
                                                    if (x[valn] == ops) {
                                                        return `
                                            <option selected value="${x[valn]}">${optname}</option>
                                            `;
                                                    } else {
                                                        return `
                                            <option value="${x[valn]}">${optname}</option>
                                            `;
                                                    }
                                                }).join("\n")
                                            document.getElementById(pol).innerHTML = optn;
                                        } else {
                                            let ntable = dataMaster[formSet.table];
                                            let valn = formSet.value;
                                            let viewn = formSet.view;
                                            let optn = ntable.map(function(x, i) {
                                                let optname = '';
                                                for (let l of viewn) {
                                                    optname += x[l] + ' ';
                                                }
                                                if (x[valn] == ops) {
                                                    return `
                                            <option selected value="${x[valn]}">${optname}</option>
                                          `;
                                                } else {
                                                    return `
                                            <option value="${x[valn]}">${optname}</option>
                                          `;
                                                }
                                            }).join("\n")
                                            document.getElementById(pol).innerHTML = optn;
                                        }
                                    } else if (loadForm.data.objform[pol].type == "note") {
                                        document.getElementById(pol).value = decodeHtml(atob(getData[pol]));
                                    } else {
                                        document.getElementById(pol).value = decodeHtml(getData[pol]);
                                    }
                                }
                            })
                            if (loadForm.data.onupdate != undefined) {
                                setTimeout(function() {
                                    loadForm.data.onupdate(loadForm, getData, new db);
                                }, 100)
                            }
                            setTimeout(function() {
                                document.getElementById(loadForm.data.idData[0]).focus();
                            }, 500)
                            setTimeout(function() {
                                if (loadForm.data.equals != undefined) {
                                    for (const eq of loadForm.data.equals) {
                                        document.getElementById(eq).addEventListener('keyup', loadForm.data.delay(function() {
                                            let getVals = []
                                            let n = 0;
                                            for (const es of loadForm.data.equals) {
                                                let vals = document.getElementById(es).value.replace(/\"/g, "\\\"");
                                                if (n == 0) {
                                                    getVals.push({
                                                        opsi: "",
                                                        data: [es, '=', `"${vals}"`]
                                                    })
                                                } else {
                                                    getVals.push({
                                                        opsi: "AND",
                                                        data: [es, '=', `"${vals}"`]
                                                    })
                                                }
                                                n++;
                                            }
                                            // update set value
                                            if (res.length > 0) {
                                                let a = res;
                                                let keysRow = Object.keys(loadForm.data.objform);
                                                let objUpdt = {}
                                                for (const lpp of keysRow) {
                                                    if (loadForm.data.objform[lpp].type == "select") {
                                                        document.getElementById(lpp).value = a[0][lpp];
                                                        $('#' + lpp).val(a[0][lpp]).trigger('change');
                                                    } else if (loadForm.data.objform[lpp].type == "number") {
                                                        document.getElementById(lpp).value = formatRupiah(a[0][lpp]);
                                                    } else {
                                                        document.getElementById(lpp).value = a[0][lpp];
                                                    }
                                                    objUpdt[lpp] = a[0][lpp];
                                                }
                                                if (loadForm.data.onupdate != undefined) {
                                                    setTimeout(function() {
                                                        loadForm.data.onupdate(loadForm, a, new db);
                                                    }, 100)
                                                }
                                                document.getElementById(idm).innerText = 'Ubah ' + title;
                                                loadForm.data.loadDataEdit = objUpdt;
                                                loadForm.data.idUpdate = true;
                                                document.getElementById(hapus).style.display = 'inline-block';
                                            } else {
                                                document.getElementById(idm).innerText = 'Tambah ' + title;
                                                loadForm.data.loadDataEdit = {};
                                                loadForm.data.idUpdate = null;
                                                document.getElementById(hapus).style.display = 'none';
                                                let keysRow = Object.keys(loadForm.data.objform);
                                                for (const lpp of keysRow) {
                                                    if (loadForm.data.equals.indexOf(lpp) == -1) {
                                                        document.getElementById(lpp).value = '';
                                                        if (loadForm.data.oncreate != undefined) {
                                                            loadForm.data.oncreate(loadForm, new db);
                                                        }
                                                        if (loadForm.data.objform[lpp].type == "select") {
                                                            $('#' + lpp).val(null).trigger('change');
                                                        }
                                                    }
                                                }
                                            }
                                        }, 500), false)
                                    }
                                }
                                document.getElementById(loadForm.data.idData[0]).focus()
                                for (const dataid of loadForm.data.idData) {
                                    if (loadForm.data.objform[dataid].type == 'note' || loadForm.data.objform[dataid].type == 'textarea') {
                                        let s = Array.from(document.querySelectorAll('.note-editable'))
                                        for (const yi of s) {
                                            yi.addEventListener('focus', function() {
                                                // Array.from(document.querySelectorAll('.select-choice')).forEach(function(elm, i){
                                                //     elm.style.display = 'none';
                                                // })
                                                //
                                                // Array.from(document.querySelectorAll('.select-search')).forEach(function(elm, i){
                                                //     elm.style.display = 'none';
                                                // })
                                            }, false)
                                        }
                                    }
                                    if (loadForm.data.objform[dataid].type == 'select') {
                                        document.getElementById(dataid).addEventListener('focus', function() {
                                            if (loadForm.data.objform[dataid].relationChange == undefined) {} else {
                                                let idRelation = loadForm.data.objform[dataid].relationChange;
                                                let dataParent = dataMaster[dataid];
                                                let parenCode = loadForm.data.objform[dataid].value;
                                                let parenView = loadForm.data.objform[dataid].view;
                                                let mainid = loadForm.data.objform[dataid].relationId;
                                                let kodemain = loadForm.data.objform[dataid].value;
                                                let main = loadForm.data.objform[idRelation].table;
                                                let kode = loadForm.data.objform[idRelation].value;
                                                let getVal = document.getElementById(idRelation).value;
                                                let dataMain = dataMaster[main].filter(function(lop) {
                                                    if (lop[kode] == getVal) {
                                                        return lop
                                                    }
                                                });
                                                if (dataMain.length > 0) {
                                                    let mdata = dataMain[0];
                                                    let pId = mdata[mainid];
                                                    let getPdata = dataParent.filter(function(e) {
                                                        if (e[parenCode] == pId) {
                                                            return e
                                                        }
                                                    })[0];
                                                    let vW = parenView.map(function(sa) {
                                                        return getPdata[sa];
                                                    }).join(' ')
                                                    document.getElementById(dataid).innerHTML = `<option selected value="${pId}">${vW}</option>`
                                                }
                                                if (loadForm.data.idData.indexOf(document.getElementById(dataid).id) != (loadForm.data.idData.length - 1)) {
                                                    let mop = loadForm.data.idData.indexOf(document.getElementById(dataid).id) + 1;
                                                    document.getElementById(loadForm.data.idData[mop]).focus();
                                                } else {
                                                    document.getElementById(simpan).addEventListener('focus', function() {
                                                        Array.from(document.querySelectorAll('.select-choice')).forEach(function(elm, i) {
                                                            elm.style.display = 'none';
                                                        })
                                                        Array.from(document.querySelectorAll('.select-search')).forEach(function(elm, i) {
                                                            elm.style.display = 'none';
                                                        })
                                                    }, false)
                                                    setTimeout(function() {
                                                        document.getElementById(simpan).focus();
                                                    }, 100)
                                                }
                                            }
                                        }, false)
                                    } else {
                                        document.getElementById(dataid).addEventListener('focus', function() {}, false)
                                    }
                                    if (globalThis.actionListUpdate == undefined) {
                                        globalThis.actionListUpdate = {}
                                    }
                                    globalThis.actionListUpdate[dataid] = function() {
                                        let e = dataid;
                                        $('#' + e).change(() => {
                                            let tbl = loadForm.data.objform[e].table;
                                            let key = loadForm.data.objform[e].value;
                                            let kz = loadForm.data.objform[e].key;
                                            let tbldata = dataMaster[tbl];
                                            let vall = $("#" + e).val();
                                            tbldata = tbldata.filter((v, i) => {
                                                if (v[key] == vall) {
                                                    return v;
                                                }
                                            });
                                            if (tbldata.length > 0) {
                                                tbldata = tbldata[0];
                                            }
                                            let sp = {
                                                key: vall,
                                                data: tbldata
                                            }
                                            let obj = loadForm.data.objform[e];
                                            if (obj.relation != undefined) {
                                                let rL = obj.relation;
                                                let ob2j = loadForm.data.objform[rL];
                                                let gRl = dataMaster[ob2j.table];
                                                if (kz != null) {
                                                    vall = tbldata[kz];
                                                }
                                                gRl = gRl.filter((w, i) => {
                                                    if (w[obj.relationId] == vall) {
                                                        return w
                                                    }
                                                });
                                                let h = '';
                                                h = gRl.map((x, i) => {
                                                    let v = '';
                                                    for (let c of ob2j.view) {
                                                        v += x[c] + ' ';
                                                    }
                                                    return '<option value="' + x[ob2j.value] + '">' + v + '</option>'
                                                }).join("");
                                                document.getElementById(obj.relation).innerHTML = `<option value="">Pilih Data</option>` + h;
                                            }
                                            // loadForm.data.selectAction(sp, e,obj)
                                            // selectAction(sp, e, obj);
                                        })
                                        Array.from(document.querySelectorAll('div[data-select-v' + dataid + ']')).forEach(function(elm) {})
                                    }
                                    globalThis.actionListUpdate[dataid]()
                                    // action form
                                    let getredirect = dataid;
                                    if (loadForm.data.objform[dataid].type == 'slug') {
                                        document.getElementById(dataid).addEventListener('focus', function() {
                                            let getValFrom = document.getElementById(loadForm.data.objform[dataid].from).value;
                                            this.value = getValFrom.toLowerCase().replace(/ /g, '-')
                                                .replace(/\#/g, '')
                                                .replace(/\'/g, '')
                                                .replace(/\"/g, '')
                                                .replace(/\&/g, '')
                                                .replace(/\^/g, '')
                                                .replace(/\@/g, '')
                                                .replace(/\!/g, '')
                                                .replace(/\~/g, '')
                                                .replace(/\*/g, '')
                                                .replace(/\;/g, '')
                                                .replace(/\:/g, '')
                                                .replace(/\{/g, '')
                                                .replace(/\}/g, '')
                                                .replace(/\,/g, '')
                                                .replace(/\./g, '')
                                                .replace(/\)/g, '')
                                                .replace(/\(/g, '')
                                                .replace(/\%/g, '')
                                                .replace(/\%/g, '')
                                                .replace(/\?/g, '')
                                                .replace(/\//g, '')
                                        }, false)
                                    }
                                    if (loadForm.data.objform[dataid].type == 'select') {
                                        getredirect = 'search-choice-' + dataid;
                                        document.getElementById('search-choice-' + dataid).addEventListener('keyup', function() {
                                            let relations = null;
                                            if (loadForm.data.objform[dataid].relation != undefined) {
                                                relations = loadForm.data.objform[dataid].relation;
                                            }
                                            document.getElementById('choice-' + dataid).innerHTML = globalThis.listdata[dataid](this.value, relations);
                                            globalThis.actionListUpdate[dataid]()
                                        }, false)
                                    }
                                    document.getElementById(getredirect).addEventListener('keypress', function(e) {
                                        if (e.key === 'Enter') {
                                            if (loadForm.data.idData.indexOf(document.getElementById(dataid).id) != (loadForm.data.idData.length - 1)) {
                                                let mop = loadForm.data.idData.indexOf(document.getElementById(dataid).id) + 1;
                                                let nextr = loadForm.data.idData[mop];
                                                if (loadForm.data.objform[nextr].type == 'note') {
                                                    Array.from(document.querySelectorAll('.select-choice')).forEach(function(elm, i) {
                                                        elm.style.display = 'none';
                                                    })
                                                    Array.from(document.querySelectorAll('.select-search')).forEach(function(elm, i) {
                                                        elm.style.display = 'none';
                                                    })
                                                } else {
                                                    document.getElementById(loadForm.data.idData[mop]).focus();
                                                }
                                            } else {
                                                document.getElementById(simpan).addEventListener('focus', function() {
                                                    Array.from(document.querySelectorAll('.select-choice')).forEach(function(elm, i) {
                                                        elm.style.display = 'none';
                                                    })
                                                    Array.from(document.querySelectorAll('.select-search')).forEach(function(elm, i) {
                                                        elm.style.display = 'none';
                                                    })
                                                }, false)
                                                setTimeout(function() {
                                                    document.getElementById(simpan).focus();
                                                }, 100)
                                            }
                                        }
                                    }, false)
                                }
                            }, 100)
                        }, 100)
                    })
                    // endof action
                }, false)
            })
            document.getElementById(hapus).addEventListener('click', function() {
                Swal.fire({
                    title: 'Apa anda yakin untuk menghapus data ini?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: `hapus`,
                    denyButtonText: `batalkan`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        let sopd = tr_db().table(loadForm.data.table)
                        let epso = [];
                        let edt = loadForm.data.loadDataEdit;
                        if (loadForm.data.equals != undefined) {
                            let dataList = {};
                            loadForm.data.equals.forEach(function(a) {
                                dataList[a] = loadForm.data.loadDataEdit[a];
                            })
                            edt = dataList;
                        }
                        Object.keys(edt).forEach(function(index, i) {
                            let lop = edt[index];
                            if (lop == "null") {
                                lop = null
                            } else {
                                lop = `"${lop.replace(/\"/g, "\\\"")}"`;
                            }
                            if (lop != null) {
                                if (i == 0) {
                                    epso.push({
                                        opsi: "",
                                        data: [index, '=', `${lop}`]
                                    });
                                } else {
                                    epso.push({
                                        opsi: "AND",
                                        data: [index, '=', `${lop}`]
                                    });
                                }
                            }
                        })
                        sopd.condition(epso);
                        sopd.delete();
                        sopd.get(function(res) {
                            if (loadForm.data.onsave != undefined) {
                                loadForm.data.onsave(loadForm, loadForm.data.loadDataEdit, 1)
                            } else {
                                loadForm.load();
                            }
                            if (res == 'disimpan') {
                                document.getElementById(loadForm.data.id + '-loader-h').style.display = 'inline-block';
                                Swal.fire(
                                    'Success!',
                                    'Data berhasil di hapus!',
                                    'success'
                                )
                            }
                        })
                    } else if (result.isDenied) {
                        Swal.fire('Perintah dibatalkan', '', 'info')
                    }
                })
            }, false)
            document.getElementById(simpan).addEventListener('click', function() {
                if (globalThis.coverid != undefined && globalThis.coverid == 0) {
                    alert('Judul dan cover tidak boleh kosong')
                }
                if (globalThis.coverid != undefined && globalThis.coverid == 0) return "Is greater";

                function escapeHtml(text) {
                    return text
                        .replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")
                        .replace(/"/g, "&quot;")
                        .replace(/'/g, "&#039;");
                }
                let dataA = {}
                loadForm.data.idData.map(function(pol) {
                    if (loadForm.data.objform[pol].unsafe == undefined) {
                        if (loadForm.data.objform[pol].type == 'number') {
                            let num = document.getElementById(pol).value.replace(/\./g, '').replace(/\,/g, '.');
                            num = Number(num).toFixed(0).toString();
                            dataA[pol] = num;
                        } else if (loadForm.data.objform[pol].type == 'date') {
                            let evf = escapeHtml(document.getElementById(pol).value.replace(/\"/g, '\\\"'));
                            if (evf == '') {
                                evf = "null";
                            }
                            dataA[pol] = evf;
                        } else if (loadForm.data.objform[pol].type == 'note') {
                            dataA[pol] = btoa(escapeHtml(document.getElementById(pol).value));
                        } else {
                            dataA[pol] = escapeHtml(document.getElementById(pol).value.replace(/\"/g, '\\\"'));
                        }
                    }
                })
                let validEr = null;
                if (loadForm.data.validate != undefined) {
                    let validate = loadForm.data.validate;
                    Object.keys(loadForm.data.validate).forEach(function(key) {
                        if (dataA[key] == validate[key]) {
                            if (validEr == null) {
                                validEr = key
                            }
                        }
                    })
                    if (validEr != null) {
                        document.getElementById(validEr).focus();
                        document.getElementById(validEr).scrollIntoView();
                        alert(capitalize(validEr) + ' tidak boleh kosong')
                        return false;
                    }
                }
                if (validEr == null) {
                    if (loadForm.data.idUpdate != null) {
                        if (loadForm.data.disableback == undefined) {
                            document.getElementById(loadForm.data.id + '-loader-h').style.display = 'inline-block';
                        }
                    } else {
                        document.getElementById(loadForm.data.id + '-loader-h').style.display = 'inline-block';
                    }
                    let sopd = tr_db().table(loadForm.data.table)
                    if (loadForm.data.idUpdate != null) {
                        let epso = [];
                        if (loadForm.data.equals != undefined) {
                            let dataList = {};
                            loadForm.data.equals.forEach(function(a) {
                                dataList[a] = dataA[a];
                            })
                            loadForm.data.loadDataEdit = dataList;
                        }
                        if (loadForm.data.edt != undefined) {
                            let dataList = {};
                            loadForm.data.edt.forEach(function(a) {
                                dataList[a] = dataA[a];
                            })
                            loadForm.data.loadDataEdit = dataList;
                        }
                        Object.keys(loadForm.data.loadDataEdit).forEach(function(index, i) {
                            let lop = loadForm.data.loadDataEdit[index].toString().replace(/\"/g, '\\\"');
                            if (lop == "null") {
                                lop = null
                            } else {
                                lop = `"${lop}"`;
                            }
                            if (lop != null) {
                                if (i == 0) {
                                    epso.push({
                                        opsi: "",
                                        data: [index, '=', `${lop}`]
                                    });
                                } else {
                                    epso.push({
                                        opsi: "AND",
                                        data: [index, '=', `${lop}`]
                                    });
                                }
                            }
                        })
                        sopd.condition(epso);
                        sopd.update(dataA);
                    } else {
                        if (loadForm.data.primarykey != undefined) {
                            delete dataA[loadForm.data.primarykey];
                        }
                        sopd.save(dataA)
                    }
                    sopd.get(function(res) {
                        if (res == 'disimpan') {
                            if (loadForm.data.idUpdate != null) {
                                Swal.fire(
                                    'Success!',
                                    'Data berhasil di ubah!',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Success!',
                                    'Data berhasil di tambahkan!',
                                    'success'
                                )
                            }
                            // document.querySelector('.form-e').style.display = 'block';
                            // document.querySelector('.form-d').style.display = 'none';
                            setTimeout(function() {
                                // setting for custome proses save
                                if (loadForm.data.onsave != undefined) {
                                    loadForm.data.onsave(loadForm, dataA)
                                } else {
                                    if (loadForm.data.idUpdate == null) {
                                        loadForm.load();
                                    } else {
                                        if (loadForm.data.disableback == undefined) {
                                            loadForm.load();
                                        } else {}
                                    }
                                }
                            }, 100)
                        }
                    })
                }
            }, false)
            document.getElementById(idN).addEventListener('click', function() {
                let tF = 'form-get-app' + t;
                document.querySelector('.form-e').style.display = 'none';
                document.querySelector('.form-d').style.display = 'block';
                loadForm.data.idUpdate = null;
                document.getElementById(hapus).style.display = 'none';
                setTimeout(function() {
                    document.getElementById(idm).innerText = 'Tambah ' + title;
                    let htmlForm = loadForm.data.htmlForm
                    document.getElementById(tF).innerHTML = htmlForm;
                    if (loadForm.data.oncreate != undefined) {
                        loadForm.data.oncreate(loadForm, new db);
                    }
                    setTimeout(function() {
                        document.getElementById(loadForm.data.idData[0]).focus();
                    }, 500)
                    let g = document.getElementById(loadForm.data.id + '-form-content')
                    if (g != undefined) {
                        console.log(g.offsetTop);
                        g.style.height = 'calc(100vh - ' + g.offsetTop + 'px)';
                        g.style.overflow = "auto";
                    }
                    setTimeout(function() {
                        Object.keys(loadForm.data.objform).forEach(function(e) {
                            if (loadForm.data.objform[e].type == 'note') {
                                let s = Array.from(document.querySelectorAll('.note-editable'))
                                for (const yi of s) {
                                    yi.addEventListener('focus', function() {}, false)
                                }
                            }
                            if (loadForm.data.objform[e].type == 'number') {
                                document.getElementById(e).addEventListener('keyup', function() {
                                    let eva = this.value;
                                    eva = eva.replace(/\./g, '');
                                    this.value = formatRupiah(eva);
                                }, false)
                            }
                            if (loadForm.data.objform[e].type == 'select') {
                                $('#' + e).select2();
                                document.getElementById(e).addEventListener('focus', function() {
                                    if (loadForm.data.objform[e].relationChange == undefined) {} else {
                                        let idRelation = loadForm.data.objform[e].relationChange;
                                        let dataParent = dataMaster[e];
                                        let parenCode = loadForm.data.objform[e].value;
                                        let parenView = loadForm.data.objform[e].view;
                                        let mainid = loadForm.data.objform[e].relationId;
                                        let kodemain = loadForm.data.objform[e].value;
                                        let main = loadForm.data.objform[idRelation].table;
                                        let kode = loadForm.data.objform[idRelation].value;
                                        let getVal = document.getElementById(idRelation).value;
                                        let dataMain = dataMaster[main].filter(function(lop) {
                                            if (lop[kode] == getVal) {
                                                return lop
                                            }
                                        });
                                        if (dataMain.length > 0) {
                                            let mdata = dataMain[0];
                                            let pId = mdata[mainid];
                                            let getPdata = dataParent.filter(function(e) {
                                                if (e[parenCode] == pId) {
                                                    return e
                                                }
                                            })[0];
                                            let vW = parenView.map(function(sa) {
                                                return getPdata[sa];
                                            }).join(' ')
                                            document.getElementById(e).innerHTML = `<option selected value="${pId}">${vW}</option>`
                                        }
                                        if (loadForm.data.idData.indexOf(document.getElementById(e).id) != (loadForm.data.idData.length - 1)) {
                                            let mop = loadForm.data.idData.indexOf(document.getElementById(e).id) + 1;
                                            document.getElementById(loadForm.data.idData[mop]).focus();
                                        } else {
                                            document.getElementById(simpan).addEventListener('focus', function() {}, false)
                                            setTimeout(function() {
                                                document.getElementById(simpan).focus();
                                            }, 100)
                                        }
                                    }
                                }, false)
                            } else {
                                document.getElementById(e).addEventListener('focus', function() {}, false)
                            }
                            if (globalThis.actionListNew == undefined) {
                                globalThis.actionListNew = {}
                            }
                            globalThis.actionListNew[e] = function() {
                                // new select2
                                $('#' + e).change(() => {
                                    let tbl = loadForm.data.objform[e].table;
                                    let key = loadForm.data.objform[e].value;
                                    let kz = loadForm.data.objform[e].key;
                                    let tbldata = dataMaster[tbl];
                                    let vall = $("#" + e).val();
                                    tbldata = tbldata.filter((v, i) => {
                                        if (v[key] == vall) {
                                            return v;
                                        }
                                    });
                                    if (tbldata.length > 0) {
                                        tbldata = tbldata[0];
                                    }
                                    let sp = {
                                        key: vall,
                                        data: tbldata
                                    }
                                    let obj = loadForm.data.objform[e];
                                    if (obj.relation != undefined) {
                                        let rL = obj.relation;
                                        let ob2j = loadForm.data.objform[rL];
                                        let gRl = dataMaster[ob2j.table];
                                        if (kz != null) {
                                            vall = tbldata[kz];
                                        }
                                        gRl = gRl.filter((w, i) => {
                                            if (w[obj.relationId] == vall) {
                                                return w
                                            }
                                        });
                                        let h = '';
                                        h = gRl.map((x, i) => {
                                            let v = '';
                                            for (let c of ob2j.view) {
                                                v += x[c] + ' ';
                                            }
                                            return '<option value="' + x[ob2j.value] + '">' + v + '</option>'
                                        }).join("");
                                        document.getElementById(obj.relation).innerHTML = `<option value="">Pilih Data</option>` + h;
                                    }
                                    // loadForm.data.selectAction(sp, e,obj)
                                    // selectAction(sp, e, obj);
                                })
                                Array.from(document.querySelectorAll('div[data-select-v' + e + ']')).forEach(function(elm) {})
                            }
                            globalThis.actionListNew[e]();
                        })
                        if (loadForm.data.equals != undefined) {
                            for (const eq of loadForm.data.equals) {
                                document.getElementById(eq).addEventListener('keyup', loadForm.data.delay(function() {
                                    let getVals = []
                                    let n = 0;
                                    for (const es of loadForm.data.equals) {
                                        let vals = document.getElementById(es).value.replace(/\"/g, "\\\"");
                                        if (n == 0) {
                                            getVals.push({
                                                opsi: "",
                                                data: [es, '=', `"${vals}"`]
                                            })
                                        } else {
                                            getVals.push({
                                                opsi: "AND",
                                                data: [es, '=', `"${vals}"`]
                                            })
                                        }
                                        n++;
                                    }
                                    tr_db()
                                        .table(loadForm.data.table)
                                        .condition(getVals)
                                        .get(function(a, b) {
                                            if (Number(b) > 0) {
                                                let keysRow = Object.keys(loadForm.data.objform);
                                                let objUpdt = {}
                                                for (const lpp of keysRow) {
                                                    if (loadForm.data.objform[lpp].type == "select") {
                                                        document.getElementById(lpp).value = a[0][lpp];
                                                        $('#' + lpp).val(a[0][lpp]).trigger('change');
                                                    } else if (loadForm.data.objform[lpp].type == "number") {
                                                        document.getElementById(lpp).value = formatRupiah(a[0][lpp]);
                                                    } else {
                                                        document.getElementById(lpp).value = a[0][lpp];
                                                    }
                                                    objUpdt[lpp] = a[0][lpp];
                                                }
                                                if (loadForm.data.onupdate != undefined) {
                                                    setTimeout(function() {
                                                        loadForm.data.onupdate(loadForm, a, new db);
                                                    }, 100)
                                                }
                                                document.getElementById(idm).innerText = 'Ubah ' + title;
                                                loadForm.data.loadDataEdit = objUpdt;
                                                loadForm.data.idUpdate = true;
                                                document.getElementById(hapus).style.display = 'inline-block';
                                            } else {
                                                document.getElementById(idm).innerText = 'Tambah ' + title;
                                                loadForm.data.loadDataEdit = {};
                                                loadForm.data.idUpdate = null;
                                                document.getElementById(hapus).style.display = 'none';
                                                let keysRow = Object.keys(loadForm.data.objform);
                                                for (const lpp of keysRow) {
                                                    if (loadForm.data.equals.indexOf(lpp) == -1) {
                                                        document.getElementById(lpp).value = '';
                                                        if (loadForm.data.oncreate != undefined) {
                                                            loadForm.data.oncreate(loadForm, new db);
                                                        }
                                                        if (loadForm.data.objform[lpp].type == "select") {
                                                            $('#' + lpp).val(null).trigger('change');
                                                        }
                                                    }
                                                }
                                            }
                                        })
                                }, 500), false)
                            }
                        }
                        document.getElementById(loadForm.data.idData[0]).focus()
                        for (const dataid of loadForm.data.idData) {
                            // if define equals cek data
                            // action form
                            let getredirect = dataid;
                            if (loadForm.data.objform[dataid].type == 'select') {
                                getredirect = 'search-choice-' + dataid;
                                document.getElementById('search-choice-' + dataid).addEventListener('keyup', function() {
                                    let relations = null;
                                    if (loadForm.data.objform[dataid].relation != undefined) {
                                        relations = loadForm.data.objform[dataid].relation;
                                    }
                                    document.getElementById('choice-' + dataid).innerHTML = globalThis.listdata[dataid](this.value, relations);
                                    globalThis.actionListNew[dataid]();
                                }, false)
                            }
                            if (loadForm.data.objform[dataid].type == 'slug') {
                                document.getElementById(dataid).addEventListener('focus', function() {
                                    let getValFrom = document.getElementById(loadForm.data.objform[dataid].from).value;
                                    this.value = getValFrom.replace(/ /g, '-')
                                        .replace(/\#/g, '')
                                        .replace(/\'/g, '')
                                        .replace(/\"/g, '')
                                        .replace(/\&/g, '')
                                        .replace(/\^/g, '')
                                        .replace(/\@/g, '')
                                        .replace(/\!/g, '')
                                        .replace(/\~/g, '')
                                        .replace(/\*/g, '')
                                        .replace(/\;/g, '')
                                        .replace(/\:/g, '')
                                        .replace(/\{/g, '')
                                        .replace(/\}/g, '')
                                        .replace(/\,/g, '')
                                        .replace(/\./g, '')
                                        .replace(/\)/g, '')
                                        .replace(/\(/g, '')
                                        .replace(/\%/g, '')
                                        .replace(/\%/g, '')
                                }, false)
                            }
                            // --------- //
                            document.getElementById(getredirect).addEventListener('keypress', function(e) {
                                if (e.key === 'Enter') {
                                    if (loadForm.data.idData.indexOf(document.getElementById(dataid).id) != (loadForm.data.idData.length - 1)) {
                                        let mop = loadForm.data.idData.indexOf(document.getElementById(dataid).id) + 1;
                                        let nextr = loadForm.data.idData[mop];
                                        if (loadForm.data.objform[nextr].type == 'note') {
                                            Array.from(document.querySelectorAll('.select-choice')).forEach(function(elm, i) {
                                                elm.style.display = 'none';
                                            })
                                            Array.from(document.querySelectorAll('.select-search')).forEach(function(elm, i) {
                                                elm.style.display = 'none';
                                            })
                                        } else {
                                            document.getElementById(loadForm.data.idData[mop]).focus();
                                        }
                                    } else {
                                        document.getElementById(simpan).addEventListener('focus', function() {
                                            Array.from(document.querySelectorAll('.select-choice')).forEach(function(elm, i) {
                                                elm.style.display = 'none';
                                            })
                                            Array.from(document.querySelectorAll('.select-search')).forEach(function(elm, i) {
                                                elm.style.display = 'none';
                                            })
                                        }, false)
                                        setTimeout(function() {
                                            document.getElementById(simpan).focus();
                                        }, 100)
                                    }
                                }
                            }, false)
                        }
                    }, 100)
                })
            }, false);
            return this;
        },
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
        load: function() {
            let t = this.data.id;
            let m = this.data.row;
            let k = Object.keys(this.data.row);
            globalThis.act = this;
            act.tagupdate = 'data-update' + act.data.id;
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
            if (act.data.pagination == undefined) {
                act.data.pagination = {};
            }
            if (act.data.pagination[this.data.table] == undefined) {
                act.data.pagination[this.data.table] = 0;
            }
            if (act.data.totData == undefined) {
                act.data.totData = {}
            }
            let tbl = this.data.table;
            if (act.data.bataspagin == undefined) {
                act.data.bataspagin = 10;
            }
            act.data.bataspagin = Math.floor(globalThis.bataspagin);
            let objLike = [];
            let si = 0;
            if (this.data.search != undefined) {
                for (const mLIke of Object.keys(this.data.row)) {
                    if (si == 0) {
                        objLike.push({
                            opsi: "",
                            data: [mLIke, 'LIKE', `"%${this.data.search}%"`]
                        });
                    } else {
                        objLike.push({
                            opsi: "OR",
                            data: [mLIke, 'LIKE', `"%${this.data.search}%"`]
                        });
                    }
                    si++;
                }
            }
            let lpsTable = tr_db()
            if (act.data.filter != undefined) {
                let cndObj = Object.keys(act.data.filter);
                let condT = [];
                let numc = 0;
                for (const cndu of cndObj) {
                    if (numc == 0) {
                        if (act.data.filter[cndu].toString().indexOf('||') != -1) {
                            let u = act.data.filter[cndu].toString().replace(/\|/g, "");
                            condT.push({
                                opsi: '',
                                data: ['(' + cndu, '=', '"' + u + '"']
                            });
                            condT.push({
                                opsi: 'OR',
                                data: [cndu, '=', '"" )']
                            });
                        } else {
                            condT.push({
                                opsi: '',
                                data: [cndu, '=', '"' + act.data.filter[cndu] + '"']
                            });
                        }
                    } else {
                        if (act.data.filter[cndu].toString().indexOf('||') != -1) {
                            let u = act.data.filter[cndu].toString().replace(/\|/g, "");
                            condT.push({
                                opsi: 'AND',
                                data: ['(' + cndu, '=', '"' + u + '"']
                            });
                            condT.push({
                                opsi: 'OR',
                                data: [cndu, '=', '"" )']
                            });
                        } else {
                            condT.push({
                                opsi: 'AND',
                                data: [cndu, '=', '"' + act.data.filter[cndu] + '"']
                            });
                        }
                    }
                    numc++;
                }
                if (this.data.condCus.length > 0) {
                    let c = 0;
                    for (let cust of this.data.condCus) {
                        condT.push(cust);
                    }
                }
                lpsTable.condition(condT)
            }
            lpsTable.table(this.data.table)
            if (act.data.row != undefined) {
                lpsTable.select(Object.keys(act.data.row).join(','));
            }
            if (objLike.length != 0) {
                lpsTable.like(objLike)
            }
            if (act.data.select != undefined) {
                let select = act.data.select.join(",");
                lpsTable.select(select);
            }
            if (Number(act.data.bataspagin) < 0) {
                act.data.bataspagin = 2;
            }
            act.data.bataspagin = 50;
            lpsTable.limit(act.data.pagination[this.data.table], Math.floor(act.data.bataspagin))
            if (act.data.multiOrder.length == 0) {
                if (act.data.order != undefined) {
                    act.data.multiOrder.push({
                        name: act.data.order.start,
                        val: act.data.order.end
                    })
                }
            }
            if (act.data.multiOrder.length > 0) {
                lpsTable.order(act.data.multiOrder.map(function(nj, i) {
                    return ` ${nj.name} ${nj.val} `;
                }).join(','), '');
            }
            lpsTable.get(function(dat, tot) {
                act.data.totData[tbl] = tot;
                globalThis.dataLoadtable = dat;
                act.loadData(dat);
            })
        }
    }
}

globalThis.tr_crud = tr_crud;