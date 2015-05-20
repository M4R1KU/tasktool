$(document).ready(function (){

    var e = "#email";
    var n = "#name";
    var emailPattern = /\S+@\S+\.\S+/;
    var namePattern = /[a-zA-Z]+/;

    $(n).keyup(function() {
        toggleClasses(n, namePattern);
    });

    $(e).keyup(function (){
        toggleClasses(e, emailPattern);
    });

    function toggleClasses(element, pattern) {
        $(element).removeClass("validation-success");
        $(element).removeClass("validation-error");


        if(pattern.test($(element).val())) {
            $(element).addClass("validation-success");
        }
        else {
            $(element).addClass("validation-error");
        }
    }

});
