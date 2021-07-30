<?php

require('funciones.php');

//entrada piezas

$pieza_id =$_POST['pieza_id'];
$fila =$_POST['fila'];
$columna =$_POST['columna'];
$marca=0;



$insertado = insertar_posicion($pieza_id, $fila,$columna,$marca);

header("Location: en_posicion.php");