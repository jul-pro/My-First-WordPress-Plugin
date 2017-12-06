<?php

namespace includes\controllers\site\shortcodes;

use includes\common\MFWRequestApi;
use includes\controllers\admin\menu\MFWICreatorInstance;
use includes\models\site\MFWCalendarPricesMonthShortcodeModel;
//use includes\controllers\site\shortcodes\MFWShortcodesController;

class MFWCalendarPricesMonthShortcodeController extends MFWShortcodesController
    implements MFWICreatorInstance {
    
    public $model;
    
    public function __construct() {
        parent::__construct();
        $this->model = MFWCalendarPricesMonthShortcodeModel::newInstance();
    }
    
    public function action($atts = array(), $content = '', $tag = '') {
        $atts = shortcode_atts( array(
            'currency' => 'RUB',
            'origin' => '',
            'destination' => '',
            'month' => date('Y-m-d'),
        ), $atts, $tag );
        
        $requestAPI = MFWRequestApi::getInstance();
        $data = $requestAPI->getCalendarPricesMonth($atts['currency'], 
                $atts['origin'], $atts['destination'], $atts['month']);
        if($data == false) return false;
        return $this->render($data);
    }

    public function initShortcode() {
        add_shortcode('mfw_calendar_prices_month', array(&$this, 'action'));
    }

    public function render($data) {
        var_dump('<pre>', $data, '</pre>');
    }

    public static function newInstance() {
        $instance = new self;
        return $instance;
    }

}

