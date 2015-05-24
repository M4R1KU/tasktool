<?php

/**
 * Manage the current main page content
 */
class CentralDesign
{
    private $pagefolder = 'pages/';
    private $defaultsite = 'index';
    private $requestedsite;

    public function __construct()
    {
        // process GET-Param site
        if (!empty($_GET['site'])) {
            $this->requestedsite = $_GET['site'];
        } else {
            $this->requestedsite = $this->defaultsite;
        }
    }

    /**
     * Loads the current main page
     */
    public function loadPage()
    {
        if(!empty($_SESSION['login-user']) || $_GET['site'] == '') {
            $path = $this->pagefolder . $this->requestedsite . '.php';
        }
        else {
            $path = $this->pagefolder . 'loginsite.php';
        }

        if (file_exists($path)) {
            require_once($path);
        } else {
            require_once($this->pagefolder . '404.php');
        }
    }

    /**
     * Current main page
     * @return string
     */
    public function getRequestedSite()
    {
        return $this->requestedsite;
    }
}
