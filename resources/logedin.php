<?php

if(!empty($_SESSION['login-user'])){
    $logedinuser = $_SESSION['login-user'];

    echo '<a href="lib/logout.php" class="navbar-loggedin">Logout<br>' . $logedinuser . '</a>';
}
else {
    echo '<a href="index.php?site=loginsite">Log In</a>';
}
