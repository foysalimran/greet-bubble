<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: repeater
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'GREET_BUBBLE_Field_repeater' ) ) {
  class GREET_BUBBLE_Field_repeater extends GREET_BUBBLE_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'max'          => 0,
        'min'          => 0,
        'button_title' => '<i class="icofont-plus-circle"></i>',
      ) );

      if ( preg_match( '/'. preg_quote( '['. $this->field['id'] .']' ) .'/', $this->unique ) ) {

        echo '<div class="greet-bubble-notice greet-bubble-notice-danger">'. esc_html__( 'Error: Field ID conflict.', 'greet-bubble' ) .'</div>';

      } else {

        echo $this->field_before();

        echo '<div class="greet-bubble-repeater-item greet-bubble-repeater-hidden" data-depend-id="'. esc_attr( $this->field['id'] ) .'">';
        echo '<div class="greet-bubble-repeater-content">';
        foreach ( $this->field['fields'] as $field ) {

          $field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
          $field_unique  = ( ! empty( $this->unique ) ) ? $this->unique .'['. $this->field['id'] .'][0]' : $this->field['id'] .'[0]';

          GREET_BUBBLE::field( $field, $field_default, '___'. $field_unique, 'field/repeater' );

        }
        echo '</div>';
        echo '<div class="greet-bubble-repeater-helper">';
        echo '<div class="greet-bubble-repeater-helper-inner">';
        echo '<i class="greet-bubble-repeater-sort icofont-drag"></i>';
        echo '<i class="greet-bubble-repeater-clone icofont-copy-invert"></i>';
        echo '<i class="greet-bubble-repeater-remove greet-bubble-confirm icofont-close" data-confirm="'. esc_html__( 'Are you sure to delete this item?', 'greet-bubble' ) .'"></i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '<div class="greet-bubble-repeater-wrapper greet-bubble-data-wrapper" data-field-id="['. esc_attr( $this->field['id'] ) .']" data-max="'. esc_attr( $args['max'] ) .'" data-min="'. esc_attr( $args['min'] ) .'">';

        if ( ! empty( $this->value ) && is_array( $this->value ) ) {

          $num = 0;

          foreach ( $this->value as $key => $value ) {

            echo '<div class="greet-bubble-repeater-item">';
            echo '<div class="greet-bubble-repeater-content">';
            foreach ( $this->field['fields'] as $field ) {

              $field_unique = ( ! empty( $this->unique ) ) ? $this->unique .'['. $this->field['id'] .']['. $num .']' : $this->field['id'] .'['. $num .']';
              $field_value  = ( isset( $field['id'] ) && isset( $this->value[$key][$field['id']] ) ) ? $this->value[$key][$field['id']] : '';

              GREET_BUBBLE::field( $field, $field_value, $field_unique, 'field/repeater' );

            }
            echo '</div>';
            echo '<div class="greet-bubble-repeater-helper">';
            echo '<div class="greet-bubble-repeater-helper-inner">';
            echo '<i class="greet-bubble-repeater-sort icofont-drag"></i>';
            echo '<i class="greet-bubble-repeater-clone icofont-copy-invert"></i>';
            echo '<i class="greet-bubble-repeater-remove greet-bubble-confirm icofont-close" data-confirm="'. esc_html__( 'Are you sure to delete this item?', 'greet-bubble' ) .'"></i>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            $num++;

          }

        }

        echo '</div>';

        echo '<div class="greet-bubble-repeater-alert greet-bubble-repeater-max">'. esc_html__( 'You cannot add more.', 'greet-bubble' ) .'</div>';
        echo '<div class="greet-bubble-repeater-alert greet-bubble-repeater-min">'. esc_html__( 'You cannot remove more.', 'greet-bubble' ) .'</div>';
        echo '<a href="#" class="button button-primary greet-bubble-repeater-add">'. $args['button_title'] .'</a>';

        echo $this->field_after();

      }

    }

    public function enqueue() {

      if ( ! wp_script_is( 'jquery-ui-sortable' ) ) {
        wp_enqueue_script( 'jquery-ui-sortable' );
      }

    }

  }
}
