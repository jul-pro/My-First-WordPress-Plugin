<?php

namespace includes\widgets;

use includes\controllers\admin\menu\MFWICreatorInstance;
use includes\models\admin\menu\MFWGuestBookSubMenuModel;

class MFWGuestBookDashboardWidget implements MFWICreatorInstance {
    
    public function __construct() {
        add_action('wp_dashboard_setup', array(&$this, 'addDashboardWidgets'));
        add_action('wp_dashboard_setup', array(&$this, 'removeDashboardWidgets'));
    }
    
    
    public function addDashboardWidgets() {
        wp_add_dashboard_widget('mfw_guest_book_dashboard_widget',
                __('Guest book', MFW_PLUGIN_TEXTDOMAIN),
                array(&$this, 'renderDashboardWidget'));
        
        add_meta_box('mfw_guest_book_dashboard_widget_new',
                __('Guest book', MFW_PLUGIN_TEXTDOMAIN),
                array(&$this, 'renderDashboardWidget'),
                'dashboard',
                'side',
                'high');
        
        global $wp_meta_boxes;
        $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
        
        $example_widget_backup = array('mfw_guest_book_dashboard_widget' => 
            $normal_dashboard['mfw_guest_book_dashboard_widget']);
        unset($normal_dashboard['mfw_guest_book_dashboard_widget']);
        $sorted_dashboard = array_merge($example_widget_backup, $normal_dashboard);
        
        $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
    }
    
    
    public function removeDashboardWidgets() {
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    }
    
    
    public function renderDashboardWidget() {
        $data = MFWGuestBookSubMenuModel::getAll();
        
    ?>
        
        <table border="1">
            <thead>
                <tr>
                    <td>
                        <?php _e('Name', MFW_PLUGIN_TEXTDOMAIN) ?>
                    </td>
                    <td>
                        <?php _e('Message', MFW_PLUGIN_TEXTDOMAIN) ?>
                    </td>
                    <td>
                        <?php _e('Date', MFW_PLUGIN_TEXTDOMAIN) ?>
                    </td>
                </tr>
            </thead>
            <tbody>
            <?php if( count($data) > 0 && $data !== false ) : ?>
                <?php foreach ($data as $value) : ?>
                <tr class="row table_box">
                    <td>
                        <?php echo $value['user_name']; ?>
                    </td>
                    <td>
                        <?php echo $value['message']; ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y H:i', $value['date_add']); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    
<?php
    }
        
    
    public static function newInstance() {
        $instance = new self;
        return $instance;
    }

}

