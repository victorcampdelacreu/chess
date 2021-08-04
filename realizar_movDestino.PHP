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
        $error = 0;
        
        $n=$_GET['n'];
        $posFinal= $n;
        $id=$_GET['jugada_id'];
        $jugada= datos_jugada($id);
        $jugada_id= $jugada['id'];
        $posInicial = $jugada['posInicial'];
        $pieza_id= $jugada['pieza_id'];
        $p=$pieza_id; // guardo la pieza para modificar posicion final
        $pieza = ver_pieza($pieza_id);
        $color = $pieza['color'];
        $nomPieza=$pieza['nombre'];

        // trae los datos del destino
        $posicion_id= $posFinal;
        $id=$posicion_id;
        $posicionF=buscar_posicion($id);
        $filaF=$posicionF['fila'];
        $columnaF=$posicionF['columna'];
        $piezaF_id = $posicionF['pieza_id'];

        $mens=0; // pone indicador mensaje a 0
        // mira si en destino hay una pieza del mismo color
        if($piezaF_id !=0){ 
            $piezaF = ver_pieza($piezaF_id);
            $colorF = $piezaF['color'];
           
            if ($color == $colorF){
                $error = 1;
                $mens=1; // el 1 indica mensaje de que hay una pieza propia en destino
              
            }        
        }
        
              
        //calcula filas y columnas inicial y final
        $Fi= 8-intdiv(($posInicial-1),8); //cociente entero
        $Fd= 8-intdiv(($posFinal-1),8);
        $Ci= $posInicial-(8-$Fi)*8;
        $Cd= $posFinal-(8-$Fd)*8;
        
        // verificar legalidad movimiento

        if ($error==0){
            if ($nomPieza=='Torre'){
                $error = verificar_torre($Fi,$Fd,$Ci,$Cd);
            }
            if ($nomPieza=='Caballo'){
                $error = verificar_caballo($Fi,$Fd,$Ci,$Cd);
            }
            if ($nomPieza=='Alfil'){
                $error = verificar_alfil($Fi,$Fd,$Ci,$Cd);
                //echo $pieza_id,'-',$Fi,'-',$Ci,'--',$Fd,'-',$Cd,'---',$error;
                //echo die;
            }
            if ($nomPieza=='Dama'){
                $error = verificar_dama($Fi,$Fd,$Ci,$Cd);
            }
            if ($nomPieza=='rey'){
                //verificar rey
            }
            if ($nomPieza=='peon'){
                //verificar peon
            }
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
            //echo $posicion_id,'-',$pieza_id,'-',$fila,'-',$columna,'----';
            modificar_posicion($posicion_id,$pieza_id,$fila,$columna,$marca);
            
            
            //modificar posicion llegada (poner pieza)
            $posicion_id=$posFinal;
            $fila=$filaF;
            $columna=$columnaF;
            $pieza_id=$p;
            //echo $posicion_id,'-',$pieza_id,'-',$fila,'-',$columna,'----';
            modificar_posicion($posicion_id,$pieza_id,$fila,$columna,$marca);
            $mensaje = 'movimiento legal';
           
        }
        else{
            
            $mensaje = 'movimiento ilegal, volver a movimientos';
            if ($mens == 1){
                $mensaje= 'hay una pieza propia en destino, volver a movimientos';
            }
        }
           
        // vuelve a movimientos
        //header("Location: movimientos.php?id=".$n."");
        echo "<table>";
       
        $titulo = 'Inicio jugada';
        echo "<td class= 'cajas'>".$mensaje.'</td>';
        echo "</table>";
    ?>
      <div class="cajas">
       <h2>
           <a class="enlaces" href="movimientos.php">Nuevo movimiento</a>
       </h2>
   </div>  

</body>

</html>