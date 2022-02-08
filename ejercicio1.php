<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Vaciamos algunas variables
$error = "";
$resultado = "";
$n1 = "";
$n2 = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://localhost/DWES-UD7/calcularResultado.php";
$uri = "http://localhost/DWES-UD7/ejercicio1.php";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (!empty($_POST['n1']) && !empty($_POST['n2']) ) {
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = "El resultado de sumar los dos números es es: " . $cliente->suma($n1, $n2);
    } else {
        $error = "<strong>Error:</strong> Debes introducir dos números enteros.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Calcular Suma - Servicio Web + PHP + SOAP</title>
        <link rel="stylesheet" type="text/css" href="./estilo.css">
    </head>
<body>
    <h1>Obtener Suma de dos números</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="ejercicio1.php" method="post">
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='n1' value='$n1'><br>";
        print "<input type='text' name='n2' value='$n2'><br><br>";
        print "<input type='submit' name='enviar' value='Calcular suma'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
    ?>
    </form>
</body>
</html>