/*
*  - Deletes contact message from the database
*  - Removes the contact box from the DOM on success.
*  - Displays success or failure message to the user.
*/
$(function() {
    $('.contact-delete-btn').click(function() {

        var $contactBox = $(this).closest('li');

        $.ajax({
            url: Realty.contacts.deleteUrl + '/' + $contactBox.data('contact'),
            type: 'delete'
        })
        .done(function() {
            News.deleted('Contact', $contactBox.find('.contact-name').text());

            $contactBox.hide('explode', 500, function() {
                $contactBox.remove();
            });
        })
        .fail(function () {
            console.error('Error deleting contact', arguments);
            News.deleteError('Contact');
        });
    });
});