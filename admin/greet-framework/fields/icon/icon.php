<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: icon
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'GREET_Field_icon' ) ) {
  class GREET_Field_icon extends GREET_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'button_title' => esc_html__( 'Add Icon', 'greet' ),
        'remove_title' => esc_html__( 'Remove Icon', 'greet' ),
      ) );

      echo $this->field_before();

      $nonce  = wp_create_nonce( 'greet_icon_nonce' );
      $hidden = ( empty( $this->value ) ) ? ' hidden' : '';

      echo '<div class="greet-icon-select">';
      echo '<span class="greet-icon-preview'. esc_attr( $hidden ) .'"><i class="'. esc_attr( $this->value ) .'"></i></span>';
      echo '<a href="#" class="button button-primary greet-icon-add" data-nonce="'. esc_attr( $nonce ) .'">'. $args['button_title'] .'</a>';
      echo '<a href="#" class="button greet-warning-primary greet-icon-remove'. esc_attr( $hidden ) .'">'. $args['remove_title'] .'</a>';
      echo '<input type="hidden" name="'. esc_attr( $this->field_name() ) .'" value="'. esc_attr( $this->value ) .'" class="greet-icon-value"'. $this->field_attributes() .' />';
      echo '</div>';

      echo $this->field_after();

    }

    public function enqueue() {
      add_action( 'admin_footer', array( 'GREET_Field_icon', 'add_footer_modal_icon' ) );
      add_action( 'customize_controls_print_footer_scripts', array( 'GREET_Field_icon', 'add_footer_modal_icon' ) );
    }

    public static function add_footer_modal_icon() {
    ?>
      <div id="greet-modal-icon" class="greet-modal greet-modal-icon hidden">
        <div class="greet-modal-table">
          <div class="greet-modal-table-cell">
            <div class="greet-modal-overlay"></div>
            <div class="greet-modal-inner">
              <div class="greet-modal-title">
                <?php esc_html_e( 'Add Icon', 'greet' ); ?>
                <div class="greet-modal-close greet-icon-close"></div>
              </div>
              <div class="greet-modal-header">
                <input type="text" placeholder="<?php esc_html_e( 'Search...', 'greet' ); ?>" class="greet-icon-search" />
              </div>
              <div class="greet-modal-content">
                <div class="greet-modal-loading"><div class="greet-loading"></div></div>
                <div class="greet-modal-load"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }

  }
}
