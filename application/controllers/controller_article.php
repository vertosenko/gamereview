<?php
class Controller_Article extends Controller
{

    function __construct($controller, $action, $params)
    {
        parent::__construct($controller, $action, $params);
        $this->model = new Model_Article();
    }

    function action_index()
    {
        if($this->params['param_name']=='id' && $this->params['param_value']>=0)
        {
            $data = $this->model->get_data($this->params['param_value']);
            $this->view->generate('article/article', array('article' => $data, 'edit' => 1));
        }
        else
        {
            $data = $this->model->get_data();
            $this->view->generate('article/article', array('article' => $data));
        }
    }

    function action_add()
    {
        if($this->params['add'])
        {
            $this->model->add_data($this->params);
            $data = $this->model->get_data();
            $this->view->generate('article/article', array('article' => $data));
        }
        else
        {
            $this->view->generate('article/article_add');
        }
    }

    function action_update()
    {
        echo '<pre>'; print_r($this->params); echo '</pre>';
        if ($this->params['param_name']=='id' && $this->params['param_value']>=0 && $this->params['update']!=1) {
            $data =  $this->model->get_data($this->params['param_value']);
            $this->view->generate('article/article_update',array('article' =>$data));
        }
        if ($this->params['update'])
        {
            $this->model->update_data($this->params);
            $data = $this->model->get_data();
            $this->view->generate('article/article', array('article' => $data));
        }

    }

    function action_delete()
    {
        if ($this->params['param_name']=='id' && $this->params['param_value']>=0) {
            $this->model->delete_data($this->params['param_value']);
            $data = $this->model->get_data();
            $this->view->generate('article/article', array('article' =>$data));
        }

    }
}