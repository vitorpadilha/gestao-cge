<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Gestão Horários IFAM',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Horários</b> IFAM',

    'logo_mini' => '<b>H</b> IFAM',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'MAIN NAVIGATION',
        [
            'text' => 'Blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'Pages',
            'url'         => 'admin/pages',
            'icon'        => 'home',
            'label'       => 4,
            'label_color' => 'success',
        ],
        'MÓDULOS',
        [
            'text'    => 'Grupos de Usuários',
            'icon'    => 'users',
            'submenu' => [
                [
                    'text' => 'Cadastrar Novo Grupo',
                    'url'  => '/grupos/mantem',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Grupos',
                    'url'  => '/grupos/listar',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Usuários',
            'icon'    => 'user',
            'submenu' => [
                [
                    'text' => 'Cadastrar Novo Usuário',
                    'url'  => '/usuarios/mantem',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Usuários Cadastrados',
                    'url'  => '/usuarios/listar',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Docentes',
            'icon'    => 'chalkboard-teacher',
            'submenu' => [
                [
                    'text' => 'Cadastrar Novo Docente',
                    'url'  => '/professores/mantem',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Docentes',
                    'url'  => '/professores/listar',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Cursos',
            'icon'    => 'graduation-cap',
            'submenu' => [
                [
                    'text' => 'Cadastrar Novo Curso',
                    'url'  => '/cursos/mantem',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Cursos',
                    'url'  => '/cursos/listar',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Turmas',
            'icon'    => 'chalkboard',
            'submenu' => [
                [
                    'text' => 'Cadastrar Nova Turma',
                    'url'  => '#',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Turma',
                    'url'  => '#',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Disciplinas',
            'icon'    => 'book',
            'submenu' => [
                [
                    'text' => 'Cadastrar Disciplina',
                    'url'  => '/disciplinas/mantem',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Disciplinas',
                    'url'  => '/disciplinas/listar',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Áreas de Atuação',
            'icon'    => 'book',
            'submenu' => [
                [
                    'text' => 'Cadastrar Área de Atuação',
                    'url'  => '/areasatuacao/mantem',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Áreas de Atuação',
                    'url'  => '/areasatuacao/listar',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Horários',
            'icon'    => 'clock',
            'submenu' => [
                [
                    'text' => 'Propor Horários (Coord.)',
                    'url'  => '#',
                    'icon'    => 'spinner',
                ],
                [
                    'text' => 'Aprovar Proposta de Horário',
                    'url'  => '#',
                    'icon'    => 'clipboard-check',
                ],
                [
                    'text' => 'Solicitar Troca de Horário',
                    'url'  => '#',
                    'icon'    => 'history',
                ],
                [
                    'text' => 'Listar Horários por Turma/Docente',
                    'url'  => '#',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Faltas',
            'icon'    => 'bell-slash',
            'submenu' => [
                [
                    'text' => 'Cadastrar Nova Falta',
                    'url'  => '#',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Faltas',
                    'url'  => '#',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Permutas',
            'icon'    => 'exchange-alt',
            'submenu' => [
                [
                    'text' => 'Cadastrar Nova Permuta',
                    'url'  => '#',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Permutas',
                    'url'  => '#',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text'    => 'Antecipação',
            'icon'    => 'backward',
            'submenu' => [
                [
                    'text' => 'Cadastrar Nova Antecipação',
                    'url'  => '#',
                    'icon'    => 'plus-circle',
                ],
                [
                    'text' => 'Listar Antecipações',
                    'url'  => '#',
                    'icon'    => 'list',
                ],
            ],
        ],
        [
            'text' => 'Change Password',
            'url'  => 'admin/settings',
            'icon' => 'lock',
        ],
        [
            'text'    => 'Multilevel',
            'icon'    => 'share',
            'submenu' => [
                [
                    'text' => 'Level One',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Level One',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Level Two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'Level Two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'Level Three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'Level Three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'Level One',
                    'url'  => '#',
                ],
            ],
        ],
        'LABELS',
        [
            'text'       => 'Important',
            'icon_color' => 'red',
        ],
        [
            'text'       => 'Warning',
            'icon_color' => 'yellow',
        ],
        [
            'text'       => 'Information',
            'icon_color' => 'aqua',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
