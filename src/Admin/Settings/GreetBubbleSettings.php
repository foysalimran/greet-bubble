<?php

namespace ThemeAtelier\GreetBubble\Admin\Settings;

use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;
// Cannot access directly.
if (!defined('ABSPATH')) {
    die;
}
/**
 * This class is responsible for Custom CSS settings tab in settings page.
 *
 * @since      1.0.0
 */
class IDonateSettings
{

    /**
     * Custom CSS settings.
     *
     * @since 1.0.0
     * @param string $prefix IDonateSettings.
     */
    public static function section($prefix)
    {

        GREET_BUBBLE::createSection(
            $prefix,
            array(
                'title'  => esc_html__('GENERAL', 'greet-bubble'),
                'icon'    => 'greet-bubble-tab-icon icofont-gear',
                'fields' => array(
                    array(
                        'id'       => 'test',
                        'type'     => 'text',
                        'title'    => esc_html__('Test', 'greet-bubble'),
                    ),
                ),
            )
        );
        GREET_BUBBLE::createSection(
            $prefix,
            array(
                'title'  => esc_html__('GENERAL', 'greet-bubble'),
                'icon'    => 'greet-bubble-tab-icon icofont-settings-alt',
                'fields' => array(
                    array(
                        'id'       => 'test',
                        'type'     => 'text',
                        'title'    => esc_html__('Test', 'greet-bubble'),
                    ),
                ),
            )
        );
    }
}
