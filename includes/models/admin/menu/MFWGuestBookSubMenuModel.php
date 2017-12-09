<?php

namespace includes\models\admin\menu;

class MFWGuestBookSubMenuModel {
    const MFW_TABLE_NAME = 'mfw_guest_book';
    
    static public function getTableName() {
        global $wpdb;
        return $wpdb->prefix.static::MFW_TABLE_NAME;
    }
    
    static public function createTable() {
        global $wpdb;
        $tableName = self::getTableName();
        $sql = "CREATE TABLE " . $tableName . "("
                . "id int(11) NOT NULL AUTO_INCREMENT, "
                . "date_add int(11) NOT NULL, "
                . "user_name varchar(255) NOT NULL, "
                . "message text NOT NULL, "
                . "PRIMARY KEY (id)"
                . ") CHARACTER SET utf8 COLLATE utf8_general_ci";
        
        if($wpdb->get_var("show tables like '$tableName'") != $tableName) {
            require_once(ABSPATH.'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
    
    static public function getById($id) {
        global $wpdb;
        $data = $wpdb->get_row("SELECT * FROM ".self::getTableName()." WHERE id=".$id, ARRAY_A);
        if(count($data) > 0) return $data;
        return false;
    }
    
    static public function  insert($data) {
        global $wpdb;
        $id = $wpdb->insert(self::getTableName(), $data);
        return $id;
    }
    
    static public function updateById($data, $id) {
        global $wpdb;
        $id = $wpdb->update(self::getTableName(), $data, array('id'=>$id));
        return $id;
    }
    
    static public function deleteById($id) {
        global $wpdb;
        $wpdb->query("DELETE FROM ".self::getTableName()." WHERE id= '".$id."'");
    }
    
    static public function deleteTable() {
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS ". self::getTableName());
    }
    
    static public function getAll() {
//        if(self::issetTable() == false) return false;
        global $wpdb;
        $data = $wpdb->get_results("SELECT * FROM ".self::getTableName(). " ORDER BY date_add DESC", ARRAY_A);
        if(count($data) > 0) return $data;
        return false;
    }
}

