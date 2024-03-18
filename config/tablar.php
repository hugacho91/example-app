<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    | Here you can change the default title of your admin panel.
    |
    */

    'title' => 'Administrador',
    'title_prefix' => '',
    'title_postfix' => '',
    'bottom_title' => 'Administrador',
    'current_version' => 'v4.8',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    */

    'logo' => '<b>Tab</b>LAR',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can set up an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'images/logo-lp-2.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 150,
            'height' => 150,
        ],
    ],

    'auth_logo_2' => [
        'enabled' => false,
        'img' => [
            'path' => 'images/logo-lp.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 150,
            'height' => 150,
        ],
    ],

    /*
     *
     * Default path is 'resources/views/vendor/tablar' as null. Set your custom path here If you need.
     */

    'views_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look at the layout section here:
    |
    */

    'layout' => 'combo',
    //boxed, combo, condensed, fluid, fluid-vertical, horizontal, navbar-overlap, navbar-sticky, rtl, vertical, vertical-right, vertical-transparent

    'layout_light_sidebar' => false,
    'layout_light_topbar' => true,
    'layout_enable_top_header' => false,

    /*
    |--------------------------------------------------------------------------
    | Sticky Navbar for Top Nav
    |--------------------------------------------------------------------------
    |
    | Here you can enable/disable the sticky functionality of Top Navigation Bar.
    |
    | For detailed instructions, you can look at the Top Navigation Bar classes here:
    |
    */

    'sticky_top_nav_bar' => false,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions, you can look at the admin panel classes here:
    |
    */

    'classes_body' => '',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions, you can look at the urls section here:
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => false,
    'setting_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Display Alert
    |--------------------------------------------------------------------------
    |
    | Display Alert Visibility.
    |
    */
    'display_alert' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    |
    */

    'menu' => [
        // Navbar items:
        [
            'text' => 'Tablero de Control',
            'icon' => 'ti ti-home',
            'url' => '/dashboard'
        ],

        [
            'text' => 'Usuarios',
            'icon' => 'ti ti-user',
            'url' => '/users',
            'can' => 'users.index'
        ],
        [
            'text' => 'Roles y permisos',
            'icon' => 'ti ti-lock',
            'url' => '/roles',
            'can' => 'roles.index'
        ],

        [
            'text' => 'Expedientes',
            'icon' => 'ti ti-files',
            'url' => '/expedientes',
            'can' => 'expedientes.index'
        ],

        [
            'text' => 'Actividades',
            'icon' => 'ti ti-folder',
            'url' => '/actividades',
            'can' => 'actividades.index'
        ],

        [
            'text' => 'Instituciones',
            'icon' => 'ti ti-home',
            'url' => '/instituciones',
            'can' => 'instituciones.index'
        ],

        [
            'text' => 'Delegaciones',
            'icon' => 'ti ti-article',
            'url' => '/delegaciones',
            'can' => 'delegaciones.index',
        ],
        [
            'text' => 'Secciones',
            'icon' => 'ti ti-article',
            'url' => '/secciones',
            'can' => 'secciones.index',
        ],

        /*[
            'text' => 'Fallas',
            'url' => '#',
            'icon' => 'ti ti-help',
            'active' => ['support1'],
            'submenu' => [
                /*[
                    'text' => 'Informe de Fallas',
                    'url' => '/informe-fallas',
                    'icon' => 'ti ti-article',
                    
                ],*/
                /*[
                    'text' => 'Solución de Fallas',
                    'url' => '/solucion-fallas',
                    'icon' => 'ti ti-article',
                    
                ],
            ],
            
        ],*/

        /*[
            'text' => 'Support 2',
            'url' => '#',
            'icon' => 'ti ti-help',
            'active' => ['support2'],
            'submenu' => [
                [
                    'text' => 'Ticket',
                    'url' => 'support2',
                    'icon' => 'ti ti-article',
                ]
            ],
        ],

        [
            'text' => 'Support 3',
            'url' => '#',
            'icon' => 'ti ti-help',
            'active' => ['support3'],
            'submenu' => [
                [
                    'text' => 'Ticket',
                    'url' => 'support3',
                    'icon' => 'ti ti-article',
                ]
            ],
        ],*/

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    |
    */

    'filters' => [
        TakiElias\Tablar\Menu\Filters\GateFilter::class,
        TakiElias\Tablar\Menu\Filters\HrefFilter::class,
        TakiElias\Tablar\Menu\Filters\SearchFilter::class,
        TakiElias\Tablar\Menu\Filters\ActiveFilter::class,
        TakiElias\Tablar\Menu\Filters\ClassesFilter::class,
        TakiElias\Tablar\Menu\Filters\LangFilter::class,
        TakiElias\Tablar\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Vite
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Vite support.
    |
    | For detailed instructions you can look the Vite here:
    | https://laravel-vite.dev
    |
    */

    'vite' => true,
];
