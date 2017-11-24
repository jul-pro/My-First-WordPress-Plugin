<?php

namespace includes\controllers\admin\menu;

class MyFirstWordpressMainAdminMenuController extends MyFirstWordpressAdminMenuController {
    public function  action() {
        $pluginPage = add_menu_page(
            _x(
                'My First Wordpress',
                'admin menu page',
                MFW_PLUGIN_TEXTDOMAIN
            ),
            _x(
                'My First Wordpress',
                'admin menu page',
                MFW_PLUGIN_TEXTDOMAIN
            ),
            'manage_options',
            MFW_PLUGIN_TEXTDOMAIN,
            array(&$this,'render'),
            MFW_PLUGIN_URL . 'assets/images/main-menu.png'    
        );
    }
    
    public function render() {
        _e("Hello", MFW_PLUGIN_TEXTDOMAIN);
    }
    
    public static function newInstance() {
        $instance = new self;
        return $instance;
    }
}
