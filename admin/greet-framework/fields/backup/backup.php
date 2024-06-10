<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'GREET_Field_backup' ) ) {
  class GREET_Field_backup extends GREET_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $unique = $this->unique;
      $nonce  = wp_create_nonce( 'greet_backup_nonce' );
      $export = add_query_arg( array( 'action' => 'greet-export', 'unique' => $unique, 'nonce' => $nonce ), admin_url( 'admin-ajax.php' ) );

      echo $this->field_before();

      echo '<textarea name="greet_import_data" class="greet-import-data"></textarea>';
      echo '<button type="submit" class="button button-primary greet-confirm greet-import" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Import', 'greet' ) .'</button>';
      echo '<hr />';
      echo '<textarea readonly="readonly" class="greet-export-data">'. esc_attr( json_encode( get_option( $unique ) ) ) .'</textarea>';
      echo '<a href="'. esc_url( $export ) .'" class="button button-primary greet-export" target="_blank">'. esc_html__( 'Export & Download', 'greet' ) .'</a>';
      echo '<hr />';
      echo '<button type="submit" name="greet_transient[reset]" value="reset" class="button greet-warning-primary greet-confirm greet-reset" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Reset', 'greet' ) .'</button>';

      echo $this->field_after();

    }

  }
}
