<?php

// ���������� ����� ����
require_once '/../config.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

/*
����� ������ ������������ �������������� ������, ����������� ��������� ����������:
	> ��������������
	> �����������
	> ������ � �������
	> ���������� ��� ������� � ������
	> ORM
	> Unit ������������
	> Benchmarking
	> ������ � �������������
	> Backup
	> � ��.
*/


require_once 'core/db_connect.php';
require_once 'core/route.php';
Route::start(); // ��������� �������������
