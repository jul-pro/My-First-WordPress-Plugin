<a href="admin.php?page=mfw_control_guest_book_menu&action=add_data">
    <?php _e('Add', MFW_PLUGIN_TEXTDOMAIN ); ?>
</a>

<table  border="1">
    <thead>
    <tr>
        <td>
            <?php _e('Name', MFW_PLUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Messsage', MFW_PLUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Date', MFW_PLUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Actions', MFW_PLUGIN_TEXTDOMAIN ); ?>
        </td>
    </tr>
    </thead>
    <tbody>
    <!-- Проверка данных на пустоту чтобы цыкл не вернул ошибку -->
    <?php if(count($data) > 0 && $data !== false){  ?>
        <?php foreach($data as $value): ?>
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

                <td>
                    <a href="admin.php?page=mfw_control_guest_book_menu&action=edit_data&id=<?php echo $value['id'];?>">
                        <?php _e('Edit', MFW_PLUGIN_TEXTDOMAIN ); ?>
                    </a>
                    <a href="admin.php?page=mfw_control_guest_book_menu&action=delete_data&id=<?php echo $value['id'];?>">
                        <?php _e('Delete', MFW_PLUGIN_TEXTDOMAIN ); ?>
                    </a>


                </td>

            </tr>
        <?php endforeach ?>
    <?php }else{ ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

