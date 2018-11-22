<?php
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
function rws_common_metabox_section( $post_type )
{
	$common = array(
        'name'   => 'page_banner_section',
        'title'  => ucwords( $post_type ).' Banner',
        'fields' => array(

            array(
                'id'            => 'banner_image_enable',
                'type'          => 'switcher',
                'title'         => __('Banner Image Enable'),            
            ),
            array(
                'id'              => 'banner_group_1',
                'type'            => 'group',
                'title'           => 'Banner Field',
                'button_title'    => 'Add New Banner Image',
                'accordion_title' => 'Add New Banner Image',
                'dependency'      => array('banner_image_enable', '==','true'),
                'fields'          => array(
                    array(
                        'id'            => 'banner_image',
                        'type'          => 'image',
                        'title'         => 'Image',
                    ),
                    array(
                        'id'            => 'banner_heading_enable',
                        'type'          => 'switcher',
                        'title'         => __('Banner Title Enable'),
                    ),
                    array(
                        'id'            => 'rws_page_title',
                        'type'          => 'text',
                        'title'         => ucwords( $post_type ).' Title',
                        'dependency'    => array('banner_heading_enable', '==', 'true'),
                    ),
                    array(
                        'id'            => 'rws_page_subtitle',
                        'type'          => 'textarea',
                        'title'         => ucwords( $post_type ).' Subtitle',
                        'dependency'    => array('banner_heading_enable', '==', 'true'),
                    ),
                    array(
                        'id'            => 'rws_banner_btn_enable',
                        'type'          => 'switcher',
                        'title'         => 'Banner Button Enable',                  
                    ),
                    array(
                        'id'            => 'rws_banner_btn_label',
                        'type'          => 'text',
                        'title'         => 'Button Label',
                        'dependency'    => array('rws_banner_btn_enable', '==', 'true'),
                    ),
                    array(
                        'id'            => 'rws_banner_btn_url',
                        'type'          => 'text',
                        'title'         => 'Button URL',
                        'dependency'    => array('rws_banner_btn_enable', '==', 'true'),
                    ),
                ),
            ),
        ),
    );
	
	return $common;
}

function rws_common_meta( $post_type )
{
    if($post_type == 'page' || $post_type == 'post') {
        $options = array(
        	'id'        => 'common_heading',
        	'title'     => 'Common '.ucwords( $post_type ).' Options',
        	'post_type' => $post_type,
        	'context'   => 'normal',
        	'priority'  => 'high',
        	'sections'  => array(
              rws_common_metabox_section( $post_type ),
          ),
        );
        // $options['sections'][]  = array(
        //     'id'        => 'rws_page_heading',
        //     'name'      => 'rws_page_heading',
        //     'title'     => ucwords( $post_type ).' Heading Block',
        //     'fields'    => array(
        //         array(
        //             'id'            => 'banner_heading_enable',
        //             'type'          => 'switcher',
        //             'title'         => __('Banner Title Enable'),
        //         ),
        //         array(
        //             'id'            => 'rws_page_title',
        //             'type'          => 'text',
        //             'title'         => ucwords( $post_type ).' Title',
        //             'dependency'    => array('banner_heading_enable', '==', 'true'),
        //         ),
        //         array(
        //             'id'            => 'rws_page_subtitle',
        //             'type'          => 'textarea',
        //             'title'         => ucwords( $post_type ).' Subtitle',
        //             'dependency'    => array('banner_heading_enable', '==', 'true'),
        //         ),
        //     )
        // ); 

        // $options['sections'][]  = array(
        //     'id'        => 'rws_page_banner_heading',
        //     'name'      => 'rws_page_banner_heading',
        //     'title'     => ucwords( $post_type ).' Heading Block Button',
        //     'fields'    => array(
        //         array(
        //             'id'            => 'rws_banner_btn_enable',
        //             'type'          => 'switcher',
        //             'title'         => 'Banner Button Enable',                  
        //         ),
        //         array(
        //             'id'            => 'rws_banner_btn_label',
        //             'type'          => 'text',
        //             'title'         => 'Button Label',
        //             'dependency'    => array('rws_banner_btn_enable', '==', 'true'),
        //         ),
        //         array(
        //             'id'            => 'rws_banner_btn_url',
        //             'type'          => 'text',
        //             'title'         => 'Button URL',
        //             'dependency'    => array('rws_banner_btn_enable', '==', 'true'),
        //         ),

        //     )
        // ); 



    }

    return $options;
}

/**
 *
 * @return array
 */
function rws_metaboxes()
{

    $options[]      = array();
    $options[]      = rws_common_meta ( 'page' );
  //  $options[]      = rws_common_meta ( 'post' );

    //==============  for homepage starts ========================//
    $options[]          = array(
        'id'            => 'rws_homepage_section',
        'title'         => 'Other Content Homepage',
        'post_type'     => 'page',
        'context'       => 'normal',
        'priority'      => 'high',
        'sections'      => array(
         /* homepage AC3's model starts*/
         array(
            'name'      => 'homepage_ac3_models',
            'title'     => 'AC3 Models',
            'fields'    => array(

                array(
                    'id'            => 'rws_ac3_model_enable',
                    'type'          => 'switcher',
                    'title'         => 'AC3 Model Enable',
                ),
                array(
                    'id'            => 'ac3_model_sec_title',
                    'type'          => 'text',
                    'title'         => 'Section Title',
                    'dependency'    => array('rws_ac3_model_enable', '==', 'true'),
                ),
                array(
                    'id'            => 'ac3_model_sec_description',
                    'type'          => 'textarea',
                    'title'         => 'Content Description',
                    'dependency'    => array('rws_ac3_model_enable', '==', 'true'),
                ),
                array(
                  'id'              => 'model_group_1',
                  'type'            => 'group',
                  'title'           => 'Model Field',
                  'button_title'    => 'Add New Model Logo',
                  'accordion_title' => 'Add New Model logo',
                  'dependency'      => array('rws_ac3_model_enable', '==','true'),
                  'fields'          => array(
                    array(
                        'id'            => 'model_image',
                        'type'          => 'image',
                        'title'         => 'Image',
                    ),
                ),
            ),
                array(
                    'id'            => 'model_sub_title',
                    'type'          => 'text',
                    'title'         => 'Model Below Section Title',
                    'dependency'    => array('rws_ac3_model_enable', '==', 'true'),
                ),
                array(
                    'id'            => 'model_sub_description',
                    'type'          => 'textarea',
                    'title'         => 'Model Below Section Description',
                    'dependency'    => array('rws_ac3_model_enable', '==', 'true'),
                ),
            )
        ),
         /* homepage AC3's model ends*/

         /* homepage Platform start*/
         array(
            'name'                  => 'homepage_patform',
            'title'                 => 'Platform Section',
            'fields'                => array(
                array(
                    'id'            => 'rws_platform_enable',
                    'type'          => 'switcher',
                    'title'         => 'Platform Enable',
                ),
                array(
                    'id'            => 'platform_main_title',
                    'type'          => 'text',
                    'title'         => 'Platform Title',                              
                    'dependency'    => array('rws_platform_enable', '==', 'true'),
                ),
                array(
                    'id'            => 'platform_background_image',
                    'type'          => 'image',
                    'title'         => 'Image',
                    'desc'          => 'Add Background Image',
                    'dependency'    => array('rws_platform_enable', '==', 'true'),
                ),                           
                array(
                    'id'                => 'platform_list',
                    'type'              => 'group',
                    'title'             => 'Platform List',
                    'button_title'      => 'Add New Platform Logo',
                    'accordion_title'   => 'Add New Platform Logo',
                    'fields'            => array(
                        array(
                            'id'        => 'platform_title',
                            'type'      => 'text',
                            'title'     => 'Title',
                        ),
                        array(
                            'id'        => 'platform_image',
                            'type'      => 'image',
                            'title'     => 'Image',
                        ),
                        array(
                            'id'        => 'platform_desc',
                            'type'      => 'textarea',
                            'title'     => 'Description',
                        ),
                    ), 
                    'dependency'        => array('rws_platform_enable', '==', 'true'),
                ), // end of page section groups
            )
        ),
         /* homepage Platform ends*/

         /* client testimonial selection section starts*/
         array(
            'name'                  => 'homepage_custom_post_type_selection',
            'title'                 => 'Client Testimonials',
            'fields'                => array(
                array(
                    'id'            => 'rws_post_type_selection_enable',
                    'type'          => 'switcher',
                    'title'         => 'Post Selection Enable',
                ),
                array(
                    'id'            => 'client_testimonial_section_title',
                    'type'          => 'text',
                    'title'         => 'Client Testimonial Title',
                ),
                // array(
                //     'id'            => 'client_testimonial_list_id',
                //     'type'          => 'select',
                //     'title'         => 'Client Testimonial',
                //     'options'       => 'posts',
                //         // query_args is option for all
                //     'query_args'        => array(
                //         'post_type'     => 'client_testimonial',
                //         'sort_order'    => 'ASC',
                //         'sort_column'   => 'post_title',
                //     ),
                //     'dependency'        => array('rws_post_type_selection_enable', '==', 'true'),
                // ),
            ),
        ),
         /* client testimonila selection section ends*/

    ),//end section
);


return $options;
}

add_action('cs_metabox_options', 'rws_metaboxes');