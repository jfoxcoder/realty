
//$.growl({ title: "Growl", message: "The kitten is awake!" });
//$.growl.error({ message: "The kitten is attacking!" });
//$.growl.notice({ message: "The kitten is cute!" });
//$.growl.warning({ message: "The kitten is ugly!" });
var News = (function () {

    var created = function (type, label) {
        $.growl.notice({ title: type, message : label + ' created.'});
    };

    var updated = function (type, label) {
        $.growl.notice({ title: type, message : label + ' updated.'});
    };

    var deleted = function (type, label) {
        $.growl.notice({ title: type, message : label + ' deleted.'});
    };

    var createError = function (type, message) {
        $.growl.error({ title: 'Create ' + type, message : message});
    };

    var updateError = function (type, message) {
        $.growl.error({ title: 'Update ' + type, message : message});
    };

    var deleteError = function (type, message) {
        $.growl.error({ title: 'Delete ' + type, message : message});
    };






    var good = function (title, message) {
        $.growl.notice({ title: title, message : message});
    };

    var bad = function (title, message) {
        $.growl.error({ title: title, message : message});
    };

    var warn = function (title, message) {
        $.growl.warning({ title: title, message : message});
    };

    return {
        created : created,
        updated : updated,
        deleted : deleted,

        createError : createError,
        updateError : updateError,
        deleteError : deleteError,

        good : good,
        bad : bad,
        warn : warn
    };

})();





