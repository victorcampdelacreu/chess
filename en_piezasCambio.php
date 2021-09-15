<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piezas Cambio</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <!-- Formulario para insertar las piezas -->

    <form class = "formulario" action="insertar_piezasCambio.php" method="POST">
        <input required type="text" name="cambio" placeholder="entre id pieza a cambiar" />
        
        
        <button class = "botonEnviar" type="submit">Enviar</button>
    </form>

    <br><br>
    <!-- tabla para que salgan listados los datos ya entrados-->
    <table class="tabla">
        <thead>
            <tr>
                <td>ID</td>
                <td>Pieza Cambio</td>
                
                
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
            require('./funciones.php');
            $piezasCambio = listar_piezasCambio();
            ?>

            <?php
            while ($piezaCambio = mysqli_fetch_array($piezasCambio)) {
                echo '<tr>';
                echo '<td>' . $piezaCambio['id'] . '</td>';
                echo '<td>' . $piezaCambio['cambio'] . '</td>';
                
                
                
                           
                // para eliminar una pieza
                echo '<td><a href="">Editar</a>&nbsp;&nbsp;&nbsp; <a href="eliminar_piezasCambio.php?id=' . $piezaCambio['id'] . '">Eliminar</a> </td>';
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