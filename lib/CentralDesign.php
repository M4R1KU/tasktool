<?php

/**
 * Manage the current main page content
 */
class CentralDesign
{
    private $pagefolder = 'pages/';
    private $defaultsite = 'index';
    private $currentsite;

    public function __construct()
    {
        // process GET-Param site
        if (!empty($_GET['site'])) {
            $this->currentsite = $_GET['site'];
        } else {
            $this->currentsite = $this->defaultsite;
        }
    }

    /**
     * Loads the current main page
     */
    public function loadPage()
    {
        $path = $this->pagefolder . $this->currentsite . '.php';
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
    public function getCurrentSite()
    {
        return $this->currentsite;
    }
}
