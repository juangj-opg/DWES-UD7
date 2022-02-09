<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Ciudades</title>
    <style>
        table{
            width: 30%;
        }

        table, tr, td, th{
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Habitantes</th>
        </tr>
        <?php
        foreach ($ciudades as $ciudad): ?>
            <tr>
                <td><?php echo $ciudad['nombre'] ?></td> 
                <td><?php echo $ciudad['poblacion'] ?></td> 
            </tr>
        <?php endforeach; ?>
        
    </table>

    <br><a href="index.php">Volver al formulario</a>
</body>
</html>