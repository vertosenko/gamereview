<?php
class Controller_Index extends Controller
{

    function __construct()
    {
        $this->model = new Model_Index();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('index/index', $data);
    }
}