<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<?php wp_head();?>
</head>
<body <?php body_class();?> >
	<?php global $rws_options; ?>
	<div class="loader"></div>
	<div id="page" class="hfeed site">

		<header id="masthead" class="site-header"> 
			<section class="hgroup-wrap"> 
				<div class="container">       
					<div class="site-branding">
						<?php 
						$site_logo_id   = get_theme_mod( 'custom_logo' ); 
					 	$site_logo_url	= rws_image_src ( array ( 'id' => $site_logo_id, 'size' => 'full' ) );
						?>
						<h1 class="site-title">
							<a href="<?php echo home_url(); ?>">
								<?php if($site_logo_id) { ?>
								<img src="<?php echo esc_url( $site_logo_url );?>" alt="<?php echo get_bloginfo('name');?>" title="<?php echo get_bloginfo('name');?>" >
								<?php } else {
									echo '<h1>'.get_bloginfo('name').'</h1>';
								} ?>
							</a>
						</h1>
					</div> <!-- .site-branding -->
					
					<div class="hgroup-right">
							<div id="navbar" class="navbar">
								<nav id="site-navigation" class="navigation main-navigation">
									<div class="menu-top-menu-container clearfix">
										<?php 
										   /**
											* Displays a navigation menu
											* @param array $args Arguments
											*/
										if( has_nav_menu( 'primary' )):
											$args = array(
												'theme_location' => 'primary',
												'menu' => '',
												'container' => '',
												'container_class' => '',
												'container_id' => '',
												'menu_class' => '',
												'menu_id' => '',
												'echo' => true,
												'fallback_cb' => '',
												'before' => '',
												'after' => '',
												//'link_before' => '<div>',
												//'link_after' => '</div>',
												'items_wrap' => '<ul>%3$s</ul>',
												'depth' => 0,
												'walker' => ''
											);						
											wp_nav_menu( $args );
										endif;
										?>
									</div>
								</nav>
							</div> <!-- navbar ends here -->
					</div><!-- .hgroup-right -->				
				</div><!-- .container -->
			</section> <!-- .hgroup-wrap -->  
		<?php
		$meta = get_post_meta( get_the_id (), 'common_heading', true );					
		$banner_image_enable    = $meta['banner_image_enable'];
		$banner_list       = $meta['banner_group_1'];
		$count = count($banner_list);
		if($count == 1)
		{
			$slider = '';
		}
		else 
		{
			$slider = 'owl-carousel owl-theme main-slider-banner';
		}
		?>
		<section class="featured-slider">			
			<div class="<?php echo $slider;?> " id="main-slider">	
				<?php if ( 1 == $banner_image_enable ): ?>
					<?php
				if (is_array($banner_list) || is_object($banner_list))
				{

					foreach ($banner_list as $key => $value) {
						$image_url_id= $value['banner_image'];
						$banner_image_url   = rws_image_src ( array ( 'id' => $image_url_id, 'size' => 'ac3-banner-slider' ) );
						$banner_heading_enable  = $value['banner_heading_enable'];
						$page_title  = $value['rws_page_title'];
						$page_subtitle  = $value['rws_page_subtitle'];

						$rws_banner_lablel_btn_enable  = $value['rws_banner_btn_enable'];
						$rws_banner_btn_label  = $value['rws_banner_btn_label'];
						$rws_banner_btn_url  = $value['rws_banner_btn_url'];
					?>
						<div class="slider-content">
							<figure class="slider-image">
								<img src="<?php echo esc_url( $banner_image_url );?>">								
							</figure>
							<?php if(1 == $banner_heading_enable): ?>
							<div class="slider-text">
								<?php echo ($page_title) ? '<h2 class="slider-title">'.$page_title.'</h2>': '';?>
								<?php echo ($page_subtitle) ? '<h3 class="slider-title">'.$page_subtitle.'</h3>': '';?>
								<?php if( 1== $rws_banner_lablel_btn_enable ): ?>
								<a href="<?php echo $rws_banner_btn_url; ?>" class="btn btn-learnmore">
										<?php echo ( $rws_banner_btn_label ) ? $rws_banner_btn_label : 'Learn More'; ?></a>
							</div><!-- .slider-text -->
						<?php 
						endif;
					endif;
						?>
						</div><!-- .slider-content-->
				<?php 
					}
				}
				?>
			<?php endif; ?>
			</div><!-- .main-slider-->			  
		</section><!-- .featured-slider -->
		
	</header> <!-- header ends here -->

    <!-- //fetch value of cs as $rws_options['name_here']; -->