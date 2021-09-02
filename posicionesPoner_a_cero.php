<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poner Posiciones a cero</title>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
       
    <?php 
        require('funciones.php');
        
        $piezas = listar_piezas();
        // tabla para mostrar las posiciones y las piezas en ellas
        echo "<table>";

        for($n=1;$n<65;$n++){
            $id=$n;
            $pos = buscar_posicion($id);
          
            
            $j= $pos['columna'];
            $i= $pos['fila'];
            $pieza_id=0; 
            $marca=0;
          

            modificar_posicion($id,$pieza_id,$i,$j,$marca);   
            
        }

        echo "</table>";



    ?>
    <br>
   
   <div class="cajas">
       <h2>
           <a class="enlaces" href="en_juego.php">Ir juego</a>
       </h2>
   </div>




</body>
</html>