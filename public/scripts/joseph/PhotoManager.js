var PhotoManager = (function () {

    // state

    var
    // Where to upload the photos to
       uploadUrl,

       deleteUrl,

    // Where to download the photos from
       downloadUrl,

    // Security for deletes.
        csrfToken,

    // The listing to associate the photos with.
        listingId,

    // The upload form controls.
        $form, $fileInput, $uploadButton, $openUploadModalButton,

        // for showing/hiding on select
        $deleteButton,

        // for clearing selection
        $clearButton,

        // for calling onDelete
        $confirmDeleteButton,

        // modals
        $uploadModal, $confirmDeleteModal,

        // The unordered list that will display the uploaded photos.
        $photoList;


    // Photo template.

    var photoLi = '<li data-photo="<%= id %>" title="<%= id %>">'
    var photoImg = '<img src="<%= path %>" />';

    // link thumbnail (currently unused)
    //var photoLink = '<a class="th" href="<%= path %>">' + photoImage + '</a>'
    //var photoLinkItem = photoItemOpen + photoLink + '</li>';

    // Compile.
    var photoTemplate = _.template(photoLi + photoImg + '</li>');







    var filesSelected = function () {

        if ($fileInput.get(0).files.length === 0) {

            alert('Please select photos to upload.')

            return false;
        }
        return true;
    };

    var onUpload = function(e) {
        e.preventDefault();

        if  ( filesSelected() ) {

            // Prepare listings and listing id for upload.
            var formData = createFormData();

            // Build the request.
            var xhr = createRequest();

            // Post the data.
            xhr.send(formData);
        }
    }





    var onSuccess = function () {
        injectPhotos();
    }




    var createRequest = function () {
        var xhr = new XMLHttpRequest();

        xhr.open('POST', uploadUrl, true);

        xhr.onload = function () {

            if (xhr.status === 200) {
                onSuccess();
            } else {
                alert('An error occurred!');
            }

            // close the dialog
            $uploadModal.foundation('reveal', 'close');
        };

        return xhr;
    }




    var createFormData = function() {

        var formData = new FormData(),
            files = $fileInput.prop('files'),
            i = 0,
            file;

        formData.append('listingId', listingId);

        for (;i < files.length; i++) {
            file = files[i];

            if (file.type.match(/image.*/)) {
                formData.append('photos[]', file, file.name);
            } else {
                console.error('Rejecting non-image file', file);
            }
        }

        return formData;
    }

    var selectedPhotoItems = function () {
        return $('li.ui-selected');
    }

    var onDelete = function(e) {
        $confirmDeleteModal.foundation('reveal', 'close');
        selectedPhotoItems().each(deletePhoto);
    };



    var deletePhoto = function (i, photoItem) {
        var $photoItem = $(photoItem);
        var photoId = $photoItem.data('photo');

        $.ajax({
            url : deleteUrl + '/' + photoId,
            type : 'DELETE',
            data : { '_token' : csrfToken }
        })
        .done(function () {
            $photoItem.hide('explode').remove();

            // Hide the delete button if no more photos.
            if ($photoList.find('li').length === 0) $deleteButton.hide();

        })
        .fail(function() {
            console.log('delete fail received', arguments);
        });
    }

    var injectPhotos = function () {

        // request the photo paths
        $.getJSON(downloadUrl, function (photos) {

            var i = 0, len = photos.data.length, photosHtml = '';

            for(; i < len; i++) {
                photosHtml += photoTemplate(photos.data[i]);
            }

            $photoList.html(photosHtml);
        })
        .error(function (error) {
            alert(error.responseText);
        });
    }



    /**
     * Turn on the buttons passed in.
     */
    var activate = function () {
        for(var i = 0; i < arguments.length; i++) {
            arguments[i].removeClass('inactive-button')
                        .prop('disabled', false);
        }
    };


    /**
     * Turn off the buttons passed in.
     */
    var deactivate = function () {
        for(var i = 0; i < arguments.length; i++) {
            arguments[i].addClass('inactive-button')
                        .prop('disabled', true);
        }
    };

    var updateDeleteButton = function() {

        var selectedPhotoCount = selectedPhotoItems().length;
        
        if (selectedPhotoCount > 0) {
            
            activate($deleteButton, $clearButton);
         
            var deleteText = selectedPhotoCount === 1 
                ? "Delete Photo"
                : 'Delete ' + selectedPhotoCount + ' Photos';
            
            $deleteButton.text(deleteText); 
        } else {
            $deleteButton.text('Delete Photo');
            deactivate($deleteButton, $clearButton);
        }
    }

    var clearSelection = function () {

        selectedPhotoItems().removeClass('ui-selected');
        updateDeleteButton();
    };

    var updateUploadButton = function () {

        if ($fileInput.prop('files').length > 0) {
            activate($uploadButton);
        } else {
            deactivate($uploadButton);
        }
    };

    var showUploadModal = function () {

        $uploadModal.foundation('reveal', 'open');

        updateUploadButton();
    }

    return {

        init : function (opts) {

            listingId = opts.listingId;


            // urls
            uploadUrl = opts.uploadUrl;
            deleteUrl = opts.deleteUrl;
            downloadUrl = opts.downloadUrl;



            // gallery container
            $photoList = opts.$photoList;



            // upload form elements
            $form = opts.$form;
            $fileInput = opts.$fileInput;
            $openUploadModalButton = opts.$openUploadModalButton;
            $uploadButton = opts.$uploadButton;
            $deleteButton = opts.$deleteButton;
            $clearButton = opts.$clearButton;
            $confirmDeleteButton = opts.$confirmDeleteButton;
                // Get the cross-site request forgery token from the upload form.
            // to send with delete requests.
            csrfToken = $form.find('input:hidden[name="_token"]').val();




            // setup events
            $form.submit(onUpload);
            $confirmDeleteButton.click(onDelete);
            $clearButton.click(clearSelection);
            $openUploadModalButton.click(showUploadModal);
            $fileInput.on('change', updateUploadButton);



            $uploadModal = opts.$uploadModal;
            $confirmDeleteModal = opts.$confirmDeleteModal;


            $photoList.selectable({
                stop : updateDeleteButton
            });
        },

        injectPhotos : function () {
            injectPhotos();
        }
    };
})()
