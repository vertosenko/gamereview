<?php

class Controller_Index extends Controller
{

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generateToolBar($this->tollBarArray,$this->user->getRole());
        $this->view->generate('index/index', array('article' =>$data));
    }

}