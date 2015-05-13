<?php
$login = false;

if($login){

    echo '<a href="index.php?site=login" class="navbar-loggedin">Logout<br>Mario</a>';
}
else {
    echo '<a href="index.php?site=login">Log In</a>';
}