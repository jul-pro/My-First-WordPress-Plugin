<?php
/*
Plugin Name: My First WordPress Plugin
Plugin URI: https://github.com/jul-pro/My-First-WordPress-Plugin
Description: Step by step development of the plugin.
Version: 1.0
Author: Vladimir Proskura
Author URI: https://www.facebook.com/vl.proskura
Text Domain: my-first-wordpress-plugin
Domain Path: /languages/
License: 
    Copyright 2017  Vladimir Proskura  (email: vl-pro@ukr.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


require_once plugin_dir_path(__FILE__) . '/config-path.php';
require_once MFW_PLUGIN_DIR.'/includes/common/MFAutoload.php';
require_once dirname(__FILE__).'/includes/MyFirstPlugin.php';

register_activation_hook(__FILE__, array('includes\MyFirstPlugin' ,  'activation' ));
register_deactivation_hook(__FILE__, array('includes\MyFirstPlugin', 'deactivation'));
