<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Get icons from admin ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_get_icons' ) ) {
  function gp_get_icons() {

    $jsons = glob( gp_DIR . '/fields/icon/*.json' );

    if( ! empty( $jsons ) ) {

      foreach ( $jsons as $path ) {

        $object = gp_get_icon_fonts( 'fields/icon/'. basename( $path ) );

        if( is_object( $object ) ) {

          echo ( count( $jsons ) >= 2 ) ? '<h4 class="gp-icon-title">'. $object->name .'</h4>' : '';

          foreach ( $object->icons as $icon ) {
            echo '<a class="gp-icon-tooltip" data-icon="'. $icon .'" data-title="'. $icon .'"><span class="gp-icon gp-selector"><i class="'. $icon .'"></i></span></a>';
          }

        } else {
          echo '<h4 class="gp-icon-title">'. __( 'Error! Can not load json file.', 'gp-framework' ) .'</h4>';
        }

      }

    }

    do_action( 'gp_add_icons' );

    die();
  }
  add_action( 'wp_ajax_gp-get-icons', 'gp_get_icons' );
}

/**
 *
 * Set icons for wp dialog
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_set_icons' ) ) {
  function gp_set_icons() {

    echo '<div id="gp-icon-dialog" class="gp-dialog" title="'. __( 'Add Icon', 'gp-framework' ) .'">';
    echo '<div class="gp-dialog-header gp-text-center"><input type="text" placeholder='. __( 'Search a Icon...', 'gp-framework' ) .'" class="gp-icon-search" /></div>';
    echo '<div class="gp-dialog-load"><div class="gp-icon-loading">'. __( 'Loading...', 'gp-framework' ) .'</div></div>';
    echo '</div>';

  }
  add_action( 'admin_footer', 'gp_set_icons' );
  add_action( 'customize_controls_print_footer_scripts', 'gp_set_icons' );
}
