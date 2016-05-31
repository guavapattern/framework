<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class GPFramework_Option_backup extends GPFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();

    echo '<textarea name="'. $this->unique .'[import]"'. $this->element_class() . $this->element_attributes() .'></textarea>';
    submit_button( __( 'Import a Backup', 'gp-framework' ), 'primary gp-import-backup', 'backup', false );
    echo '<small>( '. __( 'copy-paste your backup string here', 'gp-framework' ).' )</small>';

    echo '<hr />';

    echo '<textarea name="_nonce"'. $this->element_class() . $this->element_attributes() .' disabled="disabled">'. gp_encode_string( get_option( $this->unique ) ) .'</textarea>';
    echo '<a href="'. admin_url( 'admin-ajax.php?action=gp-export-options' ) .'" class="button button-primary" target="_blank">'. __( 'Export and Download Backup', 'gp-framework' ) .'</a>';
    echo '<small>-( '. __( 'or', 'gp-framework' ) .' )-</small>';
    submit_button( __( '!!! Reset All Options !!!', 'gp-framework' ), 'gp-warning-primary gp-reset-confirm', $this->unique . '[resetall]', false );
    echo '<small class="gp-text-warning">'. __( 'Please be sure for reset all of framework options.', 'gp-framework' ) .'</small>';
    echo $this->element_after();

  }

}
