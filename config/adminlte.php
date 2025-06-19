<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'MA BPKPD',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>MA BPKPD</b>',
    'logo_img' => 'image/logo50kota.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'MA BPKPD',

    /*    'preloader' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],
 */
    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-blue elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-blue navbar-dark',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => true,
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:

        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:

        [
            'text' => 'DASHBOARD',
            'url' => '/home',
            'icon' => 'far fa fa-home',
            // 'label'       => 4,
            // 'label_color' => 'success',
        ],

        ['header' => 'MASTER'],
        [
            'text' => 'STOK OPNAME',
            'icon' => 'fas fa fa-money-check',
            'submenu' => [
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Kategori',
                        'url' => 'categorys',
                        'active' => ['/categorys/*'],
                    
                ],
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Satuan',
                        'url' => 'satuans',
                        'active' => ['/satuans/*'],
                    
                ],
        
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Barang',
                        'url' => 'barangs',
                        'active' => ['/barangs/*'],
                    
                ],
            ],
        ],
        [
            'text' => 'PEMELIHARAAN',
            'icon' => 'fas fa fa-money-check',
            'submenu' => [
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'BBM',
                        'url' => 'bbms',
                        'active' => ['/bbms/*'],
                    
                ],
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Item Service',
                        'url' => 'item_services',
                        'active' => ['/item_services/*'],
                    
                ],
        
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Kendaraan',
                        'url' => 'kendaraans',
                        'active' => ['/kendaraans/*'],
                    
                ],
                
            ],
        ],
    
     
        ['header' => 'STOK OPNAME'],
        [
            'text' => 'STOK OPNAME',
            'icon' => 'fas fa fa-money-check',
            'submenu' => [
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Pesanan',
                        'url' => 'pesanans',
                        'active' => ['/pesanans/*'],
                    
                ],
                [
                    'text' => 'Stok Opname',
                    'icon' => 'fas fa fa-money-bill-wave',
                    'submenu' => [
                        [
                            'text' => 'Masuk',
                            'url' => 'stokopnames/masuk',
                            'active' => ['/stokopnames/*'],
                        ],
                        [
                            'text' => 'Keluar',
                            'url' => 'stokopnames',
                            'active' => ['/stokopnames/*'],
                        ],
                    ],
                ],
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Laporan',
                        'url' => 'pesanans',
                        'active' => ['/pesanans/*'],
                    
                ],
            ],
        ],
       
        ['header' => 'PEMELIHARAAN KENDARAAN'],
        [
            'text' => 'PEMELIHARAAN',
            'icon' => 'fas fa fa-money-check',
            'submenu' => [
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Konsumsi BBM',
                        'url' => 'konsumsi_bbms',
                        'active' => ['/konsumsi_bbms/*'],
                    
                ],
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Service',
                        'url' => 'services',
                        'active' => ['/services/*'],
                    
                ],
                [
                    'icon' => 'fas fa fa-money-bill-wave',
                        'text' => 'Laporan',
                        'url' => 'services',
                        'active' => ['/services/*'],
                    
                ],
               
            ],
        ],
        
        /* [
            'text' => 'SIMPANAN',
            'icon' => 'fas fa fa-money-bill-wave',
            'submenu' => [
                [
                    'text' => 'SIMPANAN ANGGOTA',
                    'url' => 'simpanan_anggotas',
                    'can' => 'simpanan_anggota-list',
                    'active' => ['/simpanan_anggotas/*'],
                ],
                [
                    'text' => 'TRANSAKSI SIMPANAN',
                    'url' => 'transaksi_simpanans',
                    'can' => 'transaksi_simpanan-list',
                    'active' => ['/transaksi_simpanans/*'],
                ],
            ],
        ],

        [
            'text' => 'TABUNGAN',
            'icon' => 'fas fa fa-money-check',
            'submenu' => [
                [
                    'text' => 'TABUNGAN ANGGOTA',
                    'url' => 'tabungan_anggotas',
                    'can' => 'tabungan_anggota-list',
                    'active' => ['/tabungan_anggotas/*'],
                ],
                [
                    'text' => 'TRANSAKSI TABUNGAN',
                    'url' => 'transaksi_tabungans',
                    'can' => 'transaksi_tabungan-list',
                    'active' => ['/transaksi_tabungans/*'],
                ],
                [
                    'text' => 'PENARIKAN',
                    'url' => 'transaksi_tabungans/createpenarikan',
                    // 'can' => 'transaksi_tabungan-penarikan',
                    'active' => ['/transaksi_tabungans/createpenarikan/*'],
                ],
            ],
        ],
        [
            'text' => 'PEMBIAYAAN',
            'icon' => 'fas fa fa-lightbulb',
            'submenu' => [
                [
                    'text' => 'KALKULATOR PEMBIAYAAN',
                    'url' => 'pembiayaan_anggotas',
                    // 'active' => ['/pembiayaan_anggotas/*'],
                ],
                [
                    'text' => 'USULAN PEMBIAYAAN',
                    'url' => 'createusulan',
                    //'can' => 'pembiayaan_anggota-list',
                    'active' => ['/createusulan/*'],
                ],
                [
                    'text' => 'PEMBIAYAAN ANGGOTA',
                    'url' => 'pembiayaan_anggotas',
                    'can' => 'pembiayaan_anggota-list',
                    'active' => ['/pembiayaan_anggotas/*'],
                ],
                [
                    'text' => 'TRANSAKSI PEMBIAYAAN',
                    'url' => 'transaksi_pembiayaans',
                    'can' => 'transaksi_pembiayaan-list',
                    'active' => ['/transaksi_pembiayaans/*'],
                ],
            ],
        ],
        [
            'text' => 'KEUANGAN',
            'icon' => 'fas fa fa-book',
            'submenu' => [
                [
                    'text' => 'SHU',
                    'url' => 'shuses',
                    'can' => 'shu-list',
                    'active' => ['/shuses/*'],
                ],
                [
                    'text' => 'COA',
                    'url' => 'coas',
                    'can' => 'coa-list',
                    'active' => ['/coas/*'],
                ],
                [
                    'text' => 'JURNAL',
                    'url' => 'jurnals',
                    'can' => 'jurnal-list',
                    'active' => ['/jurnals/*'],
                ],
                [
                    'text' => 'BUKU BESAR',
                    'url' => 'buku_besars',
                    'can' => 'buku_besar-list',
                    'active' => ['/buku_besars/*'],
                ],
                [
                    'text' => 'NERACA',
                    'url' => 'buku_besars/neraca',
                    'can' => 'buku_besar-list',
                    'active' => ['/buku_besars/*'],
                ],
            ],
        ],
        [
            'text' => 'ANGGOTA',
            'icon' => 'fas fa fa-user',
            'submenu' => [
                [
                    'text' => 'PROFIL',
                    'url' => 'anggotas/profile',
                    'can' => 'anggota-profile',
                    'active' => ['/anggotas/profil/*'],
                ],
                [
                    'text' => 'AKTIF',
                    'url' => 'anggotas/aktif',
                    'can' => 'anggota-list',
                    'active' => ['/anggotas/aktif/*'],
                ],
                [
                    'text' => 'BELUM AKTIF',
                    'url' => 'anggotas/belumaktif',
                    'can' => 'anggota-list',
                    'active' => ['/anggotas/belumaktif/*'],
                ],
                [
                    'text' => 'NON AKTIF',
                    'url' => 'anggotas/nonaktif',
                    'can' => 'anggota-list',
                    'active' => ['/anggotas/nonaktif/*'],
                ],
            ],
        ],

        [
            'text' => 'STAKE HOLDER',
            'icon' => 'fas fa fa-user-circle',
            'submenu' => [
                [
                    'text' => 'KARYAWAN',
                    'url' => 'karyawans',
                    'can' => 'karyawan-list',
                    'active' => ['/karyawans/*'],
                ],
                [
                    'text' => 'PENGURUS / PENGAWAS',
                    'url' => 'pengurus',
                    'can' => 'pengurus-list',
                    'active' => ['/pengurus/*'],
                ],
            ],
        ],

        [
            'text' => 'MASTER DATA',
            'icon' => 'fas fa fa-database',
            'submenu' => [
                [
                    'text' => 'SIMPANAN',
                    'icon' => 'fas fa fa-flag',
                    'url' => 'simpanans',
                    'can' => 'simpanan-list',
                    'active' => ['/simpanans/*'],
                ],
                [
                    'text' => 'TABUNGAN',
                    'icon' => 'fas fa fa-flag',
                    'url' => 'tabungans',
                    'can' => 'tabungan-list',
                    'active' => ['/tabungans/*'],
                ],
                [
                    'text' => 'PEMBIAYAANS',
                    'icon' => 'fas fa fa-flag',
                    'url' => 'pembiayaans',
                    'can' => 'pembiayaan-list',
                    'active' => ['/pembiayaans/*'],
                ],
                [
                    'text' => 'UNIT',
                    'icon' => 'fas fa fa-flag',
                    'url' => 'units',
                    'can' => 'unit-list',
                    'active' => ['/units/*'],
                ],
                [
                    'text' => 'PROFILE',
                    'icon' => 'fas fa fa-flag',
                    'url' => 'profiles',
                    'can' => 'profile-list',
                    'active' => ['/profiles/*'],
                ],
            ],
        ],
 */
        ['header' => 'SETTING'],
        [
            'text' => 'Pengguna',
            'url' => 'users',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'user-list',
            'active' => ['/users/*'],
        ],
        [
            'text' => 'Role',
            'url' => 'roles',
            'icon' => 'fas fa-fw fa-lock',
            'can' => 'role-list',
            'active' => ['/roles/*'],
        ],
        [
            'text' => 'Ganti Kata Sandi',
            'url' => '/gantipassword',
            'icon' => 'fas fa-fw fa fa-key',
            'active' => ['/gantipassword/*'],
        ],
        [
            'text' => 'Log',
            'url' => 'activity-log',
            'icon' => 'fas fa-fw fa fa-history',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'DatatablesPlugins' => [
            'active' => true,
            'files' => [
                /*   [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.print.min.js',
                ], */
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/jszip/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/vfs_fonts.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/plug-ins/2.1.8/filtering/row-based/range_dates.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/datetime/1.5.4/css/dataTables.dateTime.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'ekko-lightbox' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    /*  'location' => 'vendor/ekko-lightbox/ekko-lightbox.css', */
                    'location' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    /* 'location' => 'vendor/ekko-lightbox/ekko-lightbox.min.js', */
                    'location' => 'https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',
                ],
            ],
        ],
        'Summernote' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.css',
                ],
            ],
        ],
        'DateRangePicker' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/moment/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/daterangepicker.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/daterangepicker.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
