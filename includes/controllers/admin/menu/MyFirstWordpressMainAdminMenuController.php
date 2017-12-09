<?php

namespace includes\controllers\admin\menu;

use includes\models\admin\menu\MFWMainAdminMenuModel;

class MyFirstWordpressMainAdminMenuController extends MyFirstWordpressAdminMenuController 
    implements MFWICreatorInstance {
    public $model;
    
    public function __construct() {
        parent::__construct();
        $this->model = MFWMainAdminMenuModel::newInstance();
    }
    
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
        $pathView = MFW_PLUGIN_DIR."includes/views/admin/menu/MFWMainAdminMenu.view.php";
        $this->loadView($pathView);
        _e("Hello", MFW_PLUGIN_TEXTDOMAIN);
    }
    
    public static function newInstance() {
        $instance = new self;
        return $instance;
    }
}
