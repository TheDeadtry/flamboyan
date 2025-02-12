<script src="<?= base_url('assets/js/datatable.js?v='.date('Ymdhis')) ?>"></script>
<?php
    $name = $_GET['name'];
?>
<style>
    .card{
        padding: 10px;
        background-color: white;
        border-radius: 10px;
    }

    .spinner-border {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            vertical-align: text-bottom;
            border: 0.25em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spinner-border .75s linear infinite;
        }
    
        .spinner-border.text-primary {
            color: #0d6efd;
        }
    
        @keyframes spinner-border {
            to { transform: rotate(360deg); }
        }
    
        .visually-hidden {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }
    

</style>
<div style="padding : 20px;">
    <div class="card">
        <div id="app">
            <table id="dataTable" class="table table-striped">
            </table>
        </div>
    </div>
</div>
<script>

    let names = '<?= $name ?>';

    if(names == 'search_kb'){

        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tgl_suntik', 'kb_suntik', 'masa_kadaluwarsa'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tgl Suntik', 'KB Suntik', 'Masa Kadaluwarsa'],
            table: 'search_kb',
            order: [['tgl_suntik', 'desc']],
            title: 'Data KB',
            statusOptions: {
                title: "Sudah perna KB",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });
        
    }
    else if(names == 'search_ijin_keluar'){
        
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tgl', 'jam_keluar', 'jam_kembali', 'keperluan'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal', 'Jam Keluar', 'Jam Kembali', 'Keperluan'],
            table: 'search_ijin_keluar',
            order: [['tgl', 'desc']],
            title: 'Data Ijin Keluar',
            statusOptions: {
                title: "Sudah perna ijin keluar",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });
    }
    else if(names == 'search_ijin_tidak_hadir'){
        
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tglkeluar', 'jamkeluar', 'tglkembali', 'jamkembali', 'keperluan'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal Keluar', 'Jam Keluar', 'Tanggal Kembali', 'Jam Kembali', 'Keperluan'],
            table: 'search_ijin_tidak_hadir',
            order: [['tglkeluar', 'desc']],
            title: 'Data Ijin Tidak Hadir',
            statusOptions: {
                title: "Sudah perna ijin tidak hadir",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });
    }
    else if(names == 'search_ijin_tidak_hadir'){
        
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tglkeluar', 'jamkeluar', 'tglkembali', 'jamkembali', 'keperluan'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal Keluar', 'Jam Keluar', 'Tanggal Kembali', 'Jam Kembali', 'Keperluan'],
            table: 'search_ijin_tidak_hadir',
            order: [['tglkeluar', 'desc']],
            title: 'Data Ijin Tidak Hadir',
            statusOptions: {
                title: "Sudah perna ijin tidak hadir",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });    
    
    }
    else if(names == 'search_ijin_pulang'){
        
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tglkeluar', 'jamkeluar', 'tglkembali', 'jamkembali', 'status_kembali', 'keperluan'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal Keluar', 'Jam Keluar', 'Tanggal Kembali', 'Jam Kembali', 'Status Kembali', 'Keperluan'],
            table: 'search_ijin_pulang',
            order: [['tglkeluar', 'desc']],
            title: 'Data Ijin Pulang',
            statusOptions: {
                title: "Sudah perna ijin pulang",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });    
    
    }
    else if(names == 'search_ijin_kejadian'){
        
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tanggal', 'kejadian'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal', 'Kejadian'],
            table: 'search_ijin_kejadian',
            order: [['tanggal', 'desc']],
            title: 'Data Ijin Kejadian',
            statusOptions: {
                title: "Sudah perna ijin kejadian",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });    
    
    }
    else if(names == 'search_ijin_inap'){
        
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tglmasuk', 'jammasuk', 'tglkeluar', 'jamkeluar', 'pemberi_izin'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal Masuk', 'Jam Masuk', 'Tanggal Keluar', 'Jam Keluar', 'Pemberi Izin'],
            table: 'search_ijin_inap',
            order: [['tglmasuk', 'desc']],
            title: 'Data Ijin Inap',
            statusOptions: {
                title: "Sudah perna ijin inap",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });    
    
    }
    
    else if(names == 'search_ijin_piket_dapur'){
        
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tglmulai', 'tglberakhir', 'pemberiannilai', 'nilai'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal Mulai', 'Tanggal Berakhir', 'Pemberian Nilai', 'Nilai'],
            table: 'search_ijin_piket_dapur',
            order: [['tglmulai', 'desc']],
            title: 'Data Ijin Piket Dapur',
            statusOptions: {
                title: "Sudah perna ijin piket dapur",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });    
    
    }

    else if(names == 'search_ijin_graha'){
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tglmulai', 'tglberakhir', 'pemberiannilai', 'nilai'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal Mulai', 'Tanggal Berakhir', 'Pemberian Nilai', 'Nilai'],
            table: 'search_ijin_graha',
            order: [['tglmulai', 'desc']],
            title: 'Data Ijin Graha',
            statusOptions: {
                title: "Sudah perna ijin graha",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });    
    
    }
    else if(names == 'search_ijin_konseling_khusus'){
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tgl', 'jammulai', 'jamberakhir', 'konselor', 'keterangan'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal', 'Jam Mulai', 'Jam Berakhir', 'Konselor', 'Keterangan'],
            table: 'search_ijin_konseling_khusus',
            order: [['tgl', 'desc']],
            title: 'Data Ijin Konseling Khusus',
            statusOptions: {
                title: "Sudah perna ijin konseling khusus",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });    
    
    }
    else if(names == 'search_ijin_kejadian_sakit'){
        let dataTableInstance = initDataTable({
            view : ['nodaftar', 'nama', 'status', 'tglmulai', 'tglberakhir', 'sakit', 'ibuasrama', 'keterangan'],
            view_label : ['Nodaftar', 'Nama', 'Status', 'Tanggal Mulai', 'Tanggal Berakhir', 'Sakit', 'Ibu Asrama', 'Keterangan'],
            table: 'search_ijin_kejadian_sakit',
            order: [['tglmulai', 'desc']],
            title: 'Data Ijin Kejadian Sakit',
            statusOptions: {
                title: "Sudah perna ijin kejadian sakit",
                field: 'status',
                values: ['sudah', 'belum']
            }
        });    
    
    }
    
</script>