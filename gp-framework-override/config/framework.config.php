<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$gp_info = gp_info();
$settings      = array(
  'menu_title' => gp_humanize($gp_info['name']),
  'menu_type'  => 'add_menu_page',
  'menu_slug'  => 'guava-pattern',
  'ajax_save'  => false,
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();
if(isset($_GET['reset_gp']) && is_admin()){
	delete_option('_gp_core_arr');
	delete_option('_gp_core_groups');
}

$_gp_core_arr_db = get_option('_gp_core_arr');//array();//get_option('_gp_core_arr');
$_gp_core_groups_db = get_option('_gp_core_groups');
pre($_gp_core_arr_db);
pre($_gp_core_groups_db);

if(!empty($_gp_core_groups_db)){
	$o = 0;
	foreach($_gp_core_groups_db as $group=>$fields){
		
		if(!empty($fields)){
			//pree($group);
			//pree($fields);
			$options[$o]      = array(
			  'name'        => 'group_'.$group,
			  'title'       => gp_capital($group),
			  'icon'        => 'fa fa-object-ungroup',
			);  	
			
			$options[$o]['fields'] =  array();
			foreach($fields as $field){
				//$key = current($key);
				if(!empty($_gp_core_arr_db)){
					foreach($_gp_core_arr_db as $type=>$keys){
						if(in_array($field, $keys)){
							$key = array_search($field, $keys);
							$val = $keys[$key];
							$field_data = array(
								  'id'      => $val,
								  'type'    => $type,
								  'title'   => gp_capital($val),
								  'default' => '',
							);
							$args = gp_args($val);
							
							if(isset($args['options'])){
								$field_data['options'] = $args['options'];
								$field_data['default_option'] = 'Select';
							}
							$options[$o]['fields'][] = $field_data;
						}
					}
				}
			}
			$o++;
		}
	}
	
}

//pree($options);
pre($options);
// ----------------------------------------
// a option section for options overview  -
// ----------------------------------------
//https://fortawesome.github.io/Font-Awesome/icons/

 
 

GPFramework::instance( $settings, $options );
