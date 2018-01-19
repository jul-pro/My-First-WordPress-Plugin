<?php

namespace includes\example;

class MFWExampleAction {
    public function __construct() {
        add_action('my_action', array($this, 'myActionFunction'));
        
        // Прикрепим функцию к событию 'my_hook'
//        add_action('my_hook', function(){ error_log(1); });
//        add_action('my_hook', function(){ error_log(2); });
//        add_action('my_hook', function(){ error_log(3); });
//        add_action('my_hook', function(){ error_log(4); }, 15);
//        add_action('my_hook', function(){ error_log(5); }, 10); // можно не указывать 10 - по умолчанию
//        add_action('my_hook', function(){ error_log(6); }, 5);

        do_action('my_hook');
        
        add_action('plugins_loaded', function() {
            error_log(__('Hello', MFW_PLUGIN_TEXTDOMAIN)); }, 100);
            
        add_action('my_action', array(&$this, 'myActionFunctionAdditionalParameter'), 10, 3);
//        add_action('plugins_loaded', function(){ error_log(__('Hello', MFW_PLUGIN_TEXTDOMAIN)); }, 100);
    }
    
    public static function newInstance() {
        $instance = new self;
        return $instance;
    }
    
    public function myActionFunction() {
//        error_log('my_action call');
    }
    
    public function callMyAction() {
        do_action('my_action');
    }
    
    public function callMyActionAdditionalParameter($data1, $data2, $data3) {
        do_action('my_action', $data1, $data2, $data3);
    }
    
    public function myActionFunctionAdditionalParameter($data1 = "", $data2 = "", $data3 = "" ){
        //Выводим сообщение в debug.log
//        error_log("my_action call {$data1} {$data2} {$data3}");
    }
}

