<?php

require('funciones.php');

//entrada piezas
$cambio=$_POST['cambio'];




$insertado = insertar_piezaCambio($cambio);

header("Location: en_piezasCambio.php");