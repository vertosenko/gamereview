<?php

class Model_User extends Model {


    function get_data() {
        $stmt = $this->db->pdo->query('SELECT * FROM users');
        $row = $stmt->fetch();

        return $row;
    }
}