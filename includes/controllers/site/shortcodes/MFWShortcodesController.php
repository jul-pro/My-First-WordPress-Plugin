<?php

namespace includes\controllers\site\shortcodes;

abstract class MFWShortcodesController {
    public function __construct() {
        add_action('wp_loaded', array(&$this, 'initShortcode'));
    }
    
    abstract public function initShortcode();


    abstract public function action($atts = array(), $content = '', $tag = '');


    abstract public function render($data);
}

