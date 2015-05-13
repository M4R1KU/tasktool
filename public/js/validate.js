$(document).ready(function (){

    var emailPattern = /\S+@\S+\.\S+/;

    $("#email").change(function (){
        $(this).removeClass("validation-success");
        $(this).removeClass("validation-error")

        if(emailPattern.test($("#email").val())) {
            $(this).addClass("validation-success");
        }
        else {
            $(this).addClass("validation-error");
        }

    });

});
