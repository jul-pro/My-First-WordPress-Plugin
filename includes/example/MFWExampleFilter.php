<?php

namespace includes\example;

class MFWExampleFilter {
    public function __construct() {
        add_filter('my_filter', array($this, 'myFilterFunction'));
        add_filter('my_filter', array(&$this, 'myFiterFunctionAdditionalParameter'), 10 , 3);
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
//        error_log($name);
    }
    
    public function myFiterFunctionAdditionalParameter( $str, $data1 = "", $data2 = "" ){
        $str = "Hello {$str} {$data1} {$data2}";
        return $str;
    }
    
    public function callMyFilterAdditionalParameter( $name, $data1, $data2 ){
        $name = apply_filters('my_filter', $name, $data1, $data2);
        //Выводим результат в debug.log
//        error_log($name);
     }
}

