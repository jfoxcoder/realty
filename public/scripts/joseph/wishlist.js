$(function () {


    /*
    * wishlist requires: listing_id, user_id
    * */


    WishlistManager.init({

        postUrl : Realty.wishlist.postUrl,

        homeUrl : Realty.wishlist.homeUrl,

        isWishlistPage : Realty.wishlist.isWishlistPage,

        // ui
        $wishlistBtns : $('.wish-on, .wish-off')
    });
});