<?php

class Controller_User extends Controller
{

    function rules()
    {
        $this->rules = array(
            'index' => 0,
            'login' => 0,
            'list' => 2
        );
    }

    function action_index()
    {
        $data = $this->model->get_data();

        $this->view->generate('user/user', array('user' => $data));
    }

    function action_login()
    {
        //form
        if (!empty($this->params['login'])) {
            $stmt = $this->model->get_user($this->params);

            $user_details = $stmt->fetch();
            if (!empty($user_details)) {
                $this->user->login($user_details);
                $this->redirect();
            }
        } else {
            $this->view->generate('user/user');
        }
        //log in
        ///*

        //*/

    }

    function action_logout()
    {
        //@TODO logout();
    }


    function action_list()
    {
        echo 'admin';
    }
}