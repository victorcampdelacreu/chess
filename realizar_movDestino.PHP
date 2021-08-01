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
        $pieza=ver_pieza($pieza_id);
        $nomPieza=$pieza['nombre'];
        $color=$pieza['color'];
        //calcula filas y columnas inicial y final
        $Fi= 8-intdiv(($posInicial-1),8); //cociente entero
        $Fd= 8-intdiv(($posFinal-1),8);
        $Ci= $posInicial-(8-$Fi)*8;
        $Cd= $posFinal-(8-$Fd)*8;

        //echo $posInicial,'-',$posFinal,'----';
        //echo 'fila inicial',$Fi,'  fila final  ',$Fd,'----';
        //echo 'columna inicial  ',$Ci,'  columna final  ',$Cd;
        //echo die;

        $error=0;
        if ($nomPieza=='Torre'){
            $error = verificar_torre($Fi,$Fd,$Ci,$Cd);
        }
        if ($nomPieza=='Caballo'){
            //verificar caballo
        }
        if ($nomPieza=='Alfil'){
            //verificar alfil
        }
        if ($nomPieza=='Dama'){
            //verificar dama
        }
        if ($nomPieza=='rey'){
            //verificar rey
        }
        if ($nomPieza=='peon'){
            //verificar peon
        }
        //Si es legal modificar_jugada($posInicial,$posFinal,$pieza_id);
        // si no es legal, deshacer el movimiento, lanzar un mensaje y volver a movimientos
        
        if ($error==0){
            // modifica jugada poniendo posFinal
            
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
        }
       
           
        // vuelve a movimientos
        header("Location: movimientos.php?id=".$n."");
    ?>
        

</body>

</html>