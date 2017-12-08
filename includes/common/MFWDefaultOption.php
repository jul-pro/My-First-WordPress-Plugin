<?php

namespace includes\common;

class MFWDefaultOption {
    public static function getDefaultOptions() {
        $defaults = array(
            'account' => array(
                'marker' => '',
                'token' => ''
            )
        );
        
        $defaults = apply_filters('mfw_default_option', $defaults);
        return $defaults;
    }
}
