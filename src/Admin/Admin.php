<?php

/**
 * The admin-facing functionality of the plugin.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin;

use ThemeAtelier\GreetBubble\Admin\DBUpdates;
use ThemeAtelier\GreetBubble\Admin\Views\Views;
use ThemeAtelier\GreetBubble\Admin\Views\GreetBubbleOptions;

/**
 * The admin class
 */
class Admin
{
    /**
     * The slug of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_slug   The slug of this plugin.
     */
    private $plugin_slug;

    /**
     * The min of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $min   The slug of this plugin.
     */
    private $min;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * The class constructor.
     *
     * @param string $plugin_slug The slug of the plugin.
     * @param string $version Current version of the plugin.
     */
    function __construct($plugin_slug, $version)
    {
        $this->plugin_slug = $plugin_slug;
        $this->version     = $version;
        $this->min         = defined('WP_DEBUG') && WP_DEBUG ? '' : '.min';
        Views::metaboxes('_greet_meta');
        GreetBubbleOptions::options('_greet');
        // Database Updater.
		new DBUpdates();
        add_action('admin_menu', array($this, 'add_plugin_page'));
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public static function enqueue_scripts($hook)
    {
        if ('toplevel_page_greet-bubble' == $hook) {
            wp_enqueue_style('greet-help');
        }
        wp_enqueue_style('greet-global-admin');
    }


    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            esc_html__('Greet Bubble', 'greet-bubble'),
            esc_html__('Greet Bubble', 'greet-bubble'),
            'manage_options',
            'greet-bubble',
            array($this, 'greet_bubble_settings'),
            'dashicons-format-video',
            6
        );

        // Greet Bubble Settings Page.
        add_submenu_page(
            'greet-bubble',
            esc_html__('Settings', 'greet-bubble'),
            esc_html__('Settings', 'greet-bubble'),
            'manage_options',
            'greet-bubble',
            array($this, 'greet_bubble_settings')
        );

        add_submenu_page('greet-bubble', __('👑 Upgrade to Pro!', 'greet-bubble'), sprintf('<span class="greet-bubble-pro-text">%s</span>', __('👑 Upgrade to Pro!', 'greet-bubble')), 'manage_options', 'https://1.envato.market/greet');
    }

    /**
     * Options page callback
     */
    public function greet_bubble_settings() {}
}
