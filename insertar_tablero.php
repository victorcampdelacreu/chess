<?php

require('funciones.php');

//entrada piezas


$fila =$_POST['fila'];
$columna =$_POST['columna'];
$color=$_POST['color'];




$insertado = insertar_tablero($fila, $columna,$color);

header("Location: crear_tablero.php");