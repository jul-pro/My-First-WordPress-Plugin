<?php

namespace includes\widgets;

use includes\models\admin\menu\MFWGuestBookSubMenuModel;

class MFWGuestBookWidget extends \WP_Widget {
    public function __construct() {
        parent::__construct(
            'mfw_guest_book',
            'My First Wordpress Guest Book Widget',
            array('description' => 'Guest Book')
        );
    }
    
    
    public function form($instance) {
        $title = '';
        $text = '';
        if( ! empty($instance) ) {
            $title = $instance['title'];
            $text = $instance['text'];
        }
        
        $titleId = $this->get_field_id('title');
        $titleName = $this->get_field_name('title');
        
        echo '<label for="' . $titleId . '">Title</label><br>';
        echo '<input type="text" id="' . $titleId . '" name="' . $titleName . '" '
                . 'value="' . $title . '"><br>';
        
        
        $textId = $this->get_field_id('text');
        $textName = $this->get_field_name('text');
        
        echo '<label for"' . $textId . '">Text</label><br>';
        echo '<textarea id="' . $textId . '" name="' . $textName . '">' . $text
                . '</textarea>';
         
    }
    
    public function update($newInstance, $oldInstance) {
        $values = array();
        error_log("dddd". print_r($newInstance)."dddd".print_r($oldInstance)."dsf");
        
        $values['title'] = htmlentities($newInstance['title']);
        $values['text'] = htmlentities($newInstance['text']);
        return $values;
        
    }
    
    public function widget($args, $instance) {
        $title = $instance['title'];
        $text = $instance['text'];
        
        echo $args['before_widget'];
        
        
        if($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        
        echo "<p>$text</p>";
        
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
        echo $args['after_widget'];
    }
}

