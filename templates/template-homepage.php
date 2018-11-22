<?php 
/*
Template Name: Homepage Template
*/
get_header();
global $rws_options;
//do_action( 'rws_video_list' );
$homepage_meta			= get_post_meta( get_the_id (), 'rws_homepage_section', true );

/*Model section*/
 $ace_model_enable = $homepage_meta['rws_ac3_model_enable'];
 $ace_model_title = $homepage_meta['ac3_model_sec_title'];
 $ace_model_description = $homepage_meta['ac3_model_sec_description'];
 $ace_model_image_group = $homepage_meta['model_group_1'];
 $ace_model_sub_title = $homepage_meta['model_sub_title'];
 $ace_model_sub_description = $homepage_meta['model_sub_description'];

/*Platform Section*/
$ace_platform_enable = $homepage_meta['rws_platform_enable'];
$ace_platform_title = $homepage_meta['platform_main_title'];
$ace_platform_background_image = $homepage_meta['platform_background_image'];
$ace_platform_list = $homepage_meta['platform_list'];

/*Client testimonial selection*/
$ace_client_testimonial_post_type_enable = $homepage_meta['rws_post_type_selection_enable'];
$ace_client_testimonial_post_type_id = $homepage_meta['client_testimonial_list_id'];
$ace_client_testimonial_sec_title = $homepage_meta['client_testimonial_section_title'];

?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">


            <?php if( 1 == $ace_model_enable ): ?>    
            <section class="model-section section v-center">
              <div class="container">
                <div class="section-info">
                    <header class="entry-header">
                        <h2 class="entry-title">
                          <?php echo ($ace_model_title) ? $ace_model_title : 'AC3’s Model' ?>
                        </h2>
                    </header>
                    <div class="entry-content">
                        <p> <?php echo $ace_model_description; ?> </p>
                    </div>
                </div><!-- .section-info -->

                <div class="model-structure">
                  <?php
                  $i=1;
                    foreach ($ace_model_image_group as $key => $value) 
                    {
                    
                      $ace_image_id = $value['model_image'];
                      $ace_image_url   = rws_image_src ( array ( 'id' => $ace_image_id, 'size' => 'client-class' ) );
                      ?>
                           <div class="model-item model-item<?php echo $i;?>">
                            <figure> 
                                <img src="<?php echo $ace_image_url; ?>" alt="img">
                            </figure> 
                          </div>
                      <?php  
                      $i++;              
                    }

                  ?>
                </div>

                <div class="model-text">
                    <header class="entry-header v-center">
                          <h3 class="entry-title">
                              <?php echo ($ace_model_sub_title) ? $ace_model_sub_title : 'Leverage Data Analytics' ?>                      
                          </h3>
                    </header>
                    <div class="entry-content">
                        <p>
                        <?php echo $ace_model_sub_description; ?>
                        </p>
                    </div>                     
                </div><!-- .model-text -->

              </div><!-- .container -->
            </section><!-- .model-section-->
            <?php endif; ?>


            <?php if( 1 == $ace_platform_enable ): ?>  
            <section class="platform-section section " style="background-image: url(<?php echo get_template_directory_uri().'/images/platform-bg.png';?>)">
                <div class="container">
                    <header class="entry-header">
                      <?php echo ($ace_platform_title) ? '<h3 class="entry-title">'.$ace_platform_title.'</h3>':' Our platform gives you data';?>
                    </header>

                    <div class="platform-content-wrapper">
                        <div class="platform-content">
                              <?php
                            //  echo get_template_directory_uri().'/images/platform-bg.png';
                              $ace_platform_list = $homepage_meta['platform_list'];
                              $i=1;
                              foreach ($ace_platform_list as $key => $value) {
                                   $platform_title = $value['platform_title'];
                                   $platform_image_id = $value['platform_image'];
                                   $platform_description = $value['platform_desc'];
                              ?>
                                  <div class="post">
                                    <div class="platform-text">
                                      <h4 class="entry-title">
                                        <?php echo ($platform_title) ? '<span>' .$platform_title.'</span>' : 'About the practice'; ?>
                                      </h4>
                                      <p>
                                        <?php echo $platform_description;?>
                                      </p>
                                    </div><!-- .platform-text -->

                                    <div class="platform-icon platform-icon<?php echo $i;?>">
                                      <?php 
                                      $platform_thumb_image_src = rws_image_src ( array ( 'id' => $platform_image_id, 'size' => 'full' ) );

                                      ?>
                                      <figure>
                                       <img src="<?php echo $platform_thumb_image_src; ?>" alt="">
                                     </figure>
                                   </div><!-- .platform-icon -->
                                  </div><!-- .post -->
                              <?php
                              $i++;
                              }
                              ?>
                        </div><!-- .platform-content -->
                    </div><!-- .platform-content-wrapper -->
                    <div class="platform-figure">
                      <?php
                         $platform_image_url   = rws_image_src ( array ( 'id' => $ace_platform_background_image, 'size' => 'full' ) );
                         if( !empty( $ace_platform_background_image )):
                          ?>
                      <figure>
                        <img src="<?php echo $platform_image_url; ?>" alt="">
                      </figure>
                    <?php endif;?>
                    </div><!-- .platform-figure -->

                </div><!-- .container -->
            </section><!-- .platform-section -->
            <?php endif; ?>


            <?php if( 1 == $ace_client_testimonial_post_type_enable ): ?>  
            <section class="client-section section ">
                <div class="container">
                  <header class="entry-header">
                            <h2 class="entry-title">
                             <?php echo ($ace_client_testimonial_sec_title) ? $ace_client_testimonial_sec_title : 'ClIENT TESTIMONIALS' ?>
                            </h2>
                  </header>
                  <?php 


                     $client_testimonial_args          = array(
                                      'post_type'      => 'client_testimonial',
                                      'posts_per_page' => -1,
                                  );
                     $client_testimonial_query         = new WP_Query( $client_testimonial_args );
                     $client_count                     = $client_testimonial_query->post_count;

                     if($client_count == 1)
                     {
                         $client_slider = '';
                     }
                     else
                     {
                         $client_slider = 'owl-carousel owl-theme client_testimonial_slider';
                     }

                  ?>
                   <div class="<?php echo $client_slider;?>" id="client-slider">
                     <?php
                      if($client_testimonial_query->have_posts())
                      {
                        while($client_testimonial_query->have_posts())
                        {
                          $client_testimonial_query->the_post();
                          $client_title = get_the_title();
                          $client_description = get_the_content();
                        //  $client_large_image_id = get_the_post_thumbnail();
                          $client_testimonials_meta_values = get_post_meta( get_the_id (), 'client_testimonial_id', true );
                          if(isset($client_testimonials_meta_values['client_name']))
                                {
                                   $client_name = $client_testimonials_meta_values['client_name'];
                               }
                          if(isset($client_testimonials_meta_values['client_designation']))
                                {
                                   $client_designation= $client_testimonials_meta_values['client_designation'];
                               }
                          if(isset($client_testimonials_meta_values['client_image']))
                                {
                                   $client_image_id = $client_testimonials_meta_values['client_image'];
                               }

                          ?>
                            <div class="item">
                              <div class="client-content">
                                <div class="client-text">
                                  <div class="entry-content">
                                    <p> <?php echo $client_description ; ?> </p>
                                  </div>
                                </div><!-- .client-text -->
                                <div class="client-info">
                                  <?php
                                  $client_thumb_image_src = rws_image_src ( array ( 'id' => $client_image_id, 'size' => 'full' ) );
                                  ?>
                                  <figure>
                                    <img src="<?php echo $client_thumb_image_src; ?>" alt="">
                                  </figure>
                                  <div class="client-detail">
                                    <span class="client-name"> <?php echo $client_name;?> </span>
                                    <span class="client-position"> <?php echo $client_designation;?> </span>
                                  </div>
                                </div>
                              </div><!-- .client-content -->
                              <div class="client-image">
                                <i class="fa fa-quote-left"></i> 
                                <?php
                                  $image_url=wp_get_attachment_image_src(get_post_thumbnail_id(),'full',false);
                                  $img= esc_url( $image_url[0]);
                                ?>
                                <figure class="individual-client">
                                  <a href="#"><img src="<?php echo $img; ?>" alt=""></a>
                                </figure>
                              </div><!-- .client-image -->                      
                            </div><!-- .item -->
                         
                          <?php
                        }
                        wp_reset_postdata();
                      }
                      ?>
                    </div><!-- #client-slider -->
                </div><!-- .container -->
            </section><!-- .client-section -->   
            <?php endif; ?>

        </main><!-- #main-->
    </div><!-- #primary-->
</div><!-- .site-content-->

<?php
get_footer();