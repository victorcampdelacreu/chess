<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piezas</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <!-- Formulario para insertar las piezas -->

    <form class = "formulario" action="insertar_piezas.php" method="POST">
        <input required type="text" name="acronimo" placeholder="entre acronimo pieza" />
        <input required type="text" name="nombre" placeholder="entre nombre de la pieza" />
        <input required type="text" name="color" placeholder="entre color" />
        <button class = "botonEnviar" type="submit">Enviar</button>
    </form>

    <br><br>
    <!-- tabla para que salgan listados los datos ya entrados-->
    <table class="tabla">
        <thead>
            <tr>
                <td>ID</td>
                <td>Acronimo</td>
                <td>Nombre</td>
                <td>Color</td>
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
            require('./funciones.php');
            $piezas = listar_piezas();
            ?>

            <?php
            while ($pieza = mysqli_fetch_array($piezas)) {
                echo '<tr>';
                echo '<td>' . $pieza['id'] . '</td>';
                echo '<td>' . $pieza['acronimo'] . '</td>';
                echo '<td>' . $pieza['nombre'] . '</td>';
                echo '<td>' . $pieza['color'] . '</td>';
                
                           
                // para eliminar una pieza
                echo '<td><a href="">Editar</a>&nbsp;&nbsp;&nbsp; <a href="eliminar_piezas.php?id=' . $pieza['id'] . '">Eliminar</a> </td>';
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