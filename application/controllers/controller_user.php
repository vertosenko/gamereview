<?php

class Controller_User extends Controller
{

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
            $this->view->generateToolBar($this->tollBarArray,$this->user->getRole());
            $this->view->generate('user/user');
        }

    }

    function action_logout()
    {
        //@TODO logout();
        $this->user->logout();
        $this->redirect();
    }

    function action_register(){
        if (!empty($this->params['register'])) {

            $base = dirname(dirname(__FILE__));
            $uploaddir = $base . '\images\gallery\\';
            $uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
            move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile);

            $this->model->register_user($this->params);
            $stmt = $this->model->get_user($this->params);
            $user_details = $stmt->fetch();
            if (!empty($user_details)) {
                $this->user->login($user_details);
                $this->redirect();
            }
        } else {
            $this->view->generateToolBar($this->tollBarArray,$this->user->getRole());
            $this->view->generate('user/user_register', array('countryList' => $this->model->get_countries()));
        }
    }

    function action_profile(){
        $stmt = $this->model->get_user(array('email' => $this->user->getEmail(), 'pass' => $this->user->getPass()));
        $user_details = $stmt->fetch();

        if(!empty($user_details))
        {
            $this->view->generateToolBar($this->tollBarArray,$this->user->getRole());
            $this->view->generate('user/user_profile', array('user' => $user_details));
        }
        else{
            $this->view->generateToolBar($this->tollBarArray,$this->user->getRole());
            $this->view->generate('user/user');
        }


    }

    function action_list()
    {
        echo 'admin';
    }
}