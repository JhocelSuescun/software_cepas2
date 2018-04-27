/* Write here your custom javascript codes */

            jQuery(document).ready(function () {
                App.init();
                new WOW().init();
                OwlCarousel.initOwlCarousel();
                LayerSlider.initLayerSlider();
                OwlRecentWorks.initOwlRecentWorksV2();
            });




$(document).ready(function() {
    var pgwSlider = $('.pgwSlider').pgwSlider();
    pgwSlider.reload({
    maxHeight : 600,
    intervalDuration : 8000,
    adaptiveHeight : true,
    verticalCentering : true,
//    displayControls : true,
    transitionEffect : 'sliding'
});
});


       /*     $(function () {
                $(window).scroll(function () {
                    if (screen.width > 991 && $(window).scrollTop() > 230)
                    {
                      $("#menu-principal").fadeOut();
                    }
                    else
                    {
                      $("#menu-principal").fadeIn();
                    }
                });
            }); */
