"use strict";

var count = 1;

jQuery(document).on('ready', function () {
    if (parseInt(ajax_var.posts_per_page_index) < parseInt(ajax_var.total_index)) {
        jQuery('.more-posts-index').css('visibility', 'visible');
        jQuery('.more-posts-index').animate({opacity: 1}, 1500);
    } else {
        jQuery('.more-posts-index').css('visibility', 'hidden');
        jQuery('.more-posts-index').animate({opacity: 0}, 100, function () {
            jQuery('.load-more-posts').hide();
        });
    }


    jQuery('.more-posts-index:visible').on('click', function () {
        jQuery(".load-more-posts").addClass('move-down');
        count++;
        loadArticleIndex(count);
    });
});

function loadArticleIndex(pageNumber) {
    jQuery.ajax({
        url: ajax_var.url,
        type: 'POST',
        data: "action=infinite_scroll_index&page_no_index=" + pageNumber + '&loop_file_index=loop-index',
        success: function (html) {
            jQuery(".blog-holder").append(html);

            jQuery(".blog-holder").imagesLoaded(function () {

                animateElement();

                if (pageNumber == ajax_var.num_pages_index)
                {
                    jQuery('.more-posts-index').animate({opacity: 0}, 500,
                            function () {
                                jQuery('.load-more-posts').hide();
                            });
                } else
                {
                    jQuery(".load-more-posts").removeClass('move-down');
                    jQuery(".more-posts-index img").animate({opacity: 1}, 500);
                }
            });
        }
    });
    return false;
}