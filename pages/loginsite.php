<div class="container">
    <?php
    require_once('lib/Login.php');
    require_once('lib/LoginScript.php');
    require_once('lib/Validator.php');
    $login = new Login();
    $validator = new Validator();

    $name = null;
    $email = null;
    $username = null;
    $password = null;
    $password_conf = null;
    $login_username = null;
    $login_password = null;
    if (isset($_POST['register_button'])) {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_confirmed'])) {

            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $password_conf = htmlspecialchars($_POST['password_confirmed']);

            if ($validator->isValidMail($email) && $validator->passwordConfirm($password, $password_conf) && $validator->valid_name($name)) {

                $password = hash("sha512", $password);

                if ($login->register($name, $email, $username, $password)) {
                    $name = null;
                    $email = null;
                    $username = null;
                    $password = null;
                    echo '<div class="alert alert-dismissible alert-success "><button type="button" class="close" data-dismiss="alert">×</button><h4>Registration succeded!</h4></div>';
                }
            } else {

                callRegErrorScript();
            }
        } else {
            callRegErrorScript();
        }
    } elseif (isset($_POST['login_button'])) {
        if (!empty($_POST['login_username']) && !empty($_POST['login_password'])) {
            $login_username = htmlspecialchars($_POST['login_username']);
            $login_password = htmlspecialchars($_POST['login_password']);

            $login_password = hash("sha512", $login_password);

            if ($login->login_user($login_username, $login_password)) {
                $login_username = null;
                $login_password = null;
            } else {
                callLogErrorScript();
            }
        } else {
            callLogErrorScript();
        }
    }

    function callLogErrorScript()
    {
        echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><h4>Authentication Failed!<br></h4><p>Please try again</p></div>';
    }

    function callRegErrorScript()
    {
        echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><h4>Something went wrong!<br></h4><p>Please try again</p></div>';
    }

    ?>
    <div class="col-lg-5 panel panel-primary" id="login-panel">
        <div class="panel-heading" id="lnormalheading"><h1>Log In</h1></div>
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
                    <button type="submit" name="login_button" class="btn btn-primary" id="login_button">Log In</button>
                </div>

            </div>
        </form>
    </div>
    <div class="col-lg-5 col-lg-offset-2 panel panel-primary" id="register-panel">
        <div class="panel-heading" id="rnormalheading"><h1>Sign Up</h1></div>
        <form action="index.php?site=loginsite" method="post">
            <div class="panel-body">
                <!--Form for Sign Up-->
                <div class="form-group"><label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name"
                           required data-container="body" data-toggle="popover"
                           data-placement="left" data-trigger="focus"
                           data-content="Please enter a valid name. Example: Michael Townley."
                           data-original-title="Name"></div>

                <div class="form-group"><label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="Enter your e-mail address" required data-container="body" data-toggle="popover"
                           data-placement="left" data-trigger="focus"
                           data-content="Please enter a valid E-Mail address. Example: Michael.Townley@example.com."
                           data-original-title="E-Mail"></div>

                <div class="form-group"><label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter a username"
                           required data-container="body" data-toggle="popover"
                           data-placement="left" data-trigger="focus"
                           data-content="The username must be at least 4 characters long."
                           data-original-title="Username"></div>

                <div class="form-group"><label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                           required data-container="body" data-toggle="popover"
                           data-placement="left" data-trigger="focus"
                           data-content="at least eight symbols containing at least one number, one lower and one upper letter"
                           data-original-title="Password"></div>

                <div class="form-group"><label for="password">Repeat Password</label>
                    <input type="password" class="form-control" id="password_confirmed" name="password_confirmed"
                           placeholder="Repeat your password" required></div>

                <div class="form-group">
                    <button type="submit" name="register_button" class="btn btn-primary" id="register_button">Submit
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
