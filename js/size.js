$(document).ready(function () {
    var defwidth = $(window).width();
    console.log(defwidth);
    $("#main").css("width", defwidth);

    $(window).resize(function () {
        var resizewin = $(window).width();
        console.log(resizewin);
        $("#main").css("width", resizewin);
    });
});