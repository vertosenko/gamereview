<?php

class View
{

    public $view_template = 'view_template'; // здесь можно указать общий вид по умолчанию.
    public $styles = '';
    public $scripts = '';
    public $toolBarList = '';
    protected $toolBarArray = array();
    protected $count = 0;
    protected $parent_id_column = array();
    protected $role = 0;
    protected $activeTitle = 0;

    /*
    $content_view виды отображающие контент страниц;
    $data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
    */

    protected function recursiveGenerationOfMenu($parent = 0, $startFrom = 0, $class = 'nav navbar-nav')
    {
        $this->toolBarList .= '<ul class="' . $class . '">' . "\n\t";
        for ($i = $startFrom; $i < $this->count; $i++) {
            if ($this->toolBarArray[$i]['parent_id'] != $parent) {
                $this->toolBarList .= '</ul>';
                return;
            }
            if ($this->toolBarArray[$i]['role'] <= $this->role && $this->toolBarArray[$i]['display'] == 1) {
                $key = array_search($this->toolBarArray[$i]['id'], $this->parent_id_column);
                if ($key === FALSE) {
                    //li
                    $class = ($this->activeTitle == $i) ? ' class="active"' : '' ;
                    $this->toolBarList .= '<li' . $class .'>' .
                        '<a href="' . $this->toolBarArray[$i]['url'] . '">' . $this->toolBarArray[$i]['title'] . '</a></li>';
                } else {
                    //li dropdawn and recursive another ul
                    $this->toolBarList .= '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' .
                        $this->toolBarArray[$i]['title'] . ' <span class="caret"></span></a>' . "\n\t";
                    $this->recursiveGenerationOfMenu($this->toolBarArray[$i]['id'], $key, 'dropdown-menu');

                }
            }
        }
        $this->toolBarList .= '</ul>';

        if ($this->toolBarArray[$startFrom]['parent_id'] == 0) {
            $this->toolBarList .= '<ul class="nav navbar-nav navbar-right">' . "\n\t";
            for ($i = $startFrom; $i < $this->count; $i++) {
                if ($this->toolBarArray[$i]['parent_id'] != $parent) {
                    $this->toolBarList .= '</ul>';
                    return;
                }
                if ($this->toolBarArray[$i]['role'] == $this->role && $this->toolBarArray[$i]['display'] == 2) {
                    $key = array_search($this->toolBarArray[$i]['id'], $this->parent_id_column);
                    if ($key === FALSE) {
                        //li
                        $this->toolBarList .= '<li' . ($this->activeTitle == $i) ? ' class="active"' : '' . '>' .
                            '<a href="' . $this->toolBarArray[$i]['url'] . '">' . $this->toolBarArray[$i]['title'] . '</a></li>';
                    } else {
                        //li dropdawn and recursive another ul
                        $this->toolBarList .= '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' .
                            $this->toolBarArray[$i]['title'] . ' <span class="caret"></span></a>' . "\n\t";
                        $this->recursiveGenerationOfMenu($this->toolBarArray[$i]['id'], $key, 'dropdown-menu');
                        $this->toolBarList .= '</li>';

                    }
                }
            }
            $this->toolBarList .= '</ul>';
        }
        return;
    }

        function includeScript($src = "")
        {
            $this->scripts .= '<script src="' . $src . '"></script>' . "\n\t";
        }

        function includeStyle($src = "")
        {
            $this->styles .= '<link src="' . $src . '">';
        }

        function executeScript($js)
        {
            $this->styles .= "<script>
            jQuery('document').ready(function() {
                $js
            });
        </script>\n\t";
        }

        function generateToolBar($toolBarArray, $role = 0)
        {
            $this->toolBarArray = $toolBarArray;
            $this->count = count($toolBarArray);
            $this->parent_id_column = array_column($this->toolBarArray, 'parent_id');
            $this->role = $role;
            $request = ($_SERVER['REQUEST_URI'] == '/') ? $request = '/index/index' : $request = $_SERVER['REQUEST_URI'];


            foreach ($this->toolBarArray as $k => $v) {
                // @TODO: - без слэша в начале не работает
                if (strpos($v['url'], $request) !== FALSE) {
                    $this->activeTitle = $k;
                }
            }

            return $this->recursiveGenerationOfMenu();
        }

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
            include 'application/views/' . $this->view_template . '.php';
        }


    }
