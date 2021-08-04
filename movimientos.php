<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVIMIENTOS PIEZAS</title>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>

    <?php
    require('funciones.php');
    $piezas = listar_piezas();
    $jugada = listar_jugadas();
    ?>

    <div class="container">

        <div class="cajas">
            <h2>
                <a class="enlaces" href="#">Inicio jugada</a>
            </h2>
        </div>

        <div class="tablero">
            <?php
            echo "<table>";

            for ($n = 1; $n < 65; $n++) {
                $id = $n;
                $pos = buscar_posicion($id);

                $pieza_id = $pos['pieza_id'];
                $j = $pos['columna'];
                $i = $pos['fila'];
                $id = $pieza_id;
                if ($id != 0) {
                    $pieza = buscar_pieza($id);
                    $nj = $pieza['acronimo'];
                    $color = $pieza['color'];
                } else {
                    $nj = ' ';
                    $color = 'blanco';
                }
                // pone en data los datos a transferir
                $data = "n=$n&pieza_id=$pieza_id";

                if (($n % 8 - 1) == 0) {
                    echo "<tr>";
                    echo "<td class= 'tablero5'>" . $i . '</td>';
                }

                // *****************************************************
                // SI LA FICHA ES BLANCA 
                if ($color == 'blanco' || $color == 'blanca') {
                    $A = 'abcdefgh';
                    $p = strpos($A, $j) + 1;


                    if (($p + $i) % 2 == 1) {
                        echo "<td class= 'tablero1'><a href='realizar_movSalida.php?$data'>" . $nj . "</a></td>";
                    }
                    if (($p + $i) % 2 == 0) {
                        echo "<td class= 'tablero2'><a href='realizar_movSalida.php?$data'>" . $nj . "</a></td>";
                    }
                } else { //la ficha es negra
                    $A = 'abcdefgh';
                    $p = strpos($A, $j) + 1;


                    if (($p + $i) % 2 == 1) {
                        echo "<td class= 'tablero3'><a href='realizar_movSalida.php?$data'>" . $nj . "</a></td>";
                    }
                    if (($p + $i) % 2 == 0) {
                        echo "<td class= 'tablero4'><a href='realizar_movSalida.php?$data'>" . $nj . "</a></td>";
                    }
                }
            }
            $B = ' ';
            echo "<tr>";
            echo "<td class= 'tablero5'>" . $B . '</td>';
            for ($n = 1; $n < 9; $n++) {
                if ($n == 1) {
                    $col = 'a';
                }
                if ($n == 2) {
                    $col = 'b';
                }
                if ($n == 3) {
                    $col = 'c';
                }
                if ($n == 4) {
                    $col = 'd';
                }
                if ($n == 5) {
                    $col = 'e';
                }
                if ($n == 6) {
                    $col = 'f';
                }
                if ($n == 7) {
                    $col = 'g';
                }
                if ($n == 8) {
                    $col = 'h';
                }


                echo "<td class= 'tablero5'>" . $col . '</td>';
            }

            echo "</table>";
            ?>
        </div>
        
        <div class="cajas">
            <h2>
                <a class="enlaces" href="en_juego.php">Ir a juego</a>
            </h2>
        </div>

    </div>




</body>

</html>