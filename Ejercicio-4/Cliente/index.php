<?php
//La carpeta donde buscaremos los controladores
define ('CONTROLLERS_FOLDER', "Controllers/");

//Si no se indica un controlador, este es el controlador que se usará
define ('DEFAULT_CONTROLLER', "ciudades");

//Si no se indica una acción, esta acción es la que se usará
define ('DEFAULT_ACTION', "form");


//Obtenemos el controlador.
//Si el usuario no lo introduce, seleccionamos el de por defecto.
$controller = DEFAULT_CONTROLLER;
if ( !empty ( $_GET[ 'controller' ] ) )
    $controller = $_GET [ 'controller' ];

$action = DEFAULT_ACTION;
// Obtenemos la acción seleccionada.
// Si el usuario no la introduce, seleccionamos la de por defecto.
if ( !empty ( $_GET [ 'action' ] ) )
    $action = $_GET [ 'action' ];

    
// Ya tenemos el controllador y la acción
// Formamos el nombre del fichero que continee nuestro controlador.
$controller = CONTROLLERS_FOLDER . $controller . '_controller.php';
// Si la variable $controller es un fichero lo requerimos
try{
    if ( is_file ( $controller ) )
        require_once ($controller);
    else   
        throw new Exception ('El controlador <b>'.$_GET[ "controller" ].'</b> no existe - 404 Not Found.');

    //Si la variable $action es una función la ejecutamos o detenemos el script
    if ( is_callable ($action) )
        $action();
    else
        throw new Exception ('La acción <b>'.$_GET[ "action" ].'</b> no existe - 404 Not Found.');
}
catch (Exception $e){
    echo "Excepción capturada: ". $e->getMessage(). "\n";
}

?>