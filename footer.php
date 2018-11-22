	<?php 
  global $rws_options;

   //$cta_section_title 			    = $rws_options['cta_section_title'];   

  ?>
  <footer id="colophon" class="site-footer">
    <div class="widget-area"> 
      <div class="container">
        <div class="row">
          <div class="custom-col-12 widget-menu">
            <aside class="widget">
              <div class="textwidget">
                <?php 
                  $site_logo_id   = get_theme_mod( 'custom_logo' );
                  $site_logo_url  = rws_image_src ( array ( 'id' => $site_logo_id, 'size' => 'full' ) );
                  ?>
                <a href="<?php echo home_url(); ?>">
                  <?php if($site_logo_id) { ?>
                  <img src="<?php echo esc_url( $site_logo_url );?>" alt="<?php echo get_bloginfo('name');?>" title="<?php echo get_bloginfo('name');?>" >
                  <?php } else {
                    echo '<h1>'.get_bloginfo('name').'</h1>';
                    } ?>
                </a>
              </div>
            </aside>
          
            <aside class="widget">
              <div class="footer-nav">
                     <?php 
                     /**
                    * Displays a navigation menu
                    * @param array $args Arguments
                    */
                  if( has_nav_menu( 'primary' )):
                    $args = array(
                      'theme_location' => 'footer-links',
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
              </div><!-- .footer-nav -->
            </aside>
          </div><!-- .custom-col-12 -->
        </div><!-- .row -->
      </div><!-- .container -->   
    </div> <!-- .widget-area -->                               
    <div class="site-generator">
      <div class="container">
        <p class="copy-right">         
          &copy; <?php echo date('Y'); ?>  AC3 Health. All rights reserved | Site by:  <a href="#">Priemer Consulting </a>
        </p>
      </div> <!-- .container -->        
    </div><!-- .site-generator -->   
  </footer><!-- .site-footer -->

  <div class="back-to-top">
   <a href="#masthead" title="Go to Top">
     <img src="<?php echo get_template_directory_uri().'/images/arrow-top.png';?>" alt="">
   </a>       
  </div>  
</div><!-- end #page -->

<?php wp_footer(); ?>
</body>
</html>