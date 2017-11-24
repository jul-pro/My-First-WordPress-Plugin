<?php

namespace includes\common;


class MFWLoaderScript {
    private static $instance = null;

    private function __construct(){
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            add_action('admin_enqueue_scripts', array(&$this, 'loadScriptAdmin' ) );
            add_action('admin_head', array(&$this, 'loadHeadScriptAdmin'));
        } else {
            add_action( 'wp_enqueue_scripts', array(&$this, 'loadScriptSite' ) );
            add_action('wp_head', array(&$this, 'loadHeadScriptSite'));
            add_action( 'wp_footer', array(&$this, 'loadFooterScriptSite'));
        }

    }
    
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function loadScriptAdmin($hook){
        wp_register_script(
            MFW_PLUGIN_SLUG.'-AdminMain', //$handle
            MFW_PLUGIN_URL.'assets/admin/js/MFWAdminMain.js', //$src
            array(
                'jquery'
            ), //$deps
            MFW_PLUGIN_VERSION, //$ver
            true //$$in_footer
        );
        
        wp_enqueue_script(MFW_PLUGIN_SLUG.'-AdminMain');
        
        wp_register_style(
            MFW_PLUGIN_SLUG.'-AdminMain', //$handle
            MFW_PLUGIN_URL.'assets/admin/css/MFWAdminMain.css', // $src
            array(), //$deps,
            MFW_PLUGIN_VERSION // $ver
        );
        
        wp_enqueue_style(MFW_PLUGIN_SLUG.'-AdminMain');

    }
    public function loadHeadScriptAdmin(){}
    public function loadScriptSite($hook){}
    public function loadHeadScriptSite(){}
    public function loadFooterScriptSite(){}

}

