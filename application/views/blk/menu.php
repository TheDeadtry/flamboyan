<?php
$menudata = [
    [
        "group" => "Pembinaan",
        "menu" => [
            [
                'nama' => 'KB',
                'opsi' => ['sudah', 'belum'],
                'table' => 'search_kb'
            ],
            [
                'nama' => 'Ijin Keluar', 
                'opsi' => ['sudah', 'belum'],
                'table' => 'search_ijin_keluar'
            ],
            [
                'nama' => 'Ijin Inap',
                'opsi' => ['sudah', 'belum'],
                'table' => 'search_ijin_inap'
            ],
            [
                'nama' => 'Ijin Pulang',
                'opsi' => ['sudah', 'belum'],
                'table' => 'search_ijin_pulang'
            ],
            [
                'nama' => 'Ijin Tidak Hadir / Sakit',
                'opsi' => ['sudah', 'belum'],
                'table' => 'search_ijin_tidak_hadir'
            ],
            // [
            //     'nama' => 'PKL',
            //     'opsi' => ['sudah', 'belum'],
            //     'table' => 'blk_hasilpkl'
            // ],
            [
                'nama' => 'Kejadian',
                'opsi' => ['sudah', 'belum'],
                'table' => 'search_ijin_kejadian'
            ],
            [
                'nama' => 'Piket Dapur',
                'opsi' => ['sudah', 'belum'],
                'table' => 'search_ijin_piket_dapur'
            ],
            [
                'nama' => 'Graha Pagi / Sore',
                'opsi' => ['sudah', 'belum'],
                'table' => 'search_ijin_graha'
            ],
            [
                'nama' => 'Kejadian Sakit Selama Pelatihan',
                'opsi' => ['sudah', 'belum'],
                'table' => 'search_ijin_kejadian_sakit'
            ]
        ]
    ]
];
?>
<li class="dropdown mega-menu mega-menu-wide">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-menu"></i> Search <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-content">
        <div class="dropdown-content-body">
            <div class="row">
                <div class="col-md-3">
                    <span class="menu-heading underlined"><?php echo $menudata[0]['group']; ?></span>
                    <ul class="menu-list">
                        <?php foreach($menudata[0]['menu'] as $menu): ?>
                        <li>
                            <a href="<?= site_url("blk_search?name=".$menu['table'])?>"><i class="icon-stack2"></i> <?php echo $menu['nama']; ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</li>