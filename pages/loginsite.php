<?php
require_once('lib/Login.php');
require_once('lib/LoginScript.php');
require_once('lib/Validator.php');
$login = new Login();
$validator = new Validator();
session_start();

$name = null;
$email = null;
$username = null;
$password = null;
$password_conf = null;
$login_username = null;
$login_password = null;
if (isset($_POST['register_button'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_confirmed'])) {

        if (!$validator->isValidMail($email) || !$validator->isFreeUsername($username) || !$validator->passwordConfirm($password, $password_conf)) {
            callErrorScript();
        } else {

            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $password = sha1($password);

            if ($login->register($name, $email, $username, $password)) {
                $name = null;
                $email = null;
                $username = null;
                $password = null;
            }
        }
    } else {
        callErrorScript();
    }
} elseif (isset($_POST['login_button'])) {
    if (!empty($_POST['login_username']) && !empty($_POST['login_password'])) {
        $login_username = htmlspecialchars($_POST['login_username']);
        $login_password = htmlspecialchars($_POST['login_password']);

        $login_password = sha1($login_password);

        if ($login->login_user($login_username, $login_password)) {
            $login_username = null;
            $login_password = null;
        }
    } else {
        echo '<script></script>';
    }
}

function callErrorScript()
{
    echo '<script>$(document).ready(function () {registerInputError()});</script>';
}

?>
<div class="container">
    <div class="col-lg-5 panel panel-primary" id="login-panel">
        <div class="panel-heading" id="lnormalheading"><h1>Log In</h1></div>
        <div class="panel-heading" id="logininputfail"><h2>Something went wrong</h2><br>

            <p>Please try again</p></div>
        <form action="index.php?site=loginsite" method="post">
            <div class="form-group panel-body">
                <!--Form for Log In-->
                <div class="form-group"><label for="username">Username</label>
                    <input type="text" class="form-control" name="login_username" id="login_username"
                           placeholder="Enter your username"></div>

                <div class="form-group"><label for="pasword">Password</label>
                    <input type="password" class="form-control" name="login_password" id="login_password"
                           placeholder="Enter your password"></div>

                <div class="form-group">
                    <button type="submit" name="login_button" class="btn btn-primary">Log In</button>
                </div>

            </div>
        </form>
    </div>
    <div class="col-lg-5 col-lg-offset-2 panel panel-primary" id="register-panel">
        <div class="panel-heading" id="rnormalheading"><h1>Sign Up</h1></div>
        <div class="panel-heading" id="registerinputfail"><h2>Something went wrong</h2><br>

            <p>Please try again</p></div>
        <form action="index.php?site=loginsite" method="post">
            <div class="panel-body">
                <!--Form for Sign Up-->
                <div class="form-group"><label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name"
                           title="Please enter a valid name. Example: Michael Townley." required></div>

                <div class="form-group"><label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="Enter your e-mail address"
                           title="Please enter a valid name. Example: Michael.Townley@example.com." required></div>

                <div class="form-group"><label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter a username"
                           required></div>

                <div class="form-group"><label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                           title="at least eight symbols containing at least one number, one lower and one upper letter"
                           required></div>

                <div class="form-group"><label for="password">Repeat Password</label>
                    <input type="password" class="form-control" id="password_confirmed" name="password_confirmed"
                           placeholder="Repeat your password" required></div>

                <div class="form-group">
                    <button type="submit" name="register_button" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>
    </div>
</div>
