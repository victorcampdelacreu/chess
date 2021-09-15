<?php

use function PHPSTORM_META\map;

require('config.php');

//define las funciones del proyecto */

function insertar_pieza($acronimo, $nombre, $color)
{
    $query = "INSERT INTO piezas(acronimo,nombre, color) VALUES ('$acronimo','$nombre', '$color')";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}

function listar_piezas()
{
    $sql = "SELECT * FROM piezas";
    $result = mysqli_query(OpenCon(), $sql);
    return $result;
}


function eliminar_pieza($id)
{
    $query = "DELETE FROM piezas WHERE id = '$id'";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}

function buscar_pieza($id)
{
    $query = "select acronimo, color FROM piezas where id =$id";
    $result = mysqli_query(OpenCon(), $query);
    $res = mysqli_fetch_array($result);
    return $res;
}

function ver_pieza($id)
{
    $query = "select * FROM piezas where id =$id";
    $result = mysqli_query(OpenCon(), $query);
    $res = mysqli_fetch_array($result);
    return $res;
}
function mira_pieza($Fk, $Ck)
{ //mira si hay una pieza en la posicion
    $error2 = 0;
    $pos = ((8 - $Fk) * 8) + $Ck;
    $posicion = buscar_posicion($pos);
    $pieza_id = $posicion['pieza_id'];
    if ($pieza_id != 0) {
        $error2 = 1;
    }
    return $error2;
}
//***************************************************** */
function insertar_piezaCambio($cambio)
{
    $query = "INSERT INTO piezasCambio(cambio) VALUES ('$cambio')";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}

function listar_piezasCambio()
{
    $sql = "SELECT * FROM piezasCambio";
    $result = mysqli_query(OpenCon(), $sql);
    return $result;
}


function eliminar_piezaCambio($id)
{
    $query = "DELETE FROM piezasCambio WHERE id = '$id'";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}
//***************************************************** */
function insertar_posicion($pieza_id, $fila, $columna, $marca)
{
    $query = "INSERT INTO posicion(pieza_id,fila,columna,marca) VALUES ($pieza_id, $fila,'$columna',$marca)";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}

function insertar_posicion2($pieza_id, $fila, $columna)
{
    $query = "INSERT INTO posicion(pieza_id,fila,columna) VALUES ($pieza_id, $fila,'$columna')";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}

function listar_posiciones()
{
    $sql = "SELECT * FROM posicion";
    $result = mysqli_query(OpenCon(), $sql);
    return $result;
}


function eliminar_posicion($id)
{
    $query = "DELETE FROM posicion WHERE id = '$id'";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}

function buscar_posicion($id)
{
    $query = "SELECT * FROM posicion WHERE id ='$id'";
    $result = mysqli_query(OpenCon(), $query);
    $res = mysqli_fetch_array($result);
    return $res;
}

function modificar_posicion($posicion_id, $pieza_id, $fila, $columna, $marca)
{
    $sql = "UPDATE posicion SET pieza_id=$pieza_id, fila=$fila,columna='$columna',marca=$marca WHERE id= $posicion_id";
    mysqli_query(OpenCon(), $sql);
    return true;
}


//****************************************************** */

function insertar_tablero($fila, $columna, $color)
{
    $query = "INSERT INTO tablero(fila,columna,color) VALUES ($fila, $columna,'$color')";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}

function listar_tablero()
{
    $sql = "SELECT * FROM tablero";
    $result = mysqli_query(OpenCon(), $sql);
    return $result;
}


function eliminar_tablero($id)
{
    $query = "DELETE FROM tablero WHERE id = '$id'";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}
//********************************************************+ */

function insertar_jugada($posInicial, $posFinal, $pieza_id)
{
    $query = "INSERT INTO jugadas(posInicial,posFinal,pieza_id) VALUES ($posInicial, $posFinal, $pieza_id)";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}
function listar_jugadas()
{
    $sql = "SELECT * FROM jugada";
    $result = mysqli_query(OpenCon(), $sql);
    return $result;
}


function modificar_jugada($jugada_id, $posInicial, $posFinal, $pieza_id)
{
    $sql = "UPDATE jugadas SET posInicial=$posInicial,posFinal=$posFinal,pieza_id=$pieza_id WHERE id= $jugada_id";
    mysqli_query(OpenCon(), $sql);
    return true;
}

function buscar_jugada()
{
    $query = "SELECT id FROM jugadas WHERE posFinal=0";
    $result = mysqli_query(OpenCon(), $query);
    $res = mysqli_fetch_array($result);
    return $res;
}

function ultima_jugada_id()
{
    $query = "SELECT id FROM jugadas ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(OpenCon(), $query);
    $res = mysqli_fetch_array($result);
    return $res;
}

function datos_jugada($id) // se utiliza en movDestino
{
    $query = "SELECT * FROM jugadas WHERE id ='$id'";
    $result = mysqli_query(OpenCon(), $query);
    $res = mysqli_fetch_array($result);
    return $res;
}

//***************************************************** */
function verificar_torre($Fi, $Fd, $Ci, $Cd)
{
    $error = 0;
    $error2 = 0;
    $error3 = 0;

    if ($Fi != $Fd && $Ci != $Cd) {
        $error = 1;
    }

    if ($error == 0) {
        if ($Fi == $Fd) { //si estan en la misma fila mira si hay una pieza en las columnas del medio
            $Fk = $Fi;  // Fk es la fila
            if ($Ci + 1 < $Cd) {
                for ($Ck = $Ci + 1; $Ck < $Cd; $Ck++) {
                    $error2 = mira_pieza($Fk, $Ck);
                    $error3 = $error3 + $error2;
                }
            }
            if ($Ci > $Cd + 1) {
                for ($Ck = $Cd + 1; $Ck < $Ci; $Ck++) {
                    $error2 = mira_pieza($Fk, $Ck);
                    $error3 = $error3 + $error2;
                }
            }
        }
        if ($Ci == $Cd) { //si estan en la misma colunma mira si hay una pieza en las filas del medio
            $Ck = $Ci;  // Ck es la columna
            if ($Fi + 1 < $Fd) {
                for ($Fk = $Fi + 1; $Fk < $Fd; $Fk++) {
                    $error2 = mira_pieza($Fk, $Ck);
                    $error3 = $error3 + $error2;
                }
            }
            if ($Fi > $Fd + 1) {
                for ($Fk = $Fd + 1; $Fk < $Fi; $Fk++) {
                    $error2 = mira_pieza($Fk, $Ck);
                    $error3 = $error3 + $error2;
                }
            }
        }
    }

    $error = $error + $error3;
    return $error;
}
// ***********************************************************************
function verificar_caballo($Fi, $Fd, $Ci, $Cd)
{

    $error = 1;

    if ($Fd == $Fi + 2 && $Cd == $Ci + 1) {
        $error = 0;
    }
    if ($Fd == $Fi + 2 && $Cd == $Ci - 1) {
        $error = 0;
    }
    if ($Fd == $Fi - 2 && $Cd == $Ci + 1) {
        $error = 0;
    }
    if ($Fd == $Fi - 2 && $Cd == $Ci - 1) {
        $error = 0;
    }
    if ($Fd == $Fi + 1 && $Cd == $Ci + 2) {
        $error = 0;
    }
    if ($Fd == $Fi + 1 && $Cd == $Ci - 2) {
        $error = 0;
    }
    if ($Fd == $Fi - 1 && $Cd == $Ci + 2) {
        $error = 0;
    }
    if ($Fd == $Fi - 1 && $Cd == $Ci - 2) {
        $error = 0;
    }
    return $error;
}
//******************************************************** */
function verificar_alfil($Fi, $Fd, $Ci, $Cd)
{
    $error = 0;
    $error2 = 0;
    $error3 = 0;
    $Fk = $Fi;

    if (abs($Ci - $Cd) != abs($Fi - $Fd)) {
        $error = 1;
    }
    // mira si hay una pieza en las columnas del medio

    if (($Ci + 1 < $Cd) && ($Fi + 1 < $Fd)) {
        for ($Ck = $Ci + 1; $Ck < $Cd; $Ck++) {
            $Fk = $Fk + 1;
            $error2 = mira_pieza($Fk, $Ck);
            $error3 = $error3 + $error2;
        }
    }

    if (($Ci + 1 < $Cd) && ($Fi - 1 > $Fd)) {
        for ($Ck = $Ci + 1; $Ck < $Cd; $Ck++) {
            $Fk = $Fk - 1;
            $error2 = mira_pieza($Fk, $Ck);
            $error3 = $error3 + $error2;
        }
    }

    if (($Ci - 1 > $Cd) && ($Fi + 1 < $Fd)) {
        for ($Ck = $Ci - 1; $Ck > $Cd; $Ck--) {
            $Fk = $Fk + 1;
            $error2 = mira_pieza($Fk, $Ck);
            $error3 = $error3 + $error2;
        }
    }

    if (($Ci - 1 > $Cd) && ($Fi - 1 > $Fd)) {
        for ($Ck = $Ci - 1; $Ck > $Cd; $Ck--) {
            $Fk = $Fk - 1;
            $error2 = mira_pieza($Fk, $Ck);
            $error3 = $error3 + $error2;
        }
    }


    $error = $error + $error3;
    return $error;
}
//*************************************************************** */
function verificar_dama($Fi, $Fd, $Ci, $Cd)
{
    $error1 = 0;
    $error2 = 0;
    $error3 = 0;
    //verifica movimiento
    if ($Fi != $Fd && $Ci != $Cd) {
        if (abs($Ci - $Cd) != abs($Fi - $Fd)) {
            $error1 = 1;
        }
    }
    if ($error1 == 0) {
        if ($Fi == $Fd) { //si estan en la misma fila mira si hay una pieza en las columnas del medio
            $Fk = $Fi;  // Fk es la fila
            if ($Ci + 1 < $Cd) {
                for ($Ck = $Ci + 1; $Ck < $Cd; $Ck++) {
                    $error2 = mira_pieza($Fk, $Ck);
                    $error3 = $error3 + $error2;
                }
            }
            if ($Ci > $Cd + 1) {
                for ($Ck = $Cd + 1; $Ck < $Ci; $Ck++) {
                    $error2 = mira_pieza($Fk, $Ck);
                    $error3 = $error3 + $error2;
                }
            }
        }
        if ($Ci == $Cd) { //si estan en la misma colunma mira si hay una pieza en las filas del medio
            $Ck = $Ci;  // Ck es la columna
            if ($Fi + 1 < $Fd) {
                for ($Fk = $Fi + 1; $Fk < $Fd; $Fk++) {
                    $error2 = mira_pieza($Fk, $Ck);
                    $error3 = $error3 + $error2;
                }
            }
            if ($Fi > $Fd + 1) {
                for ($Fk = $Fd + 1; $Fk < $Fi; $Fk++) {
                    $error2 = mira_pieza($Fk, $Ck);
                    $error3 = $error3 + $error2;
                }
            }
        }

        // verifica diagonales
        $Fk = $Fi;  // Fk es la fila
        if (($Ci + 1 < $Cd) && ($Fi + 1 < $Fd)) {

            for ($Ck = $Ci + 1; $Ck < $Cd; $Ck++) {
                $Fk = $Fk + 1;
                $error2 = mira_pieza($Fk, $Ck);
                $error3 = $error3 + $error2;
            }
        }

        if (($Ci + 1 < $Cd) && ($Fi - 1 > $Fd)) {
            for ($Ck = $Ci + 1; $Ck < $Cd; $Ck++) {
                $Fk = $Fk - 1;
                $error2 = mira_pieza($Fk, $Ck);
                $error3 = $error3 + $error2;
            }
        }

        if (($Ci - 1 > $Cd) && ($Fi + 1 < $Fd)) {
            for ($Ck = $Ci - 1; $Ck > $Cd; $Ck--) {
                $Fk = $Fk + 1;
                $error2 = mira_pieza($Fk, $Ck);
                $error3 = $error3 + $error2;
            }
        }

        if (($Ci - 1 > $Cd) && ($Fi - 1 > $Fd)) {
            for ($Ck = $Ci - 1; $Ck > $Cd; $Ck--) {
                $Fk = $Fk - 1;
                $error2 = mira_pieza($Fk, $Ck);
                $error3 = $error3 + $error2;
            }
        }
    }
    $error = $error1 + $error2 + $error3;
    return $error;
}

//********************************************************** */
function verificar_rey($Fi, $Fd, $Ci, $Cd)
{
    $error = 0;


    if (abs($Fi - $Fd) > 1 || abs($Ci - $Cd) > 1) {
        $error = 1;
    }

    // no es necesario comprobar si hay pieza propia en destino
    // porque ya se ha verificado en realizar_movDestino.php de
    //donde se ha lanzado a funciones

    return $error;
}
// *****************************************************

function verificar_peonBlanco($Fi, $Fd, $Ci, $Cd)
{

    $error1 = 0;
    $error2 = 0;
    $p = 0;
    if ($Fd > $Fi) {
        if ($Ci == $Cd) { // si estan en la misma columna
            if ($Fi > 2) { // verifica que no avanza mas de 1 si no esta en posicion fila 2
                if ($Fd > $Fi + 1) {
                    $error1 = 1;
                }
                $error2 = mira_pieza($Fi + 1, $Ci); //verifica que no hay pieza en fila siguiente
            }
            if ($Fi == 2) {
                if ($Fd > $Fi + 2) { //verifica que no avanza mas de 2
                    $error1 = 1;
                }
                $error2 = mira_pieza($Fi + 1, $Ci); //verifica que no hay pieza en fila 3
            }
        }
        // -------------------------
        else { // no estan en la misma columna

            if (abs($Cd - $Ci) > 1) { //verifica que no esté a mas de 1 columna
                $error1 = 1;
                echo 'estan a mas de una columna   ';
            }
            // estan a 1 columna, ha de ver si mata al contrario
            if ($Fd - $Fi != 1) { //mira si no estan a 1 fila de distancia
                $error1 = 1;
                echo ' estan a 1 columna pero misma fila ';
            } else { //estan a una columna y una fila (posible mate pieza>)
                $p = mira_pieza($Fd, $Cd);
                if ($p == 0) { //Si no hay pieza contraria movimiento ilegal
                    $error2 = 1;
                    echo 'estan en posicion de matar pero no hay pieza ';
                }
            }
        }
    } else {
        $error1 = 1;
    }
    $error = $error1 + $error2;


    return $error;
}
// **********************************************************/
function verificar_peonNegro($Fi, $Fd, $Ci, $Cd)
{
    $error1 = 0;
    $error2 = 0;
    $p = 0;
    if ($Fd < $Fi) {
        if ($Ci == $Cd) { // si estan en la misma columna
            if ($Fi < 7) { // verifica que no avanza mas de 1 si no esta en posicion fila 2
                if ($Fd < $Fi - 1) {
                    $error1 = 1;
                }
                $error2 = mira_pieza($Fi - 1, $Ci); //verifica que no hay pieza en fila siguiente
            }
            if ($Fi == 7) {
                if ($Fd < 5) { //verifica que no avanza mas de 2
                    $error1 = 1;
                }
                $error2 = mira_pieza($Fi - 1, $Ci); //verifica que no hay pieza en fila 6
            }
        }
        // -------------------------
        else { // no estan en la misma columna
            if (abs($Cd - $Ci) > 1) { //verifica que no esté a mas de 1 columna
                $error1 = 1;
                echo 'estan a mas de una columna   ';
            }
            // estan a 1 columna, ha de ver si mata al contrario
            if ($Fi - $Fd != 1) { //mira si no estan a 1 fila de distancia
                $error1 = 1;
                echo ' estan a 1 columna pero misma fila ';
            } else { //estan a una columna y una fila (posible mate pieza>)
                $p = mira_pieza($Fd, $Cd);
                if ($p == 0) { //Si no hay pieza contraria movimiento ilegal
                    $error2 = 1;
                    echo 'estan en posicion de matar pero no hay pieza ';
                }
            }
        }
    } else {



        $error1 = 1;
    }
    $error = $error1 + $error2;

    // no es necesario comprobar si hay pieza propia en destino
    // porque ya se ha verificado en realizar_movDestino.php de
    //donde se ha lanzado a funciones

    return $error;
}

//************************************************** */
function corona($m, $pc)
{
    $cambio = ' ';
?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <input required type="text" name="cambio" placeholder="elija Dama=D, Caballo=C" />

        <button name="formularioC" class="botonEnviar" type="submit">Enviar</button>

    </form>
<?php
    echo $pc . ' ';

    if (isset($_POST['formularioC'])) {
        $cambio = $_POST['cambio'];
    }
    if ($cambio == 'D' && $pc == 'b') {
        $m = 15;
    }
    if ($cambio == 'C' && $pc == 'b') {
        $m = 17;
    }
    if ($cambio == 'D' && $pc == 'n') {
        $m = 31;
    }
    if ($cambio == 'C' && $pc == 'n') {
        $m = 33;
    }
    return $m;
}
