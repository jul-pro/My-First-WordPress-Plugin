<?php

namespace includes;

//use includes\example\MFWExampleFilter;
//use includes\example\MFWExampleAction;
use includes\common\MFWLoader;

class MyFirstPlugin {
    private static $instance = null;
    
    protected function __construct() {
//        $mfweFilter = MFWExampleFilter::newInstance();
//        $mfweFilter -> callMyFilter("Vladimir");
//        
//        $mfweAction = MFWExampleAction::newInstance();
//        $mfweAction -> callMyAction();
        
        MFWLoader::getInstance();
    }
    
    public static function getInstance() {
        if(null == self::$instance) {
            self::$instance = new self;
        }
        
        return self::$instance;
    }
    
    public static function activation() {
        //debug.log
        error_log('plugin ' . MFW_PLUGIN_NAME . ' activation');
    }
    
    public static function deactivation() {
        error_log('plugin '.MFW_PLUGIN_NAME.' deactivation');
    }
}

MyFirstPlugin::getInstance();
