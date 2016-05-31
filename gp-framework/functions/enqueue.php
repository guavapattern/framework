<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework admin enqueue style and scripts
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_admin_enqueue_scripts' ) ) {
  function gp_admin_enqueue_scripts() {

    // admin utilities
    wp_enqueue_media();

    // wp core styles
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'wp-jquery-ui-dialog' );

    // framework core styles
    wp_enqueue_style( 'gp-framework', gp_URI .'/assets/css/gp-framework.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'font-awesome', gp_URI .'/assets/css/font-awesome.css', array(), '4.2.0', 'all' );

    if ( is_rtl() ) {
      wp_enqueue_style( 'gp-framework-rtl', gp_URI .'/assets/css/gp-framework-rtl.css', array(), '1.0.0', 'all' );
    }

    // wp core scripts
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-ui-accordion' );

    // framework core scripts
    wp_enqueue_script( 'gp-plugins',    gp_URI .'/assets/js/gp-plugins.js',    array(), '1.0.0', true );
    wp_enqueue_script( 'gp-framework',  gp_URI .'/assets/js/gp-framework.js',  array( 'gp-plugins' ), '1.0.0', true );

  }
  add_action( 'admin_enqueue_scripts', 'gp_admin_enqueue_scripts' );
}
