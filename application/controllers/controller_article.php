<?php

class Controller_Article extends Controller
{

    function action_index()
    {
        if (!empty($this->params['id'])) {
            $data = $this->model->get_data($this->params['id']);
            $this->view->generateToolBar($this->tollBarArray,$this->user->getRole());
            $this->view->generate('article/article', array('article' => $data->fetchAll(), 'edit' => 1));
        } else {
            $data = $this->model->get_data();
            $this->view->generateToolBar($this->tollBarArray,$this->user->getRole());
            $this->view->generate('article/article', array('article' => $data->fetchAll()));
        }
    }

    function action_add()
    {
        if (!empty($this->params['add'])) {
            $this->model->add_data($this->params);
            $data = $this->model->get_data();
            $this->view->generate('article/article', array('article' => $data));
        } else {
            $this->view->includeScript("/../../js/ckeditor/ckeditor.js");
            $this->view->includeScript("/../../js/ckeditor-custom.js");
            $this->view->generate('article/article_add');
        }
    }

    function action_update()
    {
        if (!empty($this->params['id'])) {
            if (!empty($this->params['update'])) {
                $this->model->update_data($this->params);
                $data = $this->model->get_data();
                $this->view->generate('article/article', array('article' => $data->fetchAll()));
            } else {
                $data = $this->model->get_data($this->params['id']);
                $this->view->includeScript("/../../js/ckeditor/ckeditor.js");
                $this->view->includeScript("/../../js/ckeditor-custom.js");
                //$this->view->executeScript('initEditor();');
                $this->view->generate('article/article_update', array('article' => $data->fetchAll()));
            }
        }
    }

    function action_delete()
    {
        if (!empty($this->params['id'])) {
            $this->model->delete_data($this->params['id']);
            $this->redirect('article');
        }

    }
}