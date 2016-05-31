<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
if(!is_admin())
return;

//pree(get_option('_gp_repeater_groups'));
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();
/*
// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_options',
  'title'     => 'Custom Page Options',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    // begin: a section
    array(
      'name'  => 'section_1',
      'title' => 'Section 1',
      'icon'  => 'fa fa-cog',

      // begin: fields
      'fields' => array(

        // begin: a field
        array(
          'id'    => 'section_1_text',
          'type'  => 'text',
          'title' => 'Text Field',
        ),
        // end: a field

        array(
          'id'    => 'section_1_textarea',
          'type'  => 'textarea',
          'title' => 'Textarea Field',
        ),

        array(
          'id'    => 'section_1_upload',
          'type'  => 'upload',
          'title' => 'Upload Field',
        ),

        array(
          'id'    => 'section_1_switcher',
          'type'  => 'switcher',
          'title' => 'Switcher Field',
          'label' => 'Yes, Please do it.',
        ),

      ), // end: fields
    ), // end: a section

    // begin: a section
    array(
      'name'  => 'section_2',
      'title' => 'Section 2',
      'icon'  => 'fa fa-tint',
      'fields' => array(

        array(
          'id'      => 'section_2_color_picker_1',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 1',
          'default' => '#2ecc71',
        ),

        array(
          'id'      => 'section_2_color_picker_2',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 2',
          'default' => '#3498db',
        ),

        array(
          'id'      => 'section_2_color_picker_3',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 3',
          'default' => '#9b59b6',
        ),

        array(
          'id'      => 'section_2_color_picker_4',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 4',
          'default' => '#34495e',
        ),

        array(
          'id'      => 'section_2_color_picker_5',
          'type'    => 'color_picker',
          'title'   => 'Color Picker 5',
          'default' => '#e67e22',
        ),

      ),
    ),
    // end: a section

  ),
);

// -----------------------------------------
// Page Side Metabox Options               -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_side_options',
  'title'     => 'Custom Page Side Options',
  'post_type' => 'page',
  'context'   => 'side',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_3',
      'fields' => array(

        array(
          'id'        => 'section_3_image_select',
          'type'      => 'image_select',
          'options'   => array(
            'value-1' => 'http://guavapattern.com/assets/images/placeholder/65x65-2ecc71.gif',
            'value-2' => 'http://guavapattern.com/assets/images/placeholder/65x65-e74c3c.gif',
            'value-3' => 'http://guavapattern.com/assets/images/placeholder/65x65-3498db.gif',
          ),
          'default'   => 'value-2',
        ),

        array(
          'id'            => 'section_3_text',
          'type'          => 'text',
          'attributes'    => array(
            'placeholder' => 'do stuff'
          )
        ),

        array(
          'id'      => 'section_3_switcher',
          'type'    => 'switcher',
          'label'   => 'Are you sure ?',
          'default' => true
        ),

      ),
    ),

  ),
);
*/
// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'gp_meta',
  'title'     => 'GP Pages',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(


    array(
      'name'   => 'section_1',
      'fields' => array(
	  
        array(
          'id'    => 'podcat_caption',
          'type'  => 'text',
          'title' => 'Podcast Caption',
        ),
        array(
          'id'    => 'podcat_file',
          'type'  => 'upload',
          'title' => 'Podcast File',
        ),
        array(
          'id'    => 'podcat_length',
          'type'  => 'text',
          'title' => 'Podcast File Length',
        ),

      ),
    ),

  ),
);

//pree($options);

$options = array();

$type = 'page';
$options[]    = array(
  'id'        => 'gp_meta',
  'title'     => 'GP Pages',
  'post_type' => $type,
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array()
);
if(isset($_GET['reset_gp_pages']) && is_admin()){
	delete_option('_gp_page_arr');
	delete_option('_gp_page_groups');
	delete_option('_gp_repeater_groups');
}

$_gp_page_arr_db = get_option('_gp_page_arr');//array();//get_option('_gp_page_arr');
$_gp_page_groups_db = get_option('_gp_page_groups');
$_gp_repeater_groups_db = get_option('_gp_repeater_groups');

//pree($_gp_repeater_groups_db);exit;
//pree($_gp_page_arr_db);exit;
//pree($_gp_page_groups_db);exit;
$_gp_repeater_page = isset($_gp_repeater_groups_db[$type])?$_gp_repeater_groups_db[$type]:array();
//pree($_gp_repeater_page);
//pree($_gp_repeater_groups_db);exit;
if(!empty($_gp_page_groups_db)){
	$o = 0;
	$keys = array();
	foreach($_gp_page_groups_db as $group=>$fields){
		
		
		if(!empty($fields)){
			//pree($group);
			//pree($fields);
			//pree($_gp_repeater_page);
			$is_repeater = in_array($group, $_gp_repeater_page);
			//pree($is_repeater);
			$options[0]['sections'][$o]      = array(
			  'name'        => 'group_'.$group,
			  'title'       => gp_capital($group),
			  'icon'        => 'fa fa-'.($is_repeater?'repeat':'circle-thin'),
			);  	
			
			$options[0]['sections'][$o]['class'] = ($is_repeater?'repeater':'');
			$options[0]['sections'][$o]['fields'] =  array();
			//pree($fields);
			$f=0;
			foreach($fields as $field){
				
				//$key = current($key);
				//pree($group);
				//pree($field);
				if(!empty($_gp_page_arr_db)){
					//pree($group);
					//pree($_gp_page_arr_db);

					foreach($_gp_page_arr_db as $type=>$keyz){
						if(!array_key_exists($type, $keys)){
							$keys[$type] = array();
						}
						//pree($type);pree($keyz);
						
						//pree($keyz);
						foreach($keyz as $keyz2){
							$keyz = $keyz2;
							$repeater = false;	
							//pree($keyz);
							if(is_array($keyz)){
								
								if(!in_array($keyz['key'], $keys[$type]))
								$keys[$type][] = $keyz['key'];
								
								$repeater = $keyz['repeater'];
								
							}else{
								
								if(!in_array($keyz, $keys[$type]))
								$keys[$type][] = $keyz;
								
							}
							
						}
						

						
						
						//pree($type);pree($field);pree($keyz);//exit;
						//pree($field);pree($keys);
						if(in_array($field, $keys[$type])){
							//pree($field);
							$key = array_search($field, $keys[$type]);
							//pree($key);
							$val = $keys[$type][$key];
							//pree($val);
							$options[0]['sections'][$o]['fields'][$f] = array(
								  'id'      => $val,
								  'type'    => $type,
								  'title'   => gp_capital($val),
								  'default' => '',
								  'repeater' => $repeater
							);
							//pree($options);
						}
						$f++;
					}
				}
				
			}
			
		}
		$o++;
	}
	
}
//pree($options);exit;

//pre($options);

GPFramework_Metabox::instance( $options );