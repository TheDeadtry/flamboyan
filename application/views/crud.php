<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css">
<script>
    window.openForms = function() {
        document.getElementById('e-form').style.display = "block";
        document.getElementById('e-table').style.display = "none";
    }

    window.closeForms = function() {
        document.getElementById('e-form').style.display = "none";
        document.getElementById('e-table').style.display = "block";
    }

    let tbl = null;

    const actionDude = {
        new: null,
        edit: null,
        delete: null,
        simpan: null,
    }

    function blobToBase64(blob) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();

            // Event handler untuk saat proses pembacaan selesai
            reader.onloadend = () => {
                const base64String = reader.result.split(',')[1]; // Ambil bagian setelah 'data:application/octet-stream;base64,'
                resolve(base64String);
            };

            // Event handler untuk saat terjadi error
            reader.onerror = reject;

            // Membaca Blob sebagai URL data
            reader.readAsDataURL(blob);
        });
    }

    window.FormConfig = function(e) {
        return {
            title: e.label,
            type: e.type != undefined ? e.type : 'text',
            display: e.display != undefined ? e.display : 'block',
            data: e.data ? e.data : [],
            textonly: true,
            change: typeof e.change == 'function' ? e.change : null,
            name: e.name,
            line: e.line ? e.line : 190,
            row: e.row ? e.row : 12,
            format: e.format ? e.format : null,
            follow: e.follow ? e.follow : true,
            multiple: e.multiple ? e.multiple : false,
            typefile: e.typefile ? e.typefile : false,
            path: e.path ? e.path : false,
            basePath: e.basePath ? e.basePath : false,
            readonly: e.readonly ? e.readonly : false,
            custname: e.custname ? e.custname : null,
            action: function(e) {},
        }
    }

    $(document).on('click', '.edit', function() {
        if (typeof actionDude.edit === 'function') {
            actionDude.edit(this)
        }
    })

    $(document).on('click', 'button.new', function() {
        if (typeof actionDude.new === 'function') {
            actionDude.new(this)
        }
    })

    $(document).on('click', '.simpan', function() {
        if (typeof actionDude.simpan === 'function') {
            actionDude.simpan(this)
        }
    })

    $(document).on('click', '.hapus', function(event) {
        if (typeof actionDude.delete === 'function') {
            actionDude.delete(event);
        }
    })

    const loadCrud = function(objectForm) {

        let timeSet = document.querySelector('.cj-modal').dataset.code;

        window._terbilang = function(bilangan) {

            bilangan = String(bilangan);
            var angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
            var kata = new Array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan');
            var tingkat = new Array('', 'ribu', 'juta', 'milyar', 'triliun');

            var panjang_bilangan = bilangan.length;
            var kalimat = subkalimat = kata1 = kata2 = kata3 = "";
            var i = j = 0;

            /* pengujian panjang bilangan */
            if (panjang_bilangan > 15) {
                kalimat = "Diluar Batas";
                return kalimat;
            }

            /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
            for (i = 1; i <= panjang_bilangan; i++) {
                angka[i] = bilangan.substr(-(i), 1);
            }

            i = 1;
            j = 0;
            kalimat = "";

            /* mulai proses iterasi terhadap array angka */
            while (i <= panjang_bilangan) {

                subkalimat = "";
                kata1 = "";
                kata2 = "";
                kata3 = "";

                /* untuk Ratusan */
                if (angka[i + 2] != "0") {
                    if (angka[i + 2] == "1") {
                        kata1 = "Seratus";
                    } else {
                        kata1 = kata[angka[i + 2]] + " ratus";
                    }
                }

                /* untuk Puluhan atau Belasan */
                if (angka[i + 1] != "0") {
                    if (angka[i + 1] == "1") {
                        if (angka[i] == "0") {
                            kata2 = "Sepuluh";
                        } else if (angka[i] == "1") {
                            kata2 = "Sebelas";
                        } else {
                            kata2 = kata[angka[i]] + " belas";
                        }
                    } else {
                        kata2 = kata[angka[i + 1]] + " puluh";
                    }
                }

                /* untuk Satuan */
                if (angka[i] != "0") {
                    if (angka[i + 1] != "1") {
                        kata3 = kata[angka[i]];
                    }
                }

                /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
                if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
                    subkalimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
                }

                /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
                kalimat = subkalimat + kalimat;
                i = i + 3;
                j = j + 1;

            }

            /* mengganti Satu Ribu jadi Seribu jika diperlukan */
            if ((angka[5] == "0") && (angka[6] == "0")) {
                kalimat = kalimat.replace("Satu Ribu", "Seribu");
            }

            return (kalimat.trim().replace(/\s{2,}/g, ' ')) + " rupiah";
        };

        (function toolsLoad() {
            const globalObject = {
                _Help: function() {
                    return {
                        getLabel: function(a) {
                            let vv = document.getElementById(objectForm.idform);
                            let yo = vv.querySelector('#' + a);
                            if (typeof yo === 'object') {
                                return (function getLabel(yo) {
                                    if (yo.parentNode.querySelector('label') === null) {
                                        return getLabel(yo.parentNode)
                                    }
                                    return yo.parentNode.querySelector('label');
                                })(yo);
                            }
                            return false;
                        }
                    }
                }
            };

            // Salin properti dari objek global Anda ke objek window
            Object.keys(globalObject).forEach(key => {
                if (!window.hasOwnProperty(key)) {
                    Object.defineProperty(window, key, {
                        get: globalObject[key], // Assign the function as the getter
                        set: function() {
                            // Tidak melakukan apa-apa saat mencoba mengatur properti
                        },
                        enumerable: true,
                        configurable: true // Mencegah penghapusan atau perubahan konfigurasi
                    });
                }
            });

            window._Evclick = function(a, callback) {
                a.addEventListener('click', callback, false);
            }

            window._Evchange = function(a, callback) {
                if (objectForm.idform != undefined) {
                    $("#" + objectForm.idform + " #" + a.id).change(callback)
                } else {
                    $("#" + a.id).change(callback)
                }
            }

            window.dateNow = function() {
                return tanggal(tanggal().normal).sekarang;
            }

            window._Evkeyup = function(a, callback) {
                a.addEventListener('keyup', callback, false);
            }

            window._Evkeydown = function(a, callback) {
                a.addEventListener('keydown', callback, false);
            }

            window._Evload = function(a, callback) {
                a.addEventListener('load', callback, false);
            }

            window._viewnum = function(a, b) {
                if (b != 'update') {
                    return a.number(2).currency(0)
                } else {
                    return a;
                }
            }
            window._viewrp = function(a, b) {
                if (b != 'update') {
                    return a.number(2).currency(0).replace(/\./g, ',')
                } else {
                    return a;
                }
            }
            window._tgl = function(a, b) {
                return tanggal(a).sekarang;
            }
            window._nodecimal = function(a, b) {
                if (objectForm.idform != undefined) {
                    $("#" + objectForm.idform + " #" + a).val(Number(b).currency(0))
                } else {
                    $("#" + a).val(b)
                }
            }

            globalThis._times = function() {
                var today = new Date();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                return time;
            }

            window._selectNull = function(id) {
                $("#" + id).val('').trigger('change');
            }

            window._bbdown = function(faktur) {
                var _ld = cssLoader();
                AuditDevQuery(datalogin,`DELETE FROM lap_bb WHERE kode = '${faktur}'`, function() {
                    _ld.remove();
                })
            }

            window._arrayBB = function(dat) {
                var bb = _master('bb', 'bb').cond(dat.table, 'table_name').cond(_setup('kodebb'), 'kode')
                var app = '{{APPNAME}}';
                var newA = [];
                dat.data.forEach(function(c) {
                    bb.forEach(function(d) {
                        var x = {}
                        x.rekdebit = d.akundebet
                        x.rekkredit = d.akunkredit
                        x.debit = c[d.kodedebet]
                        x.kredit = c[d.kodekredit]
                        x.app = d.app
                        x.table_name = dat.table
                        x.username = username
                        x.userlog = timestamp()
                        x.keterangan = c[dat.ket]
                        x.tgl = c[dat.tgl]
                        x.tr = d.tr
                        x.kode = c[dat.kode]
                        newA.push(x)
                    })
                })
                return newA;
            }

            window._doubleInsert = function(dat) {
                var dx = [];
                dx.push(_setInsert({
                    kode: dat.kode,
                    table: dat.table,
                    data: dat.data,
                }))
                var s = _arrayBB({
                    table: dat.table,
                    kode: dat.kode,
                    tgl: dat.tgl,
                    ket: dat.ket,
                    data: dat.data
                })
                dx.push(_setInsert({
                    table: 'lap_bb',
                    kode: 'kode',
                    data: s,
                }))
                return dx;
            }

            window._setInsert = function(dat) {
                var kode = dat.kode
                var table = dat.table
                var rw = (function() {
                    if (dat.data.length > 0) {
                        return '(' + Object.keys(dat.data[0]).join(',') + ')';
                    } else {
                        return ''
                    }
                })();
                var rw2 = (function() {
                    if (dat.data.length > 0) {
                        var f = 'SELECT ' + Object.keys(dat.data[0]).map(function(r) {
                            return 'a.' + r
                        }).join(',') + ' FROM (';
                        f += dat.data.map(function(j) {
                            var p = ' SELECT '
                            p += Object.keys(j).map(function(c) {
                                if (j[c] === null) {
                                    return '"" `' + c + '`';
                                }
                                return '"' + j[c].replace(/\"/g, "\\\"") + '" `' + c + '`'
                            }).join(",")
                            return p;
                        }).join(" \n UNION ALL \n ")
                        f += ") a ";
                        f += "LEFT JOIN " + table + " b ON b." + kode + " = a." + kode + " WHERE "
                        f += "b." + kode + " IS NULL";
                        return f;
                    } else {
                        return ''
                    }
                })();
                var qr = 'INSERT INTO ';
                qr += table;
                qr += rw;
                qr += rw2;
                return qr;
            }

            window._setupKodesp = function(kodesp, v) {
                if (v === undefined) {
                    _setup('kodebb', globalThis[kodesp].parent.value);
                    return false;
                }
                if (v != undefined && typeof v === 'string') {
                    _setup('kodebb', v);
                }
            }

            window._bbup = function(dat) {

                var kode = _getval(dat.faktur);
                var tgl = _getval(dat.tgl);
                var keterangan = _getval(dat.ket);
                var username = _getval(dat.username);
                var userlog = _getval('userlog');
                var table_name = dat.table;
                var app = dataApi.app;
                AuditDevQuery(datalogin,"SELECT * FROM setbb", function(bb) {
                    bb = bb.cond(table_name, 'table_name').cond(_setup('kodebb'), 'kode').map(function(q) {
                        var c = {}
                        c.tr = q.tr;
                        c.rekdebit = (function() {
                            if (dat.reverse === true) {
                                return q.akunkredit;
                            }
                            return q.akundebet;
                        })();
                        if (q.kodedebet.indexOf(',') != -1) {
                            c.debit = (function(vv) {
                                var x = 0;
                                vv.forEach(function(t) {
                                    x += _getval(t).number();
                                })
                                return x;
                            })(q.kodedebet.split(','));
                        } else {
                            c.debit = _getval(q.kodedebet).number();
                        }
                        c.rekkredit = (function() {
                            if (dat.reverse === true) {
                                return q.akundebet;
                            }
                            return q.akunkredit;
                        })();;
                        if (q.kodedebet.indexOf(',') != -1) {
                            c.kredit = (function(vv) {
                                var x = 0;
                                vv.forEach(function(t) {
                                    x += _getval(t).number();
                                })
                                return x;
                            })(q.kodekredit.split(','));
                        } else {
                            c.kredit = _getval(q.kodekredit).number();
                        }
                        c.table_name = table_name;
                        c.app = q.app;
                        c.username = username;
                        c.userlog = userlog;
                        c.keterangan = keterangan;
                        c.tgl = tgl;
                        c.kode = kode;

                        if (dat.data != undefined && typeof dat.data === 'object') {
                            Object.keys(dat.data).forEach(function(w) {
                                c[w] = dat.data[w];
                            })
                        }
                        return c;
                    });

                    if (bb.length > 0) {
                        var nm = Object.keys(bb[0])
                        var sw = 'SELECT a.* FROM (\n' + bb.map(function(pop) {
                            var s = ' SELECT ';
                            s += nm.map(function(hk) {
                                if (Number.isInteger(pop[hk])) {
                                    return '"' + pop[hk] + '" ' + hk
                                }
                                return '"' + pop[hk].replace(/\"/g, "\\\"") + '" ' + hk
                            }).join(",")
                            return s;
                        }).join("\n UNION ALL\n") + `\n) a `;
                        var insert = `INSERT INTO lap_bb (${nm.join(',')}) ` + sw + `
                    LEFT JOIN lap_bb b ON b.kode = a.kode AND b.tr = a.tr
                    WHERE b.kode IS NULL
                `;

                        var update = `UPDATE lap_bb aa, (${sw}) bb SET ${nm.map(function (as) {
                        return ` aa.${as} = bb.${as} `
                    }).join(",")
                        } WHERE aa.kode = bb.kode AND aa.tr = bb.tr `
                        var _tdl = cssLoader();
                        AuditDevQuery(datalogin,insert, function() {
                            AuditDevQuery(datalogin,update, function() {
                                _tdl.remove();
                            })
                        })
                    }
                });
            }


            window._setval = function(a, b) {
                try {
                    (function() {
                        if (objectForm.idform != undefined) {
                            var type = document.querySelector("#" + objectForm.idform + " #" + a);
                            if (type != undefined) {
                                if (type.tagName === 'SELECT') {
                                    $("#" + objectForm.idform + " #" + a).val(b);
                                    $("#" + objectForm.idform + " #" + a).trigger('change');
                                } else if (type.tagName === 'INPUT' && type.dataset.type === 'date') {
                                    $("#" + objectForm.idform + " #" + a).datepicker("update", new Date(b));
                                } else {
                                    type.value = b;
                                }
                            }
                        } else {
                            document.querySelector("#" + a).value = b;
                        }
                    })();
                } catch (e) {}
            }

            window._setVal = _setval;

            window._getval = function(a) {
                if (objectForm.idform != undefined) {
                    var vv = document.querySelector("#" + objectForm.idform + " #" + a);
                    var tiraInput = objectForm.data.cond(a, 'name');
                    if (tiraInput.length > 0) {
                        if (tiraInput[0].type === 'radio') {
                            return globalThis[a].parent.value;
                        }
                    }
                    if (vv.tagName === 'SELECT') {
                        var v = $("#" + objectForm.idform + " #" + a).val();
                        if (Array.isArray(v)) {
                            return v.join(",");
                        }
                        return v;
                    } else if (vv.tagName == 'INPUT' && vv.dataset.type == 'date') {
                        return (function(s) {
                            var [tgl, bulan, tahun] = s.split("-");
                            return tahun + '-' + bulan + '-' + tgl;
                        })(document.querySelector("#" + objectForm.idform + " #" + a).value);
                    }
                    return document.querySelector("#" + objectForm.idform + " #" + a).value;
                } else {
                    return document.querySelector("#" + a).value
                }
            }

            window._getVal = _getval;

            window._setoption = function(a, bm) {
                if (objectForm.idform != undefined) {
                    var val = document.querySelector("#" + objectForm.idform + " #" + a).value;
                    document.querySelector("#" + objectForm.idform + " #" + a).innerHTML = `<option value="">...</option>` + bm.map(function(k) {
                        var txt = `${k.id} - ${k.text}`;
                        if (k.id.toLowerCase() == k.text.toLowerCase()) {
                            txt = k.text;
                        }
                        return `<option value="${k.id}">${txt}</option>`
                    }).join('');
                    $("#" + objectForm.idform + ' #' + a).trigger('change');
                    $("#" + objectForm.idform + ' #' + a).val(val).trigger('change');
                } else {
                    document.querySelector("#" + a).innerHTML = `<option value="">...</option>` + bm.map(function(k) {
                        return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                    }).join('');
                }
            }

            window._setoptionmulti = function(id, a, bm) {
                Array.from(document.querySelectorAll("#" + id + " [name=\"" + a + "\"")).forEach(function(s) {
                    var val = s.value;
                    var idx = s.id;
                    s.innerHTML = `<option value="">...</option>` + bm.map(function(k) {
                        return `<option value="${k.id}">${k.id} - ${k.text}</option>`
                    }).join('');
                    $("#" + id + ' #' + idx).val(val).trigger('change');
                });
                return true;
            }

            window._setOption = _setoption;

            window._cekNullDoc = function(el, n) {
                if (el == undefined) {
                    alert(n + ' not found');
                    throw 'not found';
                }
            }

            window._setup = function(a, b) {
                if (window._winSetData == undefined) {
                    window._winSetData = {}
                }
                if (b === undefined || b === null) {
                    if (window._winSetData[a] == undefined) {
                        return false;
                    } else {
                        var v = window._winSetData[a];
                        return v;
                    }
                } else {
                    window._winSetData[a] = b;
                    return true;
                }
            };


            window.getFormData = function(classX, w = 4) {
                var t = Array.from(document.querySelectorAll("#" + classX + " .form-s"))
                var z = t.chunk(w);
                return z.map(function(i) {
                    var ws = {};
                    i.forEach(function(q) {
                        if (q.className.indexOf('numbers') != -1) {
                            ws[q.name] = q.value.number();
                        } else {
                            ws[q.name] = q.value;
                        }
                    })
                    return ws;
                });
            };


            // confirm
            const confirmation = function(a) {
                if (typeof Swal != 'undefined') {
                    new Swal({
                            title: a.title,
                            text: a.text,
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Ya, Saya yakin!',
                            cancelButtonText: "Tidak, Batalkan!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                new swal("Cancelled", "Your imaginary file is safe :)", "error");
                            } else {
                                new swal("Cancelled", "Your imaginary file is safe :)", "error");
                                e.preventDefault();
                            }
                        });
                    setTimeout(() => {
                        document.querySelector('.swal2-cancel').focus()
                    }, 100);
                    document.querySelector('.swal2-confirm').addEventListener('click', function() {
                        a.callback();
                    });
                };
            }

        })();

        function typeInput(a) {
            let ht = div().class("")
            let ft = el('div')
            let ct = div();
            if (a.line != undefined) {
                ct.css({
                    display: 'grid',
                    gridTemplateColumns: (function(a) {
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
            var inpt = el('input');
            inpt = inpt;
            inpt.css('width','calc(100% - 40px)');
            inpt.css('border-radius','5px !important');
            inpt.type(a.type != 'file' ? a.type : 'text');
            if (a.type == 'file') {
                inpt.css('display', 'none')
            }
            if (a.type === 'date') {
                inpt.type('text');
                inpt.attr('placeholder','dd-mm-yyyy');
            }
            inpt.class(' form-d').name(a.name).id(a.name).hold(a.type === 'date'?'dd-mm-yyyy':(a.type == 'select'? 'Pilih Data':'...'))
            if (a.readonly == true) {
                inpt.attr('readonly', 'true')
            }
            if (a.type == 'date') {
                inpt.addModule("a", a);
                if (a.readonly === true) {
                    inpt.attr('disabled', true);
                }
                inpt.data("type", 'date');
                inpt.load(function(e) {
                    var a = e.el.a;
                    $(" .form-d#" + a.name).mask("00-00-0000");
                    $(" .form-d#" + a.name).datepicker({
                        format: 'dd-mm-yyyy'
                    });
                    e.el.max = new Date().toISOString().split("T")[0];
                    e.el.addEventListener('keyup', delay(function() {
                        if (tanggal(this.value).milisecond > tanggal().milisecond) {
                            this.value = tanggal().normal;

                        }
                        if (a.action != undefined) {
                            a.action(this.value);
                        }
                    }, 500))
                    e.el.addEventListener('change', function() {
                        if (tanggal(this.value).milisecond > tanggal().milisecond) {
                            this.value = tanggal().normal;

                        }
                        if (a.action != undefined) {
                            a.action(this.value);
                        }
                    })
                })
            }
            if (a.type == 'date') {
                inpt.css('width','100%')
                ct.child(
                    div()
                    .css({
                        width: 'calc(100% - 30px)',
                        display: 'grid',
                        gridTemplateColumns: 'auto 45px'
                    })
                    .child(
                        inpt
                    )
                    .child(
                        div().css({
                            display: 'flex',
                            background: '#ff9258',
                            justifyContent: 'center',
                            alignItems: 'center',
                            cursor: 'pointer',
                            color: 'white',
                            height:'30px'
                        }).child(
                            i().class('fas fa-calendar')
                        )
                        .addModule('dataid', a.name)
                        .click(function() {
                            let id = this.dataid;
                            if (typeof _Help != 'undefined') {
                                _Help.getLabel(id).click()
                            }
                        })
                    )
                );
            } else {
                if (a.typefile === 'image') {
                    let inpt2 = el('input');
                    inpt2.type('file');
                    inpt2.id(a.name + '-file');
                    inpt2.data('name', a.name);
                    inpt2.data('path', a.path);
                    inpt2.addModule('a', a);
                    inpt2.css('display', 'none');
                    inpt2.load(function(e) {
                        let inpt = e.el;
                        let a = e.el.a;

                        function getBase64(file, callback) {
                            var reader = new FileReader();
                            reader.readAsDataURL(file);
                            reader.onload = function() {
                                callback(reader.result);
                            };
                            reader.onerror = function(error) {
                                callback('Error: ', error);
                            };
                        }
                        inpt.onchange = function() {
                            let activeInp = this;
                            let name = this.dataset.name;
                            let path = this.dataset.path;
                            let h = 'f-image-' + name;
                            let nm = _id('nama-file-' + name);
                            let ext = _id('file-ext-' + name);
                            let y = _id(h);
                            let files = this.files[0];
                            let namaFile = files.name.split('.');
                            ext.value = window._w == 'u' && ext.value && '' ? ext.value : namaFile.pop();
                            getBase64(this.files[0], function(res) {
                                nm.value = window._w == 'u' && nm.value != '' ?
                                    nm.value :
                                    a.custname && typeof a.custname == 'function' ? a.custname() : `images_${Date.now()}_${y.naturalWidth}x${y.naturalHeight}`;
                                const slug = nm.value + '.' + ext.value;
                                if (res.indexOf('Error:') != -1) {
                                    alert('file tidak dimuat');
                                    throw 'file tidak dimuat';
                                };
                                let dataFile = `file:` + toBase64(JSON.stringify({
                                    slug: path + '/' + slug,
                                    file: res
                                }));
                                document.querySelector(`input.form-d[name="${name}"]`)
                                    .value = dataFile;
                                if (y) {
                                    y.src = res;
                                    activeInp.value = '';
                                };
                            });
                        }
                    });
                    ct.child(
                        inpt2
                    );
                }
                ct.child(
                    inpt
                );
                if (a.typefile === 'image') {
                    ft.child(
                        div()
                        .css({
                            border: '1px solid #ddd',
                            borderRadius: '8px'
                        })
                        .child(
                            div()
                            .css({
                                display: 'grid',
                                gridTemplateColumns: '50% 50%',
                            })
                            .child(
                                el('div').css({
                                    display: 'flex',
                                    cursor: 'pointer',
                                    justifyContent: 'center',
                                    alignItems: 'center',
                                    border: '1px solid #ddd',
                                    height: '200px',
                                }).data('name', a.name).html(`
                                    <i class="fa-solid fa-upload"></i>
                                `).click(function() {
                                    let name = this.dataset.name;
                                    let qr = `${name}-file`;
                                    if (_id(qr)) {
                                        _id(qr).click();
                                    }
                                })
                            )
                            .child(
                                el('div').css({
                                    display: 'flex',
                                    cursor: 'pointer',
                                    justifyContent: 'center',
                                    alignItems: 'center',
                                    border: '1px solid #ddd',
                                    height: '200px',
                                    overflow: 'hidden',
                                    background: 'black',
                                }).child(
                                    el('img').id('f-image-' + a.name).css({
                                        height: '200px'
                                    }).src('https://wallpapercave.com/wp/wp8665558.jpg')
                                )
                            )
                        )
                        .child(
                            el('input').id('nama-file-' + a.name).class('').hold('Nama file!').attr('disabled', true)
                        )
                        .child(
                            el('input').id('last-file-' + a.name).css('display', 'none').class('').hold('Nama file!').attr('disabled', true)
                        )
                        .child(
                            el('input').id('file-ext-' + a.name).class('').attr('disabled', true).hold('type')
                        )
                    )
                }
            }
            if (a.info != undefined && typeof a.info === 'string') {
                ct.child(
                    el('small').css('font-style', 'italic').html(a.info)
                );
            };
            var dv = div().child(ht.child(ct).child(ft))
            if (a.display != undefined) {
                dv.css({
                    display: a.display
                })
            }
            return dv.get();
        }

        function typeNumber(a) {
            var ct = div().class('');
            if (a.line != undefined) {
                ct.css({
                    display: 'grid',
                    gridTemplateColumns: (function(a) {
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
                .class(' form-d').name(a.name).id(a.name).hold('0').css({
                    textAlign: 'right'
                })
                inpt.css('width','calc(100% - 40px)');
            if (a.readonly == true) {
                inpt.attr('readonly', 'true')
                inpt.css('font-weight', 'bold')
            }

            if (a.bold == true) {
                inpt.css('font-weight', 'bold')
            }

            inpt.addModule('a', a)
            inpt.load(function(e) {
                e.el.addEventListener('keyup', function() {
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
            var dv = div().child(ct)

            if (a.display != undefined) {
                dv.css({
                    display: a.display
                })
            }

            return dv.get();
        }

        function typeRadio(a) {
            var ct = div().class('');
            if (a.line != undefined) {
                ct.css({
                    display: 'grid',
                    gridTemplateColumns: (function(a) {
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

            a.data.forEach(function(dt, i) {
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
                        .change(function(event) {
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
            inpt.load(function(e) {
                var e = e.el;
            })

            ct.child(
                inpt
            )

            var dv = div().child(ct)
            if (a.display != undefined) {
                dv.css({
                    display: a.display
                })
            }
            return dv.get();
        }

        function typeSelect(a) {
            var ct = div().class('');
            if (a.line != undefined) {
                ct.css({
                    display: 'grid',
                    gridTemplateColumns: (function(a) {
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

            var inpt = el('select').class(' form-d').name(a.name).id(a.name);
            inpt.css('width','calc(100% - 40px)');
            if (a.action != undefined) {
                inpt.addModule('act', a.action).load(function(s) {
                    s.el.act(s.el)
                })
            };

            if (a.readonly == true) {
                inpt.attr('readonly', 'true')
            };

            if (a.multiple != undefined && a.multiple == true) {
                inpt.attr('multiple', 'multiple')
            } else {
                inpt.child(
                    el('option').val('').html('Pilih Data')
                );
            };

            a.data.forEach(function(dt) {
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

            inpt.load(function(s) {
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
            var dv = div().child(ct);

            if (a.display != undefined) {
                dv.css({
                    display: a.display
                });
            };
            return dv.get();
        }

        if (typeof objectForm != 'undefined') {

            globalThis._radioAct = (function(obj) {
                return {
                    data: obj,
                    setVal: function(a, b = 'SP', c = 0) {
                        var d = this.data;
                        var rdo = _id(d.idform).querySelector('input[name="' + a + '"]').parentNode.querySelectorAll('input[type=radio]');
                        rdo = Array.from(rdo).filter(function(j) {
                            if (j.value == b) {
                                return j
                            } else {
                                j.checked = false;
                            }
                        });
                        if (rdo.length > 0) {
                            rdo[0].checked = false;
                            setTimeout(() => {
                                if (c == 0) {
                                    rdo[0].click();
                                } else {
                                    rdo[0].checked = true;
                                    _id(d.idform).querySelector('input[name="' + a + '"]').value = b;
                                }
                            }, 100);
                        }
                        return this;
                    },
                    clear: function(a) {
                        var d = this.data;
                        var rdo = _id(d.idform).querySelector('input[name="' + a + '"]').parentNode.querySelectorAll('input[type=radio]');
                        rdo = Array.from(rdo).forEach(function(j) {
                            j.checked = false;
                        });
                        return this;
                    },
                    disable: function(a) {
                        var d = this.data;
                        var rdo = _id(d.idform).querySelector('input[name="' + a + '"]').parentNode.querySelectorAll('input[type=radio]');
                        rdo = Array.from(rdo).forEach(function(j) {
                            j.disabled = true;
                        });
                        return this;
                    },
                    open: function(a) {
                        var d = this.data;
                        var rdo = _id(d.idform).querySelector('input[name="' + a + '"]').parentNode.querySelectorAll('input[type=radio]');
                        rdo = Array.from(rdo).forEach(function(j) {
                            j.disabled = false;
                        });
                        return this;
                    }
                }
            })(objectForm);

            globalThis._news = (function(obj) {
                return {
                    data: obj,
                    code: function(a = {}, callback = null) {
                        var d = this.data;
                        var code = a.code;
                        var code1 = tanggal().normal.split('-')[0].substring(2, 4);
                        var table = a.table;
                        var row = a.row;
                        var ld = cssLoader();
                        AuditDevQuery(datalogin,`
                SELECT concat('${code}/${a.data}/${code1}/',lpad( ifnull(
                (SELECT substring_index(${row}, '${code1}/',-1) FROM ${table} WHERE ${row} LIKE '${code}/${a.data}/${code1}/%' ORDER BY ${row} DESC LIMIT 1)
                ,0
                ) + 1,6,0)) ${row}
                `, function(res) {
                            if (callback === null) {
                                _id(d.idform).querySelector('input[name="' + a.row + '"]').value = res[0][row];
                                ld.remove();
                            } else {
                                ld.remove();
                                callback(res[0][row]);
                            }
                        })
                        return this;
                    },
                    codex: function(a = {}) {
                        var d = this.data;
                        var code = a.code;
                        var code1 = tanggal().normal.split('-')[0].substring(2, 4);
                        var code2 = tanggal().normal.split('-')[0];
                        var table = a.table;
                        var row = a.row;
                        var ld = cssLoader();
                        AuditDevQuery(datalogin,`
                SELECT concat('${code}/${a.data}/${code1}/',lpad( ifnull(
                (SELECT substring_index(${row}, '${code1}/',-1) FROM ${table} WHERE ${row} LIKE '${code}/${a.data}/${code1}/%' ORDER BY ${row} DESC LIMIT 1)
                ,0
                ) + 1,6,0)) ${row}
                `, function(res) {
                            _id(d.idform).querySelector('input[name="' + a.row + '"]').value = res[0][row];
                            _id(d.idform).querySelector('input[name="' + a.row2 + '"]').value = ('P' + code2) + res[0][row].split('/')[res[0][row].split('/').length - 1];
                            ld.remove();
                        })
                        return this;
                    },
                }
            })(objectForm);

        }

        if (typeof objectForm != 'undefined') {
            window.__forms = function(prop = {}) {
                var formMaker = objectForm.data.map(function(e) {
                    var obj = null;

                    if (prop[e.name] != undefined) {
                        if (prop[e.name].data != undefined) {
                            e.data = prop[e.name].data.map(function(c) {
                                return {
                                    id: c.id,
                                    text: c.text
                                }
                            });
                        }
                    }

                    if (e.type == 'file') {
                        obj = typeInput(e);
                    }
                    if (e.type == 'text') {
                        obj = typeInput(e);
                    } else if (e.type == 'date') {
                        obj = typeInput(e);
                    } else if (e.type == 'number') {
                        obj = typeNumber(e);
                    } else if (e.type == 'select') {
                        obj = typeSelect(e);
                    } else if (e.type == 'radio') {
                        obj = typeRadio(e);
                    }
                    return {
                        dat: e,
                        e: obj
                    };
                });
                _id(objectForm.idform).innerHTML = '';
                if (objectForm.formsCustome === true) {
                    _id(objectForm.idform).className = '';
                }
                let grouping = {
                    data: [],
                    group: {}
                };
                formMaker.forEach(function(elemen) {
                    if (elemen.dat.type == 'line') {
                        _id(objectForm.idform).appendChild(
                            div().class('col-12')
                            .css({
                                borderBottom: `1px solid #dddddd`,
                                marginBottom: `15px`,
                            }).get()
                        );
                    } else {
                        if(elemen.dat.group){
                            if(!grouping.group[elemen.dat.group]){
                                grouping.group[elemen.dat.group] = [];
                                grouping.data.push(elemen.dat.group);
                            } 
                            grouping.group[elemen.dat.group].push(elemen.e);
                        }else{
                            grouping.data.push(elemen.e);
                        }
                        // _id(objectForm.idform).appendChild(elemen.e)
                    }
                });
                grouping.data.forEach(function(s){
                    if(typeof s === 'string'){
                        let c = el('div');
                        c.css({
                            display:'grid',
                            gridTemplateColumns: grouping.group[s].map(function(e){
                                return ` calc(100% / ${grouping.group[s].length}) `
                            }).join(" ")
                        });

                        _id(objectForm.idform).appendChild(c.get())
                        grouping.group[s].forEach(function(e){
                                let y = el('div');
                                y.css({
                                    position:'relative'
                                })
                                c.get().appendChild(
                                    y.get()
                                );
                                y.get().appendChild(e);
                        })
                    }else{
                        _id(objectForm.idform).appendChild(s);
                    }
                })
            }
            __forms();
        }

        (function dtButtons() {
            var dt = document.querySelector('.dt-buttons');
            if (dt == null) {
                setTimeout(() => {
                    dtButtons();
                }, 500);
            } else {
                Array.from(document.querySelector('.dt-buttons').children).forEach(function(e, i) {
                    _id('listreportmenu').appendChild(
                        el('a').addModule('actbut', e).addModule('as', i).click(function() {
                            tbl.buttons()[this.as].node.click()
                        }).href('#').class('dropdown-item').html(e.innerHTML).get()
                    )
                });
                document.querySelector('.panel-head-menu').appendChild(
                    el('input').type('search').keyup(function() {
                        tbl.search(this.value).draw();
                    }).load(function(e) {
                        e.el.addEventListener('search', function() {
                            tbl.search(this.value).draw();
                        }, false)
                    }).class(' form-search').hold('search...').get()
                )

            }
        })();

        if (typeof objectForm != 'undefined') {
            let _rightPanel = document.querySelector('.content-header-right');
            window._startDate;
            window._endDate;
            if (objectForm.filldate == true) {
                if (_rightPanel != undefined) {
                    _rightPanel.appendChild(
                        div().html(`
                        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                           <i class="fa-solid fa-pen-to-square"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                    `).load(function() {
                            $(function() {
                                window._cekSession = (function() {
                                    return {
                                        get: function() {
                                            let t = localStorage.getItem(location.href + 'ds');
                                            let w = localStorage.getItem(location.href + 'dn');
                                            if (t != undefined) {
                                                return {
                                                    start: t,
                                                    end: w
                                                }
                                            }
                                            return null;
                                        },
                                        set: function(start, end) {
                                            localStorage.setItem(location.href + 'ds', start)
                                            localStorage.setItem(location.href + 'dn', end)
                                        }
                                    }
                                })()

                                window._startDate = moment().subtract(29, 'days');
                                window._endDate = moment();

                                if (window._cekSession.get() != null) {
                                    window._startDate = moment(window._cekSession.get().start)
                                    window._endDate = moment(window._cekSession.get().end);
                                }

                                function cb(d1, d2) {
                                    $('#reportrange span').html(d1.format('MMMM D, YYYY') + ' - ' + d2.format('MMMM D, YYYY'));
                                    _load();
                                }

                                function cb2(d1, d2) {
                                    window._startDate = d1
                                    window._endDate = d2
                                    window._cekSession.set(d1, d2)
                                    $('#reportrange span').html(d1.format('MMMM D, YYYY') + ' - ' + d2.format('MMMM D, YYYY'));
                                    _load();
                                }

                                $('#reportrange').daterangepicker({
                                    startDate: _startDate,
                                    endDate: _endDate,
                                    ranges: {
                                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                                        '1 Years': [moment().startOf('year'), moment().endOf('year')]
                                    }
                                }, cb2);

                                cb(_startDate, _endDate);

                            });

                        }).get()
                    )
                }
            }

            function HtmlEncode(s) {
                let el = document.createElement("div");
                el.innerText = el.textContent = s;
                s = el.innerHTML;
                return s;
            }

            function decodeHTML(text) {
                let textArea = document.createElement('textarea');
                textArea.innerHTML = text;
                return textArea.value;
            }
            let colDef = (function(x) {
                if (x.multiAction != undefined) {
                    return [{
                        orderable: false,
                        className: 'select-checkbox',
                        targets: 0
                    }];
                } else if (objectForm.noStartOrder === true) {
                    return [];
                } else {
                    return [{
                        "width": "59px",
                        "targets": 0
                    }];
                }
            })(objectForm);
            let order = [];
            objectForm.view.forEach(function(s, i) {
                let n = 1 + i;
                if (objectForm.noStartOrder === true) {
                    n = 0 + i;
                }
                if (s === 'tgl') {
                    order.push([n, 'desc']);
                }
            });
            const getPositionOrder = function(x) {
                let position = objectForm.view.indexOf(x) + 1;
                if (objectForm.noStartOrder === true) {
                    position = objectForm.view.indexOf(x) + 0;
                }
                return position;
            };

            if (typeof objectForm.custOrder != 'undefined') {
                objectForm.custOrder.forEach(function(s) {
                    let n = getPositionOrder(s);
                    order.push([n, 'desc']);
                });
            };

            objectForm.view.forEach(function(col, i) {
                let n = 1 + i;
                if (objectForm.noStartOrder === true) {
                    n = 0 + i;
                }
                if (col.indexOf('tgl') != -1) {
                    colDef.push({
                        targets: n,
                        render: function(data, type, row, meta) {
                            if (type === 'display' || type === 'filter') {
                                if (data != '') {
                                    if (moment(data).format('DD-MM-YYYY') != 'Invalid date') {
                                        return moment(data).format('DD-MM-YYYY');
                                    } else {
                                        return data;
                                    }
                                }
                                return '-';
                            }
                            return data; // Tampilkan tanggal dalam format yyyy-mm-dd saat dilakukan pengurutan
                        },
                        orderData: [n], // Atur urutan data berdasarkan kolom tanggal
                        type: 'date-eu' // Atur jenis tipe data untuk pengurutan berdasarkan tanggal (format 'dd/mm/yyyy')
                    });
                }
            });

            let optionTable = {
                dom: 'Bfrtip',
                scrollY: '250px',
                scrollX: true,
                order: order,
                scrollCollapse: true,
                paging: (function() {
                    if (objectForm.pagin === false) {
                        return false;
                    }
                    return true;
                })(),
                "lengthChange": true,
                "lengthMenu": [
                    [25, 50, 100, 500, 1000],
                    [25, 50, 100, 500, "Max"]
                ],
                "pageLength": 50,
                "columnDefs": colDef,
                fixedColumns: {
                    left: (function(x) {
                        if (x.fixed != undefined) {
                            return x.fixed;
                        } else {
                            return 1;
                        }
                    })(objectForm)
                },
                buttons: [
                    'copy',
                    /* export excel */
                    {
                        title: function() {
                            let titleX = 'DATA ' + (function() {
                                let titleX = '';
                                if (objectForm.title != undefined) {
                                    titleX = objectForm.title();
                                }
                                if (objectForm.titleReport != undefined) {
                                    titleX = objectForm.titleReport();
                                }
                                return titleX;
                            })();
                            return titleX;
                        },
                        extend: 'excel',
                        exportOptions: {
                            columns: objectForm.columnsExport
                        },
                        customize: function(xlsx) {
                            let sheet = xlsx.xl.worksheets['sheet1.xml'];
                            Array.from(sheet.querySelectorAll('row')).forEach(function(row, x) {
                                Array.from(row.querySelectorAll('c')).forEach(function(f, i) {
                                    (function col(f, i) {
                                        if (f.children != undefined && f.children.length > 0) {
                                            col(f.children[0], i);
                                        } else {
                                            try {
                                                (function(f, i) {
                                                    if (
                                                        objectForm.customeExport[i].func != undefined
                                                    ) {
                                                        objectForm.customeExport[i].func(f, x, window._datar);
                                                    }
                                                })(f, i);
                                            } catch (e) {
                                                // console.log(e);
                                            }
                                        }
                                    })(f, i);
                                });
                            })
                        }
                    },
                    /* export pdf */
                    {
                        title: (function() {
                            if (objectForm.titleReport != undefined) {
                                return objectForm.titleReport;
                            }
                            return 'DATA ' + (function() {

                                let titleX = '';
                                if (objectForm.title != undefined) {
                                    titleX = objectForm.title();
                                }
                                return titleX;
                            })()
                        })(),
                        extend: 'pdf',
                        download: 'open',
                        messageBottom: null,
                        orientation: (function(obj) {
                            if (obj.orientation == "l") {
                                return "landscape";
                            }
                            return "portrait";
                        })(objectForm),
                        exportOptions: {
                            columns: objectForm.columnsExport
                        },
                        customize: function(doc) {
                            doc.content[0].text = (function() {
                                return (function() {
                                    if (objectForm.titleReport != undefined) {
                                        return 'DATA ' + objectForm.titleReport().toUpperCase();
                                    }
                                    return 'DATA ' + (function() {

                                        let titleX = '';
                                        if (objectForm.title != undefined) {
                                            titleX = objectForm.title();
                                        }
                                        return titleX;
                                    })().toUpperCase()
                                })()
                            })();
                        }
                    },
                    {
                        title: function() {
                            let titleX = 'DATA ' + (function() {
                                let titleX = '';
                                if (objectForm.title != undefined) {
                                    titleX = objectForm.title();
                                }
                                return titleX;
                            })();
                            return titleX;
                        },
                        extend: 'print',
                        exportOptions: {
                            columns: objectForm.columnsExport
                        },
                        messageBottom: null,
                        customize: function(doc) {}
                    }
                ]
            }

            if (objectForm.multiAction != undefined) {
                optionTable.select = (function(x) {
                    if (x.multiAction != undefined) {
                        return {
                            style: 'os',
                            selector: 'td:first-child'
                        }
                    } else {
                        return {}
                    }
                })(objectForm);
            };

            tbl = $('#tabledata').DataTable(optionTable);

            window.tbls = tbl;

            window._load = delay(function() {
                tbl.fnClearTable();
                tbl.cleardraw();
                let g = cssLoader();
                let qr = objectForm.queryTemp;
                let [q1,q2] = qr.split('||')
                let qr1 = q1.replace(/\{select\}/g, objectForm.dataSelect);
                if (window._startDate != undefined && objectForm.custcondition == undefined) {
                    if (objectForm.datekode != undefined && objectForm.filldate == true) {
                        if (qr1.indexOf('WHERE') != -1) {
                            qr1 += ' AND ' + objectForm.datekode + ' >= "' + window._startDate.format('YYYY-MM-DD') + '"'
                        } else {
                            qr1 += ' WHERE ' + objectForm.datekode + ' >= "' + window._startDate.format('YYYY-MM-DD') + '"'
                        }
                        qr1 += ' AND ' + objectForm.datekode + ' <= "' + window._endDate.format('YYYY-MM-DD') + '"'
                    }
                }
                if (objectForm.custcondition != undefined) {
                    qr1 = objectForm.custcondition(qr1);
                };
                let qr2 = qr.split('||')[1];
                let ty = qr1 + qr2;
                if (objectForm.debug == true) {
                    console.log(ty);
                };
                AuditDevQuery(datalogin,ty, function(datas) {
                    let [r] = datas;
                    if (objectForm.customeData != undefined && typeof objectForm.customeData === 'function') {
                        r = objectForm.customeData(r);
                    };
                    r.forEach(function(d, i) {
                        let dat = [];
                        let custb = '';
                        if (objectForm.custButton != undefined) {
                            custb = objectForm.custButton(d, i);
                        }
                        if (objectForm.multiAction === true) {
                            dat.push('');
                        }
                        if (objectForm.disableEditor != undefined) {
                            if (typeof objectForm.disableEditor === 'function') {
                                dat.push(objectForm.disableEditor(d[objectForm.kode], d, i));
                            } else {
                                dat.push(`<div style="text-align:center;">
                                -
                            </div>`)
                            }
                        } else if (objectForm.noAction === true) {
                            dat.push(`<div>
                            ${custb}
                        </div>`)
                        } else if (objectForm.deleteOnly === true) {


                            dat.push(`<div>
                            <button data-id="${i}" data-kode="${d[objectForm.kode]}" class="btn btn-sm btn-clear hapus" style="color:red;"><i class="fa-solid fa-trash"></i></button>
                            ${custb}
                        </div>`)
                        } else {
                            dat.push(`<div>
                            <button data-id="${i}" data-kode="${d[objectForm.kode]}" class="btn btn-sm btn-clear edit" style="color:#666ee8;">Edit</button>
                            <button data-id="${i}" data-kode="${d[objectForm.kode]}" class="btn btn-sm btn-clear hapus" style="color:red;">Hapus</button>
                            ${custb}
                        </div>`)
                        }
                        objectForm.view.forEach(function(v, o) {
                            if (objectForm.custView != undefined) {
                                if (objectForm.custView[o] != undefined && objectForm.custView[o] != false) {
                                    dat.push(objectForm.custView[o](d[v]))
                                } else {
                                    dat.push(d[v])
                                }
                            } else {
                                if (objectForm.custome != undefined) {
                                    if (objectForm.custome[v] != undefined) {
                                        let vv = objectForm.custome[v](d[v], d)
                                        dat.push(vv);
                                    } else {
                                        dat.push(d[v])
                                    }
                                } else {
                                    dat.push(d[v])
                                }
                            }
                        })
                        tbl.row? tbl.row.add(dat) : tbl.fnAddData(dat);
                    })
                    g.remove();
                    if (window._w != undefined && window._w === 'c') {
                        setTimeout(function() {
                            tbl.draw ? tbl.draw(true) : tbl.fnDraw()
                        }, 100);
                    } else {
                        tbl.draw ? tbl.draw(true) : tbl.fnDraw()
                    }
                })
            }, 150)

            if (objectForm.filldate === undefined || objectForm.filldate === null) {
                _load();
            }

            actionDude.new = function() {
                window._w = 'c';
                window.openForms();
                document.querySelector('button.simpan').style.display = 'inline-block';
                let titleX = '';
                if (objectForm.title != undefined) {
                    titleX = objectForm.title();
                }
                $(".title-f").html('Tambah Baru ' + titleX)
                let qr = objectForm.queryTemp;
                let qr1 = qr.split('||')[0].replace(/\{select\}/g, objectForm.dataSelect);
                Array.from(document.querySelectorAll('.form-d')).forEach(function(j) {
                    j.value = '';
                });
                if (objectForm.newkode != '') {
                    let k = cssLoader();
                    AuditDevQuery(datalogin,objectForm.newkode, function(a) {
                        k.remove();
                        globalThis['kode'].parent.value = a[0].kode;
                    })
                }
                objectForm.data.forEach(function(j) {
                    if (j.area == true) {
                        $(".form-d[name=\"" + j.name + "\"]").summernote('code', '')
                    }
                    if (j.type == 'select') {
                        window._setval(j.name, '');
                    }
                    if (j.date == 'date') {
                        $(".form-d[name=\"" + j.name + "\"]").val("").datepicker("update");
                    }
                })
                if (objectForm.oncreate != undefined) {
                    objectForm.oncreate();
                }
            }
            let updateKode;
            let editActive;
            let dataSelect;

            actionDude.edit = function(events) {
                window._w = 'u';
                if (objectForm.disableSave === true) {
                    document.querySelector('button.simpan' + timeSet).style.display = 'none';
                }
                let kode = events.getAttribute('data-kode');
                let id = events.getAttribute('data-id');
                editActive = id;
                let cek = `SELECT * FROM ${objectForm.table} WHERE ${objectForm.kode} = '${kode}' LIMIT 1`;
                let t = cssLoader();
                AuditDevQuery(datalogin,cek, function(datas) {
                    let [r] = datas;
                    if (r.length > 0) {
                        t.remove()
                        r = r[0];
                        updateKode = r[objectForm.kode];
                        dataSelect = r;
                        let titleX = '';
                        if (objectForm.title != undefined) {
                            titleX = objectForm.title();
                        }
                        $(".title-f").html('Update Data ' + titleX)
                        Object.keys(r).forEach(function(jj) {
                            let cekHero = _id(objectForm.idform).querySelector(`.form-d[name=${jj}]`);
                            if (cekHero != null && cekHero != undefined && cekHero != '') {
                                if (_id(objectForm.idform).querySelector(`.form-d[name=${jj}]`).tagName == 'SELECT') {
                                    let id = _id(objectForm.idform).querySelector(`.form-d[name=${jj}]`).id;
                                    let f = objectForm.data.cond(jj, 'name')[0];
                                    if (f.unchange != true) {
                                        if (r[jj] != null) {
                                            if (r[jj].indexOf(',') != -1) {
                                                $('.form-d#' + id).val(r[jj].split(',')).trigger('change');
                                            } else {
                                                $('.form-d#' + id).val(r[jj]).trigger('change');
                                            }
                                        }
                                    }
                                } else {
                                    let jt = objectForm.data;
                                    let f = objectForm.data.cond(jj, 'name')[0];
                                    if (f.type == 'number') {
                                        if (f.decimal != undefined) {
                                            _id(objectForm.idform).querySelector(`.form-d[name=${jj}]`).value = r[jj].number(2).currency(2);
                                        } else {
                                            _id(objectForm.idform).querySelector(`.form-d[name=${jj}]`).value = r[jj].number(2).currency(0);
                                        }
                                    } else if (f.type == 'date') {
                                        $('#' + objectForm.idform + ` .form-d[name=${jj}]`)
                                            .datepicker("update", new Date(r[jj]))
                                    } else {
                                        if (f.area == true) {
                                            $(`.form-d[name=${jj}]`).summernote('code', decodeHTML(atob(r[jj])));
                                        } else {
                                            _id(objectForm.idform).querySelector(`.form-d[name=${jj}]`).value = r[jj];
                                        }
                                    }
                                    if (f.type === 'radio') {
                                        globalThis._radioAct.setVal(f.name, r[jj], 1);
                                    }
                                    if (f.type === 'file') {
                                        if (r[jj] && r[jj] != '') {
                                            let path = f.basePath.split('/');
                                            path.push(r[jj])
                                            _id(objectForm.idform).querySelector(`.form-d[name=${jj}]`).value = '';
                                            document.getElementById('f-image-' + f.name).src = path.join('/');
                                        } else {
                                            _id(objectForm.idform).querySelector(`.form-d[name=${jj}]`).value = '';
                                            document.getElementById('f-image-' + f.name).src = "";
                                        }
                                    }
                                }
                            }
                        })
                        window.openForms()
                        if (objectForm.onupdate != undefined) {
                            objectForm.onupdate(r)
                        }
                    } else {
                        dataSelect = null;
                        t.remove();
                        new Swal('Info', 'data ini telah dihapus', 'info')
                        setTimeout(() => {
                            _load();
                        }, 500);
                    }
                })
            }

            actionDude.delete = function(event) {
                window._w = 'h';
                let g = event.target;
                let kode = g.getAttribute('data-kode');
                if (objectForm._delete != undefined && typeof objectForm._delete === 'function') {
                    objectForm._delete(kode);
                    throw 'stop action';
                };
                console.log(kode);
                event.preventDefault();
                new Swal({
                        title: "Apa kamu yakin?",
                        text: "Data ini akan di hapus dari system!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ya, Saya yakin!',
                        cancelButtonText: "Tidak, Batalkan!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            new swal("Cancelled", "Your imaginary file is safe :)", "error");
                        } else {
                            new swal("Cancelled", "Your imaginary file is safe :)", "error");
                            e.preventDefault();
                        }
                    });
                setTimeout(() => {
                    document.querySelector('.swal2-cancel').focus()
                }, 100);
                document.querySelector('.swal2-confirm').addEventListener('click', function() {
                    if (objectForm.connection != undefined) {
                        let cssld = cssLoader();
                        $.ajax({
                            url: dataApi.connection,
                            typeData: 'json',
                            method: 'POST',
                            data: {
                                kode: kode,
                                data: objectForm.connection
                            },
                            success: function(res) {
                                res = JSON.parse(res);
                                cssld.remove();
                                if (res.counter > 0) {
                                    if (
                                        objectForm.deleteInfoWarning != undefined &&
                                        typeof objectForm.deleteInfoWarning === 'string'
                                    ) {
                                        new Swal('Info', objectForm.deleteInfoWarning, 'info')
                                    } else {
                                        new Swal('Info', 'Data telah terpakai di transaksi. tidak boleh dihapus!', 'info')
                                    }
                                } else {
                                    AuditDevQuery(datalogin,`DELETE FROM ${objectForm.table} WHERE ${objectForm.kode} = '${kode}'`, function() {
                                        if (globalThis._loadCust != undefined) {
                                            // globalThis._loadCust();
                                            _load();
                                        } else {
                                            _load();
                                        }
                                        if (globalThis._delete != undefined) {
                                            globalThis._delete(kode)
                                        }
                                    })
                                }
                            },
                            error: function() {
                                new Swal('Warning', 'Connection Lost, please try again', 'warning');
                                cssld.remove();
                                throw 'error connection';
                            }
                        })
                    } else {
                        AuditDevQuery(datalogin,`SELECT * FROM ${objectForm.table} WHERE ${objectForm.kode} = '${kode}' LIMIT 1`, function(dx) {
                            if (dx.length > 0) {
                                dx = dx[0];
                            };
                            if (objectForm._condDeleteStop != undefined) {
                                objectForm._condDeleteStop.forEach(function(j) {
                                    if (dx[j.id] == j.val) {
                                        new Swal('Warning', 'data telah diposting', 'warning')
                                        throw 'stop action';
                                    };
                                });
                            };
                            if(kode != '' && kode != null){
                                AuditDevQuery(datalogin,`DELETE FROM ${objectForm.table} WHERE ${objectForm.kode} = '${kode}'`, function() {
                                    if (globalThis._loadCust != undefined) {
                                        _load();
                                    } else {
                                        _load();
                                    }
                                    if (globalThis._delete != undefined) {
                                        globalThis._delete(kode)
                                    }
                                })
                            }else{
                                new Swal('Warning', 'sorry canbe delete', 'warning')
                            }
                        })
                    }
                }, false)
            }

            $(document).on('click', '.delete-multi', function() {
                let ids = $.map(tbl.rows('.selected').data(), function(item) {
                    return el('div').html(item[1]).get().querySelector('.edit').getAttribute('data-kode')
                });
            })

            actionDude.simpan = function() {
                let fileSc = [];
                if (objectForm.onviewonly != undefined) {
                    if (objectForm.onviewonly != undefined && typeof objectForm.onviewonly === 'function') {
                        if (globalThis._validasi != undefined) {
                            globalThis._validasi();
                        }
                        let gta = Array.from(document.querySelectorAll('.form-d')).map(function(j) {
                            let t = {};
                            let ty = objectForm.data.cond(j.name, 'name')[0];
                            if (ty.unfollow != undefined) {
                                t['follow'] = false;
                            } else {
                                t['follow'] = true;
                            }
                            t['title'] = (function cj(x) {
                                if (x.querySelector('label') != undefined) {
                                    return x.querySelector('label').innerHTML
                                } else {
                                    return cj(x.parentNode);
                                }
                            })(j.parentNode);
                            t['name'] = j.name;
                            if (ty.type == 'number') {
                                t['text'] = j.value.number().toString();
                            } else if (ty.type == 'select') {
                                t['text'] = _getval(j.name);
                            } else if (ty.type == 'date') {
                                t['text'] = (function(s) {
                                    if(s != ''){
                                        let [tgl, bulan, tahun] = s.split("-");
                                        return tahun + '-' + bulan + '-' + tgl;
                                    }
                                    return '';
                                })(j.value);
                            } else if (ty.type == 'file') {
                                if (_getval(j.name).indexOf('file:') != -1 && _getval(j.name) != "") {
                                    fileSc.push(_getval(j.name));
                                    let h = JSON.parse(atob(_getval(j.name).split(':')[1]))
                                    let b64 = h.file.split('base64,')[1];
                                    let loc = h.slug;
                                    t['text'] = h.slug.split('/').pop();
                                } else {
                                    t['text'] = "";
                                }
                            } else {
                                if (ty.area == true) {
                                    t['text'] = btoa(HtmlEncode(j.value));
                                } else {
                                    t['text'] = j.value;
                                }
                            }
                            return t;
                        }).filter(function(cj) {
                            if (cj.follow === true) {
                                return cj
                            }
                        });
                        objectForm.validasiForm.forEach(function(t) {
                            let ty = objectForm.data.cond(t, 'name')[0];
                            if (ty.type == 'radio') {
                                if (globalThis[t].parent.value === '') {
                                    new Swal('Warning', globalThis.kodesp.parent.parentNode.parentNode.querySelector('label').innerHTML + ' Tidak Boleh Kosong');
                                    throw 'stop action'
                                }
                            } else {
                                if (_id(objectForm.idform).querySelector(`.form-d[name=${t}]`).value === '') {
                                    new Swal('Warning', _id(objectForm.idform).querySelector(`.form-d[name=${t}]`).parentNode.querySelector('label').innerHTML + ' Tidak Boleh Kosong', 'warning');
                                    throw _id(objectForm.idform).querySelector(`.form-d[name=${t}]`).parentNode.querySelector('label').innerHTML + ' Tidak Boleh Kosong';
                                }
                            }
                        });
                        window.closeForms();
                        let obj = {}
                        gta.forEach(function(g, i) {
                            obj[g.name] = g.text;
                        })
                        objectForm.onviewonly(obj);
                    } else {
                        window.closeForms();
                    }
                    throw 'stop action'
                }

                let type = document.querySelector('.title-f').innerHTML;
                if (type.indexOf('Tambah Baru') != -1) {
                    let gt = Array.from(document.querySelectorAll('.form-d')).map(function(j) {
                        let t = {};
                        console.log(j.name)
                        let ty = objectForm.data.cond(j.name, 'name')[0];
                        if (ty.unfollow != undefined) {
                            t['follow'] = false;
                        } else {
                            t['follow'] = true;
                        }
                        t['title'] = (function cj(x) {
                            if (x.querySelector('label') != undefined) {
                                return x.querySelector('label').innerHTML
                            } else {
                                return cj(x.parentNode);
                            }
                        })(j.parentNode);
                        t['name'] = j.name;
                        if (ty.type == 'number') {
                            t['text'] = j.value.number().toString();
                        } else if (ty.type == 'select') {
                            t['text'] = _getval(j.name);
                        } else if (ty.type == 'date') {
                            t['text'] = (function(s) {
                                if(s != ''){
                                    let [tgl, bulan, tahun] = s.split("-");
                                    return tahun + '-' + bulan + '-' + tgl;
                                }
                                return '';
                            })(j.value);
                        } else if (ty.type == 'file') {
                            if (_getval(j.name).indexOf('null') == -1 && _getval(j.name) != "") {
                                fileSc.push(_getval(j.name));
                                let h = JSON.parse(atob(_getval(j.name).split(':')[1]))
                                let b64 = h.file.split('base64,')[1];
                                let loc = h.slug;
                                t['text'] = h.slug.split('/').pop();
                            } else {
                                t['text'] = "";
                            }
                        } else {
                            if (ty.area == true) {
                                t['text'] = btoa(HtmlEncode(j.value));
                            } else {
                                t['text'] = j.value;
                            }
                        }
                        return t;
                    }).filter(function(cj) {
                        if (cj.follow === true) {
                            return cj
                        }
                    });

                    objectForm.validasiForm.forEach(function(t) {
                        let ty = objectForm.data.cond(t, 'name')[0];
                        if (ty.type == 'radio') {
                            if (globalThis[t].parent.value === '') {
                                new Swal('Warning', (function cj(x) {
                                    if (x.querySelector('label') != undefined) {
                                        return x.querySelector('label').innerHTML
                                    } else {
                                        return cj(x.parentNode);
                                    }
                                })(globalThis.kodesp.parent.parentNode) + ' Tidak Boleh Kosong');
                                throw 'stop action'
                            }
                        } else {
                            if (_id(objectForm.idform).querySelector(`.form-d[name=${t}]`).value === '') {
                                new Swal('Warning', (function cj(x) {
                                    if (x.querySelector('label') != undefined) {
                                        return x.querySelector('label').innerHTML
                                    } else {
                                        return cj(x.parentNode);
                                    }
                                })(_id(objectForm.idform).querySelector(`.form-d[name=${t}]`).parentNode) + ' Tidak Boleh Kosong', 'warning');
                                throw 'Tidak Boleh Kosong';
                            }
                        }
                    });

                    if (globalThis._validasi != undefined) {
                        globalThis._validasi();
                    }
                    console.log(gt);
                    let insert = `INSERT INTO ${objectForm.table} (${gt.map(function (n) {
                    return n.name
                }).join(',')}) values (${gt.map(function (cj) {
                    return `"${cj.text.replace(/\"/g, "\\\"")}"`;
                })})`;
                    if (objectForm.debug != undefined) {
                        if (objectForm.debug == true) {
                            console.log(insert);
                        }
                    }

                    let validKode = '';

                    if (objectForm.validasiKode != undefined && Array.isArray(objectForm.validasiKode)) {
                        validKode += " AND " + objectForm.validasiKode.map(function(v) {
                            return ` ${v} = "${window._getval(v).replace(/\"/g, "\\\"")}" `;
                        }).join(" AND ");
                    };

                    let cek = objectForm.increment? 'SELECT 1=1 total' : `SELECT * FROM ${objectForm.table} 
            WHERE ${objectForm.kode} = '${globalThis[objectForm.kode].parent.value}' 
            ${validKode} `;
            console.log(cek);
                    AuditDevQuery(datalogin,cek, function(r) {
                        console.log(r)
                        if (r.length == 0 || objectForm.increment) {
                            AuditDevQuery(datalogin,insert + '[;]' + fileSc.join("{{;}}"), function() {
                                window.closeForms();
                                new swal("Success", "Data telah ditambahkan", "success");
                                if (globalThis._loadCust != undefined) {
                                    // globalThis._loadCust();
                                    _load();
                                } else {
                                    _load();
                                }
                                if (globalThis._insert != undefined) {
                                    globalThis._insert()
                                }
                            })
                        } else {
                            new Swal('Warning', 'kode sudah digunakan', 'warning');
                        }
                    })
                } else {
                    let gt = Array.from(document.querySelectorAll('.form-d')).map(function(j) {
                        let t = {};
                        let ty = objectForm.data.cond(j.name, 'name')[0];
                        if (ty.unfollow != undefined) {
                            t['follow'] = false;
                        } else {
                            t['follow'] = true;
                        }
                        t['title'] = (function cj(x) {
                            if (x.querySelector('label') != undefined) {
                                return x.querySelector('label').innerHTML
                            } else {
                                return cj(x.parentNode);
                            }
                        })(j.parentNode);
                        t['name'] = j.name;
                        if (ty.type == 'number') {
                            t['text'] = j.value.number().toString();
                        } else if (ty.type == 'select') {
                            t['text'] = _getval(j.name);
                        } else if (ty.type == 'date') {
                            t['text'] = (function(s) {
                                if(s != ''){
                                    let [tgl, bulan, tahun] = s.split("-");
                                    return tahun + '-' + bulan + '-' + tgl;
                                }
                                return '';
                            })(j.value);
                        } else if (ty.type == 'file') {
                            if (_getval(j.name).indexOf('null') == -1 && _getval(j.name) != "") {
                                fileSc.push(_getval(j.name));
                                let h = JSON.parse(atob(_getval(j.name).split(':')[1]))
                                let b64 = h.file.split('base64,')[1];
                                let loc = h.slug;
                                t['text'] = h.slug.split('/').pop();
                            } else {
                                t['text'] = "";
                            }
                        } else {
                            if (ty.area == true) {
                                t['text'] = btoa(HtmlEncode(j.value));
                            } else {
                                t['text'] = j.value;
                            }
                        }
                        return t;
                    }).filter(function(cj) {
                        if (cj.follow === true && cj['text'] != '') {
                            return cj
                        }
                    });

                    objectForm.validasiForm.forEach(function(t) {
                        let ty = objectForm.data.cond(t, 'name')[0];
                        if (ty.type == 'radio') {
                            if (globalThis[t].parent.value === '') {
                                new Swal('Warning', (function cj(x) {
                                    if (x.querySelector('label') != undefined) {
                                        return x.querySelector('label').innerHTML
                                    } else {
                                        return cj(x.parentNode);
                                    }
                                })(globalThis.kodesp.parent.parentNode) + ' Tidak Boleh Kosong');
                                throw 'stop action'
                            }
                        } else {
                            if (_id(objectForm.idform).querySelector(`.form-d[name=${t}]`).value === '') {
                                new Swal('Warning', (function cj(x) {
                                    if (x.querySelector('label') != undefined) {
                                        return x.querySelector('label').innerHTML
                                    } else {
                                        return cj(x.parentNode);
                                    }
                                })(_id(objectForm.idform).querySelector(`.form-d[name=${t}]`).parentNode) + ' Tidak Boleh Kosong', 'warning');
                                throw ' Tidak Boleh Kosong';
                            }
                        }
                    });

                    if (globalThis._validasi != undefined) {
                        globalThis._validasi();
                    }

                    let kode = _id(objectForm.kode).value;

                    if (window.dataSelect != undefined && typeof window.dataSelect === 'object') {
                        if (window.dataSelect[objectForm.kode] != undefined) {
                            kode = window.dataSelect[objectForm.kode];
                        }
                    }

                    if (window._w === 'u') {
                        kode = updateKode;
                    }

                    if (objectForm.cekData === true) {
                        throw 'stop action'
                    }

                    let update = `UPDATE ${objectForm.table} SET ${gt.map(function (df) {
                    return ` ${df.name} = "${df.text.replace(/\"/g, '\\\"')}" `
                }).join(',')} WHERE ${objectForm.kode} = '${kode}'`;
                    let y = cssLoader()
                    AuditDevQuery(datalogin,update + '[;]' + fileSc.join("{{;}}"), function() {
                        y.remove();

                        if (globalThis._update != undefined) {
                            globalThis._update()
                        }

                        window.closeForms();
                        _load();
                    });

                }
            };

            window._InputLine = function(kode, type, name, element) {
                let last = element.innerHTML;
                element.innerHTML = '';
                let sx = div().html(last).get().children[0].querySelector('[data-action-table]').dataset;
                let f = null;
                f = el('input');
                f.css({
                    padding: '5px 10px'
                });
                f.name(sx.name)
                f.data('name', sx.name)
                f.class('open-form-man')
                f.css('width', '100%')
                f.css('min-width', '120px')
                f.data('kode', sx.actionTable)
                f.val(div().html(last).get().querySelector('.data-show').innerText)
                f.addModule('elm', element);
                f.addModule('last', last);
                f.load(function(eh) {
                    tbl.draw('false');
                    eh.el.focus();
                    setTimeout(function() {
                        document.querySelector(".dataTables_scrollBody").scrollLeft = 0;
                        scrollIntoViewWithOffset(eh.el, 90);
                    }, 100)
                    if (window.mobileCheck() === false) {
                        eh.el.addEventListener('keypress', function(e) {
                            if (e.key === 'Enter') {
                                let val = e.target.value;
                                let name = e.target.name;
                                e.target.elm.innerHTML = '';
                                let n = div().html(e.target.last).get().children[0];
                                n.id = 'tooltip' + Date.now();
                                n.querySelector('.data-show').innerText = val;
                                e.target.elm.appendChild(
                                    n
                                );
                                tbl.draw('false');
                                let data = n.querySelector('[data-action-table]');
                                data = data.dataset;
                                data.kode = data.actionTable;

                                AuditDevQuery(datalogin,`
                            UPDATE ${objectForm.table} 
                            SET ${name} = "${val.replace(/\"/g, "\\\"")}" 
                            WHERE ${objectForm.kode} = "${data.kode.replace(/\"/g, "\\\"")}"
                        `, function() {
                                    toastr.success('your data success update.', 'Update Success', {
                                        timeOut: 800
                                    })
                                });
                                if (data.next != undefined) {
                                    let fd = _getElement('.open-form-man')
                                        .findData('kode', data.kode)
                                        .findData('name', data.next)
                                        .focus()
                                }
                            }
                        });
                    } else {
                        eh.el.addEventListener('focusout', function(e) {
                            let val = e.target.value;
                            e.target.elm.innerHTML = '';
                            let n = div().html(e.target.last).get().children[0];
                            n.id = 'tooltip' + Date.now();
                            n.querySelector('.data-show').innerText = val;
                            e.target.elm.appendChild(
                                n
                            );
                            tbl.draw('false');
                            let data = n.querySelector('[data-action-table]');
                            data = data.dataset;
                            data.kode = data.actionTable;
                            if (data.next != undefined) {
                                let fd = _getElement('.open-form-man')
                                    .findData('kode', data.kode)
                                    .findData('name', data.next)
                                    .focus()
                            }
                        }, false)
                    }

                });
                element.appendChild(
                    f.get()
                );
                Array.from(document.querySelectorAll('.ui-tooltip')).forEach(function(e) {
                    e.remove();
                })
            }

            document.body.addEventListener('click', function(e) {
                if (e.target.tagName === 'DIV' && e.target.getAttribute('data-action-table') != undefined) {
                    let d = e.target.dataset
                    let h = e.target.parentNode.parentNode
                    let type = d.type;
                    let name = d.name;
                    let actionTable = d.actionTable;
                    _InputLine(actionTable, type, name, h);
                }
                if (e.target.getAttribute('data-act-btn') != undefined) {
                    let kode = e.target.getAttribute('data-kode');
                    if (window.$_actButtonEdit != undefined) {
                        window.$_actButtonEdit(e.target.dataset);
                    };
                }
            }, false);

        }
    }
</script>
<?php $this->load->view('temp') ?>
<?php $this->load->view('basic') ?>