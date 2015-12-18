<?php

class View
{

    public $view_template = 'view_template'; // здесь можно указать общий вид по умолчанию.

    /*
    $content_view виды отображающие контент страниц;
    $data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
    */
    function generate($content_view, $data = null)
    {

        if (is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }

        /*
        динамически подключаем общий шаблон (вид),
        внутри которого будет встраиваться вид
        для отображения контента конкретной страницы.
        */
        include 'application/views/' . $this->view_template .'.php';
    }
}
