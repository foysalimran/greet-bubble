<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin/Views
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin\Views;

use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;

/**
 * Views class to create all metabox options for Greet Bubble Pro Shortcode generator.
 */
class Views
{
	/**
	 * Create metabox for the Generator options.
	 *
	 * @param string $prefix Metabox key prefix.
	 * @return void
	 */
	public static function metaboxes($prefix)
	{
		GREET_BUBBLE::createMetabox($prefix, array(
			'title'        => esc_html__('Greet Video Options', 'greet-bubble'),
			'post_type'    => array("post", "page", "product"),
			'theme'        => 'light',
			'show_restore' => true,
		));
	}
}
