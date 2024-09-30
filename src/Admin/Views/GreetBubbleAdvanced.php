<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin/Views/GreetBubbleAdvanced
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin\Views;
use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;

class GreetBubbleAdvanced
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
            'title'       => __('ADVANCED', 'greet-bubble'),
            'icon'        => 'icofont-code-alt',
            'fields' => array(
                array(
                    'id'       => 'greet_additional_css',
                    'type'     => 'code_editor',
                    'title'    => __('Additional CSS', 'greet-bubble'),
                    'settings' => array(
                        'theme' => 'mbo',
                        'mode'  => 'css',
                    ),
                ),
                array(
                    'id'       => 'greet_additional_js',
                    'type'     => 'code_editor',
                    'title'    => __('Additional JS', 'greet-bubble'),
                    'settings' => array(
                        'theme' => 'mbo',
                        'mode'  => 'js',
                    ),
                ),
            ),

        ));
    }
}
