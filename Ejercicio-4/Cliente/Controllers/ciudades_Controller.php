<?php

function form(){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['habitantes'])){
            $habitantes = $_POST['habitantes'];
            if ($habitantes >= 0 ) {
                // Redireccion para listear las ciudades
                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = 'index.php?controllers=ciudades&action=listCiudades&habitantes='.$habitantes;
                header("Location: http://$host$uri/$extra");
            } else {
                include "Views/ciudades_Form.php";
            }
            
        } else {
            $habitantes = "";
            include "Views/ciudades_Form.php";
        }
    } else {
        $habitantes = "";
        include "Views/ciudades_Form.php";
    }


}
function listCiudades()
{
    $url = "http://localhost/DWES-UD7\Ejercicio-4\Servicio\index.php?controllers=ciudades&action=listCiudades";
    $uri = "http://localhost/DWES-UD7\Ejercicio-4\Cliente\index.php?controllers=ciudades&action=listCiudades";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
    
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php?controllers=ciudades&action=form';

    $ciudades = "";

    if (isset($_GET['habitantes'])){
        if($_GET['habitantes'] >= 0){
            $ciudades = $cliente->getCiudades($_GET['habitantes']);
            include "Views/ciudades_List.php";
        } else {
            header("Location: http://$host$uri/$extra");
        }
    } else {
        header("Location: http://$host$uri/$extra");        
    }
    
}
?>