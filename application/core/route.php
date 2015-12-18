<?php

/*
 ласс-маршрутизатор дл€ определени€ запрашиваемой страницы.
> цепл€ет классы контроллеров и моделей;
> создает экземпл€ры контролеров страниц и вызывает действи€ этих контроллеров.
*/
class Route
{

    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'index';
        $action_name = 'index';
        $param = array ('param_name' => null , 'param_value' => null);

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем им€ контроллера
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // получаем им€ экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // получаем param_name
        if ( !empty($routes[3]) )
        {
            $param['param_name'] = $routes[3];
        }

        // получаем param_value
        if ( !empty($routes[4]) )
        {
            $param['param_value']= $routes[4];
        }

        // добавл€ем префиксы
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

        // подцепл€ем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }

        // подцепл€ем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но дл€ упрощени€ сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }

        // создаем контроллер

        $controller = new $controller_name($controller_name,$action_name, $param);
        $action = $action_name;
        $tmp = $controller->params;


        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

}
