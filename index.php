<?php

return [

    'name' => 'theme-avion',

    /**
     * Menu positions
     */
    'menus' => [

        'main' => 'Main',
        'offcanvas' => 'Offcanvas',
        'toolbar_l' => 'Toolbar Left',
        'toolbar_r' => 'Toolbar Right'

    ],

    /**
     * Widget positions
     */
    'positions' => [

        'toolbar_l' => 'Toolbar Left',
        'toolbar_r' => 'Toolbar Right',
        'navbar' => 'Navbar',
        'navbar_more' => 'Navbar More',
        'top' => 'Top A',
        'top_b' => 'Top B',
        'top_c' => 'Top C',
        'top_d' => 'Top D',
        'sidebar' => 'Sidebar',
        'bottom' => 'Bottom A',
        'bottom_b' => 'Bottom B',
        'bottom_c' => 'Bottom C',
        'bottom_d' => 'Bottom D',
        'footer' => 'Footer',
        'offcanvas' => 'Offcanvas'

    ],

    /**
     * Node defaults
     */
    'node' => [

        'title_hide' => false,
        'title_large' => false,
        'alignment' => '',
        'padding' => '',
        'html_class' => '',
        'sidebar_first' => false,
        'top_gutter' => false,
        'top_b_gutter' => false,
        'top_c_gutter' => false,
        'top_d_gutter' => false,
        'bottom_gutter' => false,
        'bottom_b_gutter' => false,
        'bottom_c_gutter' => false,
        'bottom_d_gutter' => false,
        'footer_margin' => ''

    ],

    /**
     * Widget defaults
     */
    'widget' => [

        'title_hide' => false,
        'title_size' => 'uk-panel-title',
        'alignment' => '',
        'padding' => '',
        'html_class' => '',
        'panel' => 'uk-panel-box',
        'animation' => ''

    ],

    /**
     * Settings url
     */
    'settings' => '@site/settings#site-theme',

    /**
     * Configuration defaults
     */
    'config' => [

        'style' => '',
        'logo_small' => '',
        'logo_offcanvas' => '',
        'header_layout' => 'default',
        'totop_scroller' => true

    ],

    /**
     * Events
     */
    'events' => [

        'view.system/site/admin/settings' => function ($event, $view) use ($app) {
            $view->script('site-theme', 'theme:app/bundle/site-theme.js', 'site-settings');
            $view->data('$theme', $this);
        },

        'view.system/site/admin/edit' => function ($event, $view) {
            $view->script('node-theme', 'theme:app/bundle/node-theme.js', 'site-edit');
        },

        'view.system/widget/edit' => function ($event, $view) {
            $view->script('widget-theme', 'theme:app/bundle/widget-theme.js', 'widget-edit');
        },

        /**
         * Custom markup calculations based on theme settings
         */
        'view.layout' => function ($event, $view) use ($app) {

            if ($app->isAdmin()) {
                return;
            }

            $params = $view->params;

            $classes = [
                'navbar' => 'tm-navbar'
            ];

            $params['classes'] = $classes;
        },

        'view.system/site/widget-menu' => function ($event, $view) {

            if ($event['widget']->position == 'navbar') {
                $event->setTemplate('menu-navbar.php');
            }

        }

    ]

];
