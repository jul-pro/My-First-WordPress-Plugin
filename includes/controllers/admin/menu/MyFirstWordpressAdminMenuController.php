<?php

namespace includes\controllers\admin\menu;
abstract class MyFirstWordpressAdminMenuController {
    public function __construct() {
        add_action('admin_menu', array(&$this, 'action'));
    }
    
    abstract public function action();
    abstract public function render();
    abstract public static function newInstance();
    
    protected function loadView($view, $type = 0, $data = array()) {
        if(file_exists($view)) {
            switch($type) {
                case 0:
                    require_once $view;
                    break;
                case 1:
                    require $view;
                    break;
                default:
                    require_once $view;
                    break;
            }
        } else {
            wp_die(sprintf(__('(View %s not found)', MFW_PLUGIN_TEXTDOMAIN), $view));
        }
    }
}
