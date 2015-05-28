/**
 * Created by M4R1KU on 08.05.2015.
 */
$(document).ready(function () {
    $(".trigger").click(function () {
        $("#navbar-link").toggleClass("show");
        $("#navbar-link").toggleClass("left");
    });
    $("#createsubject_button").click(function(){
        console.log($("#hex").text());
        return false;
    });
});