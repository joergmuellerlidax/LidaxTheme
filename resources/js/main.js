(function($) {
// error messages
    $(document).ready(function() {

        $('.crossselling-similar').owlCarousel({
            loop:true,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                }
            }
        });
        $('.crossselling-last-seen, .crossselling-customer-buyed, .crossselling-accessory').owlCarousel({
            loop:true,
            nav:true
        });        
        

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

        

        var menu = $("#mainNavbarCollapsable");
        var btnClose = menu.find("li.btnClose");
        var breadcrumb = menu.find("ul.breadcrumb");

        $("#btnMainMenuToggler").click(function(){
            $("#mainNavbarCollapsable").toggleClass("open");
            $("body").toggleClass("menu-is-visible");
        });

        $("#mainNavbarCollapsable .btnClose").click(function(){
            $("#mainNavbarCollapsable").removeClass("open");
            $("body").removeClass("menu-is-visible");
        });

        function buildBreadcrumb(){
            var open_elements = menu.find("li.open");
            var breadcrumb_array = ["Alle"];

            $(open_elements).each(function(){
                breadcrumb_array.push( $(this).children("a").text() );
            });

            breadcrumb.find("li").not(".btnClose").remove();

            $(breadcrumb_array).each(function(){
                breadcrumb.append('<li class="breadcrumb-item">'+this+'</li>');
            });
            breadcrumb.find("li").not(".btnClose").click(function(){
                $(this).nextAll().remove();
                closeSubCategories();
            });

        }
        function closeSubCategories(){
            var open_elements = menu.find("li.open");
            var bread_total = (breadcrumb.find("li").not(".btnClose").length)-1;
            
            $(open_elements).each(function(i, v){
                if(i>=bread_total){
                    $(this).removeClass("open");
                }
                open_elements = menu.find("li.open");
                console.log(bread_total, i, open_elements);
            });
        }
        menu.find("li>a").click(function(evt){
            var p = $(this).width() - evt.offsetX;
            if(p<0){
                evt.preventDefault();
                $(this).closest(".ddown").addClass("open");
                buildBreadcrumb();
            }
            $("#mainNavbarCollapsable").scrollTop = 0;
            $("#mainNavbarCollapsable").animate({ scrollTop: 0 }, "fast");
        });
        buildBreadcrumb();

    });
})(jQuery);