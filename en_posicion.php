<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posicion</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>


<?php
    require('funciones.php');
    $piezas = listar_piezas();
    ?>

    <!-- Formulario para insertar posiciones -->

    <form class = "formulario" action="insertar_posicion.php" method="POST">
        <!--<input required type="text" name="pieza_id" placeholder="entre la pieza" />-->
        
        <select name="pieza_id">
            <option>Seleccione pieza</option>
            <?php
            while($pieza = mysqli_fetch_array($piezas)){?>
                <option value="<?php echo $pieza['id']; ?>"><?php echo $pieza['nombre'],' - ', $pieza['color']; ?></option>
            <?php } ?>
            </select>
            
        <input required type="text" name="fila" placeholder="entre la fila (1 a 8)" />
        <input required type="text" name="columna" placeholder="entre la columna (a - h)" />
        



        <button class = "botonEnviar" type="submit">Enviar</button>
    </form>

    <br><br>
    <!-- tabla para que salgan listados los datos ya entrados-->
    <table class="tabla">
        <thead>
            <tr>
                <td>ID</td>
                <td>Pieza</td>
                
                <td>Fila</td>
                <td>Columna</td>
                <td>Marca</td>
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $posiciones = listar_posiciones();
           
            while ($posicion = mysqli_fetch_array($posiciones)) {
               
                echo '<tr>';
                echo '<td>' . $posicion['id'] . '</td>';
                echo '<td>' . $posicion['pieza_id']. '</td>';
                //echo '<td>' . $pieza['nombre'] . '</td>';
                //echo '<td>' . $pieza['color'] . '</td>';
                echo '<td>' . $posicion['fila'] . '</td>';
                echo '<td>' . $posicion['columna'] . '</td>';
                echo '<td>' . $posicion['marca'] . '</td>';
                
                           
                // para eliminar una pieza
                echo '<td><a href="">Editar</a>&nbsp;&nbsp;&nbsp; <a href="eliminar_posicion.php?id=' . $posicion['id'] . '">Eliminar</a> </td>';
                echo '</tr>';
            }
            ?>

        </tbody>
    </table>
    <br>
    <div class="cajas">
            <h2>
                <a class="enlaces" href="en_preparacion.php">Ir a Preparacion juego</a>
            </h2>
        </div>
</body>

</html>