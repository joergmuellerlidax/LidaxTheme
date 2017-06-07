(function($) {
// error messages
    $(document).ready(function() {


        
        $(".thumb-title").dotdotdot({
           ellipsis : '...',
           watch        : true,
           height       : 36
        });


        var viewportWidth = $(window).width();
        if( viewportWidth > 767 ){
            var Rows = 2;
        } else {
            var Rows = 1;
        }

        $('.crossselling-similar').slick({
            infinite: false,
            dots: true,
            arrows: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            rows: Rows,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                  }
                },
                
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                }
            ]
        });
        $('.home .product-list').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            dots: true,
            arrows: true
        });

        $('.single-leftside .owl-thumbs').slick({
            infinite: false,
            variableWidth: true,
            slidesToShow: 3,
            arrows: true
        });
        

        
        // $('.crossselling-similar').owlCarousel({
        //     loop:true,
        //     nav:true,
        //     responsive:{
        //         0:{
        //             items:1
        //         },
        //         600:{
        //             items:2
        //         }
        //     }
        // });
        // $('.crossselling-last-seen, .crossselling-customer-buyed, .crossselling-accessory').owlCarousel({
        //     loop:true,
        //     nav:true
        // });        
        

        $("#description-desktop").click(function() {
            $('html, body').animate({
                scrollTop: $("#single-tabs").offset().top-100
            }, 1000);
        });

        $("#description-mobile").click(function() {
            $('html, body').animate({
                scrollTop: $("#single-tabs").offset().top-100
            }, 1000);
        });

        $( "ul.mainmenu > li > ul > li" ).hover(function() {
            $(this).siblings("li.menu-cat-img").find("img").attr("src", $( this ).find("a").attr( "data-img" ));
        });

        $( "ul.mainmenu > li > ul > li" ).mouseout(function() {
            $(this).siblings("li.menu-cat-img").find("img").attr("src", $(this).parents("li").find("a").attr("data-img"));
        });

        

        

    });
})(jQuery);