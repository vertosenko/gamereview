<?php
class Menu extends Model
{
    public function display_menu()
    {
        $stmt = $this->db->pdo->query("SELECT * FROM navigation_rules ORDER BY parent_id");
        return $stmt->fetchAll();
    }

    public function prepare_rules($controller)
    {
        $controller_name = explode('_',$controller);
        $controller = $controller_name[1];
        $stmt = $this->db->pdo->query("SELECT url,role FROM navigation_rules WHERE url LIKE '%$controller%'")->fetchAll();

        $rules = array();
        foreach($stmt as $key => $value)
        {
            $action = explode('/',$value['url']);
            $rules[$action[2]] = $value['role'];
        }

        return $rules;
    }
}
