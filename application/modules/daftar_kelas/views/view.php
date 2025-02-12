<!-- 
table kelastki
column
kode	varchar	255
kelas	varchar	255
nomor	varchar	255
gender	varchar	2


-->
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
    updateTitle("Data Kelas");
    loadTemp({
        data:["Action","Kode","Kelas", "Nomor", "Gender"],
    },0,function(e){
        console.log(e.el);
        let config = {
            debug: true,
            title: function () {
                return 'Kelas';
            },
            table: "kelastki",
            idform: "containerforms",
            newkode: ``,
            kode: 'kode',
            view: ['kode', 'kelas', "nomor", "gender"],
            custome: {
            },
            oncreate: function (a) {
                _setval('kode', 'KLS-'+Date.now())
            },
            onupdate: function (dt) {
                // _setval('date_modified', timestamp())
            },
            dataSelect: ["a.*"],
            queryTemp: "SELECT {select} FROM kelastki a WHERE 1 = 1 || ORDER BY kode desc",
            validasiForm: [],
            custome : {
            },
            increment:true,
            data: 
            [
                {
                    title: 'Kode',
                    type: 'text',
                    name: 'kode',
                    row: 12,
                    readonly: true,
                    action: function () {

                    },
                }
                ,{
                    title: 'Kelas',
                    type: 'text',
                    name: 'kelas',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Nomor',
                    type: 'text',
                    name: 'nomor',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Jenis Kelamin',
                    type: 'select',
                    name: 'gender',
                    row: 4,
                    data: [
                        {
                            id: 'L',
                            text: 'Laki-laki'
                        },
                        {
                            id: 'P',
                            text: 'Perempuan'
                        }
                    ],
                    readonly: false,
                    action: function () {

                    },
                }
            ]
        }

        loadCrud(config);
    })
</script>