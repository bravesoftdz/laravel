$(function () {
    Dropzone.autoDiscover = false;

    var _createDropzoneFile = function(thisDropzone, item){
        var _name = item.getAttribute('data-name');
        var _path = item.getAttribute('data-path');
        var _url  = item.getAttribute('data-url');
        var _size = item.getAttribute('data-size');
        // Create the mock file:
        var mockFile = { name: _name, size: _size,  path: _path};
        // Call the default addedfile event handler
        thisDropzone.emit("addedfile", mockFile);
        // And optionally show the thumbnail of the file:
        thisDropzone.emit("thumbnail", mockFile, _url);
        //                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               Make sure that there is no progress bar, etc...
        thisDropzone.emit("complete", mockFile);
    };

    $("#slider-dropzone").dropzone({
        url: "/admin/slider-upload",
        addRemoveLinks: true,
        maxFiles: 10, //change limit as per your requirements
        dictMaxFilesExceeded: "Maximum upload limit reached",
        init: function () {
            var ul = document.getElementById("imageSliderList");
            var items = ul.getElementsByTagName("li");
            for (var i = 0; i < items.length; ++i) {
                _createDropzoneFile(this, items[i]);
            }
        },
        success: function (file, response) {
            // uploadName = response.fileName;
        },
        removedfile: function (file) {
            if (typeof(file.xhr) != 'undefined') {
                var jsonData = JSON.parse(file.xhr.response);
            }
            var fileeName = file.path ? file.path : jsonData.fileName;
            x = confirm('Do you want to delete?');
            if (!x) return false;
            $.ajax({
                url: "/admin/slider-upload",
                type: "POST",
                data: {name: fileeName},
                success: function () {
                    file.previewElement.remove();
                }
            });
        }
    });
});