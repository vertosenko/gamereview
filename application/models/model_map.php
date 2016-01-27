<?php
class Model_Map extends Model{
    public function set_data($data){
        $this->db->pdo->query("INSERT INTO regions SET name_rus = '$data[0]', name_eng = '$data[1]', coordinates = '$data[2]' ");
    }

    public function get_data(){

        $stmt = $this->db->pdo->query("SELECT * FROM regions")->fetchAll();
        foreach($stmt as $k => $v){
            /*
            $polygons = array();

            $values = explode(' ', $v['coordinates']);
            for($i=0 ; $i< count($values); $i++)
            {
                if(!empty($values[$i])){
                    $tmp = explode(',', $values[$i]);
                    $polygons[]=array($tmp[0],$tmp[1]);
                }

            }
            */
            $polygons = array();
            $coord = explode('*',$v['coordinates']);
            $count = count($coord);
            for($i=0 ; $i< $count ; $i++)
            {
                $values = explode(' ', $coord[$i]);
                for($j=0 ; $j< count($values); $j++)
                {
                    if(!empty($values[$j])){
                        $tmp = explode(',', $values[$j]);
                        $polygons[$i][]=array($tmp[0],$tmp[1]);
                    }

                }
            }
            $data[] = array(
                'data' => array(
                    'url' => 'www.google.com',
                    'id' => $k
                ),
                'options' => array(
                    'strokeColor' => '#FF0000',
                    'strokeOpacity' => 0.8,
                    'strokeWeight' => 2,
                    'fillColor' => '#FF0000',
                    'fillOpacity' => 0.35,
                    'paths' => $polygons
                )

            );

        }
        $data = json_encode($data, JSON_NUMERIC_CHECK);
        return $data ;
    }
}