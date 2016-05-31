<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Email validate
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_validate_email' ) ) {
  function gp_validate_email( $value, $field ) {

    if ( ! sanitize_email( $value ) ) {
      return __( 'Please write a valid email address!', 'gp-framework' );
    }

  }
  add_filter( 'gp_validate_email', 'gp_validate_email', 10, 2 );
}

/**
 *
 * Numeric validate
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_validate_numeric' ) ) {
  function gp_validate_numeric( $value, $field ) {

    if ( ! is_numeric( $value ) ) {
      return __( 'Please write a numeric data!', 'gp-framework' );
    }

  }
  add_filter( 'gp_validate_numeric', 'gp_validate_numeric', 10, 2 );
}

/**
 *
 * Required validate
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_validate_required' ) ) {
  function gp_validate_required( $value ) {
    if ( empty( $value ) ) {
      return __( 'Fatal Error! This field is required!', 'gp-framework' );
    }
  }
  add_filter( 'gp_validate_required', 'gp_validate_required' );
}
