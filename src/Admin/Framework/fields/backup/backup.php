<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'GREET_BUBBLE_Field_backup' ) ) {
  class GREET_BUBBLE_Field_backup extends GREET_BUBBLE_Fields {
    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {
      $unique = $this->unique;
      $nonce  = wp_create_nonce( 'greet_bubble_backup_nonce' );
      $export = add_query_arg( array( 'action' => 'greet-bubble-export', 'unique' => $unique, 'nonce' => $nonce ), admin_url( 'admin-ajax.php' ) );
      echo $this->field_before();
      echo '<textarea name="greet_bubble_import_data" class="greet-bubble-import-data"></textarea>';echo '<button type="submit" class="button button-primary greet-bubble-confirm greet-bubble-import" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Import', 'greet-bubble' ) .'</button>';
      echo '<hr />';
      echo '<textarea readonly="readonly" class="greet-bubble-export-data">'. esc_attr( json_encode( get_option( $unique ) ) ) .'</textarea>';
      echo '<a href="'. esc_url( $export ) .'" class="button button-primary greet-bubble-export" target="_blank">'. esc_html__( 'Export & Download', 'greet-bubble' ) .'</a>';
      echo '<hr />';
      echo '<button type="submit" name="greet_bubble_transient[reset]" value="reset" class="button greet-bubble-warning-primary greet-bubble-confirm greet-bubble-reset" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Reset', 'greet-bubble' ) .'</button>';
      echo $this->field_after();
    }
  }
}
