<?php

namespace includes\controllers\admin\menu;

use includes\models\admin\menu\MFWGuestBookSubMenuModel;


class MFWGuestBookSubMenuController extends MyFirstWordpressAdminMenuController {
    
    public function action() {
        $plugin_page = add_submenu_page(
            MFW_PLUGIN_TEXTDOMAIN,
            _x(
                'Guest book',
                'admin menu page',
                MFW_PLUGIN_TEXTDOMAIN
            ),
            _x(
                'Guest book',
                'admin menu page',
                MFW_PLUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'mfw_control_guest_book_menu',
            array(&$this, 'render')
        );
        
    }

    public function render() {
        $action = isset($_GET['action']) ? $_GET['action'] : null ;
        
        $data = array();
        $pathView = MFW_PLUGIN_DIR;
        
        switch($action) {
            case "add_data":
                $pathView .= "/includes/views/admin/menu/MFWGuestBookSubMenuAdd.view.php";
                $this->loadView($pathView, 0, $data);
                break;
            
            case "insert_data":
                
                if (isset($_POST)){
                    
                    $id = MFWGuestBookSubMenuModel::insert(array(
                        'user_name' => $_POST['user_name'],
                        'date_add' => time(), 
                        'message' => $_POST['message']
                    ));
                    
                    $this->redirect("admin.php?page=mfw_control_guest_book_menu");
                } 
                
                break;
            
            case "edit_data":
                
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    
                    $data = MFWGuestBookSubMenuModel::getById((int)$_GET['id']);
                    $pathView .= "includes/views/admin/menu/MFWGuestBookSubMenuEdit.view.php";
                    $this->loadView($pathView, 0, $data);
                }
                break;
                
            case "update_data":
                
                 if (isset($_POST)){
                    
                    MFWGuestBookSubMenuModel::updateById(
                        array(
                            'user_name' => $_POST['user_name'],
                            'date_add' => time(),
                            'message' => $_POST['message']
                        ), $_POST['id']
                    );
                    $this->redirect("admin.php?page=mfw_control_guest_book_menu");
                 }
                break;
            
            case "delete_data":
                
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    MFWGuestBookSubMenuModel::deleteById((int)$_GET['id']);
                }
                $this->redirect("admin.php?page=mfw_control_guest_book_menu");
                break;
            
            default:
                

                $data = MFWGuestBookSubMenuModel::getAll();
                $pathView .= "includes/views/admin/menu/MFWGuestBookSubMenu.view.php";
                $this->loadView($pathView, 0, $data);
        }

        
    }
    
    public function redirect($page = ''){
        echo '<script type="text/javascript">
                  document.location.href="'.$page.'";
           </script>';
    }


    public static function newInstance() {
        $instance = new self;
        return $instance;
    }

    
}

