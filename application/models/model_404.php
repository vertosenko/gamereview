<?php

class Model_404 extends Model
{

    public function get_data()
    {
        $stmt = $this->db->pdo->query("SELECT * FROM article ")->fetchAll();
        return $stmt;
    }

}
