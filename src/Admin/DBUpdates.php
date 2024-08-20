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

/**
 * The admin class
 */
class DBUpdates
{
    /**
     * DB updates that need to be run
     *
     * @var array
     */
    private static $updates = array(
        '4.0.3' => 'updates/update-4.0.3.php',
    );
    
    /**
     * The class constructor.
     *
     */
    function __construct()
    {
        add_action('plugins_loaded', array($this, 'perform_updates'));
    }

    /**
     * Check if an update is needed.
     *
     * @return bool
     */
    public function is_needs_update() {
        $installed_version = get_option('greet_bubble_version');
        $first_version     = get_option('greet_bubble_first_version');
        $activation_date   = get_option('greet_bubble_activation_date');

        if (false === $installed_version) {
            update_option('greet_bubble_version', '4.0.1');
            update_option('greet_bubble_db_version', '4.0.1');
        }
        if (false === $first_version) {
            update_option('greet_bubble_first_version', GREET_BUBBLE_VERSION);
        }
        if (false === $activation_date) {
            update_option('greet_bubble_activation_date', current_time('timestamp'));
        }

        if (version_compare($installed_version, GREET_BUBBLE_VERSION, '<')) {
            return true;
        }
        return false;
    }

    /**
     * Perform all updates.
     *
     */
    public function perform_updates() {
        if (!$this->is_needs_update()) {
            return;
        }

        $installed_version = get_option('greet_bubble_version');

        foreach (self::$updates as $version => $path) {
            if (version_compare($installed_version, $version, '<')) {
                include $path;
                update_option('greet_bubble_version', $version);
            }
        }

        update_option('greet_bubble_version', GREET_BUBBLE_VERSION);
    }
}
