<?php

/*
�����-������������� ��� ����������� ������������� ��������.
> ������� ������ ������������ � �������;
> ������� ���������� ����������� ������� � �������� �������� ���� ������������.
*/
class Route
{
    static public function start()
    {


        // ���������� � �������� �� ���������
        $controller_name = 'index';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // �������� ��� �����������
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // �������� ��� ������
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // �������� param_name
        $params = array();

        if ( !empty($routes[3]) && !empty($routes[4]) )
        {
            $params = array(
                $routes[3] => $routes[4]
            );
        }

        // ��������� ��������
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // ���������� ���� � ������� ������ (����� ������ ����� � �� ����)

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }

        // ���������� ���� � ������� �����������
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }
        else
        {
            /*
            ��������� ���� �� ������ ����� ����������,
            �� ��� ��������� ����� ������� �������� �� �������� 404
            */
            Route::ErrorPage404();
        }

        // ������� ����������
        $controller = new $controller_name($controller_name,$action_name, $params);
        $controller->model = new $model_name();

        $action = $action_name;

        //if ajax
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            $action = 'ajax_' . $action;
        }

        if(method_exists($controller, $action))
        {
           if ($controller->checkRules()) {
               // �������� �������� �����������
               $controller->$action();
           } else {
               $controller->redirect('user/login', '');
           }
        }
        else
        {
            // ����� ����� �������� ���� �� ������ ����������
            Route::ErrorPage404();
        }

    }

    public function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
