<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Text sanitize
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_sanitize_text' ) ) {
  function gp_sanitize_text( $value, $field ) {
	  //pree($value);pree($field);exit;
    return gp_filter_nohtml_kses( $value );
  }
  add_filter( 'gp_sanitize_text', 'gp_sanitize_text', 10, 2 );
}
if( ! function_exists( 'gp_filter_nohtml_kses' ) ) {
	function gp_filter_nohtml_kses( $data ) {
		$ret = $data;
		if(is_array($data)){
			$arr = array();
			foreach($data as $val){
				$arr[] = addslashes( wp_kses( stripslashes( $val ), 'strip' ) );
			}
			$ret = (!empty($arr)?$arr:$data);
		}else{
			$ret = addslashes( wp_kses( stripslashes( $data ), 'strip' ) );
		}
		return $ret;
	}
}
/**
 *
 * Textarea sanitize
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_sanitize_textarea' ) ) {
  function gp_sanitize_textarea( $value ) {

    global $allowedposttags;
    return wp_kses( $value, $allowedposttags );

  }
  add_filter( 'gp_sanitize_textarea', 'gp_sanitize_textarea' );
}

/**
 *
 * Checkbox sanitize
 * Do not touch, or think twice.
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_sanitize_checkbox' ) ) {
  function gp_sanitize_checkbox( $value ) {

    if( ! empty( $value ) && $value == 1 ) {
      $value = true;
    }

    if( empty( $value ) ) {
      $value = false;
    }

    return $value;

  }
  add_filter( 'gp_sanitize_checkbox', 'gp_sanitize_checkbox' );
  add_filter( 'gp_sanitize_switcher', 'gp_sanitize_checkbox' );
}

/**
 *
 * Image select sanitize
 * Do not touch, or think twice.
 *
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_sanitize_image_select' ) ) {
  function gp_sanitize_image_select( $value ) {

    if( isset( $value ) && is_array( $value ) ) {
      if( count( $value ) ) {
        $value = $value;
      } else {
        $value = $value[0];
      }
    } else if ( empty( $value ) ) {
      $value = '';
    }

    return $value;

  }
  add_filter( 'gp_sanitize_image_select', 'gp_sanitize_image_select' );
}

/**
 *
 * Group sanitize
 * Do not touch, or think twice.
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_sanitize_group' ) ) {
  function gp_sanitize_group( $value ) {
    return ( empty( $value ) ) ? '' : $value;
  }
  add_filter( 'gp_sanitize_group', 'gp_sanitize_group' );
}

/**
 *
 * Title sanitize
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_sanitize_title' ) ) {
  function gp_sanitize_title( $value ) {
    return sanitize_title( $value );
  }
  add_filter( 'gp_sanitize_title', 'gp_sanitize_title' );
}

/**
 *
 * Text clean
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_sanitize_clean' ) ) {
  function gp_sanitize_clean( $value ) {
    return $value;
  }
  add_filter( 'gp_sanitize_clean', 'gp_sanitize_clean', 10, 2 );
}
