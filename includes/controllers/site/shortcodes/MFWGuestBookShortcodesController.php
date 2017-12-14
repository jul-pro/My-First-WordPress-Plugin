<?php

namespace includes\controllers\site\shortcodes;

use includes\controllers\admin\menu\MFWICreatorInstance;

class MFWGuestBookShortcodesController extends MFWShortcodesController 
    implements MFWICreatorInstance {
    
    public function action($atts = array(), $content = '', $tag = '') {
        return $this->render(array());
    }

    public function initShortcode() {
        add_shortcode('mfw_guest_book', array(&$this, 'action'));
    }

    public function render($data) {
        $output="";
        $output='<form action="" method="post">'
                . '<label>'.__('User name', MFW_PLUGIN_TEXTDOMAIN).'</label>'
                . '<input type="text" name="mfw_user_name" class="mfw-user-name">'
                . '<label>'.__('Message', MFW_PLUGIN_TEXTDOMAIN).'</label>'
                . '<textarea name="mfw_message" class="mfw-message"></textarea>'
                . '<button class="mfw-btn-add">'.__('Add', MFW_PLUGIN_TEXTDOMAIN).'</button>'
                . '</form>';
        return $output;
    }

    public static function newInstance() {
        $instance = new self;
        return $instance;
    }

}