var clickFlashAlertClose = function(){

    console.log('aaf');
    $(this).parent().addClass('hidden');
};

$(function () {
    var url = window.location.pathname;
    var action = url.split("/").pop();
    $('.sidebar-wrapper ul.nav li.'+action).addClass('active');

    $(document).on('click', '#falash-alert-success button', clickFlashAlertClose);
    $(document).on('click', '#falash-alert-danger button', clickFlashAlertClose);
});

