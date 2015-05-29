<nav class="navbar navbar-fixed-top">
    <a href="index.php" class="navbar-title">TaskTool</a>
    <div id="navbar-link" class="left">
        <a href="index.php">Home</a>
        <a href="index.php?site=subjects">Subjects</a>
        <a href="index.php?site=about">About</a>
        <a href="index.php?site=contact">Contact</a>
        <?php
        require_once("logedin.php")
        ?>
    </div>
    <div class="trigger"><img src="public/pictures/menu-item.jpg" alt="item to toggle the menu"></div>
</nav>
