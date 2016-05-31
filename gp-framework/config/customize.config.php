<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// CUSTOMIZE SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options              = array();

// -----------------------------------------
// Customize Core Fields                   -
// -----------------------------------------
$options[]            = array(
  'name'              => 'wp_core_fields',
  'title'             => 'WP Core Fields',
  'settings'          => array(

    // color
    array(
      'name'          => 'color_option_with_default',
      'default'       => '#d80039',
      'control'       => array(
        'label'       => 'Color',
        'type'        => 'color',
      ),
    ),

    // text
    array(
      'name'          => 'text_option',
      'control'       => array(
        'label'       => 'Text',
        'type'        => 'text',
      ),
    ),

    // text with default
    array(
      'name'          => 'text_option_with_default',
      'default'       => 'bla bla bla',
      'control'       => array(
        'label'       => 'Text with Default',
        'type'        => 'text',
      ),
    ),

    // textarea
    array(
      'name'          => 'textarea_option',
      'control'       => array(
        'label'       => 'Textarea',
        'type'        => 'textarea',
      ),
    ),

    // checkbox
    array(
      'name'          => 'checkbox_option',
      'control'       => array(
        'label'       => 'Checkbox',
        'type'        => 'checkbox',
      ),
    ),

    // radio
    array(
      'name'          => 'radio_option',
      'control'       => array(
        'label'       => 'Radio',
        'type'        => 'radio',
        'choices'     => array(
          'key1'      => 'value 1',
          'key2'      => 'value 2',
          'key3'      => 'value 3',
        )
      ),
    ),

    // select
    array(
      'name'          => 'select_option',
      'control'       => array(
        'label'       => 'Select',
        'type'        => 'select',
        'choices'     => array(
          ''          => '- Select a value -',
          'key1'      => 'value 1',
          'key2'      => 'value 2',
          'key3'      => 'value 3',
        )
      ),
    ),

    // dropdown-pages
    array(
      'name'          => 'dropdown_pages_option',
      'control'       => array(
        'label'       => 'Dropdown-Pages',
        'type'        => 'dropdown-pages',
      ),
    ),

    // upload
    array(
      'name'          => 'upload_option',
      'control'       => array(
        'label'       => 'Upload',
        'type'        => 'upload',
      ),
    ),

    // image
    array(
      'name'          => 'image_option',
      'control'       => array(
        'label'       => 'Image',
        'type'        => 'image',
      ),
    ),

    // media
    array(
      'name'          => 'media_option',
      'control'       => array(
        'label'       => 'Media',
        'type'        => 'media',
      ),
    ),

  )
);

// -----------------------------------------
// Customize Codestar Fields               -
// -----------------------------------------
$options[]            = array(
  'name'              => 'gp_fields',
  'title'             => 'Codestar Framework Fields',
  'settings'          => array(

    // gp color picker
    array(
      'name'          => 'gp_color_picker',
      'default'       => '#3498db',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'color_picker',
          'title'     => 'Color Picker Field',
        ),
      ),
    ),

    // gp text
    array(
      'name'          => 'gp_text',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'text',
          'desc'      => 'Codestar Switcher Field',
          'title'     => 'Text Field',
        ),
      ),
    ),

    // gp textarea
    array(
      'name'          => 'gp_textarea',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'textarea',
          'title'     => 'Text Area',
        ),
      ),
    ),

    // gp switcher
    array(
      'name'          => 'gp_switcher',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'switcher',
          'title'     => 'Codestar Switcher Field',
          'label'     => 'Do you want to ?',
          'help'      => 'Lorem Ipsum Dollar',
        ),
      ),
    ),

    // gp upload
    array(
      'name'          => 'gp_upload',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'upload',
          'title'     => 'Codestar Upload Field',
        ),
      ),
    ),

    // gp image
    array(
      'name'          => 'gp_image',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'image',
          'title'     => 'Codestar Image Field',
        ),
      ),
    ),

    // gp gallery
    array(
      'name'          => 'gp_gallery',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'gallery',
          'title'     => 'Codestar Gallery Field',
        ),
      ),
    ),

    // gp icon
    array(
      'name'          => 'gp_icon',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'icon',
          'title'     => 'Codestar Icon Field',
        ),
      ),
    ),

    // gp image select
    array(
      'name'          => 'gp_image_select',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'image_select',
          'title'     => 'Codestar Image Select Field',
          'options'   => array(
            'value-1' => 'http://guavapattern.com/assets/images/placeholder/65x65-2ecc71.gif',
            'value-2' => 'http://guavapattern.com/assets/images/placeholder/65x65-e74c3c.gif',
            'value-3' => 'http://guavapattern.com/assets/images/placeholder/65x65-3498db.gif',
          ),
          'radio'     => true,
        ),
      ),
    ),

    // gp heading
    array(
      'name'          => 'gp_heading',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'heading',
          'content'   => 'Codestar Heading',
        ),
      ),
    ),

    // gp subheading
    array(
      'name'          => 'gp_subheading',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'subheading',
          'content'   => 'Codestar Sub-Heading',
        ),
      ),
    ),

    // gp notice:success
    array(
      'name'          => 'gp_notice_success',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'notice',
          'class'     => 'success',
          'content'   => 'Notice Success: Lorem Ipsum...',
        ),
      ),
    ),

    // gp notice:info
    array(
      'name'          => 'gp_notice_info',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'notice',
          'class'     => 'info',
          'content'   => 'Notice Info: Lorem Ipsum...',
        ),
      ),
    ),

    // gp notice:danger
    array(
      'name'          => 'gp_notice_danger',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'notice',
          'class'     => 'danger',
          'content'   => 'Notice Danger: Lorem Ipsum...',
        ),
      ),
    ),

    // gp content
    array(
      'name'          => 'gp_content',
      'control'       => array(
        'type'        => 'gp_field',
        'options'     => array(
          'type'      => 'content',
          'content'   => 'Simple Content Field...',
        ),
      ),
    ),

  )
);

// -----------------------------------------
// Customize Panel Options Fields          -
// -----------------------------------------
$options[]            = array(
  'name'              => 'gp_panel_1',
  'title'             => 'Codestar Framework Panel',
  'description'       => 'Codestar customize panel description.',
  'sections'          => array(

    // begin: section
    array(
      'name'          => 'section_1',
      'title'         => 'Section 1',
      'settings'      => array(

        array(
          'name'      => 'color_option_1',
          'default'   => '#ffbc00',
          'control'   => array(
            'type'    => 'gp_field',
            'options' => array(
              'type'  => 'color_picker',
              'title' => 'Color Option 1',
            ),
          ),
        ),

        array(
          'name'      => 'color_option_2',
          'default'   => '#2ecc71',
          'control'   => array(
            'type'    => 'gp_field',
            'options' => array(
              'type'  => 'color_picker',
              'title' => 'Color Option 2',
            ),
          ),
        ),

        array(
          'name'      => 'color_option_3',
          'default'   => '#e74c3c',
          'control'   => array(
            'type'    => 'gp_field',
            'options' => array(
              'type'  => 'color_picker',
              'title' => 'Color Option 3',
            ),
          ),
        ),

        array(
          'name'      => 'color_option_4',
          'default'   => '#3498db',
          'control'   => array(
            'type'    => 'gp_field',
            'options' => array(
              'type'  => 'color_picker',
              'title' => 'Color Option 4',
            ),
          ),
        ),

        array(
          'name'      => 'color_option_5',
          'default'   => '#555555',
          'control'   => array(
            'type'    => 'gp_field',
            'options' => array(
              'type'  => 'color_picker',
              'title' => 'Color Option 5',
            ),
          ),
        ),

      ),
    ),
    // end: section

    // begin: section
    array(
      'name'          => 'section_2',
      'title'         => 'Section 2',
      'settings'      => array(

        array(
          'name'      => 'text_option_1',
          'control'   => array(
            'type'    => 'gp_field',
            'options' => array(
              'type'  => 'text',
              'title' => 'Text Option 1',
            ),
          ),
        ),

        array(
          'name'      => 'text_option_2',
          'control'   => array(
            'type'    => 'gp_field',
            'options' => array(
              'type'  => 'text',
              'title' => 'Text Option 2',
            ),
          ),
        ),

        array(
          'name'      => 'text_option_3',
          'control'   => array(
            'type'    => 'gp_field',
            'options' => array(
              'type'  => 'text',
              'title' => 'Text Option 3',
            ),
          ),
        ),

      ),
    ),
    // end: section

  ),
  // end: sections

);

GPFramework_Customize::instance( $options );
