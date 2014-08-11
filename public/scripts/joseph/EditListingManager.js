var EditListingManager = (function () {

    var mode;
    var deleteUrl;
    var $cancelBtn;


    var deleteOnCancelCreate = function (e) {

        // for redirect on successful delete
        var backHref = $(this).prop('href');

        $cancelBtn.addClass('processing');

        $.ajax({
            url : deleteUrl,
            type : 'DELETE'
        }).done(function () {
            window.location.replace(backHref);
        }).fail(function () {
            alert('Error discarding listing.');
            $cancelBtn.removeClass('processing');
        });

        e.preventDefault();

    };

    return {

        init : function (opts) {

            // set data fields
            mode = opts.mode || 'edit';
            deleteUrl = opts.deleteUrl;

            // set ui fields
            $cancelBtn = opts.$cancelBtn;

            // setup events
            if (mode === 'create') {
                $cancelBtn.on('click', deleteOnCancelCreate);
            }
        }

    };

})();