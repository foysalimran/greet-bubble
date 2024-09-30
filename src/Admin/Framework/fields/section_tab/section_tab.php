<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: section_tab
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;

if ( ! class_exists( 'GREET_BUBBLE_Field_section_tab' ) ) {
  class GREET_BUBBLE_Field_section_tab extends GREET_BUBBLE_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $unallows = array( 'section_tab' );

      echo wp_kses_post($this->field_before());

      echo '<div class="greet-bubble-section_tab-nav">';
      foreach ( $this->field['tabs'] as $key => $tab ) {

        $section_tab_icon   = ( ! empty( $tab['icon'] ) ) ? '<i class="greet-bubble--icon '. esc_attr( $tab['icon'] ) .'"></i>' : '';
        $section_tab_active = ( empty( $key ) ) ? 'greet-bubble-section_tab-active' : '';

        echo '<a href="#" class="'. esc_attr( $section_tab_active ) .'"">'. $section_tab_icon . esc_attr( $tab['title'] ) .'</a>';

      }
      echo '</div>';

      echo '<div class="greet-bubble-section_tab-contents">';
      foreach ( $this->field['tabs'] as $key => $tab ) {

        $section_tab_hidden = ( ! empty( $key ) ) ? ' hidden' : '';

        echo '<div class="greet-bubble-section_tab-content'. esc_attr( $section_tab_hidden ) .'">';

        foreach ( $tab['fields'] as $field ) {

          if ( in_array( $field['type'], $unallows ) ) { $field['_notice'] = true; }

          $field_id      = ( isset( $field['id'] ) ) ? $field['id'] : '';
          $field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
          $field_value   = ( isset( $this->value[$field_id] ) ) ? $this->value[$field_id] : $field_default;
          $unique_id     = ( ! empty( $this->unique ) ) ? $this->unique : '';

          GREET_BUBBLE::field( $field, $field_value, $unique_id, 'field/section_tab' );

        }

        echo '</div>';

      }
      echo '</div>';

      echo wp_kses_post( $this->field_after() );

    }

  }
}