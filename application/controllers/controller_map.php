<?php

class Controller_Map extends Controller
{
    function action_index()
    {

        $this->view->includeStyle("/css/multi-select.css");

        $this->view->includeScript("https://code.jquery.com/jquery-1.11.0.min.js");
        $this->view->includeScript("http://maps.googleapis.com/maps/api/js?sensor=false");
        $this->view->includeScript("/js/gmap/gmap3.js");
        $this->view->includeScript("/js/multi_select/jquery.multi-select.js");

        $this->view->generateToolBar($this->tollBarArray, $this->user->getRole());



        /*$row = 0;
        $headers = array();
        $rows = array();

        if (($handle = fopen($this->base_path . '/application/map/map.kml.', 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                if (!$row) {
                    $headers = $data;
                    $row++;
                    continue;
                }

                $xml = new SimpleXMLElement($data[2]);  //getting the contents
                $value = (string)$xml->outerBoundaryIs->LinearRing->coordinates; ///KML Structure
                $values = explode(" ", trim($value));
                $coords = '';

                foreach ($values as $value) {
                    $args = explode(",", $value);
                    $coords .= $args[1] . ',' . $args[0] .' ';

                }

                $rows[] = array(
                    $data[0],
                    $data[1],
                    $coords
                );



                $row++;




            }
            fclose($handle);

        }*/
        $data = $this->model->get_data();
        //$this->view->generate('map/map');
        //$tmp = json_encode($data, JSON_NUMERIC_CHECK);
        //$this->view->generate('map/map', array('data' => $tmp));
        if(!empty($this->params['select']))
        {
            echo '<pre>'; print_r($this->params); echo '</pre>';
        }
        $this->view->generate('map/map', array('data' => $data));
    }

}