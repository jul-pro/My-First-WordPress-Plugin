<?php

define("MFW_PLUGIN_DIR", plugin_dir_path(__FILE__));
define("MFW_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("MFW_PLUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(MFW_PLUGIN_DIR)));
define("MFW_PLUGIN_TEXTDOMAIN", str_replace( '_', '-', MFW_PLUGIN_SLUG ));
define("MFW_PLUGIN_OPTION_VERSION", MFW_PLUGIN_SLUG.'_version');
define("MFW_PLUGIN_OPTION_NAME", MFW_PLUGIN_SLUG.'_options');
define("MFW_PLUGIN_AJAX_URL", admin_url('admin-ajax.php'));
if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(MFW_PLUGIN_DIR.'/'.basename(MFW_PLUGIN_DIR).'.php', false, false);
define("MFW_PLUGIN_VERSION", $TPOPlUGINs['Version']);
define("MFW_PLUGIN_NAME", $TPOPlUGINs['Name']);
define("MFW_PLUGIN_DIR_LOCALIZATION", plugin_basename(MFW_PLUGIN_DIR.'/languages/'));


