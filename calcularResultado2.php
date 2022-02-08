<?php
// Instanciamos un nuevo servidor SOAP
$uri = "http://localhost/DWES-UD7/ejercicio1.php";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("suma");
$server->addFunction("calculaParImpar");
$server->handle();

// Función para obtener raíz cuadrada
function suma($n1, $n2) {
    $resultado=$n1 + $n2;
    return $resultado;
}

function calculaParImpar($num) {
    return $num % 2;
}
?>