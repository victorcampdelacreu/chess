<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colocar Piezas</title>
    <link rel="stylesheet" href="estilos2.css">
</head>



<?php
    require('funciones.php');
    $piezas = listar_piezas();
    $posicion= listar_posiciones();
    $tablero=listar_tablero();
    
    ?>

    

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
        <select name="pieza_id">
            <option>Seleccione pieza</option>
            <?php
            while($pieza = mysqli_fetch_array($piezas)){?>
                <option value="<?php echo $pieza['id']; ?>"><?php echo $pieza['acronimo'] ?></option>
            <?php } ?>
            </select>
            
        <input required type="text" name="fila" placeholder="entre la fila (1 a 8)" />
        <input required type="text" name="columna" placeholder="entre la columna (a - h)" />
        <button name="formularioPosicion" class="botonEnviar" type="submit">Enviar</button>
        
    </form>
    <?php
        if (isset($_POST['formularioPosicion'])) {
   
        $fila = $_POST['fila'];
        $columna = $_POST['columna'];
        $pieza_id=$_POST['pieza_id'];
        $marca=0;
        $A='abcdefgh';
        $p=strpos($A,$columna)+1;
        $resto=$fila%8;
        if($resto==0){
            $posicion_id=$columna;
        }
        else{
        $posicion_id=$p+(8*(8-$resto));
        }
        $id=$posicion_id;
        
        $posicion=buscar_posicion($id);
        $posicion['id']=$id;       
        
        modificar_posicion($posicion['id'],$pieza_id,$fila,$columna,$marca);
        //cho 'posicion ',$posicion['id'],' pieza ',$pieza_id; //control
        }
        
        
    ?>
    <br><br>

<body>
    
    <br>
   
    <div class="cajas">
        <h2>
            <a class="enlaces" href="colocar_piezas_mostrar.php">mostrar las piezas colocadas</a>
        </h2>
    </div>
    <br>
   
   <div class="cajas">
       <h2>
           <a class="enlaces" href="en_juego.php">Ir a juego</a>
       </h2>
   </div>





</body>

</html>