<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: icon
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'GREET_BUBBLE_Field_icon' ) ) {
  class GREET_BUBBLE_Field_icon extends GREET_BUBBLE_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'button_title' => esc_html__( 'Add Icon', 'greet-bubble' ),
        'remove_title' => esc_html__( 'Remove Icon', 'greet-bubble' ),
      ) );

      echo $this->field_before();

      $nonce  = wp_create_nonce( 'greet_bubble_icon_nonce' );
      $hidden = ( empty( $this->value ) ) ? ' hidden' : '';

      echo '<div class="greet-bubble-icon-select">';
      echo '<span class="greet-bubble-icon-preview'. esc_attr( $hidden ) .'"><i class="'. esc_attr( $this->value ) .'"></i></span>';
      echo '<a href="#" class="button button-primary greet-bubble-icon-add" data-nonce="'. esc_attr( $nonce ) .'">'. $args['button_title'] .'</a>';
      echo '<a href="#" class="button greet-bubble-warning-primary greet-bubble-icon-remove'. esc_attr( $hidden ) .'">'. $args['remove_title'] .'</a>';
      echo '<input type="hidden" name="'. esc_attr( $this->field_name() ) .'" value="'. esc_attr( $this->value ) .'" class="greet-bubble-icon-value"'. $this->field_attributes() .' />';
      echo '</div>';

      echo $this->field_after();

    }

    public function enqueue() {
      add_action( 'admin_footer', array( 'GREET_BUBBLE_Field_icon', 'add_footer_modal_icon' ) );
      add_action( 'customize_controls_print_footer_scripts', array( 'GREET_BUBBLE_Field_icon', 'add_footer_modal_icon' ) );
    }

    public static function add_footer_modal_icon() {
    ?>
      <div id="greet-bubble-modal-icon" class="greet-bubble-modal greet-bubble-modal-icon hidden">
        <div class="greet-bubble-modal-table">
          <div class="greet-bubble-modal-table-cell">
            <div class="greet-bubble-modal-overlay"></div>
            <div class="greet-bubble-modal-inner">
              <div class="greet-bubble-modal-title">
                <?php esc_html_e( 'Add Icon', 'greet-bubble' ); ?>
                <div class="greet-bubble-modal-close greet-bubble-icon-close"></div>
              </div>
              <div class="greet-bubble-modal-header">
                <input type="text" placeholder="<?php esc_html_e( 'Search...', 'greet-bubble' ); ?>" class="greet-bubble-icon-search" />
              </div>
              <div class="greet-bubble-modal-content">
                <div class="greet-bubble-modal-loading"><div class="greet-bubble-loading"></div></div>
                <div class="greet-bubble-modal-load"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }

  }
}
