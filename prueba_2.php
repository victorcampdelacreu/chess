<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRUEBAS</title>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
    <?php
    require('funciones.php');


    $cambio = $_GET['cambio'];

    echo '  pieza  ', $cambio;



    ?>
    <div class="cajas">
        <h2>
            <a class="enlaces" href="en_preparacion.php?$cambio">Ir a Preparacion juego</a>
        </h2>
    </div>


</body>

</html>