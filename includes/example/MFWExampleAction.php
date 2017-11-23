<?php

namespace includes\example;

class MFWExampleAction {
    public function __construct() {
        add_action('my_action', array($this, 'myActionFunction'));
    }
    
    public static function newInstance() {
        $instance = new self;
        return $instance;
    }
    
    public function myActionFunction() {
        error_log('my_action call');
    }
    
    public function callMyAction() {
        do_action('my_action');
    }
}

