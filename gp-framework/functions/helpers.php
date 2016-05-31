<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Add framework element
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_add_element' ) ) {
  function gp_add_element( $field = array(), $value = '', $unique = '' ) {

    $output     = '';
    $depend     = '';
    $sub        = ( isset( $field['sub'] ) ) ? 'sub-': '';
    $unique     = ( isset( $unique ) ) ? $unique : '';
    $languages  = gp_language_defaults();
    $class      = 'GPFramework_Option_' . $field['type'];
    $wrap_class = ( isset( $field['wrap_class'] ) ) ? ' ' . $field['wrap_class'] : '';
    $hidden     = ( isset( $field['show_only_language'] ) && ( $field['show_only_language'] != $languages['current'] ) ) ? ' hidden' : '';
    $is_pseudo  = ( isset( $field['pseudo'] ) ) ? ' gp-pseudo-field' : '';

    if ( isset( $field['dependency'] ) ) {
      $hidden  = ' hidden';
      $depend .= ' data-'. $sub .'controller="'. $field['dependency'][0] .'"';
      $depend .= ' data-'. $sub .'condition="'. $field['dependency'][1] .'"';
      $depend .= " data-". $sub ."value='". $field['dependency'][2] ."'";
    }

    $output .= '<div class="gp-element gp-field-'. $field['type'] . $is_pseudo . $wrap_class . $hidden .'"'. $depend .'>';

    if( isset( $field['title'] ) ) {
      $field_desc = ( isset( $field['desc'] ) ) ? '<p class="gp-text-desc">'. $field['desc'] .'</p>' : '';
      $output .= '<div class="gp-title gp_'.gp_underscore($field['title']).'"><h4>' . $field['title'] . '</h4>'. $field_desc .'</div>';
    }

    $output .= ( isset( $field['title'] ) ) ? '<div class="gp-fieldset">' : '';

    $value   = ( !isset( $value ) && isset( $field['default'] ) ) ? $field['default'] : $value;
    $value   = ( isset( $field['value'] ) ) ? $field['value'] : $value;

    if( class_exists( $class ) ) {
      ob_start();
	  //pree($class);
	  //pree($field);pree($value);pree($unique);exit;
	  if(isset($field['repeater']) && $field['repeater']==true){
		if(is_array($value) && !empty($value)){
			foreach($value as $val){
				$element = new $class( $field, $val, $unique );
				$element->output();
			}
		}else{
		  $element = new $class( $field, $value, $unique );
		  $element->output();
		}

	  }else{
		  $element = new $class( $field, $value, $unique );
		  $element->output();
	  }
      
      $output .= ob_get_clean();
    } else {
      $output .= '<p>'. __( 'This field class is not available!', 'gp-framework' ) .'</p>';
    }

    $output .= ( isset( $field['title'] ) ) ? '</div>' : '';
    $output .= '<div class="clear"></div>';
    $output .= '</div>';

    return $output;

  }
}

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_encode_string' ) ) {
  function gp_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_decode_string' ) ) {
  function gp_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/**
 *
 * Get google font from json file
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_get_google_fonts' ) ) {
  function gp_get_google_fonts() {

    global $gp_google_fonts;

    if( ! empty( $gp_google_fonts ) ) {

      return $gp_google_fonts;

    } else {

      ob_start();
      gp_locate_template( 'fields/typography/google-fonts.json' );
      $json = ob_get_clean();

      $gp_google_fonts = json_decode( $json );

      return $gp_google_fonts;
    }

  }
}

/**
 *
 * Get icon fonts from json file
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_get_icon_fonts' ) ) {
  function gp_get_icon_fonts( $file ) {

    ob_start();
    gp_locate_template( $file );
    $json = ob_get_clean();

    return json_decode( $json );

  }
}

/**
 *
 * Array search key & value
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_array_search' ) ) {
  function gp_array_search( $array, $key, $value ) {

    $results = array();

    if ( is_array( $array ) ) {
      if ( isset( $array[$key] ) && $array[$key] == $value ) {
        $results[] = $array;
      }

      foreach ( $array as $sub_array ) {
        $results = array_merge( $results, gp_array_search( $sub_array, $key, $value ) );
      }

    }

    return $results;

  }
}

/**
 *
 * Load options fields
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_load_option_fields' ) ) {
  function gp_load_option_fields() {

    $located_fields = array();

    foreach ( glob( gp_DIR .'/fields/*/*.php' ) as $gp_field ) {
      $located_fields[] = basename( $gp_field );
      gp_locate_template( str_replace(  gp_DIR, '', $gp_field ) );
    }

    $override_name = apply_filters( 'gp_framework_override', 'gp-framework-override' );
    $override_dir  = get_template_directory() .'/'. $override_name .'/fields';

    if( is_dir( $override_dir ) ) {

      foreach ( glob( $override_dir .'/*/*.php' ) as $override_field ) {

        if( ! in_array( basename( $override_field ), $located_fields ) ) {

          gp_locate_template( str_replace( $override_dir, '/fields', $override_field ) );

        }

      }

    }

    do_action( 'gp_load_option_fields' );

  }
}
