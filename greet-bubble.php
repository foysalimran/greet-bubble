<?php
/*
Plugin Name:  Greet Bubble
Plugin URI:   https://themeatelier.net/plugins/greet/
Description:  Professional video bubble plugin for putting videos on your website in a great and fun way.
Version:      1.0.3
Author:       ThemeAtelier
Author URI:   https://themeatelier.net/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  greet
Domain Path:  /languages
*/

// Block Direct access
if (!defined('ABSPATH')) {
    die('You should not access this file directly!.');
}

// Define Constants for direct access alert message.
if (!defined('GREET_ALERT_MSG'))
    define('GREET_ALERT_MSG', esc_html__('You should not access this file directly.!', 'greet'));


// Define constants for plugin directory path.
if (!defined('GREET_DIR_PATH'))
    define('GREET_DIR_PATH', plugin_dir_path(__FILE__));

// Define constants for plugin directory path.
if (!defined('GREET_DIR_URL'))
    define('GREET_DIR_URL', plugin_dir_url(__FILE__));

// Plugin settings in plugin list
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'greet_settings_link');
function greet_settings_link(array $links)
{
    $url = get_admin_url() . "options-general.php?page=greet_settings";
    $settings_link = '<a href="' .esc_url( $url ). '">' . esc_html__('Settings', 'greet') . '</a>';
    $links[] = $settings_link;
    return $links;
}

// Pro version link
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'greet_pro_link');
function greet_pro_link(array $links)
{
    $url = "https://1.envato.market/gbdm79";
    $settings_link = '<a style="color: #35b747; font-weight: 700;" href="' .esc_url( $url ). '">' . esc_html__('Go Pro!', 'greet') . '</a>';
    $links[] = $settings_link;
    return $links;
}


// Require files

require_once dirname(__FILE__) . '/admin/class.settings-api.php';
require_once dirname(__FILE__) . '/admin/greet-settings.php';
require_once dirname(__FILE__) . '/frontend/greet-main.php';

new Greet_Settings_API_Main();
