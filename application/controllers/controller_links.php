<?php
class Controller_Links extends Controller
{

    function __construct()
    {
        $this->model = new Model_Links();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('links/links', 'view_template', $data);
    }
}