"use strict";

var count = 1;

jQuery(document).on('ready', function () {
    if (parseInt(ajax_var_portfolio.posts_per_page) < parseInt(ajax_var_portfolio.total)) {
        jQuery('.more-posts-portfolio').css('visibility', 'visible');
        jQuery('.more-posts-portfolio').animate({opacity: 1}, 1500);
    } else {
        jQuery('.more-posts-portfolio').css('visibility', 'hidden');
        jQuery('.more-posts-portfolio').animate({opacity: 0}, 100, function () {
            jQuery('.load-more-portfolio').hide();
        });
    }


    jQuery('.more-posts-portfolio:visible').on('click', function () {
        jQuery(".load-more-portfolio").addClass('move-down');
        count++;
        loadArticlePortfolio(count);
    });
});

function loadArticlePortfolio(pageNumber) {
    jQuery.ajax({
        url: ajax_var_portfolio.url,
        type: 'POST',
        data: "action=infinite_scroll&page_no=" + pageNumber + '&loop_file=loop-portfolio',
        success: function (html) {


            jQuery("#portfolio").append(html);

            jQuery("#portfolio").imagesLoaded(function () {

                //Fix for portfolio item text
                jQuery('.grid-item').not('.loaded').each(function () {

                    jQuery(this).addClass('loaded');

                    //Fix for portfolio item text
                    jQuery('.portfolio-text-holder').each(function () {
                        jQuery(this).find('.portfolio-info').css('margin-top', (jQuery(this).innerHeight() - jQuery(this).find('.portfolio-info').innerHeight()) * 0.5);
                    });

                    animateElement();
                });

                if (pageNumber == ajax_var_portfolio.num_pages)
                {
                    jQuery('.more-posts-portfolio').animate({opacity: 0}, 500,
                            function () {
                                jQuery('.load-more-portfolio').hide();
                            });
                } else
                {
                    jQuery(".load-more-portfolio").removeClass('move-down');
                    jQuery(".more-posts-portfolio img").animate({opacity: 1}, 500);
                }
            });

        }
    });
    return false;
}

jQuery(window).on('load', function () {
    //Image / Testimonial Slider Config
    jQuery(".image-slider, .testimonial-slider").each(function () {
        var id = jQuery(this).attr('id');

        var auto_value = window[id + '_auto'];
        var hover_pause = window[id + '_hover'];
        var dots = window[id + '_dots'];
        var speed_value = window[id + '_speed'];

        auto_value = (auto_value === 'true') ? true : false;
        hover_pause = (hover_pause === 'true') ? true : false;
        dots = (dots === 'true') ? true : false;

        jQuery('#' + id).slick({
            arrows: false,
            dots: dots,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 750,
            autoplay: auto_value,
            autoplaySpeed: speed_value,
            pauseOnHover: hover_pause,
            fade: true,
            draggable: false,
            adaptiveHeight: true
        });
    });


    var g_speed_value = window['gallery_speed'];
    var g_auto_value = window['gallery_auto'];
    g_auto_value = (g_auto_value === 'true') ? true : false;

    jQuery(".carousel-slider").slick({
        arrows: true,
        dots: false,
        infinite: true,
        centerMode: true,
        variableWidth: true,
        speed: g_speed_value,
        autoplaySpeed: g_speed_value,
        autoplay: g_auto_value,
        pauseOnHover: true
    });


    //Fix for portfolio item text
    jQuery('.portfolio-text-holder').each(function () {
        jQuery(this).find('.portfolio-info').css('margin-top', (jQuery(this).height() - jQuery(this).find('.portfolio-info').height()) * 0.33);
    });
});