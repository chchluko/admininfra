<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Infraestructura',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>CEA</b>DIN',
    'logo_img' => 'images/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminINFRA',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [
        [
            'text' => 'Buscar...',
            'search' => false,
            'topnav' => false,
        ],
        [
            'text' => 'Personas',
            'url'  => 'empleados',
            'icon' => 'fas fa-fw fa-user-friends',
            'topnav' => true,
            //'can'  => 'tester',
            'roles' => ['tester',],
        ],
        [
            'text' => 'Usuarios',
            'url'  => 'users',
            'icon' => 'fas fa-fw fa-user',
            'topnav' => true,
            //'can'  => 'tester',
            'roles' => ['tester',],
            'active' => ['users*'],
        ],
        [
            'text' => 'Roles',
            'url'  => 'roles',
            'icon' => 'fas fa-fw fa-user-tag',
            'topnav' => true,
            //'can'  => 'tester',
            'roles' => ['tester',],
            'active' => ['roles*'],
        ],
        [
            'text' => 'Ubicaciones',
            'url'  => 'ubicaciones',
            'icon' => 'fas fa-fw fa-map-marker-alt',
            'topnav' => true,
            //'can'  => 'tester',
            'roles' => ['tester',],
        ],
        [
            'text' => 'Correos',
            'url'  => 'emails',
            'icon' => 'fas fa-fw fa-at',
            'roles' => ['gerencia', 'direccion', 'operacion'],
        ],
        [
            'text' => 'Tracking emails',
            'url'  => 'trackingemails',
            'icon' => 'fas fa-fw fa-user-secret',
            'can'  => 'auditar',
        ],
        [
            'text' => 'Claves Telefonicas',
            'icon' => 'fas fa-fw fa-phone',
            //'can'  => 'tester',
            'roles' => ['telecom', 'telefonia'],
            'submenu' => [
                [
                    'text' => 'Asignaciones',
                    'url'  => 'asignacionclaves',
                    'icon' => 'fas fa-fw fa-user-check',
                    'active' => ['asignacionclaves*'],
                ],
                [
                    'text' => 'Claves',
                    'url'  => 'clavestelefonicas',
                    'active' => ['roles*'],
                    'active' => ['clavestelefonicas*'],
                ],
            ],
        ],
        [
            'text'    => 'Enlaces & Lineas',
            'icon'    => 'fas fa-fw fa-link',
            //'can'  => 'tester',
            'roles' => ['telecom', 'enlaces'],
            'submenu' => [
                [
                    'text' => 'Enlaces (Servicios)',
                    'url'  => 'enlaces',
                    'icon' => 'fas fa-fw fa-unlink',
                    'active' => ['enlaces'],
                ],
                [
                    'text' => 'Catalogos',
                    'icon' => 'fas fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => 'Tipos',
                            'url'  => 'enlacestipos',
                            'active' => ['enlacestipos*'],
                        ],
                        [
                            'text' => 'Provedores',
                            'url'  => 'enlacesprovedores',
                            'active' => ['enlacesprovedores*'],
                        ],
                        [
                            'text' => 'Status',
                            'url'  => 'enlacesstatus',
                            'active' => ['enlacesstatus*'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'text' => 'Extensiones',
            'icon' => 'fas fa-fw fa-code-branch',
            //'can'  => 'tester',
            'roles' => ['telecom', 'telefonia'],
            'submenu' => [
                [
                    'text' => 'Asignaciones',
                    'url'  => 'extensiones',
                    'icon' => 'fas fa-fw fa-user-check',
                    'active' => ['extensiones/*'],
                ],
                [
                    'text' => 'Tipos',
                    'url'  => 'extensionestipo',
                    'active' => ['extensionestipo*'],
                ],
            ],
        ],
        [
            'text' => 'Hardware Plataformas',
            'icon' => 'fas fa-fw fa-server',
            //'can'  => 'tester',
            'roles' => ['datacenter',],
            'submenu' => [
                [
                    'text' => 'Catalogos',
                    'icon' => 'fas fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => 'Tipos',
                            'url'  => 'plataformastipo',
                            'active' => ['plataformastipo*'],
                        ],
                        [
                            'text' => 'Marcas',
                            'url'  => 'plataformasmarca',
                            'active' => ['plataformasmarca*'],
                        ],
                        [
                            'text' => 'Provedores',
                            'url'  => 'plataformasprovedor',
                            'active' => ['plataformasprovedor*'],
                        ],
                        [
                            'text' => 'Status',
                            'url'  => 'plataformasstatus',
                            'active' => ['plataformasstatus*'],
                        ],
                        [
                            'text' => 'Datacenter',
                            'url'  => 'datacenters',
                            'active' => ['datacenters*'],
                        ],
                        [
                            'text' => 'Sistemas Operativos',
                            'url'  => 'operatings',
                            'active' => ['operatings*'],
                        ],
                    ],
                ],
                [
                    'text' => 'Servidores',
                    'url'  => 'servidores',
                    'icon' => 'fas fa-fw fa-server',
                    'active' => ['servidores*'],
                ],
                [
                    'text' => 'Routers',
                    'url'  => 'routers',
                    'icon' => 'fas fa-fw fa-route',
                    'active' => ['routers*'],
                ],
                [
                    'text' => 'Switchs',
                    'url'  => 'switchs',
                    'icon' => 'fas fa-fw fa-toggle-on',
                    'active' => ['switchs*'],
                ],
                [
                    'text' => 'Firewalls',
                    'url'  => 'firewalls',
                    'icon' => 'fas fa-fw fa-shield-alt',
                    'active' => ['firewalls*'],
                ],
                [
                    'text' => 'CCTV',
                    'url'  => 'cctv',
                    'icon' => 'fas fa-fw fa-video',
                    'active' => ['cctv*'],
                ],
                [
                    'text' => 'Control de Acceso',
                    'url'  => 'biometricos',
                    'icon' => 'fas fa-fw fa-fingerprint',
                    'active' => ['biometricos*'],
                ],
                [
                    'text' => 'Aire Acondicionado',
                    'url'  => 'doblea',
                    'icon' => 'fas fa-fw fa-wind',
                    'active' => ['doblea*'],
                ],
                [
                    'text' => 'Pantallas',
                    'url'  => 'screens',
                    'icon' => 'fas fa-fw fa-desktop',
                    'active' => ['screens*'],
                ],
            ],
        ],
        [
            'text' => 'Hardware Soporte',
            'icon' => 'fas fa-fw fa-laptop',
            //'can'  => 'tester',
            'roles' => ['soporte',],
            'submenu' => [
                [
                    'text' => 'Inventario',
                    'url'  => 'soporte',
                    'icon' => 'fas fa-fw fa-laptop',
                    'active' => ['soporte*'],
                ],
                [
                    'text' => 'Asignaciones',
                    'url'  => 'asignacionsoporte',
                    'icon' => 'fas fa-fw fa-user-check',
                    'active' => ['asignacionsoporte*'],
                ],
                [
                    'text' => 'Catalogos',
                    'icon' => 'fas fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => 'Tipos',
                            'url'  => 'soportetipo',
                            'active' => ['soportetipo*'],
                        ],
                        [
                            'text' => 'Marcas',
                            'url'  => 'soportemarca',
                            'active' => ['soportemarca*'],
                        ],
                        [
                            'text' => 'Provedores',
                            'url'  => 'soporteprovedor',
                            'active' => ['soporteprovedor*'],
                        ],
                        [
                            'text' => 'Status',
                            'url'  => 'soportestatus',
                            'active' => ['soportestatus*'],
                        ],
                        [
                            'text' => 'Owner',
                            'url'  => 'soporteowner',
                            'active' => ['soporteowner*'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'text' => 'Equipos Moviles',
            'icon' => 'fas fa-fw fa-mobile-alt',
            //'can'  => 'tester',
            'roles' => ['movil'],
            'submenu' => [
                [
                    'text' => 'Catalogos',
                    'icon' => 'fas fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => 'Tipos',
                            'url'  => 'moviltipo',
                            'active' => ['moviltipo*'],
                        ],
                        [
                            'text' => 'Marcas',
                            'url'  => 'movilmarca',
                            'active' => ['movilmarca*'],
                        ],
                        [
                            'text' => 'Tipos de Planes',
                            'url'  => 'plantipo',
                            'active' => ['plantipo*'],
                        ],
                        [
                            'text' => 'Almacen',
                            'url'  => 'warehouse',
                            'active' => ['warehouse*'],
                        ],
                    ],
                ],
                [
                    'text' => 'Lineas',
                    'url'  => 'movilplan',
                    'icon' => 'fas fa-fw fa-phone',
                    'active' => ['movilplan*'],
                ],
                [
                    'text' => 'Equipos moviles',
                    'url'  => 'movil',
                    'icon' => 'fas fa-fw fa-mobile-alt',
                    'active' => ['movil'],
                ],
                [
                    'text' => 'Tablets',
                    'url'  => 'tablet',
                    'icon' => 'fas fa-fw fa-mobile-alt',
                    'active' => ['tablet'],
                ],
                [
                    'text' => 'Asignaciones',
                    'url'  => 'asignacionmovil',
                    'icon' => 'fas fa-fw fa-user-check',
                    'active' => ['asignacionmovil*'],
                ],
                [
                    'text' => 'Status',
                    'url'  => 'movilstatus',
                    'icon' => 'fas fa-fw fa-clipboard-list',
                    'active' => ['movilstatus*'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\RoleMenuFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
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
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => true,
];
