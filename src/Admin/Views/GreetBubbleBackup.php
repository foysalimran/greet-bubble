<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin/Views/GreetBubbleBackup
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin\Views;
use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;

class GreetBubbleBackup
{

    /**
     * Create Option fields for the setting options.
     *
     * @param string $prefix Option setting key prefix.
     * @return void
     */
    public static function options($prefix)
    {
        GREET_BUBBLE::createSection($prefix, array(
            'title'       => esc_html__('BACKUP', 'greet-bubble'),
            'icon'        => 'icofont-shield',
            'description' => esc_html__('Export or import to use same settings in different websites.', 'greet-bubble'),
            'fields'      => array(
                array(
                    'type' => 'backup',
                ),
            )
        ));

    }
}
