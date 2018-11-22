<?php
if ( ! defined('ABSPATH')) {die;}
// Cannot access pages directly.

/**
 * initializing the theme options array
 * @return array
 */
function rws_framework_options()
{
// ==================================================================================
// FRAMEWORK SETTINGS
// ==================================================================================

    $settings           = array(
        'menu_title'      => 'Theme Options',
        //'menu_type'       => 'add_theme_page', old version of codestar
        'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
        'menu_slug'       => 'rws-framework',
        'ajax_save'       => true,
        'show_reset_all'  => false,
        'framework_title' => 'PC Framework <small>by Priemer Consulting</small>',
    );
// ===================================================================================
// FRAMEWORK OPTIONS
// ===================================================================================
    $options = array();

    // ------------------------------
    // a option section with tabs   -
    // ------------------------------
    $options[]      = array(
      'name'        => 'general-options',
      'title'       => 'General',
      'icon'        => 'fa fa-cog',

      // begin: fields
      'fields'      => array(
        array(
            'id'        => 'notice',
            'type'      => 'subheading',
            'content'   => __( 'General Theme Options', 'rws-aep'),

        ),

        array(
            'type'      => 'notice',
            'class'     => 'info',
            'content'   => __( 'Goto Appearance > Customize > Site Identity > Logo for site logo and Site Icon to add the Favicon.' ),

        ),

        array(
          'id'         => 'site_copyright',
          'type'       => 'textarea',
          'title'      => 'Copyright',
          'attributes' => array(
            'style'    => 'width: 100%;'
          ),
          'sanitize'   => 'html',
        ),

      ), // end: fields
    );

    // $options[]   = array(
    //       'name'      => 'top_header_menu',
    //       'title'     => 'Top Header Menu',
    //       'icon'      => 'fa fa-align-justify',
    //       // begin: fields
    //       'fields'    => array(
    //             array(
    //                 'type'      => 'notice',
    //                 'class'     => 'info',
    //                 'content'   => 'Header Top Menu with Icon.',
    //             ),
    //             array(
    //                 'id'                => 'top_header_menu_list',
    //                 'type'              => 'group',
    //                 'title'             => 'Add Menu',
    //                 'button_title'      => 'Add New',
    //                 'accordion_title'   => 'Add New',
    //                 'fields'            => array(
    //                     array(
    //                         'id'    => 'top_header_menu_list_title',
    //                         'type'  => 'text',
    //                         'title' => 'Link Label',
    //                         ),
    //                     array(
    //                         'id'    => 'top_header_menu_list_link',
    //                         'type'  => 'text',
    //                         'title' => 'Link URL',
    //                         ),
    //                     ), 
    //                 ), // end about page management groups 
    
    //       ), // end: fields
    //     ); // end: text options

    // $options[]      = array(
    //   'name'        => 'call-to-section',
    //   'title'       => 'Call To Action',
    //   'icon'        => 'fa fa-cog',

    //   // begin: fields
    //   'fields'      => array(
    //     array(
    //         'type'      => 'notice',
    //         'class'     => 'info',
    //         'content'   => __( 'Call to Action Section.' ),

    //     ),
      
    //     // array(
    //     //     'id'        => 'cta_section_title',
    //     //     'type'      => 'text',
    //     //     'title'     => 'Section Title',
    //     //     ),    

    //   ), // end: fields
    // );

    return $options;
}

add_action('cs_framework_options', 'rws_framework_options');