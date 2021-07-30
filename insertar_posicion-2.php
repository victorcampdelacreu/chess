<?php

require('funciones.php');

//entrada piezas

$pieza_id =$_POST['pieza_id'];
$fila =$_POST['fila'];
$columna =$_POST['columna'];
$marca=0;




$insertado = insertar_posicion2($pieza_id, $fila, $columna,$marca);

header("Location: colocar_piezas.php");