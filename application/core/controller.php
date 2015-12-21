<?php
require_once 'User.php';


abstract class Controller
{
    public $model;
    public $view;
    public $controller;
    public $action;
    public $params;

    protected $user;
    protected $rules = array();

    public function __construct($controller, $action, $params = null)
    {
        $this->view = new View();
        $this->controller = $controller;
        $this->action = $action;

        //set params + GET + POST
        $this->params = $params;
        $this->params = $this->params + $_REQUEST;

        //user details
        $this->user = new User();
        $this->rules();
    }

    /**
     * @return mixed
     */
    abstract protected function rules();

    /**
     * Check access
     *
     * @return bool
     */
    public function checkRules()
    {
        foreach ($this->rules as $action => $role) {
            if ($this->action == 'action_' . $action && $this->user->getRole() >= $role) {
                return true;
            }
        }
    }

    // действие (action), вызываемое по умолчанию
    public function action_index()
    {
    }

    /**
     * Redirect to needed url
     *
     * @param $path 'index/index'
     * @param string $msg
     */
    public function redirect($path = '', $msg = '')
    {
        //$msg - @TODO: in the future
        header('Location: /' . $path);
        exit();
    }
}
