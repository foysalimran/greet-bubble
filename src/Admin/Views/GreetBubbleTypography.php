<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin/Views/GreetBubbleTypography
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin\Views;
use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;

class GreetBubbleTypography
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
            'title'       => esc_html__('TYPOGRAPHY', 'greet-bubble-pro'),
            'icon'        => 'icofont-font',
            'fields'      => array(
                array(
                    'id'     => 'hi_text_typography',
                    'class'  => 'greet_bubble_pro_only',
                    'desc'  => __('To unlock These Typography (940+ Google Fonts) options, <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>Upgrade To Pro!</i></strong></a>', 'greet-bubble'),
                    'title'  => __('\'Hi\' text typography.', 'greet-bubble'),
                    'type'   => 'typography',
                ),
                array(
                    'id'    => 'buttons_typography',
                    'class'  => 'greet_bubble_pro_only',
                    'desc'  => __('To unlock These Typography (940+ Google Fonts) options, <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>Upgrade To Pro!</i></strong></a>', 'greet-bubble'),
                    'type'  => 'typography',
                    'title' => esc_html__('Buttons Typography', 'greet-bubble'),
                    'color' => false,
                    'text_align'    => false,
                  ),

            )
        ));
    }
}
