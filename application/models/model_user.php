<?php

class Model_User extends Model {


    function get_user($data) {
        $sql = 'SELECT users.id, users.name, users.age, users.email, users.pass , users.role, users.avatar ,countries.country_name
                FROM users LEFT JOIN countries
                ON countries.id=users.country
                WHERE email = :email AND pass = :pass';
        //$sql =  'SELECT * FROM users WHERE email = :email AND pass = :pass';
        $stmt = $this->db->pdo->prepare($sql);

        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }

    function get_countries(){
        $stmt = $this->db->pdo->query("SELECT * FROM countries ")->fetchAll();
        return $stmt;
    }

    function register_user($data){
        $sql = 'INSERT INTO users
                SET name = :name, age = :age, country = :country,
                email = :email, pass = :pass, role = :role, avatar = :avatar ';

        $stmt =  $this->db->pdo->prepare($sql);

        $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(':age', $data['age'], PDO::PARAM_INT);
        $stmt->bindParam(':country', $data['country'], PDO::PARAM_INT);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
        $stmt->bindParam(':role', $data['role'], PDO::PARAM_INT);
        $stmt->bindParam(':avatar', $data['avatar'], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt;
    }

    function update_user($data){
        $sql = 'UPDATE users
                SET name = :name, age = :age, country = :country,
                email = :email, pass = :pass, role = :role, avatar = :avatar WHERE id = :id';

        $stmt =  $this->db->pdo->prepare($sql);

        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(':age', $data['age'], PDO::PARAM_INT);
        $stmt->bindParam(':country', $data['country'], PDO::PARAM_INT);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
        $stmt->bindParam(':role', $data['role'], PDO::PARAM_INT);
        $stmt->bindParam(':avatar', $data['avatar'], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt;
    }
}