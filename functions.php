<?php
/* rws theme supports */
if(!function_exists( 'rws_theme_supports' ) ):

	function rws_theme_supports(){
		// for rss feeds in header
		add_theme_support( 'automatic-feed-links' );
		//generates the title tag
		add_theme_support( 'title-tag' );
		// support for the post thumbnails for posts and pages
		add_theme_support( 'post-thumbnails' );
		// menu for theme
		add_theme_support('menus');

		add_theme_support( 'custom-logo' );

		//registering the menus for the theme
		register_nav_menus( array(
			'primary' 			=> __( 'Primary Menu' ),
			'footer-links' 		=> __( 'Footer Links' ),
			) );

		/*=======================================
		=            thumbnail sizes            =
		=======================================*/
		add_image_size( 'investor-slides', 266, 97, true );
		add_image_size( 'our-culture', 425, 330, true );
		add_image_size( 'current-class', 310, 315, true );
		add_image_size( 'client-class', 425, 425, true );
		//add_image_size( 'ac3-banner-slider', 1349, 678, true );
		/* add_image_size( 'about-what-is-artisthub', 58, 57, true );
		add_image_size( 'learn-more-legendary-events', 140, 112, true );*/

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/* Global option for codestar */
		global $rws_options;
		// get all values from theme options
		$rws_options 	= cs_get_all_option();
		/* End of Global option */

	}
add_action( 'after_setup_theme','rws_theme_supports' );
endif;
/* End of rws theme supports */


/**
 * Enqueue styles and scripts
 * @return void
 */
function rws_enqueue_scripts(){
	global $rws_options;

	//adding google fonts
	$query_args = array(
		'family' => 'Quicksand:400,500,700|Lora:400i,700i',
		);
	wp_register_style( 'rws-google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array() , null );

	//enqueing styles
    wp_enqueue_style( 'font-awesome.min', get_template_directory_uri().'/css/font-awesome.min.css',array(), '4.4.0', 'all' );
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri().'/css/owl.carousel.css',array(), '2.2.1', 'all' );
    wp_enqueue_style( 'owl.theme', get_template_directory_uri().'/css/owl.theme.css',array(), '2.2.1', 'all' );
    wp_enqueue_style( 'meanmenu', get_template_directory_uri().'/css/meanmenu.css',array(), '2.0.7', 'all' );

	wp_enqueue_style( 'rws-style', get_stylesheet_uri(), array('rws-google_fonts'), '1.0.0', 'all' );

 //    wp_enqueue_style( 'responsive.css', get_template_directory_uri().'/css/responsive.css',array(), '1.0.0', 'all' );


	//enqueing scripts
	
    wp_enqueue_script( 'owl.carousel.js', get_template_directory_uri().'/js/owl.carousel.js', array( 'jquery' ), '2.2.1', true );
    wp_enqueue_script( 'stellar.js', get_template_directory_uri().'/js/stellar.js', array( 'jquery' ), '2.2.1', true );
	wp_enqueue_script( 'meanmenu.js', get_template_directory_uri().'/js/jquery.meanmenu.js', array( 'jquery' ), '2.0.8', true );

	wp_enqueue_script( 'rws-custom-js', get_template_directory_uri().'/js/custom.js', array( 'jquery'), '1.0.0', true );
	//wp_enqueue_script( 'rws-custom-js', get_template_directory_uri().'/js/custom.js', array( 'jquery', 'custom-js' ), '1.0.0', true );
	// wp_enqueue_script( 'bootstrap.min.js', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
	
	//wp_enqueue_script( 'jquery-ui.js', '//code.jquery.com/ui/1.11.4/jquery-ui.js', array( 'jquery' ), '1.0.0', true );
	// wp_enqueue_script( 'rws-custom-js', get_template_directory_uri().'/js/custom.js', array( 'jquery', 'owl.carousel.js' ), '1.0.0', true );

	$site_title_bg_color 	= $rws_options['site_title_bg_color'];
	$site_title_text_color 	= $rws_options['site_title_text_color'];
	if ( !empty( $site_title_bg_color ) || !empty( $site_title_text_color ) ) {
		$custom_css = '.heading .entry-title,
		.highlight-title {
			background: '.$site_title_bg_color.';
			color: '.$site_title_text_color.';
		}';
	}
	wp_add_inline_style( 'rws-style-css', $custom_css );


}
add_action('wp_enqueue_scripts','rws_enqueue_scripts');
/* End of Enqueue styles and scripts */

//admin area scripts
function rws_admin_custom_scripts() {
	wp_enqueue_script( 'metaboxs-switch', get_template_directory_uri() . '/js/metaswitch.js', '', '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'rws_admin_custom_scripts' );

function rws_artisthub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rws_artisthub_content_width', 640 );
}
add_action( 'after_setup_theme', 'rws_artisthub_content_width', 0 );

/**
 * Register Widget
 */
add_action( 'widgets_init', 'rws_register_sidebars' );
function rws_register_sidebars() {
	//widget support for a footer
	for ($i=1; $i < 5; $i++) {
		register_sidebar(array(
			'name' => 'Footer Widget '.$i,
			'id' => 'footer-widget-'.$i,
			'description' => 'Widgets in this area will be shown on the Footer.',
		  	'before_widget' => '<aside id="%1$s" class="widget">',
		  	'after_widget'  => '</aside>',
		  	'before_title' => '<h2 class="widget-title">',
		  	'after_title' => '</h2>'
		));
	}
	//widget support for a right sidebar
	/*register_sidebar(array(
		'name' => 'Right SideBar',
	  	'id' => 'right-sidebar',
	  	'description' => 'Widgets in this area will be shown on the right-hand side.',
	  	'before_widget' => '<div id="%1$s" class="widget">',
	  	'after_widget'  => '<div class="clear"></div></div>',
	  	'before_title' => '<h3 class="widget-title column-title">',
	  	'after_title' => '</h3>'
	));*/
}

/* Other Dependencies */
require_once(get_template_directory().'/inc/init.php');

/* End of Other Dependencies */


function addNotificationMessage($message, $code=400){
	$_SESSION['error'][] = array($message, $code);
}

function getNotificationMessages($remove = true){
	$temp = $_SESSION['error'];
	if($remove){
		$_SESSION['error'] = array();
	}
	return $temp;
}

//for pagination
function rws_custom_pagination( $wp_query ){
    //global $wp_query;
    $pagination_posts = paginate_links (array('base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
            'total'         => $wp_query->max_num_pages,
            'mid_size'      => 2,
            'type'          => 'array',
            'prev_text'     => 'Previous',
            'next_text'     =>'Next'
    ) );
    if ( ! empty( $pagination_posts ) ) { ?>
        <div class="rws-pagination-holder">
            <ul class="pagination">
                <?php foreach ( $pagination_posts as  $key => $page_link ) { ?>
                    <li class="<?php if ( strpos( $page_link, 'current' ) !== false ) { echo 'active'; } ?>"><?php echo $page_link ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php }
}

//for pagination
function rws_ajax_pagination( $wp_query ){

	$current_url = $_POST['current_url'];

	$term_id = $wp_query->query['tax_query'][0]['terms'];
	/*$taxonomy = $wp_query->query['tax_query'][0]['taxonomy'];
	$term = get_term($term_id, $taxonomy);
	$term_link = get_term_link($term);*/

	$pattern = "/(?<=href=(\"|'))[^\"']+(?=(\"|'))/";

   //global $wp_query;
    $pagination_posts = paginate_links (array('base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
            'total'         => $wp_query->max_num_pages,
            'mid_size'      => 2,
            'type'          => 'array',
            'prev_text'     => 'Previous',
            'next_text'     =>'Next'
    ) );
    if ( ! empty( $pagination_posts ) ) { ?>
        <div class="rws-pagination-holder">
            <ul class="pagination">
                <?php foreach ( $pagination_posts as  $key => $page_link ) { ?>
                	<?php

                	$page_data = (array)new SimpleXMLElement($page_link);
                	$page_url='';
					if(isset($page_data['@attributes']['href'])){
						$page_url = $page_data['@attributes']['href'];
					}

					$query = array();
					if($page_url){
						$parts = parse_url($page_url);
						parse_str($parts['query'], $query);
					}

					if(isset($query['paged']) ){
						if($term_id){
							$pagination_url = $current_url.'page/'.$query['paged'].'/?class='.$term_id;
						}else{
							$pagination_url = $current_url.'page/'.$query['paged'];
						}
					}else{
						if($term_id){
							$pagination_url = $current_url.'?class='.$term_id;
						}else{
							$pagination_url = $current_url;
						}
					}

					if($page_url){
                		$page_link = preg_replace($pattern, $pagination_url, $page_link);
                	}
                	              	
                	?>
                    <li class="<?php if ( strpos( $page_link, 'current' ) !== false ) { echo 'active'; } ?>"><?php echo $page_link ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php }
}

/* addition for alumni filter */
function rws_alumni_filter_function(){
	$alumni_arg = array(
		'post_type'   	=> 'alumni',
		'post_status' 	=> 'publish',
		'orderby' 		=> 'date', // we will sort posts by date
	);

	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) && $_POST['categoryfilter'] != false && $_POST['categoryfilter'] ){
		$alumni_arg['tax_query'] = array(
			array(
				'taxonomy' 	=> 'alumni_class',
				'field' 	=> 'id',
				'terms' 	=> $_POST['categoryfilter']
			)
		);
 	}

	$alumni_query = new WP_Query( $alumni_arg );

	if( $alumni_query->have_posts() ) :
		echo '<div class="member-item-wrapper">';
		while( $alumni_query->have_posts() ){
			$alumni_query->the_post();
	        $alumni_meta    = get_post_meta( get_the_id (), 'alumni_meta', true );
	        $alumni_school  = $alumni_meta['alumni_school'];
	        global $post;
			?>
			<div class="member-item">
				
				<?php if( get_the_post_thumbnail_url( get_the_ID(), 'current-class' ) ){ ?>
					<figure class='featured-image'>
			        	<!-- <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'current-class' ); ?>" alt=""> -->
			        	<?php the_post_thumbnail('current-class'); ?>
				        <div class="profile-section">
				            <a href="<?php the_permalink();?>">View profile</a>
				        </div>
					</figure>
				<?php }else{ ?>
					<figure class='featured-image'>
						<img src="<?php echo get_stylesheet_directory_uri();  ?>/images/no-image.jpg" alt="">
						<div class="profile-section">
							<a href="<?php the_permalink();?>">View profile</a>
						</div>
					</figure>
				<?php } ?>
			    <!-- <figure class="featured-image">
			    </figure> -->
			    <div class="entry-content">
			    	<?php
			    		the_title( '<h3 class="member-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			    	?>
	                <?php if( !empty( $alumni_school )): ?>
			            <span class="member-habbit"><?php echo $alumni_school; ?></span>
	                <?php endif; ?>
			    </div>
			</div>
			<?php
		}
		echo '</div>';
		echo '<div class="rws_ajax_pagination">';
		echo rws_ajax_pagination( $alumni_query );
		echo '</div>';
		wp_reset_postdata();
	else :
		echo $_POST['categoryfilter'];
		echo 'No posts found';
	endif;

	die();
}


add_action('wp_ajax_myfilter', 'rws_alumni_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'rws_alumni_filter_function');


/*added on 17 aug 2017 for filter */

add_filter( 'tribe_event_label_plural', 'find_event_filter', 10, 2);
function find_event_filter( $content){
	return 'Classes';
}


add_filter( 'tribe_events_ical_export_text', 'tribe_events_ical_export_text_filter');
function tribe_events_ical_export_text_filter( $text){
	return 'Export Calendar';
}
