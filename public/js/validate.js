$(document).ready(function () {

    var e = "#email";
    var n = "#name";
    var p = "#password";
    var rp = "#password_confirmed";
    var u = "#username";
    var emailPattern = /\S+@\S+\.\S+/;
    var namePattern = /[A-Z][a-z]*[ ][A-Z][a-z]*/;
    var pwPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;

    $(n).keyup(function () {
        toggleClasses(n, namePattern);
    });

    $(e).keyup(function () {
        toggleClasses(e, emailPattern);
    });

    $(p).keyup(function () {
        toggleClasses(p, pwPattern);
    });

    $(rp).keyup(function () {
        confirmPassword();
    });

    $(u).keyup(function(){
        usernameValidation($(this).val());
    });

    function toggleClasses(element, pattern) {
        $(element).removeClass("validation-success");
        $(element).removeClass("validation-error");


        if (!pattern.test($(element).val()) || $(element).val() == '') {
            $(element).addClass("validation-error");
        }
        else {
            $(element).addClass("validation-success");
        }
    }

    function confirmPassword() {
        $(rp).removeClass("validation-success");
        $(rp).removeClass("validation-error");

        if ($(p).val() == $(rp).val()) {
            $(rp).addClass("validation-success");
        }
        else {
            $(rp).addClass("validation-error");
        }
    }

    function usernameValidation(str) {
        $.ajax({
            method: 'POST',
            url: 'getusername.php',
            data: {username : str}
        }).done(function(exists) {
            $(u).removeClass("validation-success");
            $(u).removeClass("validation-error");
            if (exists){
                $(u).addClass("validation-success");
            }else {
                $(u).addClass("validation-error");
            }
        })


    }

});
