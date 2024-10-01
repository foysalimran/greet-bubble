<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin/Views/GreetBubbleOptions
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin\Views;

use ThemeAtelier\GreetBubble\Admin\Views\GreetBubbleGeneral;
use ThemeAtelier\GreetBubble\Admin\Views\GreetBubbleAppearance;
use ThemeAtelier\GreetBubble\Admin\Views\GreetBubbleControls;
use ThemeAtelier\GreetBubble\Admin\Views\GreetBubbleTypography;
use ThemeAtelier\GreetBubble\Admin\Views\GreetBubbleAdvanced;
use ThemeAtelier\GreetBubble\Admin\Views\GreetBubbleBackup;
use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;

class GreetBubbleOptions
{

    /**
     * Create Option fields for the setting options.
     *
     * @param string $prefix Option setting key prefix.
     * @return void
     */
    public static function options($prefix)
    {
        GREET_BUBBLE::createOptions($prefix, array(
            'menu_title'        => esc_html__('Greet Bubble', 'greet-bubble'),
            'menu_slug'         => 'greet-bubble',
            'menu_type'         => 'submenu',
            'framework_title'   => esc_html__('Greet Bubble', 'greet-bubble'),
            'show_bar_menu'     => false,
            'menu_icon'         => 'dashicons-format-video',
            'footer_text'       => __('If you love the plugin don\'t forgot to add a review at <a target="_blank" href="https://wordpress.org/support/plugin/greet-bubble/reviews/#new-post">WordPress plugin repository</a>. ', 'greet-bubble'),
            'theme'             => 'light',
            'ajax_save'         => true,
            'show_reset_all'    => false,
            'show_search'       => false,
            'show_all_options'  => false,
            'show_sub_menu'     => false,
            'nav'               => 'inline',
            'menu_position'     => 58,
        ));

        GreetBubbleGeneral::options($prefix);
        GreetBubbleAppearance::options($prefix);
        GreetBubbleControls::options($prefix);
        GreetBubbleTypography::options($prefix);
        GreetBubbleAdvanced::options($prefix);
        GreetBubbleBackup::options($prefix);
    }
}
