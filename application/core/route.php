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
        $param = array ('param_name' => null , 'param_value' => null);

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
        //$param_name = 'paramName_'.$param_name;
        //$param_value = 'paramValue_'.$param_value;

       // /*
        echo "Model: $model_name <br>";
        echo "Controller: $controller_name <br>";
        echo "Action: $action_name <br>";

      //  */

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
        $action = $action_name;
        $tmp = $controller->params;


        if(method_exists($controller, $action))
        {
            // �������� �������� �����������
            $controller->$action();
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
