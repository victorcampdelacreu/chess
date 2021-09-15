<?php

require('funciones.php');
$id= $_GET['id'];

eliminar_pieza($id);

header("location: en_piezasCambio.php");