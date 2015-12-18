<?php

class View
{

    public $view_template = 'view_template'; // ����� ����� ������� ����� ��� �� ���������.

    /*
    $content_view ���� ������������ ������� �������;
    $data - ������, ���������� �������� �������� ��������. ������ ����������� � ������.
    */
    function generate($content_view, $data = null)
    {

        if (is_array($data)) {
            // ����������� �������� ������� � ����������
            extract($data);
        }

        /*
        ����������� ���������� ����� ������ (���),
        ������ �������� ����� ������������ ���
        ��� ����������� �������� ���������� ��������.
        */
        include 'application/views/' . $this->view_template .'.php';
    }
}
