<?php
// load classes
require_once('lib/CentralDesign.php');
$centralDesign = new CentralDesign();

// build page
require_once('resources/head.php');
require_once('resources/menu.php');
$centralDesign->loadPage();
require_once('resources/footer.php');
