<?php

header('Content-Type: application/json');
$data_points = array(
    array( 'x' => '3', 'y' => '650'),
    array( 'x' => '5', 'y' => '700'),
    array( 'x' => '7', 'y' => '710'),
    array( 'x' => '9', 'y' => '658'),
    array( 'x' => '11', 'y' => '734'),
    array( 'x' => '13', 'y' => '963'),
    array( 'x' => '15', 'y' => '847')
);
echo json_encode($data_points, JSON_NUMERIC_CHECK);