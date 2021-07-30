<?php

require('funciones.php');

//entrada piezas
$acronimo=$_POST['acronimo'];
$nombre =$_POST['nombre'];
$color =$_POST['color'];


$insertado = insertar_pieza($acronimo,$nombre, $color);

header("Location: en_piezas.php");