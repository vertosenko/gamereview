<?php

class Model_User extends Model {


    function get_user($data) {
        echo '<pre>'; print_r($data); echo '</pre>';
        $sql =  'SELECT * FROM users WHERE email = :email AND pass = :pass';
        $stmt = $this->db->pdo->prepare($sql);

        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
}