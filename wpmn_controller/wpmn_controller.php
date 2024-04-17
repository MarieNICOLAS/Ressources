<?php
/* 
    Plugin Name: wpmn-controller
    Plugin URI: http://wordpress_6_4.acme.com
    Description: Plugin BO wp-controller AB
    Author: Marie
    Version: 1.0.1
*/
defined("WPABC_DIR") or define("WPABC_DIR", ABSPATH."wp-content\plugins\wpmn_controller");
// require_once(WPABC_DIR."\php\utils\wpabc_function.php");
// require_once(WPABC_DIR."\php\utils\global.php");
function wpabc_activate_plugin()
{
    $content = "plugin activé";
    return $content;
}
register_activation_hook(__FILE__,'wpabc_activate_plugin');

// Afficher le menu d'administration et la page de config
// add_action('admin_menu', 'wpabc_add_admin_menu_db');
// add_action('admin_init', 'wpabc_gestion_form_version_db');

// add_action('admin_init', 'wpabc_migrate_db');
?>
