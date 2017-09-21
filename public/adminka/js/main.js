var clickFlashAlertClose = function(){

    console.log('aaf');
    $(this).parent().addClass('hidden');
};

$(function () {
    var url = window.location.pathname;
    var action = url.split("/").pop();
    var uploadName = '';
    $('.sidebar-wrapper ul.nav li.'+action).addClass('active');

    $(document).on('click', '#falash-alert-success button', clickFlashAlertClose);
    $(document).on('click', '#falash-alert-danger button', clickFlashAlertClose);

    Dropzone.autoDiscover = false;
    $("#slider-dropzone").dropzone({
        url: "/admin/slider-upload",
        addRemoveLinks: true,
        maxFiles: 10, //change limit as per your requirements
        dictMaxFilesExceeded: "Maximum upload limit reached",
        init: function () {

        },
        success:function(file, response)
        {
            uploadName = response.fileName;
            console.log(uploadName);
        },
        removedfile: function(file) {
            x = confirm('Do you want to delete?');
            if(!x)  return false;
            $.ajax({
                url: "/admin/slider-upload",
                type: "POST",
                data: {name: uploadName},
                success: function () {
                    file.previewElement.remove();
                }
            });
        }
    });
});

