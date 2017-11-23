<?php

namespace includes\example;

class MFWExampleFilter {
    public function __construct() {
        add_filter('my_filter', array($this, 'myFilterFunction'));
    }
    
    public static function newInstance() {
        $instance = new self;
        return $instance;
    }
    /**
     * Функция, которую вызовет фильтр
     * @param string $str
     * @return stirng
     */
    public function myFilterFunction($str) {
        $str = "Hello {$str}";
        return $str;
    }
    
    public function callMyFilter($name) {
        $name = apply_filters('my_filter', $name);
        
        //Выводим результат в debug.log
        error_log($name);
    }
}

