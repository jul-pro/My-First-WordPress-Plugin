<?php

namespace includes\common;

use includes\example\MFWExampleAction;
use includes\example\MFWExampleFilter;
use includes\controllers\admin\menu\MyFirstWordpressMainAdminMenuController;
use includes\controllers\admin\menu\MyFirstWordpressMainAdminSubMenuController;
use includes\controllers\admin\menu\MFWGuestBookSubMenuController;
use includes\common\MFWLoaderScript;
use includes\controllers\site\shortcodes\MFWCalendarPricesMonthShortcodeController;
use includes\controllers\site\shortcodes\MFWGuestBookShortcodesController;
use includes\ajax\MFWGuestBookAjaxHandler;
use includes\widgets\MFWGuestBookDashboardWidget;

class MFWLoader
{
    private static $instance = null;
    private function __construct(){
        // is_admin() Условный тег. Срабатывает когда показывается админ панель сайта (консоль или любая
        // другая страница админки).
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            // Когда в админке вызываем метод admin()
            $this->admin();
        } else {
            // Когда на сайте вызываем метод site()
            $this->site();
        }
        $this->all();
    }
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    /**
     * Метод будет срабатывать когда вы находитесь в Админ панеле. Загрузка классов для Админ панели
     */
    public function admin(){
        MyFirstWordpressMainAdminMenuController::newInstance();
        MyFirstWordpressMainAdminSubMenuController::newInstance();
        MFWGuestBookSubMenuController::newInstance();
        MFWGuestBookDashboardWidget::newInstance();
    }
    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site(){
        MFWCalendarPricesMonthShortcodeController::newInstance();
        MFWGuestBookShortcodesController::newInstance();
    }
    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){
        MFWLocalization::getInstance();
        $mfwExampleAction = MFWExampleAction::newInstance();
        
        $mfwExampleFilter = MFWExampleFilter::newInstance();
        $mfwExampleFilter->callMyFilter("Roman");
        $mfwExampleFilter->callMyFilterAdditionalParameter("Roman", "Softgroup", "Poltava");
        $mfwExampleAction = MFWExampleAction::newInstance();
        $mfwExampleAction->callMyAction();
        $mfwExampleAction->callMyActionAdditionalParameter( 'test1', 'test2', 'test3' );
        
        MFWLoaderScript::getInstance();
        MFWGuestBookAjaxHandler::newInstance();
    }
}