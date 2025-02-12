<?php
    $this->load->view('crud');
?>
<script>
    function capitalizeWords(text) {
    return text.split(' ')  // Split the text into an array of words
               .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())  // Capitalize first letter, make rest lowercase
               .join(' ');  // Join the array back into a string
    }
    let name = location.href.split('/').pop()
    updateTitle("Data Agen "+capitalizeWords(name));
    loadTemp({
        data:["Action","More Action","kode","Nama", "Mandarin", "No Telp"]
    },0,function(e){
        console.log(e.el);
        let config = {
            debug: true,
            title: function () {
                return 'Agen';
            },
            table: "dataagen",
            idform: "containerforms",
            newkode: ``,
            kode: 'id_agen',
            view: ['zxy','kode_agen', 'nama', 'namamandarin', 'notel'],
            custome: {
            },
            oncreate: function (a) {
                if(name === 'malaysia'){
                    _setval('kode_group', 'IM')
                }else{
                    _setval('kode_group', '1')
                }
                _setval('loc', name)
            },
            onupdate: function (dt) {
                // _setval('date_modified', timestamp())
            },
            dataSelect: ["dataagen.*, dataagen.id_agen zxy"],
            queryTemp: "SELECT {select} FROM dataagen WHERE 1 = 1 AND loc = '"+name+"' || ORDER BY id_agen desc",
            validasiForm: [],
            custome : {
                notel: function(a){
                    return a == '0'? '-': a;
                }
                ,zxy: function(a){
                    return `
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="margin-bottom:5px">
                            Menu
                            <span class="caret"></span>
                        </button>
                            <ul style="position: relative;" class="dropdown-menu">
                                <li>
                                    <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/agen/detailagen1/${a}">Tampil Agree (1)</a>
                                </li>
                                <li>
                                    <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/agen/detailagen2/${a}">Tampil Agree (2)</a>
                                </li>
                                <li>
                                    <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/agen/detailagen3/${a}">Tampil Agree (3)</a> 
                                </li>
                                <li>
                                    <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/agen/detailagen4/${a}">Tampil Agree (4)</a> 
                                </li>
                                <li>
                                    <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/agen/detailagen5/${a}">Tampil Agree (5)</a> 
                                </li>
                                <li>
                                    <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/agen_tambah_tki/majikan_tki/${a}">Tambah Tki</a> 
                                </li>
                                <li class="divider"></li>
                                <li class="divider"></li>
                                    <li>
                                    <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/agen/detaildokumen/${a}">Permintaan Dokumen</a> 
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/new_agen_penerima_dana/index/${a}">Bank</a> 
                                </li>
                            </ul>
                        </div>
                    `;
                }
            },
            increment:true,
            data: 
            [
                {
                    title: 'id_agen',
                    type: 'text',
                    name: 'id_agen',
                    row: 12,
                    readonly: false,
                    unfollow: true,
                    display: 'none',
                    action: function () {

                    },
                }
                ,{
                    title: 'id_agen',
                    type: 'text',
                    name: 'kode_group',
                    row: 12,
                    readonly: false,
                    unfollow: true,
                    display: 'none',
                    action: function () {

                    },
                }
                ,{
                    title: 'Kode',
                    type: 'text',
                    name: 'kode_agen',
                    row: 12,
                    group:'nama',
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Nama',
                    type: 'text',
                    name: 'nama',
                    group:'nama',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                
                ,{
                    title: 'namamandarin',
                    type: 'text',
                    name: 'namamandarin',
                    group:'nama',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'No  Telpon',
                    type: 'text',
                    name: 'notel',
                    group:'phone',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'No Fax',
                    type: 'text',
                    group:'phone',
                    name: 'nofax',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Nama Direktur (Penanggung Jawab)',
                    type: 'text',
                    name: 'direktur',
                    group:'dir',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Nama Direktur (Penanggung Jawab)(Taiwan)',
                    type: 'text',
                    group:'dir',
                    name: 'direktur2',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Jabatan Mandarin',
                    type: 'text',
                    name: 'jabatan_man',
                    group:'jab',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Jabatan Indonesia',
                    type: 'text',
                    name: 'jabatan_indo',
                    group:'jab',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'No SIUP',
                    type: 'text',
                    name: 'nosiup',
                    group:'hub',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Handphone',
                    type: 'text',
                    name: 'hp',
                    group:'hub',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'email',
                    type: 'text',
                    name: 'email',
                    group:'hub',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Alamat',
                    type: 'text',
                    name: 'alamat',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Alamat Mandarin',
                    type: 'text',
                    name: 'alamatmandarin',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'statusnonaktif',
                    type: 'text',
                    name: 'statusnonaktif',
                    row: 12,
                    readonly: false,
                    display: 'none',
                    action: function () {

                    },
                }
                ,{
                    title: 'loc',
                    type: 'text',
                    name: 'loc',
                    row: 12,
                    readonly: false,
                    display: 'none',
                    action: function () {

                    },
                }
            ]

        }

        for (let z = 1; z <= 5; z++) {

            config.data.push({
                title: 'No Agreement '+`${z==1?'':`(${z})`}` ,
                type: 'text',
                name: 'noagree'+`${z==1?'':`${z}`}`,
                row: 12,
                readonly: false,
                action: function () {
    
                },
            })
    
            config.data.push({
                title: 'Jenis Agreement '+`${z==1?'':`(${z})`}`,
                type: 'select',
                name: 'jenisagre'+`${z==1?'':`${z}`}`,
                row: 12,
                data:[
                    {'id':'informal caretaker', text:'INFORMAL CARETAKER'}
                    ,{'id':'formal pabrik', text:'FORMAL PABRIK'}
                    ,{'id':'formal panti', text:'FORMAL PANTI'}
                    ,{'id':'formal panti+pabrik', text:'FORMAL PANTI+PABRIK'}
                    ,{'id':'formal agrikultur', text:'FORMAL AGRIKULTUR'}
                    ,{'id':'formal konstruksi', text:'FORMAL KONSTRUKSI'}
                ],
                readonly: false,
                action: function () {
    
                },
            })
    
            config.data.push({
                title: 'Tanggal Agreement '+`${z==1?'':`(${z})`}`,
                type: 'date',
                name: 'berlaku'+`${z==1?'':`${z}`}`,
                group: 'tglagree'+z,
                row: 12,
                readonly: false,
                action: function () {
    
                },
            })
    
            config.data.push({
                title: 'Tanggal AGREEMENT Selesai '+`${z==1?'':`(${z})`}`,
                type: 'date',
                name: 'selesai'+`${z==1?'':`${z}`}`,
                group: 'tglagree'+z,
                row: 12,
                readonly: false,
                action: function () {
    
                },
            })
    
            config.data.push({
                title: 'Tanggal Terima AGREEMENT '+`${z==1?'':`(${z})`}`,
                type: 'date',
                name: 'tgl_terimaagree'+`${z==1?'':`${z}`}`,
                group: 'tglagree'+z,
                row: 12,
                readonly: false,
                action: function () {
    
                },
            })

        }
        

        let foot = [
            {
                title: 'KOMUNIKASI NAMA',
                type: 'text',
                name: 'komnama',
                row: 12,
                readonly: false,
                action: function () {

                },
            }
            ,{
                title: 'KOMUNIKASI LINE',
                type: 'text',
                name: 'komline',
                row: 12,
                readonly: false,
                action: function () {

                },
            }
            ,{
                title: 'Komunikasi SKYPE',
                type: 'text',
                name: 'komskype',
                row: 12,
                readonly: false,
                action: function () {

                },
            }
            ,{
                title: 'Kominikasi HP',
                type: 'text',
                name: 'komhp',
                row: 12,
                readonly: false,
                action: function () {

                },
            }
            ,{
                title: 'Keterangan',
                type: 'text',
                name: 'keterangan',
                row: 12,
                readonly: false,
                action: function () {

                },
            }
            ,{
                title: 'Username',
                type: 'text',
                name: 'username',
                row: 12,
                readonly: false,
                action: function () {

                },
            }
            ,{
                title: 'Password',
                type: 'text',
                name: 'password',
                row: 12,
                readonly: false,
                action: function () {

                },
            }
        ]

            config.data = config.data.concat(foot)

         loadCrud(config);
    })
</script>