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
        $id=$_GET['jugada_id'];
        $jugada= datos_jugada($id);
        $jugada_id= $jugada['id'];
        $posInicial = $jugada['posInicial'];
        $pieza_id= $jugada['pieza_id'];
        $p=$pieza_id; // guardo la pieza para modificar posicion final
        $posFinal= $n;

        
        // verificar legalidad movimiento




        //Si es legal modificar_jugada($posInicial,$posFinal,$pieza_id);
        // si no es legal, deshacer el movimiento, lanzar un mensaje y volver a movimientos



        modificar_jugada($jugada_id,$posInicial,$posFinal,$pieza_id);
        
        
        //modificar posicion salida (quitar la pieza)
        $posicion_id= $posInicial;
        $marca=0;
        $id=$posicion_id;
        $posicion=buscar_posicion($id);
        $fila=$posicion['fila'];
        $columna=$posicion['columna'];
        $pieza_id=0;
        modificar_posicion($posicion_id,$pieza_id,$fila,$columna,$marca);
        
        
        //modificar posicion llegada (poner pieza)
        $posicion_id= $posFinal;
        $id=$posicion_id;
        $posicion=buscar_posicion($id);
        $fila=$posicion['fila'];
        $columna=$posicion['columna'];
        $pieza_id=$p;
        modificar_posicion($posicion_id,$pieza_id,$fila,$columna,$marca);
        

           
        // vuelve a movimientos
        header("Location: movimientos.php?id=".$n."");
    ?>
        

</body>

</html>