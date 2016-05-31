<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Text
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class GPFramework_Option_text extends GPFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){

	$name = $this->element_name();
	$repeater = (isset($this->field['repeater']) && $this->field['repeater']==true);
	$class = $this->element_class();
	$class = str_replace('="', '="'.($repeater?'repeater-field':''), $class);
	$name .= ($repeater?'[]':'');
    echo $this->element_before();
    echo '<input '.($repeater?'data-repeater="yes"':'').' type="'. $this->element_type() .'" name="'. $name .'" value="'. $this->element_value() .'"'. $class . $this->element_attributes() .'/>';
    echo $this->element_after();

  }

}