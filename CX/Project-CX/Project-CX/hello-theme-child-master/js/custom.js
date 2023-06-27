jQuery(document).ready(function ($) {
    $(".open-search-btn").click(function (e) {
        e.preventDefault();
        $(".main-header .header-inner .right-wrap").addClass("search-active");
        $(".main-header .header-inner .right-wrap .site-search").addClass("active");
    });

    $(".site-search .close-search").click(function (e) {
        e.preventDefault();
        $(".main-header .header-inner .right-wrap").removeClass("search-active");
        $(".main-header .header-inner .right-wrap .site-search").removeClass(
            "active"
        );
    });

    $(".mobile-menu a.mobile-menu-toggle").click(function (e) {
        e.preventDefault();
        $(".site-nav").toggleClass("menu-active");
        $("body").toggleClass("menu-active");
    });

    var current = location.pathname;
    $(".inventory-cat-listing .io_mm_outer .io_mm_item .io_mm_title a").each(
        function () {
            var $this = $(this);

            if ($this.attr("href").indexOf(current) !== -1) {
                $this.addClass("active");
            }

            if (
                $this
                    .closest(".io_mm_item")
                    .next(".io_mm_item")
                    .find("a")
                    .attr("href") == $this.attr("href")
            ) {
                $this.closest(".io_mm_item").next(".io_mm_item").remove();
            }
        }
    );

    $(".open-cart a").click(function (e) {
        e.preventDefault();
        checkAvailDateClick();
    });

    $(document).on("click", function (e) {
        if (
            $(e.target).closest("#cartPopover").length === 0 &&
            $(e.target).closest(".open-cart").length === 0
        ) {
            cartHide();
        }
    });

    var paged = 2;
    $('.post-navbar ul li a').click(function(e) {
        e.preventDefault();
        var postID = $(this).attr('id');
        var button = '';
        paged = 2;        
        get_load_more_data(postID,button,true);
    });
    
    function get_load_more_data(postID,button,load_category = false) {
        $.ajax({
            type: "POST",
            url: frontend_ajax_object.ajaxurl,
            data: {
                action: "vendor_load_more",
                paged: paged,
                postID: postID,
                load_category : load_category,
            },
            beforeSend: function() {
                if(load_category == false) {
                    button.text('Loading...');
                }
            },
            success: function (res) {                       
                if(load_category == false) {
                    button.text('Load More');                    
                    var total_post = button.attr('total-post');
                    total_post = total_post / 4;    
                    if(paged >= total_post) {
                        button.hide();
                    }
                } else {

                    $('div#'+postID+' .btn__primary').show();

                    $('div.'+postID).text('');
                }
                $('div.'+postID).append(res);
            },
        });
    }

    $(".all-load-more").click(function (e) {
        e.preventDefault();
        var button = $(this);
        var postID = $(this).data('id');
        paged++;
        get_load_more_data(postID,button,false);
    });
});
