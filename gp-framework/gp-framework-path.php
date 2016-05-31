<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework constants
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
$gp_info = gp_info();
//print_r($gp_info);
defined( 'GP_VERSION' )    or  define( 'GP_VERSION',    $gp_info['version'] );
defined( 'GP_OPTION' )     or  define( 'GP_OPTION',     '_gp_options' );
defined( 'gp_CUSTOMIZE' )  or  define( 'gp_CUSTOMIZE',  '_gp_customize_options' );

/**
 *
 * Framework path finder
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_get_path_locate' ) ) {
  function gp_get_path_locate() {

    $dirname        = wp_normalize_path( dirname( __FILE__ ) );
    $plugin_dir     = wp_normalize_path( WP_PLUGIN_DIR );
    $located_plugin = ( preg_match( '#'. $plugin_dir .'#', $dirname ) ) ? true : false;
    $directory      = ( $located_plugin ) ? $plugin_dir : get_template_directory();
    $directory_uri  = ( $located_plugin ) ? WP_PLUGIN_URL : get_template_directory_uri();
    $basename       = str_replace( wp_normalize_path( $directory ), '', $dirname );
    $dir            = $directory . $basename;
    $uri            = $directory_uri . $basename;

    return apply_filters( 'gp_get_path_locate', array(
      'basename' => wp_normalize_path( $basename ),
      'dir'      => wp_normalize_path( $dir ),
      'uri'      => $uri
    ) );

  }
}

/**
 *
 * Framework set paths
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
$get_path = gp_get_path_locate();

defined( 'gp_BASENAME' )  or  define( 'gp_BASENAME',  $get_path['basename'] );
defined( 'gp_DIR' )       or  define( 'gp_DIR',       $get_path['dir'] );
defined( 'gp_URI' )       or  define( 'gp_URI',       $get_path['uri'] );

/**
 *
 * Framework locate template and override files
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'gp_locate_template' ) ) {
  function gp_locate_template( $template_name ) {

    $located      = '';
    $override     = apply_filters( 'gp_framework_override', 'gp-framework-override' );
    $dir_plugin   = WP_PLUGIN_DIR;
    $dir_theme    = get_template_directory();
    $dir_child    = get_stylesheet_directory();
    $dir_override = '/'. $override .'/'. $template_name;
    $dir_template = gp_BASENAME .'/'. $template_name;

    // child theme override
    $child_force_overide    = $dir_child . $dir_override;
    $child_normal_override  = $dir_child . $dir_template;

    // theme override paths
    $theme_force_override   = $dir_theme . $dir_override;
    $theme_normal_override  = $dir_theme . $dir_template;

    // plugin override
    $plugin_force_override  = $dir_plugin . $dir_override;
    $plugin_normal_override = $dir_plugin . $dir_template;

    if ( file_exists( $child_force_overide ) ) {

      $located = $child_force_overide;

    } else if ( file_exists( $child_normal_override ) ) {

      $located = $child_normal_override;

    } else if ( file_exists( $theme_force_override ) ) {

      $located = $theme_force_override;

    } else if ( file_exists( $theme_normal_override ) ) {

      $located = $theme_normal_override;

    } else if ( file_exists( $plugin_force_override ) ) {

      $located =  $plugin_force_override;

    } else if ( file_exists( $plugin_normal_override ) ) {

      $located =  $plugin_normal_override;
    }

    $located = apply_filters( 'gp_locate_template', $located, $template_name );

    if ( ! empty( $located ) ) {
      load_template( $located, true );
    }

    return $located;

  }
}

/**
 *
 * Get option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_get_option' ) ) {
  function gp_get_option( $option_name = '', $default = '' ) {
	//echo GP_OPTION;
    $options = apply_filters( 'gp_get_option', get_option( GP_OPTION ), $option_name, $default );
	//pree($options);
    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}
if ( ! function_exists( 'gp_get_meta' ) ) {
  function gp_get_meta( $id, $option_name = '', $default = '' ) {

    $options = get_post_meta($id, 'gp_meta', true);

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}


/**
 *
 * Set option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_set_option' ) ) {
  function gp_set_option( $option_name = '', $new_value = '' ) {

    $options = apply_filters( 'gp_set_option', get_option( GP_OPTION ), $option_name, $new_value );

    if( ! empty( $option_name ) ) {
      $options[$option_name] = $new_value;
      update_option( GP_OPTION, $options );
    }

  }
}

/**
 *
 * Get all option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_get_all_option' ) ) {
  function gp_get_all_option() {
    return get_option( GP_OPTION );
  }
}

/**
 *
 * Multi language value
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_get_multilang_option' ) ) {
  function gp_get_multilang_option( $option_name = '', $default = '' ) {

    $value     = gp_get_option( $option_name, $default );
    $languages = gp_language_defaults();
    $default   = $languages['default'];
    $current   = $languages['current'];

    if ( is_array( $value ) && is_array( $languages ) && isset( $value[$current] ) ) {
      return  $value[$current];
    } else if ( $default != $current ) {
      return  '';
    }

    return $value;

  }
}

/**
 *
 * Get customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_get_customize_option' ) ) {
  function gp_get_customize_option( $option_name = '', $default = '' ) {

    $options = apply_filters( 'gp_get_customize_option', get_option( gp_CUSTOMIZE ), $option_name, $default );

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}

/**
 *
 * Set customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_set_customize_option' ) ) {
  function gp_set_customize_option( $option_name = '', $new_value = '' ) {

    $options = apply_filters( 'gp_set_customize_option', get_option( gp_CUSTOMIZE ), $option_name, $new_value );

    if( ! empty( $option_name ) ) {
      $options[$option_name] = $new_value;
      update_option( gp_CUSTOMIZE, $options );
    }

  }
}

/**
 *
 * Get all customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_get_all_customize_option' ) ) {
  function gp_get_all_customize_option() {
    return get_option( gp_CUSTOMIZE );
  }
}

/**
 *
 * WPML plugin is activated
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_is_wpml_activated' ) ) {
  function gp_is_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
  }
}

/**
 *
 * qTranslate plugin is activated
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_is_qtranslate_activated' ) ) {
  function gp_is_qtranslate_activated() {
    if ( function_exists( 'qtrans_getSortedLanguages' ) ) { return true; } else { return false; }
  }
}

/**
 *
 * Polylang plugin is activated
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_is_polylang_activated' ) ) {
  function gp_is_polylang_activated() {
    if ( class_exists( 'Polylang' ) ) { return true; } else { return false; }
  }
}

/**
 *
 * Get language defaults
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_language_defaults' ) ) {
  function gp_language_defaults() {

    $multilang = array();

    if( gp_is_wpml_activated() || gp_is_qtranslate_activated() || gp_is_polylang_activated() ) {

      if( gp_is_wpml_activated() ) {

        global $sitepress;
        $multilang['default']   = $sitepress->get_default_language();
        $multilang['current']   = $sitepress->get_current_language();
        $multilang['languages'] = $sitepress->get_active_languages();

      } else if( gp_is_polylang_activated() ) {

        global $polylang;
        $current    = pll_current_language();
        $default    = pll_default_language();
        $current    = ( empty( $current ) ) ? $default : $current;
        $poly_langs = $polylang->model->get_languages_list();
        $languages  = array();

        foreach ( $poly_langs as $p_lang ) {
          $languages[$p_lang->slug] = $p_lang->slug;
        }

        $multilang['default']   = $default;
        $multilang['current']   = $current;
        $multilang['languages'] = $languages;

      } else if( gp_is_qtranslate_activated() ) {

        global $q_config;
        $multilang['default']   = $q_config['default_language'];
        $multilang['current']   = $q_config['language'];
        $multilang['languages'] = array_flip( qtrans_getSortedLanguages() );

      }

    }

    $multilang = apply_filters( 'gp_language_defaults', $multilang );

    return ( ! empty( $multilang ) ) ? $multilang : false;

  }
}

/**
 *
 * Get locate for load textdomain
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'gp_get_locale' ) ) {
  function gp_get_locale() {

    global $locale, $wp_local_package;

    if ( isset( $locale ) ) {
      return apply_filters( 'locale', $locale );
    }

    if ( isset( $wp_local_package ) ) {
      $locale = $wp_local_package;
    }

    if ( defined( 'WPLANG' ) ) {
      $locale = WPLANG;
    }

    if ( is_multisite() ) {

      if ( defined( 'WP_INSTALLING' ) || ( false === $ms_locale = get_option( 'WPLANG' ) ) ) {
        $ms_locale = get_site_option( 'WPLANG' );
      }

      if ( $ms_locale !== false ) {
        $locale = $ms_locale;
      }

    } else {

      $db_locale = get_option( 'WPLANG' );

      if ( $db_locale !== false ) {
        $locale = $db_locale;
      }

    }

    if ( empty( $locale ) ) {
      $locale = 'en_US';
    }

    return apply_filters( 'locale', $locale );

  }
}

/**
 *
 * Framework load text domain
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
load_textdomain( 'gp-framework', gp_DIR .'/languages/'. gp_get_locale() .'.mo' );
