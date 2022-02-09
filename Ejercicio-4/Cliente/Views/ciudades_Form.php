<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Ciudades</title>
    <style>
        * {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Listear número de habitantes en la ciudad.</h1>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])."?controller=ciudades&action=form"; ?>" method="POST">
        <b>Número de habitantes</b><br>
        <input type="text" name="habitantes" value="<?php echo $habitantes; ?>"> <br><br>

        <input type="submit" value="Mostrar">

    </form>
</body>
</html>