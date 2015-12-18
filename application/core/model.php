<?php

class Model
{
    public $db;
    /*
        ћодель обычно включает методы выборки данных, это могут быть:
            > методы нативных библиотек pgsql или mysql;
            > методы библиотек, реализующих абстракицю данных. Ќапример, методы библиотеки PEAR MDB2;
            > методы ORM;
            > методы дл€ работы с NoSQL;
            > и др.
    */

    public function __construct() {
        $this->db = new DB_Connect(SERVER_NAME, SERVER_DB, SERVER_CHARSET, SERVER_USER, SERVER_PASS);
    }

    // метод выборки данных
    public function get_data()
    {
    }
}