<?php

class Index {

    const DEFAULT_PAGE = 'home';
    const PAGE_DIRECTORY = '../page/';
    const LAYOUT_DIRECTORY = '../layout/';
    const EXTENSION = '.php';

    public function init() {
        session_start();
        set_exception_handler(array($this, 'handleException'));
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function handleException(Exception $ex) {
        $extra = ['message' => $ex->getMessage()];

        if ($ex instanceof NotFoundException) {
            header('HTTP/1.0 404 Not Found');
            $this->runPage('404', $extra);
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            $this->runPage('500', $extra);
        }
    }

    public function loadClass($name) {
        $classes = array(
            'Utils' => '../util/Utils.php',
            'Error' => '../validation/Error.php',
            'NotFoundException' => '../exception/NotFoundException.php',
            'Flash' => '../flash/Flash.php',
            'Config' => '../config/Config.php');
        if (!array_key_exists($name, $classes)) {
            die('Class "' . $name . '" not found.');
        }
        require_once $classes[$name];
    }

    function run() {
        $this->runPage($this->getPage());
//        $this->doCRUD();
    }

    private function runPage($page, array $extra = array()) {
        $run = false;
        if ($this->hasScript($page)) {

            require $this->getScript($page);
        }
        if ($this->hasTemplate($page)) {
            $run = true;
            $template = $this->getTemplate($page);
            require self::LAYOUT_DIRECTORY . 'index' . self::EXTENSION;
            require self::LAYOUT_DIRECTORY . 'index-view' . self::EXTENSION;
        }
        if (!$run) {
            die();
        }
    }

    function getPage() {
        $page = self::DEFAULT_PAGE;
        if (array_key_exists('page', $_GET)) {
            $page = $_GET['page'];
        }
        return $this->checkPage($page);
    }

    function checkPage($page) {
        if (!preg_match('/^[a-z0-9-]+$/i', $page)) {
            throw new Exception('Unsafe page "' . $page . '" requested');
        }
        if (!$this->hasScript($page) && !$this->hasTemplate($page)) {
            throw new NotFoundException('Page "' . $page . '" not found');
        }
        return $page;
    }

    function hasScript($page) {
        return file_exists($this->getScript($page));
    }

    function hasTemplate($page) {
        return file_exists($this->getTemplate($page));
    }

    function getScript($page) {
        $page = self::PAGE_DIRECTORY . $page . self::EXTENSION;
        return $page;
    }

    function getTemplate($page) {
        $page = self::PAGE_DIRECTORY . $page . '-view' . self::EXTENSION;
        return $page;
    }

}

$Index = new Index();
$Index->init();
$Index->run();
?>