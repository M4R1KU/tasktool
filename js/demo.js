/**
 * Created by bkunzm on 24.03.2015.
 */

$(document).ready(function () {
    var $menubutton = $("#svgshizzle");
    $menubutton.click(function () {
        $("#side-menu").animate({
            marginLeft: "0px",
            marginTop: "-100px"
        }).css({
            height: "2470px"
        });
        $("#main").animate({
            marginLeft: "400px",
            marginTop: "100px",
            opacity: "0.5"
        });
    });
    $("#content-div").click(function () {
        $("#side-menu").animate({
            marginLeft: "-300px"
        }).css({
            height: "2070px"
        });
        $("#main").animate({
            marginLeft: "0px",
            marginTop: "0px",
            opacity: "1"
        });
    });
    $menubutton.mouseenter(function () {
        $(".innerrect").attr("fill", "#111111");
    });
    $menubutton.mouseleave(function () {
        $(".innerrect").attr("fill", "#2C365E");
    });

    var $userloginbutton = $("#userlogin");
    $userloginbutton.click(function () {
        $("#login-user").show()
    });
});