<?php
$login = false;

if($login){

    echo '<a href="index.php?site=loginsite" class="navbar-loggedin">Logout<br>Mario</a>';
}
else {
    echo '<a href="index.php?site=loginsite">Log In</a>';
}