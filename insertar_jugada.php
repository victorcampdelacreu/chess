<?php

require('funciones.php');

//entrada piezas


$posInicial = $_POST['posInicial'];
$posFinal = $_POST['posFinal'];
$pieza_id= $_POST['pieza_id'];




$insertado = insertar_jugada($posInicial, $posFinal,$Pieza_id);

header("Location: realizar_movSalida.php");