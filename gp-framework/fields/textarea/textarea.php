<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Textarea
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class GPFramework_Option_textarea extends GPFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

	$name = $this->element_name();
	$repeater = (isset($this->field['repeater']) && $this->field['repeater']==true);
	$name .= ($repeater?'[]':'');
	$class = $this->element_class();
	$class = str_replace('="', '="'.($repeater?'repeater-field':''), $class);
    echo $this->element_before();
    echo $this->shortcode_generator();
    echo '<textarea '.($repeater?'data-repeater="true"':'').' name="'. $name .'"'. $class . $this->element_attributes() .'>'. $this->element_value() .'</textarea>';
    echo $this->element_after();
	
  }

  public function shortcode_generator() {
    if( isset( $this->field['shortcode'] ) && gp_ACTIVE_SHORTCODE ) {
      echo '<a href="#" class="button button-primary gp-shortcode gp-shortcode-textarea">'. __( 'Add Shortcode', 'gp-framework' ) .'</a>';
    }
  }
}
