<?php

function getConnection(){
    $user='developer';
    $password = 'developer';
    $db = new PDO('mysql:host=localhost;dbname=provincia', $user, $password); 
    return $db;   
}

function getCiudades($num){
    $db = getConnection();
    $result = $db->query('SELECT nombre, poblacion FROM ciudad WHERE poblacion >='. $num);
    $ciudades = array();
    while ($ciudad = $result->fetch())
        $ciudades[] = $ciudad;
    return $ciudades;
}
?>