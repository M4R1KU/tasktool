<?php
require_once('lib/Login.php');
$login  = new Login();

$name    = null;
$email   = null;
$username= null;
$password= null;
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($login->register($name, $email, $username, $password)) {
        $name    = null;
        $email   = null;
        $username= null;
        $password = null;
    }
}
?>
<div class="container">
    <div class="col-lg-5 panel panel-primary">
        <div class="panel-heading"><h1>Log In</h1></div>
        <form action="index.php?site=login" method="post">
            <div class="form-group panel-body">
                <!--Form for Log In-->
                <div class="form-group"><label for="username">Username</label>
                    <input type="text" class="form-control" name="login_username" id="login_username" placeholder="Enter your username"></div>

                <div class="form-group"><label for="pasword">Password</label>
                    <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Enter your password"></div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>

            </div>
        </form>
    </div>
    <div class="col-lg-5 col-lg-offset-2 panel panel-primary">
        <div class="panel-heading"><h1>Sign Up</h1></div>
        <form action="index.php?site=login" method="post">
            <div class="panel-body">
                <!--Form for Sign Up-->
                <div class="form-group"><label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" title="Please enter a valid name. Example: Michael Townley." required></div>

                <div class="form-group"><label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your e-mail address" title="Please enter a valid name. Example: Michael.Townley@example.com." required></div>

                <div class="form-group"><label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter a username" required></div>

                <div class="form-group"><label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" title="at least eight symbols containing at least one number, one lower and one upper letter" required></div>

                <div class="form-group"><label for="password">Repeat Password</label>
                    <input type="password" class="form-control"  id="password_confirmed" name="password_confirmed" placeholder="Repeat your password" required></div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>
    </div>
</div>
