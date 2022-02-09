<?php

function listCiudades()
{
    require "Models/ciudades_Model.php";

    $uri = "http://localhost/DWES-UD7\Ejercicio-4\Servicio\index.php?controllers=ciudades&action=listCiudades";
    $server = new SoapServer(null,array('uri'=>$uri));
    $server->addFunction("getCiudades");
    $server->handle();
    
}
?>