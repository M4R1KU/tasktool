/**
 * Created by bkunzm on 21.05.2015.
 */

/*Handles all authentificationfails on the login site*/


var lp = "#login-panel";
var rp = "#register-panel";

/*Invalid User Input or PHP-validation failed*/
function registerInputError() {
    $(rp).removeClass("panel-primary");
    $(rp).addClass("panel-danger");
    $("#rnormalheading").hide();
    $("#registerinputfail").show();

}

/*Invalid User Input*/
function loginInputError() {

}

/*Failed to write data in to database*/
function registerAutError() {

}

/*Authentication failed*/
function loginAutError() {


}
