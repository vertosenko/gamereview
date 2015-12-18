<?php

class Model_Article extends Model
{

    public function get_data($id = null)
    {
        if($id!=null)
            $stmt = $this->db->pdo->query("SELECT * FROM article WHERE id = $id");
        else
            $stmt = $this->db->pdo->query("SELECT * FROM article ");
        return $stmt;
    }

    public function add_data($data)
    {
        $sql = "INSERT INTO article SET title = :title , text = :text";

        $stmt = $this->db->pdo->prepare($sql);

        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':text', $data['text'], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function update_data($data)
    {
        $sql = "UPDATE article SET title = :title , text = :text WHERE id = :id";

        $stmt = $this->db->pdo->prepare($sql);

        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':text', $data['text'], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete_data($data)
    {
        $sql = "DELETE FROM article WHERE id = :id";

        $stmt = $this->db->pdo->prepare($sql);

        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);


        return $stmt->execute();
    }

}
