<?php

namespace includes\models\site;

use includes\common\MFWRequestApi;
use includes\controllers\admin\menu\MFWICreatorInstance;

class MFWCalendarPricesMonthShortcodeModel implements MFWICreatorInstance {
    
    public function __construct() {
        ;
    }
    
    public function getData($currency, $origin, $destination, $month='') {
        $cacheKey = "";
        $data = array();
        $cacheKey = $this->getCacheKey($origin, $destination, $currency);
        $data = get_transient($cacheKey);
        if ( false === ($data) ) {
            $requestAPI = MFWRequestApi::getInstance();
            $data = $requestAPI->getCalendarPricesMonth($currency, $origin, $destination, $month);
            set_transient($cacheKey, $data, 100);
        }
        
        return $data;
    }
    
    public function getCacheKey($origin, $destination, $currency) {
        return MFW_PLUGIN_TEXTDOMAIN
            ."_calendar_prices_month_origin_{$origin}_destination_{$destination}_currency_{$currency}";
    }


    public static function newInstance() {
        $instance = new self;
        return $instance;
    }

}

