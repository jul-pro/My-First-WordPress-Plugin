<?php

namespace includes\common;
class MFWLocalization
{
    private static $instance = null;
    private function __construct() {
        add_action('plugins_loaded', array(&$this, 'localization'));
    }
    public static function getInstance() {
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function localization(){
        
        load_plugin_textdomain(MFW_PLUGIN_TEXTDOMAIN, false, MFW_PLUGIN_DIR_LOCALIZATION);
    }
}