$(function () {

    PhotoManager.init({

        // where to post the photos
        uploadUrl : Realty.photos.uploadUrl,

        deleteUrl : Realty.photos.deleteUrl,

        // where this listings photos are
        downloadUrl : Realty.photos.downloadUrl,

        // the listing that these photos belong to
        listingId : document.getElementsByName('listingId')[0].value,


        $form : $('#photo-form'),


        $fileInput : $('#fileInput'),

        // buttons
        $openUploadModalButton : $('#open-upload-modal-button'),
        $uploadButton : $('#upload-button'),
        $clearButton : $('#clear-button'),
        $deleteButton : $('#delete-button'),
        $confirmDeleteButton : $('#confirm-delete-button'),

        // modals
        $confirmDeleteModal : $('#confirm-delete-modal'),
        $uploadModal : $('#upload-modal'),

        // gallery
        $photoList : $('#photo-list')
    });

    PhotoManager.injectPhotos();
});
