<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>realizar movimiento A DESTINO</title>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
    <?php
        require('funciones.php');
        $jugada=listar_jugadas();

        // este programa trae la posicion de salida de la pieza
        $n=$_GET['n'];
        $jugada_id=$_GET['jugada_id'];

        echo $n,'-',$jugada_id;
        echo die;
        
        // verificar legalidad movimiento




        //Si es legal modificar_jugada($posInicial,$posFinal,$pieza_id);
        // si no es legal, deshacer el movimiento, lanzar un mensaje y volver a movimientos





           
        // vuelve a movimientos
        header("Location: movimientos.php?id=".$n."");
    ?>
        

</body>

</html>