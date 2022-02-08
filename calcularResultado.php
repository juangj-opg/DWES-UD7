<?php
// Instanciamos un nuevo servidor SOAP
$uri="https://www.raulprietofernandez.net/images/blog/211/DNI/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("suma");
$server->handle();

// Función para obtener raíz cuadrada
function suma($n1, $n2) {
    $resultado=$n1 + $n2;
    return $resultado;
}
?>