$(document).ready(function(){

  new WOW().init();
  
      // Mister N
    
      $(".mobile-category .category-close i").click(function(){
        $(this).parent().parent().css({
          transform: 'translate(-100% , 0px)',
          transition: '0.5s transform'
        })
      });

      $(".category-humburger").click(function(){
        $(".mobile-category").css({
          opacity: '1',
          transform: 'translate(0px , 0px)',
          transition: '0.5s transform'
        });
      });


      var owl = $(".top-products .owl-carousel").owlCarousel({
        // 'items' :4,
        // 'autoPlay' : true,
        'margin' : 10,
        // 'dots' : false,
        // 'loop' : true,
        // 'center' : true,
        'stagePadding' : 5,
        // // 'lazyLoad' : true,
        // 'animateIn' : true,
        nav: true,
        mouseDrag: true,
        responsiveClass: true,
        responsive: {
            0:{
              items: 1
            },
            480:{
              items: 2
            },
            769:{
              items: 3
            },
            992:{
              items: 4
            }
        }
        
      });

      $('.top-products .owl-prev').click(function() {
        owl.trigger('prev.owl.carousel' , [800]);
    });
    
    $('.top-products .owl-next').click(function() {
        
        owl.trigger('next.owl.carousel', [800]);
    })

    
      var owl2 = $(".similar-products .owl-carousel").owlCarousel({
        // 'items' :5,
        // 'autoPlay' : true,
        'margin' : 10,
        // 'dots' : false,
        // 'loop' : true,
        // 'center' : true,
        'stagePadding' : 5,
        // // 'lazyLoad' : true,
        'animateIn' : true,
        nav: true,
        mouseDrag: true,
        responsiveClass: true,
        responsive: {
          0:{
            items: 1
          },
          480:{
            items: 2
          },
          769:{
            items: 3
          },
          992:{
            items: 4
          }
        }
        
      });

      $('.similar-products .controls-right .owl-prev').click(function() {
        owl2.trigger('prev.owl.carousel' , [800]);
    });
    
    $('.similar-products .controls-right .owl-next').click(function() {
        
        owl2.trigger('next.owl.carousel', [800]);
    })

})
