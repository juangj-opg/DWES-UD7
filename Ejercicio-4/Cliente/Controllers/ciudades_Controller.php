<?php
function form(){
    $url = "http://localhost/DWES-UD7/calcularResultado2.php";
    $uri = "http://localhost/DWES-UD7/ejercicio2.php";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

}

/*function form()
{
    // Se incluye el modelo
    require "Models/ciudades_Model.php"; 

    // La vista recibe un array para mostrarlo por pantalla

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
*/
function listCiudades()
{
    require "Models/ciudades_Model.php"; 
    
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php?controllers=ciudades&action=form';

    $ciudades = "";

    if (isset($_GET['habitantes'])){
        if($_GET['habitantes'] >= 0){
            $ciudades = getCiudades($_GET['habitantes']);
            include "Views/ciudades_List.php";
        } else {
            header("Location: http://$host$uri/$extra");
        }
    } else {
        header("Location: http://$host$uri/$extra");        
    }
    
}
?>