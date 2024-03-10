"use strict";

jQuery(document).on('ready', function () {

    jQuery(window).on('scroll', function () {
        animateElement();
    });

    jQuery('.single-post .num-comments a, .single-portfolio .num-comments a').on('click', function (e) {
        e.preventDefault();
        jQuery('html, body').animate({scrollTop: jQuery(this.hash).offset().top}, 2000);
        return false;
    });

    //Add before and after "blockquote" custom class
    jQuery('blockquote.inline-blockquote').prev('p').addClass('wrap-blockquote');
    jQuery('blockquote.inline-blockquote').next('p').addClass('wrap-blockquote');
    jQuery('blockquote.inline-blockquote').css('display', 'table');

    //Placeholder show/hide
    jQuery('input, textarea').focus(function () {
        jQuery(this).data('placeholder', jQuery(this).attr('placeholder'));
        jQuery(this).attr('placeholder', '');
    });
    jQuery('input, textarea').blur(function () {
        jQuery(this).attr('placeholder', jQuery(this).data('placeholder'));
    });

    //Fix for footer
    if (jQuery('#comments').length)
    {
        jQuery(".footer").css('margin-top', '0');
    }
    
    //Fix for menu alignment
    if(!jQuery('.menu-left-text').length)
    {
        jQuery('.menu-holder').addClass('no-left-part');
    }

    jQuery(".site-content").fitVids();

    jQuery(".default-menu ul:first").addClass('sm sm-clean main-menu');
});



jQuery(window).on('load', function () {

    //Set menu
    jQuery('.main-menu').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8,
        markCurrentItem: true
    });


    var $mainMenu = jQuery('.main-menu').on('click', 'span.sub-arrow', function (e) {
        var obj = $mainMenu.data('smartmenus');
        if (obj.isCollapsible()) {
            var $item = jQuery(this).parent(),
                    $sub = $item.parent().dataSM('sub');
            $sub.dataSM('arrowClicked', true);
        }
    }).bind({
        'beforeshow.smapi': function (e, menu) {
            var obj = $mainMenu.data('smartmenus');
            if (obj.isCollapsible()) {
                var $menu = jQuery(menu);
                if (!$menu.dataSM('arrowClicked')) {
                    return false;
                }
                $menu.removeDataSM('arrowClicked');
            }
        }
    });



//Show-Hide header sidebar
    jQuery('#toggle, .menu-wraper').on('click', multiClickFunctionStop);
    jQuery('.main-menu, .search-field').on('click', function (e) {
        e.stopPropagation();
    });

    commentFormWidthFix();
    contactFormWidthFix();

    jQuery('.grid-item').addClass('loaded');

    //Fix for portfolio/gallery item text
    jQuery('.portfolio-text-holder').each(function () {
        jQuery(this).find('.portfolio-info').css('margin-top', (jQuery(this).innerHeight() - jQuery(this).find('.portfolio-info').innerHeight()) * 0.5);
    });
    jQuery('.carousel-slider .slick-slide .item-text').each(function () {
        jQuery(this).find('a').css('margin-top', (jQuery(this).innerHeight() - jQuery(this).find('a').innerHeight()) * 0.5);
    });


    // Animate the elemnt if is allready visible on load
    animateElement();

    jQuery('.doc-loader').fadeOut('slow');

});


jQuery(window).on('resize', function () {

    commentFormWidthFix();
    contactFormWidthFix();

    //Fix for portfolio/gallery item text
    jQuery('.portfolio-text-holder').each(function () {
        jQuery(this).find('.portfolio-info').css('margin-top', (jQuery(this).innerHeight() - jQuery(this).find('.portfolio-info').innerHeight()) * 0.5);
    });
    jQuery('.carousel-slider .slick-slide .item-text').each(function () {
        jQuery(this).find('a').css('margin-top', (jQuery(this).innerHeight() - jQuery(this).find('a').innerHeight()) * 0.5);
    });
});

//------------------------------------------------------------------------
//Helper Methods -->
//------------------------------------------------------------------------


var animateElement = function (e) {

    jQuery(".animate").each(function (i) {

        var top_of_object = jQuery(this).offset().top;
        var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();
        if ((bottom_of_window) > top_of_object) {
            jQuery(this).addClass('show-it');
        }

    });

};

var commentFormWidthFix = function () {

    jQuery('#commentform').find('.custom-text-class').each(function () {
        var textWidth = jQuery(this).innerWidth() + 1;
        jQuery(this).next('.custom-field-class').width(jQuery('#commentform').innerWidth() - textWidth - 5);
        jQuery(this).next('.custom-field-class').find('input').outerWidth(jQuery('#commentform').innerWidth() - textWidth - 5);
        jQuery(this).next('.custom-field-class').find('textarea').outerWidth(jQuery('#commentform').innerWidth() - textWidth - 5);
    });

};

var contactFormWidthFix = function () {
    jQuery('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea').innerWidth(jQuery('.wpcf7-form').width());
};

var multiClickFunctionStop = function (e) {
    if (jQuery(e.target).is('.menu-wraper') || jQuery(e.target).is('.menu-right-part') || jQuery(e.target).is('.menu-holder') || jQuery(e.target).is('#toggle') || jQuery(e.target).is('#toggle div'))
    {

        jQuery('#toggle, .menu-wraper').off("click");
        jQuery('#toggle').toggleClass("on");
        if (jQuery('#toggle').hasClass("on"))
        {
            jQuery('.header-holder').addClass('down');
            jQuery('.menu-wraper, .menu-holder').addClass('show');
            jQuery('#toggle, .menu-wraper').on("click", multiClickFunctionStop);
        } else
        {
            jQuery('.header-holder').removeClass('down');
            jQuery('.menu-wraper, .menu-holder').removeClass('show');
            jQuery('#toggle, .menu-wraper').on("click", multiClickFunctionStop);
        }
    }
};

function is_touch_device() {
    return !!('ontouchstart' in window);
}