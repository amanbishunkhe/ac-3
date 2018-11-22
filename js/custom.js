$=jQuery
jQuery(document).ready(function () {

             $('.main-slider-banner').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                nav: false,
                dots: false,
                autoplay: false,
                responsive: {
                  0: {
                    items: 1,        
                  },
                  600: {
                    items: 1,                
                  },
                  1000: {
                    items: 1,                
                  }
                }
              })
             $('.client_testimonial_slider').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                nav: false,
                dots: false,
                autoplay: false,
                responsive: {
                  0: {
                    items: 1,        
                  },
                  600: {
                    items: 1,                
                  },
                  1000: {
                    items: 1,                
                  }
                }
              })
                });
          

             $(window).scroll(function(){
                  var sticky = $('.sticky'),
                      scroll = $(window).scrollTop();
                      if (scroll >=200) sticky.addClass('fixed');
                      else sticky.removeClass('fixed');
              });
  
        
       /*search-toggle*/
       jQuery(".search-toggle").click(function() {
         jQuery(this).toggleClass('active');
        });

          jQuery('.menu-top-menu-container').meanmenu({
            meanMenuContainer: '.main-navigation',
            meanScreenWidth:"767",
            meanRevealPosition: "right",
          });


         /* back-to-top button*/

         $('.back-to-top').hide();
         $('.back-to-top').on("click",function(e) {
         e.preventDefault();
         $('html, body').animate({ scrollTop: 0 }, 'slow');
        });    
        $(window).scroll(function(){
          var scrollheight =1800;
          if( $(window).scrollTop() > scrollheight ) {
               $('.back-to-top').fadeIn();

              }
            else {
                  $('.back-to-top').fadeOut();
                 }
         });

    


          