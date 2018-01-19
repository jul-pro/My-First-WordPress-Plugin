<?php

namespace includes\models\admin\menu;

use includes\controllers\admin\menu\MFWICreatorInstance;

class MFWMainAdminMenuModel implements MFWICreatorInstance {
    
    public function __construct() {
        add_action('admin_init', array(&$this, 'createOption'));
        //error_log(1);
    }
    
    public function createOption() {
        //error_log(2);
        
        register_setting('MFWMainSettings', MFW_PLUGIN_OPTION_NAME, array(&$this, 'saveOption'));
        add_settings_section('mfw_account_section_id', __('Account', MFW_PLUGIN_TEXTDOMAIN), '', 'mfw-development-plugin');
        
        add_settings_field(
                'mfw_token_field_id',
                __('Token', MFW_PLUGIN_TEXTDOMAIN),
                array(&$this, 'tokenField'),
                'mfw-development-plugin',
                'mfw_account_section_id'
        );
        
        add_settings_field(
                'mfw_marker_field_id',
                __('Marker', MFW_PLUGIN_TEXTDOMAIN),
                array(&$this, 'markerField'),
                'mfw-development-plugin',
                'mfw_account_section_id'
        );        
    }
    
    public function tokenField() {
        $option = get_option(MFW_PLUGIN_OPTION_NAME);
        ?>
            <input type="text"
                   name="<?php echo MFW_PLUGIN_OPTION_NAME; ?>[account][token]"
                   value="<?php echo esc_attr($option['account']['token']) ?>" >
        <?php
    }

    public function markerField() {
        $option = get_option(MFW_PLUGIN_OPTION_NAME);
        
        ?>
        <input type="text"
               name="<?php echo MFW_PLUGIN_OPTION_NAME;?>[account][marker]"
               value="<?php echo esc_attr($option['account']['marker'])?>" >
        <?php
    }
    
    
    public function saveOption($input) {
        //error_log(3);
        error_log(print_r($input, true));
        return $input;
    }

    public static function newInstance() {
        $instance = new self;
        return $instance;
    }

}

