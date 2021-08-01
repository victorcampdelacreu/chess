<?php

use function PHPSTORM_META\map;

require('config.php');

//define las funciones del proyecto */

function insertar_pieza($acronimo,$nombre, $color)
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

//***************************************************** */
function insertar_posicion($pieza_id, $fila,$columna,$marca)
{
    $query = "INSERT INTO posicion(pieza_id,fila,columna,marca) VALUES ($pieza_id, $fila,'$columna',$marca)";
    $result = mysqli_query(OpenCon(), $query);
    return true;
}

function insertar_posicion2($pieza_id, $fila,$columna)
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


function modificar_posicion($posicion_id,$pieza_id,$fila,$columna,$marca){
    $sql = "UPDATE posicion SET pieza_id=$pieza_id, fila=$fila,columna='$columna',marca=$marca WHERE id= $posicion_id";
    mysqli_query(OpenCon(), $sql);
    return true;
}


//****************************************************** */

function insertar_tablero($fila,$columna,$color)
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

function insertar_jugada($posInicial,$posFinal,$pieza_id)
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


function modificar_jugada($jugada_id,$posInicial,$posFinal,$pieza_id){
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

function ultima_jugada_id(){
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

//**************************************************** */
function nombre_filas($j)
{
    if($j==1){
        $nj='a';
    }
    if($j==2){
        $nj='b';
    }
    if($j==3){
        $nj='c';
    }
    if($j==4){
        $nj='d';
    }
    if($j==5){
        $nj='e';
    }
    if($j==6){
        $nj='f';
    }
    if($j==7){
        $nj='g';
    }
    if($j==8){
        $nj='h';
    }
    $result = $nj;
return $result;
}
//***************************************************** */
function verificar_torre($Fi,$Fd,$Ci,$Cd)
{
    $error=0;
    $error2=0;

if($Fi!=$Fd && $Ci!=$Cd){
       $error=1;    
}

if($error==0){
if($Fi==$Fd){
    $Fk=$Fi;  // Fk es la fila
    if($Ci+1>$Cd){
        for($Ck=$Ci+1;$Ck<$Cd-1;$Ck++){
            $error2= mira_pieza($Fk,$Ck);
        }
    }
    if($Ci<$Cd+1){
        for($Ck=$Cd+1;$Ck<$Ci-1;$Ck++){
            $error2=mira_pieza($Fk,$Ck);
        }

    }
}
if($Ci==$Cd){
    $Ck=$Ci;  // Ck es la columna
    if($Fi+1>$Fd){
        for($Fk=$Fi+1;$Fk<$Fd-1;$Fk++){
           $error2= mira_pieza($Fk,$Ck);
        }
    }
    if($Fi<$Fd+1){
        for($Fk=$Fd+1;$Fk<$Fi-1;$Fk++){
            $error2=mira_pieza($Fk,$Ck);
        }
    }
}
}
$error= $error+$error2;
return $error;
}

function mira_pieza($Fk,$Ck){
    $error2=0;
    $id=($Fk-8)*8+$Ck;
    $posicion_ficha=buscar_posicion($id);
    $pieza_id=$posicion_ficha['$pieza_id'];
    if ($pieza_id !=0){
        $error2=1;
       
    }
return $error2;
    
}

    









