<div class="container">
    <?php
    if (!empty($_SESSION['login-user'])) {
        require_once('/homelogedin.php');
    } else {
        require_once('resources/homestandard.php');
    }

    ?>




</div>
