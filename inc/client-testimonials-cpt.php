<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function rws_client_testimonials_posttype() {

    $labels = array(
        'name'                => __( 'Client Testimonials', 'rws-aep' ),
        'singular_name'       => __( 'Client Testimonials', 'rws-aep' ),
        'add_new'             => _x( 'Add New Client Testimonials', 'rws-aep', 'rws-aep' ),
        'add_new_item'        => __( 'Add New Client Testimonials', 'rws-aep' ),
        'edit_item'           => __( 'Edit Client Testimonials', 'rws-aep' ),
        'new_item'            => __( 'New Client Testimonials', 'rws-aep' ),
        'view_item'           => __( 'View Client Testimonials', 'rws-aep' ),
        'search_items'        => __( 'Search Client Testimonials', 'rws-aep' ),
        'not_found'           => __( 'No Client Testimonials found', 'rws-aep' ),
        'not_found_in_trash'  => __( 'No Client Testimonials found in Trash', 'rws-aep' ),
        'parent_item_colon'   => __( 'Parent Client Testimonials:', 'rws-aep' ),
        'menu_name'           => __( 'Client Testimonials', 'rws-aep' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'Custom Post Type Created for Client Testimonials',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-id',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => false, //set false to remove View btn
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'post-formats')
    );

    register_post_type( 'client_testimonial', $args );
}

add_action( 'init', 'rws_client_testimonials_posttype' );


add_filter('manage_client_testimonial_posts_columns', 'rws_head_only_client_testimonial');
add_action('manage_client_testimonial_posts_custom_column', 'rws_content_only_client_testimonial', 10, 2);
 
//adding column in the listing of the our mentors
function rws_head_only_client_testimonial($defaults) {
    $defaults['featured_image'] = 'client Image';
    return $defaults;
}
function rws_content_only_client_testimonial($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_thumbnail_id = get_post_thumbnail_id($post_ID);
        if ($post_thumbnail_id) {
            $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
            echo "<img src='".$post_thumbnail_img[0]."' width='80'/>";
        }
    }
}
// set metaboxes
function rws_client_testimonial_metabox_options( $options ) {
    $options[]    = array(
        'id'        => 'client_testimonial_id',
        'title'     => 'Client Testimonials Others Details',
        'post_type' => 'client_testimonial',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'  => 'general',
                //'title' => 'General',
                //'icon'  => 'fa fa-cog',
                'fields' => array(
                    array(
                        'id'        => 'client_name',
                        'type'      => 'text',
                        'title'     => 'Client Name',
                        'add_title' => 'Client Name',
                    ),
                    array(
                        'id'        => 'client_designation',
                        'type'      => 'text',
                        'title'     => 'Client  Designation',
                        'add_title' => 'Client Designation',
                    ),                    
                    array(
                        'id'            => 'client_image',
                        'type'          => 'image',
                        'title'         => 'Image',
                        'add_title'     => 'Client Thumbnail Image',
                    ),
                ), // END fields
            ), // END section
        ), // END sections
    ); // END $options
    return $options;
}
add_filter( 'cs_metabox_options', 'rws_client_testimonial_metabox_options' );