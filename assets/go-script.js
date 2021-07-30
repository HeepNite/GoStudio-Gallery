(function($) {
    var categoriesLength = $('ul > #list-categories-li').length;
    var slideGallery = -1;
    var revItem = $('ul > #list-review-li');
    var revListLength = $('ul > #list-review-li').length;
    var arrayRevItems = [];
    for (var i = 0; i < revListLength; i++) {
        console.log(revItem[i]);
    }
    var sliderRev = -1;

    /* categories filter */
    $('#list-categories-li > a').on('click', function(e) {
        $('#list-categories-li > a').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();

        var categorySelected = $(this);
        var categoryParent = categorySelected.parent().index();
        slideGallery = categoryParent;

        var category = $(this).data('category');
        $.ajax({
            url: admin_url.ajax_url,
            data: {
                action: 'go_filter_projects',
                category: category
            },
            type: 'post',
            success: function(result) {
                $('#container-post').html(result);
            },
            error: function(result) {
                console.warn(result);
            }
        });

    });

    /* gallery slider arrow next*/
    $('#next-slide-arrow-gallery').on('click', function() {
        if (slideGallery >= categoriesLength - 1) {
            {
                slideGallery = 0
            }
        } else {
            slideGallery++;
        }
        var currentList = $('ul > #list-categories-li:eq(' + slideGallery + ') ');
        var currentChild = currentList.children().click();
        console.log(currentChild)

    })

    /* gallery slider arrow prev*/
    $('#prev-slide-arrow-gallery').on('click', function() {
        if (slideGallery <= 0) {
            {
                slideGallery = categoriesLength - 1
            }
        } else {
            slideGallery--;
        }
        var currentList = $('ul > #list-categories-li:eq(' + slideGallery + ') ');
        var currentChild = currentList.children().click();
        console.log(currentChild)

    });

    /* Modal Windows whit pos information  */
    $(document).on('click', '#container-gallery > article', function() {
        console.log($('article'));
        $('modal-project').removeClass('hidden-modal');
        var postId = $(this).data('id');
        console.log(postId)
        $.ajax({
            url: admin_url.ajax_url,
            data: {
                action: 'go_modal_project',
                postId: postId
            },
            type: 'post',
            success: function(result) {
                console.log(result)
                $('#modal-project').html(result);

            },
            error: function(result) {
                console.warn(result);
            }
        });
    });

    /* Close button modal window */
    $(document).on('click', '#btn-close-modal', function() {
        var select = $('#btn-close-modal').parent();
        var select2 = select.parent();
        select2.addClass('hidden-modal')
        console.log(select2)


    })

    /* Review ajax slider generator */

    /* Review slider arrow next */

})(jQuery);