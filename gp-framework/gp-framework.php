<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * ------------------------------------------------------------------------------------------------
 *
 * Codestar Framework
 * A Lightweight and easy-to-use WordPress Options Framework
 *
 * Plugin Name: Codestar Framework
 * Plugin URI: http://guavapattern.com/
 * Author: Codestar
 * Author URI: http://guavapattern.com/
 * Version: 1.0.0
 * Description: A Lightweight and easy-to-use WordPress Options Framework
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: gp-framework
 *
 * ------------------------------------------------------------------------------------------------
 *
 * Copyright 2016 Codestar <info@guavapattern.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * ------------------------------------------------------------------------------------------------
 *
 */

// ------------------------------------------------------------------------------------------------
require_once plugin_dir_path( __FILE__ ) .'/gp-framework-path.php';
// ------------------------------------------------------------------------------------------------

if( ! function_exists( 'gp_framework_init' ) && ! class_exists( 'GPFramework' ) ) {
  function gp_framework_init() {

    // active modules
    defined( 'gp_ACTIVE_FRAMEWORK' )  or  define( 'gp_ACTIVE_FRAMEWORK',  true );
    defined( 'gp_ACTIVE_METABOX'   )  or  define( 'gp_ACTIVE_METABOX',    true );
    defined( 'gp_ACTIVE_SHORTCODE' )  or  define( 'gp_ACTIVE_SHORTCODE',  true );
    defined( 'gp_ACTIVE_CUSTOMIZE' )  or  define( 'gp_ACTIVE_CUSTOMIZE',  true );

    // helpers
    gp_locate_template( 'functions/deprecated.php'     );
    gp_locate_template( 'functions/helpers.php'        );
    gp_locate_template( 'functions/actions.php'        );
    gp_locate_template( 'functions/enqueue.php'        );
    gp_locate_template( 'functions/sanitize.php'       );
    gp_locate_template( 'functions/validate.php'       );

    // classes
    gp_locate_template( 'classes/abstract.class.php'   );
    gp_locate_template( 'classes/options.class.php'    );
    gp_locate_template( 'classes/framework.class.php'  );
    gp_locate_template( 'classes/metabox.class.php'    );
    gp_locate_template( 'classes/shortcode.class.php'  );
    gp_locate_template( 'classes/customize.class.php'  );

    // configs
    gp_locate_template( 'config/framework.config.php'  );
    gp_locate_template( 'config/metabox.config.php'    );
    gp_locate_template( 'config/shortcode.config.php'  );
    gp_locate_template( 'config/customize.config.php'  );

  }
  add_action( 'init', 'gp_framework_init', 10 );
}
