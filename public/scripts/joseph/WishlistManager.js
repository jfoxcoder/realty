var WishlistManager = (function () {

    // Input from server.
    var postUrl;
    var homeUrl;
    var isWishlistPage;

    // The wishlist buttons on the current page.
    var $wishlistBtns;


    // These get set when a wishlist btn is clicked.
    var $wishBtn;
    var $listingContainer;

    /* initialisation */

    var setOptions = function (opts) {
        postUrl = opts.postUrl;
        homeUrl = opts.homeUrl;
        isWishlistPage = opts.isWishlistPage;
        $wishlistBtns = opts.$wishlistBtns;
    };

    var setupEvents = function () {
        $wishlistBtns.on('click', onWish);
    };



    /* event handlers */



    var onWish = function (e) {
        $wishBtn = $(this);

        // get listing id from the ancestor who has it
        $listingContainer = $wishBtn.closest('[data-listing]').first();

        // give feedback immediately
        toggleWishBtnStyle();

        // post or delete wish
        if ($wishBtn.hasClass('wish-on')) {
            addToWishlist();
        } else {
            removeFromWishlist();
            handleEmptyWishlistPage();
        }
    };

    var handleEmptyWishlistPage = function () {
        if (! isWishlistPage)
            return;

        // remove the listing from the page and
        // redirect home if the wishlist is empty.

        $listingContainer.fadeOut(function () {

            if ($('.wish-on').length === 0) {
                window.location.replace(homeUrl);
            }

        });
    };



    var onWishRequestFail = function () {
        // revert
        toggleWishBtnStyle();

        console.error('Error setting wish', arguments);
    };







    var addToWishlist = function () {



        $.post(postUrl, { listingId : $listingContainer.data('listing') })
         .done(function() {
            $.growl.notice({
                //title: $listingContainer.find('.listing-address').text(),
                title: $wishBtn.data('address'),
                message : 'Added to wishlist'
            });
         })
         .fail(onWishRequestFail);
    };

    var removeFromWishlist = function () {
        $.ajax({
            type : 'DELETE',
            url : postUrl + '/' + $listingContainer.data('listing')
        })
        .done(function() {
            $.growl.notice({
                title: $wishBtn.data('address'),
                message : 'Removed from wishlist'
            });
        })
        .fail(function () {
            console.log('delete failed', arguments);
        });
    };

    var toggleWishBtnStyle = function () {
        //$wishBtn.toggleClass('wish-on wish-off');

        if ($wishBtn.hasClass('wish-on')) {
            $wishBtn.removeClass('wish-on').addClass('wish-off');
            $wishBtn.prop('title', 'Add to wishlist');
        } else {
            $wishBtn.removeClass('wish-off').addClass('wish-on');
            $wishBtn.prop('title', 'Remove from wishlist');
        }




    }

    return {
        init : function (opts) {
            setOptions(opts);
            setupEvents();
        }
    };

})();
