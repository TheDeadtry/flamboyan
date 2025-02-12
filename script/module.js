/* Report script */

function hiddenform(url, params) {
    var f = $("<form target='_blank' method='POST' style='display:none;'></form>").attr({
        action: url
    }).appendTo(document.body);
    for (var i in params) {
        if (params.hasOwnProperty(i)) {
            $('<input type="hidden" />').attr({
                name: i,
                value: params[i]
            }).appendTo(f);
        }
    }
    f.submit();
    f.remove();
}

function ubahFormatTanggalUserLog(tanggal) {
    // Pisahkan tanggal dan waktu
    let [tanggalBagian, waktuBagian] = tanggal.split(' ');

    // Pisahkan bagian tanggal menjadi tahun, bulan, dan hari
    let [tahun, bulan, hari] = tanggalBagian.split('-');

    // Gabungkan dalam format baru
    let formatBaru = `${hari}-${bulan}-${tahun} ${waktuBagian}`;

    return formatBaru;
}

function parseNumber(content){
    let newEl = div().html(content.outerHTML).get();
    Array.from(newEl.querySelectorAll('td'))
    .forEach(function(s){
        let style = s.getAttribute('style')
        if(style.indexOf("#,##") != -1){
            if (!isNaN(s.innerHTML.number())){
                if (s.innerHTML.number() != ''){
                    s.innerHTML = s.innerHTML.number();
                }
            }
        }
    });
    return newEl.innerHTML;
}

function ExportToExcel(content) {
    let html = parseNumber(content);
    let elt = div().html(html).get().querySelector('table');
    tableToExcel(elt, 'Laporan');
}

function styleObjectToString(styleObj) {
    const styleString = Object.keys(styleObj)
        .map((prop) => {
            const formattedProp = prop.replace(/([A-Z])/g, (match) => `-${match.toLowerCase()}`);
            return `${formattedProp}:${styleObj[prop]}`;
        })
        .join('; ');

    return styleString + ';';
}

export const _Report = (function () {

    try {
        (function () {


            window.$setval = function (id, a, b) {
                try {
                    (function () {
                        if (id != undefined) {
                            var type = document.querySelector("#" + id + " #" + a);
                            if (type != undefined) {
                                if (type.tagName === 'SELECT') {
                                    $("#" + id + " #" + a).val(b);
                                    $("#" + id + " #" + a).trigger('change');
                                } else {
                                    type.value = b;
                                }
                            }
                        } else {
                            document.querySelector("#" + a).value = b;
                        }
                    })();
                } catch (e) {
                    console.log(e);
                }
            }

            window.$setVal = $setval;

            window.$setoption = function (id, a, bm) {
                if (id != undefined) {
                    var val = document.querySelector("#" + id + " #" + a).value;
                    document.querySelector("#" + id + " #" + a).innerHTML = `<option value="">...</option>` + bm.map(function (k) {
                        return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                    }).join('');
                    $("#" + id + ' #' + a).trigger('change');
                    $("#" + id + ' #' + a).val(val).trigger('change');
                } else {
                    document.querySelector("#" + a).innerHTML = `<option value="">...</option>` + bm.map(function (k) {
                        return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                    }).join('');
                }
            }

            window._setoptionmulti = function (id, a, bm) {
                Array.from(document.querySelectorAll("#" + id + " [name=\"" + a + "\"")).forEach(function (s) {
                    var val = s.value;
                    var idx = s.id;
                    s.innerHTML = `<option value="">...</option>` + bm.map(function (k) {
                        return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                    }).join('');
                    $("#" + id + ' #' + idx).val(val).trigger('change');
                });
                return true;
            }

            if (window._insertAfter === undefined || window._insertAfter === null) {
                window._insertAfter = function (newNode, existingNode) {
                    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
                }
            }
            if (window._insertBefore === undefined || window._insertBefore === null) {
                window._insertBefore = function (newNode, existingNode) {
                    existingNode.parentNode.insertBefore(newNode, existingNode);
                }
            }
            try {
                _id('wow');
            } catch (e) {
                window._id = function (id = '') {
                    return document.getElementById(id);
                }
            }
            if (window._cekNull === undefined) {
                window._cekNull = function (elm) {
                    if (elm === undefined || elm === null) {
                        return null;
                    }
                }
            }
            if (window._saveCall === undefined) {
                window._saveCall = function (data, callback) {
                    try {
                        (function (obj, z) {
                            var data = z;
                            if (obj != undefined && typeof obj === 'function') {
                                if (Array.isArray(data)) {
                                    obj(...data);
                                    return false;
                                }
                                obj(data);
                            }
                        })(callback, data);
                    } catch (e) {
                        console.log(e);
                    }
                }
            }
        })();
    } catch (e) {
        console.log(e);
        console.log('error starter');
    };
    return {
        id: "report-r"
        , data: {}
        , el: function (a) {
            if (a != undefined && typeof a === 'string') {
                this.id = a;
            }
            return this;
        }
        , qr: function (r) {
            this.data.qr = r;
            return this;
        }
        , head: function (r) {
            this.data.head = r;
            return this;
        }
        , noReport: function () {
            this.data.noreport = true;
            return this;
        }
        , footer: function (r) {
            this.data.footer = r;
            return this;
        }
        , name: function (r) {
            this.data.name = r;
            return this;
        }
        , custData: function (w) {
            if (w != undefined && typeof w === 'function') {
                this.data.custData = w;
            }
            return this;
        }
        , table: function (a) {
            if (this.data.custData != undefined && typeof this.data.custData === 'function') {
                a = this.data.custData(a);
            }
            this.data.qrData = a;
            this.dataStore = {};
            var obj = this;
            return `
                <table id="print-table-report" style="border-collapse:collapse; width:100%;">
                    ${(function (d) {
                    if (d.data.head != undefined && Array.isArray(d.data.head)) {
                        return `<thead>${d.data.head.map(function (h) {
                            if (Array.isArray(h)) {
                                return '<tr>' + h.map(function (c) {
                                    if (typeof c === 'object') {
                                        if (Object.keys(c).length > 0) {
                                            var d = el('th');
                                            if (c.rowspan != undefined && typeof c.rowspan === 'number') {
                                                d.attr('rowspan', c.rowspan);
                                            }
                                            if (c.colspan != undefined && typeof c.colspan === 'number') {
                                                d.attr('colspan', c.colspan);
                                            }
                                            if (c.css != undefined && typeof c.css === 'object') {
                                                d.css(c.css);
                                            }
                                            if (c.text != undefined && typeof c.text === 'string') {
                                                d.html(c.text);
                                            };
                                            if (c.text != undefined && typeof c.text === 'function') {
                                                try {
                                                    d.html(c.text(obj));
                                                } catch (e) {
                                                    console.log(e);
                                                }
                                            };
                                            return d.get().outerHTML;
                                        };
                                        return '';
                                    } else if (typeof c === 'string') {
                                        return `<th>${c}</th>`;
                                    }
                                }).join('') + '</tr>'
                            } else {
                                alert('data tidak disetting dengan benar, item harusnya array');
                                throw 'data tidak disetting dengan benar, item harusnya array';
                            }
                        }).join('')}</thead>`;
                    }
                    return ''
                })(this)}
                    ${(function (d, datas) {
                    if (Array.isArray(datas)) {
                        if (d.data.name != undefined && Array.isArray(d.data.name)) {
                            return '<tbody>' + datas.map(function (data) {
                                var h = '<tr>';
                                h += d.data.name.map(function (name) {
                                    if (typeof name === 'object') {
                                        if (Object.keys(name).length > 0) {
                                            var elm = el('td');
                                            let styleData = '';
                                            if (name.css != undefined && typeof name.css === 'object') {
                                                styleData = styleObjectToString(name.css);
                                            }
                                            if(
                                                name.name == 'kode' 
                                                || name.name == 'keterangan' 
                                                || name.name == 'uraian'
                                                || name.name == 'userlog'
                                            ){
                                                elm.attr('style', `padding:0 5px; mso-number-format:"\@";${styleData}`);
                                            } else if(
                                                name.name.indexOf('tgl') != -1
                                                || name.name.indexOf('tanggal') != -1
                                            ){
                                                elm.attr('style', `padding:0 5px; mso-number-format:"\@";${styleData}`);
                                            } else{
                                                elm.attr('style', `padding:0 5px; mso-number-format:"#\,##0";${styleData}`);
                                            }
                                            if (name.rowspan != undefined && typeof name.rowspan === 'number') {
                                                elm.attr('rowspan', name.rowspan);
                                            }
                                            if (name.colspan != undefined && typeof name.colspan === 'number') {
                                                elm.attr('colspan', name.colspan);
                                            }
                                            if (name.name != undefined && typeof name.name === 'string') {
                                                if (name.custome != undefined && typeof name.custome === 'function') {
                                                    try {
                                                        name.name == 'userlog' ?
                                                        elm.html(
                                                            ubahFormatTanggalUserLog(
                                                                name.custome(
                                                                    data[name.name],
                                                                    data,
                                                                    obj
                                                                )
                                                            )
                                                        ) :
                                                        elm.html(
                                                            name.custome(
                                                                data[name.name],
                                                                data,
                                                                obj
                                                            )
                                                        );
                                                    } catch (e) {
                                                        console.log(e);
                                                    }
                                                } else {
                                                    elm.html(data[name.name]);
                                                }
                                            }
                                            return elm.get().outerHTML;
                                        }
                                        return '';
                                    }
                                    else if (typeof name === 'string') {
                                        return `<td>${data[name]}</td>`
                                    }
                                    return `<td></td>`
                                }).join('');
                                h += '</tr>';
                                return h;
                            }).join('') + '</tbody>'
                        } else {
                            if (d.data.head != undefined && Array.isArray(d.data.head)) {
                                return `<tbody>
                                        <tr>
                                            <td colspan="${d.data.head.length}">Data tidak dipanggil dengan benar</td>
                                        </tr>
                                    </tbody>`
                            }
                            return `<tbody>
                                    <tr>
                                        <td>Data tidak dipanggil dengan benar</td>
                                    </tr>
                                </tbody>`
                        }
                    } else {
                        if (d.data.head != undefined && Array.isArray(d.data.head)) {
                            return `<tbody>
                                <tr>
                                    <td colspan="${d.data.head.length}">Data tidak tersedia</td>
                                </tr>
                            </tbody>`
                        }
                        return `<tbody>
                                <tr>
                                    <td>Data tidak tersedia</td>
                                </tr>
                            </tbody>`
                    }
                })(this, a)}
                    ${(function (d) {
                    if (d.data.footer != undefined && Array.isArray(d.data.footer)) {
                        return `<tbody>${d.data.footer.map(function (h) {
                            if (Array.isArray(h)) {
                                return '<tr>' + h.map(function (c) {
                                    if (typeof c === 'object') {
                                        if (Object.keys(c).length > 0) {
                                            var d = el('th');
                                            if (c.rowspan != undefined && typeof c.rowspan === 'number') {
                                                d.attr('rowspan', c.rowspan);
                                            }
                                            if (c.colspan != undefined && typeof c.colspan === 'number') {
                                                d.attr('colspan', c.colspan);
                                            }
                                            if (c.css != undefined && typeof c.css === 'object') {
                                                d.css(c.css);
                                            }
                                            if (c.text != undefined && typeof c.text === 'string') {
                                                d.html(c.text);
                                            };
                                            if (c.text != undefined && typeof c.text === 'function') {
                                                try {
                                                    d.html(c.text(obj));
                                                } catch (e) {
                                                    console.log(e);
                                                }
                                            };
                                            return d.get().outerHTML;
                                        };
                                        return '';
                                    } else if (typeof c === 'string') {
                                        return `<th>${c}</th>`;
                                    }
                                }).join('') + '</tr>'
                            } else {
                                alert('data tidak disetting dengan benar, item harusnya array');
                                throw 'data tidak disetting dengan benar, item harusnya array';
                            }
                        }).join('')}</tbody>`;
                    }
                    return ''
                })(this)}
                </table>
            `;
        },
        conf: function (a) {
            /* digunakan sebagai config query */
            if (a != undefined && typeof a === 'object') {
                this._conf = a;
            }
            return this;
        },
        filterConf: function (a) {
            if (a != undefined && typeof a === 'object') {
                this.data.filter = a;
            }
            return this;
        },
        filterOnLoad: function (f) {
            if (f != undefined && typeof f === 'function') {
                this.data.filterLoad = f;
            }
            return this;
        },
        makeFilter: function () {
            let filter = this.data.filter;
            let noreport = this.data.noreport;
            let forms = this.data.form;
            let container = this.data.filterContainer;
            container.className = 'row';
            if (Array.isArray(filter)) {
                filter.forEach(function (z) {
                    if (typeof z === 'object' && z.type != undefined) {
                        if (z.type === 'text'
                            || z.type === 'date'
                            || z.type === 'username'
                            || z.type === 'password'
                            || z.type === 'email'
                        ) {
                            container.appendChild(forms.typeInput(z));
                        }
                        if (
                            z.type === 'number'
                        ) {
                            container.appendChild(forms.typeNumber(z));
                        }
                        if (
                            z.type === 'select'
                        ) {
                            container.appendChild(forms.typeSelect(z));
                        }
                        if (
                            z.type === 'radio'
                        ) {
                            container.appendChild(forms.typeRadio(z));
                        }
                        if (
                            z.type === 'node'
                        ) {
                            container.appendChild(z.temp ? z.temp(): div().get() );
                        }
                    }
                });
                container.appendChild(
                    div().class('col-12')
                        .child(
                            el('button').addModule('report', this).class('btn btn-primary btn-sm')
                                .child(
                                    el('span').html('Submit')
                                )
                                .click(function (a) {
                                    function callback(target) {
                                        target.report.call();
                                    }
                                    if (a.target.tagName === 'BUTTON') {
                                        callback(a.target);
                                    } else {
                                        (function cek(n) {
                                            if (n.tagName === 'BUTTON') {
                                                callback(n);
                                                return false;
                                            }
                                            cek(n.parentNode);
                                        })(a.target);
                                    }
                                    return false;
                                })
                        )
                        .get()
                );
                container.style.margingBottom = '20px';
                container.style.paddingBottom = '10px';
            }
            return this;
        }
        , customeButton(func) {
            this.data.customeButton = func;
            return this;
        }
        , _filterContainer: function (par) {
            var obj = this;
            if (par != undefined && typeof par === 'object' && par.tagName != undefined) {
                if (_id('header-report-r') === undefined || _id('header-report-r') === null) {
                    var container = div().css({
                        border: '1px solid #ddd',
                        padding: '5px',
                        marginBottom: '10px',
                    }).id('header-report-r').get();
                    window._insertBefore(container, par);
                    this.data.filterContainer = container;
                    var containerPrint = div().css({
                        marginBottom: '10px',
                    }).id('header-print-report-r')
                    if (obj.data.customeButton === undefined) {
                        containerPrint.child(
                            el('button').css('margin-right', '5px').class('btn btn-clear btn-sm')
                                .child(el('i').css('margin-right', '5px').class('ft-printer'))
                                .child(el('span').html('Cetak laporan'))
                                .click(function () {
                                    var id = 'print-table-report';
                                    $('#' + id).printThis({
                                        // base: 'https://jasonday.github.io/printThis',
                                        header: null,               // prefix to html
                                        footer: null,
                                        importCSS: true,
                                        loadCSS: "{{PATH}}/print.css?v=" + Date.now(),
                                        //header: "<h1 style=\" text-align:center\">"+dataPrintX.title+"</h1>",
                                    });
                                })
                        )
                        containerPrint.child(
                            el('span').css('display', 'inline-block').css('padding', '0 5px')
                        )
                        containerPrint.child(
                            el('button').class('btn btn-clear btn-sm')
                                .child(el('i').css('margin-right', '5px').class('la la-file-excel-o'))
                                .child(el('span').html('Export Excel'))
                                .click(function () {
                                    let id = 'print-table-report';
                                    let tableData = document.getElementById(id);
                                    console.log(tableData);
                                    ExportToExcel(tableData);
                                })
                        )
                    }
                    if (obj.data.customeButton != undefined && typeof obj.data.customeButton === 'function') {
                        obj.data.customeButton(containerPrint, obj);
                    }
                    window._insertBefore(containerPrint.get(), par);
                    _saveCall(this, function (obj) {
                        if (_cekNull(obj.data.filter) !== null) {
                            obj.makeFilter();
                            return true;
                        }
                        obj.data.filterContainer.innerHTML = 'no config filter setup.';
                        return true;
                    });
                }
            }
            return obj;
        }
        , formsConf: function () {
            /* form conf */
            this.data.form = {};
            /* input forms */
            this.data.form.typeInput = function (a) {
                var ct = div().class('form-group');
                if (a.line != undefined) {
                    ct.css({
                        display: 'grid',
                        gridTemplateColumns: (function (a) {
                            if (Number.isInteger(a) === true) {
                                return a + `px auto`
                            } else {
                                return `80px auto`
                            }
                        })(a.line)
                    })
                }
                ct.child(
                    el('label')
                    .html(a.title)
                    .attr('for', a.name)
                    .css({
                        display: 'flex',
                        alignItems: 'center'
                    })
                )
                var inpt = el('input')
                inpt.type(a.type)
                if (a.type === 'date'){
                    inpt.type('text')
                    inpt.data('type', 'date')
                }
                inpt.class('form-control form-d').name(a.name).id(a.name).hold('...')
                if (a.readonly == true) {
                    inpt.attr('readonly', 'true')
                }
                ct.child(
                    inpt
                );
                if (a.info != undefined && typeof a.info === 'string') {
                    ct.child(
                        el('small').css('font-style', 'italic').html(a.info)
                    );
                };
                if (a.type == 'date') {
                    inpt.addModule("a", a);
                    inpt.load(function (e) {
                        var a = e.el.a;
                        console.log(a.name);
                        $(" .form-d#"+a.name).datepicker({ format: 'dd-mm-yyyy' });
                        if (a.nomax === true) {
                            throw 'stop action';
                        }
                        e.el.max = new Date().toISOString().split("T")[0];
                        e.el.addEventListener('keyup', delay(function () {
                            if (tanggal(this.value).milisecond > tanggal().milisecond) {
                                this.value = tanggal().normal;

                            }
                            if (a.action != undefined) {
                                a.action(this.value);
                            }
                        }, 500))
                        e.el.addEventListener('change', function () {
                            if (tanggal(this.value).milisecond > tanggal().milisecond) {
                                this.value = tanggal().normal;

                            }
                            if (a.action != undefined) {
                                a.action(this.value);
                            }
                        })
                    })
                }
                var dv = div().class('col-md-' + a.row).child(ct)
                if (a.display != undefined) {
                    dv.css({ display: a.display })
                }
                return dv.get();
            }
            /* input number */
            this.data.form.typeNumber = function (a) {
                var ct = div().class('form-group');
                if (a.line != undefined) {
                    ct.css({
                        display: 'grid',
                        gridTemplateColumns: (function (a) {
                            if (Number.isInteger(a) === true) {
                                return a + `px auto`
                            } else {
                                return `80px auto`
                            }
                        })(a.line)
                    })
                }
                ct.child(
                    el('label').html(a.title).attr('for', a.name).css({
                        display: 'flex',
                        alignItems: 'center'
                    })
                )

                var inpt = el('input').type('text')
                    .class('form-control form-d').name(a.name).id(a.name).hold('0').css({
                        textAlign: 'right'
                    })
                if (a.readonly == true) {
                    inpt.attr('readonly', 'true')
                }

                inpt.addModule('a', a)
                inpt.load(function (e) {
                    e.el.addEventListener('keyup', function () {
                        var c = this.value;
                        var a = this.a;
                        var pis = c.length - 1;
                        if (c[pis] == ".") {
                            c = c.substr(0, pis) + ",";
                        }
                        c = c.replace(/\./g, "");
                        this.value = formatRupiah(c, "");
                        if (a.action != undefined) {
                            a.action(this.value.number())
                        }
                    }, false)
                })

                ct.child(
                    inpt
                );
                if (a.info != undefined && typeof a.info === 'string') {
                    ct.child(
                        el('small').css('font-style', 'italic').html(a.info)
                    );
                };
                var dv = div().class('col-md-' + a.row).child(ct)

                if (a.display != undefined) {
                    dv.css({ display: a.display })
                }

                return dv.get();
            }
            /* input radio */
            this.data.form.typeRadio = function (a) {
                var ct = div().class('form-group');
                if (a.line != undefined) {
                    ct.css({
                        display: 'grid',
                        gridTemplateColumns: (function (a) {
                            if (Number.isInteger(a) === true) {
                                return a + `px auto`
                            } else {
                                return `80px auto`
                            }
                        })(a.line)
                    })
                }
                ct.child(
                    el('label').html(a.title).css({
                        display: 'flex',
                        alignItems: 'center'
                    })
                )
                var inpt = el('div').id(a.name)
                if (a.readonly == true) {
                    inpt.attr('readonly', 'true')
                }
                var hdi = el('input').type('hidden').class('form-d').name(a.name).id(a.name);
                inpt.child(hdi);
                if (a.down != undefined && a.down === true) {
                    inpt.css({
                        display: 'grid'
                    })
                    // set to grid
                    if (a.downcols != undefined) {
                        if (Number.isInteger(a.downcols) === true) {
                            var fa = ''
                            for (let y = 0; y < a.downcols; y++) {
                                fa += ' ' + Math.round(100 / a.downcols) + '% '
                            }
                            inpt.css({
                                gridTemplateColumns: fa
                            })
                        } else {
                            inpt.css({
                                gridTemplateColumns: '50% 50%'
                            })
                        }
                    } else {
                        inpt.css({
                            gridTemplateColumns: '50% 50%'
                        })
                    }
                }

                a.data.forEach(function (dt, i) {
                    inpt.child(
                        el('label')
                            .css({
                                display: 'inline-block',
                                padding: '0 5px',
                                cursor: 'pointer'
                            })
                            .child(
                                el('input').type('radio').class('f-op').name(a.name + 'radion').id(a.name + 'radio' + i).val(dt.id)
                                    .addModule('hdi', hdi)
                                    .addModule('a', a)
                                    .change(function (event) {
                                        event.stopPropagation();
                                        event.target.hdi.get().value = event.target.value;
                                        if (event.target.a.action != undefined) {
                                            event.target.a.action(event.target.value)
                                        }
                                    })
                            )
                            .child(
                                el('span').css({
                                    display: 'inline-block',
                                    padding: '0 3px'
                                }).html(dt.text)
                            )
                    )
                })

                inpt.addModule('a', a)
                inpt.load(function (e) {
                    var e = e.el;
                })

                ct.child(
                    inpt
                )

                var dv = div().class('col-md-' + a.row).child(ct)
                if (a.display != undefined) {
                    dv.css({ display: a.display })
                }
                return dv.get();
            }
            this.data.form.typeSelect = function (a) {
                var ct = div().class('form-group');
                if (a.line != undefined) {
                    ct.css({
                        display: 'grid',
                        gridTemplateColumns: (function (a) {
                            if (Number.isInteger(a) === true) {
                                return a + `px auto`
                            } else {
                                return `80px auto`
                            }
                        })(a.line)
                    })
                };

                ct.child(
                    el('label').html(a.title).css({
                        display: 'flex',
                        alignItems: 'center'
                    })
                );

                var inpt = el('select').class('form-control form-d').name(a.name).id(a.name);

                if (a.action != undefined) {
                    inpt.addModule('act', a.action).load(function (s) {
                        s.el.act(s.el)
                    })
                };

                if (a.readonly == true) {
                    inpt.attr('readonly', 'true')
                };

                inpt.child(
                    el('option').val('').html('...')
                );

                a.data.forEach(function (dt) {
                    var txt = dt.id + '-' + dt.text;
                    if (dt.id.toLowerCase() === dt.text.toLowerCase()) {
                        txt = dt.text;
                    };

                    if (a.textonly === true) {
                        txt = dt.text;
                    };

                    inpt.child(
                        el('option').val(dt.id).html(txt)
                    );
                });

                inpt.load(function (s) {
                    var id = s.el.id;
                    $('#' + id).select2();
                });

                ct.child(
                    inpt
                );
                if (a.info != undefined && typeof a.info === 'string') {
                    ct.child(
                        el('small').css('font-style', 'italic').html(a.info)
                    );
                };
                var dv = div().class('col-md-' + a.row).child(ct);
                if (a.display != undefined) {
                    dv.css({ display: a.display });
                };
                return dv.get();
            }
            return this;
        }
        , debug: function (a) {
            if (a != undefined && typeof a === 'boolean') {
                this.data.debug = a;
            }
            return this;
        }
        , call: function () {
            if (this.data.form === undefined) {
                this.formsConf();
            }
            var obj = this;
            var container = _id(this.id)
            obj._filterContainer(container);
            container.style.overflowX = 'auto';
            container.style.maxWidth = '100%';
            var ld = cssLoader();
            setTimeout(function () {
                var n = [];
                if (obj.data.filter != undefined && obj.data.filterLoad != undefined && typeof obj.data.filterLoad === 'function') {
                    if (obj.data.filterContainer != undefined && obj.data.filterContainer.tagName != undefined) {
                        n = Array.from(obj.data.filterContainer.querySelectorAll('.form-d')).map(function (d) {
                            return {
                                el: d,
                                name: d.name,
                                value: d.value
                            }
                        })
                    }
                    obj.globalEvent = (function (x) {
                        var z = {}
                        z.el = x;
                        z.setOption = function (a, bm) {
                            var id = this.el.id;
                            if (id != undefined) {
                                var val = document.querySelector("#" + id + " #" + a).value;
                                document.querySelector("#" + id + " #" + a).innerHTML = `<option value="">...</option>` + bm.map(function (k) {
                                    return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                                }).join('');
                                $("#" + id + ' #' + a).trigger('change');
                                $("#" + id + ' #' + a).val(val).trigger('change');
                            } else {
                                document.querySelector("#" + a).innerHTML = `<option value="">...</option>` + bm.map(function (k) {
                                    return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                                }).join('');
                            }
                        }
                        z.change = function (a, callback) {
                            var id = this.el.id;
                            try {
                                (function () {
                                    if (id != undefined) {
                                        var type = document.querySelector("#" + id + " #" + a);
                                        if (type != undefined) {
                                            if (type.tagName === 'SELECT') {
                                                $("#" + id + " #" + a).change(callback);
                                            } else {
                                                type.addEventListener('change', callback, false);
                                            }
                                        }
                                    } else {
                                        document.querySelector("#" + a).addEventListener('change', callback, false)
                                    }
                                })();
                            } catch (e) {
                                console.log(e);
                            }
                        }
                        z.setVal = function (a, b) {
                            var id = this.el.id;
                            try {
                                (function () {
                                    if (id != undefined) {
                                        var type = document.querySelector("#" + id + " #" + a);
                                        if (type != undefined) {
                                            if (type.tagName === 'SELECT') {
                                                $("#" + id + " #" + a).val(b);
                                                $("#" + id + " #" + a).trigger('change');
                                            } else {
                                                if(type.dataset.type != 'undefined'){
                                                    if(type.dataset.type == 'date'){
                                                        let [tahun,bulan,hari] = b.split('-');
                                                        type.value = hari+'-'+bulan+'-'+tahun;
                                                    }else{
                                                        type.value = b;
                                                    }
                                                }else{
                                                    type.value = b;
                                                }
                                            }
                                        }
                                    } else {
                                        console.log('free');
                                        document.querySelector("#" + a).value = b;
                                    }
                                })();
                            } catch (e) {
                                console.log(e);
                            }
                        }
                        z.getVal = function (a, b) {
                            var id = this.el.id;
                            try {
                                return (function () {
                                    if (id != undefined) {
                                        let r = document.querySelector("#" + id + " #" + a);
                                        if (typeof r.dataset.type != 'undfined') {
                                            if (r.dataset.type === 'date') {
                                                let [nday, nmonth, nyear] = r.value.split('-');
                                                return nyear + '-' + nmonth + '-' + nday;
                                            }else{
                                                return document.querySelector("#" + id + " #" + a).value;
                                            }
                                        } else {
                                            return document.querySelector("#" + id + " #" + a).value;
                                        }
                                    } else {
                                        let r = document.querySelector("#" + a);
                                        if (typeof r.dataset.type != 'undfined') {
                                            if (r.dataset.type === 'date') {
                                                let [nday, nmonth, nyear] = r.value.split('-');
                                                return nyear + '-' + nmonth + '-' + nday;
                                            }else{
                                                return document.querySelector("#" + a).value;
                                            }
                                        } else {
                                            return document.querySelector("#" + a).value;
                                        }
                                    }
                                })();
                            } catch (e) {
                                console.log(e);
                                return '';
                            }
                        }
                        return z;
                    })(obj.data.filterContainer);
                    _saveCall({}, function () {
                        obj.data.filterLoad(
                            (function (x) {
                                var z = {}
                                z.el = x;
                                z.setOption = function (a, bm) {
                                    var id = this.el.id;
                                    if (id != undefined) {
                                        var val = document.querySelector("#" + id + " #" + a).value;
                                        document.querySelector("#" + id + " #" + a).innerHTML = `<option value="">...</option>` + bm.map(function (k) {
                                            return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                                        }).join('');
                                        $("#" + id + ' #' + a).trigger('change');
                                        $("#" + id + ' #' + a).val(val).trigger('change');
                                    } else {
                                        document.querySelector("#" + a).innerHTML = `<option value="">...</option>` + bm.map(function (k) {
                                            return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                                        }).join('');
                                    }
                                }
                                z.change = function (a, callback) {
                                    var id = this.el.id;
                                    try {
                                        (function () {
                                            if (id != undefined) {
                                                var type = document.querySelector("#" + id + " #" + a);
                                                if (type != undefined) {
                                                    if (type.tagName === 'SELECT') {
                                                        $("#" + id + " #" + a).change(callback);
                                                    } else {
                                                        type.addEventListener('change', callback, false);
                                                    }
                                                }
                                            } else {
                                                document.querySelector("#" + a).addEventListener('change', callback, false)
                                            }
                                        })();
                                    } catch (e) {
                                        console.log(e);
                                    }
                                }
                                z.setVal = function (a, b) {
                                    var id = this.el.id;
                                    try {
                                        (function () {
                                            if (id != undefined) {
                                                var type = document.querySelector("#" + id + " #" + a);
                                                if (type != undefined) {
                                                    if (type.tagName === 'SELECT') {
                                                        $("#" + id + " #" + a).val(b);
                                                        $("#" + id + " #" + a).trigger('change');
                                                    } else {
                                                        if (type.dataset.type != 'undefined') {
                                                            if (type.dataset.type == 'date') {
                                                                let [tahun, bulan, hari] = b.split('-');
                                                                type.value = hari + '-' + bulan + '-' + tahun;
                                                            } else {
                                                                type.value = b;
                                                            }
                                                        } else {
                                                            type.value = b;
                                                        }
                                                    }
                                                }
                                            } else {
                                                document.querySelector("#" + a).value = b;
                                            }
                                        })();
                                    } catch (e) {
                                        console.log(e);
                                    }
                                }
                                z.getVal = function (a, b) {
                                    var id = this.el.id;
                                    try {
                                        return (function () {
                                            if (id != undefined) {
                                                let r = document.querySelector("#" + id + " #" + a);
                                                if (typeof r.dataset.type != 'undfined') {
                                                    if (r.dataset.type === 'date') {
                                                        let [nday, nmonth, nyear] = r.value.split('-');
                                                        return nyear + '-' + nmonth + '-' + nday;
                                                    }
                                                    return '';
                                                } else {
                                                    return document.querySelector("#" + id + " #" + a).value;
                                                }
                                            } else {
                                                let r = document.querySelector("#" + a);
                                                if (typeof r.dataset.type != 'undfined') {
                                                    if (r.dataset.type === 'date') {
                                                        let [nday, nmonth, nyear] = r.value.split('-');
                                                        return nyear + '-' + nmonth + '-' + nday;
                                                    }
                                                    return '';
                                                } else {
                                                    return document.querySelector("#" + a).value;
                                                }
                                            }
                                        })();
                                    } catch (e) {
                                        console.log(e);
                                        return '';
                                    }
                                }
                                return z;
                            })(obj.data.filterContainer), obj.data.statusStart, obj);
                    });
                };

                setTimeout(function () {
                    obj.data.statusStart = false;
                    var _qr = obj.data.qr;
                    if (obj._conf != undefined && typeof obj._conf === 'object') {
                        if (Object.keys(obj._conf).length > 0) {
                            Object.keys(obj._conf).forEach(function (s) {
                                if (typeof obj._conf[s] === 'string') {
                                    _qr = _qr.replaceAll('{' + s + '}', obj._conf[s]);
                                }
                                if (typeof obj._conf[s] === 'function') {
                                    _saveCall({}, function () {
                                        _qr = _qr.replaceAll('{' + s + '}', obj._conf[s](obj, (function (x) {
                                            var z = {}
                                            z.el = x;
                                            z.setOption = function (a, bm) {
                                                var id = this.el.id;
                                                if (id != undefined) {
                                                    var val = document.querySelector("#" + id + " #" + a).value;
                                                    document.querySelector("#" + id + " #" + a).innerHTML = `<option value="">...</option>` + bm.map(function (k) {
                                                        return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                                                    }).join('');
                                                    $("#" + id + ' #' + a).trigger('change');
                                                    $("#" + id + ' #' + a).val(val).trigger('change');
                                                } else {
                                                    document.querySelector("#" + a).innerHTML = `<option value="">...</option>` + bm.map(function (k) {
                                                        return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                                                    }).join('');
                                                }
                                            }
                                            z.change = function (a, callback) {
                                                var id = this.el.id;
                                                try {
                                                    (function () {
                                                        if (id != undefined) {
                                                            var type = document.querySelector("#" + id + " #" + a);
                                                            if (type != undefined) {
                                                                if (type.tagName === 'SELECT') {
                                                                    $("#" + id + " #" + a).change(callback);
                                                                } else {
                                                                    type.addEventListener('change', callback, false);
                                                                }
                                                            }
                                                        } else {
                                                            document.querySelector("#" + a).addEventListener('change', callback, false)
                                                        }
                                                    })();
                                                } catch (e) {
                                                    console.log(e);
                                                }
                                            }
                                            z.setVal = function (a, b) {
                                                var id = this.el.id;
                                                try {
                                                    (function () {
                                                        if (id != undefined) {
                                                            var type = document.querySelector("#" + id + " #" + a);
                                                            if (type != undefined) {
                                                                if (type.tagName === 'SELECT') {
                                                                    $("#" + id + " #" + a).val(b);
                                                                    $("#" + id + " #" + a).trigger('change');
                                                                } else {
                                                                    if (type.dataset.type != 'undefined') {
                                                                        if (type.dataset.type == 'date') {
                                                                            let [tahun, bulan, hari] = b.split('-');
                                                                            type.value = hari + '-' + bulan + '-' + tahun;
                                                                        } else {
                                                                            type.value = b;
                                                                        }
                                                                    } else {
                                                                        type.value = b;
                                                                    }
                                                                }
                                                            }
                                                        } else {
                                                            document.querySelector("#" + a).value = b;
                                                        }
                                                    })();
                                                } catch (e) {
                                                    console.log(e);
                                                }
                                            }
                                            z.getVal = function (a) {
                                                var id = this.el.id;
                                                try {
                                                    return (function () {
                                                        if (id != undefined) {
                                                            let r = document.querySelector("#" + id + " #" + a);
                                                            if (typeof r.dataset.type != 'undfined') {
                                                                if(r.dataset.type === 'date'){
                                                                    let [nday, nmonth, nyear] = r.value.split('-');
                                                                    return nyear+'-'+nmonth+'-'+nday;
                                                                }else{
                                                                    return document.querySelector("#" + id + " #" + a).value;
                                                                }
                                                            }else{
                                                                return document.querySelector("#" + id + " #" + a).value;
                                                            }
                                                        } else {
                                                            let r = document.querySelector("#" + a);
                                                            if (typeof r.dataset.type != 'undfined') {
                                                                if (r.dataset.type === 'date') {
                                                                    let [nday, nmonth, nyear] = r.value.split('-');
                                                                    return nyear + '-' + nmonth + '-' + nday;
                                                                }else{
                                                                    return document.querySelector("#" + a).value;
                                                                }
                                                            } else {
                                                                return document.querySelector("#" + a).value;
                                                            }
                                                        }
                                                    })();
                                                } catch (e) {
                                                    console.log(e);
                                                    return '';
                                                }
                                            }
                                            return z;
                                        })(obj.data.filterContainer)));
                                    })
                                }
                            })
                        }
                    };
                    if (obj.data.debug === true) {
                        console.log(_qr);
                    }
                    AuditDevQuery(_qr, function (s) {
                        ld.remove();
                        /*clear content*/
                        container.innerHTML = '';
                        container.appendChild(
                            el(`style`).html(`
                                table{
                                    border-collapse: collapse;
                                }
                                table td {
                                    border-bottom: 1px solid #ddd;
                                }
                                table th {
                                    border-bottom: 1px solid #ddd;
                                }
                            `).get()
                        );
                        container.appendChild(
                            div().html(obj.table(s)).get()
                        );
                    });
                }, 100)
            }, 10);
            return obj;
        }
    }
})();

/* end script */