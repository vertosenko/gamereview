<?php

class User
{
    public function getUser()
    {
        return (isset($_SESSION['user']['name'])) ? $_SESSION['user']['name'] : null;
    }

    public function getRole()
    {
        return (isset($_SESSION['user']['role'])) ? $_SESSION['user']['role'] : null;
    }

    public function getEmail()
    {
        return (isset($_SESSION['user']['email'])) ? $_SESSION['user']['email'] : null;
    }

    public function getPass()
    {
        return (isset($_SESSION['user']['pass'])) ? $_SESSION['user']['pass'] : null;
    }

    public function isLogIn()
    {
        return (!empty($_SESSION['user']['id'])) ? true : false;
    }

    public function login($user_details)
    {
        $_SESSION['user'] = $user_details;
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

}