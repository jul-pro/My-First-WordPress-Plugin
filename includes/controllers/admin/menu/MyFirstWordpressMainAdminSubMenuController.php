<?php

namespace includes\controllers\admin\menu;

class MyFirstWordpressMainAdminSubMenuController extends MyFirstWordpressAdminMenuController {
    
    public function action() {
        $plugin_page = add_submenu_page(
            MFW_PLUGIN_TEXTDOMAIN,
            _x(
                'Sub My First Wordpress',
                'admin menu page' ,
                MFW_PLUGIN_TEXTDOMAIN
            ),
            _x(
                'Sub My First Wordpress',
                'admin menu page' ,
                MFW_PLUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'my_first_wordpress_control_sub_menu',
            array(&$this, 'render'));
    }

    public function render() {
        _e("Hello world sub menu", MFW_PLUGIN_TEXTDOMAIN);
    }

    public static function newInstance() {
        $instance = new self;
        return $instance;
    }

}
