


$(function () {
    var url = window.location.pathname;
    var action = url.split("/").pop();
    $('.sidebar-wrapper ul.nav li.'+action).addClass('active');
});