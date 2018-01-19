<?php

namespace includes;

//use includes\example\MFWExampleFilter;
//use includes\example\MFWExampleAction;
use includes\common\MFWLoader;
use includes\common\MFWDefaultOption;
use includes\models\admin\menu\MFWGuestBookSubMenuModel;
use includes\custom_post_type\PortfolioPostType;

class MyFirstPlugin {
    private static $instance = null;
    
    protected function __construct() {
//        $mfweFilter = MFWExampleFilter::newInstance();
//        $mfweFilter -> callMyFilter("Vladimir");
//        
//        $mfweAction = MFWExampleAction::newInstance();
//        $mfweAction -> callMyAction();
        
        MFWLoader::getInstance();
        add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));
        new PortfolioPostType();
    }
    
    public function setDefaultOptions() {
        if(!get_option(MFW_PLUGIN_OPTION_NAME)) {
            update_option(MFW_PLUGIN_OPTION_NAME, MFWDefaultOption::getDefaultOptions());
        }
        
        if(!get_option(MFW_PLUGIN_OPTION_VERSION)) {
            update_option(MFW_PLUGIN_OPTION_VERSION, MFW_PLUGIN_VERSION);
        }
    }
    
    
    public static function getInstance() {
        if(null == self::$instance) {
            self::$instance = new self;
        }
        
        return self::$instance;
    }
    
    public static function activation() {
        //debug.log
        MFWGuestBookSubMenuModel::createTable();
//        error_log('plugin ' . MFW_PLUGIN_NAME . ' activation');
    }
    
    public static function deactivation() {
        delete_option(MFW_PLUGIN_OPTION_NAME);
        delete_option(MFW_PLUGIN_OPTION_VERSION);
    }
}

MyFirstPlugin::getInstance();
