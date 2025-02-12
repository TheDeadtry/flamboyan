export default class Laporan {
    #container;
    constructor() {
        this.laporan = [];
        this.module = ['module'];
        this.#container = _id('content-wrapper');
        this.idlap = 'cardMenuReport';
        this.openTemplate();
    }

    openTemplate() {
        let container = this.#container;
        container.appendChild(
            el('div').id(this.idlap).class('card').child(el('div').id('report-r')).get()
        );
    }

    async run() {
        console.log(this.module);
        console.log(this.loadjs);
        let [{ _Report }] = await this.loadjs(this.module);
        _Report
            .debug(true)
            .qr(`
                SELECT * FROM personal p
            `)
            .conf({
                
            })
            .filterConf([
                {
                    title: 'Tanggal Mulai',
                    type: 'date',
                    name: 'startdate',
                    nomax: true,
                    row: 3,
                    readonly: false,
                    action: function () {

                    },
                }
            ])
            .filterOnLoad(function (e, status, obj) {
                console.log('load config');
            })
            .head([
                [
                    {
                        text: function () {
                            return `
                        <div>
                            <img width="75px" src="/usp/logo/koperasi.png" />
                        </div>
                    `;
                        },
                        css: {
                            width: '95px',
                            border: 'none',
                            whiteSpace: 'nowrap',
                            textAlign: 'center'
                        }
                    },
                    {
                        text: function (obj) {
                            return "<div style=\"margin-bottom:5px;font-size:28px;\">BUKU BESAR PEMBANTU</div>"
                                + "<div style=\"margin-bottom:5px;font-size:18px;\">" +
                                (function (obj) {
                                    if (obj.globalEvent != undefined) {
                                        var x = _master('acc', 'acc')
                                            .cond(obj.globalEvent.getVal('app'), 'app')
                                            .cond(obj.globalEvent.getVal('akun'), 'id');
                                        if (x.length > 0) {
                                            return x[0].text + ' (' + x[0].id + ')';
                                        }
                                    };
                                    return '-';
                                })(obj)
                                + "</div>"
                                + startdate.parent.value
                                + ' s/d '
                                + enddate.parent.value
                        },
                        colspan: 6,
                        css: {
                            textAlign: 'center',
                            border: 'none',
                            whiteSpace: 'nowrap',
                        }
                    }
                ],
                [
                    {
                        text: '',
                        colspan: 7,
                        css: {
                            color: '#ffffff',
                            height: '10px',
                            whiteSpace: 'nowrap',
                            textAlign: 'center'
                        }
                    }
                ],
                [{
                    text: 'Kode Transaksi',
                    colspan: 2,
                    css: {
                        borderBottom: '1px solid #ddd',
                        whiteSpace: 'nowrap',
                        textAlign: 'center'
                    }
                }
                    , {
                    text: 'Tanggal',
                    css: {
                        borderBottom: '1px solid #ddd',
                        whiteSpace: 'nowrap',
                        textAlign: 'center'
                    }
                }
                    , {
                    text: 'Keterangan',
                    css: {
                        borderBottom: '1px solid #ddd',
                        whiteSpace: 'nowrap',
                    }
                }
                    , {
                    text: 'Debit',
                    css: {
                        borderBottom: '1px solid #ddd',
                        whiteSpace: 'nowrap',
                        textAlign: 'right'
                    }
                }
                    , {
                    text: 'Kredit',
                    css: {
                        borderBottom: '1px solid #ddd',
                        whiteSpace: 'nowrap',
                        textAlign: 'right'
                    }
                }
                    , {
                    text: 'Saldo',
                    css: {
                        borderBottom: '1px solid #ddd',
                        whiteSpace: 'nowrap',
                        textAlign: 'right'
                    }
                }
                    , {
                    text: 'User Log',
                    css: {
                        borderBottom: '1px solid #ddd',
                        whiteSpace: 'nowrap',
                        textAlign: 'right'
                    }
                }
                ]
            ])
            .name([
                {
                    name: 'kode',
                    colspan: 2,
                    css: {
                        borderBottom: '1px solid #ddd',
                        whiteSpace: 'nowrap',
                    }
                }

            ])
            .footer([
                [{
                    text: 'Grand Total',
                    colspan: 2,
                    css: {
                        whiteSpace: 'nowrap',
                        textAlign: 'left'
                    }
                }

                    , {
                    text: function (obj) {
                        return 'Rp. ' + obj.dataStore.total.sum().currency(0);
                    },
                    css: {
                        whiteSpace: 'nowrap',
                        textAlign: 'right'
                    }
                }
                    , {
                    text: ``,
                    css: {
                        whiteSpace: 'nowrap',
                        textAlign: 'right'
                    }
                }
                ]
            ])
            .call()
    }

}