<?php

class Controller {

    public $model;
    public $view;
    public $controller;
    public $action;
    public $params;

    function __construct($controller, $action, $params = null)
    {
        $this->view = new View();
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;

        $this->params = $this->params + $_REQUEST;
    }

    // действие (action), вызываемое по умолчанию
    function action_index()
    {
        // todo
    }

    /**
     * Redirect to needed url
     *
     * @param $path 'index/index'
     * @param string $msg
     */
     public function redirect($path = '', $msg = '') {
        //$msg - @TODO: in the future
        header('Location: /'. $path);
        exit();
    }
}
