<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin/Views/GreetBubbleControls
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin\Views;

use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;

class GreetBubbleControls
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
            'title'       => __('CONTROLS', 'greet-bubble'),
            'icon'        => 'icofont-eye-alt',
            'fields'      => array(
                array(
                    'type'    => 'notice',
                    'style'   => 'normal',
                    'class'   => 'greet_pro_notice',
                    'content' => __('Want essential controls over your <strong>Greet bubble</strong>? <a href="https://1.envato.market/gbdm79" target="_blank"><b>Upgrade To Pro!</b></a>', 'greet-bubble'),
                ),
                array(
                    'title'   => __('Hide re-play control', 'greet-bubble'),
                    'class'   => 'switcher_pro_only',
                    'id'      => 'hide_replay',
                    'type'    => 'switcher',
                    'text_on'   => __('Yes', 'greet-bubble'),
                    'text_off'   => __('No', 'greet-bubble'),
                    'inline'  => true,
                    'default' => true,
                ),
                array(
                    'title'   => __('Hide mute/unmute control', 'greet-bubble'),
                    'class'   => 'switcher_pro_only',
                    'id'      => 'hide_mute_unmute',
                    'type'    => 'switcher',
                    'text_on'   => __('Yes', 'greet-bubble'),
                    'text_off'   => __('No', 'greet-bubble'),
                    'inline'  => true,
                    'default' => true,
                ),
                array(
                    'title'   => __('Hide fullscreen control', 'greet-bubble'),
                    'class'   => 'switcher_pro_only',
                    'id'      => 'hide_fullscreen',
                    'type'    => 'switcher',
                    'text_on'   => __('Yes', 'greet-bubble'),
                    'text_off'   => __('No', 'greet-bubble'),
                    'inline'  => true,
                    'default' => true,
                ),
            )
        ));
    }
}
