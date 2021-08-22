<?php

/**
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //print_r($this->getUrl());
        $url = $this->getUrl();

        // Look in controllers for first value / index 0
        $fileName = ucwords($url[0]);
        if (file_exists("../app/controllers/$fileName.php")) {
            // if exists, set as controller
            $this->currentController = $fileName;
            // unset 0 index
            unset($url[0]);
        }

        // Reguire the controller
        require_once "../app/controllers/$this->currentController.php";

        // Instantiate controller class ($pages = new Pages)
        $this->currentController = new $this->currentController;

        // check for secon part of url (method)
        // die(var_dump($url[1]));

        $method = $url[1] ?? $this->currentMethod;
        //check to see if method exists in cotroller
        if (method_exists($this->currentController, $method)) {
            $this->currentMethod = $method;
            // unset 1 index to - only params are left in url variable
            unset($url[1]);
        }


        //die(var_dump($url));
        // get params
        $this->params = $url ? array_values($url) : $this->params;

        // call a callback with array of params
        //call_user_func_array([Pages, about], [1]);
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    private function getUrl()
    {
        $url = $_GET['url'] ?? $this->currentController;

        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        return $url;
    }
}
