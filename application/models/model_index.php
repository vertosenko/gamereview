<?php

class Model_Index extends Model
{

    public function get_data()
    {
        $stmt = $this->db->pdo->query("SELECT * FROM article ")->fetchAll();
        return $stmt;
    }

}
