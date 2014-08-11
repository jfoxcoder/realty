var ListingsManager = (function () {

    var deleteUrl;
    var $deleteBtns;

    var setupEvents = function () {
        $deleteBtns.on('click', deleteListing);
    }

    var deleteListing = function () {

        var deleteParams = makeDeleteParams(this);

        console.log(deleteParams);

        $.ajax({
            url : deleteParams.url,
            type : 'DELETE'
        })
        .done(deleteParams.done)
        .fail(deleteParams.fail);

    }

    var makeDeleteParams = function (btn) {
        var $deleteBtn = $(btn);
        $deleteBtn.addClass('processing');
        var $listingContainer = $deleteBtn.closest('[data-listing]').first();

        return {
            url : deleteUrl + '/' + $listingContainer.data('listing'),

            done : function () {
                $listingContainer.fadeOut();
            },
            fail : function () {
                $deleteBtn.removeClass('processing');
            }
        }
    }


    return {
        init: function (opts) {

            // set fields
            deleteUrl = opts.deleteUrl;
            $deleteBtns = opts.$deleteBtns;

            setupEvents();
        }
    };
}) ();