<?php

if(!empty($_SESSION['login-user'])){
    $logedinuser = $_SESSION['login-user'];

    echo '<a href="lib/logout.php" class="navbar-loggedin">Logout<br>';
    echo $logedinuser;
    echo '</a>';
}
else {
    echo '<a href="index.php?site=loginsite">Log In</a>';
}
