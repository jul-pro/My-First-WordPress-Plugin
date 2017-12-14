<?php

namespace includes\ajax;

use includes\controllers\admin\menu\MFWICreatorInstance;
use includes\models\admin\menu\MFWGuestBookSubMenuModel;

class MFWGuestBookAjaxHandler implements MFWICreatorInstance {
    
    public function __construct() {
        if(defined('DOING_AJAX') && DOING_AJAX) {
            add_action('wp_ajax_guest_book', array(&$this, 'ajaxHandler'));
            add_action('wp_ajax_nopriv_guest_book', array(&$this, 'ajaxHandler'));
        }
    }
    
    public function ajaxHandler() {
        error_log('ajaxHandler');
        if($_POST) {
            $id = MFWGuestBookSubMenuModel::insert(array(
                'user_name' => $_POST['user_name'],
                'date_add' => time(),
                'message' => $_POST['message']
            ));
            $return = array(
                'message' => 'Сохранено',
                'ID' => $id
            );
            
            wp_send_json_success($return);
        }
        wp_send_json_error();
        wp_die();
    }
    
    public static function newInstance() {
        $instance = new self;
        return $instance;
    }

}

